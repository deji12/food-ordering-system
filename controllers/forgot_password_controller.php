<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST["email"];

    try {

        require_once '../User/UserAuthentication.php';

        $user = new User();
            
        $user->reset_password($email);

    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

} else {

    header("Location: ../templates/login.php");
    die();

}