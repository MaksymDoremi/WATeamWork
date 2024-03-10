<?php

require_once 'dbc.php';

session_start();


/**
 * createOrder
 * Inserts order record into database
 * @param  mixed $message
 * @param  mixed $is_canceled
 * @return void
 */
function createOrder($message, $is_canceled){
    $connection = DBC::getConnection();
    try{
        $query = "call insert_user_order (?, ?, ?)";
        $statement = $connection->prepare($query);
        $statement->bind_param("sss", $message, $is_canceled, $_SESSION["email"]);
        $statement->execute();

        $statement->close();
        $connection->close();

        $_SESSION["report"] = "Order created successfully".$is_canceled;
        header("Location: ../pages/order");
    }catch(Exception $e){
        $_SESSION["error"] = "Error occurred during creating order. " . $e->getMessage();
        header("Location: ../pages/order");
    }
}

$is_canceled = 0;

if(isset($_POST["visibility"])){
    $is_canceled = 0;
}else{
    $is_canceled = 1;
}

createOrder($_POST["message"], $is_canceled);

?>