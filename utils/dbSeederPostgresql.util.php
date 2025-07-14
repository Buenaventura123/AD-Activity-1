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
  INSERT INTO products (name, description, price, category, stock, image)
  VALUES (:name, :desc, :price, :cat, :stock, :image)
");
foreach ($products as $p) {
  $stmt->execute([
    ':name' => $p['name'],
    ':desc' => $p['description'],
    ':price' => $p['price'],
    ':cat' => $p['category'],
    ':stock' => $p['stock'],
    ':image' => $p['image']
  ]);
}


echo "🎉 Seeding complete!\n";
