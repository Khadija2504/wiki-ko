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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-/r/x+qnKQXRSwHVb/Q5U7AuQibJtVsdA5T1IK5ntvWtjLYSD+SIcAqpsY5XWfRQ" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-omE8ExHRA5lczMouZXFLhZYwsyowDtd9mZJrbSdQSH+3Vd/kb9LpFq6pfPV8ai5b" crossorigin="anonymous"></script> -->

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
<div class="ag-courses_box">
<?php
if (isset($wikis) && !empty($wikis)) {
    foreach ($wikis as $row) {
        ?>
            <div class="ag-courses_item">
            <a href='showWikiD.php?wiki_id=<?=$row->getIdwiki(); ?>' class='ag-courses-item_link'>
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">
                        <?php
                        echo $row->getTitle() . "<br>";
                        echo '<p class="">' . substr($row->getcontent(), 0, 40) . '...</p>' . '<br>';
                        echo "By " . $row->getauthor() . "<br>";
                        echo '<p class="">' . $row->getcategory() . '</p>' . "<br>";
                        ?>
                    </div>
                    <div class="ag-courses-item_date-box">
                        Create at:
                        <span class="ag-courses-item_date">
                            <?php echo $row->getdateCreation() . "<br>"; ?>
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
<!-- modal profile -->
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-/r/x+qnKQXRSwHVb/Q5U7AuQibJtVsdA5T1IK5ntvWtjLYSD+SIcAqpsY5XWfRQ" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
