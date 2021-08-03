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
                        $queryusers = mysqli_query($con, "SELECT * from users where privilege!='2' and fname='$name' order by fname,lname ASC limit 30");
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
                        }

                        ?>

<?php

  }
}
