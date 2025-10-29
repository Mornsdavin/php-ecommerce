<?php
require_once '../service/product_service.php';

$db = new DB();

$products = $db->getRows('products');
$productCount = count($products);

$order_history = $db->getRows('order_history');
$orderCount = count($order_history);

//data for line chart - products added per month
$productDates = array_column($products, 'createDate');


$monthlyCounts = array_fill(0, 12, 0);
foreach ($productDates as $date) {
  $month = date('n', strtotime($date)) - 1;
  $monthlyCounts[$month]++;
}

$currentMonth = date('n'); // 1–12
$months = [];
$data = [];

for ($i = 5; $i >= 0; $i--) {
  $monthIndex = ($currentMonth - $i - 1 + 12) % 12;
  $months[] = date('M', mktime(0, 0, 0, $monthIndex + 1, 1));
  $data[] = $monthlyCounts[$monthIndex];
}

$monthLabels = json_encode($months);
$monthlyProductData = json_encode($data);

$totalLast6Months = array_sum($data);

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
    var monthLabels = <?php echo $monthLabels; ?>;

    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: monthLabels, // Dynamic last 6 months
        datasets: [{
          label: 'Products Added in Last 6 Months',
          data: monthlyProductData,
          borderColor: 'blue',
          backgroundColor: 'rgba(0, 0, 255, 0.2)',
          borderWidth: 2,
          tension: 0.5
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
        labels: ['Customers', 'Order'],
        datasets: [{
          label: 'Total',
          data: [<?php echo $orderCount; ?>, <?php echo $orderCount; ?>], // Values for each section
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