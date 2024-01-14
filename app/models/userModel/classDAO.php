<?php 
include_once  'user.php';
class ClassDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function register($username, $email, $password, $aboutMe)
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (Username, Email, Password, aboutMe) 
            VALUES (:Username, :Email, :Password, :aboutMe)";
    
    $stmt = $this->db->prepare($sql);

    // $username = $username->getUsername();
    // $email = $email->getEmail();
    // $password = $password->getEmail();
    // $aboutMe = $aboutMe->getAboutMe();

    $stmt->bindParam(':Username', $username);
    $stmt->bindParam(':Email', $email);
    $stmt->bindParam(':Password', $hashedPassword);
    $stmt->bindParam(':aboutMe', $aboutMe);

    $stmt->execute();
}
    public function login($email)
    {
            $sql = "SELECT * FROM users WHERE Email = :Email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':Email', $email);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        //   var_dump($result);
        //   die();
            return $result;
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
            header('Location: AuthControl.php');
            exit();
        }
        // require_once '../../views/wiki/home.php';
        // require_once '../../views/wiki/wikiViewVisiteur.php';
    }
}