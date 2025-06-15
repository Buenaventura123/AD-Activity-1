<?php require_once __DIR__ . '/../../bootstrap.php'; ?>
<?php include_once ROOT_PATH . '/layout/main.layout.php'; ?>
<?php include ROOT_PATH . '/handlers/data.handler.php'; ?>
<?php include_once ROOT_PATH . '/components/componentGroup/navbar.component.php'; ?>
<?php include_once ROOT_PATH . '/components/componentGroup/footer.component.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Greek Tools</title>
    <link rel="stylesheet" href="../../page/tools/assets/css/tools.css">
    <script src="../../page/tools/assets/js/script.js" defer></script>
</head>

<body>
    <nav>
        <?php echo getNavbar('Tools'); ?>
    </nav>

    <div class="container">
        <main>
            <div class="image" style="position: relative; display: inline-block;">
                <img src="assets/img/Anvil.png" alt="Greek Tools" style="width:100%;">
                <span class="innertext">
                    Greek Tools
                    <br>
                    Discover the finest selection of traditional Greek tools, crafted for durability and performance.
                </span>
            </div>
            <div class="main-box">
                <nav>
                    <button onclick="filterType('all')">All</button>
                    <button onclick="filterType('pickaxes')">Pickaxes</button>
                    <button onclick="filterType('shovels')">Shovels</button>
                    <button onclick="filterType('drills')">Drills</button>
                    <button onclick="filterType('helmets')">Helmet</button>
                    <button onclick="filterType('tnt')">TNT</button>
                </nav>
                <div class="product-list">
                    <?php foreach ($products as $product): ?>
                        <div class="product" data-type="<?= $product['type'] ?>">
                            <img src="assets/img/default.png" alt="<?= $product['name'] ?>" style="width:100%">
                            <h3><?= $product['name'] ?></h3>
                            <p>Type: <?= $product['type'] ?></p>
                            <p>Price: <?= $product['price'] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>

    </div>

    <?php echo getFooter(); ?>

</body>

</html>