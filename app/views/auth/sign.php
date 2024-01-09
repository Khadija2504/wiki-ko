<?php
require "../../models/User.php";
require "../../../config/database.php";
$user = new User(Database::connect());

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $user->register($_POST['Username'], $_POST['Email'], $_POST['Password'], $_POST['aboutMe']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $user->login($_POST['loginUsername'], $_POST['loginPassword']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in/up Form</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h1>Create Account</h1>

            <input type="text" name="Username" placeholder="Username" required>

            <input type="Email" name="Email" placeholder="Email" required>

            <input type="password" name="Password" placeholder="Mot de passe" required>

            <input type="text" name="aboutMe" placeholder="tell us about you" required>

            <button type="submit" name="register">S'inscrire</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h1>Sign in</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your account</span>
            <input type="text" name="loginUsername" placeholder="Username" required>

            <input type="password" name="loginPassword" placeholder="Mot de passe" required>

            <button type="submit" name="login">Se Connecter</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start the journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>
<script  src="../../../public/js/script.js"></script>
</body>
</html>
