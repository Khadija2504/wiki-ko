<?php
session_start();

require_once '../../../config/database.php';
class User
{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function register($username, $email, $password, $aboutMe)
    {
       
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (Username, Email, Password, aboutMe) VALUES (:Username, :Email, :Password, :aboutMe)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':Username', $username);
            $stmt->bindParam(':Email', $email);
            $stmt->bindParam(':Password', $hashedPassword);
            $stmt->bindParam(':aboutMe', $aboutMe);
            $stmt->execute();
            exit();
      
    }

    public function login($email, $password)
    {

            $sql = "SELECT * FROM users WHERE Email = :Email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':Email', $email);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                if (password_verify($password, $result['Password'])) {
                    $_SESSION['data'] = $result;

                    if ($_SESSION['data']['Role'] == 'admin') {
                        header('Location: ../../views/wiki/dashboard.php');
                        exit();
                    } else {
                        header('Location: ../../views/wiki/home.php');
                        exit();
                    }
                } else {
                    echo "Nom d'utilisateur ou mot de passe incorrect.";
                }
            } else {
                echo "Aucun utilisateur trouvé avec cette adresse e-mail.";
            }
    }

    public function editProfile($newUsername, $newEmail, $newAboutMe, $userID){
        $sql = "UPDATE users SET Username = :newUsername, Email = :newEmail, aboutMe = :newAboutMe WHERE UserID = :userID";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':newUsername', $newUsername);
        $stmt->bindParam(':newEmail', $newEmail);
        $stmt->bindParam(':newAboutMe', $newAboutMe);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();

        $_SESSION['data']['Username'] = $newUsername;
        $_SESSION['data']['Email'] = $newEmail;
        $_SESSION['data']['aboutMe'] = $newAboutMe;

    }
    public function logout(){
        if (isset($_POST['logout'])) {
            session_destroy();
            header('Location: ../auth/sign.php');
            exit();
        }
    }
}
?>