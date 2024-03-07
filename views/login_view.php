<?php

session_start();

function display_message(){
    if (isset($_SESSION["login_errors"])) {

        $errors = $_SESSION["login_errors"];

        // render error messages
        foreach ($errors as $error) {

            echo '<p style="color: firebrick;">' . $error . ' </p>';

        }

        // remove error messages from session after rendering
        unset($_SESSION["login_errors"]);
    }
}