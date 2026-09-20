<!-- This is layout to be reused for all pages -->
<?php
$title = $title ?? 'My Portfolio';
$content = $content ?? '';
$baseUrl = $baseUrl ?? '';
$styles = $styles ?? ['portfolio.css', 'portfolioMobile.css'];
?>

<?php
include __DIR__ . '/../config/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/style.css">
    <?php foreach ($styles as $style): ?>
        <link rel="stylesheet" <?= preg_match('/mobile\.css$/i', $style) ? ' media="screen and (max-width: 1008px)"' : '' ?> href="<?= $baseUrl ?>/assets/css/<?= htmlspecialchars($style) ?>">
    <?php endforeach; ?>
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/professional.css">
    <script src="https://kit.fontawesome.com/1359e2cfd9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Port+Lligat+Sans&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>

<body>
    <?php require __DIR__ . '/../components/_header.php'; ?>

    <a href="#" class="theme_changer dark-theme"><i class="fa-solid fa-moon"></i></a>

    <main>
        <?= $content ?>
    </main>

    <?php require __DIR__ . '/../components/_footer.php'; ?>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="<?= $baseUrl ?>/assets/js/portfolio.js"></script>
    <script src="<?= $baseUrl ?>/assets/js/toggleNavbarStyle.js"></script>
    <script src="<?= $baseUrl ?>/assets/js/toggletheme.js"></script>
</body>


</html>