<?php 
require_once(__DIR__.'../../models/Dao/wikiDAO.php');
require_once(__DIR__.'../../models/Dao/CategoryDAO.php');

class PageController{
      private $wiki;
      private $categoryDao;
      public function __construct(){
          $this->wiki = new WikiDAO();
          $this->categoryDao = new CategoryDAO();
      }
      public function getWikis(){
        $wiki=[
            "wiki"=>$this->wiki->Wikis(),
            "Categorie"=>$this->categoryDao->category(),
            "categoriess"=>$this->categoryDao->categories(),

        ];
        // $category = [
        //     "Categorie"=>$this->categoryDao->category()
        // ];
        
        return $wiki;
        
      }
      public function search($inputValues){
        $result = $this->wiki->search($inputValues);
        return $result;
    }
      
}
$data = new PageController();
$wiki = $data->getWikis();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['input'])) {
  $inputValues = $_POST['input'];
  $data->search($inputValues);
}
include_once '../views/wiki/index.php';
// var_dump( $data->getWikis()
// );
        // die();
