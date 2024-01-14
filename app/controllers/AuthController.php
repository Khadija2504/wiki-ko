<?php
include_once '../../models/userModel/classDAO.php';
class AuthController {
    private $database;

    public function __construct() {
        $this->database = Database::getInstance()->getConnection(); 
    }
    public function getRegister($username, $email, $password, $aboutMe){
        $data = new ClassDAO();
        $register = $data->register($username, $email, $password, $aboutMe,);
        return $register;
    }
    public function getLogin($email, $password){
        $data = new ClassDAO();
        $login = $data->login($email, $password);
        if ($login) {
              
            if (password_verify($password, $login['Password'])) {
              
               
       
                if ($login['Role'] == 'admin') {
                    $_SESSION['data'] = $login;
                    header('Location: ../views/wiki/dashboard.php');
                    exit();
                } else {
                    $_SESSION['data'] = $login;
                
                      
                    header('Location: ../pagesController/homeControl.php');
                    exit();
                }
            } else {
                echo "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } else {
            echo "Aucun utilisateur trouvé avec cette adresse e-mail.";
        }
    }
    public function logout(){
        $data = new ClassDAO();
        $logout = $data->logout();
        return $logout;
    }
    public function editProfile($newUsername, $newEmail, $newAboutMe, $userID){
        $data = new ClassDAO();
        $editProfile = $data->editProfile($newUsername, $newEmail, $newAboutMe, $userID);
        return $editProfile;
    }
    public function Form(){
        include_once '../../views/auth/sign.php';
    }
}

// $data = new AuthController();

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
//     $data->getRegister($_POST['Username'], $_POST['Email'], $_POST['Password'], $_POST['aboutMe']);
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
//     $data->getLogin($_POST['loginEmail'], $_POST['loginPassword']);
// }
// $data->logout();
// $data->Form();
?>

