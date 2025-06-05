<?php
require_once './../service/product_service.php';

    $db = new DB();

    $order_history = $db->getRows('order_history');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    /* Container */
    .container {
        width: 90%;
        margin: 20px auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Title */
    h2 {
        text-align: center;
    }

    /* Table Styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    /* Table Header */
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

    /* Buttons */
    .action-btn {
        padding: 6px 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        color: white;
    }

    .edit-btn {
        background-color: #28a745;
    }

    .edit-btn:hover {
        background-color: #218838;
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


<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Customer Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Total</th>
            <th>Date</th>
            <!-- <th>Actions</th> -->
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($order_history)): ?>
            <?php foreach($order_history as $index => $order_history): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo htmlspecialchars($order_history['cusName']); ?></td>
                    <td><?php echo htmlspecialchars($order_history['phone']); ?></td>
                    <td><?php echo htmlspecialchars($order_history['address']); ?></td>
                    <td>$ <?php echo htmlspecialchars($order_history['totalPrice']); ?></td>
                    <td><?php echo htmlspecialchars($order_history['createDate']); ?></td>
                    <!-- <td>
                        <button class="action-btn delete-btn">Delete</button>
                    </td> -->
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">No Customer found</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</body>
</html></tr>