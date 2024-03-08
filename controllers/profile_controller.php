<?php

// ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    $house_address = $_POST["house_address"];
    $building_name = $_POST["building_name"];
    $house_number = $_POST["house_number"];

    try {

        require_once '../User/UserAuthentication.php';

        $user = new User();

        $updated = 0;

        if ($username && $username !== $_SESSION["user"]["user_name"]) {
            $user->set_name($username);
            $updated = 1;
        }
        if ($phone && $phone !== $_SESSION["user"]["phone"]) {
            $user->set_phone($phone);
            $updated = 1;
        }
        if ($email && $email !== $_SESSION["user"]["email"]) {
            $user->set_email($email);
            $updated = 1;
        }
        if ($password && $confirm_password) {
            $user->set_authenticated_user_password($password, $confirm_password);
        }
        if ($house_address && $house_address !==  $_SESSION["user"]["user_address"]) {
            $user->set_address($house_address);
            $updated = 1;
        }
        if ($building_name && $building_name !==  $_SESSION["user"]["building_name"]) {
            $user->set_building_name($building_name);
            $updated = 1;
        }
        if ($house_number && $house_number !==  $_SESSION["user"]["house_number"]) {
            $user->set_house_number(intval($house_number));
            $updated = 1;
        }

        if ($updated > 0) {$_SESSION["profile_update_success"] = "Profile updated successfully";}
        header("Location: ../templates/profile.php");
        die();

    } catch (PDOException $e) {
        die($e->getMessage());
    }

} else {
    header("Location: ../templates/profile.php");
    die();
}