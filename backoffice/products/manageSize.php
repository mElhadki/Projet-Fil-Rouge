<?php
include('../../app/database/connect.php');
include('../../app/database/db.php');
include('../../app/controllers/middleware.php');
adminOnly();
include('../../app/helpers/validateProduct.php');
include('../../app/controllers/product.php');
include('../../app/controllers/sizes.php');
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
    <title>Manage Sizes</title>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">Manage sizes</h1>
        <a name="" id="" class="btn btn-primary" href="addSize.php" role="button">Add size</a>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Back to product</a>
        <?php include('../../app/helpers/messageSuccess.php') ?>
        <table class="table table-dark mt-5">
            <tbody>
                <?php foreach ($sizes as $size) : ?>
                    <tr>
                        <td>
                            <?php echo $size['nameSize'] ?>
                            <a name="" id="" class="btn btn-success ml-5" href="editSize.php?editSizeId=<?php echo $size['idSize'] ?>" role="button">edit</a>
                            <a name="" id="" class="btn btn-danger ml-5" href="manageSize.php?del_idS=<?php echo $size['idSize'] ?>" role="button">delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>