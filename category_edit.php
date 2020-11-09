<?php include 'db.php';?>
<?php include 'header.php';?>

<?php

//get edit data

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $record = mysqli_query($connection, "SELECT * FROM categories WHERE id=$id");
    $category_row= mysqli_fetch_array($record);

}

//  Category Data Update
if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $category_id = $_GET['edit'];

    $sql = "UPDATE categories SET category_name = '".$name."' WHERE id='".$category_id."'";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        $_SESSION['message'] = 'Product category name updated successfully';
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
                <h4 class="page-title">Edit Product Category</h4>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">

                        <form id="brand-name-form" action="" method="post">

                            <div class="form-group">
                                <label for="brand-name">Category Name</label>
                                <input id="brand-name" name="name" type="text" value="<?php echo $category_row['category_name'];?>" class="form-control" placeholder="Type Category Name" maxlength="255" required>
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
