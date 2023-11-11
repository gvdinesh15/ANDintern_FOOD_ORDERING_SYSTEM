<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account - Food Ordering App</title>
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
        }

        nav a:hover {
            background-color: #555;
        }

        /* Account Page */
        .account {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .account-info {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .edit-button {
            background-color: #ff9900;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .settings-section {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }

        .setting-option {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php echo csrf_field(); ?>
    <header>
        <h1>Account - Food Ordering App</h1>
    </header>

    <nav>
        <a href="<?php echo e(url('/dashboard')); ?>">Home</a>
        <a href="<?php echo e(url('/home')); ?>">Menu</a>
        <a href="<?php echo e(url('/cart')); ?>">Cart</a>
        <a href="<?php echo e(url('/settings')); ?>">Settings</a>
        
        
    </nav>

    <div class="container">
        <h1>My Account</h1>

        <div class="account">
            <p class="account-info"><strong>Name:</strong> User</p>
            <p class="account-info"><strong>Email:</strong> user@gmail.com</p>
            <p class="account-info"><strong>Phone:</strong> (123) 456-7890</p>
            <p class="account-info"><strong>Address:</strong> 123 Main St, City, Country</p>

            <button class="edit-button">Edit Account</button>

            <div class="settings-section">
                <h2>Account Settings</h2>
                <div class="setting-option">
                    <label for="change-password">Change Password:</label>
                    <input type="password" id="change-password">
                </div>

                <div class="setting-option">
                    <label for="email-notifications">Email Notifications:</label>
                    <input type="checkbox" id="email-notifications">
                </div>

                <div class="setting-option">
                    <label for="sms-notifications">SMS Notifications:</label>
                    <input type="checkbox" id="sms-notifications">
                </div>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH D:\laravel\food_ordering_system\resources\views/account.blade.php ENDPATH**/ ?>