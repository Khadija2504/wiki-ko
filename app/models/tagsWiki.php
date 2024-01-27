<?php
include_once __DIR__.'../../../config/database.php';
include_once __DIR__.'/Tag.php';
include_once __DIR__.'/wiki.php';
class TagsWiki{
    private Tag $Tags;
    private wiki $Wiki;
    public function __construct(){
        $this->Tags = new Tag();
        $this->Wiki = new wiki();
    }
    /**
     * Get the value of Tag
     */
    public function getTag(){
        return $this->Tags;
    }

    /**
     * Get the value of Wiki
     */
    public function getWiki(){
        return $this->Wiki;
    }

}
?>