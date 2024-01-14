<?php
include_once 'category.php';
class CategoryDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }
    public function category(){
        $sql = "SELECT * FROM categories LIMIT 6";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $affiche = array();
        foreach ($result as $row) {
            $category = new Category(
                $row['CategoryID'],
                $row['CategoryName']
            );
            $affiche[] = $category;
        }
        return $affiche;
    }

    public function getCategoryName($categoryID) {
        $sql = "SELECT CategoryName FROM categories WHERE CategoryID = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$categoryID]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return ($result) ? $result['CategoryName'] : null;
    }
}
?>