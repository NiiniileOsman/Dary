<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <?php include("library/head.php"); ?>
    <title>System Login => <?php echo $_SESSION["systemName"]; ?></title>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1 class="text-center"><img src="<?php echo $_SESSION["loginPageImage"]; ?>" width="380px"></h1>
        </div>
        <div class="login-box">
            <form class="login-form" action="#" method="POST" id="loginForm">
                <h3 class="login-head"><i class="fa fa-fw fa-user"></i>SIGN IN</h3>
                <div class="form-group">
                    <label class="control-label"><i class="fa fa-user"></i> USERNAME</label>
                    <input class="form-control" type="text" name="user_Name" id="user_Name" placeholder="Enter username..." required autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label"><i class="fa fa-key"></i> PASSWORD</label>
                    <input class="form-control" type="password" name="pass_Word" id="pass_Word" placeholder="Enter password..." required>
                </div>
                <div class="form-group">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <label>
                                <input type="checkbox"><span class="label-text">Stay Signed in</span>
                            </label>
                        </div>
                        <p style="color:#015a5e" class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button type="submit" name="loginNow" id="loginNow" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
                </div>
            </form>
            <form class="forget-form" action="index.html">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
                <div class="form-group">
                    <label class="control-label">EMAIL</label>
                    <input class="form-control" type="text" placeholder="Email">
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
                </div>
                <div class="form-group mt-3">
                    <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
                </div>
            </form>
        </div>
    </section>

    <!-- Essential javascripts for application to work-->
    <?php include("library/scripts.php"); ?>
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
    </script>
</body>

</html>