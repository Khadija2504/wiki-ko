<?php
include_once __DIR__.'../../../config/database.php';
class category{
    private $CategoryID;
    private $CategoryName;
    
    public function __construct(){
      
    }
    

    /**
     * Get the value of CategoryID
     */ 
    public function getCategoryID()
    {
        return $this->CategoryID;
    }

    /**
     * Set the value of CategoryID
     *
  
     */ 
    public function setCategoryID($CategoryID)
    {
        $this->CategoryID = $CategoryID;

        return $this;
    }

    /**
     * Get the value of CategoryName
     */ 
    public function getCategoryName()
    {
        return $this->CategoryName;
    }

    /**
     * Set the value of CategoryName
     *
 
     */ 
    public function setCategoryName($CategoryName)
    {
        $this->CategoryName = $CategoryName;

        return $this;
    }
}
?>