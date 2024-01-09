<?php
session_start();

if (!isset($_SESSION['data'])) {
    header('Location: ../../views/auth/sign.php');
    exit();
}
require "../../../config/database.php";
$database = new Database();
$db = $database->connect();
// Get the user's current data
$userData = $_SESSION['data'];
$userID = $userData['UserID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission
    $newUsername = $_POST['new_username'];
    $newEmail = $_POST['new_email'];

    // Update user information in the database
    $sql = "UPDATE users SET Username = :newUsername, Email = :newEmail WHERE UserID = :userID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':newUsername', $newUsername);
    $stmt->bindParam(':newEmail', $newEmail);
    $stmt->bindParam(':userID', $userID);
    $stmt->execute();

    // Update session data with the new information
    $_SESSION['data']['Username'] = $newUsername;
    $_SESSION['data']['Email'] = $newEmail;

    echo "Profile updated successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

    <h1>Edit Profile</h1>

    <!-- Button to trigger the modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">
        Open Edit Profile
    </button>

    <!-- Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- Form inside the modal -->
                    <form method="post" action="">
                        <label for="new_username">New Username:</label>
                        <input type="text" id="new_username" name="new_username" value="<?php echo $userData['Username']; ?>" required>

                        <label for="new_email">New Email:</label>
                        <input type="email" id="new_email" name="new_email" value="<?php echo $userData['Email']; ?>" required>

                        <input type="submit" class="btn btn-primary" value="Save Changes">
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
