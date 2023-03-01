<!DOCTYPE html>
<html lang="en">
<?php
require('core.php');
if (!isset($_SESSION["member"]) || !isset($_SESSION["member"]["language"])) {
    header("location:index.php");
}
debug_console("member", $_SESSION["member"]);

if (isset($_POST["update"]) && $_POST["update"] == $_SESSION["language"]["setting-btn-save"]) {
    // print_r($_POST);
    // die();
    if ($_POST["car_model"] == "Standard Range") {
        $batt_capacity = "49.92";
        $range_nedc = "410";
        $range_wltp = "359";
        $range_eap = "320";
        $car_engine = "150";
        $car_horsep = "201";
    } else {
        $batt_capacity = "60.48";
        $range_nedc = "480";
        $range_wltp = "420";
        $range_eap = "375";
        $car_engine = "150";
        $car_horsep = "201";
    }

    // print_r($_POST);
    $color_name = $byd_color_ordering[$_POST["car_pic"]]["color_name"];
    $color_pic = $byd_color_ordering[$_POST["car_pic"]]["color_pic"];
    $json_text = '{"car_model":"' . $_POST["car_model"] . '","car_id":"' . $_POST["car_pic"] . '","car_color":"' . $color_name . '","car_pic":"' . $color_pic . '",
        "batt_capacity":"' . $batt_capacity . '","range_nedc":"' . $range_nedc . '","range_wltp":"' . $range_wltp . '","range_eap":"' . $range_eap . '"';
    $json_text .= ',"car_engine":"' . $_POST["car_engine"] . '","car_horsep":"' . $_POST["car_horsep"] . '","car_plug_kw":"' . $_POST["car_plug_kw"] . '","car_plug":"' . $_POST["car_plug"] . '"';
    $json_text .= ',"range_est":"' . $_POST["range_est"] . '","batt_using":"' . $_POST["batt_using"] . '","home_charger_p":"' . $_POST["home_charger_p"] . '","home_charger_op":"' . $_POST["home_charger_op"] . '"}';
    // $json_text = '{"car_model":"' . $_POST["car_model"] . '","car_id":"' . $_POST["car_pic"] . '","car_color":"' . $color_name . '","car_pic":"' . $color_pic . '","batt_capacity":"' . $_POST["batt_capacity"] . '","range_nedc":"' . $_POST["range_nedc"] . '","range_wltp":"' . $_POST["range_wltp"] . '","range_eap":"' . $_POST["range_eap"] . '"';
    // $json_text .= ',"car_engine":"' . $_POST["car_engine"] . '","car_horsep":"' . $_POST["car_horsep"] . '","car_plug_kw":"' . $_POST["car_plug_kw"] . '","car_plug":"' . $_POST["car_plug"] . '"';
    // $json_text .= ',"range_est":"' . $_POST["range_est"] . '","batt_using":"' . $_POST["batt_using"] . '","home_charger_p":"' . $_POST["home_charger_p"] . '","home_charger_op":"' . $_POST["home_charger_op"] . '"}';

    write_logs($_SESSION["member"]["email"], 'Setting Update', "completed");

    // echo $json_text;
    write_default_config($_SESSION["member"]["profile"] . '.txt', $json_text);
    $_SESSION["car"] = read_default_config($_SESSION["member"]["profile"] . '.txt');
    header("location:setting.php");
    die();
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
                <?php  // print_r($_SESSION["car"]); 
                ?>

                <h1 class="app-page-title"><?= $_SESSION["language"]["setting-title"] ?></h1>
                <!--//app-card-->
                <form action="?" method="POST">
                    <div class="row g-4 mb-4">

                        <div class="col-12">
                            <div class="app-card app-card-basic shadow-sm">
                                <div class="app-card-header p-3 border-bottom-0">
                                    <div class="row g-3 d-flex justify-content-center">
                                        <?php
                                        $x = 0;
                                        foreach ($byd_color_ordering as $byd_color) {
                                        ?>
                                            <div class="col-12 col-lg-4 form-group mb-3 ms-5 ms-lg-0">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="<?= $x ?>" name="car_pic" id="color_<?= $byd_color["color_name"] ?>" style="cursor: pointer;" <?php if (isset($_SESSION["car"]) && $_SESSION["car"]["car_id"] == $x) {
                                                                                                                                                                                                            echo ' checked';
                                                                                                                                                                                                        } ?> required>
                                                    <label class="form-check-label ms-5 ms-lg-2" for="color_<?= $byd_color["color_name"] ?>" style="cursor: pointer;">
                                                        <img src="<?= 'assets/images/car/' . $byd_color["color_pic"] ?>" class="img-responsive w-75" style="min-width: 200px; max-width: 260px;">
                                                        <h6 class="mt-3 ms-5"><?= $byd_color["color_name"] ?></h6>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php
                                            $x++;
                                        }
                                        ?>
                                        <!--//col-->
                                    </div>
                                    <!--//row-->
                                </div>
                                <!--//app-card-header-->
                            </div>
                            <!--//app-card-->
                        </div>

                        <div class="col-12 col-md-4 mx-auto">
                            <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                                <div class="app-card-header p-3 border-bottom-0">
                                    <div class="row">
                                        <div class="form-group mb-3">
                                            <label for="range_est"><?= $_SESSION["language"]["setting-model"] ?> <span class="text-danger">*</span></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="car_model" id="car_model1" value="Extended Range" <?php if ($_SESSION["car"]["car_model"] == "Extended Range") {
                                                                                                                                                            echo ' checked';
                                                                                                                                                        } ?> onclick="select_ext_range()">
                                                <label class="form-check-label" for="car_model1">
                                                    Extended Range (NEDC: 480 / WLTP: 420)
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="car_model" id="car_model2" value="Standard Range" <?php if ($_SESSION["car"]["car_model"] == "Standard Range") {
                                                                                                                                                            echo ' checked';
                                                                                                                                                        } ?> onclick="select_std_range()">
                                                <label class="form-check-label" for="car_model2">
                                                    Standard Range (NEDC: 400 / WLTP: 320)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="range_est"><?= $_SESSION["language"]["setting-range-estimate"] ?> <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control text-center" name="range_est" id="range_est" value="<?php if (isset($_SESSION["car"])) {
                                                                                                                                                echo $_SESSION["car"]["range_est"];
                                                                                                                                            } else {
                                                                                                                                                echo '420';
                                                                                                                                            } ?>" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="batt_using"><?= $_SESSION["language"]["setting-range-maximum"] ?> <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control text-center" name="batt_using" id="batt_using" value="<?php if (isset($_SESSION["car"])) {
                                                                                                                                                echo $_SESSION["car"]["batt_using"];
                                                                                                                                            } else {
                                                                                                                                                echo '330';
                                                                                                                                            } ?>" required>
                                        </div>
                                        <script>
                                            function select_ext_range() {
                                                document.getElementById("range_est").value = 420;
                                                document.getElementById("batt_using").value = 420;
                                            }
                                            function select_std_range() {
                                                document.getElementById("range_est").value = 320;
                                                document.getElementById("batt_using").value = 320;
                                            }
                                        </script>
                                        <div class="form-group mb-3 mt-5 text-center w-100">
                                            <input type="hidden" name="username" value="umnarj">
                                            <input type="hidden" name="filename" value="umnarj.txt">
                                            <input type="hidden" name="home_charger_p" value="<?= $home_charger_p ?>">
                                            <input type="hidden" name="home_charger_op" value="<?= $home_charger_op ?>">
                                            <input type="hidden" name="car_plug_kw" value="80">
                                            <!-- <input type="hidden" name="car_model" value="BYD ATTO 3"> -->
                                            <!-- <input type="hidden" name="car_pic" value="byd_atto_3.png"> -->
                                            <!-- <input type="hidden" name="batt_capacity" value="60.48">
                                            <input type="hidden" name="range_nedc" value="480">
                                            <input type="hidden" name="range_wltp" value="420">
                                            <input type="hidden" name="range_eap" value="375"> -->
                                            <input type="hidden" name="car_engine" value="150">
                                            <input type="hidden" name="car_horsep" value="201">
                                            <input type="hidden" name="car_plug" value="AC Type 2 / DC CCS 2">
                                            <input type="submit" class="btn btn-primary py-2 px-5 w-75 mx-auto" name="update" value="<?= $_SESSION["language"]["setting-btn-save"] ?>">
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
                </form>



                <?php //read_default_config(); 
                ?>
                <?php //write_default_config(); 
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
    <!-- <script src="assets/plugins/chart.js/chart.min.js"></script>
    <script src="assets/js/index-charts.js"></script> -->

    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

</body>

</html>