<?php
echo "<br>1 задание GET-запрос <br>";
$name = "не определено";
$age = "не определен";
if(isset($_GET["name"])){ 
  
    $name = $_GET["name"];//получение данных из строки  и присваивание
}
if(isset($_GET["age"])){
  
    $age = $_GET["age"];
}
echo "<br>Имя: $name <br> Возраст: $age";
echo "<br><br><h2>2 задание форма авторизации post-запрос</h2>"
?>
<form method="POST"><!--форма авторизации-->
    <p>Имя: <input type="text" name="name" /></p>
    <p>пароль <input type="text" name="password" /></p>
    <input type="submit" name="button" value="Отправить">
    <?php
      if(isset($_POST["button"])){
        $name = "не определено";
        $password = "не определен";
        if(isset($_POST["name"])){
        
            $name = $_POST["name"];
        }
        if(isset($_POST["password"])){
        
            $password = $_POST["password"];
        }
        if($name == 'kirill' && $password == "12345"){//Сверка имени и пароля, полученных из POST отправки с формы
            echo "<br>успешно";
        }else{
            echo "<br>неверный пароль или имя";
        }
      }
    ?>
<br><br>
<h2>3 задание форма регистрации POST</h2>
    <!--задание 3 регистарция POST -->
<form method="POST"><!-- форма регистрации-->
    <p>Имя: <input type="text" name="reg_name"></p>
    <p>Email: <input type="email" name="reg_email"></p>
    <p>Пароль: <input type="password" name="reg_pass"></p>
    <input type="submit" name="reg_submit" value="Зарегистрироваться">
    </form>
<?php

if(isset($_POST["reg_submit"])){//если кнопка нажата, выполняются действия:
    $reg_name = $_POST["reg_name"];
    $reg_email = $_POST["reg_email"];
    $reg_pass = $_POST["reg_pass"];
    echo "<br>Регистрация: $reg_name, $reg_email, пароль $reg_pass<br>";
}
?>
<br><br>
<h2>4 задание Форма заказа пиццы (работа с различными элементами)</h2>
<form action="pizza.php" method="POST">
    Размер:
    <select name="size">
        <option>Маленькая</option>
        <option>Средняя</option>
        <option>Большая</option>
    </select><br>
    Добавки:<br>
    <input type="checkbox" name="cheese"> Сыр<br>
    <input type="checkbox" name="pepperoni"> Пепперони<br>
    Количество: <input type="number" name="quantity" value="1" min="1"><br>
    <input type="submit" name="pizza_submit" value="Заказать">
</form>
<br><br>
<h2>5 задание фильтрация товаров через GET</h2>
<form method="GET">
    <p><select name="cat">
        <option value="все">Все</option>
        <option value="электроника">Электроника</option>
        <option value="одежда">Одежда</option>
    </select></p>
    <p>Цена от: <input type="number" name="min" value="0"></p>
    <input type="submit" value="Фильтровать">
    </form>
<?php
if (isset($_GET["cat"])) { // получение параметров
    $category = $_GET["cat"];
} else {
    $category = "все";
}

if (isset($_GET["min"])) {
    $min_price = $_GET["min"];
} else {
    $min_price = 0;
}
$goods = [ //массив с товарами
    ["name" => "Ноутбук", "cat" => "электроника", "price" => 500],
    ["name" => "Футболка", "cat" => "одежда", "price" => 20],
    ["name" => "Наушники", "cat" => "электроника", "price" => 80],
    ["name" => "Джинсы", "cat" => "одежда", "price" => 40],
    ];
    foreach($goods as $item){
    if(($category == "все" || $item["cat"] == $category) && $item["price"] >= $min_price){
        echo "- {$item['name']} ({$item['cat']}) - {$item['price']}$<br>";
    }
}
?>