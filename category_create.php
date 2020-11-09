<?php include 'db.php';?>
<?php include 'header.php';?>

<?php

//    Brands Data Insert
if (isset($_POST['name'])) {

    $sql = "INSERT INTO categories (category_name) VALUES ('".$_POST['name']."')";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $_SESSION['message'] = 'Product category name created successfully';
        header("Location: category.php");
    }else{
        echo 'Error';
    }
}

?>

<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-title">Add Product Category</h4>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">

                        <form id="brand-name-form" action="" method="post">

                            <div class="form-group">
                                <label for="brand-name">Category Name</label>
                                <input id="brand-name" name="name" type="text" class="form-control" placeholder="Type Category Name" maxlength="255" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="">
                                <button class="btn btn-primary" id="category-add" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php';?>
