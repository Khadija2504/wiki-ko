<?php
require "../../../config/database.php";
require "../../models/User.php";
if (!isset($_SESSION['data'])) {
    header('Location: ../../views/auth/sign.php');
    exit();
}
$user = new User(Database::connect());
$data = new Database();
$user->logout();
$userData = $_SESSION['data'];

$username = $userData['Username'];
$email = $userData['Email'];
$aboutMe = $userData['aboutMe'];

$userID = $userData['UserID'];

$sql = "SELECT wikis.*, users.Username AS AuthorName, categories.CategoryName
        FROM wikis
        INNER JOIN users ON wikis.AuthorID = users.UserID
        INNER JOIN categories ON wikis.CategoryID = categories.CategoryID
        WHERE wikis.AuthorID = :userID";

$stmt = $data->connect()->prepare($sql);
$stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - Item Card Hover Effect</title>
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
                            <a class="nav-link" style="color: #000;" href="#">Profile</a>
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
        if (count($result) > 0) {
            foreach ($result as $row) {
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
</body>

</html>
