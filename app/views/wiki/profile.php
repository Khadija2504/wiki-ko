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