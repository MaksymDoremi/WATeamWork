<?php

require_once 'dbc.php';

session_start();

function deleteUser($id) : array {
    $connection = DBC::getConnection();
    try{
        $query = "update user_order set is_canceled = 1 where id = ?;";
        $statement = $connection->prepare($query);
        $statement->bind_param("s", $id);
        $statement->execute();

        $statement->close();
        $connection->close();

        $_SESSION["report"] = "Order canceled successfully";
        header("Location: ../pages/order");
    }catch(Exception $e){
        $_SESSION["error"] = "Error occurred during canceling order. " . $e->getMessage();
        header("Location: ../pages/order");
    }
}

deleteUser($_POST["id"]);

?>