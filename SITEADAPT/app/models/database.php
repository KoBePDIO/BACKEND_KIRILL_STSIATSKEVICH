<?php
namespace App\Models;

use PDO;
use PDOException;

class Database {
    private static $instance = null;
    private $db;

    private function __construct() {
        try {
            // Путь к БД относительно этого файла: ../../database/database.db
            $this->db = new PDO('sqlite:' . __DIR__ . '/../../database/database.db');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Ошибка подключения: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->db;
    }
}