<!DOCTYPE html>
<html lang="en">
<?php
require('core.php');

if (!isset($_SESSION["member"])) {
    // $_SESSION["car"] = read_default_config();
    header("location:login.php?act=none_authorize");
    die();
} else if (!isset($_SESSION["car"])) {
    if (file_exists('profile/' . $_SESSION["member"]["profile"] . '.txt')) {
        $_SESSION["car"] = read_default_config($_SESSION["member"]["profile"] . '.txt');
    } else {
        header("location:setting.php");
        die();
    }
    // echo 'profile/' . $_SESSION["member"] . '.txt';
}
// echo '<pre>';
// print_r($car);
// echo '</pre>';


?>

<head>
    <title><?= $title_name ?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="EV Car">
    <meta name="author" content="umnarj chittong">
    <link rel="shortcut icon" href="assets/images/icon/icon/favicon-96x96.png">
    <!-- <link rel="icon" type="image/png" sizes="96x96" href="assets/images/icon/icon/favicon-96x96.png"> -->
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/icon/icon-128.png">

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body class="app">
    <header class="app-header fixed-top">
        <?php require('header_panel.php'); ?>
        <?php require('side_panel.php'); ?>
    </header>
    <!--//app-header-->

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="col-8 mx-auto text-center my-5">
                    <img src="assets/images/car/<?= $_SESSION["car"]["car_pic"] ?>" class="responsive-img w-50" style="min-width: 200px; max-width: 300px;">
                    <!--//app-card-->
                </div>

                <h1 class="app-page-title"><?= $_SESSION["car"]["car_model"] ?></h1>

                <div class="app-card shadow-sm mb-4 border-left-decoration d-none">
                    <div class="inner">
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="row gx-5 gy-3">
                                <div class="col-12 col-lg-9">

                                    <div>Portal is a free Bootstrap 5 admin dashboard template. The design is simple, clean and modular so it's a great base for building any modern web app.</div>
                                </div>
                                <!--//col-->

                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-body-->

                    </div>
                    <!--//inner-->
                </div>
                <!--//app-card-->

                <div class="row g-4 mb-4">
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">ระยะทางสูงสุด</h4>
                                <div class="stats-figure">NEDC: <?= $_SESSION["car"]["range_nedc"] ?> กม.</div>
                                <div class="stats-meta text-success">
                                    <?= 'WLTP: ' . $_SESSION["car"]["range_est"] ?>
                                </div>
                            </div>
                        </div>
                        <!--//app-card-->
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">เครื่องยนต์</h4>
                                <div class="stats-figure"><?= $_SESSION["car"]["car_engine"] ?> kW</div>
                                <div class="stats-meta text-success">
                                    (<?= $_SESSION["car"]["car_horsep"] ?> แรงม้า)
                                </div>
                            </div>
                        </div>
                        <!--//app-card-->
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">แบตเตอรี่</h4>
                                <div class="stats-figure"><?= $_SESSION["car"]["batt_capacity"] ?> kWh</div>
                                <div class="stats-meta text-success">
                                    <?php
                                    $charge_time = number_format(($_SESSION["car"]["batt_capacity"] * 1000) / (32 * 220), 2);
                                    $hrs = floor(($_SESSION["car"]["batt_capacity"] * 1000) / (32 * 220));
                                    $hrs = $hrs + number_format((($charge_time - $hrs) / 100) * 60, 2);
                                    ?>
                                    Wall Charge <?= $hrs ?> ชม.
                                </div>
                            </div>
                        </div>
                        <!--//app-card-->
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">หัวชาร์จ</h4>
                                <div class="stats-figure"><?= $_SESSION["car"]["car_plug_kw"] ?> kW</div>
                                <div class="stats-meta text-success">
                                    <?= $_SESSION["car"]["car_plug"] ?>
                                </div>
                            </div>
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//col-->
                </div>
                <!--//row-->

            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->

        <?php require('footer.php'); ?>

    </div>
    <!--//app-wrapper-->


    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Charts JS -->
    <!-- <script src="assets/plugins/chart.js/chart.min.js"></script> -->
    <!-- <script src="assets/js/index-charts.js"></script> -->

    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

</body>

</html>