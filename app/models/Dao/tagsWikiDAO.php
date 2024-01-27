<?php
include_once __DIR__.'./../tagsWiki.php';
class TagsWikiDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }
    public function getAllWikiTags(){
        $sql = "SELECT * FROM wiki_tags";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function detailsWiki($wikiID)
{
    $sql = "SELECT wikis.*, users.Username AS AuthorName, categories.CategoryName, wiki_tags.TagID
        FROM wikis
        INNER JOIN users ON wikis.AuthorID = users.UserID
        INNER JOIN categories ON wikis.CategoryID = categories.CategoryID
        INNER JOIN wiki_tags ON wiki_tags.WikiID = wikis.WikiID
        WHERE wikis.WikiID = :wikiID";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':wikiID', $wikiID, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);

    $affiche = array();

    if ($result) {
        $wiki = new TagsWiki();
        $wiki->getWiki()->setWikiID($result->WikiID);
        $wiki->getWiki()->setTitle($result->Title);
        $wiki->getwiki()->setContent($result->Content);
        $wiki->getwiki()->getCategory()->setCategoryID( $result->CategoryID);
        $wiki->getwiki()->getCategory()->setCategoryName( $result->CategoryName);
        $wiki->getwiki()->getAuthor()->setUsername( $result->AuthorName);
        $wiki->getwiki()->setDateCreation($result->CreatedAt);
        $wiki->getTag()->setTagID($result->TagID);

        array_push($affiche, $wiki);
    }
    return $affiche;
}

public function DeleteTAGES($wikid){
    $req="DELETE FROM `wiki_tags` WHERE WikiID=:wikiID";
    $stmt=$this->db->prepare($req);
    $stmt->bindParam(':wikiID', $wikid, PDO::PARAM_INT);
    $stmt->execute();
    return true;
}
public function insertWikiTags($wikiID, $tagIDs) {
    
    foreach ($tagIDs as $tagID) {
        $sql = "INSERT INTO wiki_tags (WikiID, TagID) VALUES (:WikiID, :TagID)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':WikiID', $wikiID, PDO::PARAM_INT);
        $stmt->bindParam(':TagID', $tagID, PDO::PARAM_INT);
        $stmt->execute();
    }
}


}
// $data = new TagsWikiDAO();
// $data->detailsWiki(6);
// var_dump($data->detailsWiki(6));
?>