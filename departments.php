<?php
	session_start();
	include("library/conn.php");
	
    $role_rs = array();
    $get_role_mode = mysqli_query($conn, "SELECT * FROM user_role_privileges WHERE userID = '" . $_SESSION['userIdd'] . "' AND roleName = 'departments'") or die(mysqli_error($conn));
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
        <title>Department => <?php echo $_SESSION['systemName']; ?></title>
	</head>
	<body class="app sidebar-mini">

		<!-- Navbar-->
		<?php include("library/header.php");?>
		<!-- Sidebar menu-->
		<?php include("library/sidebar.php");?>
		<main class="app-content">
			<div class="app-title">
				<div>
					<h4><i class="fa fa-calendar fa-lg"></i> DEPARTMENT</h4>
					<p>Departmens List Page</p>
				</div>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-home"></i></li>
					<li class="breadcrumb-item"><a href="departments">Departmens</a></li>
				</ul>
			</div>
      
			<!-- investment types modal -->
			<!-- Button trigger modal -->
			<!-- <div class="row" style="padding-bottom: 10px;">
				<div class="col-md-12">
				    <?php
                        if ($_SESSION['userType'] == 0) {
                            ?><button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#registerDepartmentModal"><i class="fa fa-plus"></i> New Department</button><?php
                        } else {
                            if ($role_rs[3] == '1') {
                                ?><button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#registerDepartmentModal"><i class="fa fa-plus"></i> New Department</button><?php
                            }
                        }
                    ?>
				</div>
			</div> -->

			<?php include("models/admin_config.php");?>
			<?php include("models/system_config.php");?>

			<div class="row">

                <div class="col-md-4">
                    <div class="tile">
						<h3 class="text-white bg-primary rounded-top" style="padding: 12px 10px 12px 10px;">New Department</h3>
                        <form action="#" method="POST" id="registerDepartmentForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Department Name</label>
                                            <input class="form-control" type="text" name="txtDepartmentName" id="txtDepartmentName" placeholder="Ex: General Surgery" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Appointment Fee</label>
                                            <input class="form-control" type="number" name="txtDepFee" id="txtDepFee" step="0.01" required>
                                        </div>
										<input class="form-control" type="hidden" name="txtRegisterUser" id="txtRegisterUser" value="<?php echo $_SESSION['userIdd']; ?>" required>
                                        <input class="form-control" type="hidden" name="txtRegisterDate" id="txtRegisterDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>
										<input class="form-control" type="hidden" name="txtDepartmentId" id="txtDepartmentId">
										<div class="form-group col-sm-6">
                                            <input class="form-control" type="hidden" name="txtDepartmentUpdatedUser"
                                                id="txtDepartmentUpdatedUser"
                                                value="<?php echo $_SESSION['userIdd']; ?>" required>
                                            <input class="form-control" type="hidden" name="txtDepartmentUpdateDate"
                                                id="txtDepartmentUpdateDate" value="<?php echo date("Y-m-d H:i:s"); ?>"
                                                required>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnRegisterDepartment"
                                    id="btnRegisterDepartment"><i class="fa fa-fw fa-lg fa-save"></i>Register
                                    Department</button>
                            </div>
                        </form>

                    </div>
                </div>

				<div class="col-md-8">
					<div class="tile">
						<div class="tile-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-sm" id="departmentsTable">
									<thead>
										<tr align="center">
                                            <th>Serial No</th>
                                            <th>Department ID</th>
                                            <th>Department Name</th>
                                            <th>Appointment Fee</th>
                                            <?php if ($role_rs[4] == '0' && $role_rs[5] == '0') { } else {?><th><center>Action</center></th><?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php
											$getDepartments = mysqli_query($conn, "SELECT * FROM departments") or die(mysqli_error($conn));
											$x = 1;
											while ($rs = mysqli_fetch_array($getDepartments)) {
												?>
													<tr>
														<td align="center"><?php echo $x; ?></td>                          
														<td align="center"><?php echo $rs[1]; ?></td>
														<td align="center"><?php echo $rs[2]; ?></td>
														<td align="center">$<?php echo $rs[3]; ?></td>
														
														<?php
                                                            if ($_SESSION['userType'] == 0) {
                                                                ?><td align="center">
                                                                    <span class="btn btn-primary btn-sm btnUpdateDepartment" id="<?php echo "Update" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>" data-toggle="modal" data-target="#updateDepartmentModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                                                    <span class="btn btn-danger btn-sm btnDeleteDepartment" id="<?php echo "Delete" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
                                                                </td><?php
                                                            } else {
                                                                if ($role_rs[4] == '1' && $role_rs[5] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="btn btn-primary btn-sm btnUpdateDepartment" id="<?php echo "Update" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>" data-toggle="modal" data-target="#updateDepartmentModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                                                        <span class="btn btn-danger btn-sm btnDeleteDepartment" id="<?php echo "Delete" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
                                                                    </td><?php
                                                                } else if ($role_rs[4] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="btn btn-primary btn-sm btnUpdateDepartment" id="<?php echo "Update" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>" data-toggle="modal" data-target="#updateDepartmentModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                                                    </td><?php
                                                                } else if ($role_rs[5] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="btn btn-danger btn-sm btnDeleteDepartment" id="<?php echo "Delete" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
                                                                    </td><?php
                                                                }
                                                            }
                                                        ?>
													</tr>
												<?php
												$x++;
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		
		<!-- Essential javascripts for application to work-->
		<?php include("library/footer.php");?>	
		<?php include("library/scripts.php");?>
		<script type="text/javascript">$('#departmentsTable').DataTable({"pageLength": 100});</script>
		

	</body>
</html>