<?php
class wikiController{
    private $title;
    private $content;
    private $author;
    private $category;
    private $dateCreation;

    public function __construct($title,$content,$author,$category,$dateCreation){
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->category = $category;
        $this->dateCreation = $dateCreation;
    }

    // get

    public function gettitle(){
        return $this->title;
    }

    public function getcontent(){
        return $this->content;
    }

    public function getauthor(){
        return $this->author;
    }

    public function getcategory(){
        return $this->category;
    }

    public function getdateCreation(){
        return $this->dateCreation;
    }

    // set

    // public function settitle($title){
    //     return $this->title = $title;
    // }

    // public function setcontent($content){
    //     return $this->content = $content;
    // }

    // public function setauthor($author){
    //     return $this->author = $author;
    // }

    // public function setcategory($category){
    //     return $this->category = $category;
    // }

    // public function setdateCreation($dateCreation){
    //     return $this->dateCreation = $dateCreation;
    // }


    // public function search()
    // {
    //     $search = array(
    //         'wiki_title' => '%' . $_POST['word'] . '%',
    //     );

    //     $result = wiki::getsearch($search);
    //     return $result;

    // }
}
?>