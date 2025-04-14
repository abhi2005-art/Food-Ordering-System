<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pizza</title>
    <link rel="stylesheet" href="ramen.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2cea0294d2.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
        // Variables
        $itemName = "Ramen";
        $itemPrice = 250.00; // float
        $itemDescription = "Japanese style noodle soup with ingredients like button mushroom,<br> baby corn, broccoli, pak choi, carrot, chinese cabbage, fresh red<br> chillies and nori sheet; along with chicken pieces and boiled egg<br> is one nutrient enriched main course that reaches directly to the heart's way.";
    ?>

    <header>
        <div class="header">
            <ul>
                <h1 style="padding: 10px;">Details</h1>
            </ul>
            <div class="topnav">
                <a href="explore.php">Home</a>
                <a href="items.html">Items</a>
                <a href="cart.html">Cart</a>
            </div>

            <div class="search-box">
                <div class="row">
                    <input type="text" id="input-box" placeholder="Search your food..." autocomplete="off">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </div>
        <br><br><br>
        <hr color="black">
        <br><br><br><br>
    </header>

    <main>
        <section>
            <ul>
                <img src="ramen.png" height="250" width="300" style="float:left; margin-right:20px; margin-bottom:5px;">

                <dl>
                    <h1>
                        <dt><b><?php echo $itemName; ?></b></dt>
                    </h1>
                    <dd><b>₹<?php echo number_format($itemPrice, 2); ?></b></dd><br>
                    <dd><?php echo nl2br($itemDescription); ?></dd>
                </dl>

                <div class="section-buttons">
                    <button>Add to cart</button>
                    <a href="Freshfare.html">
                        <button>Go Back</button>
                    </a>
                </div>
                <br><br><br>
            </ul>

            <br><br><br><br><br><br>
            <hr color="black">
        </section>
    </main>

    <footer>
        <div class="footer">
            <a href="contact.html" style="text-decoration:none;">Contact Us</a>
            <p>Location: 5th cross S.G Palya, Bangalore, Karnataka, India.</p>
            <p>&copy; 2024 Fresh Fare Website</p>
        </div>
    </footer>
</body>

</html>
