<?php
	session_start();
	include("library/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
  	<head>
	  	<title>System Menus => <?php echo $sys_comp_name; ?></title>
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
          			<h3><i class="fa fa-list"></i> <b>CREATE MENUS</b></h3>
          			<p>Create Menus Page</p>
        		</div>
        		<ul class="app-breadcrumb breadcrumb">
          			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          			<li class="breadcrumb-item"><a href="customers-menus.php">Create Menus</a></li>
        		</ul>
      		</div>

			<?php include("models/admin_config.php");?>
			<?php include("models/system_config.php");?>      

	  		<div class="row">
        		<div class="col-md-12">
            
          			<div class="tile">
            			<div class="tile-body">
                			<div class="row">
                    			<div class="col-md-12" align="right">
                        			<button class="btn btn-primary btn-xl btnRestyle" id="openAddNewMainMenuModal" data-toggle="modal" data-target="#createNewMenuModal"><i class="fa fa-plus"></i>ADD NEW MAIN MENU</button> 
                        			<button class="btn btn-info btn-xl btnRestyle" id="openAddNewSubMenuModal" data-toggle="modal" data-target="#createNewSubMenuModal"><i class="fa fa-plus"></i>ADD NEW SUB MENU</button><br /><br />
                    			</div>
                			</div>
							
							<div class="table-responsive">
								<table class="table table-striped tableRestyle table-sm" id="mensTable">
									<thead>
										<tr>
											<th> <center>Serial</center> </th>
											<th style="padding-left: 15px;">Main Menus </th>
											<th>Sub Menus </th>
											<th class="text-center">Edit Rank</th>
											<th><center>Action</center> </th>
										</tr>
									</thead>
									<tbody>
										<?php
											$getMain = mysqli_query($conn, "SELECT * FROM main_menus ORDER BY mainMenuRank ASC");
											if ($getMain) {
												if (mysqli_num_rows($getMain) > 0) {
													$ss = 1;
													while ($main_rs = mysqli_fetch_array($getMain)) {
														?>
														<tr>
															<td align="center"><?php echo $ss; ?></td>
															<td style="padding-left: 15px;">
																<?php if ($main_rs[4] == "1") { ?>
																<input type="checkbox" checked="checked" class="form-control" style="height: 16px; width: 16px; display: inline;" name="allowMainMenu" id="allowMainMenu" data-id="<?php echo $main_rs[0]; ?>"> &nbsp;&nbsp;
																<?php } else {?>
																<input type="checkbox" class="form-control" style="height: 16px; width: 16px; display: inline;" name="allowMainMenu" id="allowMainMenu" data-id="<?php echo $main_rs[0]; ?>"> &nbsp;&nbsp;
																<?php } ?>											
																<i class="<?php echo $main_rs[2]; ?> fa-lg"></i> &nbsp;&nbsp;<a href="<?php echo $main_rs[3]; ?>"><b><?php echo $main_rs[1]; ?></b></a>
															</td>
															<td>
																<table class="table" id="subMenuTable">
																	<?php
																		$getSubMain = mysqli_query($conn, "SELECT * FROM sub_menus WHERE mainMenuID = '". $main_rs[0] ."' ORDER BY subMenuRank ASC");
																		if ($getSubMain) {
																			$submenu_num = mysqli_num_rows($getSubMain);
																			if ($submenu_num > 0) {
																				?>
																				<thead>
																					<tr>
																						<th class="col-md-7" style="padding-left: 10px;">Sub menu </th>
																						<th class="col-md-3"><center>Edit Rank</center></th>
																						<th class="col-md-2"><center>Action</center> </th>
																					</tr>
																				</thead>
																				<tbody>
																					<?php
																						while ($submenu_rs = mysqli_fetch_array($getSubMain)) {
																							$sub_menu_id = $submenu_rs[0];
																							$sub_menu_text = $submenu_rs[1];
																							?>
																							<tr>
																								<td style="padding-left: 10px;">
																									<?php if ($submenu_rs[5] == "1") { ?>
																										<input type="checkbox" checked="checked" class="form-control" style="height: 16px; width: 16px; display: inline;" name="allowSubMenu" id="allowSubMenu" data-id="<?php echo $submenu_rs[0]; ?>"> &nbsp;&nbsp;
																									<?php } else {?>
																										<input type="checkbox" class="form-control" style="height: 16px; width: 16px; display: inline;" name="allowSubMenu" id="allowSubMenu" data-id="<?php echo $submenu_rs[0]; ?>"> &nbsp;&nbsp;
																									<?php } ?>
																									<i class="<?php echo $submenu_rs[2]; ?> fa-lg"></i> &nbsp;&nbsp;<a href="<?php echo $submenu_rs[3]; ?>"><?php echo $submenu_rs[1]; ?></a>
																								</td>
																								<td align="center">
																									<?php
																										$getSuMenuRank = mysqli_query($conn, "SELECT subMenuRank FROM sub_menus WHERE subMenuID = ". $submenu_rs[0] ." ORDER BY subMenuRank");
																										$s_rank_rs = mysqli_fetch_array($getSuMenuRank);
																									?>
																									<select class="form-control col-md-6 subMRank" style="font-size: 13px;" name="subMRank" id="<?php echo "subMRank".$submenu_rs[0]; ?>" data-id="<?php echo $submenu_rs[0]; ?>" data-src="<?php echo $submenu_rs[4]; ?>" required>
																										<option value="<?php echo $s_rank_rs[0]; ?>" selected disabled><?php echo $s_rank_rs[0]; ?></option>
																										<?php
																											$getSubMenuRank = mysqli_query($conn, "SELECT subMenuRank FROM sub_menus WHERE subMenuID NOT IN (SELECT subMenuID FROM sub_menus WHERE subMenuRank = ". $s_rank_rs[0] .") AND mainMenuID = ". $main_rs[0] ." ORDER BY subMenuRank");
																											while ($sub_rank_rs = mysqli_fetch_array($getSubMenuRank)) {
																												?>
																													<option value="<?php echo $sub_rank_rs[0]; ?>"><?php echo $sub_rank_rs[0]; ?></option>
																												<?php
																											}
																										?>
																									</select>
																								</td>
																								<td align="center">
																									<span style="font: 17px arial; display: none;" id="<?php echo "MainMenu". $submenu_rs[0]; ?>" data-id="<?php echo $main_rs[0]; ?>"><?php echo $main_rs[0]; ?></span>
																									<a class="badge badge-primary updateSubMenu" href="#" style="padding-bottom: 8px; padding-top: 7px;" data-id="<?php echo $submenu_rs[0]; ?>" data-toggle="modal" data-target="#updateSubMenuModals"><i class="fa fa-fw fa-lg fa-pencil"></i></a>
																									<a class="badge badge-danger subMenuDeletion" href="delete-sub-menu.php?subMenuId=<?php echo $submenu_rs[0]; ?>" data-id="<?php echo $submenu_rs[0]; ?>" data-src="<?php echo $submenu_rs[1]; ?>" style="padding-bottom: 8px; padding-top: 7px;"><i class="fa fa-fw fa-lg fa-trash"></i></a>
																								</td>
																							</tr>
																							<?php
																						}
																					?>
																				</tbody>
																				<?php
																			} else {
																				//echo "No Submenus";
																			}
																		} else {
																			echo mysqli_error($conn);
																		}
																	?>
																</table>
															</td>
															<td align="center">
																<?php
																	$getMaMenuRank = mysqli_query($conn, "SELECT mainMenuRank FROM main_menus WHERE mainMenuID = ". $main_rs[0] ."");
																	$rank_rs = mysqli_fetch_array($getMaMenuRank);
																?>
																<select class="form-control col-md-8 mainMRank" style="font-size: 13px;" name="mainMRank" id="<?php echo "mainMRank".$main_rs[0]; ?>" data-id="<?php echo $main_rs[0]; ?>" required>
																	<option value="<?php echo $rank_rs[0]; ?>" selected disabled><?php echo $rank_rs[0]; ?></option>
																	<?php
																		$mr = 1;
																		$getMainMenuRank = mysqli_query($conn, "SELECT mainMenuRank FROM main_menus WHERE mainMenuID NOT IN (SELECT mainMenuID FROM main_menus WHERE mainMenuRank = ". $rank_rs[0] .") ORDER BY mainMenuRank");
																		while ($main_rank_rs = mysqli_fetch_array($getMainMenuRank)) {
																			?>
																				<option value="<?php echo $main_rank_rs[0]; ?>"><?php echo $main_rank_rs[0]; ?></option>
																			<?php
																		}
																	?>
																</select>
															</td>
															<td align="center">
																<a class="badge badge-primary updateMainMenu" href="#" style="padding-bottom: 8px; padding-top: 7px;" data-id="<?php echo $main_rs[0]; ?>" data-toggle="modal" data-target="#updateMainMenuModal"><i class="fa fa-fw fa-lg fa-pencil"></i></a>
																<a class="badge badge-danger mainMenuDeletion" href="delete-main-menu.php?mainMenuId=<?php echo $main_rs[0]; ?>" data-id="<?php echo $main_rs[0]; ?>" data-src="<?php echo $main_rs[1]; ?>" style="padding-bottom: 8px; padding-top: 7px;"><i class="fa fa-fw fa-lg fa-trash"></i></a>
															</td>
														</tr>
														<?php
														$ss++;
													}
												} else {
													//echo "No Main menus";
												}
											} else {
												echo mysqli_error($conn);
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
  	</body>
</html>