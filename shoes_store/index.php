<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #cccccc, #eeeeee);
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center; /* Centering the page */
        }
        h1 {
            text-align: left;
            font-size: 28px;
            margin: 20px 0;
        }
        h2.section-title {
            text-align: center;
            font-size: 36px;
            color: #333;
            margin-top: 10px;
            text-transform: uppercase;
        }
        .group-container {
            width: 80%;
            margin-top: 20px;
            border: 2px solid #888;
            border-radius: 10px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .products-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            margin-top: 20px;
        }
        .item {
            border: 2px solid #888;
            border-radius: 10px;
            padding: 15px;
            width: 300px;
            background-color: #fff;
            position: relative;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .item img {
            max-width: 100%;
            border-radius: 5px;
        }
        .item h2 {
            margin: 10px 0;
        }
        .item p {
            margin: 5px 0;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .women-label, .men-label {
            font-size: 36px;
            color: #333;
            margin-top: 40px;
            margin-bottom: 20px;
            text-transform: uppercase;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Shoe Store</h1>

    <!-- Men's Shoes Section -->
    <h2 class="section-title men-label">Men's Shoes</h2>
    <div class="group-container">
        <div class="products-container">
            <?php
            session_start();
            include('db_connect.php'); // Include database connection

            // Query to fetch all items from the database
            $sql = "SELECT * FROM items LIMIT 6"; // First 6 items for Men's Shoes
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='item'>";
                    echo "<h2>" . $row['name'] . "</h2>";
                    echo "<img src='" . $row['image_url'] . "' alt='" . $row['name'] . "' />";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "<p>Price: $" . $row['price'] . "</p>";
                    echo "<form method='POST' action='order.php'>";
                    echo "<input type='hidden' name='item_id' value='" . $row['id'] . "' />";
                    echo "<label for='quantity'>Quantity:</label>";
                    echo "<input type='number' name='quantity' min='1' max='" . $row['stock'] . "' required />";
                    echo "<button type='submit'>Order Now</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "No items available.";
            }
            ?>
        </div>
    </div>

    <!-- Women's Shoes Section -->
    <h2 class="section-title women-label">Women's Shoes</h2>
    <div class="group-container">
        <div class="products-container">
            <?php
            // Query to fetch the next 6 items for Women's Shoes
            $sql = "SELECT * FROM items LIMIT 6, 6"; // Next 6 items for Women's Shoes
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='item'>";
                    echo "<h2>" . $row['name'] . "</h2>";
                    echo "<img src='" . $row['image_url'] . "' alt='" . $row['name'] . "' />";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "<p>Price: $" . $row['price'] . "</p>";
                    echo "<form method='POST' action='order.php'>";
                    echo "<input type='hidden' name='item_id' value='" . $row['id'] . "' />";
                    echo "<label for='quantity'>Quantity:</label>";
                    echo "<input type='number' name='quantity' min='1' max='" . $row['stock'] . "' required />";
                    echo "<button type='submit'>Order Now</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "No items available.";
            }
            ?>
        </div>
    </div>
</body>
</html>
