<?php 
require_once BASE_PATH . '/bootstrap.php';
require_once UTILS_PATH . '/dbConnection.util.php';
require_once UTILS_PATH . '/dbRepository.util.php';

$db = getDatabaseConnection();
$productRepo = new ProductRepository($db);
$mineralRepo = new MineralRepository($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newStock = (int) $_POST['stock'];

    if (!empty($_POST['product_id'])) {
        $productId = $_POST['product_id'];
        $productRepo->updateStock($productId, $newStock);
    }

    if (!empty($_POST['mineral_id'])) {
        $mineralId = $_POST['mineral_id'];
        $mineralRepo->updateStock($mineralId, $newStock);
    }

    header('Location: /page/addstock/index.php');
    exit;
}



$products = $productRepo->getAllProducts();
$minerals = $mineralRepo->getAllMinerals();
?>

<?php
    require_once LAYOUT_PATH . '/main.layout.php';
    require_once COMPONENT_PATH . '/componentGroup/navbar.component.php';
    require_once COMPONENT_PATH . '/componentGroup/footer.component.php';
?>

<link rel="stylesheet" href="/page/addstock/asset/css/style.css">

<nav>
    <?php echo getNavbar('Add Stock'); ?>
</nav>

<main class="container">
    <h2>Update Stocks</h2>
    <form method="POST" class="stock-form">
    <h3>Product Stock</h3>
    <select name="product_id" required>
        <option disabled selected>Select a Product</option>
        <?php foreach ($products as $product): ?>
            <option value="<?= $product['id'] ?>">
                <?= htmlspecialchars($product['name']) ?> (Current: <?= $product['stock'] ?>)
            </option>
        <?php endforeach; ?>
    </select>

    <h3>Mineral Stock</h3>
    <select name="mineral_id" required>
        <option disabled selected>Select a Mineral</option>
        <?php foreach ($minerals as $mineral): ?>
            <option value="<?= $mineral['id'] ?>">
                <?= htmlspecialchars($mineral['name']) ?> (Current: <?= $mineral['stock'] ?>)
            </option>
        <?php endforeach; ?>
    </select>

    <label for="stock">New Stock to Add:</label>
    <input type="number" name="stock" min="0" required>

    <button type="submit">Update Stock</button>
</form>

</main>


<?php echo getFooter(); ?>
</body>

</html>