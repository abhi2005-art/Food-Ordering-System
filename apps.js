var app = angular.module("pizzaApp", ['ngAnimate']);

// Menu Controller
app.controller("MenuController", function ($scope) {
    // Define the menu data
    $scope.menu = [
        { name: "Stracciatello Pizza", price: 380, image: "straccaiatello.png", description: "Elegant and creamy, featuring mozzarella, San Marzano sauce, confit cherry tomatoes, basil pesto, and stracciatella.", dateAdded: "2023-10-01", rating: 4.3 },
        { name: "Massive Vibe Pizza", price: 430, image: "item2.png", description: "Features our mozzarella and San Marzano sauce, topped with sun-dried tomatoes, spinach, mushrooms, and olives.", dateAdded: "2023-10-05", rating: 4.3 },
        { name: "Quattro Formaggi Pizza", price: 420, image: "item5.png", description: "A rich blend of our house mozzarella, Parmesan, provolone, and blue cheese over San Marzano sauce for a decadent cheese experience.", dateAdded: "2023-10-10", rating: 4.0 },
        { name: "Diavola Veg Pizza", price: 400, image: "item6.png", description: "Spicy and flavorful, with mozzarella, San Marzano sauce, spicy sausage, and chili peppers for the boldest taste!", dateAdded: "2023-10-15", rating: 4.3 }
    ];

    // Initialize filtered menu
    $scope.filteredMenu = angular.copy($scope.menu);
    $scope.searchQuery = "";

    // Search Functionality
    $scope.searchItems = function () {
        $scope.filteredMenu = $scope.menu.filter(item =>
            item.name.toLowerCase().includes($scope.searchQuery.toLowerCase())
        );
    };

    // Filter Functionality
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

    // Clear Filters
    $scope.clearFilter = function () {
        $scope.filteredMenu = angular.copy($scope.menu);
        $scope.searchQuery = "";
    };

    // Modal for Image Preview
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

    // Add to Cart
    $scope.addToCart = function (item) {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let existingItem = cart.find(cartItem => cartItem.name === item.name);
        if (!existingItem) {
            cart.push(item);
            localStorage.setItem("cart", JSON.stringify(cart));
            alert(item.name + " added to cart!");
        } else {
            alert(item.name + " is already in the cart!");
        }
    };

    // Display Cart Contents
    $scope.showCart = function () {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        $scope.cartItems = cart;
        $scope.cartTotal = cart.reduce((sum, item) => sum + item.price, 0);
    };

    // Remove Item from Cart
    $scope.removeFromCart = function (index) {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        cart.splice(index, 1);
        localStorage.setItem("cart", JSON.stringify(cart));
        $scope.showCart(); // Refresh cart display
    };

    // Load cart items on page load (if on cart page)
    $scope.showCart();
});

// Custom Filters
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