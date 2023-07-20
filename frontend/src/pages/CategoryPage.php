<!DOCTYPE html>
<html lang="ru">
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
                        <a class="popup__button" style="margin: 0;" id="add_to_basket" onclick="increaseSort()" href="Javascript:void(0)"> Increase</a>
                        <a class="popup__button" style="margin: 0;" id="add_to_basket" onclick="decreaseSort()" href="Javascript:void(0)"> Decrease</a>
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
        <div class="row" id="columnContainer"></div>
        <!--                <div class="col-md-3 col-sm-6">-->
        <!--                    <div class="protien" data-img="../images/pro1.png">-->
        <!--                        <figure><img src="../images/pro1.png" alt="#"/></figure>-->
        <!--                        <h3>$400</h3>-->
        <!--                        <span> Variations  </span>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-md-3 col-sm-6">-->
        <!--                    <div class="protien" data-img="../images/pro2.png">-->
        <!--                        <figure><img src="../images/pro2.png" alt="#"/></figure>-->
        <!--                        <h3>$401</h3>-->
        <!--                        <span>  Passages  </span>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-md-3 col-sm-6">-->
        <!--                    <div class="protien" data-img="../images/pro3.png">-->
        <!--                        <figure><img src="../images/pro3.png" alt="#"/></figure>-->
        <!--                        <h3>$4010</h3>-->
        <!--                        <span> Protein </span>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-md-3 col-sm-6">-->
        <!--                    <div class="protien" data-img="../images/pro4.png">-->
        <!--                        <figure><img src="../images/pro4.png" alt="#"/></figure>-->
        <!--                        <h3>$400</h3>-->
        <!--                        <span> Pedicure </span>-->
        <!--                    </div>-->
        <!--                </div>-->
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