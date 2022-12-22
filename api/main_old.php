<?php
	session_start();
	header("Content-type: application/json");
	date_default_timezone_set('Africa/Mogadishu');
	include("../library/conn.php");

	//Include required PHPMailer files
	require '../library/mailer/PHPMailer.php';
	require '../library/mailer/SMTP.php';
	require '../library/mailer/Exception.php';

	//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	$action = $_POST['action'];
	$errorList = array();

	// ========================== Our Encrytion Function =======================================

	$ereyFure = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
	function bedelXogta($xogta, $ereyFure) {
		$encryption_key = base64_decode($ereyFure);
		$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
		$encrypted = openssl_encrypt($xogta, 'aes-256-cbc', $encryption_key, 0, $iv);
		return base64_encode($encrypted . '::' . $iv);
	}

	function kuceliAsalka($xogta, $ereyFure) {
		$encryption_key = base64_decode($ereyFure);
		list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($xogta), 2), 2, null);
		return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
	}

	//=========================================================================================

	//========== Generate 15 Mixed Random Confirmation code when admin/users signup ===========

	function generateRandomString($length = 25) {
		$characters = '0123456789';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	//========================================================================================

	// ========================== Start of Manage Menus ======================================

	// ----------------------- Add new main menu ---------------------------------------------
	function addNewMainMenu($conn) {
		$data = array();
		foreach ($_POST['mainMenuText'] as $k => $mainMText) {
			$mainMenuIcons = $_POST['mainMenuIcon'][$k];
			$mainMenuLinks = $_POST['mainMenuLink'][$k];
			$getRank = mysqli_query($conn, "SELECT MAX(mainMenuRank) FROM main_menus");
			if (mysqli_num_rows($getRank) > 0) {
				$rank_rs = mysqli_fetch_array($getRank);
				$curr_rank = $rank_rs[0] + 1;
			} else {
				$curr_rank = 1;
			}
			$addMainMenu = mysqli_query($conn, "INSERT INTO main_menus VALUES ('', '" . $mainMText . "', '" . $mainMenuIcons . "', '" . $mainMenuLinks . "' , '1', " . $curr_rank . ")");
			if ($addMainMenu) {
				$readMainMenu = mysqli_query($conn, "SELECT * FROM main_menus ORDER BY mainMenuID DESC LIMIT 1");
				$resu = mysqli_fetch_array($readMainMenu);
				$mMID = $resu[0];
				$getUsers = mysqli_query($conn, "SELECT DISTINCT userID FROM user_main_menus");
				while ($rs = mysqli_fetch_array($getUsers)) {
					mysqli_query($conn, "INSERT INTO user_main_menus VALUES ('', '" . $rs[0] . "', '" . $mMID . "', '1')");
				}
			}
		}
		$data = json_encode(array('Status' => true, 'Message' => 'Main menu(s) have been added successfully'));
		echo $data;
	}

	// ----------------------- Update main menu mode set ALLOWED ----------------------------
	function mainMenuAllowed($conn) {
		global $errorList;
		$data = array();
		extract($_POST);
		$updateMainMenu = mysqli_query($conn, "UPDATE main_menus SET mainMenuMode = '1' WHERE mainMenuID = '" . $thisAllowMain . "'");
		if ($updateMainMenu) {
			$data = json_encode(array('Status' => true, 'Message' => 'Main-menu is set to <b>allowed</b> mode'));
		} else {
			$errorMsg = mysqli_error($conn);
			$errorList[] = $errorMsg;
			$data = json_encode(array('Status' => false, 'Message' => $errorList));
		}
		echo $data;
	}

	// ----------------------- Update main menu mode set NOT ALLOWED ------------------------
	function mainMenuNotAllowed($conn) {
		global $errorList;
		$data = array();
		extract($_POST);
		$updateMainMenu = mysqli_query($conn, "UPDATE main_menus SET mainMenuMode = '0' WHERE mainMenuID = '" . $thisAllowMain . "'");
		if ($updateMainMenu) {
			$data = json_encode(array('Status' => true, 'Message' => 'Main-menu is set to <b>not allowed</b> mode'));
		} else {
			$errorMsg = mysqli_error($conn);
			$errorList[] = $errorMsg;
			$data = json_encode(array('Status' => false, 'Message' => $errorList));
		}
		echo $data;
	}

	// ----------------------- Change main menu rank ----------------------------------------
	function changeMainMenuRank($conn) {
		global $errorList;
		$data = array();
		extract($_POST);
		$cueMRankID = mysqli_query($conn, "SELECT mainMenuID FROM main_menus WHERE mainMenuRank = " . $mainMenuRank . "");
		if (mysqli_num_rows($cueMRankID) > 0) {
			$main_menu_id = mysqli_fetch_array($cueMRankID);
		}
		$cueMIDRank = mysqli_query($conn, "SELECT mainMenuRank FROM main_menus WHERE mainMenuID = " . $mainMenuID . "");
		if (mysqli_num_rows($cueMIDRank) > 0) {
			$main_menu_rank = mysqli_fetch_array($cueMIDRank);
		}
		$updateMainMenuRank = mysqli_query($conn, "UPDATE main_menus SET mainMenuRank = '" . $mainMenuRank . "' WHERE mainMenuID = '" . $mainMenuID . "'");
		if ($updateMainMenuRank) {
			$updateMainRankID = mysqli_query($conn, "UPDATE main_menus SET mainMenuRank = '" . $main_menu_rank[0] . "' WHERE mainMenuID = '" . $main_menu_id[0] . "'");
			if ($updateMainRankID) {
				$data = json_encode(array('Status' => true, 'Message' => 'This main menu rank changed successfully...'));
			} else {
				$errorMsg = mysqli_error($conn);
				$errorList[] = $errorMsg;
				$data = json_encode(array('Status' => false, 'Message' => $errorList));
			}
		} else {
			$errorMsg = mysqli_error($conn);
			$errorList[] = $errorMsg;
			$data = json_encode(array('Status' => false, 'Message' => $errorList));
		}
		echo $data;
	}

	// ----------------------- Fill main menu select option ---------------------------------
	function fillMainMenu($conn){
		global $errorList;
		$mainMenuInfo = array();
		$data = array();
		extract($_POST);
		$result = mysqli_query($conn, "SELECT * FROM main_menus");
		if ($result) {
			$num_rows = mysqli_num_rows($result);
			if ($num_rows > 0) {
				while ($row = mysqli_fetch_array($result)) {
					$mainMenuInfo[] = $row;
				}
				$data = json_encode(array('Status' => true, 'Message' => $mainMenuInfo));
			} else {
				$data = json_encode(array('Status' => false, 'Message' => "Data Not Found"));
			}
		} else {
			$errorMsg = mysqli_error($conn);
			$errorList[] = $errorMsg;
			$data = json_encode(array('Status' => false, 'Message' => $errorList));
		}
		echo $data;
	}

	// ----------------------- Delete main menu ---------------------------------------------
	function deleteMainMenu($conn) {
		global $errorList;
		$data = array();
		extract($_POST);
		$curMainMenuRank = mysqli_query($conn, "SELECT mainMenuRank FROM main_menus WHERE mainMenuID = " . $getMainMenuID . "");
		$rn_rs = mysqli_fetch_array($curMainMenuRank);
		$currentMMenuRank = $rn_rs[0];
		$getMainMenuRank = mysqli_query($conn, "SELECT * FROM main_menus WHERE mainMenuID > " . $getMainMenuID . "");
		if (mysqli_num_rows($getMainMenuRank) > 0) {
			while ($rs = mysqli_fetch_array($getMainMenuRank)) {
				$nextMainMenuID = $rs[0];
				$mainMRank = $currentMMenuRank;
				$updateMainMRank = mysqli_query($conn, "UPDATE main_menus SET mainMenuRank = " . $mainMRank . " WHERE mainMenuID = " . $nextMainMenuID . "") or die(mysqli_error($conn));
				$currentMMenuRank++;
			}
		}

		$delEx = mysqli_query($conn, "DELETE FROM main_menus WHERE mainMenuID = " . $getMainMenuID . "");
		if ($delEx) {
			$delSub = mysqli_query($conn, "DELETE FROM sub_menus WHERE mainMenuID = " . $getMainMenuID . "");
			if ($delSub) {
				$data = json_encode(array('Status' => true, 'Message' => 'Main menu has been deleted successfully...'));
			} else {
				$errorMsg = mysqli_error($conn);
				$errorList[] = $errorMsg;
				$data = json_encode(array('Status' => false, 'Message' => $errorList));
			}
		} else {
			$errorMsg = mysqli_error($conn);
			$errorList[] = $errorMsg;
			$data = json_encode(array('Status' => false, 'Message' => $errorList));
		}
		echo $data;
	}

	// ----------------------- Add new sub menu ---------------------------------------------
	function addNewSubMenu($conn) {
		$data = array();
		foreach ($_POST['subMenuText'] as $k => $subMText) {
			$subMenuIcons = $_POST['subMenuIcon'][$k];
			$subMenuLinks = $_POST['subMenuLink'][$k];
			$mainMenuID = $_POST['selectMainMenuID'][$k];
			$getRank = mysqli_query($conn, "SELECT MAX(subMenuRank) FROM sub_menus WHERE mainMenuID = '" . $mainMenuID . "'");
			if (mysqli_num_rows($getRank) > 0) {
				$rank_rs = mysqli_fetch_array($getRank);
				$curr_rank = $rank_rs[0] + 1;
			} else {
				$curr_rank = 1;
			}
			$addSubMenu = mysqli_query($conn, "INSERT INTO sub_menus VALUES ('', '" . $subMText . "', '" . $subMenuIcons . "', '" . $subMenuLinks . "', '" . $mainMenuID . "', '1', '" . $curr_rank . "')");
			if ($addSubMenu) {
				$readSubMenu = mysqli_query($conn, "SELECT * FROM sub_menus ORDER BY subMenuID DESC LIMIT 1");
				$resu = mysqli_fetch_array($readSubMenu);
				$sMID = $resu[0];
				$getUsers = mysqli_query($conn, "SELECT DISTINCT userID FROM user_sub_menus");
				while ($rs = mysqli_fetch_array($getUsers)) {
					mysqli_query($conn, "INSERT INTO user_sub_menus VALUES ('', '" . $rs[0] . "', '" . $sMID . "', '1')");
				}
			}
		}
		$data = json_encode(array('Status' => true, 'Message' => 'The sub menu(s) have been added successfully'));
		echo $data;
	}

	// ----------------------- Update sub menu details --------------------------------------
	function updateSubMenus($conn) {
		global $errorList;
		$data = array();
		extract($_POST);
		if ($originalMainMenu == $select_m_m_id) {
			$updateSubMenu = mysqli_query($conn, "UPDATE sub_menus SET subMenuText = '" . $update_s_m_text . "', subMenuIcon = '" . $update_s_m_icon . "', subMenuURL = '" . $update_s_m_link . "', mainMenuID = '" . $select_m_m_id . "' WHERE subMenuID = '" . $update_s_m_id . "'");
			if ($updateSubMenu) {
				$data = json_encode(array('Status' => true, 'Message' => 'This sub menu has been updated successfully'));
			} else {
				$errorMsg = mysqli_error($conn);
				$errorList[] = $errorMsg;
				$data = json_encode(array('Status' => false, 'Message' => $errorList));
			}
		} else {
			$maxSubMRank = mysqli_query($conn, "SELECT MAX(subMenuRank) FROM sub_menus WHERE mainMenuID = " . $select_m_m_id . "");
			$max_sub_num = mysqli_num_rows($maxSubMRank);
			if ($max_sub_num > 0) {
				$max_sub_rs = mysqli_fetch_array($maxSubMRank);
				$newRank = $max_sub_rs[0] + 1;
			}
			$updateSubMenu = mysqli_query($conn, "UPDATE sub_menus SET subMenuText = '" . $update_s_m_text . "', subMenuIcon = '" . $update_s_m_icon . "', subMenuURL = '" . $update_s_m_link . "', mainMenuID = '" . $select_m_m_id . "', subMenuRank = " . $newRank . " WHERE subMenuID = '" . $update_s_m_id . "'");
			if ($updateSubMenu) {
				$data = json_encode(array('Status' => true, 'Message' => 'This sub menu has been updated successfully'));
			} else {
				$errorMsg = mysqli_error($conn);
				$errorList[] = $errorMsg;
				$data = json_encode(array('Status' => false, 'Message' => $errorList));
			}
		}
		echo $data;
	}

	// ----------------------- Update sub menu mode set ALLOWED ----------------------------
	function subMenuAllowed($conn) {
		global $errorList;
		$data = array();
		extract($_POST);
		$updateSubMenu = mysqli_query($conn, "UPDATE sub_menus SET subMenuMode = '1' WHERE subMenuID = '" . $thisAllowSub . "'");
		if ($updateSubMenu) {
			$data = json_encode(array('Status' => true, 'Message' => 'Sub-menu is set to <b>allowed</b> mode'));
		} else {
			$errorMsg = mysqli_error($conn);
			$errorList[] = $errorMsg;
			$data = json_encode(array('Status' => false, 'Message' => $errorList));
		}
		echo $data;
	}

	// ----------------------- Update sub menu mode set NOT ALLOWED ------------------------
	function subMenuNotAllowed($conn) {
		global $errorList;
		$data = array();
		extract($_POST);
		$updateSubMenu = mysqli_query($conn, "UPDATE sub_menus SET subMenuMode = '0' WHERE subMenuID = '" . $thisAllowSub . "'");
		if ($updateSubMenu) {
			$data = json_encode(array('Status' => true, 'Message' => 'Sub-menu is set to <b>not allowed</b> mode'));
		} else {
			$errorMsg = mysqli_error($conn);
			$errorList[] = $errorMsg;
			$data = json_encode(array('Status' => false, 'Message' => $errorList));
		}
		echo $data;
	}

	// ----------------------- Change sub menu rank ---------------------------------------
	function changeSubMenuRank($conn) {
		global $errorList;
		$data = array();
		extract($_POST);
		$cueSRankID = mysqli_query($conn, "SELECT subMenuID FROM sub_menus WHERE subMenuRank = " . $subMenuRank . " AND mainMenuID = " . $mainMenuID . " ");
		$cur_rank_num = mysqli_num_rows($cueSRankID);
		if ($cur_rank_num > 0) {
			$sub_menu_id = mysqli_fetch_array($cueSRankID);
			$errorList[] = $sub_menu_id;
			$data = json_encode(array('Status' => false, 'Message' => $errorList));
		}
		$cueSIDRank = mysqli_query($conn, "SELECT subMenuRank FROM sub_menus WHERE subMenuID = " . $subMenuID . "");
		$cur_rank_num = mysqli_num_rows($cueSIDRank);
		if ($cur_rank_num > 0) {
			$sub_menu_rank = mysqli_fetch_array($cueSIDRank);
		}
		$updateSubMenuRank = mysqli_query($conn, "UPDATE sub_menus SET subMenuRank = '" . $subMenuRank . "' WHERE subMenuID = '" . $subMenuID . "'");
		if ($updateSubMenuRank) {
			$updateSubRankID = mysqli_query($conn, "UPDATE sub_menus SET subMenuRank = '" . $sub_menu_rank[0] . "' WHERE subMenuID = '" . $sub_menu_id[0] . "'");
			if ($updateSubRankID) {
				$data = json_encode(array('Status' => true, 'Message' => 'This sub menu rank has been changed successfully...'));
			} else {
				$errorMsg = mysqli_error($conn);
				$errorList[] = $errorMsg;
				$data = json_encode(array('Status' => false, 'Message' => $errorList));
			}
		} else {
			$errorMsg = mysqli_error($conn);
			$errorList[] = $errorMsg;
			$data = json_encode(array('Status' => false, 'Message' => $errorList));
		}
		echo $data;
	}

	// ----------------------- Delete sub menu --------------------------------------------
	function deleteSubMenu($conn) {
		global $errorList;
		$data = array();
		extract($_POST);
		$curSubMenuRank = mysqli_query($conn, "SELECT subMenuRank, mainMenuID FROM sub_menus WHERE subMenuID = " . $getSubMenuID . "");
		$rn_rs = mysqli_fetch_array($curSubMenuRank);
		$currentSMenuRank = $rn_rs[0];
		$getSubMenuRank = mysqli_query($conn, "SELECT * FROM sub_menus WHERE subMenuID > " . $getSubMenuID . " AND mainMenuID = " . $rn_rs[1] . " ");
		if (mysqli_num_rows($getSubMenuRank) > 0) {
			while ($rs = mysqli_fetch_array($getSubMenuRank)) {
				$nextSubMenuID = $rs[0];
				$subMRank = $currentSMenuRank;
				$updateMainMRank = mysqli_query($conn, "UPDATE sub_menus SET subMenuRank = " . $subMRank . " WHERE subMenuID = " . $nextSubMenuID . "") or die(mysqli_error($conn));
				$currentSMenuRank++;
			}
		}
		$delEx = mysqli_query($conn, "DELETE FROM sub_menus WHERE subMenuID = " . $getSubMenuID . "");
		if ($delEx) {
			$data = json_encode(array('Status' => true, 'Message' => 'The sub menu has been deleted successfully...'));
		} else {
			$errorMsg = mysqli_error($conn);
			$errorList[] = $errorMsg;
			$data = json_encode(array('Status' => false, 'Message' => $errorList));
		}
		echo $data;
	}

	// ========================== End of Manage Menus ====================================

	// ========================== Start of User Privileges ===============================

	// ----------------------- Fill username in the user privileges page -----------------
	function userNamesPrivileges($conn) {
		$user_names = array();
		$data = array();
		$result = mysqli_query($conn, "SELECT users.userID, users.userName, employees.empName FROM users JOIN employees ON (users.empID = employees.empID AND employees.empStatus = 'Working' AND users.registeredBy = '" . $_SESSION['userIdd'] . "')");
		if ($result) {
			$num_rows = mysqli_num_rows($result);
			if ($num_rows > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					$user_names[] = $row;
				}
				$data = json_encode(array('Status' => true, 'Message' => $user_names));
			} else {
				$data = json_encode(array('Status' => false, 'Message' => "User Names Not Found"));
			}
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}
		echo $data;
	}

	// ----------------------- Fetch User Privileges -------------------------------------
	function fetchUserPrivileges($conn) {
		global $ereyFure;
		global $errorList;
		$data = array();
		extract($_POST);
		$dn = kuceliAsalka($dn, $ereyFure);
		?>
		<div class="tile">
			<div class="tile-body">
				<div class="container-fluid">
					<br>
					<div class="row mb-2">
						<div class="col-md-12">
							<h3 class="text-uppercase">Allowed Pages To Visit</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped" id="grandUserWebpagesToVisitTable">
								<?php
								$getMain = mysqli_query($conn, "SELECT DISTINCT main_menus.mainMenuID, main_menus.mainMenuText, main_menus.mainMenuIcon, main_menus.mainMenuURL, user_main_menus.userID, user_main_menus.mainMenuMode FROM user_main_menus JOIN main_menus ON (user_main_menus.mainMenuID = main_menus.mainMenuID AND user_main_menus.userID = '" . $currentUser . "') ORDER BY main_menus.mainMenuRank");
								if ($getMain) {
									$main_num = mysqli_num_rows($getMain);
									if ($main_num > 0) {
										while ($main_rs = mysqli_fetch_array($getMain)) {
								?>
											<tr>
												<td style="padding: 10px 0px 10px 10px;">
													<?php if ($main_rs[5] == "1") { ?>
														<input type="checkbox" checked="checked" class="form-control" style="height: 17px; width: 17px; display: inline;" name="allowUserMainMenu" id="allowUserMainMenu" data-id="<?php echo $main_rs[0]; ?>" data-src="<?php echo $currentUser; ?>"> &nbsp;&nbsp;
													<?php } else { ?>
														<input type="checkbox" class="form-control" style="height: 17px; width: 17px; display: inline;" name="allowUserMainMenu" id="allowUserMainMenu" data-id="<?php echo $main_rs[0]; ?>" data-src="<?php echo $currentUser; ?>"> &nbsp;&nbsp;
													<?php } ?>
													<i class="<?php echo $main_rs[2]; ?>"></i> &nbsp;&nbsp;<a href="<?php echo $main_rs[3]; ?>"><b><?php echo $main_rs[1]; ?></b></a>
												</td>
											</tr>
											<tr>
												<td>
													<div class="row">
														<?php
														$getSubMain = mysqli_query($conn, "SELECT DISTINCT sub_menus.subMenuID, sub_menus.subMenuText, sub_menus.subMenuIcon, sub_menus.subMenuURL, sub_menus.mainMenuID, user_sub_menus.userID, user_sub_menus.subMenuMode FROM sub_menus JOIN user_sub_menus ON (user_sub_menus.subMenuID = sub_menus.subMenuID AND user_sub_menus.userID = '" . $currentUser . "' AND sub_menus.mainMenuID = '" . $main_rs[0] . "') ORDER BY sub_menus.subMenuRank");
														if ($getSubMain) {
															$submenu_num = mysqli_num_rows($getSubMain);
															if ($submenu_num > 0) {
																while ($submenu_rs = mysqli_fetch_array($getSubMain)) {
																	$sub_menu_id = $submenu_rs[0];
																	$sub_menu_text = $submenu_rs[1]; ?>

																	<div class="col-md-4" style="padding: 10px 10px 10px 75px;">
																		<?php if ($submenu_rs[6] == "1") { ?>
																			<input type="checkbox" checked="checked" class="form-control" style="height: 17px; width: 17px; display: inline;" name="allowUserSubMenu" id="allowUserSubMenu" data-id="<?php echo $submenu_rs[0]; ?>" data-src="<?php echo $currentUser; ?>"> &nbsp;&nbsp;
																		<?php } else { ?>
																			<input type="checkbox" class="form-control" style="height: 17px; width: 17px; display: inline;" name="allowUserSubMenu" id="allowUserSubMenu" data-id="<?php echo $submenu_rs[0]; ?>" data-src="<?php echo $currentUser; ?>"> &nbsp;&nbsp;
																		<?php } ?>
																		<i class="<?php echo $submenu_rs[2]; ?>"></i> &nbsp;&nbsp;<a href="<?php echo $submenu_rs[3]; ?>"><?php echo $submenu_rs[1]; ?></a>
																	</div><?php
																		}
																	} else { /*echo "No Submenus"; */
																	}
																} else {
																	echo mysqli_error($conn);
																}
																			?>
													</div>
												</td>
											</tr>
								<?php
										}
									} else {
										echo "<h5>Sorry, no user privileges found for this user</h5>";
									}
								} else {
									echo mysqli_error($conn);
								}
								?>
							</table>
						</div>
					</div>

					<div class="row mb-2">
						<div class="col-md-12">
							<h3 class="text-uppercase">Allowed Roles To Perform</h3>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped" id="grandUserRolesToPerformTable">
								<?php
								//Get the tables of our database
								$get_user_role_priv = mysqli_query($conn, "SELECT * FROM user_role_privileges WHERE userID = '" . mysqli_real_escape_string($conn, $currentUser) . "'");
								if ($get_user_role_priv) {
									if (mysqli_num_rows($get_user_role_priv) > 0) {
								?>
										<tr align="center">
											<th>Serial</th>
											<th>Role Name</th>
											<th>Insert Role</th>
											<th>Update Role</th>
											<th>Delete Role</th>
										</tr>
										<?php
										$x = 1;
										while ($user_role_rs = mysqli_fetch_array($get_user_role_priv)) {
										?>
											<tr>
												<td align="center"><?php echo $x; ?></td>
												<td align="left"><?php echo ucwords(str_replace("_", " ", $user_role_rs[2])); ?></td>
												<td align="center">
													<?php if ($user_role_rs[3] == "1") { ?>
														<input type="checkbox" checked="checked" class="form-control" style="height: 17px; width: 17px; display: inline;" name="insertRoleAllowed" id="insertRoleAllowed" data-id="<?php echo $user_role_rs[0]; ?>" data-src="<?php echo $user_role_rs[1]; ?>"> &nbsp;&nbsp;
													<?php } else { ?>
														<input type="checkbox" class="form-control" style="height: 17px; width: 17px; display: inline;" name="insertRoleAllowed" id="insertRoleAllowed" data-id="<?php echo $user_role_rs[0]; ?>" data-src="<?php echo $user_role_rs[1]; ?>"> &nbsp;&nbsp;
													<?php } ?>
												</td>
												<td align="center">
													<?php if ($user_role_rs[4] == "1") { ?>
														<input type="checkbox" checked="checked" class="form-control" style="height: 17px; width: 17px; display: inline;" name="updateRoleAllowed" id="updateRoleAllowed" data-id="<?php echo $user_role_rs[0]; ?>" data-src="<?php echo $user_role_rs[1]; ?>"> &nbsp;&nbsp;
													<?php } else { ?>
														<input type="checkbox" class="form-control" style="height: 17px; width: 17px; display: inline;" name="updateRoleAllowed" id="updateRoleAllowed" data-id="<?php echo $user_role_rs[0]; ?>" data-src="<?php echo $user_role_rs[1]; ?>"> &nbsp;&nbsp;
													<?php } ?>
												</td>
												<td align="center">
													<?php if ($user_role_rs[5] == "1") { ?>
														<input type="checkbox" checked="checked" class="form-control" style="height: 17px; width: 17px; display: inline;" name="deleteRoleAllowed" id="deleteRoleAllowed" data-id="<?php echo $user_role_rs[0]; ?>" data-src="<?php echo $user_role_rs[1]; ?>"> &nbsp;&nbsp;
													<?php } else { ?>
														<input type="checkbox" class="form-control" style="height: 17px; width: 17px; display: inline;" name="deleteRoleAllowed" id="deleteRoleAllowed" data-id="<?php echo $user_role_rs[0]; ?>" data-src="<?php echo $user_role_rs[1]; ?>"> &nbsp;&nbsp;
													<?php } ?>
												</td>
											</tr>
								<?php
											$x++;
										}
									}
								}
								?>
							</table>
						</div>
					</div>


				</div>
			</div>
		</div>

		<?php
	}

	// ----------------------- Update user main menu mode set ALLOWED --------------------
	function userMainMenuAllowed($conn) {
		$data = array();
		extract($_POST);
		$updateMainMenuAllowed = mysqli_query($conn, "UPDATE user_main_menus SET mainMenuMode = '1' WHERE mainMenuID = '" . $thisAllowMain . "' AND userID = '" . $roleUserID . "'");
		if ($updateMainMenuAllowed) {
			$data = json_encode(array('Status' => true, 'Message' => 'Main-menu is set to <b>allowed</b> mode'));
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}
		echo $data;
	}

	// ----------------------- Update user main menu mode set NOT ALLOWED ----------------
	function userMainMenuNotAllowed($conn) {
		$data = array();
		extract($_POST);
		$updateMainMenuNotAllowed = mysqli_query($conn, "UPDATE user_main_menus SET mainMenuMode = '0' WHERE mainMenuID = '" . $thisAllowMain . "' AND userID = '" . $roleUserID . "'");
		if ($updateMainMenuNotAllowed) {
			$data = json_encode(array('Status' => true, 'Message' => 'Main-menu is set to <b>not allowed</b> mode'));
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}
		echo $data;
	}

	// ----------------------- Update user sub menu mode set ALLOWED ---------------------
	function userSubMenuAllowed($conn) {
		$data = array();
		extract($_POST);
		$updateSubMenuAllowed = mysqli_query($conn, "UPDATE user_sub_menus SET subMenuMode = '1' WHERE subMenuID = '" . $thisAllowSub . "' AND userID = '" . $roleUserID . "'");
		if ($updateSubMenuAllowed) {
			$data = json_encode(array('Status' => true, 'Message' => 'Sub-menu is set to <b>allowed</b> mode'));
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}
		echo $data;
	}

	// ----------------------- Update user sub menu mode set NOT ALLOWED ----------------
	function userSubMenuNotAllowed($conn) {
		$data = array();
		extract($_POST);
		$updateSubMenuNotAllowed = mysqli_query($conn, "UPDATE user_sub_menus SET subMenuMode = '0' WHERE subMenuID = '" . $thisAllowSub . "' AND userID = '" . $roleUserID . "'");
		if ($updateSubMenuNotAllowed) {
			$data = json_encode(array('Status' => true, 'Message' => 'Sub-menu is set to <b>not allowed</b> mode'));
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}
		echo $data;
	}

	// ----------------------- Update user insert privilege mode set ALLOWED ------------
	function userInsertAllowed($conn) {
		$data = array();
		extract($_POST);
		$updateInsertRoleAllowed = mysqli_query($conn, "UPDATE user_role_privileges SET insertRole = '1' WHERE roleID = '" . $userRoleID . "' AND userID = '" . $roleUserID . "'");
		if ($updateInsertRoleAllowed) {
			$data = json_encode(array('Status' => true, 'Message' => 'Insert role is set to <b>allowed</b> mode'));
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}
		echo $data;
	}

	// ----------------------- Update user insert privilege mode set NOT ALLOWED --------
	function userInsertNotAllowed($conn) {
		$data = array();
		extract($_POST);
		$updateInsertRoleNotAllowed = mysqli_query($conn, "UPDATE user_role_privileges SET insertRole = '0' WHERE roleID = '" . $userRoleID . "' AND userID = '" . $roleUserID . "'");
		if ($updateInsertRoleNotAllowed) {
			$data = json_encode(array('Status' => true, 'Message' => 'Insert role is set to <b>not allowed</b> mode'));
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}

		echo $data;
	}

	// ----------------------- Update user update privilege mode set ALLOWED -----------
	function userUpdateAllowed($conn) {
		$data = array();
		extract($_POST);

		$updateUpdateRoleAllowed = mysqli_query($conn, "UPDATE user_role_privileges SET updateRole = '1' WHERE roleID = '" . $userRoleID . "' AND userID = '" . $roleUserID . "'");
		if ($updateUpdateRoleAllowed) {
			$data = json_encode(array('Status' => true, 'Message' => 'Update role is set to <b>allowed</b> mode'));
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}

		echo $data;
	}

	// ----------------------- Update user update privilege mode set NOT ALLOWED -------
	function userUpdateNotAllowed($conn) {
		$data = array();
		extract($_POST);

		$updateUpdateRoleNotAllowed = mysqli_query($conn, "UPDATE user_role_privileges SET updateRole = '0' WHERE roleID = '" . $userRoleID . "' AND userID = '" . $roleUserID . "'");
		if ($updateUpdateRoleNotAllowed) {
			$data = json_encode(array('Status' => true, 'Message' => 'Update role is set to <b>not allowed</b> mode'));
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}

		echo $data;
	}

	// ----------------------- Update user delete privilege mode set ALLOWED -----------
	function userDeleteAllowed($conn) {
		$data = array();
		extract($_POST);

		$updateDeleteRoleAllowed = mysqli_query($conn, "UPDATE user_role_privileges SET deleteRole = '1' WHERE roleID = '" . $userRoleID . "' AND userID = '" . $roleUserID . "'");
		if ($updateDeleteRoleAllowed) {
			$data = json_encode(array('Status' => true, 'Message' => 'Delete role is set to <b>allowed</b> mode'));
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}

		echo $data;
	}

	// ----------------------- Update user delete privilege mode set NOT ALLOWED -------
	function userDeleteNotAllowed($conn) {
		$data = array();
		extract($_POST);

		$updateDeleteRoleNotAllowed = mysqli_query($conn, "UPDATE user_role_privileges SET deleteRole = '0' WHERE roleID = '" . $userRoleID . "' AND userID = '" . $roleUserID . "'");
		if ($updateDeleteRoleNotAllowed) {
			$data = json_encode(array('Status' => true, 'Message' => 'Delete role is set to <b>not allowed</b> mode'));
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}

		echo $data;
	}

	// ========================== End of User Privileges ===============================

	// ========================== Direct Login Process =================================

	function login_process($conn) {

		global $errorList;

		$data = array();
		extract($_POST);

		//--------------------- Direct login process starts here -----------------------------
		$checkUser = mysqli_query($conn, "SELECT users.userID, users.userName, users.twoStepVerification, employees.empName, employees.titlePosition, employees.empEmail, employees.empPhoto, employees.empStatus FROM users JOIN employees ON (employees.empID = users.empID AND users.userName = '" . $user_name . "')");

		if ($checkUser) {

			$countUsers = mysqli_num_rows($checkUser);

			if ($countUsers > 0) {

				$userDetails = mysqli_fetch_array($checkUser);

				$emp_Status = $userDetails[7];

				if ($emp_Status == "Left") {

					$errorMsg = "Sorry, <b>" . $user_name . "</b> is bloacked by the admin, please contact the administrator";;
					$errorList[] = $errorMsg;
					$data = json_encode(array('Status' => false, 'Message' => $errorList));
				} else {

					$loginQry = mysqli_query($conn, "SELECT password FROM users WHERE userName = '" . $userDetails[1] . "' AND password = '" . $pass_word . "'");

					if ($loginQry) {

						$countPassword = mysqli_num_rows($loginQry);

						if ($countPassword > 0) {

							//Check Two-Step Verification process

							if ($userDetails[2] == "Enabled") {

								$_SESSION["tempUserID"] = $userDetails[0];
								$_SESSION["tempFullName"] = $userDetails[3];
								$_SESSION["tempUserEmail"] = $userDetails[5];
								$_SESSION["tempUserType"] = $userDetails[4];

								//Generate the Activiation code and set it to the logging admin/user, and make the status Confirmation Code Sent
								$verification_code = "M-" . generateRandomString(6);

								$update_verification_code = mysqli_query($conn, "UPDATE users SET verificationCode = '" . $verification_code . "' WHERE userID = '" . mysqli_real_escape_string($conn, $_SESSION["tempUserID"]) . "'") or die(mysqli_error($conn));

								if ($update_verification_code) {

									$messageBody = "<h2 class='text-info'>Dear " . $_SESSION["tempFullName"] . ",</h2><p style='font: 17px Arial; line-height: 1.7'>This is your one time verification code to login to marjan.so => <span class='text-info' style='font-size: 20px;'><strong>" . $verification_code . "</strong></span> <br><br>Best regards,<br><strong>Marjan Real Estate Team</strong><br><br>";

									$mail = new PHPMailer(true);							                                    //Create instance of PHPMailer
									$mail->isSMTP();									                                        //Set mailer to use smtp
									//$mail->SMTPDebug = 2;
									$mail->Host = "mail.marjan.so";						                                        //Define smtp host
									//$mail->SMTPAuth = true;								                                    //Enable smtp authentication
									//$mail->SMTPSecure = "ssl";							                                    //Set smtp encryption type (ssl/tls)
									$mail->Port = "25";								                                            //Port to connect smtp
									$mail->Username = "no-reply@marjan.so";	    	                                            //Set gmail username
									$mail->Password = "Marjaan9414";						                                    //Set gmail password
									$mail->Subject = "Login Verification Code";	                                                //Email subject
									$mail->setFrom("no-reply@marjan.so", "Marjan Real Estate");	    		                    //Set sender email
									$mail->isHTML(true);									                                    //Enable HTML
									//$mail->addAttachment('img/attachment.png');			                                    //Attachment
									//Email body
									$mail->Body = $messageBody;
									$mail->addAddress($_SESSION["tempUserEmail"]);				                                //Add recipient

									//Finally send email
									if ($mail->send()) {
										//echo $mail->send();
										$data = json_encode(array('Status' => true, 'Message' => 'enabled2StepVerifying'));
									} else {
										//echo "Message could not be sent. Mailer Error: ". $mail->ErrorInfo;
										$errorMsg = $mail->ErrorInfo;
										$errorList[] = $errorMsg;
										$data = json_encode(array('Status' => false, 'Message' => $errorList));
									}

									$mail->smtpClose();										//Closing smtp connection

								}
							} else {

								$loginDate = date("Y-m-d H:i:s");
								$_SESSION["userIdd"] = $userDetails[0];
								$_SESSION["userName"] = $userDetails[1];
								$_SESSION["fullName"] = $userDetails[3];
								$_SESSION["userType"] = $userDetails[4];
								$_SESSION["userPhoto"] = $userDetails[6];

								unset($_SESSION['tempUserID']);
								unset($_SESSION['tempFullName']);
								unset($_SESSION['tempUserEmail']);
								unset($_SESSION['tempUserType']);

								mysqli_query($conn, "INSERT INTO `user_logins`(`userID`, `loginDateTime`) VALUES ('" . $_SESSION["userIdd"] . "', '" . $loginDate . "')") or die(mysqli_error($conn));
								mysqli_query($conn, "UPDATE users SET userStatus = 'Online' WHERE userID = '" . $_SESSION["userIdd"] . "'") or die(mysqli_error($conn));

								$data = json_encode(array('Status' => true, 'Message' => 'directLoginNoVerifying'));
							}
						} else {
							$errorMsg = "Sorry, password is incorrect. Try again!";;
							$errorList[] = $errorMsg;
							$data = json_encode(array('Status' => false, 'Message' => $errorList));
						}
					} else {
						$errorMsg = mysqli_error($conn);
						$errorList[] = $errorMsg;
						$data = json_encode(array('Status' => false, 'Message' => $errorList));
					}
				}
			} else {

				$checkInvestor = mysqli_query($conn, "SELECT investorID, investorName, investorTell, Email, investorPasscode, investorPhoto, investorStatus FROM investors WHERE investorTell = '" . $user_name . "' OR Email = '" . $user_name . "' OR investorID = '" . $user_name . "'");
				if ($checkInvestor) {
					if (mysqli_num_rows($checkInvestor) > 0) {
						$investorDetails = mysqli_fetch_array($checkInvestor);
						$invstr_Status = $investorDetails[6];
						if ($invstr_Status == "Left") {
							$errorMsg = "Sorry, <b>" . $user_name . "</b> is bloacked by the admin, please contact the administrator";;
							$errorList[] = $errorMsg;
							$data = json_encode(array('Status' => false, 'Message' => $errorList));
						} else {
							$investorLoginQry = mysqli_query($conn, "SELECT investorPasscode FROM investors WHERE (investorTell = '" . $investorDetails[2] . "' OR Email = '" . $investorDetails[3] . "' OR investorID = '" . $investorDetails[0] . "') AND investorPasscode = '" . $pass_word . "'");
							if ($investorLoginQry) {
								if (mysqli_num_rows($investorLoginQry) > 0) {
									$loginDate = date("Y-m-d H:i:s");
									$_SESSION["investorIdd"] = $investorDetails[0];
									$_SESSION["investorName"] = $investorDetails[1];
									$_SESSION["investorMobile"] = $investorDetails[3];
									$_SESSION["investorEmail"] = $investorDetails[4];
									$_SESSION["investorPhoto"] = $investorDetails[5];
									$_SESSION["userType"] = 'Investor';
									mysqli_query($conn, "INSERT INTO `investor_logins`(`investorID`, `loginDateTime`) VALUES ('" . $_SESSION["investorIdd"] . "', '" . $loginDate . "')") or die(mysqli_error($conn));
									mysqli_query($conn, "UPDATE investors SET loginStatus = 'Online' WHERE investorID = '" . $_SESSION["investorIdd"] . "'") or die(mysqli_error($conn));
									$data = json_encode(array('Status' => true, 'Message' => 'investorLoginSuccessful'));
								} else {
									$errorMsg = "Sorry, password is incorrect. Try again!";;
									$errorList[] = $errorMsg;
									$data = json_encode(array('Status' => false, 'Message' => $errorList));
								}
							} else {
								$errorMsg = mysqli_error($conn);
								$errorList[] = $errorMsg;
								$data = json_encode(array('Status' => false, 'Message' => $errorList));
							}
						}
					} else {
						$errorMsg = "Sorry, <b>" . $user_name . "</b> does not exist anymore";;
						$errorList[] = $errorMsg;
						$data = json_encode(array('Status' => false, 'Message' => $errorList));
					}
				} else {
					$errorMsg = mysqli_error($conn);
					$errorList[] = $errorMsg;
					$data = json_encode(array('Status' => false, 'Message' => $errorList));
				}
			}
		} else {

			$errorMsg = mysqli_error($conn);
			$errorList[] = $errorMsg;
			$data = json_encode(array('Status' => false, 'Message' => $errorList));
		}

		echo $data;
	}

	// ========================== End of Direct Login Process ==========================

	// ========================== Start of Resend Verification Code ====================

	function resend_verification_code($conn) {

		//Generate the Activiation code and set it to the logging admin/user, and make the status Confirmation Code Sent
		$verification_code = "M-" . generateRandomString(6);

		$update_verification_code = mysqli_query($conn, "UPDATE users SET verificationCode = '" . $verification_code . "' WHERE userID = '" . mysqli_real_escape_string($conn, $_SESSION["tempUserID"]) . "'") or die(mysqli_error($conn));

		if ($update_verification_code) {

			$messageBody = "<h2 class='text-info'>Dear " . $_SESSION["tempFullName"] . ",</h2><p style='font: 17px Arial; line-height: 1.7'>This is your one time verification code to login to marjan.so => <span class='text-info' style='font-size: 20px;'><strong>" . $verification_code . "</strong></span> <br><br>Best regards,<br><strong>Marjan Real Estate Team</strong><br><br>";

			$mail = new PHPMailer(true);							                                        //Create instance of PHPMailer
			$mail->isSMTP();									                                        //Set mailer to use smtp
			$mail->Host = "mail.marjan.so";						                                        //Define smtp host
			//$mail->SMTPAuth = true;								                                    //Enable smtp authentication
			//$mail->SMTPSecure = "ssl";							                                    //Set smtp encryption type (ssl/tls)
			$mail->Port = "25";								                                            //Port to connect smtp
			$mail->Username = "no-reply@marjan.so";	    	                                            //Set gmail username
			$mail->Password = "Marjaan9414";						                                    //Set gmail password
			$mail->Subject = "Login Verification Code";	                                                //Email subject
			$mail->setFrom("no-reply@marjan.so", "Marjan Real Estate");	    		                    //Set sender email
			$mail->isHTML(true);									                                    //Enable HTML
			//$mail->addAttachment('img/attachment.png');			                                    //Attachment
			//Email body
			$mail->Body = $messageBody;
			$mail->addAddress($_SESSION["tempUserEmail"]);				                                //Add recipient

			//Finally send email
			if ($mail->send()) {
				//echo "Email Sent..!";
				$successMessage = "Verification code sent to <strong>" . $_SESSION["tempUserEmail"] . "</strong>";
				$data = json_encode(array('Status' => true, 'Message' => $successMessage));
			} else {
				//echo "Message could not be sent. Mailer Error: ". $mail->ErrorInfo;
				$errorMsg = $mail->ErrorInfo;
				$errorList[] = $errorMsg;
				$data = json_encode(array('Status' => false, 'Message' => $errorList));
			}

			$mail->smtpClose();										//Closing smtp connection

			echo $data;
		}
	}

	// ========================== End of Resend Verification Code =====================

	// ========================== Login process with 2 step verification starts here ==

	function login_with_2step_verification($conn) {

		global $errorList;
		$data = array();
		extract($_POST);

		$getVerificationCode = mysqli_query($conn, "SELECT verificationCode FROM users WHERE userID = '" . mysqli_real_escape_string($conn, $_SESSION["tempUserID"]) . "'");

		if (mysqli_num_rows($getVerificationCode) > 0) {

			$verify_rs = mysqli_fetch_array($getVerificationCode);

			$verifyCode = $verify_rs[0];
			$userEnteredCode = $verify_code;

			if ($verifyCode == $userEnteredCode) {

				$getLoggedUser = mysqli_query($conn, "SELECT users.userID, users.userName, employees.empName, employees.titlePosition, employees.empPhoto FROM users JOIN employees ON (employees.empID = users.empID) WHERE users.userID = '" . mysqli_real_escape_string($conn, $_SESSION["tempUserID"]) . "'");

				if (mysqli_num_rows($getLoggedUser) > 0) {

					$userDetails = mysqli_fetch_array($getLoggedUser);

					$loginDate = date("Y-m-d H:i:s");
					$_SESSION["userIdd"] = $userDetails[0];
					$_SESSION["userName"] = $userDetails[1];
					$_SESSION["fullName"] = $userDetails[2];
					$_SESSION["userType"] = $userDetails[3];
					$_SESSION["userPhoto"] = $userDetails[4];

					unset($_SESSION['tempUserID']);
					unset($_SESSION['tempFullName']);
					unset($_SESSION['tempUserEmail']);
					unset($_SESSION['tempUserType']);

					mysqli_query($conn, "INSERT INTO `user_logins`(`userID`, `loginDateTime`) VALUES ('" . $_SESSION["userIdd"] . "', '" . $loginDate . "')") or die(mysqli_error($conn));
					mysqli_query($conn, "UPDATE users SET userStatus = 'Online' WHERE userID = '" . $_SESSION["userIdd"] . "'") or die(mysqli_error($conn));

					$data = json_encode(array('Status' => true, 'Message' => 'directLoginNoVerifying'));
				} else {

					$errorMsg = "Verification failed, try again";
					$errorList[] = $errorMsg;
					$data = json_encode(array('Status' => false, 'Message' => $errorList));
				}
			} else {

				$errorMsg = "Verification code is incorrect, enter again";
				$errorList[] = $errorMsg;
				$data = json_encode(array('Status' => false, 'Message' => $errorList));
			}
		} else {

			$errorMsg = "Verification code not found, try again";
			$errorList[] = $errorMsg;
			$data = json_encode(array('Status' => false, 'Message' => $errorList));
		}

		echo $data;
	}
	// ========================== End of 2 Step Verification Login Process ============

	// ========================== Start of Check Files Function =======================

	function check_every_file($file) {

		global $errorList;

		if (substr($file, 0, 5) == "photo") {

			// If the uploaded file is photo, then do the following....
			$filename = $_FILES[$file]['name'];
			$thisExt = pathinfo($filename, PATHINFO_EXTENSION);
			$fileSize = $_FILES[$file]['size'];
			$allowedExt = array("jpg", "jpeg", "png", "gif", "ico", "JPEG", "JPG", "PNG", "GIF", "ICO");
			if (in_array($thisExt, $allowedExt)) {
				if ($fileSize > 1000000) {
					$errorList[] = "<b>" . $filename . "</b> is greater than <b>1 MB</b> which is the allowed size";
				} else {
					return "Success###" . $filename . "###" . $thisExt;
				}
			} else {
				$errorList[] = "Images with <b>" . strtoupper($thisExt) . " extension are not allowed</b>";
			}
		} else {

			// If the uploaded file is document, then do the following....
			$filename = $_FILES[$file]['name'];
			$thisExt = pathinfo($filename, PATHINFO_EXTENSION);
			$fileSize = $_FILES[$file]['size'];
			$allowedExt = array("pdf", "jpg", "jpeg", "png", "gif", "PDF", "JPEG", "JPG", "PNG", "GIF");
			if (in_array($thisExt, $allowedExt)) {
				if ($fileSize > 2000000) {
					$errorList[] = "<b>" . $filename . "</b> is bigger than <b>2 MB</b> which is the allowed size";
				} else {
					return "Success###" . $filename . "###" . $thisExt;
				}
			} else {
				$errorList[] = "Documents with <b>" . strtoupper($thisExt) . " extension are not allowed</b>";
			}
		}
	}

	// ========================== End of Check Files Function ========================

	// ========================== Start of Salaries Section ==========================

	//Get the list of employees to charge salary for
	function fetch_employee_charge_salary($conn) {

		extract($_POST);

		$getEmpToChargeSalary = mysqli_query($conn, "SELECT empID, empName, titlePosition, salary FROM employees WHERE empID NOT IN (SELECT empID FROM charge_pay_salaries WHERE salaryMonth = '" . $salMonthSalChar . "' AND (transactionType = '0' OR transactionType = '1') AND transactionStatus = '1') AND titlePosition <> 0 AND empStatus <> '0'");
		if ($getEmpToChargeSalary) {
			$num_row_emp = mysqli_num_rows($getEmpToChargeSalary);
			if ($num_row_emp > 0) {

		?>
				<div class="tile">
					<div class="tile-body">

						<div class="row" style="margin-left: 0px; margin-right: 0px;" id="chargeSalariesPrintArea">
							<div class="col-md-12">

								<div class="table-responsive">
									<table class="table table-striped table-bordered table-sm" id="chargeEmployeesSalariesTable">
										<thead>
											<tr class="bg-info text-white text-center">
												<th><input type="checkbox" class="form-check-input" name="empChargeCheckAll" id="empChargeCheckAll" /> Check All</th>
												<th>Serial</th>
												<th>Employee Name</th>
												<th>Position</th>
												<th>Salary ($)</th>
												<th>Charged Month</th>
											</tr>
										</thead>
										<tbody class="allEmpCharge">

											<?php
											$i = 1;
											$positions_array = array("Super Admin", "Admin", "Finance", "Registrar");
											while ($result = mysqli_fetch_array($getEmpToChargeSalary)) {
												?>
													<tr>
														<td align="center"><input type="checkbox" class="form-check-input" name="empChargeCheck" id="empChargeCheck" value="<?php echo $result[0]; ?>" /></td>
														<td align="center"><?php echo $i; ?></td>
														<td align="left"><?php echo $result[1]; ?></td>
														<td align="left"><?php echo $positions_array[$result[2]]; ?></td>
														<td align="center"><?php echo "$ " . number_format($result[3], 2); ?></td>
														<td align="center"><?php echo $salMonthSalChar ?></td>
													</tr>
												<?php
												$i++;
											}
											?>

										</tbody>
									</table>
								</div>
								<script type="text/javascript">
									$('#chargeEmployeesSalariesTable').DataTable({
										"pageLength": 100
									});
								</script>
							</div>
						</div>

					</div>
				</div>
			<?php

			} else {
			?>
				<div class="tile">
					<div class="tile-body">
						<br>
						<div class="row">
							<div class="col-md-12" style="margin: 0px;">
								<center>
									<h5 style="font-family: 'Tw Cen MT'; color: maroon; font-weight: normal">Employee(s) not found</h5>
								</center>
							</div>
						</div>
						<br>
					</div>
				</div>
			<?php
			}
		} else {
			?>
			<div class="tile">
				<div class="tile-body">
					<br>
					<div class="row">
						<div class="col-md-12" style="margin: 0px;">
							<center>
								<h3 style="font-family: 'Tw Cen MT'; color: maroon; font-weight: normal"><?php echo mysqli_error($conn); ?></h3>
							</center>
						</div>
					</div>
					<br>
				</div>
			</div>
			<?php
		}
	}

	// ----------------------- Charge Employee Salaries ------------------------------
	function charge_employee_salaries($conn) {

		$data = array();
		extract($_POST);

		$numOfChargedEmp = 0;

		$selectedEmployees = explode("###", $embToBeCharged);

		foreach ($selectedEmployees as $empl) {

			//Generate New ID for the current inserted row....
			$getMaxID = mysqli_query($conn, "SELECT MAX(rowNo) FROM charge_pay_salaries") or die(mysqli_error($conn));
			if (mysqli_num_rows($getMaxID) > 0) {
				$maxID = mysqli_fetch_array($getMaxID);
				$curMaxID = $maxID[0] + 1;
				$generatedID = "CHS" . $curMaxID . "-" . date("Y");
			} else {
				$curMaxID = 1;
				$generatedID = "CHS" . $curMaxID . "-" . date("Y");
			}

			$employee_id = $empl;
			$getEmpSal = mysqli_query($conn, "SELECT salary FROM employees WHERE empID = '" . mysqli_real_escape_string($conn, $employee_id) . "'") or die(mysqli_error($conn));
			$emp_result = mysqli_fetch_array($getEmpSal);
			$salary_description = "Charge of " . $salChargeMonth . ", Ref: " . $generatedID;
			$charged_sal = $emp_result['salary'];
			$regDatee = date("Y-m-d H:i:s");

			mysqli_query($conn, "INSERT INTO charge_pay_salaries VALUES ('', '" . $generatedID . "', '" . $employee_id . "', '" . $salChargeMonth . "', '-', '" . $charged_sal . "', '0', '0', '1', '" . $salary_description . "', '" . $_SESSION['userIdd'] . "',  '" . $regDatee . "', '-', '-')");
			$numOfChargedEmp++;
		}

		if ($numOfChargedEmp == 1) {
			$feedBack = $numOfChargedEmp . " employee salary has been charged for " . $salChargeMonth;
		} else if ($numOfChargedEmp > 1) {
			$feedBack = $numOfChargedEmp . " employee salaries has been charged for " . $salChargeMonth;
		}
		$data = json_encode(array('Status' => true, 'Message' => $feedBack));

		echo $data;
	}

	// ----------------------- Fill employee information in salaries form -----------
	function fetch_employee_data($conn) {

		$fetched_employee_result = array();
		$data = array();
		extract($_POST);

		$empResult = mysqli_query($conn, "SELECT titlePosition FROM `employees` WHERE empID = '" . mysqli_real_escape_string($conn, $thisEmp) . "'");
		if ($empResult) {
			if (mysqli_num_rows($empResult) > 0) {
				while ($row = mysqli_fetch_assoc($empResult)) {
					$fetched_employee_result[] = $row;
				}
				$data = json_encode(array('Status' => true, 'Message' => $fetched_employee_result));
			} else {
				$data = json_encode(array('Status' => false, 'Message' => "Data Not Found"));
			}
			echo $data;
		} else {
			$erroMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $erroMsg));
		}
	}

	// ------------- Fill employee charged salary and the remaining balance ---------
	function fetch_employee_charged_remain($conn) {

		$charged_amount = 0;
		$total_paid_salary = 0;
		$remaining_salary = 0;
		$data = array();
		extract($_POST);
		$getChargedSalaryAmount = mysqli_query($conn, "SELECT * FROM charge_pay_salaries WHERE empID = '" . mysqli_real_escape_string($conn, $employeeIdddd) . "' AND salaryMonth = '" . mysqli_real_escape_string($conn, $selectedSalaryMonth) . "' AND transactionType = '0' AND transactionStatus  = '1'");
		if ($getChargedSalaryAmount) {
			if (mysqli_num_rows($getChargedSalaryAmount) > 0) {
				$charged_emp_rs = mysqli_fetch_array($getChargedSalaryAmount);
				$employeee_id = $charged_emp_rs[2];
				$charged_salary_month = $charged_emp_rs[3];
				$charged_amount = $charged_emp_rs[5];
				//Check wether this employee has taken the salary of this month or not
				$getTotalPaidSalary = mysqli_query($conn, "SELECT * FROM charge_pay_salaries WHERE empID = '" . mysqli_real_escape_string($conn, $employeee_id) . "' AND salaryMonth = '" . mysqli_real_escape_string($conn, $charged_salary_month) . "' AND transactionType = '1' AND transactionStatus  = '1'");
				if ($getTotalPaidSalary) {
					if (mysqli_num_rows($getTotalPaidSalary) >= 0) {
						//Calculate the total amount of salary taken by the employee (if there are advanced salaries)
						while ($taken_salary_rs = mysqli_fetch_array($getTotalPaidSalary)) {
							$total_paid_salary += $taken_salary_rs[6];
						}
						$remaining_salary = $charged_amount - $total_paid_salary;
						$charged_remain = $charged_amount . "###" . $remaining_salary;
						$data = json_encode(array('Status' => true, 'Message' => $charged_remain));
					}
				} else {
					$erroMsg = mysqli_error($conn);
					$data = json_encode(array('Status' => false, 'Message' => $erroMsg));
				}
			} else {
				$charged_amount = 0;
				$remaining_salary = 0;
				$charged_remain = $charged_amount . "###" . $remaining_salary;
				$data = json_encode(array('Status' => false, 'Message' => $charged_remain));
			}
		} else {
			$erroMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $erroMsg));
		}

		echo $data;
	}

	// -------------- Pay salary from the employee-salary page ----------------------  
	function pay_employee_salary($conn) {

		$data = array();
		global $errorList;
		$total_paid_salary = 0;
		extract($_POST);

		//Check first if the salary of this month is charged for this employee or not
		$checkChargeExistance = mysqli_query($conn, "SELECT * FROM charge_pay_salaries WHERE empID = '" . mysqli_real_escape_string($conn, $employeeIdd) . "' AND salaryMonth = '" . mysqli_real_escape_string($conn, $salaryMonth) . "' AND transactionType = '0' AND transactionStatus  = '1'");
		if ($checkChargeExistance) {
			if (mysqli_num_rows($checkChargeExistance) > 0) {
				$charged_emp_rs = mysqli_fetch_array($checkChargeExistance);
				$employeee_id = $charged_emp_rs[2];
				$charged_salary_month = $charged_emp_rs[3];
				$charged_amount = $charged_emp_rs[5];
				//Check wether this employee has taken the salary of this month or not
				$checkIfSalaryTaken = mysqli_query($conn, "SELECT * FROM charge_pay_salaries WHERE empID = '" . mysqli_real_escape_string($conn, $employeee_id) . "' AND salaryMonth = '" . mysqli_real_escape_string($conn, $charged_salary_month) . "' AND transactionType = '1' AND transactionStatus  = '1'");
				if ($checkIfSalaryTaken) {
					if (mysqli_num_rows($checkIfSalaryTaken) >= 0) {
						//Calculate the total amount of salary taken by the employee (if there are advanced salaries)
						while ($taken_salary_rs = mysqli_fetch_array($checkIfSalaryTaken)) {
							$total_paid_salary += $taken_salary_rs[6];
						}
						if ($total_paid_salary == 0 && ($total_paid_salary + $paidAmmount) > $charged_amount) {
							$errorMsg = "A total of $" . $charged_amount . " was charged to this employee for salary";
							$errorList[] = $errorMsg;
							$data = json_encode(array('Status' => false, 'Message' => $errorList));
						} else if ($total_paid_salary > 0 && ($total_paid_salary + $paidAmmount) > $charged_amount) {
							$actual_remain_amount = $charged_amount - $total_paid_salary;
							$errorMsg = "This employee has  $" . $actual_remain_amount . " remaining salary balance";
							$errorList[] = $errorMsg;
							$data = json_encode(array('Status' => false, 'Message' => $errorList));
						} else if (($total_paid_salary + $paidAmmount) <= $charged_amount) {
							//Generate New ID for the current inserted row....
							$getMaxID = mysqli_query($conn, "SELECT MAX(rowNo) FROM charge_pay_salaries") or die(mysqli_error($conn));
							if (mysqli_num_rows($getMaxID) > 0) {
								$maxID = mysqli_fetch_array($getMaxID);
								$curMaxID = $maxID[0] + 1;
								$generatedID = "SPY" . $curMaxID . "-" . date("Y");
							} else {
								$curMaxID = 1;
								$generatedID = "SPY" . $curMaxID . "-" . date("Y");
							}
							if (count($errorList) <= 0) {
								$registerSalaryPayment = mysqli_query($conn, "INSERT INTO charge_pay_salaries VALUES ('', '" . mysqli_real_escape_string($conn, $generatedID) . "', '" . mysqli_real_escape_string($conn, $employeeIdd) . "', '" . mysqli_real_escape_string($conn, $salaryMonth) . "', '" . mysqli_real_escape_string($conn, $salaryWithdrawalAccount) . "', '0', '" . mysqli_real_escape_string($conn, $paidAmmount) . "', '1', '1', '" . mysqli_real_escape_string($conn, $salDescription) . "', '" . mysqli_real_escape_string($conn, $_SESSION['userIdd']) . "', '" . mysqli_real_escape_string($conn, $salaryPaymentDate) . "', '-', '-')");
								if ($registerSalaryPayment) {

									//Save Salary Payment Transaction into account_transactions Table

									//Generate New ID for the current inserted row....
									$getTransactionMaxID = mysqli_query($conn, "SELECT MAX(rowNo) FROM account_transactions") or die(mysqli_error($conn));
									if (mysqli_num_rows($getTransactionMaxID) > 0) {
										$transMaxID = mysqli_fetch_array($getTransactionMaxID);
										$currentMaxID = $transMaxID[0] + 1;
										$generatedTransactionID = "TR" . $currentMaxID . "-" . date("Y");
									} else {
										$currentMaxID = 1;
										$generatedTransactionID = "TR" . $currentMaxID . "-" . date("Y");
									}

									mysqli_query($conn, "INSERT INTO account_transactions VALUES (NULL, '" . mysqli_real_escape_string($conn, $generatedTransactionID) . "', '" . mysqli_real_escape_string($conn, $salaryWithdrawalAccount) . "', '" . mysqli_real_escape_string($conn, $paidAmmount) . "', '0', '" . mysqli_real_escape_string($conn, $generatedID) . "', '" . mysqli_real_escape_string($conn, $salDescription) . "', '1', '" . mysqli_real_escape_string($conn, $_SESSION['userIdd']) . "', '" . mysqli_real_escape_string($conn, $salaryPaymentDate) . "', '-', '-')") or die(mysqli_error($conn));

									$data = json_encode(array('Status' => true, 'Message' => "Salary payment has been registered successfully"));
								} else {
									$errorMsg = mysqli_error($conn);
									$errorList[] = $errorMsg;
									$data = json_encode(array('Status' => false, 'Message' => $errorList));
								}
							}
						}
					}
				} else {
					$errorMsg = mysqli_error($conn);
					$errorList[] = $errorMsg;
					$data = json_encode(array('Status' => false, 'Message' => $errorList));
				}
			} else {
				$getFeedBack = "The salary of " . $salaryMonth . " has not been charged for this employee";
				$errorList[] = $getFeedBack;
				$data = json_encode(array('Status' => false, 'Message' => $errorList));
			}
		} else {
			$errorMsg = mysqli_error($conn);
			$errorList[] = $errorMsg;
			$data = json_encode(array('Status' => false, 'Message' => $errorList));
		}

		echo $data;
	}

	//========================== Insert, Update and Delete Function =================

	function ins_upd_del_everything($conn) {

		global $ereyFure;
		global $errorList;
		$data = array();
		extract($_POST);
		$tn = kuceliAsalka($tn, $ereyFure);

		$getValues = explode("###", $vl);
		$valID = $getValues[0];

		if ($commandType == "insert_command") {

			// Insert Query section goes here .....

			//Generate New ID for the current inserted row....
			$getMaxID = mysqli_query($conn, "SELECT MAX(rowNo) FROM " . $tn . "") or die(mysqli_error($conn));
			if (mysqli_num_rows($getMaxID) > 0) {
				$maxID = mysqli_fetch_array($getMaxID);
				$curMaxID = $maxID[0] + 1;
				$generatedID = $objPre . $curMaxID . "-" . date("Y");
			} else {
				$curMaxID = 1;
				$generatedID = $objPre . $curMaxID . "-" . date("Y");
			}

			if ($hasFile == "Yes") {

				//Insert if the query contains images and other files ...

				$fileList = explode("###", $files);
				$fileValues = "";
				$p = 0;
				$d = 0;

				foreach ($fileList as $file) {
					if (substr($file, 0, 5) == "photo") {
						if (isset($_FILES[$file])) {
							$checked_file = check_every_file($file);
							$fileInfo = explode("###", $checked_file);
							if (count($errorList) > 0) {
								$data = json_encode(array('Status' => false, 'Message' => $errorList));
							} else {
								$fileNewName = $generatedID . "_" . $p . "." . $fileInfo[2];
								$photoPath = "../uploads/photos/" . $fileNewName;
								move_uploaded_file($_FILES[$file]['tmp_name'], $photoPath);
								$fileValues .= "uploads/photos/" . $fileNewName . "###";
							}
						} else {
							$uploadDefaultPhoto = "../img/no-image.jpg";
							copy($uploadDefaultPhoto, "../uploads/photos/no-image.jpg");
							$fileValues .= "uploads/photos/no-image.jpg" . "###";
						}
						$p++;
					} else {
						if (isset($_FILES[$file])) {
							$checked_file = check_every_file($file);
							$fileInfo = explode("###", $checked_file);
							if (count($errorList) > 0) {
								$data = json_encode(array('Status' => false, 'Message' => $errorList));
							} else {
								$fileNewName = $generatedID . "_" . $d . "." . $fileInfo[2];
								$photoPath = "../uploads/documents/" . $fileNewName;
								move_uploaded_file($_FILES[$file]['tmp_name'], $photoPath);
								$fileValues .= "uploads/documents/" . $fileNewName . "###";
							}
						} else {
							$uploadDefaultPhoto = "../img/no-file.png";
							copy($uploadDefaultPhoto, "../uploads/documents/no-file.png");
							$fileValues .= "uploads/documents/no-file.png" . "###";
						}
						$d++;
					}
				}

				$vl .= "###" . substr($fileValues, 0, -3);
				$getValues = explode("###", $vl);

				$getVal = "";
				foreach ($getValues as $val) {
					if ($val == "") {
						continue;
					};
					$getVal .= "'" . mysqli_real_escape_string($conn, $val) . "'" . ",";
				}

				// echo "INSERT INTO ". $tn . " VALUES ('', '". mysqli_real_escape_string($conn, $generatedID) ."',". rtrim($getVal, ","). ")";

				if (count($errorList) <= 0) {
					$regQry = mysqli_query($conn, "INSERT INTO " . $tn . " VALUES ('', '" . mysqli_real_escape_string($conn, $generatedID) . "'," . rtrim($getVal, ",") . ")");
					if ($regQry) {
						$successMsg = $objName . " has been registered successfully";
						$data = json_encode(array('Status' => true, 'Message' => $successMsg));
					} else {
						$errorMsg = mysqli_error($conn);
						$errorList[] = $errorMsg;
						$data = json_encode(array('Status' => false, 'Message' => $errorList));
					}
				}
			} else {

				//Insert if the query don't have files ...

				$getVal = "";
				foreach ($getValues as $val) {
					if ($val == "") {
						continue;
					};
					$getVal .= "'" . mysqli_real_escape_string($conn, $val) . "'" . ",";
				}

				// echo "INSERT INTO " . $tn . " VALUES ('', '" . mysqli_real_escape_string($conn, $generatedID) . "'," . rtrim($getVal, ",") . ")";

				if (count($errorList) <= 0) {

					$regQry = mysqli_query($conn, "INSERT INTO " . $tn . " VALUES ('', '" . mysqli_real_escape_string($conn, $generatedID) . "'," . rtrim($getVal, ",") . ")");

					if ($regQry) {

						if ($tn == "users") {

							if ($_SESSION["userType"] == "Super Admin") {

								$getMainMenus = mysqli_query($conn, "SELECT * FROM main_menus WHERE mainMenuMode = '1'");
								if ($getMainMenus) {
									$m_num = mysqli_num_rows($getMainMenus);
									if ($m_num > 0) {
										while ($main_rs = mysqli_fetch_array($getMainMenus)) {
											$saveMenus = mysqli_query($conn, "INSERT INTO user_main_menus(userID, mainMenuID, mainMenuMode) VALUES ('" . mysqli_real_escape_string($conn, $generatedID) . "', '" . $main_rs[0] . "', '" . $main_rs[4] . "')");
											if ($saveMenus) {
												$getSubMenus = mysqli_query($conn, "SELECT * FROM sub_menus WHERE mainMenuID = '" . $main_rs[0] . "' AND subMenuMode = '1'");
												if ($getSubMenus) {
													$s_num = mysqli_num_rows($getSubMenus);
													if ($s_num > 0) {
														while ($sub_rs = mysqli_fetch_array($getSubMenus)) {
															$saveSubs = mysqli_query($conn, "INSERT INTO user_sub_menus(userID, subMenuID, subMenuMode) VALUES ('" . mysqli_real_escape_string($conn, $generatedID) . "', '" . $sub_rs[0] . "', '" . $sub_rs[5] . "')");
														}
													} else {
													}
												} else {
												}
											} else {
											}
										}
									} else {
									}
								} else {
								}
							} else {

								$getMainMenus = mysqli_query($conn, "SELECT * FROM user_main_menus WHERE userID = '" . $_SESSION["userIdd"] . "'");
								if ($getMainMenus) {
									$m_num = mysqli_num_rows($getMainMenus);
									if ($m_num > 0) {
										while ($main_rs = mysqli_fetch_array($getMainMenus)) {
											$saveMenus = mysqli_query($conn, "INSERT INTO user_main_menus(userID, mainMenuID, mainMenuMode) VALUES ('" . mysqli_real_escape_string($conn, $generatedID) . "', '" . mysqli_real_escape_string($conn, $main_rs[2]) . "', '" . mysqli_real_escape_string($conn, $main_rs[3]) . "')");
											if ($saveMenus) {
												$getSubMenus = mysqli_query($conn, "SELECT * FROM user_sub_menus WHERE userID = '" . $_SESSION["userIdd"] . "'");
												if ($getSubMenus) {
													$s_num = mysqli_num_rows($getSubMenus);
													if ($s_num > 0) {
														while ($sub_rs = mysqli_fetch_array($getSubMenus)) {
															$checkSubMenus = mysqli_query($conn, "SELECT * FROM user_sub_menus WHERE userID = '" . mysqli_real_escape_string($conn, $generatedID) . "' AND subMenuID = '" . mysqli_real_escape_string($conn, $sub_rs[2]) . "'");
															$sub_check_count = mysqli_num_rows($checkSubMenus);
															if ($sub_check_count > 0) {
																//Do nothing, don't insert this sub menu
															} else {
																$saveSubs = mysqli_query($conn, "INSERT INTO user_sub_menus(userID, subMenuID, subMenuMode) VALUES ('" . mysqli_real_escape_string($conn, $generatedID) . "', '" . mysqli_real_escape_string($conn, $sub_rs[2]) . "', '" . mysqli_real_escape_string($conn, $sub_rs[3]) . "')");
															}
														}
													} else {
													}
												} else {
												}
											} else {
											}
										}
									} else {
									}
								} else {
								}
							}

							$dn = kuceliAsalka($dn, $ereyFure);
							//Get the tables of our database
							$get_db_tables = mysqli_query($conn, "SELECT Table_name FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '" . mysqli_real_escape_string($conn, $dn) . "'");
							if ($get_db_tables) {
								if (mysqli_num_rows($get_db_tables) > 0) {
									$notAllowedTables = array("main_menus", "sub_menus", "user_main_menus", "user_sub_menus", "user_role_privileges", "user_logins", "payment_gateways");
									while ($role_rs = mysqli_fetch_array($get_db_tables)) {
										if (in_array($role_rs[0], $notAllowedTables)) {
											continue;
										} else {
											$saveRole = mysqli_query($conn, "INSERT INTO user_role_privileges(userID, roleName, insertRole, updateRole, deleteRole) VALUES ('" . mysqli_real_escape_string($conn, $generatedID) . "', '" . mysqli_real_escape_string($conn, $role_rs[0]) . "', '1', '1', '1')") or die(mysqli_error($conn));
											//echo "INSERT INTO user_role_privileges(userID, roleName, insertRole, updateRole, deleteRole) VALUES ('". mysqli_real_escape_string($conn, $generatedID) ."', '". mysqli_real_escape_string($conn, $role_rs[0]) ."', '1', '1', '1')";
										}
									}
								}
							}

							$successMsg = $objName . " has been registered successfully";
							$data = json_encode(array('Status' => true, 'Message' => $successMsg));
						} else if ($tn == "account_numbers") {
							//Save Openning Balance Transaction into account_transactions Table
							//Generate New ID for the current inserted row....
							$getTransactionMaxID = mysqli_query($conn, "SELECT MAX(rowNo) FROM account_transactions") or die(mysqli_error($conn));
							if (mysqli_num_rows($getTransactionMaxID) > 0) {
								$transMaxID = mysqli_fetch_array($getTransactionMaxID);
								$currentMaxID = $transMaxID[0] + 1;
								$generatedTransactionID = "TR" . $currentMaxID . "-" . date("Y");
							} else {
								$currentMaxID = 1;
								$generatedTransactionID = "TR" . $currentMaxID . "-" . date("Y");
							}
							mysqli_query($conn, "INSERT INTO account_transactions VALUES (NULL, '" . mysqli_real_escape_string($conn, $generatedTransactionID) . "', '" . mysqli_real_escape_string($conn, $generatedID) . "', '0', '" . mysqli_real_escape_string($conn, $getValues[3]) . "', '0', 'Openning Balance', '1', '" . mysqli_real_escape_string($conn, $getValues[4]) . "', '" . mysqli_real_escape_string($conn, $getValues[5]) . "', '-', '-')") or die(mysqli_error($conn));
							$successMsg = $objName . " has been registered successfully";
							$data = json_encode(array('Status' => true, 'Message' => $successMsg));
						} else if ($tn == "charge_pay_contributions") {
							//Save member payment into account_transactions Table
							//Generate New ID for the current inserted row....
							$getTransactionMaxID = mysqli_query($conn, "SELECT MAX(rowNo) FROM account_transactions") or die(mysqli_error($conn));
							if (mysqli_num_rows($getTransactionMaxID) > 0) {
								$transMaxID = mysqli_fetch_array($getTransactionMaxID);
								$currentMaxID = $transMaxID[0] + 1;
								$generatedTransactionID = "TR" . $currentMaxID . "-" . date("Y");
							} else {
								$currentMaxID = 1;
								$generatedTransactionID = "TR" . $currentMaxID . "-" . date("Y");
							}
							mysqli_query($conn, "INSERT INTO account_transactions VALUES (NULL, '" . mysqli_real_escape_string($conn, $generatedTransactionID) . "', '" . mysqli_real_escape_string($conn, $getValues[1]) . "', '0', '" . mysqli_real_escape_string($conn, $getValues[5]) . "', '" . mysqli_real_escape_string($conn, $generatedID) . "', '" . mysqli_real_escape_string($conn, $getValues[6]) . "', '1', '" . mysqli_real_escape_string($conn, $getValues[9]) . "', '" . mysqli_real_escape_string($conn, $getValues[10]) . "', '-', '-')") or die(mysqli_error($conn));
							$successMsg = $objName . " has been registered successfully";
							$data = json_encode(array('Status' => true, 'Message' => $successMsg));
						} else if ($tn == "expenses") {
							//Save Customer Payment Transaction into account_transactions Table
							//Generate New ID for the current inserted row....
							$getTransactionMaxID = mysqli_query($conn, "SELECT MAX(rowNo) FROM account_transactions") or die(mysqli_error($conn));
							if (mysqli_num_rows($getTransactionMaxID) > 0) {
								$transMaxID = mysqli_fetch_array($getTransactionMaxID);
								$currentMaxID = $transMaxID[0] + 1;
								$generatedTransactionID = "TR" . $currentMaxID . "-" . date("Y");
							} else {
								$currentMaxID = 1;
								$generatedTransactionID = "TR" . $currentMaxID . "-" . date("Y");
							}
							mysqli_query($conn, "INSERT INTO account_transactions VALUES (NULL, '" . mysqli_real_escape_string($conn, $generatedTransactionID) . "', '" . mysqli_real_escape_string($conn, $getValues[2]) . "', '" . mysqli_real_escape_string($conn, $getValues[1]) . "', '0', '" . mysqli_real_escape_string($conn, $generatedID) . "', '" . mysqli_real_escape_string($conn, $getValues[3]) . "', '1', '" . mysqli_real_escape_string($conn, $getValues[5]) . "', '" . mysqli_real_escape_string($conn, $getValues[6]) . "', '-', '-')") or die(mysqli_error($conn));
							$successMsg = $objName . " has been registered successfully";
							$data = json_encode(array('Status' => true, 'Message' => $successMsg));
						} else {
							$successMsg = $objName . " has been registered successfully";
							$data = json_encode(array('Status' => true, 'Message' => $successMsg));
						}
					} else {
						$errorMsg = mysqli_error($conn);
						$errorList[] = $errorMsg;
						$data = json_encode(array('Status' => false, 'Message' => $errorList));
					}
				}
			}
		} else if ($commandType == "update_command") {

			// Update Query section goes here .....
			$cm = kuceliAsalka($cm, $ereyFure);
			$getColumns = explode("###", $cm);

			if ($hasFile == "Yes") {

				//Update if the query contains images and other files ...

				$imageNames = explode("###", $photoNames);
				$documentNames = explode("###", $docNames);

				//echo $files;

				$fileList = explode("###", $files);
				$fileValues = "";
				$p = 0;
				$d = 0;
				foreach ($fileList as $file) {
					if (substr($file, 0, 5) == "photo") {
						if (isset($_FILES[$file])) {
							$checked_file = check_every_file($file);
							$fileInfo = explode("###", $checked_file);
							if (count($errorList) > 0) {
								$data = json_encode(array('Status' => false, 'Message' => $errorList));
							} else {
								$fileNewName =  $valID . "_" . $p . "." . $fileInfo[2];
								$photoPath = "../uploads/photos/" . $fileNewName;
								move_uploaded_file($_FILES[$file]['tmp_name'], $photoPath);
								$fileValues .= "uploads/photos/" . $fileNewName . "###";
							}
						} else {
							$fileValues .= $imageNames[$p] . "###";
						}
						$p++;
					} else {
						if (isset($_FILES[$file])) {
							$checked_file = check_every_file($file);
							$fileInfo = explode("###", $checked_file);
							if (count($errorList) > 0) {
								$data = json_encode(array('Status' => false, 'Message' => $errorList));
							} else {
								$fileNewName =  $valID . "_" . $d . "." . $fileInfo[2];
								$photoPath = "../uploads/documents/" . $fileNewName;
								move_uploaded_file($_FILES[$file]['tmp_name'], $photoPath);
								$fileValues .= "uploads/documents/" . $fileNewName . "###";
							}
						} else {
							$fileValues .= $documentNames[$d] . "###";
						}
						$d++;
					}
				}
				$vl .= "###" . substr($fileValues, 0, -3);

				$getValues = explode("###", $vl);

				$colVal = "";
				for ($i = 0; $i <= count($getValues) - 1; $i++) {
					if ($i == 0) {
						continue;
					}
					$colVal .= " " . $getColumns[$i] . " = " . "'" . mysqli_real_escape_string($conn, $getValues[$i]) . "',";
				}

				//echo "UPDATE ". $tn ." SET ". rtrim($colVal, ",") ." WHERE ". $getColumns[0] ." = '". $getValues[0] ."'";

				if (count($errorList) <= 0) {
					$updateQry = mysqli_query($conn, "UPDATE " . $tn . " SET " . rtrim($colVal, ",") . " WHERE " . $getColumns[0] . " = '" . $getValues[0] . "'");
					if ($updateQry) {
						$successMsg = $objName . " has been updated successfully";
						$data = json_encode(array('Status' => true, 'Message' => $successMsg));
					} else {
						$errorMsg = mysqli_error($conn);
						$errorList[] = $errorMsg;
						$data = json_encode(array('Status' => false, 'Message' => $errorList));
					}
				}
			} else {

				//Update if the query don't have files ...

				$colVal = "";
				for ($i = 0; $i <= count($getValues) - 1; $i++) {
					if ($i == 0) {
						continue;
					}
					$colVal .= " " . $getColumns[$i] . " = " . "'" . mysqli_real_escape_string($conn, $getValues[$i]) . "',";
				}

				//echo "UPDATE ". $tn ." SET ". rtrim($colVal, ",") ." WHERE ". $getColumns[0] ." = '". $getValues[0] ."'";

				if (count($errorList) <= 0) {
					$updateQry = mysqli_query($conn, "UPDATE " . $tn . " SET " . rtrim($colVal, ",") . " WHERE " . $getColumns[0] . " = '" . $getValues[0] . "'");
					if ($updateQry) {
						if ($tn == "customer_payments" || $tn == "charge_pay_salaries" || $tn == "expenses" || $tn == "charge_pay_contributions") {
							if ($getValues[1] == "0") {
								//Delete this transaction from the financial_transactions Table
								mysqli_query($conn, "DELETE FROM account_transactions WHERE referenceID = '" . mysqli_real_escape_string($conn, $getValues[0]) . "'") or die(mysqli_error($conn));
								$successMsg = $objName . " has been updated successfully";
								$data = json_encode(array('Status' => true, 'Message' => $successMsg));
							}
							$successMsg = $objName . " has been updated successfully";
							$data = json_encode(array('Status' => true, 'Message' => $successMsg));
						} else {
							$successMsg = $objName . " has been updated successfully";
							$data = json_encode(array('Status' => true, 'Message' => $successMsg));
						}
					} else {
						$errorMsg = mysqli_error($conn);
						$errorList[] = $errorMsg;
						$data = json_encode(array('Status' => false, 'Message' => $errorList));
					}
				}
			}
		} else if ($commandType == "delete_command") {

			//Delete Query Section... 

			$cm = kuceliAsalka($cm, $ereyFure);

			if (count($errorList) <= 0) {
				$delQry = mysqli_query($conn, "DELETE FROM " . $tn . " WHERE " . $cm . " = '" . $vl . "'");
				if ($delQry) {
					$successMsg = $objName . " has been deleted successfully";
					$data = json_encode(array('Status' => true, 'Message' => $successMsg));
				} else {
					$errorMsg = mysqli_error($conn);
					$errorList[] = $errorMsg;
					$data = json_encode(array('Status' => false, 'Message' => $errorList));
				}
			}
		}

		echo $data;
	}

	function fetch_parameterized_everything($conn) {

		extract($_POST);

		global $ereyFure;
		$dn = kuceliAsalka($dn, $ereyFure);
		$tn = kuceliAsalka($tn, $ereyFure);
		$cm = kuceliAsalka($cm, $ereyFure);
		$data = array();

		$colNo = mysqli_query($conn, "SELECT COUNT(COLUMN_NAME) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '" . $dn . "' AND TABLE_NAME = '" . $tn . "'") or die(mysqli_error($conn));
		$col_no = mysqli_fetch_array($colNo);

		//echo "SELECT COUNT(COLUMN_NAME) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '". $dn ."' AND TABLE_NAME = '". $tn ."'";

		//echo "SELECT * FROM ". $tn ." WHERE ". $cm ." = '". $objectID ."'";

		$object_ID = mysqli_real_escape_string($conn, $objectID);

		$fetchInfo = mysqli_query($conn, "SELECT * FROM " . $tn . " WHERE " . $cm . " = '" . $object_ID . "'") or die(mysqli_error($conn));

		$all_Info = "";

		if (mysqli_num_rows($fetchInfo) >= 1) {
			$get_info = mysqli_fetch_array($fetchInfo);
			for ($i = 0; $i <= $col_no[0] - 1; $i++) {
				$all_Info .= $get_info[$i] . "###";
			}
			$all_Info = substr($all_Info, 0, -3);
		} else {
			$all_Info = "No information found";
		}

		$data = json_encode(array('Status' => true, 'Message' => $all_Info));

		echo $data;
	}

	function fetch_parameterless_everything($conn) {

		extract($_POST);

		global $ereyFure;
		$dn = kuceliAsalka($dn, $ereyFure);
		$tn = kuceliAsalka($tn, $ereyFure);
		$data = array();

		$colNo = mysqli_query($conn, "SELECT COUNT(COLUMN_NAME) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '" . $dn . "' AND TABLE_NAME = '" . $tn . "'") or die(mysqli_error($conn));
		$col_no = mysqli_fetch_array($colNo);

		$fetchInfo = mysqli_query($conn, "SELECT *  FROM " . $tn . "") or die(mysqli_error($conn));

		$all_Info = "";

		if (mysqli_num_rows($fetchInfo) >= 1) {
			while ($get_info = mysqli_fetch_array($fetchInfo)) {
				for ($i = 0; $i <= $col_no[0] - 1; $i++) {
					$all_Info .= $get_info[$i] . "***";
				}
				$all_Info = substr($all_Info, 0, -3) . "###";
			}
			$all_Info = substr($all_Info, 0, -3);
		} else {
			$all_Info = "No information found";
		}

		$data = json_encode(array('Status' => true, 'Message' => $all_Info));

		echo $data;
	}

	function fetch_emp_name_users($conn) {

		extract($_POST);

		global $ereyFure;
		$dn = kuceliAsalka($dn, $ereyFure);
		$tn = kuceliAsalka($tn, $ereyFure);
		$data = array();

		$colNo = mysqli_query($conn, "SELECT COUNT(COLUMN_NAME) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '" . $dn . "' AND TABLE_NAME = '" . $tn . "'") or die(mysqli_error($conn));
		$col_no = mysqli_fetch_array($colNo);

		$fetchInfo = mysqli_query($conn, "SELECT * FROM " . $tn . " WHERE titlePosition <> 0") or die(mysqli_error($conn));

		$all_Info = "";

		if (mysqli_num_rows($fetchInfo) >= 1) {
			while ($get_info = mysqli_fetch_array($fetchInfo)) {
				for ($i = 0; $i <= $col_no[0] - 1; $i++) {
					$all_Info .= $get_info[$i] . "***";
				}
				$all_Info = substr($all_Info, 0, -3) . "###";
			}
			$all_Info = substr($all_Info, 0, -3);
		} else {
			$all_Info = "No information found";
		}

		$data = json_encode(array('Status' => true, 'Message' => $all_Info));

		echo $data;
	}

	// =========================== Fill Active Member Only ========================
	function fill_active_members_only($conn) {

		$active_members_data = array();
		$data = array();

		$activeMemberIdd = mysqli_query($conn, "SELECT * FROM members WHERE memberStatus = 1 ORDER BY memberName ASC") or die(mysqli_error($conn));
		if ($activeMemberIdd) {
			$num_rows = mysqli_num_rows($activeMemberIdd);
			if ($num_rows > 0) {
				while ($row = mysqli_fetch_array($activeMemberIdd)) {
					$active_members_data[] = $row;
				}
				$data = json_encode(array('Status' => true, 'Message' => $active_members_data));
			} else {
				$data = json_encode(array('Status' => false, 'Message' => "Active Member Not Found"));
			}
			echo $data;
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}
	}

	// =========================== Fill Contribution Types ========================
	function fill_contribution_types($conn) {

		$contribution_types_data = array();
		$data = array();

		$contributionTypeIdd = mysqli_query($conn, "SELECT * FROM contribution_types") or die(mysqli_error($conn));
		if ($contributionTypeIdd) {
			$num_rows = mysqli_num_rows($contributionTypeIdd);
			if ($num_rows > 0) {
				while ($row = mysqli_fetch_array($contributionTypeIdd)) {
					$contribution_types_data[] = $row;
				}
				$data = json_encode(array('Status' => true, 'Message' => $contribution_types_data));
			} else {
				$data = json_encode(array('Status' => false, 'Message' => "Contribution Types Not Found"));
			}
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}

		echo $data;
	}

	// =========================== Start of Contribution Charges ==================

	//Get the list of members to charge contribution for
	function fetch_members_to_charge_contribution_for($conn) {
		
		extract($_POST);
		
		$contribution_Type = mysqli_real_escape_string($conn, $contributionType);
		$contribution_Amount = mysqli_real_escape_string($conn, $contributionAmount);
		$contribution_Year = mysqli_real_escape_string($conn, $contributionYear);
		$contribution_Months = mysqli_real_escape_string($conn, $contributionMonths);
		$contribution_Total_Amount = mysqli_real_escape_string($conn, $contributionTotalAmount);

		$getMembersToChargeContribution = mysqli_query($conn, "SELECT members.memberID, members.memberName, contribution_types.contributionTypeName, contribution_types.contributionAmount FROM members JOIN contribution_types ON (members.contributionTypeID = contribution_types.contributionTypeID) WHERE members.memberID NOT IN (SELECT memberID FROM charge_pay_contributions WHERE contributionOf = '". $contribution_Year ."' AND transactionType = 0 GROUP BY memberID HAVING (". $contribution_Months ." + COALESCE(SUM(chargedMonths),0)) > 12) AND members.contributionTypeID = '". $contribution_Type ."' AND members.memberStatus <> 0") or mysqli_error($conn);
		if ($getMembersToChargeContribution) {
			if (mysqli_num_rows($getMembersToChargeContribution) > 0) {
				
				?>
					<div class="tile">
						<div class="tile-body">
						
							<div class="row" style="margin-left: 0px; margin-right: 0px;">
								<div class="col-md-12">
									
									<div class="table-responsive">
										<table class="table table-striped table-bordered table-sm" id="chargeMemberContributionsTable">
											<thead>
												<tr class="text-center">
													<th>&nbsp;  &nbsp; <input type="checkbox" class="form-check-input" name="memberChargeCheckAll" id="memberChargeCheckAll"/>Check All</th>
													<th>Member Name</th>
													<th>Contribution Type</th>
													<th>Total Charge ($)</th>
													<th>Charge Date</th>
												</tr>
											</thead>
											<tbody class="allMembersCharge">
												
												<?php
													while ($result = mysqli_fetch_array($getMembersToChargeContribution)) {
														
														?>
															<tr>
																<td align="center"><input type="checkbox" class="form-check-input" name="memberChargeCheck" id="memberChargeCheck" value="<?php echo $result[0]; ?>" title="<?php echo $result[0]; ?>"/></td>
																<td align="left"><?php echo ucwords(strtolower($result[1]), " "); ?></td>
																<td align="center"><?php echo $result[2]; ?></td>
																<td align="center"><?php echo "$ ". number_format($contribution_Total_Amount, 2); ?></td>
																<td align="center"><?php echo date("Y-m-d H:i") ?></td>
															</tr> 
														<?php														
													}
												?>
												
											</tbody>
										</table>
									</div>
									<script type="text/javascript">$('#chargeMemberContributionsTable').DataTable({"pageLength": 100});</script>
								</div>
							</div>
								
						</div>
					</div>
				<?php
				
			} else {
				?>
				<div class="tile">
					<div class="tile-body">
						<br>
						<div class="row">
							<div class="col-md-12" style="margin: 0px;">
								<center><h5 style="font-family: 'Tw Cen MT'; color: maroon; font-weight: normal">No member(s) found</h5></center>
							</div>
						</div>
						<br>
					</div>
				</div>
				<?php
			}
		} else {
			?>
			<div class="tile">
				<div class="tile-body">
					<br>
					<div class="row">
						<div class="col-md-12" style="margin: 0px;">
							<center><h3 style="font-family: 'Tw Cen MT'; color: maroon; font-weight: normal"><?php echo mysqli_error($conn); ?></h3></center>
						</div>
					</div>
					<br>
				</div>
			</div>
			<?php
		}
		
	}

	// ----------------------- Charge Members Contribution ------------------------
	function charge_members_contribution($conn) {
		
		$data = array();
		extract($_POST);

		$numOfChargedMembers = 0;

		$selectedMembers = explode("###", $membersToBeCharged);

		foreach($selectedMembers as $memberrr) {

			//Generate New ID for the current inserted row....
			$getMaxID = mysqli_query($conn, "SELECT MAX(rowNo) FROM charge_pay_contributions") or die(mysqli_error($conn));
			if (mysqli_num_rows($getMaxID) > 0) {
				$maxID = mysqli_fetch_array($getMaxID);
				$curMaxID = $maxID[0] + 1;
				$generatedID = "PYMB". $curMaxID . "-". date("Y");
			} else {
				$curMaxID = 1;
				$generatedID = "PYMB". $curMaxID . "-". date("Y");
			}
			
			$memberr_id = $memberrr;
			$not_appicable = "N/A";
			$contribution_yearss = mysqli_real_escape_string($conn, $contribution_yearss);
			$contribution_months = mysqli_real_escape_string($conn, $contribution_months);
			$total_contribution = mysqli_real_escape_string($conn, $contribution_total_amount);
			$paid_amount = "0";
			$charge_description = "Charge of ". $contribution_yearss ." for ". $memberr_id;
			$transactType = "0";
			$chargeDatee = date("Y-m-d H:i:s");
			
			//$chargeSal = mysqli_query($conn, "INSERT INTO charge_pay_salaries (salaryChargeID, empID, salaryOf, paymentMethod, paymentDescription, salaryType, salaryDescription, chargedAmount, paidAmount, transactionStatus, regDate, userID) VALUES ('". $generatedID ."', '". $empl_id ."', '". $salChargeMonth ."', '". $pay_method ."', '". $pay_descr ."', '". $sal_type ."', '". $sal_descr ."', '". $charged_sal ."', '". $paid_amount ."', '". $chargePaystatus ."', '". $regD ."', '". $_SESSION['userIdd'] ."')");
			$chargeContributions = mysqli_query($conn, "INSERT INTO charge_pay_contributions VALUES ('', '". $generatedID ."', '". $memberr_id ."', '". $not_appicable ."', '". $contribution_yearss ."', '". $contribution_months ."', '". $total_contribution ."', '". $paid_amount ."', '". $charge_description ."', '". $transactType ."', '". $_SESSION['userIdd'] ."', '". $chargeDatee ."', '-', '-')");
			$numOfChargedMembers++;

		}
		
		if ($numOfChargedMembers == 1) {
			$feedBack = $numOfChargedMembers . " members has been charged the contribution of ". $contribution_yearss;
		} else if ($numOfChargedMembers > 1) {
			$feedBack = $numOfChargedMembers . " members have been charged the contributions of ". $contribution_yearss;
		}
		$data = json_encode(array('Status' => true, 'Message' => $feedBack));

		echo $data;

	}

	// =========================== End of Contribution Charges ===================

	// =========================== Fill Contribution Amount ======================
	function fetch_contribution_amount($conn) {
		extract($_POST);
		$data = array();
		$parameterizedContributionIdd = mysqli_query($conn, "SELECT contributionAmount FROM contribution_types WHERE contributionTypeID = '" . mysqli_real_escape_string($conn, $objectID) . "'") or die(mysqli_error($conn));
		if ($parameterizedContributionIdd) {
			if (mysqli_num_rows($parameterizedContributionIdd) > 0) {
				$row = mysqli_fetch_array($parameterizedContributionIdd);
				$parameterized_contribution_data = $row[0];
				$data = json_encode(array('Status' => true, 'Message' => $parameterized_contribution_data));
			} else {
				$data = json_encode(array('Status' => false, 'Message' => "Contribution Amount Not Found"));
			}
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}
		echo $data;
	}

	// =========================== Calculate Member Depts ========================
	function calculate_member_depts($conn) {
		extract($_POST);
		$data = array();
		$calculateMemberDepts = mysqli_query($conn, "SELECT IFNULL(SUM(chargedAmount), 0) - IFNULL(SUM(paidAmount), 0) 'Member Depts' FROM charge_pay_contributions WHERE memberID = '". mysqli_real_escape_string($conn, $objectID) ."'") or die(mysqli_error($conn));
		if ($calculateMemberDepts) {
			if (mysqli_num_rows($calculateMemberDepts) > 0) {
				$row = mysqli_fetch_array($calculateMemberDepts);
				$member_depts_result = $row[0];
				$data = json_encode(array('Status' => true, 'Message' => $member_depts_result));
			} else {
				$data = json_encode(array('Status' => false, 'Message' => "Member Depts Not Found"));
			}
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}
		echo $data;
	}

	// =========================== Fill Active Employee Name =====================
	function fill_active_employee_names($conn) {

		$active_employee_data = array();
		$data = array();

		$employeeIdd = mysqli_query($conn, "SELECT * FROM employees WHERE titlePosition <> 0 AND empStatus = 'Working'") or die(mysqli_error($conn));
		if ($employeeIdd) {
			$num_rows = mysqli_num_rows($employeeIdd);
			if ($num_rows > 0) {
				while ($row = mysqli_fetch_array($employeeIdd)) {
					$active_employee_data[] = $row;
				}
				$data = json_encode(array('Status' => true, 'Message' => $active_employee_data));
			} else {
				$data = json_encode(array('Status' => false, 'Message' => "Employee Not Found"));
			}
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}

		echo $data;
	}

	// =========================== Fill Gateway Name in Accounts =================
	function fetch_gateway_name_data($conn) {

		$fetched_gateway_result = array();
		$data = array();
		extract($_POST);

		$gatewayResult = mysqli_query($conn, "SELECT * FROM payment_gateways WHERE gatewayType = '" . mysqli_real_escape_string($conn, $selectedAccountType) . "'");
		if ($gatewayResult) {
			if (mysqli_num_rows($gatewayResult) > 0) {
				while ($row = mysqli_fetch_assoc($gatewayResult)) {
					$fetched_gateway_result[] = $row;
				}
				$data = json_encode(array('Status' => true, 'Message' => $fetched_gateway_result));
			} else {
				$data = json_encode(array('Status' => false, 'Message' => "Payment Gateways Not Found"));
			}
			echo $data;
		} else {
			$erroMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $erroMsg));
		}
	}

	// =========================== Fill Account Details ==========================
	function fill_account_details($conn) {

		$accounts_data = array();
		$data = array();

		$bankAccountIdd = mysqli_query($conn, "SELECT account_numbers.accountNoID, payment_gateways.gatewayType, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber FROM account_numbers JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) ORDER BY payment_gateways.gatewayName ASC") or die(mysqli_error($conn));
		if ($bankAccountIdd) {
			if (mysqli_num_rows($bankAccountIdd) > 0) {
				while ($row = mysqli_fetch_array($bankAccountIdd)) {
					$accounts_data[] = $row;
				}
				$data = json_encode(array('Status' => true, 'Message' => $accounts_data));
			} else {
				$data = json_encode(array('Status' => false, 'Message' => "Accounts Not Found"));
			}
		} else {
			$errorMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
		}

		echo $data;
	}

	// ----------- Fill account number when account name is changed ---------
	function fetch_account_number($conn) {

		$data = array();
		extract($_POST);
		$getAccountNumber = mysqli_query($conn, "SELECT accountNumber FROM account_numbers WHERE accountNoID  = '" . mysqli_real_escape_string($conn, $selectedAccountNo) . "'");
		if ($getAccountNumber) {
			if (mysqli_num_rows($getAccountNumber) > 0) {
				$bank_acc_rs = mysqli_fetch_array($getAccountNumber);
				$account_number = $bank_acc_rs[0];
				$data = json_encode(array('Status' => true, 'Message' => $account_number));
			} else {
				$data = json_encode(array('Status' => false, 'Message' => 'Account Number Not Found'));
			}
		} else {
			$erroMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $erroMsg));
		}

		echo $data;
	}

	// --------------------------- Check account balance -------------------------
	function check_account_balance($conn) {

		$data = array();
		extract($_POST);

		$checkAccountBalance = mysqli_query($conn, "SELECT IFNULL(SUM(depositedAmount), 0) - IFNULL(SUM(withdrawalAmount), 0) 'AccountBalance' FROM account_transactions WHERE accountNoID = '" . mysqli_real_escape_string($conn, $selectedAccountNo) . "' GROUP BY accountNoID") or die(mysqli_error($conn));
		if ($checkAccountBalance) {
			if (mysqli_num_rows($checkAccountBalance) >= 0) {
				$acc_bal_rs = mysqli_fetch_array($checkAccountBalance);
				$account_balance = $acc_bal_rs[0];
				$data = json_encode(array('Status' => true, 'Message' => $account_balance));
			}
		} else {
			$erroMsg = mysqli_error($conn);
			$data = json_encode(array('Status' => false, 'Message' => $erroMsg));
		}

		echo $data;
	}

	// =========================== Start of Change Password ======================

	function changePassword($conn) {

		$data = array();
		extract($_POST);

		if ($newPassChange != $confPassChange) {
			$data = json_encode(array('Status' => false, 'Message' => 'Sorry!! Passwords are not matching, please check it...'));
		} else {
			$checkOldPass = mysqli_query($conn, "SELECT * FROM users WHERE userID = '" . $_SESSION['userIdd'] . "' AND password = '" . $oldPassChange . "'");
			if ($checkOldPass) {
				$oldPassNum = mysqli_num_rows($checkOldPass);
				if ($oldPassNum > 0) {
					$changePass = mysqli_query($conn, "UPDATE users SET password = '" . $newPassChange . "' WHERE userID = '" . $_SESSION['userIdd'] . "'");
					if ($changePass) {
						$data = json_encode(array('Status' => true, 'Message' => 'Password has been changed successfully'));
					} else {
						$errorMsg = mysqli_error($conn);
						$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
					}
				} else {
					$data = json_encode(array('Status' => false, 'Message' => 'Old password is wrong, please check and write again'));
				}
			} else {
				$errorMsg = mysqli_error($conn);
				$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
			}
		}

		echo $data;
	}

	// =========================== End of Change Password =======================

	// ================ Start of Enable 2 step verification starts here =========

	function enable_disable_2step_verification($conn) {

		global $errorList;

		$get2StepVerificationStatus = mysqli_query($conn, "SELECT twoStepVerification FROM users WHERE userID = '" . mysqli_real_escape_string($conn, $_SESSION["userIdd"]) . "'");

		if (mysqli_num_rows($get2StepVerificationStatus) > 0) {

			$verificationStatus = mysqli_fetch_array($get2StepVerificationStatus);

			if ($verificationStatus[0] == "Enabled") {

				$update_2step_verification_status = mysqli_query($conn, "UPDATE users SET twoStepVerification = 'Disabled' WHERE userID = '" . mysqli_real_escape_string($conn, $_SESSION["userIdd"]) . "'") or die(mysqli_error($conn));
				if ($update_2step_verification_status) {
					$data = json_encode(array('Status' => true, 'Message' => '2StepVerificationDisabled'));
				} else {
					$errorMsg = mysqli_error($conn);
					$errorList[] = $errorMsg;
					$data = json_encode(array('Status' => false, 'Message' => $errorList));
				}
			} else if ($verificationStatus[0] == "Disabled") {

				$update_2step_verification_status = mysqli_query($conn, "UPDATE users SET twoStepVerification = 'Enabled' WHERE userID = '" . mysqli_real_escape_string($conn, $_SESSION["userIdd"]) . "'") or die(mysqli_error($conn));
				if ($update_2step_verification_status) {
					$data = json_encode(array('Status' => true, 'Message' => '2StepVerificationEnabled'));
				} else {
					$errorMsg = mysqli_error($conn);
					$errorList[] = $errorMsg;
					$data = json_encode(array('Status' => false, 'Message' => $errorList));
				}
			}
		} else {

			$errorMsg = "Verification failed, try again";
			$errorList[] = $errorMsg;
			$data = json_encode(array('Status' => false, 'Message' => $errorList));
		}

		echo $data;
	}

	// ================ End of Enable 2 Step Verification ======================

	// ================ Start of Update Profile ================================

	function updateUserProfile($conn) {

		$data = array();

		$fullN = mysqli_real_escape_string($conn, $_POST['updateFullName']);
		$alreadyExistPath = mysqli_real_escape_string($conn, $_POST['updateUserPhotoPath']);

		if (!is_uploaded_file($_FILES['updateUserPhoto']['tmp_name'])) {

			$updateProfile = mysqli_query($conn, "UPDATE employees SET empName = '" . $fullN . "', empPhoto = '" . $alreadyExistPath . "' WHERE empID IN (SELECT empID FROM users WHERE userID = '" . $_SESSION['userIdd'] . "')");
			if ($updateProfile) {
				$_SESSION['fullName'] = $fullN;
				$_SESSION['userPhoto'] = $alreadyExistPath;
				$data = json_encode(array('Status' => true, 'Message' => 'Your profile has been updated successfully...'));
			} else {
				$errorMsg = mysqli_error($conn);
				$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
			}
		} else {

			$allowedExt = array("jpg", "jpeg", "JPEG", "png", "gif", "JPG", "PNG", "GIF");
			$filename = $_FILES['updateUserPhoto']['name'];
			$mypicExt = pathinfo($filename, PATHINFO_EXTENSION);
			//$tmpExtension = explode(".", $filename);
			//$photoExtension = end($tmpExtension);
			$photoNewName = $_SESSION['userIdd'] . "_UP" . "." . $mypicExt;
			$path = 'uploads/photos/' . $photoNewName;
			$imageSize = $_FILES['updateUserPhoto']['size'];

			if (in_array($mypicExt, $allowedExt)) {

				if ($imageSize < 1000000) {

					move_uploaded_file($_FILES['updateUserPhoto']['tmp_name'], "../" . $path);
					$updateProfile = mysqli_query($conn, "UPDATE employees SET empName = '" . $fullN . "', empPhoto = '" . mysqli_real_escape_string($conn, $path) . "' WHERE empID IN (SELECT empID FROM users WHERE userID = '" . $_SESSION['userIdd'] . "')");
					if ($updateProfile) {
						$_SESSION['fullName'] = $fullN;
						$_SESSION['userPhoto'] = $path;
						$data = json_encode(array('Status' => true, 'Message' => 'Your profile has been updated successfully...'));
					} else {
						$errorMsg = mysqli_error($conn);
						$data = json_encode(array('Status' => false, 'Message' => $errorMsg));
					}
				} else {
					$data = json_encode(array('Status' => false, 'Message' => 'Sorry!! Profile photo size can not be larger than 1 MB'));
				}
			} else {
				$data = json_encode(array('Status' => false, 'Message' => 'Only JPG, PNG, GIF type photos are allowed'));
			}
		}

		echo $data;
	}

	// ================ End of Update Profile ==================================

	// ================ Start of Main System Reports ===========================

	// ---------------- Print employees report group ---------------------------
	function employeesReport($conn) {

		extract($_POST);
		$employe_id = mysqli_real_escape_string($conn, $emplInfoEmpReport);
		$str_datee = mysqli_real_escape_string($conn, substr($strDateEmpReport, 0, 10) . " 00:00:00");
		$end_datee = mysqli_real_escape_string($conn, substr($endTooEmpReport, 0, 10) . " 23:59:59");

		$qry = "";

		if ($employe_id == "" && $str_datee == " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT * FROM `employees` WHERE titlePosition <> 0 ORDER BY empName") or die(mysqli_error($conn));
		} else if ($employe_id == "" && $str_datee != " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT * FROM `employees` WHERE registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND titlePosition <> 0 ORDER BY empName") or die(mysqli_error($conn));
		} else if ($employe_id != "" && $str_datee == " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT * FROM `employees` WHERE empID = '" . $employe_id . "' AND titlePosition <> 0 ORDER BY empName") or die(mysqli_error($conn));
		} else {
			$qry = mysqli_query($conn, "SELECT * FROM `employees` WHERE empID = '" . $employe_id . "' AND registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND titlePosition <> 0 ORDER BY empName") or die(mysqli_error($conn));
		}

		$checkReturn = mysqli_num_rows($qry);

		if ($checkReturn > 0) {
		?>
			<div class="tile">
				<div class="tile-body">
					<div class="row" style="margin: 0px;">
						<div class="col-md-12 text-right">
							<br>
							<button class="btn btn-success btn-sm" id="printEmployeesReport"> <i class="fa fa-print"></i> Print </button>
							<br><br>
						</div>
					</div>
					<div class="row" style="margin-left: 0px; margin-right: 0px;" id="employeesReportPrintArea">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12" style="margin: 0px;">
									<img src="img/reportHeader.png" width="100%" height="170px" /><br>
									<center>
										<h2 style="color: #010132;">Employees Report</h2>
									</center>
								</div>
							</div>

							<br>

							<?php
							if ($employe_id != "") {
								$get_emp_name = mysqli_query($conn, "SELECT empName from employees WHERE empID = '" . $employe_id . "'") or mysqli_error($conn);
								$emp_rs = mysqli_fetch_array($get_emp_name);
								$emp_name = $emp_rs[0];
							?>
								<div class="row">
									<div class="col-md-8">
										&nbsp;
									</div>

									<div class="col-md-4 text-left" style="padding: 0px 20px 0px 0px;">
										<h5 class="text-left" style="font-size: 15px; font-weight: normal; padding-left: 15px;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
										<h5 class="text-left" style="font-size: 15px; font-weight: normal; padding-left: 15px;"><b>Employee Name:</b> <?php echo $emp_name; ?></h5>
									</div>
								</div>
							<?php
							} else {
							?>
								<div class="row">
									<div class="col-md-8">
										&nbsp;
									</div>

									<div class="col-md-4 text-left" style="padding: 0px 20px 0px 0px;">
										<h5 class="text-left" style="font-size: 15px; font-weight: normal; padding-left: 15px;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
										<h5 class="text-left" style="font-size: 15px; font-weight: normal; padding-left: 15px;"><b>Report Type: </b> General (All)</h5>
									</div>
								</div>
							<?php

							}

							?>
							<div class="row">
								<?php
								if ($str_datee == " 00:00:00" && $end_datee == " 23:59:59") {
								} else {
								?>
									<div class="col-md-4 text-left">
										<h5 class="text-left" style="font-size: 15px; font-weight: normal;"><b>Start Date (From):</b> <?php echo substr($str_datee, 0, 10); ?></h5>
									</div>
									<div class="col-md-3 text-left">
										<h5 class="text-left" style="font-size: 15px; font-weight: normal;"><b>End Date (To):</b> <?php echo substr($end_datee, 0, 10); ?></h5>
									</div>
								<?php
								}
								?>
							</div>

							<div class="row">

								<div class="col-md-12" style="background-image: url('img/reportBackground.png'); background-size : 90% 800px; background-repeat : repeat-y; background-position: center; -webkit-print-color-adjust: exact;">

									<br>

									<?php
									if ($employe_id == "") {
									?>

										<div class="table-responsive">
											<table class="table table-bordered table-sm" style="font-size: 17px;">
												<thead>
													<tr class="bg-light">
														<th style="border-bottom: 1px solid black;">
															<center>Ser_No</center>
														</th>
														<th style="border-bottom: 1px solid black;">
															<center>Employee Name</center>
														</th>
														<th style="border-bottom: 1px solid black;">
															<center>Position</center>
														</th>
														<th style="border-bottom: 1px solid black;">
															<center>Salary ($)</center>
														</th>
														<th style="border-bottom: 1px solid black;">
															<center>Hire Date</center>
														</th>
														<th style="border-bottom: 1px solid black;">
															<center>Mobile No</center>
														</th>
														<th style="border-bottom: 1px solid black;">
															<center>Email</center>
														</th>
														<th style="border-bottom: 1px solid black;">
															<center>Status</center>
														</th>
													</tr>
												</thead>
												<tbody>

													<?php
													$i = 1;
													while ($result = mysqli_fetch_array($qry)) {

													?>
														<tr>
															<td align="center"> <?php echo $i; ?></td>
															<td> <?php echo $result[2]; ?></td>
															<td align="left"> <?php echo $result[5]; ?></td>
															<td align="center"> <?php echo "$ " . number_format($result[6], 2); ?></td>
															<td align="center"> <?php echo $result[7]; ?></td>
															<td align="left"> <?php echo $result[10]; ?></td>
															<td align="left"> <?php echo $result[11]; ?></td>
															<td align="center"> <?php if ($result[12] == "Working") {
																					echo "<span class='badge badge-success col-12'>$result[12]</span>";
																				} else {
																					echo "<span class='badge badge-danger col-12'>$result[12]</span>";
																				} ?></td>
														</tr>
													<?php
														$i++;
													}
													?>

												</tbody>
											</table>
										</div>

									<?php
									} else {

										$result = mysqli_fetch_array($qry);

										$emplID = $result[1];
										$emplName = $result[2];
										$brthPlace = $result[3];
										$brthDate = $result[4];
										$title = $result[5];
										$salary = $result[6];
										$hireDate = $result[7];
										$Addreesss = $result[9];
										$emplMobilee = $result[10];
										$emplEmail = $result[11];
										$emplPhoto = $result[17];
										$emplStatus = $result[12];
										$registerDate = substr($result[14], 0, 16);
										$regisretedBy = $result[16];

									?>

										<div class="row" style="margin: 0px;">
											<div class="col-md-4 text-left">
												<img class="img-fluid" src="<?php echo $emplPhoto; ?>" width="150px" height="150px" />
											</div>
											<div class="col-md-8 text-left" style="padding: 10px 0px 50px 0px;">
												&nbsp;
											</div>

										</div>
										<br><br>
										<div class="row" style="margin: 0px;">
											<div class="col-md-4">
												<h5 style="border-bottom: 1px dashed black; font-size: 16px; padding: 8px 8px 8px 0px;">Employee ID</h5>
												<h5 style="font-size: 15px; font-weight: normal;"><?php echo $emplID; ?></h5>
											</div>
											<div class="col-md-4">
												<h5 style="border-bottom: 1px dashed black; font-size: 16px; padding: 8px 8px 8px 0px;">Employee Name</h5>
												<h5 style="font-size: 15px; font-weight: normal;"><?php echo $emplName; ?></h5>
											</div>
											<div class="col-md-4">
												<h5 style="border-bottom: 1px dashed black; font-size: 16px; padding: 8px 8px 8px 0px;">Place of Birth</h5>
												<h5 style="font-size: 15px; font-weight: normal;"><?php echo $brthPlace; ?></h5>
											</div>
										</div>
										<div class="row" style="margin: 8px 0px 0px 0px;">
											<div class="col-md-4">
												<h5 style="border-bottom: 1px dashed black; font-size: 16px; padding: 8px 8px 8px 0px;">Date of Birth</h5>
												<h5 style="font-size: 15px; font-weight: normal;"><?php echo $brthDate; ?></h5>
											</div>
											<div class="col-md-4">
												<h5 style="border-bottom: 1px dashed black; font-size: 16px; padding: 8px 8px 8px 0px;">Position</h5>
												<h5 style="font-size: 15px; font-weight: normal;"><?php echo $title; ?></h5>
											</div>
											<div class="col-md-4">
												<h5 style="border-bottom: 1px dashed black; font-size: 16px; padding: 8px 8px 8px 0px;">Salary ($)</h5>
												<h5 style="font-size: 15px; font-weight: normal;"><?php echo "$ " . number_format($salary, 2); ?></h5>
											</div>
										</div>
										<div class="row" style="margin: 8px 0px 0px 0px;">
											<div class="col-md-4">
												<h5 style="border-bottom: 1px dashed black; font-size: 16px; padding: 8px 8px 8px 0px;">Hire Date</h5>
												<h5 style="font-size: 15px; font-weight: normal;"><?php echo $hireDate; ?></h5>
											</div>
											<div class="col-md-4">
												<h5 style="border-bottom: 1px dashed black; font-size: 16px; padding: 8px 8px 8px 0px;">Address</h5>
												<h5 style="font-size: 15px; font-weight: normal;"><?php echo $Addreesss; ?></h5>
											</div>
											<div class="col-md-4">
												<h5 style="border-bottom: 1px dashed black; font-size: 16px; padding: 8px 8px 8px 0px;">Mobile No</h5>
												<h5 style="font-size: 15px; font-weight: normal;"><?php echo $emplMobilee; ?></h5>
											</div>
										</div>
										<div class="row" style="margin: 8px 0px 0px 0px;">
											<div class="col-md-4">
												<h5 style="border-bottom: 1px dashed black; font-size: 16px; padding: 8px 8px 8px 0px;">Email Address</h5>
												<h5 style="font-size: 15px; font-weight: normal;"><?php echo $emplEmail; ?></h5>
											</div>
											<div class="col-md-4">
												<h5 style="border-bottom: 1px dashed black; font-size: 16px; padding: 8px 8px 8px 0px;">Employee Status</h5>
												<h5 style="font-size: 15px; font-weight: normal;"><?php echo $emplStatus; ?></h5>
											</div>
											<div class="col-md-4">
												<h5 style="border-bottom: 1px dashed black; font-size: 16px; padding: 8px 8px 8px 0px;">Register Date</h5>
												<h5 style="font-size: 15px; font-weight: normal;"><?php echo substr($registerDate, 0, 16); ?></h5>
											</div>
										</div>
										<br><br>

									<?php
									}
									?>
								</div>
							</div>

							<div class="row" style="margin-top: 40px;">
								<div class="col-md-4">
									&nbsp;
								</div>
								<div class="col-md-5">
									&nbsp;
								</div>
								<div class="col-md-3">
									<h5 class="text-black text-center" style="font-weight: bold; padding: 10px;"><?php echo $_SESSION['fullName']; ?> <br><b style="font-weight: normal">(Signature)</b></h5>
									<h5 style="font-weight: normal; padding-left: 10px;">
										<hr style="border-top: 1px solid black;">
									</h5>
								</div>
							</div>

						</div>

					</div>



				</div>

			</div>
		<?php
		} else {
		?>
			<div class="tile">
				<div class="tile-body">
					<br>
					<div class="row">
						<div class="col-md-12" style="margin: 0px;">
							<center>
								<h3 style="font-family: 'Tw Cen MT'; color: maroon; font-weight: normal">Employee(s) information not found</h3>
							</center>
						</div>
					</div>
					<br>
				</div>
			</div>
		<?php
		}
	}

	// ---------------- Print Charged salaries report group --------------------
	function account_number_statements_report($conn) {

		extract($_POST);

		$account_number_id = mysqli_real_escape_string($conn, $accountNumberID);
		$account_transacion_id = mysqli_real_escape_string($conn, $transactionTypeID);
		$str_datee = mysqli_real_escape_string($conn, substr($strDateAccountNo, 0, 10) . " 00:00:00");
		$end_datee = mysqli_real_escape_string($conn, substr($endTooAccountNo, 0, 10) . " 23:59:59");

		$qry = "";

		if ($account_number_id == "" && $account_transacion_id == "" && $str_datee == " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT account_transactions.transactionID, account_transactions.registerDate, account_transactions.referenceID, account_transactions.transactionDescription, payment_gateways.gatewayType, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber, account_transactions.withdrawalAmount, account_transactions.depositedAmount, users.userName FROM account_transactions JOIN account_numbers ON (account_transactions.accountNoID = account_numbers.accountNoID) JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) JOIN users ON (account_transactions.registeredBy = users.userID) WHERE account_transactions.transactionStatus = '1' ORDER BY account_transactions.transactionID") or die(mysqli_error($conn));
		} else if ($account_number_id == "" && $account_transacion_id == "" && $str_datee != " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT account_transactions.transactionID, account_transactions.registerDate, account_transactions.referenceID, account_transactions.transactionDescription, payment_gateways.gatewayType, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber, account_transactions.withdrawalAmount, account_transactions.depositedAmount, users.userName FROM account_transactions JOIN account_numbers ON (account_transactions.accountNoID = account_numbers.accountNoID) JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) JOIN users ON (account_transactions.registeredBy = users.userID) WHERE account_transactions.registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND account_transactions.transactionStatus = '1' ORDER BY account_transactions.transactionID") or die(mysqli_error($conn));
		} else if ($account_number_id == "" && $account_transacion_id != "" && $str_datee == " 00:00:00") {
			if ($account_transacion_id == "1") {
				$qry = mysqli_query($conn, "SELECT account_transactions.transactionID, account_transactions.registerDate, account_transactions.referenceID, account_transactions.transactionDescription, payment_gateways.gatewayType, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber, account_transactions.withdrawalAmount, account_transactions.depositedAmount, users.userName FROM account_transactions JOIN account_numbers ON (account_transactions.accountNoID = account_numbers.accountNoID) JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) JOIN users ON (account_transactions.registeredBy = users.userID) WHERE account_transactions.withdrawalAmount > 0 AND account_transactions.transactionStatus = '1' ORDER BY account_transactions.transactionID") or die(mysqli_error($conn));
			} else if ($account_transacion_id == "2") {
				$qry = mysqli_query($conn, "SELECT account_transactions.transactionID, account_transactions.registerDate, account_transactions.referenceID, account_transactions.transactionDescription, payment_gateways.gatewayType, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber, account_transactions.withdrawalAmount, account_transactions.depositedAmount, users.userName FROM account_transactions JOIN account_numbers ON (account_transactions.accountNoID = account_numbers.accountNoID) JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) JOIN users ON (account_transactions.registeredBy = users.userID) WHERE account_transactions.depositedAmount > 0 AND account_transactions.transactionStatus = '1' ORDER BY account_transactions.transactionID") or die(mysqli_error($conn));
			}
		} else if ($account_number_id == "" && $account_transacion_id != "" && $str_datee != " 00:00:00") {
			if ($account_transacion_id == "1") {
				$qry = mysqli_query($conn, "SELECT account_transactions.transactionID, account_transactions.registerDate, account_transactions.referenceID, account_transactions.transactionDescription, payment_gateways.gatewayType, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber, account_transactions.withdrawalAmount, account_transactions.depositedAmount, users.userName FROM account_transactions JOIN account_numbers ON (account_transactions.accountNoID = account_numbers.accountNoID) JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) JOIN users ON (account_transactions.registeredBy = users.userID) WHERE account_transactions.withdrawalAmount > 0 AND account_transactions.registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND account_transactions.transactionStatus = '1' ORDER BY account_transactions.transactionID") or die(mysqli_error($conn));
			} else if ($account_transacion_id == "2") {
				$qry = mysqli_query($conn, "SELECT account_transactions.transactionID, account_transactions.registerDate, account_transactions.referenceID, account_transactions.transactionDescription, payment_gateways.gatewayType, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber, account_transactions.withdrawalAmount, account_transactions.depositedAmount, users.userName FROM account_transactions JOIN account_numbers ON (account_transactions.accountNoID = account_numbers.accountNoID) JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) JOIN users ON (account_transactions.registeredBy = users.userID) WHERE account_transactions.depositedAmount > 0 AND account_transactions.registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND account_transactions.transactionStatus = '1' ORDER BY account_transactions.transactionID") or die(mysqli_error($conn));
			}
		} else if ($account_number_id != "" && $account_transacion_id == "" && $str_datee == " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT account_transactions.transactionID, account_transactions.registerDate, account_transactions.referenceID, account_transactions.transactionDescription, payment_gateways.gatewayType, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber, account_transactions.withdrawalAmount, account_transactions.depositedAmount, users.userName FROM account_transactions JOIN account_numbers ON (account_transactions.accountNoID = account_numbers.accountNoID) JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) JOIN users ON (account_transactions.registeredBy = users.userID) WHERE account_transactions.accountNoID = '" . $account_number_id . "' AND account_transactions.transactionStatus = '1' ORDER BY account_transactions.transactionID") or die(mysqli_error($conn));
		} else if ($account_number_id != "" && $account_transacion_id == "" && $str_datee != " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT account_transactions.transactionID, account_transactions.registerDate, account_transactions.referenceID, account_transactions.transactionDescription, payment_gateways.gatewayType, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber, account_transactions.withdrawalAmount, account_transactions.depositedAmount, users.userName FROM account_transactions JOIN account_numbers ON (account_transactions.accountNoID = account_numbers.accountNoID) JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) JOIN users ON (account_transactions.registeredBy = users.userID) WHERE account_transactions.accountNoID = '" . $account_number_id . "' AND account_transactions.registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND account_transactions.transactionStatus = '1' ORDER BY account_transactions.transactionID") or die(mysqli_error($conn));
		} else if ($account_number_id != "" && $account_transacion_id != "" && $str_datee == " 00:00:00") {
			if ($account_transacion_id == "1") {
				$qry = mysqli_query($conn, "SELECT account_transactions.transactionID, account_transactions.registerDate, account_transactions.referenceID, account_transactions.transactionDescription, payment_gateways.gatewayType, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber, account_transactions.withdrawalAmount, account_transactions.depositedAmount, users.userName FROM account_transactions JOIN account_numbers ON (account_transactions.accountNoID = account_numbers.accountNoID) JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) JOIN users ON (account_transactions.registeredBy = users.userID) WHERE account_transactions.accountNoID = '" . $account_number_id . "' AND account_transactions.withdrawalAmount > 0 AND account_transactions.transactionStatus = '1' ORDER BY account_transactions.transactionID") or die(mysqli_error($conn));
			} else if ($account_transacion_id == "2") {
				$qry = mysqli_query($conn, "SELECT account_transactions.transactionID, account_transactions.registerDate, account_transactions.referenceID, account_transactions.transactionDescription, payment_gateways.gatewayType, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber, account_transactions.withdrawalAmount, account_transactions.depositedAmount, users.userName FROM account_transactions JOIN account_numbers ON (account_transactions.accountNoID = account_numbers.accountNoID) JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) JOIN users ON (account_transactions.registeredBy = users.userID) WHERE account_transactions.accountNoID = '" . $account_number_id . "' AND account_transactions.depositedAmount > 0 AND account_transactions.transactionStatus = '1' ORDER BY account_transactions.transactionID") or die(mysqli_error($conn));
			}
		} else if ($account_number_id != "" && $account_transacion_id != "" && $str_datee != "") {
			if ($account_transacion_id == "1") {
				$qry = mysqli_query($conn, "SELECT account_transactions.transactionID, account_transactions.registerDate, account_transactions.referenceID, account_transactions.transactionDescription, payment_gateways.gatewayType, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber, account_transactions.withdrawalAmount, account_transactions.depositedAmount, users.userName FROM account_transactions JOIN account_numbers ON (account_transactions.accountNoID = account_numbers.accountNoID) JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) JOIN users ON (account_transactions.registeredBy = users.userID) WHERE account_transactions.accountNoID = '" . $account_number_id . "' AND account_transactions.withdrawalAmount > 0 AND account_transactions.registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND account_transactions.transactionStatus = '1' ORDER BY account_transactions.transactionID") or die(mysqli_error($conn));
			} else if ($account_transacion_id == "2") {
				$qry = mysqli_query($conn, "SELECT account_transactions.transactionID, account_transactions.registerDate, account_transactions.referenceID, account_transactions.transactionDescription, payment_gateways.gatewayType, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber, account_transactions.withdrawalAmount, account_transactions.depositedAmount, users.userName FROM account_transactions JOIN account_numbers ON (account_transactions.accountNoID = account_numbers.accountNoID) JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) JOIN users ON (account_transactions.registeredBy = users.userID) WHERE account_transactions.accountNoID = '" . $account_number_id . "' AND account_transactions.depositedAmount > 0 AND account_transactions.registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND account_transactions.transactionStatus = '1' ORDER BY account_transactions.transactionID") or die(mysqli_error($conn));
			}
		}

		$checkReturn = mysqli_num_rows($qry);

		if ($checkReturn > 0) {
		?>
			<div class="tile">
				<div class="tile-body">
					<div class="row" style="margin: 0px;">
						<div class="col-md-12 text-right">
							<button class="btn btn-success btn-sm" id="printAccountNumberStatement"> <i class="fa fa-2x fa-print"></i> Print </button>
							<br><br>
						</div>
					</div>
					<div class="row" style="margin-left: 0px; margin-right: 0px;" id="accountNumberStatementPrintArea">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12" style="margin: 0px;">
									<img src="img/reportHeader.png" width="100%" height="170px" /><br>
									<center>
										<h2 style="color: #010132;">Account Statement</h2>
									</center>
								</div>
							</div>

							<br>

							<?php
							if ($account_number_id != "" && $account_transacion_id != "") {

								$get_account_details = mysqli_query($conn, "SELECT payment_gateways.gatewayType, payment_gateways.gatewayLogo, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber FROM account_numbers JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) WHERE account_numbers.accountNoID = '" . $account_number_id . "'") or mysqli_error($conn);
								$account_rs = mysqli_fetch_array($get_account_details);
								$gateway_type = $account_rs[0];
								$acc_no_mg = $account_rs[1];
								$gateway_name = $account_rs[2];
								$account_name = $account_rs[3];
								$account_number = $account_rs[4];

								if ($gateway_type == "1") {
							?>
									<div class="row">
										<div class="col-md-8">
											<h3 style="font-size: 20px; font-family: 'century gothic'; font-weight: bold;"><img src="<?php echo $acc_no_mg; ?>" width="50px" height="50px" /> <?php echo $gateway_name; ?></h3>
										</div>
										<div class="col-md-4 text-right">
											<h5 style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
										</div>

										<div class="col-md-12">
											<h5 style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Account Number:</b> <?php echo $account_number; ?></h5>
											<h5 style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Account Name:</b> <?php echo $account_name; ?></h5>
											<h5 style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Transaction Type:</b> <?php if ($account_transacion_id == "1") {
																																							echo "Withdrawal Only";
																																						} else {
																																							echo "Deposit Only";
																																						} ?></h5>
										</div>
									</div>
								<?php
								} else if ($gateway_type == "2") {
								?>
									<div class="row">
										<div class="col-md-8">
											<h3 style="font-size: 20px; font-family: 'century gothic'; font-weight: bold;"><img src="<?php echo $acc_no_mg; ?>" width="50px" height="50px" /> <?php echo $gateway_name; ?> - <b><span class='text-danger'> <?php echo $account_name; ?></span></b> <b>(</b><?php echo $account_number; ?><b>)</b></h3>
										</div>
										<div class="col-md-4 text-right">
											<h5 style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<h5 style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Transaction Type:</b> <?php if ($account_transacion_id == "1") {
																																							echo "Withdrawal Only";
																																						} else {
																																							echo "Deposit Only";
																																						} ?></h5>
										</div>
									</div>
								<?php
								} else if ($gateway_type == "3") {
								?>
									<div class="row">
										<div class="col-md-8">
											<h3 style="font-size: 20px; font-family: 'century gothic'; font-weight: bold;"><img src="<?php echo $acc_no_mg; ?>" width="70px" height="30px" /> <?php echo $account_name; ?></span></b> <b>(</b><?php echo $account_number; ?><b>)</b></h3>
										</div>
										<div class="col-md-4 text-right">
											<h5 style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<h5 style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Transaction Type:</b> <?php if ($account_transacion_id == "1") {
																																							echo "Withdrawal Only";
																																						} else {
																																							echo "Deposit Only";
																																						} ?></h5>
										</div>
									</div>
								<?php
								}
							} else if ($account_number_id != "" && $account_transacion_id == "") {

								$get_account_details = mysqli_query($conn, "SELECT payment_gateways.gatewayType, payment_gateways.gatewayLogo, payment_gateways.gatewayName, account_numbers.accountNoName, account_numbers.accountNumber FROM account_numbers JOIN payment_gateways ON (account_numbers.gatewayID = payment_gateways.gatewayID) WHERE account_numbers.accountNoID = '" . $account_number_id . "'") or mysqli_error($conn);
								$account_rs = mysqli_fetch_array($get_account_details);
								$gateway_type = $account_rs[0];
								$acc_no_mg = $account_rs[1];
								$gateway_name = $account_rs[2];
								$account_name = $account_rs[3];
								$account_number = $account_rs[4];

								if ($gateway_type == "1") {
								?>
									<div class="row">
										<div class="col-md-8">
											<h3 style="font-size: 20px; font-family: 'century gothic'; font-weight: bold;"><img src="<?php echo $acc_no_mg; ?>" width="50px" height="50px" /> <?php echo $gateway_name; ?></h3>
										</div>
										<div class="col-md-4 text-right">
											<h5 style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
										</div>

										<div class="col-md-12">
											<h5 style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Account Number:</b> <?php echo $account_number; ?></h5>
											<h5 style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Account Name:</b> <?php echo $account_name; ?></h5>
										</div>
									</div>
								<?php
								} else if ($gateway_type == "2") {
								?>
									<div class="row">
										<div class="col-md-8">
											<h3 style="font-size: 20px; font-family: 'century gothic'; font-weight: bold;"><img src="<?php echo $acc_no_mg; ?>" width="50px" height="50px" /> <?php echo $gateway_name; ?> - <b><span class='text-danger'> <?php echo $account_name; ?></span></b> <b>(</b><?php echo $account_number; ?><b>)</b></h3>
										</div>
										<div class="col-md-4 text-right">
											<h5 style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
										</div>
									</div>
								<?php
								} else if ($gateway_type == "3") {
								?>
									<div class="row">
										<div class="col-md-8">
											<h3 style="font-size: 20px; font-family: 'century gothic'; font-weight: bold;"><img src="<?php echo $acc_no_mg; ?>" width="70px" height="30px" /> <?php echo $account_name; ?></span></b> <b>(</b><?php echo $account_number; ?><b>)</b></h3>
										</div>
										<div class="col-md-4 text-right">
											<h5 style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
										</div>
									</div>
								<?php
								}
							} else if ($account_number_id == "" && $account_transacion_id != "") {
								?>
								<div class="row">
									<div class="col-md-8">
										&nbsp;
									</div>

									<div class="col-md-4 text-left" style="padding: 0px 20px 0px 0px;">
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Transaction Type:</b> <?php if ($account_transacion_id == "1") {
																																															echo "Withdrawal Only";
																																														} else {
																																															echo "Deposit Only";
																																														} ?></h5>
									</div>
								</div>
							<?php
							} else {
							?>
								<div class="row">
									<div class="col-md-8">
										&nbsp;
									</div>

									<div class="col-md-4 text-left">
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Statement Type: </b> General (All)</h5>
									</div>
								</div>
							<?php

							}

							?>
							<div class="row">
								<?php
								if ($str_datee == " 00:00:00" && $end_datee == " 23:59:59") {
								} else {
								?>
									<div class="col-md-6">
										&nbsp;
									</div>
									<div class="col-md-3 text-right">
										<h5 style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Start Date:</b> <?php echo substr($str_datee, 0, 10); ?></h5>
									</div>
									<div class="col-md-3 text-right">
										<h5 style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>End Date:</b> <?php echo substr($end_datee, 0, 10); ?></h5>
									</div>
								<?php
								}
								?>
							</div>

							<div class="row">

								<div class="col-md-12" style="background-image: url('img/reportBackground.png'); background-size : 90% 800px; background-repeat : repeat-y; background-position: center; -webkit-print-color-adjust: exact;">

									<br>

									<div class="table-responsive">
										<table class="table table-bordered table-sm" style="font-size: 17px;">
											<thead>
												<tr class="bg-light">
													<th style="border-bottom: 1px solid black;">
														<center>Date</center>
													</th>
													<th style="border-bottom: 1px solid black;">
														<center>Reference</center>
													</th>
													<th style="border-bottom: 1px solid black;">
														<center>Remarks</center>
													</th>
													<th style="border-bottom: 1px solid black;">
														<center>Transaction Account</center>
													</th>
													<th style="border-bottom: 1px solid black;">
														<center>Withdrawal</center>
													</th>
													<th style="border-bottom: 1px solid black;">
														<center>Deposit</center>
													</th>
													<th style="border-bottom: 1px solid black;">
														<center>Balance</center>
													</th>
												</tr>
											</thead>
											<tbody>

												<?php

												$open_balance_amount = 0;
												$close_balance_amount = 0;

												if ($account_number_id == "" && $account_transacion_id == "" && $str_datee == " 00:00:00") {
												?><tr>
														<td align="right" colspan="6">
															<h6 style="font-size: 14.2px;">Openning Balance</h6>
														</td>
														<td align="center">
															<h6 style="font-size: 14.2px;"><?php echo "$ " . number_format($open_balance_amount, 2); ?></h6>
														</td>
													</tr><?php
														} else if ($account_number_id == "" && $account_transacion_id != "" && $str_datee == " 00:00:00") {
															?>
													<tr>
														<td align="right" colspan="6">
															<h6 style="font-size: 14.2px;">Openning Balance</h6>
														</td>
														<td align="center">
															<h6 style="font-size: 14.2px;"><?php echo "$ " . number_format($open_balance_amount, 2); ?></h6>
														</td>
													</tr>
												<?php
														} else if ($account_number_id == "" && $account_transacion_id != "" && $str_datee != " 00:00:00") {
															$get_openning_balance = mysqli_query($conn, "SELECT IFNULL(SUM(depositedAmount), 0) - IFNULL(SUM(withdrawalAmount), 0) 'Openning Balance' FROM account_transactions WHERE registerDate < '" . substr($str_datee, 0, 10) . " 00:00:00" . "' AND transactionStatus = '1' GROUP BY accountNoID") or die(mysqli_error($conn));
															$open_balance_rs = mysqli_fetch_array($get_openning_balance);
															$open_balance_amount = $open_balance_rs[0];
												?><tr>
														<td align="right" colspan="6">
															<h6 style="font-size: 14.2px;">Openning Balance</h6>
														</td>
														<td align="center">
															<h6 style="font-size: 14.2px;"><?php echo "$ " . number_format($open_balance_amount, 2); ?></h6>
														</td>
													</tr><?php
														} else if ($account_number_id != "" && $account_transacion_id == "" && $str_datee == " 00:00:00") {
															?><tr>
														<td align="right" colspan="6">
															<h6 style="font-size: 14.2px;">Openning Balance</h6>
														</td>
														<td align="center">
															<h6 style="font-size: 14.2px;"><?php echo "$ " . number_format($open_balance_amount, 2); ?></h6>
														</td>
													</tr><?php
														} else if ($account_number_id != "" && $account_transacion_id == "" && $str_datee != " 00:00:00") {
															$get_openning_balance = mysqli_query($conn, "SELECT IFNULL(SUM(depositedAmount), 0) - IFNULL(SUM(withdrawalAmount), 0) 'Openning Balance' FROM account_transactions WHERE accountNoID = '" . $account_number_id . "' AND registerDate < '" . substr($str_datee, 0, 10) . " 00:00:00" . "' AND transactionStatus = '1' GROUP BY accountNoID") or die(mysqli_error($conn));
															$open_balance_rs = mysqli_fetch_array($get_openning_balance);
															$open_balance_amount = $open_balance_rs[0];
															?><tr>
														<td align="right" colspan="6">
															<h6 style="font-size: 14.2px;">Openning Balance</h6>
														</td>
														<td align="center">
															<h6 style="font-size: 14.2px;"><?php echo "$ " . number_format($open_balance_amount, 2); ?></h6>
														</td>
													</tr><?php
														} else if ($account_number_id != "" && $account_transacion_id != "" && $str_datee == " 00:00:00") {
															$get_openning_balance = mysqli_query($conn, "SELECT IFNULL(SUM(depositedAmount), 0) - IFNULL(SUM(withdrawalAmount), 0) 'Openning Balance' FROM account_transactions WHERE accountNoID = '" . $account_number_id . "' AND transactionStatus = '1' GROUP BY accountNoID") or die(mysqli_error($conn));
															$open_balance_rs = mysqli_fetch_array($get_openning_balance);
															$open_balance_amount = $open_balance_rs[0];
															?><tr>
														<td align="right" colspan="6">
															<h6 style="font-size: 14.2px;">Openning Balance</h6>
														</td>
														<td align="center">
															<h6 style="font-size: 14.2px;"><?php echo "$ " . number_format($open_balance_amount, 2); ?></h6>
														</td>
													</tr><?php
														} else if ($account_number_id != "" && $account_transacion_id != "" && $str_datee != " 00:00:00") {
															$get_openning_balance = mysqli_query($conn, "SELECT IFNULL(SUM(depositedAmount), 0) - IFNULL(SUM(withdrawalAmount), 0) 'Openning Balance' FROM account_transactions WHERE accountNoID = '" . $account_number_id . "' AND registerDate < '" . substr($str_datee, 0, 10) . " 00:00:00" . "' AND transactionStatus = '1' GROUP BY accountNoID") or die(mysqli_error($conn));
															$open_balance_rs = mysqli_fetch_array($get_openning_balance);
															$open_balance_amount = $open_balance_rs[0];
															?><tr>
														<td align="right" colspan="6">
															<h6 style="font-size: 14.2px;">Openning Balance</h6>
														</td>
														<td align="center">
															<h6 style="font-size: 14.2px;"><?php echo "$ " . number_format($open_balance_amount, 2); ?></h6>
														</td>
													</tr><?php
														}

														$totalWithdraweAmount = 0;
														$totalDepositedAmount = 0;
														$current_balance = $open_balance_amount;

														while ($result = mysqli_fetch_array($qry)) {
															$totalWithdraweAmount += $result[8];
															$totalDepositedAmount += $result[9];
															$current_balance += $result[9] - $result[8];

															if ($account_transacion_id == "") {
															?>
														<tr>
															<td align="center"> <?php echo substr($result[1], 0, 10); ?></td>
															<td align="left"> <?php if ($result[2] != "0") {
																					echo $result[2];
																				} else {
																					echo $result[0];
																				} ?></td>
															<td align="left"> <?php echo $result[3]; ?></td>
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
															<td align="center" class="text-danger"> <?php echo "$ " . number_format($result[8], 2); ?></td>
															<td align="center" class="text-success"> <?php echo "$ " . number_format($result[9], 2); ?></td>
															<td align="center"> <?php echo "$ " . number_format($current_balance, 2); ?></td>
														</tr>
													<?php
															} else {
													?>
														<tr>
															<td align="center"> <?php echo substr($result[1], 0, 10); ?></td>
															<td align="left"> <?php if ($result[2] != "0") {
																					echo $result[2];
																				} else {
																					echo $result[0];
																				} ?></td>
															<td align="left"> <?php echo $result[3]; ?></td>
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
															<td align="center" class="text-danger"> <?php echo "$ " . number_format($result[8], 2); ?></td>
															<td align="center" class="text-success"> <?php echo "$ " . number_format($result[9], 2); ?></td>
															<td align="center"> </td>
														</tr>
												<?php
															}
														}

														//Start calculating the close balance and add it to the current balance to show the exact available balance
														if ($account_number_id == "" && $account_transacion_id == "" && $str_datee == " 00:00:00") {
															$close_balance_amount = 0;
															$current_balance += $close_balance_amount;
														} else if ($account_number_id == "" && $account_transacion_id != "" && $str_datee == " 00:00:00") {
															$get_closing_balance = mysqli_query($conn, "SELECT IFNULL(SUM(depositedAmount), 0) - IFNULL(SUM(withdrawalAmount), 0) 'Closing Balance' FROM account_transactions WHERE transactionStatus = '1' GROUP BY accountNoID") or die(mysqli_error($conn));
															$close_balance_rs = mysqli_fetch_array($get_closing_balance);
															$close_balance_amount = $close_balance_rs[0];
															$current_balance = $close_balance_amount;
														} else if ($account_number_id == "" && $account_transacion_id != "" && $str_datee != " 00:00:00") {
															$get_closing_balance = mysqli_query($conn, "SELECT IFNULL(SUM(depositedAmount), 0) - IFNULL(SUM(withdrawalAmount), 0) 'Closing Balance' FROM account_transactions WHERE transactionStatus = '1' GROUP BY accountNoID") or die(mysqli_error($conn));
															$close_balance_rs = mysqli_fetch_array($get_closing_balance);
															$close_balance_amount = $close_balance_rs[0];
															$current_balance += $close_balance_amount;
														} else if ($account_number_id != "" && $account_transacion_id == "" && $str_datee == " 00:00:00") {
															$get_closing_balance = mysqli_query($conn, "SELECT IFNULL(SUM(depositedAmount), 0) - IFNULL(SUM(withdrawalAmount), 0) 'Closing Balance' FROM account_transactions WHERE accountNoID = '" . $account_number_id . "' AND transactionStatus = '1' GROUP BY accountNoID") or die(mysqli_error($conn));
															$close_balance_rs = mysqli_fetch_array($get_closing_balance);
															$close_balance_amount = $close_balance_rs[0];
															$current_balance = $close_balance_amount;
														} else if ($account_number_id != "" && $account_transacion_id == "" && $str_datee != " 00:00:00") {
															$get_closing_balance = mysqli_query($conn, "SELECT IFNULL(SUM(depositedAmount), 0) - IFNULL(SUM(withdrawalAmount), 0) 'Closing Balance' FROM account_transactions WHERE accountNoID = '" . $account_number_id . "' AND registerDate > '" . substr($end_datee, 0, 10) . " 23:59:59" . "' AND transactionStatus = '1' GROUP BY accountNoID") or die(mysqli_error($conn));
															$close_balance_rs = mysqli_fetch_array($get_closing_balance);
															$close_balance_amount = $close_balance_rs[0];
															$current_balance += $close_balance_amount;
														} else if ($account_number_id != "" && $account_transacion_id != "" && $str_datee == " 00:00:00") {
															$get_closing_balance = mysqli_query($conn, "SELECT IFNULL(SUM(depositedAmount), 0) - IFNULL(SUM(withdrawalAmount), 0) 'Closing Balance' FROM account_transactions WHERE accountNoID = '" . $account_number_id . "' AND transactionStatus = '1' GROUP BY accountNoID") or die(mysqli_error($conn));
															$close_balance_rs = mysqli_fetch_array($get_closing_balance);
															$close_balance_amount = $close_balance_rs[0];
															$current_balance = $close_balance_amount;
														} else if ($account_number_id != "" && $account_transacion_id != "" && $str_datee != " 00:00:00") {
															$get_closing_balance = mysqli_query($conn, "SELECT IFNULL(SUM(depositedAmount), 0) - IFNULL(SUM(withdrawalAmount), 0) 'Closing Balance' FROM account_transactions WHERE accountNoID = '" . $account_number_id . "' AND registerDate > '" . substr($end_datee, 0, 10) . " 23:59:59" . "' AND transactionStatus = '1' GROUP BY accountNoID") or die(mysqli_error($conn));
															$close_balance_rs = mysqli_fetch_array($get_closing_balance);
															$close_balance_amount = $close_balance_rs[0];
															$current_balance += $close_balance_amount;
														}

												?>

												<tr>
													<td align="right" colspan="4">&nbsp;</td>
													<td align="center" class="text-danger"><strong><?php echo "$ " . number_format($totalWithdraweAmount, 2); ?></strong></td>
													<td align="center" class="text-success"><strong><?php echo "$ " . number_format($totalDepositedAmount, 2); ?></strong></td>
													<td align="center"><strong>&nbsp;<strong></td>
												</tr>

												<tr>
													<td align="right" colspan="7"> &nbsp;</td>
												</tr>

												<tr style="border: 0px solid green;">
													<td align="right" colspan="6">
														<h6 style="font-size: 14.2px;">Available Balance &nbsp; &nbsp; &nbsp;</h6>
													</td>
													<td align="center">
														<h6 style="font-size: 14.2px;"><?php echo "$ " . number_format($current_balance, 2); ?></h6>
													</td>
												</tr>

											</tbody>
										</table>
									</div>

								</div>

							</div>

							<div class="row" style="margin-top: 40px;">
								<div class="col-md-4">
									&nbsp;
								</div>
								<div class="col-md-5">
									&nbsp;
								</div>
								<div class="col-md-3">
									<h5 class="text-black text-center" style="font-weight: bold; padding: 10px;"><?php echo $_SESSION['fullName']; ?> <br><b style="font-weight: normal">(Signature)</b></h5>
									<h5 style="font-weight: normal; padding-left: 10px;">
										<hr style="border-top: 1px solid black;">
									</h5>
								</div>
							</div>

						</div>

					</div>

				</div>

			</div>
		<?php

		} else {

		?>
			<div class="tile">
				<div class="tile-body">
					<br>
					<div class="row">
						<div class="col-md-12" style="margin: 0px;">
							<center>
								<h3 style="font-family: 'Tw Cen MT'; color: maroon; font-weight: normal">Transactions not found</h3>
							</center>
						</div>
					</div>
					<br>
				</div>
			</div>
		<?php
		}
	}

	// ---------------- Print Charged salaries report group --------------------
	function charged_salaries_report($conn) {

		extract($_POST);

		$employe_id = mysqli_real_escape_string($conn, $emplInfoChargeSalRep);
		$charge_salary_month = mysqli_real_escape_string($conn, $monthInfoChargeSalRep);
		$str_datee = mysqli_real_escape_string($conn, substr($strDateChargeSalRep, 0, 10) . " 00:00:00");
		$end_datee = mysqli_real_escape_string($conn, substr($endTooChargeSalRep, 0, 10) . " 23:59:59");

		$qry = "";

		if ($employe_id == "" && $charge_salary_month == "" && $str_datee == " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT charge_pay_salaries.empID, employees.empName, employees.titlePosition, charge_pay_salaries.salaryMonth, charge_pay_salaries.chargedAmount, charge_pay_salaries.registerDate, users.userName FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.transactionType = '0' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
		} else if ($employe_id == "" && $charge_salary_month == "" && $str_datee != " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT charge_pay_salaries.empID, employees.empName, employees.titlePosition, charge_pay_salaries.salaryMonth, charge_pay_salaries.chargedAmount, charge_pay_salaries.registerDate, users.userName FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND charge_pay_salaries.transactionType = '0' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
		} else if ($employe_id == "" && $charge_salary_month != "" && $str_datee == " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT charge_pay_salaries.empID, employees.empName, employees.titlePosition, charge_pay_salaries.salaryMonth, charge_pay_salaries.chargedAmount, charge_pay_salaries.registerDate, users.userName FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.salaryMonth = '" . $charge_salary_month . "' AND charge_pay_salaries.transactionType = '0' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
		} else if ($employe_id == "" && $charge_salary_month != "" && $str_datee != " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT charge_pay_salaries.empID, employees.empName, employees.titlePosition, charge_pay_salaries.salaryMonth, charge_pay_salaries.chargedAmount, charge_pay_salaries.registerDate, users.userName FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.salaryMonth = '" . $charge_salary_month . "' AND charge_pay_salaries.registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND charge_pay_salaries.transactionType = '0' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
		} else if ($employe_id != "" && $charge_salary_month == "" && $str_datee == " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT charge_pay_salaries.empID, employees.empName, employees.titlePosition, charge_pay_salaries.salaryMonth, charge_pay_salaries.chargedAmount, charge_pay_salaries.registerDate, users.userName FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.empID = '" . $employe_id . "' AND charge_pay_salaries.transactionType = '0' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
		} else if ($employe_id != "" && $charge_salary_month == "" && $str_datee != " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT charge_pay_salaries.empID, employees.empName, employees.titlePosition, charge_pay_salaries.salaryMonth, charge_pay_salaries.chargedAmount, charge_pay_salaries.registerDate, users.userName FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.empID = '" . $employe_id . "' AND charge_pay_salaries.registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND charge_pay_salaries.transactionType = '0' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
		} else if ($employe_id != "" && $charge_salary_month != "" && $str_datee == " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT charge_pay_salaries.empID, employees.empName, employees.titlePosition, charge_pay_salaries.salaryMonth, charge_pay_salaries.chargedAmount, charge_pay_salaries.registerDate, users.userName FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.empID = '" . $employe_id . "' AND charge_pay_salaries.salaryMonth = '" . $charge_salary_month . "' AND charge_pay_salaries.transactionType = '0' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
		} else {
			$qry = mysqli_query($conn, "SELECT charge_pay_salaries.empID, employees.empName, employees.titlePosition, charge_pay_salaries.salaryMonth, charge_pay_salaries.chargedAmount, charge_pay_salaries.registerDate, users.userName FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.empID = '" . $employe_id . "' AND charge_pay_salaries.salaryMonth = '" . $charge_salary_month . "' AND charge_pay_salaries.registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND charge_pay_salaries.transactionType = '0' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
		}

		$checkReturn = mysqli_num_rows($qry);

		if ($checkReturn > 0) {
		?>
			<div class="tile">
				<div class="tile-body">
					<div class="row" style="margin: 0px;">
						<div class="col-md-12 text-right">
							<button class="btn btn-success btn-sm" id="printChargeSalariesReport"> <i class="fa fa-2x fa-print"></i> Print </button>
							<br><br>
						</div>
					</div>
					<div class="row" style="margin-left: 0px; margin-right: 0px;" id="chargeSalariesPrintArea">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12" style="margin: 0px;">
									<img src="img/reportHeader.png" width="100%" height="170px" /><br>
									<center>
										<h2 style="color: #010132;">Charged Salaries Report</h2>
									</center>
								</div>
							</div>

							<br>

							<?php
							if ($employe_id != "" && $charge_salary_month == "") {
								$get_emp_name = mysqli_query($conn, "SELECT empName from employees WHERE empID = '" . $employe_id . "'") or mysqli_error($conn);
								$emp_rs = mysqli_fetch_array($get_emp_name);
								$emp_name = $emp_rs[0];
							?>
								<div class="row">
									<div class="col-md-7">
										&nbsp;
									</div>

									<div class="col-md-5 text-left" style="padding: 0px 20px 0px 0px;">
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Employee Name:</b> <?php echo $emp_name; ?></h5>
									</div>
								</div>
							<?php
							} else if ($employe_id == "" && $charge_salary_month != "") {
							?>
								<div class="row">
									<div class="col-md-7">
										&nbsp;
									</div>

									<div class="col-md-5 text-left" style="padding: 0px 20px 0px 0px;">
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Salary Of:</b> <?php echo $charge_salary_month; ?></h5>
									</div>
								</div>
							<?php
							} else {
							?>
								<div class="row">
									<div class="col-md-8">
										&nbsp;
									</div>

									<div class="col-md-4 text-left" style="padding: 0px 20px 0px 0px;">
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Report Type: </b> General (All)</h5>
									</div>
								</div>
							<?php

							}

							?>
							<div class="row">
								<?php
								if ($str_datee == " 00:00:00" && $end_datee == " 23:59:59") {
								} else {
								?>
									<div class="col-md-4 text-left">
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Start Date (From):</b> <?php echo substr($str_datee, 0, 10); ?></h5>
									</div>
									<div class="col-md-3 text-left">
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>End Date (To):</b> <?php echo substr($end_datee, 0, 10); ?></h5>
									</div>
								<?php
								}
								?>
							</div>

							<div class="row">

								<div class="col-md-12" style="background-image: url('img/reportBackground.png'); background-size : 90% 800px; background-repeat : repeat-y; background-position: center; -webkit-print-color-adjust: exact;">

									<br>

									<div class="table-responsive">
										<table class="table table-bordered table-sm" style="font-size: 17px;">
											<thead>
												<tr class="bg-light">
													<th style="border-bottom: 1px solid black;">
														<center>Serial</center>
													</th>
													<th style="border-bottom: 1px solid black;">
														<center>Employee Name</center>
													</th>
													<th style="border-bottom: 1px solid black;">
														<center>Position</center>
													</th>
													<th style="border-bottom: 1px solid black;">
														<center>Salary Month</center>
													</th>
													<th style="border-bottom: 1px solid black;">
														<center>Charge Date</center>
													</th>
													<th style="border-bottom: 1px solid black;">
														<center>Charged By</center>
													</th>
													<th style="border-bottom: 1px solid black;">
														<center>Charged Amount ($)</center>
													</th>
												</tr>
											</thead>
											<tbody>

												<?php
												$i = 1;
												$totalChargedAmount = 0;
												while ($result = mysqli_fetch_array($qry)) {

												?>
													<tr>
														<td align="center"> <?php echo $i; ?></td>
														<td align="left"> <?php echo $result[1]; ?></td>
														<td align="left"> <?php echo $result[2]; ?></td>
														<td align="center"> <?php echo $result[3]; ?></td>
														<td align="center"> <?php echo substr($result[5], 0, 16); ?></td>
														<td align="center"> <?php echo $result[6]; ?></td>
														<td align="center"> <?php echo "$ " . number_format($result[4], 2); ?></td>
													</tr>
												<?php
													$totalChargedAmount += $result[4];
													$i++;
												}
												?>

												<tr>
													<td align="right" colspan="6"><b>Total:</b></td>
													<td align="center"> <b><?php echo "$ " . number_format($totalChargedAmount, 2); ?></b></td>
												</tr>

											</tbody>
										</table>
									</div>

								</div>

							</div>

							<div class="row" style="margin-top: 40px;">
								<div class="col-md-4">
									&nbsp;
								</div>
								<div class="col-md-5">
									&nbsp;
								</div>
								<div class="col-md-3">
									<h5 class="text-black text-center" style="font-weight: bold; padding: 10px;"><?php echo $_SESSION['fullName']; ?> <br><b style="font-weight: normal">(Signature)</b></h5>
									<h5 style="font-weight: normal; padding-left: 10px;">
										<hr style="border-top: 1px solid black;">
									</h5>
								</div>
							</div>

						</div>

					</div>

				</div>

			</div>
		<?php

		} else {

		?>
			<div class="tile">
				<div class="tile-body">
					<br>
					<div class="row">
						<div class="col-md-12" style="margin: 0px;">
							<center>
								<h3 style="font-family: 'Tw Cen MT'; color: maroon; font-weight: normal">Salary charge(s) not found</h3>
							</center>
						</div>
					</div>
					<br>
				</div>
			</div>
		<?php
		}
	}

	// ---------------- Print salary payments report group ---------------------
	function chargeSalaryPaymentReport($conn) {

		extract($_POST);

		$employe_id = mysqli_real_escape_string($conn, $emplInfoSalaPaymRep);
		$charge_salary_month = mysqli_real_escape_string($conn, $monthInfoSalaPaymRep);
		$str_datee = mysqli_real_escape_string($conn, substr($strDateSalaPaymRep, 0, 10) . " 00:00:00");
		$end_datee = mysqli_real_escape_string($conn, substr($endTooSalaPaymRep, 0, 10) . " 23:59:59");

		$qry = "";

		if ($employe_id == "" && $charge_salary_month == "" && $str_datee == " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT employees.empID, employees.empName, charge_pay_salaries.salaryMonth, charge_pay_salaries.registerDate, users.userName, charge_pay_salaries.paidAmount, charge_pay_salaries.chargedAmount FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.transactionType = '0' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
		} else if ($employe_id == "" && $charge_salary_month == "" && $str_datee != " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT employees.empID, employees.empName, charge_pay_salaries.salaryMonth, charge_pay_salaries.registerDate, users.userName, charge_pay_salaries.paidAmount, charge_pay_salaries.chargedAmount FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND charge_pay_salaries.transactionType = '0' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
		} else if ($employe_id == "" && $charge_salary_month != "" && $str_datee == " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT employees.empID, employees.empName, charge_pay_salaries.salaryMonth, charge_pay_salaries.registerDate, users.userName, charge_pay_salaries.paidAmount, charge_pay_salaries.chargedAmount FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.salaryMonth = '" . $charge_salary_month . "' AND charge_pay_salaries.transactionType = '0' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
		} else if ($employe_id == "" && $charge_salary_month != "" && $str_datee != " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT employees.empID, employees.empName, charge_pay_salaries.salaryMonth, charge_pay_salaries.registerDate, users.userName, charge_pay_salaries.paidAmount, charge_pay_salaries.chargedAmount FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.salaryMonth = '" . $charge_salary_month . "' AND charge_pay_salaries.registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND charge_pay_salaries.transactionType = '0'AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
		} else if ($employe_id != "" && $charge_salary_month == "" && $str_datee == " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT employees.empID, employees.empName, charge_pay_salaries.salaryMonth, charge_pay_salaries.registerDate, users.userName, charge_pay_salaries.paidAmount, charge_pay_salaries.chargedAmount FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.empID = '" . $employe_id . "' AND charge_pay_salaries.transactionType = '0' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
		} else if ($employe_id != "" && $charge_salary_month == "" && $str_datee != " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT employees.empID, employees.empName, charge_pay_salaries.salaryMonth, charge_pay_salaries.registerDate, users.userName, charge_pay_salaries.paidAmount, charge_pay_salaries.chargedAmount FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.empID = '" . $employe_id . "' AND charge_pay_salaries.registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND charge_pay_salaries.transactionType = '0' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
		} else if ($employe_id != "" && $charge_salary_month != "" && $str_datee == " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT employees.empID, employees.empName, charge_pay_salaries.salaryMonth, charge_pay_salaries.registerDate, users.userName, charge_pay_salaries.paidAmount, charge_pay_salaries.chargedAmount FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.empID = '" . $employe_id . "' AND charge_pay_salaries.salaryMonth = '" . $charge_salary_month . "' AND charge_pay_salaries.transactionType = '0' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
		} else {
			$qry = mysqli_query($conn, "SELECT employees.empID, employees.empName, charge_pay_salaries.salaryMonth, charge_pay_salaries.registerDate, users.userName, charge_pay_salaries.paidAmount, charge_pay_salaries.chargedAmount FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID)  AND charge_pay_salaries.empID = '" . $employe_id . "' AND charge_pay_salaries.salaryMonth = '" . $charge_salary_month . "' AND charge_pay_salaries.registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND charge_pay_salaries.transactionType = '0' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
		}

		$checkReturn = mysqli_num_rows($qry);

		if ($checkReturn > 0) {
		?>
			<div class="tile">
				<div class="tile-body">
					<div class="row" style="margin: 0px;">
						<div class="col-md-12 text-right">
							<button class="btn btn-success btn-sm" id="printSalaryPaymentsReport"> <i class="fa fa-2x fa-print"></i> Print </button>
							<br><br>
						</div>
					</div>
					<div class="row" style="margin-left: 0px; margin-right: 0px;" id="salaryPaymentsPrintArea">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12" style="margin: 0px;">
									<img src="img/reportHeader.png" width="100%" height="170px" /><br><br>
									<center>
										<h2 style="color: #010132;">Employee Salary Payment Report</h2>
									</center>
								</div>
							</div>

							<br>

							<?php
							if ($employe_id != "" && $charge_salary_month == "") {
								$get_emp_name = mysqli_query($conn, "SELECT empName from employees WHERE empID = '" . $employe_id . "'") or mysqli_error($conn);
								$emp_rs = mysqli_fetch_array($get_emp_name);
								$emp_name = $emp_rs[0];
							?>
								<div class="row">
									<div class="col-md-8">
										&nbsp;
									</div>

									<div class="col-md-4 text-left" style="padding: 0px 20px 0px 0px;">
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Employee Name:</b> <?php echo $emp_name; ?></h5>
									</div>
								</div>
							<?php
							} else if ($employe_id == "" && $charge_salary_month != "") {
							?>
								<div class="row">
									<div class="col-md-8">
										&nbsp;
									</div>

									<div class="col-md-4 text-left" style="padding: 0px 20px 0px 0px;">
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Salary Month:</b> <?php echo $charge_salary_month; ?></h5>
									</div>
								</div>
							<?php
							} else {
							?>
								<div class="row">
									<div class="col-md-8">
										&nbsp;
									</div>

									<div class="col-md-4 text-left" style="padding: 0px 20px 0px 0px;">
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Report Type: </b> General (All)</h5>
									</div>
								</div>
							<?php

							}

							?>
							<div class="row">
								<?php
								if ($str_datee == " 00:00:00" && $end_datee == " 23:59:59") {
								} else {
								?>
									<div class="col-md-4 text-left">
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Start Date (From):</b> <?php echo substr($str_datee, 0, 10); ?></h5>
									</div>
									<div class="col-md-3 text-left">
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>End Date (To):</b> <?php echo substr($end_datee, 0, 10); ?></h5>
									</div>
								<?php
								}
								?>
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
														<center>Employee Name</center>
													</th>
													<th style="border-bottom: 2px solid black;">
														<center>Salary Month</center>
													</th>
													<th style="border-bottom: 2px solid black;">
														<center>Date</center>
													</th>
													<th style="border-bottom: 2px solid black;">
														<center>Paid By</center>
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
												$totalChargedAmount = 0;
												$totalPaidAmount = 0;
												$f = 1;
												while ($result = mysqli_fetch_array($qry)) {
												?>
													<tr>
														<td align="center"> <?php echo $f; ?></td>
														<td align="left"> <?php echo $result[1]; ?></td>
														<td align="center"> <?php echo $result[2]; ?></td>
														<td align="center"> <?php echo substr($result[3], 0, 10); ?></td>
														<td align="center"> <?php echo $result[4]; ?></td>
														<td align="center"> </td>
														<td align="center"> <?php echo "<span> $ " . number_format($result[6], 2) . "</span>"; ?></td>
													</tr>
													<?php
													$emploIDd = $result[0];
													$salMonth = $result[2];
													$innerPaid = 0;
													$getSalPaym = mysqli_query($conn, "SELECT employees.empID, employees.empName, charge_pay_salaries.salaryMonth, charge_pay_salaries.registerDate, users.userName, charge_pay_salaries.paidAmount, charge_pay_salaries.chargedAmount FROM charge_pay_salaries JOIN employees ON (charge_pay_salaries.empID = employees.empID) JOIN users ON (charge_pay_salaries.registeredBy = users.userID) WHERE charge_pay_salaries.empID = '" . $emploIDd . "' AND charge_pay_salaries.salaryMonth = '" . $salMonth . "' AND charge_pay_salaries.transactionType = '1' AND charge_pay_salaries.transactionStatus = '1' AND employees.titlePosition <> 0 ORDER BY charge_pay_salaries.rowNo DESC") or die(mysqli_error($conn));
													while ($rs = mysqli_fetch_array($getSalPaym)) {
														$j = $f + 1; //Increment the inner loop
													?>
														<tr>
															<td align="center"> <?php echo $j; ?></td>
															<td align="left"> <?php echo $rs[1]; ?></td>
															<td align="center"> <?php echo $rs[2]; ?></td>
															<td align="center"> <?php echo substr($rs[3], 0, 10); ?></td>
															<td align="center"> <?php echo $rs[4]; ?></td>
															<td align="center"> <?php echo "<span> $ " . number_format($rs[5], 2) . "</span>"; ?></td>
															<td align="center"> </td>
														</tr>
												<?php
														$innerPaid += $rs[5];
														$f++;
													}
													$totalChargedAmount += $result[6];
													$totalPaidAmount += $innerPaid;
													$f++;
												}
												?>

												<tr>
													<td align="right" colspan="5"></td>
													<td align="center"> <b>Total Paid<?php echo "<br><span> $ " . number_format($totalPaidAmount, 2) . "</span></b>"; ?></h5>
													</td>
													<td align="center"> <b>Total Charged<?php echo "<br><span> $ " . number_format($totalChargedAmount, 2), "</span></b>"; ?></h5>
													</td>
												</tr>

											</tbody>
										</table>
									</div>

									<div class="row" style="margin-top: 40px;">
										<div class="col-md-4">
											&nbsp;
										</div>
										<div class="col-md-5">
											&nbsp;
										</div>
										<div class="col-md-3">
											<h5 class="text-black text-center" style="font-weight: bold; padding: 10px;"><?php echo $_SESSION['fullName']; ?> <br><b style="font-weight: normal">(Signature)</b></h5>
											<h5 style="font-weight: normal; padding-left: 10px;">
												<hr style="border-top: 1px solid black;">
											</h5>
										</div>
									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>
		<?php

		} else {

		?>
			<div class="tile">
				<div class="tile-body">
					<br>
					<div class="row">
						<div class="col-md-12" style="margin: 0px;">
							<center>
								<h3 style="font-family: 'Tw Cen MT'; color: maroon; font-weight: normal">Salary payment(s) not found</h3>
							</center>
						</div>
					</div>
					<br>
				</div>
			</div>
		<?php
		}
	}

	// ---------------- Print expenses report group ----------------------------
	function expensesReport($conn) {

		extract($_POST);
		$str_datee = mysqli_real_escape_string($conn, substr($strDateExpensesReport, 0, 10) . " 00:00:00");
		$end_datee = mysqli_real_escape_string($conn, substr($endTooExpensesReport, 0, 10) . " 23:59:59");

		$qry = "";

		if ($str_datee == " 00:00:00") {
			$qry = mysqli_query($conn, "SELECT expenses.expenseDescription, account_numbers.accountNoName, account_numbers.accountNumber, expenses.registerDate, users.userName, expenses.expenseAmount FROM expenses JOIN account_numbers ON (expenses.accountNoID = account_numbers.accountNoID) JOIN users ON (expenses.registeredBy = users.userID) WHERE expenses.expenseStatus = '1' ORDER BY expenses.expenseID DESC") or die(mysqli_error($conn));
		} else {
			$qry = mysqli_query($conn, "SELECT expenses.expenseDescription, account_numbers.accountNoName, account_numbers.accountNumber, expenses.registerDate, users.userName, expenses.expenseAmount FROM expenses JOIN account_numbers ON (expenses.accountNoID = account_numbers.accountNoID) JOIN users ON (expenses.registeredBy = users.userID) WHERE expenses.registerDate BETWEEN '" . $str_datee . "' AND '" . $end_datee . "' AND expenses.expenseStatus = '1' ORDER BY expenses.expenseID DESC") or die(mysqli_error($conn));
		}

		$checkReturn = mysqli_num_rows($qry);

		if ($checkReturn > 0) {
		?>
			<div class="tile">
				<div class="tile-body">
					<div class="row" style="margin: 0px;">
						<div class="col-md-12 text-right">
							<button class="btn btn-success btn-sm" id="printExpensesReport"> <i class="fa fa-2x fa-print"></i> Print </button>
							<br><br>
						</div>
					</div>
					<div class="row" style="margin-left: 0px; margin-right: 0px;" id="expensesReportPrintArea">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12" style="margin: 0px;">
									<img src="img/reportHeader.png" width="100%" height="170px" /><br><br>
									<center>
										<h2 style="color: #010132;">Expenses Report</h2>
									</center>
								</div>
							</div>

							<br>

							<div class="row">
								<div class="col-md-8">
									&nbsp;
								</div>

								<div class="col-md-4 text-left" style="padding: 0px 20px 0px 0px;">
									<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Report Date:</b> <?php echo date("d M Y H:i"); ?></h5>
									<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal; padding-left: 15px;"><b>Report Type:</b> General (All)</h5>
								</div>
							</div>

							<div class="row">
								<?php
								if ($str_datee == " 00:00:00" && $end_datee == " 23:59:59") {
								} else {
								?>
									<div class="col-md-4 text-left">
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>Start Date (From):</b> <?php echo substr($str_datee, 0, 10); ?></h5>
									</div>
									<div class="col-md-3 text-left">
										<h5 class="text-left" style="font-size: 15px; font-family: 'century gothic'; font-weight: normal;"><b>End Date (To):</b> <?php echo substr($end_datee, 0, 10); ?></h5>
									</div>
								<?php
								}
								?>
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
														<center>Expense Name</center>
													</th>
													<th style="border-bottom: 2px solid black;">
														<center>Withdrawal Bank</center>
													</th>
													<th style="border-bottom: 2px solid black;">
														<center>Expense Date</center>
													</th>
													<th style="border-bottom: 2px solid black;">
														<center>Paid By</center>
													</th>
													<th style="border-bottom: 2px solid black;">
														<center>Paid Amount ($)</center>
													</th>

												</tr>
											</thead>
											<tbody>

												<?php
												$i = 1;
												$sumExpenses = 0;
												while ($result = mysqli_fetch_array($qry)) {

												?>
													<tr>
														<td align="center"> <?php echo $i; ?></td>
														<td align="left"> <?php echo $result[0]; ?></td>
														<td align="left"> <?php echo $result[1] . " (" . $result[2] . ")"; ?></td>
														<td align="center"> <?php echo substr($result[3], 0, 16); ?></td>
														<td align="center"> <?php echo $result[4]; ?></td>
														<td align="center"> <?php echo "<span class='text-danger'> $ " . number_format($result[5], 2) . "</span>"; ?></td>
													</tr>
												<?php
													$sumExpenses += $result[5];
													$i++;
												}
												?>
												<tr>
													<td align="right" colspan="5"><b>Total</b></td>
													<td align="center"> <b><?php echo "<span class='text-danger'> $ " . number_format($sumExpenses, 2) . "</span>"; ?></b></td>
												</tr>

											</tbody>
										</table>
									</div>
								</div>
							</div>

							<div class="row" style="margin-top: 40px;">
								<div class="col-md-4">
									&nbsp;
								</div>
								<div class="col-md-5">
									&nbsp;
								</div>
								<div class="col-md-3">
									<h5 class="text-black text-center" style="font-weight: bold; padding: 10px;"><?php echo $_SESSION['fullName']; ?> <br><b style="font-weight: normal">(Signature)</b></h5>
									<h5 style="font-weight: normal; padding-left: 10px;">
										<hr style="border-top: 1px solid black;">
									</h5>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>
		<?php
		} else {
		?>
			<div class="tile">
				<div class="tile-body">
					<br>
					<div class="row">
						<div class="col-md-12" style="margin: 0px;">
							<center>
								<h3 style="font-family: 'Tw Cen MT'; color: maroon; font-weight: normal">No expense(s) found</h3>
							</center>
						</div>
					</div>
					<br>
				</div>
			</div>
		<?php
		}
	}

	// ================ End of Main System Reports ============================

	// ================ Start of Special System Reports =======================

	// ================ End of Special System Reports =========================

	if ($action) {
		$action($conn);
	}

?>