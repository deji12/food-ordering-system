<?php

declare(strict_types=1);

class Category {

    private $category_name;
    private $image_url;
    private $pdo;

    public function __construct(string $name=null, $image_file=null){

        require_once '../config/database.php';

        $this->pdo = $pdo;

        if ($name !==null && $image_file !==null) {
            $this->category_name = $name;
            $this->upload_image($image_file);
        }
    }

    private function upload_image($image_file){

        require_once '../config/cloudinary.php';

        $upload_and_get_url = upload_file($image_file);

        $this->image_url = $upload_and_get_url;
    }

    public function save() {
        $query = "INSERT INTO Category (category_name, image_url) VALUES (:category_name, :image_url);";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':category_name', $this->category_name);
        $statement->bindParam(':image_url', $this->image_url);
        $statement->execute();
    }

    public function get_categories() {
        $query = "SELECT * FROM Category;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function edit(int $category_id, string $_name){
        $query = "UPDATE Category SET category_name = :_name WHERE id = :category_id;";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':_name', $_name);
        $statement->bindParam(':category_id', $category_id);
        $statement->execute();
    }

};