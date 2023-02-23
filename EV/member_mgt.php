<!DOCTYPE html>
<html lang="en">
<?php
include('core.php');

if (isset($_GET["act"]) && $_GET["act"] == 'del' && isset($_GET["x"])) {
    array_splice($_SESSION["member_list"], ($_GET["x"] - 1), 1);
    $json_text = '';
    foreach ($_SESSION["member_list"] as $mem) {
        if ($json_text) {
            $json_text .= ',
            ';
        }
        $json_text .= '{
            "username": "' . $mem["username"] . '",
            "password": "' . $mem["password"] . '",
            "profile": "' . $mem["profile"] . '",
            "avatar": "' . $mem["avatar"] . '"
        }';
    }
    $json_text = '[' . $json_text . ']';
    // echo $json_text;
    write_member_list_data('member.txt', $json_text);
    // $_SESSION["member_list"] = read_member_list_data('member.txt');
    echo '<meta http-equiv="refresh" content="0;url=member_mgt.php?act=alert&sms=member del completed">';
}

if (isset($_POST["fst"]) && $_POST["fst"] == 'update' && isset($_POST["x"])) {
    // array_splice($_SESSION["member_list"], ($_GET["x"] - 1), 1);
    $json_text = '';
    $x = 1;
    foreach ($_SESSION["member_list"] as $mem) {
        if ($json_text) {
            $json_text .= ',
            ';
        }
        if ($_POST["x"] == $x) {
            $json_text .= '{
        "username": "' . $_POST["email"] . '",
        "password": "' . $_POST["password"] . '",
        "profile": "' . $_POST["profile"] . '",
        "avatar": "' . $_POST["avatar"] . '"
    }';
        } else {
            $json_text .= '{
            "username": "' . $mem["username"] . '",
            "password": "' . $mem["password"] . '",
            "profile": "' . $mem["profile"] . '",
            "avatar": "' . $mem["avatar"] . '"
        }';
        }
        $x++;
    }
    $json_text = '[' . $json_text . ']';
    // echo $json_text;
    write_member_list_data('member.txt', $json_text);
    // $_SESSION["member_list"] = read_member_list_data('member.txt');
    echo '<meta http-equiv="refresh" content="0;url=member_mgt.php?act=alert&sms=member update completed">';
}

if (isset($_POST["fst"]) && $_POST["fst"] == 'append' && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["profile"]) && isset($_POST["avatar"])) {
    $json_text = '';
    foreach ($_SESSION["member_list"] as $mem) {
        if ($json_text) {
            $json_text .= ',
            ';
        }
        $json_text .= '{
            "username": "' . $mem["username"] . '",
            "password": "' . $mem["password"] . '",
            "profile": "' . $mem["profile"] . '",
            "avatar": "' . $mem["avatar"] . '",
            "language": "' . $mem["language"] . '"
        }';
    }
    $json_text .= ',
    {
        "username": "' . $_POST["email"] . '",
            "password": "' . $_POST["password"] . '",
            "profile": "' . $_POST["profile"] . '",
            "avatar": "' . $_POST["avatar"] . '",
            "language": "th"
    }';
    $json_text = '[' . $json_text . ']';
    echo "<hr><br>";
    echo $json_text;
    write_member_list_data('member.txt', $json_text);
    // $_SESSION["member_list"] = read_member_list_data('member.txt');
    die();
    echo '<meta http-equiv="refresh" content="0;url=member_mgt.php?act=alert&sms=member add completed">';
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
            <?php if (isset($_GET["act"]) && $_GET["act"] == "add") { ?>
                <div class="container-xl">
                    <h1 class="app-page-title">Member Add</h1>
                    <!--//app-card-->
                    <form action="member_mgt.php" method="post">
                        <div class="col-12">
                            <div class="app-card app-card-basic shadow-sm">
                                <div class="app-card-header p-3 border-bottom-0">
                                    <div class="form-group mb-3">
                                        <label for="email">E-Mail</label>
                                        <input type="text" class="form-control" name="email" id="email" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" name="password" id="password" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="profile">Profile</label>
                                        <input type="text" class="form-control" name="profile" id="profile" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="avatar">Avatar</label>
                                        <input type="text" class="form-control" name="avatar" id="avatar" value="nobody.png" required>
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
            <?php } else if (isset($_GET["act"]) && $_GET["act"] == "edit" && isset($_GET["x"])) {
                $mem = $_SESSION["member_list"][($_GET["x"] - 1)];
                // echo '<pre>Mem';
                // print_r($mem);
                // echo '</pre>';
            ?>
                <div class="container-xl">
                    <h1 class="app-page-title">Member Update</h1>
                    <!--//app-card-->
                    <form action="member_mgt.php" method="post">
                        <div class="col-12">
                            <div class="app-card app-card-basic shadow-sm">
                                <div class="app-card-header p-3 border-bottom-0">
                                    <div class="form-group mb-3">
                                        <label for="email">E-Mail</label>
                                        <input type="text" class="form-control" name="email" id="email" value="<?= $mem["username"] ?>" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" name="password" id="password" value="<?= $mem["password"] ?>" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="profile">Profile</label>
                                        <input type="text" class="form-control" name="profile" id="profile" value="<?= $mem["profile"] ?>" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="avatar">Avatar</label>
                                        <input type="text" class="form-control" name="avatar" id="avatar" value="<?= $mem["avatar"] ?>" required>
                                    </div>
                                    <div class="form-group mb-3 text-center">
                                        <input type="hidden" name="fst" value="update">
                                        <input type="hidden" name="x" value="<?= $_GET["x"] ?>">
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
                $_SESSION["member_list"] = read_member_list_data('member.txt');

                // echo '<pre>MEMBER';
                // print_r($_SESSION["member_list"]);
                // echo '</pre>';

                member_table();
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