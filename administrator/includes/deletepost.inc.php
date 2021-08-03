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


if (isset($_POST['postid'])) {
    $postidhash = $_POST['postid'];
  
    $key = "finanzefxAB";
    $postid = openssl_decrypt(hex2bin($postidhash), 'AES-128-CBC', $key);
  }else{
      echo "1";
      exit;
  }

  $query = mysqli_query($con, "Select * from posts where id='$postid'");
  if (!$query) {
    die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
  } else {
    $data2 = mysqli_fetch_array($query);
    if ($data2 > 0) {
        deletepost($con,$postid);
    }else{
        echo "1";
        exit;
    }
  }


function  deletepost($con,$postid)
{
$postStatus='2';
$stmt = $con->prepare("UPDATE posts SET postStatus=? WHERE id=?");
$stmt->bind_param('ss', $postStatus,$postid);
$stmt->execute();
$stmt->execute(); 
echo "Data updated successfully";
/* close statement */
$stmt->close(); 
}
?>