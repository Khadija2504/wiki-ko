<?php
include_once '../AuthController.php';
class AuthControl{
    public function sign(){
        $data = new AuthController();

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
            $data->getRegister($_POST['Username'], $_POST['Email'], $_POST['Password'], $_POST['aboutMe']);
        
        
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
            $data->getLogin($_POST['loginEmail'], $_POST['loginPassword']);
           
        }
        $data->Form();
    }
}
$data = new AuthControl();
$data->sign();
?>