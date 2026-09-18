<?php
require_once __DIR__ . '/../../database/database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (name, email, subject, message) VALUES (
    '$name', '$email', '$subject', '$message')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Message sent failed') . mysqli_error($conn);
    } else {
        header('Location: /portfolio/pages/php/contact.php');
    }
}
