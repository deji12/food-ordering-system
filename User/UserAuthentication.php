<?php

declare(strict_types=1);

require_once 'UserRepository.php';

class User {
    private $user_id;
    private $name;
    private $address;
    private $email;
    private $phone;

    public function __construct(int $_user_id, string $_name, string $_address, string $_email, string $_phone) {
        $this->user_id = $_user_id;
        $this->name = $_name;
        $this->address = $_address;
        $this->email = $_email;
        $this->phone = $_phone;
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

    private function Validate(string $name, string $email, string $password, string $confirm_password) {

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
        if ($this->userRepository->userExists($email)) {
            $errors["user_exists"] = "A user with that email already exists";
        }

        return $errors;
    }

    public function signup(string $name, string $email, string $password, string $confirm_password) {
        if (empty($this->Validate($name, $email, $password, $confirm_password))) {
            
        }
    }

    public function login(string $email, string $password) {

    }

};