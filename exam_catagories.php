<?php
	session_start();
	include("library/conn.php");
	
    $role_rs = array();
    $get_role_mode = mysqli_query($conn, "SELECT * FROM user_role_privileges WHERE userID = '" . $_SESSION['userIdd'] . "' AND roleName = 'Exam_Catagory'") or die(mysqli_error($conn));
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
        <title>Exam Catagories => <?php echo $_SESSION['systemName']; ?></title>
	</head>
	<body class="app sidebar-mini">

		<!-- Navbar-->
		<?php include("library/header.php");?>
		<!-- Sidebar menu-->
		<?php include("library/sidebar.php");?>
		<main class="app-content">
			<div class="app-title">
				<div>
					<h4><i class="fa fa-calendar fa-lg"></i> Exam Catagory</h4>
					<p>Exam Catagories List Page</p>
				</div>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-home"></i></li>
					<li class="breadcrumb-item"><a href="exam_catagories">Exam Catagories</a></li>
				</ul>
			</div>
      
			<!-- investment types modal -->
			<!-- Button trigger modal -->
			 <div class="row" style="padding-bottom: 10px;">
				<div class="col-md-12">
				    <?php
                        if ($_SESSION['userType'] == 0) {
                            ?><button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#RegsiterExamCatModal"><i class="fa fa-plus"></i> New Exam_Catagory</button><?php
                        } else {
                            if ($role_rs[3] == '1') {
                                ?><button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#RegsiterExamCatModal"><i class="fa fa-plus"></i> New Exam_Catagory</button><?php
                            }
                        }
                    ?>
				</div>
			</div>

			<?php include("models/admin_config.php");?>
			<?php include("models/system_config.php");?>

			<div class="row">

                <div class="col-md-4">
                    <div class="tile">
						<h3 class="text-white bg-primary rounded-top" style="padding: 12px 10px 12px 10px;">New Catagory</h3>
                        <form action="#" method="POST" id="registerExam_CatagoryForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Catagory Name</label>
                                            <input class="form-control" type="text" name="txtExam_CatagoryName" id="txtExam_CatagoryName" placeholder="Ex: Blood Group" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Catagory Description</label>
                                            <input class="form-control" type="text" name="txtEx_CatagoryDescription" id="txtEx_CatagoryDescription"  required>
                                        </div>
										<input class="form-control" type="hidden" name="txtRegisterUser" id="txtRegisterUser" value="<?php echo $_SESSION['userIdd']; ?>" required>
                                        <input class="form-control" type="hidden" name="txtRegisterDate" id="txtRegisterDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>
										<input class="form-control" type="hidden" name="txtExam_CatagoryId" id="txtExam_CatagoryId">
										<div class="form-group col-sm-6">
                                            <input class="form-control" type="hidden" name="txtExam_CatagoryUpdatedUser"
                                                id="txtExam_CatagoryUpdatedUser"
                                                value="<?php echo $_SESSION['userIdd']; ?>" required>
                                            <input class="form-control" type="hidden" name="txtExam_CatagoryUpdateDate"
                                                id="txtExam_CatagoryUpdateDate" value="<?php echo date("Y-m-d H:i:s"); ?>"
                                                required>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnRegisterExam_Catagory"
                                    id="btnRegisterExam_Catagory"><i class="fa fa-fw fa-lg fa-save"></i>Register
                                    Exam Catagory</button>
                            </div>
                        </form>

                    </div>
                </div>

				<div class="col-md-8">
					<div class="tile">
						<div class="tile-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-sm" id="Exam_CatagorysTable">
									<thead>
										<tr align="center">
                                            <th>Serial No</th>
                                            <th>Exam Catagory ID</th>
                                            <th>Exam Catagory Name</th>
                                            <th>Exam Catagory Description</th>
                                            <?php if ($role_rs[4] == '0' && $role_rs[5] == '0') { } else {?><th><center>Action</center></th><?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php
											$getExam_Catagorys = mysqli_query($conn, "SELECT * FROM Exam_Catagory") or die(mysqli_error($conn));
											$x = 1;
											while ($rs = mysqli_fetch_array($getExam_Catagorys)) {
												?>
													<tr>
														<td align="center"><?php echo $x; ?></td>                          
														<td align="center"><?php echo $rs[1]; ?></td>
														<td align="center"><?php echo $rs[2]; ?></td>
														<td align="center"><?php echo $rs[3]; ?></td>
														
														<?php
                                                            if ($_SESSION['userType'] == 0) {
                                                                ?><td align="center">
                                                                    <span class="btn btn-primary btn-sm btnUpdateExam_Catagory" id="<?php echo "Update" . $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-toggle="modal" data-target="#updateExam_CatagoryModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                                                    <span class="btn btn-danger btn-sm btnDeleteExam_Catagory" id="<?php echo "Delete" . $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
                                                                </td><?php
                                                            } else {
                                                                if ($role_rs[4] == '1' && $role_rs[5] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="btn btn-primary btn-sm btnUpdateExam_Catagory" id="<?php echo "Update" . $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-toggle="modal" data-target="#updateExam_CatagoryModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                                                        <span class="btn btn-danger btn-sm btnDeleteExam_Catagory" id="<?php echo "Delete" . $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
                                                                    </td><?php
                                                                } else if ($role_rs[4] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="btn btn-primary btn-sm btnUpdateExam_Catagory" id="<?php echo "Update" . $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-toggle="modal" data-target="#updateExam_CatagoryModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                                                    </td><?php
                                                                } else if ($role_rs[5] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="btn btn-danger btn-sm btnDeleteExam_Catagory" id="<?php echo "Delete" . $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
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
            <div class="modal fade" data-backdrop="static" style="z-index: 3001; overflow-y: auto;" id="RegsiterExamCatModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5><i class="fa fa-plus"></i> <b>New Catagory</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" style="margin: 0px;">
                        <div class="row" style="margin: 0px;">
                            <div class="form-group col-md-12" align="right">
                                <a class="btn btn-info btn-lg" href="#" id="AddNewCatagory" style="padding-bottom: 8px; padding-top: 7px;"> &nbsp;<i class="fa fa-plus fa-lg"></i> ADD NEW LOCATION</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="#" method="POST" name="RegsiterExamCatForm" id="RegsiterExamCatForm">
                                    <div class="row" id="CatagoryArea">
                                        &nbsp;
                                    </div>


                            </div>

                        </div>
                        <input class="form-control" type="hidden" name="txtRegisterUser" id="txtRegisterUser" value="<?php echo $_SESSION['userIdd']; ?>" required>
                        <input class="form-control" type="hidden" name="txtRegisterDate" id="txtRegisterDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>
                        <input class="form-control" type="hidden" name="txtExam_CatagoryId" id="txtExam_CatagoryId">
                        <div class="form-group col-sm-6">
                            <input class="form-control" type="hidden" name="txtExam_CatagoryUpdatedUser" id="txtExam_CatagoryUpdatedUser" value="<?php echo $_SESSION['userIdd']; ?>" required>
                            <input class="form-control" type="hidden" name="txtExam_CatagoryUpdateDate" id="txtExam_CatagoryUpdateDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>

                        </div>

                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info" name="AddCatagory" id="AddCatagory"><i class="fa fa-fw fa-lg fa-plus"></i>New Catagory(s)</button>&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload()"><i class="fa fa-fw fa-lg fa-close"></i>Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>



            
		</main>
		
		<!-- Essential javascripts for application to work-->
		<?php include("library/footer.php");?>	
		<?php include("library/scripts.php");?>
		<script type="text/javascript">$('#Exam_CatagorysTable').DataTable({"pageLength": 100});</script>
		

	</body>
</html>