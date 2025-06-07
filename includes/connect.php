<?php
$host = "127.0.0.1";       // Host where MySQL server is running (localhost or IP)
$port = "3306";            // MySQL default port (Workbench also uses this)
$user = "root";            // Your MySQL username (default for XAMPP is 'root')
$pass = "12345678@@";   // Your MySQL Workbench password (set this when you installed Workbench)
$db   = "traveling";    // The database name you created in MySQL Workbench

// Create connection
$conn = new mysqli($host, $user, $pass, $db, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
