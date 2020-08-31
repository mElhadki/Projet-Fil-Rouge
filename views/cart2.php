<?php
include('../app/database/connect.php');
include('../app/database/db.php');
include('../app/controllers/middleware.php');
showCart();
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
  <link rel="stylesheet" href="../assets/css/Store.css">
  <link rel="stylesheet" href="../assets/css/cart.css">
  <script src="https://use.fontawesome.com/c18f659ca0.js"></script>
  <title>Store</title>
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
          <li><a  href="store.php?store=true&page=1">Store</a></li>

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

  <div id="Cart" class="container">
  <h3 class="h3" style="padding-bottom:30px;">
  <a href="index.php">Home</a>
      &nbsp; / &nbsp; My Shopping Cart
  </h3>
        <div class="row">
            <div class="col-xs-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                                </div>
                                <div class="col-xs-6">
                                    <a href="http://localhost/eshop/views/store.php?store=true&page=1">
                                        <button type="button" id="ShopContinue" class="btn btn-primary btn-sm btn-block">
                                            Continue shopping
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">

                        <?php
                        $total = 0.00;
                        foreach ($getCountCart as $dataCart) :
                            $productInfo = $crud->selectOne('product', ['idP' => $dataCart['idP']]);
                            $total = $total + ($productInfo['Price'] * $dataCart['qte'])
                        ?>
                        <form method="POST">
                            <input type="hidden" name="idU" value="<?php echo $_SESSION['idU'] ?>">
                            <input type="hidden" name="idCart" value="<?php echo $dataCart['idCart'] ?>">
                            <input type="hidden" name="idP" value="<?php echo $dataCart['idP'] ?>">
                            <div class="row">
                                <div class="col-xs-2">
                                    <img class="img-responsive" src="../assets/img/<?php echo $productInfo['Image'] ?>">
                                </div>
                                <div class="col-xs-4">
                                    <h4 class="product-name"><strong><?php echo $productInfo['nameProduct'] ?></strong>
                                    </h4>
                                    <h4><small>Product description</small></h4>
                                </div>
                                <div class="col-xs-6">
                                    <div class="col-xs-6 text-right">
                                        <h6><strong><?php echo $productInfo['Price'] ?><span> $</span><span
                                                    class="text-muted"> x</span></strong></h6>
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="number" min="1" placeholder="put the quantity" class="form-control input-sm" name="qte"
                                            value="<?php echo $dataCart['qte'] ?>">
                                    </div>
                                    <div class="col-xs-2">
                                        <a
                                            href="cart2.php?del_id=<?php echo $dataCart['idCart']; ?>">
                                            <button type="button" class="btn btn-link btn-xs">
                                                <span class="glyphicon glyphicon-trash"></span>&nbsp;
                                                <span style="color: #FBAE32;"><strong>Delete</strong></span>
                                            </button>
                                        </a>
                                    </div><br/>
                                    <div class="col-xs-2">
                                         
                                        <button type="submit" name="updateCart" class="btn btn-link btn-xs">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;
                                        <span style="color: #FBAE32;"><strong>Edit</strong></span>              
                                        </button>

                                    </div>
                                </div>
                            </div>
                            <hr>
                        </form>
                        <?php endforeach; ?>


                    </div>
                    <div class="panel-footer">
                        <div class="row text-center">
                            <div class="col-xs-9">
                                <h4 class="text-right">Total <strong><?php echo $total . '$' ?></strong></h4>
                            </div>
                            <div class="col-xs-3">
                                <a href="checkout2.php">
                                    
                                    <button type="button" name="checkout" id="checkout" class="btn btn-primary btn-sm btn-block">
                                    checkout
                                        </button>
                                </a>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    

    <?php include ('footer.php') ?>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>