<?php
    session_start();
    include("library/conn.php");
    
    $role_rs = array();
	$get_role_mode = mysqli_query($conn, "SELECT * FROM user_role_privileges WHERE userID = '". $_SESSION['userIdd'] ."' AND roleName = 'users'") or die (mysqli_error($conn));
	if (mysqli_num_rows($get_role_mode) > 0) {
		$role_rs = mysqli_fetch_array($get_role_mode);
	} else {
		$role_rs = ['-1', '-1', '-1', '-1', '-1', '-1'];
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Users => <?php echo $sys_comp_name; ?></title>
        <?php include("library/head.php");?>
    </head>
    <body class="app sidebar-mini">

        <!-- Navbar-->
        <?php include("library/header.php");?>
        <!-- Sidebar menu-->
        <?php include("library/sidebar.php");?>
        <main class="app-content">
            <div class="app-title">
                <div>
                    <h4><i class="fa fa-user fa-lg"></i> SYSTEM USERS</h4>
                    <p>User List Page</p>
                </div>
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
                    <li class="breadcrumb-item"><a href="system-users">Users</a></li>
                </ul>
            </div>
      
            <!-- Users modal -->
            <!-- Button trigger modal -->
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-md-12">
                    <?php
                        if ($_SESSION['userType'] == 0) {
                            ?><button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#registerUserModal"><i class="fa fa-plus"></i> New User</button><?php
                        } else {
                            if ($role_rs[3] == '1') {
                                ?><button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#registerUserModal"><i class="fa fa-plus"></i> New User</button><?php
                            }
                        }
                    ?>
                </div>
            </div>

            <?php include("models/admin_config.php");?>
            <?php include("models/system_config.php");?>

            <!-- Users page -->
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-sm" id="usersTable">
                                    <thead>
                                        <tr align="center">
                                            <th>Serial No</th>
                                            <th>Photo</th>
                                            <th>Full Name</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>2-Step Verify</th>
                                            <th>Verify Code</th>
                                            <th>User Status</th>
                                            <?php if ($role_rs[4] == '0' && $role_rs[5] == '0') { } else {?><th><center>Action</center></th><?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $getUsers = mysqli_query($conn, "SELECT users.userID, employees.empPhoto, employees.empName, users.userName, users.password, users.twoStepVerification, users.verificationCode, users.userStatus FROM employees JOIN users ON (employees.empID = users.empID AND users.userID NOT IN (SELECT userID FROM users WHERE userID = '". $_SESSION['userIdd'] ."') AND employees.titlePosition <> 'Super Admin')") or die(mysqli_error($conn));
                                            $x = 1;
                                            while ($rs = mysqli_fetch_array($getUsers)) {
                                                ?>
                                                    <tr>
                                                        <td align="center"><?php echo $x; ?></td>
                                                        <td class="py-1" align="center"><img class="img-fluid rounded-circle" src="<?php echo $rs[1]; ?>" width="35px" height="35px"/></td>
                                                        <td align="left"><?php echo $rs[2]; ?></td>
                                                        <td align="left"><?php echo $rs[3]; ?></td>
                                                        <td align="left"><?php echo $rs[4]; ?></td>
                                                        <td align="center">
                                                            <?php 
                                                                if ($rs[5] == "Enabled") {
                                                                    ?>
                                                                        <div class="toggle lg">
                                                                            <label>
                                                                                <input type="checkbox" id="cbxStepVerificationStatus" name="cbxStepVerificationStatus" checked><span class="button-indecator"></span>
                                                                            </label>
                                                                        </div>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                        <div class="toggle lg">
                                                                            <label>
                                                                                <input type="checkbox" id="cbxStepVerificationStatus" name="cbxStepVerificationStatus"><span class="button-indecator"></span>
                                                                            </label>
                                                                        </div>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </td>
                                                        <td align="center"><?php echo $rs[6]; ?></td>
                                                        <td align="center"><?php if ($rs[7] == "Online") { echo "<i class='fa fa-circle fa-lg text-success'></i>"; } else { echo "<i class='fa fa-circle fa-lg text-black'></i>"; } ?></td>
                                                        
                                                        <?php
                                                            if ($_SESSION['userType'] == 0) {
                                                                ?><td align="center">
                                                                    <span class="badge badge-success btnUpdateUser" style="cursor: pointer; padding: 11px 8px;" id="<?php echo "Update". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-src="<?php echo $rs[7]; ?>"  data-toggle="modal" data-target="#updateUserModal"><i class="fa fa-fw fa-lg fa-edit"></i></span>  
                                                                    <span class="badge badge-danger btnDeleteUser" style="cursor: pointer; padding: 11px 8px;" id="<?php echo "Delete". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i></span> 
                                                                </td><?php
                                                            } else {
                                                                if ($role_rs[4] == '1' && $role_rs[5] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="badge badge-success btnUpdateUser" style="cursor: pointer; padding: 11px 8px;" id="<?php echo "Update". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-src="<?php echo $rs[7]; ?>"  data-toggle="modal" data-target="#updateUserModal"><i class="fa fa-fw fa-lg fa-edit"></i></span>  
                                                                        <span class="badge badge-danger btnDeleteUser" style="cursor: pointer; padding: 11px 8px;" id="<?php echo "Delete". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i></span> 
                                                                    </td><?php
                                                                } else if ($role_rs[4] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="badge badge-success btnUpdateUser" style="cursor: pointer; padding: 11px 8px;" id="<?php echo "Update". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-src="<?php echo $rs[7]; ?>"  data-toggle="modal" data-target="#updateUserModal"><i class="fa fa-fw fa-lg fa-edit"></i></span>  
                                                                    </td><?php
                                                                } else if ($role_rs[5] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="badge badge-danger btnDeleteUser" style="cursor: pointer; padding: 11px 8px;" id="<?php echo "Delete". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i></span> 
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
    	<script type="text/javascript">$('#usersTable').DataTable({"pageLength": 100});</script>
    	<script type="text/javascript"> $("#userEmpID").select2({ tags: true, dropdownParent: $("#registerUserModal") });</script>
    	<script type="text/javascript"> $("#users").select2({ tags: true, dropdownParent: $("#registerUserModal") });</script>
    	<script type="text/javascript"> $("#cmb2StepVerification").select2({ tags: true, dropdownParent: $("#registerUserModal") });</script>
    	<script type="text/javascript"> $("#userEmpIDUp").select2({ tags: true, dropdownParent: $("#updateUserModal") });</script>

    </body>
</html>