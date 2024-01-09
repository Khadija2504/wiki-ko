<?php
require "../../models/Wiki.php";
$data = new Wiki();
$result = $data->wikis();
?>

<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>CodePen - Item Card Hover Effect</title>
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
    </style>
</head>

<body>
<header style="background: linear-gradient(to right, #FF4B2B, #FF416C);">
    <nav class="navbar navbar-expand-lg navbar-scroll  shadow-0 border-bottom ">
        <div class="container">

            <div class="logo">WIKI-KO</div>
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
                    </ul>
                </div>
            </nav>
            <div>
                <a href="../auth/sign.php" class="login">Login</a>
            </div>
        </div>
    </nav>
</header>
<div class="ag-courses_box">
    <?php
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            ?>
            <div class="ag-courses_item">

                <a href="#" class="ag-courses-item_link">
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
