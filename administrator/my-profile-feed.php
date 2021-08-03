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

            if ($coverphoto == Null) {
            ?>
                <img class="cover" src="images/resources/default-cover.png" alt="">
            <?php
            } else {
                echo '<img class="cover"  src="../images/resources/' . $coverphoto . '" />  ';
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

                                            if ($profilephoto == Null) {
                                            ?>
                                                <img class="imageback imgb3" src="images/empty-img.png" alt="">
                                            <?php
                                            } else {
                                                echo '<img  class="imageback imgb3" src="../images/' . $profilephoto . '" />  ';
                                            }
                                            ?>
                                            <div class="add-dp" id="OpenImgUpload">
                                                <form id="profilepicture-form" enctype="multipart/form-data" method="post""  style=" display: block;"">
                                                    <input type="file" id="file" name="file" accept="image/png">
                                                    <label for="file"><i class="fas fa-camera"></i></label>
                                                    <button class="add-pic-box2 ab4 fas fa-upload" type="submit"></button>
                                                </form>
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
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="main-ws-sec">
                                    <div class="user-tab-sec rewivew">
                                        <h3><?php
                                            echo htmlentities($username) . " " . htmlentities($usersurname)
                                            ?></h3>
                                        <div class="star-descp">
                                            <ul class="descp">
                                                <li><img src="images/icon9.png" alt=""><span><?php
                                                                                                echo htmlentities($countrykey)
                                                                                                ?></span></li>
                                            </ul>
                                        </div>
                                        <div class="tab-feed st2 settingjb">
                                            <ul>
                                                <li data-tab="feed-dd" class="active">
                                                    <a href="#" title="">
                                                        <img src="images/ic1.png" alt="">
                                                        <span>Feed</span>
                                                    </a>
                                                </li>
                                                <li data-tab="info-dd">
                                                    <a href="#" title="">
                                                        <img src="images/ic2.png" alt="">
                                                        <span>Info</span>
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
                                    <div class="product-feed-tab current" id="feed-dd">
                                        <div class="posts-section">
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
                                                                <img class="scnd-userpic imageback" src="images/empty-img.png" alt="">
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
                                                            <img src="../images/<?php echo $datapostt['path'] ?>" alt="" >
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
                                                        <br>
                                                    </div>
                                                </div>


                                            </div>


                                        </div>
                                    </div>
                                    <div class="product-feed-tab" id="info-dd">
                                        <div class="user-profile-ov">
                                            <h3><a href="#" title="" class="ed-box-open">Personal Information</a> <a href="#" title="" class="ed-box-open"><i class="fa fa-pencil"></i></a></a></h3>
                                            <h4>Name and surname: <?php echo htmlentities($username) . " " . htmlentities($usersurname)  ?></h4>
                                            <span>Email: <?php echo htmlentities($useremail) ?></span>
                                            <p>Phone: <?php echo htmlentities($phone) ?> </p>
                                        </div>
                                        <div class="user-profile-ov">
                                            <h3><a href="#" title="" class="lct-box-open">Location</a> <a href="#" title="" class="lct-box-open"><i class="fa fa-pencil"></i></a></h3>
                                            <h4><?php echo $countrykey ?></h4>
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
                <h3>Location</h3>
                <form id="country-form" enctype="multipart/form-data" method="post" role="form">
                    <div class="datefm">
                        <select class="" data-field-dependency="0" data-mandatory="true" data-visible="true" id="CountryKey" name="CountryKey">

                            <option selected value="<?php echo $countrykey ?>"><?php echo $countrykey ?></option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Brunei">Brunei</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo - Brazzaville">Congo - Brazzaville</option>
                            <option value="Congo - Kinshasa">Congo - Kinshasa</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Côte d’Ivoire">Côte d’Ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Greece">Greece</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong SAR China">Hong Kong SAR China</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran">Iran</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kosovo">Kosovo</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Laos">Laos</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Libya">Libya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macedonia">Macedonia</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Moldova">Moldova</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Mozambique">Namibia</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Niger">Nigeria</option>
                            <option value="North Korea">North Korea</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Réunion">Réunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russia">Russia</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                            <option value="Saint Vincent and the Grenadines">San Marino</option>
                            <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Korea">South Korea</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria">Syria</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Uzbekistan">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                        <i class="fa fa-globe"></i>
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
                                <input class="form-control font-size-iframe" value="<?php echo htmlentities($username) ?>" placeholder="First Name" data-field-dependency="0" data-mandatory="true" data-visible="true" id="Firstname" name="Firstname" type="text">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 no-left-pd">
                            <div class="datefm">
                                <span id="LnameError" class="help-block font-size-iframe" style=" float: left; color: black;">
                                    Your last name
                                </span>
                                <input class="form-control font-size-iframe" value="<?php echo htmlentities($usersurname) ?>" placeholder="Last Name" data-field-dependency="0" data-mandatory="true" data-visible="true" id="Lastname" name="Lastname" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 no-left-pd">
                            <div class="datefm">
                                <span id="EmailError" class="help-block font-size-iframe" style=" float: left; color: black;">
                                    Your email address
                                </span>
                                <input class="form-control font-size-iframe" value="<?php echo htmlentities($useremail) ?>" readonly="readonly" placeholder="Email" data-field-dependency="0" data-mandatory="true" data-visible="true" id="Email" name="Email" type="text">
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
                                    if ($gender != null) {
                                        if (strcmp($gender, 'm') == 0) {
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
                                <input style="max-width: 20%; margin-right:10px;" class="form-control col-xs-1 font-size-iframe" data-visible="true" id="PhoneExtension" maxlength="10" name="PhoneExtension" style="max-width:20%" type="number" value="<?php echo htmlentities($first_chunk) ?>">
                                <input style="max-width: 70%;" class="form-control font-size-iframe" data-field-dependency="0" data-mandatory="true" data-visible="true" id="Phone" maxlength="15" name="Phone" style="max-width:80%" type="number" value="<?php echo htmlentities($second_chunk) ?>">
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
    $("#coverpicvure-form").submit(function(e) {
        e.preventDefault();


        var myform = document.getElementById("coverpicvure-form");
        var fd = new FormData(myform);
        $.ajax({
                url: "includes/changecover.inc.php",
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
                        alert("Cover image cant be empty");
                        break;
                    case "2":
                        alert("Unauthorized format or too big image");
                        break;
                    default:
                        window.location.reload(true)
                }
            });
        return false;
    })
    $("#profilepicture-form").submit(function(e) {
        e.preventDefault();
        var myform = document.getElementById("profilepicture-form");
        var fd = new FormData(myform);
        $.ajax({
                url: "includes/changeprofilepic.inc.php",
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
                        alert("Profile image cant be empty");
                        break;
                    case "2":
                        alert("Unauthorized format or too big image");
                        break;
                    default:
                        window.location.reload(true)
                }
            });
        return false;
    })


    $("#country-form").submit(function(e) {
        e.preventDefault();
        var myform = document.getElementById("country-form");
        var fd = new FormData(myform);
        $.ajax({
                url: "includes/updatecountry.inc.php",
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
    $("#personalinfo-form").submit(function(e) {
        e.preventDefault();

        document.getElementById("FnameError").style.color = "black";
        document.getElementById("LnameError").style.color = "black";
        document.getElementById("PhoneError").style.color = "black";


        $('#FnameError').html("Your first name");
        $('#LnameError').html("Your last name");
        $('#PhoneError').html("Enter your phone extension and phone number");

        var myform = document.getElementById("personalinfo-form");
        var fd = new FormData(myform);
        $.ajax({
                url: "includes/updatepersonalinfo.inc.php",
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
                        $message = "Please enter your first name";
                        document.getElementById("FnameError").style.color = "red";
                        $('#FnameError').html($message);
                        break;
                    case "2":
                        $message = "Please enter your last name";
                        document.getElementById("LnameError").style.color = "red";
                        $('#LnameError').html($message);
                        break;
                    case "3":
                        $message = "Type your phone number";
                        document.getElementById("PhoneError").style.color = "red";
                        $('#PhoneError').html($message);
                        break;
                    default:
                        window.location.reload(true)
                }
            });
        return false;
    });
</script>