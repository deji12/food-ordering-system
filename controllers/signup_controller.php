<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    try {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        require_once '../User/UserAuthentication.php';

        $validate_details_and_create_user = new Authenticate();
        $validate_details_and_create_user->signup($name, $email, $password, $confirm_password);


    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

} else {
    header("Location: ../templates/signup.php");
    die();
}