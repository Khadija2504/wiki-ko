<?php
include_once '../../models/categoryModel/categoryDAO.PHP';
class CategoryController{
    private $database;

    public function __construct() {
        $this->database = Database::getInstance()->getConnection(); 
    }
    public function getcategoriesContro() {
        $data = new CategoryDAO();
        $categories=$data->category();
        return $categories;
    }
    public function getCategorysWiki($categoryID){
        $data = new CategoryDAO();
        $categorysWiki=$data->getCategoryName($categoryID);
        return $categorysWiki;
    }
}

// $data = new CategoryController();
// $data->getcategoriesContro();
?>