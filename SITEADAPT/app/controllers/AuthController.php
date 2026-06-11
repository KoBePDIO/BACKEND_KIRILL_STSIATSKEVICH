<?php
namespace App\Controllers;

use App\Models\User;

class AuthController {
    public function showLogin() {
        include __DIR__ . '/../views/layout.php';
    }
public function logout() {
    session_destroy();          // уничтожаем сессию
    header('Location: index.php?action=showLogin');
    exit;
}
    public function showRegister() {
        include __DIR__ . '/../views/layout.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?action=login');
            exit;
        }
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $userModel = new User();
        $user = $userModel->findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['fullname'];
            header('Location: index.php?action=home');
        } else {
            $_SESSION['error'] = 'Неверный email или пароль';
            header('Location: index.php?action=login');
        }
        exit;
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?action=register');
            exit;
        }
        $fullname = trim($_POST['fullname'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        if (empty($fullname) || empty($email) || empty($password)) {
            $_SESSION['error'] = 'Заполните все поля';
            header('Location: index.php?action=register');
            exit;
        }
        if ($password !== $confirm) {
            $_SESSION['error'] = 'Пароли не совпадают';
            header('Location: index.php?action=register');
            exit;
        }
        $userModel = new User();
        if ($userModel->findByEmail($email)) {
            $_SESSION['error'] = 'Пользователь с таким email уже существует';
            header('Location: index.php?action=register');
            exit;
        }
        if ($userModel->create($fullname, $email, $password)) {
            $_SESSION['success'] = 'Регистрация прошла успешно. Войдите.';
            header('Location: index.php?action=login');
        } else {
            $_SESSION['error'] = 'Ошибка регистрации';
            header('Location: index.php?action=register');
        }
        exit;
    }

  
    
}