<?php
    session_start();
    include("library/conn.php");
    
    $role_rs = array();
	$get_role_mode = mysqli_query($conn, "SELECT * FROM user_role_privileges WHERE userID = '". $_SESSION['userIdd'] ."' AND roleName = 'payment_gateways'") or die (mysqli_error($conn));
	if (mysqli_num_rows($get_role_mode) > 0) {
		$role_rs = mysqli_fetch_array($get_role_mode);
	} else {
		$role_rs = ['-1', '-1', '-1', '-1', '-1', '-1'];
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Payment Gateways => <?php echo $sys_comp_name; ?></title>
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
                    <h4><i class="fa fa-bank fa-lg"></i> PAYMENT GATEWAYS</h4>
                    <p>Payment Gateways List Page</p>
                </div>
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
                    <li class="breadcrumb-item"><a href="payment-gateways">Payment Gateways</a></li>
                </ul>
            </div>
      
            <!-- Button trigger modal -->
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-md-12">
                    <?php
                        if ($_SESSION['userType'] == 0) {
                            ?><button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#registerPaymentGatewaysModal"><i class="fa fa-plus"></i> New Gateway</button><?php
                        } else {
                            if ($role_rs[3] == '1') {
                                ?><button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#registerPaymentGatewaysModal"><i class="fa fa-plus"></i> New Gateway</button><?php
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
                                <table class="table table-striped table-bordered table-sm" id="paymentGatewaysTable">
                                    <thead>
                                        <tr align="center">
                                            <th>Serial</th>
                                            <th>Gateway Logo</th>
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Created By</th>
                                            <th>Create Date</th>
                                            <?php if ($role_rs[4] == '0' && $role_rs[5] == '0') { } else {?><th><center>Action</center></th><?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $getBankCompanies = mysqli_query($conn, "SELECT payment_gateways.gatewayID, payment_gateways.gatewayType, payment_gateways.gatewayName, users.userName, payment_gateways.registerDate, payment_gateways.gatewayLogo FROM payment_gateways JOIN users ON (payment_gateways.registeredBy = users.userID) ORDER BY payment_gateways.gatewayName ASC") or die(mysqli_error($conn));
                                            $x = 1;
                                            $bank_comp_types = array("Bank Payment", "Mobile Payment", "Cash Payment");
                                            while ($rs = mysqli_fetch_array($getBankCompanies)) {
                                                ?>
                                                    <tr>
                                                        <td align="center"><?php echo $x; ?></td>
                                                        <td class="py-1" align="center"><img class="img-fluid rounded-square" src="<?php echo $rs[5]; ?>" width="35px" height="35px"/></td>
                                                        <td align="left"><?php echo $bank_comp_types[$rs[1] - 1]; ?></td>
                                                        <td align="left"><?php echo $rs[2]; ?></td>
                                                        <td align="left"><?php echo $rs[3]; ?></td>
                                                        <td align="center"><?php echo substr($rs[4], 0, 10); ?></td>
                                                        <?php
                                                            if ($_SESSION['userType'] == 0) {
                                                                ?><td align="center">
                                                                    <span class="badge badge-success btnUpdateGateway" style="cursor: pointer; padding: 11px 8px;" id="<?php echo "Update". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-toggle="modal" data-target="#updatePaymentGatewaysModal"><i class="fa fa-fw fa-lg fa-edit"></i></span>  
                                                                    <span class="badge badge-danger btnDeleteGateway" style="cursor: pointer; padding: 11px 8px;" id="<?php echo "Delete". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i></span> 
                                                                </td><?php
                                                            } else {
                                                                if ($role_rs[4] == '1' && $role_rs[5] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="badge badge-success btnUpdateGateway" style="cursor: pointer; padding: 11px 8px;" id="<?php echo "Update". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-toggle="modal" data-target="#updatePaymentGatewaysModal"><i class="fa fa-fw fa-lg fa-edit"></i></span>  
                                                                        <span class="badge badge-danger btnDeleteGateway" style="cursor: pointer; padding: 11px 8px;" id="<?php echo "Delete". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i></span> 
                                                                    </td><?php
                                                                } else if ($role_rs[4] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="badge badge-success btnUpdateGateway" style="cursor: pointer; padding: 11px 8px;" id="<?php echo "Update". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>" data-toggle="modal" data-target="#updatePaymentGatewaysModal"><i class="fa fa-fw fa-lg fa-edit"></i></span>  
                                                                    </td><?php
                                                                } else if ($role_rs[5] == '1') {
                                                                    ?><td align="center">
                                                                        <span class="badge badge-danger btnDeleteGateway" style="cursor: pointer; padding: 11px 8px;" id="<?php echo "Delete". $rs[0]; ?>" data-id="<?php echo $rs[0]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i></span> 
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
    	<script type="text/javascript">$('#paymentGatewaysTable').DataTable({"pageLength": 100});</script>
    	<script type="text/javascript"> $("#cmbGatewayType").select2({ tags: false, dropdownParent: $("#registerPaymentGatewaysModal") });</script>

    </body>
</html>