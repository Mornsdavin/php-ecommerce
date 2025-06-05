<?php
// Include database connection file (DB class)
require_once '../service/product_service.php';

// Create an instance of the database class
$db = new DB();

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form inputs
    $name = $_POST['name'];
    $price = $_POST['Price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Define the upload directory
        $uploadDir = '../upload/';

        // Get the uploaded file's name and extension
        $fileName = $_FILES['image']['name'];
        $fileTmp = $_FILES['image']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

        // Generate a unique name for the file
        $newFileName = uniqid('prod_', true) . '.' . $fileExt;

        // Move the uploaded file to the server's directory
        $uploadPath = $uploadDir . $newFileName;
        if (move_uploaded_file($fileTmp, $uploadPath)) {
            // Prepare the data array for insertion
            $data = [
                'prodName' => $name,
                'price' => $price,
                'quantity' => $quantity,
                'description' => $description,
                'image' => $newFileName,
            ];

            // Insert product details into the database
            $result = $db->insert('products', $data);

            if ($result) {
                echo "Product added successfully!";
                // Redirect to the admin shop page after success
                header("Location: /ecommerce/admin/admin_shop.php");
                exit();
            } else {
                echo "Failed to add the product. Please try again.";
            }
        } else {
            echo "Failed to upload the image. Please try again.";
        }
    } else {
        // Debugging: Check the error code
        echo "No image uploaded or there was an error uploading the image. Error code: " . $_FILES['image']['error'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        p {
            font-weight: 600;
            padding-top: 10px;
        }
    </style>
</head>

<body style="display: flex; justify-content: center; align-items: center; height: 100%; font-family: 'Poppins'; background-color: #f9f9f9;">
    <div style="background-color: white; padding: 0px 30px 25px 30px; border-radius: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h1 style="text-align: center;">Add Product</h1>
        <form action="addProd.php" method="post" enctype="multipart/form-data">
            <label for="imageUpload" style="cursor: pointer;">
                <div style="width: 500px; height: 200px; border: 1px solid gray; border-radius: 20px; display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
                    <input type="file" name="image" accept="image/*" style="display: none;" id="imageUpload" onchange="displayImageName()"></input>
                    <label for="imageUpload" style="cursor: pointer; color: grey">Drag and drop an image or click to upload</label>
                </div>
            </label>
            <p id="imageName" style="color: grey; font-style: italic; display: none;"></p> <!-- Initially hidden -->

            <div style="width: 500px; height: 80px;">
                <p>Product Name</p>
                <input type="text" name="name" placeholder="Product Name" style="width: 500px; height: 35px; border-radius: 5px; border: 1px solid #000" required>
            </div>
            <div style="width: 500px; height: 80px;">
                <p>Product Price</p>
                <input type="text" name="Price" placeholder="Product Price" style="width: 500px; height: 35px; border-radius: 5px; border: 1px solid #000" required>
            </div>
            <div style="width: 500px; height: 80px;">
                <p>Product Quantity</p>
                <input type="text" name="quantity" placeholder="Product Quantity" style="width: 500px; height: 35px; border-radius: 5px; border: 1px solid #000" required>
            </div>
            <div style="width: 500px; height: 80px;">
                <p>Product Description</p>
                <input type="text" name="description" placeholder="Product Description" style="width: 500px; height: 35px; border-radius: 5px; border: 1px solid #000" required>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <a href="/ecommerce/admin/admin_shop.php" style="text-decoration: none;">
                    <div style="cursor: pointer; width: 170px; height: 40px; margin-top: 40px; border-radius: 5px; border: 1px solid #000; background-color: red; color:white; display: flex; justify-content: center; align-items: center;">Back</div>
                </a>
                <button type="submit" style="cursor: pointer; width: 170px; height: 40px; margin-top: 40px; border-radius: 5px; border: 1px solid #000; background-color: #000055; color:white; font-size: 14px;">Add Product</button>
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