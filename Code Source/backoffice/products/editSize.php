<?php
include('../../app/models/connect.php');
include('../../app/models/db.php');
include('../../app/controllers/middleware.php');
adminOnly();
include('../../app/helpers/validateSizeList.php');
include('../../app/controllers/product.php');

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
    <title>Edit size</title>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">Edit size of <?php echo  "'"  . $sizename . "'"  ?></h1>
        <?php include('../../app/helpers/flashmessage.php'); ?>
        <a name="" id="" class="btn btn-primary" href="manageSize.php" role="button">Back to product</a>
        <form method="post" action="">
            <input type="hidden" name="idSize" value="<?php echo $_GET['editSizeId'] ?>">
            <div class="form-group">
                <label for="my-input">name size</label>
                <input id="my-input" class="form-control" value="<?php echo $sizename ?>" type="text" name="nameSize">
            </div>
            <button type="submit" name="editSize" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>