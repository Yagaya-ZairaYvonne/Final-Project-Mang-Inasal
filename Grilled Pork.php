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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grilled Pork</title>
  <link rel="stylesheet" href="Menu Page.css">
</head>
<body>
<style>
        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4); /* Black background with opacity */
        }

        .modal-content {
            background-color: white;
            margin: 15% auto; /* 15% from top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 90%; /* Could be more or less, depending on screen size */
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-content h2 {
            margin-bottom: 20px;
        }

        .modal-content button {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-content button.delivery {
            background-color: #28a745;
            color: white;
        }

        .modal-content button.pickup {
            background-color: #6c757d;
            color: white;
        }

        .modal-content button.confirm {
            background-color: #007bff;
            color: white;
        }

        .modal-content .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
            background: none;
            border: none;
        }
    </style>
<?php
include 'header.php';
?>


    <div class="main-content">
        <img class="smallhome" src="Images/home logo.png" /><h2>/Choose your meal!</h2>
        <h6>Menu/ Grilled Pork</h6>
        <div class="menu-items">
        <a href="Group Meals.php"><div class="menu-item active">Group Meals</div></a>
          <a href="Chicken Inasal.php"><div class="menu-item">Chicken Inasal</div></a>
          <a href="Halo-Halo.php"><div class="menu-item">Halo-Halo</div></a>
          <a href="Palabok.php"><div class="menu-item">Palabok</div></a>
          <a href="Grilled Pork.php"><div class="menu-item">Grilled Pork</div></a>
          <a href="Sisig.php"><div class="menu-item">Sisig</div></a>
          <a href="Togue.php"><div class="menu-item">Lumpiang Togue</div></a>
          <a href="Rice Meals.php"><div class="menu-item">Rice Meals</div></a>
        </div>
      </div>
      <div class="menu-container">
        <div class="menu-item">
          <img src="Images/Solo-Fiesta-BBQ1.jpg" alt="Solo-Fiest-BBQ">
          <p>2 pc Pork BBQ Solo Fiesta</p>
          <button>Order Now</button>
        </div>
      
        <div class="menu-item">
          <img src="Images/pork-bbq-2.jpg" alt="1 pc Pork BBQ with Peanut Sauce and Java Rice">
          <p>1 pc Pork BBQ with Peanut Sauce and Java Rice</p>
          <?php if ($isLoggedIn): ?>
            <form action="order.php" method="POST">
                <input type="hidden" name="item" value="1 pc Pork BBQ with Peanut Sauce and Java Rice">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="price" value="210">
                <button type="submit">Order Now</button>
            </form>
        <?php else: ?>
          <a href="javascript:void(0);" class="split" onclick="toggleForm('loginForm')"> <button>Order Now</button></a>
            </a>
        <?php endif; ?>
        </div>


        <div class="menu-item">
          <img src="Images/2-pc-Pork-BBQ-with-Peanut-Sauce-4.jpg" alt="2 pc Pork BBQ with Peanut Sauce and Java Rice">
          <p>2 pc Pork BBQ with Peanut Sauce and Java Rice</p>
          <?php if ($isLoggedIn): ?>
            <form action="order.php" method="POST">
                <input type="hidden" name="item" value="2 pc Pork BBQ with Peanut Sauce and Java Rice">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="price" value="250">
                <button type="submit">Order Now</button>
            </form>
        <?php else: ?>
          <a href="javascript:void(0);" class="split" onclick="toggleForm('loginForm')"> <button>Order Now</button></a>
            </a>
        <?php endif; ?>
        </div>
     
      
        <div class="menu-item">
          <img src="Images/2-pc-Pork-BBQ-with-Spiced-Vinegar-3.jpg" alt="2 pc Pork BBQ with Spiced Vinegar">
          <p>2 pc Pork BBQ with Spiced Vinegar</p>
          <?php if ($isLoggedIn): ?>
            <form action="order.php" method="POST">
                <input type="hidden" name="item" value="2 pc Pork BBQ with Spiced Vinegar>
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="price" value="190">
                <button type="submit">Order Now</button>
            </form>
        <?php else: ?>
          <a href="javascript:void(0);" class="split" onclick="toggleForm('loginForm')"> <button>Order Now</button></a>
        <?php endif; ?>
        </div>
    

        <div class="menu-item">
            <img src="Images/Pork-BBQ-Family-Size.jpg" alt="Pork BBQ Family Size">
            <p>Pork BBQ Family Size</p>
            <?php if ($isLoggedIn): ?>
            <form action="order.php" method="POST">
                <input type="hidden" name="item" value="Pork BBQ Family Size">
                <input type="hidden" name="quantity" value="1">
                <button type="submit">Order Now</button>
            </form>
        <?php else: ?>
          <a href="javascript:void(0);" class="split" onclick="toggleForm('loginForm')"> <button>Order Now</button></a>
            </a>
        <?php endif; ?>
        </div>
     
        
          <div class="menu-item">
            <img src="Images/Pork-BBQ-Buddy-Size.jpg" alt="Pork BBQ Buddy Size">
            <p>Pork BBQ Buddy Size</p>
            <?php if ($isLoggedIn): ?>
            <form action="order.php" method="POST">
                <input type="hidden" name="item" value="Pork BBQ Buddy Size">
                <input type="hidden" name="quantity" value="1">
                <button type="submit">Order Now</button>
            </form>
        <?php else: ?>
          <a href="javascript:void(0);" class="split" onclick="toggleForm('loginForm')"> <button>Order Now</button></a>
            </a>
        <?php endif; ?>
        </div>
 
  
          <div class="menu-item">
            <img src="Images/1-pc-Pork-BBQ-Ala-Carte-new-img-2-.jpg" alt="1 pc Pork BBQ Ala Carte">
            <p>1 pc Pork BBQ Ala Carte</p>
            <?php if ($isLoggedIn): ?>
            <form action="order.php" method="POST">
                <input type="hidden" name="item" value="">
                <input type="hidden" name="quantity" value="1 pc Pork BBQ Ala Carte">
                <button type="submit">Order Now</button>
            </form>
        <?php else: ?>
          <a href="javascript:void(0);" class="split" onclick="toggleForm('loginForm')"> <button>Order Now</button></a>
            </a>
        <?php endif; ?>
        </div>

        
          <div class="menu-item">
            <img src="Images/Grilled-LiempoRM.jpg" alt="Grilled Liempo">
            <p>Grilled Liempo</p>
            <button class="order-btn" onclick="openModal()">Order Now</button>
          </div>

          <div class="menu-item">
            <img src="Images/Sizzling-Liempo.jpg" alt="Sizzling Liempo">
            <p>Sizzling Liempo</p>
            <?php if ($isLoggedIn): ?>
            <form action="order.php" method="POST">
                <input type="hidden" name="item" value="Pork BBQ Buddy Size">
                <input type="hidden" name="quantity" value="1">
                <button type="submit">Order Now</button>
            </form>
        <?php else: ?>
          <a href="javascript:void(0);" class="split" onclick="toggleForm('loginForm')"> <button>Order Now</button></a>
            </a>
        <?php endif; ?>
        </div>
          </div>
      </div>
    
      
      <div class="container">
        <div class="card">
          <img src="Images/oven.jpg" alt="Reheating Procedure" />
          <p>Reheating Procedure</p>
          <button><a href="Reheat.php">Find Out More</a></button>
        </div>
      
        <div class="card">
          <img src="Images/veggies.jpg" alt="Allergen Declaration" />
          <p>Allergen Declaration</p>
          
          <button><a href="Table.php">Find Out More</a></button>
        </div>
      </div>
      <div id="orderModal" class="modal">
    <div class="modal-content">
        <h2>Delivery or Pick-up?</h2>
        <div class="option-buttons">
            <button class="delivery" onclick="selectOption('Delivery')">Delivery</button>
            <button class="pickup" onclick="selectOption('Pick-up')">Pick-up</button>
        </div>
        <div class="delivery-time">
            <h4>Delivery Time:</h4>
            <label>
                <input type="radio" name="delivery-time" value="Now" checked> Now
            </label>
            <label>
                <input type="radio" name="delivery-time" value="Schedule for later"> Schedule for later
            </label>
        </div>
        <button class="confirm" onclick="confirmOrder()">Confirm</button>
    </div>
</div>

<script>
   // Open modal function
   function openModal() {
        document.getElementById("orderModal").style.display = "block";
    }

    // Close modal function
    function closeModal() {
        document.getElementById("orderModal").style.display = "none";
    }

    // Handle option selection
    function selectOption(option) {
        console.log(option + " selected");
        // Add logic to handle Delivery or Pick-up
    }

    // Confirm order function
    function confirmOrder() {
        // Add logic to submit the order
        alert("Order confirmed!");
        closeModal();
    }

    // Close modal when clicking outside of the modal content
    window.onclick = function(event) {
        const modal = document.getElementById("orderModal");
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
</script>
      
<?php
include 'footer.php';
?>

</body>
</html>
