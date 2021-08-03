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
    if ($_SESSION['privilege'] != '3') {
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
<html>

<head>
    <meta charset="UTF-8">
    <title>Home</title>
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
        <main>
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                                <div class="main-left-sidebar no-margin">
                                    <div class="user-data full-width">
                                        <div class="user-profile">
                                            <div class="username-dt">
                                                <div class="usr-pic">
                                                    <?php

                                                    if ($profilephoto == Null) {
                                                    ?>
                                                        <img class="imageback" src="images/empty-img.png" alt="">
                                                    <?php
                                                    } else {
                                                        echo '<img class="imageback"  src="../images/' . $profilephoto . '" />  ';
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                            <div class="user-specs">
                                                <h3 style="    word-break: break-all;">
                                                    <?php
                                                    echo htmlentities($username) . " " . htmlentities($usersurname)
                                                    ?></h3>
                                                <span>Account type:</span>
                                                <span class="bold-span"><?php echo htmlentities($acctype) ?></span>
                                            </div>
                                        </div>
                                        <ul class="user-fw-status">
                                            <li>
                                                <a href="my-profile-feed.php" title="">View Profile</a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                                <div class=" pd-right-none no-pd">
                                    <div class="right-sidebar">
                                        <div class="widget widget-about2">
                                            <div class="card-body text-center">
                                                <?php
                                                if ($pofit == 0) {
                                                ?>
                                                    <p class="text-muted">Nothing to show</p>
                                                <?php
                                                } else {
                                                ?>
                                                    <i class="fa fa-euro text-secondary fa-3x text-secondary-shadow txt45"></i>
                                                    <h2 class="mb-2  number-font txt45">
                                                        <?php
                                                        echo htmlentities($pofit);
                                                        ?>
                                                    </h2>
                                                    <p class="text-muted">Total Income</p>
                                                <?php
                                                }
                                                ?>



                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 no-pd">

                                <?php
                                $query = mysqli_query($con, "SELECT posts.id,users.fname,users.lname,users.countrykey,users.privilege,users.photo,posts.id,posts.userId,posts.text,posts.description,posts.postDate,posts.postTime,posts.boldkeywords,posts.underlinekeywords,posts.bulletpoint from users,posts where users.status!='3' and posts.userId=users.id and posts.postStatus!='2' ORDER BY posts.id DESC");
                                if (!$query) {
                                    die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                                } else {
                                    $count = 1;
                                    while (($datapost = mysqli_fetch_array($query))) {
                                ?>
                                        <div class="main-ws-sec">
                                            <div class="posts-section">
                                                <div class="post-bar">
                                                    <div class="post_topbar">
                                                        <div class="usy-dt">
                                                            <?php
                                                            $postprofilephoto = $datapost['photo'];
                                                            if ($postprofilephoto == Null) {
                                                            ?>
                                                                <img class="scnd-userpic imageback" src="../images/empty-img.png" alt="">
                                                            <?php
                                                            } else {
                                                                echo '<img class="scnd-userpic imageback"  src="../images/' . $postprofilephoto . '" />  ';
                                                            }
                                                            ?>
                                                            <div class="usy-name">
                                                                <h3> <?php
                                                                        echo htmlentities($datapost['fname']) . " " . htmlentities($datapost['lname'])
                                                                        ?></h3>
                                                                <span><img src="images/clock.png" alt="">
                                                                    <?php
                                                                    echo htmlentities($datapost['postDate']) . " " . htmlentities($datapost['postTime'])
                                                                    ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="epi-sec">
                                                        <ul class="descp">
                                                            <li><img src="images/icon8.png" alt=""><span>
                                                                    <?php
                                                                    $postuserpriv = $datapost['privilege'];
                                                                    switch ($postuserpriv) {
                                                                        case '2':
                                                                            echo 'Admin';
                                                                            break;
                                                                        default:
                                                                            echo 'User';
                                                                    }
                                                                    ?>
                                                                </span></li>
                                                            <li><img src="images/icon9.png" alt=""><span><?php
                                                                                                            echo htmlentities($datapost['countrykey'])
                                                                                                            ?></span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="job_descp">
                                                        <h3 id="title-head"><?php
                                                                            echo htmlentities($datapost['text'])
                                                                            ?></h3>
                                                        <p><?php
                                                            $str = $datapost['description'];
                                                            $order   = array("\r\n", "\n", "\r");
                                                            $replace = '<br />';
                                                            $newstr = str_replace($order, $replace, $str);

                                                            $keywords  = $datapost['boldkeywords'];
                                                            $keywordsr = explode("  ", $keywords);


                                                            $rep = array();

                                                            for ($i = 0; $i <= count($keywordsr); $i++) {
                                                                $rep[$i] = "<span style='font-weight: 900;'>" . $keywordsr[$i] . "</span>";
                                                            }


                                                            $newphrase = str_replace($keywordsr, $rep, $newstr);



                                                            $keywords2  = $datapost['underlinekeywords'];
                                                            $keywordsr2 = explode("  ", $keywords2);
                                                            $rep2 = array();

                                                            for ($i = 0; $i <= count($keywordsr2); $i++) {
                                                                $rep2[$i] = "<span style='text-decoration: underline;'>" . $keywordsr2[$i] . "</span>";
                                                            }


                                                            $newphrase2 = str_replace($keywordsr2, $rep2, $newphrase);
                                                            $keywords3  = $datapost['bulletpoint'];
                                                            $keywordsr3 = explode("  ", $keywords3);
                                                            $rep3 = array();

                                                            for ($i = 0; $i <= count($keywordsr3); $i++) {
                                                                $rep3[$i] = "<span id='BulletPoint' ></span>";
                                                            }


                                                            $newphrase3 = str_replace($keywordsr3, $rep3, $newphrase2);





                                                            echo  $newphrase3;
                                                            ?></p>

                                                    </div>
                                                    <div class="">
                                            <div class="gallery_pf">
                                            <div class="row topmrg">


                                            <?php
                                            $postid=$datapost['id'];
                                             $queryy = mysqli_query($con, "SELECT path,text from images where postId='$postid'");
                                             if (!$queryy) {
                                                 die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                                             } else {
                                                while (($datapostt = mysqli_fetch_array($queryy))) {
                                                    ?>
                                                    <div class="col-lg-6">
                                                        <div class="gallery_pt ">
                                                            <img src="../images/<?php echo $datapostt['path'] ?>" alt="">
                                                            <a href="../images/<?php echo $datapostt['path'] ?>" title=""><img src="images/all-out.png" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                                
                                                </div>
                                            </div>
                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                        $count++;
                                    }
                                }
                                ?>

                            </div>

                        </div>
                    </div>
                </div>

        </main>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
    <script type="text/javascript" src="lib/slick/slick.min.js"></script>
    <script type="text/javascript" src="js/scrollbar.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>