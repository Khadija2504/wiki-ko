<?php
require "../../../config/database.php";
class Wiki{
    public function wikis(){
    $data = new Database();
    $sql = "SELECT wikis.*, users.Username AS AuthorName, categories.CategoryName
            FROM wikis
            INNER JOIN users ON wikis.AuthorID = users.UserID
            INNER JOIN categories ON wikis.CategoryID = categories.CategoryID";
    $result = $data->connect()->query($sql);
    return $result;
    }
}
?>