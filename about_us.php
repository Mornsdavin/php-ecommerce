<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aboutus</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            text-align: center;
            background-color: #f9f9f9;
            padding: 0px 8px;
            margin: 0;
        }

        .containers {
            max-width: 1100px;
            margin: auto;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        p {
            color: #666;
            font-size: 1.1rem;
        }

        .team {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 50px;
            justify-content: center;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: left;
            width: 350px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .info {
            padding: 15px;
        }

        .info h3 {
            font-size: 1.4rem;
            margin-bottom: 8px;
        }

        .info p {
            color: #555;
            font-size: 1rem;
        }

        .container-1 {
            max-width: 1100px;
            margin-top: 10px;
            padding: 20px;
        }

        .testimonials {
            margin-top: 30px;
            background: white;
            padding: 50px 20px;
        }

        .testimonial-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .testimonial {
            background: purple;

            padding: 20px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .testimonial p {
            font-size: 1.1rem;
        }

        .cta {
            background: purple;
            color: white;
            padding: 50px 20px;
        }

        .cta button {
            background: white;
            color: #6a11cb;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }

        .cta button:hover {
            background: #ddd;
        }
    </style>
</head>

<body>
        <div style="width: 100%; height: 70px;  padding: 10px 0;">
        <?php include 'includes/navbar.php'; ?>
        </div>
    <div class="containers">
        <h1>Dream for Popular Shopping</h1>
        <p>We Grow Businesses Online. Period.</p>
        <section>
            <div class="team">
                <div class="card">
                    <img src="./assets/images/freestyle02.avif" alt="Best Seller">
                    <div class="info">
                        <h3>BEST SELLER</h3>
                        <p>We source our products from trusted suppliers to guarantee durability and excellence.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="./assets/images/white-clothes.avif" alt="Best Seller">
                    <div class="info">
                        <h3>BEST SELLER</h3>
                        <p>We source our products from trusted suppliers to guarantee durability and excellence.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="./assets/images/white-clothes.avif" alt="Best Seller">
                    <div class="info">
                        <h3>BEST SELLER</h3>
                        <p>We source our products from trusted suppliers to guarantee durability and excellence.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="./assets/images/freestyle.avif" alt="Top Product">
                    <div class="info">

                        <h3>TOP PRODUCT</h3>
                        <p>Enjoy great value for your money with competitive pricing and special discounts.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="./assets/images/yellow-cloth.avif" alt="Popular">
                    <div class="info">
                        <h3>POPULAR</h3>
                        <p>We believe in building long-lasting relationships with our customers. Your satisfaction is our top priority.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonials">
            <div class="container-1">
                <h2>What Our Customers Say</h2>
                <div class="testimonial-grid">
                    <div class="testimonial">
                        <p>"Amazing quality and fast delivery! Highly recommended!"</p>
                        <h4>- Sarah Johnson</h4>
                    </div>
                    <div class="testimonial">
                        <p>"Excellent customer support and great products. Will shop again!"</p>
                        <h4>- Mike Anderson</h4>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta">
            <div class="container-1">
                <h2>Join Our Community</h2>
                <p>Subscribe to our newsletter and stay updated on new arrivals & exclusive deals.</p>
                <button>Subscribe Now</button>
            </div>
        </section>
    </div>
</body>

</html>