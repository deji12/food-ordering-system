<?php

class UserRepository {

    private $connection;

    public function __construct(object $pdo){
        $this->connection = $pdo;
    }

    public function user_exists($email) {
        $query = "SELECT * FROM users WHERE email = :email;";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(":email", $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return ($result) ? true : false;
    }

    public function create_user(string $name, $email, $password) {
        $query = "INSERT INTO users (user_name, email, pwd) VALUES (:user_name, :email, :pwd);";
        $statement = $this->connection->prepare($query);

        $options = [
            'cost' => 12
        ];

        $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

        $statement->bindParam(":user_name", $name);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":pwd", $hashed_password);
        $statement->execute();

        // return new user id
        return $this->connection->lastInsertId();
    }

};