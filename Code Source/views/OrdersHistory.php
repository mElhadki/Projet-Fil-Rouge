<?php
include('../app/database/connect.php');
include('../app/database/db.php');
include('../app/helpers/validateUser.php');
include('../app/controllers/users.php');
include('../app/controllers/category.php');
include('../app/controllers/product.php');
include('../app/controllers/cart.php');
include('../app/controllers/orders.php');

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
  <link rel="stylesheet" href="../assets/css/MyAccount.css">
  <script src="https://use.fontawesome.com/c18f659ca0.js"></script>
  <title>My Account</title>
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
          <li><a  href="#">Store</a></li>

          <?php foreach ($navbar_categories as $category) : ?>
            <li><a href="category_page.php?categoryId=<?php echo $category['idC'] ?>&page=1">
            <?php echo $category['nameCategory'] ?></a>
          </li>

          <?php endforeach; ?>
          <?php if(isset($_SESSION['idU'])): ?>
            <li><a class="active" href="myaccount.php">My Account</a></li>
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

  <div class="container">
  <div class="navVertical">
  <div class="M-Account">
  <ul class="nn">
  <li><a href="myaccount.php">Dashboard <span class="arrow">»</span></a></li>
  <li><a class="active" href="OrdersHistory.php">Orders <span class="arrow">»</span></a></li>
  <li><a href="AccountDetail.php"> Account details <span class="arrow">»</span></a></li>
  <li><a  href="../app/controllers/logout.php"> Logout <span class="arrow">»</span></a></li>
</ul>
  </div>


<div class="container-fluid">

<div class="row">
  <!-- table container -->
  <div class="col-sm-9">

    <table class="table table-striped table-hover table-responsive">
      <thead>
        <tr>
          <th>Order Number</th>
          <th>Status</th>
          <th class="align-right">Price</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php
       $totalPrice = 0;
      foreach($orderUserGroup as $order): ?>
        <tr>
          <td class="valign-middle" data-label="Order Number">
            <a href="#">#<?php echo $order['orderNumber'] ?></a>
          </td>
          <td class="valign-middle" data-label="Status">
          <?php echo $order['status'] ?>
          </td>
          <td class="valign-middle align-right" data-label="Price">
            <?php  $calcPrice = $crud->selectAll('orders', ['orderNumber' => $order['orderNumber']]);
            foreach($calcPrice as $price){
              $totalPrice = $totalPrice  + $price['price'];
            }
           
            echo $totalPrice; ?> $
          </td>
          <td class="valign-middle align-right">
            <a class="btn btn-default" href="OrdersHistory.php?invoice=<?php echo $order['orderNumber'] ?>" data-toggle="tooltip" title="View" data-placement="bottom" data-trigger="hover">
              <i class="fa fa-eye"></i>
              <span class="visible-xs">View</span>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
      <?php 
     
      foreach($orderUserOne as $order): ?>
        <tr>
          <td class="valign-middle" data-label="Order Number">
            <a href="#">#<?php echo $order['orderNumber'] ?></a>
          </td>
          <td class="valign-middle" data-label="Status">
          <?php echo $order['status'] ?>
          </td>
          <td class="valign-middle align-right" data-label="Price">
          <?php echo $order['price']?> $
          </td>
          <td class="valign-middle align-right">
            <a class="btn btn-default" href="OrdersHistory.php?invoice=<?php echo $order['orderNumber']?>" data-toggle="tooltip" title="View" data-placement="bottom" data-trigger="hover">
              <i class="fa fa-eye"></i>
              <span class="visible-xs">View</span>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>

  </div>


</div>
</div>
</div>
</div>
  <?php include_once ('footer.php') ?>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
</body>
</html>