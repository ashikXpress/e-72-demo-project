<?php
include 'db.php';
session_start();

if(isset($_POST["excel_import"]))
{

    $file = $_FILES['excel_file']['tmp_name'];
    $handle = fopen($file, "r");
    $c = 0;
    while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
    {
        $category = $filesop[0];
        $brand = $filesop[1];
        $name = $filesop[2];
        $price = $filesop[3];
        $description = $filesop[4];
        $image = $filesop[5];
        $sql = "insert into products (category_id,brand_id,name,price,description,image) values ('".$category."','".$brand."','".$name."','".$price."','".$description."','".$image."')";
        $result = mysqli_query($connection, $sql);

        $c = $c + 1;
    }

    if ($result) {
        $_SESSION['message'] = 'Product import successfully';
        header("Location: product.php");
    }else{
        echo 'Error';
    }

}