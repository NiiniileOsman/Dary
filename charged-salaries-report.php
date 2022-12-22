<?php
  session_start();
  include("library/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Charged Salaries Report => <?php echo $sys_comp_name; ?></title>
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
				<h3><i class="fa fa-line-chart"></i> <b> CHARGED SALARIES REPORT</b></h3>
				<p>Charged Salaries Report</p>
			</div>
			<ul class="app-breadcrumb breadcrumb">
				<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="charged-salaries-report">Charged Salaries Report</a></li>
			</ul>
		</div>
		
		<?php include("models/admin_config.php");?>
		<?php include("models/system_config.php");?>
		
		<div class="tile">
			<div class="tile-body">
				<form action="#" method="POST" id="chargedSalariesReportForm">
					<div class="row">
						<div class="form-group col-md-5">
							<label class="control-label">Employee Name</label><br>
                            <select class="form-control" name="empNameChargeSalariesReport" id="empNameChargeSalariesReport" style="font-size: 16px; width: 100%;">

							</select>
						</div>
						<div class="form-group col-md-2">
							<label class="control-label">Salary Of</label>
							<select class="form-control" id="salaryMonthChargeSalariesReport" name="salaryMonthChargeSalariesReport">
							    <option value="">General (All)</option>
							    
							    <?php
							        
							        $getSalaryMonth = mysqli_query($conn, "SELECT DISTINCT salaryMonth FROM charge_pay_salaries");
							        if (mysqli_num_rows($getSalaryMonth) > 0) {
							            while ($salry_month_rs = mysqli_fetch_array($getSalaryMonth)) {
							                ?>
							                <option value="<?php echo $salry_month_rs[0]; ?>"><?php echo $salry_month_rs[0]; ?></option>
							                <?php
							            }
							            
							        } else {
							            echo "No Month Found";
							        }
							    ?>
							    
							</select>
						</div>
						<div class="form-group col-md-2">
						    <input type="checkbox" class="form-control" style="height: 17px; width: 17px; display: inline;" name="customDateChargeSalariesReport" id="customDateChargeSalariesReport">
							<label class="control-label">By Date (From)</label>
							<input class="form-control date" type="date" name="startFromChargeSalariesReport" id="startFromChargeSalariesReport">
						</div>
						<div class="form-group col-md-2">
							<label class="control-label">To Date</label>
							<input class="form-control date" type="date" name="endToChargeSalariesReport" id="endToChargeSalariesReport">
						</div>
						<div class="form-group col-md-1">
							<label class="control-label">&nbsp;</label><br>
							<button type="submit" class="btn btn-primary" name="btnChargeSalariesReport" id="btnChargeSalariesReport"><i class="fa fa-search" style="font-size: 18px; margin-left: 5px; margin-bottom: 3px;"></i></button>
						</div>
					</div>	
				</form>
			</div>
		</div>
		<div id="chargeSalariesReportSection">
			
		</div>
	  
    </main>
	  
    </main>
	
    <!-- Essential javascripts for application to work-->
	<?php include("library/footer.php");?>	    	
	<?php include("library/scripts.php"); ?>
	<script type="text/javascript"> $("#empNameChargeSalariesReport").select2();</script>
	<script type="text/javascript"> $("#salaryMonthChargeSalariesReport").select2();</script>
	
  </body>
</html>