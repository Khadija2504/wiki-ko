<?php
// ho.php
require "../../../config/database.php";
require "../../models/Wiki.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $wikiIDToDelete = $_POST['wiki_id'];
    $deletionResult = $data->deleteWiki($wikiIDToDelete);

    if ($deletionResult) {
        echo "Wiki deleted successfully!";
    } else {
        echo "Failed to delete wiki.";
    }
}
?>