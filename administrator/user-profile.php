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
$userid = NULL;
if (isset($_GET['view'])) {
    $userid = $_GET['id'];
    $key = "finanzefxAB";
    $useridhash = bin2hex(openssl_encrypt($userid, 'AES-128-CBC', $key));
}
$query = mysqli_query($con, "Select * from users where id='$userid'");
if (!$query) {
    die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
} else {
    $data2 = mysqli_fetch_array($query);
    if ($data2 > 0) {
        $username2 = $data2['fname'];
        $usersurname2 = $data2['lname'];
        $useremail2 = $data2['email'];
        $acctype2 = $data2['acctype'];
        $profilephoto2 = $data2['photo'];
        $coverphoto2 = $data2['coverphoto'];
        $countrykey22 = $data2['countrykey'];
        $pofit2 = $data2['profit'];
        $gender2 = $data2['gender'];
        $phone2 = $data2['phone'];
        $status = $data2['status'];
        $regdate2 = $data2['regdate'];
        $ipAddress2 = $data2['ipAddress'];
        $continentCode2 = $data2['continentCode'];
        $continentName2 = $data2['continentName'];
        $countryCode2 = $data2['countryCode'];
        $countryName2 = $data2['countryName'];
        $stateProv2 = $data2['stateProv'];
        $city2 = $data2['city'];
        $lastupdated2 = $data2['lastupdated'];
        $myrreferalcode = $data2['myemployeeCode'];
        $employeeCode = $data2['employeeCode'];



        $last_space2 = strrpos($phone2, ' ');
        $last_word2 = substr($phone2, $last_space2);
        $first_chunk2 = substr($phone2, 0, $last_space2);
        $second_chunk2 = substr($phone2, $last_space2 + 1, strlen($phone2));
    } else {
        echo "Error";
        exit;
    }
}

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>My profile</title>
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
        <section class="cover-sec">
            <?php
            if ($coverphoto2 == Null) {
            ?>
                <img class="cover" src="images/resources/default-cover.png" alt="">
            <?php
            } else {
                echo '<img class="cover"  src="../images/resources/' . $coverphoto2 . '" />  ';
            }
            ?>
            <div class="add-pic-box">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg-12 col-sm-12">
                            <!-- 
                        <form id="coverpicvure-form" enctype="multipart/form-data" method="post" role="form" style="display: block;">
                                <input type="file" id="file" name="file" accept="image/png">
                                <label for="file">Change Image</label>
                                <input class="add-pic-box2" type="submit">
                            </form>
-->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <main>
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="main-left-sidebar">
                                    <div class="user_profile">
                                        <div class="user-pro-img">
                                            <?php

                                            if ($profilephoto2 == Null) {
                                            ?>
                                                <img class="imageback imgb3" src="images/empty-img.png" alt="">
                                            <?php
                                            } else {
                                                echo '<img  class="imageback imgb3" src="../images/' . $profilephoto2 . '" />  ';
                                            }
                                            ?>
                                            <div class="user-specs">
                                                <h3 style="    word-break: break-all;">
                                                    <?php
                                                    echo htmlentities($username2) . " " . htmlentities($usersurname2)
                                                    ?></h3>
                                                <span>Account type:</span>
                                                <span class="bold-span"><?php echo htmlentities($acctype2) ?></span>
                                                
                                            <div class="" style="margin-top: 10px;">
                                            <span>User Referral code:</span><br>

                                                    <span class="bold-span">
                                                    <?php echo htmlentities($myrreferalcode) ?>
                                                    </span>

                                                
                                            </div>
                                            <div class="" style="margin-top: 10px;">
                                            <?php
                                             $uip=$_SERVER['REMOTE_ADDR']; // get the user ip
                                             $host = $_SERVER['HTTP_HOST'];
                                             $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                                             $extra = "../../index.php"; //
                                             $reglink="http://".$host.$uri."/".$extra."?ref=".$myrreferalcode."&reg=register";
?>
                                            <span>Share registration link:</span> <a onclick="copyVal('<?php echo $reglink ?>')" href="#" title=""><i class="fa fa-minus-copy"></i> Copy</a>
