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

?>

<head>
    <title><?= $title_name ?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="EV Car Calculator">
    <meta name="author" content="Umnarj Chittong">
    <link rel="shortcut icon" href="assets/images/icon/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/icon/icon/favicon-96x96.png">

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

                <h1 class="app-page-title"><?= $_SESSION["language"]["ev-station"] ?></h1>
                <!--//app-card-->

                <?php
                $charge_type = array("7", "22", "60", "80");
                $charge = array(
                    "7" => array(
                        "min" => 0,
                        "kwh" => 0,
                        "range" => 0,
                        "batt" => 0
                    ),
                    "22" => array(
                        "min" => 0,
                        "kwh" => 0,
                        "range" => 0,
                        "batt" => 0
                    ),
                    "60" => array(
                        "min" => 0,
                        "kwh" => 0,
                        "range" => 0,
                        "batt" => 0
                    ),
                    "80" => array(
                        "min" => 0,
                        "kwh" => 0,
                        "range" => 0,
                        "batt" => 0
                    ),
                );

                if (isset($_GET["chargeval"]) && is_numeric($_GET["chargeval"])) {
                    foreach ($charge_type as $type) {
                        $charge[$type]["min"]  = $_GET["chargeval"];
                    }
                    $charge = charge_calculation($charge, strtolower($_GET["method"]), $_GET["chargeval"]);
                }

                if (isset($_GET["chargeval"]) && is_numeric($_GET["chargeval"])) {
                    foreach ($charge_type as $type) {
                        $charge[$type]["kwh"]  = $_GET["chargeval"];
                    }
                    $charge = charge_calculation($charge, strtolower($_GET["method"]), $_GET["chargeval"]);
                }

                if (isset($_GET["chargeval"]) && is_numeric($_GET["chargeval"])) {
                    foreach ($charge_type as $type) {
                        $charge[$type]["range"]  = $_GET["chargeval"];
                    }
                    $charge = charge_calculation($charge, strtolower($_GET["method"]), $_GET["chargeval"]);
                }

                if (isset($_GET["chargeval"]) && is_numeric($_GET["chargeval"])) {
                    foreach ($charge_type as $type) {
                        $charge[$type]["batt"]  = $_GET["chargeval"];
                    }
                    $charge = charge_calculation($charge, strtolower($_GET["method"]), $_GET["chargeval"]);
                }


                // // 10 amp
                // $charge_percent = ((($charge["10"]["kwh"] * $_GET["chargetime"]) / $_SESSION["car"]["batt_capacity"]) * 100);
                // if ($charge_percent < 100) {
                //     $charge["10"]["charged_percent"] = $charge_percent;
                // } else {
                //     $charge["10"]["charged_percent"] = 100;
                // }
                // $charge["10"]["charged_range"] = ($charge["10"]["charged_percent"] / 100) * $_SESSION["car"]["range_est"];

                // // 16 amp
                // $charge_percent = ((($charge["16"]["kwh"] * $_GET["chargetime"]) / $_SESSION["car"]["batt_capacity"]) * 100);
                // if ($charge_percent < 100) {
                //     $charge["16"]["charged_percent"] = $charge_percent;
                // } else {
                //     $charge["16"]["charged_percent"] = 100;
                // }
                // $charge["16"]["charged_range"] = ($charge["16"]["charged_percent"] / 100) * $_SESSION["car"]["range_est"];

                // // 32 amp
                // $charge_percent = ((($charge["32"]["kwh"] * $_GET["chargetime"]) / $_SESSION["car"]["batt_capacity"]) * 100);
                // if ($charge_percent < 100) {
                //     $charge["32"]["charged_percent"] = $charge_percent;
                // } else {
                //     $charge["32"]["charged_percent"] = 100;
                // }
                // $charge["32"]["charged_range"] = ($charge["32"]["charged_percent"] / 100) * $_SESSION["car"]["range_est"];

                ?>
                <div class="text-center" style="font-size: 0.8em;">* ระบุจำนวน และกดปุ่มเลือก<br>ระบบจะแสดงผลลัพธ์ ระยะทาง, เวลาที่ชาร์จ, กำลังไฟฟ้าที่ได้ และจำนวนเปอร์เซนต์ของแบตเตอรี่ โดยแยกตามปริมาณของกระแสไฟฟ้า.</div>
                <div class="row g-4 mb-4">
                    <div class="col-12">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <form action="?" method="GET">
                                <div class="app-card-body px-2 py-3 p-lg-4">
                                    <h4 class="stats-type mb-1"><?= $_SESSION["language"]["ev-station-charging-value"] ?></h4>
                                    <div class="stats-figure">
                                        <div class="form-group pt-1">
                                            <input type="number" step="0.1" class="form-control form-control-sm text-center mx-auto w-25" name="chargeval" <?php if (isset($_GET["chargeval"]) && is_numeric($_GET["chargeval"])) {
                                                                                                                                                                echo ' value="' . $_GET["chargeval"] . '"';
                                                                                                                                                            } ?> required>
                                        </div>
                                    </div>
                                    <div class="stats-meta text-success d-flex justify-content-around mt-5">
                                        <button type="submit" class="btn btn-sm btn-primary px-3 text-white" name="method" value="<?= $_SESSION["language"]["ev-station-btn-min"] ?>"><?= $_SESSION["language"]["ev-station-btn-min"] ?></button>
                                        <button type="submit" class="btn btn-sm btn-primary px-3 text-white" name="method" value="<?= $_SESSION["language"]["ev-station-btn-km"] ?>"><?= $_SESSION["language"]["ev-station-btn-km"] ?></button>
                                        <button type="submit" class="btn btn-sm btn-primary px-3 text-white" name="method" value="<?= $_SESSION["language"]["ev-station-btn-kwh"] ?>"><?= $_SESSION["language"]["ev-station-btn-kwh"] ?></button>
                                        <button type="submit" class="btn btn-sm btn-primary px-3 text-white" name="method" value="<?= $_SESSION["language"]["ev-station-btn-batt"] ?>"><?= $_SESSION["language"]["ev-station-btn-batt"] ?></button>
                                    </div>
                                </div>
                            </form>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//col-->

                    <?php
                    if (isset($_GET["method"]) && isset($_GET["chargeval"])) {
                    foreach ($charge_type as $type) {
                    ?>
                        <div class="col-6 col-lg-3">
                            <div class="app-card app-card-stat shadow-sm h-100">
                                <div class="app-card-body p-3 p-lg-4">
                                    <h4 class="stats-type mb-1"><?= $_SESSION["language"]["ev-station-cal-amp"] . ': ' . $type . ' ' . $_SESSION["language"]["kw"]  ?></h4>
                                    <div class="stats-figure h3 fs-4"><?= $_SESSION["language"]["ev-station-cal-range"] . ': ' . ($charge[$type]["range"]) . " " . $_SESSION["language"]["km"] ?></div>
                                    <?php

                                    ?>
                                    <div class="stats-meta text-success"><?= $_SESSION["language"]["ev-station-cal-time"] . ': ' . $charge[$type]["min"] . ' ' . $_SESSION["language"]["min"] . "<br>" . 
                                    $_SESSION["language"]["ev-station-cal-power"] . ': ' . $charge[$type]["kwh"] . ' ' . $_SESSION["language"]["kwh"] . "<br>" . 
                                    $_SESSION["language"]["ev-station-cal-batt"] . ': ' . $charge[$type]["batt"] . " %" ?></div>
                                </div>
                                <!--//app-card-body-->
                                <!-- <a class="app-card-link-mask" href="#"></a> -->
                            </div>
                            <!--//app-card-->
                        </div>

                    <?php
                    }
                }
                    ?>
                    <!--//col-->
                </div>

                
                <?php
                if (strpos($charge["80"]["min"], "-")) {
                    $charge_80kwh_min = substr($charge["80"]["min"], (strpos($charge["80"]["min"], "-") + 1), strlen($charge["80"]["min"]));
                } else {
                    $charge_80kwh_min = floor($charge["80"]["min"]);
                }
                if (isset($_GET["chargeval"]) && $_GET["chargeval"] != "") {
                    ev_station_rate('min', floor($charge_80kwh_min));
                }
                ?>

<?php waste_energy($_SESSION["car"]["batt_capacity"], $_SESSION["car"]["range_est"]); ?>

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
    <!-- <script src="assets/plugins/chart.js/chart.min.js"></script>
    <script src="assets/js/index-charts.js"></script> -->

    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

</body>

</html>