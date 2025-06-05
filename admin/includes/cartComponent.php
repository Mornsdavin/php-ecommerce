<?php
require_once './../service/product_service.php';

$db = new DB();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['prodID'])) {
    $prodID = $_POST['prodID'];

    $query = "DELETE FROM products WHERE prodID = :prodID";
    $params = [':prodID' => $prodID];
    $result = $db->delete($query, $params);
}

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
            background: #fff;
        }

        .shop-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 20px 40px;
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
        <a class="nav-link" href="/ecommerce/admin/addProd.php" class="product">
            <div class="product" style="height: 100%; border: 2px dashed #999; display: flex; justify-content: center; align-items: center;">
                <i class="mdi mdi-plus-circle-outline menu-icon" style="font-size: 50px; color: #999;"></i>
            </div>
        </a>
        <?php if (!empty($products)) : ?>
            <?php foreach ($products as $product) : ?>
                <div class="product">
                    <img src="./../upload/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['prodName']) ?>">
                    <h3><?= htmlspecialchars($product['prodName']) ?></h3>
                    <p class="prodDes"><?= htmlspecialchars($product['description']) ?></p>
                    <p><strong>$<?= number_format($product['price'], 2) ?></strong></p>
                    <div class="button-row">
                        <a href="/ecommerce/admin/includes/updateProd.php?prodID=<?= $product['prodID'] ?>">
                            <button type="button">Edit</button>
                        </a>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="prodID" value="<?= $product['prodID'] ?>">
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No products available.</p>
        <?php endif; ?>
    </div>

</body>

</html>