<?php
class Category{
    
    public function category(){
        $data = new Database();
        $sql = "SELECT * FROM categories LIMIT 6";
        $result = $data->connect()->query($sql);
        return $result;
    }

    public function getCategoryName($categoryID) {
        $data = new Database();
        $query = $data->connect()->prepare("SELECT CategoryName FROM categories WHERE CategoryID = ?");
        $query->execute([$categoryID]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return ($result) ? $result['CategoryName'] : null;
    }
}
?>