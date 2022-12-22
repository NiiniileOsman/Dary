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
		<title>Charged Contributions => <?php echo $_SESSION['systemName']; ?></title>
	</head>
	<body class="app sidebar-mini">

		<!-- Navbar-->
		<?php include("library/header.php");?>
		<!-- Sidebar menu-->
		<?php include("library/sidebar.php");?>
		<main class="app-content">
			<div class="app-title">
				<div>
					<h4><i class="fa fa-calendar fa-lg"></i> CHARGED CONTRIBUTION</h4>
					<p>Charged Contributions List Page</p>
				</div>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-home"></i></li>
					<li class="breadcrumb-item"><a href="charged-contributions">Charged Contributions</a></li>
				</ul>
			</div>

			<?php include("models/admin_config.php");?>
			<?php include("models/system_config.php");?>

			<!-- Charged Contributions Page -->
			<div class="row">
				<div class="col-md-12">
					<div class="tile">
						<div class="tile-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-sm" id="chargedContributionsTable">
									<thead>
										<tr align="center">
											<th>Transaction ID</th>
											<th>Member ID</th>
											<th>Member Name</th>
											<th>Contribution Year</th>
											<th>Months Charged</th>
											<th>Charged Amount ($)</th>
											<th>Charged Date</th>
                                            <?php if ($role_rs[5] == '0') { } else {?><th><center>Action</center></th><?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php
											$getContributionPayments = mysqli_query($conn, "SELECT charge_pay_contributions.chargePayMemberID, members.memberID, members.memberName, charge_pay_contributions.contributionOf, charge_pay_contributions.chargedMonths, charge_pay_contributions.chargedAmount, charge_pay_contributions.registerDate FROM charge_pay_contributions JOIN members ON (charge_pay_contributions.memberID = members.memberID) WHERE transactionType = '0' AND transactionStatus = '1'") or die(mysqli_error($conn));
											while ($rs = mysqli_fetch_array($getContributionPayments)) {
												?>
													<tr>
														<td align="center"><?php echo $rs[0]; ?></td>                          
														<td align="center"><?php echo $rs[1]; ?></td>                          
														<td align="left"><?php echo ucwords(strtolower($rs[2]), " "); ?></td>
														<td align="center"><?php echo $rs[3]; ?></td>
														<td align="center"><?php echo $rs[4]; ?></td>
														<td align="center"><?php echo "$ ". number_format($rs[5], 2); ?></td>
														<td align="center"><?php echo substr($rs[6], 0, 10); ?></td>
														<?php
                                                            if ($_SESSION['userType'] == 0) {
                                                                ?><td align="center">
                                                                    <span class="btn btn-danger btn-sm btnCancelChargedContribution" id="<?php echo "Delete". $rs[0]; ?>" data-id="<?php echo $rs[0]. "###0". "###". $_SESSION['userIdd']. "###". date("Y-m-d H:s:i"); ?>"><i class="fa fa-fw fa-lg fa-times"></i> Cancel</span> 
        														</td><?php
                                                            } else {
                                                                if ($role_rs[5] == '1') {
                                                                   ?><td align="center">
                                                                    	<span class="btn btn-danger btn-sm btnCancelChargedContribution" id="<?php echo "Delete". $rs[0]; ?>" data-id="<?php echo $rs[0]. "###0". "###". $_SESSION['userIdd']. "###". date("Y-m-d H:s:i"); ?>"><i class="fa fa-fw fa-lg fa-times"></i> Cancel</span> 
            														</td><?php
                                                                }
                                                            }
                                                        ?>
													</tr>
												<?php
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
		<script type="text/javascript">$('#chargedContributionsTable').DataTable({"pageLength": 100});</script>
		
	</body>
</html>