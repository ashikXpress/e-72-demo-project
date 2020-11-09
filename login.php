<?php include 'db.php';
session_start();

if (isset($_SESSION['email'])) {
    header("Location: index.php");
}

if (isset($_POST['login_btn'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admins WHERE password = '".$password."' AND email = '".$email."'";
        $check_login = mysqli_query($connection, $sql);
         $admin_data = mysqli_fetch_array($check_login);

        if (count($admin_data) > 0) {

            $_SESSION['admin_email'] = $admin_data['email'];
            $_SESSION['admin_name'] = $admin_data['name'];
            $_SESSION['admin_id'] = $admin_data['id'];
            $_SESSION['login_success'] = 'Login successfully';

            header("Location: index.php");


        }else{
            $_SESSION['login_error'] = 'Your credential is wrong';
            //header("Location: login.php");
            //$message = 'Your credential is wrong';
        }

    }

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
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
</head>

<body class="login-page-bg">
<div class="login-section-wrap">
    <div class="login-form">
        <form action="" method="post">
            <h2 class="login-title">
                Account Login
            </h2>
            <?php
            if (isset($_SESSION['login_error'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo  $_SESSION['login_error']  ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php }
            unset ($_SESSION['login_error']);
            ?>
            <?php
            if (isset($logout_message)) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo  $logout_message ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="username">Email</label>
                <input id="username" name="email" type="email" class="form-control" placeholder="Type Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control" placeholder="Type Password">
            </div>
            <div class="cmn-btn-design">
                <button class="btn" name="login_btn" type="submit">Login </button>
            </div>
        </form>
    </div>
</div>
<script src="./assets/js/jquery.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/main.js"></script>
</body>

</html>