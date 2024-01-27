<?php
// require "../../../config/database.php";

// require "../../controllers/WikiController.php";
// require "../../models/Wiki.php";
// require "../../models/Category.php";

// $data = new Wiki();
// $database = new Database();
// $cat = new Category();
// $result = $data->wikis();
// $db = $database->connect();
// $category = $cat->category();
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
    </style>
</head>

<body>
<header style="background: linear-gradient(to right, #FF4B2B, #FF416C);">
    <nav class="navbar navbar-expand-lg navbar-scroll  shadow-0 border-bottom ">
        <div class="container">

            <div class="logo">WIKI-KO</div>
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
                <a href="AuthController.php" class="login">Login</a>
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
    <div class="errMsg"></div>

<div class="ag-courses_box" style="width: 100%;">
    <?php
    
        foreach ($wiki['Categorie'] as $category){
        ?>
              <div class="category ag-courses_item">
                <a href="show_category_wikis.php?category_id=<?php echo $category->getCategoryID(); ?>" class="ag-courses-item_link">
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
    // }
    ?>
</div>

    <div class="ag-courses_box">
    <?php
foreach ($wiki['wiki'] as $row) {
    // var_dump($row->getTitle());
    echo "Wiki ID: " . $row->getIdwiki() . "<br>";
    echo "Title: " . $row->getTitle() . "<br>";
    echo "Content: " . $row->getContent() . "<br>";

    echo "Author: " . $row->getAuthor()->getUsername() . "<br>";

    echo "Category: " . $row->getCategory()->getCategoryName() . "<br>";

    echo "Date Creation: " . $row->getDateCreation() . "<br>";
    echo "<br>";
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
