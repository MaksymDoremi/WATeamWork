<?php
$servername = "localhost";
$username = "root";
$password = "student";
$dbname = "WATeamWork";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function createOrder($message, $isVisible, $userName) {
  global $conn;
  $stmt = $conn->prepare("CALL insert_user_order(?, ?, ?)");
  $stmt->bind_param("sbs", $message, $isVisible, $userName);
  $stmt->execute();
  $stmt->close();
}

function cancelOrder($orderId) {
  global $conn;
  $stmt = $conn->prepare("UPDATE user_order SET is_canceled = 1 WHERE id = ?"); 
  $stmt->bind_param("i", $orderId);
  $stmt->execute();
  $stmt->close();
}

$conn->close();
?>