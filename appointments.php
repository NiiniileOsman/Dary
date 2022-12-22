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
    <title>Appoinment => <?php echo $_SESSION['systemName']; ?></title>
</head>

<body class="app sidebar-mini">

    <!-- Navbar-->
    <?php include("library/header.php");?>
    <!-- Sidebar menu-->
    <?php include("library/sidebar.php");?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h4><i class="fa fa-calendar fa-lg"></i> APPOINTMENT</h4>
                <p>Appointments List Page</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-calendar"></i></li>
                <li class="breadcrumb-item"><a href="appointments">Appointments</a></li>
            </ul>
        </div>

        <!-- investment types modal -->
        <!-- Button trigger modal -->
        <div class="row" style="padding-bottom: 10px;">
            <div class="col-md-12">
                <?php
                        if ($_SESSION['userType'] == 0) {
                            ?><button type="button" class="btn btn-success pull-right" data-toggle="modal"
                    data-target="#registerAppointmentModal"><i class="fa fa-plus"></i> New Appointment</button><?php
                        } else {
                            if ($role_rs[3] == '1') {
                                ?><button type="button" class="btn btn-success pull-right" data-toggle="modal"
                    data-target="#registerAppointmentModal"><i class="fa fa-plus"></i> New Appointment</button><?php
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
                            <table class="table table-striped table-bordered table-sm" id="appointmentsTable">
                                <thead>
                                    <tr align="center">
                                        <th>Serial</th>
                                        <th>Paient Name</th>
                                        <th>Dactor Name</th>
                                        <th>Appointment Number</th>
                                        <th>Appointment Fee</th>
                                        <th>Discount Fee</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Register Date</th>
                                        <th>
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
											$getAppointment = mysqli_query($conn, "SELECT * FROM appointment_view ORDER BY appointment_id ASC") or die(mysqli_error($conn));
											$x = 1;
											while ($rs = mysqli_fetch_array($getAppointment)) {
												?>
                                    <tr>
                                        <td align="center"><?php echo $x; ?></td>
                                        <td align="left"><?php echo $rs[3]; ?></td>
                                        <td align="left"><?php echo $rs[7]; ?></td>
                                        <td align="center"><?php echo $rs[8]; ?></td>
                                        <td align="center">$<?php echo $rs[9]; ?></td>
                                        <td align="center"><?php echo $rs[10]; ?></td>
                                        <td align="center"><?php echo $rs[11]; ?></td>
                                        <td align="center"><?php echo $rs[12]; ?></td>
                                        <td align="center"><?php echo $rs[13]; ?></td>
                                        <?php
                                                            if ($_SESSION['userType'] == 0) {
                                                                ?><td align="center">
                                            <span class="btn btn-primary btn-sm btnUpdateAppointment"
                                                id="<?php echo "Update" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"
                                                data-toggle="modal" data-target="#updateAppointmentModal"><i
                                                    class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                            <span class="btn btn-danger btn-sm btnDeleteAppointment"
                                                id="<?php echo "Delete" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"><i
                                                    class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
                                        </td><?php
                                                            } else {
                                                                if ($role_rs[4] == '1' && $role_rs[5] == '1') {
                                                                    ?><td align="center">
                                            <span class="btn btn-primary btn-sm btnUpdateAppointment"
                                                id="<?php echo "Update" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"
                                                data-toggle="modal" data-target="#updateAppointmentModal"><i
                                                    class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                            <span class="btn btn-danger btn-sm btnDeleteAppointment"
                                                id="<?php echo "Delete" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"><i
                                                    class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
                                        </td><?php
                                                                } else if ($role_rs[4] == '1') {
                                                                    ?><td align="center">
                                            <span class="btn btn-primary btn-sm btnUpdateAppointment"
                                                id="<?php echo "Update" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"
                                                data-toggle="modal" data-target="#updateAppointmentModal"><i
                                                    class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                        </td><?php
                                                                } else if ($role_rs[5] == '1') {
                                                                    ?><td align="center">
                                            <span class="btn btn-danger btn-sm btnDeleteAppointment"
                                                id="<?php echo "Delete" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"><i
                                                    class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
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
    <script type="text/javascript">
    $('#appointmentsTable').DataTable({
        "pageLength": 100
    });
    </script>
    <script type="text/javascript"> $("#cmDepartmentName").select2({ tags: true, dropdownParent: $("#registerAppointmentModal") });</script>
    <script type="text/javascript"> $("#cmDepartmentNameU").select2({ tags: true, dropdownParent: $("#updateAppointmentModal") });</script>
    <script type="text/javascript"> $("#cmbDoctorNameApp").select2({ tags: true, dropdownParent: $("#registerAppointmentModal") });</script>
    <script type="text/javascript"> $("#cmbDoctorNameAppU").select2({ tags: true, dropdownParent: $("#updateAppointmentModal") });</script>

</body>
</html>