<?php

session_start();

function display_message(){
    if (isset($_SESSION["signup_errors"])) {

        $errors = $_SESSION["signup_errors"];

        // render error messages
        foreach ($errors as $error) {

            echo '<p style="color: firebrick;">' . $error . ' </p>';

        }

        // remove error messages from session after rendering
        unset($_SESSION["signup_errors"]);
    }
}