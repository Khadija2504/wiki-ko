<?php
// require "../../../config/database.php";
// require "../../controllers/WikiController.php";
// require "../../models/Wiki.php";
// require "../../models/Category.php";
// $database = new Database();
// $cat = new Category();
// $result = $data->wikis();
// $category = $cat->category();
?>
<?php

include_once '../../models/wikiModel/wikiDAO.php';

class WikiController {
    private $database;

    public function __construct() {
        $this->database = Database::getInstance()->getConnection(); 
    }

    public function getwikisContro() {
        $data = new WikiDAO();
        $wikis=$data->SWiki();
        
        return $wikis;
        
    }
    public function getWikiByCategiry(){
        $data = new WikiDAO();
        $wikis=$data->getWikisByCategory($_GET['category_id']);
        
        return $wikis;
    }
    public function getWikiDetails($wikiID){
        $data = new WikiDAO();
        $wikis=$data->getWikiDetails($wikiID);
        return $wikis;
    }

}

// $data = new WikiController();
//  $data->getwikisContro(); 
?>

