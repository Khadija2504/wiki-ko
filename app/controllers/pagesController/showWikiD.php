<?php
include_once '../WikiController.php';
class ShowWikiD{
    public function showWikiD(){
        $dataWiki = new WikiController();
        if (isset($_GET['wiki_id'])) {
            $wikiID = $_GET['wiki_id'];
            $wikiDetails = $dataWiki->getWikiDetails($wikiID);
        } else {
            header('Location: indexControl.php');
            exit();
        }
        // var_dump($dataWiki->getwikisContro());
        include_once '../../views/wiki/show.php';
    }
}
$page = new ShowWikiD();
$page->showWikiD();
?>