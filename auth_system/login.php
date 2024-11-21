<?php
include('db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        setcookie('background_color', $user['background_color'], time() + 3600, '/');
        setcookie('font_color', $user['font_color'], time() + 3600, '/');
        header('Location: dashboard.php');
    } else {
        echo "Неверный логин или пароль.";
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Имя пользователя" required><br>
    <input type="password" name="password" placeholder="Пароль" required><br>
    <input type="submit" value="Войти">
</form>
