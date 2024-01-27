<?php 
require_once(__DIR__.'../../models/Dao/wikiDAO.php');
require_once(__DIR__.'../../models/Dao/CategoryDAO.php');

class ShowWikiCatController{
      private $wiki;
      private $categoryDao;
      public function __construct(){
          $this->wiki = new WikiDAO();
          $this->categoryDao = new CategoryDAO();
    }
    public function getWikisByCategory($categoryID){
        $wikis = [
            "wikiCat"=>$this->wiki->getWikisByCategory($categoryID)
        ];
        return $wikis;
    }
    public function getCategoryNames($categoryID){
        $categoryNames = [
            "categoryName"=>$this->categoryDao->getCategoryName($categoryID)
        ] ;
        return $categoryNames;
    }
    public function logout(){
        if (isset($_POST['logout'])) {
            session_destroy();
            header('Location: AuthController.php');
            exit();
        }
    }
    public function search($inputValues){
        $result = $this->wiki->search($inputValues);
        return $result;
    }

}
$data = new ShowWikiCatController();
if (isset($_GET['category_id'])) {
    $categoryID =$_GET['category_id'];
    $categoryNames = $data->getCategoryNames($categoryID);
    $wikis = $data->getWikisByCategory($categoryID);
    $data->logout();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['input'])) {
        $inputValues = $_POST['input'];
        $data->search($inputValues);
    }
    // var_dump($wikis);
    // die();
    include_once '../views/wiki/show_category_wikis.php';
}