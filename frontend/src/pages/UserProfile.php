<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserProfile</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <section class="profile">
        <div class="profile__logo logo">
            <a style="cursor: pointer;" onclick="openMain()"><img src="../images/logo.png" alt="#"/></a>
        </div>
        <div class="profile__grid">
            <div class="profile__block profile__information information">
                <div class="information__block">
                    <img src="../images/costu.png" alt="" class="information__avatar">
                    <?php
                    session_start();
                    echo 'Email: ', $_SESSION["required_email"];
                    ?>
                    <p class="information__email">Hi there! Here is your profile!</p>
                </div>
            </div>
            <div class="profile__block profile__payment payment">
                <h1 class="payment__header">Payment Methods</h1>
                <ul class="payment__methods">
                    <li class="payment__method">
                        <img class="payment__image" src="data:image/svg+xml,%3Csvg%20width%3D%2222%22%20height%3D%2218%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M20.182%200H1.818C.814%200%200%20.895%200%202v12c0%201.105.814%202%201.818%202H13v-2H2V7h18v3h2V2c0-1.105-.814-2-1.818-2zM20%205V2H2v3h18zm-4%2011v-2h2v-2h2v2h2v2h-2v2h-2v-2h-2z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E" alt="">
                        <p class="payment__text">Link Card</p>
                    </li>
                </ul>
            </div>
            <div class="profile__block profile__orders-history">
                <h1 class="orders__header">History of orders</h1>
                <b class="orders__title">Here are your orders</b>
                <p class="orders__subtitle">Checkout in the shopping cart and come back to see where the items are now</p>
                <button class="orders__link" onclick="openBasketFromProfile()">Go to basket</button>
                <?php if ($_SESSION["is_admin"]): ?>
                    <button class="orders__link" onclick="addProduct()">Add product</button>
                    <script>
                        function addProduct() {
                            window.location = "/SimpleWebsite/frontend/src/pages/prod_add.html";
                            // window.location = "/SimpleWebsite/backend/product_addition.php";
                        }
                    </script>
                <?php endif;?>
            </div>
        </div>
        <div class="back"></div>
    </section>
    <script src="../index.js"></script>
</body>
</html>
