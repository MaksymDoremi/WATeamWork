<?php

require_once 'dbc.php';

session_start();

function verifyUser($email, $pass) {
    $data = verifyPass($email);
    if(password_verify($pass, $data["password"])){
        $_SESSION["logged"] = "true";
        $_SESSION["username"] = $data["name"];
        header("Location: ../home");
    }
    else{
        $_SESSION["error"] = "Invalid Email or Password";
        header("Location: ../pages/login");
    }
}

function verifyPass($email) : array {
    $connection = DBC::getConnection();

    $query = "SELECT password, name FROM users WHERE email = ?;";
    $getHashStatement = $connection->prepare($query);
    $getHashStatement->bind_param("s", $email);
    $getHashStatement->execute();
    $result = $getHashStatement->get_result();

    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $getHashStatement->close();
    $connection->close();

    return count($rows) > 0 ? $rows[0] : [];
}

verifyUser($_POST["email"], $_POST["pass"]);

?>