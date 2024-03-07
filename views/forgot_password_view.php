<?php

session_start();

function display_message(){
    if (isset($_SESSION["email_does_not_exist_on_reset"])) {

        $error = $_SESSION["email_does_not_exist_on_reset"];

        // render error messages
        echo '<p style="color: firebrick;">' . $error . ' </p>';

        // remove error messages from session after rendering
        unset($_SESSION["email_does_not_exist_on_reset"]);
    } 
    if (isset($_SESSION["email_reset_reset"])) {

        $message = $_SESSION["email_reset_reset"];

        echo '<p>' . $message . ' </p>';

        unset($_SESSION["email_reset_reset"]);

    }
    else {
        echo "<p>Enter your email address below and we'll send you a link to reset your password.</p>";
    }
}