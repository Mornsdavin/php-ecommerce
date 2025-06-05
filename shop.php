<!DOCTYPE html>
<html>

<head>
    <title>Ecommerce</title>
    <link rel="stylesheet" href="style/styles.css">
    <style>
        /* From Uiverse.io by doniaskima */
        /* HTML: <div class="loader"></div> */
        .loader {
            --c1: #673b14;
            --c2: #f8b13b;
            width: 40px;
            height: 80px;
            border-top: 4px solid var(--c1);
            border-bottom: 4px solid var(--c1);
            background: linear-gradient(90deg, var(--c1) 2px, var(--c2) 0 5px, var(--c1) 0) 50%/7px 8px no-repeat;
            display: grid;
            overflow: hidden;
            animation: l5-0 2s infinite linear;
        }

        .loader::before,
        .loader::after {
            content: "";
            grid-area: 1/1;
            width: 75%;
            height: calc(50% - 4px);
            margin: 0 auto;
            border: 2px solid var(--c1);
            border-top: 0;
            box-sizing: content-box;
            border-radius: 0 0 40% 40%;
            -webkit-mask: linear-gradient(#000 0 0) bottom/4px 2px no-repeat,
                linear-gradient(#000 0 0);
            -webkit-mask-composite: destination-out;
            mask-composite: exclude;
            background: linear-gradient(var(--d, 0deg), var(--c2) 50%, #0000 0) bottom /100% 205%,
                linear-gradient(var(--c2) 0 0) center/0 100%;
            background-repeat: no-repeat;
            animation: inherit;
            animation-name: l5-1;
        }

        .loader::after {
            transform-origin: 50% calc(100% + 2px);
            transform: scaleY(-1);
            --s: 3px;
            --d: 180deg;
        }

        @keyframes l5-0 {
            80% {
                transform: rotate(0)
            }

            100% {
                transform: rotate(0.5turn)
            }
        }

        @keyframes l5-1 {

            10%,
            70% {
                background-size: 100% 205%, var(--s, 0) 100%
            }

            70%,
            100% {
                background-position: top, center
            }
        }
    </style>
</head>

<body style="font-family: 'Poppins', sans-serif;">

    <?php include 'includes/navbar.php'; ?>

    <section style="width: 100%; overflow: hidden;">
        <div style="width: 100%; height: 300px; margin-top: 15px; display: flex; justify-content: center;">
            <div style="width: 45%; height: 100%; padding: 0 35px;">
                <p style="font-size: 40px; font-weight: 700;">Let's enjoy your<br> shopping experience</p>

            </div>
            <div style="width: 8%; height: 100%; display: flex; justify-content: center; align-items: center;">
                <div class="loader"></div>
            </div>
            <div style="width: 45%; height: 100%; display: flex; justify-content: end; align-items: end;padding: 0 35px;">
                <p style="text-align: end; font-weight: normal; font-size: 16px;">Lorem ipsum dolor sit, amet consectetur <br> adipisicing elit. Mollitia sint ratione odio ex exercitationem, <br> veniam cumque atque provident nesciunt rerum accusamus <br> officia. Cumque possimus, odio necessitatibus accusamus amet eum maxime, excepturi porro illum itaque at omnis, repudiandae atque dolorem. </p>
            </div>
        </div>
        <div style="width: 100%; display: flex; justify-content: center;">
            <div style="width: 95%; height: 500px; margin-top: 15px; border-radius: 20px; padding: 0 20px;">
                <img src="./assets/images/bg05.avif" alt="shop-hero"
                    style="
                margin-top: 40px;
                width: 100%; 
                height: 450px; 
                border-radius: 20px; 
                object-fit: cover;
            ">

            </div>
        </div>
        <div style="padding: 20px 0;">
            <p style="text-align: center; font-size: 40px; font-weight: bold;">Step to Your Fashion</p>
        </div>

        <div style="width: 100%; ">

            <div style="width: 100%; overflow: hidden;  ">
                <?php include 'includes/cardComponent.php'; ?>

            </div>

        </div>

    </section>

    <div style="margin-top: 130px; width: 100%; height: 200px;">
       <?php include 'includes/footer.php'; ?>
    </div>

    

</body>

</html>