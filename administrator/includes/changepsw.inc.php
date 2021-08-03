<?php 
session_start();
include('../../conf/config.php');
ob_clean();

$oldpsw=$_POST['old-password'];
$newpsw=$_POST['new-password'];
$reppsw=$_POST['repeat-password'];
$myid = $_SESSION['id'];
if(!oldpswiscorrect($con,$oldpsw,$myid))
{
    echo "1";
}elseif(!preg_match("/^([a-z0-9]*[a-z0-9]){4}[a-z0-9]*$/i", $newpsw) ||  empty($newpsw) )
{
    echo $error="2";
}elseif(strcmp($newpsw, $reppsw) != 0)
{
    echo $error="3";
}else{
    updatepsw($con,$newpsw,$myid);
}

function  updatepsw($con,$newpsw,$myid)
{
    $date = new DateTime("now", new DateTimeZone('Europe/Belgrade') );
    $now=$date->format('Y-m-d H:i:s');
    $newpsw = password_hash($newpsw, PASSWORD_DEFAULT); 
$stmt = $con->prepare("UPDATE users SET password=?,lastupdated=? WHERE id=?");
$stmt->bind_param('ssi', $newpsw,$now, $myid);
$stmt->execute();
$stmt->execute(); 
echo "Data updated successfully";
/* close statement */
$stmt->close(); 
}

function oldpswiscorrect($con,$oldpsw,$myid)
{
    
    $result=false;
    $query = mysqli_query($con, "Select password from users where id='$myid'");
if (!$query) {
    die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
} else {
    $data2 = mysqli_fetch_array($query);
    if ($data2 > 0) {
        $dtbpassword=$data2['password'];
        if (password_verify($oldpsw, $dtbpassword)) {
            $result=true;
        }
    }
}
return $result;
}
