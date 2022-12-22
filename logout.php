<?php
	session_start();
	date_default_timezone_set('Africa/Mogadishu');
	include("library/conn.php");
	
	$getLoginID = mysqli_query($conn, "SELECT MAX(loginID) FROM user_logins WHERE userID = '". @$_SESSION['userIdd'] ."'");
	$loginDetails = mysqli_fetch_array($getLoginID);
	$loginID = $loginDetails[0];
	$logoutDate = date("Y-m-d H:i:s");

	mysqli_query($conn, "UPDATE user_logins SET logoutDateTime = '". $logoutDate ."' WHERE loginID = ". $loginID ." AND userID = '". @$_SESSION['userIdd'] ."'");
	mysqli_query($conn, "UPDATE users SET userStatus = 'Offline' WHERE userID = '". @$_SESSION['userIdd'] ."'");

	unset($_SESSION['userIdd']); 
	unset($_SESSION['userName']);
	unset($_SESSION['userType']);
	unset($_SESSION['userPhoto']); 

	echo "<script>location='index'</script>";
	
?>