<html>
<head>
<title>Лабораторная работа</title>
</head>
<body>
<h1>PHP Лабораторная работа</h1>




<h1>Задание 2.3. Приветствие</h1>
<?php
echo "<h2>Привет всем!!!</h2>";
echo "<p>Разработчик:Стецкевич Кирилл</p>";
echo "<p>Группа: ПЗТ-43</p>";
?>

<h1>Задание 2.4. Примеры из уроков 1-5</h1>

<h2>1. echo и print</h2>
<?php
echo "Это echo<br>";
print "Это print<br>";
echo "Можно", " выводить", " несколько", " строк<br>";
?>

<h2>2. Переменные разных типов</h2>
<?php
$str = "Строка";
$int = 123;
$float = 12.34;
$bool = true;
$arr = [1, 2, 3];
$null = null;

echo "Строка: $str<br>";
echo "Целое: $int<br>";
echo "Дробное: $float<br>";
echo "Логическое: " . ($bool ? "true" : "false") . "<br>";
echo "Массив: "; print_r($arr); echo "<br>";
echo "NULL: пусто<br>";
?>

<h2>3. Предопределенные переменные (\$_SERVER)</h2>
<?php
echo "IP: " . $_SERVER['REMOTE_ADDR'] . "<br>";
echo "Метод запроса: " . $_SERVER['REQUEST_METHOD'] . "<br>";
echo "Скрипт: " . $_SERVER['PHP_SELF'] . "<br>";
?>

<h2>4. Константы</h2>
<?php
define("SITE_NAME", "Мой сайт");
define("YEAR", 2026);
CONST HNEW = 12;
echo HNEW . "<br>";
echo "SITE_NAME: " . SITE_NAME . "<br>";
echo "YEAR: " . YEAR . "<br>";
?>

<h2>5. Предопределенные константы</h2>
<?php
echo "PHP_VERSION: " . PHP_VERSION . "<br>";
echo "PHP_OS: " . PHP_OS . "<br>";
echo "__FILE__: " . __FILE__ . "<br>";
echo "__LINE__: " . __LINE__ . "<br>";
?>
<h1>Задание 1. Проверка установки</h1>
<?php
echo "<p>PHP версия: " . phpversion() . "</p>";
echo "<p>Сервер работает</p>";
?>
<h1>Задание 2.2. phpinfo()</h1>
<?php phpinfo(); ?>
</body>
</html>