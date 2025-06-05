<?php
session_start();

require_once '../service/product_service.php';

$db = new DB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = $db->getRow('user', ["email" => $email]);

    if ($user && $password == $user['password']) {
        $_SESSION["user"] = $user['email'];
        header("Location: ../admin/index.php");
        exit();
    } else {
        echo "<script>alert('Invalid email or password!'); window.location.href = 'login.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
</head>

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .login-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 450px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            width: 95%;
            margin-top: 30px;
            padding: 10px;
            background: #6a0dad;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: darkred;
        }
    </style>

    <div class="login-container">
        <div style="width: 30px; height: 30px; margin-left: 10px;">
            <a href="../index.php" style="font-size: 30px;">
                <i class="mdi mdi-arrow-left-bold-circle-outline menu-icon"></i>
            </a>
        </div>
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="email" style="display: block; text-align: left; font-weight: semi-bold; margin-left: 10px; margin-top: 20px;">Email:</label>
            <input type="email" name="email" placeholder="Email" required>

            <label for="password" style="display: block; text-align: left; font-weight: semi-bold; margin-left: 10px; margin-top: 20px;">Password:</label>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>

            <label for="email" style="display: block; text-align: left; font-weight: semi-bold; margin-left: 10px; margin-right: 10px; margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
                <p>Haven't had account yet?</p>
                <a href="signin.php">Signin</a>
            </label>
        </form>
    </div>
</body>

</html>
