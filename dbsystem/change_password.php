<?php

require_once 'dbc.php';

session_start();

function changePassword($oldPass, $newPass, $connection) {
    $data = verifyPass($connection);
    if(password_verify($oldPass, $data["password"])){
        // change password to new password
        #$connection = DBC::getConnection();

        $query = "UPDATE users SET password = ? WHERE name = ?;";
        $statement = $connection->prepare($query);
        $statement->bind_param("ss", hashPass($newPass), $_SESSION["username"]);
        $statement->execute();
        $statement->close();
        
        $_SESSION["report"] = "Password changed successfully";
        header("Location: ../pages/account");
        return;
        
    }
    else{
        $_SESSION["error"] = "Old password is not correct";
        header("Location: ../pages/account");
    }
}

function verifyPass($connection) : array {
    #$connection = DBC::getConnection();

    $query = "SELECT password FROM users WHERE name = ?;";
    $getHashStatement = $connection->prepare($query);
    $getHashStatement->bind_param("s", $_SESSION["username"]);
    $getHashStatement->execute();
    $result = $getHashStatement->get_result();

    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $getHashStatement->close();
    #$connection->close();

    return count($rows) > 0 ? $rows[0] : [];
}

function hashPass($pass) : string {
    $password = password_hash($pass, PASSWORD_DEFAULT);
    return $password;
}

$connection = DBC::getConnection();
changePassword($_POST["oldPass"], $_POST["newPass"], $connection);
$connection->close();

?>