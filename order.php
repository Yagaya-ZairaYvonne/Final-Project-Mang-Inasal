<?php
session_start();
include('dbconnect.php'); // Include database connection

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Ensure that the user has set an address
if (!isset($_SESSION['address'])) {
    echo "Address not set. Please update your address.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'];
    $item = $_POST['item'];
    $quantity = (int) $_POST['quantity'];
    $price = (int) $_POST['price']; // Price from the hidden input field
    $address = $_SESSION['address']; // Get the address from the session

    // Calculate the total price for this order (quantity * price)
    $total = $quantity * $price;

    // Insert the order into the tblcarts table with the correct total price
    $stmt = $conn->prepare("INSERT INTO tblcart (Name, Item, Quantity, Price, address) 
                            VALUES (:username, :item, :quantity, :price, :address)");
    $stmt->execute([
        'username' => $username,
        'item' => $item,
        'quantity' => $quantity,  // Insert quantity
        'price' => $total,  // Insert the total price for the item
        'address' => $address
    ]);

    // Redirect to the cart
    header("Location: Cart.php");
    exit();
}
?>
