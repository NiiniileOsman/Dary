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
		<title>Charged Salaries List => <?php echo $sys_comp_name; ?></title>
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
					<h4><i class="fa fa-list-ul fa-lg"></i> CHARGED SALARIES LIST</h4>
					<p>Charged Salaries List Page</p>
				</div>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-home"></i></li>
					<li class="breadcrumb-item"><a href="charged-salaries-list">Charged Salaries List</a></li>
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
								<table class="table table-striped table-bordered table-sm tableRestyle" id="chargeSalariesTable">
									<thead>
										<tr align="center">
											<th>Serial</th>
											<th>Employee Name</th>
											<th>Salary Month</th>
											<th>Charged Amount($)</th>
											<th>Charge Date</th>
											<th>Charged By</th>
                                            <?php if ($role_rs[5] == '0') { } else {?><th><center>Action</center></th><?php } ?>
										</tr>
									</thead>
									<tbody>
							
										<?php
											$chargedSalariesList = mysqli_query($conn, "SELECT charge_pay_salaries.rowNo, employees.empName, charge_pay_salaries.salaryMonth, charge_pay_salaries.chargedAmount, charge_pay_salaries.registerDate, users.userName FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.transactionType = '0' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> '0' ORDER BY charge_pay_salaries.rowNo DESC");
											$c = 1;
											while ($rs = mysqli_fetch_array($chargedSalariesList)) {
												?>
													<tr>
														<td align="center"> <?php echo $c; ?></td>
														<td> <?php echo $rs[1]; ?></td>
														<td align="center"> <?php echo $rs[2]; ?></td>
														<td align="center"> <?php echo "$ ".number_format($rs[3], 2); ?></td>
														<td align="center"> <?php echo substr($rs[4], 0, 16); ?></td>
														<td align="center"> <?php echo $rs[5]; ?></td>
														<?php
                                                            if ($_SESSION['userType'] == 0) {
                                                                ?><td align="center">
                                                                    <span class="btn btn-danger btn-sm btnCancelSalaryCharge" id="<?php echo "Delete". $rs[0]; ?>" data-id="<?php echo $rs[0]. "###0". "###". $_SESSION['userIdd']. "###". date("Y-m-d H:s:i"); ?>"><i class="fa fa-fw fa-lg fa-times"></i> Cancel</span> 
        														</td><?php
                                                            } else {
                                                                if ($role_rs[5] == '1') {
                                                                    ?><td align="center">
                                                                    	<span class="btn btn-danger btn-sm btnCancelSalaryCharge" id="<?php echo "Delete". $rs[0]; ?>" data-id="<?php echo $rs[0]. "###0". "###". $_SESSION['userIdd']. "###". date("Y-m-d H:s:i"); ?>"><i class="fa fa-fw fa-lg fa-times"></i> Cancel</span> 
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
		<script type="text/javascript"> $("#salaryOfMonth").select2({ tags: true, dropdownParent: $("#chargeSalariesModal") });</script>

	</body>
</html>