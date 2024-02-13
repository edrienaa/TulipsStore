<?php

    include '../assets/connection.php';
    $id = $_GET ['id'];

    $query = mysqli_query ($connection ,"DELETE FROM user WHERE UserID = '$id' ");

    echo "<script>alert('Record has been deleted');
    window.location = 'user-list.php'</script>";
?>