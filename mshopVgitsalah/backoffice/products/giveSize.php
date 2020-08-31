<?php
include('../../app/database/connect.php');
include('../../app/database/db.php');
include('../../app/controllers/middleware.php');
adminOnly();
include('../../app/helpers/validateSize.php');
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
    <title>Give size product</title>
</head>

<body>

    <div class="container">
        <?php include('../../app/helpers/flashmessage.php'); ?>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Back to product</a>
        <table class="table table-dark">
            <h1 style="text-align: center;">Add size</h1>
            <tbody>
                <th>Name size</th>
                <th>Adding</th>



                <?php foreach ($manage_sizes as $sizes) :


                ?>

                    <tr>
                        <form action="" method="post">
                            <input type="hidden" name="idP" value="<?php echo $_GET['idProductSize'] ?>">
                            <input type="hidden" name="idSize" value="<?php echo $sizes['idSize'] ?>">
                            <td><?php echo $sizes['nameSize'] ?></td>
                            <td>

                                <button type="submit" class='btn btn-primary' name="addProductSize">Add to stock</button>

                            </td>
                        </form>
                    </tr>

                <?php endforeach; ?>
                <?php


                ?>
            </tbody>
        </table>
    </div>

    <div class="container">
        <h1 style="text-align: center;">Edit size already exist</h1>

        <table class="table table-dark">
            <tbody>
                <th>Name size</th>
                <th>delete</th>
                <?php $sizeManageProduct = $crud->selectAll('size_product', ['idP' => $_GET['idProductSize']]);
                ?>
                <?php foreach ($sizeManageProduct as $sizes) : ?>
                    <?php

                    $idPS = $sizes['idPS'];
                    $nameSizeP = $crud->selectAll('size', ['idSize' => $sizes['idSize']]);
                    ?>
                    <?php foreach ($nameSizeP as $name) : ?>
                        <tr>
                            <td><?php echo $name['nameSize']  ?></td>
                            <td><a name="" id="" class="btn btn-danger" href="giveSize.php?id_ps_del=<?php echo $idPS ?>&idProduit=<?php echo $_GET['idProductSize'] ?>" role="button">Out stock</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>












    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>