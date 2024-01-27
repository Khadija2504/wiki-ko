<?php
session_start();
require_once(__DIR__.'../../models/Dao/tagsDAO.php');
require_once(__DIR__.'../../models/Dao/wikiDAO.php');
require_once(__DIR__.'../../models/Dao/CategoryDAO.php');
class AdminDashboardController {
    private $tags;
    private $wikiDAO;
    private $categoryDao;
    public function __construct(){
        $this->tags = new TagsDAO();
        $this->wikiDAO = new WikiDAO();
        $this->categoryDao = new CategoryDAO();
    }
    public function getTags(){
        $tags=[
            "tag"=>$this->tags->getAllTags(),
            "wiki"=>$this->wikiDAO->Wikis(),
            "Categorie"=>$this->categoryDao->category(),
            "categoriess"=>$this->categoryDao->categories(),
        ];
        return $tags;
    }
    public function getWikisByCategory($categoryID){
        $wikis = $this->wikiDAO->getWikisByCategory($categoryID);
        return $wikis;
    }
    public function addCategory($categoryName) {
        $success = $this->categoryDao->addCategory($categoryName);
        return $success;
    }

    public function addTag($tagName) {
        $success = $this->tags->addTag($tagName);
        return $success;
    }
    public function updateTag($tagID, $tagName) {
        $success = $this->tags->updateTag($tagID, $tagName);
        return $success;
    }
    public function deleteTag($tagID) {
        $this->tags->deleteWikiTagAssoc($tagID);

        $success = $this->tags->deleteTag($tagID);

        if ($success) {
            echo "Tag deleted successfully!";
        } else {
            echo "Error deleting tag!";
        }
    }
    public function updateCategory($categoryID, $categoryName) {
        $success = $this->categoryDao->updateCategory($categoryID, $categoryName);
        return $success;
    }
    public function deleteCategory($categoryID) {
        $success = $this->categoryDao->deleteCategory($categoryID);
        return $success;
    }

    public function getStats() {
        $Stats = [
            "wiki"=>$this->wikiDAO->getWikiStats(),
            "tag"=>$this->tags->getTagStats(),
            "category"=>$this->categoryDao->getCategoryStats()
        ];
        return $Stats;
    }

    public function logout(){
        if (isset($_POST['logout'])) {
            session_destroy();
            header('Location: AuthController.php');
            exit();
        }
    }
    public function search($inputValues){
        $result = $this->wikiDAO->search($inputValues);
        return $result;
    }
}
if(!isset($_SESSION['userID'])){
    header('Location: AuthController.php');
    exit();
}
$tag = new AdminDashboardController();
$tags = $tag->getTags();
$tag->logout();
$userID = $_SESSION['userID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['categoryName'])) {
    $categoryName = $_POST['categoryName'];
    $tag->addCategory($categoryName);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tagName'])) {
    $tagName = $_POST['tagName'];
    $tag->addTag($tagName);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['deleteTag'])) {
        $tagID = $_POST['tagID'];
        $tag->deleteTag($tagID);
    } elseif (isset($_POST['updateTag'])) {
        $tagID = $_POST['tagID'];
        $tag->updateTag($tagID, $tagName);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['input'])) {
    $inputValues = $_POST['input'];
    $tag->search($inputValues);
}
// $Stats = $tag->getStats();
// var_dump($categoryStats);
// die();

include_once '../views/wiki/dashboard.php';
