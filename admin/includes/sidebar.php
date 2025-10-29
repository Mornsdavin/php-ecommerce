<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
</head>

<body>
    <?php
        session_start();
        $current_page = basename($_SERVER['PHP_SELF']);
    ?>

    <style>
        .nav-item.active {
            background-color: #9782FF !important;
            border-radius: 5px;
        }

        .nav-item.active a {
            color: white !important;
        }

        h5{
            text-transform: uppercase !important;
            text-align: center;
        }
    </style>

    <nav class="sidebar sidebar-offcanvas" id="sidebar" >
        <ul class="nav">
            <li class="nav-item nav-profile border-bottom">
                <a href="#" class="nav-link flex-column">
                    <div class="nav-profile-image">
                        <img src="./assets/images/faces/face1.jpg" alt="profile" />
                    </div>
                    <div class="nav-profile-text d-flex ml-0 mb-4 flex-column">
                    </div>
                </a>
                <h5> <?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest'; ?></h5>
                <p style="text-align: center;"> <?php echo isset($_SESSION['user']) ? $_SESSION['user'] : 'Guest'; ?></p>
            </li>
            <li class="pt-2 pb-2"></li>

            <li class="nav-item <?= ($current_page == 'index.php') ? 'active' : '' ?>">
                <a class="nav-link" href="index.php">
                    <i class="mdi mdi-compass-outline menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>

            <li class="pt-2 pb-2"></li>

            <li class="nav-item <?= ($current_page == 'admin_shop.php') ? 'active' : '' ?>">
                <a class="nav-link" href="admin_shop.php">
                    <i class="mdi mdi-basket menu-icon"></i>
                    <span class="menu-title">Shop</span>
                </a>
            </li>

            <li class="pt-2 pb-2"></li>

            <li class="nav-item <?= ($current_page == 'order_history.php') ? 'active' : '' ?>">
                <a class="nav-link" href="order_history.php">
                    <i class="mdi mdi-account-search menu-icon"></i>
                    <span class="menu-title">History</span>
                </a>
            </li>

            <li class="pt-2 pb-2"></li>

            <li class="nav-item <?= ($current_page == 'profile.php') ? 'active' : '' ?>">
                <a class="nav-link" href="profile.php">
                    <i class="mdi mdi-account-circle menu-icon"></i>
                    <span class="menu-title">Profile</span>
                </a>
            </li>

            <li class="pt-2 pb-2"></li>

            <li class="nav-item <?= ($current_page == 'index.php') ? '' : '' ?>">
                <a class="nav-link" href="../../ecommerce/index.php">
                    <i class="mdi mdi-logout menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </a>
            </li>
        </ul>
    </nav>

</body>

</html>