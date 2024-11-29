<?php
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Locations</title>
        <link rel="stylesheet" href="location.css">
        <style>
            .location-item {
                color: black;
            }
        </style>
        <script>
            // JavaScript to filter locations based on region and city
            function filterLocations() {
                const searchInput = document.getElementById("search-input").value.toLowerCase();
                const regionSelect = document.getElementById("region").value;
                const citySelect = document.getElementById("city").value;

                const locationItems = document.querySelectorAll(".location-item");
                locationItems.forEach(item => {
                    let locationName = item.textContent.toLowerCase();
                    let isRegionMatch = regionSelect ? item.dataset.region === regionSelect : true;
                    let isCityMatch = citySelect ? item.dataset.city === citySelect : true;
                    let isSearchMatch = locationName.includes(searchInput);

                    if (isRegionMatch && isCityMatch && isSearchMatch) {
                        item.style.display = "block";
                    } else {
                        item.style.display = "none";
                    }
                });
            }

            // JavaScript to clear the filters
            function clearFilters() {
                document.getElementById("search-input").value = '';
                document.getElementById("region").value = '';
                document.getElementById("city").value = '';
                filterLocations();
            }

            // JavaScript to change location details dynamically
            function changeDetails(locationName, locationAddress, locationHours) {
                document.getElementById("location-name").textContent = locationName;
                document.getElementById("location-address").textContent = `Address: ${locationAddress}`;
                document.getElementById("location-hours").textContent = `Operating Hours: ${locationHours}`;
            }

            // Auto highlight the first location by default
            window.onload = function() {
                document.querySelector('.location-item').classList.add('active');
            };
        </script>
    </head>
    
    <?php
    include 'header.php';
    ?>

    <body>
        <div class="banner">
            <div class="banner-content">
                <img src="Images/location.jpg" alt="Mang Inasal Banner" class="banner-image">
                <div class="banner-text">
                    <h1>Locations</h1>
                    <p>
                        Mang Inasal stores are open for dine-in, takeout, and delivery from Monday to Sunday. However, operating hours may vary during the Holiday season.
                    </p>
                    <p>For more information, kindly contact our branches.</p>
                </div>
            </div>
        </div>

        <div class="locations-container">
            <!-- Search and Filter Section -->
            <div class="search-filter">
                <input type="text" id="search-input" placeholder="Search location here" class="search-input" onkeyup="filterLocations()">
                <div class="filter">
                    <select name="region" id="region" onchange="filterLocations()">
                        <option value="" disabled selected>Filter by Region</option>
                        <option value="Luzon">Luzon</option>
                        <option value="Visayas">Visayas</option>
                        <option value="Mindanao">Mindanao</option>
                    </select>
                    <select name="city" id="city" onchange="filterLocations()">
                        <option value="" disabled selected>City</option>
                        <option value="Caloocan">Caloocan</option>
                        <option value="Manila">Manila</option>
                        <option value="Cebu">Cebu</option>
                        <option value="Davao">Davao</option>
                        <option value="Taytay">Taytay</option>
                        <option value="Bacolod">Bacolod</option>
                    </select>
                    <button class="clear-btn" onclick="clearFilters()">CLEAR</button>
                </div>
            </div>

            <!-- Location List and Details Section -->
            <div class="locations-content">
                <div class="location-list">
                    <ul>
                        <li class="location-item" data-region="Visayas" data-city="Bacolod" onclick="changeDetails('SM City Bacolod', 'Bacolod City, Negros Occidental', 'Open: 10 AM - 9 PM')">SM City Bacolod</li>
                        <li class="location-item" data-region="Mindanao" data-city="Davao" onclick="changeDetails('SM City Davao', 'Davao City, Davao del Sur', 'Open: 10 AM - 9 PM')">SM City Davao</li>
                        <li class="location-item" data-region="Luzon" data-city="Taytay" onclick="changeDetails('SM City Taytay', 'Taytay, Rizal', 'Open: 10 AM - 9 PM')">SM City Taytay</li>
                        <li class="location-item" data-region="Visayas" data-city="Cebu" onclick="changeDetails('SM Seaside City Cebu', 'Cebu City, Cebu', 'Open: 10 AM - 9 PM')">SM Seaside City Cebu</li>
                        <li class="location-item" data-region="Luzon" data-city="Pasig" onclick="changeDetails('SM City East Ortigas', 'Pasig City, Metro Manila', 'Open: 10 AM - 9 PM')">SM City East Ortigas</li>
                        <li class="location-item" data-region="Visayas" data-city="Cebu" onclick="changeDetails('City Mall Consolacion', 'Consolacion, Cebu', 'Open: 10 AM - 9 PM')">City Mall Consolacion</li>
                        <li class="location-item" data-region="Mindanao" data-city="Dipolog" onclick="changeDetails('City Mall Dipolog', 'Dipolog City, Zamboanga del Norte', 'Open: 10 AM - 9 PM')">City Mall Dipolog</li>
                        <li class="location-item" data-region="Luzon" data-city="Cavite" onclick="changeDetails('City Mall Imus', 'Imus, Cavite', 'Open: 10 AM - 9 PM')">City Mall Imus</li>
                        <li class="location-item" data-region="Luzon" data-city="Tarlac" onclick="changeDetails('City Mall Tarlac', 'Tarlac City, Tarlac', 'Open: 10 AM - 9 PM')">City Mall Tarlac</li>
                    </ul>
                </div>

                <!-- Location Details Section -->
                <div class="location-details">
                    <h2 id="location-name">Select a Location</h2>
                    <p id="location-address">Address will be displayed here</p>
                    <p id="location-hours">Operating hours will be displayed here</p>
                </div>
            </div>
        </div>

        <?php
        include 'footer.php';
        ?> 
    </body>
</html>
