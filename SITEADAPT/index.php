<?php
session_start();

// Автозагрузка классов
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/app/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) return;
    $file = $base_dir . str_replace('\\', '/', substr($class, $len)) . '.php';
    if (file_exists($file)) require $file;
});

use App\Controllers\AuthController;
use App\Controllers\ProductController;
use App\Controllers\CartController;
use App\Controllers\OrderController;

$action = $_GET['action'] ?? 'home';

// Действия, доступные без авторизации (только вход и регистрация)
$publicActions = ['showLogin', 'login', 'doLogin', 'showRegister', 'register', 'doRegister'];

// Если пользователь НЕ авторизован и запрошено НЕ публичное действие – редирект на логин
if (!isset($_SESSION['user_id']) && !in_array($action, $publicActions)) {
    header('Location: index.php?action=showLogin');
    exit;
}

switch ($action) {
    case 'home':
        (new ProductController())->index();
        break;
    case 'add':
        (new CartController())->add();
        break;
    case 'remove':
        (new CartController())->remove();
        break;
    case 'update':
        (new CartController())->update();
        break;
    case 'cart':
        (new CartController())->view();
        break;
    case 'checkout':
        (new OrderController())->checkout();
        break;
    case 'place_order':
        (new OrderController())->placeOrder();
        break;
    case 'showLogin':
    case 'login':
        (new AuthController())->showLogin();
        break;
    case 'doLogin':
        (new AuthController())->login();
        break;
    case 'showRegister':
    case 'register':
        (new AuthController())->showRegister();
        break;
    case 'doRegister':
        (new AuthController())->register();
        break;
    case 'logout':
        (new AuthController())->logout();
        break;
    default:
        http_response_code(404);
        echo "404 - Страница не найдена";
        break;
}