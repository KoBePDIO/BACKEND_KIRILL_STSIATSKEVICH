<?php
namespace App\Controllers;

use App\Models\Product;

class CartController {
   public function add() {
    $id = (int)($_GET['id'] ?? 0);
    if ($id) {
        $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
    }
    // Вместо редиректа на home перенаправляем на cart
    $referer = $_SERVER['HTTP_REFERER'] ?? 'index.php?action=home';
    header('Location: ' . $referer);
    exit;
}

    public function remove() {
        $id = (int)($_GET['id'] ?? 0);
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
        header('Location: index.php?action=cart');
        exit;
    }

    public function update() {
        $id = (int)($_GET['id'] ?? 0);
        $qty = (int)($_GET['qty'] ?? 0);
        if ($id && $qty > 0) {
            $_SESSION['cart'][$id] = $qty;
        } elseif ($id && $qty <= 0) {
            unset($_SESSION['cart'][$id]);
        }
        header('Location: index.php?action=cart');
        exit;
    }

    public function view() {
        $cartItems = [];
        $total = 0;
        $productModel = new Product();

        foreach ($_SESSION['cart'] as $id => $qty) {
            $product = $productModel->getById($id);
            if ($product) {
                $sum = $product['price'] * $qty;
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $qty,
                    'sum' => $sum
                ];
                $total += $sum;
            }
        }

        include __DIR__ . '/../views/layout.php';
    }
}