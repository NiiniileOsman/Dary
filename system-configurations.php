<?php
session_start();
include("library/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("library/head.php"); ?>
	<title>System Configurations => <?php echo $_SESSION["systemName"]; ?></title>
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
				<h3><i class="fa fa-gear"></i> <b>SYSTEM CONFIGURATIONS</b></h3>
				<p>System Configurations Page</p>
			</div>
			<ul class="app-breadcrumb breadcrumb">
				<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="system-configurations">System Configurations</a></li>
			</ul>
		</div>

		<?php include("models/admin_config.php"); ?>
		<?php include("models/system_config.php"); ?>

		<div class="tile">
			<div class="tile-body">

				<div class="row" style="margin: 0px;">

					<!-- Update System Favicon Logo -->
					<div class="col-md-4 mt-4">
						<div class="card">
							<div class="card-header">
								<span class="text-primary">System Favicon</span>
							</div>
							<div class="card-body">

								<form action="#" method="POST" id="updateSystemFaviconForm" enctype="multipart/form-data">
									<div class="row">
										<input type="hidden" name="txtSystemIdd" id="txtSystemIdd" value="<?php echo $_SESSION['systemID']; ?>" />
										<div class="col-md-4 text-center">
											<img class='img-responsive' src="<?php echo $_SESSION['systemFavIcon']; ?>" id="systemFavIconTarget" width="56px" height="56px" /><br><br>
										</div>
										<div class="col-md-8">
											<label class="btn btn-primary btn-sm col-md-12">
												<i class="fa fa-upload"> </i> Upload Icon <input type="file" class="form-control" name="systemFavIconPhoto" id="systemFavIconPhoto" hidden>
											</label>
										</div>
										<input type="hidden" name="photoUpdateFavicon" id="photoUpdateFavicon" value="<?php echo $_SESSION['systemFavIcon']; ?>" />

										<script>
											var sys_favicon_src = document.getElementById("systemFavIconPhoto");
											var sys_favicon_target = document.getElementById("systemFavIconTarget");

											function showFavIconImage(sys_favicon_src, sys_favicon_target) {
												var upl = new FileReader();
												upl.onload = function(e) {
													sys_favicon_target.src = this.result;
												};
												sys_favicon_src.addEventListener("change", function() {
													upl.readAsDataURL(sys_favicon_src.files[0]);
												})
											}
											showFavIconImage(sys_favicon_src, sys_favicon_target);
										</script>

									</div>

									<div class="tile-footer" style="text-align: right;">
										<button type="submit" class="btn btn-success" name="btnUpdateSystemFavIcon" id="btnUpdateSystemFavIcon"><i class="fa fa-fw fa-lg fa-pencil"></i>Update System Favicon</button>
									</div>
								</form>
							</div>

						</div>
					</div>

					<!-- Update System Name -->
					<div class="col-md-8 mt-4">

						<div class="card">
							<div class="card-header">
								<span class="text-primary">System Name</span>
							</div>
							<div class="card-body">
								<form action="#" method="POST" id="updateSystemNameForm">
									<div class="row">
										<input type="hidden" name="txtSystemNameSystemIddd" id="txtSystemNameSystemIddd" value="<?php echo $_SESSION['systemID']; ?>" />
										<div class="form-group col-md-12">
											<label class="control-label">System Name</label>
											<input class="form-control" type="text" name="txtUpdateSystemName" id="txtUpdateSystemName" value="<?php echo $_SESSION['systemName']; ?>" placeholder="Ex: Tusmo Technology System" required>
										</div>
									</div>

									<div class="tile-footer" style="margin: 0; text-align: right;">
										<button type="submit" class="btn btn-success" name="btnUpdateSystemName" id="btnUpdateSystemName"><i class="fa fa-fw fa-lg fa-pencil"></i>Update System Name</button>
									</div>
								</form>
							</div>
						</div>

					</div>

				</div>

				<br><br>

				<div class="row" style="margin: 0px;">

					<!-- Update System Login Page Image -->
					<div class="col-md-6 mt-2">
						<div class="card">
							<div class="card-header">
								<span class="text-primary">Login Page Image</span>
							</div>
							<div class="card-body">

								<form action="#" method="POST" id="updateLoginPageImageForm" enctype="multipart/form-data">
									<div class="row">
										<input type="hidden" name="txtLoginPageImageSystemIdd" id="txtLoginPageImageSystemIdd" value="<?php echo $_SESSION['systemID']; ?>" />
										<div class="col-md-12 text-center">
											<img class="img-responsive img-thumbnail rounded" style="background: #7406C1;" src="<?php echo $_SESSION['loginPageImage'] ?>" id="systemLoginPageImageTarget" width="100%" height="50px" /><br><br>
										</div>
										<div class="col-md-12">
											<label class="btn btn-primary btn-sm col-md-12">
												<i class="fa fa-upload"> </i> Upload Image <input type="file" class="form-control" name="systemLoginPagePhoto" id="systemLoginPagePhoto" hidden>
											</label>
										</div>
										<input type="hidden" name="photoUpdateLoginPageImage" id="photoUpdateLoginPageImage" value="<?php echo $_SESSION['loginPageImage']; ?>" />

										<script>
											var sys_login_image_src = document.getElementById("systemLoginPagePhoto");
											var sys_login_image_target = document.getElementById("systemLoginPageImageTarget");

											function showLoginPageImage(sys_login_image_src, sys_login_image_target) {
												var upl = new FileReader();
												upl.onload = function(e) {
													sys_login_image_target.src = this.result;
												};
												sys_login_image_src.addEventListener("change", function() {
													upl.readAsDataURL(sys_login_image_src.files[0]);
												})
											}
											showLoginPageImage(sys_login_image_src, sys_login_image_target);
										</script>

									</div>

									<div class="tile-footer" style="text-align: right;">
										<button type="submit" class="btn btn-success" name="btnUpdateLoginPageImage" id="btnUpdateLoginPageImage"><i class="fa fa-fw fa-lg fa-pencil"></i>Update Image</button>
									</div>
								</form>
							</div>

						</div>
					</div>

					<!-- Update Header Logo Image -->
					<div class="col-md-6 mt-2">
						<div class="card">
							<div class="card-header">
								<span class="text-primary">Header Logo Image</span>
							</div>
							<div class="card-body">

								<form action="#" method="POST" id="updateHeaderLogoImageForm" enctype="multipart/form-data">
									<div class="row">
										<input type="text" name="txtheaderImageSystemIdd" id="txtheaderImageSystemIdd" value="<?php echo $_SESSION['systemID']; ?>" />
										<!-- uploads/photos/Header_Image_SYS2-2022_0. -->
										<div class="col-md-12 text-center">
											<img class="img-responsive img-thumbnail rounded" style="background: #7406C1;" src="<?php echo $_SESSION['headerLogo'] ?>" id="systemHeaderLogoImageTarget" width="100%" height="50px" /><br><br>
										</div>
										<div class="col-md-12">
											<label class="btn btn-primary btn-sm col-md-12">
												<i class="fa fa-upload"> </i> Upload Logo <input type="file" class="form-control" name="systemHeaderLogoPhoto" id="systemHeaderLogoPhoto" hidden>
											</label>
										</div>
										<input type="hidden" name="photoUpdateheaderPageImage" id="photoUpdateheaderPageImage" value="<?php echo $_SESSION['headerLogo']; ?>" />
										<script>
											var sys_header_logo_src = document.getElementById("systemHeaderLogoPhoto");
											var sys_header_logo_target = document.getElementById("systemHeaderLogoImageTarget");

											function showHeaderLogoImage(sys_header_logo_src, sys_header_logo_target) {
												var upl = new FileReader();
												upl.onload = function(e) {
													sys_header_logo_target.src = this.result;
												};
												sys_header_logo_src.addEventListener("change", function() {
													upl.readAsDataURL(sys_header_logo_src.files[0]);
												})
											}
											showHeaderLogoImage(sys_header_logo_src, sys_header_logo_target);
										</script>

									</div>

									<div class="tile-footer" style="text-align: right;">
										<button type="submit" class="btn btn-success" name="btnUpdateHeaderLogoImage" id="btnUpdateHeaderLogoImage"><i class="fa fa-fw fa-lg fa-pencil"></i>Update Image</button>
									</div>
								</form>
							</div>

						</div>

					</div>

				</div>

				<br><br>

				<div class="row" style="margin: 0px;">

					<!-- Update System Reports Header Image Image -->
					<div class="col-md-12 mt-2">
						<div class="card">
							<div class="card-header">
								<span class="text-primary">Reports Header Image</span>
							</div>
							<div class="card-body">

								<form action="#" method="POST" id="updateReportsHeaderImageForm" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-12 text-center">
											<img class="img-responsive img-thumbnail rounded" src="<?php echo $_SESSION['reportsHeaderImage'] ?>" id="systemReportdHeaderImageTarget" width="100%" height="50px" /><br><br>
										</div>
										<div class="col-md-12">
											<label class="btn btn-primary btn-sm col-md-12">
												<i class="fa fa-upload"> </i> Upload Image <input type="file" class="form-control" name="systemReportsHeaderPhoto" id="systemReportsHeaderPhoto" hidden>
											</label>
										</div>
										<script>
											var sys_reports_header_src = document.getElementById("systemReportsHeaderPhoto");
											var sys_reports_header_target = document.getElementById("systemReportdHeaderImageTarget");

											function showReportsHeaderImage(sys_reports_header_src, sys_reports_header_target) {
												var upl = new FileReader();
												upl.onload = function(e) {
													sys_reports_header_target.src = this.result;
												};
												sys_reports_header_src.addEventListener("change", function() {
													upl.readAsDataURL(sys_reports_header_src.files[0]);
												})
											}
											showReportsHeaderImage(sys_reports_header_src, sys_reports_header_target);
										</script>

									</div>

									<div class="tile-footer" style="text-align: right;">
										<button type="submit" class="btn btn-success" name="btnUpdateReportsHeaderImage" id="btnUpdateReportsHeaderImage"><i class="fa fa-fw fa-lg fa-pencil"></i>Update Image</button>
									</div>
								</form>
							</div>

						</div>
					</div>

				</div>

				<br><br>

				<div class="row" style="margin: 0px;">

					<!-- Update Dashboard Header Title -->
					<div class="col-md-6 mb-4">

						<div class="card">
							<div class="card-header">
								<span class="text-primary">Dashboard Header Title </span>
							</div>
							<div class="card-body">
								<form action="#" method="POST" id="updateDashboardHeaderTileForm">
									<div class="row">

										<?php $dashboard_header = explode("*#*#*#", $_SESSION["dashboardHeader"]); ?>

										<div class="form-group col-md-12">
											<input type="hidden" name="txtSystemheaderSystemIddd" id="txtSystemheaderSystemIddd" value="<?php echo $_SESSION['systemID']; ?>" />
											<label class="control-label">Font Awesome Icon</label>
											<input class="form-control" type="text" name="txtHeaderTitleIcon" id="txtHeaderTitleIcon" value="<?php echo $dashboard_header[0]; ?>" placeholder="Ex: Tusmo Technology System" required>
										</div>
										<div class="form-group col-md-12">
											<label class="control-label">Header Title</label>
											<input class="form-control" type="text" name="txtHeaderTitleLabel" id="txtHeaderTitleLabel" value="<?php echo $dashboard_header[1]; ?>" placeholder="Ex: Tusmo Technology System" required>
										</div>
									</div>

									<div class="tile-footer" style="margin: 0; text-align: right;">
										<button type="submit" class="btn btn-success" name="btnUpdateHeaderTitle" id="btnUpdateHeaderTitle"><i class="fa fa-fw fa-lg fa-pencil"></i>Update Header</button>
									</div>
								</form>
							</div>
						</div>

					</div>

					<!-- Update Footer Captions -->
					<div class="col-md-6 mb-4">

						<div class="card">
							<div class="card-header">
								<span class="text-primary">Footer Section Captions </span>
							</div>
							<div class="card-body">
								<form action="#" method="POST" id="updateFooterCaptionsForm">
									<div class="row">

										<div class="form-group col-md-12">
											<input type="hidden" name="txtSystemfooterSystemIddd" id="txtSystemfooterSystemIddd" value="<?php echo $_SESSION['systemID']; ?>" />
											<label class="control-label">Footer Caption</label>
											<input class="form-control" type="text" name="txtFooterTitleLabel" id="txtFooterTitleLabel" value="<?php echo $_SESSION["footerCaption"]; ?>" placeholder="Ex: Tusmo Technology System" required>
										</div>
										<div class="form-group col-md-12">
											<label class="control-label">System version</label>
											<input class="form-control" type="text" name="txtfooterversionLabel" id="txtfooterversionLabel" value="<?php echo $_SESSION["systemVersion"]; ?>" placeholder="Ex: Tusmo Technology System" required>
										</div>
									</div>

									<div class="tile-footer" style="margin: 0; text-align: right;">
										<button type="submit" class="btn btn-success" name="btnUpdateFooterSection" id="btnUpdateFooterSection"><i class="fa fa-fw fa-lg fa-pencil"></i>Update Footer</button>
									</div>
								</form>
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