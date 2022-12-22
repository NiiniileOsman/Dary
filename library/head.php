    <?php

        include("library/conn.php");
        
        $fetchSystemSettings = mysqli_query($conn, "SELECT * FROM system_configurations WHERE systemID = 'SYS2-2022'");
        
		if ($fetchSystemSettings) {

            if (mysqli_num_rows($fetchSystemSettings) > 0) {

				$system_settings_rs = mysqli_fetch_array($fetchSystemSettings);
				
                $_SESSION["systemID"] = $system_settings_rs[0];
			    $_SESSION["systemFavIcon"] = $system_settings_rs[1];
			    $_SESSION["systemName"] = $system_settings_rs[2];
			    $_SESSION["loginPageImage"] = $system_settings_rs[3];
			    $_SESSION["headerLogo"] = $system_settings_rs[4];
			    $_SESSION["dashboardHeader"] = $system_settings_rs[5];
			    $_SESSION["reportsHeaderImage"] = $system_settings_rs[6];
			    $_SESSION["footerCaption"] = $system_settings_rs[7];
			    $_SESSION["systemVersion"] = $system_settings_rs[8];
			    
			} else {
				echo "<script>alert('Sorry, system was not found..!') </script>";
			}
		} else {
			echo "Database Error: ". mysqli_error($conn);
		}
	?>
    
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/bs4pop.css">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="<?php echo $_SESSION["systemFavIcon"]; ?>" type="img/icon">