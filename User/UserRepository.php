<?php

class UserRepository {

    private $connection;

    public function __construct(object $pdo){
        $this->connection = $pdo;
    }

    public function get_user($email) {
        $query = "SELECT * FROM users WHERE email = :email;";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(":email", $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        // return ($result) ? true : false;
        return $result;
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
        //return $this->connection->lastInsertId();
    }

    public function create_password_reset_token(string $email, string $token){
        $query = "INSERT INTO password_reset_requests (email, token) VALUES (:email, :token)";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":token", $token);
        $statement->execute();
    }

    public function get_email_from_reset_token_and_check_expiration(string $token) {
        $query = "SELECT *, NOW() AS `current_time` FROM password_reset_requests WHERE token = :token;";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(":token", $token);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            // Calculate the difference between current time and timestamp
            $timestamp = strtotime($result['timestamp']);
            $currentTime = strtotime($result['current_time']);
            $expirationTime = $timestamp + (60 * 20); // Assuming expiration time is 2 hours
            
            // Check if token has expired
            $isExpired = ($currentTime > $expirationTime);

            if($isExpired){
                $this->delete_reset_token($token);
            }
            
            // Add expiration status to the result array
            $result['expired'] = $isExpired;
        }
    
        return $result;
    }

    public function set_password(string $email, string $password) {
        $query = "UPDATE users SET pwd = :pwd WHERE email = :email;";
        $statement = $this->connection->prepare($query);

        $options = [
            'cost' => 12
        ];

        $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

        $statement->bindParam(":pwd", $hashed_password);
        $statement->bindParam(":email", $email);

        $statement->execute();
    }

    public function delete_reset_token(string $token) {
        $deleteQuery = "DELETE FROM password_reset_requests WHERE token = :token";
        $deleteStatement = $this->connection->prepare($deleteQuery);
        $deleteStatement->bindParam(":token", $token);
        $deleteStatement->execute();
    }

    public function set_name(string $user_name, int $id){
        $query = "UPDATE users SET user_name = :user_name WHERE id = :id;";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':user_name', $user_name);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function set_email(string $email, int $id){
        $query = "UPDATE users SET email = :email WHERE id = :id;";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':email', $email);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function set_house_number(int $house_number, int $id){
        $query = "UPDATE users SET house_number = :house_number WHERE id = :id;";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':house_number', $house_number);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function set_building_name(string $building_name, int $id){
        $query = "UPDATE users SET building_name = :building_name WHERE id = :id;";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':building_name', $building_name);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function set_address(string $user_address, int $id){
        $query = "UPDATE users SET user_address = :user_address WHERE id = :id;";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':user_address', $user_address);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function set_phone(string $phone, int $id){
        $query = "UPDATE users SET phone = :phone WHERE id = :id;";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':phone', $phone);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

};