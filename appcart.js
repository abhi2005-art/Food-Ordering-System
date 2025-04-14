var app = angular.module("pizzaApp", ['ngAnimate']);

// ✅ Menu Controller
app.controller("MenuController", function ($scope, $http) {
    // Define the menu data
    $scope.menu = [
        { name: "Stracciatello Pizza", price: 380, image: "straccaiatello.png", description: "Elegant and creamy, featuring mozzarella, San Marzano sauce, confit cherry tomatoes, basil pesto, and stracciatella.", dateAdded: "2023-10-01", rating: 4.3 },
        { name: "Massive Vibe Pizza", price: 430, image: "item2.png", description: "Features our mozzarella and San Marzano sauce, topped with sun-dried tomatoes, spinach, mushrooms, and olives.", dateAdded: "2023-10-05", rating: 4.3 },
        { name: "Quattro Formaggi Pizza", price: 420, image: "item5.png", description: "A rich blend of our house mozzarella, Parmesan, provolone, and blue cheese over San Marzano sauce for a decadent cheese experience.", dateAdded: "2023-10-10", rating: 4.0 },
        { name: "Diavola Veg Pizza", price: 400, image: "item6.png", description: "Spicy and flavorful, with mozzarella, San Marzano sauce, spicy sausage, and chili peppers for the boldest taste!", dateAdded: "2023-10-15", rating: 4.3 }
    ];

    // ✅ Load cart from localStorage
    $scope.cart = JSON.parse(localStorage.getItem("cart")) || [];

    // ✅ Initialize filtered menu
    $scope.filteredMenu = angular.copy($scope.menu);
    $scope.searchQuery = "";

    // ✅ Add to Cart (Prevents duplicate entries)
    $scope.addToCart = function (item) {
        let existingItem = $scope.cart.find(cartItem => cartItem.name === item.name);
        if (!existingItem) {
            $scope.cart.push(item);
            localStorage.setItem("cart", JSON.stringify($scope.cart));
            alert(item.name + " added to cart!");
        } else {
            alert(item.name + " is already in the cart!");
        }
    };

    // ✅ Search Functionality
    $scope.searchItems = function () {
        $scope.filteredMenu = $scope.menu.filter(item =>
            item.name.toLowerCase().includes($scope.searchQuery.toLowerCase())
        );
    };

    // ✅ Filter Functionality
    $scope.applyFilter = function (filterType) {
        switch (filterType) {
            case 'priceLowToHigh':
                $scope.filteredMenu = [...$scope.menu].sort((a, b) => a.price - b.price);
                break;
            case 'priceHighToLow':
                $scope.filteredMenu = [...$scope.menu].sort((a, b) => b.price - a.price);
                break;
            case 'ratingHighToLow':
                $scope.filteredMenu = [...$scope.menu].sort((a, b) => b.rating - a.rating);
                break;
            case 'dateNewest':
                $scope.filteredMenu = [...$scope.menu].sort((a, b) => new Date(b.dateAdded) - new Date(a.dateAdded));
                break;
            default:
                $scope.filteredMenu = angular.copy($scope.menu);
                break;
        }
    };

    // ✅ Clear Filters
    $scope.clearFilter = function () {
        $scope.filteredMenu = angular.copy($scope.menu);
        $scope.searchQuery = "";
    };

    // ✅ Modal for Image Preview
    $scope.modalVisible = false;
    $scope.modalImage = "";
    $scope.modalCaption = "";

    $scope.openModal = function (imgSrc, captionText) {
        $scope.modalVisible = true;
        $scope.modalImage = imgSrc;
        $scope.modalCaption = captionText;
    };

    $scope.closeModal = function () {
        $scope.modalVisible = false;
    };
});

// ✅ Cart Controller
app.controller("CartController", function ($scope, $http) {
    // Load cart from localStorage
    $scope.cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Calculate total price
    $scope.getTotal = function () {
        return $scope.cart.reduce((sum, item) => sum + item.price, 0);
    };

    // ✅ Remove item from cart
    $scope.removeFromCart = function (index) {
        $scope.cart.splice(index, 1);
        localStorage.setItem("cart", JSON.stringify($scope.cart));
    };

    // ✅ Place Order (Send order to backend)
    $scope.placeOrder = function () {
        if ($scope.cart.length === 0) {
            alert("Your cart is empty!");
            return;
        }

        const orderDetails = {
            items: $scope.cart,
            total: $scope.getTotal()
        };

        $http.post("http://localhost:3000/place-order", orderDetails)
            .then(function (response) {
                alert(response.data.message);
                $scope.cart = [];
                localStorage.removeItem("cart"); // Clear cart after order
            })
            .catch(function (error) {
                console.error("Error placing order:", error);
                alert("Failed to place order. Please try again later.");
            });
    };
});

// ✅ Custom Filters
app.filter('currencyFormat', function () {
    return function (input) {
        return '₹' + input.toFixed(2);
    };
});

app.filter('dateFormat', function () {
    return function (input) {
        return new Date(input).toLocaleDateString();
    };
});



