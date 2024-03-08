<?php

if (isset($_GET["reset_from_profile"])) {

    session_start();
    session_unset();
    session_destroy();

    session_start();
    $_SESSION["password_reset_success"] = "Password reset successfully. Login with new password";

    header("Location: ../templates/login.php");
    die();

} else {
    session_start();
    session_unset();
    session_destroy();

    header("Location: ../templates/login.php");
    die();
}