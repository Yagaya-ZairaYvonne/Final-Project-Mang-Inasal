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
    <title>Promos</title>
    <link rel="stylesheet" href="Promo.css">
</head>
<body>

<?php
include 'header.php';
?>
    
    <div class="nav">
        <div class="smallhome">
            <img src="Images/home logo.png" alt="Home Logo">
        </div>
        <div class="nav-links">
            <span>Promos & e-Gifts /</span> 
            <span class="active">Promos</span>
        </div>
    </div>

    <!-- Main Promos Section -->
    <h2 class="promo-title">Promos</h2>
    <section class="main-promos">
        <div class="promo">
            <div class="promo-image">
                <img src="Images/780-X-638-min-1.png" alt="Big Promo Image">
            </div>
            <div class="promo-text">
                <h2>ChristmaSAYA Combo Deals</h2>
                <p>Save ₱20 by ordering Mang Inasal Chicken Inasal Paa or Pecho, paired with Extra Creamy Halo-Halo 8oz. or Crema de Leche Halo-Halo 8oz., drinks, and Unli-Rice. </p>
                
                <p>Enjoy this special promo for dine-in and takeout from November 15, 2024 to December 31, 2024. </p>

                <p>This promo is also available in Pork BBQ Combo.</p>
            </div>
        </div>
    </section>

    <hr>

    <!-- Other Promos Section -->
    <section class="other-promos">
        <h2>Other Promos</h2>
        <div class="promo-grid">
            <!-- Promo 1 -->
            <div class="promo-item">
                <a href="#" data-promo="promo1">
                    <img src="Images/promos 1.png" alt="Promo 1">
                </a>
            </div>
            <!-- Promo 2 -->
            <div class="promo-item">
                <a href="#" data-promo="promo2">
                    <img src="Images/promos 2.png" alt="Promo 2">
                </a>
            </div>
            <!-- Promo 3 -->
            <div class="promo-item">
                <a href="#" data-promo="promo3">
                    <img src="Images/promos 3.png" alt="Promo 3">
                </a>
            </div>
            <!-- Promo 4 -->
            <div class="promo-item">
                <a href="#" data-promo="promo4">
                    <img src="Images/promos 4.png" alt="Promo 4">
                </a>
            </div>
            <!-- Promo 5 -->
            <div class="promo-item">
                <a href="#" data-promo="promo5">
                    <img src="Images/promos 5.png" alt="Promo 5">
                </a>
            </div>
            <!-- Promo 6 -->
            <div class="promo-item">
                <a href="#" data-promo="promo6">
                    <img src="Images/promos 6.png" alt="Promo 6">
                </a>
            </div>
        </div>
    </section>

    <!-- Modal for displaying promo details -->
    <div id="promoModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-image">
                <img src="" alt="Promo Image">
            </div>
            <div class="modal-info">
                <h2 id="promo-title"></h2>
                <p id="promo-description"></p>
            </div>
        </div>
    </div>

<script>
    // Sample Promo Data (replace with actual data)
const promoDetails = {
    promo1: {
        title: "Scoop Saya Midweek Treat",
        description: "Get a FREE extra scoop of ice cream with every purchase of Mang Inasal Extra Creamy Halo-Halo Regular. Treat yourself to this midweek delight, exclusively available every Tuesday, Wednesday, and Thursday from November 19 to November 28, 2024. Dine-in and takeout only—don't miss it!",
        image: "Images/promos 1.png"
    },
    promo2: {
        title: "Ihaw Fest (Oct. 16-31, 2024)",
        description: "Ihaw Fest continues with two FREE Palabok Solo for every purchase of any Family Fiesta Bundle! Perfect for sharing, this promo is available for dine-in, takeout, or delivery through the Mang Inasal app or at manginasaldelivery.com.ph from October 16 to 31, 2024.",
        image: "Images/promos 2.png"
    },
    promo3: {
        title: "Ihaw Fest (Oct. 1-15, 2024)",
        description: "Ihaw Fest kicks off with a FREE Mang Inasal Extra Creamy Halo-Halo! Get it when you buy two Chicken Inasal Value Meals from October 1 to 15, 2024. Enjoy this deal via dine-in, takeout, or delivery through the Mang Inasal app or at manginasaldelivery.com.ph.",
        image: "Images/promos 3.png"
    },
    promo4: {
        title: "Love the Flavors",
        description: "Get FREE Extra Creamy Halo-Halo 8oz. when you order PM1 or PM2. Enjoy the treat by simply presenting your boarding pass or e-ticket dated September 1 to 27, 2024. Bus tickets are also accepted. Make sure to bring a valid ID for proper identification.Enjoy this IHAWtastic treat to all local and foreign tourists via dine-in from September 23 to 27, 2024.",
        image: "Images/promos 4.png"
    },
    promo5: {
        title: "Peñafrancia Swakto Combo Deals",
        description: "Celebrate Peñafrancia Festival with the Peñafrancia Swakto Combo Deals! Avail special discounts on Chicken Inasal and Pork BBQ with drinks and Halo-Halo 8oz. Add-On available for dine-in and takeout in select Mang Inasal stores in Naga and Camarines Sur only from September 16 to 30, 2024.",
        image: "Images/promos 5.png"
    },
    promo6: {
        title: "MI Nation Treat",
        description: "Exclusive treat for Mang Inasal Nation members: Enjoy the MI Nation Treat and get FREE Extra Creamy halo-Halo 8oz. Add-On for every order of two Chicken Inasal Value Meal. Enjoy this promo via dine-in transactions from September 28 to 30, 2024.",
        image: "Images/promos 6.png"
    }
};

// Get elements
const promoItems = document.querySelectorAll('.promo-item a');
const modal = document.getElementById('promoModal');
const closeModal = document.querySelector('.close');
const promoTitle = document.getElementById('promo-title');
const promoDescription = document.getElementById('promo-description');
const modalImage = document.querySelector('.modal-image img');

// Event listener for each promo item
promoItems.forEach(item => {
    item.addEventListener('click', function(event) {
        event.preventDefault();
        
        // Get the promo ID from data-promo attribute
        const promoId = item.getAttribute('data-promo');
        
        // Update the modal with the relevant promo details
        const details = promoDetails[promoId];
        promoTitle.textContent = details.title;
        promoDescription.textContent = details.description;
        modalImage.src = details.image;
        
        // Show the modal
        modal.style.display = 'block';
    });
});

// Close modal when the "X" is clicked
closeModal.addEventListener('click', function() {
    modal.style.display = 'none';
});

// Close modal when clicking outside of modal content
window.addEventListener('click', function(event) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});
</script>

<?php
include 'footer.php';
?>

</body>
</html>