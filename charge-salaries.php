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
		<title>Charge Salaries => <?php echo $sys_comp_name; ?></title>
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
					<h4><i class="fa fa-line-chart fa-lg"></i> CHARGE SALARIES</h4>
					<p>Charge Salaries Page</p>
				</div>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-home"></i></li>
					<li class="breadcrumb-item"><a href="-salaries">Charge Salaries</a></li>
				</ul>
			</div>
			
			<?php include("models/admin_config.php");?>
			<?php include("models/system_config.php");?>
	  
			<!-- Charge Salaries page -->
			<div class="row">
				<div class="col-md-12">
					<div class="tile">
						<div class="tile-body">
				
							<form action="#" method="POST" id="salaryChargeForm">
								<div class="row">
						
									<div class="form-group col-md-10">
										<label class="control-label">Salary Month</label>
										<select class="form-control" id="salaryMonthChargeSalaries" name="salaryMonthChargeSalaries" required>
											<option value="">---- Select Month to Charge  ----</option>
											<?php
												$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
												$currentYearNo = date("Y");
												$thisMonth = date("n") - 1;
												for ($i = 0; $i <= $thisMonth; $i++) { ?>
													<option option="<?php echo $months[$i]." ".$currentYearNo; ?>"><?php echo $months[$i]." ".$currentYearNo; ?></option>
													<?php
												}
											?>
										</select>
									</div>
									<div class="form-group col-md-2">
										<label class="control-label">&nbsp;</label><br>
										<button type="submit" class="btn btn-primary col-md-12" name="btnChargeSalaries" id="btnChargeSalaries"><i class="fa fa-lg fa-search"></i>Search</button>
									</div>
								</div>	
							</form>
						</div>
					</div>
		
					<div class="row showHideChargeBtn" style="padding-bottom: 10px; display: none;">
						<div class="col-md-12">
						    <?php
                                if ($_SESSION['userType'] == 0) {
						            ?><button type="button" class="btn btn-success pull-right m-1" name="chargeAllEmpSal" id="chargeAllEmpSal"><i class="fa fa-send "></i> Charge All</button><?php
                                } else {
                                    if ($role_rs[3] == '1') {
						            ?><button type="button" class="btn btn-success pull-right m-1" name="chargeAllEmpSal" id="chargeAllEmpSal"><i class="fa fa-send "></i> Charge All</button><?php
                                    }
                                }
                            ?>
						</div>
					</div>
		
					<div id="employeeChargeSalaries">
						
					</div>

				</div>
			</div>
		</main>
	
		<!-- Essential javascripts for application to work-->
		<?php include("library/footer.php");?>	    	
		<?php include("library/scripts.php"); ?>
		<script type="text/javascript"> $("#salaryMonthChargeSalaries").select2();</script>

	</body>
</html>