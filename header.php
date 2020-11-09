<?php
include 'auth_check.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

</head>

<body class="dashboard-bg">
<div class="main-wrap">

    <!-- Sidebar START -->
    <aside class="left-sidebar" id="leftSidebar">
        <div class="group">
            <button class="btn close d-lg-none" id="close">close</button>
            <a href="index.php">
                <h2>Group-D</h2>
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php" class="active"><span><i class="fas fa-tachometer-alt"></i></span>Dashboard</a></li>
<!--                <li><a href="admin.php"><span><i class="far fa-user"></i></span>Admin</a></li>-->
                <li><a href="brand.php"><span><i class="far fa-building"></i></span>Product Brand</a></li>
                <li><a href="category.php"><span><i class="fas fa-tasks"></i></span>Product Category</a></li>
                <li><a href="product.php"><span><i class="fas fa-shopping-bag"></i></span>Product</a></li>
                <!-- <li><a href="/all_product.html"><span><i class="fas fa-table"></i></span>All Product</a></li> -->
            </ul>
        </nav>

    </aside>
    <!-- Sidebar END -->

    <!-- Dashboard Content START -->
    <section class="dashboard-body">
        <div class="welcome-text">
            <button class="btn d-lg-none" id="menu">Menu</button>
            <p class="text-right">
            <?php
                if (isset($_SESSION['admin_name'])) { ?>
                <strong>Login as <?php echo $_SESSION['admin_name'] ?></strong>
               <?php } ?>
                <a href="logout.php" class="btn btn-warning">Logout</a>
            </p>

        </div>