<?php 
session_start();
include('../../conf/config.php');
ob_clean();
$cntrykey = $_POST['CountryKey'];
$myid = $_SESSION['id'];
echo $cntrykey;
saveData($con,$cntrykey,$myid);



function saveData($con,$cntrykey,$myid)
{
 
$stmt = $con->prepare("UPDATE users SET countrykey=? WHERE id=?");
$stmt->bind_param('si', $cntrykey, $myid);
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


