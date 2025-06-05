<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signin</title>
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
        <h2>Signin</h2>
        <form action="login.php" method="POST">
        <label for="name" style="display: block; text-align: left; font-weight: semi-bold; margin-left: 10px; margin-top: 20px;">Full Name:</label>
        <input type="text" name="name" placeholder="Name">

            <label for="email" style="display: block; text-align: left; font-weight: semi-bold; margin-left: 10px; margin-top: 20px;">Email:</label>
            <input type="email" name="email" placeholder="Email" required>

            <label for="email" style="display: block; text-align: left; font-weight: semi-bold; margin-left: 10px; margin-top: 20px">Password:</label>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>

            <label for="email" style="display: block; text-align: left; font-weight: semi-bold; margin-left: 10px; margin-right: 10px; margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
                <p>Already have account?</p>
                <a href="login.php">Login</a>
            </label>

        </form>
    </div>
</body>

</html>