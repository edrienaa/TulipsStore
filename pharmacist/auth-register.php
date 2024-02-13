<?php 
    session_start();

    include '../assets/connection.php';

    if(isset($_POST['registerbtn'])){
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $UserID = $_POST['UserID'];
        $Password = $_POST['Password'];
        $ConfirmPassword = $_POST['ConfirmPassword'];
        $Level = $_POST['Level'];
        $DateOfBirth = $_POST['DateOfBirth'];

        if($Password === $ConfirmPassword)
        {
            $query = "INSERT INTO user (Name,Email,UserID,Password,Level,DateOfBirth) VALUES ('$Name','$Email','$UserID','$Password','$Level','$DateOfBirth')";
            $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            // echo "Saved";
            $_SESSION['success'] = "User Profile Added";
            header('Location: user-list.php');
        }
        else
        {
            $_SESSION['status'] = "User Profile Not Added";
            header('Location: user-list.php');
        }
        }
        else
        {
            $_SESSION['status'] = "Password and Confirm Password does not match";
        }

        
    }

?>