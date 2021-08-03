<?php
session_start();
error_reporting(0);
include('../../conf/config.php');
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

<?php
                                        $queryAccRec = mysqli_query($con, "SELECT DATE_FORMAT(MAX(userlog.loginDate), '%d-%b-%Y %H-%i-%s') AS lastlogin,userlog.userId,users.fname,users.lname,users.acctype,users.photo FROM userlog,users where userlog.userId=users.id and users.status!='3' and users.privilege!='2' GROUP BY userlog.userId ORDER BY lastlogin LIMIT 5");
                                        if (!$queryAccRec) {
                                            die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                                        } else {
                                            $count = 1;
                                            while (($dataAccRec = mysqli_fetch_array($queryAccRec))) {
                                        ?>
                                                <div class="suggestion-usd">
                                                    <?php
                                                    $profilephotoRec = $dataAccRec['photo'];

                                                    if ($profilephotoRec == Null) {
                                                    ?>
                                                        <img class="scnd-userpic imageback" src="images/empty-img.png" alt="">
                                                    <?php
                                                    } else {
                                                        echo '<img class="scnd-userpic imageback"  src="../images/' . $profilephotoRec . '" />  ';
                                                    }
                                                    ?>
                                                    <div class="sgt-text">
                                                        <h4><?php echo htmlentities($dataAccRec['fname']) . " " . htmlentities($dataAccRec['lname']); ?></h4>
                                                        <span><?php echo htmlentities($dataAccRec['acctype']); ?></span>
                                                    </div>
                                                    <?php
                                                     $key = "finanzefxAB";
                                                     $text = $dataAccRec['userId'];
                                                     $encrypted = bin2hex(openssl_encrypt($text, 'AES-128-CBC', $key));
                                                    ?>
                                                    <span><a href="user-profile.php?id=<?php echo $text ?>&view=user"><i class="la la-eye"></i></a></span>
                                                </div>
                                            <?php
                                                $count++;
                                            }
                                            if ($count == 1) {
                                            ?>
                                                <div class="view-more">
                                                    Nothing to show
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="view-more">
                                                    <a href="profiles.php" title="">View all users</a>
                                                </div>
                                        <?php
                                            }
                                        }


                                        ?>

