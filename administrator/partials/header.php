<?php
session_start();
error_reporting(0);
include('../../conf/config.php');
if (!isset($_SESSION['loggedin'])) {
    // Could not get the data that should have been sent.
    session_start();
    session_unset();
    session_destroy();
    // Redirect to the login page:
    header('Location: ../../index.php');
} else {
    if ($_SESSION['privilege'] != '2') {
        session_start();
        session_unset();
        session_destroy();
        // Redirect to the login page:
        header('Location: ../../index.php');
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
        $profilephoto = $data2['photo'];

    } else {
        echo "Hyrje e pa autorizuar";
        exit;
    }
}
//error_reporting($__error_reporting_level);
?>




<div class="header-data">
    
    <div class="logo">
        <a href="index.php" title=""><img class="headerlogo" src="images/logo.png" alt=""></a>
    </div>
    <div class="logoTitle logo" style="    margin-top: 15px;
    font-weight: 1000;
    color: white;
    text-transform: uppercase;">
    <span><a href="#" style="color:white; font-size:25px;" title="">Finanzefx</a></span>
    </div>
    <nav >
        <ul style="    text-align: center;">
            <li>
                <a href="index.php" title="">
                    <span><i class="fa fa-home" aria-hidden="true"></i></span> Home
                </a>
            </li>

            <li>
                <a href="my-profile-feed.php" title="">
                    <span><i class="fa fa-user" aria-hidden="true"></i></span>My Profile
                </a>
            </li>
            <li>
                                <a href="profiles.php" title="">
                                    <span><img src="images/icon4.png" alt=""></span> Profiles
                                </a>
                            </li>
        </ul>
    </nav>
    <div class="menu-btn">
        <a href="#" title=""><i class="fa fa-bars"></i></a>
    </div>
    <div class="user-account">
        <div class="user-info">
        <?php

if ($profilephoto == Null) {
?>
    <img  class="imageback heaerimage" src="images/empty-img.png" alt="">
<?php
} else {
    echo '<img class="imageback heaerimage"  src="../images/' . $profilephoto . '" />  ';
}
?>
            <a style="    word-break: break-all;
    max-width: 100px;
}" href="#" title=""><?php echo htmlentities($username) ?></a>
            <i class="la la-sort-down"></i>
        </div>
        <div class="user-account-settingss" id="users">

            <h3>Setting</h3>
            <ul class="us-links">
                <li><a href="profile-account-setting.php" title="">Account Setting</a></li>
                <li><a href="../riskwarning.html" target="_blank" title="">Risk Warning</a></li>
                <li><a href="../termsandconditions.html" target="_blank" title="">Terms & Conditions</a></li>
            </ul>
            <h3 class="tc"><a href="../logout.php" title="">Logout</a></h3>
        </div>
    </div>
</div>