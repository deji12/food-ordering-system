<?php

function render_account_details_form(){

    echo '
        <form method="POST" action="../controllers/profile_controller.php">
            <div class="account-details">
                <h5 class="tab-title">Account Details</h5>
                <div class="mb-3">
                    <label for="userName" class="form-label">Name</label>
                    <input type="text" class="form-control" value="' . $_SESSION["user"]["user_name"] . '" name="username" id="userName" required>
                </div>
                <div class="mb-3">
                    <label for="userPhone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" value="' . $_SESSION["user"]["phone"] . '" name="phone" id="userPhone" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" value="' . $_SESSION["user"]["email"] .  '" name="email" id="email" required>
                </div>
            </div>
            <!-- password-change -->
            <div class="password-change">
                <h5 class="tab-title">Change Password</h5>
                <div class="mb-3">
                    <label for="newPass" class="form-label">New Password</label>
                    <input type="password" name="password" class="form-control" id="newPass">
                </div>
                <div class="mb-3">
                    <label for="conPass" class="form-label">Confirm New Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="conPass">
                </div>
            </div>
            <button class="btn btn-primary">Save Changes</button>
        </form>
    ';

}

function render_billing_address() {

    echo '
        <div class="col-lg-6">
            <h5 class="tab-title">Billing Address</h5>
            <ul>
                <li>' . ($_SESSION["user"]["user_address"] ?? 'House Address') . '</li>
                <li>' . ($_SESSION["user"]["building_name"] ?? 'Building Name') . '</li>
                <li>' . ($_SESSION["user"]["house_number"] ?? 'Apartment Number') . '</li>
                
                <li><a href="#" class="edit-address">Edit</a></li>
            </ul>
        </div>
';
}

function render_billing_address_form(){

    echo '
        <form method="POST" action="../controllers/profile_controller.php">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="tab-title">House Address</h5>
                    <div class="mb-3">
                        <label for="billing-address-1" class="form-label">Address</label>
                        <input type="text" class="form-control" name="house_address" id="billing-address-1" value="' . $_SESSION["user"]["user_address"] . '" required>
                    </div>
                    <div class="mb-3">
                        <label for="billing-address-2" class="form-label">Building name</label>
                        <input type="text" class="form-control" name="building_name" id="billing-address-2" value="' . $_SESSION["user"]["building_name"] . '" required>
                    </div>
                    <div class="mb-3">
                        <label for="billing-town" class="form-label">Apartment Number</label>
                        <input type="number" class="form-control" name="house_number" id="billing-town" value="' . $_SESSION["user"]["house_number"] . '" required>
                    </div>
                </div>
                
            </div>
            <button class="btn btn-primary">Save</button>
            <button class="btn btn-primary" id="back-btn">Back</button>
        </form>';

}

function display_message() {
    
    if (isset($_SESSION["profile_password_change_error"])) {

        $errors = $_SESSION["profile_password_change_error"];

        foreach($errors as $error) {
            echo '<b><p style="color: firebrick;">' . $error . ' </p></b>';
        }

        unset($_SESSION["profile_password_change_error"]);

    }

    if (isset($_SESSION["profile_update_success"])) {

        echo '<b><p style="color: dodgerblue;">' . $_SESSION["profile_update_success"] . ' </p></b>';

        unset($_SESSION["profile_update_success"]);

    } 

}