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

      <div style="width: 100%; height: 655px; overflow-y: auto;">
        <?php include 'includes/cartComponent.php'; ?>
      </div>

    </div>
  </div>
</body>

</html>