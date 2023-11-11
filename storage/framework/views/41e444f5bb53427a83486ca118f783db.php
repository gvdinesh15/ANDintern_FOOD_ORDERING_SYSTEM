<?php
// admin.php

// Function to get ordered items from file
function getOrderedItems() {
    $file = 'ordered_items.json';

    if (file_exists($file)) {
        $contents = file_get_contents($file);
        return json_decode($contents, true);
    }

    return [];
}

// Function to save ordered items to file
function saveOrderedItems($orderedItems) {
    $file = 'ordered_items.json';
    $json = json_encode($orderedItems, JSON_PRETTY_PRINT);
    file_put_contents($file, $json);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve ordered items from the file
    $orderedItems = getOrderedItems();

    // Get current timestamp
    $timestamp = time();

    // Save the ordered items along with the timestamp
    $orderedItems[$timestamp] = $_POST['orderedItems'];

    // Save the updated ordered items to the file
    saveOrderedItems($orderedItems);

    // Respond with a success message
    echo json_encode(['status' => 'success']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Food Ordering App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
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

        /* Order Section */
        .order-list {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }

        .order-item img {
            max-width: 60px;
            height: auto;
            margin-right: 10px;
        }

        .order-total {
            font-weight: bold;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin - Food Ordering App</h1>
    </header>

    <div class="container">
        <h1>Order List</h1>
        <div class="order-list" id="order-list">
            <div class="order-info">
                <p>Total Bill (₹): <span id="order-total">0.00</span></p>
                <p>Estimated Delivery Time: <span id="delivery-time">30 minutes</span></p>
                <p>Order Details:</p>
                <ul id="order-details"></ul>
            </div>
            <!-- Ordered items will be added here via JavaScript -->
        </div>
    </div>

    <script>
        // Function to fetch and display ordered items
        async function fetchOrderedItems() {
            const response = await fetch('admin.php');
            const data = await response.json();

            const orderList = document.getElementById("order-list");

            // Clear existing content
            orderList.innerHTML = "";

            // Iterate through the ordered items and display them
            Object.entries(data).forEach(([timestamp, orderedItems]) => {
                const orderItem = document.createElement("div");
                orderItem.classList.add("order-item");

                // Display the timestamp (you may format it as needed)
                orderItem.innerHTML += `<p>Order Time: ${new Date(timestamp * 1000).toLocaleString()}</p>`;

                // Iterate through each ordered item in this order
                orderedItems.forEach(item => {
                    const img = document.createElement("img");
                    img.src = item.imageUrl;
                    img.alt = item.name;
                    img.style.maxWidth = "60px";
                    img.style.height = "auto";

                    orderItem.appendChild(img);
                    orderItem.innerHTML += `<h2>${item.name}</h2>`;
                    orderItem.innerHTML += `<p>Price (₹): ${item.price.toFixed(2)}</p>`;
                });

                orderList.appendChild(orderItem);
            });
        }

        // Fetch and display ordered items on page load
        fetchOrderedItems();
    </script>
</body>
</html>
<?php /**PATH D:\laravel\food_ordering_system\resources\views/admin.blade.php ENDPATH**/ ?>