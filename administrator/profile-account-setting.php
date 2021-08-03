<?php
session_start();
error_reporting(0);
include('../conf/config.php');
if (!isset($_SESSION['loggedin'])) {
    // Could not get the data that should have been sent.
    session_start();
    session_unset();
    session_destroy();
    // Redirect to the login page:
    header('Location: ../index.php');
} else {
    if ($_SESSION['privilege'] != '2') {
        session_start();
        session_unset();
        session_destroy();
        // Redirect to the login page:
        header('Location: ../index.php');
    }
}

$myid = $_SESSION['id'];
$query = mysqli_query($con, "Select * from users where id='$myid'");
if (!$query) {
    die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
} else {
    $data2 = mysqli_fetch_array($query);
    if ($data2 > 0) {
        $username = $data2['fname'];
        $usersurname = $data2['lname'];
        $useremail = $data2['email'];
        $acctype = $data2['acctype'];
        $profilephoto = $data2['photo'];
        $coverphoto = $data2['coverphoto'];
        $countrykey = $data2['countrykey'];
        $pofit = $data2['profit'];
        $gender = $data2['gender'];
        $phone = $data2['phone'];

        $last_space = strrpos($phone, ' ');
        $last_word = substr($phone, $last_space);
        $first_chunk = substr($phone, 0, $last_space);
        $second_chunk = substr($phone, $last_space + 1, strlen($phone));
    } else {
        echo "Hyrje e pa autorizuar";
        exit;
    }
}
//error_reporting($__error_reporting_level);
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Account setting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>

<body>
    <div class="wrapper">
    <header>
            <div class="container">

                <?php
                include("partials/header.php"); ?>
            </div>
        </header>
        <section class="profile-account-setting">
            <div class="container">
                <div class="account-tabs-setting">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="acc-leftbar">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-status-tab" data-toggle="tab" href="#nav-status" role="tab" aria-controls="nav-status" aria-selected="false"><i class="fa fa-line-chart"></i>Status</a>
                                    <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false"><i class="fa fa-lock"></i>Change Password</a>
                                    <a class="nav-item nav-link" id="nav-deactivate-tab" data-toggle="tab" href="#nav-deactivate" role="tab" aria-controls="nav-deactivate" aria-selected="false"><i class="fa fa-random"></i>Deactivate Account</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content" id="nav-tabContent">
                              
                                <div class="tab-pane fade active show" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab">
                                    <div class="acc-setting">
                                        <h3>Profile Status</h3>
                                        <div class="profile-bx-details">
                                            <div class="row">
                                            <div class="col-sm-12">
                                                            <div class="profile-bx-info">
                                                                <div class="pro-bx">
                                                                    <img src="images/pro-icon1.png" alt="">
                                                                    <div class="bx-info">
                                                                        <h3><?php
                                                                            if ($pofit == 0) {
                                                                                echo "Nothing to show.";
                                                                            } else {
                                                                                echo "&euro;" . htmlentities($pofit);
                                                                            }
                                                                            ?></h3>
                                                                        <h5>Total Income</h5>
                                                                    </div>
                                                                </div>
                                                                <p>Here you will see Total Income.</p>
                                                            </div>
                                                        </div>
                                               
                                               
                                            </div>
                                        </div>
                                        <div class="pro-work-status">

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                                    <div class="acc-setting">
                                        <h3>Account Setting</h3>
                                        <form id="pswchange-form" enctype="multipart/form-data" method="post" role="form">
                                            <div class="cp-field">
                                                <h5>Old Password</h5>
                                                <div class="cpp-fiel">
                                                    <input type="password" name="old-password" id="old-password" placeholder="Old Password">
                                                    <i class="fa fa-lock"></i>
                                                    <span id="OldPasworderror" style="color: red;"></span>

                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>New Password</h5>
                                                <div class="cpp-fiel">
                                                    <input type="password" name="new-password" id="new-password" placeholder="New Password">
                                                    <i class="fa fa-lock"></i>
                                                    <span id="NewPasworderror" style="color: red;"></span>

                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>Repeat Password</h5>
                                                <div class="cpp-fiel">
                                                    <input type="password" name="repeat-password" id="repeat-password" placeholder="Repeat Password">
                                                    <i class="fa fa-lock"></i>
                                                    <span id="RepeatPasworderror" style="color: red;"></span>

                                                </div>
                                            </div>
                                            <div class="save-stngs pd2">
                                                <ul>
                                                    <li><button type="submit">Save Setting</button></li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                              
                               
                                <div class="tab-pane fade" id="nav-deactivate" role="tabpanel" aria-labelledby="nav-deactivate-tab">
                                    <div class="acc-setting">
                                        <h3>Deactivate Account</h3>
                                        <form id="deactivate-form" enctype="multipart/form-data" method="post" role="form" style="display: block;">
                                            <div class="cp-field">
                                                <h5>Email</h5>
                                                <div class="cpp-fiel">
                                                    <input type="text" name="email" id="email" placeholder="Email">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <span id="EmailError" style="color: red;"></span>

                                            </div>
                                            <div class="cp-field">
                                                <h5>Password</h5>
                                                <div class="cpp-fiel">
                                                    <input type="password" name="password" id="password" placeholder="Password">
                                                    <i class="fa fa-lock"></i>
                                                </div>
                                                <span id="psw1Error" style="color: red;"></span>
                                            </div>
                                            <div class="cp-field">
                                                <h5>Please Explain Further</h5>
                                                <textarea name="exp" id="exp"></textarea>
                                                <span id="ExpError" style="color: red;"></span>
                                            </div>
                                            <div class="save-stngs pd3">
                                                <ul>
                                                    <li><button type="submit">Save Setting</button></li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
    <script type="text/javascript" src="lib/slick/slick.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>
