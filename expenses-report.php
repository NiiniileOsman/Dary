<?php
  session_start();
  include("library/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Expenses Report => <?php echo $sys_comp_name; ?></title>
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
				<h3><i class="fa fa-bar-chart"></i> <b> EXPENSES REPORT</b></h3>
				<p>Expenses Report</p>
			</div>
			<ul class="app-breadcrumb breadcrumb">
				<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="expenses-report">Expenses Report</a></li>
			</ul>
		</div>

		<?php include("models/admin_config.php");?>
		<?php include("models/system_config.php");?>
		
		<div class="tile">
			<div class="tile-body">
				<form action="#" method="POST" id="expensesReportForm">
					<div class="row">
						
						<div class="form-group col-md-6">
						    <input type="checkbox" class="form-control" style="height: 17px; width: 17px; display: inline;" name="customDateExpensesReport" id="customDateExpensesReport">
							<label class="control-label">By Date (From)</label>
							<input class="form-control date" type="date" name="startFromExpensesReport" id="startFromExpensesReport">
						</div>
						<div class="form-group col-md-5">
							<label class="control-label">To Date</label>
							<input class="form-control date" type="date" name="endToExpensesReport" id="endToExpensesReport">
						</div>
						<div class="form-group col-md-1">
							<label class="control-label">&nbsp;</label><br>
							<button type="submit" class="btn btn-primary" name="btnExpensesReport" id="btnExpensesReport"><i class="fa fa-search" style="font-size: 18px; margin-left: 5px; margin-bottom: 3px;"></i></button>
						</div>
					</div>	
				</form>
			</div>
		</div>
		<div id="expesesReportSection">
			
		</div>
	  
    </main>
	  
    <!-- Essential javascripts for application to work-->
	<?php include("library/footer.php");?>	    	
	<?php include("library/scripts.php"); ?>
	
  </body>
</html>