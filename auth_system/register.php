<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $background_color = $_POST['background_color'];
    $font_color = $_POST['font_color'];

    $stmt = $pdo->prepare('INSERT INTO users (username, password, background_color, font_color) VALUES (?, ?, ?, ?)');
    $stmt->execute([$username, $password, $background_color, $font_color]);

    echo "Регистрация прошла успешно!";
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Имя пользователя" required><br>
    <input type="password" name="password" placeholder="Пароль" required><br>
    <input type="color" name="background_color" value="#ffffff"><br>
    <input type="color" name="font_color" value="#000000"><br>
    <input type="submit" value="Зарегистрироваться">
</form>
