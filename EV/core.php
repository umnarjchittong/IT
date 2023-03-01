<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Bangkok');

$title_name = "BYD ATTO 3";
$batt_capacity = 60.48;

$home_charger_p = 7.20378;
$home_charger_op = 3.82118;

$ev_station_err_min = 32.75; // 32.75%
$ev_station_err_km = 10; // 10%
$ev_station_err_kwh = 10; // 10%
$ev_station_err_batt = 10; // 10%
$byd_color_ordering = array(
    array(
        "color_name" => "Parkour Red",
        "color_pic" => "byd_atto_3_parkour_red.png",
    ),
    array(
        "color_name" => "Surf Blue",
        "color_pic" => "byd_atto_3_surf_blue.png",
    ),
    array(
        "color_name" => "Forest Green",
        "color_pic" => "byd_atto_3_forest_green.png",
    ),
    array(
        "color_name" => "Boulder Grey",
        "color_pic" => "byd_atto_3_boulder_grey.png",
    ),
    array(
        "color_name" => "Ski White",
        "color_pic" => "byd_atto_3_ski_white.png",
    )
);

$language_pack_en = array(
    "min" => "Min",
    "km" => "Km",
    "kwh" => "Kwh",
    "batt" => "Batt",
    "kw" => "Kw",
    // side panel
    "overview" => "Overview",
    "trip-recording" => "Trip Recording",
    "home-charge" => "Home Charge",
    "ev-station" => "EV Station",
    "road-trip" => "Road Trip",
    "links" => "Links",
    "members" => "Members",
    "settings" => "Settings",
    // header panel
    "contact" => "Contact Admin",
    "view-logs" => "View Logs",
    "log-out" => "Log Out",
    // home charge
    "charging-hr" => "Charging Hrs.",
    "submit" => "OK",
    // charged cost
    "charged-cost-title" => "Charging Cose",
    "charged-cost-table-percent" => "Batt (%)",
    "charged-cost-table-kw" => "Kw",
    "charged-cost-table-km" => "Km",
    "charged-cost-table-baht" => "฿",
    // waste energy
    "waste-energy-batt" => "Batt",
    "waste-energy-power" => "Power",
    "waste-energy-range" => "Range",

    // ev station rate
    "ev-station-charging-value" => "Charging Value",
    "ev-station-btn-min" => "Min",
    "ev-station-btn-km" => "Km",
    "ev-station-btn-kwh" => "Kwh",
    "ev-station-btn-batt" => "Batt",
    // ev Station
    "ev-station-cal-amp" => "Power",
    "ev-station-cal-range" => "Range",
    "ev-station-cal-time" => "Time",
    "ev-station-cal-power" => "Power",
    "ev-station-cal-batt" => "batt",

    "ev-station-rate-title" => "EV Station",
    "ev-station-rate-subtitle" => "Case",
    "ev-station-rate-name" => "Name",
    "ev-station-rate-place" => "Place",
    // road trip
    "road-trip-history-title" => "Trip History",
    "road-trip-history-table-title" => "My Trip",
    "road-trip-history-table-trip" => "Trip",
    "road-trip-history-table-map" => "Link",
    "road-trip-range-title" => "Trip Range",
    "road-trip-range-percent" => "Batt (%)",
    "road-trip-range-kw" => "Kw",
    "road-trip-range-km" => "Km",
    // trip logs
    "road-trip-logs-table-title" => "Trip Logs",
    "road-trip-logs-table-datetime" => "Date/Time",
    "road-trip-logs-table-location" => "Location",
    "road-trip-logs-table-batt" => "Batt %",
    "road-trip-logs-table-range" => "Range",
    "road-trip-logs-table-odo" => "ODO",
    "road-trip-logs-table-energy" => "Regen Mode",
    "road-trip-logs-table-mode" => "Driving Mode",
    // settings
    "setting-title" => "Profile Setting",
    "setting-model" => "Model",
    "setting-range-estimate" => "Range Estimate (ฺBatt 100%)",
    "setting-range-maximum" => "Maximum Driving",
    "setting-btn-save" => "SAVE"
);

