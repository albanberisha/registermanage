
<?php
session_start();
error_reporting(0);
include('../conf/config.php');
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
$query = mysqli_query($con, "Select * from users where id='$myid'");
if (!$query) {
    die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
} else {
    $data2 = mysqli_fetch_array($query);
    if ($data2 > 0) {
        $username = $data2['fname'];
        $usersurname = $data2['lname'];
        $acctype = $data2['acctype'];
        $profilephoto = $data2['photo'];
        $pofit = $data2['profit'];
    } else {
        echo "Hyrje e pa autorizuar";
        exit;
    }
}
//error_reporting($__error_reporting_level);
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <script type="text/javascript">
        var auto_refresh = setInterval(
            function() {
                $('#Recactive').load('includes/recactive.inc.php');
            }, 3000); // refresh every 10000 milliseconds
            window.onload = function() {
  //Check File API support
  if (window.File && window.FileList && window.FileReader) {
    var filesInput = document.getElementById("files");
    filesInput.addEventListener("change", function(event) {
      var files = event.target.files; //FileList object
      var output = document.getElementById("result");
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        //Only pics
        if (!file.type.match('image'))
          continue;
        var picReader = new FileReader();
        picReader.addEventListener("load", function(event) {
          var picFile = event.target;
          var div = document.createElement("div");
          div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
            "title='" + picFile.name + "'/>";
          output.insertBefore(div, null);
        });
        //Read the image
        picReader.readAsDataURL(file);
      }
    });
  } else {
    console.log("Your browser does not support File API");
  }
}
    </script>
    <style>
        
        .thumbnail {
    height: 200px;
    margin: 10px;
    /* width: 100%; */
}
    </style>

</head>

