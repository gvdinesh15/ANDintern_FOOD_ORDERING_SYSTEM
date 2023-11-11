<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Food Ordering App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:burlywood;
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
        }

        nav a:hover {
            background-color: #555;
        }

        /* Settings Page */
        .settings {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .setting-option {
            margin-bottom: 20px;
        }

        .setting-label {
            font-weight: bold;
        }

        .setting-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .save-button {
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
        <h1>Settings - Food Ordering App</h1>
    </header>

    <nav>
        <a href="<?php echo e(url('/dashboard')); ?>">Home</a>
        <a href="<?php echo e(url('/home')); ?>">Menu</a>
        <a href="<?php echo e(url('/cart')); ?>">Cart</a>
        <a href="<?php echo e(url('/account')); ?>">Account</a>
    </nav>

    <div class="container">
        <h1>App Settings</h1>

        <div class="settings">
            <div class="setting-option">
                <label class="setting-label" for="language">Language:</label>
                <select class="setting-input" id="language">
                    <option value="english">English</option>
                    <option value="spanish">Spanish</option>
                    <option value="french">French</option>
                </select>
            </div>

            <div class="setting-option">
                <label class="setting-label" for="notifications">Notifications:</label>
                <input class="setting-input" type="checkbox" id="notifications">
            </div>

            <div class="setting-option">
                <label class="setting-label" for="theme">Theme:</label>
                <select class="setting-input" id="theme">
                    <option value="light">Light</option>
                    <option value="dark">Dark</option>
                </select>
            </div>

            <div class="setting-option">
                <label class="setting-label" for="push-notifications">Push Notifications:</label>
                <input class="setting-input" type="checkbox" id="push-notifications">
            </div>

            <div class="setting-option">
                <label class="setting-label" for="email-notifications">Email Notifications:</label>
                <input class="setting-input" type="checkbox" id="email-notifications">
            </div>

            <div class="setting-option">
                <label class="setting-label" for="auto-reorder">Auto Reorder:</label>
                <input class="setting-input" type="checkbox" id="auto-reorder">
            </div>

            <button class="save-button">Save Settings</button>
        </div>
    </div>
</body>

</html><?php /**PATH D:\laravel\food_ordering_system\resources\views/settings.blade.php ENDPATH**/ ?>