<?php

require_once './service/product_service.php';

// Handle checkout submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $total_price = $_POST['total_price']; // Hidden input from the form

    $stmt = $conn->prepare("INSERT INTO order_history (customer_name, phone, total_price) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $name, $phone, $total_price);

    if ($stmt->execute()) {
        echo "<script>alert('Order placed successfully!'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Error placing order. Please try again.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .total {
            background: #9782FF;
            color: white;
            padding: 12px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 18px;
            text-align: center;
        }
        .checkout-btn {
            width: 100%;
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 15px;
        }
        .checkout-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Checkout</h2>

        <form method="POST">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" required>

            <div class="total">
                <p>Total Price: <span id="displayTotal">$0.00</span></p>
            </div>

            <!-- Hidden input to store total price -->
            <input type="hidden" id="total_price" name="total_price">

            <button type="submit" class="checkout-btn">Pay Now</button>
        </form>
    </div>

    <script>
        // Get total price from local storage and update form input
        const totalPrice = localStorage.getItem('totalPrice') || 0;
        document.getElementById('displayTotal').textContent = `$${parseFloat(totalPrice).toFixed(2)}`;
        document.getElementById('total_price').value = totalPrice;
    </script>

</body>
</html>
