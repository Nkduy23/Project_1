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
            // named placeholder
            $stmt->bindValue(':value', $value);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return is_array($result) ? $result : [];
        } catch (\Exception $e) {
            error_log("MediaModel Error: " . $e->getMessage());
            return [];
        }
    }
}