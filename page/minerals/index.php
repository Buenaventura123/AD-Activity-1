<?php
require_once BASE_PATH . '/bootstrap.php';
require_once LAYOUT_PATH . '/main.layout.php';
require_once COMPONENT_PATH . '/componentGroup/navbar.component.php';
require_once COMPONENT_PATH . '/componentGroup/footer.component.php';
require_once UTILS_PATH . '/dbConnection.util.php';
require_once UTILS_PATH . '/dbRepository.util.php';

class MineralRepository {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAllMinerals(): array {
        $stmt = $this->db->query("SELECT * FROM minerals ORDER BY name");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchMinerals(string $search, string $type): array {
        $query = "SELECT * FROM minerals WHERE 1=1";
        $params = [];

        if (!empty($search)) {
            $query .= " AND name ILIKE :search";
            $params[':search'] = '%' . $search . '%';
        }

        if (!empty($type) && $type !== 'all') {
            $query .= " AND type = :type";
            $params[':type'] = $type;
        }

        $query .= " ORDER BY name";
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$db = getDatabaseConnection();
$mineralRepo = new MineralRepository($db);
$searchTerm = $_GET['search'] ?? '';
$categoryFilter = $_GET['category'] ?? '';
$minerals = $mineralRepo->searchMinerals($searchTerm, $categoryFilter);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greek Minerals</title>
    <link rel="stylesheet" href="../../page/minerals/assets/css/mineral.css">
    <script src="../../page/minerals/assets/js/script.js" defer></script>
</head>
<body>
<div class="marquee-container">
    <div class="marquee-content"></div>
</div>
<?php echo getNavbar('Minerals'); ?>
<div class="main-content">
    <div class="header-section">
        <h1>Greek Mineral</h1>
        <p>Discover the finest selection of the minerals in our shop. Prized for their beauty and utility.</p>
    </div>

    <div class="filter-container">
        <div class="search-container">
            <input id="searchInput" class="search" type="text" placeholder="Search…">
            <button type="button" onclick="searchProducts()" class="search-btn">Search</button>
        </div>
        <div class="filter-buttons">
            <button class="filter-btn active" data-type="all">All</button>
            <button class="filter-btn" data-type="gemstone">Gemstone</button>
            <button class="filter-btn" data-type="ore">Ore</button>
            <button class="filter-btn" data-type="rock">Rock</button>
            <button class="filter-btn" data-type="mineral">Mineral</button>
        </div>
    </div>

    <div class="minerals-container">
        <div class="mineral-list" id="mineralsContainer">
            <?php foreach ($minerals as $mineral): ?>
                <div class="mineral-card" data-type="<?= strtolower($mineral['type']) ?>">
                    <img src="assets/img/<?= htmlspecialchars($mineral['image']) ?>" alt="<?= htmlspecialchars($mineral['name']) ?>">
                    <h2><?= htmlspecialchars($mineral['name']) ?></h2>
                    <p><strong>Origin:</strong> <?= htmlspecialchars($mineral['origin']) ?></p>
                    <p><strong>Type:</strong> <?= htmlspecialchars($mineral['type']) ?></p>
                    <p><?= htmlspecialchars($mineral['description']) ?></p>
                    <p><strong>Price:</strong> $<?= number_format($mineral['price'], 2) ?></p>
                    <p><strong>Stock:</strong> <?= $mineral['stock'] ?></p>
                    <div class="quantity">
                        <button type="button" class="minus" aria-label="Decrease">-</button>
                        <input type="number" class="input-box" name="quantities[<?= $mineral['id'] ?>]" value="0" min="0" max="<?= $mineral['stock'] ?>">
                        <button type="button" class="plus" aria-label="Increase">+</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <button class="add-cart">Add to Cart</button>
</div>
<?php echo getFooter(); ?>
</body>
</html>