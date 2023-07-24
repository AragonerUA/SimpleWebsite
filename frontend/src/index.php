<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Protein Shop</title>
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">

      <link rel="stylesheet" href="css/style.css">
   </head>
   <!-- body -->
   <body class="main-layout">
      <div id="myNav" class="menu_sid">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
         <div class="menu_sid-content">
            <a href="#login" onclick="login()">Login</a>
             <a href="#login" onclick="openCategoryPage()">Category Page</a>
            <a href="#protien">Our Protien</a>
            <a href="#about">About Us</a>
            <a href="#testimonial">Testimonial</a>
            <a href="#contact">Contact Us</a>
         </div>
      </div>
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
         <div class="menu_sitbar">
            <ul class="menu">
               <li>
                  <a style="cursor: pointer">
                     <img onclick="openNav()" src="./images/menu_icon.png" alt="#"/>
                  </a>
               </li>
               <li>
                  <a style="cursor: pointer" onclick="openProfile()">
                     <img style="height: 100%; margin-top: 10px;"  src="./images/free-icon-user-profile-2651994.png" alt="#"/>
                  </a>
               </li>
               <li>
                  <a onclick="openBasket()" style="cursor: pointer; width: 37px; height: 100%">
                     <svg style="margin-top: 10px" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                     </svg>
                  </a>
               </li>
            </ul>
            <ul class="social_icon">
               <li><a href="javascript:void(0)"><i class="mi fa fa-facebook" aria-hidden="true"></i></a></li>
               <li><a href="javascript:void(0)"><i class="mi fa fa-twitter" aria-hidden="true"></i></a></li>
               <li><a href="javascript:void(0)"><i class="mi fa fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
         </div>
         <div class="header_full_bg">
            <div class="header_top">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="logo">
                           <a href="index.php"><img src="./images/logo.png" alt="#"/></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="banner">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-5">
                        <div class="banner_text">
                           <h1>Pro<br> Body Builder Protien</h1>
                           <a class="get_btn" href="#about" role="button">About Protien</a>
                        </div>
                     </div>
                     <div class="col-md-7">
                        <img class="bann_img" src="./images/banner_ing.png"  alt="#"/>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- our protien  -->
      <div id="protien" class="protien_main">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Protien</h2>
                  </div>
               </div>
            </div>
            <div class="row">
                <?php
                require "../../backend/open_connection.php";
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
      <!-- end our protien  -->
      <!-- about -->
      <div id="about" class="about">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-6">
                  <div class="titlepage">
                     <h2>About Us</h2>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or</p>
                  </div>
               </div>
               <div class="col-md-6 pad_right0">
                  <div class="about_img ">
                     <figure><img src="./images/about.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
      <!-- growyhing -->
      <div class="growyhing">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-6">
                  <div class="body_img">
                     <figure><img src="./images/body.png" align="#"/></figure>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="titlepage">
                     <h2>Growyhing Your Body From Protien</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end growyhing -->
      <!-- testimonial -->
      <div id="testimonial" class="testimonial">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Testimonial</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-5">
                  <div class="body_blu_img">
                     <figure><img src="./images/tesr.png" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-7 pad_right0">
                  <div class="testimo_ban_bg">
                     <div id="testimo" class="carousel slide testimo_ban" data-ride="carousel">
                        <ol class="carousel-indicators">
                           <li data-target="#testimo" data-slide-to="0" class="active"></li>
                           <li data-target="#testimo" data-slide-to="1"></li>
                           <li data-target="#testimo" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                           <div class="carousel-item active">
                              <div class="container">
                                 <div class="carousel-caption relative2">
                                    <div class="row d_flex">
                                       <div class="col-md-11">
                                          <i><img src="./images/costu.png" alt="#"/></i>
                                          <span>Consectetur</span>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end testimonial -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="daih_bg">
               <div class="container">
                  <div class="row">
                     <div class="col-sm-12">
                        <ul class="conta">
                           <li><i class="fa fa-phone" aria-hidden="true"></i> Call Now  +01 123467890</li>
                           <li><i class="fa fa-map-marker" aria-hidden="true"></i> Location</li>
                           <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> demo@gmail.com</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <img class="tex_left" src="images/logo2.png" alt="#"/>
                  </div>
                  <div class=" col-md-3 col-sm-6">
                     <p class="variat">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim Lorem ipsum </p>
                  </div>
                  <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                     <h3>Information  </h3>
                     <ul class="link_menu">
                        <li> There are many </li>
                        <li> variations of pas</li>
                        <li> sages of Lorem </li>
                        <li> Ipsum available, </li>
                        <li>but the majority </li>
                        <li>have suffered  </li>
                     </ul>
                  </div>
                  <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                     <h3>Helpful Links</h3>
                     <ul class="link_menu">
                        <li> There are many </li>
                        <li> variations of pas</li>
                        <li> sages of Lorem </li>
                        <li> Ipsum available, </li>
                        <li>but the majority </li>
                        <li>have suffered  </li>
                     </ul>
                  </div>
                  <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                     <h3>Supported</h3>
                     <ul class="link_menu">
                        <li> There are many </li>
                        <li> variations of pas</li>
                        <li> sages of Lorem </li>
                        <li> Ipsum available, </li>
                        <li>but the majority </li>
                        <li>have suffered  </li>
                     </ul>
                  </div>
                  <div class="col-sm-12" style="padding-bottom: 30px">
                     <ul class="social2_icon">
                        <li><a href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <section class="popup">
         <div class="popup__block">
            <button type="button" class="popup__close"></button>
            <div class="popup__content">
               <img class="popup__image" alt="#"/>
               <div class="popup__description">
                  <h3 id="popup_price">Price: $400</h3>
                  <h2 id="popup_name">Name: Passages  </h2>
                  <h3 id="popup_description" class="description">Description: <br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim Lorem ipsum</h3>
               </div>
            </div>
            <div>
               <a class="read_more popup__button" id="add_to_basket" onclick="redirr()" href="Javascript:void(0)"> Add to Basket</a>
             <script>
                 function redirr() {
                     window.location = "/SimpleWebsite/backend/basket_addition.php?product_id=" + window.current_product
                 }
             </script>
         </div>
      </section>
      <script src="./index.js"></script>
   </body>
</html>
