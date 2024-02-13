<?php 
    include 'assets/connection.php';
    session_start();

    if(isset($_GET['logout']) &&  $_GET['logout'] == 1){
        if (isset($_SESSION['admin_logged_in'])) {
            unset($_SESSION['UserID']);
            unset($_SESSION['Email']);
            unset($_SESSION['Level']);
            header("Location: index.php");
            exit;

        }
    }
?>