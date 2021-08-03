<?php 
session_start();
// Change this to your connection info.
include ('../../conf/config.php');
ob_end_clean();
$myid = $_SESSION['id'];
        $headerText=$_POST['headerText'];
     
        $Description=$_POST['Description'];

        $Keywords=$_POST['Keywords'];
        $Keywords2=$_POST['Keywords2'];
$postphoto=$_FILES['files']['tmp_name'];
if(empty($headerText))
{
    echo $error="1";
}elseif(!empty($_FILES['files']['tmp_name'][0]))
{
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
        $fileType = $_FILES['files']['type'][$key];
        if (($fileType != 'image/png' && $fileType != 'image/gif' && $fileType != 'image/jpeg' && $fileType != 'image/jpg') || $_FILES['files']['size'][$key] > 10485760) {
            echo $error="2";
            exit;
        }
    }
    $date2 = new DateTime("now", new DateTimeZone('Europe/Belgrade') );
    $now=$date2->format('Y-m-d H:i:s');
    $date =$date2->format('Y-m-d');
    savedata($con,$myid,$headerText,$Description,$Keywords,$Keywords2);
    $query = mysqli_query($con, "SELECT id from posts 
    order by id DESC
    LIMIT 1");
if (!$query) {
    die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
}else {
    $data2 = mysqli_fetch_array($query);
            if ($data2 > 0) {
                $postid = $data2['id'];
                $stmt = $con->prepare('INSERT INTO images(postId,path) 
                VALUES(?,?)');
                foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
                    $postphoto=file_get_contents($_FILES['files']['tmp_name'][$key]);
                    $fileType = $_FILES['files']['type'][$key];

                    $userfile_name = $_FILES['files']['name'][$key];
                    $userfile_name2="imgpost".$date.$userfile_name;
                   file_put_contents('../../images/imgpost'.$date.$userfile_name, $postphoto);
       
       
                    $stmt->bind_param('is', $postid,$userfile_name2);
                    $stmt->execute(); 
    //echo "Error: %s.\n".$stmt->error;
    /* close statement */

   
                }
                $stmt->close();
            }else {
                echo "Hyrje e pa autorizuar";
                exit;
            }
}










/* 
    $postphoto=file_get_contents($_FILES['file']['tmp_name']);
    $fileType = $_FILES['file']['type'];

    $userfile_name = $_FILES['file']['name'];
$userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);

    if (($fileType != 'image/png' && $fileType != 'image/gif' && $fileType != 'image/jpeg' && $fileType != 'image/jpg') || $_FILES['file']['size'] > 10485760) {
        echo $error="2";
    }
    else{
        savedata($con,$myid,$headerText,$Description,$Keywords,$Keywords2);

        $query = mysqli_query($con, "SELECT id from posts 
        order by id DESC
        LIMIT 1");
if (!$query) {
    die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
} else {
    $data2 = mysqli_fetch_array($query);
    if ($data2 > 0) {
        $date2 = new DateTime("now", new DateTimeZone('Europe/Belgrade') );
		$now=$date2->format('Y-m-d H:i:s');
		$date =$date2->format('Y-m-d');
        $postid = $data2['id'];
        $userfile_name2="imgpost".$date.$userfile_name;
        file_put_contents('../../images/imgpost'.$date.$userfile_name, $postphoto);
       
        $stmt = $con->prepare('INSERT INTO images(postId,path) 
        VALUES(?,?)');
    $stmt->bind_param('is', $postid,$userfile_name2);
    $stmt->execute(); 
    //echo "Error: %s.\n".$stmt->error;
    /* close statement */

    /*
    $stmt->close();

    } else {
        echo "Hyrje e pa autorizuar";
        exit;
    }
    
}
   
    }*/
}else{
    savedata($con,$myid,$headerText,$Description,$Keywords,$Keywords2);
}

function savedata($con,$myid,$headerText,$Description,$Keywords,$Keywords2)
{
    $date2 = new DateTime("now", new DateTimeZone('Europe/Belgrade') );
		$now=$date2->format('Y-m-d H:i:s');
		$date =$date2->format('Y-m-d');
		$time =$date2->format('H:i:s');
$postStatus='1';
$bulletpoint='(POINT)';
    $stmt = $con->prepare('INSERT INTO posts(userId,text,description,postDate,postTime,postStatus,boldkeywords,underlinekeywords,bulletpoint) 
    VALUES(?,?,?,?,?,?,?,?,?)');
$stmt->bind_param('issssssss', $myid,$headerText,$Description,
$date,$time,$postStatus,$Keywords,$Keywords2,$bulletpoint);
$stmt->execute(); 
//echo "Error: %s.\n".$stmt->error;
/* close statement */
$stmt->close();

}
