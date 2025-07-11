<?php 
require_once BASE_PATH . '/bootstrap.php';

require_once LAYOUT_PATH . '/main.layout.php';
require_once COMPONENT_PATH . '/componentGroup/navbar.component.php';
require_once COMPONENT_PATH . '/componentGroup/footer.component.php';
require_once HANDLERS_PATH . '/data.handler.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Greek Tools</title>
    <link rel="stylesheet" href="/page/tools/assets/css/tools.css">
    <script src="/page/tools/assets/js/script.js" defer></script>
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
                

                <div class="search-container">
                    <input id="searchInput" class="search" type="text" placeholder="Search…">
                    <button onclick="searchProducts()" class="search-btn">Search</button>
                    </div>
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
                        <?php if (isset($product['image'])): ?>
                            <img src="../../page/tools/assets/img/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" style="width:100%">
                            <?php else: ?>
                <div style="width:100%; height:150px; background:#eee; display:flex; align-items:center; justify-content:center;">No Image</div>
            <?php endif; ?>

                            <h3><?= $product['name'] ?></h3>
                            <p>Type: <?= $product['type'] ?></p>
                            <p>Price: <?= $product['price'] ?></p>
                            <div class="quantity">
                            <button class="minus" aria-label="Decrease">-</button>
                            <input type="number" class="input-box" value="0" min="0" max="999">
                            <button class="plus" aria-label="Increase">+</button>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
                <button class="add-cart">Add to Cart</button>
            </div>
        </main>

    </div>

    <?php echo getFooter(); ?>

</body>

</html>