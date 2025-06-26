<?php
// Step 2: Connect to MySQL database
$conn = new mysqli("localhost", "root", "", "webteam_intern");

// Check if connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully!";
}
?>

