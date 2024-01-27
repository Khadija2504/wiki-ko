<?php
include_once __DIR__.'./../Category.php';
class CategoryDAO{
    private $db;
    private category $categorie;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
        $this->categorie = new category();
    }
    public function category(){
        $sql = "SELECT * FROM categories LIMIT 6";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $affiche = array();
        foreach ($result as $row) {
            $category = new Category( );
                $category->setCategoryID($row->CategoryID);
                $category->setCategoryName($row->CategoryName);
           array_push($affiche,$category);
        }
        return $affiche;
    }

    public function categories(){
        $sql = "SELECT * FROM categories";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $affiche = array();
        foreach ($result as $row) {
            $category = new Category( );
                $category->setCategoryID($row->CategoryID);
                $category->setCategoryName($row->CategoryName);
           array_push($affiche,$category);
        }
        return $affiche;
    }

    public function getCategoryName($categoryID) {
        $sql = "SELECT CategoryName FROM categories WHERE CategoryID = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$categoryID]); // Use an array to bind parameters
        $result = $query->fetch(PDO::FETCH_OBJ);
    
        $affiche = array();
    
        if ($result) {
            $category = new Category();
            $category->setCategoryName($result->CategoryName);
    
            array_push($affiche, $category);
        }
    
        return $affiche;
    }
    public function addCategory($categoryName) {
        $sql = "INSERT INTO categories (CategoryName) VALUES (:categoryName)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':categoryName', $categoryName, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function updateCategory($categoryID, $categoryName) {
        $query = "UPDATE categories SET CategoryName = '$categoryName' WHERE CategoryID = $categoryID";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":CategoryName", $categoryName);
        return $stmt->execute();
    }

    public function deleteCategory($categoryID) {
        $query = "DELETE FROM categories WHERE CategoryID = $categoryID";
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }

    public function getcategoryStats() {
        $sql = "SELECT COUNT(*) AS categoryCount FROM categories";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result;
    }

}

?>