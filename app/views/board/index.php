<?php
require "../../../config/database.php";
require "../../models/User.php";
require "../../models/Wiki.php";
require "../../models/Category.php";
require "../../models/Tag.php"; // Add Tag model


if (!isset($_SESSION['data'])) {
    header('Location: ../../views/auth/sign.php');
    exit();
}

$user = new User(Database::connect());
$data = new Wiki();
$database = new Database();
$categoryModel = new Category();
$tagModel = new Tag();

$userData = $_SESSION['data'];
$userID = $userData['UserID'];

// Fetch categories and tags for the form
$categories = $categoryModel->category();
$tags = $tagModel->tags();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $categoryID = $_POST['category'];
    $selectedTags = isset($_POST['tags']) ? $_POST['tags'] : [];

    $wikiID = $data->addWiki($title, $content, $userID, $categoryID);

    $data->addTagsToWiki($wikiID, $selectedTags);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>

    <div class="container">
        <h2>Add Wiki</h2>
        <form method="post" action="">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br>

            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea><br>

            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['CategoryID']; ?>"><?php echo $category['CategoryName']; ?></option>
                <?php endforeach; ?>
            </select><br>

            <label for="tags">Tags:</label>
            <select id="tags" name="tags[]" multiple>
                <?php foreach ($tags as $tag) : ?>
                    <option value="<?php echo $tag['TagID']; ?>"><?php echo $tag['TagName']; ?></option>
                <?php endforeach; ?>
            </select><br>

            <input type="submit" value="Add Wiki">
        </form>
    </div>

</body>


</html>
