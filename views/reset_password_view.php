<?php

session_start();

function display_message(){
    if (isset($_SESSION["reset_password_error"])) {

        $errors = $_SESSION["reset_password_error"];

        // render error messages
       foreach($errors as $error){
        echo '<p style="color: firebrick;">' . $error . ' </p>';
       }

        // remove error messages from session after rendering
        unset($_SESSION["reset_password_error"]);
    }
    else {
        echo "<p>Passwords must be the same and greater than or equal to 5 characters</p>";
    }
}