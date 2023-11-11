<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Food Ordering App</title>
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

        /* Image Slider */
        .slider-container {
            position: relative;
            overflow: hidden;
            width: 100%;
            max-height: 550px;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            flex: 0 0 100%;
            max-height: 550px;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Animation */
        @keyframes slideAnimation {
            0% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-100%);
            }

            50% {
                transform: translateX(-200%);
            }

            75% {
                transform: translateX(-300%);
            }

            100% {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>
    <?php echo csrf_field(); ?>
    <header>
        <h1>TASTEY FOOD</h1>
    </header>

    <nav>
        <a href="<?php echo e(url('/home')); ?>">Menu</a>
        <a href="<?php echo e(url('/cart')); ?>">Cart</a>
        <a href="<?php echo e(url('/settings')); ?>">Settings</a>
        <a href="<?php echo e(url('/account')); ?>">Account</a>
    </nav>

    <div class="container">
        <h1>TRENDING ITEMS</h1>

        <div class="slider-container">
            <div class="slider">
                <div class="slide">
                    <img src="https://render.fineartamerica.com/images/rendered/default/print/8/5.5/break/images/artworkimages/medium/2/1-chicken-biryani-with-rice-and-spices-india-foodfolio.jpg" alt="Food Item 1">
                </div>
                <div class="slide">
                    <img src="https://s01.sgp1.cdn.digitaloceanspaces.com/article/146843-jnxhqckdaa-1598964061.jpg" alt="Food Item 2">
                </div>
                <div class="slide">
                    <img src="https://www.willflyforfood.net/wp-content/uploads/2023/05/nepalese-food-dal-bhat.jpg.webp" alt="Food Item 3">
                </div>
                <div class="slide">
                    <img src="https://thumbs.dreamstime.com/b/indian-sweets-diwali-festival-wedding-selective-focus-stock-photo-indian-sweets-served-silver-wooden-plate-variety-100924655.jpg" alt="Food Item 4">
                </div>
                <!-- Add more slides as needed -->
            </div>
        </div>
    </div>

    <script>
        const slider = document.querySelector('.slider');
        let slideIndex = 0;

        function animateSlider() {
            slideIndex = (slideIndex + 1) % 4;
            slider.style.transform = `translateX(-${slideIndex * 100}%)`;
        }

        setInterval(animateSlider, 2000);
    </script>
</body>

</html><?php /**PATH D:\laravel\food_ordering_system\resources\views/dashboard.blade.php ENDPATH**/ ?>