<?php
date_default_timezone_set('Africa/Mogadishu');

if ((isset($_SESSION['userName']) == true) && ($_SESSION['userName']) != "") {

	/*
		
		// This will be used fore web hosting time
	    // This supports only HTTPS
	    
	    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
             $fullURL = "https://";   
        } else {
             $fullURL = "http://"; 
        }
        
        $fullURL.= $_SERVER['HTTP_HOST'];$fullURL.= $_SERVER['REQUEST_URI'];$UrL = explode(".", $fullURL); $cutEx = $UrL[3]; $sliceUrl = explode("/", $cutEx);
		$realURL = $sliceUrl[2];

		*/

	//This is for localhost
	$fullURL = $_SERVER["REQUEST_URI"];
	$UrL = explode(".", $fullURL);
	$cutEx = $UrL[0];
	$sliceUrl = explode("/", $cutEx);
	$realURL = $sliceUrl[2];

	//echo "<script>alert('" . $realURL . "')</script>";

	$getUserPrivilege = mysqli_query($conn, "SELECT employees.titlePosition FROM employees JOIN users ON (employees.empID = users.empID AND users.userID = '" . $_SESSION['userIdd'] . "')");
	$us_priv = mysqli_fetch_array($getUserPrivilege);
	if ($us_priv[0] == 0) {
	} else {

		$checkMainMenu = mysqli_query($conn, "SELECT * FROM user_main_menus WHERE userID = '" . $_SESSION['userIdd'] . "' AND mainMenuID IN (SELECT mainMenuID FROM main_menus WHERE mainMenuURL = '" . $realURL . "') AND mainMenuMode = '1'");
		$count_main_num = mysqli_num_rows($checkMainMenu);
		if ($count_main_num > 0) {
		} else {
			$checkSubMenu = mysqli_query($conn, "SELECT * FROM user_sub_menus WHERE userID = '" . $_SESSION['userIdd'] . "' AND subMenuID IN (SELECT subMenuID FROM sub_menus WHERE subMenuURL = '" . $realURL . "') AND subMenuMode = '1'");
			$count_sub_num  = mysqli_num_rows($checkSubMenu);
			if ($count_sub_num > 0) {
			} else {

				//List of external pages that is allowed for the users to access
				$allowed_extenral_web_pages_for_users = array("add-customer-service", "new-reception");

				if (in_array($realURL, $allowed_extenral_web_pages_for_users)) {

					// Let the user access 

				} else {
					echo "<script>location ='logout'</script>";
				}
			}
		}
	}
} else {
	echo "<script>location ='index'</script>";
}
?>

