<?php

namespace Admin\Models;

class AdminCommentModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getAllComments() {
        try {
            $sql = "SELECT * FROM BinhLuan";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch (\Exception $e) {
            error_log("AdminCommentModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function getCommentById($id) {
        try{
            $sql = "SELECT * FROM BinhLuan WHERE MaBinhLuan = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result ?: [];
        }catch(\Exception $e){
            error_log("AdminCommentModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function updateComment($data) {
        try{
            $sql = "UPDATE BinhLuan SET NoiDung = ? WHERE MaBinhLuan = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$data['NoiDung'], $data['MaBinhLuan']]);
            $selectStmt = $this->db->prepare("SELECT * FROM BinhLuan WHERE MaBinhLuan = ?");
            $selectStmt->execute([$data['MaBinhLuan']]);
            $result = $selectStmt->fetch(\PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch(\Exception $e){
            error_log("AdminCommentModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function deleteComment($id) {
        try{
            $sql = "DELETE FROM BinhLuan WHERE MaBinhLuan = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$id]);
        } catch(\Exception $e){
            error_log("AdminCommentModel Error: " . $e->getMessage());
            return false;
        }
    }
}
?>