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
          min-height: 250px;
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
        h2 {
            color: #ff1493; /* Pink header text */
        }

        label {
            color: #000; /* Black label text */
        }

        select, textarea, input[type="text"] {
            color: #000; /* Black text */
        }

        input[type="submit"] {
            background-color: #ff1493; /* Pink button background */
            color: #fff; /* White button text */
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
    </div>
</section>
<svg preserveAspectRatio="none" version="1.1" width="100%" height="48" viewBox="0 0 1600 48" style="width:100%; float:left; margin-bottom: 40px;"><polygon class="polygon" points="1600,0 0,0 0,48  "></polygon></svg>

<header style="background: linear-gradient(to right, #FF4B2B, #FF416C); height: 90px;">

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

    <div class="container mt-5">
        <h2>Edit Wiki</h2>
        <form method="post" action="">
            <?php foreach ($wikiDetails['tagsWiki'] as $detailsWiki): ?>
                <input type="hidden" name="wiki_id" value="<?php echo $detailsWiki->getWiki()->getIdwiki(); ?>">

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $detailsWiki->getWiki()->getTitle(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" id="content" name="content" required><?php echo $detailsWiki->getWiki()->getContent(); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="category">Category:</label>
                    <select class="form-control" id="category" name="category" required>
                        <?php foreach ($wiki['catego'] as $category): ?>
                            <option <?php echo ($category->getCategoryID() == $detailsWiki->getWiki()->getCategory()->getCategoryID()) ? 'selected' : ''; ?> value="<?php echo $category->getCategoryID(); ?>">
                                <?php echo $category->getCategoryName(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tag">Tags:</label>
                    <select class="form-control" id="tag" name="tag[]" multiple required>
                        <?php foreach ($wiki['tags'] as $tag): ?>
                            <option value="<?php echo $tag->getTagID(); ?>" <?php echo ($tag->getTagID() == $detailsWiki->getTag()->getTagID()) ? 'selected' : ''; ?>>
                                <?php echo $tag->getTagName(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

            <?php endforeach; ?>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="update_wiki" value="Update Wiki">
            </div>
        </form>
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

