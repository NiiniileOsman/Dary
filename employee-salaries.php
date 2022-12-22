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
		<?php include("library/head.php");?>
		<title>Salary Payments => <?php echo $_SESSION['systemName']; ?></title>
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
					<h4><i class="fa fa-dollar fa-lg"></i> SALARY PAYMENTS</h4>
					<p>Employee Salary Payments Page</p>
				</div>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-home"></i></li>
					<li class="breadcrumb-item"><a href="employee-salaries">Salary Payments</a></li>
				</ul>
			</div>
      
			<!-- Button trigger modal -->
			<div class="row" style="padding-bottom: 10px;">
				<div class="col-md-12">
					<?php
						if ($_SESSION['userType'] == 0) {
							?><button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#employeeSalariesModal"><i class="fa fa-plus"></i> New Salary Payment</button><?php
						} else {
							if ($role_rs[3] == '1') {
								?><button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#employeeSalariesModal"><i class="fa fa-plus"></i> New Salary Payment</button><?php
							}
						}
					?>
				</div>
			</div>

			<?php include("models/admin_config.php");?>
			<?php include("models/system_config.php");?>
      
			<!-- Employee Salaries page -->
			<div class="row">
				<div class="col-md-12">
					<div class="tile">
						<div class="tile-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-sm tableRestyle" id="chargeSalariesTable">
									<thead>
										<tr align="center">
											<th>Serial</th>
											<th>Employee Name</th>
											<th>Salary Month</th>
											<th>Paid Amount($)</th>
											<th>Payment Date</th>
											<th>Paid By</th>
                                            <?php if ($role_rs[5] == '0') { } else {?><th><center>Action</center></th><?php } ?>
										</tr>
									</thead>
									<tbody>
							
										<?php
											$employeeSalariesList = mysqli_query($conn, "SELECT charge_pay_salaries.salaryChargeID, employees.empName, charge_pay_salaries.salaryMonth, charge_pay_salaries.paidAmount, charge_pay_salaries.registerDate, users.userName FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.transactionType = '1' AND charge_pay_salaries.transactionStatus = '1' ORDER BY charge_pay_salaries.rowNo DESC");
											$c = 1;
											while ($rs = mysqli_fetch_array($employeeSalariesList)) {
												?>
													<tr>
														<td align="center"> <?php echo $c; ?></td>
														<td> <?php echo $rs[1]; ?></td>
														<td align="center"> <?php echo $rs[2]; ?></td>
														<td align="center"> <?php echo "$ ".number_format($rs[3], 2); ?></td>
														<td align="center"> <?php echo substr($rs[4], 0, 10); ?></td>
														<td align="center"> <?php echo $rs[5]; ?></td>
														<?php
                                                            if ($_SESSION['userType'] == 0) {
                                                                ?><td align="center">
                                                                    <span class="btn btn-danger btn-sm btnCancelSalaryPayment" id="<?php echo "Delete". $rs[0]; ?>" data-id="<?php echo $rs[0]. "###0". "###". $_SESSION['userIdd']. "###". date("Y-m-d H:s:i"); ?>"><i class="fa fa-fw fa-lg fa-times"></i> Cancel</span> 
        														</td><?php
                                                            } else {
                                                                if ($role_rs[5] == '1') {
                                                                    ?><td align="center">
                                                                    	<span class="btn btn-danger btn-sm btnCancelSalaryPayment" id="<?php echo "Delete". $rs[0]; ?>" data-id="<?php echo $rs[0]. "###0". "###". $_SESSION['userIdd']. "###". date("Y-m-d H:s:i"); ?>"><i class="fa fa-fw fa-lg fa-times"></i> Cancel</span> 
                                                                    </td><?php
                                                                }
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
		<script type="text/javascript"> $("#chargeSalariesTable").DataTable({"pageLength": 100});</script>
		<script type="text/javascript"> $("#cmbSalaryPaymentEmployeeName").select2({ tags: false, dropdownParent: $("#employeeSalariesModal") });</script>
		<script type="text/javascript"> $("#cmbSalaryPaymentSalaryMonth").select2({ tags: false, dropdownParent: $("#employeeSalariesModal") });</script>
		<script type="text/javascript"> $("#cmbEmployeeSalariesWithdrawalAccount").select2({ tags: false, dropdownParent: $("#employeeSalariesModal") });</script>
		
	</body>
</html>