<?php include 'db.php';?>
<?php include 'header.php';?>

<?php

    // read category
    $categories_fetch = "SELECT * FROM categories ORDER BY id DESC";
    $categories = mysqli_query($connection, $categories_fetch);
    //read brand
    $brands_fetch = "SELECT * FROM brands ORDER BY id DESC";
    $brands = mysqli_query($connection, $brands_fetch);


    //    Product Data Insert
    if (isset($_POST['product_save'])) {

        $name = $_POST['name'];
        $category= $_POST['category'];
        $brand= $_POST['brand'];
        $price= $_POST['price'];
        $description= $_POST['description'];


        //image uploads

        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $newfilename);

        $sql = "INSERT INTO products (category_id,brand_id,name,price,description,image) 
        VALUES ('".$category."','".$brand."','".$name."','".$price."','".$description."','".$newfilename."')";
        $result = mysqli_query($connection, $sql);

        if ($result) {
            $_SESSION['message'] = 'Product add successfully';
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
                        <form method="post" action="product_create.php" enctype="multipart/form-data" id="brand-name-form">
                            <div class="form-group">
                                <label for="product-name">Product Name</label>
                                <input name="name" id="product-name" type="text" class="form-control" placeholder="Type product name" maxlength="255" required>
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
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></option>
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
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['brand_name'] ?></option>
                                       <?php } ?>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" name="price" type="number" class="form-control" placeholder="Type price" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="product-image">Image</label>
                                <input accept=".jpg,.jpeg,.png" id="product-image" name="image" type="file" class="form-control" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="editor1">Description</label>
                                <textarea name="description"  id="editor1" cols="30" rows="10" class="form-control" required></textarea>
                            </div>
                            <div class="">
                                <button class="btn btn-primary" name="product_save" id="category-add" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php';?>
