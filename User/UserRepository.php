<?php

class UserRepository {

    private $connection;

    public function __construct(object $pdo){
        $this->connection = $pdo;
    }

    public function userExists($email) {
        $query = "SELECT * FROM users WHERE email = :email;";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(":email", $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return ($result) ? true : false;
    }

    public function createUser(string $name, $email, $password) {

    }

};