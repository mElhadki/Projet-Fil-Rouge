<?php
include('../path.php');
include(ROOT_PATH .'/app/database/connect.php');
include(ROOT_PATH .'/app/database/db.php');
include(ROOT_PATH .'/app/controllers/middleware.php');
showCheckout();
include(ROOT_PATH .'/app/controllers/category.php');
include(ROOT_PATH .'/app/controllers/product.php');
include(ROOT_PATH .'/app/controllers/cart.php');
include(ROOT_PATH .'/app/helpers/validateCheckout.php');
include(ROOT_PATH .'/app/controllers/orders.php');
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
  <link rel="stylesheet" href="../assets/css/checkout.css">
  <script src="https://use.fontawesome.com/c18f659ca0.js"></script>
  <title>Checkout</title>
  <style>li{list-style: none;}</style>
</head>

<body>
  <!--.nav-collapse -->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
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
          <li><a href="store.php?store=true&page=1">Store</a></li>

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
          <li><a href="cart2.php" class="active">
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

  <div id="container" class="container">
    <h3 class="h3" style="padding-bottom:30px;">
      <a href="index.php">Home</a>
      &nbsp; / &nbsp; <a href="cart2.php">My Shopping Cart</a>
      &nbsp; / &nbsp; Checkout
    </h3>
    <?php include('../app/helpers/flashmessage.php') ?>
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
        </h4>
        <ul class="list-group mb-3">
          <?php
                    $total = 0.00;
                    foreach ($cardOfProductCart as  $pcart) :
                        $nameProduct = $crud->selectOne('product', ['idP' => $pcart['idP']]);
                        $total = $total + ($nameProduct['Price'] * $pcart['qte']);
                       
                    ?>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0"><?php echo $nameProduct['nameProduct'] . ' X ' . $pcart['qte'] ?></h6>
            </div>
            <span class="text-muted">$ <?php echo $nameProduct['Price'] * $pcart['qte'] ?></span>
          </li>
          <?php endforeach; ?>

          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$ <?php echo $total ?> </strong>
          </li>
        </ul>
      </div>
     
      <div class="col-md-8 order-md-1">
     
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" method="post">
          <input type="hidden" name="idP">
          <input type="hidden" name="orderNumber" value="">
          <input type="hidden" name="qte">
          <input type="hidden" name="status" value="pending">
          <div class="row"><br />
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" name="firstname" id="firstName" placeholder="" value=""
                >
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" name="lastname" id="lastName" placeholder="" value="" >
            </div>
          </div>


          <div class="mb-3"><br />
            <label for="email">Email <span class="text-muted"></span></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" >
          </div><br />

          <div class="mb-3"><br />
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" >
          </div><br />

          <div class="mb-3">
              <label for="zip">Zip</label>
              <input type="text" class="form-control" name="zip" id="zip" placeholder="ex: 40000" >
            </div>
          <div class="row"><br />
            <div class="col-md-6 mb-3">
              <label>State</label>
              <input type="hidden" name="country" id="countryId" value="MA" />
              <select class="states order-alpha" name="state" id="stateId">
                <option value="">Select State</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">City</label>
              <select name="city" class="cities order-alpha" id="cityId">
              <option value="">Select City</option>
              </select>

            </div>
          </div>


          <div class="mb-3"><br />
            <label for="number">Phone numbe</label>
            <input type="text" class="form-control" name="phone_number" id="address" placeholder="06 XX XX XX XX" >
          </div><br />

          <hr class="mb-4">
          <h4 class="mb-3">Payment</h4>
          <div class="d-block my-3">

            <div class="custom-control custom-radio">
              <input id="debit" name="cod" type="radio" class="custom-control-input" checked>
              <label class="custom-control-label" for="debit">Cash on delivery</label>
            </div><br />
            <!-- <div class="custom-control custom-radio">
              <input id="paypal" name="paypal" type="radio" class="custom-control-input">
              <label class="custom-control-label" for="paypal">PayPal</label>
            </div> -->
          </div>
      </div>
      <hr class="mb-4">
      <br /><br /><button id="checkout" class="btn btn-primary btn-lg btn-block sendButton" name="checkout" type="submit">Place
        Your Order</button>
      </form>
    </div>

  </div>

  </div>

  <?php include ('footer.php') ?>
  <script>
    $(document).ready(function () {
      $('input[type=radio]').change(function () {
        // When any radio button on the page is selected,
        // then deselect all other radio buttons.
        $('input[type=radio]:checked').not(this).prop('checked', false);
      });
    });​
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//geodata.solutions/includes/statecity.js"></script>
  <script>
    $(document).ready(function () {
      $("input[type=radio]").prop("checked", false);
      $("input[type=radio]:first").prop("checked", true);

      $("input[type=radio]").click(function (event) {
        $("input[type=radio]").prop("checked", false);
        $(this).prop("checked", true);

        //event.preventDefault();
      });
    });
  </script>
</body>

</html>