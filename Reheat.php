<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reheating Procedure</title>
  <link rel="stylesheet" href="Reheat.css">
</head>

<style>
      .content {
        color: black;
      }
      .sidebar li{
        color: black;
      }
    </style>

<body>
   <?php include 'Header.php'; ?>
  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <ul>
        <li onclick="showReheating('chicken')" class="active">Chicken Inasal</li>
        <li onclick="showReheating('pork')">Pork BBQ</li>
        <li onclick="showReheating('liempo')">Liempo Inasal</li>
        <li onclick="showReheating('sisig')">Sisig</li>
        <li onclick="showReheating('palabok')">Palabok</li>
        <li onclick="showReheating('empanada')">Empanada</li>
      </ul>
    </div>
    <!-- Main Content -->
    <div class="content" id="reheatingContent">
      <h2>Chicken Inasal</h2>
      <table>
        <thead>
          <tr>
            <th>Method</th>
            <th>Duration</th>
            <th>Instructions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <img src="Images/microwave.png" alt="Microwave">
              <p>Microwave</p>
            </td>
            <td>1 minute 30 seconds</td>
            <td>
              <ul>
                <li>Use microwaveable containers</li>
                <li>Place 1 cup of water beside containers</li>
                <li>Set setting to medium</li>
              </ul>
            </td>
          </tr>
          <tr>
            <td>
              <img src="Images/pan.png" alt="Frying Pan">
              <p>Frying Pan</p>
            </td>
            <td>30 seconds per side</td>
            <td>
              <ul>
                <li>On medium flame</li>
              </ul>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

<?php include 'Footer.php'; ?>
</body>

<script>
    // Function to dynamically update reheating content
function showReheating(item) {
  // Sidebar button highlighting
  const buttons = document.querySelectorAll('.sidebar ul li');
  buttons.forEach((button) => button.classList.remove('active'));
  event.target.classList.add('active');

  // Content update
  const content = document.getElementById('reheatingContent');

  switch (item) {
    case 'chicken':
      content.innerHTML = `
        <h2>Chicken Inasal</h2>
        <table>
          <thead>
            <tr>
              <th>Method</th>
              <th>Duration</th>
              <th>Instructions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <img src="Images/microwave.png" alt="Microwave">
                <p>Microwave</p>
              </td>
              <td>1 minute 30 seconds</td>
              <td>
                <ul>
                  <li>Use microwaveable containers</li>
                  <li>Place 1 cup of water beside containers</li>
                  <li>Set setting to medium</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td>
                <img src="Images/pan.png" alt="Frying Pan">
                <p>Frying Pan</p>
              </td>
              <td>30 seconds per side</td>
              <td>
                <ul>
                  <li>On medium flame</li>
                </ul>
              </td>
            </tr>
          </tbody>
        </table>
      `;
      break;

    case 'pork':
      content.innerHTML = `
        <h2>Pork BBQ</h2>
        <table>
          <thead>
            <tr>
              <th>Method</th>
              <th>Duration</th>
              <th>Instructions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <img src="Images/microwave.png" alt="Microwave">
                <p>Microwave</p>
              </td>
              <td>30 seconds</td>
              <td>
                <ul>
                  <li>Use microwaveable containers</li>
                  <li>Set setting to medium</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td>
                <img src="Images/oven2.png" alt="Oven">
                <p>Oven</p>
              </td>
              <td>2-3 minutes</td>
              <td>
                <ul>
                  <li>Preheat the oven</li>
                  <li>Wrap BBQ in foil</li>
                  <li>Set temperature to medium</li>
                </ul>
              </td>
            </tr>
          </tbody>
        </table>
      `;
      break;

    case 'liempo':
      content.innerHTML = `
        <h2>Liempo Inasal</h2>
        <table>
          <thead>
            <tr>
              <th>Method</th>
              <th>Duration</th>
              <th>Instructions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <img src="Images/microwave.png" alt="Microwave">
                <p>Microwave</p>
              </td>
              <td>1 minute</td>
              <td>
                <ul>
                  <li>Use microwaveable containers</li>
                  <li>Set setting to medium</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td>
                <img src="Images/grill.png" alt="Grill">
                <p>Grill</p>
              </td>
              <td>3-5 minutes</td>
              <td>
                <ul>
                  <li>Set to medium flame</li>
                  <li>Flip once during reheating</li>
                </ul>
              </td>
            </tr>
          </tbody>
        </table>
      `;
      break;

    case 'sisig':
      content.innerHTML = `
        <h2>Sisig</h2>
        <table>
          <thead>
            <tr>
              <th>Method</th>
              <th>Duration</th>
              <th>Instructions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <img src="Images/microwave.png" alt="Microwave">
                <p>Microwave</p>
              </td>
              <td>45 seconds</td>
              <td>
                <ul>
                  <li>Use microwaveable containers</li>
                  <li>Set setting to medium</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td>
                <img src="Images/pan.png" alt="Frying Pan">
                <p>Frying Pan</p>
              </td>
              <td>2 minutes</td>
              <td>
                <ul>
                  <li>Stir continuously</li>
                  <li>Medium flame</li>
                </ul>
              </td>
            </tr>
          </tbody>
        </table>
      `;
      break;

    // Add cases for 'palabok' and 'empanada' similar to above
  }
}
  </script>

</html>
