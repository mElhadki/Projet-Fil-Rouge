<?php
include('../app/database/connect.php');
include('../app/database/db.php');
include('../app/controllers/category.php');
include('../app/controllers/product.php');
include('../app/controllers/cart.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Store.css">
    <script src="https://use.fontawesome.com/c18f659ca0.js"></script>
   <link href="https://fonts.googleapis.com/css?family=ABeeZee|Varela+Round" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <title>FAQ</title>
    <style>
        .c-faq__answer {
  position: absolute;
  opacity: 0;
  z-index: -1;
}

body {
  box-sizing: border-box;
  color: #333;
 
}

.container {
  max-width: 1100px;
  margin-left: auto;
  margin-right: auto;
}

.section__headline {
  font-family: "Varela Round", sans-serif;
  font-size: 62px;
  font-weight: light;
  color: #FBAE32;
  padding-left: 15px;
  padding-top: 30px;
}

.c-faqs__headline {
  font-family: "Varela Round", sans-serif;
  text-align: left;
  padding-left: 15px;
  font-size: 1.5em;
  margin-top: 1.5em;
  font-weight: bold;
}

.c-faqs {
  margin: 15px 0;
  padding: 0 15px;
  border-top: 1px solid transparent;
  border-bottom: 1px solid transparent;
}

.c-faq {
  font-family: "Varela Round", sans-serif;
  list-style: none;
  margin: 10px 0 5px;
}

.c-faq__title {
  cursor: pointer;
  font-weight: 500;
  z-index: 10;
  position: relative;
  font-size: 1.1em;
}
.c-faq__title:hover {
  text-decoration: underline;
}
.c-faq__title::after {
  white-space: nowrap;
  font-weight: 300;
  padding-left: 5px;
  opacity: 0;
  transform-origin: 11px;
  transform: rotateZ(90deg);
  display: none;
  content: ">";
}

.c-faq--active .c-faq__title {
  color: #FBAE32;
}
.c-faq--active .c-faq__title::after {
  opacity: 1;
  transform: rotateZ(90deg);
  display: inline-block;
}

.c-faq__answer {
  font-weight: normal;
  margin-top: -10%;
  transition: all 0.1s;
  z-index: 1;
  font-size: 0.9em;
  color: #505050;
}

.c-faq--active .c-faq__answer {
  opacity: 1;
  position: relative;
  top: 0;
  left: 0;
  font-weight: 300;
  margin-top: 5px;
  margin-bottom: 10px;
  transition: all 0.2s;
  border-radius: 3px;
  border: 1px solid #f1f2f3;
  border-top: 1px solid #1e88e5;
  padding: 20px;
}

@media (min-width: 780px) {
  .c-faqs {
    position: relative;
    margin-left: auto;
    margin-right: auto;
    height: auto;
  }

  .c-faqs::before {
    opacity: 0.2;
  }

  .c-faq {
    margin-top: 15px;
    margin-bottom: 15px;
  }
  .c-faq .c-faq__title {
    width: 50%;
    padding-right: 40px;
    display: inline-block;
  }
  .c-faq .c-faq__title::after {
    display: none;
  }
  .c-faq .c-faq__answer {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
    left: 50%;
    width: 50%;
    border-left-color: #FBAE32;
    border-top-color: #f1f2f3;
  }
}
.c-note {
  font-size: 0.8em;
  padding-left: 15px;
  opacity: 0.5;
  -webkit-transition: opacity 0.2s ease-in-out;
  transition: opacity 0.2s ease-in-out;
}
.c-note:hover {
  opacity: 1;
  -webkit-transition: opacity 0.2s ease-in-out;
  transition: opacity 0.2s ease-in-out;
}
.c-note a {
  color: #1e88e5;
}
</style>
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
          <li><a class="active"  href="#">Store</a></li>

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


<div class="container">
  <h1 class="section__headline"  style="margin-top: 150px;">FAQs</h1>
  <h2 class="c-faqs__headline">Purchasing Maria-Shop</h2>
  <ul class="c-faqs">
    <li class="c-faq c-faq--active">
      <span class="c-faq__title">How can I order ?</span>
      <div class="c-faq__answer">
      You can order at any time by going <a href="store.php?store=true&page=1">here.</a><br/>
      there's two payement methode : Paypal and Cash on delivery.<br/>
      Please be aware that some orders are held for payment review and require manual approval. Our sales department reviews those orders during our business hours.
      </div>
    </li>
    <li class="c-faq">
      <span class="c-faq__title">When will my order ship ?</span>
      <div class="c-faq__answer">All orders ship within 1-2 business days from the date of your order confirmation. All orders received before 12pm EST will be processed same day; any orders placed after 12pm EST will be processed on the following business day. Orders placed Friday after 12pm EST will ship the following Monday.</div>
    </li>
    <li class="c-faq">
      <span class="c-faq__title">What is your return and exchange policy ?</span>
      <div class="c-faq__answer"> All orders must be returned within 30 days of purchase for a full refund. Returned items must be in the exact same condition as they were received.<br/>
        At this time, we do not accept exchanges.</br>
       Items indicated as “Final Sale” at the time of purchase are not eligible for return, exchange or merchandise credit.</div>
    </li>
  </ul>  <!-- /end c-faqs -->
  
    <h2 class="c-faqs__headline">Order Shipping</h2>
  <ul class="c-faqs">
    <li class="c-faq">
      <span class="c-faq__title">Shipping</span>
      <div class="c-faq__answer">We offer free ground shipping on all domestic orders. Orders are shipped on business days only. Business days are Monday-Friday, excluding holidays. Price will be calculated at checkout based on your order’s size and weight.</div>
    </li>
    <li class="c-faq">
      <span class="c-faq__title">Shipping Rates and Delivery Estimates?</span>
      <div class="c-faq__answer">
      All shipping rates are listed in American dollar. All duties, customs and taxes incurred when items are shipped internationally are the responsibility of the customer. Maria-Shop does not mark down the value of items, nor do we mark items as "gift". If you have any inquiries regarding duties, customs and taxes in your country, contact your local customs office. 
</div>
    </li>
  </ul>  <!-- /end c-faqs -->
  
    <h2 class="c-faqs__headline">Order information and concerns</h2>
  <ul class="c-faqs">
    <li class="c-faq">
      <span class="c-faq__title">I need to change something on my order. How can I do that ?</span>
      <div class="c-faq__answer">If you need to change or cancel your order, please <a href="ContactUs.php">contact us</a> immediately. Once our warehouse has processed your order, we will be unable to make any changes.

</div>
    </li>
    <li class="c-faq">
      <span class="c-faq__title">Why was my order canceled ?</span>
      <div class="c-faq__answer">If your order was unexpectedly cancelled, chances are that our fraud filter marked your order as fraudulent.</div>
    </li>
    <li class="c-faq">
      <span class="c-faq__title">Do I need an account to make an order?</span>
      <div class="c-faq__answer">Of course, Signing up for an account is necessary to make an order.</div>
    </li>
  </ul>  <!-- /end c-faqs -->
</div>

<script>
    $('body').delegate('.c-faq', 'click', function(){
  $('.c-faq').removeClass('c-faq--active');
  $(this).addClass('c-faq--active');
});
</script>

<?php include ('footer.php') ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
</body>
</html>