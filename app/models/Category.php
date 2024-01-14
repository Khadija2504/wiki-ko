<?php
require_once '../../../config/database.php';

class Category{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }
    
    public function category(){
        $sql = "SELECT * FROM categories LIMIT 6";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getCategoryName($categoryID) {
        $query = $this->db->prepare("SELECT CategoryName FROM categories WHERE CategoryID = ?");
        $query->execute([$categoryID]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return ($result) ? $result['CategoryName'] : null;
    }
}
