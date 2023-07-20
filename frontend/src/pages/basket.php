<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <section class="basket">
        <div class="profile__logo logo" style="display: flex; justify-content: space-between; align-items: center;">
            <a style="cursor: pointer;" onclick="openMain()"><img src="../images/logo.png" alt="#"/></a>
            <a style="cursor: pointer" onclick="openProfileFromBasket()">
                <img style="height: 37px; margin-top: 10px;"  src="../images/free-icon-user-profile-2651994.png" alt="#"/>
            </a>
        </div>
        <h1 class="basket__title">Basket</h1>
        <div class="basket__grid">
            <div class="basket__block block basket__products products">
                <ul class="basket__products" data-img="./images/pro1.png">
                    <?php
                    require "../../../backend/open_connection.php";
                    session_start();
                    $id = $_SESSION["ID"];
                    $sql = "SELECT `basket`.`id_w`, `basket`.`id_user`, `products`.`name`, `products`.`price`, `products`.`image` FROM `products`\n"

                        . "JOIN `basket` \n"

                        . "ON `basket`.`id_prod` = `products`.`id`\n"

                        . "WHERE `id_user` = $id;";
                    $result = mysqli_query($con, $sql);
                    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    ?>
                    <?php foreach ($items as $item) { ?>
                        <?php $id_w = $item["id_w"] ?>
                        <li class='basket__product'>
                            <p class="order__number">1</p>
                            <div>
                                <?php
                                    $img = $item["image"];
                                    echo "<figure><img src=\"$img\" style=\"width: 100px\" alt=\"#\"/></figure>";
                                ?>
                            </div>
                            <div>
                                <?php
                                    $price = $item["price"];
                                    $name = $item["name"];
                                    echo "<h3>$$price</h3>";
                                    echo "<span>$name</span>";
                                ?>
                                <?php
echo "<a class=\"read_more mar_top\" style=\"background-color: rgba(255,0,0,0.66)\" onclick=\"deleteProd($id_w)\" href=\"Javascript:void(0)\">Delete</a>";
                                ?>
                            </div>
                        </li>
                    <?php }  ?>
                </ul>
                <div class="ordering">
                    <a class="ordering__button" onclick="openCheckout()" href="Javascript:void(0)">Proceed to checkout</a>
                    <script>
                        function redir() {
                            window.location = "/SimpleWebsite/backend/checkout.php";
                        }
                    </script>
                    <script>
                        function deleteProd(id_write) {
                            window.location = "/SimpleWebsite/backend/delete_from_basket.php?id_write=" + id_write
                        }
                    </script>
                    <p class="ordering__text">Available options and delivery time can be selected at checkout</p>
                    <h3 class="ordering__total">Total: 3000$</h3>
                </div>
            </div>
        </div>
    </section>
    <script src="../index.js"></script>
</body>
</html>
