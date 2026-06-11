<?php
// Определяем, какой экшн вызван, чтобы подключить нужный контент
$action = $_GET['action'] ?? 'home';
ob_start();
switch ($action) {
    case 'home':
        include __DIR__ . '/home.php';
        break;
    case 'cart':
        include __DIR__ . '/cart.php';
        break;
    case 'checkout':
        include __DIR__ . '/checkout.php';
        break;
    case 'showLogin':
    case 'login':
        include __DIR__ . '/login.php';
        break;
    case 'showRegister':
    case 'register':
        include __DIR__ . '/register.php';
        break;
    default:
        include __DIR__ . '/home.php';
}
$content = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TDA - Интернет-магазин</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css?v=99999">
  
</head>
<body>
<header class="header">
    <div class="header-top container">
        <div class="logo"><span class="logo-text">TDA</span></div>
     <?php if (isset($_SESSION['user_id'])): ?>
    <!-- Информация о пользователе -->
    <div class="icon-circle">
        <i class="fa-regular fa-user"></i>
        <span style="font-size:12px;"><?= $_SESSION['user_name'] ?? 'Профиль' ?></span>
    </div>
    <!-- ССЫЛКА НА ВЫХОД (добавьте эту строку) -->
    <a href="index.php?action=logout" class="logout-link">Выйти</a>
<?php else: ?>
    <a href="index.php?action=showLogin" class="auth-link">Вход</a>
    <a href="index.php?action=showRegister" class="auth-link">Регистрация</a>
<?php endif; ?>
      
        
        <input type="checkbox" id="burger-toggle" hidden>
        <label for="burger-toggle" class="mobile-burger"><i class="fa-solid fa-bars"></i></label>
        <div class="mobile-menu">
            <a href="#">Каталог</a><a href="#">Молочная продукция</a><a href="#">Мясная продукция</a>
            <a href="#">Напитки</a><a href="#">Бакалея</a><a href="#">Грибы</a>
            <a href="#">Крупы</a><a href="#">Овощи</a><a href="#">Ягоды</a>
        </div>
        <div class="header-icons">
            <a href="index.php?action=cart" class="icon-circle"><i class="fa-solid fa-shopping-bag"></i><span class="badge"><?= array_sum($_SESSION['cart'] ?? []) ?></span></a>
            <div class="icon-circle"><i class="fa-regular fa-file-alt"></i></div>
            <div class="icon-circle"><i class="fa-regular fa-user"></i></div>
        </div>
        <div class="location">
            <i class="fa-regular fa-paper-plane"></i>
            <div><span class="loc-title">Выберите филиал:</span><span class="loc-city">г. Владивосток <i class="fa-solid fa-chevron-down"></i></span></div>
        </div>
        <div class="phones">
            <i class="fa-solid fa-phone"></i>
            <div class="phone-numbers">
                <a href="tel:+71234567890">+7 (123) 456-78-90</a>
                <a href="tel:+71234567890">+7 (123) 456-78-90</a>
            </div>
        </div>
        <a href="#" class="btn-write"><i class="fa-regular fa-envelope"></i> Написать нам</a>
    </div>
    <nav class="main-nav">
        <div class="container nav-wrapper">
            <a href="#" class="catalog-btn"><i class="fa-solid fa-list"></i> Каталог</a>
            <ul class="nav-links">
                <li><a href="#">Молочная продукция</a></li><li><a href="#">Мясная продукция</a></li>
                <li><a href="#">Напитки</a></li><li><a href="#">Бакалея</a></li><li><a href="#">Грибы</a></li>
                <li><a href="#">Крупы</a></li><li><a href="#">Овощи</a></li><li><a href="#">Ягоды</a></li>
            </ul>
        </div>
    </nav>
</header>

<main>
    <?= $content ?>
</main>

<footer class="footer">
    <div class="container footer-top">
        <div class="footer-logo"><span class="logo-text">TDA</span></div>
        <div class="footer-links"><h4>О компании</h4><ul><li><a href="#">Новости</a></li><li><a href="#">Контакты</a></li><li><a href="#">Пользовательское соглашение</a></li><li><a href="#">Политика обработки персональных данных</a></li></ul></div>
        <div class="footer-links"><h4>Покупателям</h4><ul><li><a href="#">Доставка и оплата</a></li><li><a href="#">Как вернуть</a></li><li><a href="#">Как заказать</a></li><li><a href="#">Программа лояльности</a></li><li><a href="#">Вопросы и ответы</a></li><li><a href="#">Юридическим лицам</a></li></ul></div>
        <div class="footer-subscribe">
            <h4>Подписаться на рассылку актуальных новостей:</h4>
            <form class="subscribe-form"><input type="email" placeholder="Email"><button type="submit"><i class="fa-regular fa-envelope"></i> Подписаться</button></form>
            <div class="footer-contacts"><p><strong>Заказывайте товары круглосуточно<br>и задавайте вопросы</strong></p><a href="tel:88001234567" class="footer-phone">8 800 123-45-67</a></div>
        </div>
    </div>
    <div class="container footer-bottom"><p>© Интернет-магазин "TDA"</p><div class="socials"><a href="#"><i class="fa-brands fa-twitter"></i></a><a href="#"><i class="fa-brands fa-facebook-f"></i></a><a href="#"><i class="fa-brands fa-vk"></i></a><a href="#"><i class="fa-brands fa-instagram"></i></a></div></div>
</footer>
</body>
</html>