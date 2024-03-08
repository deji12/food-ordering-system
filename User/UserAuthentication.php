<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

session_start();

require_once 'UserRepository.php';

class User {
    private $user_id;
    private $name;
    private $address;
    private $email;
    private $phone;
    private $userRepository;
    private $building_name;
    private $house_number;

    public function __construct() {

        require_once '../config/database.php';

        $this->userRepository = new UserRepository($pdo);

        /* automatically assign values to private attributes immediatly new User 
            class is created */


        // getting user information using the UserRepository class
        $user = $this->userRepository->get_user($_SESSION["user"]["email"]);

        // assigning user information to class attributes

        $this->user_id = $user["id"];
        $this->name = $user["user_name"];
        $this->address = $user["user_address"];
        $this->email = $user["email"];
        $this->phone = $user["phone"];
        $this->building_name = $user["building_name"];
        $this->house_number = $user["house_number"];
        
    }

    public function reset_password(string $email) {

        if ($this->userRepository->get_user($email)) {

            require_once '../config/credentials.php';

            $mail = new PHPMailer(true);

            $uid = uniqid();
            $reset_link = "http://localhost/food-commerce/templates/reset-password.php?reset_id=$uid";
            $message = "Reset your password using the link below<br><br>.$reset_link";

            try {

                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
                $mail->isSMTP();                                            
                $mail->Host       = get_email_credentials()["host"];                     
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = get_email_credentials()["host_user"];                    
                $mail->Password   = get_email_credentials()["host_password"];                               
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                $mail->Port       = get_email_credentials()["port"];   

                $mail->setFrom('adesolaayodeji18@gmail.com', 'Mac boy');
                $mail->addAddress($email);     
                $mail->Subject = "Reset Password";

                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Body    = $message;
                $mail->AltBody = $message;

                if ($mail->send()) {

                    // create a new reset password entry
                    $this->userRepository->create_password_reset_token($email, $uid);

                    $_SESSION["reset_uid"] = $uid;
                    $_SESSION["email_reset_reset"] = "We sent a password reset link to the email '<b>$email</b>'. The link is valid for <b>20 minutes</b>.";
                    header("Location: ../templates/password-reset-sent.php?status=sent");
                    die();
                }

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        } else {
            $_SESSION["email_does_not_exist_on_reset"] = "The email '$email' is not registered on our platform";
            header("Location: ../templates/forgot-password.php");
            die();
        }

    }

    private function validate_password_reset(string $password, string $confirm_password): array {

        $errors = [];

        if (empty($password) || empty($confirm_password)) {
            $errors["incomplete_form"] = "Please fill all fields";
        }
        if (strlen($password) < 5) {
            $errors["short_password"] = "Password must be at least 5 characters long";
        }
        if ($password !== $confirm_password) {
            $errors["passwords_unmatch"] = "Passwords do not match";
        }

        return $errors;
    }

    public function set_password(string $reset_id, string $password, string $confirm_password){

        $userResetInfo = $this->userRepository->get_email_from_reset_token_and_check_expiration($reset_id);
        $isExpired = $userResetInfo['expired'];

        if ($userResetInfo && !$isExpired) {

            $validate_user_input = $this->validate_password_reset($password, $confirm_password);
            if (empty($validate_user_input)) {

                $this->userRepository->set_password($userResetInfo["email"], $password);
                $this->userRepository->delete_reset_token($reset_id);
                
                $_SESSION["password_reset_success"] = "Password reset successfully";
                header("Location: ../templates/login.php");
                die();

            } else {
                $_SESSION["reset_password_error"] = $validate_user_input;
                header("Location: ../templates/reset-password.php?reset_id=$reset_id");
                die();
            }

        } else {
            $errors = [];
            $errors["wrong_id_or_expired"] = "Wrong reset id or reset id has expired";
            $_SESSION["reset_password_error"] = $errors;

            header("Location: ../templates/reset-password.php?reset_id=$reset_id");
            die();

        }

    }

    public function set_authenticated_user_password(string $password, string $confirm_password){

        $validate_user_input = $this->validate_password_reset($password, $confirm_password);

        if (empty($validate_user_input)) {
            $this->userRepository->set_password($this->email, $password);
            header("Location: ../templates/logout.php?reset_from_profile=1");
            die();
        } else {
            $_SESSION["profile_password_change_error"] = $validate_user_input;
            header("Location: ../templates/profile.php");
        }

    }

    public function set_address(string $address) {
        $this->address = $address;
        $_SESSION["user"]["user_address"] = $address;
        $this->userRepository->set_address($address, $this->user_id);
    }

    public function set_house_number(int $house_number) {
        $this->house_number = $house_number;
        $_SESSION["user"]["house_number"] = $house_number;
        $this->userRepository->set_house_number($house_number, $this->user_id);
    }

    public function set_building_name(string $building_name) {
        $this->building_name = $building_name;
        $_SESSION["user"]["building_name"] = $building_name;
        $this->userRepository->set_building_name($building_name, $this->user_id);
    }

    public function set_phone(string $phone) {
        $this->phone = $phone;
        $_SESSION["user"]["phone"] = $phone;
        $this->userRepository->set_phone($phone, $this->user_id);
    }

    public function set_name(string $name) {
        $this->name = $name;
        $_SESSION["user"]["user_name"] = $name;
        $this->userRepository->set_name($name, $this->user_id);
    }

    public function set_email(string $email) {
        $this->email = $email;
        $_SESSION["user"]["email"] = $email;
        $this->userRepository->set_email($email, $this->user_id);
    }

    public function get_id(): int {
        return $this->user_id;
    }

    public function get_name(): string {
        return $this->name;
    }

    public function get_email(): string {
        return $this->email;
    }

    public function get_address(): string {
        return $this->address;
    }

    public function get_phone(): string {
        return $this->phone;
    }
};

class Authenticate {

