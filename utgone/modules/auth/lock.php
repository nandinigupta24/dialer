<?php
$_SESSION['CurrentLogin']['revertUrl'];
if (!empty($_POST['Submit']) && $_POST['Submit'] == 'Submit') {
    $Username = $_SESSION['Login']['user'];
    $Password = $_POST['password'];
    $auth_message = user_authorization($Username, $Password, 'TEST-LOGIN', 1);
    if ($auth_message == 'GOOD') {
      $_SESSION['CurrentLogin']['Lock'] = 1;
      $url = $_SESSION['CurrentLogin']['revertUrl'];
      header('location: '.$url);
      unset($_SESSION['CurrentLogin']['revertUrl']);
      exit;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="4q3RXCOhkMnWw1Cr4ZMigFOlcrWbsyhHZxRSshBc">
        <!-- <link rel="icon" href="../../../images/favicon.ico"> -->

        <title>Lock | UTGONE</title>

        <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

        <!-- Bootstrap extend-->
        <link rel="stylesheet" href="../assets/css/bootstrap-extend.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="../assets/css/master_style.css">

        <!-- Fab Admin skins -->
        <link rel="stylesheet" href="../assets/css/skins/_all-skins.css">
        <link rel="icon" href="../assets/images/favicon.ico">
    </head>
    <!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
    <body class="hold-transition login-page">
        <!-- Site wrapper -->
        <div  style="background:rgb(0, 0, 0, 0.5); width:100%; height:100%;" id="">
            <div id="intro">
                <div class="container h-p100">
                    <div class="row align-items-center justify-content-md-center h-p100">
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="login-box">
                                <div class="login-box-body">
                                    <div class="row" style="margin:0px 0 20px;">
                                        <div class="col-md-12">
                                            <img src="../assets/images/logo/logo.png" class=" mb-20"/>
                                            <h3 class="text-center text-warning">Lock Screen</h3></div>
                                    </div>

                                    <hr class="bg-warning" style="margin:1rem auto;"/>
                                    <form id="login-form" class="form" action="" method="post" autocomplete="">
                                        <div class="form-group has-feedback" id="LogiNCamPaigns">
                                          <input type="password" class="form-control rounded" placeholder="Password"  name="password" required=""/>

                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn btn-info btn-block margin-top-10" name="Submit" value="Submit">LOG IN</button>
<!--                                                <span id="LogiNReseT">
                                                    <button type="button" class="btn btn-warning btn-block margin-top-10" onclick="login_allowable_campaigns();">Refresh Campaign List</button>
                                                </span>-->
                                                <h4 style="margin-top:10px; color:#fff">Logged in as <strong class="text-blue ml-5"><?php echo $_SESSION['CurrentLogin']['full_name']; ?></strong> <a href="/utgone/logout" class="text-warning ml-5">Log Out</a></h4>

                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </form>

                                </div>
                                <!-- /.login-box-body -->
                            </div>
                            <!-- /.login-box -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./wrapper -->

       <script src="../assets/vendor_components/jquery/dist/jquery.min.js"></script>
        <!-- popper -->
        <script src="../assets/vendor_components/popper/dist/popper.min.js"></script>
        <!-- Bootstrap 4.0-->
        <script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../assets/jquery.particleground.js"></script>
        <script type='text/javascript' src="../assets/demo.js"></script>
    </body>
</html>
