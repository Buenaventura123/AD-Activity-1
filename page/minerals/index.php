<?php 
require_once BASE_PATH . '/bootstrap.php';
require_once LAYOUT_PATH . '/main.layout.php';
require_once COMPONENT_PATH . '/componentGroup/navbar.component.php';
require_once COMPONENT_PATH . '/componentGroup/footer.component.php';
require_once HANDLERS_PATH . '/data.mineral.handler.php';
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
                    <div class="mineral-card" data-type="<?php echo strtolower($mineral['type']); ?>">
                        <img src="assets/img/<?php echo $mineral['image']; ?>" alt="<?php echo $mineral['name']; ?>">
                        <h2><?php echo $mineral['name']; ?></h2>
                        <p><strong>Origin:</strong> <?php echo $mineral['origin']; ?></p>
                        <p><strong>Type:</strong> <?php echo $mineral['type']; ?></p>
                        <p><?php echo $mineral['description']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php echo getFooter(); ?>
</body>
</html>