<?php

require_once 'dbc.php';

session_start();

function deleteUser($email) : array {
    $connection = DBC::getConnection();
    try{
        $query = "DELETE from users WHERE email = ?;";
        $statement = $connection->prepare($query);
        $statement->bind_param("s", $email);
        $statement->execute();

        $statement->close();
        $connection->close();

        $_SESSION["report"] = "User deleted successfully";
        header("Location: /home");
    }catch(Exception $e){
        $_SESSION["error"] = "Error occurred during deleting user. " . $e->getMessage();
        header("Location: /home");
    }
}

deleteUser($_POST["email"]);

?>