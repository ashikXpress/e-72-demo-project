<?php include 'db.php';?>
<?php include 'header.php';?>

<?php

//get edit data

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $record = mysqli_query($connection, "SELECT * FROM brands WHERE id=$id");
    $brand_row= mysqli_fetch_array($record);

}
//    Brands Data Update
if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $brand_id = $_GET['edit'];

    $sql = "UPDATE brands SET brand_name = '".$name."' WHERE id='".$brand_id."'";

    if (mysqli_query($connection,$sql)) {
        $_SESSION['message'] = 'Brand name updated successfully';
        header("Location: brand.php");
    }else{
        echo 'Error';
    }
}


?>

<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-title">Edit Product Brand</h4>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <form id="brand-name-form" action="" method="post">

                            <div class="form-group">
                                <label for="brand-name">Brand Name</label>
                                <input id="brand-name" name="name" value="<?php echo $brand_row['brand_name']; ?>" type="text" class="form-control" placeholder="Type Brand Name" maxlength="255" required>

                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="">
                                <button name="update" class="btn btn-primary" id="category-add" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php';?>
