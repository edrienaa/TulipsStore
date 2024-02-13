<?php
    session_start();
    include '../assets/connection.php';

    
    if (isset($_GET['transaction_id']) && isset($_GET['order_id'])) {

        $order_id = $_GET['order_id'];
        $order_status = "paid";
        $transaction_id = $_GET['transaction_id'];
        $user_id = $_SESSION['user_id'];
        $payment_date = date('Y-m-d H:i:s');

        //change order_status to paid
        $stmt = $connection->prepare("UPDATE orders SET order_status=? WHERE order_id=?");
        $stmt->bind_param('si',$order_status,$order_id);

        $stmt->execute();

        //store payment info 
        $stmt1 = $connection->prepare("INSERT INTO payments (order_id, user_id, transaction_id, payment_date)
                                        VALUES (?,?,?,?); ");

        $stmt1->bind_param('iiss',$order_id,$user_id,$transaction_id,$payment_date);

        $stmt1->execute();

        //go to user account
        header("Location: ../customer-view-account.php?payment_message=paid successfully, thanks for your shopping with us");
    } else{
        header("Location: index.php ");
        exit;
    }

    

    
?>