<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Fresh Fare</title>
    <link rel="stylesheet" href="freshfare.css">
    <script src="https://kit.fontawesome.com/2cea0294d2.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #ffffff; /* White background */
            color: #333; /* Dark grey for text */
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .header {
            background-color: #9acd32; /* Light green */
            color: white;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            font-size: 40px;
        }
        .topnav {
            display: flex;
            justify-content: center;
            background-color: #d3d3d3; /* Light gray */
        }
        .topnav a {
            color: #333; /* Dark text for contrast */
            padding: 14px 20px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
            font-size: larger;
            display: flex;
            align-items: center;
        }
        .topnav a i {
            margin-right: 8px; /* Add spacing between icon and text */
        }
        .topnav a:hover {
            background-color: #9acd32; /* Light green hover */
            color: white;
        }
        .search-box {
            max-width: 400px;
            margin: 20px auto;
            display: flex;
            border-radius: 25px;
            overflow: hidden;
        }
        .search-box input {
            flex: 1;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 25px 0 0 25px;
            outline: none;
        }
        .search-box button {
            border: none;
            background-color: #9acd32; /* Light green */
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 0 25px 25px 0;
        }
        .search-box button .fa-solid {
            color: white;
        }
        .main {
            text-align: center;
            margin: 20px 0 60px;
        }
        .main h2 {
            font-size: 30px;
            margin-bottom: 20px;
        }
        .items-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 0 20px;
        }
        .item-box {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Light shadow */
            width: 300px; /* Increased width */
            text-align: center;
            transition: transform 0.3s;
        }
        .item-box img {
            width: 100%;
            height: 200px; /* Increased height */
            border-radius: 15px 15px 0 0;
            object-fit: cover;
        }
        .item-box:hover {
            transform: translateY(-5px);
        }
        .footer {
            background-color: #9acd32; /* Light green */
            color: white;
            padding: 40px 20px;
            text-align: center;
        }
        .footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 18px;
        }
        .social-icons {
            margin: 20px 0;
        }
        .social-icons a {
            margin: 0 10px;
            color: white;
            font-size: 24px;
            transition: color 0.3s;
        }
        .social-icons a:hover {
            color: #d3d3d3; /* Light gray hover */
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome to <i>Fresh Fare</i></h1>
    </div>
    <div class="topnav">
        <a href="http://localhost/demo/project/explore.php"><i class="fas fa-home"></i> Home</a>
        <a href="freshfare.php"><i class="fas fa-utensils"></i> Items</a>
        <a href="cart.html"><i class="fas fa-shopping-cart"></i> Cart</a>
    </div>
    <div class="search-box">
        <input type="text" id="input-box" placeholder="Search your food..." autocomplete="off">
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    <main class="main">
        <section>
            <h2>Featured Restaurants</h2>
            <div class="items-container">
                <?php 
                $pizzaName = "Pizza"; 
                $pizzaImage = "pizza.avif"; 
                $pizzaLink = "pizzalist.html"; 
                $pizzaDescription = "View pizza Restaurants"; 

                $IceCreamName = "Ice Cream"; 
                $IceCreamImage = "ramen.avif"; 
                $IceCreamLink = "IceCreamlist.html"; 
                $IceCreamDescription = "View Ice Cream Restaurants"; 

                $burgerName = "Burger"; 
                $burgerImage = "burger.avif"; 
                $burgerLink = "burgerlist.html"; 
                $burgerDescription = "View Burger Restaurants"; 

                echo '<div class="item-box pizza">';
                echo '<a href="' . $pizzaLink . '"><img src="' . $pizzaImage . '" alt="Pizza"></a>';
                echo '<h3>' . $pizzaName . '</h3>';
                echo '<p>' . $pizzaDescription . '</p>';
                echo '</div>';

                echo '<div class="item-box IceCream">';
                echo '<a href="' . $IceCreamLink . '"><img src="' . $IceCreamImage . '" alt="Ice Cream"></a>';
                echo '<h3>' . $IceCreamName . '</h3>';
                echo '<p>' . $IceCreamDescription . '</p>';
                echo '</div>';

                echo '<div class="item-box burger">';
                echo '<a href="' . $burgerLink . '"><img src="' . $burgerImage . '" alt="Burger"></a>';
                echo '<h3>' . $burgerName . '</h3>';
                echo '<p>' . $burgerDescription . '</p>';
                ?> 
            </div>
        </section>
    </main>
    <footer class="footer">
        <a href="contact.html">Contact Us</a>
        <p>Location: 5th cross S.G Palya, Bangalore, Karnataka, India.</p>
        <p>Phone: +91 123 456 7890</p>
        <p>Email: <a href="mailto:info@freshfare.com" style="color: white;">info@freshfare.com</a></p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
        <p>&copy; 2024 Fresh Fare Website</p>
    </footer>
</body>
</html>
