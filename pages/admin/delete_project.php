<?php
require_once __DIR__ . '/../../config/database.php';
$slug = trim($_GET['project'] ?? '');
if ($slug !== '') {
    // Read the image filenames before the project is deleted.
    $projectStmt = $pdo->prepare("SELECT id FROM projects WHERE slug = ?");
    $projectStmt->execute([$slug]);
    $projectId = $projectStmt->fetch(PDO::FETCH_COLUMN);

    $images = [];
    if ($projectId !== false) {
        $imageStmt = $pdo->prepare("SELECT image FROM project_images WHERE project_id = ?");
        $imageStmt->execute([$projectId]);
        $images = $imageStmt->fetchAll(PDO::FETCH_COLUMN);
    }

    $stmt = $pdo->prepare("DELETE FROM projects WHERE slug = ?");
    $stmt->execute([$slug]);

    foreach ($images as $image) {
        $imagePath = __DIR__ . '/../../uploads/images/' . basename($image);
        if (is_file($imagePath)) {
            unlink($imagePath);
        }
    }

    header('Location: /pages/admin/index.php');
    exit;
}
