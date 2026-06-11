<?php
// Начинаем сессию, чтобы получить доступ к переменной counter
session_start();

// Если счётчик ещё не создан (пользователь зашёл напрямую на page2.php),
// показываем значение 0 (но обычно сначала посещают index.php)
$counterValue = isset($_SESSION['counter']) ? $_SESSION['counter'] : 0;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Другая страница – счётчик посещений</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; background: #f4f4f4; }
        .block { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center; }
        h2 { color: #333; }
        .counter { font-size: 3em; font-weight: bold; color: #28a745; margin: 20px 0; }
        a { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; }
        a:hover { background: #0056b3; }
    </style>
</head>
<body>

<div class="block">
    <h2> Значение счётчика из сессии</h2>
    <p>При переходе с главной страницы сюда отображается текущее значение счётчика:</p>
    <div class="counter"><?php echo $counterValue; ?></div>
    <p><i>Счётчик увеличивается только на главной странице (index.php) при каждом её обновлении.</i></p>
    <a href="index.php"> Вернуться на главную страницу</a>
</div>

</body>
</html>