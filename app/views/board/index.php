<?php
require "../../../config.php";
require "../../../config/database.php";
require "../../models/Wiki.php";
require "../../controllers/WikiController.php";

 $wiki = new Wiki();
 $wikis = $wiki->wikis();

 foreach($wikis as $w){
    echo $w->gettitle();
    echo $w->getcontent();
 }
?>