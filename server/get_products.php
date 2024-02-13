<?php
    include '../connection.php';

    $stmt = $connection->prepare("SELECT * FROM products LIMIT 5");

    $stmt->execute();

    $products = $stmt->get_result();//[]
?>