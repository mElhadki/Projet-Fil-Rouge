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
    <link rel="stylesheet" href="order.css">
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

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container mt-100" style="margin-top: 170px;">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="widget-box">
				<div class="widget-header widget-header-large">
					<h3 class="widget-title grey lighter">
						<i class="ace-icon fa fa-leaf green"></i>
						Eshop
					</h3>

					<div class="widget-toolbar no-border invoice-info">
						<span class="invoice-info-label">Invoice:</span>
						<span class="red">#<?php echo $_GET['orderNum'] ?></span>

						<br>
						<span class="invoice-info-label">Date:</span>
						<span class="blue"><?php echo $timeOrder ?></span>
					</div>

					<div class="widget-toolbar hidden-480">
						<a href="showOrder.php?invoice=<?php echo $_GET['orderNum'] ?>">
							<i class="ace-icon fa fa-print"></i>
						</a>
					</div>
				</div>

				<div class="widget-body">
					<div class="widget-main padding-24">
						<div class="row">
							<div class="col-sm-6">
								<div class="row">
									<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
										<b>Costumer Info</b>
									</div>
								</div>

								<div>
									<ul class="list-unstyled spaced">
										<li>
											<i class="ace-icon fa fa-caret-right blue"></i>Street, City
										</li>

										<li>
											<i class="ace-icon fa fa-caret-right blue"></i>Zip Code : <?php echo $zipCode ?>
										</li>

										<li>
											<i class="ace-icon fa fa-caret-right blue"></i>State, Country
										</li>

										<li>
											<i class="ace-icon fa fa-caret-right blue"></i>
Phone:
											<b class="red">111-111-111</b>
										</li>

										<li class="divider"></li>

										<li>
											<i class="ace-icon fa fa-caret-right blue"></i>
											Paymant Info
										</li>
									</ul>
								</div>
							</div><!-- /.col -->

						
						</div><!-- /.row -->

						<div class="space"></div>

						<div>
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="center">ID</th>
										<th>Product</th>
										<th class="hidden-xs">Description</th>
										<th class="hidden-480">Quantite</th>
										<th>Total</th>
									</tr>
								</thead>

								<tbody>
                                     <?php $totalOrder = 0; 
                                     $totalUnite = 0;
                                     ?>
                                    <?php foreach($orderDetail as $orderD): 
                                        
                                        ?>
									<tr>
										<td class="center"><?php echo $_GET['orderNum'] ?></td>

										<td>
											<a href="#"><?php $prname =  $crud->selectOne('product_history', ['idP' => $orderD['idP']]); echo $prname['nameProduct']?></a>
										</td>
										<td class="hidden-xs">
											<?php echo $prname['description'] ?>
										</td>
										<td class="hidden-480"> <?php echo $orderD['qte'] . ' unite';?> </td>
										<td>$ <?php echo $totalUnite = ($orderD['qte'] * $prname['Price']) ?><?php $totalOrder = $totalOrder + ($orderD['qte'] * $prname['Price']); ?></td>
									</tr>
                                    <?php endforeach; ?>
									
								</tbody>
							</table>
						</div>

						<div class="hr hr8 hr-double hr-dotted"></div>

						<div class="row">
							
                            <div class="col-sm-7 pull-left"> Extra Information </div>
                            <div class="col-sm-5 pull-right">
								<h4 class="pull-right">
									Total amount :
									<span class="red">$ <?php echo $totalOrder ?></span>
								</h4>
							</div>
						</div>

						<div class="space-6"></div>
						
					</div>
				</div>
			</div>
		</div>
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