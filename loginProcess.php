<?php
    session_start();
    include './assets/connection.php';

    if ($_SESSION['logged_in']) {
        header('location: customer-view-account.php');
        exit;
    }

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $stmt = $connection->prepare("SELECT user_id,user_name,user_email,user_password FROM customers WHERE user_email=? AND user_password = ? LIMIT 1");

        $stmt->bind_param('ss',$email,$password);

        if($stmt->execute()){
            $stmt->bind_result($user_id,$user_name,$user_email,$user_password);
            $stmt->store_result();

            if ($stmt->num_rows() == 1) {
                $stmt->fetch();

                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['user_email'] = $user_email;
                $_SESSION['logged_in'] = true;

                header('location: customer-view-account.php?login_success=logged in successfully');

            } else {
                header('location: customer-login.php?error1=could not verify your account');
            }

        }else{
            //error1
            header('location: customer-login.php?error1=something went wrong');
        }
    }
?>