$language_pack_th = array(
    "min" => "นาที",
    "km" => "กิโลเมตร",
    "kwh" => "กิโลวัตต์/ชม.",
    "batt" => "แบตเตอรี่",
    "kw" => "กิโลวัตต์",
    // side panel
    "overview" => "ภาพรวม",
    "trip-recording" => "บันทึกการเดินทาง",
    "home-charge" => "โฮมชาร์จ",
    "ev-station" => "สถานีชาร์จ",
    "road-trip" => "แผนการเดินทาง",
    "links" => "ลิงก์",
    "members" => "สมาชิก",
    "settings" => "การตั้งค่า",
    // header panel
    "contact" => "ติดต่อแอดมิน",
    "view-logs" => "บันทึกการใช้งาน",
    "log-out" => "ออกระบบ",
    // home charge
    "charging-hr" => "จำนวน ชม. การชาร์จ",
    "submit" => "คำนวณ",
    // charged cost
    "charged-cost-title" => "ค่าชาร์จ",
    "charged-cost-table-percent" => "แบต (%)",
    "charged-cost-table-kw" => "กิโลวัตต์",
    "charged-cost-table-km" => "กิโลเมตร",
    "charged-cost-table-baht" => "บาท",
    // waste energy
    "waste-energy-batt" => "แบตเตอรี่",
    "waste-energy-power" => "พลังงาน",
    "waste-energy-range" => "ระยะทาง",
    // ev station rate
    "ev-station-charging-value" => "ระบุจำนวน",
    "ev-station-btn-min" => "นาที",
    "ev-station-btn-km" => "กม.",
    "ev-station-btn-kwh" => "กิโลวัตต์",
    "ev-station-btn-batt" => "แบต (%)",
    // ev Station
    "ev-station-cal-amp" => "กำลังไฟฟ้า",
    "ev-station-cal-range" => "ระยะทาง",
    "ev-station-cal-time" => "เวลา",
    "ev-station-cal-power" => "กำลังไฟฟ้า",
    "ev-station-cal-batt" => "แบตเตอรี่",

    "ev-station-rate-title" => "สถานีชาร์จ",
    "ev-station-rate-subtitle" => "สมมติ",
    "ev-station-rate-name" => "ชื่อ",
    "ev-station-rate-place" => "สถานที่",
    // road trip
    "road-trip-history-title" => "แผนการเดินทาง",
    "road-trip-history-table-title" => "แผนการเดินทางของฉัน",
    "road-trip-history-table-trip" => "เส้นทาง",
    "road-trip-history-table-map" => "ลิงก์แผนที่",
    "road-trip-range-title" => "ระยะการเดินทาง",
    "road-trip-range-percent" => "แบตเตอรี่ (%)",
    "road-trip-range-kw" => "กิโลวัตต์",
    "road-trip-range-km" => "กิโลเมตร",
    // trip logs
    "road-trip-logs-table-title" => "บันทึกการเดินทาง",
    "road-trip-logs-table-datetime" => "วัน/เวลา",
    "road-trip-logs-table-location" => "สถานที่",
    "road-trip-logs-table-batt" => "แบต %",
    "road-trip-logs-table-range" => "ขับได้",
    "road-trip-logs-table-odo" => "ODO",
    "road-trip-logs-table-energy" => "New Energy",
    "road-trip-logs-table-mode" => "Mode",
    // settings
    "setting-title" => "ตั้งค่าโปรไฟล์",
    "setting-model" => "รุ่นรถ",
    "setting-range-estimate" => "ระยะทางโดยประมาณ (ฺBatt 100%)",
    "setting-range-maximum" => "ระยะทางสูงสุดที่ต้องการขับขี่",
    "setting-btn-save" => "บันทึก"
);


if (isset($_SESSION["member"])) {
    // debug_console("member", $_SESSION["member"]);

    if (isset($_GET["act"]) && $_GET["act"] == 'language' && isset($_GET["val"]) && $_GET["val"] != "") {
        $_SESSION["member"]["language"] = $_GET["val"];
    }

    if (!isset($_SESSION["language"]) || $_SESSION["member"]["language"] != $_SESSION["language"]) {
        if ($_SESSION["member"]["language"] == "en") {
            $_SESSION["language"] = $language_pack_en;
        } else if ($_SESSION["member"]["language"] == "th") {
            $_SESSION["language"] = $language_pack_th;
        }
    }
}

// if (!isset($_SESSION["language"]) || count($_SESSION["language"]) <= 0) {
//     $_SESSION["language"] = $language_pack_en;
//     if ($_SESSION["member"]["language"] == "en") {
//         $_SESSION["language"] = $language_pack_en;
//     } else if ($_SESSION["member"]["language"] == "th") {
//         $_SESSION["language"] = $language_pack_th;
//     }
// }


// $batt_capacity = 60.48;
// $batt_using = 300;
// $range_nedc = 480;
// $range_wltp = 420;
// $range_eap = 375;
// $range_est = 400;
// $home_charger_p = 5.82118;
// $home_charger_op = 3.82118;

// {"batt_capacity":"60.48","batt_using":"300","range_nedc":"480","range_wltp":"420","range_eap":"375","range_est":"400",
// "home_charger_p":"5.82118","home_charger_op":"3.82118",
// "car_model":"BYD ATTO 3","car_pic":"atto3.jpg"}



function debug_console($val1, $val2 = null)
{
    if (is_array($val1)) {
        // $val1 = implode(',', $val1);
        $val1 = str_replace(
            chr(34),
            '',
            json_encode($val1, JSON_UNESCAPED_UNICODE)
        );
        $val1 = str_replace(chr(58), chr(61), $val1);
        $val1 = str_replace(chr(44), ', ', $val1);
        $val1 = 'Array:' . $val1;
    }
    if (is_array($val2)) {
        // $val2 = implode(',', $val2);
        $val2 = str_replace(
            chr(34),
            '',
            json_encode($val2, JSON_UNESCAPED_UNICODE)
        );
        $val2 = str_replace(chr(58), chr(61), $val2);
        $val2 = str_replace(chr(44), ', ', $val2);
        $val2 = 'Array:' . $val2;
    }
    if (isset($val1) && isset($val2) && !is_null($val2)) {
        echo '<script>console.log("' .
            $val1 .
            '\\n' .
            $val2 .
            '");</script>';
    } else {
        echo '<script>console.log("' . $val1 . '");</script>';
    }
}

