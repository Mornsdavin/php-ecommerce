<?php
    require_once './../service/product_service.php';

    $db = new DB();

    $products = $db->getRows('products');
    $productCount = count($products);

    $order_history = $db->getRows('order_history');
    $orderCount = count($order_history);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .dash-card {
            width: 24%;
            height: 100%;
            position: relative;
            background: linear-gradient(to right, #AD9CFF, #9782FF), url('./assets/images/Vector.png');
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s;
        }
    </style>
</head>

<body>
    <div style="width: 100%; height: 130px; display: flex; justify-content: space-between; align-items: center;">
        <div class="dash-card">
            <h4>Total Products</h4>
            <h1><?php echo $productCount; ?></h1>

        </div>

        <div class="dash-card">
            <h4>Total Order</h4>
            <h1><?php echo $orderCount; ?></h1>

        </div>

        <div class="dash-card">
            <h4>Total Customer</h4>
            <h1><?php echo $orderCount; ?></h1>

        </div>

        <div class="dash-card">
            <h4>Out of Stock</h4>
            <h1>0</h1>

        </div>
    </div>
</body>
</html>