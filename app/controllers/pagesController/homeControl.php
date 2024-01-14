<?php
include_once '../CategoryController.php';
include_once '../WikiController.php';
include_once '../AuthController.php';
class homeControl{
    public function home(){
        $dataWiki = new WikiController();
        $dataCategory = new CategoryController();
        $user = new AuthController();
        $wikis = $dataWiki->getwikisContro();
        $categories = $dataCategory->getcategoriesContro();
        // if (empty($_SESSION['data'])) {
        //     header('Location: AuthControl.php');
        //     exit();
        // }
        $result = $_SESSION['data'];
        var_dump($result);
        die();
        $user->logout();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_username'])) {
            $newUsername = $_POST['new_username'];
            $newEmail = $_POST['new_email'];
            $newAboutMe = $_POST['new_aboutMe'];
            $userData = $_SESSION['data'];
            $userID = $userData['UserID'];
            $user->editProfile($newUsername, $newEmail, $newAboutMe, $userID);
        }
        include_once '../../views/wiki/home.php';
    }
}
$page = new homeControl();
$page->home();
?>