<html>
<head>
<title>Гостевая книга</title>
</head>
<body>
<a href="1.php">1</a><br>
<a href="2.php">2</a><br>
<a href="3.php">3</a><br>
<a href="3.2.php">3.2</a><br>
<a href="4.1.php">4.1</a><br>
<a href="4.2.php">4.2</a><br>

<?php
if ($_POST["name"] && $_POST["msg"]) {
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
        list($name, $msg, $date) = explode("|", trim($line));
        echo "<b>$name</b> ($date)<br>$msg<hr>";
    }
} else {
    echo "Нет записей.";
}
?>
</body>
</html>