    private $userRepository;

    public function __construct() {

        require_once '../config/database.php';
        $this->userRepository = new UserRepository($pdo);

    }

    private function validate_signup_data(string $name, string $email, string $password, string $confirm_password): array {

        $errors = [];

        if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
            $errors["incomplete_form"] = "Please fill all fields";
        }
        if ($password !== $confirm_password) {
            $errors["passwords_unmatch"] = "Passwords do not match";
        }
        if (strlen($password) < 5) {
            $errors["short_password"] = "Password must be at least 5 characters long";
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["invalid_email"] = "The email you provided is invalid";
        }
        if ($this->userRepository->get_user($email)) {
            $errors["user_exists"] = "A user with that email already exists";
        }

        return $errors;
    }

    private function validate_login_data(string $email, string $password): array {

        $errors = [];

        if (empty($email) || empty($password)) {
            $errors["incomplete_form"] = "Please fill all fields";
        }

        $check_if_user_exists = $this->userRepository->get_user($email);

        if (!$check_if_user_exists) {
            $errors["unknown_user"] = "No user with '$email' exists";
        }

        if ($check_if_user_exists && !password_verify($password, $check_if_user_exists["pwd"])) {
            $errors["invalid_password"] = "Invalid password entered";
        }

        return [
            "errors" => $errors,
            "user" => $check_if_user_exists
        ];
    }

    public function signup(string $name, string $email, string $password, string $confirm_password) {

        $validate_provided_details = $this->validate_signup_data($name, $email, $password, $confirm_password);

        if (empty($validate_provided_details)) {

            // creating user in db
            $this->userRepository->create_user($name, $email, $password);

            $_SESSION["signup_success"] = "Account successfully created. Proceed to login";
            header("Location: ../templates/login.php");
            die();

        } else {
            $_SESSION["signup_errors"] = $validate_provided_details;
            header("location: ../templates/signup.php");
            die();
        }  
    }

    public function login(string $email, string $password) {
        
        $validate_provided_details = $this->validate_login_data($email, $password);

        if (empty($validate_provided_details["errors"])) {

            $user = $validate_provided_details["user"];

            // save user details in session
            $_SESSION["user"] = $user;
            header("Location: ../index.php");
            die();
        } else {
            $_SESSION["login_errors"] = $validate_provided_details["errors"];
            header("location: ../templates/login.php");
            die();
        }

    }

};