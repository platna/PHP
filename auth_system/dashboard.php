<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$background_color = isset($_COOKIE['background_color']) ? $_COOKIE['background_color'] : '#ffffff';
$font_color = isset($_COOKIE['font_color']) ? $_COOKIE['font_color'] : '#000000';
?>

<body style="background-color: <?= $background_color ?>; color: <?= $font_color ?>;">
    <h1>Добро пожаловать, <?= $_SESSION['username'] ?>!</h1>
    <a href="logout.php">Выйти</a>
</body>
