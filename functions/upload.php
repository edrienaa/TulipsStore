<?php

include './assets/connection.php';

if (isset($_POST['submit'])){
    $Image = $_FILES['Image']['tmp_name'];
    $ImageData = addslashes(file_get_contents($Image));
    $ImageType = $_FILES['Image']['type'];

    $sql = "INSERT INTO products (Image) VALUES ('$ImageData', '$ImageType')";

    if ($connection->query($sql) === TRUE){
        echo "Image uploaded successfully.";
    } 
    else{
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

$connection->close();

?>