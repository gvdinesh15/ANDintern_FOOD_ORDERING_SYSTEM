<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: burlywood;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #ff9900;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
        }

        /* Navigation Bar */
        nav {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border: 2px solid transparent;
            transition: border 0.3s, color 0.3s;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: #555;
            border-color: #fff;
        }

        /* Menu Section */
        .menu {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .menu-item {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 30%;
            margin: 10px;
            text-align: center;
        }

        .menu-item img {
            max-width: 100%;
            height: auto;
        }

        .menu-item h2 {
            margin-top: 10px;
            font-size: 20px;
        }

        .menu-item p {
            color: #777;
        }

        .menu-item button {
            background-color: #ff9900;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Cart Section */
        .cart {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }

        .cart-item img {
            max-width: 60px;
            height: auto;
            margin-right: 10px;
        }

        .cart-total {
            font-weight: bold;
            font-size: 18px;
        }

        .checkout-button {
            background-color: #ff9900;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Food Ordering App</h1>
    </header>

    <nav>
        <a href="<?php echo e(url('/dashboard')); ?>">Home</a>
        <a href="<?php echo e(url('/cart')); ?>">Cart</a>
        <a href="<?php echo e(url('/settings')); ?>">Settings</a>
        <a href="<?php echo e(url('/account')); ?>">Account</a>
    </nav>

  <div class="menu">
            <div class="menu-item">
                <img src="https://www.whiskaffair.com/wp-content/uploads/2021/10/Andhra-Chicken-Curry-2-1-1200x1800.jpg" alt="Andhra Chicken Curry">
                <h2>Andhra Chicken Curry</h2>
                <p>Spicy Andhra-style chicken curry with rich flavors.</p>
                <p>Price: ₹229</p>
                <button class="add-to-cart" data-name="Andhra Chicken Curry" data-price="229">Add to Cart</button>
            </div>
            <div class="menu-item">
                <img src="https://j6e2i8c9.rocketcdn.me/wp-content/uploads/2020/09/Chicken-Biryani-Recipe-01-1.jpg" alt="Hyderabadi Biryani">
                <h2>Hyderabadi Biryani</h2>
                <p>Aromatic Hyderabadi biryani with succulent meat and fragrant rice.</p>
                <p>Price: ₹249</p>
                <button class="add-to-cart" data-name="Hyderabadi Biryani" data-price="249">Add to Cart</button>
            </div>
            <div class="menu-item">
                <img src="https://3.bp.blogspot.com/-SY4mwvS19us/VaPGamtpQkI/AAAAAAAAtFc/NUy62ap_stI/s1600/andhra%2Bprawn%2Bcurry-1.jpg" alt="Andhra Prawn Curry">
                <h2>Andhra Prawn Curry</h2>
                <p>Spicy and tangy Andhra-style prawn curry.</p>
                <p>Price: ₹219</p>
                <button class="add-to-cart" data-name="Andhra Prawn Curry" data-price="219">Add to Cart</button>
            </div>
            <div class="menu-item">
                <img src="https://i.pinimg.com/736x/87/15/96/871596442ea268b5eeb80ba1af8f6a54--indian-mutton-recipes-indian-vegetarian-recipes.jpg" alt="Telangana Mutton Curry">
                <h2>Telangana Mutton Curry</h2>
                <p>Rich and flavorful Telangana-style mutton curry.</p>
                <p>Price: ₹259</p>
                <button class="add-to-cart" data-name="Telangana Mutton Curry" data-price="259">Add to Cart</button>
            </div>
            <div class="menu-item">
                <img src="https://yummyindiankitchen.com/wp-content/uploads/2015/12/how-to-make-andhra-style-gongura-chicken-recipe.jpg" alt="Gongura Chicken">
                <h2>Gongura Chicken</h2>
                <p>Andhra-style chicken curry with tangy gongura leaves.</p>
                <p>Price: ₹239</p>
                <button class="add-to-cart" data-name="Gongura Chicken" data-price="239">Add to Cart</button>
            </div>
            <div class="menu-item">
                <img src="https://c8.alamy.com/comp/S1X80R/homemade-andhra-chepala-iguru-fish-fry-in-a-pan-S1X80R.jpg" alt="Andhra Fish Curry">
                <h2>Andhra Fish Curry</h2>
                <p>Spicy fish curry made in Andhra style with a hint of tamarind.</p>
                <p>Price: ₹209</p>
                <button class="add-to-cart" data-name="Andhra Fish Curry" data-price="209">Add to Cart</button>
            </div>
            <div class="menu-item">
                <img src="https://simplefreshnyum.com/wp-content/uploads/2021/01/Bagara-Rice-finished-with-raita.jpg" alt="Telangana Pulao">
                <h2>Telangana Pulao</h2>
                <p>Flavorful Telangana-style pulao with fragrant spices.</p>
                <p>Price: ₹179</p>
                <button class="add-to-cart" data-name="Telangana Pulao" data-price="179">Add to Cart</button>
            </div>
            <div class="menu-item">
                <img src="https://www.indianhealthyrecipes.com/wp-content/uploads/2014/01/royyala-iguru.jpg" alt="Royyala Vepudu">
                <h2>Royyala Vepudu</h2>
                <p>Crispy and spicy Telugu-style prawn fry.</p>
                <p>Price: ₹219</p>
                <button class="add-to-cart" data-name="Royyala Vepudu" data-price="219">Add to Cart</button>
            </div>
            <div class="menu-item">
                <img src="https://www.indianhealthyrecipes.com/wp-content/uploads/2023/06/methi-dal-menthi-kura-pappu.jpg" alt="Kalaadi Pulao">
                <h2>pappu</h2>
                <p>famous andhra pappu which made of millets.</p>
                <p>Price: ₹99</p>
                <button class="add-to-cart" data-name="Kalaadi Pulao" data-price="189">Add to Cart</button>
            </div>
            <div class="menu-item">
                <img src="https://static.toiimg.com/thumb/63799510.cms?imgsize=1091643&width=800&height=800" alt="Gulab Jamun">
                <h2>Gulab Jamun</h2>
                <p>Soft and spongy milk-based sweet soaked in rose-flavored sugar syrup.</p>
                <p>Price: ₹99</p>
                <button class="add-to-cart" data-name="Gulab Jamun" data-price="99">Add to Cart</button>
            </div>
            <div class="menu-item">
                <img src="https://www.chilitochoc.com/wp-content/uploads/2020/02/jalebi-featured-image.jpg" alt="Jalebi">
                <h2>Jalebi</h2>
                <p>Crispy and coiled sweet made from deep-fried batter soaked in sugar syrup.</p>
                <p>Price: ₹79</p>
                <button class="add-to-cart" data-name="Jalebi" data-price="79">Add to Cart</button>
            </div>
            <div class="menu-item">
                <img src="https://bhimavaram.online/image/cache/food/rasgulla-indian-dessert-1957839-hero-01-7c3528a2d34a4f1b9248c7483a73d0a6-550x550.jpg" alt="Rasgulla">
                <h2>Rasgulla</h2>
                <p>Soft and spongy cheese balls soaked in sugar syrup.</p>
                <p>Price: ₹89</p>
                <button class="add-to-cart" data-name="Rasgulla" data-price="89">Add to Cart</button>
            </div>
            <div class="menu-item">
                <img src="https://www.madhuseverydayindian.com/wp-content/uploads/2020/07/coconut-burfi-with-condensed-milk-nariyal-barfi.jpg" alt="Barfi">
                <h2>Barfi</h2>
                <p>Sweet and dense confectionery made with condensed milk, nuts, and flavorings.</p>
                <p>Price: ₹119</p>
                <button class="add-to-cart" data-name="Barfi" data-price="119">Add to Cart</button>
            </div>
            <div class="menu-item">
                <img src="https://x9s2d6a3.rocketcdn.me/wp-content/uploads/2010/11/Boondi-Ladoo-50_1200x1200.jpg" alt="Ladoo">
                <h2>Ladoo</h2>
                <p>Round-shaped sweet made from gram flour, sugar, and ghee.</p>
                <p>Price: ₹69</p>
                <button class="add-to-cart" data-name="Ladoo" data-price="69">Add to Cart</button>
            </div>
            
            <!-- Repeat menu items as needed -->
        </div>

        <h1>Cart</h1>
        <div class="cart">
            <!-- Cart items will be added here via JavaScript -->
            <div class="cart-total">
                Total: <span id="cart-total-price">₹0.00</span>
            </div>
            <button class="checkout-button" onclick="redirectToAnotherPage()">Checkout</button>
        </div>

        <script>
            const addToCartButtons = document.querySelectorAll(".add-to-cart");
            const cart = document.querySelector(".cart");
            const cartTotalPrice = document.getElementById("cart-total-price");
            const checkoutButton = document.querySelector(".checkout-button");
            const cartItems = [];
    
            addToCartButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const name = button.getAttribute("data-name");
                    const price = parseFloat(button.getAttribute("data-price"));
                    const imgSrc = button.parentElement.querySelector('img').src; // Get the image source
    
                    cartItems.push({ name, price, imgSrc }); // Include the image source
    
                    // Update the cart display
                    const cartItem = document.createElement("div");
                    cartItem.classList.add("cart-item");
                    cartItem.innerHTML = `
                        <img src="${imgSrc}" alt="${name}"> <!-- Display the image in the cart -->
                        <h2>${name}</h2>
                        <p>Price: ₹${price.toFixed(2)}</p>
                    `;
                    cart.appendChild(cartItem);
    
                    // Update the total price
                    const totalPrice = cartItems.reduce((total, item) => total + item.price, 0);
                    cartTotalPrice.textContent = `₹${totalPrice.toFixed(2)}`;
                });
            });
    
            function redirectToAnotherPage() {
                // Store cart items in localStorage before redirecting
                localStorage.setItem('cartItems', JSON.stringify(cartItems));
                window.location.href = "<?php echo e(url('/cart')); ?>"; // Replace with your desired URL
            }
        </script>
</body>
</html><?php /**PATH D:\laravel\food_ordering_system\resources\views/home.blade.php ENDPATH**/ ?>