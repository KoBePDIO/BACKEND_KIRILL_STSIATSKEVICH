<html>
<head>
<title>Гостевая книга</title>
</head>
<body>
<a href = "">1 пример</a>
<a href = "">1 пример</a>
<a href = "">1 пример</a>
<a href = "">1 пример</a>
<a href = "">1 пример</a>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["msg"])) {
    $f = fopen("guestbook.txt", "a");
    fwrite($f, $_POST["name"] . "|" . $_POST["msg"] . "|" . date("Y-m-d H:i:s") . "\n");
    fclose($f);
}
?>
<h2>Добавить запись</h2>
<form method="post">
Имя: <input type="text" name="name"><br>
Текст: <textarea name="msg"></textarea><br>
<input type="submit">
</form>
<h2>Все записи</h2>
<?php
if (file_exists("guestbook.txt")) {
    $lines = file("guestbook.txt");
    foreach ($lines as $line) {
        $parts = explode("|", trim($line));
        if (count($parts) == 3) {
            list($name, $msg, $date) = $parts;
            echo "<b>$name</b> ($date)<br>$msg<hr>";
        }
    }
} else {
    echo "Нет записей.";
}
?>
</body>
</html>