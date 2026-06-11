<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

$result='';

if($_SERVER['REQUEST_METHOD']=='POST')
{

$fio=$_POST['fio'];

$email=$_POST['email'];

$category=$_POST['category'];

$mail=new PHPMailer();

$mail->isSMTP();

$mail->Host='127.0.0.1';

$mail->Port=1025;

$mail->SMTPAuth=false;

$mail->CharSet='UTF-8';

$mail->setFrom(
'system@test.local',
'TechStore'
);

$xml=simplexml_load_file('emails.xml');

foreach($xml->user as $user)
{
    $mail->addAddress( (string)$user->email
    );
}

$mail->addAttachment(
'price.pdf',
'PriceList.pdf'
);

$mail->isHTML(true);

$mail->Subject='Прайс-лист TechStore';

$mail->Body="

<h2>Запрос прайс-листа</h2>

<p><b>ФИО:</b> $fio</p>

<p><b>Email:</b> $email</p>

<p><b>Категория:</b> $category</p>

<p>Прайс-лист прикреплен к письму.</p>

";

if($mail->send())
{
    $result='Письмо отправлено!';
}
else
{
    $result=$mail->ErrorInfo;
}

}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Прайс-лист</title>
</head>
<body>

<h2>Получить прайс-лист</h2>

<form method="post">

<input
type="text"
name="fio"
placeholder="ФИО"
required>

<br><br>

<input
type="email"
name="email"
placeholder="Email"
required>

<br><br>

<select name="category">

<option>
Игровые ПК
</option>

<option>
Ноутбуки
</option>

<option>
Комплектующие
</option>

<option>
Периферия
</option>

</select>

<br><br>

<button>

Получить прайс-лист

</button>

</form>

<p><?= $result ?></p>

<a href="6.php">Назад</a>

</body>
</html>