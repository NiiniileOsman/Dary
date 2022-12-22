<?php
    session_start();
    include("library/conn.php");
  
	$role_rs = array();
    $get_role_mode = mysqli_query($conn, "SELECT * FROM user_role_privileges WHERE userID = '" . $_SESSION['userIdd'] . "' AND roleName = 'charge_pay_contributions'") or die(mysqli_error($conn));
    if (mysqli_num_rows($get_role_mode) > 0) {
        $role_rs = mysqli_fetch_array($get_role_mode);
    } else {
        $role_rs = ['-1', '-1', '-1', '-1', '-1', '-1'];
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("library/head.php");?>
		<title>Member Payments => <?php $_SESSION['systemName']?></title>
	</head>
	<body class="app sidebar-mini">

		<!-- Navbar-->
		<?php include("library/header.php");?>
		<!-- Sidebar menu-->
		<?php include("library/sidebar.php");?>
		<main class="app-content">
			<div class="app-title">
				<div>
					<h4><i class="fa fa-times-rectangle fa-lg"></i> CANCELLED MEMBER PAYMENTS</h4>
					<p>Cancelled Member Payments List Page</p>
				</div>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-home"></i></li>
					<li class="breadcrumb-item"><a href="cancelled-member-payments">Cancelled Member Payments</a></li>
				</ul>
			</div>

			<?php include("models/admin_config.php");?>
			<?php include("models/system_config.php");?>

			<!-- Investor payments page -->
			<div class="row">
				<div class="col-md-12">
					<div class="tile">
						<div class="tile-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-sm" id="cancelledMemberPaymentsTable">
									<thead>
										<tr align="center">
											<th>Payment ID</th>
											<th>Member Name</th>
											<th>Deposit Account</th>
											<th>Paid Amount ($)</th>
											<th>Payment Date</th>
											<th>Cancelled By</th>
                                            <?php if ($_SESSION['userType'] == 0 || $_SESSION['userType'] == 1) {?><th><center>Action</center></th><?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php
											$getInvestPayment = mysqli_query($conn, "SELECT charge_pay_contributions.chargePayMemberID, members.memberName, payment_gateways.gatewayType, payment_gateways.gatewayLogo, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber, IFNULL(charge_pay_contributions.paidAmount, 0), charge_pay_contributions.registerDate, users.userName FROM charge_pay_contributions JOIN members ON (charge_pay_contributions.memberID = members.memberID) JOIN account_numbers ON (charge_pay_contributions.accountNoID = account_numbers.accountNoID) JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) JOIN users ON (charge_pay_contributions.cancelledBy = users.userID) WHERE transactionType = '1' AND transactionStatus = '0'") or die(mysqli_error($conn));
											$x = 1;
											while ($rs = mysqli_fetch_array($getInvestPayment)) {
												?>
													<tr>
														<td align="center"><?php echo $rs[0]; ?></td>                          
														<td align="left"><?php echo $rs[1]; ?></td>
														<td class="py-1" align="left">
														    <?php 
														        if ($rs[2] === "1") {
														            $compain_details = $rs[4]. " (". $rs[6]. ") ";
														        } else if ($rs[2] === "2") {
														            $compain_details = $rs[4]. " ". $rs[5]. " (". $rs[6]. ") ";
														        } else if ($rs[2] === "3") {
														            $compain_details = $rs[5]. " (". $rs[6]. ") ";
														        }
														    ?>
														    <img class="img-fluid img-thumbnail rounded" src="<?php echo $rs[3]; ?>" width="25px" height="25px"/> &nbsp; <?php echo $compain_details; ?>
														</td>
														<td align="center"><?php echo "$ ". number_format($rs[7], 2); ?></td>
														<td align="center"><?php echo substr($rs[8], 0, 10); ?></td>
														<td align="left"><?php echo $rs[9]; ?></td>
														
                                                        <?php
                                                            if ($_SESSION['userType'] == 0 || $_SESSION['userType'] == 1) {
                                                                ?><td align="center">
        															<a class="btn btn-danger btn-sm btnDeleteMemberPayment" href="#" id="<?php echo "Delete".$rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</a>
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
		<script type="text/javascript">
			$('#cancelledMemberPaymentsTable').DataTable({"pageLength": 100})
		</script>
		
	</body>
</html>