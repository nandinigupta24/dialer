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

        <title>Re-Login | Agent</title> 

        <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

        <!-- Bootstrap extend-->
        <link rel="stylesheet" href="../assets/css/bootstrap-extend.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="../assets/css/master_style.css">

        <!-- Fab Admin skins -->
        <link rel="stylesheet" href="../assets/css/skins/_all-skins.css">
        <link rel="icon" href="../assets/images/favicon.ico" >
    </head>
    <!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
    <body class="hold-transition login-page">
        <!-- Site wrapper -->
        <div style="background:rgb(0, 0, 0, 0.5); width:100%; height:100%;">
            <div id="intro" >
                <div class="container h-p100">
                    <div class="row align-items-center justify-content-md-center h-p100">
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="login-box">

                                <div class="login-box-body">
                                    <div class="row" style="margin:0px 0 20px;">
                                        <div class="col-md-12">
                                            <img src="../assets/images/logo/logo.png" class=" mb-20"/>
                                            <h3 class="text-center text-warning">AGENT LOGIN</h3></div>
                                    </div>
                                    <hr class="bg-warning" style="margin:1rem auto;"/>
                                    <form name="vicidial_form" id="vicidial_form" action="<?php echo $agcPAGE; ?>" method="post">
                                        <input type="hidden" name="DB" id="DB" value="0" />
                                        <input type="hidden" name="JS_browser_height" id="JS_browser_height" value="" />
                                        <input type="hidden" name="JS_browser_width" id="JS_browser_width" value="" />
                                        <input type="hidden" name="VD_login" id="VD_login" value="<?php echo @$_GET['VD_login']; ?>" />
                                        <input type="hidden" name="VD_pass" id="VD_pass" value="<?php echo @$_GET['VD_pass']; ?>" />
                                        <?php if(!empty($_SESSION['CurrentLogin']['auto_enable']) && $_SESSION['CurrentLogin']['auto_enable'] == 'Y'){?>
                                        <p class="text-center text-success"><b><?php echo $_SESSION['CurrentLogin']['full_name'];?> is auto phone enabled<br>(<?php echo $_SESSION['CurrentLogin']['phone_login'];?>)</b></p>
                                        <input type="hidden" name="phone_login" value="<?php echo $_SESSION['CurrentLogin']['phone_login'];?>"/>
                                        <input type="hidden" name="phone_pass" value="<?php echo $_SESSION['CurrentLogin']['phone_pass'];?>"/>
                                        <?php }else{?>
                                        <div class="form-group has-feedback">
                                            <input type="text" class="form-control rounded" placeholder="Phone Login" name="phone_login" value="<?php echo @$_GET['phone_login']; ?>"/>
                                            <span class="ion ion-email form-control-feedback"></span>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <input type="password" class="form-control rounded" placeholder="Phone Password" name="phone_pass" value="<?php echo @$_GET['phone_login']; ?>"/>
                                            <span class="ion ion-locked form-control-feedback"></span>
                                        </div>
                                        <?php }?>
<!--                                        <div class="form-group has-feedback">
                                            <input type="text" class="form-control rounded" placeholder="Phone Login" name="phone_login" value="<?php echo @$_GET['phone_login']; ?>"/>
                                            <span class="ion ion-email form-control-feedback"></span>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <input type="password" class="form-control rounded" placeholder="Phone Password" name="phone_pass" value="<?php echo @$_GET['phone_pass']; ?>"/>
                                            <span class="ion ion-locked form-control-feedback"></span>
                                        </div>-->
                                        <div class="form-group has-feedback" id="LogiNCamPaigns">
                                            <?php echo $camp_form_code; ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn btn-info btn-block margin-top-10">LOG IN</button>
                                                <span id="LogiNReseT">
                                                    <button type="button" class="btn btn-warning btn-block margin-top-10" onClick="login_allowable_campaigns();">Refresh Campaign List</button>
                                                </span>
                                                <h4 style="margin-top:10px; color:#fff">Logged in as <strong class="text-blue"><?php echo $_SESSION['CurrentLogin']['full_name']; ?></strong> <a href="/utgone/logout" class="text-warning ml-5">Log Out</a></h4>
                                       
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
        <script type='text/javascript' src="../assets/demo.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>		
        <script src="plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript">

                                                        <!-- 
        var BrowseWidth = 0;
                                                        var BrowseHeight = 0;

                                                        function browser_dimensions()
                                                        {
<?php
if (preg_match('/MSIE/', $browser)) {
    echo "	if (document.documentElement && document.documentElement.clientHeight)\n";
    echo "			{BrowseWidth = document.documentElement.clientWidth;}\n";
    echo "		else if (document.body)\n";
    echo "			{BrowseWidth = document.body.clientWidth;}\n";
    echo "		if (document.documentElement && document.documentElement.clientHeight)\n";
    echo "			{BrowseHeight = document.documentElement.clientHeight;}\n";
    echo "		else if (document.body)\n";
    echo "			{BrowseHeight = document.body.clientHeight;}\n";
} else {
    echo "BrowseWidth = window.innerWidth;\n";
    echo "		BrowseHeight = window.innerHeight;\n";
}
?>

                                                            document.vicidial_form.JS_browser_width.value = BrowseWidth;
                                                            document.vicidial_form.JS_browser_height.value = BrowseHeight;
                                                        }

                                                        // ################################################################################
                                                        // Send Request for allowable campaigns to populate the campaigns pull-down
                                                        function login_allowable_campaigns()
                                                        {
                                                            //	alert(document.vicidial_form.JS_browser_width.value + '|' + BrowseWidth + '|' + document.vicidial_form.JS_browser_height.value + '|' + BrowseHeight);
                                                            var xmlhttp = false;
                                                            /*@cc_on @*/
                                                            /*@if (@_jscript_version >= 5)
                                                             // JScript gives us Conditional compilation, we can cope with old IE versions.
                                                             // and security blocked creation of the objects.
                                                             try {
                                                             xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                                                             } catch (e) {
                                                             try {
                                                             xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                             } catch (E) {
                                                             xmlhttp = false;
                                                             }
                                                             }
                                                             @end @*/
                                                            if (!xmlhttp && typeof XMLHttpRequest != 'undefined')
                                                            {
                                                                xmlhttp = new XMLHttpRequest();
                                                            }
                                                            if (xmlhttp)
                                                            {
                                                                logincampaign_query = "&user=" + document.vicidial_form.VD_login.value + "&pass=" + document.vicidial_form.VD_pass.value + "&ACTION=LogiNCamPaigns&format=html";
                                                                xmlhttp.open('POST', 'vdc_db_query.php');
                                                                xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
                                                                xmlhttp.send(logincampaign_query);
                                                                xmlhttp.onreadystatechange = function ()
                                                                {
                                                                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                                                                    {
                                                                        Nactiveext = null;
                                                                        Nactiveext = xmlhttp.responseText;
                                                                        //	alert(logincampaign_query);
                                                                        //	alert(xmlhttp.responseText);
                                                                        document.getElementById("LogiNCamPaigns").innerHTML = Nactiveext;
//                                                                document.getElementById("LogiNReseT").innerHTML = "<input class='btn btn-primary' type=\"button\" value=\"Refresh Campaign List\" onclick=\"login_allowable_campaigns()\" />";
                                                                        document.getElementById("VD_campaign").focus();
                                                                    }
                                                                }
                                                                delete xmlhttp;
                                                            }
                                                        }
                                                        // -->
        </script>
    </body>
</html>
