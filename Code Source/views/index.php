<?php
include('../app/models/connect.php');
include('../app/models/db.php');
include('../app/controllers/category.php');
include('../app/controllers/product.php');
include('../app/controllers/cart.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Enter your description here" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <link rel="stylesheet" href="../assets/css/index.css">

  <script src="https://use.fontawesome.com/c18f659ca0.js"></script>

  <title>index</title>

</head>

<body>
  <!--.background-overlay-->
  <div class="background-overlay"></div>
  <!--/.background-overlay -->

  <!--.nav-collapse -->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img src="../assets/img/your-logo__7_-removebg-preview.png" width="200px" height="46px" alt="">
        </a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="store.php?store=true&page=1">Store</a></li>

          <?php foreach ($navbar_categories as $category) : ?>
            <li><a href="category_page.php?categoryId=<?php echo $category['idC'] ?>&page=1"><?php echo $category['nameCategory'] ?></a></li>

          <?php endforeach; ?>
          <?php if(isset($_SESSION['idU'])): ?>
            <li><a href="myaccount.php">My Account</a></li>
          <?php else: ?>
            <li><a href="login-reg.php">Account</a></li>
          <?php endif; ?>
          <li><a href="ContactUs.php">Contact Us</a></li>
          <?php if(isset($_SESSION['idU'])) :?>
          <li><a href="cart2.php">
              <div class="cart-nav nav-item-link">
                <span class="fa-shopping-cart"></span>
                <span class="nav-cart-items"><?php echo $countCart ?></span>
              </div>
            </a></li>
          <?php else: ?>
          <li><a href="cart2.php">
              <div class="cart-nav nav-item-link">
                <span class="fa-shopping-cart"></span>
                <span class="nav-cart-items">0</span>
              </div>
            </a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  <!--/.nav-collapse -->

  <!--container header-->
  <div class="image">
    <div class="container">
      <?php include('../app/helpers/messageSuccess.php') ?>
      <div class="promo-text">
        <h1 class="heading">MARIA SHOP</h1>
        <h1 class="promo">25% Off On All Products</h1>
      </div>

      <div class="btn-grp">
        <a name="" id="" class="btn btn-large btnm1" href="store.php?store=true&page=1" role="button">SHOP NOW</a>
        <a name="" id="" class="btn btn-large btnm2" href="store.php?store=true&page=1" role="button">FIND MORE</a>
      
      </div>
    </div>
  </div>
  <!--end container header-->

  <!--Logo Slide-->
  <div class="container logos">
    <div class="customer-logos">
      <div class="slide"><img src="https://raw.githubusercontent.com/solodev/infinite-carousel/master/images/image1.png"></div>
      <div class="slide"><img src="https://raw.githubusercontent.com/solodev/infinite-carousel/master/images/image2.png"></div>
      <div class="slide"><img src="https://raw.githubusercontent.com/solodev/infinite-carousel/master/images/image3.png"></div>
      <div class="slide"><img src="https://raw.githubusercontent.com/solodev/infinite-carousel/master/images/image4.png"></div>
      <div class="slide"><img src="https://raw.githubusercontent.com/solodev/infinite-carousel/master/images/image5.png"></div>
      <div class="slide"><img src="https://raw.githubusercontent.com/solodev/infinite-carousel/master/images/image6.png"></div>
      <div class="slide"><img src="https://raw.githubusercontent.com/solodev/infinite-carousel/master/images/image7.png"></div>
      <div class="slide"><img src="https://raw.githubusercontent.com/solodev/infinite-carousel/master/images/image8.png"></div>
    </div>
  </div>

  <!--/Logo Slide-->

  <!--Cards-->
  <div class="container card-shop">
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="ps1">
          <p>Amazing Stuff is here</p>
          <div class="btnShop" style="text-align:center;">
            <button class="btn btn-large btnm1">SHOP NOW</button>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="ps2">
          <p>Shop Today and now</p>
          <div class="btnShop" style="text-align:center;">
            <button class="btn btn-large btnm1">SHOP NOW</button>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="ps3">
          <p>latest amazing trends</p>
          <div class="btnShop" style="text-align:center;">
            <button class="btn btn-large btnm1">SHOP NOW</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/Cards-->

  <!-- container gris-->
  <div class="container mt-5">

    <!-- contenu-->
    <div class="Picontainer">
      <div class="container">
        <div class="promo-text" style="margin-top:150px;">
          <h1 class="promo">Spoil Yourself Today</h1>
          <h1 class="heading">Stay Home And Shop Online</h1>
        </div>
        <div class="btn-grp" style="margin-top:50px;">
          <button class="btn btn-large btnm1">BUY NOW</button>
        </div>
      </div>
    </div>
    <!-- /contenu-->

    <!-- icon box -->
    <div class="container spd-padding-top-50">
      <div class="spd-row content-101">
        <div class="col-md-3 col-sm-3 icon-box-animaiton text-center">
          <div class="icon-box">
            <i class="fa fa-globe fa-2x icons"></i>
          </div>
          <h3>Worldwide Shipping</h3>
        </div>

        <div class="col-md-3 col-sm-3 icon-box-animaiton text-center">
          <div class="icon-box">
            <i class="fa fa-star fa-2x icons"></i>
          </div>
          <h3>Best Quality</h3>
        </div>

        <div class="col-md-3 col-sm-3 icon-box-animaiton text-center">
          <div class="icon-box">
            <i class="fa fa-heart fa-2x icons"></i>
          </div>
          <h3>Best Offers</h3>
        </div>

        <div class="col-md-3 col-sm-3 icon-box-animaiton text-center">
          <div class="icon-box">
            <i class="fa fa-lock fa-2x icons"></i>
          </div>
          <h3>Secure Payments</h3>
        </div>

      </div>
    </div>
    <!-- icon box -->
  </div>
  <!-- /container gris-->
<?php include ('footer.php') ?>

  <!--Bottom Footer-->
  <!--Bottom Footer-->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

  <script>
    $(document).ready(function() {
      $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 3
          }
        }, {
          breakpoint: 520,
          settings: {
            slidesToShow: 2
          }
        }]
      });
    });
  </script>
<script>(function(d,t,u,s,e){e=d.getElementsByTagName(t)[0];s=d.createElement(t);s.src=u;s.async=1;e.parentNode.insertBefore(s,e);})(document,'script','//maria2shop.herokuapp.com/backoffice/livechat/php/app.php?widget-init.js');</script>


</body>

</html>