<?php include 'db.php';?>
<?php include 'header.php';?>

<?php

//    Category Data Read
    $categories_fetch = "SELECT * FROM categories ORDER BY id DESC";
    $categories = mysqli_query($connection, $categories_fetch);

?>

<div class="content-body">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h4 class="page-title">Product Category</h4>
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
                        <a class="btn btn-primary" href="category_create.php">Add New</a>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="data_table">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>

                                </thead>
                                <tbody>
                                <?php
                                $sl=1;
                                while($row = mysqli_fetch_assoc($categories)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $sl++ ?></td>
                                        <td><?php echo $row['category_name'] ?></td>
                                        <td><?php echo date('d-m-Y, h:i A', strtotime($row['created_at'])) ?></td>
                                        <td>
                                            <a href="category_edit.php?edit=<?php echo $row['id'];  ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a onclick="return checkDelete()" href="common_delete.php?category_delete=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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
</div>

<?php include 'footer.php';?>
<script language="JavaScript" type="text/javascript">
    function checkDelete(){
        return confirm('Are you sure delete?');
    }
</script>