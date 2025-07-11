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
    <link rel="stylesheet" href="/page/addtocart/assets/css/style.css">
    <!-- <script src="/page/tools/assets/js/script.js" defer></script> no script yet-->
</head>

<body>
    <nav>
        <?php echo getNavbar('Tools'); ?>
    </nav>