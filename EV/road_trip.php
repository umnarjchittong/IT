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

if (!isset($_SESSION["trips"])) {
    $_SESSION["trips"] = read_trip_data($_SESSION["member"]["profile"] . '-trip.txt');
}

if (isset($_GET["act"]) && $_GET["act"] == 'del' && isset($_GET["x"])) {
    $trip_name = $_SESSION["trips"][($_GET["x"] - 1)]["name"];
    array_splice($_SESSION["trips"], ($_GET["x"] - 1), 1);
    $json_text = '';
    foreach ($_SESSION["trips"] as $trip) {
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
    write_trip_data($fp = $_SESSION["member"]["profile"] . '-trip.txt', $json_text);
    $_SESSION["trips"] = read_trip_data($_SESSION["member"]["profile"] . '-trip.txt');
    echo '<meta http-equiv="refresh" content="0;url=road_trip.php?act=alert&sms=trip del completed">';
}

if (isset($_POST["trip_name"]) && isset($_POST["trip_link"])) {
    $json_text = '';
    foreach ($_SESSION["trips"] as $trip) {
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
    if ($json_text) {
        $json_text .= ',';
    }
    $json_text .= '
    {
        "name": "' . $_POST["trip_name"] . '",
        "link": "' . $_POST["trip_link"] . '",
        "location":{
            "place_1":"บ้าน",
            "place_2":"ปลายทาง"
        }
    }';
    $json_text = '[' . $json_text . ']';
    // echo "<hr><br>";
    // echo $json_text;
    write_logs($_SESSION["member"]["email"], 'Road Trip Add +', $_POST["trip_name"]);
    write_trip_data($_SESSION["member"]["profile"] . '-trip.txt', $json_text);
    $_SESSION["trips"] = read_trip_data($_SESSION["member"]["profile"] . '-trip.txt');
    echo '<meta http-equiv="refresh" content="0;url=road_trip.php?act=alert&sms=trip add completed">';
}



// $json_text = json_encode($_SESSION["trips"]);
// $json_text = str_replace("]", "", $json_text);
// $json_text .= ',{"name": "' . $_POST["trip_name"] . '","link": "' . $_POST["trip_link"] . '","location":{"place_1": "lo-abc","place_2": "lo2-abc"}}]';
// $json_text = json_encode($json_text);
// echo $json_text;

// write_trip_data($fp = 'umnarj-trip.txt', $json_text);
// $_SESSION["trips"] = read_trip_data();
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

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <?php if (isset($_GET["act"]) && $_GET["act"] == "add") { ?>
                <div class="container-xl">
                    <h1 class="app-page-title">Road Trip</h1>
                    <!--//app-card-->
                    <form action="road_trip.php" method="post">
                        <div class="col-12">
                            <div class="app-card app-card-basic shadow-sm">
                                <div class="app-card-header p-3 border-bottom-0">
                                    <div class="form-group mb-3">
                                        <label for="trip_name">Trip Name</label>
                                        <input type="text" class="form-control" name="trip_name" id="trip_name" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="trip_link">Trip Link</label>
                                        <input type="text" class="form-control" name="trip_link" id="trip_link" required>
                                    </div>
                                    <div class="form-group mb-3 text-center">
                                        <input type="hidden" name="fst" value="append">
                                        <input type="submit" class="btn btn-primary mt-3 px-5 text-white" name="update" value="SAVE">
                                        <a href="?" target="_top" class="btn btn-secondary ms-4 mt-3 px-5 mx-auto">CLOSE</a>
                                    </div>
                                    <!--//col-->
                                    <!--//row-->
                                </div>
                                <!--//app-card-header-->
                            </div>
                            <!--//app-card-->
                        </div>
                    </form>
                </div>
            <?php } ?>
            <div class="container-xl">

                <?php
                if (!isset($_SESSION["trips"])) {
                    $_SESSION["trips"] = read_trip_data($_SESSION["member"]["profile"] . '-trip.txt');
                }
                // echo '<pre>';
                // print_r($_SESSION["trips"]);
                // echo '</pre>';
                trip_table();
                ?>

                <?php trip_range_table(); ?>

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