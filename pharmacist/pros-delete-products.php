<?php

    include '../assets/connection.php';
    $id = $_GET ['id'];

    $query = mysqli_query ($connection ,"DELETE FROM products WHERE ProductsID = '$id' ");

    echo "<script>alert('Record has been deleted');
    window.location = 'data-products.php'</script>";
?>