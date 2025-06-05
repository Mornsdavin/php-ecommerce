<!DOCTYPE html>
<html>

<head>
    <title>Ecommerce</title>

    <style>
        /* From Uiverse.io by faxriddin20 */
        .container {
            display: flex;
            background-color: white;
            width: 100%;
            height: 60px;
            align-items: center;
            justify-content: space-around;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .button {
            outline: 0 !important;
            border: 0 !important;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            transition: all ease-in-out 0.3s;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            color: black;
        }

        a.active,
        a:hover {
            color: #6a0dad;
            text-decoration: underline;
            font-weight: 600;
        }


        .button:hover {
            transform: translateY(-3px);
        }

        .icon {
            font-size: 20px;
        }
    </style>
</head>
<boby style="font-family: 'Poppins', sans-serif;">
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>

    <div class="container">
        <div class="button">
            <a href="index.php" class="<?= ($current_page == 'index.php') ? 'active' : '' ?>">Home</a>
        </div>
        <div class="button">
            <a href="shop.php" class="<?= ($current_page == 'shop.php') ? 'active' : '' ?>">Shop</a>
        </div>
        <div class="button">
            <a href="cart.php" class="<?= ($current_page == 'cart.php') ? 'active' : '' ?>">Cart</a>
        </div>
        <div class="button">
            <a href="about_us.php" class="<?= ($current_page == 'about_us.php') ? 'active' : '' ?>">About</a>
        </div>
        <div class="button">
            <a href="auth/login.php" class="<?= ($current_page == 'login.php') ? 'active' : '' ?>">Login</a>
        </div>
    </div>
</boby>

</html>