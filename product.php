 <?php include 'db.php';?>
<?php include 'header.php';?>

<?php


//    Product Data Read
    $product_fetch = "SELECT * FROM products
            LEFT JOIN brands
            ON brands.id = products.brand_id
            LEFT JOIN categories
            ON categories.id = products.category_id ORDER BY products.product_id DESC";

    //$product_fetch = "SELECT * FROM products ORDER BY id DESC";

    $products = mysqli_query($connection, $product_fetch);
//    echo '<pre>';
//    print_r(mysqli_fetch_assoc($products));
//    die();

?>

<div class="content-body">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h4 class="page-title">All Product</h4>
                <?php
                if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['message']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    unset ($_SESSION['message']);
                } ?>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <form action="excel_import.php" method="post" enctype="multipart/form-data">
                           <div class="row">
                               <div class="col-md-4">
                                   <input type="file" accept=".csv" name="excel_file" class="form-control" required>
                                   <p class="help-block">Only CSV File Import.</p>
                               </div>
                               <div class="col-md-4">
                                   <button name="excel_import" class="btn btn-primary">Excel Import</button>
                               </div>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <a class="btn btn-primary" href="product_create.php">Add New</a>

                        <hr>
                        <table class="table table-bordered table-striped table-responsive " id="data_table">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            <?php
                            $sl = 1;
                            while($row = mysqli_fetch_assoc($products)) {
                                ?>
                                <tr>
                                    <td><?php echo $sl++ ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['category_name'] ?></td>
                                    <td><?php echo $row['brand_name'] ?></td>
                                    <td>BDT <?php echo number_format($row['price'], 2) ?></td>
                                    <td><img width="50px" src="./uploads/<?php echo $row['image'] ?>" alt=""></td>
                                    <td><?php echo date('d-m-Y, h:i A', strtotime($row['created_at'])) ?></td>
                                    <td>
                                        <a href="product_edit.php?edit=<?php echo $row['product_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="product_details.php?product_details=<?php echo $row['product_id'];?>" class="btn btn-primary btn-sm">Details</a>
                                        <a href="common_delete.php?product_delete=<?php echo $row['product_id'] ?>" onclick="return checkDelete()" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php';?>
 <script language="JavaScript" type="text/javascript">
     function checkDelete(){
         return confirm('Are you sure delete?');
     }
 </script>