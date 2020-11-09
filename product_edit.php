<?php include 'db.php';?>
<?php include 'header.php';?>

<?php

    // read category
    $categories_fetch = "SELECT * FROM categories ORDER BY id DESC";
    $categories = mysqli_query($connection, $categories_fetch);
    //read brand
    $brands_fetch = "SELECT * FROM brands ORDER BY id DESC";
    $brands = mysqli_query($connection, $brands_fetch);

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $record = mysqli_query($connection, "SELECT * FROM products WHERE product_id=$id");
        $product_row= mysqli_fetch_array($record);

    }

    //    Product Data Update
if (isset($_POST['update'])) {

     $name = $_POST['name'];
     $category= $_POST['category'];
     $brand= $_POST['brand'];
     $price= $_POST['price'];
     $description= $_POST['description'];
     $newfilename = $product_row['image'];

    $file_check =  $_FILES["image"]["name"];

    if ($file_check != '') {

        //image existing file delete
        unlink('./uploads/'.$newfilename);
        //image uploads
        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $newfilename);

    }

    $sql = "UPDATE products SET brand_id = $brand,category_id = $category,name = '".$name."',price = '".$price."',description='".$description."',image='".$newfilename."' WHERE product_id=$id ";

    if (mysqli_query($connection,$sql)) {
        $_SESSION['message'] = 'Product updated successfully';
        header("Location: product.php");
    }else{
        echo 'Error';
    }
}

?>

<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-title">Add Product</h4>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <form method="post" action="" enctype="multipart/form-data" id="brand-name-form">
                            <div class="form-group">
                                <label for="product-name">Product Name</label>
                                <input name="name" maxlength="255" value="<?php echo $product_row['name']; ?>" id="product-name" type="text" class="form-control" placeholder="Type product name" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="category-name">Category</label>
                                    <select name="category" id="category-name" class="form-control" required>
                                        <option value="">---Select Category---</option>
                                        <?php
                                        while($row = mysqli_fetch_assoc($categories)) {
                                            ?>
                                            <option <?php echo ($product_row['category_id'] == $row['id'] ? 'selected' : '') ?> value="<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col">
                                    <label for="brand-name">Brand</label>
                                    <select name="brand" id="brand-name" class="form-control" required>
                                        <option value="">---Select Brand---</option>
                                        <?php
                                        while($row = mysqli_fetch_assoc($brands)) {
                                        ?>
                                        <option <?php echo ($product_row['brand_id'] == $row['id'] ? 'selected' : '') ?> value="<?php echo $row['id'] ?>"><?php echo $row['brand_name'] ?></option>
                                       <?php } ?>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" name="price" value="<?php echo $product_row['price']; ?>" type="number" class="form-control" placeholder="Type price" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="product-image">Image</label>
                                <input  accept=".jpg,.jpeg,.png" id="product-image" name="image" type="file" class="form-control">
                                <div class="invalid-feedback"></div>
                                <br>
                                <img width="150px" src="./uploads/<?php echo $product_row['image']; ?>" alt="">
                            </div>
                            <div class="form-group">
                                <label for="editor1">Description</label>
                                <textarea name="description" id="editor1" cols="30" rows="10" class="form-control" required><?php echo $product_row['description']; ?></textarea>
                            </div>
                            <div class="">
                                <button class="btn btn-primary" name="update" id="category-add" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php';?>
