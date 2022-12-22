<?php
	session_start();
	include("library/conn.php");
	
    $role_rs = array();
    $get_role_mode = mysqli_query($conn, "SELECT * FROM user_role_privileges WHERE userID = '" . $_SESSION['userIdd'] . "' AND roleName = 'diseases'") or die(mysqli_error($conn));
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
        <title>Diseases => <?php echo $_SESSION['systemName']; ?></title>
	</head>
	<body class="app sidebar-mini">

		<!-- Navbar-->
		<?php include("library/header.php");?>
		<!-- Sidebar menu-->
		<?php include("library/sidebar.php");?>
		<main class="app-content">
			<div class="app-title">
				<div>
					<h4><i class="fa fa-calendar fa-lg"></i> DISEASES</h4>
					<p>Diseases List Page</p>
				</div>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-home"></i></li>
					<li class="breadcrumb-item"><a href="diseases">Diseases</a></li>
				</ul>
			</div>
      
			<!-- investment types modal -->
			<!-- Button trigger modal -->
			<div class="row" style="padding-bottom: 10px;">
				<div class="col-md-12">
				    <?php
                        if ($_SESSION['userType'] == 0) {
                            ?><button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#registerDiseaseModal"><i class="fa fa-plus"></i> New Disease</button><?php
                        } else {
                            if ($role_rs[3] == '1') {
                                ?><button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#registerDiseaseModal"><i class="fa fa-plus"></i> New Disease</button><?php
                            }
                        }
                    ?>
				</div>
			</div>

			<?php include("models/admin_config.php");?>
			<?php include("models/system_config.php");?>

			<!-- Investment Types page -->
			<div class="row">
				<div class="col-md-12">
					<div class="tile">
						<div class="tile-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-sm" id="diseasesTable">
									<thead>
										<tr align="center">
                                            <th>Serial No</th>
                                            <th>Disease ID</th>
                                            <th>Disease Name</th>
                                            <th>Disease Drug</th>
                                            <th>Department Name</th>
                                            <?php if ($role_rs[4] == '0' && $role_rs[5] == '0') { } else {?><th><center>Action</center></th><?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php
											$getDiseases = mysqli_query($conn, "SELECT diseases.rowNo,diseases.disease_id,departments.department_name,diseases.disease_name,diseases.disease_drug FROM diseases
                                            INNER JOIN departments ON departments.department_id = diseases.department_id") or die(mysqli_error($conn));
											$x = 1;
											while ($rs = mysqli_fetch_array($getDiseases)) {
												?>
													<tr>
														<td align="center"><?php echo $x; ?></td>                          
														<td align="center"><?php echo $rs[1]; ?></td>
														<td align="center"><?php echo $rs[3]; ?></td>
														<td align="center"><?php echo $rs[4]; ?></td>
														<td align="center"><?php echo $rs[2]; ?></td>
														
														<?php
                                                            if ($_SESSION['userType'] == 0) {
                                                                ?><td align="center">
                                                                    <span class="btn btn-primary btn-sm btnUpdateDisease" id="<?php echo "Update" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>" data-toggle="modal" data-target="#updateDiseaseModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                                                    <span class="btn btn-danger btn-sm btnDeleteDisease" id="<?php echo "Delete" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
                                                                </td><?php
                                                            } else {
                                                                if ($role_rs[4] == '1' && $role_rs[5] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="btn btn-primary btn-sm btnUpdateDisease" id="<?php echo "Update" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>" data-toggle="modal" data-target="#updateDiseaseModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                                                        <span class="btn btn-danger btn-sm btnDeleteDisease" id="<?php echo "Delete" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
                                                                    </td><?php
                                                                } else if ($role_rs[4] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="btn btn-primary btn-sm btnUpdateDisease" id="<?php echo "Update" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>" data-toggle="modal" data-target="#updateDiseaseModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                                                    </td><?php
                                                                } else if ($role_rs[5] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="btn btn-danger btn-sm btnDeleteDisease" id="<?php echo "Delete" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
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
		<script type="text/javascript">$('#diseasesTable').DataTable({"pageLength": 100});</script>
		<script type="text/javascript">
    $("#cmDiseaseDepartmentName").select2({
        tags: true,
        dropdownParent: $("#registerDiseaseModal")
    });
    </script>
    <script type="text/javascript">
    $("#cmDiseaseDepartmentNameU").select2({
        tags: true,
        dropdownParent: $("#updateDiseaseModal")
    });

	</body>
</html>