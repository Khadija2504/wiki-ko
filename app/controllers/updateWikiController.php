<?php
session_start();
require_once(__DIR__.'../../models/Dao/wikiDAO.php');
require_once(__DIR__.'../../models/Dao/CategoryDAO.php');
require_once(__DIR__.'../../models/Dao/tagsDAO.php');
require_once(__DIR__.'../../models/Dao/tagsWikiDAO.php');
class UpdateWikiController{
    private $wiki;
    private $categoryDao;
    private $tagsDao;
    private $tagsWikiDao;
    public function __construct(){
        $this->wiki = new WikiDAO();
        $this->categoryDao = new CategoryDAO();
        $this->tagsDao = new TagsDAO();
        $this->tagsWikiDao = new tagsWikiDAO();
    }
    public function updateWikis($wikiID, $title, $content, $categoryID){
        $updateWikis= [
            "updateWiki"=>$this->wiki->updateWiki($wikiID, $title, $content, $categoryID)
        ];
        return $updateWikis;
    }
    public function getWikis(){
        $wiki=[
            "catego"=>$this->categoryDao->categories(),
            "tags"=>$this->tagsDao->getAllTags(),
        ];
        
        return $wiki;
        
      }
      public function insertWikiTags($getWikiID, $getTagID){
        $insertWikiTags = $this->wiki->insertWikiTags($getWikiID, $getTagID);
        return $insertWikiTags;
    }
    public function updateWikiTags($WikiID){
        $updateWikiTags = [
            "updateWikiTag"=> $this->tagsWikiDao->DeleteTAGES($WikiID)
        ];
        return $updateWikiTags;
    }
    public function getWikiDetails($wikiID){
        $details = [
            // "detailsWiki"=>$this->wiki->getWikiDetails($wikiID),
            "tagsWiki"=>$this->tagsWikiDao->detailsWiki($wikiID)
        ];
        return $details;
    }
    public function search($inputValues){
        $result = $this->wiki->search($inputValues);
        return $result;
    }
    public function logout(){
        if (isset($_POST['logout'])) {
            session_destroy();
            header('Location: AuthController.php');
            exit();
        }
    }
}
$data = new UpdateWikiController();
$wiki = $data->getWikis();
$userID= $_SESSION['userID'];
$data->logout();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['wiki_id'])) {
        $wikiID = $_GET['wiki_id'];
        $wikiDetails = $data->getWikiDetails($wikiID);
        // $insertTags = $data->insertTags($tagName);
        }
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_wiki'])) {
    $wikiID = $_POST['wiki_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $categoryID = $_POST['category'];
    $TagID = $_POST['tag'];
    
    $data->updateWikis($wikiID, $title, $content, $categoryID);
    $data->updateWikiTags($wikiID);
    $data->insertWikiTags($wikiID, $TagID);
     header("Location: homeController.php");
    
    // exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['input'])) {
    $inputValues = $_POST['input'];
    $data->search($inputValues);
}
// var_dump($data->updateWikis($wikiID, $title, $content, $categoryID) );
//     die();
 include_once "../views/wiki/updateWiki.php";


?>