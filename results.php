<?php
include '../includes/connect.php';

// Get form data
$destination = $_POST['destination'];
$date = $_POST['date'];
$price = $_POST['price'];

// Step 1: Save search
$save = "INSERT INTO search_queries (destination, travel_date, max_price)
         VALUES ('$destination', '$date', '$price')";
$conn->query($save);

// Step 2: Fetch matching trips
$sql = "SELECT * FROM available_trips
        WHERE destination = '$destination'
        AND travel_date = '$date'
        AND price <= $price";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Results - TripBoss</title>
  <link rel="stylesheet" href="../css/style.css"> <!-- Optional: style -->
</head>
<body>
  <h2>Search Results for "<?php echo $destination; ?>" on <?php echo $date; ?> under $<?php echo $price; ?>:</h2>
  <hr>

  <?php
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo "<div style='margin-bottom: 20px;'>";
          echo "<h3>" . $row['destination'] . "</h3>";
          echo "📅 " . $row['travel_date'] . "<br>";
          echo "💵 $" . $row['price'] . "<br>";
          echo "<p>" . $row['description'] . "</p>";
          echo "</div><hr>";
      }
  } else {
      echo "<p style='color:red;'>❌ No trips found matching your search.</p>";
  }
  ?>

  <br>
  <a href="../index.html">🔙 Back to Home</a>
</body>
</html>
