<div class="modal fade" id="prof" tabindex="-1" role="dialog" aria-labelledby="profLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="container">
                <div class="modal-header">
                <h2>Add Wiki</h2>                    
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <form method="post" action="">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br>

            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea><br>

            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['CategoryID']; ?>"><?php echo $category['CategoryName']; ?></option>
                <?php endforeach; ?>
            </select><br>

            <label for="tags">Tags:</label>
            <select id="tags" name="tags[]" multiple>
                <?php foreach ($tags as $tag) : ?>
                    <option value="<?php echo $tag['TagID']; ?>"><?php echo $tag['TagName']; ?></option>
                <?php endforeach; ?>
            </select><br>

            <input type="submit" value="Add Wiki">
        </form>
    </div>
            </div>
        </div>
    </div>