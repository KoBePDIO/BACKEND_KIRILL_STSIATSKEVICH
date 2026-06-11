<?php
namespace App\Controllers;

use App\Models\Order;

class OrderController {
    public function checkout() {
        if (empty($_SESSION['cart'])) {
            header('Location: index.php?action=cart&error=Корзина пуста');
            exit;
        }
        include __DIR__ . '/../views/layout.php';
    }

    public function placeOrder() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_SESSION['cart'])) {
            header('Location: index.php?action=cart');
            exit;
        }

        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $address = trim($_POST['address'] ?? '');

        $orderModel = new Order();
        $orderId = $orderModel->create($_SESSION['cart'], $name, $email, $phone, $address);

        if ($orderId) {
            $_SESSION['cart'] = [];
            $_SESSION['order_success'] = true;
            header('Location: index.php?action=cart');
        } else {
            header('Location: index.php?action=checkout&error=Ошибка оформления');
        }
        exit;
    }
}