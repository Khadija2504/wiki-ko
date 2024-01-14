<?php
include_once '../../../config/database.php';
class wiki{
    private $WikiID;
    private $title;
    private $content;
    private $author;
    private   $category;
    private $dateCreation;

    public function __construct($WikiID,$title,$content,$author,$category,$dateCreation){
        $this->WikiID = $WikiID;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->category = $category;
        $this->dateCreation = $dateCreation;
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
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
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
}