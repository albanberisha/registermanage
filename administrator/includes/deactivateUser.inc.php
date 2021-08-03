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
        deleteuser($con,$userid);
    }else{
        echo "1";
        exit;
    }
  }


function  deleteuser($con,$userid)
{
$status='3';
$stmt = $con->prepare("UPDATE users SET status=? WHERE id=?");
$stmt->bind_param('ss', $status,$userid);
$stmt->execute();
$stmt->execute(); 
echo "Data updated successfully";
/* close statement */
$stmt->close(); 
}
?>