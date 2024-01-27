<?php
include_once __DIR__.'../../../config/database.php';
include_once __DIR__.'./Category.php';
include_once __DIR__.'./User.php';
class wiki{
    private $WikiID;
    private $title;
    private $content;
    private User $author;
    private category  $category;
    private $dateCreation;

    public function __construct(){
      $this->author = new User();
      $this->category = new category();
        
    }
    

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    

  

    /**
     * Get the value of dateCreation
     */ 
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set the value of dateCreation
     *
     * @return  self
     */ 
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get the value of WikiID
     */ 
    public function getIdwiki()
    {
        return $this->WikiID;
    }

    /**
     * Set the value of WikiID
     *
     * @return  self
     */ 
    public function setWikiID($WikiID)
    {
        $this->WikiID = $WikiID;

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

}