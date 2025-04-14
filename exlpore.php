<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Fare</title>
    <script src="https://kit.fontawesome.com/2cea0294d2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <!-- Leaflet.js for OpenStreetMap -->
   <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<style>
        /* General Body and Font */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f8f8f8;
            line-height: 1.6;
        }
        #map {
            height: 350px;
            width: 100%;
        }
        #loading-message {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            color: #333;
            display: none;
        }
        /* Carousel Styling */
        #carouselExample {
            margin-top: 20px;
            margin-left: 100px;
            margin-bottom: 20px;
            height: 400px;
            width: 600px;
        }

        .carousel-inner {
            height: 100%;
        }

        .carousel-item img {
            height: 400px;
            width: 100%;
            object-fit: cover;
        }

        /* Other Styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background-color: #1e1e1e;
            color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 32px;
            margin: 0;
            letter-spacing: 1px;
        }

        /* Header Buttons */
        .header-buttons a {
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            padding: 6px 18px;
            margin-left: 20px;
            color: white;
            border: 2px solid transparent;
            border-radius: 16px;
            transition: all 0.3s ease;
        }

        .header-buttons a:hover {
            background-color: white;
            color: black;
            border-color: white;
            transform: scale(1.05);
        }

        /* Hero Section with Parallax Effect */
        .hero {
            background-image: url("pixel4.jpg");
            background-size: cover;
            background-position: center;
            height: 70vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 0 30px;
            position: relative;
            transition: background-image 1s ease-in-out;
            background-attachment: fixed; /* Parallax effect added */
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 0;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 600;
            margin: 0;
            z-index: 1;
        }

        .hero p {
            font-size: 18px;
            margin: 20px 0;
            opacity: 0.85;
            z-index: 1;
        }

        .explore-button, .explore-us {
            display: inline-block;
            padding: 12px 30px;
            background-color: white;
            color: #1e1e1e;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 500;
            text-transform: uppercase;
            text-decoration: none;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            z-index: 1;
        }

        .explore-button:hover {
            background-color: transparent;
            color: white;
            border-color: white;
            transform: scale(1.05);
        }

        .explore-button .fa-solid {
            margin-left: 8px;
        }

        /* Content Section */
        .content {
            text-align: center;
            padding: 60px 20px;
            background-color: #fff;
        }

        .content h2 {
            font-size: 36px;
            font-weight: 600;
            color: #333;
        }

        .content p {
            font-size: 18px;
            max-width: 800px;
            margin: 20px auto;
            color: #666;
        }

        /* Footer Section */
        footer {
            background-color: #1e1e1e;
            color: #fff;
            padding: 40px;
            text-align: center;
            font-size: 14px;
        }

        footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                text-align: center;
                padding: 20px;
            }

            header h1 {
                font-size: 28px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 16px;
            }

            .explore-button {
                font-size: 14px;
                padding: 10px 20px;
            }

            .content h2 {
                font-size: 28px;
            }

            .content p {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1><strong>Fresh Fare</strong></h1>
        <div class="header-buttons">
            <a href="signup_page.html" class="sign-up-button">Sign Up</a>
            <a href="signin.html" class="log-in-button">Log In</a>
        </div>
    </header>

    <div class="hero">
        <h1><strong>Order Your Best Food Anytime</strong></h1>
        <p>Hello, <mark id="greeting"></mark>!<br><em>Experience the delight of fresh, delicious meals crafted just for you, at any time you desire.</em></p>
        <a href="Freshfare.php" class="explore-button">Explore Food <i class="fa-solid fa-magnifying-glass"></i></a>
    </div>

    <section class="content">
        <h2><strong>Your Favorite Foods, Just a Click Away</strong></h2>
        <p><em>Fresh Fare</em> offers a variety of culinary delights, tailored to every taste and preference. From <mark>hand-picked local ingredients</mark> to <mark>gourmet dishes</mark>, we are committed to delivering <strong>excellence</strong> and <strong>freshness</strong> in every bite.</p>
        
        <a href="about.html" class="explore-us">Learn More About Us <i class="fa-solid fa-info-circle"></i></a>
    </section>
<ul>
    <div class="location" style="font-family: 'Poppins', sans-serif; max-width: 900px; margin: 50px auto; text-align: center; background: #ffffff; padding: 40px; border-radius: 15px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);">
    <!-- Header Section -->
    <div style="background: linear-gradient(135deg, #000000, #434343); padding: 30px; border-radius: 10px; color: white; text-align: center; margin-bottom: 30px;">
        <h1 style="margin: 0; font-size: 28px; font-weight: 700;">GeoLocator Pro</h1>
        <p style="margin: 10px 0 0; font-size: 16px;">Locate, Confirm, and Proceed with Confidence</p>
    </div>

    <!-- Call to Action Section -->
    <p style="font-size: 18px; color: #555; margin-bottom: 20px;">
        Click the button below to add your current location. A precise map will guide you, and your address will be generated instantly.
    </p>

    <!-- Trigger Geolocation -->
    <button id="get-location-btn" style="padding: 15px 30px; background-color: #000000; color: white; font-size: 18px; font-weight: 600; border: none; border-radius: 30px; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);">
        Add Your Location
    </button>

    <!-- Recenter Button -->
    <button id="recenter-btn" style="display: none; margin-top: 20px; padding: 15px 30px; background-color: #333333; color: white; font-size: 18px; font-weight: 600; border: none; border-radius: 30px; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);">
        Recenter Map
    </button>

    <!-- Loading Spinner -->
    <div id="loading-message" style="display: none; margin-top: 20px;">
        <div style="display: flex; justify-content: center; align-items: center; gap: 15px;">
            <div class="spinner" style="width: 40px; height: 40px; border: 4px solid #e0e0e0; border-top: 4px solid #000000; border-radius: 50%; animation: spin 1s linear infinite;"></div>
            <p style="font-size: 18px; color: #555;">Locating you...</p>
        </div>
    </div>

    <!-- Map Display -->
    <div id="map" style="display: none; margin-top: 20px; height: 450px; border: 2px solid #434343; border-radius: 10px; overflow: hidden; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);"></div>

    <!-- Confirm Button -->
    <button id="confirm-btn" style="display: none; margin-top: 20px; padding: 15px 30px; background-color: #333333; color: white; font-size: 18px; font-weight: 600; border: none; border-radius: 30px; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);">
        Confirm Address
    </button>

    <!-- Address Display -->
    <div id="address-container" style="margin-top: 30px; font-size: 18px; text-align: left; padding: 20px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); display: none;">
        <strong style="font-size: 20px; color: #333;">Your Address:</strong>
        <p id="address" style="margin-top: 10px; color: #555;"></p>
    </div>

    <!-- Styles and Animations -->
    <style>
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Button hover effects */
        button:hover {
            background-color: #555555 !important;
            transform: translateY(-2px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .location {
                padding: 20px;
            }

            button {
                font-size: 16px;
                padding: 12px 25px;
            }

            #map {
                height: 350px;
            }
        }
    </style>

    <!-- JavaScript Logic -->
    <script>
        let userLat, userLon, map, userMarker;

        document.getElementById('get-location-btn').addEventListener('click', function () {
            const loadingMessage = document.getElementById('loading-message');
            const mapContainer = document.getElementById('map');
            const confirmBtn = document.getElementById('confirm-btn');
            const recenterBtn = document.getElementById('recenter-btn');
            const addressContainer = document.getElementById('address-container');
            const addressElement = document.getElementById('address');

            // Show loading spinner
            loadingMessage.style.display = 'block';
            mapContainer.style.display = 'none';
            confirmBtn.style.display = 'none';
            recenterBtn.style.display = 'none';
            addressContainer.style.display = 'none';

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    userLat = position.coords.latitude;
                    userLon = position.coords.longitude;

                    // Hide loading spinner
                    loadingMessage.style.display = 'none';

                    // Show map and buttons
                    mapContainer.style.display = 'block';
                    confirmBtn.style.display = 'inline-block';
                    recenterBtn.style.display = 'inline-block';

                    if (!map) {
                        map = L.map('map').setView([userLat, userLon], 18);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; OpenStreetMap contributors'
                        }).addTo(map);

                        userMarker = L.marker([userLat, userLon]).addTo(map)
                            .bindPopup("You are here!")
                            .openPopup();
                    } else {
                        map.setView([userLat, userLon], 18);
                        userMarker.setLatLng([userLat, userLon]);
                    }

                    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${userLat}&lon=${userLon}`)
                        .then(response => response.json())
                        .then(data => {
                            addressElement.textContent = data.display_name || "Unable to fetch address.";
                        })
                        .catch(() => {
                            addressElement.textContent = "Error fetching address.";
                        });
                }, function (error) {
                    loadingMessage.innerHTML = '<p style="color: red;">Error: Unable to retrieve location. Check your settings.</p>';
                }, {
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 0
                });
            } else {
                loadingMessage.innerHTML = '<p style="color: red;">Geolocation is not supported by your browser.</p>';
            }
        });

        document.getElementById('confirm-btn').addEventListener('click', function () {
            document.getElementById('address-container').style.display = 'block';
        });

        document.getElementById('recenter-btn').addEventListener('click', function () {
            if (map && userLat && userLon) {
                map.setView([userLat, userLon], 18);
                userMarker.setLatLng([userLat, userLon]);
            }
        });
    </script>
</div>

 </ul> 
    <!-- Carousel -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="slide.avif" alt="Los Angeles" class="d-block">
            </div>
            <div class="carousel-item">
                <img src="slide1.webp" alt="Chicago" class="d-block">
            </div>
            <div class="carousel-item">
                <img src="slide2.webp" alt="New York" class="d-block">
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <aside style="float: right;margin-top:-400px;margin-right:350px;">
        <h3>Special Offers</h3>
        <p>Get exclusive discounts and deals for first-time customers!</p>

        <br><br>
    </aside>

    <section class="content" style="padding: 40px 20px; background-color: #f1f1f1;">
        <h2><strong>Contact Us</strong></h2>
        <p>We'd love to hear from you! Please fill out the form below to get in touch with us.</p>

        <form action="submit_form.php" method="POST" style="max-width: 600px; margin: 0 auto; text-align: left;">
            <label for="name" style="display: block; margin-bottom: 8px;">Full Name:</label>
            <input type="text" id="name" name="name" placeholder="Your Full Name" required
                style="width: 100%; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
            
            <label for="email" style="display: block; margin-bottom: 8px;">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="Your Email Address" required
                style="width: 100%; padding: 10px; margin-bottom: 20px; border-radius: 5px;">

            <label for="message" style="display: block; margin-bottom: 8px;">Your Message:</label>
            <textarea id="message" name="message" rows="5" placeholder="Your Message" required
                style="width: 100%; padding: 10px; margin-bottom: 20px; border-radius: 5px;"></textarea>
            
            <button type="submit" style="padding: 10px 20px; background-color: #333; color: white; border: none; border-radius: 5px;">Send Message</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Fresh Fare. All Rights Reserved.</p>
    </footer>

    <script>
        const greetingElement = document.getElementById('greeting');
        const currentTime = new Date().getHours();

        if (currentTime < 12) {
            greetingElement.textContent = "Good Morning";
        } else if (currentTime < 18) {
            greetingElement.textContent = "Good Afternoon";
        } else {
            greetingElement.textContent = "Good Evening";
        }
    </script>
</body>

</html>
