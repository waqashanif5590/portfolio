<?php

declare(strict_types=1);

require_once __DIR__ . '/../../config/database.php';
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: /pages/admin/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /pages/admin/index.php');
    exit;
}

$slug = trim($_POST['project'] ?? '');
if ($slug === '' || !preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/i', $slug)) {
    header('Location: /pages/admin/index.php');
    exit;
}

$projectStmt = $pdo->prepare('SELECT id FROM projects WHERE slug = ?');
$projectStmt->execute([$slug]);
$projectId = $projectStmt->fetch(PDO::FETCH_COLUMN);

$images = [];
if ($projectId !== false) {
    $imageStmt = $pdo->prepare('SELECT image FROM project_images WHERE project_id = ?');
    $imageStmt->execute([$projectId]);
    $images = $imageStmt->fetchAll(PDO::FETCH_COLUMN);
}

$stmt = $pdo->prepare('DELETE FROM projects WHERE slug = ?');
$stmt->execute([$slug]);

foreach ($images as $image) {
    $imagePath = __DIR__ . '/../../uploads/images/' . basename((string) $image);
    if (is_file($imagePath)) {
        unlink($imagePath);
    }
}

header('Location: /pages/admin/index.php');
exit;