function read_logs()
{
    $fp = 'logs.txt';
    // echo $fp;
    if (file_exists($fp)) {
        $file = fopen($fp, "r");
        $json_text = fread($file, filesize($fp));
        fclose($file);

        // echo "<h3>array:</h3><hr>";
        $json_text = '[' . $json_text . ']';
        $json_text = json_decode($json_text, true);
        // print_r($json_text);

        // extract($json_text);
        return $json_text;
    }
}

function write_logs($username, $method, $val = "")
{
    $json_text = ',
    {
        "datetime":"' . date("d/m/Y H:i:s") . '",
        "username":"' . $username . '",
        "method":"' . $method . '",
        "value":"' . $val . '"
     }';

    $fp = 'logs.txt';

    $file = fopen($fp, "a");
    fwrite($file, $json_text);
    fclose($file);
}

function logs_table()
{
    // global $car;
    $logs = read_logs();
    $logs = array_reverse($logs);
    // echo '<pre>';
    // print_r($logs);
    // echo '</pre>';
    $username = array();
    foreach ($logs as $log) {
        if (!is_numeric(array_search($log["username"], $username)) && $log["username"] != "") {
            array_push($username, $log["username"]);
        }
    }
    // print_r($username);
?>
    <div class="row d-flex justify-content-between align-items-en">
        <div class="col">
            <h1 class="app-page-title mt-4 mb-2 display-4 fw-bold">Logs</h1>
        </div>
        <div class="col">
            <div class="app-utility-item app-user-dropdown dropdown">
                <a class="dropdown-toggle" id="member-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Member</a>
                <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                    <!-- <li><a class="dropdown-item" href="account.html">Account</a></li> -->
                    <?php
                    if ($username) {
                        sort($username);
                        foreach ($username as $user) {
                            echo '<li><a class="dropdown-item" href="?u=' . $user . '" target="_top"';
                            if (isset($_GET["u"]) && $_GET["u"] == $user) {
                                echo ' selected';
                            }
                            echo '>' . $user . '</a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!--//row-->
    <div class="table-responsive">
        <table class="table table-striped app-table-hover table-strip mb-0 text-left">
            <thead>
                <tr class="table-active">
                    <th class="cell text-center col-1" style="width: 120px;">#</th>
                    <th class="cell col-auto">User</th>
                    <th class="cell col">Method</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($logs)) {
                    $x = 0;

                    foreach ($logs as $log) {
                        $get = false;
                        if (isset($_GET["u"])) {
                            if ($_GET["u"] == $log["username"]) {
                                $get = true;
                            } else {
                                $get = false;
                            }
                        } else {
                            $get = true;
                        }

                        if ($get === true) {
                            $x++;
                ?>
                            <tr style="font-size: 0.8em;">
                                <td class="cell text-center"><?= $log["datetime"] ?></td>
                                <td class="cell"><a href="?u=<?= $log["username"] ?>" target="_blank" class="link-primary"><?= $log["username"] ?></a></td>
                                <td class="cell"><?= '<span class="fw-bold">' . $log["method"] . '</span>' . '<br>' . $log["value"] ?></td>
                            </tr>
                <?php
                            if ($x >= 50) {
                                break;
                            }
                        }
                    }
                } ?>

            </tbody>
        </table>
    </div>
<?php
}

function read_default_config($fp)
{
    $fp = "profile/" . $fp;


    $file = fopen($fp, "r");
    $json_text = fread($file, filesize($fp));
    fclose($file);

    // echo "<h3>array:</h3><hr>";
    $json_text = json_decode($json_text, true);
    // print_r($json_text);

    // extract($json_text);
    return $json_text;
}

function write_default_config($fp, $json_text)
{
    $fp = "profile/" . $fp;
    // $json_text = json_encode($json_text);

    $file = fopen($fp, "w");
    fwrite($file, $json_text);
    fclose($file);
}

function waste_energy($batt_capacity, $range_est)
{
    global $ev_station_err_km;
?>
    <hr class="my-4">
    <div class="row g-4 mb-4">
        <div class="col-12 col-md-4">
            <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder">
                                <i class="bi bi-battery fs-5"></i>
                            </div>
                            <!--//icon-holder-->

                        </div>
                        <!--//col-->
                        <div class="col-auto ms-2 ms-lg-4">
                            <h4 class="app-card-title fs-6"><?= '<span class="fw-bold text-primary" style="text-decoration:underline;">' .
                                                                $_SESSION["language"]["waste-energy-batt"] . ': ' . '1 %' . '</span><br>' .
                                                                $_SESSION["language"]["waste-energy-power"] . ': ' . number_format($batt_capacity / 100, 2) . ' Kwh<br>' .
                                                                $_SESSION["language"]["waste-energy-range"] . ': ' . (($range_est * (1 / 100)) - (($range_est * (1 / 100)) * ($ev_station_err_km / 100))) . ' - ' . ($range_est * (1 / 100)) . ' Km' ?></h4>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->
        <div class="col-12 col-md-4">
            <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder">
                                <i class="bi bi-battery-half fs-5"></i>
                            </div>
                            <!--//icon-holder-->

                        </div>
                        <!--//col-->
                        <div class="col-auto ms-2 ms-lg-4">
                            <h4 class="app-card-title fs-6"><?= '<span class="fw-bold text-primary" style="text-decoration:underline;">' . $_SESSION["language"]["waste-energy-range"] . ': ' . '100 Km</span><br>' .
                                                                $_SESSION["language"]["waste-energy-batt"] . ': ' . number_format((100 * 100) / $range_est, 2) . ' - ' . number_format((((100 * 100) / $range_est) + ((100 * 100) / $range_est) * ($ev_station_err_km / 100)), 2) . '%
                            <br>' . $_SESSION["language"]["waste-energy-power"] . ': ' . number_format(($batt_capacity * ((100 * 100) / $range_est)) / 100, 2) . ' - ' . number_format(((($batt_capacity * ((100 * 100) / $range_est)) / 100) + ((($batt_capacity * ((100 * 100) / $range_est)) / 100) * ($ev_station_err_km / 100))), 2) . ' Kwh'; ?></h4>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->
        <div class="col-12 col-md-4">
            <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder">
                                <i class="bi bi-battery-full fs-5"></i>
                            </div>
                            <!--//icon-holder-->

                        </div>
                        <!--//col-->
                        <div class="col-auto ms-2 ms-lg-4">
                            <h4 class="app-card-title fs-6"><?= '<span class="fw-bold text-primary" style="text-decoration:underline;">' .
                                                                $_SESSION["language"]["waste-energy-batt"] . ': ' . '100 %</span>
                            <br>' . $_SESSION["language"]["waste-energy-power"] . ': ' . number_format($batt_capacity, 2) . ' Kwh
                            <br>' . $_SESSION["language"]["waste-energy-range"] . ': ' . ($range_est - ($range_est * ($ev_station_err_km / 100))) . ' - ' . $range_est . ' Km' ?></h4>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->
    </div>
    <!-- <hr class="mb-5"> -->

<?php
}

function charged_cost_table()
{
    // global $car;
?>
    <h1 class=" app-page-title mt-4 mb-1"><?= $_SESSION["language"]["charged-cost-title"] ?></h1>
    <h2 class="fs-6 mb-2">(<?= 'Off Peak:' . $_SESSION["car"]["home_charger_op"] . ' ฿ / Km@ ' .  number_format((($_SESSION["car"]["batt_capacity"] * $_SESSION["car"]["home_charger_op"]) / $_SESSION["car"]["range_est"]), 2) . ' ฿' ?>)</h2>
    <!--//row-->
    <div class="table-responsive">
        <table class="table table-striped app-table-hover table-strip mb-0 text-left">
            <thead>
                <tr class="table-active">
                    <th class="cell text-center"><?= $_SESSION["language"]["charged-cost-table-percent"] ?></th>
                    <th class="cell text-center"><?= $_SESSION["language"]["charged-cost-table-kw"] ?></th>
                    <th class="cell text-center"><?= $_SESSION["language"]["charged-cost-table-km"] ?></th>
                    <th class="cell text-center"><?= $_SESSION["language"]["charged-cost-table-baht"] ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 100; $i > 0; $i -= 10) {
                ?>
                    <tr<?php if ($i <= 20) {
                            echo ' class="table-danger"';
                        } ?>>
                        <td class="cell text-center"><?= number_format($i, 0) ?></td>
                        <td class="cell text-center"><?= number_format((($i * $_SESSION["car"]["batt_capacity"]) / 100), 2) ?></td>
                        <td class="cell text-center"><?= number_format((($i * $_SESSION["car"]["range_est"]) / 100), 0) ?></td>
                        <td class="cell text-center"><?= number_format(((($i * $_SESSION["car"]["batt_capacity"]) / 100) * $_SESSION["car"]["home_charger_op"]), 2) ?></td>
                        </tr>
                    <?php } ?>

            </tbody>
        </table>
    </div>
<?php
}

