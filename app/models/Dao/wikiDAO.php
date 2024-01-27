<?php
include_once __DIR__.'./../Wiki.php';
class WikiDAO{
    private $db;
    private category $categorie;
    private user $user;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
        $this->categorie = new category();
        $this->user = new user();
    }
    public function Wikis(){
        $sql = "SELECT wikis.*, users.Username AS AuthorName, categories.CategoryName as  CategoryName
        FROM wikis
        INNER JOIN users ON wikis.AuthorID = users.UserID
        INNER JOIN categories ON wikis.CategoryID = categories.CategoryID
        ORDER BY wikis.CreatedAt DESC
        LIMIT 6";
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
     
        $affiche = array();
    
        foreach ($result as $row) {
            $wiki = new Wiki();
        $wiki->setWikiID($row->WikiID);
        $wiki->setTitle($row->Title) ;
        $wiki->setContent($row->Content) ;
        // $wiki->getAuthor()->setUsername();
        $wiki->getAuthor()->setUsername( $row->AuthorName);   
        $wiki->getCategory()->setCategoryName( $row->CategoryName);  
        $wiki->setDateCreation($row->CreatedAt)  ; 
    
        array_push($affiche,$wiki);
        }
    
        return $affiche;  
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
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
     
        $affiche = array();
    
        foreach ($result as $row) {
            $wiki = new Wiki();
        $wiki->setWikiID($row->WikiID);
        $wiki->setTitle($row->Title) ;
        $wiki->setContent($row->Content);
        $wiki->getCategory()->setCategoryName( $row->CategoryName);      
        array_push($affiche,$wiki);
        }
    
        return $affiche;
}

public function getWikiDetails($wikiID)
{
    $sql = "SELECT wikis.*, users.Username AS AuthorName, categories.CategoryName, wiki_tags.TagID
        FROM wikis
        INNER JOIN users ON wikis.AuthorID = users.UserID
        INNER JOIN categories ON wikis.CategoryID = categories.CategoryID
        INNER JOIN wiki_tags ON wiki_tags.WikiID = wikis.WikiID
        ";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);

    $affiche = array();

    if ($result) {
        $wiki = new Wiki();
        $wiki->setWikiID($result->WikiID);
        $wiki->setTitle($result->Title);
        $wiki->setContent($result->Content);
        $wiki->getCategory()->setCategoryID( $result->CategoryID);
        $wiki->getCategory()->setCategoryName( $result->CategoryName);
        $wiki->getAuthor()->setUsername( $result->AuthorName); 
        $wiki->setDateCreation($result->CreatedAt);

        array_push($affiche, $wiki);
    }

    return $affiche;
}


    public function addWiki($title, $content, $authorID, $categoryID)
    {
        $sql = "INSERT INTO wikis (Title, Content, AuthorID, CategoryID) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$title, $content, $authorID, $categoryID]);

        $lastInsertId = $this->db->lastInsertId();

        return $lastInsertId;
    }
    public function insertWikiTags($getWikiID, $getTagID){

        foreach ($getTagID as $tagID) {
            $sql = "INSERT INTO wiki_tags (WikiID, TagID) VALUES (:WikiID, :TagID)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':WikiID', $getWikiID, PDO::PARAM_INT);
            $stmt->bindParam(':TagID', $tagID, PDO::PARAM_INT);
            $stmt->execute();
        }
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
        $query = "DELETE FROM wikis WHERE WikiID = :wikiID";
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

public function getwikiStats() {
    $sql = "SELECT COUNT(*) AS wikiCount FROM wikis";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);

    return $result;
}

public function getWikisByCategory($categoryID)
{
    $sql = "SELECT wikis.*, users.Username AS AuthorName
    FROM wikis
    INNER JOIN users ON wikis.AuthorID = users.UserID
    WHERE CategoryID = :categoryID";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':categoryID', $categoryID, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
     
        $affiche = array();
    
        foreach ($result as $row) {
            $wiki = new Wiki();
        $wiki->setWikiID($row->WikiID);
        $wiki->setTitle($row->Title) ;
        $wiki->setContent($row->Content);
        $wiki->getAuthor()->setUsername( $row->AuthorName);   
        $wiki->setDateCreation($row->CreatedAt);
        array_push($affiche,$wiki);
        }
        return $affiche;
}

public function search($inputValues){
    $sql_query = "SELECT wikis.*, users.Username AS AuthorName, categories.CategoryName FROM wikis
              INNER JOIN users ON wikis.AuthorID = users.UserID
              INNER JOIN categories ON wikis.CategoryID = categories.CategoryID
              LEFT JOIN wiki_tags ON wikis.WikiID = wiki_tags.WikiID
              LEFT JOIN tags ON wiki_tags.TagID = tags.TagID
              WHERE wikis.Title LIKE '%$inputValues%'
                OR wikis.Content LIKE '%$inputValues%'
                OR tags.TagName LIKE '%$inputValues%'
                OR categories.CategoryName LIKE '%$inputValues%'
              GROUP BY wikis.WikiID
              ORDER BY wikis.CreatedAt DESC";
    $result = $this->db->query($sql_query);

    $output = "";
    $row_count = $result->rowCount();

    if ($row_count > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $output .= ' <a href="show.php?wiki_id='. $row['WikiID'] . '" class="link ag-courses-item_link">
                                ' . $row["Title"] . '<br> </a> </div>';
        }

    } else {
        $output .= 'Aucun wiki trouvé pour cet utilisateur dans la base de données.';
    }
    echo $output;
}

}
?>