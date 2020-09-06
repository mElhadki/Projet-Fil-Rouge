<?php
include('../app/models/connect.php');
include('../app/models/db.php');

include('../app/controllers/category.php');
include('../app/controllers/product.php');
include('../app/controllers/cart.php');
include('../app/controllers/orders.php');
// include('../app/controllers/middleware.php');
// showThankyouPage(); 
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
  <link rel="stylesheet" href="../assets/css/Store.css">
  <link rel="stylesheet" href="../assets/css/thanku.css">
  <script src="https://use.fontawesome.com/c18f659ca0.js"></script>
  <title>Thank You</title>
</head>
<body>
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
          <li><a href="index.php">Home</a></li>
          <li><a  href="http://localhost/eshop/views/store.php?store=true&page=1">Store</a></li>

          <?php foreach ($navbar_categories as $category) : ?>
            <li><a href="category_page.php?categoryId=<?php echo $category['idC'] ?>&page=1">
            <?php echo $category['nameCategory'] ?></a>
          </li>

          <?php endforeach; ?>
          <?php if(isset($_SESSION['idU'])): ?>
            <li><a href="myaccount.php">My Account</a></li>
          <?php else: ?>
            <li><a href="login-reg.php">Account</a></li>
          <?php endif; ?>          <?php if(isset($_SESSION['idU'])) :?>
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


  
	
	<div class="container MA">
		<div class="jumbotron text-center">
			<div class="checkMark">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 166 150.9"><path d="M0.3 96l62.4 54.1L165.6 0.3"/></svg>
            </div>
            <br/>
           
            <p class="lead">Thank you for Your purchase Your commande ID is #<?php echo $_GET['idOrder'] ?>!</p><br/>
            <p style="font-family: auto;">Thanks a bunch for trust in us It means a lot to us,We really appreciate you giving us a moment of your time today.</p>
			<div class="container-login100-form-btn">
				<div class="wrap-login100-form-btn">
					<div class="login100-form-bgbtn"></div>
					<a href="index.php" class="link">Go to Home</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="spacing"></div>
   <?php include ('footer.php') ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>