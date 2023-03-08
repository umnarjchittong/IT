<!DOCTYPE html>
<html lang="en">
<?php
include('core.php');

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

// if (!isset($_SESSION["trip_logs"])) {
$_SESSION["trip_logs"] = read_logs_data($_SESSION["member"]["profile"] . '-logs.txt');
//     echo "reading first <br>";
// }

if (isset($_GET["act"]) && $_GET["act"] == 'del' && isset($_GET["x"])) {
    $trip_name = $_SESSION["trip_logs"][($_GET["x"] - 1)]["name"];
    array_splice($_SESSION["trip_logs"], ($_GET["x"] - 1), 1);
    $json_text = '';
    foreach ($_SESSION["trip_logs"] as $trip) {
        if ($json_text) {
            $json_text .= ',
            ';
        }
        $json_text .= '{
            "name": "' . $trip["name"] . '",
            "link": "' . $trip["link"] . '",
            "location":{
                "place_1":"บ้าน",
                "place_2":"ปลายทาง"
            }
        }';
    }
    $json_text = '[' . $json_text . ']';
    write_logs($_SESSION["member"]["email"], 'Road Trip Del -', $trip_name);
    write_logs_data($fp = $_SESSION["member"]["profile"] . '-logs.txt', $json_text);
    $_SESSION["trip_logs"] = read_logs_data($_SESSION["member"]["profile"] . '-logs.txt');
    die();
    echo '<meta http-equiv="refresh" content="0;url=trip_recording.php?act=alert&sms=trip del completed">';
}

if (isset($_POST["t_log_batt"]) && isset($_POST["t_log_odo"]) && isset($_POST["update"])) {
    print_r($_POST);
    echo "<hr>";

    if ($_SESSION["trip_logs"]) {
        $json_text = ',
        ';
    } else {
        $json_text = '';
    }

    if ($_POST["t_log_batt"] == 100) {
        $json_text .= '{
            "date": "' . date("Y/m/d") . '",
            "time": "' . date("H:i") . '",
            "location": "' . $_POST["t_log_location"] . '",
            "batt": "' . $_POST["t_log_batt"] . '",
            "range": "' . $_POST["t_log_range"] . '",
            "odo": "' . $_POST["t_log_odo"] . '",
            "energy": "' . $_POST["t_log_energy"] . '",
            "mode": "' . $_POST["t_log_mode"] . '",
            "used_percent": 0,
            "used_kw": 0,
            "used_km": 0,
            "used_100": 0
        }';
    } else {
        $batt_used = ($_POST["last_percent"] - $_POST["t_log_batt"]);
        $used_kw = (($batt_capacity * $batt_used) / 100);
        $used_range = ($_POST["t_log_odo"] - $_POST["last_odo"]);
        $used_100 = ($used_kw / $used_range) * 100;
        $json_text .= '{
            "date": "' . date("Y/m/d") . '",
            "time": "' . date("H:i") . '",
            "location": "' . $_POST["t_log_location"] . '",
            "batt": "' . $_POST["t_log_batt"] . '",
            "range": "' . $_POST["t_log_range"] . '",
            "odo": "' . $_POST["t_log_odo"] . '",
            "energy": "' . $_POST["t_log_energy"] . '",
            "mode": "' . $_POST["t_log_mode"] . '",
            "used_percent": ' . $batt_used . ',
            "used_kw": ' . $used_kw . ',
            "used_km": ' . $used_range . ',
            "used_100": ' . $used_100 . '
        }';
    }
    // $json_text = '[' . $json_text . ']';
    // echo "<hr><br>";
    // echo $json_text;
    // die();
    write_logs($_SESSION["member"]["email"], 'Trip Record Add +', $_POST["t_log_location"] . ", " . $_POST["t_log_batt"] . ", " . $_POST["t_log_range"] . ", " . $_POST["t_log_odo"]);
    write_logs_data($_SESSION["member"]["profile"] . '-logs.txt', $json_text);
    $_SESSION["trip_logs"] = read_logs_data($_SESSION["member"]["profile"] . '-logs.txt');
    // die();
    echo '<meta http-equiv="refresh" content="0;url=trip_recording.php?act=alert&sms=trip add completed">';
}



// $json_text = json_encode($_SESSION["trip_logs"]);
// $json_text = str_replace("]", "", $json_text);
// $json_text .= ',{"name": "' . $_POST["trip_name"] . '","link": "' . $_POST["trip_link"] . '","location":{"place_1": "lo-abc","place_2": "lo2-abc"}}]';
// $json_text = json_encode($json_text);
// echo $json_text;

