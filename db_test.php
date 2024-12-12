<?php
include('db_connect.php'); // Ensure you have db_connect.php set up
$sql = "SELECT * FROM items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['name'] . " - $" . $row['price'] . "<br>";
    }
} else {
    echo "No items found.";
}
?>
