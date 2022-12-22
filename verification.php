<?php

    session_start();
    date_default_timezone_set('Africa/Mogadishu');
    include("library/conn.php");
	
	if ((isset($_SESSION['tempUserID']) == true) && ($_SESSION['tempUserID']) != "") {
	    
	} else {
        echo "<script>location ='index'</script>";
	}
	
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    	<link rel="icon" href="img/icon.png" type="img/icon">
        <title>Verification</title>
        <link rel="stylesheet" type="text/css" href="css/bs4pop.css">
    </head>
    <body>
        <section class="material-half-bg">
            <div class="cover"></div>
        </section>
        <section class="login-content">
            <div class="login-box">
                <form class="login-form" action="#" method="POST" id="verificationCodeForm">
                    <div class="form-group">
                        <label class="control-label">Verification Code</label>
                        <input class="form-control" type="text" name="txtVerificationCode" id="txtVerificationCode" value="M-" placeholder="Enter verification code..." autocomplete="off">
                    </div>
                    <div class="form-group btn-container">
                        <button type="submit" name="btnVerifyNow" id="btnVerifyNow" class="btn btn-primary btn-block"><i class="fa fa-check-circle fa-lg fa-fw"></i>Verify</button>
                    </div>
                    
                    <div class="form-group btn-container" style="margin-top: 90px;">
                        <h6>I didn't receive the code, send again</h6>
                        <button type="submit" name="btnResendVerificationCode" id="btnResendVerificationCode" class="btn btn-info btn-block"><i class="fa fa-send fa-lg fa-fw"></i>Re-send Code</button>
                    </div>
                    <div class="form-group mt-3 text-right">
                       <p style="color:#015a5e" class="semibold-text mb-2"><a href="index"> <i class="fa fa-angle-right fa-fw"></i> Back to Login</a></p>
                    </div>
                </form>
            </div>
        </section>
        
        <!-- Essential javascripts for application to work-->
        <?php include("library/scripts.php"); ?>
        <script>
            $().ready(function () {
                var input = $("#txtVerificationCode");
                var len = input.val().length;
                input[0].focus();
                input[0].setSelectionRange(len, len);
            })
        </script>

    </body>
</html>