function read_logs_data($fp)
{
    $fp = "profile/" . $fp;
    // echo $fp;
    if (file_exists($fp)) {
        $file = fopen($fp, "r");
        if (filesize($fp) > 0) {
            $json_text = fread($file, filesize($fp));
            if ($json_text) {
                $json_text = '[' . $json_text . ']';
            }
            $json_text = json_decode($json_text, true);
            return $json_text;
        } else {
            return null;
        }
        fclose($file);

        // echo "<h3>array:</h3><hr>";
        // print_r($json_text);

        // extract($json_text);
    }
}

function write_logs_data($fp, $json_text)
{
    $fp = "profile/" . $fp;

    // $json_text = json_encode($json_text);

    $file = fopen($fp, "a");
    fwrite($file, $json_text);
    fclose($file);
}

function read_trip_data($fp)
{
    $fp = "profile/" . $fp;
    // echo $fp;
    if (file_exists($fp)) {
        $file = fopen($fp, "r");
        $json_text = fread($file, filesize($fp));
        fclose($file);

        // echo "<h3>array:</h3><hr>";
        $json_text = json_decode($json_text, true);
        // print_r($json_text);

        // extract($json_text);
        return $json_text;
    }
}

function write_trip_data($fp, $json_text = "testing")
{
    $fp = "profile/" . $fp;

    // $json_text = json_encode($json_text);

    $file = fopen($fp, "w");
    fwrite($file, $json_text);
    fclose($file);
}