// write_trip_data($fp = 'umnarj-logs.txt', $json_text);
// $_SESSION["trip_logs"] = read_trip_data();
// }


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
        <?php
        // print_r(end($_SESSION["trip_logs"]));
        ?>
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <?php // if (isset($_GET["act"]) && $_GET["act"] == "add") { 
            ?>
            <div class="container-xl">
                <h1 class="app-page-title">Trip Logs</h1>
                <p class="text-center" style="font-size: 0.8em;">* ให้ทำการบันทึกข้อมูลตอนเช้าก่อนออกบ้าน และทุกครั้งก่อนดับเครื่อง</p>
                <!--//app-card-->
                <form action="trip_recording.php" method="post">
                    <div class="col-12">
                        <div class="app-card app-card-basic shadow-sm">
                            <div class="app-card-header p-4 border-bottom-0">
                                <div class="row">
                                    <div class="form-floating mb-3 col-12">
                                        <input type="text" class="form-control text-end" name="t_log_location" id="t_log_location" required tabindex="1" placeholder="Home" autofocus>
                                        <label for="t_log_location"><?= $_SESSION["language"]["road-trip-logs-table-location"] ?></label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-floating mb-3 col-4">
                                        <input type="number" class="form-control text-end" name="t_log_batt" id="t_log_batt" required tabindex="2">
                                        <label for="t_log_batt"><?= $_SESSION["language"]["road-trip-logs-table-batt"] ?></label>
                                    </div>
                                    <div class="form-floating mb-3 col-4">
                                        <input type="number" class="form-control text-end" name="t_log_range" id="t_log_range" required step="0.01" tabindex="3" onfocus="gen_t_log_range()">
                                        <label for="t_log_range"><?= $_SESSION["language"]["road-trip-logs-table-range"] ?></label>
                                    </div>
                                    <div class="form-floating mb-3 col-4">
                                        <input type="number" class="form-control text-end" name="t_log_odo" id="t_log_odo" required step="0.01" tabindex="4">
                                        <label for="t_log_odo"><?= $_SESSION["language"]["road-trip-logs-table-odo"] ?></label>
                                    </div>
                                </div>

                                * Optional (ไม่ระบุก็ได้)
                                <div class="row px-2 gx-3">
                                    <div class="col-12 col-md-6 card p-2">
                                        <div class="d-flex justify-content-between">
                                            <div class="col form-check form-check-inline">
                                                <input class="form-check-input ps-2" type="radio" id="t_log_energy1" name="t_log_energy" value="standard" checked tabindex="5">
                                                <label class="form-check-label" for="t_log_energy1">Standard</label>
                                            </div>
                                            <div class="col form-check form-check-inline">
                                                <input class="form-check-input ps-2" type="radio" id="t_log_energy2" name="t_log_energy" value="height">
                                                <label class="form-check-label" for="t_log_energy2">High</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 card p-2">
                                        <div class="d-flex justify-content-between">
                                            <div class="col col-md form-check form-check-inline align-content-center">
                                                <input class="form-check-input ps-2" type="radio" id="t_log_mode1" name="t_log_mode" value="eco" checked tabindex="6">
                                                <label class="form-check-label" for="t_log_mode1">ECO</label>
                                            </div>
                                            <div class="col col-md form-check form-check-inline">
                                                <input class="form-check-input ps-2" type="radio" id="t_log_mode2" name="t_log_mode" value="normal">
                                                <label class="form-check-label" for="t_log_mode2">Normal</label>
                                            </div>
                                            <div class="col col-md form-check form-check-inline">
                                                <input class="form-check-input ps-2" type="radio" id="t_log_mode3" name="t_log_mode" value="sport">
                                                <label class="form-check-label" for="t_log_mode3">Sport</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group pb-3 text-center">
                                <input type="hidden" name="last_percent" value="<?= end($_SESSION["trip_logs"])["batt"]; ?>">
                                <input type="hidden" name="last_range" value="<?= end($_SESSION["trip_logs"])["range"]; ?>">
                                <input type="hidden" name="last_odo" value="<?= end($_SESSION["trip_logs"])["odo"]; ?>">
                                <input type="hidden" name="fst" value="append">
                                <input type="submit" class="btn btn-primary mt-3 px-5 text-white" name="update" value="SAVE" tabindex="7">
                                <!-- <a href="?" target="_top" class="btn btn-secondary ms-4 mt-3 px-5 mx-auto">CLOSE</a> -->
                            </div>
                            <!--//col-->
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                    </div>
                    <!--//app-card-->
            </div>
            </form>
            <script>
                function gen_t_log_range() {
                    if (document.getElementById("t_log_batt").value == 100) {
                        document.getElementById("t_log_range").value = <?= $_SESSION["car"]["range_nedc"] ?>;
                    }
                }
            </script>
        </div>
        <?php // } 
        ?>
        <div class="container-xl">

            <?php
            // if (!isset($_SESSION["trip_logs"])) {
            // $_SESSION["trip_logs"] = read_logs_data($_SESSION["member"]["profile"] . '-logs.txt');
            // echo "reading..." . $_SESSION["member"]["profile"] . '-logs.txt' . "<br>";
            // }
            // echo '<pre>Read';
            // print_r($_SESSION["trip_logs"]);
            // echo '</pre>';
            trip_log_table();
            ?>

            <? //php trip_range_table(); 
            ?>

            <? //php waste_energy($_SESSION["car"]["batt_capacity"], $_SESSION["car"]["range_est"]); 
            ?>


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