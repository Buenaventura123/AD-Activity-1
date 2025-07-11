<?php 
require_once BASE_PATH . '/bootstrap.php';
require_once UTILS_PATH . '/dbConnection.util.php';
require_once UTILS_PATH . '/dbRepository.util.php';

$db = getDatabaseConnection();
$productRepo = new ProductRepository($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $productId = $_POST['product_id'];
    $newStock = (int) $_POST['stock'];

    $result = $productRepo->updateStock($productId, $newStock);

    header('Location: /page/addstock/index.php');
    exit;
}


$products = $productRepo->getAllProducts();
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
    <h2>Update Product Stock</h2>
    <form method="POST" class="stock-form">
        <label for="product_id">Product:</label>
        <select name="product_id" required>
            <?php foreach ($products as $product): ?>
                <option value="<?= $product['id'] ?>">
                    <?= htmlspecialchars($product['name']) ?> (Current: <?= $product['stock'] ?>)
                </option>
            <?php endforeach; ?>
        </select>

        <label for="stock">New Stock:</label>
        <input type="number" name="stock" min="0" required>

        <button type="submit">Update Stock</button>
    </form>
</main>


<?php echo getFooter(); ?>
</body>

</html>