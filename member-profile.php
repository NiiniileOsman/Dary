<?php
session_start();
include("library/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("library/head.php"); ?>
    <title><?php echo $_SESSION['memberrName'] . "'s Profile"; ?></title>
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
                <h3><i class="fa fa-vcard"></i> <b> MEMBER PROFILE</b></h3>
                <p>Member Profile Page</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="member-profile">Member Profile</a></li>
            </ul>
        </div>

        <?php include("models/admin_config.php"); ?>
        <?php include("models/system_config.php"); ?>

        <div class="tile">
            <div class="tile-body">

                <?php
                $getMemberProfile = mysqli_query($conn, "SELECT members.memberID, members.memberPhoto, members.memberName, members.placeOfBirth, members.memberDOB, members.memberSex, members.maritalStatus, members.jobStatus, members.professionExperience, members.teachingSubjects, contribution_types.contributionAmount, members.joiningReasons, members.memberAddress, members.memberTelephone, members.memberEmail FROM members JOIN contribution_types ON (members.contributionTypeID = contribution_types.contributionTypeID) JOIN users ON (members.registeredBy = users.userID) WHERE memberID = '" . $_SESSION['memberrIddd'] . "'") or die(mysqli_error($conn));

                if (mysqli_num_rows($getMemberProfile) > 0) {

                    $result = mysqli_fetch_array($getMemberProfile);

                    $memberrr_idd = $result[0];
                    $memberrr_photo = $result[1];
                    $memberrr_name = $result[2];
                    $memberrr_pof = $result[3];
                    $memberrr_dob = $result[4];
                    $memberrr_sex = $result[5];
                    $memberrr_marital_status = $result[6];
                    $memberrr_job_status = $result[7];
                    $memberrr_experience_years = $result[8];
                    $memberrr_teching_courses = $result[9];
                    $memberrr_contr_amount = $result[10];
                    $memberrr_join_reason = $result[11];
                    $memberrr_address = $result[12];
                    $memberrr_telephone = $result[13];
                    $memberrr_email_address = $result[14];

                ?>

                    <form action="#" method="POST" id="updateMemberPortalForm" enctype="multipart/form-data">
						<div class="row">

							<div class="form-group col-md-2" align="center">
								<br>
								<img class='img-responsive' src="<?php echo $memberrr_photo; ?>" id="membersPortalMemberTarget" width="150px" height="150px" /><br><br>
								<label class="btn btn-success col-md-12">
									<i class="fa fa-refresh"> </i> Change Photo <input type="file" class="form-control" name="membersPortalMemberPhoto" id="membersPortalMemberPhoto" hidden>
								</label>
								<input type="hidden" name="MemberProfileMemberid" id="MemberProfileMemberid" value="<?php echo $memberrr_idd; ?>" readonly />

								<input type="hidden" name="photoMembersPortalMemberPhotoUpdate" id="photoMembersPortalMemberPhotoUpdate" value="<?php echo $memberrr_photo; ?>"  readonly />

								<script>
									var member_portal_member_src = document.getElementById("membersPortalMemberPhoto");
									var member_portal_member_target = document.getElementById("membersPortalMemberTarget");

									function memberPortalShowMemberImage(member_portal_member_src, member_portal_member_target) {
										var upl = new FileReader();
										upl.onload = function(e) {
											member_portal_member_target.src = this.result;
										};
										member_portal_member_src.addEventListener("change", function() {
											upl.readAsDataURL(member_portal_member_src.files[0]);
										})
									}
									memberPortalShowMemberImage(member_portal_member_src, member_portal_member_target);
								</script>

							</div>

							<div class="form-group col-md-10">

								<div class="row">

									<div class="form-group col-md-5">
										<label class="control-label">Member Name</label>
										<input type="hidden" name="txtMemberPortalMemberIddd" id="txtMemberPortalMemberIddd" value="<?php echo $memberrr_idd; ?>" required readonly>
										<input class="form-control" type="text" name="txtMemberPortalMemberName" id="txtMemberPortalMemberName" value="<?php echo $memberrr_name; ?>" required disabled>
									</div>
									<div class="form-group col-md-4">
										<label class="control-label">Place of Birth</label>
										<input class="form-control" type="text" name="txtMemberPortalBirthPlace" id="txtMemberPortalBirthPlace" value="<?php echo $memberrr_pof; ?>" required>
									</div>
									<div class="form-group col-md-3">
										<label class="control-label">Date of Birth</label>
										<input class="form-control date" type="date" name="txtMemberPortalBirthDate" id="txtMemberPortalBirthDate" value="<?php echo $memberrr_dob; ?>" required>
									</div>

									<div class="form-group col-sm-4">
										<label class="control-label">Sex</label>
										<select class="form-control" style="width: 100%;" name="cmbMemberPortalMemberSex" id="cmbMemberPortalMemberSex" required>
											<?php
											    if ($memberrr_sex == 1) {
											        ?><option selected value="1">Male</option><option value="0">Female</option><?php
											    } else {
											        ?><option selected value="0">Female</option><option value="1">Male</option><?php
											    }
									        ?>
										</select>
									</div>
									<div class="form-group col-sm-4">
										<label class="control-label">Marital Status</label>
										<select class="form-control" style="width: 100%;" name="cmbMemberPortalMemberMaritalStatus" id="cmbMemberPortalMemberMaritalStatus" required>
											<?php
											    if ($memberrr_marital_status == 1) {
											        ?><option selected value="1">Married</option><option value="0">Single</option><?php
											    } else {
											        ?><option selected value="0">Single</option><option value="1">Married</option><?php
											    }
									        ?>
										</select>
									</div>
									<div class="form-group col-sm-4">
										<label class="control-label">Job Status</label>
										<select class="form-control" style="width: 100%;" name="cmbMemberPortalMemberJobStatus" id="cmbMemberPortalMemberJobStatus" required>
											<?php
											    if ($memberrr_job_status == 1) {
											        ?><option selected value="1">Working</option><option value="0">Not Working</option><?php
											    } else {
											        ?><option selected value="0">Not Working</option><option value="1">Working</option><?php
											    }
									        ?>
										</select>
									</div>

									<div class="form-group col-sm-4">
										<label class="control-label">Profession Experience</label>
										<select class="form-control" style="width: 100%;" name="cmbMemberPortalMemberProfessionalExperience" id="cmbMemberPortalMemberProfessionalExperience" required>
											<?php
											    if ($memberrr_experience_years == 1) {
											        ?><option selected value="1">0 Years</option><option value="2">1 - 5 Years</option><option value="3">6 - 10 Years</option><option value="4">11 - 15 Years</option><option value="5">16 - 20 Years</option><option value="6">Above 20 Years</option><?php
											    } else if ($memberrr_experience_years == 2) {
											        ?><option value="1">0 Years</option><option selected value="2">1 - 5 Years</option><option value="3">6 - 10 Years</option><option value="4">11 - 15 Years</option><option value="5">16 - 20 Years</option><option value="6">Above 20 Years</option><?php
											    } else if ($memberrr_experience_years == 3) {
											        ?><option value="1">0 Years</option><option value="2">1 - 5 Years</option><option selected value="3">6 - 10 Years</option><option value="4">11 - 15 Years</option><option value="5">16 - 20 Years</option><option value="6">Above 20 Years</option><?php
											    } else if ($memberrr_experience_years == 4) {
											        ?><option value="1">0 Years</option><option value="2">1 - 5 Years</option><option value="3">6 - 10 Years</option><option selected value="4">11 - 15 Years</option><option value="5">16 - 20 Years</option><option value="6">Above 20 Years</option><?php
											    } else if ($memberrr_experience_years == 5) {
											        ?><option value="1">0 Years</option><option value="2">1 - 5 Years</option><option value="3">6 - 10 Years</option><option value="4">11 - 15 Years</option><option selected value="5">16 - 20 Years</option><option value="6">Above 20 Years</option><?php
											    } else if ($memberrr_experience_years == 6) {
											        ?><option value="1">0 Years</option><option value="2">1 - 5 Years</option><option value="3">6 - 10 Years</option><option value="4">11 - 15 Years</option><option value="5">16 - 20 Years</option><option selected value="6">Above 20 Years</option><?php
											    }
									        ?>
										</select>
									</div>
									<div class="form-group col-sm-8">
										<label class="control-label">Teaching Subjects</label>
							            <textarea class="form-control" name="txtMemberPortalMemberTeachingSubjects" id="txtMemberPortalMemberTeachingSubjects" required><?php echo $memberrr_teching_courses; ?></textarea>
									</div>
									
									<div class="form-group col-sm-4">
										<label class="control-label">Monthly Contribution Amount ($)</label>
										<input type="text" class="form-control" name="txtMemberPortalMemberContributionAmount" id="txtMemberPortalMemberContributionAmount" value="<?php echo $memberrr_contr_amount; ?>" required disabled>
									</div>
    								<div class="form-group col-sm-4">
    									<label class="control-label">Reason for Joining</label>
    									<input class="form-control" type="text" name="txtMemberPortalReasonForJoining" id="txtMemberPortalReasonForJoining" value="<?php echo $memberrr_join_reason; ?>" required>
    								</div>
    								
    								<div class="form-group col-sm-4">
    									<label class="control-label">Member Address</label>
    									<input type="text" class="form-control" name="txtMemberPortalMemberAddress" id="txtMemberPortalMemberAddress" value="<?php echo $memberrr_address; ?>" required>
    								</div>
    								<div class="form-group col-sm-4">
    									<label class="control-label">Telephone Number</label>
    									<input type="text" class="form-control" name="txtMemberPortalTelephoneNo" id="txtMemberPortalTelephoneNo" value="<?php echo $memberrr_telephone; ?>" maxlength="9" required>
    								</div>
    								<div class="form-group col-sm-4">
    									<label class="control-label">Email Address</label>
    									<input type="email" class="form-control" name="txtMemberPortalEmailAddress" id="txtMemberPortalEmailAddress" value="<?php echo $memberrr_email_address; ?>" maxlength="70" required>
    								</div>
    									<input type="hidden" class="form-control" name="txtMemberProfilePemberUpdateDate" id="txtMemberProfilePemberUpdateDate" value="<?php echo date("Y-m-d H:i:s"); ?>" maxlength="70" required>

    								
    						    </div>
                            </div>
						</div>

						<div class="tile-footer" style="text-align: right;">
							<button type="submit" class="btn btn-primary" name="btnUpdateMyInformation" id="btnUpdateMyInformation"><i class="fa fa-fw fa-lg fa-refresh"></i>Update Information</button>&nbsp;&nbsp;&nbsp;
						</div>
					</form>
                    
                    
                    <br><br>
                <?php
                }
                ?>
            </div>
        </div>
        
        <div class="tile">
            <div class="tile-body">

                <div class="row">
    				<div class="col-md-12">
    					<h3><?php echo $_SESSION['memberrName'] . "'s Qualifications"; ?></h3>
    					<hr>
    				</div>
    			</div>
    
                <div class="row mb-4">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#addQualificationModal"><i class="fa fa-plus"> </i> Add Qualification</button>
                    </div>
                </div>
    
                <div class="row">
    				<div class="col-md-12">
    					<div class="table-responsive">
    						<table class="table table-striped" id="memberQualificationsTable">
    							<thead>
    								<tr>
    									<th class="text-center">Serial</th>
    									<th class="text-center">Level</th>
    									<th class="text-center">Institute Name</th>
    									<th class="text-center">Graduation Date</th>
    									<th class="text-center">Average</th>
    									<th class="text-center">Certificate</th>
    									<th class="text-center">Action</th>
    								</tr>
    							</thead>
    							<tbody>
    								<?php
    								
    									$x = 1;

    									$getQualificationList = mysqli_query($conn, "SELECT * FROM member_qualifications WHERE memberID = '". $_SESSION['memberrIddd'] ."'") or die(mysqli_error($conn));
    									
    									if (mysqli_num_rows($getQualificationList) >= 1) {
    										
    										while ($rs = mysqli_fetch_array($getQualificationList)) {
    										
    											?>
    												<tr>
    													<td class="text-center"><?php echo $x; ?></td>
    													<td><?php echo $rs[3]; ?></td>
    													<td><?php echo $rs[4]; ?></td>
    													<td class="text-center"><?php  if ($rs[7] == "null") { echo "---"; } else { echo $rs[7]; } ?></td>
    													<td class="text-center"><?php echo $rs[8]; ?></td>
    													<td class="text-center">
    														<a href="<?php echo $rs[10]; ?>" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-folder-open"> </i> Open</a>
    													</td>
    													<td class="align-middle" align="center">
    														<span class="btn btn-danger btn-sm btnDeleteQualification" id="<?php echo "Delete". $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Remove</span> 
    													</td>
    												</tr>												 
    											<?php
    											$x++;
    										}
    										
    									} else {
    										
    										?>
    											<tr class="table-light" height="50px">
    												<td class="text-center align-middle" colspan="8">No qualifications found</td>
    											</tr>												 
    										<?php
    										
    									}
    										
    								?>
    							</tbody>
    						</table>
    					</div>
    					<br><br><br><br>
    				</div>
    			</div>
    		
            </div>    
		</div>
		
        <div class="tile">
            <div class="tile-body">
                
                <div class="row">
    				<div class="col-md-12">
    					<h3><?php echo $_SESSION['memberrName'] . "'s Work Experience"; ?></h3>
    					<hr>
    				</div>
    			</div>
    
                <div class="row mb-4">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#addWorkExperienceModal"><i class="fa fa-plus"> </i> Add Work Experience</button>
                    </div>
                </div>
    
                <div class="row">
    				<div class="col-md-12">
    					<div class="table-responsive">
    						<table class="table table-striped" id="memberWorkExperiencesTable">
    							<thead>
    								<tr>
    									<th class="text-center">Serial</th>
    									<th class="text-center">Employer Name</th>
    									<th class="text-center">Job Title</th>
    									<th class="text-center">Start Date</th>
    									<th class="text-center">Status</th>
    									<th class="text-center">Left Date</th>
    									<th class="text-center">Action</th>
    								</tr>
    							</thead>
    							<tbody>
    								<?php
    								
    									$x = 1;
    									
    									$getWorkExperienceList = mysqli_query($conn, "SELECT * FROM member_work_experiences WHERE memberID = '". $_SESSION['memberrIddd'] ."'") or die(mysqli_error($conn));
    
    									if (mysqli_num_rows($getWorkExperienceList) >= 1) {
    										
    										while ($rs = mysqli_fetch_array($getWorkExperienceList)) {
    											
    											?>
    												<tr>
    													<td class="text-center"><?php echo $x; ?></td>
    													<td><?php echo $rs[4]; ?></td>
    													<td><?php echo $rs[5]; ?></td>
    													<td class="text-center"><?php echo $rs[6]; ?></td>
    													<td><?php echo $rs[7]; ?></td>
    													<td class="text-center"><?php echo $rs[8]; ?></td>
    													<td class="align-middle" align="center">
    														<span class="btn btn-danger btn-sm btnDeleteWorkExperience" id="<?php echo "Delete". $rs[1]; ?>" data-id="<?php echo $rs[1]; ?>"><i class="fa fa-fw fa-lg fa-trash"></i> Remove</span> 
    													</td>
    												</tr>												 
    											<?php
    											$x++;
    										}
    									
    									} else {
    										
    										?>
    											<tr class="table-light" height="50px">
    												<td class="text-center align-middle" colspan="8">No work experiences found</td>
    											</tr>												 
    										<?php
    										
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
    <!--<script type="text/javascript">$("#memberQualificationsTable, #memberWorkExperiencesTable").DataTable({"pageLength": 100});</script>-->
    <script type="text/javascript"> $("#qualificationLevel, #qualificationStatus, #graduationDate").select2({ tags: false, dropdownParent: $("#addQualificationModal") });</script>
    <script type="text/javascript"> $("#workExperienceType, #workStatus").select2({ tags: false, dropdownParent: $("#addWorkExperienceModal") });</script>
    
    <script type="text/javascript"> $("#cmbMemberPortalMemberSex, #cmbMemberPortalMemberMaritalStatus, #cmbMemberPortalMemberJobStatus, #cmbMemberPortalMemberProfessionalExperience").select2({ tags: false });</script>

    


</body>

</html>