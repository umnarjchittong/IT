<?php

?>

<div class="app-header-inner">
    <div class="container-fluid py-2">
        <div class="app-header-content">
            <div class="row justify-content-between align-items-center">

                <div class="col-auto">
                    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
                            <title>Menu</title>
                            <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                        </svg>
                    </a>
                </div>
                <!--//col-->

                <!--//app-search-box-->

                <div class="app-utilities col-auto">


                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <?php
                    if ($_SESSION["member"]["language"] == "en") {
                        echo '<a href="?act=language&val=th" title="language">';
                        echo '<img src="assets/images/icon/language_th.png" class="me-3" style="height: 19px;" alt="change language">';
                        echo '</a>';
                    } else {
                        echo '<a href="?act=language&val=en" title="language">';
                        echo '<img src="assets/images/icon/language_en.png" class="me-3" style="height: 19px;" alt="change language">';
                        echo '</a>';
                    }
                    ?>



                    <div class="app-utility-item app-user-dropdown dropdown">
                        <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="profile/<?= $_SESSION["member"]["avatar"] ?>" alt="<?= $_SESSION["member"]["email"] ?>"></a>
                        <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                            <!-- <li><a class="dropdown-item" href="account.html">Account</a></li> -->
                            <li><a class="dropdown-item" href="https://m.me/umnarj" target="_blank"><?= $_SESSION["language"]["contact"] ?></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <?php if ($_SESSION["member"]["email"] == 'umnarjchittong@gmail.com') {
                                echo '<li><a class="dropdown-item" href="member_mgt.php">' . $_SESSION["language"]["members"] . '</a></li>';
                                echo '<li><a class="dropdown-item" href="logs_view.php">' . $_SESSION["language"]["view-logs"] . '</a></a></li>';
                                echo '<li><hr class="dropdown-divider"></li>';
                            } ?>
                            <li><a class="dropdown-item" href="setting.php"><?= $_SESSION["language"]["settings"] ?></a></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="login.php?act=signout"><?= $_SESSION["language"]["log-out"] ?></a></a></li>
                        </ul>
                    </div>
                    <!--//app-user-dropdown-->
                </div>
                <!--//app-utilities-->
            </div>
            <!--//row-->
        </div>
        <!--//app-header-content-->
    </div>
    <!--//container-fluid-->
</div>
<!--//app-header-inner-->