function trip_table()
{
    // global $car;
    // print_r($_SESSION["trips"]);
?>
    <h1 class="app-page-title mt-4 mb-2 display-4 fw-bold"><?= $_SESSION["language"]["road-trip-history-table-title"] ?></h1>
    <!--//row-->
    <div class="table-responsive">
        <table class="table table-striped app-table-hover table-strip mb-0 text-left">
            <thead>
                <tr class="table-active">
                    <th class="cell text-center col-1">#</th>
                    <th class="cell col-auto"><?= $_SESSION["language"]["road-trip-history-table-trip"] ?></th>
                    <th class="cell col text-center"><?= $_SESSION["language"]["road-trip-history-table-map"] ?></th>
                    <th class="cell col text-center"><a href="?act=add" target="_top" class="link-primary fs-bold fs-5" alt="Add"><i class="bi bi-bookmark-plus-fill"></i></a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION["trips"])) {
                    $x = 1;
                    foreach ($_SESSION["trips"] as $trip) {
                ?>
                        <tr>
                            <td class="cell text-center"><?= $x ?></td>
                            <td class="cell"><?= $trip["name"] ?></td>
                            <td class="cell col-auto text-center"><a href="<?= $trip["link"] ?>" target="_blank"><i class="bi bi-map"></i></a></td>
                            <td class="cell col-auto text-center"><a href="?act=del&x=<?= $x ?>" target="_top" class="link-danger"><i class="bi bi-trash"></i></a></td>
                        </tr>
                <?php $x++;
                    }
                } ?>

            </tbody>
        </table>
    </div>
<?php
}

function trip_log_table()
{
    // global $car;
    // print_r(end($_SESSION["trip_logs"]));
?>
    <h1 class="app-page-title mt-4 mb-2 display-4 fw-bold"><?= $_SESSION["language"]["trip-recording"] ?></h1>
    <!--//row-->
    <div class="table-responsive">
        <table class="table table-striped app-table-hover table-strip mb-0 text-left">
            <thead>
                <tr class="table-active">
                    <th class="cell text-center col-1">#</th>
                    <th class="cell col-auto"><?= $_SESSION["language"]["road-trip-logs-table-location"] . "<br>" . $_SESSION["language"]["road-trip-logs-table-datetime"] ?></th>
                    <!-- <th class="cell col-auto text-center"><? //= $_SESSION["language"]["road-trip-logs-table-location"] 
                                                                ?></th> -->
                    <th class="cell col-auto text-start"><?= $_SESSION["language"]["road-trip-logs-table-batt"] . "<br>" . $_SESSION["language"]["road-trip-logs-table-range"] . "<br>" . $_SESSION["language"]["road-trip-logs-table-odo"] ?></th>
                    <!-- <th class="cell col text-center"><? //= $_SESSION["language"]["road-trip-logs-table-range"] 
                                                            ?></th>
                    <th class="cell col text-center"><? //= $_SESSION["language"]["road-trip-logs-table-odo"] 
                                                        ?></th> -->
                    <th class="cell col text-start"><?= $_SESSION["language"]["road-trip-logs-table-energy"] . "<br>" . $_SESSION["language"]["road-trip-logs-table-mode"] ?></th>
                    <!-- <th class="cell col text-center"><? //= $_SESSION["language"]["road-trip-logs-table-mode"] 
                                                            ?></th> -->
                    <th class="cell col text-center"><?= "Used / Range / Kw:100Km" ?></th>
                    <!-- <th class="cell col text-center"><a href="?act=add" target="_top" class="link-primary fs-bold fs-5" alt="Add"><i class="bi bi-bookmark-plus-fill"></i></a></th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION["trip_logs"])) {
                    $x = 1;
                    // foreach (array_reverse($_SESSION["trip_logs"]) as $trip) {
                    foreach (array_reverse($_SESSION["trip_logs"]) as $trip) {
                ?>
                        <tr>
                            <td class="cell text-center"><?= $x ?></td>
                            <td class="cell"><?= "<strong>" . $trip["location"] . "</strong>" . "<br>" . "<span style='font-size: 0.8em;'>" . $trip["date"] . "<br>" . $trip["time"] . " น." . "</span>" ?></td>
                            <!-- <td class="cell text-center"><? //= $trip["location"] 
                                                                ?></td> -->
                            <td class="cell text-start"><?= "Batt: " . $trip["batt"] . " %<br>Range: " . $trip["range"] . " Km<br>ODO: " . number_format($trip["odo"], 0) . " Km" ?></td>
                            <!-- <td class="cell text-center"><? //= $trip["range"] 
                                                                ?></td> -->
                            <!-- <td class="cell text-center"><? //= $trip["odo"] 
                                                                ?></td> -->
                            <td class="cell text-start"><?= $trip["energy"] . "<br>" . $trip["mode"] ?></td>
                            <!-- <td class="cell text-center"><? //= $trip["mode"] 
                                                                ?></td> -->
                            <?php if (isset($trip["used_percent"])) { ?>
                                <td class="cell text-center"><?= $trip["used_percent"] . " % / " . number_format($trip["used_kw"], 2) . " Kw" . "<br>" . $trip["used_km"] . "Km" . "<br>" . number_format($trip["used_100"], 2) . " Kw"; ?></td>
                            <?php } else { ?>
                                <td class="cell text-center">-</td>
                            <?php } ?>
                            <!-- <td class="cell col-auto text-center"><a href="?act=del&x=<?= $x ?>" target="_top" class="link-danger d-none"><i class="bi bi-trash"></i></a></td> -->
                        </tr>
                <?php
                        if ($x >= 20) {
                            break;
                        } else {
                            $x++;
                        }
                    }
                } ?>

            </tbody>
        </table>
    </div>
