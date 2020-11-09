<?php
include 'header.php';
include 'db.php';

//product count
$sql="SELECT * FROM products";
$result=mysqli_query($connection,$sql);
$product_count=mysqli_num_rows($result);

//Brand count
$sql="SELECT * FROM brands";
$result=mysqli_query($connection,$sql);
$brand_count=mysqli_num_rows($result);

//Category count
$sql="SELECT * FROM categories";
$result=mysqli_query($connection,$sql);
$category_count=mysqli_num_rows($result);

?>




      <div class="content-body">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">

                      <?php
                      if (isset($_SESSION['login_success'])) { ?>
                          <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                              <?php echo $_SESSION['login_success']; ?>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <?php
                          unset($_SESSION['login_success']);
                      } ?>

                      <div class="row">
                          <div class="col-md-4">
                              <a href="product.php" class="count-area">
                                  <p><strong>Product</strong></p>
                                  <strong><?php echo $product_count; ?></strong>
                              </a>
                          </div>
                          <div class="col-md-4">
                              <a href="brand.php" class="count-area">
                                  <p><strong>Brand</strong></p>
                                  <strong><?php echo $brand_count;?></strong>
                              </a>
                          </div>
                          <div class="col-md-4">
                              <a href="category.php" class="count-area">
                                  <p><strong>Category</strong></p>
                                  <strong><?php echo $category_count;?></strong>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

<?php include 'footer.php';?>