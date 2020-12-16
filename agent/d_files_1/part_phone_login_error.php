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

        <title>Phone Login Error | Agent</title> 

        <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

        <!-- Bootstrap extend-->
        <link rel="stylesheet" href="../assets/css/bootstrap-extend.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="../assets/css/master_style.css">

        <!-- Fab Admin skins -->
        <link rel="stylesheet" href="../assets/css/skins/_all-skins.css">
    </head>
    <!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
    <body class="hold-transition login-page">
        <!-- Site wrapper -->
        <div id="particles">
            <div id="intro">
                <div class="container h-p100">
                    <div class="row align-items-center justify-content-md-center h-p100">
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="login-box">
                                <div class="login-box-body">
                                    <div class="row" style="margin:20px 0;">
                                        <div class="col-md-4"><img src="../assets/images/logonew.png"/></div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-6"><h3 class="text-center text-warning">AGENT LOGIN</h3></div>
                                    </div>
                                    <hr class="bg-warning"/>
                                    <div class="alert alert-danger">Sorry, your phone login and password are not active in this system, please try again</div>
                                    <form name="vicidial_form" id="vicidial_form" action="<?php echo $agcPAGE; ?>" method="post">
                                        <input type="hidden" name="DB" value="<?php echo $DB; ?>">
                                        <input type="hidden" name="JS_browser_height" value="" />
                                        <input type="hidden" name="JS_browser_width" value="" />
                                        <input type="hidden" name="VD_login" value="<?php echo $VD_login; ?>" />
                                        <input type="hidden" name="VD_pass" value="<?php echo $VD_pass; ?>" />
                                        <input type="hidden" name="VD_campaign" value="<?php echo $VD_campaign; ?>" />
                                        <div class="form-group has-feedback">
                                            <input type="text" class="form-control rounded" placeholder="Phone Login" name="phone_login">
                                            <span class="ion ion-email form-control-feedback"></span>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <input type="password" class="form-control rounded" placeholder="Phone Password" name="phone_pass">
                                            <span class="ion ion-locked form-control-feedback"></span>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn btn-info btn-block margin-top-10">LOG IN</button>

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