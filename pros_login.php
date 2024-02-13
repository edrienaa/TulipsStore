<?php 

    include 'assets/connection.php';

    //check if the user is already logged in
    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']) {
        //redirect to the appropriate dashboard based on the user's level
        if ($_SESSION['Level'] == "Pharmacist") {
            header("Location: pharmacist/dashboard_pharmacist.php");
        } elseif ($_SESSION['Level'] == "Staff") {
            header("Location: staff/dashboard_staff.php");
        } else {
            //redirect to a default page if the user's level is not recognized
            header("Location: auth-login.php"); //correct the redirect location
        }
        exit;
    }

    if(isset($_POST['submit'])){
        $Email = mysqli_real_escape_string($connection, $_POST['Email']);
        $Password = md5($_POST['Password']);

        $stmt = $connection->prepare("SELECT UserID,Email,Name,Password,Level FROM user WHERE Email = ? AND Password = ?");
        $stmt->bind_param('ss',$Email,$Password);

        if ($stmt->execute()) {
            $stmt->bind_result($UserID,$Name,$Email,$Password,$Level);
            $stmt->store_result();

            if($stmt->num_rows() == 1){
                $stmt->fetch();
                
                $_SESSION['UserID'] = $UserID;
                $_SESSION['Email'] = $Email;
                $_SESSION['Level'] = $Level;
                $_SESSION['Name'] = $Name;
                $_SESSION['admin_logged_in'] = true; //Initialize the session variable

                //redirect to the appropriate dashboard based on the user's level
                if($Level == "Pharmacist"){
                    header("Location: pharmacist/dashboard_pharmacist.php");
                } else if($Level == "Staff"){
                    header("Location: staff/dashboard_staff.php");
                }
                exit;
            } else{
                //error2 handling when login fails
                header("location: auth-login.php?error2=something went wrong");
                exit;
        }
    } else{
        //error 2 handling for query execution failure
        header("location: auth-login.php?error2=query execution failed");
        exit;
    }
}
?>