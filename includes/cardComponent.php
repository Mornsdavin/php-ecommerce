<?php
// Include the database class
require_once './service/product_service.php';

// Create an instance of the database class
$db = new DB();

// Fetch products from the database
$products = $db->getRows('products');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f7f7f7;
        }

        .shop-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 20px 60px;
            gap: 20px;
        }

        .product {
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 250px;
        }

        .product img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }

        .product h3 {
            margin: 10px 0;
        }

        .button-row {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        button {
            background: #9782FF;
            color: white;
            border: none;
            padding: 8px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background: #0056b3;
        }

        .prodDes {
            color: rgb(39, 38, 38);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>

<body>

    <div class="shop-container">
        <?php if (!empty($products)) : ?>
            <?php foreach ($products as $product) : ?>
                <div class="product">
                    <img src="./upload/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['prodName']) ?>">
                    <h3><?= htmlspecialchars($product['prodName']) ?></h3>
                    <p class="prodDes" style="font-size: 16px; font-weight: normal"><?= htmlspecialchars($product['description']) ?></p>
                    <p><strong>$<?= number_format($product['price'], 2) ?></strong></p>
                    <div class="button-row">
                        <button onclick="addToCart(<?= $product['prodID'] ?>, '<?= htmlspecialchars($product['prodName']) ?>', <?= $product['price'] ?>)">Add</button>
                        <button>View</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No products available.</p>
        <?php endif; ?>
    </div>

    <script>
        function addToCart(id, name, price) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Check if product already exists in the cart
            const existingProductIndex = cart.findIndex(item => item.id === id);
            if (existingProductIndex !== -1) {
                cart[existingProductIndex].quantity++;
            } else {
                cart.push({ id, name, price, quantity: 1 });
            }

            // Save cart to localStorage
            localStorage.setItem('cart', JSON.stringify(cart));

            alert(name + " added to cart!");
        }
    </script>

</body>
</html>
