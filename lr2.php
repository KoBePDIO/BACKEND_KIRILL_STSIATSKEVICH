<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>PHP — переименованная лабораторная</title>
</head>

<body>
<?php

// ---------- базовые переменные (новые имена и значения) ----------
$firstValue = 23;           // было $numA = 18
$secondValue = 9.4;         // было $numB = 7.25
$someText = "520 RUB";      // было $textA = "250 BYN"
$isActive = true;           // было $flag = false
$nothing = null;            // осталось null

$userFullName = "Петрова Анна";    // было $studentName
$userAge = 22;                     // было $studentAge = 19
$city = "Гомель";                  // было $town = "Минск"

$itemCost = 1299.99;        // было $productPrice = 999.50
$discountPercent = 15;      // было $sale = 10
$iterationCount = 5;        // было $index = 3

$fruitsList = ["яблоко","апельсин","банан"];     // было ["груша","слива","киви"]
$profile = ["login" => "anna_p", "role" => "admin", "active" => true];  // было $account

// ---------- константы ----------
define("TAX_RATE", 0.25);          // было NDS = 0.2
const STORE_NAME = "СуперМаркет";  // было SHOP = "Магазин Тест"

// ---------- дата ----------
$eventDate = "2026-12-31";         // было $dateVal = "2026-05-01"

// ---------- операции с переменной $firstValue ----------
echo "Исходное значение: $firstValue<br>";
$firstValue += 3;      // +3
echo "После +3: $firstValue<br>";
$firstValue -= 2;      // -2
echo "После -2: $firstValue<br>";
$firstValue *= 4;      // *4
echo "После *4: $firstValue<br>";
$firstValue /= 3;      // /3
echo "После /3: $firstValue<br>";
$firstValue++;         // ++
echo "После ++: $firstValue<br>";
$firstValue--;         // --
echo "После --: $firstValue<br>";

// ---------- if else (изменено условие) ----------
if ($firstValue > 15) {
    echo "Переменная firstValue больше 15<br>";
} else {
    echo "Переменная firstValue меньше или равна 15<br>";
}

// ---------- тернарный оператор ----------
$ternaryResult = ($firstValue > 15) ? "больше пятнадцати" : "меньше или равно";
echo "Тернарный результат: $ternaryResult<br>";

// ---------- switch (другое сравнение: spaceship) ----------
$compareVal = (7 <=> 5);   // было (4 <=> 4) -> теперь 1
switch ($compareVal) {
    case 0: echo "Числа равны<br>"; break;
    case 1: echo "Первое больше второго<br>"; break;
    case -1: echo "Первое меньше второго<br>"; break;
}

// ---------- while (изменён лимит и вывод) ----------
$counter = 0;
while ($counter < 4) {      // было < 5
    echo "while итерация #$counter<br>";
    $counter++;
}

// ---------- match (другое число и значения) ----------
$digit = 2;                 // было $num = 3
$matchResult = match ($digit) {
    1 => "один",
    2 => "два",
    3 => "три",
    4 => "четыре",
    default => "число вне диапазона"
};
echo "Результат match: $matchResult<br>";

// ---------- do while (изменено условие и шаг) ----------
$step = 0;
do {
    echo "do while: шаг $step<br>";
    $step++;
} while ($step < 4);        // было < 3

// ---------- for (другой диапазон) ----------
for ($idx = 0; $idx < 4; $idx++) {   // было < 3
    echo "for: индекс $idx<br>";
}

// ---------- функция (другая операция) ----------
function customCalc($input) {
    $offset = 250;          // было $tmp = 100
    return $input * $offset; // было сложение, теперь умножение
}

$funcResult = customCalc($firstValue);
echo "Результат функции (firstValue * 250) = $funcResult<br>";

// ---------- массив с людьми (другие имена / возраст) ----------
$persons = [
    ['name' => 'Илья', 'age' => 23],
    ['name' => 'Марина', 'age' => 25],
    ['name' => 'Сергей', 'age' => 20]
];
foreach ($persons as $person) {
    echo "{$person['name']} — {$person['age']} лет<br>";
}

// ---------- строки (новые тексты) ----------
$firstString = "JavaScript язык для фронтенда";
$secondString = "Я учу JavaScript и создаю сайты";
$dirtyString = "   пробелы в начале и конце   ";

echo "Исходная строка 1: $firstString<br>";
echo "Верхний регистр: " . strtoupper($firstString) . "<br>";
echo "Нижний регистр: " . strtolower($firstString) . "<br>";
echo "Длина строки 1: " . strlen($firstString) . "<br>";
echo "Очищенная строка: '" . trim($dirtyString) . "'<br>";

// ---------- explode / implode (другой разделитель) ----------
$wordsArray = explode(" ", $secondString);
foreach ($wordsArray as $word) {
    echo $word . "|";
}
echo "<br>";

$gluedString = implode("_", $wordsArray);   // был дефис, стало подчёркивание
echo "Склеенная строка: $gluedString<br>";

// ---------- substr (другие границы) ----------
echo "Первые 8 символов первой строки: " . substr($firstString, 0, 8) . "<br>";

// ---------- поиск (позиция другого слова) ----------
echo "Позиция слова 'JavaScript': " . strpos($firstString, "JavaScript") . "<br>";

// ---------- математические функции (новые операции) ----------
$randomNum = rand(5, 15);
echo "Случайное число: $randomNum<br>";
echo "Квадрат случайного числа: " . ($randomNum * $randomNum) . "<br>";  // вместо pow(rand(),2)

echo "Округление вверх 9.4: " . ceil($secondValue) . "<br>";     // было round($numB,1)
echo "Квадратный корень из 64: " . sqrt(64) . "<br>";            // было из 25

// ---------- работа с датой (другая модификация) ----------
$startDate = new DateTime("2025-01-01");
$startDate->modify("+12 days");    // было +5 days
echo "Новая дата: " . $startDate->format("d.m.Y") . "<br>";      // другой формат

$currentTimestamp = time();
echo "Текущий timestamp: $currentTimestamp<br>";

// дополнительное маленькое действие: разница в днях
$futureDate = new DateTime("2026-01-01");
$interval = $futureDate->diff($startDate);
echo "Дней до 2026-01-01: " . $interval->days . "<br>";

?>

</body>
</html>