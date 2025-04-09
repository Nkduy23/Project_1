<?php
class Database
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $config = require __DIR__ . './.env.php';

        try {
            $this->conn = new PDO(
                "mysql:host={$config['host']};dbname={$config['db_name']};charset=utf8",
                $config['username'],
                $config['password']
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log("Database Connection Error: " . $e->getMessage());
            die("Lỗi kết nối CSDL. Vui lòng thử lại sau!");
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
