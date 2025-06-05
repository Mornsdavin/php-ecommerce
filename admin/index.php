<?php
require_once '../service/product_service.php';

$db = new DB();

$products = $db->getRows('products');
$productCount = count($products);

$order_history = $db->getRows('order_history');
$orderCount = count($order_history);

$productDates = array_column($products, 'createDate'); 

$monthlyProductCount = array_fill(0, 6, 0); 

foreach ($productDates as $date) {
  $month = date('n', strtotime($date)) - 1;
  $monthlyProductCount[$month]++;
}

$monthlyProductData = json_encode($monthlyProductCount);


?>

<!DOCTYPE html>
<html>

<head>
  <title>Admin</title>
  <?php include 'includes/head.php'; ?>
</head>

<body>

  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <?php include 'includes/sidebar.php'; ?>

    <div style="width: 100%;">
      <?php include 'includes/navbar.php'; ?>

      <div style="padding: 20px;">
        <?php include 'includes/dashboard-card.php' ?>

        <div class="graph-container">
          <div class="first-graph">
            <canvas id="myLineChart"></canvas>
          </div>
          <div class="second-graph">
            <canvas id="myPolarChart"></canvas>
          </div>
        </div>

      </div>
    </div>

  </div>



  <script>
    var ctx = document.getElementById('myLineChart').getContext('2d');

    var monthlyProductData = <?php echo $monthlyProductData; ?>;

    var myLineChart = new Chart(ctx, {
      type: 'line', // Chart type
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: 'Products Added',
          data: monthlyProductData,
          borderColor: 'blue',
          backgroundColor: 'rgba(0, 0, 255, 0.2)',
          borderWidth: 2,
          tension: 0.35
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>


  <script>
    // Get the canvas element
    var ctx = document.getElementById('myPolarChart').getContext('2d');

    // Create the Polar Area Chart
    var myPolarChart = new Chart(ctx, {
      type: 'polarArea', // Chart type
      data: {
        labels: ['Customers', 'Order', 'Out of Stock'],
        datasets: [{
          label: 'Total',
          data: [6, 6, 0], // Values for each section
          backgroundColor: [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 206, 86, 0.5)',
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
          ],
          borderWidth: 2
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });
  </script>
</body>

</html>