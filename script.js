// Load menu.json using XMLHttpRequest
var xhr = new XMLHttpRequest();
xhr.open("GET", "menu.json", true);

xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            try {
                var menu = JSON.parse(xhr.responseText);
                displayMenu(menu);
            } catch (error) {
                console.error("Error parsing JSON:", error);
            }
        } else {
            console.error("Failed to load menu.json. HTTP Status:", xhr.status);
        }
    }
};

xhr.send();

// Function to display the menu dynamically
function displayMenu(menu) {
    var menuContainer = document.getElementById("menu");
    if (!menuContainer) {
        console.error("Menu container not found!");
        return;
    }
    
    menuContainer.innerHTML = ""; 

    menu.forEach(item => {
        var menuItem = document.createElement("div");
        menuItem.className = "menu-item";

        // Use price directly if it's a number
        let priceValue = item.price;

        menuItem.innerHTML = `
            <h3>${item.name}</h3>
            <p><strong>Price:</strong> ₹${priceValue}</p>
            <p><strong>Rating:</strong> ${item.rating}</p>
            <p>${item.description}</p>
            <button onclick="addToCart(${JSON.stringify(item.name)}, ${priceValue})">Add to Cart</button>
            <hr>
        `;

        menuContainer.appendChild(menuItem);
    });
}
