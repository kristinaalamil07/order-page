<?php
session_start();
include('db_connect.php');

// Handle stock update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_id = intval($_POST['item_id']);
    $new_stock = intval($_POST['stock']);

    if ($new_stock < 0) {
        die("Stock cannot be negative.");
    }

    $update_sql = "UPDATE items SET stock = $new_stock WHERE id = $item_id";
    if ($conn->query($update_sql)) {
        echo "Stock updated successfully!";
    } else {
        echo "Error updating stock: " . $conn->error;
    }
}

// Fetch all items
$sql = "SELECT * FROM items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Stock</title>
</head>
<body>
    <h1>Edit Item Stock</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Current Stock</th>
                <th>Update Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['stock'] . "</td>";
                    echo "<td>
                        <form method='POST' action='edit_stock.php'>
                            <input type='hidden' name='item_id' value='" . $row['id'] . "'>
                            <input type='number' name='stock' value='" . $row['stock'] . "' required>
                            <button type='submit'>Update</button>
                        </form>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No items found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
