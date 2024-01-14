<?php
include_once '../../../config/database.php';
class category{
    private $CategoryID;
    private $CategoryName;
    
    public function __construct($CategoryID,$CategoryName){
        $this->CategoryID = $CategoryID;
        $this->CategoryName = $CategoryName;
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
     * @return  self
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
     * @return  self
     */ 
    public function setCategoryName($CategoryName)
    {
        $this->CategoryName = $CategoryName;

        return $this;
    }
}
?>