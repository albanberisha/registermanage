<?php 
session_start();
include('../../conf/config.php');
ob_clean();
$profit = $_POST['Income'];



if (isset($_POST['useridhash'])) {
    $userhashid = $_POST['useridhash'];
  
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
        saveData($con,$userid,$profit);
    }else{
        echo "1";
        exit;
    }
  }

function saveData($con,$userid,$profit)
{
 
$stmt = $con->prepare("UPDATE users SET profit=? WHERE id=?");
$stmt->bind_param('si', $profit, $userid);
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


