<?php
	session_start();
	include("library/conn.php");
	
	$role_rs = array();
	$get_role_mode = mysqli_query($conn, "SELECT * FROM user_role_privileges WHERE userID = '". $_SESSION['userIdd'] ."' AND roleName = 'charge_pay_salaries'") or die (mysqli_error($conn));
	if (mysqli_num_rows($get_role_mode) > 0) {
		$role_rs = mysqli_fetch_array($get_role_mode);
	} else {
		$role_rs = ['-1', '-1', '-1', '-1', '-1', '-1'];
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Cancelled Salary Charges => <?php echo $sys_comp_name; ?></title>
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
					<h4><i class="fa fa-times-rectangle fa-lg"></i> CANCELLED SALARY CHARGES</h4>
					<p>Cancelled Salary Charges List Page</p>
				</div>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-home"></i></li>
					<li class="breadcrumb-item"><a href="cancelled-salary-charges">Cancelled Salary Charges</a></li>
				</ul>
			</div>
	  
			<?php include("models/admin_config.php");?>
			<?php include("models/system_config.php");?>

			<!-- Charged Salaries List page -->
			<div class="row">
				<div class="col-md-12">
					<div class="tile">
						<div class="tile-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-sm tableRestyle" id="cancelledSalaryChargesTable">
									<thead>
										<tr align="center">
											<th>Serial</th>
											<th>Employee Name</th>
											<th>Salary Month</th>
											<th>Charged Amount($)</th>
											<th>Charge Date</th>
											<th>Cancelled By</th>
                                            <?php if ($_SESSION['userType'] == 0 || $_SESSION['userType'] == 1) {?><th><center>Action</center></th><?php } ?>
										</tr>
									</thead>
									<tbody>
							
										<?php
											$cancelledSalaryChargesList = mysqli_query($conn, "SELECT charge_pay_salaries.rowNo, employees.empName, charge_pay_salaries.salaryMonth, charge_pay_salaries.chargedAmount, charge_pay_salaries.registerDate, users.userName FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID AND charge_pay_salaries.transactionType = '0'  AND charge_pay_salaries.transactionStatus = '0' AND employees.titlePosition <> '0') JOIN users ON (charge_pay_salaries.cancelledBy = users.userID) ORDER BY charge_pay_salaries.rowNo DESC");
											$c = 1;
											while ($result = mysqli_fetch_array($cancelledSalaryChargesList)) {
												?>
													<tr>
														<td align="center"> <?php echo $c; ?></td>
														<td> <?php echo $result[1]; ?></td>
														<td align="center"> <?php echo $result[2]; ?></td>
														<td align="center"> <?php echo "$ ".number_format($result[3], 2); ?></td>
														<td align="center"> <?php echo substr($result[4], 0, 16); ?></td>
														<td align="center"> <?php echo $result[5]; ?></td>
														<?php
                                                            if ($_SESSION['userType'] == 0 || $_SESSION['userType'] == 1) {
                                                                ?><td align="center">
        															<a class="btn btn-danger btn-sm chargeSalaryDeletion" href="#" id="<?php echo "Delete".$result[0]; ?>" data-id="<?php echo $result[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</a>
        														</td><?php
                                                            }
                                                        ?>
													</tr> 

												<?php
												$c++;
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
		<?php include("library/scripts.php"); ?>
		<script type="text/javascript"> $("#cancelledSalaryChargesTable").DataTable({"pageLength": 100});</script>

	</body>
</html>