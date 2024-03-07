<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    try {

        $email = $_POST["email"];
        $password = $_POST["password"];

        require_once '../User/UserAuthentication.php';

        $validate_login_details = new Authenticate();
        $validate_login_details->login($email, $password);      


    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

} else {
    header("Location: ../templates/login.php");
    die();
}