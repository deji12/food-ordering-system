<?php

function render_item_details_form(){

    echo '
        <form method="POST" action="../controllers/profile_controller.php">
            <div class="account-details">
                <h5 class="tab-title">Item Details</h5>
                <div class="mb-3">
                    <label for="userName" class="form-label">Item Name</label>
                    <input type="text" class="form-control" name="item_name" id="userName" required>
                </div>
                <div class="mb-3">
                    <label for="userPhone" class="form-label">Content</label>
                    <input type="text" class="form-control" name="content" id="userPhone" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="thumbnail" class="form-label">Image</label>
                    <input type="file" class="form-control" name="thumbnail" accept="image/png, image/jpeg, image/jpg"  id="thumbnail" required>
                </div>
            </div>
            
            <button class="btn btn-primary">Add item</button>
        </form>
    ';
}

function display_message() {

    if (isset($_SESSION["category_added"])) {

        echo '<b><p style="color: dodgerblue;">' . $_SESSION["category_added"] . ' </p></b>';

        unset($_SESSION["category_added"]);

    } 

}