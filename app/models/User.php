<?php
session_start();


class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function register($username, $email, $password, $aboutMe)
    {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (Username, Email, Password, aboutMe) VALUES (:Username, :Email, :Password, :aboutMe)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':Username', $username);
            $stmt->bindParam(':Email', $email);
            $stmt->bindParam(':Password', $hashedPassword);
            $stmt->bindParam(':aboutMe', $aboutMe);

            $stmt->execute();

            echo "Inscription réussie !";
            exit();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function login($email, $password)
    {
        try {
            $sql = "SELECT * FROM users WHERE Email = :Email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':Email', $email);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (count($result) > 0 && password_verify($password, $result['Password'])) {
                $_SESSION['data'] = $result;

                // Redirection en fonction du rôle
                if ($_SESSION['data']['Role'] == 'admin') {
                    header('Location: ../../views/wiki/dashboard.php');
                    exit();
                } else {
                    header('Location: ../../views/board/index.php');
                    exit();
                }
            } else {
                echo "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
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

        // Update session data with the new information
        $_SESSION['data']['Username'] = $newUsername;
        $_SESSION['data']['Email'] = $newEmail;
        $_SESSION['data']['aboutMe'] = $newAboutMe;

        echo "Profile updated successfully!";
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