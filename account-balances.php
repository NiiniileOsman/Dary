<?php
session_start();
include("library/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Account Balances => <?php echo $sys_comp_name; ?></title>
	<?php include("library/head.php"); ?>
</head>

<body class="app sidebar-mini">

	<!-- Navbar-->
	<?php include("library/header.php"); ?>
	<!-- Sidebar menu-->
	<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
	<?php include("library/sidebar.php"); ?>

	<main class="app-content">
		<div class="app-title">
			<div>
				<h3><i class="fa fa-file-text-o"></i> <b>ACCOUNT BALANCES</b></h3>
				<p>Account Balances List</p>
			</div>
			<ul class="app-breadcrumb breadcrumb">
				<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="accounts-balance">Account Balances</a></li>
			</ul>
		</div>

		<?php include("models/admin_config.php"); ?>
		<?php include("models/system_config.php"); ?>

		<div class="tile">
			<div class="tile-body">
				<div class="row" style="margin: 0px;">
					<div class="col-md-12 text-right">
						<br>
						<button class="btn btn-success btn-sm" id="printBankAccountBalances"> <i class="fa fa-print"></i> Print </button>
						<br><br>
					</div>
				</div>
				<div class="row" style="margin-left: 0px; margin-right: 0px;" id="bankAccountBalancesPrintArea">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12" style="margin: 0px;">
								<img src="img/reportHeader.png" width="100%" height="200px" />
								<br><br>
								<center>
									<h2 style="font-family: 'Arial'; color: #010132;">Accounts Balances</h2>
								</center>
							</div>
						</div>

						<br>


						<div class="row">
							<div class="col-md-8">
								&nbsp;
							</div>

							<div class="col-md-4 text-left" style="padding: 0px 20px 0px 0px;">
								<h5 class="text-left" style="font-size: 15px; font-weight: normal; padding-left: 15px;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
								<h5 class="text-left" style="font-size: 15px; font-weight: normal; padding-left: 15px;"><b>Report Type: </b> Bank Accounts Balances </h5>
							</div>
						</div>

						<div class="row">

							<div class="col-md-12" style="background-image: url('img/reportBackground.png'); background-size : 90% 800px; background-repeat : repeat-y; background-position: center; -webkit-print-color-adjust: exact;">

								<br>
								<div class="row">
									<?php
									$getAccountsList = mysqli_query($conn, "SELECT payment_gateways.gatewayType, payment_gateways.gatewayLogo, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber, IFNULL(SUM(account_transactions.depositedAmount), 0) -IFNULL(SUM(account_transactions.withdrawalAmount), 0) 'AccountBalance' FROM account_numbers JOIN account_transactions ON (account_numbers.accountNoID = account_transactions.accountNoID)  JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) GROUP BY account_numbers.accountNoID ORDER BY account_numbers.accountNoName ASC") or die(mysqli_error($conn));
									while ($account_balances_rs = mysqli_fetch_array($getAccountsList)) {
									?>
										<div class="col-md-6 mt-4">
											<div class="card">
												<div class="card-header">
													<img class="img-fluid img-thumbnail rounded" src="<?php echo $account_balances_rs[1]; ?>" width="45px" height="45px" /> &nbsp;
													<h2 class="text-primary" style="display: inline;"><small> <strong><?php echo $account_balances_rs[2]; ?></strong></small></h2>
												</div>
												<div class="card-body">
													<h2 class="text-dark" style="display: inline;"><small><strong><?php echo $account_balances_rs[3]; ?></strong></small></h2>
													<h2 class="text-danger"><small><?php echo $account_balances_rs[4]; ?></small></h2>
													<span>Available Balance</span>
													<h2 class="text-success"><small><?php echo "$ " . number_format($account_balances_rs[5], 2); ?></small></h2>

												</div>
											</div>
										</div>
									<?php
									}
									?>
								</div>
							</div>

						</div>


						<div class="row" style="margin-top: 40px;">
							<div class="col-md-4">
								&nbsp;
							</div>
							<div class="col-md-5">
								&nbsp;
							</div>
							<div class="col-md-3">
								<h5 class="text-black text-center" style="font-weight: bold; padding: 10px;"><?php echo $_SESSION['fullName']; ?> <br><b style="font-weight: normal">(Signature)</b></h5>
								<h5 style="font-weight: normal; padding-left: 10px;">
									<hr style="border-top: 1px solid black;">
								</h5>
							</div>
						</div>

					</div>

				</div>

			</div>

		</div>

	</main>

	<!-- Essential javascripts for application to work-->
	<?php include("library/footer.php"); ?>
	<?php include("library/scripts.php"); ?>
	<script type="text/javascript">
		$("#txtInvestorNameInvestorsReport").select2();
	</script>
	<script type="text/javascript">
		$("#cmbInvestmentTypeInvestorsReport").select2();
	</script>
	<script type="text/javascript">
		$("#cmbRepresentitiveInvestorsReport").select2();
	</script>

</body>

</html>