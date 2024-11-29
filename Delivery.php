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

// Sample items data for all categories
$items = [
    'must_try' => [
        ['image' => 'must try 1.png', 'name' => 'Paa Large Family Size', 'price' => 937],
        ['image' => 'must try 2.png', 'name' => 'Paa Medium Family Size', 'price' => 399],
        ['image' => 'must try 3.png', 'name' => 'Paa Small Family Size', 'price' => 311],
        ['image' => 'must try 4.png', 'name' => 'Paa Regular Size', 'price' => 970],
        ['image' => 'must try 5.png', 'name' => 'Paa Super Large', 'price' => 369],
        ['image' => 'must try 6.png', 'name' => 'Paa Extra Large', 'price' => 179],
        ['image' => 'must try 7.png', 'name' => 'Paa Jumbo Size', 'price' => 789],
    ],
    'fiesta_meals' => [
        ['image' => 'fiesta 1.png', 'name' => 'Fiesta 1', 'price' => 150],
        ['image' => 'fiesta 2.png', 'name' => 'Fiesta 2', 'price' => 200],
        ['image' => 'fiesta 3.png', 'name' => 'Fiesta 3', 'price' => 220],
        ['image' => 'fiesta 4.png', 'name' => 'Fiesta 4', 'price' => 250],
        ['image' => 'fiesta 5.png', 'name' => 'Fiesta 5', 'price' => 180],
        ['image' => 'fiesta 6.png', 'name' => 'Fiesta 6', 'price' => 300],
        ['image' => 'fiesta 7.png', 'name' => 'Fiesta 7', 'price' => 280],
    ],
    'chicken_inasal' => [
        ['image' => 'chicken 1.png', 'name' => 'Chicken Inasal 1', 'price' => 180],
        ['image' => 'chicken 2.png', 'name' => 'Chicken Inasal 2', 'price' => 210],
        ['image' => 'chicken 3.png', 'name' => 'Chicken Inasal 3', 'price' => 240],
        ['image' => 'chicken 4.png', 'name' => 'Chicken Inasal 4', 'price' => 260],
    ],
    'pork_bbq' => [
        ['image' => 'bbq 1.png', 'name' => 'Pork BBQ 1', 'price' => 180],
        ['image' => 'bbq 2.png', 'name' => 'Pork BBQ 2', 'price' => 200],
        ['image' => 'bbq 3.png', 'name' => 'Pork BBQ 3', 'price' => 250],
        ['image' => 'bbq 4.png', 'name' => 'Pork BBQ 4', 'price' => 270],
    ],
    'halo_halo' => [
        ['image' => 'halo halo 1.png', 'name' => 'Halo-Halo 1', 'price' => 120],
        ['image' => 'halo halo 2.png', 'name' => 'Halo-Halo 2', 'price' => 150],
    ],
    'palabok' => [
        ['image' => 'palabok 1.png', 'name' => 'Palabok 1', 'price' => 160],
        ['image' => 'palabok 2.png', 'name' => 'Palabok 2', 'price' => 180],
    ],
    'liempo' => [
        ['image' => 'liempo 1.png', 'name' => 'Liempo 1', 'price' => 200],
        ['image' => 'liempo 2.png', 'name' => 'Liempo 2', 'price' => 220],
        ['image' => 'liempo 3.png', 'name' => 'Liempo 3', 'price' => 250],
        ['image' => 'liempo 4.png', 'name' => 'Liempo 4', 'price' => 280],
    ],
    'sisig' => [
        ['image' => 'sisig 1.png', 'name' => 'Sisig 1', 'price' => 150],
        ['image' => 'sisig 2.png', 'name' => 'Sisig 2', 'price' => 180],
        ['image' => 'sisig 3.png', 'name' => 'Sisig 3', 'price' => 200],
        ['image' => 'sisig 4.png', 'name' => 'Sisig 4', 'price' => 250],
    ],
    'lumpiang_togue' => [
        ['image' => 'lumpia 1.png', 'name' => 'Lumpia 1', 'price' => 100],
        ['image' => 'lumpia 2.png', 'name' => 'Lumpia 2', 'price' => 120],
    ],
    'inumin_atbp' => [
        ['image' => 'atbp 1.png', 'name' => 'Inumin ATBP 1', 'price' => 80],
        ['image' => 'atbp 2.png', 'name' => 'Inumin ATBP 2', 'price' => 100],
        ['image' => 'atbp 3.png', 'name' => 'Inumin ATBP 3', 'price' => 120],
        ['image' => 'atbp 4.png', 'name' => 'Inumin ATBP 4', 'price' => 140],
        ['image' => 'atbp 5.png', 'name' => 'Inumin ATBP 5', 'price' => 160],
        ['image' => 'atbp 6.png', 'name' => 'Inumin ATBP 6', 'price' => 180],
    ],
];

$isLoggedIn = isset($_SESSION['user_id']); // Assuming a session variable to track login status
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery</title>
    <link rel="stylesheet" href="Delivery.css">
</head>
<body>

<style>
    button:hover {
        cursor: pointer;
    }
</style>

<?php include 'header.php'; ?>

<div class="nav-bar">
    <div class="top-nav">
        <div class="top-left">
            <a href="#address-form">Please select address</a>
        </div>
        <div class="top-right">
            <input type="text" placeholder="Search..." class="search">
        </div>
    </div>
    <div class="bot-nav">
        <ul>
            <?php foreach ($items as $category => $category_items): ?>
                <li><a href="#<?= $category ?>"><?= ucfirst(str_replace('_', ' ', $category)) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<div class="container">
    <?php foreach ($items as $category => $category_items): ?>
        <div class="col-body">
            <h6><?= ucfirst(str_replace('_', ' ', $category)) ?></h6>
            <div class="bar">
                <?php foreach ($category_items as $item): ?>
                    <div class="bar-left">
                        <?php if ($isLoggedIn): ?>
                            <!-- Form for logged-in users -->
                            <form action="order.php" method="POST">
                                <input type="hidden" name="item" value="<?= htmlspecialchars($item['name']) ?>">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="price" value="<?= htmlspecialchars($item['price']) ?>">
                                <button type="submit">
                                    <img src="Images/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                                </button>
                            </form>
                        <?php else: ?>
                            <!-- Link for non-logged-in users -->
                            <a href="javascript:void(0);" class="split" onclick="toggleForm('loginForm')">
                                <button>
                                    <img src="Images/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                                </button>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
