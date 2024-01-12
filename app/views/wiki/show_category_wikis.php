<?php
require "../../../config/database.php";
require "../../models/Wiki.php";
require "../../models/Category.php";

$data = new Wiki();
$cat = new Category();
$database = new Database();

if (isset($_GET['category_id'])) {
    $categoryID = (int)$_GET['category_id'];

    $categoryName = $cat->getCategoryName($categoryID);

    $catego = $data->getWikisByCategory($categoryID);
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Wikis in <?php echo $categoryName; ?></title>
    </head>

    <body>
        <h1>Wikis in <?php echo $categoryName; ?></h1>

        <?php
        if ($catego->rowCount() > 0) {
            foreach ($catego as $wiki) {
                echo '<h2>' . $wiki['Title'] . '</h2>';
                echo '<p>' . $wiki['Content'] . '</p>';
                echo '<p>Author: ' . $wiki['AuthorName'] . '</p>';
                echo '<p>Created at: ' . $wiki['CreatedAt'] . '</p>';
                echo '<hr>';
            }
        } else {
            echo '<p>No wikis found for this category.</p>';
        }
        ?>


    </body>

    </html>

<?php
}
?>
