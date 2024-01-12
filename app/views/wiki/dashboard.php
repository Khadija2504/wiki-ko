<?php
require "../../../config/database.php";
require "../../models/User.php";
require "../../models/Wiki.php";
require "../../models/Category.php";
require "../../models/Tag.php";
if (!isset($_SESSION['data'])) {
    header('Location: ../../views/auth/sign.php');
    exit();
}
$user = new User(Database::connect());
$data = new Wiki();
$database = new Database();
$cat = new Category();
$tagModel = new Tag();
$user->logout();
$result = $data->wikis();
$db = $database->connect();
$categories = $cat->category();
$userData = $_SESSION['data'];
$userID = $userData['UserID'];

$myWiki = $data->mywikis($userID);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_username'])) {
    $newUsername = $_POST['new_username'];
    $newEmail = $_POST['new_email'];
    $newAboutMe = $_POST['new_aboutMe'];

    $user->editProfile($newUsername, $newEmail, $newAboutMe, $userID);
}
$category = $cat->category();
$tags = $tagModel->tags();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $categoryID = $_POST['category'];
    $selectedTags = isset($_POST['tags']) ? $_POST['tags'] : [];

    $wikiID = $data->addWiki($title, $content, $userID, $categoryID);

    $data->addTagsToWiki($wikiID, $selectedTags);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_wiki'])) {
    $wikiID = $_POST['wiki_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $categoryID = $_POST['category'];

    $data->updateWiki($wikiID, $title, $content, $categoryID);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>WIKI-KO</title>
    <link rel='stylesheet' href='https://rawcdn.githack.com/SochavaAG/example-mycode/master/_common/css/reset.css'>
    <link rel="stylesheet" href="../../../public/css/cards.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- Bootstrap JS with Popper.js and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-/r/x+qnKQXRSwHVb/Q5U7AuQibJtVsdA5T1IK5ntvWtjLYSD+SIcAqpsY5XWfRQ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-omE8ExHRA5lczMouZXFLhZYwsyowDtd9mZJrbSdQSH+3Vd/kb9LpFq6pfPV8ai5b" crossorigin="anonymous"></script>

    <style>
        .btn-outline {
            border-color: #fff;
        }
        .btn-outline:hover {
            background-color: linear-gradient(to right, #FF4B2B, #FF416C);
        }
        .btn {
            color: #fff;
        }
        .btn:hover {
            border-color: #fff;
            color: linear-gradient(to right, #FF4B2B, #FF416C);
        }
        .list li a {
            color: beige;
            padding-left: 40px;
        }
        .login {
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            color: #FF416C;
            text-decoration: none;
            border: none;
        }
        .login:hover {
            color: #fff;
            background-color: #000;
        }
        .nav-link{
          font-size: 20px;
        }
        .form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }
        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }
        p{
            font-size: 20px;
        }
        .headturbo{
          background-color: #000;
          min-height: 600px;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          text-align: center;
        }
        .premiumBox h1{
          color: #FF416C;
        }
        .premiumBox h3{
          color: #fff;
        }
        .category{
          background-color: #ffeaf1bd;
        }
        .polygonca{
            background-color: #f6d0ddbd;
        }
        .modal {
            width: 50%;
            left: 50%;
        }
    </style>
</head>

<body>
<header style="background: linear-gradient(to right, #FF4B2B, #FF416C);">
    <nav class="navbar navbar-expand-lg navbar-scroll  shadow-0 border-bottom ">
        <div class="container">

            <div class="input-group w-50 ms-md-4 ">
                <input type="search" id="myInput" class="form-control rounded" placeholder="Search"
                       aria-label="Search" aria-describedby="search-addon"/>
                <button type="button" class="btn btn-outline" data-mdb-ripple-init><i
                            class="bi bi-search"></i></button>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <i class=" text-light bi bi-list"></i>
            </button>
            <nav class="list">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About wiki-ko</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Category</a>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn nav-link" href="#" data-toggle="modal" data-target="#editProfileModal">
                                Profile
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>
            <div>
            <form method="post" action="">
                <input type="submit"  class="login" name="logout" value="Logout">
            </form>
            </div>
        </div>
    </nav>
</header>

<section class="headturbo">
  <div class="texture-overlay"></div>
    <div class="premiumBox">
      <h1><b>Welcome in WIKI-KO!</b></h1>
      <h3>the best place where you can <br>looking for your favore articals easly..</h3>
    </div>
</section>
<svg preserveAspectRatio="none" version="1.1" width="100%" height="48" viewBox="0 0 1600 48" style="width:100%; float:left; margin-bottom: 40px;"><polygon class="polygon" points="1600,0 0,0 0,48  "></polygon></svg>

<header style="background: linear-gradient(to right, #FF4B2B, #FF416C); height: 130px;">

</header>

<header class="sticky-sm-top" style="background: linear-gradient(to right, #FF4B2B, #FF416C);">
    <nav class="navbar navbar-expand-lg navbar-scroll  shadow-0 border-bottom ">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <i class=" text-light bi bi-list"></i>
            </button>
            <nav class="list">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <button type="button" class="btn nav-link" href="#" data-toggle="modal" data-target="#myWiki">
                                tags list
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn nav-link" href="#" data-toggle="modal" data-target="#myWiki">
                                categories list
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn nav-link" href="#" data-toggle="modal" data-target="#prof">
                                Add categories
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn nav-link" href="#" data-toggle="modal" data-target="#prof">
                                Add tags
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>
            <div>
            <form method="post" action="">
                <input type="submit"  class="login" name="logout" value="Logout">
            </form>
            </div>
        </div>
    </nav>
</header>

<div class="category ag-courses_box" style="width: 100%;">
    <?php
    if ($category->rowCount()>0){
        foreach ($category as $category){
        ?>

            <div class="ag-courses_item">
                <a href="show_category_wikis.php?category_id=<?php echo $category['CategoryID']; ?>" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">
                        <?php
                        echo $category["CategoryName"] . "<br>";
                        ?>
                    </div>
                </a>
            </div>

        <?php
        }
    }
    ?>
</div>

<div class="ag-courses_box">
    <?php
    if ($result->rowCount() > 0) {
        foreach ($result as $row) {
    ?>
            <div class="ag-courses_item">
                <a href="show.php?wiki_id=<?php echo $row['WikiID']; ?>" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">
                        <?php
                        echo $row["Title"] . "<br>";
                        echo '<p class="">' . substr($row["Content"], 0, 40) . '...</p>' . '<br>';
                        echo "By " . $row["AuthorName"] . "<br>";
                        echo '<p class="">' . $row["CategoryName"] . '</p>' . "<br>";
                        ?>
                    </div>
                    <div class="ag-courses-item_date-box">
                        Create at:
                        <span class="ag-courses-item_date">
                            <?php echo $row["CreatedAt"] . "<br>"; ?>
                        </span>
                    </div>
                </a>
            </div>
    <?php
        }
    } else {
        echo "Aucun wiki trouvé pour cet utilisateur dans la base de données.";
    }
    ?>
</div>

<!-- update profile form -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Hello In Your Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="" class="form"><br>
                        <label for="new_username">Username:</label>
                        <input type="text" id="new_username" name="new_username" value="<?php echo $userData['Username']; ?>" required><br>

                        <label for="new_email">Email:</label>
                        <input type="email" id="new_email" name="new_email" value="<?php echo $userData['Email']; ?>" required><br>

                        <label for="new_email">About You:</label>
                        <input type="text" id="new_aboutMe" name="new_aboutMe" value="<?php echo $userData['aboutMe']; ?>" required><br>

                        <input type="submit" class="btn login" value="Save Changes">
                    </form>

                </div>
            </div>
        </div>
    </div>
<!-- add wikis form -->
    <div class="modal fade" id="prof" tabindex="-1" role="dialog" aria-labelledby="profLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="container">
                <div class="modal-header">
                <h2>Add Wiki</h2>                    
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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
            </div>
        </div>
    </div>
<!-- my wikis + update wikis form -->
<div class="modal fade" id="myWiki" tabindex="-1" role="dialog" aria-labelledby="myWikisModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 150%">
            <div class="container">
            
                <div class="ag-courses_box_p">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Hello in your Wikis</h5>
                    
                </div>
                    <?php
                    if ($myWiki->rowCount() > 0) {
                        foreach ($myWiki as $myWiki) {
                    ?>
                            <div class="ag-courses_item_p">
                                <div class="ag-courses-item_link">
                                    <div class="ag-courses-item_bg"></div>
                                    <div class="ag-courses-item_title">
                                        <?php
                                        echo $myWiki["Title"] . "<br>";
                                        echo '<p class="">' . substr($myWiki["Content"], 0, 40) . '...</p>';
                                        echo '<p class="">' . $myWiki["CategoryName"] . '</p>';
                                        ?>
                                    </div>
                                    <div class="ag-courses-item_date-box">
                                        Create at:
                                        <span class="ag-courses-item_date">
                                            <?php echo $myWiki["CreatedAt"] . "<br>"; ?>
                                        </span>
                                    </div>
                                    <div class="ag-courses-item_date-box">
                                        <a href="updateWiki.php?wiki_id=<?php echo $myWiki['WikiID']; ?>" class="ag-courses-item_date">Edit Wiki</a>
                                    </div>
                                    <div class="ag-courses-item_date-box">
                                        <button class="btn btn-danger" onclick="deleteWiki(<?php echo $myWiki['WikiID']; ?>)">Delete</button>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    } else {
                        echo "Aucun wiki trouvé pour cet utilisateur dans la base de données.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteWiki(wikiID) {
        if (confirm("Are you sure you want to delete this wiki?")) {
            $.ajax({
                type: "POST",
                url: "ho.php",
                data: { wiki_id: wikiID },
                success: function (response) {
                    location.reload();
                },
                error: function (error) {
                    console.error("Error deleting wiki: " + error);
                }
            });
        }
    }
</script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-/r/x+qnKQXRSwHVb/Q5U7AuQibJtVsdA5T1IK5ntvWtjLYSD+SIcAqpsY5XWfRQ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
