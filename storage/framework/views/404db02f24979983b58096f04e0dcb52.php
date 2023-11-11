<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Food Ordering App</title>
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

        /* Payment Pop-up */
        .payment-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
            align-items: center;
            justify-content: center;
        }
        header {
            background-color: #ff9900;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
        .payment-box {
            background: #fff;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .payment-options {
            display: flex;
            flex-direction: column;
            gap: 20px;
            align items: center;
        }
 
        .payment-option {
            background: #ff9900;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .confirmation-box {
            display: none;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .order-info {
            margin-bottom: 20px;
        }

        .loading {
            display: none;
        }

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

        @keyframes pulse {
            0% {
                transform: scale(0.95);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(0.95);
            }
        }
        
        .order-animation {
            animation: pulse 1s infinite;
        }
    </style>
</head>
<body>
    <?php echo csrf_field(); ?>
    <header>
        <h1>Cart - Food Ordering App</h1>
    </header>
    <nav>
        <a href="<?php echo e(url('/dashboard')); ?>">Home</a>
        <a href="<?php echo e(url('/home')); ?>">Menu</a>
        <a href="<?php echo e(url('/settings')); ?>">Settings</a>
        <a href="<?php echo e(url('/account')); ?>">Account</a>
    </nav>
    <div class="container">
        <h1>Your Cart</h1>
        <div class="cart">
            <!-- Cart items will be added here via JavaScript -->

            <div class="cart-total">
                Total (₹): <span id="cart-total-price">0.00</span>
            </div>

            <button class="checkout-button" id="order-button">Order</button>
        </div>
    </div>

    <div class="payment-popup" id="payment-popup">
        <div class="payment-box">
            <h2>Payment Options</h2>
            <div class="payment-options">
                <label for="payment-cash">
                    <input type="radio" class="payment-option" id="payment-cash" name="payment" value="cash">
                    Cash
                </label>
                <label for="payment-card">
                    <input type="radio" class="payment-option" id="payment-card" name="payment" value="card">
                    Credit Card
                </label>
                <label for="payment-upi">
                    <input type="radio" class="payment-option" id="payment-upi" name="payment" value="upi">
                    UPI
                </label>
            </div>
            <button class="checkout-button order-animation" id="place-order-button">Place Order</button>
        </div>
    </div>

    <div class="confirmation-box" id="confirmation-box">
        <h2>Order Confirmation</h2>
        <div class="order-info">
            <p>Total Bill (₹): <span id="order-total">0.00</span></p>
            <p>Estimated Delivery Time: <span id="delivery-time">30 minutes</span></p>
        </div>
        <div class="loading">Placing your order...</div>
        <div class="confirmation-box" id="confirmation-box">
            <h2>Order Confirmation</h2>
            <div class="order-info">
                <p>Total Bill (₹): <span id="order-total">0.00</span></p>
                <p>Estimated Delivery Time: <span id="delivery-time">30 minutes</span></p>
                <p>Order Details:</p>
                <ul id="order-details"></ul>
            </div>
            <div class="loading">order placed</div>
        </div>
    </div>

    <script>
        // Retrieve cart items from localStorage
        const storedCartItems = localStorage.getItem('cartItems');
        const cartItems = storedCartItems ? JSON.parse(storedCartItems) : [];

        // Function to display items from the retrieved cartItems
        function displayCartItems() {
            const cartTotalPrice = document.getElementById("cart-total-price");
            const orderButton = document.getElementById("order-button");

            let totalPrice = 0;

            cartItems.forEach(item => {
                const cartItem = document.createElement("div");
                cartItem.classList.add("cart-item");
                cartItem.innerHTML = `
                    <img src="${item.imageUrl}" alt="${item.name}">
                    <h2>${item.name}</h2>
                    <p>Price (₹): ${item.price.toFixed(2)}</p>
                `;
                document.querySelector(".cart").appendChild(cartItem);

                totalPrice += item.price;
            });

            // Update the total price
            cartTotalPrice.textContent = `₹${totalPrice.toFixed(2)}`;

            // Handle the order button click
            orderButton.addEventListener("click", function() {
                const paymentPopup = document.getElementById("payment-popup");
                paymentPopup.style.display = "flex";
            });
        }

        displayCartItems();

        // Handle payment method selection and order placement
        const placeOrderButton = document.getElementById("place-order-button");
        const confirmationBox = document.getElementById("confirmation-box");

        placeOrderButton.addEventListener("click", function() {
            const paymentPopup = document.getElementById("payment-popup");
            paymentPopup.style.display = "none";
            showConfirmationBox();
        });

        function showConfirmationBox() {
            const paymentOption = document.querySelector('input[name="payment"]:checked');

            if (paymentOption) {
                const orderTotal = document.getElementById("order-total");
                const deliveryTime = document.getElementById("delivery-time");

                // Calculate random delivery time for demonstration
                const randomMinutes = Math.floor(Math.random() * 30) + 30; // Between 30 to 60 minutes
                const totalPrice = parseFloat(document.getElementById("cart-total-price").textContent.replace("₹", ""));

                orderTotal.textContent = `₹${totalPrice.toFixed(2)}`;
                deliveryTime.textContent = `${randomMinutes} minutes`;

                confirmationBox.style.display = "block";

                const loadingIndicator = document.querySelector(".loading");
                loadingIndicator.style.display = "block";

                placeOrderButton.style.display = "none";
            }
        }
    </script>
    <!-- Add this script section to your existing script -->
<script>
    // Handle payment method selection and order placement
    const placeOrderButton = document.getElementById("place-order-button");

    placeOrderButton.addEventListener("click", function() {
        const paymentPopup = document.getElementById("payment-popup");
        paymentPopup.style.display = "none";

        // Get the ordered items from localStorage
        const storedCartItems = localStorage.getItem('cartItems');
        const cartItems = storedCartItems ? JSON.parse(storedCartItems) : [];

        // Prepare the data to be sent to the server
        const postData = {
            orderedItems: cartItems
        };

        // Make an AJAX request to the server
        fetch('admin.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify(postData)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data); // Log the response for debugging
            // You can perform additional actions based on the response if needed
        })
        .catch(error => {
            console.error('Error:', error);
        });

        showConfirmationBox();
    });

    function showConfirmationBox() {
        // Existing code for displaying the confirmation box
    }
</script>

    
</body>
</html>

<?php /**PATH D:\laravel\food_ordering_system\resources\views/cart.blade.php ENDPATH**/ ?>