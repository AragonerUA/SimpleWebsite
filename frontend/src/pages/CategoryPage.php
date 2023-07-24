<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div id="protien" class="protien_main" style="height: 100%; padding-top: 20px;">
    <div>
        <div>
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Filters</h2>
                    <p class="price" style="text-align: start; padding-left: 40px; margin-top: 20px;">Price:</p>
                    <div style="display: flex; justify-content: flex-start; align-items: center; padding-left: 40px; margin-top: 10px; gap: 10px">
                        <a class="get_btn" style="margin: 0;" id="add_to_basket" onclick="increaseSort()" href="Javascript:void(0)"> Increase</a>
                        <a class="get_btn" style="margin: 0;" id="add_to_basket" onclick="decreaseSort()" href="Javascript:void(0)"> Decrease</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Our Protien</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            require "../../../backend/open_connection.php";
            $new_sql = "SELECT * FROM `products`";
            $result = mysqli_query($con, $new_sql);
            $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($items as $row) {
                $prod_row_id = $row["id"];
                $prod_row_image = $row["image"];
                $prod_row_price = $row["price"];
                $prod_row_name = $row["name"];
                $prod_row_desc = $row["description"]; ?>
                <div class="col-md-3 col-sm-6">
                    <?php
                    $call = "popup.open('$prod_row_image', '$prod_row_desc', $prod_row_price, '$prod_row_name', $prod_row_id)";
                    echo "<div class=\"protien\" data-img=\"$prod_row_image\" data-product_id=\"$prod_row_id\">";
                    echo "<figure><img src=\"$prod_row_image\" alt=\"#\"/></figure>";
                    echo "<h3>$$prod_row_price</h3>";
                    echo "<span>$prod_row_name</span>";
                    echo "<a class='read_more mar_top' onclick=\"$call\" href='Javascript:void(0)'> Buy Now</a>";
                    echo "</div>";
                    ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<section class="popup">
    <div class="popup__block">
        <button type="button" class="popup__close"></button>
        <div class="popup__content">
            <img class="popup__image" alt="#"/>
            <div class="popup__description">
                <h3>Price: $400</h3>
                <h2>Name: Passages  </h2>
                <h3 class="description">Description: <br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim Lorem ipsum</h3>
            </div>
        </div>
        <a class="popup__button" id="add_to_basket" onclick="redirr()" href="Javascript:void(0)"> Add to Basket</a>
        <script>
            function redirr() {
                window.location = "/SimpleWebsite/backend/basket_addition.php"
            }
        </script>
    </div>
</section>
<script src="../index.js"></script>
<script>
    function loadColumns() {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const indexContent = xhr.responseText;

                const tempContainer = document.createElement('div');
                tempContainer.innerHTML = indexContent;

                const indexRow = tempContainer.querySelector('.row');

                const categoryRow = document.querySelector('.row');
                if (indexRow) {
                    const clonedRow = indexRow.cloneNode(true);
                    categoryRow.appendChild(clonedRow);
                }
            }
        };

        xhr.open('GET', 'sanyatestit.php', true);
        xhr.send();
    }

    loadColumns();
</script>
</body>
</html>