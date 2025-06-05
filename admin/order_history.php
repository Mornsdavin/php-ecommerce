<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <?php include 'includes/head.php'; ?>
    
    <style>
      h1 {
        text-align: center;
      }
    </style>
</head>
<body>

    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <?php include 'includes/sidebar.php'; ?>
      
      <div style="width: 100%;">
        <?php include 'includes/navbar.php'; ?>
        
        <div style="padding: 20px;">
          <h1>Order History</h1>

          <div style="width: 100%; padding: 10px 40px;">
            <?php include 'includes/tableComponent.php'; ?>
          </div>

        </div>
      </div>
    </div>
</body>
</html>