<?php
	session_start();
	include("library/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("library/head.php");?>
        <title>Member Payments Report => <?php echo $_SESSION['systemName']; ?></title>
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
					<h3><i class="fa fa-file-text-o"></i> <b> MEMBER PAYMENTS REPORT</b></h3>
					<p>Member Payments Report</p>
				</div>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					<li class="breadcrumb-item"><a href="member-payments-report">Member Payments Report</a></li>
				</ul>
			</div>

			<?php include("models/admin_config.php");?>
			<?php include("models/system_config.php");?>
		
			<div class="tile">
				<div class="tile-body">
					<form action="#" method="POST" id="searchMemberPaymentsReportForm">
						<div class="row">
							<div class="form-group col-md-5">
								<label class="control-label">Member Name</label><br>
								<select class="form-control" name="cmbMemberNameMemberPaymentsReport" id="cmbMemberNameMemberPaymentsReport" style="font-size: 16px; width: 100%;">

								</select>
							</div>
							
							<div class="form-group col-md-3">
								<input type="checkbox" class="form-control" style="height: 17px; width: 17px; display: inline;" name="customDateMemberPaymentReport" id="customDateMemberPaymentReport">
								<label class="control-label">By Date (From)</label>
								<input class="form-control date" type="date" name="startFromMemberPaymentsReport" id="startFromMemberPaymentsReport">
							</div>
							<div class="form-group col-md-3">
								<label class="control-label">To Date</label>
								<input class="form-control date" type="date" name="endToMemberPaymentsReport" id="endToMemberPaymentsReport">
							</div>
							<div class="form-group col-md-1">
								<label class="control-label">&nbsp;</label><br>
								<button type="submit" class="btn btn-primary" name="btnSearchMemberPaymentsReport" id="btnSearchMemberPaymentsReport"><i class="fa fa-search" style="font-size: 18px; margin-left: 5px; margin-bottom: 3px;"></i></button>
							</div>
		
						</div>	
					</form>
				</div>
			</div>
			
			<div id="memberPaymentsReportSection">
				
			</div>
		  
		</main>
	  	
		<!-- Essential javascripts for application to work-->
		<?php include("library/footer.php");?>
		<?php include("library/scripts.php");?>
		<script type="text/javascript"> $("#cmbMemberNameMemberPaymentsReport").select2();</script>
	
	</body>
</html>