<?php
namespace App\Models;

use PDO;

class Order {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($cart, $name, $email, $phone, $address) {
        try {
            $this->db->beginTransaction();
            $productModel = new Product();
            $total = 0;
            foreach ($cart as $id => $qty) {
                $product = $productModel->getById($id);
                if ($product) $total += $product['price'] * $qty;
            }

            $stmt = $this->db->prepare("
                INSERT INTO orders (total, customer_name, customer_email, customer_phone, customer_address, created_at)
                VALUES (?, ?, ?, ?, ?, datetime('now'))
            ");
            $stmt->execute([$total, $name, $email, $phone, $address]);
            $orderId = $this->db->lastInsertId();

            $stmtItem = $this->db->prepare("INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)");
            foreach ($cart as $id => $qty) {
                $stmtItem->execute([$orderId, $id, $qty]);
            }

            $this->db->commit();
            return $orderId;
        } catch (\Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }
}