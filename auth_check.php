<?php
session_start();

    if ($_SESSION['admin_email'] == '') {
        header("Location: login.php");
    }
