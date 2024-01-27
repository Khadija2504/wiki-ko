<?php
session_start();
require_once(__DIR__.'/../models/Dao/AuhtorDAO.php');

class AuthController {
    private $auth;

    public function __construct() {
        $this->auth = new AuhtorDAO();
    }

    public function processRegister() {
        if(isset($_POST['register'])) {
            $username = $_POST['Username'];
            $email = $_POST['Email'];
            $password = $_POST['Password'];
            $aboutMe = $_POST['aboutMe'];

            if (empty($username) || empty($email) || empty($password) || empty($aboutMe)) {
                echo "All fields are required.";
                return false;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format.";
                return false;
            }

            $res = $this->auth->register($username, $email, $password, $aboutMe);

            if(!$res) {
                echo "Error during registration.";
            }

            return $res;
        }
    }

    public function processLogin() {
        if(isset($_POST['login'])) {
            $loginEmail = $_POST['loginEmail'];
            $loginPassword = $_POST['loginPassword'];

            if (empty($loginEmail) || empty($loginPassword)) {
                echo "Email and password are required.";
                return false;
            }

            if (!filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format.";
                return false;
            }

            $result = $this->auth->login($loginEmail, $loginPassword);

            if($result) {
                $_SESSION['userID'] = $result['UserID'];
                $_SESSION['Username'] = $result['Username'];
                $_SESSION['Email'] = $result['Email'];
                $_SESSION['aboutMe'] = $result['aboutMe'];

                if ($result['Role'] == 'admin') {
                    header('Location: AdminDashboardController.php');
                    exit();
                } else {
                    header('Location: homeController.php');
                    exit();
                }
            }
        }
    }
}

$data = new AuthController();
$data->processRegister();
$data->processLogin();

include_once '../views/auth/sign.php';
?>
