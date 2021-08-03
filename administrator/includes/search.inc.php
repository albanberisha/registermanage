<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

include('../../conf/config.php');
ob_clean();
$myid = $_SESSION['id'];
$name = $_POST['name'];
$table = $_POST['table'];

if (strcmp($table, "users") == 0) {
  searchUsers($con, $name, $myid);
} else {
  echo "1";
}
function searchUsers($con, $name, $myid)
{
  if (empty($name)) {
    echo "1";
  } else {
?>
 <?php
                        $queryusers = mysqli_query($con, "SELECT * from users where privilege!='2' and fname LIKE '%$name%' OR employeeCode LIKE '$name'  order by fname,lname ASC limit 30");
                        if (!$queryusers) {
                            die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                        } else {
                            $count3 = 1;
                            $rowcount=mysqli_num_rows($queryusers);
                         
                            ?>
                            <div class="user-specs" style="padding: 0 0 10px 0;" id="User-Profiles">
                                                <div class="" style="margin-top: 10px; margin-bottom: 10px;">
                                            <span>Users searched:</span>

                                                    <span class="bold-span">
                                                        <?php
                                                        echo $rowcount;
                                                        ?>
                                                    </span>

                                                
                                          

                                            </div>
                            <?php
                        
                            ?>
                                            <div class="companies-list">

                            <div class="row">
                            <?php
                 
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
                                            <div class="" style="margin-top: 10px;">
                                            <span>Referral code:</span><br>

                                                    <span class="bold-span">
                                                    <?php
                                                    
                                                    $myrreferalcode=$datausers['myemployeeCode'];
                                                    echo htmlentities($myrreferalcode) ?>
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
                                       $plaintext = $datausers['id'];
                                       $cipher = "aes-128-gcm";
                                       $key = "finanzefxAB";
                                       if (in_array($cipher, openssl_get_cipher_methods()))
                                       {
                                           $ivlen = openssl_cipher_iv_length($cipher);
                                           $iv = openssl_random_pseudo_bytes($ivlen);
                                           $ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv, $tag);

                                       }


                                        ?>
                                        <a href="user-profile.php?id=<?php echo $plaintext ?>&view=user">View Profile</a>
                                        </div>
                                </div>
                        <?php

                            }
                            ?>
                            </div>
                </div>
                </div>
                            <?php
                        }

                        ?>

<?php

  }
}
