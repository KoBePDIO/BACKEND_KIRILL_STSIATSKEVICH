<?php
namespace App\Models;

use PDO;

class Product {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll($page = 1, $sort = 'id_asc', $category = '', $search = '', $perPage = 4) {
        $offset = ($page - 1) * $perPage;
        $orderBy = $this->getOrderBy($sort);
        $params = [];

        $sql = "SELECT * FROM products WHERE 1=1";
        if (!empty($category)) {
            $sql .= " AND category = ?";
            $params[] = $category;
        }
        if (!empty($search)) {
            $sql .= " AND name LIKE ?";
            $params[] = "%$search%";
        }
        $sql .= " ORDER BY $orderBy LIMIT $perPage OFFSET $offset";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotal($category = '', $search = '') {
        $params = [];
        $sql = "SELECT COUNT(*) as total FROM products WHERE 1=1";
        if (!empty($category)) {
            $sql .= " AND category = ?";
            $params[] = $category;
        }
        if (!empty($search)) {
            $sql .= " AND name LIKE ?";
            $params[] = "%$search%";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getCategories() {
        $stmt = $this->db->query("SELECT DISTINCT category FROM products WHERE category IS NOT NULL");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function getOrderBy($sort) {
        switch ($sort) {
            case 'price_asc':  return 'price ASC';
            case 'price_desc': return 'price DESC';
            case 'name_asc':   return 'name ASC';
            case 'name_desc':  return 'name DESC';
            default:           return 'id ASC';
        }
    }
}