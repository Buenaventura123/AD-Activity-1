<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';

$typeConfig = require_once UTILS_PATH . '/envSetter.util.php';
$pgConfig = $typeConfig['postgres'];

// Connect to PostgreSQL
$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
$pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['password'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "✅ Connected to PostgreSQL\n";


$tablesToDrop = ['cart', 'admins', 'products', 'customers'];

foreach ($tablesToDrop as $table) {
    try {
        $pdo->exec("DROP TABLE IF EXISTS public.\"{$table}\" CASCADE;");
        echo "✅ Dropped table: {$table}\n";
    } catch (PDOException $e) {
        echo "❌ Failed to drop table {$table}: " . $e->getMessage() . "\n";
    }
}

$sqlFiles = [
    'database/customer.model.sql',
    'database/product.model.sql',
    'database/cart.model.sql',
    'database/admin.model.sql'
];

foreach ($sqlFiles as $file) {
    echo "📦 Applying schema from {$file}…\n";

    if (!file_exists($file)) {
        echo "❌ File not found: {$file}\n";
        continue;
    }

    $sql = file_get_contents($file);

    if (empty(trim($sql))) {
        echo "⚠️  Skipping empty file: {$file}\n";
        continue;
    }

    echo "\n💥 DEBUG: Content of {$file}:\n\n$sql\n\n";

    try {
        $pdo->exec($sql);
        echo "✅ Successfully applied schema from {$file}\n";
    } catch (PDOException $e) {
        echo "❌ Failed to apply schema from {$file}: " . $e->getMessage() . "\n";
    }
}


echo "🚮 Truncating tables…\n";
$tablesToTruncate = ['admins', 'cart', 'customers', 'products'];

foreach ($tablesToTruncate as $table) {
    try {
        $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
        echo "🧹 Truncated: {$table}\n";
    } catch (PDOException $e) {
        echo "❌ Failed to truncate {$table}: " . $e->getMessage() . "\n";
    }
}

echo "🎉 Reset complete.\n";
