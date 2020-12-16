
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>		
	<script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
     <script src="plugins/node-waves/waves.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/demo.js"></script>
	<style>div.noscroll_script {
    min-height: 500px;
    overflow: auto;
    font-size: 12px;}
	.form-control{
	border: 1px solid #66afe9;
	}
	.card{
	border: 5px solid #ffc107;
	}
	#leftsidebar{
	border-right: 5px solid #ffc107;
	}
	#rightsidebar{
	border-left: 5px solid #ffc107;
	}
        #DispoSelectContent a:focus { 
            background-color: #1f91f3 !important;
            color:#fff !important;
        }
        #DispoSelectContent a:hover { 
            background-color: #1f91f3 !important;
            color:#fff !important;
        }
</style>
    <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<title>"._QXZ("Agent web client: Re-Login")."</title>\n";
	echo "</head>\n";
    echo "<body class=\"signup-page\" onresize=\"browser_dimensions();\" onload=\"browser_dimensions();\" >\n";
	echo '  <div class="signup-box">
			<div class="logo text-center">
			<img class="logo" src="./images/logo.png"  alt="logo"/ style="width:100%" />
        	</div>
			<div class="card">
            <div class="body">';
    echo "<form class=\"form-horizontal\" name=\"vicidial_form\" id=\"vicidial_form\" action=\"$agcPAGE\" method=\"post\">\n";
    echo "<input type=\"hidden\" name=\"DB\" id=\"DB\" value=\"$DB\" />\n";
    echo "<input type=\"hidden\" name=\"JS_browser_height\" id=\"JS_browser_height\" value=\"\" />\n";
    echo "<input type=\"hidden\" name=\"JS_browser_width\" id=\"JS_browser_width\" value=\"\" />\n";
    echo "<input type=\"hidden\" name=\"admin_test\" id=\"admin_test\" value=\"$admin_test\" />\n";
    echo "<input type=\"hidden\" name=\"VD_login\" id=\"VD_login\" value=\"$VD_login\" />\n";
    echo "<input type=\"hidden\" name=\"VD_pass\" id=\"VD_pass\" value=\"$VD_pass\" />\n";
    echo '<div class="msg"><font size=5>Re-Login</font></div>
             <div class="input-group">
                 <span class="input-group-addon">
                     <i class="material-icons">call</i>
                 </span>';
    echo " <div class=\"form-line\"><input class=\"form-control\" type=\"text\" name=\"phone_login\" size=\"10\" maxlength=\"20\" value=\"$phone_login\" placeholder=\"Phone Login\"/></div></div>";
    echo '  <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock</i>
                                    </span>';
    echo "<div class=\"form-line\"><input class=\"form-control\" type=\"password\" name=\"phone_pass\" size=\"10\" maxlength=\"20\" value=\"$phone_pass\" placeholder=\"Phone Password\"/></div></div>"; 
    echo '  <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>';
//    echo "<div class=\"form-line\"><input class=\"form-control\" type=\"text\" name=\"VD_login\" size=\"10\" maxlength=\"20\" value=\"$VD_login\" placeholder=\"Username\"/></div></div>";
//    echo '  <div class="input-group">
//                                    <span class="input-group-addon">
//                                        <i class="material-icons">lock</i>
//                                    </span>';
//    echo "<div class=\"form-line\"><input class=\"form-control\" type=\"password\" name=\"VD_pass\" size=\"10\" maxlength=\"20\" value=\"$VD_pass\" placeholder=\"Password\"/></div></div>";
//    echo '  <div class="input-group">
//                                    <span class="input-group-addon">
//                                        <i class="material-icons">widgets</i>
//                                    </span>';
    echo "<div class=\"form-line\"><span id=\"LogiNCamPaigns\" >$camp_form_code</span></div></div>\n";
	
    echo "<center><input type=\"submit\" name=\"SUBMIT\" value=\"Submit\" class=\"btn btn-primary waves-effect\" /> ";
    echo "<span id=\"LogiNReseT\"><input type=\"button\" value=\"Refresh Campaign List\" onclick=\"login_allowable_campaigns()\" class=\"btn btn-primary waves-effect\"></span> ";
 
    echo "</center>";
    echo "</form></div></div>"; 
	echo "</body>\n\n";
	echo "</html>\n\n";
	exit;