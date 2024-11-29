<?php
session_start();
include('dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check credentials
    $stmt = $conn->prepare("SELECT * FROM tblaccounts WHERE username = :username AND password = :password");
    $stmt->execute(['username' => $username, 'password' => $password]);
    $user = $stmt->fetch();

    if ($user) {
        // Store user information in session variables
        $_SESSION['username'] = $user['username'];
        $_SESSION['address'] = $user['address']; // Assuming 'address' is a column in your `tblaccounts` table

        // Redirect to the homepage or any other page
        header("Location: Index.php");
        exit();
    } else {
        // Show an error message if the credentials are invalid
        echo "<script>alert('Invalid username or password. Please try again.');</script>";
    }
}
?>
