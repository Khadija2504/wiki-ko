<?php
session_start();
require_once(__DIR__.'../../models/Dao/wikiDAO.php');
require_once(__DIR__.'../../models/Dao/CategoryDao.php');
require_once(__DIR__.'../../models/Dao/tagsDAO.php');
class HomeController{
    private $wiki;
    private $categoryDao;
    private $tags;
    public function __construct(){
        $this->wiki = new WikiDAO();
        $this->categoryDao = new CategoryDAO();
        $this->tags = new tagsDao();
    }
    public function getWikis(){
        $wiki=[
            "wiki"=>$this->wiki->Wikis(),
            "Categorie"=>$this->categoryDao->category(),
            "categoriess"=>$this->categoryDao->categories(),
            "myWikis"=>$this->wiki->mywikis(4),
            "catego"=>$this->categoryDao->categories(),
            "tag"=>$this->tags->getAllTags(),
            // "WikiDetails"=>$this->wiki->getWikiDetails()
        ];
        return $wiki;
    }
    public function addWiki($title, $content, $authorID, $categoryID){
        $addWiki = $this->wiki->addWiki($title, $content, $authorID, $categoryID);
        return $addWiki;
    }
    public function insertWikiTags($getWikiID, $getTagID){
        $insertWikiTags = $this->wiki->insertWikiTags($getWikiID, $getTagID);
        return $insertWikiTags;
    }
    public function deleteWiki($wikiID){
        $deleteWiki =[ $this->wiki->deleteWiki($wikiID)
    ];
        return $deleteWiki;
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
if(!isset($_SESSION['userID'])){
    header('Location: AuthController.php');
    exit();
}

$data = new HomeController();
$wiki = $data->getWikis();
$data->logout();
// $delet = $data->deleteWiki($wikiID);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $categoryID = $_POST['category'];
    $selectedTags = isset($_POST['tags']) ? $_POST['tags'] : [];
    $userID = $_SESSION['userID'];

    $wikiID = $data->addWiki($title, $content, $userID, $categoryID);
    if ($wikiID) {
    //  foreach ($selectedTags as $tagID) {
            $data->insertWikiTags($wikiID, $selectedTags);
        
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['input'])) {
    $inputValues = $_POST['input'];
    $data->search($inputValues);
}
// var_dump($wiki['wiki']);
// die();

include_once '../views/wiki/home.php';
?>