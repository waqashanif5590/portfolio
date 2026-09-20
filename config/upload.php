<?php

declare(strict_types=1);

/**
 * Store a validated project image upload. Returns stored filename or null on failure.
 *
 * @param array{name?: string, type?: string, tmp_name?: string, error?: int, size?: int} $file
 */
function secure_store_project_image(array $file): ?string
{
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        return null;
    }

    $tmpName = $file['tmp_name'] ?? '';
    if ($tmpName === '' || !is_uploaded_file($tmpName)) {
        return null;
    }

    $allowedMime = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp',
    ];

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($tmpName);
    if (!is_string($mime) || !isset($allowedMime[$mime])) {
        return null;
    }

    $extension = $allowedMime[$mime];
    $filename = bin2hex(random_bytes(16)) . '.' . $extension;
    $directory = dirname(__DIR__) . '/uploads/images';

    if (!is_dir($directory) && !mkdir($directory, 0755, true) && !is_dir($directory)) {
        return null;
    }

    $destination = $directory . '/' . $filename;
    if (!move_uploaded_file($tmpName, $destination)) {
        return null;
    }

    return $filename;
}
