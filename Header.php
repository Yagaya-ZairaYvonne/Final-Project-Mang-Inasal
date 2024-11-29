<?php
// Start session only if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection
include('dbconnect.php');

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="Header.css">
    <style>
        .form-container {
            display: none; /* Forms are hidden by default */
            position: absolute;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            width: 300px;
            background-color: #faf5ee;
            box-shadow: 0 5px 27px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            z-index: 1000;
        }

        .form-container h2 {
            margin-bottom: 15px;
            text-align: center;
        }

        .form-container form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container form button {
            width: 100%;
            padding: 10px;
            background-color: #2d9751;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container form button:hover {
            background-color: #14463a;
        }

        .form-container .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }

        .form-container .close-btn:hover {
            color: red;
        }

        .form-container h2{
        color: #212529;
        text-align: center;
        margin:auto;
            }
    </style>
</head>
<body>
<header>
    <div class="topnav">
        <a href="Index.php">
            <img src="Images/Inasal logo.jpg" class="logo">
        </a>
        <a href="Index.php" class="left">Home</a>
        <a href="Menu Page_MI.php" class="left">Menu</a>
        <a href="Delivery.php" class="left">Delivery</a>
        <a href="Promos.php" class="left">Promos</a>
        <a href="location.php" class="left">Location</a>
        <a href="javascript:void(0);" class="split order" onclick="handleOrderClick()">Order Now</a>
        <?php if ($isLoggedIn): ?>
            <a href="logout.php" class="split">Logout</a> 
        <a class = "split"><span class="split">Hello, <?= htmlspecialchars($_SESSION['username']) ?></span></a>    
        <a href="Cart.php" class = "split">Cart</a>
            
        <?php else: ?>
            <a href="javascript:void(0);" class="split" onclick="toggleForm('loginForm')">Login</a>
            <a href="javascript:void(0);" class="split" onclick="toggleForm('signupForm')">Signup</a>
        <?php endif; ?>
    </div>
</header>

<!-- Hidden Login Form -->
<div id="loginForm" class="form-container">
    <button class="close-btn" onclick="toggleForm('loginForm')">&times;</button>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

<!-- Hidden Signup Form -->
<div id="signupForm" class="form-container">
    <button class="close-btn" onclick="toggleForm('signupForm')">&times;</button>
    <h2>Signup</h2>
    <form action="signup.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Signup</button>
    </form>
</div>

<script>
// JavaScript to toggle the visibility of forms
function toggleForm(formId) {
    const form = document.getElementById(formId);
    const otherForm = formId === 'loginForm' ? document.getElementById('signupForm') : document.getElementById('loginForm');
    
    // Hide the other form if it's visible
    if (otherForm.style.display === 'block') {
        otherForm.style.display = 'none';
    }
    
    // Toggle the target form's visibility
    form.style.display = (form.style.display === 'block') ? 'none' : 'block';
}

// Function to handle "Order Now" click
function handleOrderClick() {
    <?php if ($isLoggedIn): ?>
        // Redirect to Menu page if logged in
        window.location.href = 'Menu Page_MI.php';
    <?php else: ?>
        // Show login form if not logged in
        toggleForm('loginForm');
    <?php endif; ?>
}
</script>

</body>
</html>