<script>
$("#deactivate-form").submit(function(e) {
        e.preventDefault();
        $('#EmailError').html("");
        $('#psw1Error').html("");
        $('#ExpError').html("");
        
        var myform = document.getElementById("deactivate-form");
        var fd = new FormData(myform);
        $.ajax({
                url: "includes/deactivateAcc.inc.php",
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST'
            })
            .done(function(response) {
                $message = "";
                resp = response.split(" ").join("");
                switch (resp) {
                    case "1":
                        $message = "Incorrect email";
                        $('#EmailError').html($message);
                        var element = document.getElementById("email");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "center",
                            inline: "nearest"
                        });
                        break;
                        case "2":
                        $message = "Incorrect password";
                        $('#psw1Error').html($message);
                        var element = document.getElementById("password");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "center",
                            inline: "nearest"
                        });
                        break;
                        case "3":
                        $message = "This field cannot be empty";
                        $('#ExpError').html($message);
                        var element = document.getElementById("exp");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "center",
                            inline: "nearest"
                        });
                        break;
                    default:
                    window.location.href = response;
                }
            });
        return false;

 })

 $("#pswchange-form").submit(function(e) {
        e.preventDefault();
        $('#OldPasworderror').html("");
        $('#NewPasworderror').html("");
        $('#RepeatPasworderror').html("");
        
        var myform = document.getElementById("pswchange-form");
        var fd = new FormData(myform);
        $.ajax({
                url: "includes/changepsw.inc.php",
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST'
            })
            .done(function(response) {
                $message = "";
                resp = response.split(" ").join("");
                switch (resp) {
                    case "1":
                        $message = "Incorrect password";
                        $('#OldPasworderror').html($message);
                        var element = document.getElementById("old-password");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "center",
                            inline: "nearest"
                        });
                        break;
                        case "2":
                        $message = "Your password needs to include at least 4 letters";
                        $('#NewPasworderror').html($message);
                        var element = document.getElementById("new-password");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "center",
                            inline: "nearest"
                        });
                        break;
                        case "3":
                        $message = "Password doesn't match";
                        $('#RepeatPasworderror').html($message);
                        var element = document.getElementById("repeat-password");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "center",
                            inline: "nearest"
                        });
                        break;
                    default:
                    window.location.reload(true)
                }
            });
        return false;

 })
</script>