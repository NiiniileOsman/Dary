<?php
date_default_timezone_set('Africa/Mogadishu');

if ((isset($_SESSION['memberrIddd']) == true) && ($_SESSION['memberrIddd']) != "") {


    // This will be used fore web hosting time
    // This supports only HTTP

    // if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    //     $fullURL = "https://";
    // } else {
    //     $fullURL = "http://";
    // }

    // $fullURL .= $_SERVER['HTTP_HOST'];
    // $fullURL .= $_SERVER['REQUEST_URI'];
    // $UrL = explode(".", $fullURL);
    // $cutEx = $UrL[3];
    // $sliceUrl = explode("/", $cutEx);
    // $realURL = $sliceUrl[2];

    //This is for localhost
    $fullURL = $_SERVER["REQUEST_URI"];
    $UrL = explode(".", $fullURL);
    $cutEx = $UrL[0];
    $sliceUrl = explode("/", $cutEx);
    $realURL = $sliceUrl[2];

    //echo "<script>alert('" . $realURL . "')</script>";

    $checkMemberMenus = mysqli_query($conn, "SELECT * FROM member_privileges WHERE memberID = '" . $_SESSION['memberrIddd'] . "' AND memberMenuID IN (SELECT memberMenuID FROM member_menus WHERE mainMenuURL = '" . $realURL . "') AND mainMenuMode = '1'");

    if (mysqli_num_rows($checkMemberMenus) > 0) {
    } else {
        echo "<script>location ='member-logout'</script>";
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
        <img class="app-sidebar__user-avatar" src="<?php echo $_SESSION['memberrPhoto']; ?>" height="60px" width="60px">

        <div>
            <p class="app-sidebar__user-name"><b><?php echo substr($_SESSION['memberrName'], 0, 16) . "...."; ?></b></p>
            <p class="app-sidebar__user-designation"><?php echo $_SESSION['userType']; ?></p>
        </div>
    </div>
    <ul class="app-menu">
        <?php

        $getMemberMainMenus = mysqli_query($conn, "SELECT DISTINCT member_menus.memberMenuID, member_menus.mainMenuText, member_menus.mainMenuIcon, member_menus.mainMenuURL, member_privileges.memberID FROM member_privileges JOIN member_menus ON (member_privileges.memberMenuID = member_menus.memberMenuID) WHERE member_privileges.memberID = '" . $_SESSION['memberrIddd'] . "' AND member_privileges.mainMenuMode = 1 ORDER BY member_menus.mainMenuRank ASC");
        if ($getMemberMainMenus) {
            if (mysqli_num_rows($getMemberMainMenus) > 0) {
                while ($main_rs = mysqli_fetch_array($getMemberMainMenus)) {
                    if ($main_rs[1] == "Change Password") {
        ?><li><a class="app-menu__item" href="<?php echo $main_rs[3]; ?>" data-id="<?php echo $_SESSION['memberrName']; ?>" data-toggle="modal" data-target="#memberChangePasswordModal"><i class="app-menu__icon <?php echo $main_rs[2]; ?>"></i><span class="app-menu__label"><?php echo $main_rs[1]; ?></a></li><?php
                                                                                                                                                                                                                                                                                                                } else if ($main_rs[1] == "Logout") {
                                                                                                                                                                                                                                                                                                                    ?><li><a class="app-menu__item" href="<?php echo $main_rs[3]; ?>" id="memberLogoutOutSide" data-id="<?php echo $_SESSION['memberrName']; ?>"><i class="app-menu__icon <?php echo $main_rs[2]; ?>"></i><span class="app-menu__label"><span class="app-menu__label"><?php echo $main_rs[1]; ?></a></li><?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ?><li><a class="app-menu__item" href="<?php echo $main_rs[3]; ?>"><i class="app-menu__icon <?php echo $main_rs[2]; ?>"></i><span class="app-menu__label"><?php echo $main_rs[1]; ?></span></a></li><?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo "<center><h6 style='color: white;'>No menus found</h6></center>";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo mysqli_error($conn);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ?>
    </ul>

</aside>