<?php

function redirect_if_logged_in() {
    if (isset($_SESSION['user'])) {
        header("Location: ../index.php"); 
        exit();
    }
}

function redirect_if_not_logged_in() {
    if (!isset($_SESSION['user'])) {
        header("Location: ../templates/login.php"); 
        exit();
    }
}

