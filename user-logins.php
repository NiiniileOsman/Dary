<?php
  session_start();
  include("library/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>User Logins => <?php echo $sys_comp_name; ?></title>
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
          <h3><i class="fa fa-sign-in"></i> <b>USER LOGIN DETAILS</b></h3>
          <p>User Login Details Page</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="user-logins">User Logins</a></li>
        </ul>
      </div>

      <?php include("models/admin_config.php");?>
	  <?php include("models/system_config.php");?>

	  <div class="row">
        <div class="col-md-12">
            
          <div class="tile">
            <div class="tile-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-sm" id="userLoginsTable">
						<thead>
							<tr align="center">
								<th> Serial </th>
								<th> Photo </th>
								<th> Fullname </th>
								<th> Username </th>
								<th> Login Date & Time</th>
								<th> Logout Date & Time </th>
							</tr>
						</thead>
						<tbody>
							
							<?php
								$loginList = mysqli_query($conn, "SELECT employees.empPhoto, employees.empName, users.userName, user_logins.loginDateTime, user_logins.logoutDateTime FROM user_logins JOIN users ON (user_logins.userID = users.userID) JOIN employees ON (users.empID = employees.empID) ORDER BY user_logins.loginID DESC");
								$r = 1;
								while ($result = mysqli_fetch_array($loginList)) {
                                    ?>
                                        <tr>
											<td align="center"> <?php echo $r; ?></td>
                                            <td class="py-1" align="center">
                                                <img class="rounded-circle" src="<?php echo $result[0]; ?>" width="25px" height="25px" alt="image" />
                                            </td align="center">
                                            <td align="left"> <?php echo $result[1]; ?></td>
                                            <td align="left"> <?php echo $result[2]; ?></td>
                                            <td align="center"> <?php echo $result[3]; ?></td>
                                            <td align="center"> <?php echo $result[4]; ?></td>
                                        </tr> 

                                    <?php
									$r++;
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
	<script type="text/javascript">$("#userLoginsTable").DataTable({"pageLength": 200});</script>
	
  </body>
</html>