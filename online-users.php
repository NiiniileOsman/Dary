<?php
	session_start();
	include("library/conn.php");
	
	function user_last_seen($time_ago) {
		if ($time_ago == "Never") {
			return "Never";
		} else if ($time_ago == "Unknown") {
			return "Unknown";
		} else {
			$time_ago = strtotime($time_ago);
			$cur_time   = time();
			$time_elapsed   = $cur_time - $time_ago;
			$seconds    = $time_elapsed ;
			$minutes    = round($time_elapsed / 60 );
			$hours      = round($time_elapsed / 3600);
			$days       = round($time_elapsed / 86400 );
			$weeks      = round($time_elapsed / 604800);
			$months     = round($time_elapsed / 2600640 );
			$years      = round($time_elapsed / 31207680 );
			
			if ($seconds <= 60) { return "Few moments ago"; }				// Seconds
			else if ($minutes <= 60) {								// Minutes
				if ($minutes==1) { return "One minute ago"; }
				else { return "$minutes minutes ago"; }
			} else if ($hours <= 24) {								// Hours
				if ($hours==1) { return "One hour ago"; }
				else { return "$hours hours ago"; }
			} else if ($days <= 7) {								// Days
				if($days==1){ return "Yesterday"; }
				else { return "$days days ago"; }
			} else if ($weeks <= 4.3) {								// Weeks
				if ($weeks==1){ return "One week ago"; }
				else { return "$weeks weeks ago"; }
			} else if ($months <= 12) {								// Months
				if($months==1){ return "One month ago"; }
				else { return "$months months ago"; }
			} else {												// Years
				if($years==1){ return "One year ago"; }
				else { return "$years years ago"; }
			}
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Online Users => <?php echo $sys_comp_name; ?></title>
    <?php include("library/head.php");?>
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
          <h3><i class="fa fa-user text-success"></i> <b>ONLINE USERS</b></h3>
          <p>Online Users Page</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="online-users">Online Users</a></li>
        </ul>
      </div>
      
      <?php include("models/admin_config.php");?>
	  <?php include("models/system_config.php");?>
	  
	  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered tableRestyle" id="onlineUsersTable">
						<thead>
							<tr align="center">
								<th> Serial </th>
								<th> Photo </th>
								<th> Fullname </th>
								<th> Username </th>
								<th> User Status</th>
								<th> Last Seen </th>
								<th> Total Hours </th>
							</tr>
						</thead>
						<tbody>
							
							<?php
								$usersListEx = mysqli_query($conn, "SELECT users.userID, employees.empPhoto, employees.empName, users.userName, users.userStatus FROM users JOIN employees ON (users.empID = employees.empID) ORDER BY users.userID");
								$o = 1;
								while ($result = mysqli_fetch_array($usersListEx)) {
									
									$hour_ss = "";
									$minute_ss = "";
									$second_ss = "";
									
									$totalHours = "";
									
									$lastLogout = "";
									$userIDD = $result[0];
									//Get last logout date and time
									$getLastLogout = mysqli_query($conn, "SELECT logoutDateTime FROM user_logins WHERE userID = '". $userIDD ."' ORDER BY logoutDateTime DESC LIMIT 1");
									$countLogout = mysqli_num_rows($getLastLogout);
									//Calculate total online hours, these are the total of the hours which the user was online
									$getLoginDetails = mysqli_query($conn, "SELECT * FROM user_logins WHERE userID = '". $userIDD ."' AND logoutDateTime <> ''");
									$returnedLoginDetails = mysqli_num_rows($getLoginDetails);
									if ($returnedLoginDetails > 0) {
										$loginOutDifference = 0;

										while($loginResult = mysqli_fetch_array($getLoginDetails)) {
											$loginDate = $loginResult[2];
											$logoutDate = $loginResult[3];
											$currentDif = abs(strtotime($logoutDate) - strtotime($loginDate));
											$loginOutDifference += $currentDif;
										}
										
										$hour_ss = (int)($loginOutDifference)/(60*60);
										//$totalHours = $hour_ss. " hour(s)";
										
										if ($hour_ss < 1) {
											$minute_ss = (int)($hour_ss*60);
											if ($minute_ss < 1) {
												$second_ss = (int)($minute_ss*60);
												$totalHours = (int)$second_ss. " second(s)";
											} else {
												$totalHours = (int)$minute_ss. " minute(s)";
											}
										} else if ((int)$hour_ss == 1) {
											$totalHours = (int)$hour_ss. " hour";
										} else {
											$totalHours = (int)$hour_ss. " hours";
										}
										
										
									} else {
										$totalHours = "Never logged in";
									}
									
									//Decide which last seen to be printed
									if ($countLogout > 0) {
										$returnedLogout = mysqli_fetch_array($getLastLogout);
										if ($returnedLogout[0] == "") {
											$lastLogout = "Unknown";
										} else {
											$lastLogout = $returnedLogout[0];
										}	
										$lastLogout = $returnedLogout[0];
									} else {
										$lastLogout = "Never";
									}	
									
									if ($result[0] == $_SESSION['userIdd']) {
									?>
										<tr>
											<td align="center"><?php echo $o; ?></td>
											<td class="py-1" align="center">
												<img style="position: absolute; margin: 40px 0px 0px 40px;" src="img/online-u.png" height="20px" width="20px" /><img class="rounded-circle" src="<?php echo $result[1]; ?>" width="60px" height="60px" alt="image" />
											</td>
											<td> <?php echo $result[2]; ?> <b> (You)</b></td>
											<td align="left"><?php echo $result[3]; ?></td>
											<td align="center"> 
												<i class="fa fa-circle fa-lg text-success"></i>
											</td>
											<td align="center"><font style="font-size: 15px;">Active</font></td>
											<td align="left"><?php echo $totalHours; ?></td>
										</tr>
										<?php
									} else {
										?>
											<tr>
												 
												<?php 
													if ($result[4] == "Online") {
														?>
														<td align="center"><?php echo $o; ?></td>
														<td class="py-1" align="center">
															<img style="position: absolute; margin: 40px 0px 0px 40px;" src="img/online-u.png" height="20px" width="20px" /><img class="rounded-circle" src="<?php echo $result[1]; ?>" width="60px" height="60px" alt="image" />
														</td>
														<td> <?php echo $result[2]; ?></td>
														<td align="left"><?php echo $result[3]; ?></td>
														<td align="center"> 
															<i class="fa fa-circle fa-lg text-success"></i>
														</td>
														<td align="center"> <font style="font-size: 15px;">Active</font> </td>
														<td align="left"><?php echo $totalHours; ?></td>
														
														<?php
													} else {
														?>
														<td align="center"><?php echo $o; ?></td>
														<td class="py-1" align="center">
															<img style="position: absolute; margin: 40px 0px 0px 40px;" src="img/offline.png" height="20px" width="20px" /><img class="rounded-circle" src="<?php echo $result[1]; ?>" width="60px" height="60px" alt="image" />
														</td>
														<td> <?php echo $result[2]; ?></td>
														<td align="left"><?php echo $result[3]; ?></td>
														<td align="center"> 
															<i class="fa fa-circle fa-lg text-dark"></i>
														</td>
														<td align="center"> <font style="font-size: 15px;"><?php echo user_last_seen($lastLogout); ?></font> </td>
														<td align="left"><?php echo $totalHours; ?></td>
														<?php
													}
												?>
												
											</tr>
											
										<?php
									}
									$o++;
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
    <script type="text/javascript">$('#onlineUsersTable').DataTable({"pageLength": 100});</script>
	
  </body>
</html>