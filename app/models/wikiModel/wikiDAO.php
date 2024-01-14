<?php
include_once 'Wiki.php';
class WikiDAO
{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }
    public function InserWiki(Wiki $wiki){
        $sql = "INSERT INTO `wiki` (`titre`, `contenu`, `wiki_date`, `isArchive`, `img`, `fk_aut_email`, `fk_cat`) 
                VALUES (:titre, :contenu, :wiki_date, :isArchive, :img, :fk_aut_email, :fk_cat)";
        // Prepare the SQL statement
        $stmt = $this->db->prepare($sql);
        $wiki = $wiki->getTitle();
        $contenu = $wiki->getContenu();
        $Wiki_date = $wiki->getWiki_date();
        $IsArchiver =$wiki->getIsArchive();
        $img = $wiki->getImg();
        $fk_aut_email = $wiki->getFk_aut_email();
        $Fk_cat = $wiki->getFk_cat();
        $fk_cat = $wiki->getFk_cat();
        // Bind parameters
        $stmt->bindParam(':titre', $wiki );
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':wiki_date', $Wiki_date );
        $stmt->bindParam(':isArchive', $IsArchiver);
        $stmt->bindParam(':img',  $img);
        $stmt->bindParam(':fk_aut_email', $fk_aut_email);
        $stmt->bindParam(':fk_cat', $Fk_cat);
        
        $stmt->bindParam(':fk_cat', $fk_cat);
    
        // Execute the statement
        $stmt->execute();
    }
public function mywikis($userID)
{
    $sql = "SELECT wikis.*, categories.CategoryName
            FROM wikis
            INNER JOIN users ON wikis.AuthorID = users.UserID
            INNER JOIN categories ON wikis.CategoryID = categories.CategoryID
            WHERE users.UserID = :userID 
            ORDER BY wikis.CreatedAt DESC";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}
public function SWiki(){
    $sql = "SELECT wikis.*, users.Username AS AuthorName, categories.CategoryName
    FROM wikis
    INNER JOIN users ON wikis.AuthorID = users.UserID
    INNER JOIN categories ON wikis.CategoryID = categories.CategoryID
    ORDER BY wikis.CreatedAt DESC
    LIMIT 6";

    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $affiche = array();

    foreach ($result as $row) {
        $wiki = new Wiki(
            $row['WikiID'],
            $row['Title'],
            $row['Content'],
            $row['AuthorName'],
            $row['CategoryName'],
            $row['CreatedAt']
        );

        $affiche[] = $wiki;
    }

    return $affiche;  
}
    public function getWikiDetails($wikiID)
    {
        $sql = "SELECT wikis.*, users.Username AS AuthorName, categories.CategoryName
            FROM wikis
            INNER JOIN users ON wikis.AuthorID = users.UserID
            INNER JOIN categories ON wikis.CategoryID = categories.CategoryID
            WHERE wikis.WikiID = :wikiID";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':wikiID', $wikiID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }

    public function addWiki($title, $content, $authorID, $categoryID)
    {
        $sql = "INSERT INTO wikis (Title, Content, AuthorID, CategoryID) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$title, $content, $authorID, $categoryID]);

        $lastInsertId = $this->db->lastInsertId();

        return $lastInsertId;
    }

public function updateWiki($wikiID, $title, $content, $categoryID)
{
    $sql = "UPDATE wikis SET Title = :title, Content = :content, CategoryID = :categoryID WHERE WikiID = :wikiID";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":content", $content);
    $stmt->bindParam(":categoryID", $categoryID);
    $stmt->bindParam(":wikiID", $wikiID);
    $stmt->execute();
}

public function deleteWiki($wikiID)
{
    try {
        $query = "DELETE * FROM wikis WHERE WikiID = :wikiID";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':wikiID', $wikiID, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

public function getWikisByCategory($categoryID)
{
    $db = $this->db;
    $sql = "SELECT wikis.*, users.Username AS AuthorName
    FROM wikis
    INNER JOIN users ON wikis.AuthorID = users.UserID
    WHERE CategoryID = :categoryID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':categoryID', $categoryID, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt;
}

    public function addTagsToWiki($wikiID, $tagIDs)
{
    foreach ($tagIDs as $tagID) {
        $sql = "INSERT INTO wiki_tags (WikiID, TagID) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$wikiID, $tagID]);
    }
    return true;
}

   public function getsearch($search)
    {
        $sql = "SELECT * FROM wikis WHERE Title LIKE :wiki_title";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':wiki_title', $search['wiki_title']);

        $stmt->execute();
        $wikis = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = NULL;

        return $wikis;
    }
    public function search_wiki($data_search)
    {
        $db = $this->db->prepare("SELECT * FROM `wikis` WHERE Title LIKE :wiki_title;");
        $wiki_title = '%' . $data_search['wiki_title'] . '%';
        $db->bindParam(':wiki_title', $wiki_title);
        $db->execute();
    
        $results = $db->fetchAll(PDO::FETCH_ASSOC);
    
        return $results;
    }
    

}

