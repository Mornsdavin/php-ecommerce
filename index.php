<!DOCTYPE html>
<html>

<head>
    <title>Ecommerce</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body style="font-family: 'Poppins', sans-serif;">

    <?php include 'includes/navbar.php'; ?>

    <!-- hero section go here -->
    <main class="landing-page">
        <section class="bg-pattern">
            <div class="text-center">
                <h1>Bringing everyone <br>all together</h1>
                <!-- <p>Unite, Celebrate, Create: Bringing Everyone Together for Unforgettable Events, Perfectly Realized with Seamless Planning and Exquisite Execution.</p> -->
                <a href="/ecommerce/shop.php" class="btn">Shop Now</a>
            </div>
            <div class="grid-container">
                <img src="assets/images/blue-clothes.avif" alt="Festival" style="margin-top: -85px; ">
                <div><img src="assets/images/freestyle.avif" alt="Conference" style="margin-top: 15px; "></div>
                <div><img src="assets/images/yellow-cloth.avif" alt="Chill Event" style="margin-top: 80px; "></div>
                <div><img src="assets/images/freestyle.avif" alt="Ski Event" style="margin-top: 15px; "></div>
                <img src="assets/images/blue-clothes.avif" alt="Racing Event" style="margin-top: -85px; ">
            </div>
            <div class="overlay"></div>
        </section>
    </main>

    <section style="width: 100%; height: 350px; margin-top: 100px; display: flex; justify-content: center;">
        <div style="width: 45%; height: 100%;">
            <p style="font-size: 32px; font-weight: 500;">Explor Our Latest <br> Collection</p>
            <p style="color: #999;">Experience the craftsmanship and style behind <br> SSENSE. Browse our newest arrivals and find your <br> next favorite place.</p>
            <a href="#" style="font-weight: normal; font-size: 16px; color: #9782FF; text-decoration: underline;">View our latest Collection</a>
        </div>
        <div style="width: 45%; height: 100%; display: flex; justify-content: center; align-items: center;">
            <div style="width: 100%; height: 100%; position: relative;">
                <img src="./assets/images/bg01.avif" alt="bg01" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
            </div>
        </div>
    </section>

    <section style="width: 100%; height: 400px; margin-top: 100px; display: flex; justify-content: center;">
        <div style="width: 90%; height: 400px; position: relative;">
            <img src="./assets/images/bg04.avif" alt="bg02" style="width: 100%; height: 100%; object-fit: cover; border-radius: 20px;">
        </div>

    </section>

    <section style="width: 100%; height: 400px; margin-top: 10px; display: flex; justify-content: center;">
        <div style="width: 90%; height: 100%; display: grid; gap: 10px; grid-template-columns: repeat(3, 1fr);">
            <div style="height: 400px; position: relative;">
                <img src="./assets/images/freestyle02.avif" alt="bg02" style="width: 100%; height: 100%; object-fit: cover; border-radius: 20px;">
            </div>
            <div style="height: 400px; position: relative;">
                <img src="./assets/images/bg03.avif" alt="bg02" style="width: 100%; height: 100%; object-fit: cover; border-radius: 20px;">
            </div>
            <div style="height: 400px; position: relative;">
                <img src="./assets/images/white-clothes.avif" alt="bg02" style="width: 100%; height: 100%; object-fit: cover; border-radius: 20px;">
            </div>
        </div>

    </section>

    <div style="margin-top: 130px; width: 100%; height: 200px;">
       <?php include 'includes/footer.php'; ?>
    </div>

</body>

</html>