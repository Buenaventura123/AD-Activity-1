<?php
require_once __DIR__ . '/../../bootstrap.php';
require_once LAYOUT_PATH . '/main.layout.php';
require_once COMPONENT_PATH . '/componentGroup/navbar.component.php';
require_once COMPONENT_PATH . '/componentGroup/footer.component.php';
require_once UTILS_PATH . '/dbConnection.util.php';
require_once UTILS_PATH . '/dbRepository.util.php';

$db = getDatabaseConnection();
$productRepo = new ProductRepository($db);
$mineralRepo = new MineralRepository($db);

// Initialize cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle POST (add/update items in cart)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantities'])) {
    foreach ($_POST['quantities'] as $compositeKey => $quantity) {
        $parts = explode('|', $compositeKey);
        if (count($parts) !== 2) continue;

        list($productId, $type) = $parts;
        $quantity = (int)$quantity;

        if ($quantity > 0) {
            $_SESSION['cart'][$compositeKey] = [
                'quantity' => $quantity
            ];
        } else {
            unset($_SESSION['cart'][$compositeKey]);
        }
    }
}

// Prepare cart data for display
$cartItems = [];
$totalCartPrice = 0;

foreach ($_SESSION['cart'] as $compositeKey => $info) {
    $quantity = $info['quantity'];

    // Parse the composite key
    $parts = explode('|', $compositeKey);
    if (count($parts) !== 2) continue;

    list($productId, $type) = $parts;

    // Fetch item based on type
    if ($type === 'product') {
        $item = $productRepo->getById($productId);
        $imagePath = '/page/tools/assets/img/';
    } elseif ($type === 'mineral') {
        $item = $mineralRepo->getById($productId);
        $imagePath = '/page/minerals/assets/img/';
    } else {
        continue;
    }

    if ($item) {
        $subtotal = $item['price'] * $quantity;
        $totalCartPrice += $subtotal;

        $cartItems[] = [
            'id' => $item['id'],
            'name' => $item['name'],
            'type' => ucfirst($type),
            'image' => $item['image'],
            'image_path' => $imagePath,
            'unit_price' => $item['price'],
            'quantity' => $quantity,
            'subtotal' => $subtotal
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <link rel="stylesheet" href="/page/addtocart/asset/css/style.css">
</head>
<body>
    <nav>
        <?= getNavbar('Add to Cart'); ?>
    </nav>

    <div class="main-box">
        <h1>Your Shopping Cart</h1>

        <?php if (empty($cartItems)): ?>
            <p>Your cart is empty. Visit <a href="/page/tools/index.php">Tools</a> or <a href="/page/minerals/index.php">Minerals</a> to add items!</p>
        <?php else: ?>
            <div class="cart-items-list">
                <?php foreach ($cartItems as $item): ?>
                    <div class="cart-item">
                        <img src="<?= $item['image_path'] . htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="cart-item-image">
                        <div class="item-details">
                            <h3><?= htmlspecialchars($item['name']) ?></h3>
                            <p>Type: <?= htmlspecialchars($item['type']) ?></p>
                            <p>Quantity: <?= htmlspecialchars($item['quantity']) ?></p>
                            <p>Unit Price: $<?= number_format($item['unit_price'], 2) ?></p>
                            <p>Subtotal: $<?= number_format($item['subtotal'], 2) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="cart-summary">
                <h2>Total Cart Price: $<?= number_format($totalCartPrice, 2) ?></h2>
                <button class="checkout-btn">Proceed to Checkout</button>
            </div>
        <?php endif; ?>
    </div>

    <?= getFooter(); ?>
</body>
</html>
