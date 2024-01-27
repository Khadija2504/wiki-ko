<?php
include_once __DIR__.'../../../config/database.php';

class Tag
{
    private $TagID;
    private $TagName;
    public function __construct(){
    
    }
    /**
     * Get the value of TagID
     */
    public function getTagID(){
        return $this->TagID;
    }
    /**
     * Set the value of TagID
     */
    public function setTagID($TagID){
        $this->TagID = $TagID;
    }
    /**
     * Get the value of TagName
     */
    public function getTagName(){
        return $this->TagName;
    }
    /**
     * Set the value of TagName
     */
    public function setTagName($TagName){
        $this->TagName = $TagName;
    }
}
?>