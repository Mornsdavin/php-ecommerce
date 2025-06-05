<?php
// Set content type
// header("Content-Type: text/html");

// Load JSON file
$jsonFile = "./data/products.json";
$products = [];

if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    $data = json_decode($jsonData, true);
    $products = $data['products'] ?? [];
} else {
    echo "<p style='color: red;'>Error: JSON file not found!</p>";
}
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
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            justify-content: space-around;
        }
        .product {
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
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
            background: #5a67d8;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="shop-container">
    <?php if (!empty($products)) : ?>
        <?php foreach ($products as $product) : ?>
            <div class="product">
                <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                <h3><?= htmlspecialchars($product['name']) ?></h3>
                <p><?= htmlspecialchars($product['discription']) ?></p>
                <p><strong>$<?= number_format($product['price'], 2) ?></strong></p>
                <div class="button-row">
                    <button>Edit</button>
                    <button>Delete</button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No products available.</p>
    <?php endif; ?>
</div>

</body>
</html>
