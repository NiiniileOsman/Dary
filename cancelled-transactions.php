<?php
	session_start();
	include("library/conn.php");
	
	$role_rs = array();
	$get_role_mode = mysqli_query($conn, "SELECT * FROM user_role_privileges WHERE userID = '". $_SESSION['userIdd'] ."' AND roleName = 'account_transactions'") or die (mysqli_error($conn));
	if (mysqli_num_rows($get_role_mode) > 0) {
		$role_rs = mysqli_fetch_array($get_role_mode);
	} else {
		$role_rs = ['-1', '-1', '-1', '-1', '-1', '-1'];
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Cancelled Transactions => <?php echo $sys_comp_name; ?></title>
		<?php include("library/head.php");?>
	</head>
	<body class="app sidebar-mini">

		<!-- Navbar-->
		<?php include("library/header.php");?>
		<!-- Sidebar menu-->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<?php include("library/sidebar.php");?>
  
		<main class="app-content">
			<div class="app-title">
				<div>
					<h4><i class="fa fa-times-rectangle fa-lg"></i> CANCELLED TRANSACTIONS</h4>
					<p>Cancelled Transactions List Page</p>
				</div>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-home"></i></li>
					<li class="breadcrumb-item"><a href="cancelled-transactions">Cancelled Transaction</a></li>
				</ul>
			</div>

			<?php include("models/admin_config.php");?>
			<?php include("models/system_config.php");?>

			<!-- Employees page -->
			<div class="row">
				<div class="col-md-12">
					<div class="tile">
						<div class="tile-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-sm" id="cancelledTransactionsTable">
									<thead>
										<tr align="center">
											<th>Transaction ID</th>
											<th>Date</th>
											<th>Transaction Account</th>
											<th>Transaction Type</th>
											<th>Withdrawal</th>
											<th>Deposit</th>
											<th>Cancelled By</th>
                                            <?php if ($_SESSION['userType'] == 0 || $_SESSION['userType'] == 1) {?><th><center>Action</center></th><?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php
											$getCancelledTransactions = mysqli_query($conn, "SELECT account_transactions.transactionID, account_transactions.registerDate, account_transactions.transactionDescription, payment_gateways.gatewayType, payment_gateways.gatewayLogo, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber, account_transactions.withdrawalAmount, account_transactions.depositedAmount, users.userName FROM account_transactions JOIN account_numbers ON (account_transactions.accountNoID = account_numbers.accountNoID) JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) JOIN users ON (account_transactions.cancelledBy = users.userID) WHERE account_transactions.referenceID = '0' AND account_transactions.transactionStatus = '0' ORDER BY account_transactions.registerDate") or die(mysqli_error($conn));
											$x = 1;
											while ($rs = mysqli_fetch_array($getCancelledTransactions)) {
												?>
													<tr>
													   <td align="center"><?php echo $rs[0]; ?></td>
													    <td align="center"><?php echo substr($rs[1], 0, 10); ?></td>
														<td class="py-1" align="left">
														    <?php 
														        if ($rs[3] === "1") {
														            $compain_details = $rs[5]. " (". $rs[7]. ") ";
														        } else if ($rs[3] === "2") {
														            $compain_details = $rs[5]. " ". $rs[6]. " (". $rs[7]. ") ";
														        } else if ($rs[3] === "3") {
														            $compain_details = $rs[6]. " (". $rs[7]. ") ";
														        }
														    ?>
														    <img class="img-fluid img-thumbnail rounded" src="<?php echo $rs[4]; ?>" width="25px" height="25px"/> &nbsp; <?php echo $compain_details; ?>
														</td>
														<td align="center"><?php if ($rs[8] > 0) { echo "Withdrawal"; } else { echo "Deposit"; } ?></td>
														<td align="center"><?php echo "$ ". number_format($rs[8], 2); ?></td>
														<td align="center"><?php echo "$ ". number_format($rs[9], 2); ?></td>
														<td align="center"><?php echo $rs[10]; ?></td>

														<?php
                                                            if ($_SESSION['userType'] == 0 || $_SESSION['userType'] == 1) {
                                                                ?><td align="center">
        															<a class="btn btn-danger btn-sm btnDeleteTransaction" href="#" id="<?php echo "Delete".$rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</a>
        														</td><?php
                                                            }
                                                        ?>
													</tr>
												<?php
												$x++;
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
  
		<!-- Essential javascripts for application to work-->
		<?php include("library/footer.php");?>  
		<?php include("library/scripts.php");?>
		<script type="text/javascript">$('#cancelledTransactionsTable').DataTable({"pageLength": 100, "order": []});</script>
	</body>
</html>