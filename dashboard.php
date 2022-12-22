<?php
session_start();
include("library/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("library/head.php"); ?>
	<title>Dashboard => <?php echo $_SESSION["systemName"]; ?></title>
</head>

<body class="app sidebar-mini">

	<?php
	if ($_SESSION["userType"] == "Member") {
		include("library/header.php");
		include("library/member_sidebar.php");
		include("models/admin_config.php");
		include("models/system_config.php");
	} else {
		include("library/header.php");
		include("library/sidebar.php");
		include("models/admin_config.php");
		include("models/system_config.php");
	}
	?>

	<main class="app-content">

		<div class="app-title">

			<div>
				<?php
    				if ($_SESSION["userType"] == "Member") {
    				    ?><h3><i class="fa fa-graduation-cap"></i> <b>SOTES - MEMBERS DASHBOARD</b></h3><?php
    				} else {
    					$dashboard_header = explode("*#*#*#", $_SESSION["dashboardHeader"]); ?>
    					<h3><i class="<?php echo $dashboard_header[0]; ?>"></i> <b><?php echo $dashboard_header[1]; ?></b></h3><?php 
				    }
				?>
			</div>

			<ul class="app-breadcrumb breadcrumb">
				<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
			</ul>

		</div>

		<div class="row">
			<?php
			if ($_SESSION["userType"] == "Member") {
				?>
				
				 <?php
                    //Calculate member total contribution charges
    				$memberTotalCharges = mysqli_query($conn, "SELECT SUM(chargedAmount) FROM charge_pay_contributions WHERE memberID = '". $_SESSION['memberrIddd'] ."'") or mysqli_error($conn);
    				if (mysqli_num_rows($memberTotalCharges) > 0) {
    					$member_ttl_charges_rs = mysqli_fetch_array($memberTotalCharges);
    					$member_total_charges = $member_ttl_charges_rs[0];
    				} else {
    					$member_total_charges = 0.00;
    				}
    				
    			    ?>
            			
        			<div class="col-md-6">
        				<div class="widget-small primary"><i class="icon fa fa-money" style="font-size: 30px;"></i>
        					<div class="info">
        						<h6><b>TOTAL CHARGED CONTRIBUTIONS</b></h6>							
        						<p style="font-size: 13px;"><?php echo "$ ". number_format($member_total_charges, 2); ?></p>
        					</div>
        				</div>
        			</div>
    			
    			    <?php
        			//Calculate member total payment
    				$memberTotalPayment = mysqli_query($conn, "SELECT SUM(paidAmount) FROM charge_pay_contributions WHERE memberID = '". $_SESSION['memberrIddd'] ."'") or mysqli_error($conn);
    				if (mysqli_num_rows($memberTotalPayment) > 0) {
    					$membrr_ttl_pymnt_rs = mysqli_fetch_array($memberTotalPayment);
    					$member_total_paymentss = $membrr_ttl_pymnt_rs[0];
    				} else {
    					$member_total_paymentss = 0.00;
    				}
    				
    			    ?>
            			
        			<div class="col-md-6">
        				<div class="widget-small success"><i class="icon fa fa-money" style="font-size: 30px;"></i>
        					<div class="info">
        						<h6><b>YOUR TOTAL PAYMENT</b></h6>							
        						<p style="font-size: 13px;"><?php echo "$ ". number_format($member_total_paymentss, 2); ?></p>
        					</div>
        				</div>
        			</div>
        			
        			<div class="col-md-6">
        				<div class="widget-small danger"><i class="icon fa fa-money" style="font-size: 30px;"></i>
        					<div class="info">
        						<h6><b>YOUR TOTAL DEPTS</b></h6>							
        						<p style="font-size: 13px;"><?php echo "$ ". number_format(($member_total_charges) - ($member_total_paymentss), 2); ?></p>
        					</div>
        				</div>
        			</div>

				
				<?php
			} else {
				?>
				
			    <div class="col-md-4">
    				<div class="widget-small primary"><i class="icon fa fa-user-circle" style="font-size: 30px;"></i>
    					<?php
    					$countUsers = mysqli_query($conn, "SELECT COUNT(rowNo) FROM users WHERE registeredBy <> 0");
    					$totalUsers = mysqli_fetch_array($countUsers);
    					?>
    					<div class="info">
    						<h6><b>TOTAL USERS</b></h6>
    						<p style="font-size: 13px;">
    							<?php
    							if ($totalUsers[0] <= 0) {
    								echo 0;
    							} else if ($totalUsers[0] == 1) {
    								echo 1;
    							} else if ($totalUsers[0] > 1) {
    								echo ($totalUsers[0] - 2) . "+";
    							}
    							?>
    						</p>
    					</div>
				    </div>
				</div>
				<div class="col-md-4">
    				<div class="widget-small danger"><i class="icon fa fa-vcard" style="font-size: 30px;"></i>
    					<?php
    					$countEmployees = mysqli_query($conn, "SELECT COUNT(rowNo) FROM employees WHERE titlePosition <> 0");
    					$totalEmployees = mysqli_fetch_array($countEmployees);
    					?>
    					<div class="info">
    						<h6><b>TOTAL EMPLOYEES</b></h6>
    						<p style="font-size: 13px;">
    							<?php
    							if ($totalEmployees[0] <= 0) {
    								echo 0;
    							} else if ($totalEmployees[0] == 1) {
    								echo 1;
    							} else if ($totalEmployees[0] > 1) {
    								echo ($totalEmployees[0] - 1) . "+";
    							}
    							?>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="widget-small success"><i class="icon fa fa-vcard" style="font-size: 30px;"></i>
    					<?php
    					$countMembers = mysqli_query($conn, "SELECT COUNT(rowNo) FROM members WHERE memberStatus = 1");
    					$totalMembers = mysqli_fetch_array($countMembers);
    					?>
    					<div class="info">
    						<h6><b>TOTAL MEMBERS</b></h6>
    						<p style="font-size: 13px;">
    							<?php
    							if ($totalMembers[0] <= 0) {
    								echo 0;
    							} else if ($totalMembers[0] == 1) {
    								echo 1;
    							} else if ($totalMembers[0] > 1) {
    								echo ($totalMembers[0] - 1) . "+";
    							}
    							?>
    						</p>
    					</div>
    				</div>
    			</div>
				
			    <?php 
			}
			?>
			
		</div>

	</main>

	<!-- Essential javascripts for application to work-->
	<?php include("library/footer.php"); ?>
	<?php include("library/scripts.php"); ?>

</body>

</html>