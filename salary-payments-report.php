<?php
  session_start();
  include("library/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Salary Payments Report => <?php echo $sys_comp_name; ?></title>   
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
				<h3><i class="fa fa-pie-chart"></i> <b> SALARIES PAYMENTS REPORT</b></h3>
				<p>Salary Payments Report</p>
			</div>
			<ul class="app-breadcrumb breadcrumb">
				<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="salary-payments-report">Salary Payments Report</a></li>
			</ul>
		</div>

		<?php include("models/admin_config.php");?>
		<?php include("models/system_config.php");?>
		
		<div class="tile">
			<div class="tile-body">
				<form action="#" method="POST" id="salaryPaymentsReportForm">
					<div class="row">
						<div class="form-group col-md-5">
							<label class="control-label">Employee Name</label><br>
                            <select class="form-control" name="empNameSalaryPaymentsReport" id="empNameSalaryPaymentsReport" style="font-size: 16px; width: 100%;">

							</select>
						</div>
						<div class="form-group col-md-2">
							<label class="control-label">Salary Of</label>
							<select class="form-control" id="salaryMonthSalaryPaymentsReport" name="salaryMonthSalaryPaymentsReport" >
							    <option value="">General (All)</option>
							    
							    <?php
							        
							        $getRooms = mysqli_query($conn, "SELECT DISTINCT salaryMonth FROM charge_pay_salaries");
							        $roomRows = mysqli_num_rows($getRooms);
							        if ($roomRows > 0) {
							            while ($rm = mysqli_fetch_array($getRooms)) {
							                ?>
							                <option value="<?php echo $rm[0]; ?>"><?php echo $rm[0]; ?></option>
							                <?php
							            }
							            
							        } else {
							            echo "No Month Found";
							        }
							    ?>
							    
							</select>
						</div>
						<div class="form-group col-md-2">
						    <input type="checkbox" class="form-control" style="height: 17px; width: 17px; display: inline;" name="customDateSalaryPaymentsReport" id="customDateSalaryPaymentsReport">
							<label class="control-label">By Date (From)</label>
							<input class="form-control date" type="date" name="startFromSalaryPaymentsReport" id="startFromSalaryPaymentsReport">
						</div>
						<div class="form-group col-md-2">
							<label class="control-label">To Date</label>
							<input class="form-control date" type="date" name="endToSalaryPaymentsReport" id="endToSalaryPaymentsReport">
						</div>
						<div class="form-group col-md-1">
							<label class="control-label">&nbsp;</label><br>
							<button type="submit" class="btn btn-primary" name="btnSalaryPaymentsReport" id="btnSalaryPaymentsReport"><i class="fa fa-search" style="font-size: 18px; margin-left: 5px; margin-bottom: 3px;"></i></button>
						</div>
						
					</div>	
				</form>
			</div>
		</div>
		<div id="salaryPaymentsReportSection">
			
		</div>
	  
    </main>
	  
    </main>
	
     <!-- Essential javascripts for application to work-->
	 <?php include("library/footer.php");?>
    <?php include("library/scripts.php");?>
	<script type="text/javascript"> $("#empNameSalaryPaymentsReport").select2();</script>
	<script type="text/javascript"> $("#salaryMonthSalaryPaymentsReport").select2();</script>
	
  </body>
</html>