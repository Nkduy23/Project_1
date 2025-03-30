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

    // Hàm lấy nhiều bản ghi
    public function getAll($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database Query Error: " . $e->getMessage());
            return []; // Trả về mảng rỗng nếu có lỗi
        }
    }

    // Hàm lấy một bản ghi
    public function getOne($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database Query Error: " . $e->getMessage());
            return null;
        }
    }

    // Hàm thực thi INSERT, UPDATE, DELETE
    public function execute($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            error_log("Database Execution Error: " . $e->getMessage());
            return false;
        }
    }

    // Hàm đóng kết nối CSDL
    public function closeConnection()
    {
        $this->conn = null;
        self::$instance = null;
    }
}
