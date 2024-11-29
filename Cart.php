<?php
session_start();
include('dbconnect.php'); // Include database connection
include('header.php'); // Include your header

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    exit(); // Make sure to stop the script here after the redirect
}

$username = $_SESSION['username']; // Get the logged-in user's username

// Fetch the items in the cart for the logged-in user from tblCart
$stmt = $conn->prepare("SELECT * FROM tblCart WHERE Name = :username");
$stmt->execute(['username' => $username]);
$cartItems = $stmt->fetchAll();

// Calculate the total price and prepare the items for insertion
$totalPrice = 0;
$itemsPurchased = [];

foreach ($cartItems as $item) {
    $totalPrice += $item['Quantity'] * $item['Price'];
    $itemsPurchased[] = $item['Item']; // Collect item names
}

// Convert array of items into a string (comma-separated)
$itemNames = implode(", ", $itemsPurchased);

// Process order confirmation when the button is clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_order'])) {
    $address = $_POST['address']; // Get the address from the form

    // Insert into tblOrders with combined items and total
    $stmt = $conn->prepare("INSERT INTO tblOrders (Name, Item, Total, address) 
                           VALUES (:name, :item, :total, :address)");

    $stmt->execute([
        'name' => $username,
        'item' => $itemNames, // Store all item names in a single column
        'total' => $totalPrice,
        'address' => $address
    ]);

    // After inserting, empty the cart
    $stmt = $conn->prepare("DELETE FROM tblCart WHERE Name = :username");
    $stmt->execute(['username' => $username]);

    exit(); // Ensure no further script execution after redirection
}

// Fetch the orders for the logged-in user from tblOrders
$stmt = $conn->prepare("SELECT * FROM tblOrders WHERE Name = :username");
$stmt->execute(['username' => $username]);
$userOrders = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart and Orders</title>
    <style>
        body {
            color: black;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #fafafa;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2, h3 {
            text-align: center;
            margin-bottom: 20px;
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        table {
            color: black;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .empty-cart, .empty-orders {
            text-align: center;
            color: #555;
            font-size: 18px;
        }

        .cart-summary {
            margin-top: 20px;
            text-align: center;
            color: black;
        }

        .cart-summary p {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Cart Section -->
        <h2>Your Cart</h2>

        <?php if (!empty($cartItems)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['Item']) ?></td>
                            <td><?= htmlspecialchars($item['Quantity']) ?></td>
                            <td><?= htmlspecialchars($item['Price']) ?></td>
                            <td><?= htmlspecialchars($item['Quantity'] * $item['Price']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="cart-summary">
                <p><strong>Total: </strong><?= $totalPrice ?></p>
                <form method="POST">
                    <label for="address">Enter your address:</label><br>
                    <input type="text" id="address" name="address" required><br><br>
                    <button class="btn" type="submit" name="confirm_order">Confirm Order</button>
                </form>
            </div>
        <?php else: ?>
            <p class="empty-cart">No items found in your cart.</p>
        <?php endif; ?>

        <button class="btn" onclick="location.href='Menu Page_MI.php'">Continue Shopping</button>

        <!-- Order History Section -->
        <h3>Your Past Orders</h3>

        <?php if (!empty($userOrders)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($userOrders as $order): ?>
                        <tr>
                            <td><?= htmlspecialchars($order['order_ID']) ?></td>
                            <td><?= htmlspecialchars($order['Item']) ?></td> <!-- Show combined items -->
                            <td><?= htmlspecialchars($order['Total']) ?></td>
                            <td><?= htmlspecialchars($order['address']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="empty-orders">No past orders found.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php include('footer.php'); // Include your footer ?>
