<?php

    session_start();
    include './assets/connection.php';
        // $message = '';
        // $_POST['agree'] = 'false';
        
        // Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $zip = $_POST["zip"];
    $mobile = $_POST["mobile"];

    // Prepare and execute the SQL query to insert data
    $sql = "INSERT INTO customer_data (firstname, lastname, address1, address2, city, country, zip, mobile) 
    VALUES ('$firstname', '$lastname', '$address1', '$address2', '$city', '$country', '$zip', '$mobile')";

    if ($connection->query($sql) === TRUE) {
        echo "<script>alert('Record has been updated');
                window.location = 'checkout.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Close the database connection
$connection->close();
?>