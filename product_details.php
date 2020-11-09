<?php include 'db.php';?>
<?php include 'header.php';?>

<?php

//    Product Details

    $id = $_GET['product_details'];
    $product_fetch = "SELECT * FROM products WHERE product_id = '".$id."'";
    $product = mysqli_query($connection, $product_fetch);
    $row = mysqli_fetch_row($product);
    //Brand
    $brand_fetch = "SELECT * FROM brands WHERE id = '".$row[2]."'";
    $brand = mysqli_query($connection, $brand_fetch);
    $brand_row = mysqli_fetch_row($brand);
    //Category
    $category_fetch = "SELECT * FROM categories WHERE id = '".$row[1]."'";
    $category = mysqli_query($connection, $category_fetch);
    $category_row = mysqli_fetch_row($category);
?>

<div class="content-body">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h4 class="page-title">Product Details</h4>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Product Name</th>
                                <td><?php echo $row[3] ?></td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td><?php echo $category_row[1] ?></td>
                            </tr>
                            <tr>
                                <th>Brand</th>
                                <td><?php echo $brand_row[1] ?></td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>BDT <?php echo number_format($row[4], 2) ?></td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td><img width="200px" src="./uploads/<?php echo $row[6] ?>" alt=""></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td><?php echo $row[5] ?></td>
                            </tr>
                            <tr>
                                <th>Created at</th>
                                <td><?php echo date('d-m-Y, H:i A',strtotime($row[7])) ?></td>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php';?>
