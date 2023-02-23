<div id="app-sidepanel" class="app-sidepanel">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding">
            <a class="app-logo" href="index.php"><img class="logo-icon me-2" src="assets/images/icon/icon-128.png" alt="logo"><span class="logo-text">EV Cars</span></a>

        </div>
        <!--//app-branding-->

        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link<?php if (basename($_SERVER['PHP_SELF'], ".php") == 'index') {
                                            echo ' active';
                                        } ?>" href="index.php">
                        <span class="nav-icon" style="font-size: 1.5em;">
                            <i class="bi bi-speedometer""></i>
                                </span>
                                <span class=" nav-link-text"><?= $_SESSION["language"]["overview"] ?></span>
                    </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link<?php if (basename($_SERVER['PHP_SELF'], ".php") == 'trip_recording') {
                                            echo ' active';
                                        } ?>" href="trip_recording.php?act=add">
                        <span class="nav-icon" style="font-size: 1.5em;">
                        <i class="bi bi-plus-square"></i>
                                </span>
                                <span class=" nav-link-text"><?= $_SESSION["language"]["trip-recording"] ?></span>
                    </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link<?php if (basename($_SERVER['PHP_SELF'], ".php") == 'home_charger') {
                                            echo ' active';
                                        } ?>" href="home_charger.php">
                        <span class="nav-icon" style="font-size: 1.5em;">
                            <i class="bi bi-house-heart""></i>
                                </span>
                                <span class=" nav-link-text"><?= $_SESSION["language"]["home-charge"] ?></span>
                    </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link<?php if (basename($_SERVER['PHP_SELF'], ".php") == 'ev_station') {
                                            echo ' active';
                                        } ?>" href="ev_station.php">
                        <span class="nav-icon" style="font-size: 1.5em;">
                            <i class="bi bi-car-front""></i>
                                </span>
                                <span class=" nav-link-text"><?= $_SESSION["language"]["ev-station"] ?></span>
                    </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link<?php if (basename($_SERVER['PHP_SELF'], ".php") == 'road_trip') {
                                            echo ' active';
                                        } ?>" href="road_trip.php">
                        <span class="nav-icon" style="font-size: 1.5em;">
                            <i class="bi bi-map"></i>
                        </span>
                        <span class="nav-link-text"><?= $_SESSION["language"]["road-trip"] ?></span>
                    </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->
                <li class="nav-item has-submenu">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
                        <span class="nav-icon" style="font-size: 1.5em;">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <i class="bi bi-link-45deg"></i>
                        </span>
                        <span class="nav-link-text"><?= $_SESSION["language"]["links"] ?></span>
                        <span class="submenu-arrow">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </span>
                        <!--//submenu-arrow-->
                    </a>
                    <!--//nav-link-->
                    <div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link" href="https://www.plugshare.com/" target="_blank">Plug Share</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="https://evstationpluz.pttor.com/" target="_blank">EV Station by OR</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="https://peavoltaev.pea.co.th/%e0%b8%a7%e0%b8%b4%e0%b8%98%e0%b8%b5%e0%b9%83%e0%b8%8a%e0%b9%89%e0%b8%87%e0%b8%b2%e0%b8%99-pea-volta/" target="_blank">PEA Volta</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="https://www.mea.or.th/minisite/meaev" target="_blank">MEA EV</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="https://elexaev.com/th/elex-by-egat-th/" target="_blank">ELEXA by EGAT</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="https://www.eaanywhere.com/" target="_blank">* EA Anywhere</a></li>
                        </ul>
                    </div>
                </li>
                <!--//nav-item-->
            </ul>
            <!--//app-menu-->
        </nav>
        <!--//app-nav-->
        <div class="app-sidepanel-footer">
            <nav class="app-nav app-nav-footer">
                <ul class="app-menu footer-menu list-unstyled">
                    <?php if (isset($_SESSION["member"]) && $_SESSION["member"]["email"] == "umnarjchittong@gmail.com") { ?>
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link" href="member_mgt.php">
                            <span class="nav-icon" style="font-size: 1.5em;">
                                <i class="bi bi-person-square"></i>
                            </span>
                            <span class="nav-link-text"><?= $_SESSION["language"]["members"] ?></span>
                        </a>
                        <!--//nav-link-->
                    </li>
                    <?php } ?>
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link" href="setting.php">
                            <span class="nav-icon">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
                                    <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
                                </svg>
                            </span>
                            <span class="nav-link-text"><?= $_SESSION["language"]["settings"] ?></span>
                        </a>
                        <!--//nav-link-->
                    </li>
                    <!--//nav-item-->
                    <li class="nav-item d-none">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link" href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">
                            <span class="nav-icon">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                </svg>
                            </span>
                            <span class="nav-link-text">Download</span>
                        </a>
                        <!--//nav-link-->
                    </li>
                    <!--//nav-item-->
                    <li class="nav-item d-none">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link" href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">
                            <span class="nav-icon">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12 1H4a1 1 0 0 0-1 1v10.755S4 11 8 11s5 1.755 5 1.755V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                                    <path fill-rule="evenodd" d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                            </span>
                            <span class="nav-link-text">License</span>
                        </a>
                        <!--//nav-link-->
                    </li>
                    <!--//nav-item-->
                </ul>
                <!--//footer-menu-->
            </nav>
        </div>
        <!--//app-sidepanel-footer-->

    </div>
    <!--//sidepanel-inner-->
</div>
<!--//app-sidepanel-->