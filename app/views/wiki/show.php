<?php
require "../../../config/database.php";
$data = new Database();
$sql = "SELECT * FROM wikis";
$result = $data->connect()->query($sql);

if ($result->rowCount() > 0) {
    while ($row = $result->fetch()) {
        echo "WikiID : " . $row["WikiID"] . "<br>";
        echo "Titre : " . $row["Title"] . "<br>";
        echo "Contenu : " . $row["Content"] . "<br>";
        echo "Auteur : " . $row["AuthorID"] . "<br>";
        echo "Catégorie : " . $row["CategoryID"] . "<br>";
        echo "Date de création : " . $row["CreatedAt"] . "<br>";
        echo "Archivé : " . ($row["Archived"] ? "Oui" : "Non") . "<br><br>";
    }
} else {
    echo "Aucun wiki trouvé dans la base de données.";
}

?>