<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
	<div class="app-sidebar__user">
		<img style="position: absolute; margin: 30px 0px 0px 30px; height: 20px; width: 20px;" src="img/online-u.png" />
		<img class="app-sidebar__user-avatar" src="<?php echo $_SESSION['userPhoto']; ?>" height="60px" width="60px">

		<?php $user_types = array("Super Admin", "Maamule Guud (Admin)", "Maamule Xarun", "Collector", "Maaliyadda", "Diiwaan Geli", "Tubo Xire", "Waardiye"); ?>
		<div>
			<p class="app-sidebar__user-name"><b><?php echo $_SESSION['userName']; ?></b></p>
			<p class="app-sidebar__user-designation"><?php echo $user_types[$_SESSION['userType']]; ?></p>
		</div>
	</div>
	<ul class="app-menu">
		<?php
		if ($_SESSION['userType'] == 0) {

			$getMain = mysqli_query($conn, "SELECT * FROM main_menus ORDER BY mainMenuRank");
			if ($getMain) {
				$main_num = mysqli_num_rows($getMain);
				if ($main_num > 0) {
					while ($main_rs = mysqli_fetch_array($getMain)) {
						$getSubMain = mysqli_query($conn, "SELECT * FROM sub_menus WHERE mainMenuID = '" . $main_rs[0] . "' ORDER BY subMenuRank");
						if ($getSubMain) {
							$submenu_num = mysqli_num_rows($getSubMain);
							if ($submenu_num > 0) { ?>
								<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon <?php echo $main_rs[2]; ?>"></i><span class="app-menu__label"><?php echo $main_rs[1]; ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
									<ul class="treeview-menu"><?php
																while ($submenu_rs = mysqli_fetch_array($getSubMain)) {

																	if ($submenu_rs[1] == "Change Password") {
																?><li><a class="treeview-item" href="<?php echo $submenu_rs[3]; ?>" data-id="<?php echo $_SESSION['userName']; ?>" data-toggle="modal" data-target="#changePasswordModal"><i class="icon <?php echo $submenu_rs[2]; ?>"></i> <?php echo $submenu_rs[1]; ?></a></li><?php
																																																																																} else if ($submenu_rs[1] == "2-Step Verification") {
																																																																																	?><li><a class="treeview-item" href="<?php echo $submenu_rs[3]; ?>" id="securitySubMenu" data-id="<?php echo $_SESSION['userIdd']; ?>" data-toggle="modal" data-target="#securitySettingsModal"><i class="icon <?php echo $submenu_rs[2]; ?>"></i> <?php echo $submenu_rs[1]; ?></a></li><?php
																																																																																																																																																							} else {
																																																																																																																																																								?><li><a class="treeview-item" href="<?php echo $submenu_rs[3]; ?>"><i class="icon <?php echo $submenu_rs[2]; ?>"></i> <?php echo $submenu_rs[1]; ?></a></li><?php
																																																																																																																																																																																															}
																																																																																																																																																																																														} ?>
									</ul>
								</li><?php
									} else {
										if ($main_rs[1] == "Logout") {
										?><li><a class="app-menu__item" href="<?php echo $main_rs[3]; ?>" id="logoutOutSide" data-id="<?php echo $_SESSION['userName']; ?>"><i class="app-menu__icon <?php echo $main_rs[2]; ?>"></i><span class="app-menu__label">Logout</a></li><?php
																																																																				} else {
																																																																					?><li><a class="app-menu__item" href="<?php echo $main_rs[3]; ?>"><i class="app-menu__icon <?php echo $main_rs[2]; ?>"></i><span class="app-menu__label"><?php echo $main_rs[1]; ?></span></a></li><?php
																																																																																																																					}
																																																																																																																				}
																																																																																																																			} else {
																																																																																																																				echo $cn->error;
																																																																																																																			}
																																																																																																																		}
																																																																																																																	} else {
																																																																																																																		echo "<center><h5 style='color: white;'>No menus found</h5></center>";
																																																																																																																	}
																																																																																																																} else {
																																																																																																																	echo $cn->error;
																																																																																																																}
																																																																																																															} else {


																																																																																																																$getMain = mysqli_query($conn, "SELECT DISTINCT main_menus.mainMenuID, main_menus.mainMenuText, main_menus.mainMenuIcon, main_menus.mainMenuURL, user_main_menus.userID FROM user_main_menus JOIN main_menus ON (user_main_menus.mainMenuID = main_menus.mainMenuID AND user_main_menus.mainMenuMode = 1 AND user_main_menus.userID = '" . $_SESSION['userIdd'] . "') ORDER BY mainMenuRank");
																																																																																																																if ($getMain) {
																																																																																																																	$main_num = mysqli_num_rows($getMain);
																																																																																																																	if ($main_num > 0) {
																																																																																																																		while ($main_rs = mysqli_fetch_array($getMain)) {

																																																																																																																			$getSubMain = mysqli_query($conn, "SELECT DISTINCT sub_menus.subMenuID, sub_menus.subMenuText, sub_menus.subMenuIcon, sub_menus.subMenuURL, sub_menus.mainMenuID, user_sub_menus.userID FROM sub_menus JOIN user_sub_menus ON (user_sub_menus.subMenuID = sub_menus.subMenuID AND user_sub_menus.subMenuMode = 1 AND user_sub_menus.userID = '" . $_SESSION['userIdd'] . "' AND sub_menus.mainMenuID = '" . $main_rs[0] . "') ORDER BY subMenuRank");
																																																																																																																			if ($getSubMain) {
																																																																																																																				$submenu_num = mysqli_num_rows($getSubMain);
																																																																																																																				if ($submenu_num > 0) { ?>
								<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon <?php echo $main_rs[2]; ?>"></i><span class="app-menu__label"><?php echo $main_rs[1]; ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
									<ul class="treeview-menu"><?php
																																																																																																																					while ($submenu_rs = mysqli_fetch_array($getSubMain)) {

																																																																																																																						if ($submenu_rs[1] == "Change Password") {
																?><li><a class="treeview-item" href="<?php echo $submenu_rs[3]; ?>" data-id="<?php echo $_SESSION['userName']; ?>" data-toggle="modal" data-target="#changePasswordModal"><i class="icon <?php echo $submenu_rs[2]; ?>"></i> <?php echo $submenu_rs[1]; ?></a></li><?php
																																																																																																																						} else if ($submenu_rs[1] == "2-Step Verification") {
																																																																																	?><li><a class="treeview-item" href="<?php echo $submenu_rs[3]; ?>" id="securitySubMenu" data-id="<?php echo $_SESSION['userIdd']; ?>" data-toggle="modal" data-target="#securitySettingsModal"><i class="icon <?php echo $submenu_rs[2]; ?>"></i> <?php echo $submenu_rs[1]; ?></a></li><?php
																																																																																																																																																							} else {
																																																																																																																																																								?><li><a class="treeview-item" href="<?php echo $submenu_rs[3]; ?>"><i class="icon <?php echo $submenu_rs[2]; ?>"></i> <?php echo $submenu_rs[1]; ?></a></li><?php
																																																																																																																																																																																															}
																																																																																																																																																																																														} ?>
									</ul>
								</li><?php
																																																																																																																				} else {
																																																																																																																					if ($main_rs[1] == "Logout") {
										?><li><a class="app-menu__item" href="<?php echo $main_rs[3]; ?>" id="logoutOutSide" data-id="<?php echo $_SESSION['userName']; ?>"><i class="app-menu__icon <?php echo $main_rs[2]; ?>"></i><span class="app-menu__label">Logout</a></li><?php
																																																																																																																					} else {
																																																																					?><li><a class="app-menu__item" href="<?php echo $main_rs[3]; ?>"><i class="app-menu__icon <?php echo $main_rs[2]; ?>"></i><span class="app-menu__label"><?php echo $main_rs[1]; ?></span></a></li><?php
																																																																																																																					}
																																																																																																																				}
																																																																																																																			} else {
																																																																																																																				echo $cn->error;
																																																																																																																			}
																																																																																																																		}
																																																																																																																	} else {
																																																																																																																		echo "<center><h5 style='color: white;'>No menus found</h5></center>";
																																																																																																																	}
																																																																																																																} else {
																																																																																																																	echo $cn->error;
																																																																																																																}
																																																																																																															}
																																																																																																																						?>
	</ul>

</aside>