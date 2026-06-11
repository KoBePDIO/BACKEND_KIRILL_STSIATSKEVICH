<?php
namespace App\Models;

class News {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getLatest($limit = 3) {
        $stmt = $this->db->prepare("SELECT * FROM news ORDER BY created_at DESC LIMIT ?");
        $stmt->execute([$limit]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}