<?php
session_start(); 

$hostname = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "dbinasal"; 

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mang Inasal</title>
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search">
</head>
<style>
  .order-now-text a{
    text-decoration: none;
    color: white;
  }
</style>
<body>

<?php
include 'header.php';
?>

  <form action="/search" method="GET">
  <div class="search-bar">
    <span class="search-icon material-symbols-outlined">search</span>
    <input type="text" placeholder="What are you looking for?" />
    <button class="search-btn">Search</button>
  </div>
  </form>

  <section class="hero">
    <h1>Welcome to Mang Inasal!</h1>
    <p>Mang Inasal is the Philippines' Grill Expert that delightfully serves ihaw-sarap food and Unli-Saya experience.</p>
  </section>

  <section class="menu">
    <h2>Menu</h2>
    <h3>Order now via manginasaldelivery.com.ph</h3>
    <div class="menu-items">
      <div class="menu-item">
      <img src="Images/Paa-large-PM1.webp" alt="Paa Large">
      <h2>Paa Large - PM1</h2>
        <?php if ($isLoggedIn): ?>
            <form action="order.php" method="POST">
                <input type="hidden" name="item" value="Paa Large">
                <input type="hidden" name="quantity" value="1">
                <button type="submit">Order Now</button>
            </form>
        <?php else: ?>
          <a href="javascript:void(0);" class="split" onclick="toggleForm('loginForm')"> <button>Order Now</button></a>
            </a>
        <?php endif; ?>
      </div>

      <div class="menu-item">
        <img src="Images/Extra-Creamy-Halo-Halo.png" alt="Extra Creamy Halo-Halo">
        <h2>Extra Creamy Halo-Halo</h2>
        <?php if ($isLoggedIn): ?>
            <form action="order.php" method="POST">
                <input type="hidden" name="item" value="Extra Creamy Halo-Halo">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="price" value="200">
                <button type="submit">Order Now</button>
            </form>
        <?php else: ?>
          <a href="javascript:void(0);" class="split" onclick="toggleForm('loginForm')"> <button>Order Now</button></a>
            </a>
        <?php endif; ?>
      </div>
      <div class="menu-item">
        <img src="Images/palabok.png" alt="Palabok">
        <h2>Palabok</h2>
        <?php if ($isLoggedIn): ?>
            <form action="order.php" method="POST">
                <input type="hidden" name="item" value="Palabok">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="price" value="230">
                <button type="submit">Order Now</button>
            </form>
        <?php else: ?>
          <a href="javascript:void(0);" class="split" onclick="toggleForm('loginForm')"> <button>Order Now</button></a>
            </a>
        <?php endif; ?>
      </div>
      <div class="menu-item">
        <img src="Images/2-pc-Pork-BBQ-with-Spiced-Vinegar-2.webp" alt="2 pcs Pork BBQ with Spiced Vinegar">
        <h2>2 pc Pork BBQ with Spiced Vinegar</h2>
        <?php if ($isLoggedIn): ?>
            <form action="order.php" method="POST">
                <input type="hidden" name="item" value="2 pc Pork BBQ with Spiced Vinegar">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="price" value="290">
                <button type="submit">Order Now</button>
            </form>
        <?php else: ?>
          <a href="javascript:void(0);" class="split" onclick="toggleForm('loginForm')"> <button>Order Now</button></a>
            </a>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="promos">
    <h2>Promos</h2>
    <h3>These deals and discounts are waiting for you!</h3>
    <div class="promo-items">
      <div class="promo-item">
        <img src="Images/promo1.webp" alt="Promo 1">
      </div>
      <div class="promo-item">
        <img src="Images/promo2.png" alt="Promo 2">
      </div>
      <div class="promo-item">
        <img src="Images/promo3.webp" alt="Promo 3">
      </div>
    </div>
  </section>

  <section class="order-now">
    <h2>Order Now</h2>
    <p>Enjoy ihaw-sarap now via Mang Inasal Delivery!</p>
    <div class="order-now-row">
      <!-- Download App Section -->
      <div class="order-now-item">
        <img src="Images/phone.webp" alt="Download App">
        <div class="order-now-text">
          <h3>Download our App!</h3>
          <p>Get exclusive offers by downloading our app now!</p>
          <div class="app-buttons">
            <a href="https://play.google.com/store/apps/details?id=place.order.mang.inasal&hl=en&gl=US&pli=1"><img src="Images/app.png" alt="Google Play"></a>
            <a href="https://apps.apple.com/ph/app/mang-inasal/id1581939994"><img src="Images/apple.png" alt="App Store"></a>
          </div>
        </div>
      </div>
      <!-- Order Online Section -->
      <div class="order-now-item">
        <img src="Images/OrderOnline.webp" alt="Order Online">
        <div class="order-now-text">
          <h3>Order Online</h3>
          <p>Enjoy your ihaw-sarap favorites wherever you are!</p>
          <button><a href="Delivery.php">Order Now</a></button>
        </div>
      </div>
    </div>
  </section>

<?php
include 'footer.php';
?>
  
</body>
</html>

