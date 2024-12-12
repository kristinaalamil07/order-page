<?php
include('db_connect.php'); // Include the database connection file

// Check if connection is successful
if ($conn) {
    echo "Database connection is successful!";
} else {
    echo "Failed to connect to the database.";
}
?>
