<?php
$projectRoot = dirname(__DIR__);
require_once $projectRoot . '/vendor/autoload.php';

Dotenv\Dotenv::createImmutable($projectRoot)->safeLoad();

$dbHost = $_ENV['DB_HOST'] ?? 'localhost';
$dbName = $_ENV['DB_NAME'] ?? 'my_portfolio';
$dbUser = $_ENV['DB_USER'] ?? 'root';
$dbPassword = $_ENV['DB_PASSWORD'] ?? '';

$pdo = new PDO(
    "mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4",
    $dbUser,
    $dbPassword,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);


