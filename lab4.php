<?php
// Инициализация сессии
session_start();

// --- Задание №1: Сессии (счётчик) ---
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}
$_SESSION['counter']++;

// --- Задание №2: Cookies (дата визита) ---
$lastVisit = isset($_COOKIE['visit_time']) ? $_COOKIE['visit_time'] : "первый раз";
setcookie('visit_time', date('H:i:s d.m.y'), time() + 3600 * 24, "/");

// --- Задание №3: Авторизация ---
$error = '';

// Логика входа
if (isset($_POST['login_btn'])) {
    $login = $_POST['user_login'];
    $pass = $_POST['user_pass'];

    // Проверка пароля
    if ($login == 'admin' && $pass == '12345') {
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $login;
    } else {
        $error = "Неверный пароль!";
    }
}

// Логика выхода
if (isset($_GET['exit'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа №4</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; background: #f4f4f4; }
        .block { background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { color: #333; border-bottom: 1px solid #ddd; }
        input { padding: 8px; margin: 5px 0; width: 200px; display: block; }
        button { padding: 10px 15px; background: #28a745; color: white; border: none; cursor: pointer; }
        .admin-area { background: #e2f3ff; border: 1px solid #b6d4fe; padding: 15px; }
    </style>
</head>
<body>

    <h1>Лабораторная работа - Стецкевич К.А.</h1>

    <div class="block">
        <h2>Задания №1 и №2 (Сессии и Cookies)</h2>
        <p>Вы посетили страницу: <b><?php echo $_SESSION['counter']; ?></b> раз.</p>
        <p>Последний раз вы были здесь в: <b style="color: blue;"><?php echo $lastVisit; ?></b></p>
        <a href="?update=1">Обновить страницу</a>
   
    </div>

    <div class="block">
        <h2>Задание №3 (Авторизация доступа)</h2>

        <?php if (!isset($_SESSION['auth'])): ?>
            <form method="POST">
                <?php if ($error) echo "<p style='color:red'>$error</p>"; ?>
                <input type="text" name="user_login" placeholder="Логин (admin)" required>
                <input type="password" name="user_pass" placeholder="Пароль (12345)" required>
                <button type="submit" name="login_btn">Войти в админку</button>
            </form>
        <?php else: ?>
            <div class="admin-area">
                <h3>Вы вошли как Администратор!</h3>
                <p>Добро пожаловать в защищенный блок сайта.</p>
                <p>Ваш логин в сессии: <?php echo $_SESSION['login']; ?></p>
                <a href="?exit=1" style="color: red;">Выйти из системы</a>
                          <p><a href="lab4.1.php"> Перейти на другую страницу (показать счётчик)</a></p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>