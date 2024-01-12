<?php
require "../../../config/database.php";
require "../../models/User.php";
require "../../models/Wiki.php";

if (!isset($_SESSION['data'])) {
    header('Location: ../../views/auth/sign.php');
    exit();
}

$user = new User(Database::connect());
$data = new Wiki();
$database = new Database();
$db = $database->connect();

if (isset($_GET['wiki_id'])) {
    $wikiID = $_GET['wiki_id'];
    $wikiDetails = $data->getWikiDetails($wikiID);
} else {
    header('Location: ../wiki/home.php');
    exit();
}

$userData = $_SESSION['data'];
$userID = $userData['UserID'];

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
    </style>
</head>
<body>
    <header style="background: linear-gradient(to right, #FF4B2B, #FF416C);">
        <nav class="navbar navbar-expand-lg navbar-scroll  shadow-0 border-bottom ">
            <div class="container">

                <img src="../Image/log.png" alt="logo" class="rounded-4" style="width: 80px; height: 60px;">
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
    <section class="container">
        <div class="right">
            <h1><?php echo $wikiDetails['Title']; ?></h1>
            <p><?php echo $wikiDetails['Content']; ?></p>
        </div>
        <div class="left">
            <p>Author: <?php echo $wikiDetails['AuthorName']; ?></p>
            <p>Category: <?php echo $wikiDetails['CategoryName']; ?></p>
            <p>Created at: <?php echo $wikiDetails['CreatedAt']; ?></p>
        </div>
    </section>
</body>
</html>