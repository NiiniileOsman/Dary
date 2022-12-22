<?php
    session_start();
    include("library/conn.php");
    
    $role_rs = array();
	$get_role_mode = mysqli_query($conn, "SELECT * FROM user_role_privileges WHERE userID = '". $_SESSION['userIdd'] ."' AND roleName = 'employees'") or die (mysqli_error($conn));
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
        <title>Employees => <?php echo $_SESSION['systemName']; ?></title>
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
                    <h4><i class="fa fa-users fa-lg"></i> EMPLOYEES</h4>
                    <p>Employees List Page</p>
                </div>
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
                    <li class="breadcrumb-item"><a href="employees">Employees</a></li>
                </ul>
            </div>
      
            <!-- Button trigger modal -->
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-md-12">
                    <?php
                        if ($_SESSION['userType'] == 0) {
                            ?><button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#registerEmployeeModal"><i class="fa fa-plus"></i> New Employee</button><?php
                        } else {
                            if ($role_rs[3] == '1') {
                                ?><button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#registerEmployeeModal"><i class="fa fa-plus"></i> New Employee</button><?php
                            }
                        }
                    ?>
                </div>
            </div>

            <?php include("models/admin_config.php");?>
            <?php include("models/system_config.php");?>

            <!-- Employees page -->
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-sm" id="empTable">
                                    <thead>
                                        <tr align="center">
                                            <th>Serial</th>
                                            <th>Photo</th>
                                            <th>Employee Name</th>
                                            <th>Position</th>
                                            <th>Salary</th>
                                            <th>Telephone</th>
                                            <th>Register Date</th>
                                            <th>Status</th>
                                            <?php if ($role_rs[4] == '0' && $role_rs[5] == '0') { } else {?><th><center>Action</center></th><?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        	$positions_array = array("Super Admin", "Admin", "Finance", "Registrar");
                                            $getEmployees = mysqli_query($conn, "SELECT empID, empPhoto, empName, titlePosition, salary, telephoneNo, registerDate, empStatus FROM employees WHERE titlePosition <> 0") or die(mysqli_error($conn));
                                            $x = 1;
                                            while ($rs = mysqli_fetch_array($getEmployees)) {
                                                ?>
                                                    <tr>
                                                        <td align="center"><?php echo $x; ?></td>
                                                        <td class="py-1" align="center"><img class="img-fluid rounded-circle" src="<?php echo $rs[1]; ?>" width="35px" height="35px"/></td>
                                                        <td align="left"><?php echo $rs[2]; ?></td>
                                                        <td align="left"><?php echo $positions_array[$rs[3]]; ?></td>
                                                        <td align="center"><?php echo "$ ".number_format($rs[4], 2); ?></td>
                                                        <td align="center"><?php echo $rs[5]; ?></td>
                                                        <td align="center"><?php echo substr($rs[6], 0, 10); ?></td>
                                                        <td align="center"><?php if ($rs[7] == "1") { echo "<span class='badge badge-success'><i class='fa fa-check-circle'></i> Active</span>"; } else { echo "<span class='badge badge-danger'><i class='fa fa-times-circle'></i> Left</span>"; } ?></td>
                                                        <?php
                                                            if ($_SESSION['userType'] == 0) {
                                                                ?><td align="center">
                                                                    <span class="btn btn-primary btn-sm btnUpdateEmployee" id="<?php echo "Update". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-toggle="modal" data-target="#updateEmployeeModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>  
                                                                    <span class="btn btn-danger btn-sm btnDeleteEmployee" id="<?php echo "Delete". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span> 
                                                                </td><?php
                                                            } else {
                                                                if ($role_rs[4] == '1' && $role_rs[5] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="btn btn-primary btn-sm btnUpdateEmployee" id="<?php echo "Update". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-toggle="modal" data-target="#updateEmployeeModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>  
                                                                        <span class="btn btn-danger btn-sm btnDeleteEmployee" id="<?php echo "Delete". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span> 
                                                                    </td><?php
                                                                } else if ($role_rs[4] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="btn btn-primary btn-sm btnUpdateEmployee" id="<?php echo "Update". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-toggle="modal" data-target="#updateEmployeeModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>  
                                                                    </td><?php
                                                                } else if ($role_rs[5] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="btn btn-danger btn-sm btnDeleteEmployee" id="<?php echo "Delete". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span> 
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
        <script type="text/javascript">$('#employeesTable').DataTable({"pageLength": 100});</script>
		<script type="text/javascript"> $("#cmbEmployeesEmployeeTitle").select2({ tags: true, dropdownParent: $("#registerEmployeeModal") });</script>
		<script type="text/javascript"> $("#cmbEmployeesEmployeeIdentiDocType").select2({ tags: true, dropdownParent: $("#registerEmployeeModal") });</script>
		<script type="text/javascript"> $("#cmbEmployeesEmployeeStatus").select2({ tags: true, dropdownParent: $("#registerEmployeeModal") });</script>
		<script type="text/javascript"> $("#employeeTitleUp").select2({ tags: true, dropdownParent: $("#updateEmployeeModal") });</script>
		<script type="text/javascript"> $("#identiDocTypeUp").select2({ tags: true, dropdownParent: $("#updateEmployeeModal") });</script>
		<script type="text/javascript"> $("#empStatusUp").select2({ tags: true, dropdownParent: $("#updateEmployeeModal") });</script>

    </body>
</html>