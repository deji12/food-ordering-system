<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image_file"])) {

    $category_name = $_POST["category_name"];
    $image = $_FILES["image_file"];

    try {

        require_once '../Category/category.php';

        $create_new_category = new Category($category_name, $image["tmp_name"]);

        $_SESSION["category_added"] = "Category added successfully";
        header("Location: ../templates/admin.dashboard.php");
        die();


    } catch (PDOException $e) {
        die($e->getMessage());
    }

}  else {
    header("Location: ../templates/admin.dashboard.php");
    die();
}