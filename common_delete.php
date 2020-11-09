<?php
include 'db.php';
session_start();
// brand delete

if (isset($_GET['brand_delete'])) {
     $id = $_GET['brand_delete'];

     // sql to delete a record
    $sql = "DELETE FROM brands WHERE id=$id";

    if (mysqli_query($connection,$sql)) {
        $_SESSION['message'] = 'Brand name delete successfully';
        header("Location: brand.php");
    }else{
        echo 'Error';
    }

}
//category delete
if (isset($_GET['category_delete'])) {
    $id = $_GET['category_delete'];
    // sql to delete a record
    $sql = "DELETE FROM categories WHERE id=$id";

    if (mysqli_query($connection,$sql)) {
        $_SESSION['message'] = 'category name delete successfully';
        header("Location: category.php");
    }else{
        echo 'Error';
    }

}
//Product delete
if (isset($_GET['product_delete'])) {
    $id = $_GET['product_delete'];

    //image delete
    $record = mysqli_query($connection, "SELECT * FROM products WHERE product_id=$id");
    $product_row= mysqli_fetch_array($record);
    unlink('./uploads/'.$product_row['image']);

    // sql to delete a record
    $sql = "DELETE FROM products WHERE product_id=$id";

    if (mysqli_query($connection,$sql)) {
        header("Location: product.php");
        $_SESSION['message'] = 'Product delete successfully';
    }else{
        echo 'Error';
    }

}