<br>
                                            </div>
                                            <div class="" style="margin-top: 10px;">
                                            <span>Used Referral code:</span><br>

                                                    <span class="bold-span">
                                                    <?php
                                                    if(empty($employeeCode))
                                                    {
                                                        echo "None";
                                                    }else {echo htmlentities($employeeCode);} ?>
                                                    </span>

                                                
                                            </div>
                                            </div>
                                            


                                        </div>
                                        
                                        <div class="">
                                            <span>Status:</span>
                                            <?php
                                            if ($status == 1) {
                                            ?>
                                                <span class="bold-span">
                                                    <?php
                                                    echo "Active"
                                                    ?>
                                                </span>
                                                <div class="message-btn">

                                                    <a onclick="DeactivateUser('<?php echo $useridhash ?>')" href="#" title=""><i class="fa fa-minus-square"></i> Deactivate</a>
                                                </div>

                                            <?php
                                            } else {
                                            ?>
                                                <span class="bold-span">
                                                    <?php
                                                    echo "Deactive"
                                                    ?>
                                                </span>
                                                <div class="message-btn">
                                                    <a onclick="ActivateUser('<?php echo $useridhash ?>')" href="#" title=""><i class="fa fa-plus-square"></i> Activate</a>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            

                                        </div>





                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="main-ws-sec">
                                    <div class="user-tab-sec rewivew">
                                        <h3><?php
                                            echo htmlentities($username2) . " " . htmlentities($usersurname2)
                                            ?></h3>

                                        <div class="star-descp">
                                            <ul class="descp">
                                                <li><img src="images/icon9.png" alt=""><span><?php
                                                                                                echo htmlentities($countrykey22)
                                                                                                ?></span></li>
                                            </ul>
                                        </div>

                                        <div class="tab-feed st2 settingjb">
                                            <ul>
                                                <li data-tab="info-dd" class="active">
                                                    <a href="#" title="">
                                                        <img src="images/ic2.png" alt="">
                                                        <span>Info</span>
                                                    </a>
                                                </li>
                                                <li data-tab="feed-dd">
                                                    <a href="#" title="">
                                                        <img src="images/ic1.png" alt="">
                                                        <span>Logs</span>
                                                    </a>
                                                </li>

                                                <li data-tab="my-bids">
                                                    <a href="#" title="">
                                                        <img src="images/ic5.png" alt="">
                                                        <span>Profit</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-feed-tab" id="feed-dd">
                                        <div class="posts-section">
                                            <?php
                                            $queryuserlog = mysqli_query($con, "SELECT * from userlog where userId='$userid' order by loginDate DESC limit 20");
                                            if (!$queryuserlog) {
                                                die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                                            } else {
                                                $countt = 1;
                                                while (($datapostuserlog = mysqli_fetch_array($queryuserlog))) {
                                            ?>
                                                    <div class="user-profile-ov">
                                                        <h4>Login date and time: <?php echo htmlentities($datapostuserlog['loginDate']) ?></h4>
                                                        <span>Current information may not be accurate.</span>
                                                        <h4>Ip address: <?php echo htmlentities($datapostuserlog['ipAddress']) ?></h4>
                                                        <h4>Continent name: <?php echo htmlentities($datapostuserlog['continentName']) ?></h4>
                                                        <h4>Continent code: <?php echo htmlentities($datapostuserlog['continentCode']) ?></h4>
                                                        <h4>Country name: <?php echo htmlentities($datapostuserlog['countryName']) ?></h4>
                                                        <h4>Country code: <?php echo htmlentities($datapostuserlog['countryCode']) ?></h4>
                                                        <h4>Province: <?php echo htmlentities($datapostuserlog['stateProv']) ?></h4>
                                                        <h4>City: <?php echo htmlentities($datapostuserlog['city']) ?></h4>

                                                    </div>
                                            <?php
                                                    $countt++;
                                                }
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="product-feed-tab" id="my-bids">
                                        <ul class="nav nav-tabs bid-tab" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Current profit</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="post-bar">
                                                    <div class="post_topbar">

                                                        <div class="col-sm-12">
                                                            <div class="profile-bx-info">
                                                                <ul class="bk-links">
                                                                    <li><a href="#" title="" class="lct-box-open" title=""><i class="la la-edit"></i></a></li>
                                                                </ul>
                                                                <div class="pro-bx">
                                                                    <img src="images/pro-icon1.png" alt="">
                                                                    <div class="bx-info">
                                                                        <h3><?php
                                                                            if ($pofit2 == 0) {
                                                                                echo "Nothing to show.";
                                                                            } else {
                                                                                echo "&euro;" . htmlentities($pofit2);
                                                                            }
                                                                            ?></h3>
                                                                        <h5>Total Income</h5>
                                                                    </div>
                                                                </div>
                                                                <p>Here you will see Total Income.</p>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    </div>

                                                </div>


                                            </div>


                                        </div>
                                    </div>
                                    <div class="product-feed-tab current" id="info-dd">
                                        <div class="user-profile-ov">
                                            <h3>Registration Information</h3>
                                            <h4>Registration date: <?php echo htmlentities($regdate2) ?></h4>
                                            <h4>Last update: <?php echo htmlentities($lastupdated2) ?></h4>
                                            <span>Current information may not be accurate.</span>
                                            <h4>Ip address: <?php echo htmlentities($ipAddress2) ?></h4>
                                            <h4>Continent name: <?php echo htmlentities($continentName2) ?></h4>
                                            <h4>Continent code: <?php echo htmlentities($continentCode2) ?></h4>
                                            <h4>Country name: <?php echo htmlentities($countryName2) ?></h4>
                                            <h4>Country code: <?php echo htmlentities($countryCode2) ?></h4>
                                            <h4>Province: <?php echo htmlentities($stateProv2) ?></h4>
                                            <h4>City: <?php echo htmlentities($city2) ?></h4>
                                        </div>
                                        <div class="user-profile-ov">
                                            <h3>Personal Information</h3>
                                            <h4>Name and surname: <?php echo htmlentities($username2) . " " . htmlentities($usersurname2)  ?></h4>
                                            <span>Email: <?php echo htmlentities($useremail2) ?></span>
                                            <p>Phone: <?php echo htmlentities($phone2) ?> </p>
                                            <p>Gender: <?php echo htmlentities($gender2) ?> </p>
                                        </div>
                                        <div class="user-profile-ov">
                                            <h3>Location</h3>
                                            <h4><?php echo $countrykey22 ?></h4>
                                        </div>
                                        <div class="user-profile-ov">
                                            <h3>Referral code:</h3>
                                            <?php
                                            $queryusers2 = mysqli_query($con, "SELECT * from users where privilege!='2' and status!='3' and employeeCode='$myrreferalcode' ORDER BY  id DESC");
                                            if (!$queryusers2) {
                                                die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                                            } else {
                                                $rowcount=mysqli_num_rows($queryusers2);
                                                ?>
                                                  <h4>Users used this code : <?php echo htmlentities($rowcount) ?></h4>
                                                <?php
                                                $count=1;
                                                 while ($datausers2 = mysqli_fetch_array($queryusers2)) {
                                                     ?>
                                                     <h4><?php echo $count; ?>  </h4>
                                                     <h4>  &nbsp; &nbsp; &nbsp;   Name and surname: <?php echo htmlentities($datausers2['fname']) . " " . htmlentities($datausers2['lname'])  ?></h4>
                                                     <h4>  &nbsp; &nbsp; &nbsp;   Date and time: <?php echo htmlentities($datausers2['regdate']) ?></h4>
                                                    <?php
                                                       $count++;
                                                 }
                                            }
                                            
                                            ?>
                                          
                                        </div>
                                    </div>




                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div class="overview-box" id="location-box">
            <div class="overview-edit">
                <h3>Income</h3>
                <form id="profit-form" enctype="multipart/form-data" method="post" role="form">
                    <span id="IncomeError" class="help-block font-size-iframe " style=" float: left; color: black;">
                        Income
                    </span>
                    <div class="datefm">
                        <input type="hidden" value="<?php echo $useridhash ?>" name="useridhash" id="useridhash">
                        <input class="form-control font-size-iframe" value="<?php echo $pofit2 ?>" placeholder="" data-field-dependency="0" data-mandatory="true" data-visible="true" id="Income" name="Income" type="number" min="0" step="0.01">
                        <i class="fa fa-euro"></i>

                    </div>
                    <button type="submit" class="save">Save</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div>
        </div>
        <div class="overview-box" id="education-box">
            <div class="overview-edit">
                <h3>Personal Information</h3>
                <form id="personalinfo-form" enctype="multipart/form-data" method="post" role="form">
                    <div class="row">
                        <div class="col-lg-12 no-left-pd">
                            <div class="datefm">
                                <span id="FnameError" class="help-block font-size-iframe " style=" float: left; color: black;">
                                    Your first name
                                </span>
                                <input class="form-control font-size-iframe" value="<?php echo htmlentities($username2) ?>" placeholder="First Name" data-field-dependency="0" data-mandatory="true" data-visible="true" id="Firstname" name="Firstname" type="text">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 no-left-pd">
                            <div class="datefm">
                                <span id="LnameError" class="help-block font-size-iframe" style=" float: left; color: black;">
                                    Your last name
                                </span>
                                <input class="form-control font-size-iframe" value="<?php echo htmlentities($usersurname2) ?>" placeholder="Last Name" data-field-dependency="0" data-mandatory="true" data-visible="true" id="Lastname" name="Lastname" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 no-left-pd">
                            <div class="datefm">
                                <span id="EmailError" class="help-block font-size-iframe" style=" float: left; color: black;">
                                    Your email address
                                </span>
                                <input class="form-control font-size-iframe" value="<?php echo htmlentities($useremail2) ?>" readonly="readonly" placeholder="Email" data-field-dependency="0" data-mandatory="true" data-visible="true" id="Email" name="Email" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 no-left-pd">
                            <span id="GenderError" class="help-block font-size-iframe" style=" float: left; color: black;">
                                Gender
                            </span>
                            <div class="datefm">

                                <div class="input-title-btn">
                                    <?php
                                    if ($gender2 != null) {
                                        if (strcmp($gender2, 'm') == 0) {
                                    ?>
                                            <div style="    max-height: 30px;" class="row">
                                                <span class="genderspan" style="float: left;">Male</span><input type="radio" name="gender" value="m" checked style="width:20px"><br>

                                            </div>
                                            <div class="row">
                                                <span class="genderspan" style="float: left;">Female</span><input type="radio" name="gender" value="f" style="width:20px">

                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div style="    max-height: 30px;" class="row">
                                                <span class="genderspan" style="float: left;">Male</span><input type="radio" name="gender" value="m" style="width:20px"><br>

                                            </div>
                                            <div class="row">
                                                <span class="genderspan" style="float: left;">Female</span><input type="radio" name="gender" value="f" checked style="width:20px">

                                            </div> <?php
                                                }
                                            } else {
                                                    ?>
                                        <div style="    max-height: 30px;" class="row">
                                            <span class="genderspan" style="float: left;">Male</span><input type="radio" name="gender" value="m" style="width:20px"><br>

                                        </div>
                                        <div class="row">
                                            <span class="genderspan" style="float: left;">Female</span><input type="radio" name="gender" value="f" style="width:20px">

                                        </div>
                                    <?php
                                            }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 no-left-pd">
                            <span id="PhoneError" class="genderspan" style="float: left; height: 20px; color: black;">Enter your phone extension and phone number</span>
                            <div class="" style="display: inline-flex;">
                                <input style="max-width: 20%; margin-right:10px;" class="form-control col-xs-1 font-size-iframe" data-visible="true" id="PhoneExtension" maxlength="10" name="PhoneExtension" style="max-width:20%" type="number" value="<?php echo htmlentities($first_chunk2) ?>">
                                <input style="max-width: 70%;" class="form-control font-size-iframe" data-field-dependency="0" data-mandatory="true" data-visible="true" id="Phone" maxlength="15" name="Phone" style="max-width:80%" type="number" value="<?php echo htmlentities($second_chunk2) ?>">
                            </div>
                        </div>
                        <button type="submit" value="save" class="save">Save</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div>
        </div>
        <div class="overview-box" id="skills-box">
            <div class="overview-edit">
                <h3>Skills</h3>
                <ul>
                    <li><a href="#" title="" class="skl-name">HTML</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
                    <li><a href="#" title="" class="skl-name">php</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
                    <li><a href="#" title="" class="skl-name">css</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
                </ul>
                <form>
                    <input type="text" name="skills" placeholder="Skills">
                    <button type="submit" class="save">Save</button>
                    <button type="submit" class="save-add">Save & Add More</button>
                    <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div>
        </div>
        <div class="overview-box" id="create-portfolio">
            <div class="overview-edit">
                <h3>Create Portfolio</h3>
                <form>
                    <input type="text" name="pf-name" placeholder="Portfolio Name">
                    <div class="file-submit">
                        <input type="file4" id="file4">
                        <label for="file">Choose File</label>
                    </div>
                    <div class="pf-img">
                        <img src="images/resources/np.png" alt="">
                    </div>
                    <input type="text" name="website-url" placeholder="htp://www.example.com">
                    <button type="submit" class="save">Save</button>
                    <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div>
        </div>

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
          function copyVal(copyText2)
    {
      updateClipboard(copyText2);
    }
    function updateClipboard(newClip) {
  navigator.clipboard.writeText(newClip).then(function() {
    /* clipboard successfully set */
  }, function() {
    /* clipboard write failed */
  });
}
    </script>
<script>
    $("#profit-form").submit(function(e) {
        e.preventDefault();
        var myform = document.getElementById("profit-form");
        var fd = new FormData(myform);
        $.ajax({
                url: "includes/changeprofit.inc.php",
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST'
            })
            .done(function(response) {
                $message = "";
                //alert(response);
                window.location.reload(true)
            });
        return false;
    });

    function DeactivateUser($id) {
        $.ajax({
                method: "POST",
                url: "includes/deactivateUser.inc.php",
                data: {
                    userid: $id
                }
            })
            .done(function(response) {
                if (response == "error") {
                    alert("Unauthorized delete");
                } else {
                    //alert(response);
                    window.location.reload(true)
                }
            });
        return false;
    }

    function ActivateUser($id) {
        $.ajax({
                method: "POST",
                url: "includes/activateUser.inc.php",
                data: {
                    userid: $id
                }
            })
            .done(function(response) {
                if (response == "error") {
                    alert("Unauthorized activate");
                } else {
                    //alert(response);
                    window.location.reload(true)
                }
            });
        return false;
    }
</script>