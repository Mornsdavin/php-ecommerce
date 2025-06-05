<!DOCTYPE html>
<html>
<head>
    <title>Ecommerce</title>
    <link rel="stylesheet" href="style/styles.css">
    <style>
        
    .check-out {
        background: #9782FF;
        color: white;
        border: none;
        padding: 15px 20px;
        cursor: pointer;
        font-size: 18px;
        border-radius: 5px;
    }

    .check-out:hover {
        background:rgb(73, 57, 165);
    }
    </style>
</head>
<body style="font-family: 'Poppins', sans-serif;">

    <?php include 'includes/navbar.php'; ?>

    <section style="width: 100%; height: 60px; margin-top: 60px">
        <p style="text-align: center; font-size: 35px; font-weight: 800;">Check Out</p>

        <div style="display: flex; justify-content: center;">
            <div style="width: 80%;">
                <?php include 'includes/checkoutComponent.php'; ?>
            </div>        
        </div>        

    </section>

</body>
</html>