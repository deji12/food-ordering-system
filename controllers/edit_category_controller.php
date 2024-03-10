<?php
ini_set('display_errors', 1);
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $edit_item_name = $_POST["edit_item_name"];
    $category_id = $_POST["category_id"];

    try {

        require_once '../Category/category.php';

        $category = new Category();
        $category->edit(intval($category_id), $edit_item_name);

        $_SESSION["category_edited"] = "Category edited successfully";
        header("Location: ../templates/categories.php");
        die();

        

    } catch (PDOException $e) {
        die($e->getMessage());
    }
} else {
    header("Location: ../templates/admin.dashboard.php");
    die();
}