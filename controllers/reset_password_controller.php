<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    try {

        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $reset_id = $_GET["reset_id"];

        require_once '../User/UserAuthentication.php';

        $user = new User();
        $user->set_password($reset_id, $password, $confirm_password);

    } catch (PDOException $e) {

        die($e->getMessage());

    }

} else {
    header("Location: ../templates/index.php");
    die();
}