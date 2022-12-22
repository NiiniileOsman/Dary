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
        <title>Contribution Charges => <?php echo $_SESSION['systemName']; ?></title>
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
					<h4><i class="fa fa-line-chart fa-lg"></i> CONTRIBUTION CHARGES</h4>
					<p>Contribution Charges Page</p>
				</div>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-home"></i></li>
					<li class="breadcrumb-item"><a href="contribution-charges">Contribution Charges</a></li>
				</ul>
			</div>
			
			<?php include("models/admin_config.php");?>
			<?php include("models/system_config.php");?>
	  
			<!-- Charge Salaries page -->
			<div class="row">
				<div class="col-md-12">
					<div class="tile">
						<div class="tile-body">
				
							<form action="#" method="POST" id="contributionChargeSearchForm">
								<div class="row">
						
									<div class="form-group col-md-3">
										<label class="control-label">Contribution Type</label>
										<select class="form-control" id="cmbGetContributionTypeToCharge" name="cmbGetContributionTypeToCharge" required>
											
										</select>
									</div>
									<div class="form-group col-md-2 invest_amount_charge">
										<label class="control-label">Amount ($)</label>
										<input class="form-control" type="text" name="txtContributionAmountToCharge" id="txtContributionAmountToCharge" required readonly>
									</div>
									<div class="form-group col-md-2">
										<label class="control-label">Year to Charge</label>
										<select class="form-control" id="cmbContributionChargeYear" name="cmbContributionChargeYear" required>
											<option value="">-- Select Year  --</option>
											<option option="<?php echo date("Y"); ?>"><?php echo date("Y"); ?></option>
										</select>
									</div>
									<div class="form-group col-md-2">
										<label class="control-label">Months to Charge</label>
										<select class="form-control" id="cmbContributionChargeMonths" name="cmbContributionChargeMonths" required>
											<option value="">-- Select Month --</option>
											<?php
												for ($month = 1; $month <= 12; $month++) { ?>
													<option option="<?php echo $month; ?>"><?php echo $month; ?></option>
													<?php
												}
											?>
										</select>
									</div>
									<div class="form-group col-md-2">
										<label class="control-label">Total Amount ($)</label>
										<input class="form-control" type="text" name="txtContributionTotalAmountToCharge" id="txtContributionTotalAmountToCharge" required readonly>
									</div>
									<div class="form-group col-md-1">
										<label class="control-label">&nbsp;</label><br>
										<button type="submit" class="btn btn-primary" name="btnSearchMembersToCharge" id="btnSearchMembersToCharge"><i class="fa fa-search" style="font-size: 18px; margin-left: 5px; margin-bottom: 3px;"></i></button>
									</div>
								</div>	
							</form>
						</div>
					</div>
		
					<div class="row showHideMemberChargeBtn" style="padding-bottom: 10px; display: none;">
						<div class="col-md-12">
						    <?php
                                if ($_SESSION['userType'] == 0) {
            					    ?><button type="button" class="btn btn-success pull-right m-1" name="chargeAllMemberContributions" id="chargeAllMemberContributions"><i class="fa fa-send "></i> Charge All</button><?php
                                } else {
                                    if ($role_rs[3] == '1') {
            					        ?><button type="button" class="btn btn-success pull-right m-1" name="chargeAllMemberContributions" id="chargeAllMemberContributions"><i class="fa fa-send "></i> Charge All</button><?php
                                    }
                                }
                            ?>
						</div>
					</div>
		
					<div id="members_contribution_charge_area">
						
					</div>

				</div>
			</div>
		</main>
	
		<!-- Essential javascripts for application to work-->
		<?php include("library/footer.php");?>	    	
		<?php include("library/scripts.php"); ?>
		<script type="text/javascript"> $("#cmbGetContributionTypeToCharge").select2();</script>
		<script type="text/javascript"> $("#cmbContributionChargeYear").select2();</script>
		<script type="text/javascript"> $("#cmbContributionChargeMonths").select2();</script>

	</body>
</html>