<?php
}

function trip_range_table()
{
    // global $car;
?>
    <h1 class="app-page-title mt-5 mb-2 display-4 fw-bold"><?= $_SESSION["language"]["road-trip-range-title"] ?></h1>
    <!--//row-->
    <div class="table-responsive">
        <table class="table table-striped app-table-hover table-strip mb-0 text-left">
            <thead>
                <tr class="table-active">
                    <th class="cell text-center"><?= $_SESSION["language"]["road-trip-range-percent"] ?></th>
                    <th class="cell text-center"><?= $_SESSION["language"]["road-trip-range-kw"] ?></th>
                    <th class="cell text-center"><?= $_SESSION["language"]["road-trip-range-km"] ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 10; $i <= 100; $i += 10) {
                ?>
                    <tr<?php if ($i <= 20) {
                            echo ' class="table-danger text-danger fw-bold"';
                        } ?>>
                        <td class="cell text-center"><?= number_format($i, 0) ?></td>
                        <td class="cell text-center"><?= number_format((($i * $_SESSION["car"]["batt_capacity"]) / 100), 2) ?></td>
                        <td class="cell text-center"><?= number_format((($i * $_SESSION["car"]["range_est"]) / 100), 0) ?></td>
                        </tr>
                    <?php } ?>

            </tbody>
        </table>
    </div>
<?php
}


function read_member_list_data($fp)
{
    // $fp = "profile/" . $fp;
    // echo $fp;
    if (file_exists($fp)) {
        $file = fopen($fp, "r");
        $json_text = fread($file, filesize($fp));
        fclose($file);

        // echo "<h3>array:</h3><hr>";
        $json_text = json_decode($json_text, true);
        // print_r($json_text);

        // extract($json_text);
        return $json_text;
    }
}

function write_member_list_data($fp, $json_text)
{
    // $fp = "profile/" . $fp;

    // $json_text = json_encode($json_text);

    $file = fopen($fp, "w");
    fwrite($file, $json_text);
    fclose($file);
}

function member_table()
{
    global $car;
    // print_r($_SESSION["member_list"]);
?>
    <h1 class="app-page-title mt-4 mb-2 display-4 fw-bold">Member List</h1>
    <!--//row-->
    <div class="table-responsive">
        <table class="table table-striped app-table-hover table-strip mb-0 text-left">
            <thead>
                <tr class="table-active">
                    <th class="cell text-center col-1">#</th>
                    <th class="cell col-2 text-center">Avatar</th>
                    <th class="cell col-auto">Member Info</th>
                    <th class="cell col-1 text-center"><a href="?act=add" target="_top" class="link-primary fs-bold fs-5" alt="Add"><i class="bi bi-person-plus-fill"></i></a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION["member_list"])) {
                    $x = 1;
                    foreach ($_SESSION["member_list"] as $mem) {
                        // if ($x > 20) {
                        //     break;
                        // }
                ?>
                        <tr>
                            <td class="cell text-center"><?= $x ?></td>
                            <td class="cell text-center"><img src="<?= 'profile/' . $mem["avatar"] ?>" class="img-thumbnail" style="max-width: 80px"></td>
                            <td class="cell<?php if (isset($_GET["q"]) && $_GET["q"] == $mem["username"]) {
                                                echo ' fw-bold text-info';
                                            } ?>" style="font-size: 0.8em; cursor:pointer;" onclick="window.open('?act=edit&x=<?= $x ?>','_top');"><?= $mem["username"] ?><br><?= $mem["password"] ?><br><?= $mem["profile"] ?></td>
                            <td class="cell text-center"><a href="?act=del&x=<?= $x ?>" target="_top" class="link-danger fw-bold"><i class="bi bi-person-x"></i></a></td>
                        </tr>
                <?php $x++;
                    }
                } ?>

            </tbody>
        </table>
    </div>
<?php
}

