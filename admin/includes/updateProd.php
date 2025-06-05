<?php
require_once '../../service/product_service.php';

$db = new DB();
$isEditMode = isset($_GET['prodID']); // Define this variable

if (!$isEditMode) {
    die("Product ID is required to update.");
}
// Ensure we are in edit mode (prodID is required)
if (!isset($_GET['prodID'])) {
    die("Product ID is required to update.");
}

$prodID = $_GET['prodID'];
$product = $db->getRows('products', [
    'where' => ['prodID' => $prodID],
    'return_type' => 'single'
]);

if (!$product) {
    die("Product not found.");
}

// Handle form submission for updating a product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prodName = $_POST['name'];
    $price = $_POST['Price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    // Handle image upload
    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "../../upload/";
        $targetFile = $targetDir . basename($image);

        // Check if file already exists and delete it before moving the new one
        if (file_exists($targetFile)) {
            unlink($targetFile); // Delete the existing file
        }

        // Move the uploaded file to the target directory
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    } else {
        // Keep the existing image if no new image is uploaded
        $image = $product['image'];
    }

    // Prepare data for database update
    $data = [
        'prodName' => $prodName,
        'price' => $price,
        'quantity' => $quantity,
        'description' => $description,
        'image' => $image
    ];

    // Update the product in the database
    $conditions = ['prodID' => $product['prodID']];
    $result = $db->update('products', $data, $conditions);

    if ($result) {
        header('Location: http://localhost/ecommerce/admin/admin_shop.php');
        exit();
    } else {
        echo "Failed to update the product.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEditMode ? 'Edit Product' : 'Add Product' ?></title>
    <style>
        p {
            font-weight: 600;
            padding-top: 10px;
        }
    </style>
</head>

<body style="display: flex; justify-content: center; align-items: center; height: 100%; font-family: 'Poppins'; background-color: #f9f9f9;">
    <div style="background-color: white; padding: 0px 30px 25px 30px; border-radius: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h1 style="text-align: center;"><?= $isEditMode ? 'Edit Product' : 'Add Product' ?></h1>
        <form action="updateProd.php?prodID=<?= $product['prodID'] ?>" method="post" enctype="multipart/form-data">
            <label for="imageUpload" style="cursor: pointer;">
                <div style="width: 500px; height: 200px; border: 1px solid gray; border-radius: 20px; display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
                    <input type="file" name="image" accept="image/*" style="display: none;" id="imageUpload" onchange="displayImageName()"></input>
                    <label for="imageUpload" style="cursor: pointer; color: grey">Drag and drop an image or click to upload</label>
                </div>
            </label>
            <p id="imageName" style="color: grey; font-style: italic; display: none;"><?= $isEditMode ? 'Current image: ' . htmlspecialchars($product['image']) : '' ?></p> <!-- Show current image name in edit mode -->

            <div style="width: 500px; height: 80px;">
                <p>Product Name</p>
                <input type="text" name="name" placeholder="Product Name" style="width: 500px; height: 35px; border-radius: 5px; border: 1px solid #000" value="<?= htmlspecialchars($product['prodName']) ?>" required>
            </div>
            <div style="width: 500px; height: 80px;">
                <p>Product Price</p>
                <input type="text" name="Price" placeholder="Product Price" style="width: 500px; height: 35px; border-radius: 5px; border: 1px solid #000" value="<?= htmlspecialchars($product['price']) ?>" required>
            </div>
            <div style="width: 500px; height: 80px;">
                <p>Product Quantity</p>
                <input type="text" name="quantity" placeholder="Product Quantity" style="width: 500px; height: 35px; border-radius: 5px; border: 1px solid #000" value="<?= htmlspecialchars($product['quantity']) ?>" required>
            </div>
            <div style="width: 500px; height: 80px;">
                <p>Product Description</p>
                <input type="text" name="description" placeholder="Product Description" style="width: 500px; height: 35px; border-radius: 5px; border: 1px solid #000" value="<?= htmlspecialchars($product['description']) ?>" required>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <a href="/ecommerce/admin/admin_shop.php" style="text-decoration: none;">
                    <div style="cursor: pointer; width: 170px; height: 40px; margin-top: 40px; border-radius: 5px; border: 1px solid #000; background-color: red; color:white; display: flex; justify-content: center; align-items: center;">Back</div>
                </a>
                <button type="submit" style="cursor: pointer; width: 170px; height: 40px; margin-top: 40px; border-radius: 5px; border: 1px solid #000; background-color: #000055; color:white; font-size: 14px;"><?= $isEditMode ? 'Update Product' : 'Add Product' ?></button>
            </div>
        </form>
    </div>
    <script>
        function displayImageName() {
            // Get the file input element
            var fileInput = document.getElementById("imageUpload");

            // Get the name of the file
            var fileName = fileInput.files[0].name;

            // Get the image name display element
            var imageNameDisplay = document.getElementById("imageName");

            // Set the text of the image name and display it
            imageNameDisplay.textContent = "Selected image: " + fileName;

            // Show the image name
            imageNameDisplay.style.display = "block";
        }
    </script>
</body>

</html>