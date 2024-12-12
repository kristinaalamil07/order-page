<?php
$host = "localhost";  // Hostname of the MySQL server
$username = "root";   // Your MySQL username (root by default in XAMPP)
$password = "";       // Your MySQL password (empty by default in XAMPP)
$dbname = "shoe_store"; // Make sure the database name matches exactly

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Optional: You can echo success message for testing
    // echo "Connected successfully to the shoes_store database.";
}
?>
