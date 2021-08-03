<?php 
session_start();
include('../../conf/config.php');
ob_clean();

$name=ucfirst(strtolower($_POST['Firstname']));
$surname =ucfirst(strtolower($_POST['Lastname']));
$myid = $_SESSION['id'];
if(isset($_POST['gender']))
{
    $gender = $_POST['gender'];
}else{
    $gender=NULL;
}
$phnext = $_POST['PhoneExtension'];
$phnextfull = $_POST['Phone'];

if (empty($name)) {
    echo $error = "1";
}elseif(empty($surname)) {
    echo $error = "2";
}elseif(empty($phnext) ||empty($phnextfull) )
{
    echo $error="3";
}else{
    saveData($con,$name,$surname,$phnext,$phnextfull,$gender,$myid);
}


function saveData($con,$name,$surname,$phnext,$phnextfull,$gender,$myid)
{
    $date = new DateTime("now", new DateTimeZone('Europe/Belgrade') );
    $now=$date->format('Y-m-d H:i:s');


    $privilege="3";
    $status="1";
$phone=$phnext." ".$phnextfull;


$stmt = $con->prepare("UPDATE users SET fname=?,lname=?,phone=?,gender=?,lastupdated=? WHERE id=?");
$stmt->bind_param('sssssi', $name,$surname,$phone,$gender,$now, $myid);
$stmt->execute();
$stmt->execute(); 
echo "Data updated successfully";
/* close statement */
$stmt->close();  

}

function checkemailexistence($con,$email)
{
    $status=3;
         $exists=true;
            if ($stmt = $con->prepare('SELECT * FROM users WHERE email= ? and status!= ?')) {
                // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
                $stmt->bind_param('si',$email,$status);
                $stmt->execute();
                // Store the result so we can check if the account exists in the database.
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $exists=true;
                } else {
                    $exists=false;
                }
            } else {
            }
        $stmt->close();
        return $exists;
}


