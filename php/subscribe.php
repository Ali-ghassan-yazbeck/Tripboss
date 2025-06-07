<?php
include '../includes/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    $stmt = $conn->prepare("INSERT INTO newsletter_subscribers (email) VALUES (?)");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        header("Location: ../index.html");
        exit(); // Always use exit after header
    } else {
        echo "❌ Error: " . $stmt->error;
    }
}
?>
