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
    header('Location: ../index.php');
} 
ob_clean();
$myid = $_SESSION['id'];
$query = mysqli_query($con, "Select * from users where id='$myid'");
if (!$query) {
    die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
} else {
    $data2 = mysqli_fetch_array($query);
    if ($data2 > 0) {
        $email = $data2['email'];
        $password = $data2['password'];
    } else {
        echo "Hyrje e pa autorizuar";
        exit;
    }
}

$inputemail=$_POST['email'];
$inputpsw=$_POST['password'];
$explanation=$_POST['exp'];
if(strcmp($inputemail, $email) !== 0)
{
    echo $error="1";
} elseif(!password_verify($inputpsw, $password)) {
    echo $error="2";
}elseif(empty($explanation))
{
    echo $error="3";
}else{
    deactiveaccount($con,$myid,$explanation);
}
function deactiveaccount($con,$myid,$explanation)
{
    $date = new DateTime("now", new DateTimeZone('Europe/Belgrade') );
    $now=$date->format('Y-m-d H:i:s');

    $status="3";
    $stmt = $con->prepare("UPDATE users SET status=? WHERE id=?");
    $stmt->bind_param('si', $status,$myid);
    $stmt->execute();
    /* close statement */
    $stmt = $con->prepare("INSERT INTO deactivation(userId,reason,deacDateTime) VALUES(?,?,?)");
    $stmt->bind_param('sss', $myid,$explanation,$now);
    $stmt->execute();
    $stmt->close(); 

   echo "../accdeactivated.php";




}
?>