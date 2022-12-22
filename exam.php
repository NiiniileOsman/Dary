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
    <?php include("library/head.php"); ?>
    <title>Exam Catagories => <?php echo $_SESSION['systemName']; ?></title>
</head>

<body class="app sidebar-mini">

    <!-- Navbar-->
    <?php include("library/header.php"); ?>
    <!-- Sidebar menu-->
    <?php include("library/sidebar.php"); ?>
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

        <?php include("models/admin_config.php"); ?>
        <?php include("models/system_config.php"); ?>

        <div class="row">



            <div class="col-md-12">
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
                                        <?php if ($role_rs[4] == '0' && $role_rs[5] == '0') {
                                        } else { ?><th>
                                                <center>Action</center>
                                            </th><?php } ?>
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
                                                    <span class="btn btn-primary btn-sm btnUpdateExam_Catagory" id="<?php echo "Update" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>" data-toggle="modal" data-target="#updateExam_CatagoryModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                                    <span class="btn btn-danger btn-sm btnDeleteExam_Catagory" id="<?php echo "Delete" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
                                                </td><?php
                                                    } else {
                                                        if ($role_rs[4] == '1' && $role_rs[5] == '1') {
                                                        ?><td align="center">
                                                        <span class="btn btn-primary btn-sm btnUpdateExam_Catagory" id="<?php echo "Update" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>" data-toggle="modal" data-target="#updateExam_CatagoryModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                                        <span class="btn btn-danger btn-sm btnDeleteExam_Catagory" id="<?php echo "Delete" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
                                                    </td><?php
                                                        } else if ($role_rs[4] == '1') {
                                                            ?><td align="center">
                                                        <span class="btn btn-primary btn-sm btnUpdateExam_Catagory" id="<?php echo "Update" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>" data-toggle="modal" data-target="#updateExam_CatagoryModal"><i class="fa fa-fw fa-lg fa-edit"></i> Edit</span>
                                                    </td><?php
                                                        } else if ($role_rs[5] == '1') {
                                                            ?><td align="center">
                                                        <span class="btn btn-danger btn-sm btnDeleteExam_Catagory" id="<?php echo "Delete" . $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Delete</span>
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
        $('#Exam_CatagorysTable').DataTable({
            "pageLength": 100
        });
    </script>


</body>

</html>