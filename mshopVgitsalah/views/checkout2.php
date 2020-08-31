<?php
include('../path.php');
include(ROOT_PATH .'/app/database/connect.php');
include(ROOT_PATH .'/app/database/db.php');
include(ROOT_PATH .'/app/controllers/middleware.php');
showCheckout();
include(ROOT_PATH .'/app/controllers/category.php');
include(ROOT_PATH .'/app/controllers/product.php');
include(ROOT_PATH .'/app/controllers/cart.php');
include(ROOT_PATH .'/app/controllers/orders.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Title</title>
</head>

<body>
    <!-- Navbar -->
  
    <!-- Navbar -->
    <div class="container">
        <div class="py-5 text-center">
            <h2>Checkout form</h2>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill"><?php ?></span>
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
                <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" name="firstname" id="firstName" placeholder="" value="" >
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" name="lastname" id="lastName" placeholder="" value="" >
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted"></span></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" >
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" >
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>



                    <div class="row">
                        <!-- <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" name="country" id="country" >
                                <option value="">Choose...</option>
                                <option value="United States">United States</option>
                                <option value="Morocco">Morocco</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div> -->

                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" name="zip" id="zip" placeholder="" >
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>

                    <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">

                        <div class="custom-control custom-radio">
                            <input id="debit" name="payment" type="radio" class="custom-control-input" checked>
                            <label class="custom-control-label" for="debit">Cash on delivery</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paypal" type="radio" class="custom-control-input">
                            <label class="custom-control-label" for="paypal">PayPal</label>
                        </div>
                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" name="checkout" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; ESHOP+</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
    <script>
        $(document).ready(function() {
            $('input[type=radio]').change(function() {
                // When any radio button on the page is selected,
                // then deselect all other radio buttons.
                $('input[type=radio]:checked').not(this).prop('checked', false);
            });
        });​
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").prop("checked", false);
            $("input[type=radio]:first").prop("checked", true);

            $("input[type=radio]").click(function(event) {
                $("input[type=radio]").prop("checked", false);
                $(this).prop("checked", true);

                //event.preventDefault();
            });
        });
    </script>
</body>

</html>