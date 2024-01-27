<?php
// require "../../../config/database.php";
// require "../../models/User.php";
// require "../../models/Wiki.php";
// require "../../models/Category.php";
// require "../../models/Tag.php";
// if (!isset($_SESSION['data'])) {
//     header('Location: ../../views/auth/sign.php');
//     exit();
// }
// $user = new User(Database::connect());
// $data = new Wiki();
// $database = new Database();
// $cat = new Category();
// $tagModel = new Tag();
// $user->logout();
// $result = $data->wikis();
// $db = $database->connect();
// $categories = $cat->category();
// $userData = $_SESSION['data'];
// $userID = $userData['UserID'];

// $myWiki = $data->mywikis($userID);

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_username'])) {
//     $newUsername = $_POST['new_username'];
//     $newEmail = $_POST['new_email'];
//     $newAboutMe = $_POST['new_aboutMe'];

//     $user->editProfile($newUsername, $newEmail, $newAboutMe, $userID);
// }
// $category = $cat->category();
// $tags = $tagModel->tags();

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {
//     $title = $_POST['title'];
//     $content = $_POST['content'];
//     $categoryID = $_POST['category'];
//     $selectedTags = isset($_POST['tags']) ? $_POST['tags'] : [];

//     $wikiID = $data->addWiki($title, $content, $userID, $categoryID);

//     $data->addTagsToWiki($wikiID, $selectedTags);
// }

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_wiki'])) {
//     $wikiID = $_POST['wiki_id'];
//     $title = $_POST['title'];
//     $content = $_POST['content'];
//     $categoryID = $_POST['category'];

//     $data->updateWiki($wikiID, $title, $content, $categoryID);
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>WIKI-KO</title>
    <link rel='stylesheet' href='https://rawcdn.githack.com/SochavaAG/example-mycode/master/_common/css/reset.css'>
    <link rel="stylesheet" href="../../public/css/cards.css">
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
        .search-bar{
            background-color: #c8c8c8;
            border-radius: 10px;
            position: absolute;
            z-index: 1012;
            max-height: 300px;
            overflow: hidden;
            overflow-y: scroll;
        }
        .link{
            color: #ff6983;
            padding: 3px 20px;
        }
        label {
            color: #000;
        }

        select, textarea, input[type="text"] {
            color: #000;
        }
    </style>
</head>

<body>
<header style="background: linear-gradient(to right, #FF4B2B, #FF416C);">
    <nav class="navbar navbar-expand-lg navbar-scroll  shadow-0 border-bottom ">
        <div class="container">

        <div>
                <div class="input-group w-50 ms-md-4 ">
                    <input type="search" id="myInput" class="form-control rounded" placeholder="Search"
                        aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" class="btn btn-outline-primary" data-mdb-ripple-init><i
                            class="bi bi-search"></i></button>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class=" text-light bi bi-list"></i>
                </button>
                <div id="result" class="search-bar w-60"></div>
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
                            <a class="nav-link" href="about.php">About wiki-ko</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" class="btn nav-link" href="#" data-toggle="modal" data-target="#more">Category</a>
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
                                My wikis
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn nav-link" href="#" data-toggle="modal" data-target="#prof">
                                
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn nav-link" href="#" data-toggle="modal" data-target="#prof">
                                Add wiki
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
    foreach ($wiki['Categorie'] as $category){
        ?>
            <div class="ag-courses_item">
                <a href="showWikiCatCONtroller.php?category_id=<?php echo $category->getCategoryID(); ?>" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">
                        <?php
                        echo $category->getCategoryName() . "<br>";
                        ?>
                    </div>
                </a>
            </div>
        <?php
        }
    ?>
</div>
<div class="more ag-courses_item" style="display: flex; justify-content: center;">
    <button type="button" class="ag-courses-item_link" style="width: 20%; height: 100px; display: flex; justify-content: center; border-radius: 25px; background-color: #f84161;" href="#" data-toggle="modal" data-target="#more">
        <div class="ag-courses-item_bg" style="background-color: #141414;"></div>
        <div class="ag-courses-item_title">
            Show more<br>
        </div>
    </button>
</div>

<div class="ag-courses_box">
    <?php
    // var_dump($wiki['wiki']);
    foreach ($wiki['wiki'] as $row) {
    ?>
            <div class="ag-courses_item">
                <a href="showWikiController.php?wiki_id=<?php echo $row->getIdwiki(); ?>" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">
                        <?php
                        echo $row->getTitle() . "<br>";
                        echo '<p class="">' . substr($row->getContent(), 0, 40) . '...</p>' . '<br>';
                        echo "By " . $row->getAuthor()->getUsername() . "<br>";
                        echo '<p class="">' . $row->getCategory()->getCategoryName() . '</p>' . "<br>";
                        ?>
                    </div>
                    <div class="ag-courses-item_date-box">
                        Create at:
                        <span class="ag-courses-item_date">
                            <?php echo $row->getDateCreation() . "<br>"; ?>
                        </span>
                    </div>
                </a>
            </div>
    <?php
    }
    ?>
</div>
<!-- footer -->
<div class="row" style="--bs-gutter-x: 0.5rem;">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card" style="background-color: #000000; padding-bottom: 50px; color: #ff7189;">
      <div class="card-body">
        <h5 class="card-title">About Wiki-ko!</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary" style="background-color: #ff4848; color: #fbf5f5;">Read more</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
  <div class="card" style="background-color: #000000; padding-bottom: 50px; color: #ff7189;">
      <div class="card-body">
        <h5 class="card-title">More categories..</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary" style="background-color: #ff4848; color: #fbf5f5;">Read more</a>
      </div>
    </div>
  </div>
</div>
<!-- more categories -->
<div class="modal fade" id="more" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true" style="width: 95%; left: 0; margin-top: 30px; margin-left: 30px;">
        <div class="" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Hello In Your Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <?php
    foreach ($wiki['catego'] as $category){
        ?>

            <div class="ag-courses_item">
            <a href="showWikiCatController.php?category_id=<?php echo $category->getCategoryID(); ?>" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">
                        <?php
                        echo $category->getCategoryName() . "<br>";
                        ?>
                    </div>
                </a>
            </div>

        <?php
        }
    ?>

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
                <div class="modal-body">
            <form method="post" action="" class="form"><br>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br>

            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea><br>

            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <?php foreach ($wiki['categoriess'] as $category) : ?>
                    <option value="<?php echo $category->getCategoryID() ?>"><?php echo $category->getCategoryName() ?></option>
                <?php endforeach; ?>
            </select><br>

            <label for="tags">Tags:</label>
            <select id="tags" name="tags[]" multiple>
                <?php foreach ($wiki['tag'] as $tag) : ?>
                    <option value="<?php echo $tag->getTagID() ?>"><?php echo $tag->getTagName(); ?></option>
                <?php endforeach; ?>
            </select><br>

            <input type="submit" class="btn login" value="Add Wiki">
        </form>
        </div>
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
                        foreach ($wiki['myWikis'] as $myWiki) {
                    ?>
                            <div class="ag-courses_item_p">
                                <div class="ag-courses-item_link">
                                    <div class="ag-courses-item_bg"></div>
                                    <div class="ag-courses-item_title">
                                        <?php
                                        echo $myWiki->getTitle() . "<br>";
                                        echo '<p class="">' . substr($myWiki->getContent(), 0, 40) . '...</p>';
                                        echo '<p class="">' . $myWiki->getCategory()->getCategoryName() . '</p>';
                                        ?>
                                    </div>
                                    <div class="ag-courses-item_date-box">
                                        Create at:
                                        <span class="ag-courses-item_date">
                                            <?php echo $myWiki->getDateCreation() . "<br>"; ?>
                                        </span>
                                    </div>
                                    <div class="ag-courses-item_date-box">
                                        <a href="updateWikiController.php?wiki_id=<?php echo $myWiki->getIdwiki(); ?>" class="ag-courses-item_date">Edit Wiki</a>
                                    </div>
                                    <div class="ag-courses-item_date-box">
                                        <button class="btn btn-danger" onclick="deleteWiki(<?php echo $myWiki->getIdwiki(); ?>)">Delete</button>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-/r/x+qnKQXRSwHVb/Q5U7AuQibJtVsdA5T1IK5ntvWtjLYSD+SIcAqpsY5XWfRQ" crossorigin="anonymous"></script>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myInput').on('keyup', function() {
                let inputValue = this.value;
                let outputDiv = "#result";
                if (inputValue != "") {
                    $.ajax({
                        url: "",
                        data: {
                            'input': inputValue
                        },
                        dataType: "html",
                        type: "POST",
                        success: function(response) {
                            $(outputDiv).empty().html(response);
                        }
                    });
                } else {
                    let msg = "";
                    $('.errMsg').text(msg);
                    $(outputDiv).empty();
                }
            });
        });
    </script>
</body>

</html>
