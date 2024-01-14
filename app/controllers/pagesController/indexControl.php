<?php
include_once '../CategoryController.php';
include_once '../WikiController.php';
class IndexControl{
    public function index(){
        $dataWiki = new WikiController();
        $dataCategory = new CategoryController();
        $wikis = $dataWiki->getwikisContro(); 
        $categories = $dataCategory->getcategoriesContro();
        // var_dump($dataWiki->getwikisContro());
        include_once '../../views/wiki/wikiViewVisiteur.php';
    }
}
$page = new IndexControl();
$page->index();
?>