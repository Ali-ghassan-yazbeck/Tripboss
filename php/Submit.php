<?php
include '../includes/connect.php';  // Connect to the database

// Receive data from form
$destination = $_POST['destination'];
$date = $_POST['date'];
$number = $_POST['number_of_people'];

// Insert into the database
$sql = "INSERT INTO trip_requests (destination, travel_date, number_of_people)
        VALUES ('$destination', '$date', '$number')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.html");
    exit(); // Always use exit after header
} else {
    echo "❌ Error: " . $conn->error;
}
?>
