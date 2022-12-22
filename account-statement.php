<?php
  session_start();
  include("library/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Account Statement => <?php echo $sys_comp_name; ?></title>
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
				<h3><i class="fa fa-bank"></i> <b> ACCOUNT STATEMENT</b></h3>
				<p>Account Statement</p>
			</div>
			<ul class="app-breadcrumb breadcrumb">
				<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="account-statement">Account Statement</a></li>
			</ul>
		</div>
		
		<?php include("models/admin_config.php");?>
		<?php include("models/system_config.php");?>
		
		<div class="tile">
			<div class="tile-body">
				<form action="#" method="POST" id="accountNumberStatementReportForm">
					<div class="row">
						<div class="form-group col-md-5">
							<label class="control-label">Account Name</label><br>
                            <select class="form-control" name="cmbAccountStatementAccountName" id="cmbAccountStatementAccountName" style="width: 100%;">

							</select>
						</div>
							<div class="form-group col-md-2">
							<label class="control-label">Transacion ype</label><br>
                            <select class="form-control" name="cmbAccountStatementTransacionType" id="cmbAccountStatementTransacionType" style="width: 100%;">
                                <option value="">General (All)</option>
                                <option value="1">Withdwaral Only</option>
                                <option value="2">Deposit Only</option>
							</select>
						</div>
						<div class="form-group col-md-2">
						    <input type="checkbox" class="form-control" style="height: 17px; width: 17px; display: inline;" name="customDateAccountNumberStatement" id="customDateAccountNumberStatement">
							<label class="control-label">By Date (From)</label>
							<input class="form-control date" type="date" name="startFromAccountStatement" id="startFromAccountStatement">
						</div>
						<div class="form-group col-md-2">
							<label class="control-label">To Date</label>
							<input class="form-control date" type="date" name="endTooAccountNo" id="endTooAccountNo">
						</div>
						<div class="form-group col-md-1">
							<label class="control-label">&nbsp;</label><br>
							<button type="submit" class="btn btn-primary" name="btnAccountNoStatement" id="btnAccountNoStatement"><i class="fa fa-search" style="font-size: 18px; margin-left: 5px; margin-bottom: 3px;"></i></button>
						</div>
					</div>	
				</form>
			</div>
		</div>
		<div id="accountNumberStatementSection">
			
		</div>
	  
    </main>
	  
    </main>
	
    <!-- Essential javascripts for application to work-->
	<?php include("library/footer.php");?>	    	
	<?php include("library/scripts.php"); ?>
	<script type="text/javascript"> $("#cmbAccountStatementAccountName").select2();</script>
	<script type="text/javascript"> $("#cmbAccountStatementTransacionType").select2();</script>

  </body>
</html>