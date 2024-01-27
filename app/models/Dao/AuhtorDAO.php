<?php
include_once __DIR__.'./../User.php';
class AuhtorDAO{
    private $db;
    private user $user;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
        $this->user = new user();
    }
    
    public function login($email)
    {
            $sql = "SELECT * FROM users WHERE Email = :Email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':Email', $email);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
            return $result;
    }
    public function register($username, $email, $password, $aboutMe)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO users (Username, Email, Password, aboutMe) 
                VALUES (:Username, :Email, :Password, :aboutMe)";
        
        $stmt = $this->db->prepare($sql);
    
        $stmt->bindParam(':Username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':Email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':Password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':aboutMe', $aboutMe, PDO::PARAM_STR);
    
        $res = $stmt->execute();
        return $res;
    }
}