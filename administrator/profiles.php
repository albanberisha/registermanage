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
        $acctype = $data2['acctype'];
        $profilephoto = $data2['photo'];
        $pofit = $data2['profit'];
    } else {
        echo "Hyrje e pa autorizuar";
        exit;
    }
}
//error_reporting($__error_reporting_level);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Profiles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
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
        <section class="companies-info">
            <div class="container">
                <div class="company-title">

                </div>
                <div class="user_pro_status">
                    <form id="search-form" enctype="multipart/form-data" method="post" role="form">
                        <span id="SSearchError" class="help-block font-size-iframe " style=" float: left; color: red;">

                        </span>
                        <div class="datefm df2">
                            <input class="form-control font-size-iframe search-input" placeholder="Search by name" data-field-dependency="0" data-mandatory="true" data-visible="true" id="Search" name="Search" type="text">
                            <ul class="flw-hr">
                                <li><button type="submit" class="flww2">Search</button></li>
                            </ul>


                        </div>
                    </form>
                </div>
                <div class="companies-list">

                    <div class="row" id="User-Profiles">
                        <?php
                        $queryusers = mysqli_query($con, "SELECT * from users where status!='3' and privilege!='2' order by fname,lname ASC limit 30");
                        if (!$queryusers) {
                            die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                        } else {
                            $count3 = 1;
                            while (($datausers = mysqli_fetch_array($queryusers))) {
                        ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <div class="company_profile_info">
                                        <div class="company-up-info">
                                            <?php
                                            $profilephoto = $datausers['photo'];
                                            if ($profilephoto == Null) {
                                            ?>
                                                <img class="imageback imgpost" src="images/empty-img.png" alt="">
                                            <?php
                                            } else {
                                                echo '<img class="imageback imgpost"  src="../images/' . $profilephoto . '" />  ';
                                            }
                                            ?>
                                            <h3><?php
                                                echo htmlentities($datausers['fname']) . " " . htmlentities($datausers['lname'])
                                                ?></h3>
                                            <span>Account type:</span>
                                            <span class="bold-span"><?php echo htmlentities($datausers['acctype']) ?></span>

                                            <div class="top-span">
                                                <span>Status:</span>
                                                <?php
                                                $status = $datausers['status'];
                                                if ($status == 1) {
                                                ?>
                                                    <span class="bold-span green">
                                                        <?php
                                                        echo "Active"
                                                        ?>
                                                    </span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="bold-span red">
                                                        <?php
                                                        echo "Deactive"
                                                        ?>
                                                    </span>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <?php
                                        $key = "finanzefxAB";
                                        $text = $datausers['id'];
                                        $encrypted = bin2hex(openssl_encrypt($text, 'AES-128-CBC', $key));

                                        ?>
                                        <a href="user-profile.php?id=<?php echo $text ?>&view=user">View Profile</a>
                                    </div>
                                </div>
                        <?php

                            }
                        }

                        ?>

                    </div>
                </div>
                <!-- 
                <div class="process-comm">
                    <div class="spinner">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                </div>
                -->
            </div>
        </section>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/flatpickr.min.js"></script>
    <script type="text/javascript" src="lib/slick/slick.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>

<script>
     $("#search-form").submit(function(e) {
    e.preventDefault();
    $('#SSearchError').html("");
    var myform = document.getElementById("search-form");
    var fd = new FormData(myform);
    e.preventDefault();
    name = $('#Search').val();
    table = 'users';
    $.ajax({
        method: "POST",
        url: "includes/search.inc.php",
        data: {
          name: name,
          table: table
        }
      })
      .done(function(response) {
        $message = "";
        switch (response) {
          case "1":
            $message = "Invalid name!";
            $('#SSearchError').html($message);
            var element = document.getElementById("search-form");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                            inline: "nearest"
                        });
            break;
          default:
            $('#search-form')[0].reset();
            $('#User-Profiles').html(response);
        }
      });
    return false;
  });
  $("#Refresh").on('click', function() {
    location.reload();
  });

</script>