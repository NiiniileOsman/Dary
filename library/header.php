<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="dashboard"><img src="img/smallinst.png" width="200px" /></a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">

        <!-- User Menu-->
        <?php
        if ($_SESSION['userType'] == "Member") {
        ?>
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><img style="border-radius: 20px;" src="<?php echo $_SESSION['memberrPhoto']; ?>" height="22px" width="22px"></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#memberChangePasswordModal"><i class="fa fa-key fa-lg"></i> Change Password</a></li>
                    <li><a class="dropdown-item" href="member-logout" id="memberLogoutMenu" data-id="<?php echo $_SESSION['memberrName']; ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
            </li>
        <?php
        } else {
        ?>
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><img style="border-radius: 20px;" src="<?php echo $_SESSION['userPhoto']; ?>" height="22px" width="22px"></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#changePasswordModal"><i class="fa fa-key fa-lg"></i> Change Password</a></li>
                    <li><a class="dropdown-item" href="#" id="securityMenu" data-id="<?php echo $_SESSION['userIdd']; ?>" data-toggle="modal" data-target="#securitySettingsModal"><i class="fa fa-lock fa-lg"></i> Security</a></li>
                    <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#updateProfileModal"><i class="fa fa-vcard fa-lg"></i> Update Profile</a></li>
                    <li><a class="dropdown-item" href="logout" id="logoutMenu" data-id="<?php echo $_SESSION['userName']; ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
            </li>
        <?php
        }
        ?>
    </ul>
</header>