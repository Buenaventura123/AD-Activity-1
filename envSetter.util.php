<?php
use Dotenv\Dotenv;

if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '/../');
}

require_once BASE_PATH . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

return [
    'mongo' => [
        'uri' => $_ENV['MONGO_URI'],
        'db'  => $_ENV['MONGO_DB'],
    ],
    'postgres' => [
        'host'     => $_ENV['POSTGRES_HOST'] ?? 'localhost',
        'port'     => $_ENV['POSTGRES_PORT'] ?? '5432',
        'db'       => $_ENV['POSTGRES_DB'] ?? 'mydatabase',
        'user'     => $_ENV['POSTGRES_USER'] ?? 'myuser',
        'password' => $_ENV['POSTGRES_PASSWORD'] ?? 'mypassword',
    ],
];
