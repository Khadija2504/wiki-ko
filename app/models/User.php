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

    public function login($username, $password)
    {
        try {
            $sql = "SELECT * FROM users WHERE Username = :Username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':Username', $username);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (count($result) > 0 && password_verify($password, $result['Password'])) {
                $_SESSION['data'] = $result;

                // Redirection en fonction du rôle
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
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
?>