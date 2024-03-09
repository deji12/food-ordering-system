<?php

declare(strict_types=1);

class Category {

    private $category_name;
    private $image_url;
    private $pdo;

    public function __construct(string $name, $image_file){
        $this->category_name = $name;
        $this->upload_image($image_file);
    }

    private function upload_image($image_file){

        require_once '../config/cloudinary.php';
        require_once '../config/database.php';

        $this->pdo = $pdo;

        $upload_and_get_url = upload_file($image_file);

        $this->image_url = $upload_and_get_url;
        $this->save();
    }

    public function save() {
        $query = "INSERT INTO Category (category_name, image_url) VALUES (:category_name, :image_url);";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':category_name', $this->category_name);
        $statement->bindParam(':image_url', $this->image_url);
        $statement->execute();
    }

};