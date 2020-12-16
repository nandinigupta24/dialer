<?php
$adminInterfaceEnable = 0;
if (!empty($_SESSION['CurrentLogin']['view_reports']) && $_SESSION['CurrentLogin']['view_reports'] == 1) {
    $adminInterfaceEnable = 1;
}

if (!empty($_SESSION['CurrentLogin']['admin_interface_enable']) && $_SESSION['CurrentLogin']['admin_interface_enable'] == 1) {
    $adminInterfaceEnable = 1;
}

if (!empty($_SESSION['CurrentLogin']['user_level']) && $_SESSION['CurrentLogin']['user_level'] == 1 && $adminInterfaceEnable == 0) {
    if($_GET['plan'] != 'expired'){
        header('location:../agent');
        exit;
    }
}

//pr($_SESSION);
//exit;
#id = SEO0038
if(!empty($_SESSION['CurrentLogin']['user']) && in_array($_SESSION['CurrentLogin']['user'],['SEO0038','SEO0039'])){
        header('location:../reports/call/recordings');
        exit;  
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
        <link rel="icon" href="../assets/images/favicon.ico">

        <title>Welcome Page | UTG</title>

        <!-- Bootstrap 4.0-->
        <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

        <!-- Bootstrap extend-->
        <link rel="stylesheet" href="../assets/css/bootstrap-extend.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="../assets/css/master_style.css">

        <!-- Fab Admin skins -->
        <link rel="stylesheet" href="../assets/css/skins/_all-skins.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="hold-transition login-page">

        <div style="background:rgb(0, 0, 0, 0.5); width:100%; height:100%;">
            <div id="intro">
                <div class="container h-p100">

                    <div class="row align-items-center justify-content-md-center h-p100">

                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="login-box">
                                <div class="login-box-body">
                                    <div class="row" style="margin:0px 0 20px;">
                                        <div class="col-md-12">
                                            <img src="../assets/images/logo/logo.png" class=" mb-20"/>
                                            <h3 class="text-center text-warning">SYSTEM LOGIN</h3></div>
                                    </div>
                                    <?php if(!empty($_SESSION['CurrentLogin']['admin_interface_enable']) && $_SESSION['CurrentLogin']['admin_interface_enable'] == 1){  ?>
                                    <a class="btn btn-app1 btn-info" href="<?php echo base_url('campaigns') ?>" title="Admin">
                                        <i class="fa fa-gears"></i>
                                    </a>
                                    <?php } ?>
                                    <a class="btn btn-app1 btn-success" href="../agent" title="Agent">
                                        <i class="fa fa-phone"></i>
                                    </a>
                                    <?php if (!empty($_SESSION['CurrentLogin']['view_reports']) && $_SESSION['CurrentLogin']['view_reports'] == 1) { ?>
                                        <a class="btn btn-app1 btn-danger" href="/reports/outbound/summary" title="Report">
                                            <i class="fa fa-bar-chart"></i>
                                        </a>
                                    <?php } ?>
                                    <!-- /.login-box-body -->
                                    <div class="row">
                                        <div class="col-12 text-center margin-top-30">
                                            <h4 style="color:#fff">Logged in as <strong class="text-blue"><?php echo $_SESSION['CurrentLogin']['full_name']; ?></strong> <a href="<?php echo base_url('logout') ?>" class="text-warning ml-5">Log Out</a></h4>
                                        </div>
                                    </div>
                                    <!-- /.login-box -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- particles.js container -->
            <?php if(!empty($_GET['plan']) && $_GET['plan'] == 'expired'){?>
                <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger myadmin-alert-top alerttop" style="display:block;"> 
                    <i class="ti-user"></i> 
                    Your plan has been expired,so you can not login as agent
                </div>
            <!--<div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger myadmin-alert-bottom alertbottom" style="display:block;"> <i class="ti-user"></i> This is an example top alert. You can edit what u wish. <a href="#" class="closed">&times;</a> </div>-->
            <?php }?>
            <?php if(!empty($_GET['plan']) && $_GET['plan'] == 'more_agent'){?>
                <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger myadmin-alert-top alerttop" style="display:block;"> 
                    <i class="ti-user"></i> 
                    Your plan has no more agent login permission!!
                </div>
            <!--<div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger myadmin-alert-bottom alertbottom" style="display:block;"> <i class="ti-user"></i> This is an example top alert. You can edit what u wish. <a href="#" class="closed">&times;</a> </div>-->
            <?php }?>
            <!-- jQuery 3 -->
            <script src="../assets/vendor_components/jquery/dist/jquery.min.js"></script>

            <!-- popper -->
            <script src="../assets/vendor_components/popper/dist/popper.min.js"></script>

            <!-- Bootstrap 4.0-->
            <script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <script type='text/javascript' src='../assets/demo.js'></script>

    </body>
</html>
