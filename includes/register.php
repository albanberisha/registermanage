<?php 
session_start();
include('../conf/config.php');
ob_clean();


$ipAddress=$_POST['ipAddress'];
$continentCode=$_POST['continentCode'];
$continentName=$_POST['continentName'];
$countryCode=$_POST['countryCode'];
$countryName=$_POST['countryName'];
$stateProv=$_POST['stateProv'];
$city=$_POST['city'];
$name=ucfirst(strtolower($_POST['Firstname']));
$surname =ucfirst(strtolower($_POST['Lastname']));
$email = $_POST['Email'];
$psw = $_POST['Password'];
$cpsw = $_POST['Confirmpassword'];
$cntrykey = $_POST['CountryKey'];
$phnext = $_POST['PhoneExtension'];
$phnextfull = $_POST['Phone'];
$acctype = $_POST['AccountTypeKey'];
if(isset($_POST['HasAcceptedTerms']))
{
    $cond1 = $_POST['HasAcceptedTerms'];
}else{
    $cond1=false;
}
if(isset($_POST['HasAcceptedRiskDisclaimer']))
{
    $cond2 = $_POST['HasAcceptedRiskDisclaimer'];
}else{
    $cond2=false;
}
if(isset($_POST['gender']))
{
    $gender = $_POST['gender'];
}else{
    $gender=NULL;
}

if (empty($name)) {
    echo $error = "1";
}elseif(empty($surname)) {
    echo $error = "2";
}elseif(!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $email))
{
    echo $error="3";
}elseif(checkemailexistence($con,$email)){
    ob_clean();
    echo $error="4";
}elseif(!preg_match("/^([a-z0-9]*[a-z0-9]){4}[a-z0-9]*$/i", $psw) ||  empty($psw) )
{
    echo $error="5";
}elseif(strcmp($psw, $cpsw) != 0)
{
    echo $error="6";
}elseif($cntrykey==-1)
{
    echo $error="7";
}elseif(empty($phnext) ||empty($phnextfull) )
{
    echo $error="8";
}elseif($acctype==-1 )
{
    echo $error="9";
}elseif(empty($cond1) )
{
    echo $error="10";
}elseif(empty($cond2) )
{
    echo $error="11";
}else{
    saveData($con,$name,$surname,$email,$psw,$cntrykey,$phnext,$phnextfull,$gender,$acctype,$ipAddress,$continentCode,$continentName,$countryCode,$countryName,$stateProv,$city);
}


function saveData($con,$name,$surname,$email,$psw,$cntrykey,$phnext,$phnextfull,$gender,$acctype,$ipAddress,$continentCode,$continentName,$countryCode,$countryName,$stateProv,$city)
{
    $date = new DateTime("now", new DateTimeZone('Europe/Belgrade') );
    $now=$date->format('Y-m-d H:i:s');

    $privilege="3";
    $status="1";
    $hashed_password = password_hash($psw, PASSWORD_DEFAULT); 
$phone=$phnext." ".$phnextfull;
    $stmt = $con->prepare('INSERT INTO users(fname,lname,email,password,countrykey,phone,gender,acctype,regdate,ipAddress,continentCode,continentName,countryCode,countryName,stateProv,city,status,privilege) 
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$stmt->bind_param('ssssssssssssssssss', $name,$surname,$email,
$hashed_password,$cntrykey,$phone,$gender,$acctype,$now,$ipAddress,$continentCode
,$continentName,$countryCode,$countryName,$stateProv,$city,$status,$privilege);
$stmt->execute(); 
//echo "Error: %s.\n".$stmt->error;

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


