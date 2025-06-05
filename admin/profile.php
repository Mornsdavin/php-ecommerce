<?php
session_start(); // Start the session to get user info

require_once '../service/product_service.php';

$db = new DB();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Fetch the user's email from the session
$email = $_SESSION['user'];

// Fetch user data from the database
$user = $db->getRow('user', ["email" => $email]);

// Check if user exists in the database
if (!$user) {
    echo "User not found!";
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Admin</title>
  <?php include 'includes/head.php'; ?>
</head>

<style>
  p {
    font-size: 20px;
  }
</style>

<body>

  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <?php include 'includes/sidebar.php'; ?>

    <div style="width: 100%;">
      <?php include 'includes/navbar.php'; ?>

      <div style="padding: 20px;">
        <div class="cover-bg">
          <img src="./assets/images/dashboard/ecommerce/filterbg.jpg" alt="cover" style="width: 100%; height: 140px; object-fit: cover; border-radius: 10px;">
        </div>
        <div style="width: 140px; height: 140px; border-radius: 50%; background-color: darkblue; display: flex; justify-content: center; align-items: center; margin-top: -60px; margin-left: 100px; padding: 5px;">
          <img src="./assets/images/faces/face1.jpg" style="width: 100%; height: 100%; border-radius: 50%;">  
        </div>

        <div style="padding: 20px 100px;">
          <h3>Profile Information</h3>
          <div style="margin-top: 30px; display: grid; gap: 30px;">
            <div style="display: flex; align-items: center; border-radius: 8px; gap: 10px;">
              <p style="margin: 0; font-weight: 600;">Name: </p>
              <input type="text" value="<?php echo htmlspecialchars($user['name']); ?>"
                style="padding: 6px; width: 400px; border: 1px solid #ccc; border-radius: 5px; outline: none; margin-left: 58px;">
            </div>

            <div style="display: flex; align-items: center; border-radius: 8px; gap: 10px;">
              <p style="margin: 0; font-weight: 600;">Email: </p>
              <input type="text" value="<?php echo htmlspecialchars($user['email']); ?>"
                style="padding: 6px; width: 400px; border: 1px solid #ccc; border-radius: 5px; outline: none; margin-left: 63px;">
            </div>

            <div style="display: flex; align-items: center; border-radius: 8px; gap: 10px;">
              <p style="margin: 0; font-weight: 600;">Password: </p>
              <input type="text" value="<?php echo htmlspecialchars($user['password']); ?>"
                style="padding: 6px; width: 400px; border: 1px solid #ccc; border-radius: 5px; outline: none; margin-left: 20px;">
            </div>

            <div style="display: flex; align-items: center; border-radius: 8px; gap: 10px;">
              <p style="margin: 0; font-weight: 600;">Address: </p>
              <input type="text" value="<?php echo htmlspecialchars($user['address']); ?>"
                style="padding: 6px; width: 400px; border: 1px solid #ccc; border-radius: 5px; outline: none; margin-left: 35px;">
            </div>

            <button style="width: 200px; padding: 8px 15px; border-radius: 10px; background-color: #9782FF; border: none; color: white;">Submit Change</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
