<!DOCTYPE html>
<html lang="en">
<?php
include('core.php');
// debug_console($_SESSION["car"]);

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
    <meta name="author" content="umnarj chittong">
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

                <h1 class="app-page-title"><?= $_SESSION["language"]["home-charge"] ?></h1>
                <!--//app-card-->

                <?php
                if (isset($_GET["chargetime"]) && is_numeric($_GET["chargetime"])) {
                    write_logs($_SESSION["member"]["email"], 'Home Charging', $_GET["chargetime"]);
                    $charge = array(
                        "10" => array(
                            "kwh" => (10 * 220) / 1000,
                            "fullhrs" => ($_SESSION["car"]["batt_capacity"] / ((10 * 220) / 1000)),
                            "charged_percent" => 0,
                            "charged_range" => 0
                        ),
                        "16" => array(
                            "kwh" => (16 * 220) / 1000,
                            "fullhrs" => ($_SESSION["car"]["batt_capacity"] / ((16 * 220) / 1000)),
                            "charged_percent" => 0,
                            "charged_range" => 0
                        ),
                        "32" => array(
                            "kwh" => (32 * 220) / 1000,
                            "fullhrs" => ($_SESSION["car"]["batt_capacity"] / ((32 * 220) / 1000)),
                            "charged_percent" => 0,
                            "charged_range" => 0
                        ),
                    );

                    // 10 amp
                    $charge_percent = number_format(((($charge["10"]["kwh"] * $_GET["chargetime"]) / $_SESSION["car"]["batt_capacity"]) * 100), 2);
                    if ($charge_percent < 100) {
                        $charge["10"]["charged_percent"] = number_format(($charge_percent - ($charge_percent * ($ev_station_err_batt / 100))), 0) . ' - ' . number_format($charge_percent, 0);
                    } else {
                        $charge["10"]["charged_percent"] = 100;
                    }
                    if (strpos($charge["10"]["charged_percent"], "-")) {
                        $charge_top_percent = substr($charge["10"]["charged_percent"], (strpos($charge["10"]["charged_percent"], "-") + 1), strlen($charge["10"]["charged_percent"]));
                        $charge_bottom_percent = substr($charge["10"]["charged_percent"], 0, (strpos($charge["10"]["charged_percent"], "-") - 1));
                        $charge["10"]["charged_range"] = number_format($_SESSION["car"]["range_est"] * ($charge_bottom_percent / 100), 0) . ' - ' . number_format($_SESSION["car"]["range_est"] * ($charge_top_percent / 100), 0);
                        $charge["10"]["charged_cost"] = number_format(((($charge_bottom_percent / 100) * $_SESSION["car"]["batt_capacity"])) * $_SESSION["car"]["home_charger_op"], 2) . ' - ' . number_format(((($charge_top_percent / 100) * $_SESSION["car"]["batt_capacity"])) * $_SESSION["car"]["home_charger_op"], 2);
                    } else {
                        $charge["10"]["charged_range"] = number_format((($charge["10"]["charged_percent"] / 100) * $_SESSION["car"]["range_est"]), 2);
                        $charge["10"]["charged_cost"] = number_format($charge["10"]["charged_percent"] * $_SESSION["car"]["home_charger_op"], 2);
                    }

                    // 16 amp
                    $charge_percent = ((($charge["16"]["kwh"] * $_GET["chargetime"]) / $_SESSION["car"]["batt_capacity"]) * 100);
                    if ($charge_percent < 100) {
                        $charge["16"]["charged_percent"] = number_format(($charge_percent - ($charge_percent * ($ev_station_err_batt / 100))), 0) . ' - ' . number_format($charge_percent, 0);
                    } else {
                        $charge["16"]["charged_percent"] = 100;
                    }
                    if (strpos($charge["16"]["charged_percent"], "-")) {
                        $charge_top_percent = substr($charge["16"]["charged_percent"], (strpos($charge["16"]["charged_percent"], "-") + 1), strlen($charge["16"]["charged_percent"]));
                        $charge_bottom_percent = substr($charge["16"]["charged_percent"], 0, (strpos($charge["16"]["charged_percent"], "-") - 1));
                        $charge["16"]["charged_range"] = number_format($_SESSION["car"]["range_est"] * ($charge_bottom_percent / 100), 0) . ' - ' . number_format($_SESSION["car"]["range_est"] * ($charge_top_percent / 100), 0);
                        $charge["16"]["charged_cost"] = number_format(((($charge_bottom_percent / 100) * $_SESSION["car"]["batt_capacity"])) * $_SESSION["car"]["home_charger_op"], 2) . ' - ' . number_format(((($charge_top_percent / 100) * $_SESSION["car"]["batt_capacity"])) * $_SESSION["car"]["home_charger_op"], 2);
                    } else {
                        $charge["16"]["charged_range"] = number_format(($charge["16"]["charged_percent"] / 100) * $_SESSION["car"]["range_est"], 2);
                        $charge["16"]["charged_cost"] = number_format($charge["16"]["charged_percent"] * $_SESSION["car"]["home_charger_op"], 2);
                    }
                    

                    // 32 amp
                    $charge_percent = ((($charge["32"]["kwh"] * $_GET["chargetime"]) / $_SESSION["car"]["batt_capacity"]) * 100);
                    if ($charge_percent < 100) {
                        $charge["32"]["charged_percent"] = number_format(($charge_percent - ($charge_percent * ($ev_station_err_batt / 100))), 0) . ' - ' . number_format($charge_percent, 0);
                    } else {
                        $charge["32"]["charged_percent"] = 100;
                    }
                    if (strpos($charge["32"]["charged_percent"], "-")) {
                        $charge_top_percent = substr($charge["32"]["charged_percent"], (strpos($charge["32"]["charged_percent"], "-") + 1), strlen($charge["32"]["charged_percent"]));
                        $charge_bottom_percent = substr($charge["32"]["charged_percent"], 0, (strpos($charge["32"]["charged_percent"], "-") - 1));
                        $charge["32"]["charged_range"] = number_format($_SESSION["car"]["range_est"] * ($charge_bottom_percent / 100), 0) . ' - ' . number_format($_SESSION["car"]["range_est"] * ($charge_top_percent / 100), 0);
                        $charge["32"]["charged_cost"] = number_format(((($charge_bottom_percent / 100) * $_SESSION["car"]["batt_capacity"])) * $_SESSION["car"]["home_charger_op"], 2) . ' - ' . number_format(((($charge_top_percent / 100) * $_SESSION["car"]["batt_capacity"])) * $_SESSION["car"]["home_charger_op"], 2);
                    } else {
                        $charge["32"]["charged_range"] = number_format(($charge["32"]["charged_percent"] / 100) * $_SESSION["car"]["range_est"], 0);
                        $charge["32"]["charged_cost"] = number_format($charge["32"]["charged_percent"] * $_SESSION["car"]["home_charger_op"], 2);
                    }
                    
                }

                // print_r($charge);
                ?>
                    <div class="text-center" style="font-size: 0.8em;">* ระบุจำนวนชั่วโมงที่ต้องการชาร์จ ระบบจะแสดงผลลัพธ์ จำนวนเปอร์เซนต์ของแบตเตอรี่, ระยะทาง, ค่าชาร์จ แยกตามปริมาณของกระแสไฟฟ้า.</div>
                <div class="row g-4 mb-4">
                    <div class="col-6 col-lg-3 mx-auto">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <form action="?" method="GET">
                                <div class="app-card-body p-3 p-lg-4">
                                    <h4 class="stats-type mb-1"><?= $_SESSION["language"]["charging-hr"] ?></h4>
                                    <div class="stats-figure">
                                        <div class="form-group pt-1">
                                            <input type="number" step="0.1" class="form-control form-control-sm text-center" name="chargetime" <?php if (isset($_GET["chargetime"]) && is_numeric($_GET["chargetime"])) {
                                                                                                                                                    echo ' value="' . $_GET["chargetime"] . '"';
                                                                                                                                                } ?> required>
                                        </div>
                                    </div>
                                    <div class="stats-meta text-success">
                                        <button type="submit" class="btn btn-sm btn-primary mt-4 text-white"><?= $_SESSION["language"]["submit"] ?></button>
                                    </div>
                                </div>
                            </form>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//col-->

                    <?php if (isset($_GET["chargetime"]) && is_numeric($_GET["chargetime"])) { ?>
                        <div class="col-6 col-lg-3">
                            <div class="app-card app-card-stat shadow-sm h-100">
                                <div class="app-card-body p-3 p-lg-4">
                                    <h4 class="stats-type mb-1">Portable 10 Amp</h4>
                                    <div class="stats-figure"><?= $charge["10"]["charged_percent"] . " %" ?></div>
                                    <div class="stats-meta text-success"><?= $charge["10"]["charged_range"] . " Km<br>" . $charge["10"]["charged_cost"] . " ฿" ?></div>
                                </div>
                                <!--//app-card-body-->
                                <!-- <a class="app-card-link-mask" href="#"></a> -->
                            </div>
                            <!--//app-card-->
                        </div>
                        <!--//col-->
                        <div class="col-6 col-lg-3">
                            <div class="app-card app-card-stat shadow-sm h-100">
                                <div class="app-card-body p-3 p-lg-4">
                                    <h4 class="stats-type mb-1">Zencar 16 Amp</h4>
                                    <div class="stats-figure"><?= $charge["16"]["charged_percent"] . " %" ?></div>
                                    <?php
                                    if (strpos($charge["16"]["charged_percent"], "-")) {
                                        $charge_top_percent = substr($charge["16"]["charged_percent"], (strpos($charge["16"]["charged_percent"], "-") + 1), strlen($charge["16"]["charged_percent"]));
                                        $charge_bottom_percent = substr($charge["16"]["charged_percent"], 0, (strpos($charge["16"]["charged_percent"], "-") - 1));
                                    } else {
                                    }
                                    ?>
                                    <div class="stats-meta text-success"><?= $charge["16"]["charged_range"] . " Km<br>" . $charge["16"]["charged_cost"] . " ฿" ?></div>
                                </div>
                                <!--//app-card-body-->
                                <!-- <a class="app-card-link-mask" href="#"></a> -->
                            </div>
                            <!--//app-card-->
                        </div>
                        <!--//col-->
                        <div class="col-6 col-lg-3">
                            <div class="app-card app-card-stat shadow-sm h-100">
                                <div class="app-card-body p-3 p-lg-4">
                                    <h4 class="stats-type mb-1">Home Charger 32 Amp</h4>
                                    <div class="stats-figure"><?= $charge["32"]["charged_percent"] . " %" ?></div>
                                    <?php
                                    if (strpos($charge["32"]["charged_percent"], "-")) {
                                        $charge_top_percent = substr($charge["32"]["charged_percent"], (strpos($charge["32"]["charged_percent"], "-") + 1), strlen($charge["32"]["charged_percent"]));
                                        $charge_bottom_percent = substr($charge["32"]["charged_percent"], 0, (strpos($charge["32"]["charged_percent"], "-") - 1));
                                    } else {
                                    }
                                    ?>
                                    <div class="stats-meta text-success"><?= $charge["32"]["charged_range"] . " Km<br>" . $charge["32"]["charged_cost"] . " ฿" ?></div>
                                </div>
                                <!--//app-card-body-->
                                <!-- <a class="app-card-link-mask" href="#"></a> -->
                            </div>
                            <!--//app-card-->
                        </div>
                        <!--//col-->
                    <?php } ?>
                </div>

                <?php
// echo '<pre>';
// print_r($charge);
// echo '</pre>';
                ?>


<?php charged_cost_table(); ?>

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
    <!-- <script src="assets/plugins/chart.js/chart.min.js"></script> -->
    <!-- <script src="assets/js/index-charts.js"></script> -->

    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

</body>

</html>