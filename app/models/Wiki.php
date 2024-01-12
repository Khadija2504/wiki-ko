<?php

class Wiki
{
    public function wikis()
{
    $data = new Database();
    $sql = "SELECT wikis.*, users.Username AS AuthorName, categories.CategoryName
            FROM wikis
            INNER JOIN users ON wikis.AuthorID = users.UserID
            INNER JOIN categories ON wikis.CategoryID = categories.CategoryID
            ORDER BY wikis.CreatedAt DESC
            LIMIT 6";

    $result = $data->connect()->query($sql);
    return $result;
}

public function mywikis($userID)
{
    $data = new Database();
    $sql = "SELECT wikis.*, categories.CategoryName
            FROM wikis
            INNER JOIN users ON wikis.AuthorID = users.UserID
            INNER JOIN categories ON wikis.CategoryID = categories.CategoryID
            WHERE users.UserID = :userID 
            ORDER BY wikis.CreatedAt DESC";
    $stmt = $data->connect()->prepare($sql);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}

    public function getWikiDetails($wikiID)
    {
        $data = new Database();
        $sql = "SELECT wikis.*, users.Username AS AuthorName, categories.CategoryName
            FROM wikis
            INNER JOIN users ON wikis.AuthorID = users.UserID
            INNER JOIN categories ON wikis.CategoryID = categories.CategoryID
            WHERE wikis.WikiID = :wikiID";
        $stmt = $data->connect()->prepare($sql);
        $stmt->bindParam(':wikiID', $wikiID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addWiki($title, $content, $authorID, $categoryID)
    {
        $data = new Database();
        $sql = "INSERT INTO wikis (Title, Content, AuthorID, CategoryID) VALUES (?, ?, ?, ?)";
        $stmt = $data->connect()->prepare($sql);
        $stmt->execute([$title, $content, $authorID, $categoryID]);

        $lastInsertId = $data->connect()->lastInsertId();

        return $lastInsertId;
    }

public function updateWiki($wikiID, $title, $content, $categoryID)
{
    $data = new Database();
    $sql = "UPDATE wikis SET Title = :title, Content = :content, CategoryID = :categoryID WHERE WikiID = :wikiID";
    $stmt = $data->connect()->prepare($sql);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":content", $content);
    $stmt->bindParam(":categoryID", $categoryID);
    $stmt->bindParam(":wikiID", $wikiID);
    $stmt->execute();
}

public function deleteWiki($wikiID)
{
    try {
        $data = new Database();
        $query = "DELETE * FROM wikis WHERE WikiID = :wikiID";
        $stmt = $data->connect()->prepare($query);
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

    public function addTagsToWiki($wikiID, $tagIDs)
{
    $data = new Database();
    foreach ($tagIDs as $tagID) {
        $sql = "INSERT INTO wiki_tags (WikiID, TagID) VALUES (?, ?)";
        $stmt = $data->connect()->prepare($sql);
        $stmt->execute([$wikiID, $tagID]);
    }
    return true;
}

}
?>
