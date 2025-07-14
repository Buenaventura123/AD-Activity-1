<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';

$typeConfig = require_once UTILS_PATH . '/envSetter.util.php';
$pgConfig = $typeConfig['postgres'];

$pdo = new PDO(
  "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}",
  $pgConfig['user'],
  $pgConfig['password'],
  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

echo "✅ Connected to PostgreSQL for seeding\n";

// 🌱 Seeding users
$users = require_once STATICDATA_PATH . '/user.staticData.php';
echo "🌱 Seeding users…\n";
$stmt = $pdo->prepare("
  INSERT INTO users (email, password, name, role)
  VALUES (:email, :password, :name, :role)
");
foreach ($users as $u) {
  $stmt->execute([
    ':email' => $u['email'],
    ':password' => password_hash($u['password'], PASSWORD_DEFAULT),
    ':name' => $u['name'],
    ':role' => $u['role'],
  ]);
}

// 🌱 Seeding admin
$admins = require_once STATICDATA_PATH . '/admin.staticData.php';
echo "🌱 Seeding admins…\n";
$stmt = $pdo->prepare("
  INSERT INTO admins (username, password, first_name, middle_name, last_name)
  VALUES (:username, :password, :fn, :mn, :ln)
");
foreach ($admins as $a) {
  $stmt->execute([
    ':username' => $a['username'],
    ':password' => password_hash($a['password'], PASSWORD_DEFAULT),
    ':fn' => $a['first_name'],
    ':mn' => $a['middle_name'],
    ':ln' => $a['last_name'],
  ]);
}

// 🌱 Seeding customer
$customers = require_once STATICDATA_PATH . '/customer.staticData.php';
echo "🌱 Seeding customers…\n";
$stmt = $pdo->prepare("
  INSERT INTO customers (username, password, first_name, middle_name, last_name, contact)
  VALUES (:username, :password, :fn, :mn, :ln, :contact)
");
foreach ($customers as $c) {
  $stmt->execute([
    ':username' => $c['username'],
    ':password' => password_hash($c['password'], PASSWORD_DEFAULT),
    ':fn' => $c['first_name'],
    ':mn' => $c['middle_name'],
    ':ln' => $c['last_name'],
    ':contact' => $c['contact'],
  ]);
}

// 🌱 Seeding product
$products = require_once STATICDATA_PATH . '/product.staticData.php';
echo "🌱 Seeding products…\n";
$stmt = $pdo->prepare("
  INSERT INTO products (name, description, price, category, stock)
  VALUES (:name, :desc, :price, :cat, :stock)
");
foreach ($products as $p) {
  $stmt->execute([
    ':name' => $p['name'],
    ':desc' => $p['description'],
    ':price' => $p['price'],
    ':cat' => $p['category'],
    ':stock' => $p['stock'],
  ]);
}

// 🌱 Seeding feedback
$feedback = require_once STATICDATA_PATH . '/feedback.staticData.php';
echo "🌱 Seeding feedback…\n";

// Fetch user IDs and map them
$userStmt = $pdo->query("SELECT id FROM users");
$userIds = $userStmt->fetchAll(PDO::FETCH_COLUMN);
$userRefs = [
  'user_1' => $userIds[0] ?? null,
  'user_2' => $userIds[1] ?? null,
  'user_3' => $userIds[2] ?? null,
  'user_4' => $userIds[3] ?? null,
];

// Fetch product IDs and map them
$productStmt = $pdo->query("SELECT id FROM products");
$productIds = $productStmt->fetchAll(PDO::FETCH_COLUMN);
$productRefs = [
  'prod_1' => $productIds[0] ?? null,
  'prod_2' => $productIds[1] ?? null,
  'prod_3' => $productIds[2] ?? null,
];

$stmt = $pdo->prepare("
  INSERT INTO feedback (user_id, product_id, rating, comment, created_at)
  VALUES (:user_id, :product_id, :rating, :comment, :created_at)
");

foreach ($feedback as $f) {
  $userId = $userRefs[$f['user_ref']] ?? null;
  $productId = $productRefs[$f['product_ref']] ?? null;

  if (!$userId || !$productId) {
    echo "⚠️  Skipping feedback due to missing user or product ID\n";
    continue;
  }

  $stmt->execute([
    ':user_id' => $userId,
    ':product_id' => $productId,
    ':rating' => $f['rating'],
    ':comment' => $f['comment'],
    ':created_at' => $f['created_at'],
  ]);
}




echo "🎉 Seeding complete!\n";
