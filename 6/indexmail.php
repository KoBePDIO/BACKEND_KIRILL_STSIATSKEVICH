<?php

ini_set('SMTP','127.0.0.1');
ini_set('smtp_port','1025');

$messageStatus='';

if($_SERVER['REQUEST_METHOD']=='POST')
{

$name=$_POST['name'];

$email=$_POST['email'];

$text=$_POST['message'];

$to='admin@test.local';

$subject='Сообщение от клиента';

$message="
Имя: $name

Email: $email

Сообщение:

$text
";

$headers="From: system@test.local";

if(mail($to,$subject,$message,$headers))
{
    $messageStatus='Сообщение отправлено!';
}
else
{
    $messageStatus='Ошибка отправки';
}

}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Обратная связь</title>
</head>
<body>

<h2>Обратная связь</h2>

<form method="post">

<input type="text"
name="name"
placeholder="Имя"
required>

<br><br>

<input type="email"
name="email"
placeholder="Email"
required>

<br><br>

<textarea
name="message"
placeholder="Сообщение"
required></textarea>

<br><br>

<button>
Отправить
</button>

</form>

<p><?= $messageStatus ?></p>

<a href="6.php">Назад</a>

</body>
</html>