<?php
require_once __DIR__ . '/CallDatabase.php';

class MediaModel extends CallDatabase
{
    public function getMedia($column, $value, $columns = '*', $orderBy = 'position', $order = 'ASC') {
        $sql = "SELECT $columns FROM media_library WHERE $column = :value ORDER BY $orderBy $order";
        return $this->db->getAll($sql, [':value' => $value]);
    }
}
