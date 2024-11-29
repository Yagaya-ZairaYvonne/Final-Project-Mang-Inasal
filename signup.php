<?php
include('dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username exists
    $stmt = $conn->prepare("SELECT * FROM tblaccounts WHERE username = :username");
    $stmt->execute(['username' => $username]);

    if ($stmt->rowCount() > 0) {
        echo "Username already exists.";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO tblaccounts (username, password) VALUES (:username, :password)");
        $stmt->execute(['username' => $username, 'password' => $password]);
        header("Location: Index.php");
        exit();
    }
}
?>
