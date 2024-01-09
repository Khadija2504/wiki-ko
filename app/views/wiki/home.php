<?php
require "../../models/User.php";
require "../../models/Wiki.php";
if (!isset($_SESSION['data'])) {
    header('Location: ../../views/auth/sign.php');
    exit();
}
$user = new User(Database::connect());
$data = new Wiki();
$database = new Database();
$user->logout();
$result = $data->wikis();
$db = $database->connect();
$userData = $_SESSION['data'];
$userID = $userData['UserID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newUsername = $_POST['new_username'];
    $newEmail = $_POST['new_email'];
    $newAboutMe = $_POST['new_aboutMe'];

    $user->editProfile($newUsername, $newEmail, $newAboutMe, $userID);
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
<div class="ag-courses_box">
    <?php
    if ($result->rowCount() > 0) {
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

    <!-- Add Bootstrap JS and jQuery links here -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
