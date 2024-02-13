<?php

    include '../assets/connection.php';
    $id = $_GET ['id'];

    $query = mysqli_query ($connection ,"DELETE FROM collections WHERE CollectionsID = '$id' ");

    echo "<script>alert('Record has been deleted');
    window.location = 'data-categories.php'</script>";
?>