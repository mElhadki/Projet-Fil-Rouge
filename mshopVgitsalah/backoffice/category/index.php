<?php
include('../../app/database/connect.php');
include('../../app/database/db.php');
include('../../app/controllers/middleware.php');
adminOnly();
include('../../app/controllers/category.php')

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
    <title>Manage categories</title>
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
                <a href="category/" class="list-group-item list-group-item-action bg-dark active">Categories</a>
                <a href="../products" class="list-group-item list-group-item-action bg-dark text-primary">Products</a>
                <a href="../orders" class="list-group-item list-group-item-action bg-dark text-primary">orders</a>
                <a href="../users" class="list-group-item list-group-item-action bg-dark text-primary">Users</a>
                <a href="../livechat" class="list-group-item list-group-item-action bg-dark text-primary">LIVE CHAT</a>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

        <?php include('../../app/includes/headAdmin.php') ?>

            <div class="container">
                <h1 style="text-align:center">Manage catogories</h1>
                <div class="btn-group" role="group" aria-label="Button group">
                    <a href="create.php">
                        <button class="btn btn-primary" type="button">add category</button>

                    </a>

                </div>

                <table class="table table-light">
                    <tbody>
                        <th>Name category</th>
                        <th>Action</th>
                        <?php foreach ($data as $dcategory) : ?>
                            <tr>
                                <td><?php echo $dcategory['nameCategory'] ?></td>
                                <td><a href="edit.php?edit_idC=<?php echo $dcategory['idC'] ?>"><button class="btn btn-success ml-2" type="button">Edit</button></a><a href="index.php?delete_ctg=<?php echo $dcategory['idC'] ?>"><button class="btn btn-danger ml-2" type="button">Delete</button></a></td>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>