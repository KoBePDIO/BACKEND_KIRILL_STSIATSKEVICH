<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">← Вернуться к заказу</a>
    <?php
   
if(isset($_POST["pizza_submit"])){
    $cost = 0;
    $size = $_POST["size"];
    $cheese = isset($_POST["cheese"]) ? "да" : "нет";
    $pepperoni = isset($_POST["pepperoni"]) ? "да" : "нет";
    $quantity = $_POST["quantity"];
    echo "<br>Заказ: размер $size, сыр $cheese, пепперони $pepperoni, кол-во $quantity шт.<br>";
    switch($size){
    case "Маленькая":
        $cost += 5;
        break;
    case "Средняя":
        $cost += 7;
        break;
    case "Большая":
        $cost +=10;
        break;
    }
    if($cheese == "да"){
        $cost +=1;
    }
    if($pepperoni == "да"){
        $cost +=1;
    }
    $cost = $cost * $quantity;
    echo "стоимость пиццы: $cost рубля";
}

?>
</body>
</html>
