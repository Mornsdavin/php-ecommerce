<?php
require_once './service/product_service.php'; // Include your DB class

$db = new DB(); // Create an instance of the DB class

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $cusName = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $totalPrice = $_POST['totalPrice'];

    // Prepare data for insertion (match column names in the table)
    $data = [
        'cusName' => $cusName,
        'phone' => $phone,
        'address' => $address,
        'totalPrice' => $totalPrice,
    ];

    // Insert data into the order_history table
    $insertId = $db->insert('order_history', $data);

    if ($insertId) {
        // Redirect to success.php after successful insertion
        header('Location: success.php');
        exit();
    } else {
        // Handle insertion failure
        echo "Failed to insert data into the database.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        /* Include your table styles here... */
        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #9782FF;
            color: white;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <form action="" method="POST" style="display: flex; justify-content: space-between;">
        <div style="width: 25%; height: 400px; background-color: #fff; border-radius: 15px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <h3 style="text-align: center">Information</h3>
            <div style="height: 20px;"></div>
            <div style="display: grid; gap: 2px; grid-template-columns: 1; padding-left: 20px;">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required style="width: 85%; height: 32px; border-radius: 10px; border: 1px solid grey;">
            </div>
            <div style="height: 40px;"></div>
            <div style="display: grid; gap: 2px; grid-template-columns: 1; padding-left: 20px;">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" required style="width: 85%; height: 32px; border-radius: 10px; border: 1px solid grey;">
            </div>
            <div style="height: 40px;"></div>
            <div style="display: grid; gap: 2px; grid-template-columns: 1; padding-left: 20px;">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required style="width: 85%; height: 32px; border-radius: 10px; border: 1px solid grey;">
            </div>
        </div>
        <div style="width: 70%;">


            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="cartBody"></tbody>
                <!-- Dynamic rows will be added here -->
                </tbody>
            </table>

            <div style="width: 100%; display: flex; justify-content: space-between; margin-top: 50px;">
                <div style="
                    width: 80%;        
                    padding: 12px;
                    background-color: #9782FF;
                    color: white;
                    font-weight: bold;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    border-radius: 5px;
                ">
                    <p style="margin: 0;">Total Price:</p>
                    <p style="margin: 0;" id="totalPrice">$0.00</p>
                    <input type="hidden" name="totalPrice" id="hiddenTotalPrice" value="0.00">
                </div>
                <div>
                    <button type="submit" class="check-out" style="background-color: #28a745; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; color: white;">
                        Pay Now
                    </button>

                </div>
            </div>
        </div>
    </form>

    <script>
        // Function to update the cart table
        function updateCart() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartBody = document.getElementById('cartBody');
            cartBody.innerHTML = '';

            let total = 0;
            cart.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${item.name}</td>
                    <td>$${item.price.toFixed(2)}</td>
                    <td><input type="number" value="${item.quantity}" class="quantity" data-id="${item.id}" /></td>
                    <td>$${(item.price * item.quantity).toFixed(2)}</td>
                    <td><button class="action-btn delete-btn" onclick="deleteItem(${item.id})">Delete</button></td>
                `;
                cartBody.appendChild(row);

                total += item.price * item.quantity;
            });

            // Update total price
            document.getElementById('totalPrice').textContent = `$${total.toFixed(2)}`;
            document.getElementById('hiddenTotalPrice').value = total.toFixed(2);
        }

        // Update cart when quantity changes
        document.getElementById('cartBody').addEventListener('input', (e) => {
            if (e.target.classList.contains('quantity')) {
                const id = e.target.getAttribute('data-id');
                const quantity = parseInt(e.target.value);

                const cart = JSON.parse(localStorage.getItem('cart')) || [];
                const product = cart.find(item => item.id == id);
                if (product) {
                    product.quantity = quantity;
                    localStorage.setItem('cart', JSON.stringify(cart));
                }

                updateCart();
            }
        });

        // Function to delete an item from the cart
        function deleteItem(id) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart = cart.filter(item => item.id !== id);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCart();
        }

        // Initialize the cart
        updateCart();
    </script>

</body>

</html>