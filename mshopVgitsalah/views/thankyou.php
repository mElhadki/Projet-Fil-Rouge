<?php
include('../app/database/connect.php');
include('../app/database/db.php');

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
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Thank you for ur purchase ur commande ID is #<?php echo $_GET['idOrder'] ?> !</h1>
    </div>
    <a name="" id="" class="btn btn-primary" href="index.php" role="button">Continue shopping</a>
</div>
<?php ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>