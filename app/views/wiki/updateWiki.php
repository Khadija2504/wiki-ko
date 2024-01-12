<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Wiki</title>
</head>
<body>
    <?php
    require "../../../config/database.php";
    require "../../models/Wiki.php";
    require "../../models/Category.php";

    $cat = new Category;
    $data = new Wiki();
    $categories = $cat->category();

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['wiki_id'])) {
        $wikiID = $_GET['wiki_id'];
        $wikiDetails = $data->getWikiDetails($wikiID);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_wiki'])) {
        $wikiID = $_POST['wiki_id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $categoryID = $_POST['category'];

        $data->updateWiki($wikiID, $title, $content, $categoryID);

        header("Location: home.php");
        exit();
    }
    ?>

    <h2>Edit Wiki</h2>
    <form method="post" action="">
        <input type="hidden" name="wiki_id" value="<?php echo $wikiDetails['WikiID']; ?>">

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $wikiDetails['Title']; ?>" required><br>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required><?php echo $wikiDetails['Content']; ?></textarea><br>

        <label for="category">Category:</label>
        <select id="category" name="category" required>
            <?php
            foreach ($categories as $category) :
                $selected = ($category['CategoryID'] == $wikiDetails['CategoryID']) ? 'selected' : '';
            ?>
                <option value="<?php echo $category['CategoryID']; ?>" <?php echo $selected; ?>><?php echo $category['CategoryName']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" name="update_wiki" value="Update Wiki">
    </form>
</body>
</html>
