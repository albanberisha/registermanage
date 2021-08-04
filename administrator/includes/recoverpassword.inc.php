<?php
session_start();
error_reporting(0);
include('../../conf/config.php');
ob_clean();
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


if (isset($_POST['userid'])) {
    $userhashid = $_POST['userid'];
  
    $key = "finanzefxAB";
    $userid = openssl_decrypt(hex2bin($userhashid), 'AES-128-CBC', $key);
  }else{
      echo "1";
      exit;
  }

  $query = mysqli_query($con, "Select * from users where id='$userid'");
  if (!$query) {
    die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
  } else {
    $data2 = mysqli_fetch_array($query);
    if ($data2 > 0) {
        changepassword($con,$userid,$data2['fname']);
    }else{
        echo "1";
        exit;
    }
  }


function  changepassword($con,$userid,$username)
{
$status='3';
$date2 = new DateTime("now", new DateTimeZone('Europe/Belgrade') );
    $now=$date2->format('d');
$password=randomPassword();
$newpsw = password_hash($password, PASSWORD_DEFAULT); 
$stmt = $con->prepare("UPDATE users SET password=? WHERE id=?");
$stmt->bind_param('ss', $newpsw,$userid);
$stmt->execute();
$stmt->execute(); 
/* close statement */
$stmt->close(); 
echo "<h4>New password is:</h4>
          <span class='help-block font-size-iframe ' style=' color: green; font-weight:bold; font-size:20px;'>
                        ".$password."
                        </span>";
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>