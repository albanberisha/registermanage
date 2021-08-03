<!------ Include the above in your HEAD tag ---------->
<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/loginform.js"></script>

</head>

<body>
<?php
session_start();
session_destroy();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" id="wide-class">
                <div class="panel panel-login">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                    <div class="alert alert-success text-center display-none" id="successRegister">
                                                <button class="close font-size-iframe" data-dismiss="alert"></button>
                                                Your account has been deactivated.
                                                <a href="index.php">Click here</a> to login.
                                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script type="text/javascript" src="http://www.google.com/jsapi?key=<YOUR_GOOGLE_API_KEY>"></script>
