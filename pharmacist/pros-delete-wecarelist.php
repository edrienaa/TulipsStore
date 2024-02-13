<?php

    include '../assets/connection.php';
    $id = $_GET ['id'];

    $query = mysqli_query ($connection ,"DELETE FROM wecareprogram WHERE phone_number = '$id' ");

    echo "<script>alert('Record has been deleted');
    window.location = 'wecare-list.php'</script>";
?>