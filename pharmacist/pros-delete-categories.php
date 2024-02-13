<?php

    include '../assets/connection.php';
    $id = $_GET ['id'];

    $query = mysqli_query ($connection ,"DELETE FROM categories WHERE CategoriesID = '$id' ");

    echo "<script>alert('Record has been deleted');
    window.location = 'data-categories.php'</script>";
?>