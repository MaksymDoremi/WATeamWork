<?php

require_once 'dbc.php';

session_start();



/**
 * changeAccount
 * Method that changes user name
 * @param  mixed $name new name to insert
 * @param  mixed $connection
 * @return void
 */
function changeAccount($name, $connection) {
    if (strlen($name) >= 2) {
        $query = "UPDATE users SET name = ? WHERE email = ?;";
        $statement = $connection->prepare($query);
        $statement->bind_param("ss",$name, $_SESSION["email"]);
        $statement->execute();
        $statement->close();

        $_SESSION["username"] = $name;

        $_SESSION["report"] = "Name changed successfully";
        header("Location: ../pages/account");
        return;
    }else{
        $_SESSION["error"] = "Name can't be less than 2 characters";
        header("Location: ../pages/account");
    }
    

}


$connection = DBC::getConnection();
changeAccount($_POST["name"], $connection);
$connection->close();

?>