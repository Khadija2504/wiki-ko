<?php
require "../../../config/database.php";

require "../../controllers/WikiController.php";
require "../../models/Wiki.php";
require "../../models/Category.php";

$data = new Wiki();
$database = new Database();
$cat = new Category();
$result = $data->wikis();
$db = $database->connect();
$category = $cat->category();
?>

<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>wiki-ko</title>
    <link rel='stylesheet' href='https://rawcdn.githack.com/SochavaAG/example-mycode/master/_common/css/reset.css'>
    <link rel="stylesheet" href="../../../public/css/cards.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monofett&display=swap" rel="stylesheet">
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
        }

        .login:hover {
            color: #fff;
            background-color: #000;
        }
        .nav-link{
          font-size: 20px;
        }
        .logo{
          font-family: Rubik Doodle Shadow;
          font-size: 30px;
          color: aliceblue;
        }
        .headturbo{
          background-color: #000;
          min-height: 500px;
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
          background-color: #c8c8c8;
        }
    </style>
</head>

<body>
<header style="background: linear-gradient(to right, #FF4B2B, #FF416C);">
    <nav class="navbar navbar-expand-lg navbar-scroll  shadow-0 border-bottom ">
        <div class="container">

            <div class="logo">WIKI-KO</div>
            <form class="search" method="post" action="search.php" id="form">
            <div class="input-group w-50 ms-md-4 ">
                <input type="search" name="word" id="form1" class="form-control rounded" placeholder="Search"
                       aria-label="Search" aria-describedby="search-addon"/>
                <button name="search" type="button" class="btn btn-outline" data-mdb-ripple-init><i
                            class="bi bi-search"></i></button>
            </div>
            </form>
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
                    </ul>
                </div>
            </nav>
            <div>
                <a href="../auth/sign.php" class="login">Login</a>
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

<div class="ag-courses_box" style="width: 100%;">
    <?php
    if ($category->rowCount()>0){
        foreach ($category as $category){
        ?>
              <div class="category ag-courses_item">
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


<div class="container text-center">
  <div class="row">
    <div class="col-sm-8"></div>
    <div class="col-sm-4"></div>
  </div>
  <div class="row">
    <div class="col-sm"></div>
    <div class="col-sm"></div>
    <div class="col-sm"></div>
  </div>
</div>
<div class="ag-courses_box">
    <?php
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            ?>
            <div class="ag-courses_item">

            <a href="show.php?wiki_id=<?php echo $row['WikiID']; ?>" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        <?php
                        echo "Titre : " . $row["Title"] . "<br>";
                        echo "Auteur : " . $row["AuthorName"] . "<br>";
                        echo "Catégorie : " . $row["CategoryName"] . "<br>";
                        ?>
                    </div>

                    <div class="ag-courses-item_date-box">
                        Create at:
                        <span class="ag-courses-item_date">
                        <?php
                        echo $row["CreatedAt"] . "<br>";
                        ?>
                    </span>
                    </div>
                </a>

            </div>
            <?php
        }
    } else {
        echo "Aucun wiki trouvé dans la base de données.";
    }
    ?>
</div>

</body>
</html>
