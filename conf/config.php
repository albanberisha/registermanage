<?php
$hostname     = "localhost"; // Enter Your Host Name
$username     = "root";      // Enter Your Table username
$password     = "";          // Enter Your Table Password
$databasename = "profitmanagement"; // Enter Your database Name


$con = new mysqli($hostname, $username, $password, $databasename);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}


?>

