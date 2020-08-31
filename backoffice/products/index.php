<?php
include('../../app/database/connect.php');
include('../../app/database/db.php');
include('../../app/controllers/middleware.php');
adminOnly();
include('../../app/helpers/validateProduct.php');
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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <title>Manage product</title>
    <style>
        #wrapper {
            overflow-x: hidden;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            -webkit-transition: margin .25s ease-out;
            -moz-transition: margin .25s ease-out;
            -o-transition: margin .25s ease-out;
            transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
            width: 15rem;
        }

        #page-content-wrapper {
            min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: 0;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15rem;
            }
        }
    </style>
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-dark border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-light">Maria shop </div>
            <div class="list-group list-group-flush">
                <a href="../dashboard.php" class="list-group-item list-group-item-action bg-dark text-primary">Dashboard</a>
                <a href="../category" class="list-group-item list-group-item-action bg-dark text-primary">Categories</a>
                <a href="" class="list-group-item list-group-item-action bg-dark active">Products</a>
                <a href="../orders" class="list-group-item list-group-item-action bg-dark text-primary">orders</a>
                <a href="../users" class="list-group-item list-group-item-action bg-dark text-primary">Users</a>
                <a href="../livechat" class="list-group-item list-group-item-action bg-dark text-primary">LIVE CHAT</a>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <?php include('../../app/includes/headAdmin.php');
            include('../../app/helpers/messageSuccess.php');
            ?>

            <div class="container">
                <h1 style="text-align: center;">List Product</h1>
                <a name="" id="" class="btn btn-primary" href="create.php" role="button">Add product</a>
                <a name="" id="" class="btn btn-primary" href="manageSize.php" role="button">Manage Sizes</a>
                <table class="table table-light" style="width: 104%;" id="table">
                    <tbody>
                        <tr>
                            <th>Image</th>
                            <th>name</th>
                            <th>price</th>
                            <th>quantity</th>
                            <th style="cursor: pointer;" onclick="sortCategory()">Category <i class="fa fa-sort"></i>
</th>
                            <th>sizes</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($showing_product as $product) : ?>
                            <?php $nameC = $crud->selectOne('category', ['idC' => $product['idC']]) ?>
                            <tr class="trow">
                                <td>
                                    <img src="../../assets/img/<?php echo $product['Image'] ?>" style="width: 95px;" alt="">
                                    <img src="../../assets/img/<?php echo $product['Image2'] ?>" style="width: 95px;" alt="">
                                    
                                </td>
                                <td style="font-family: poppins;font-weight:bold;font-size:30px"><?php echo $product['nameProduct']; ?> </td>
                                <td><?php echo $product['Price'] ?> $</td>
                                <td><?php
                                // $classOrder = new Order();
                                // $qteInOrder = $crud->selectAll('orders', ['idP' => $product['idP'], ['calculated' == 0]]);
                                // foreach($qteInOrder as $newQte):
                                // $product['Qte'] = ($product['Qte'] - $newQte['qte']);
                                // $newQte['calculated'] = 1;
                                // $classOrder->updateCalculated($newQte['idOrder']);
                                // endforeach;
                                // $crud->update('product', $product['idP'], $product, 'idP');
                                
                                echo $product['Qte'] ?> unt</td>
                                <td><?php echo $nameC['nameCategory'] ?></td>
                                <td><?php $sizeManageProduct = $crud->selectAll('size_product', ['idP' => $product['idP']]);
                                    ?>
                                    <?php foreach ($sizeManageProduct as $sizes) : ?>
                                        <?php $nameSizeP = $crud->selectAll('size', ['idSize' => $sizes['idSize']]);
                                        ?>
                                        <?php foreach ($nameSizeP as $name) : ?>
                                            <?php echo  ' | ' . $name['nameSize']  ?>
                                        <?php endforeach; ?>
                                        <?php endforeach; ?>|</td>
                                <td>
                                    <a name="" id="" class="btn btn-success" href="giveSize.php?idProductSize=<?php echo $product['idP'] ?>" role="button">Sizes</a>
                                    <a name="" id="" class="btn btn-success ml-10" href="edit.php?idModPr=<?php echo $product['idP'] ?>" role="button">edit</a>
                                    <a name="" id="" class="btn  btn-danger" href="index.php?del_pr=<?php echo $product['idP'] ?>" role="button">delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script>
        function sortCategory() {
            w3.sortHTML('#table', '.trow', 'td:nth-child(5)')
        }
    </script>
    <script src="https://www.w3schools.com/lib/w3.js"></script>















</body>

</html>