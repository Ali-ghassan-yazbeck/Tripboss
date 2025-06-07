<?php
include '../includes/connect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_messages (name, email, message)
        VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.html");
    exit(); // Always use exit after header
} else {
    echo "❌ Error: " . $conn->error;
}
?>
