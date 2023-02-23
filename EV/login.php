<!DOCTYPE html>
<html lang="en">
<?php
require('core.php');

if (isset($_GET["act"]) && $_GET["act"] == "signout") {
    // update profile language
    $member = read_member_list_data('member.txt');
    $json_text = '';
    foreach ($member as $mem) {
        if ($json_text) {
            $json_text .= ',
            ';
        }
        if ($mem["username"] == $_SESSION["member"]["email"]) {
            $json_text .= '{
                "username": "' . $mem["username"] . '",
                "password": "' . $mem["password"] . '",
                "profile": "' . $mem["profile"] . '",
                "avatar": "' . $mem["avatar"] . '",
                "language": "' . $_SESSION["member"]["language"] . '"
            }';
        } else {
            $json_text .= '{
            "username": "' . $mem["username"] . '",
            "password": "' . $mem["password"] . '",
            "profile": "' . $mem["profile"] . '",
            "avatar": "' . $mem["avatar"] . '",
            "language": "' . $mem["language"] . '"
        }';
        }
    }
    $json_text = '[' . $json_text . ']';
    // echo $json_text;
    write_member_list_data('member.txt', $json_text);

    write_logs($_SESSION["member"]["email"], 'sign out', 'completed');
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    header("location:login.php");
    die();
}

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';


if (isset($_POST["sign_email"]) && isset($_POST["sign-password"])) {
    // require('member.php');
    $member = read_member_list_data('member.txt');
    $user_language = null;
    foreach ($member as $mem) {
        if ($mem["username"] == $_POST["sign_email"] && $mem["password"] == $_POST["sign-password"]) {
            $user_profile = $mem["profile"];
            $user_avatar = $mem["avatar"];
            $user_language = $mem["language"];
        }
    }
    if (!$user_language || $user_language == "") {
        $user_language = "th";
    }
    if (isset($user_profile) && $user_profile != "") {
        echo " found<br>";
        if (isset($_POST["RememberPassword"]) && $_POST["RememberPassword"] == 'remember') {
            setcookie("byd_email", $_POST["sign_email"], time() + (3600 * 7)); // day * 7
            setcookie("byd_password", $_POST["sign-password"], time() + (3600 * 7));
            echo "cookie set<br>";
            echo $_COOKIE["byd_email"] . " / " . $_COOKIE["byd_password"];
        } else {
            setcookie("byd_email");
            setcookie("byd_password");
        }
        $_SESSION["member"]["email"] = $_POST["sign_email"];
        $_SESSION["member"]["profile"] = $user_profile;
        $_SESSION["member"]["avatar"] = $user_avatar;
        $_SESSION["member"]["language"] = $user_language;
        // $_SESSION["car"] = read_default_config($user_profile . ".txt");

        // echo '<pre>';
        // print_r($_SESSION["member"]);
        // echo '</pre>';
        // echo '<pre>';
        // print_r($_SESSION["car"]);
        // echo '</pre>';

        write_logs($_POST["sign_email"], 'sign in', 'completed');-

        // header("location:index.php");
        header("location:trip_recording.php?act=add");
        die();
    } else {
        write_logs($_POST["sign_email"], 'sign in', 'failed');
        echo 'member not found';
    }
} else {
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
}


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

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-5"><img class="logo-icon me-2" src="assets/images/icon/icon-128.png" alt="logo"></div>
                    <h2 class="auth-heading text-center mb-5">Log in to BYD ATTO 3</h2>
                    <div class="auth-form-container text-start">
                        <form class="auth-form login-form" action="login.php?act=sign" method="POST">
                            <div class="email mb-3">
                                <label class="sr-only" for="sign_email">Email</label>
                                <input id="sign_email" name="sign_email" type="text" class="form-control sign_email" required="required" <?php
                                                                                                                                            if (isset($_COOKIE["byd_email"]) && $_COOKIE["byd_email"] != "") {
                                                                                                                                                echo ' value="' . $_COOKIE["byd_email"] . '"';
                                                                                                                                            } else {
                                                                                                                                                echo ' placeholder="Email address"';
                                                                                                                                            }
                                                                                                                                            if (isset($_GET["u"])) {
                                                                                                                                                echo ' value="' . $_GET["u"] . '"';
                                                                                                                                            }
                                                                                                                                            ?>>
                            </div>
                            <!--//form-group-->
                            <div class="password mb-3">
                                <label class="sr-only" for="sign-password">Password</label>
                                <input id="sign-password" name="sign-password" type="password" class="form-control sign-password" required="required" <?php
                                                                                                                                                        if (isset($_COOKIE["byd_password"]) && $_COOKIE["byd_password"] != "") {
                                                                                                                                                            echo ' value="' . $_COOKIE["byd_password"] . '"';
                                                                                                                                                        } else {
                                                                                                                                                            echo ' placeholder="Password"';
                                                                                                                                                        }
                                                                                                                                                        if (isset($_GET["tel"])) {
                                                                                                                                                            echo ' value="' . $_GET["tel"] . '"';
                                                                                                                                                        }
                                                                                                                                                        ?>>
                                <div class="extra mt-3 row justify-content-between">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="remember" name="RememberPassword" id="RememberPassword" <?php if (isset($_COOKIE["byd_email"]) && isset($_COOKIE["byd_password"])) {
                                                                                                                                                                echo ' checked';
                                                                                                                                                            } ?>>
                                            <label class="form-check-label" for="RememberPassword">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <!--//col-6-->
                                    <div class="col-6">
                                        <div class="forgot-password text-end">
                                            <a href="m.me/umnarj" target="_blank">Forgot password?</a>
                                        </div>
                                    </div>
                                    <!--//col-6-->
                                </div>
                                <!--//extra-->
                            </div>
                            <!--//form-group-->
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
                            </div>
                        </form>

                        <div class="auth-option text-center pt-5">No Account? Contact Admin <a class="text-link" href="https://m.me/umnarj" target="_blank">here</a>.</div>
                    </div>
                    <!--//auth-form-container-->

                </div>
                <!--//auth-body-->

                <div style="margin-top: 50px;"><?php require('footer.php'); ?></div>
                <!--//app-auth-footer-->
            </div>
            <!--//flex-column-->
        </div>
        <!--//auth-main-col-->
        <!--//auth-background-col-->

    </div>
    <!--//row-->


</body>

</html>