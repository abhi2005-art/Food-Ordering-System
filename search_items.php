<?php
// search_items.php

// Simulating a database of items without Cookies and Cream, Coffee Ice Cream, and Pistachio Ice Cream
$items = [
    ["name" => "Chocolate Ice Cream", "price" => 150, "description" => "Rich and creamy chocolate ice cream made with real cocoa. A classic favorite!", "image" => "chocolate_ice_cream.avif", "rating" => "4.5 (123)"],
    ["name" => "Vanilla Ice Cream", "price" => 140, "description" => "Classic vanilla ice cream made with fresh cream and natural vanilla beans.", "image" => "vanilla_ice_cream.avif", "rating" => "4.7 (98)"],
    ["name" => "Strawberry Ice Cream", "price" => 160, "description" => "Delicious strawberry ice cream made with real strawberries for a refreshing taste.", "image" => "strawberry_ice_cream.avif", "rating" => "4.6 (88)"],
    ["name" => "Mint Chocolate Chip", "price" => 170, "description" => "Refreshing mint ice cream with chocolate chips, perfect for mint lovers!", "image" => "mint_chocolate_chip.avif", "rating" => "4.8 (56)"]
];

// Get the query parameter from the URL
$query = isset($_GET['query']) ? strtolower(trim($_GET['query'])) : '';

// Filter items based on the search query
$filteredItems = array_filter($items, function($item) use ($query) {
    return strpos(strtolower($item['name']), $query) !== false;
});

// Output the filtered items as HTML
foreach ($filteredItems as $item) {
    echo '<div class="item" data-name="' . $item['name'] . '" data-price="' . $item['price'] . '">
            <img src="' . $item['image'] . '" height="190" width="215" class="item-image">
            <div class="item-description">
                <b>' . $item['name'] . '<br>Rs. ' . $item['price'] . '</b>
                ' . $item['rating'] . '
                <p class="more-info">
                    ' . $item['description'] . '
                    <button type="button" onclick="alert(\'' . $item['description'] . '\')">More...</button>
                </p>
                <div class="cart-button-container">
                    <button class="cart-button" onclick="addToCart(\'' . $item['name'] . '\', ' . $item['price'] . ')">Add to cart</button>
                </div>
            </div>
        </div>';
}
?>
