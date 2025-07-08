<?php require_once __DIR__ . '../../bootstrap.php'; ?>
<?php include_once ROOT_PATH . './layout/main.layout.php;'?>
<?php include_once ROOT_PATH . '/handlers/data.mineral.handler.php';?>
<?php include_once ROOT_PATH . '/components/componentGroup/navbar.component.php'; ?>
<?php include_once ROOT_PATH . '/components/componentGroup/navbar.component.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minerals Page</title>
    <link rel="stylesheet" href="../../page/minerals/assets/css/mineral.css">
    <script src = "../../page/minerals/assets/js/script.js" defer></script>
</head>
<body>
    <?php echo getNavbar ('Minerals'); ?>

    <div class="filter-bar">
        <label for="typeFilter">Filter by type</label>
        <select id= "typeFilter">
            <option value="all">All</option>
            <?php 
            $types = array_unique(array_column($minerals, 'type'));
            foreach ($types as $type):
            ?>
            <option value="<?php echo strtolower($type);?>"><?php echo $type; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="container" id="mineralsContainer">
    <?php foreach ($minerals as $mineral): ?>
        <div class="card" data-type="<?php echo strtolower($mineral['type']); ?>">
            <img src="assets/img/<?php echo $mineral['image']; ?>" alt="<?php echo $mineral['name']; ?>">
            <h2><?php echo $mineral['name']; ?></h2>
            <p><strong>Origin:</strong> <?php echo $mineral['origin']; ?></p>
            <p><?php echo $mineral['description']; ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php echo getFooter(); ?>

</body>
</html>