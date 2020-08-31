<?php 
include('../../app/database/connect.php');
include('../../app/database/db.php');
include('../../app/controllers/orders.php')

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Backoffice | Orders </title>
</head>

<body>
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-dark border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-light">Maria shop </div>
            <div class="list-group list-group-flush">
                <a href="../dashboard.php"
                    class="list-group-item list-group-item-action bg-dark text-primary">Dashboard</a>
                <a href="../category" class="list-group-item list-group-item-action bg-dark text-primary">Categories</a>
                <a href="../products" class="list-group-item list-group-item-action bg-dark text-primary">Products</a>
                <a href="" class="list-group-item list-group-item-action bg-dark active">orders</a>
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
                <h1 style="text-align: center;">Manage orders</h1>
                <table class="table table-light">
                    <tbody>
                        <tr>
                            <th>Order number</th>
                            <th>Name costumer</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php 

                        foreach($allOrderBackOffice as $orders):?>
                        <tr>


                            <td><?php echo $orders['orderNumber'] ?></td>
                            <td><?php $nameUserInSite = $crud->selectOne('users', ['idU' => $orders['idU']]); echo $nameUserInSite['fullname'] ?>
                            </td>
                            <td><?php echo $orders['status'] ?></td>
                            <td>
                                <a name="" id="" class="btn btn-info"
                                    href="showOrder.php?orderNum=<?php echo $orders['orderNumber']?>" role="button">View
                                    order</a>
                                <?php
                                $statusorder = $crud->selectOne('orders', ['idOrder' => $orders['idOrder']]);
                                if($statusorder['status'] === 'pending'): ?>
                                <a name="" id="" class="btn btn-secondary"
                                    href="index.php?change_status=<?php echo $orders['orderNumber']; ?>"
                                    role="button">Send it</a>
                                <?php else: ?>
                                <a href="#" class="btn btn-warning disabled" role="button">shipped</a>
                                <?php endif; ?>
                                <?php if($statusorder['status'] === 'shipped'): ?>
                                <a name="" id="" class="btn btn-success"
                                    href="index.php?delivred=<?php echo $orders['orderNumber'] ?>"
                                    role="button">Delivred</a>
                                <?php else: ?>
                                <a href="#" class="btn btn-success disabled" role="button">Delivred</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
                        <?php foreach($allOrderOnequantity as $oneOrder): ?>
                        <tr>
                            <td><?php echo $oneOrder['orderNumber'] ?></td>
                            <td><?php $nameOneOrder = $crud->selectOne('users', ['idU' => $oneOrder['idU']]); echo $nameOneOrder['fullname'] ?></td>
                            <td><?php echo $oneOrder['status'] ?></td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="showOrder.php?orderNum=<?php echo $oneOrder['orderNumber']?>" role="button">View order</a>
                                <?php if($oneOrder['status'] === "pending"): ?>
                                <a name="" id="" class="btn btn-warning" href="index.php?change_status=<?php echo $oneOrder['orderNumber']; ?>" role="button">Shipped</a>
                                <?php else: ?>
                                    <a href="#" class="btn btn-warning disabled" role="button">shipped</a>
                                <?php endif; ?>
                                <?php if($oneOrder['status'] === "shipped"): ?>
                                <a name="" id="" class="btn btn-success" href="index.php?delivred=<?php echo $oneOrder['orderNumber'] ?>" role="button">Delivred</a>
                                <?php else: ?>
                                    <a name="" id="" class="btn btn-success disabled" href="#" role="button">Delivred</a>
                                <?php endif; ?>
                            </td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>