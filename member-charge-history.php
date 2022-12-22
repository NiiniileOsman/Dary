<?php
session_start();
include("library/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("library/head.php"); ?>
    <title><?php echo $_SESSION['memberrName'] . "'s Contribution Charge History"; ?></title>
</head>

<body class="app sidebar-mini">

    <!-- Navbar-->
    <?php include("library/header.php"); ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include("library/member_sidebar.php"); ?>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h3><i class="fa fa-file-text-o"></i> <b> MEMBER CHARGES HISTORY</b></h3>
                <p>Member Charge History</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="member-charge-history">Member Charge History</a></li>
            </ul>
        </div>

        <?php include("models/admin_config.php"); ?>
        <?php include("models/system_config.php"); ?>

        <div class="tile">
            <div class="tile-body">
                <form action="#" method="POST" id="searchMemberChargeHistoryForm">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="checkbox" class="form-control" style="height: 17px; width: 17px; display: inline;" name="customDateMemberChargeHistory" id="customDateMemberChargeHistory">
                            <label class="control-label">Start Date (From)</label>
                            <input class="form-control date" type="date" name="startFromMemberChargeHistory" id="startFromMemberChargeHistory">
                        </div>
                        <div class="form-group col-md-5">
                            <label class="control-label">End Date (To)</label>
                            <input class="form-control date" type="date" name="endToMemberChargeHistory" id="endToMemberChargeHistory">
                        </div>
                        <div class="form-group col-md-1">
                            <label class="control-label">&nbsp;</label><br>
                            <button type="submit" class="btn btn-primary" name="btnSearchMemberChargeHistory" id="btnSearchMemberChargeHistory"><i class="fa fa-search" style="font-size: 18px; margin-left: 5px; margin-bottom: 3px;"></i></button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div id="memberChargeHistorySection">

            <div class="tile">
                <div class="tile-body">
                    <div class="row" style="margin: 0px;">
                        <div class="col-md-12 text-right">
                            <br>
                            <button class="btn btn-success btn-sm" id="printMemberChargeHistory"> <i class="fa fa-print"></i> Print </button>
                            <br><br>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 0px; margin-right: 0px;" id="memberChargeHistoryPrintArea">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12" style="margin: 0px;">
                                    <img src="img/reportHeader.png" width="100%" height="250px" /><br><br>
                                    <center>
                                        <h2 style="font-family: 'Arial'; color: #010132;">Member Charges History</h2>
                                    </center>
                                </div>
                            </div>

                            <br>

                            <?php

                            $get_memberr_name = mysqli_query($conn, "SELECT memberName from members WHERE memberID = '" . $_SESSION['memberrIddd'] . "'") or mysqli_error($conn);
                            $memb_rs = mysqli_fetch_array($get_memberr_name);
                            $memberr_name = $memb_rs[0];
                            ?>
                            <div class="row">
                                <div class="col-md-7">
                                    &nbsp;
                                </div>

                                <div class="col-md-5 text-left" style="padding: 0px 20px 0px 0px;">
                                    <h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
                                    <h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Member Name:</b> <?php echo $memberr_name; ?></h5>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12" style="background-image: url('img/reportBackground.png'); background-size : 90% 800px; background-repeat : repeat-y; background-position: center; -webkit-print-color-adjust: exact;">

                                    <br>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm" id="customersTable">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th style="border-bottom: 1px solid black;">
                                                        <center>Serial</center>
                                                    </th>
                                                    <th style="border-bottom: 1px solid black;">
                                                        <center>member Name</center>
                                                    </th>
                                                    <th style="border-bottom: 1px solid black;">
                                                        <center>Months Charged</center>
                                                    </th>
                                                    <th style="border-bottom: 1px solid black;">
                                                        <center>Charged Date</center>
                                                    </th>
                                                    <th style="border-bottom: 1px solid black;">
                                                        <center>Charged By</center>
                                                    </th>
                                                    <th style="border-bottom: 1px solid black;">
                                                        <center>Charged Amount</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $i = 1;
                                                $totalContributionChargedAmount = 0;
                                                $qry = mysqli_query($conn, "SELECT members.memberName, charge_pay_contributions.contributionOf, charge_pay_contributions.chargedMonths, charge_pay_contributions.chargedAmount, charge_pay_contributions.registerDate, users.userName FROM charge_pay_contributions JOIN members ON (members.memberID = charge_pay_contributions.memberID AND charge_pay_contributions.memberID = '" . mysqli_real_escape_string($conn, $_SESSION['memberrIddd']) . "' AND charge_pay_contributions.transactionType = '0') JOIN users ON (charge_pay_contributions.registeredBy = users.userID) ORDER BY charge_pay_contributions.registerDate DESC") or die(mysqli_error($conn));

                                                if (mysqli_num_rows($qry) > 0) {

                                                    while ($result = mysqli_fetch_array($qry)) {

                                                ?>
                                                        <tr>
                                                            <td align="center"> <?php echo $i; ?></td>
                                                            <td align="left"> <?php echo $result[0]; ?></td>
                                                            <td align="center"> <?php echo $result[2]; ?></td>
                                                            <td align="center"> <?php echo substr($result[4], 0, 10); ?></td>
                                                            <td align="center"> <?php echo $result[5]; ?></td>
                                                            <td align="center"> <?php echo "$ " . number_format($result[3], 2); ?></td>
                                                        </tr>
                                                    <?php
                                                        $totalContributionChargedAmount += $result[3];
                                                        $i++;
                                                    }
                                                } else {

                                                    ?>
                                                    <div class="tile">
                                                        <div class="tile-body">
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-12" style="margin: 0px;">
                                                                    <center>
                                                                        <h5 style="font-family: 'Tw Cen MT'; color: maroon; font-weight: normal">No contributionment charges found</h5>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                                <tr>
                                                    <td align="right" colspan="5"><b>Total Charged Amount:</b></td>
                                                    <td align="center"> <b><?php echo "$ " . number_format($totalContributionChargedAmount, 2); ?></b></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>

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
        $("#txtMemberNameInvestmentChargesReport").select2();
    </script>
    <script type="text/javascript">
        $("#cbmInvestmentYearInvestmentChargesReport").select2();
    </script>

</body>

</html>