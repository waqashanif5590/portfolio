<?php

declare(strict_types=1);

session_start();

require_once __DIR__ . '/../../config/database.php';

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: /pages/admin/index.php');
    exit;
}

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email !== '' && $password !== '') {
        $stmt = $pdo->prepare('SELECT * FROM `admins` WHERE email = ?');
        $stmt->execute([$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_email'] = $result['email'];
            header('Location: /pages/admin/index.php');
            exit;
        }

        $error_message = $result
            ? 'Invalid password.'
            : 'No admin found with that username or email.';
    } else {
        $error_message = 'Please enter both email and password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?= htmlspecialchars($baseUrl ?? '', ENT_QUOTES, 'UTF-8') ?>/assets/css/admin-login.css">
</head>

<body>

    <main class="login-shell">
        <section class="login-intro" aria-label="Portfolio administration">

            <div class="intro-copy">
                <p class="eyebrow">Private workspace</p>
                <h1>Welcome back to your creative desk.</h1>
                <p>Manage your portfolio content from one calm, focused space.</p>
            </div>

            <p class="intro-footer">WaqasHanif Portfolio · Administration</p>
        </section>

        <section class="login-panel" aria-labelledby="login-heading">
            <div class="login-card">
                <h2 id="login-heading">Admin Login</h2>
                <p>Enter your details to continue to the dashboard.</p>
                <div id="alert-message">
                    <p class="alert-text"><?= htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <form class="login-form" action="/pages/admin/login.php" method="post">
                    <div class="field-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" autocomplete="email" placeholder="Enter your Email" required>
                    </div>

                    <div class="field-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" autocomplete="current-password" placeholder="Enter your password" required>
                    </div>

                    <button class="login-submit" type="submit">Login to dashboard</button>
                </form>
            </div>
        </section>
    </main>
    <script>
        const alertMessage = document.getElementById('alert-message');
        setTimeout(() => {
            alertMessage.style.display = 'none'
        }, 3000);
    </script>
</body>

</html>
