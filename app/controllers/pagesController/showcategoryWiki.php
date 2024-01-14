<?php
include_once '../CategoryController.php';
include_once '../WikiController.php';
class  ShowcategoryWiki{
    public function showCategoryWiki(){
        $categoryName = new CategoryController();
        $data = new wikiController();
        if (isset($_GET['category_id'])) {
            // $userData = $_SESSION['data'];
            // $userID = $userData['UserID'];
            $categoryID = (int)$_GET['category_id'];
            $categoryName = $categoryName->getCategorysWiki($categoryID);
            $catego = $data->getWikiByCategiry($categoryID);
            include_once '../../views/wiki/show_category_wikis.php';
        }
    }
}
$show = new ShowcategoryWiki();
$show->showCategoryWiki();
?>