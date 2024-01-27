<?php
include_once __DIR__.'./../Tag.php';
class TagsDAO{
    private $db;
    private Tag $tags;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
        $this->tags = new Tag();
    }
    public function getAllTags(){
        $sql = "SELECT * FROM tags";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
     
        $affiche = array();
    
        foreach ($result as $row) {
            $tag = new tag();
        $tag->setTagID($row->TagID);
        $tag->setTagName($row->TagName) ;
    
        array_push($affiche,$tag);
        }
        return $affiche;  
    }
    public function insertTags($tagName){
        $sql = "INSERT INTO tags (TagName) VALUES (:TagName)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':TagName', $tagName, PDO::PARAM_STR);
        $stmt->execute(); 
    
        return true;
    }
    public function addTag($tagName) {
        $sql = "INSERT INTO tags (TagName) VALUES (:tagName)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':tagName', $tagName, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function updateTag($tagID, $tagName) {
        $query = "UPDATE tags SET TagName = '$tagName' WHERE TagID = $tagID";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":TagName", $TagName);
        return $stmt->execute();
    }

    public function deleteTag($tagID) {
        $query = "DELETE FROM tags WHERE TagID = $tagID";
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }
    public function deleteWikiTagAssoc($tagID) {
        $query = "DELETE FROM wiki_tags WHERE TagID = $tagID";
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }

    public function getTagStats() {
        $sql = "SELECT COUNT(*) AS tagCount FROM tags";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result;
    }
    
    
}
?>