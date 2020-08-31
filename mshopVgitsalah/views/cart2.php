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
    <title>Document</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <div class="container">
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
                                    <a href="index.php">
                                        <button type="button" class="btn btn-primary btn-sm btn-block">
                                            <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
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
                                        <input type="number" min="1" class="form-control input-sm" name="qte"
                                            value="<?php echo $dataCart['qte'] ?>">
                                    </div>
                                    <div class="col-xs-2">
                                        <a
                                            href="cart2.php?del_id=<?php echo $dataCart['idCart']; ?>">
                                            <button type="button" class="btn btn-link btn-xs">
                                                <span class="glyphicon glyphicon-trash"> </span>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-xs-2">

                                        <button type="submit" name="updateCart" class="btn btn-link btn-xs">
                                            <span class="glyphicon glyphicon-log-in"> </span>
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
                                    <input value="Checkout" name="checkout" class="btn btn-success btn-block">
                                </a>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



</body>

</html>