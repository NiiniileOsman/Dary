<?php
session_start();
date_default_timezone_set('Africa/Mogadishu');
include("library/conn.php");

$getLoginID = mysqli_query($conn, "SELECT MAX(loginID) FROM member_logins WHERE memberID = '" . @$_SESSION['memberrIddd'] . "'");
$loginDetails = mysqli_fetch_array($getLoginID);
$loginID = $loginDetails[0];
$logoutDate = date("Y-m-d H:i:s");

mysqli_query($conn, "UPDATE member_logins SET logoutDateTime = '" . $logoutDate . "' WHERE loginID = " . $loginID . " AND memberID = '" . @$_SESSION['memberrIddd'] . "'");
mysqli_query($conn, "UPDATE members SET memberLoginStatus = '0' WHERE memberID = '" . @$_SESSION['memberrIddd'] . "'");

unset($_SESSION['memberrIddd']);
unset($_SESSION['memberrName']);
unset($_SESSION['userType']);
unset($_SESSION['memberrMobile']);
unset($_SESSION['memberrEmail']);
unset($_SESSION['memberrPhoto']);

echo "<script>location='https://sotes.so'</script>";