function charge_calculation($charge, $method, $val)
{
    global $charge_type, $ev_station_err_min, $ev_station_err_km, $ev_station_err_kwh, $ev_station_err_batt;

    write_logs($_SESSION["member"]["email"], 'EV Station', $val . ' ' . $method);

    // $min = ceil($charge[$type]["min"]) . ' - ' . ceil($charge[$type]["min"] + ($charge[$type]["min"] * ($ev_station_err_min / 100)));
    if ($method == strtolower($_SESSION["language"]["ev-station-btn-min"])) {
        // $val = $val - ($val * ($ev_station_err_min / 100));
        $min = $_GET['chargeval'];
        foreach ($charge_type as $type) {
            $charge[$type]["min"]  = $min;
            if (intval($type) > 80) {
                $charge[$type]["kwh"] = ($val) * (80 / 60);
            } else {
                $charge[$type]["kwh"] = ($val) * (intval($type) / 60);
            }
            $charge[$type]["batt"] = number_format(($charge[$type]["kwh"] * 100) / $_SESSION["car"]["batt_capacity"], 2);
            if ($charge[$type]["batt"] > 100) {
                $charge[$type]["batt"] = 100.00;
            }
            $charge[$type]["range"] = number_format((($charge[$type]["batt"] / 100) * $_SESSION["car"]["range_est"]), 0);
            $charge[$type]["kwh"] = number_format(($charge[$type]["kwh"] - ($charge[$type]["kwh"] * (intval($ev_station_err_min) / 100))), 0) . ' - ' . number_format($charge[$type]["kwh"], 0);
            $charge[$type]["batt"] = number_format(($charge[$type]["batt"]) - ($charge[$type]["batt"] * (intval($ev_station_err_min) / 100)), 0) . ' - ' . number_format($charge[$type]["batt"], 0);
            $charge[$type]["range"] = floor(($charge[$type]["range"]) - ($charge[$type]["range"] * (intval($ev_station_err_km) / 100))) . ' - ' . floor($charge[$type]["range"]);
        }
    } else if ($method == strtolower($_SESSION["language"]["ev-station-btn-kwh"])) {
        if ($val > $_SESSION["car"]["batt_capacity"]) {
            $val = $_SESSION["car"]["batt_capacity"];
        }
        foreach ($charge_type as $type) {
            $charge[$type]["kwh"]  = $val;
            if (intval($type) > 80) {
                $charge[$type]["min"] = number_format($val / (80 / 60), 2);
            } else {
                $charge[$type]["min"] = number_format($val / (intval($type) / 60), 2);
            }
            $charge[$type]["batt"] = number_format(($val * 100) / $_SESSION["car"]["batt_capacity"], 2);
            $charge[$type]["range"] = number_format((($charge[$type]["batt"] / 100) * $_SESSION["car"]["range_est"]), 2);
            $charge[$type]["min"] = ceil($charge[$type]["min"]) . ' - ' . ceil($charge[$type]["min"] + ($charge[$type]["min"] * ($ev_station_err_min / 100)));
            $charge[$type]["batt"] = number_format($charge[$type]["batt"], 0) . ' - ' . number_format(($charge[$type]["batt"]) + ($charge[$type]["batt"] * (intval($ev_station_err_batt) / 100)), 0);
            $charge[$type]["range"] = floor(($charge[$type]["range"]) - ($charge[$type]["range"] * (intval($ev_station_err_km) / 100))) . ' - ' . floor($charge[$type]["range"]);
        }
    } else if ($method == strtolower($_SESSION["language"]["ev-station-btn-km"])) {
        if ($val > $_SESSION["car"]["range_est"]) {
            $val = $_SESSION["car"]["range_est"];
        }
        foreach ($charge_type as $type) {
            $charge[$type]["range"]  = $val;
            $charge[$type]["batt"] = number_format(($val / $_SESSION["car"]["range_est"]) * 100, 2);
            $charge[$type]["kwh"] = number_format(($charge[$type]["batt"] * $_SESSION["car"]["batt_capacity"]) / 100, 2);
            if (intval($type) > 80) {
                $charge[$type]["min"] = number_format($charge[$type]["kwh"] / (80 / 60), 2);
            } else {
                $charge[$type]["min"] = number_format($charge[$type]["kwh"] / (intval($type) / 60), 2);
            }
            $charge[$type]["min"] = ceil($charge[$type]["min"]) . ' - ' . ceil($charge[$type]["min"] + ($charge[$type]["min"] * ($ev_station_err_min / 100)));
            $charge[$type]["kwh"] = number_format($charge[$type]["kwh"], 0) . ' - ' . number_format(($charge[$type]["kwh"] + ($charge[$type]["kwh"] * (intval($ev_station_err_kwh) / 100))), 0);
            $charge[$type]["batt"] = number_format($charge[$type]["batt"], 0) . ' - ' . number_format(($charge[$type]["batt"]) + ($charge[$type]["batt"] * (intval($ev_station_err_batt) / 100)), 0);
        }
    } else if ($method == strtolower($_SESSION["language"]["ev-station-btn-batt"])) {
        if ($val > 100) {
            $val = 100;
        }
        foreach ($charge_type as $type) {
            $charge[$type]["batt"]  = $val;
            $charge[$type]["kwh"] = ($charge[$type]["batt"] * $_SESSION["car"]["batt_capacity"]) / 100;
            if (intval($type) > 80) {
                $charge[$type]["min"] = number_format($charge[$type]["kwh"] / (80 / 60), 2);
            } else {
                $charge[$type]["min"] = number_format($charge[$type]["kwh"] / (intval($type) / 60), 2);
            }
            $charge[$type]["range"] = number_format((($charge[$type]["batt"] / 100) * $_SESSION["car"]["range_est"]), 2);
            $charge[$type]["range"] = floor(($charge[$type]["range"]) - ($charge[$type]["range"] * (intval($ev_station_err_km) / 100))) . ' - ' . floor($charge[$type]["range"]);
            $charge[$type]["min"] = ceil($charge[$type]["min"]) . ' - ' . ceil($charge[$type]["min"] + ($charge[$type]["min"] * ($ev_station_err_min / 100)));
        }
    }

    $_GET["chargeval"] = $val;

    return $charge;
}

