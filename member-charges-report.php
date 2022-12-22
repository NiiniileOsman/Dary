<?php
    session_start();
    include("library/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("library/head.php");?>
        <title>Member Charges Report => <?php echo $_SESSION['systemName']; ?></title>
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
                    <h3><i class="fa fa-file-text-o"></i> <b> MEMBER CHARGES REPORT</b></h3>
                    <p>Member Charges Report</p>
                </div>
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item"><a href="member-charges-report">Member Charges Report</a></li>
                </ul>
            </div>
		
            <?php include("models/admin_config.php");?>
            <?php include("models/system_config.php");?>
            
            <div class="tile">
                <div class="tile-body">
                    <form action="#" method="POST" id="searchMemberhargesReportForm">
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label class="control-label">Member Name</label><br>
                                <select class="form-control" name="cmbMemberNameMemberChargesReport" id="cmbMemberNameMemberChargesReport" style="font-size: 16px; width: 100%;">

                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label">Contribution Year</label>
                                <select class="form-control" id="cmbContributionYearMemberChargesReport" name="cmbContributionYearMemberChargesReport">
                                    <option value=""> General (All) </option>
                                        <?php
                                            $start_year = 2022;
                                            $currentYearNo = date("Y");
                                            for ($i = $start_year; $i <= $currentYearNo; $i++) { ?>
                                                <option option="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php
                                            }
                                        ?>							    
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="checkbox" class="form-control" style="height: 17px; width: 17px; display: inline;" name="customDateMemberChargesReport" id="customDateMemberChargesReport">
                                <label class="control-label">By Date (From)</label>
                                <input class="form-control date" type="date" name="startFromMemberChargesReport" id="startFromMemberChargesReport">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label">To Date</label>
                                <input class="form-control date" type="date" name="endToMemberChargesReport" id="endToMemberChargesReport">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="control-label">&nbsp;</label><br>
                                <button type="submit" class="btn btn-primary" name="btnSearchMemberChargesReport" id="btnSearchMemberChargesReport"><i class="fa fa-search" style="font-size: 18px; margin-left: 5px; margin-bottom: 3px;"></i></button>
                            </div>
        
                        </div>	
                    </form>
                </div>
            </div>
            
            <div id="memberChargesReportSection">
                
            </div>
        
        </main>
	  	
        <!-- Essential javascripts for application to work-->
        <?php include("library/footer.php");?>	    	
        <?php include("library/scripts.php"); ?>
        <script type="text/javascript"> $("#cmbMemberNameMemberChargesReport").select2({tags: false});</script>
        <script type="text/javascript"> $("#cmbContributionYearMemberChargesReport").select2({tags: false});</script>
        
    </body>
</html>