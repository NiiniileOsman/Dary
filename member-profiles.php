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
    <title>Members => <?php echo $_SESSION['systemName']; ?></title>
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
                <h4><i class="fa fa-users fa-lg"></i> MEMBER PROFILES</h4>
                <p>Member Profiles List Page</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
                <li class="breadcrumb-item"><a href="member-profiles">Member Profiles</a></li>
            </ul>
        </div>

        <!-- Button trigger modal -->
        <div class="row" style="padding-bottom: 10px;">
            <div class="col-md-12">
                <?php
                    if ($_SESSION['userType'] == 0) {
                        ?><button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#registerMemberModal"><i class="fa fa-plus"></i> New Member</button><?php
                    } else {
                        if ($role_rs[3] == '1') {
                        ?><button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#registerMemberModal"><i class="fa fa-plus"></i> New Member</button><?php
                        }
                    }
                ?>
            </div>
        </div>

        <?php include("models/admin_config.php"); ?>
        <?php include("models/system_config.php"); ?>

        <!-- Employees page -->
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-sm" id="membersTable">
                                <thead>
                                    <tr align="center">
                                        <th>Photo</th>
                                        <th>Member ID</th>
                                        <th>Member Name</th>
                                        <th>Contribution Amount</th>
                                        <th>Mobile No</th>
                                        <th>Email Address</th>
                                        <th>Status</th>
                                        <?php if ($role_rs[4] == '0' && $role_rs[5] == '0') { } else { ?><th><center>Action</center></th><?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $getMembersList = mysqli_query($conn, "SELECT memberID, memberPhoto, memberName, memberTelephone, memberEmail FROM members ORDER BY memberName ASC") or die(mysqli_error($conn));
                                    $x = 1;
                                    while ($rs = mysqli_fetch_array($getMembersList)) {
                                    ?>
                                        <tr>
                                            <td class="py-1" align="center"><img class="img-fluid rounded-circle" src="<?php echo $rs[1]; ?>" width="35px" height="35px" /></td>
                                            <td align="center"><?php echo $rs[0]; ?></td>
                                            <td align="left"><?php echo ucwords(strtolower($rs[2]), " "); ?></td>
                                            <td align="center"><?php echo "$ " . number_format($rs[3], 2); ?></td>
                                            <td align="center"><?php echo $rs[4]; ?></td>
                                            <td align="left"><?php echo $rs[5]; ?></td>
                                            <td align="center"><?php if ($rs[7] == 1) { echo "<span class='badge badge-success'><i class='fa fa-check-circle'></i> Active</span>"; } else if ($rs[7] == 0) { echo "<span class='badge badge-danger'><i class='fa fa-times-circle'></i> Passive</span>"; } ?></td>
                                            <?php
                                                if ($_SESSION['userType'] == 0) {
                                                    ?><td align="center">
                                                        <span class="btn btn-warning btn-sm btnViewMember" id="<?php echo "View" . $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-toggle="modal" data-target="#viewMemberModal"><i class="fa fa-fw fa-lg fa-print"></i> Print</span>
                                                        <span class="btn btn-primary btn-sm btnUpdateMember" id="<?php echo "Update" . $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-toggle="modal" data-target="#updateMemberModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                                        <span class="btn btn-danger btn-sm btnDeleteMember" id="<?php echo "Delete" . $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
                                                    </td><?php
                                                } else {
                                                    if ($role_rs[4] == '1' && $role_rs[5] == '1') {
                                                        ?><td align="center">
                                                            <span class="btn btn-warning btn-sm btnViewMember" id="<?php echo "View" . $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-toggle="modal" data-target="#viewMemberModal"><i class="fa fa-fw fa-lg fa-print"></i> Print</span>
                                                            <span class="btn btn-primary btn-sm btnUpdateMember" id="<?php echo "Update" . $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-toggle="modal" data-target="#updateMemberModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                                            <span class="btn btn-danger btn-sm btnDeleteMember" id="<?php echo "Delete" . $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
                                                        </td><?php
                                                    } else if ($role_rs[4] == '1') {
                                                        ?><td align="center">
                                                            <span class="btn btn-primary btn-sm btnUpdateMember" id="<?php echo "Update" . $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-toggle="modal" data-target="#updateMemberModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                                        </td><?php
                                                    } else if ($role_rs[5] == '1') {
                                                        ?><td align="center">
                                                            <span class="btn btn-danger btn-sm btnDeleteMember" id="<?php echo "Delete" . $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
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
        $('#membersTable').DataTable({
            "pageLength": 100
        })
        $("#cmbMembersSex").select2({
            tags: false,
            dropdownParent: $("#registerMemberModal")
        })
        $("#cmbMembersMaritalStatus").select2({
            tags: false,
            dropdownParent: $("#registerMemberModal")
        })
        $("#cmbMembersJobStatus").select2({
            tags: false,
            dropdownParent: $("#registerMemberModal")
        })
        $("#cmbMembersProfessionalExperience").select2({
            tags: false,
            dropdownParent: $("#registerMemberModal")
        })
        $("#cmbMembersMemberStatus").select2({
            tags: false,
            dropdownParent: $("#registerMemberModal")
        })
        $("#cmbMembersMemberContributionType").select2({
            tags: false,
            dropdownParent: $("#registerMemberModal")
        })
    </script>


</body>

</html>