<?php 
include_once __DIR__.'../../../config/database.php';
class user{
    private $UserID;

    private $Username;

    private $Email;

    private $Password;

    private  $aboutMe;

    private $Role;

    public function __construct(){
    
    }
    

    /**
     * Get the value of UserID
     */ 
    public function getUserID()
    {
        return $this->UserID;
    }

    /**
     * Set the value of UserID
     *
     * @return  self
     */ 
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;

        return $this;
    }

    /**
     * Get the value of Username
     */ 
    public function getUsername()
    {
        return $this->Username;
    }

    /**
     * Set the value of Username
     *
     * @return  self
     */ 
    public function setUsername($Username)
    {
        $this->Username = $Username;

        return $this;
    }

    /**
     * Get the value of Email
     */ 
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of Email
     *
     * @return  self
     */ 
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Get the value of Password
     */ 
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * Set the value of Password
     *
     * @return  self
     */ 
    public function setPassword($Password)
    {
        $this->Password = $Password;

        return $this;
    }

    /**
     * Get the value of aboutMe
     */ 
    public function getAboutMe()
    {
        return $this->aboutMe;
    }

    /**
     * Set the value of aboutMe
     *
     * @return  self
     */ 
    public function setAboutMe($aboutMe)
    {
        $this->aboutMe = $aboutMe;

        return $this;
    }

    /**
     * Get the value of Role
     */ 
    public function getRole()
    {
        return $this->Role;
    }

    /**
     * Set the value of Role
     *
     * @return  self
     */ 
    public function setRole($Role)
    {
        $this->Role = $Role;

        return $this;
    }
}