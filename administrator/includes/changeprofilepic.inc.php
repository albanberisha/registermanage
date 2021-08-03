<?php 
session_start();
// Change this to your connection info.
include ('../../conf/config.php');
ob_end_clean();
$myid = $_SESSION['id'];
$date2 = new DateTime("now", new DateTimeZone('Europe/Belgrade') );
		$now=$date2->format('Y-m-d H:i:s');
		$date =$date2->format('Y-m-d');
		$time =$date2->format('H:i:s');

$profilephoto=$_FILES['file']['tmp_name'];
if(!empty($profilephoto))
{
    $profilephoto=file_get_contents($_FILES['file']['tmp_name']);
    $fileType = $_FILES['file']['type'];

    $userfile_name = $_FILES['file']['name'];
$userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);

    if (($fileType != 'image/png' && $fileType != 'image/gif' && $fileType != 'image/jpeg' && $fileType != 'image/jpg') || $_FILES['file']['size'] > 10485760) {
        echo $error="2";
    }
    else{
        $userfile_name2="imgprof".$date.$userfile_name;
        file_put_contents('../../images/imgprof'.$date.$userfile_name, $profilephoto);

        $stmt = $con->prepare("UPDATE users SET photo=? WHERE id=?");
$stmt->bind_param('si', $userfile_name2, $myid);
$stmt->execute();
echo $userfile_name2;
    }
}else{
    echo "1";
}

?>