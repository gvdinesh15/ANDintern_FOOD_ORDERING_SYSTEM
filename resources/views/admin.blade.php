

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
