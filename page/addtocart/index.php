<?php
session_start();

require_once BASE_PATH . '/bootstrap.php';

require_once LAYOUT_PATH . '/main.layout.php';
require_once COMPONENT_PATH . '/componentGroup/navbar.component.php';
require_once COMPONENT_PATH . '/componentGroup/footer.component.php';
require_once HANDLERS_PATH . '/data.handler.php';


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantities'])) {
    foreach ($_POST['quantities'] as $productId => $quantity) {
        $quantity = (int)$quantity; // Ensure quantity is an integer

        if ($quantity > 0) {
            // Add or update the product in the cart session
            $_SESSION['cart'][$productId] = $quantity;
        } else {
            // If quantity is 0 or less, remove the item from the cart
            unset($_SESSION['cart'][$productId]);
        }
    }
   
}

//Prepare data for displaying cart items
$cartItems = [];
$totalCartPrice = 0;

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $productId => $quantity) {
        $product = getProductById($productId); // Fetch full product details

        if ($product) {
            $itemSubtotal = $product['price'] * $quantity;
            $totalCartPrice += $itemSubtotal;

            $cartItems[] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'type' => $product['type'],
                'image' => $product['image'],
                'unit_price' => $product['price'], // Store unit price
                'quantity' => $quantity,
                'subtotal' => $itemSubtotal // Store subtotal for the item
            ];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add to Cart</title>
    <link rel="stylesheet" href="/page/addtocart/asset/css/style.css">
</head>

<body>
    <nav>
        <?php echo getNavbar('Add to Cart'); ?>
    </nav>

    <div class="main-box">
        <h1>Your Shopping Cart</h1>

        <?php if (empty($cartItems)): ?>
            <p>Your cart is empty. Go to the <a href="/page/tools/index.php">Tools page</a> to add items!</p>
        <?php else: ?>
            <div class="cart-items-list">
                <?php foreach ($cartItems as $item): ?>
                    <div class="cart-item">
                        <img src="../../page/tools/assets/img/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="cart-item-image">
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

    <?php echo getFooter(); ?>

</body>
</html>