<?php

namespace App\Models;

class MediaModel
{
    private $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }
    public function getMedia($column, $value, $columns = '*', $orderBy = 'position', $order = 'ASC') {
        try {
            $sql = "SELECT $columns FROM media_library WHERE $column = :value ORDER BY $orderBy $order";
            $stmt = $this->db->prepare($sql);
            //Bind giá trị vào tham số SQL (khi cần ràng buộc kiểu dữ liệu)
            $stmt->bindValue(':value', $value);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return is_array($result) ? $result : []; // Luôn trả về mảng
        } catch (\Exception $e) {
            error_log("MediaModel Error: " . $e->getMessage());
            return []; // Trả về mảng rỗng nếu có lỗi
        }
    }
}