<?php
session_start();
include('db_connect.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    // Fetch item details from the database
    $sql = "SELECT * FROM items WHERE id = '$item_id'";
    $result = $conn->query($sql);
    $item = $result->fetch_assoc();

    // If item exists, proceed with the order process
    if ($item) {
        // Calculate total price
        $total_price = $item['price'] * $quantity;

        // Simulate order creation (You can replace this with actual order processing code)
        echo "<div class='order-summary'>";
        echo "<h2>Order Summary</h2>";
        echo "<div class='order-item'>";
        echo "<img src='" . $item['image_url'] . "' alt='" . $item['name'] . "' class='order-item-image' />";
        echo "<div class='order-item-details'>";
        echo "<h3>" . $item['name'] . "</h3>";
        echo "<p><strong>Quantity:</strong> " . $quantity . "</p>";
        echo "<p><strong>Total Price:</strong> $" . number_format($total_price, 2) . "</p>";
        echo "</div>";
        echo "</div>";
        echo "<button class='back-button'><a href='index.php'>Back to Store</a></button>";
        echo "</div>";
    } else {
        echo "<p>Item not found.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #cccccc, #eeeeee); /* Gradient background */
            margin: 0;
            padding: 20px;
        }
        .order-summary {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }
        .order-item {
            display: flex;
            border-bottom: 2px solid #ccc;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .order-item-image {
            max-width: 150px;
            margin-right: 20px;
            border-radius: 5px;
        }
        .order-item-details {
            flex: 1;
        }
        .order-item-details h3 {
            font-size: 24px;
            color: #333;
        }
        .order-item-details p {
            font-size: 18px;
            color: #555;
        }
        .back-button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }
        .back-button a {
            color: white;
            text-decoration: none;
        }
        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

</body>
</html>
