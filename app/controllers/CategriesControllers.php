<?php 
require_once(__DIR__.'../../models/Dao/CategoryDAO.php');
class CategriesControllers{
      private $categoryDao;
      public function __construct(){
          $this->categoryDao = new CategoryDAO();
      }
      public function getCategory(){
        $category=[
            "Categorie"=>$this->categoryDao->category()
        ];
        //  $category ;
      
        return include_once '../views/wiki/index.php';
      }
}
$data = new CategriesControllers();
// $category = $data->getCategory();

// var_dump( $data->getCategory()
// );
//         die();
