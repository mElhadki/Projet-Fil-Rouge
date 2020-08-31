<?php
include('../app/database/connect.php');
include('../app/database/db.php');
include('../app/helpers/validateUser.php');
include('../app/controllers/users.php');
include('../app/controllers/category.php');
include('../app/controllers/product.php');
include('../app/controllers/cart.php'); 
if(isset($_SESSION['idU'])){
  header('location:index.php');
  $_SESSION['message'] = 'You already connected to your account !';
  $_SESSION['type'] = 'error';
  exit();
}
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
  <link rel="stylesheet" href="../assets/css/Login-reg.css">
  <script src="https://use.fontawesome.com/c18f659ca0.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <title>Account</title>
</head>

<body>
  <!--.nav-collapse -->
  <nav class="navbar navbar-default">
    <div class="container"">
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
          <li><a class="active"  href="store.php?store=true&page=1">Store</a></li>

          <?php foreach ($navbar_categories as $category) : ?>
            <li><a href="category_page.php?categoryId=<?php echo $category['idC'] ?>&page=1">
            <?php echo $category['nameCategory'] ?></a>
          </li>

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
  

  <div class="container"  style="display: flex; justify-content:center" >
  <?php include('../app/helpers/messageSuccess.php') ?>

  <div class="form-wrap">
		<div class="tabs">
			<h3 class="signup-tab"><a class="active" href="#signup-tab-content"> Sign Up</a></h3>
			<h3 class="login-tab"><a href="#login-tab-content">Login</a></h3>
		</div><!--.tabs-->

		<div class="tabs-content">
			<div id="signup-tab-content" class="active">
      
         <?php include('../app/helpers/flashmessage.php') ?>
				<form class="signup-form" action="" method="post">
               
                    <input type="text" class="input" name="fullname" id="user_name" autocomplete="off" placeholder="full name">
					          <input type="email" class="input" name="email" id="user_email" autocomplete="off" placeholder="Email">
                    <input type="password" class="input" name="password" id="user_pass" autocomplete="off" placeholder="Password">
                    <input type="text" class="input" name="phone_number" id="user_Phone" autocomplete="off" placeholder="Phone Number">
					          <input type="submit" class="button"  name="register" value="Sign Up">
				</form><!--.login-form-->
				<div class="help-text">
					<p>By signing up, you agree to our</p>
					<p><a href="terms.php">Terms of service</a></p>
				</div><!--.help-text-->
			</div><!--.signup-tab-content-->

			<div id="login-tab-content">
      <?php
        if (isset($_POST['login'])) {
            if (count($errorLogin) > 0) : ?>

             <script>
               document.getElementById("login-tab").click();
             </script>
               
                <div class="alert alert-danger">
                    <?php foreach ($errorLogin as $error) : ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </div>
               
        <?php endif;
        } ?>
				<form class="login-form" action="login-reg.php" method="post"><br/>
					<input type="text" name="email" class="input" id="user_login" autocomplete="off" placeholder="Your Email"><br/>
					<input type="password" name="password" class="input" id="user_pass" autocomplete="off" placeholder="Password"><br/><br/>
					<input type="submit"  name="login" class="button" value="Login">
				</form>
        <div class="help-text">
					<p><a href="forgotPass.php">Reset your password</a></p>
				</div><!--.help-text--><!--.login-form-->
			</div><!--.login-tab-content-->
		</div><!--.tabs-content-->
    </div><!--.form-wrap-->
    </div>

   

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  <script>
      jQuery(document).ready(function($) {
	tab = $('.tabs h3 a');

	tab.on('click', function(event) {
		event.preventDefault();
		tab.removeClass('active');
		$(this).addClass('active');

		tab_content = $(this).attr('href');
		$('div[id$="tab-content"]').removeClass('active');
		$(tab_content).addClass('active');
	});
  <?php
        if (isset($_POST['login'])) {
            if (count($errorLogin) > 0) : ?>

        tab.click();
               
        <?php endif;
        } ?>
});

</script>

<?php include_once ('footer.php') ?>
  </body>

</html>