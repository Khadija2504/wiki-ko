<?php
require_once(__DIR__.'../../models/Dao/wikiDAO.php');
class  ShowWikiController{
    private $wiki;
    public function __construct(){
        $this->wiki = new WikiDAO();
    }
    public function getWikis(){
        $wiki=[
            "wiki"=>$this->wiki->Wikis(),
            "myWikis"=>$this->wiki->mywikis(4),
        ];
        return $wiki;
    }
    public function getWikiDetails($wikiID){
        $details = [
            "detailsWiki"=>$this->wiki->getWikiDetails($wikiID)
        ];
        return $details;
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
$wikiDD = new ShowWikiController();
if (isset($_GET['wiki_id'])) {
    $wikiID = $_GET['wiki_id'];
    $wiki = $wikiDD->getWikis();
    $wikiDetails = $wikiDD->getWikiDetails($wikiID);
    $wikiDD->logout();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['input'])) {
        $inputValues = $_POST['input'];
        $wikiDD->search($inputValues);
    }
    // var_dump($wikiDetails);
    // die();
    include_once '../views/wiki/show.php';
} else {
    header('Location: ../views/wiki/home.php');
    exit();
}

?>