<body>
    <div class="wrapper">
        <header>
            <div class="container">
                <?php
                include("partials/header.php"); ?>
            </div>
        </header>
        <main>
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                                <div class="main-left-sidebar no-margin">
                                    <div class="user-data full-width">
                                        <div class="user-profile">
                                            <div class="username-dt">
                                                <div class="usr-pic">
                                                    <?php

                                                    if ($profilephoto == Null) {
                                                    ?>
                                                        <img class="imageback" src="images/empty-img.png" alt="">
                                                    <?php
                                                    } else {
                                                        echo '<img class="imageback" style="width: 70px;
                                                        height: 70px;
                                                        border-radius: 35px;"  src="../images/' . $profilephoto . '" />  ';
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                            <div class="user-specs">
                                                <h3 style="    word-break: break-all;">
                                                    <?php
                                                    echo htmlentities($username) . " " . htmlentities($usersurname)
                                                    ?></h3>
                                                <span>Account type:</span>
                                                <span class="bold-span"><?php echo htmlentities($acctype) ?></span>
                                            </div>
                                        </div>
                                        <ul class="user-fw-status">
                                            <li>
                                                <h4>Users</h4>
                                                <span>
                                                    <?php
                                                    $getusers = mysqli_query($con, "SELECT count(id) as totalusers
                                                    from users
                                                    where privilege='3' and status!='3'
                                                    ");
                                                    if (!$getusers) {
                                                        die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                                                    } else {
                                                        $datausers = mysqli_fetch_array($getusers);
                                                        if ($datausers > 0) {
                                                            echo $datausers['totalusers'];
                                                        } else {
                                                            echo "0";
                                                        }
                                                    }
                                                    ?>
                                                </span>
                                            </li>
                                            <li>
                                                <a href="my-profile-feed.php" title="">View Profile</a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="widget suggestions full-width">
                                    <div class="sd-title">
                                        <h3>Recent active users</h3>
                                    </div>
                                    <div id="Recactive" class="suggestions-list">
                                        <?php
                                        include("includes/recactive.inc.php");
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 no-pd">
                                <div class="post-topbar">
                                    <div class="">
                                        <?php

                                        if ($profilephoto == Null) {
                                        ?>
                                            <img class="imageback imgpost" src="images/empty-img.png" alt="">
                                        <?php
                                        } else {
                                            echo '<img class="imageback imgpost"  src="../images/' . $profilephoto . '" />  ';
                                        }
                                        ?>
                                    </div>
                                    <div   class="post-st">
                                        <ul>
                                            <li><a class="post_project" onclick="slide()" href="#" title="">Create Post</a></li>

                                        </ul>
                                    </div>
                                </div>
                               
                                <?php
                                $query = mysqli_query($con, "SELECT posts.id,users.fname,users.lname,users.countrykey,users.privilege,users.photo,posts.id,posts.userId,posts.text,posts.description,posts.postDate,posts.postTime,posts.boldkeywords,posts.underlinekeywords,posts.bulletpoint from users,posts where users.status!='3' and posts.userId=users.id and posts.postStatus!='2' ORDER BY posts.id DESC");
                                if (!$query) {
                                    die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                                } else {
                                    $count = 1;
                                    while (($datapost = mysqli_fetch_array($query))) {
                                ?>
                                        <div class="main-ws-sec">
                                            <div class="posts-section">
                                                <div class="post-bar">
                                                    <div class="post_topbar">
                                                        <div class="usy-dt">
                                                            
                                                            <?php
                                                            $postprofilephoto = $datapost['photo'];
                                                            if ($postprofilephoto == Null) {
                                                            ?>
                                                                <img class="scnd-userpic imageback" src="../images/empty-img.png" alt="">
                                                            <?php
                                                            } else {
                                                                echo '<img class="scnd-userpic imageback"  src="../images/' . $postprofilephoto . '" />  ';
                                                            }
                                                            ?>
                                                            <div class="usy-name">
                                                                <h3> <?php
                                                                        echo htmlentities($datapost['fname']) . " " . htmlentities($datapost['lname'])
                                                                        ?></h3>
                                                                <span><img src="images/clock.png" alt="">
                                                                    <?php
                                                                    echo htmlentities($datapost['postDate']) . " " . htmlentities($datapost['postTime'])
                                                                    ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="ed-opts">
                                                    <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options">
                                                    <?php
                                $key = "finanzefxAB";
                                $text = $datapost['id'];
                                $encrypted = bin2hex(openssl_encrypt($text, 'AES-128-CBC', $key));
                               
                                ?>
                                                        <li><a href="#" onclick="deletePost('<?php echo $encrypted ?>')" title="">Delete post</a></li>
                                                       
                                                       
                                                       <?php
                                                       /*
                                                                                                               <li><a href="#" class="post_project2" onclick="setActivePost('<?php echo $encrypted ?>')" title="">Attach images</a></li>

                                                        */
                                                       ?>
                                                    </ul>
                                                </div>
                                                    </div>
                                                    <div class="epi-sec">
                                                        <ul class="descp">
                                                            <li><img src="images/icon8.png" alt=""><span>
                                                                    <?php
                                                                    $postuserpriv = $datapost['privilege'];
                                                                    switch ($postuserpriv) {
                                                                        case '2':
                                                                            echo 'Admin';
                                                                            break;
                                                                        default:
                                                                            echo 'User';
                                                                    }
                                                                    ?>
                                                                </span></li>
                                                            <li><img src="images/icon9.png" alt=""><span><?php
                                                                                                            echo htmlentities($datapost['countrykey'])
                                                                                                            ?></span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="job_descp">
                                                        <h3 id="title-head"><?php
                                                                            echo htmlentities($datapost['text'])
                                                                            ?></h3>
                                                        <p><?php
                                                            $str = $datapost['description'];
                                                            $order   = array("\r\n", "\n", "\r");
                                                            $replace = '<br />';
                                                            $newstr = str_replace($order, $replace, $str);

                                                            $keywords  = $datapost['boldkeywords'];
                                                            $keywordsr = explode("  ", $keywords);


                                                            $rep = array();

                                                            for ($i = 0; $i <= count($keywordsr); $i++) {
                                                                $rep[$i] = "<span style='font-weight: 900;'>" . $keywordsr[$i] . "</span>";
                                                            }


                                                            $newphrase = str_replace($keywordsr, $rep, $newstr);



                                                            $keywords2  = $datapost['underlinekeywords'];
                                                            $keywordsr2 = explode("  ", $keywords2);
                                                            $rep2 = array();

                                                            for ($i = 0; $i <= count($keywordsr2); $i++) {
                                                                $rep2[$i] = "<span style='text-decoration: underline;'>" . $keywordsr2[$i] . "</span>";
                                                            }


                                                            $newphrase2 = str_replace($keywordsr2, $rep2, $newphrase);
                                                            $keywords3  = $datapost['bulletpoint'];
                                                            $keywordsr3 = explode("  ", $keywords3);
                                                            $rep3 = array();

                                                            for ($i = 0; $i <= count($keywordsr3); $i++) {
                                                                $rep3[$i] = "<span id='BulletPoint' ></span>";
                                                            }


                                                            $newphrase3 = str_replace($keywordsr3, $rep3, $newphrase2);
                                                            echo  $newphrase3;
                                                            ?></p>

                                                    </div>
                                                    <div class="">
                                                        <div class="gallery_pf">
                                                            <div class="row topmrg">


                                                                <?php
                                                                $postid = $datapost['id'];
                                                                $queryy = mysqli_query($con, "SELECT path,text from images where postId='$postid'");
                                                                if (!$queryy) {
                                                                    die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                                                                } else {
                                                                    while (($datapostt = mysqli_fetch_array($queryy))) {
                                                                ?>
                                                                        <div class="col-lg-6">
                                                                            <div class="gallery_pt ">
                                                                                <img src="../images/<?php echo $datapostt['path'] ?>" alt="" >
                                                                                <a href="../images/<?php echo $datapostt['path'] ?>" title=""><img src="images/all-out.png" alt=""></a>
                                                                            </div>
                                                                        </div>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                        $count++;
                                    }
                                }
                                ?>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="overview-box" id="create-portfolio">
            <div class="overview-edit">
                <h3>Create Portfolio</h3>
                <form>
                    <input type="text" name="pf-name" placeholder="Portfolio Name">
                    <div class="file-submit">
                        <input type="file" id="file">
                        <label for="file">Choose File</label>
                    </div>
                    <div class="pf-img">
                        <img src="images/resources/np.png" alt="">
                    </div>
                    <input type="text" name="website-url" placeholder="htp://www.example.com">
                    <button type="submit" class="save">Save</button>
                    <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div>
        </div>
                <div id="PostCreator" class="post-popup pst-pj">
                    <div class="post-project">
                        <h3>Create Post</h3>
                        <div id="PostField" class="post-project-fields">
                            <form id="createpost-form" enctype="multipart/form-data" method="post">
                                <div class="row overview-edit">
                                    <div class="col-lg-12">
                                        <span id="TextError" class="help-block font-size-iframe " style="float: left;"></span>
                                        <input type="text"  placeholder="Header text" name="headerText" id="headerText">
                                    </div>
                                    <div class="col-lg-12">
                                        <span id="BulletPoint2" class="help-block font-size-iframe " style="float: left;">Type (POINT) before text to add a bullet point &nbsp;<span id="BulletPoint">.</span></span>
                                        <textarea  placeholder="Description" name="Description" id="Description"></textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <span id="BoldKeyword" class="help-block font-size-iframe " style="float: left;">Keywords are seperated by double space. &nbsp;</span>
                                        <span id="BoldKeyword2" class="help-block font-size-iframe" style="float: left;"> Every keyword will be<span class="bold3">&nbsp; bold.</span></span>
                                        <input type="text"  name="Keywords" id="Keywords" placeholder="ex. EURO  $  AVG and Dollar">

                                    </div>

                                    <div class="col-lg-12">
                                        <span id="UnderlineKeyword" class="help-block font-size-iframe " style="float: left;">Underline keywords are seperated by double space. &nbsp;</span>
                                        <span id="UnderlineKeyword2" class="help-block font-size-iframe" style="float: left;"> Every keyword will be &nbsp;<span class="underline3"> underlined.</span></span>

                                        <input type="text"  name="Keywords2" id="Keywords2" placeholder="ex. Listed items  average profit">

                                    </div>
                                    <span id="AttachphotoError" class="help-block font-size-iframe " style="float: left;">Attach photo to post</span>
                                    <div class="file-submit col-lg-12">

                              
                                        <input id='files' name="files[]" type='file' multiple/>
                                        <label for="files">Choose File</label>
                                        

                                    </div>
                                    <div class="col-lg-12">
                                    <output id='result' />
                                    </div>
                                    
                                  
                                    <div class="col-lg-12">
                                        <ul>
                                            <li style="width: 100%;"><button class="active" style="width: 100%;" type="submit">Post</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="#" title=""><i class="la la-times-circle-o"></i></a>
                    </div>
                </div>
                <?php
                /* <div class="post-popup pst-pj2">
                    <div class="post-project">
                        <h3>Create Post</h3>
                        <div id="PostField" class="post-project-fields">
                            <form id="attachfile-form" enctype="multipart/form-data" method="post">
                                <div class="row overview-edit">
                                    <span id="AttachphotoError2" class="help-block font-size-iframe " style="float: left;">Attach photo to post</span>
                                    <div class="file-submit col-lg-12">

                                        <input type="file" id="fileattach" name="fileattach">
                                        <label for="file">Choose File</label>
                                    </div>
                                    <div class="col-lg-12">
                                        <ul>
                                            <li style="width: 100%;"><button class="active" style="width: 100%;" type="submit">Add</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="#" title=""><i class="la la-times-circle-o"></i></a>
                    </div>
                </div>*/
                ?>
                
        </main>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
    <script type="text/javascript" src="lib/slick/slick.min.js"></script>
    <script type="text/javascript" src="js/scrollbar.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>

<script>
    $("#createpost-form").submit(function(e) {
        e.preventDefault();

        document.getElementById("AttachphotoError").style.color = "black";


        $('#TextError').html("");
        $('#AttachphotoError').html("Attach photo to post");

        var myform = document.getElementById("createpost-form");
        var fd = new FormData(myform);
        $.ajax({
                url: "includes/createpost.inc.php",
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST'
            })
            .done(function(response) {
                $message = "";
                resp = response.split(" ").join("");
                switch (resp) {
                    case "1":
                        $message = "Please enter header text";
                        document.getElementById("TextError").style.color = "red";
                        $('#TextError').html($message);
                        var element = document.getElementById("TextError");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                            inline: "nearest"
                        });
                        break;
                        case "2":
                            document.getElementById('createpost-form').reset();
                            $('#result').html("");
                        $message = "Unauthorized format or too big image";
                        document.getElementById("AttachphotoError").style.color = "red";
                        $('#AttachphotoError').html($message);
                        var element = document.getElementById("AttachphotoError");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                            inline: "nearest"
                        });
                        break;
                    default:
                        window.location.reload(true)
                }
            });
        return false;
    });

    function deletePost($id)
    {
            $.ajax({
                    method: "POST",
                    url: "includes/deletepost.inc.php",
                    data: {
                        postid: $id
                    }
                })
                .done(function(response) {
                    if (response == "error") {
                      alert("Unauthorized delete");
                    } else {
                        window.location.reload(true)
                    }
                });
            return false;
        } 
        activepost="";
        function setActivePost($id)
        {
            activepost=$id;
        }


        $("#attachfile-form").submit(function(e) {
        e.preventDefault();
        postid=activepost;
        document.getElementById("AttachphotoError2").style.color = "black";

        $('#AttachphotoError2').html("Attach photo to post");

        var myform = document.getElementById("attachfile-form");
        var fd = new FormData(myform);
        fd.append( 'postid', postid );
        $.ajax({
                url: "includes/attachphoto.inc.php",
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST'
            })
            .done(function(response) {
                $message = "";
                alert(response);
                resp = response.split(" ").join("");
                switch (resp) {
                        case "1":
                        $message = "Unauthorized format or too big image";
                        document.getElementById("AttachphotoError2").style.color = "red";
                        $('#AttachphotoError2').html($message);
                        var element = document.getElementById("AttachphotoError2");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                            inline: "nearest"
                        });
                        break;
                    default:
                        alert(response);
                        //window.location.reload(true)
                }
            });
        return false;
    });

function slide()
{
    var element = document.getElementById("PostCreator");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "center",
                            inline: "nearest"
                        });
}
</script>