<?php
session_start();
include("library/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("library/head.php"); ?>
    <title><?php echo $_SESSION['memberrName'] . "'s Payment History"; ?></title>
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
                <h3><i class="fa fa-file-text-o"></i> <b> MEMBER PAYMENT HISTORY</b></h3>
                <p>Member Payment History</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="member-payment-history">Member Payment History</a></li>
            </ul>
        </div>

        <?php include("models/admin_config.php"); ?>
        <?php include("models/system_config.php"); ?>

        <div class="tile">
            <div class="tile-body">
                <form action="#" method="POST" id="searchMemberPaymentHistoryForm">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="checkbox" class="form-control" style="height: 17px; width: 17px; display: inline;" name="customDatePaymentPaymentHistory" id="customDatePaymentPaymentHistory">
                            <label class="control-label">Start Date (From)</label>
                            <input class="form-control date" type="date" name="startFromMemberPaymentHistory" id="startFromMemberPaymentHistory">
                        </div>
                        <div class="form-group col-md-5">
                            <label class="control-label">End Date (To)</label>
                            <input class="form-control date" type="date" name="endToMemberPaymentHistory" id="endToMemberPaymentHistory">
                        </div>
                        <div class="form-group col-md-1">
                            <label class="control-label">&nbsp;</label><br>
                            <button type="submit" class="btn btn-primary" name="btnSearchMemberPaymentHistory" id="btnSearchMemberPaymentHistory"><i class="fa fa-search" style="font-size: 18px; margin-left: 5px; margin-bottom: 3px;"></i></button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div id="memberPaymentHistorySection">

            <div class="tile">
                <div class="tile-body">
                    <div class="row" style="margin: 0px;">
                        <div class="col-md-12 text-right">
                            <br>
                            <button class="btn btn-success btn-sm" id="printMembersPaymentReport"> <i class="fa fa-print"></i> Print </button>
                            <br><br>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 0px; margin-right: 0px;" id="memberPaymentsPrintArea">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12" style="margin: 0px;">
                                    <img src="img/reportHeader.png" width="100%" height="250px" /><br><br>
                                    <center>
                                        <h2 style="font-family: 'Arial'; color: #010132;">Member Payments Report</h2>
                                    </center>
                                </div>
                            </div>

                            <br>

                            <?php
                            $get_member_name = mysqli_query($conn, "SELECT memberName from members WHERE memberID = '" . $memberr_idd . "'") or mysqli_error($conn);
                            $memb_rs = mysqli_fetch_array($get_member_name);
                            $memb_name = $memb_rs[0];
                            ?>
                            <div class="row">
                                <div class="col-md-8">
                                    &nbsp;
                                </div>

                                <div class="col-md-4 text-left" style="padding: 0px 20px 0px 0px;">
                                    <h6 class="text-left" style="font-size: 15px; font-weight: normal; padding-left: 15px;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h6>
                                    <h6 class="text-left" style="font-size: 15px; font-weight: normal; padding-left: 15px;"><b>Member Name:</b> <?php echo $memb_name; ?></h6>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12" style="background-image: url('img/reportBackground.png'); background-size : 90% 800px; background-repeat : repeat-y; background-position: center; -webkit-print-color-adjust: exact;">

                                    <br>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm" style="font-size: 17px;">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th style="border-bottom: 2px solid black;">
                                                        <center>Serial</center>
                                                    </th>
                                                    <th style="border-bottom: 2px solid black;">
                                                        <center>Date</center>
                                                    </th>
                                                    <th style="border-bottom: 2px solid black;">
                                                        <center>Member Name</center>
                                                    </th>
                                                    <th style="border-bottom: 2px solid black;">
                                                        <center>Contribution Year</center>
                                                    </th>
                                                    <th style="border-bottom: 2px solid black;">
                                                        <center>Account Name</center>
                                                    </th>
                                                    <th style="border-bottom: 2px solid black;">
                                                        <center>Paid Amount ($)</center>
                                                    </th>
                                                    <th style="border-bottom: 2px solid black;">
                                                        <center>Charged Amount ($)</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $totalContributionChargedAmount = 0;
                                                $totalContributionPaidAmount = 0;
                                                $f = 1;
                                                $qry = mysqli_query($conn, "SELECT members.memberID, members.memberName, charge_pay_contributions.contributionOf, charge_pay_contributions.chargedMonths, payment_gateways.gatewayType, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber, charge_pay_contributions.paidAmount, charge_pay_contributions.chargedAmount, charge_pay_contributions.registerDate, users.userName FROM charge_pay_contributions JOIN members ON (members.memberID = charge_pay_contributions.memberID) LEFT JOIN account_numbers ON (charge_pay_contributions.accountNoID = account_numbers.accountNoID) LEFT JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) JOIN users ON (charge_pay_contributions.registeredBy = users.userID) WHERE charge_pay_contributions.memberID = '" . $memberr_idd . "' AND transactionStatus = '1' ORDER BY charge_pay_contributions.registerDate ASC") or die(mysqli_error($conn));
                                                if (mysqli_num_rows($qry) > 0) {
                                                    while ($result = mysqli_fetch_array($qry)) {
                                                ?>
                                                        <tr>
                                                            <td align="center"> <?php echo $f; ?></td>
                                                            <td align="center"> <?php echo substr($result[10], 0, 10); ?></td>
                                                            <td align="left"> <?php echo ucwords(strtolower($result[1]), " "); ?></td>
                                                            <td align="center"> <?php if ($result[2] == "N/A") {
                                                                                    echo "----";
                                                                                } else {
                                                                                    echo $result[2];
                                                                                } ?></td>
                                                            <td align="left">
                                                                <?php
                                                                if ($result[4] === "1") {
                                                                    echo $result[5] . " (" . $result[7] . ") ";
                                                                } else if ($result[4] === "2") {
                                                                    echo $result[5] . " " . $result[6] . " (" . $result[7] . ") ";
                                                                } else if ($result[4] === "3") {
                                                                    echo $result[5] . " (" . $result[7] . ") ";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td align="center"> <?php if ($result[8] == 0) {
                                                                                    echo "$ " . number_format($result[8], 2);
                                                                                } else {
                                                                                    echo "<span class='text-success'> $ " . number_format($result[8], 2) . "</span>";
                                                                                } ?></td>
                                                            <td align="center"> <?php if ($result[9] == 0) {
                                                                                    echo "$ " . number_format($result[9], 2);
                                                                                } else {
                                                                                    echo "<span class='text-danger'> $ " . number_format($result[9], 2) . "</span>";
                                                                                } ?></td>
                                                        </tr>
                                                    <?php

                                                        $totalContributionPaidAmount += $result[8];
                                                        $totalContributionChargedAmount += $result[9];
                                                        $f++;
                                                    }

                                                    ?>

                                                    <tr>
                                                        <td align="right" colspan="5"></td>
                                                        <td align="center">
                                                            <h6><b>Total Paid</b></h6>
                                                            <h6 style="font-weight: normal;"><?php echo "<b><span class='text-success'> $ " . number_format($totalContributionPaidAmount, 2) . "</span></b>"; ?></h6>
                                                        </td>
                                                        <td align="center">
                                                            <h6><b>Total Charged</b></h6>
                                                            <h6 style="font-weight: normal;"><?php echo "<b><span class='text-danger'> $ " . number_format($totalContributionChargedAmount, 2), "</span></b>"; ?></h6>
                                                        </td>
                                                    </tr>
                                                <?php
                                                } else {

                                                ?>
                                                    <div class="tile">
                                                        <div class="tile-body">
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-12" style="margin: 0px;">
                                                                    <center>
                                                                        <h3 style="font-family: 'Tw Cen MT'; color: maroon; font-weight: normal">No member payments found</h3>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                                <?php } ?>

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
        $("#txtInvestorNameInvestmentChargesReport").select2();
    </script>
    <script type="text/javascript">
        $("#cbmInvestmentYearInvestmentChargesReport").select2();
    </script>

</body>

</html>