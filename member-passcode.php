<?php
session_start();
include("library/conn.php");

$role_rs = array();
$get_role_mode = mysqli_query($conn, "SELECT * FROM user_role_privileges WHERE userID = '" . $_SESSION['userIdd'] . "' AND roleName = 'members'") or die(mysqli_error($conn));
if (mysqli_num_rows($get_role_mode) > 0) {
    $role_rs = mysqli_fetch_array($get_role_mode);
} else {
    $role_rs = ['-1', '-1', '-1', '-1', '-1', '-1'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("library/head.php"); ?>
    <title>Member Passcode => <?php echo $_SESSION['systemName']; ?></title>
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
                <h4><i class="fa fa-key fa-lg"></i> MEMBER PASSCODE</h4>
                <p>Member Passcode List Page</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
                <li class="breadcrumb-item"><a href="member-passcode">Member Passcode</a></li>
            </ul>
        </div>

        <?php include("models/admin_config.php"); ?>
        <?php include("models/system_config.php"); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-sm" id="memberPasscodeTable">
                                <thead>
                                    <tr align="center">
                                        <th>Member ID</th>
                                        <th>Member Photo</th>
                                        <th>Member Name</th>
                                        <th>Member Passcode</th>
                                        <?php if ($role_rs[4] == '0' && $role_rs[5] == '0') { } else { ?><th><center>Action</center></th><?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $getMembersList = mysqli_query($conn, "SELECT members.memberID, members.memberPhoto, members.memberName, members.memberPasscode FROM members ORDER BY memberName") or die(mysqli_error($conn));
                                    $x = 1;
                                    while ($rs = mysqli_fetch_array($getMembersList)) {
                                    ?>
                                        <tr>
                                            <td align="center"><?php echo $rs[0]; ?></td>
                                            <td class="py-1" align="center"><img class="img-fluid rounded-circle" src="<?php echo $rs[1]; ?>" width="35px" height="35px" /></td>
                                            <td align="left"><?php echo ucwords(strtolower($rs[2]), " "); ?></td>
                                            <td align="center"><?php echo $rs[3]; ?></td>
                                            <?php
                                                if ($_SESSION['userType'] == 0) {
                                                    ?><td align="center">
                                                        <span class="btn btn-success btn-sm btnUpdateMemberPasscode" id="<?php echo "Update" . $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-toggle="modal" data-target="#updateMemberPasscodeModal"><i class="fa fa-fw fa-lg fa-edit"></i> Change Passcode</span>
                                                    </td><?php
                                                } else {
                                                    if ($role_rs[4] == '1') {
                                                        ?><td align="center">
                                                            <span class="btn btn-success btn-sm btnUpdateMemberPasscode" id="<?php echo "Update" . $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-toggle="modal" data-target="#updateMemberPasscodeModal"><i class="fa fa-fw fa-lg fa-edit"></i> Change Passcode</span>
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
    <?php include("library/footer.php"); ?>
    <?php include("library/scripts.php"); ?>
    <script type="text/javascript">
        $('#memberPasscodeTable').DataTable({"pageLength": 100})
    </script>


</body>

</html>