function ev_station_rate($method = 'min', $val)
{
    global $car;

?>

    <h1 class="app-page-title mt-4 mb-1"><?= $_SESSION["language"]["ev-station-rate-title"] ?></h1>
    <h2 class="mb-3 fs-6">(<?= $_SESSION["language"]["ev-station-rate-subtitle"] ?> : DC 80 <?= $_SESSION["language"]["kwh"] ?> : <?= $val ?> <?= $_SESSION["language"]["min"] ?>)</h2>
    <?php
    $kwm = 80 / 60;
    ?>
    <!--//row-->
    <div class="table-responsive">
        <table class="table table-striped app-table-hover table-strip mb-0 text-left">
            <thead>
                <tr class="table-active">
                    <th class="cell"><?= $_SESSION["language"]["ev-station-rate-name"] ?></th>
                    <th class="cell"><?= $_SESSION["language"]["ev-station-rate-place"] ?></th>
                    <th class="cell text-center">On Peak</th>
                    <th class="cell text-center">Off Peak</th>
                    <th class="cell text-center">Cost P</th>
                    <th class="cell text-center">Cose OP</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="cell">Elexa by EGAT</td>
                    <td class="cell">PT</td>
                    <td class="cell text-center"><?= number_format(7.5, 4) ?></td>
                    <td class="cell text-center"><?= number_format(7.5, 4) ?></td>
                    <td class="cell text-center"><?= number_format(7.5 * $kwm * $val, 2) ?></td>
                    <td class="cell text-center"><?= number_format(7.5 * $kwm * $val, 2) ?></td>
                </tr>
                <tr>
                    <td class="cell text-primary fw-bold">PEA Volta</td>
                    <td class="cell">Bang Jak</td>
                    <td class="cell text-center"><?= number_format(6.9, 4) ?></td>
                    <td class="cell text-center"><?= number_format(4.5, 4) ?></td>
                    <td class="cell text-center"><?= number_format(6.9 * $kwm * $val, 2) ?></td>
                    <td class="cell text-center text-primary fw-bold"><?= number_format(4.5 * $kwm * $val, 2) ?></td>
                </tr>
                <tr>
                    <td class="cell text-primary fw-bold">EV Station</td>
                    <td class="cell">PTT</td>
                    <td class="cell text-center"><?= number_format(7.5, 4) ?></td>
                    <td class="cell text-center"><?= number_format(4.5, 4) ?></td>
                    <td class="cell text-center"><?= number_format(7.5 * $kwm * $val, 2) ?></td>
                    <td class="cell text-center text-primary fw-bold"><?= number_format(4.5 * $kwm * $val, 2) ?></td>
                </tr>
                <tr>
                    <td class="cell">EA Anywhere</td>
                    <td class="cell">Caltex</td>
                    <td class="cell text-center"><?= number_format(7.7, 4) ?></td>
                    <td class="cell text-center"><?= number_format(7.7, 4) ?></td>
                    <td class="cell text-center"><?= number_format(7.7 * $kwm * $val, 2) ?></td>
                    <td class="cell text-center"><?= number_format(7.7 * $kwm * $val, 2) ?></td>
                </tr>
                <tr>
                    <td class="cell text-primary fw-bold">Evolt</td>
                    <td class="cell"></td>
                    <td class="cell text-center"><?= number_format(1.34, 4) ?></td>
                    <td class="cell text-center"><?= number_format(1.34, 4) ?></td>
                    <td class="cell text-center text-primary fw-bold"><?= number_format(1.34 * $val, 2) ?></td>
                    <td class="cell text-center text-primary fw-bold"><?= number_format(1.34 * $val, 2) ?></td>
                </tr>
                <tr>
                    <td class="cell">Sharge</td>
                    <td class="cell"></td>
                    <td class="cell text-center"><?= number_format(7.5, 4) ?></td>
                    <td class="cell text-center"><?= number_format(7.5, 4) ?></td>
                    <td class="cell text-center"><?= number_format(7.5 * $kwm * $val, 2) ?></td>
                    <td class="cell text-center"><?= number_format(7.5 * $kwm * $val, 2) ?></td>
                </tr>
            </tbody>
        </table>
    </div>

<?php
}


?>