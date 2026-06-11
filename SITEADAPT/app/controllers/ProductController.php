<?php
namespace App\Controllers;

use App\Models\Product;
use App\Models\News;

class ProductController {
    public function index() {
        $page = (int)($_GET['page'] ?? 1);
        $sort = $_GET['sort'] ?? 'id_asc';
        $category = $_GET['category'] ?? '';
        $search = trim($_GET['search'] ?? '');

        $productModel = new Product();
        $products = $productModel->getAll($page, $sort, $category, $search);
        $total = $productModel->getTotal($category, $search);
        $categories = $productModel->getCategories();

        $perPage = 4;
        $totalPages = ceil($total / $perPage);

        $newsModel = new News();
        $news = $newsModel->getLatest(3);

        // Передаём все данные в представление
        include __DIR__ . '/../views/layout.php';
    }
}