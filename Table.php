<?php
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Allergen Declaration</title>
        <link rel="stylesheet" href="table.css">
      </head>
      <style>
        .container {
          color: black;
        }
        .allergen-table tr {
          width: 100px;
          margin: 100%;
        }
      </style>
<body>
    <?php include'header.php'; ?>
    <div class="container">
        <section class="allergen-declaration">
          <h1>Allergen Declaration</h1>
          <p>
            Due to shared cooking equipment, preparation areas, and utensils, we cannot guarantee that food is completely free from allergens. 
            This allergen information is derived from supplier data and is updated periodically. For specific concerns, consult your healthcare provider.
          </p>
        </section>
    <section class="allergen-table">
      <h2>Allergen Table (as of March 2024)</h2>
      <table>
        <thead>
            <tr>
              <th>
                <div class="icon celery"></div>
                Celery
              </th>
              <th>
                <div class="icon gluten"></div>
                Cereals/Gluten
              </th>
              <th>
                <div class="icon crustaceans"></div>
                Crustaceans
              </th>
              <th>
                <div class="icon eggs"></div>
                Eggs
              </th>
              <th>
                <div class="icon fish"></div>
                Fish
              </th>
              <th>
                <div class="icon milk"></div>
                Milk
              </th>
              <th>
                <div class="icon mollusks"></div>
                Mollusks
              </th>
              <th>
                <div class="icon peanuts"></div>
                Peanuts
              </th>
              <th>
                <div class="icon sesame"></div>
                Sesame Seeds
              </th>
            </tr>
          </thead>
        <tbody>
          <tr>
            <td>Chicken Inasal</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="contains"></td>
            <td></td>
            <td></td>
        
          </tr>
          <tr>
            <td>Extra Creamy Halo-Halo</td>
            <td></td>
            <td class="contains"></td>
            <td></td>
            <td></td>
            <td class="contains"></td>
            <td></td>
            <td></td>
            <td></td>
            
          </tr>
          <tr>
            <td>Palabok</td>
            <td></td>
            <td class="contains"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="contains"></td>
            <td></td>
          </tr>
          <tr>
            <td>Pork Sisig</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="contains"></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Chicken Sisig</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="contains"></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Bangus Sisig</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="contains"></td>
            <td></td>
            <td></td>
            
          </tr>
          <tr>
            <td>Gravy Mix</td>
            <td class = "might-contains" ></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Java Rice</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Garlic Rice</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Fried Egg</td>
            <td></td>
            <td></td>
            <td class="contains"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Crema de Leche Halo-Halo</td>
            <td></td>
            <td class="contains"></td>
            <td></td>
            <td></td>
            <td class="contains"></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Leche Flan</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Sugar Packets</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Coca-Cola Products</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          
        </tbody>
      </table>
    </section>

    <section class="legend">
        <h3>Legend</h3>
        <ul>
          <li><span class="contains"></span> Contains</li>
          <li><span class="might-contains"></span> May Contain</li>
        </ul>
      </section>
    </section>

    <section class="disclaimer">
      <h3>Disclaimer</h3>
      <p>
        This allergen guide is for informational purposes only and is not intended for legal or medical advice. For allergy concerns, consult a healthcare professional before consuming.
      </p>
    </section>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
