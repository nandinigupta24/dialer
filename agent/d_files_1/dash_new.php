<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="4q3RXCOhkMnWw1Cr4ZMigFOlcrWbsyhHZxRSshBc">
        <link rel="icon" href="../../../images/favicon.ico"> 

        <title>Dashboard | Agent</title> 

        <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/vendor_components/datatable/datatables.min.css"/>
        <!-- Bootstrap extend-->
        <link rel="stylesheet" href="../assets/css/bootstrap-extend.css">
        <link rel="stylesheet" href="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="../assets/vendor_components/bootstrap-switch/switch.css">
        <link rel="stylesheet" href="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../assets/css/master_style.css">

        <!-- Fab Admin skins -->
        <link rel="stylesheet" href="../assets/css/skins/_all-skins.css">	
        <link rel="icon" href="../assets/images/favicon.ico">
        <!--<link href="../assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.css" rel="stylesheet" />-->
        <!--<link rel="stylesheet" href="../assets/vendor_components/morris.js/morris.css">-->

    </head>
    <!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
    <!--<body class="hold-transition skin-yellow sidebar-mini sidebar-collapse" onload="begin_all_refresh();">-->
    <body class="hold-transition skin-yellow sidebar-mini sidebar-collapse" onload="begin_all_refresh();"  onunload="BrowserCloseLogout();" style="overflow-x: hidden;">
        <form name='vicidial_form' id='vicidial_form' onsubmit="return false;">
            <input type="hidden" name="extension" id="extension" />
            <input type="hidden" name="custom_field_values" id="custom_field_values" value="" />
            <input type="hidden" name="FORM_LOADED" id="FORM_LOADED" value="0" />
            <div class="wrapper">
                <header class="main-header">
                    <!-- Logo -->
                    <a href="javascript:void(0);" class="logo">
                        <!-- mini logo -->
                        <b class="logo-mini">

                        </b>
                        <!-- logo-->

                    </a>
                    <!-- Header Navbar -->
                    <nav class="navbar navbar-static-top">
                        <!-- Sidebar toggle button-->
                        <div>
                            <a href="javascript:void(0);" class="sidebar-toggle" data-toggle="push-menu" role="button">
                                <!--<span class="sr-only">Toggle navigation</span>-->
                            </a>


                        </div>

                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <!-- Messages -->

                                <li class="dropdown-toggle1" title="Callback Managment"><a href="javascript:void(0)" ><i class="fa fa-book"></i></a> </li>
                                <li class="dropdown-toggle1" title="Messages"><a href="javascript:void(0)" ><i class="fa fa-comment"></i></a> </li>
                                <li class="dropdown-toggle1" title="Inbound Call Wating"><a href="javascript:void(0)" ><i class="fa fa-phone"></i></a> </li>

                                <!-- User Account-->
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-top:9px;">
                                        <img src="https://img.icons8.com/bubbles/2x/user.png" class="user-image rounded-circle" alt="User Image">
                                    </a>
                                    <ul class="dropdown-menu scale-up">
                                        <!-- Menu Body -->
                                        <li class="user-body">
                                            <div class="row no-gutters">
                                                <div class="col-12">
                                                    <h3 class="control-sidebar-heading">System Pause Codes</h3>

                                                    <div class="form-group">
                                                        <fieldset>
                                                            <input name="group2" type="radio" id="radio_3" value="Yes" required>
                                                            <label for="radio_3">Login</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input name="group2" type="radio" id="radio_3" value="Yes" required>
                                                            <label for="radio_3">Paused</label>
                                                        </fieldset>
                                                    </div>
                                                    <h3 class="control-sidebar-heading">Pause Codes</h3>
                                                    <div class="form-group">
                                                        <?php
                                                        $VARpause_codes = explode("','", rtrim(ltrim($VARpause_codes, "'"), "'"));
                                                        $VARpause_code_names = explode("','", rtrim(ltrim($VARpause_code_names, "'"), "'"));
                                                        foreach ($VARpause_codes as $key => $val) {
                                                            ?>
                                                            <input type="checkbox" id="" class="chk-col-grey" >
                                                            <label for="report_panel" class="control-sidebar-subheading "><?php echo $val; ?> - <?php echo $VARpause_code_names[$key]; ?></label> <br/>
<?php } ?>
                                                    </div>
                                                </div>

                                                <div role="separator" class="divider col-12"></div>
                                                <div class="col-12 text-left">
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-logout"><i class="fa fa-power-off"></i> Logout</a>
                                                </div>				
                                            </div>
                                            <!-- /.row -->
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </header>

                <!-- Left side column. contains the logo and sidebar -->
<!--                <aside class="main-sidebar" style="position:fixed">
                     sidebar
                    <section class="sidebar">
                         sidebar menu
                        <ul class="sidebar-menu" data-widget="tree" style="top:40px; position:fixed">
                            <li>&nbsp;</li>
                            <li class="treeview" id="CallPause"> <a href="javascript:void(0);" class="btn btn-success" onclick="AutoDial_ReSume_PauSe('VDADready', '', '', '', '', '', '', 'YES');"> <i class="fa fa-play"></i> </a> </li>
                            <li>&nbsp;</li>
                            <li class="treeview"> <a href="javascript:void(0);" onclick="ManualDialNext('', '', '', '', '', '0', '', '', 'YES');" class="btn btn-success"> <i class="fa fa-phone"></i> </a> </li>

                        </ul>


                        <ul class="sidebar-menu" data-widget="tree" style="bottom:20px; position:fixed">
                            <li class="treeview"> <a href="#" class="btn btn-success"> <i class="fa fa-microphone-slash"></i> </a> </li>
                            <li class="treeview"> <a href="javascript:void(0);" class="btn btn-info" onclick="NeWManuaLDiaLCalL('NO', '', '', '', '', 'YES');return false;"> <i class="fa fa-phone"></i> </a> </li>
                            <li class="treeview"> <a href="#" class="btn btn-warning"> <i class="fa fa-clock-o"></i> </a> </li>
                            <li class="treeview"> <a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#modal-inbound-groups"> <i class="fa fa-users"></i> </a> </li></p>
                            <li class="treeview"> <a href="javascript:void(0);" class="btn btn-danger" onclick="NormalLogout();return false;needToConfirmExit = false;" title="Logout"> <i class="fa fa-sign-out"></i> </a> </li></p>
                            <li class="treeview"> <a href="javascript:void(0);" class="btn btn-danger" data-toggle="modal" data-target="#modal-logout" title="Logout"> <i class="fa fa-sign-out"></i> </a> </li></p>
                        </ul>
                    </section>
                </aside>             Content Wrapper. Contains page content -->
<aside class="main-sidebar" style="position:fixed">
                <!-- sidebar-->
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree" style="top:40px; position:absolute">
                    <li>&nbsp;</li>
                    <li class="treeview" id="CallPause"> <a href="javascript:void(0);" class="btn btn-success" onclick="AutoDial_ReSume_PauSe('VDADready', '', '', '', '', '', '', 'YES');" title="Go Ready"> <i class="fa fa-play"></i> </a> </li>
                    <li>&nbsp;</li>
                    <li class="treeview"> <a href="javascript:void(0);" onclick="ManualDialNext('', '', '', '', '', '0', '', '', 'YES');" class="btn btn-success" title="Dial Next Lead"> <i class="fa fa-phone"></i> </a> </li>
                </ul>
                <ul class="sidebar-menu" data-widget="tree" style="bottom:0px; position:fixed">
                    <!--<li class="treeview"> <a href="#" class="btn btn-success"> <i class="fa fa-microphone-slash"></i> </a> </li>-->
                    <li class="treeview"> <a href="#" class="btn btn-info" onclick="NeWManuaLDiaLCalL('NO', '', '', '', '', 'YES');return false;" title="Manual Dial"> <i class="fa fa-phone" ></i> </a> </li>
                    <!--<li class="treeview"> <a href="#" class="btn btn-warning"> <i class="fa fa-clock-o"></i> </a> </li>-->
                    <li class="treeview"> <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-inbound-groups" title="Change Groups"> <i class="fa fa-users"></i> </a> </li>
                    <li class="treeview"> <a href="javascript:void(0);" class="btn btn-danger" onclick="NormalLogout();return false;needToConfirmExit = false;" title="Logout"> <i class="fa fa-sign-out"></i> </a> </li>
                </ul>
            </aside>
                <div class="content-wrapper">

                    <!-- Main content -->
                    <section class="content">

                        <div class="row">
                            <div class="col-md-12 text-center"><span style="margin-left:160px; font-size:14px;color: #ffc107;">
                                    <span id="agentchannelSPAN"></span>&nbsp;&nbsp;
                                    <span id="status"> <?php echo _QXZ("LIVE"); ?></span>&nbsp;&nbsp;
<?php echo _QXZ("Session ID:"); ?> <span id="sessionIDspan"></span>&nbsp; &nbsp;
                                    <span id="AgentStatusCalls"></span>&nbsp; &nbsp;
                                    <span id="AgentStatusEmails"></span>
                                </span></div>
                            <div class="col-12">
                                <div class="box card-inverse bg-img" style="padding: 20px 0px 0px" id="MainStatuSSpan">
                                    <div class="flexbox align-items-center py-20" data-overlay="4">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="align-items-center mr-auto" > 
                                                <!--<a href="#" class="left-float"> <img class="avatar avatar-xl avatar-bordered" src="http://webduniaguru.com/an-new-admin/images/avatar/4.jpg" alt=""> </a>-->
                                                <div class="pl-10 profile left-float" style="margin: 3px 0 0 5px;">
                                                    <h5 class="mb-0"><a class="hover-primary text-white" href="javascript:void(0);" onclick="start_all_refresh();"><?php echo $VD_login ?></a></h5>
                                                    <span>Campaign <?php
                                                        if ($on_hook_agent == 'Y') {
                                                            echo "(<a href=\"#\" onclick=\"NoneInSessionCalL();return false;\">" . _QXZ("ring") . "</a>)";
                                                        }
                                                        echo $VD_campaign;
                                                        ?></span><br>
                                                    <span>Team - ADMIN</span><br>
                                                    <span>Phone - <?php echo $SIP_user ?></span> </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="user-info" style="display:none;">
                                                        <div class="image">
                                                            <img src="./images/<?php echo _QXZ("agc_live_call_OFF.gif"); ?>" name="livecall" alt="Live Call" width="48px" height="48px" /></div>
                                                        <div class="info-container">
                                                            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Phone No. : <span id="phone_numberDISP"></span><input type="hidden" name="phone_number" id="phone_number" value="" /></div>
                                                            <div class="email"><span id="dialableleadsspan">
                                                                    <?php
                                                                    if ($agent_display_dialable_leads > 0) {
                                                                        echo _QXZ("Dialable Leads:") . "<br />\n";
                                                                    }
                                                                    ?>
                                                                </span></div> 
                                                        </div>
                                                    </div>

                                                    <div class="menu" style="display:none;">   
                                                        <div class="button-demo" style="margin-left:10px;">

                                                            <?php
                                                            $alt_phone_selected = '';
                                                            if (($alt_number_dialing == 'SELECTED') or ( $alt_number_dialing == 'SELECTED_TIMER_ALT') or ( $alt_number_dialing == 'SELECTED_TIMER_ADDR3')) {
                                                                $alt_phone_selected = 'CHECKED';
                                                            }
                                                            ?>

                                                            <span id="ManualQueueNotice"></span>
                                                            <span id="ManualQueueChoice"></span>
                                                            <span id="NexTCalLPausE"> <a href="#" onclick="next_call_pause_click();return false;"><?php echo _QXZ("Next Call Pause"); ?></a> </span>
                                                            <span id="DiaLLeaDPrevieW"><input class="filled-in" type="checkbox" name="LeadPreview" size="1" value="0" /><label for="LeadPreview">LEAD PREVIEW</label></span>
                                                            <span id="DiaLDiaLAltPhonE"><input class="filled-in chk-col-blue-grey" type="checkbox" name="DiaLAltPhonE" size="1" value="0" <?php echo $alt_phone_selected ?>/><label for="DiaLAltPhonE"> ALT PHONE DIAL</label></span>


                                                            <span  id="DiaLControl">
                                                                <a href="#" onclick="ManualDialNext('', '', '', '', '', '0', '', '', 'YES');"><img src="./images/<?php echo _QXZ("vdc_LB_dialnextnumber_OFF.gif"); ?>" border="0" alt="Dial Next Number" style="width:136px" /></a>
                                                            </span>

                                                            <!--<?php
                                                            if (($manual_dial_preview) and ( $auto_dial_level == 0)) {
                                                                echo "<input type=\"checkbox\" class=\"filled-in\" id=\"lead1\"  name=\"LeadPreview\" size=\"1\" value=\"0\" /><label for=\"lead1\"> LEAD PREVIEW</label>";
                                                            }
                                                            if (($alt_phone_dialing) and ( $auto_dial_level == 0)) {
                                                                echo "<input type=\"checkbox\" class=\"filled-in\" id=\"lead2\"  name=\"DiaLAltPhonE\" size=\"1\" value=\"0\" /><label for=\"lead2\">  ALT PHONE DIAL</label>";
                                                            }
                                                            ?> -->

                                                            <span style="" id="XferControl"><img src="./images/<?php echo _QXZ("vdc_LB_transferconf_OFF.gif"); ?>" border="0" alt="Transfer - Conference" style="width:136px" /></span>
                                                            <br>
                                                            <span style="display:none;" id="WebFormSpan"><img src="./images/<?php echo _QXZ("vdc_LB_webform_OFF.gif"); ?>" border="0" alt="Web Form" /></span>
<?php
if ($enable_second_webform > 0) {
    echo "<span style=\"background-color: #FFFFFF; display:none;\" id=\"WebFormSpanTwo\"><img src=\"./images/" . _QXZ("vdc_LB_webform_two_OFF.gif") . "\" border=\"0\" alt=\"Web Form 2\" /></span>";
}
if ($enable_third_webform > 0) {
    echo "<span style=\"background-color: #FFFFFF; display:none;\" id=\"WebFormSpanThree\"><img src=\"./images/" . _QXZ("vdc_LB_webform_three_OFF.gif") . "\" border=\"0\" alt=\"Web Form 3\" /></span>";
}
?>

                                                            <span id="ParkCounterSpan"></span><br>
                                                            <span  id="ParkControl"><img src="./images/<?php echo _QXZ("vdc_LB_parkcall_OFF.gif"); ?>" border="0" alt="Park Call" style="width:136px"/></span>
<?php
if (($ivr_park_call == 'ENABLED') or ( $ivr_park_call == 'ENABLED_PARK_ONLY')) {
    echo "<span style=\" display:none;\" id=\"ivrParkControl\"><img src=\"./images/" . _QXZ("vdc_LB_ivrparkcall_OFF.gif") . "\" border=\"0\" style=\"width:136px\" alt=\"IVR Park Call\" /></span>\n";
} else {
    echo "<span style=\"display:none;\" id=\"ivrParkControl\"></span>\n";
}
?>


                                                            <span id="ReQueueCall"></span>

                                                            <?php
                                                            if ($call_requeue_button > 0) {
                                                                echo "<br>\n";
                                                            }
                                                            ?>

                                                            <span  id="HangupControl"><img src="./images/<?php echo _QXZ("vdc_LB_hangupcustomer_OFF.gif"); ?>" border="0" alt="Hangup Customer" style="width:136px"/></span>
                                                            <br><br>



<?php
if ($quick_transfer_button_enabled > 0) {
    echo "<span style=\"background-color: $MAIN_COLOR\" id=\"QuickXfer\"><img src=\"./images/" . _QXZ("vdc_LB_quickxfer_OFF.gif") . "\" border=\"0\" alt=\"Quick Transfer\" /></span>\n";
}
if ($custom_3way_button_transfer_enabled > 0) {
    echo "<span style=\"background-color: $MAIN_COLOR\" id=\"CustomXfer\"><img src=\"./images/" . _QXZ("vdc_LB_customxfer_OFF.gif") . "\" border=\"0\" alt=\"Custom Transfer\" /></span>\n";
}
?>







                                                            <!--
                                                                  <div class="button-demo" style="margin-left:10px;">
<?php
$alt_phone_selected = '';
if (($alt_number_dialing == 'SELECTED') or ( $alt_number_dialing == 'SELECTED_TIMER_ALT') or ( $alt_number_dialing == 'SELECTED_TIMER_ADDR3')) {
    $alt_phone_selected = 'CHECKED';
}
?>
                                                                              <span id="ManualQueueNotice"></span>
                                                                              <span id="ManualQueueChoice"></span>
                                                                              <span id="NexTCalLPausE"> <a href="#" onclick="next_call_pause_click();return false;"><?php echo _QXZ("Next Call Pause"); ?></a> </span>
                                                                              <span id="DiaLLeaDPrevieW"><input class="filled-in chk-col-blue-grey" type="checkbox" name="LeadPreview" size="1" value="0" /><label for="LeadPreview">LEAD PREVIEW</label></span>
                                                                               <span id="DiaLDiaLAltPhonE"><input class="filled-in chk-col-blue-grey" type="checkbox" name="DiaLAltPhonE" size="1" value="0" <?php echo $alt_phone_selected ?>/><label for="DiaLAltPhonE"> ALT PHONE DIAL</label></span>
                                                                      
                                                                        <span id="DiaLControl"><a href="#" onclick="ManualDialNext('','','','','','0','','','YES');"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Dial next number Off" disabled>Dial next No.</button></a></span>
                                                          
                                                                        <span id="XferControl"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Transfer Conference" disabled>Transfer Conference</button></span>
                                                                        
                                                                         <span id="WebFormSpan"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Webform Off" disabled>Webform</button></span>
                                                            <?php
                                                            if ($enable_second_webform > 0) {
                                                                echo '<span id="WebFormSpanTwo"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Webform 2 Off" disabled>Webform 2</button></span>';
                                                            }
                                                            if ($enable_third_webform > 0) {
                                                                echo '<span id="WebFormSpanThree"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Webform 3 Off" disabled>Webform 3</button></span>';
                                                            }
                                                            ?>
                                                                         <span id="ParkCounterSpan"></span>	<br>
                                                                         
                                                                           <span id="ParkControl"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="ParkCall Off" disabled>ParkCall</button></span>
                                                                           <span id="ivrParkControl"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="IVR ParkCall Off" disabled>IVR ParkCall</button></span>
<?php
if (($ivr_park_call == 'ENABLED') or ( $ivr_park_call == 'ENABLED_PARK_ONLY')) {
    echo '<span id="ivrParkControl"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="IVR ParkCall Off">IVR ParkCall</button></span>';
} else {
    echo'
						 <span id="ivrParkControl"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="IVR ParkCall Off" disabled>IVR ParkCall</button></span>';
}
?>
                                                                             
                                                                    <span id="ReQueueCall"></span>
                                                            <?php
                                                            if ($call_requeue_button > 0) {
                                                                echo "<br />\n";
                                                            }
                                                            ?>	    
                                                                         
                                                                           <span id="HangupControl"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Hangup Off" disabled>Hangup</button></span>
                                                                           
                                                                <span  id="callsinqueuelink"><a href="#" onclick="show_calls_in_queue('SHOW');"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Show Calls In Queue">Show Calls In Q</button></a>
                                          
<?php
if ($view_calls_in_queue > 0) {
    if ($view_calls_in_queue_launch > 0) {
        echo "<a href=\"#\" onclick=\"show_calls_in_queue('HIDE');\"><button type=\"button\" style=\"width:136px\" class=\"btn bg-blue-grey btn-block btn-sm waves-effect\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Hide Calls In Queue\">Hide Calls In Q</button></a>";
    } else {
        echo "<a href=\"#\" onclick=\"show_calls_in_queue('SHOW');\"><button type=\"button\" style=\"width:136px\" class=\"btn bg-blue-grey btn-block btn-sm waves-effect\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Show Calls In Queue\">Show Calls In Q</button></a>";
    }
}
?>
                                          
                                          </span>
                                                          
                                                          <span id="AgentViewLinkSpan"><span id="AgentViewLink"><a href="#" style="width:136px" class="btn bg-lime btn-block btn-sm waves-effect" onclick="AgentsViewOpen('AgentViewSpan','open');return false;">Agents View +</a></span></span> 
                                                                
                                                            
                                          <span id="hotkeysdisplay"><a href="#" onMouseOver="HotKeys('ON')"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="HOT KEYS INACTIVE">Hot Keys Inactive</button></a></span>
                                          
                                                         <span id="AgentTimeSpan"><a href="#" onclick="AgentTimeReport('open');return false;"><button type="button" style="width:136px" class="btn bg-lime btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="AGENT TIME">Agent Time</button></a></span>
                                                          <center>
                                                                   <span id="DiaLlOgButtonspan" >
                                                                    <span id="ManuaLDiaLButtons" style="z-index:<?php $zi++;
echo $zi ?>;">
                                                                            <span id="MDstatusSpan"><a href="#" class='active' onclick="NeWManuaLDiaLCalL('NO','','','','','YES');return false;"><button type="button" style="width:136px" class="btn bg-orange btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="MANUAL DIAL">Manual Dial</button></a></span> <br><br>
                                                              </span></span>
                                                          </center>
                                                                    </div>
                                                            -->
                                                            <br><br>

                                                        </div>
                                                    </div>
                                                </div>
<!--                                                <div class="col-lg-6 col-md-6"><ul class="flexbox flex-justified text-center profile">
                                                        <li class="px-10"> <span class="font-size-14">XP</span><br>
                                                            <span class="font-size-10">0/1200</span> <span>
                                                                <input class="form-control" type="text" placeholder="">
                                                            </span> </li>
                                                        <li class="pl-10"> <span class="font-size-14">Level 1</span><br>
                                                            <span class="font-size-10">0% Complete</span> <span>
                                                                <input class="form-control" type="text" placeholder="">
                                                            </span> </li>
                                                    </ul></div>
                                                <div class="col-lg-6 col-md-6"><ul class="flexbox flex-justified text-center profile">
                                                        <li class="px-10"> <span class="font-size-14">XP</span><br>
                                                            <span class="font-size-10">0/1200</span> <span>
                                                                <input class="form-control" type="text" placeholder="">
                                                            </span> </li>
                                                        <li class="pl-10"> <span class="font-size-14">Level 1</span><br>
                                                            <span class="font-size-10">0% Complete</span> <span>
                                                                <input class="form-control" type="text" placeholder="">
                                                            </span> </li>
                                                    </ul></div>-->

                                            </div>

                                        </div>
                                    </div>
                                </div>	

                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
<?php 
                                                
                                                
                                                $Performance = $database->query("Select Calls, Connects, DMCs,Sales
from
(select
 sum(case when status is not null and (val.comments NOT IN ('CHAT','EMAIL') OR val.comments IS NULL) then 1 else 0 end) as Calls,
 sum(case when val.status in (select status from status_combined where human_answered = 'Y') then 1 else 0 end) as Connects,
 sum(case when val.status in (select status from status_combined where customer_contact = 'Y') then 1 else 0 end) as DMCs,
 sum(case when val.status in (select status from status_combined where Sale = 'Y') then 1 else 0 end) as Sales
 from vicidial_closer_log val where val.user = 1001) a")->fetchAll();
        $Performance = $Performance[0];
        $TimePerformance = $database->query("Select LOWER(user) as USERID, campaign_id,SEC_TO_TIME(Talk) as Talk,SEC_TO_TIME(Pause) as Pause,  SEC_TO_TIME(Wait) as Wait,  SEC_TO_TIME(Dispo) as Dispo, TotalDMCTalkSecs
from
(select val.`user`, val.campaign_id, val.user_group,
sum(case when val.status is not null then 1 else 0 end) as Calls,
sum(case when val.status in (select status from status_combined where human_answered = 'Y') then 1 else 0 end) as Connects,
sum(case when val.status in (select status from status_combined where customer_contact = 'Y') then 1 else 0 end) as DMCs,
sum(case when val.status in (select status from status_combined where Sale = 'Y') then 1 else 0 end) as Sales,
sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(val.dead_sec as signed) else cast(val.talk_sec as signed)- cast(val.dead_sec as signed) end) as Talk,
sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end) as Pause,
Sum(case when val.talk_epoch > val.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else val.wait_sec end) as Wait,
Sum(val.dispo_sec + cast(val.dead_sec as signed)) as Dispo,
Sum(case when val.Status in (select status from status_combined where customer_contact = 'Y') then (cast(val.Talk_sec as signed) - cast(val.dead_sec as signed)) else 0 end) as TotalDMCTalkSecs
from vicidial_agent_log val
JOIN vicidial_closer_log vcl ON vcl.uniqueid = val.uniqueid
group by val.campaign_id
) a
ORDER BY campaign_id")->fetchAll();
        $TimePerformance = $TimePerformance[0];
        
        $Wait = TimeToSec($TimePerformance['Wait']);
        $Talk = TimeToSec($TimePerformance['Talk']);
        $Wrap = TimeToSec($TimePerformance['Dispo']);
        $Pause = TimeToSec($TimePerformance['Pause']);
        
        $TotalTime = ($Wait + $Talk + $Wrap + $Pause);
        $percentageArray = [];
        $percentageArray['Talk'] = round((($Talk/$TotalTime)*100));
        $percentageArray['Pause'] = round((($Pause/$TotalTime)*100));
        $percentageArray['Wait'] = round((($Wait/$TotalTime)*100));
        $percentageArray['Dispo'] = round((($Wrap/$TotalTime)*100));
        
        ?>
                            <div class="col-12 col-lg-3">

                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Today's Overview</h4>
                                    </div>	

                                    <div class="box-body">
                                        <div class="text-center py-20">
                                            <div class="donut" data-peity='{ "fill": ["#7460ee", "#26c6da", "#fc4b6c", "#ffb22b "], "radius": 108, "innerRadius": 50  }' ><?php echo implode(',',$percentageArray);?></div>
                                        </div>

                                        <ul class="flexbox flex-justified text-center mt-70">
                                            <li class="br-1">
                                                <div class="font-size-20 text-primary"><?php echo $percentageArray['Talk'];?>%</div>
                                                <small class="font-size-12 text-fade">Talking</small>
                                            </li>

                                            <li class="br-1">
                                                <div class="font-size-20 text-success"><?php echo $percentageArray['Pause'];?>%</div>
                                                <small class="font-size-12 text-fade">Pause</small>
                                            </li>

                                            <li>
                                                <div class="font-size-20 text-danger"><?php echo $percentageArray['Wait'];?>%</div>
                                                <small class="font-size-12 text-fade">Waiting</small>
                                            </li>

                                            <li>
                                                <div class="font-size-20 text-warning"><?php echo $percentageArray['Dispo'];?>%</div>
                                                <small class="font-size-12 text-fade">Wrap</small>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--                                <div class="box-body">
<?php
// if ($is_webphone=='Y')
{
//    echo "<div  style=\"z-index:$zi;margin-top:8px;\" id=\"webphoneSpan\">
//                        <div class=\"body\">
//                            <div class=\"font-bold m-b--35 text-center\">Web Phone</div>
//                            
//                            <span id=\"webphonecontent\">$webphone_content
//                           
//                            </span>
//
//                            </div>
//                   		 </div>";
}
?>
                                                                    </div>-->
                                </div>

                            </div>

                            <div class="col-lg-9 col-12" style="margin-top:-59px">
                                <ul class="nav nav-tabs" role="tablist">

                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><span class="fa fa-pie-chart"></span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home2" role="tab" onclick="MainPanelToFront('NO', 'YES');"><span class="fa  fa-credit-card-alt"></span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home4" role="tab" ><span class="fa  fa-cog"></span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#CallHistory" role="tab" ><span class="fa fa-clock-o"></span></a> </li>
                                </ul>

                                <div class="tab-content tabcontent-border">

                                    <div class="tab-pane active" id="home1" role="tabpanel">
                                        <div class="pt-10 mr-10" align="right">
                                            <span type="button" class="btn btn-medium btn-toggle btn-info BTN-STATS" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </span> Average Stats</div>
                                        <div class="pad">
                                            <div class="row FULL-STATS">
                                                
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3><?php echo $TimePerformance['Talk'];?></h3>

                                                        <p>Talk Time</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-phone"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3><?php echo $TimePerformance['Wait'];?></h3>

                                                        <p>Wait Time</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-clock-o"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3><?php echo $TimePerformance['Dispo'];?></h3>

                                                        <p>Wrap Time</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-clock-o"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3><?php echo $TimePerformance['Pause'];?></h3>

                                                        <p>Pause Time</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-pause"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3><?php echo $Performance['Calls'];?></h3>

                                                        <p>Calls</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-phone"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3><?php echo $Performance['Connects'];?></h3>

                                                        <p>Connects</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-user-plus"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3><?php echo $Performance['DMCs'];?></h3>

                                                        <p>DMCs</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-user-plus"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3><?php echo $Performance['Sales'];?></h3>

                                                        <p>Sales</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-shopping-cart"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                
                                            </div>
                                            <div class="row AVG-STATS" style="display:none;">
                                                <?php 
                                                
                                                

                                                $AVGPerformance = $database->query("Select Calls,Connects,DMCs,Sales
from
(select
 sum(case when val.status is not null and (val.comments NOT IN ('CHAT','EMAIL') OR val.comments IS NULL) then 1 else 0 end) as Calls,
 sum(case when val.status in (select status from status_combined where human_answered = 'Y') then 1 else 0 end) as Connects,
 sum(case when val.status in (select status from status_combined where customer_contact = 'Y') then 1 else 0 end) as DMCs,
 sum(case when val.status in (select status from status_combined where Sale = 'Y') then 1 else 0 end) as Sales
 from vicidial_closer_log val where val.user = 1001) a")->fetchAll();
        $AVGPerformance = $AVGPerformance[0];
        
        
        $TotalCall = $database->query('SELECT count(*) as total from vicidial_closer_log where user = 1001')->fetchAll();
        $TotalCall = $TotalCall[0]['total'];
        
        
        
        ?>
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3><?php echo $percentageArray['Talk'];?>%</h3>

                                                        <p>Avg Talk Time</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-phone"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3><?php echo $percentageArray['Wait'];?>%</h3>

                                                        <p>Avg Wait Time</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-clock-o"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3><?php echo $percentageArray['Dispo'];?>%</h3>

                                                        <p>Avg Wrap Time</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-clock-o"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3><?php echo $percentageArray['Pause'];?>%</h3>

                                                        <p>Avg Pause Time</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-pause"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3><?php echo (($AVGPerformance['Calls']/$TotalCall)*100);?>%</h3>

                                                        <p>Calls</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-phone"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3><?php echo (($AVGPerformance['Connects']/$TotalCall)*100);?>%</h3>

                                                        <p>Avg Connects</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-user-plus"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3><?php echo (($AVGPerformance['DMCs']/$TotalCall)*100);?>%</h3>

                                                        <p>Avg DMCs</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-user-plus"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3><?php echo (($AVGPerformance['Sales']/$TotalCall)*100);?>%</h3>

                                                        <p>Avg Sales</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-shopping-cart"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                
                                            </div>

                                            <div class="card" style="display:none;">
                                                <div class="body">
                                                    <div class="font-bold m-b--35 text-center">Call Information</div>
                                                    <ul class="dashboard-stat-list">
                                                        <li>
                                                            <span id="post_phone_time_diff_span"><b><span id="post_phone_time_diff_span_contents"></span></b></span>
                                                            Status :<span id="MainStatuSSpan1"></span><span id=timer_alt_display></span><br><span id=manual_auto_next_display></span>
                                                        </li>
                                                        <li>
                                                            <span id="SecondSspan">Seconds :<span id="SecondSDISP"></span></span>
                                                        </li>
                                                        <li>
                                                            Customer Time :<span name="custdatetime" id="custdatetime" class="log_title"></span>
                                                        </li>
                                                        <li>
                                                            Channel :<span name="callchannel" id="callchannel" class="cust_form"> </span>
                                                        </li>
                                                        <li>
                                                            Customer Information :<span id="CusTInfOSpaN"></span>
                                                        </li>
                                                        <li>
                                            <?php
                                            if (($agent_lead_search == 'ENABLED') or ( $agent_lead_search == 'LIVE_CALL_INBOUND') or ( $agent_lead_search == 'LIVE_CALL_INBOUND_AND_MANUAL')) {
                                                echo "<a href=\"#\" onclick=\"OpeNSearcHForMDisplaYBox();return false;\"><button type=\"button\" style=\"width:136px\" class=\"btn bg-amber btn-block btn-sm waves-effect\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Lead Search\">Lead Search</button></a>";
                                            }
                                            ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="card " style="z-index:<?php $zi++;
                                                    echo $zi ?>;" id="ViewCommentsBox">
                                                <div class="header">
                                                    <h2>View Comment History:<small><span id="ViewCommentsShowHide"><a href="#" onclick="ViewComments('OFF', '', '', 'YES');return false;">hide comment history</a></span></small></h2>
                                                </div>
                                                <div class="body">
                                                    <PRE><font size=1><span id="audit_comments"></span></font></PRE>
                        <input type="hidden" class="cust_form_text" id="audit_comments_button" name="audit_comments_button" value="0" />
                    </div>
                </div>
         
               
                 <div class="card"style="z-index:<?php $zi++;
                                                echo $zi ?>;"  id="AgentStatusSpan">
                        <div class="header">
				            <h2>Agent Status</h2>
				        </div>
				         <div class="body">
                                            <?php echo _QXZ("Your Status:"); ?> <span id="AgentStatusStatus"></span> <br><?php echo _QXZ("Calls Dialing:"); ?> <span id="AgentStatusDiaLs"></span>
                    	</div>
            	</div>

                 <div class="card" style="z-index:<?php $zi++;
                                            echo $zi ?>;top:-382px;" id="HotKeyEntriesBox">
                        <div class="row clearfix">
                                    <div class="header">
                                        <h2>Disposition Hot Keys:</h2><br />When active, simply press the keyboard key for the desired disposition for this call. The call will then be hungup and dispositioned automatically:
                                    </div>
                                    <div class="body">
                                        <div class="table-responsive">
                                            <table class="table table-hover dashboard-task-infos">
                                                <tr>
                                                    <td><span id="HotKeyBoxA"><?php echo $HKboxA ?><br /></span></td>
                                                    <td><span id="HotKeyBoxB"><?php echo $HKboxB ?></span></td>
                                                    <td><span id="HotKeyBoxC"><?php echo $HKboxC ?></span></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                        </div>
                </div>
                
                <div class="card" style="z-index:<?php $zi++;
                                            echo $zi ?>;top:-655px;" id="CBcommentsBox">
                    <table class="table table-responsive" >
                    <tr >
                    <td align="left"> <?php echo _QXZ("Previous Callback Information:"); ?></td>
                    <td align="right"> <a class="btn btn-danger" href="#" onclick="CBcommentsBoxhide();return false;"><?php echo _QXZ("close"); ?></a> </td>
                    </tr><tr>
                    <td>
                    <span id="CBcommentsBoxA"></span><br>
                    <span id="CBcommentsBoxB"></span><br>
                    <span id="CBcommentsBoxC"></span><br>
                    </td>
                    <td >
                    <span id="CBcommentsBoxD"></span>
                    </td>
                    </tr></table>
                </div>
</div>                                </div>

                                <div class="tab-pane" id="home2" role="tabpanel">
                                    <div class="pt-10 mr-10" align="right"><span type="button" class="btn btn-medium btn-toggle btn-info active" data-toggle="button" aria-pressed="true" autocomplete="off"><div class="handle"></div></span> Data Output</div>
<div class="pad" id="MainPanel" style=";z-index:<?php $zi++;
                                            echo $zi ?>;">
    <input type="hidden" name="lead_id" id="lead_id" value="" />
    <input type="hidden" name="list_id" id="list_id" value="" />
    <input type="hidden" name="entry_list_id" id="entry_list_id" value="" />
    <input type="hidden" name="list_name" id="list_name" value="" />
    <input type="hidden" name="list_description" id="list_description" value="" />
    <input type="hidden" name="called_count" id="called_count" value="" />
    <input type="hidden" name="rank" id="rank" value="" />
    <input type="hidden" name="owner" id="owner" value="" />
    <input type="hidden" name="gmt_offset_now" id="gmt_offset_now" value="" />
    <input type="hidden" name="gender" id="gender" value="" />
    <input type="hidden" name="date_of_birth" id="date_of_birth" value="" />
    <input type="hidden" name="country_code" id="country_code" value="" />
    <input type="hidden" name="uniqueid" id="uniqueid" value="" />
    <input type="hidden" name="callserverip" id="callserverip" value="" />
    <input type="hidden" name="SecondS" id="SecondS" value="" />
    <input type="hidden" name="email_row_id" id="email_row_id" value="" />
    <input type="hidden" name="chat_id" id="chat_id" value="" />
    <input type="hidden" name="customer_chat_id" id="customer_chat_id" value="" />
    <div class="form-group">
        <div class="row ">
            <div class="col-6">
                
                
                                                        <?php
                                                        $required_fields = '';
                                                        if ($label_title == '---HIDE---') {
                                                            echo "<input type=\"hidden\" name=\"title\" id=\"title\" value=\"\" />";
                                                        } else {
                                                            $title_readonly = '';
                                                            ?>

                           
                                                            <?php
                                                            if (preg_match("/---READONLY---/", $label_title)) {
                                                                $title_readonly = 'readonly="readonly"';
                                                                $label_title = preg_replace("/---READONLY---/", "", $label_title);
                                                            } else {
                                                                if (preg_match("/---REQUIRED---/", $label_title)) {
                                                                    $required_fields .= "title|";
                                                                    $label_title = preg_replace("/---REQUIRED---/", "", $label_title);
                                                                }
                                                            }
                                                            ?>   
                                                        
                    <div class="input-group mb-10">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                    <input type="text" size="4" name="title" id="title" maxlength="4" class="form-control" value="" <?php $title_readonly ?> placeholder="Title" />
                    </div>
                                                        <?php } ?>
                
                
                                                        <?php
                                                        if ($label_first_name == '---HIDE---') {
                                                            echo "<input type=\"hidden\" name=\"first_name\" id=\"first_name\" value=\"\" />";
                                                        } else {
                                                            $first_name_readonly = '';
                                                            ?>
                                                  
                                                            <?php
                                                                if (preg_match("/---READONLY---/", $label_first_name)) {
                                                                    $first_name_readonly = 'readonly="readonly"';
                                                                    $label_first_name = preg_replace("/---READONLY---/", "", $label_first_name);
                                                                } else {
                                                                    if (preg_match("/---REQUIRED---/", $label_first_name)) {
                                                                        $required_fields .= "first_name|";
                                                                        $label_first_name = preg_replace("/---REQUIRED---/", "", $label_first_name);
                                                                    }
                                                                }
                                                                ?>
                                               
                    <div class="input-group mb-10">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input type="text" size="17" name="first_name" id="first_name" maxlength="30" class="form-control" value="" <?php $first_name_readonly ?> placeholder="First Name" />
                    </div>
                                                        <?php } ?>
                                                        <?php
                                                        if ($label_middle_initial == '---HIDE---') {
                                                            echo "<input type=\"hidden\" name=\"first_name\" id=\"middle_initial\" value=\"\" />";
                                                        } else {
                                                            $first_name_readonly = '';
                                                            ?>
                                                  
                                                                <?php
                                                                if (preg_match("/---READONLY---/", $label_middle_initial)) {
                                                                    $middle_initial_readonly = 'readonly="readonly"';
                                                                    $label_middle_initial = preg_replace("/---READONLY---/", "", $label_middle_initial);
                                                                } else {
                                                                    if (preg_match("/---REQUIRED---/", $label_middle_initial)) {
                                                                        $required_fields .= "middle_initial|";
                                                                        $label_middle_initial = preg_replace("/---REQUIRED---/", "", $label_middle_initial);
                                                                    }
                                                                }
                                                                ?>
                                               
                    <div class="input-group mb-10">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input type="text" size="17" name="middle_initial" id="middle_initial" maxlength="30" class="form-control" value="" <?php $middle_initial_readonly ?> placeholder="Middle Name" />
                    </div>
                                                        <?php } ?>
                
                                                        <?php
                                                            if ($label_last_name == '---HIDE---') {
                                                                echo "<input type=\"hidden\" name=\"first_name\" id=\"middle_initial\" value=\"\" />";
                                                            } else {
                                                                $last_name_readonly = '';
                                                                ?>
                                                  
                                                            <?php
                                                            if (preg_match("/---READONLY---/", $label_last_name)) {
                                                                $last_name_readonly = 'readonly="readonly"';
                                                                $label_last_name = preg_replace("/---READONLY---/", "", $label_last_name);
                                                            } else {
                                                                if (preg_match("/---REQUIRED---/", $label_last_name)) {
                                                                    $required_fields .= "last_name|";
                                                                    $label_last_name = preg_replace("/---REQUIRED---/", "", $label_last_name);
                                                                }
                                                            }
                                                            ?>
                                               
                    <div class="input-group mb-10">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input type="text" size="17" name="last_name" id="last_name" maxlength="30" class="form-control" value="" <?php $last_name_readonly ?> placeholder="Last Name" />
                    </div>
                                                            <?php } ?>
                
                                                            <?php
                                                            if ($label_address1 == '---HIDE---') {
                                                                echo "<input type=\"hidden\" name=\"address1\" id=\"address1\" value=\"\" />";
                                                            } else {
                                                                $address1_readonly = '';
                                                                ?>
                                                  
                                                            <?php
                                                            if (preg_match("/---READONLY---/", $label_address1)) {
                                                                $address1_readonly = 'readonly="readonly"';
                                                                $label_address1 = preg_replace("/---READONLY---/", "", $label_address1);
                                                            } else {
                                                                if (preg_match("/---REQUIRED---/", $label_address1)) {
                                                                    $required_fields .= "address1|";
                                                                    $label_address1 = preg_replace("/---REQUIRED---/", "", $label_address1);
                                                                }
                                                            }
                                                            ?>
                                               
                    <div class="input-group mb-10">
                        <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                        </div>
                        <input type="text" size="17" name="address1" id="address1" maxlength="30" class="form-control" value="" <?php $address1_readonly ?> placeholder="address1" />
                    </div>
                                                        <?php } ?>
                
                
                                                        <?php
                                                        if ($label_address2 == '---HIDE---') {
                                                            echo "<input type=\"hidden\" name=\"address2\" id=\"address2\" value=\"\" />";
                                                        } else {
                                                            $address1_readonly = '';
                                                            ?>
                                                  
                                                            <?php
                                                            if (preg_match("/---READONLY---/", $label_address2)) {
                                                                $address1_readonly = 'readonly="readonly"';
                                                                $label_address2 = preg_replace("/---READONLY---/", "", $label_address2);
                                                            } else {
                                                                if (preg_match("/---REQUIRED---/", $label_address2)) {
                                                                    $required_fields .= "address2|";
                                                                    $label_address2 = preg_replace("/---REQUIRED---/", "", $label_address2);
                                                                }
                                                            }
                                                            ?>
                                               
                    <div class="input-group mb-10">
                        <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                        </div>
                        <input type="text" size="17" name="address2" id="address2" maxlength="30" class="form-control" value="" <?php $address2_readonly ?> placeholder="address2" />
                    </div>
                                                        <?php } ?>
                                                        <?php
                                                        if ($label_address3 == '---HIDE---') {
                                                            echo "<input type=\"hidden\" name=\"address3\" id=\"address3\" value=\"\" />";
                                                        } else {
                                                            $address3_readonly = '';
                                                            ?>
                                                  
                                                            <?php
                                                            if (preg_match("/---READONLY---/", $label_address3)) {
                                                                $address3_readonly = 'readonly="readonly"';
                                                                $label_address3 = preg_replace("/---READONLY---/", "", $label_address3);
                                                            } else {
                                                                if (preg_match("/---REQUIRED---/", $label_address3)) {
                                                                    $required_fields .= "address3|";
                                                                    $label_address3 = preg_replace("/---REQUIRED---/", "", $label_address3);
                                                                }
                                                            }
                                                            ?>
                                               
                    <div class="input-group mb-10">
                        <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                        </div>
                        <input type="text" size="17" name="address3" id="address3" maxlength="30" class="form-control" value="" <?php $address3_readonly ?> placeholder="address3" />
                    </div>
                                                        <?php } ?>
                
                
                
                
                
                
                                                        <?php
                                                        if ($label_postal_code == '---HIDE---') {
                                                            echo "<input type=\"hidden\" name=\"postal_code\" id=\"postal_code\" value=\"\" />";
                                                        } else {
                                                            $postal_code_readonly = '';
                                                            ?>
                                                  
                                                                <?php
                                                                    if (preg_match("/---READONLY---/", $label_postal_code)) {
                                                                        $postal_code_readonly = 'readonly="readonly"';
                                                                        $label_postal_code = preg_replace("/---READONLY---/", "", $label_postal_code);
                                                                    } else {
                                                                        if (preg_match("/---REQUIRED---/", $label_postal_code)) {
                                                                            $required_fields .= "postal_code|";
                                                                            $label_postal_code = preg_replace("/---REQUIRED---/", "", $label_postal_code);
                                                                        }
                                                                    }
                                                                    ?>
                                               
                    <div class="input-group mb-10">
                        <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                        </div>
                        <input type="text" size="17" name="postal_code" id="postal_code" maxlength="30" class="form-control" value="" <?php $postal_code_readonly ?> placeholder="postal_code" />
                    </div>
                                                        <?php } ?>
                
                                                        <?php
                                                        if ($label_city == '---HIDE---') {
                                                            echo "<input type=\"hidden\" name=\"city\" id=\"city\" value=\"\" />";
                                                        } else {
                                                            $city_readonly = '';
                                                            ?>
                                                  
                                                            <?php
                                                            if (preg_match("/---READONLY---/", $label_city)) {
                                                                $city_readonly = 'readonly="readonly"';
                                                                $label_city = preg_replace("/---READONLY---/", "", $label_city);
                                                            } else {
                                                                if (preg_match("/---REQUIRED---/", $label_city)) {
                                                                    $required_fields .= "city|";
                                                                    $label_city = preg_replace("/---REQUIRED---/", "", $label_city);
                                                                }
                                                            }
                                                            ?>
                                               
                    <div class="input-group mb-10">
                        <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                        </div>
                        <input type="text" size="17" name="city" id="city" maxlength="30" class="form-control" value="" <?php $city_readonly ?> placeholder="city" />
                    </div>
                                                        <?php } ?>
                                                        <?php
                                                        if ($label_province == '---HIDE---') {
                                                            echo "<input type=\"hidden\" name=\"province\" id=\"province\" value=\"\" />";
                                                        } else {
                                                            $city_readonly = '';
                                                            ?>
                                                  
                                                            <?php
                                                            if (preg_match("/---READONLY---/", $label_province)) {
                                                                $province_readonly = 'readonly="readonly"';
                                                                $label_province = preg_replace("/---READONLY---/", "", $label_province);
                                                            } else {
                                                                if (preg_match("/---REQUIRED---/", $label_province)) {
                                                                    $required_fields .= "province|";
                                                                    $label_province = preg_replace("/---REQUIRED---/", "", $label_province);
                                                                }
                                                            }
                                                            ?>
                                               
                    <div class="input-group mb-10">
                        <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                        </div>
                        <input type="text" size="17" name="province" id="province" maxlength="30" class="form-control" value="" <?php $province_readonly ?> placeholder="province" />
                    </div>
                                                        <?php } ?>
                
                                                        <?php
                                                        if ($label_vendor_lead_code == '---HIDE---') {
                                                            echo "<input type=\"hidden\" name=\"vendor_lead_code\" id=\"vendor_lead_code\" value=\"\" />";
                                                        } else {
                                                            $vendor_lead_code_readonly = '';
                                                            ?>
                                                  
                                                            <?php
                                                            if (preg_match("/---READONLY---/", $label_vendor_lead_code)) {
                                                                $vendor_lead_code_readonly = 'readonly="readonly"';
                                                                $label_vendor_lead_code = preg_replace("/---READONLY---/", "", $label_vendor_lead_code);
                                                            } else {
                                                                if (preg_match("/---REQUIRED---/", $label_vendor_lead_code)) {
                                                                    $required_fields .= "vendor_lead_code|";
                                                                    $label_vendor_lead_code = preg_replace("/---REQUIRED---/", "", $label_vendor_lead_code);
                                                                }
                                                            }
                                                            ?>
                                               
                    <div class="input-group mb-10">
                        <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                        </div>
                        <input type="text" size="17" name="vendor_lead_code" id="vendor_lead_code" maxlength="30" class="form-control" value="" <?php $vendor_lead_code_readonly ?> placeholder="vendor_lead_code" />
                    </div>
                                                        <?php } ?>
                
                
                                                        <?php
                                                        if ($label_comments == '---HIDE---') {
                                                            echo "<input type=\"hidden\" name=\"comments\" id=\"comments\" value=\"\" />\n";
                                                            echo "<input type=\"hidden\" name=\"other_tab_comments\" id=\"other_tab_comments\" value=\"\" />\n";
                                                            echo "<input type=\"hidden\" name=\"dispo_comments\" id=\"dispo_comments\" value=\"\" />\n";
                                                            echo "<input type=\"hidden\" name=\"callback_comments\" id=\"callback_comments\" value=\"\" />\n";
                                                            echo "<span id='viewcommentsdisplay'><input type='button' class='btn btn-primary waves-effect btn-xs' id='ViewCommentButton' onClick=\"ViewComments('ON','','','YES')\" value='-" . _QXZ("History") . "-'/></span>\n";
                                                            echo "<span id='otherviewcommentsdisplay'><input type='button' class='btn btn-primary waves-effect btn-xs' id='OtherViewCommentButton' onClick=\"ViewComments('ON','','','YES')\" value='-" . _QXZ("History") . "-'/></span>\n";
                                                        } else {
                                                            ?>
                    
                     <span id='viewcommentsdisplay'><input type='button' id='ViewCommentButton' class="btn btn-primary waves-effect btn-xs" onClick="ViewComments('ON', '', '', 'YES')" value='-History-'/></span>
                                              
                                                            <?php if (($multi_line_comments)) {
                                                                ?>
                                                     <div class="input-group mb-10">
                            <div class="input-group-addon">
                                <i class="fa fa-comments"></i>
                            </div>
                            <textarea name="comments" id="comments" class="form-control" required="" placeholder="" aria-invalid="false"></textarea>
                        </div>
                                                    <?php
                                                    } else {
                                                        echo " <input type=\"text\" size=\"65\" name=\"comments\" id=\"comments\" maxlength=\"255\" class=\"form-control\" value=\"\" /> ";
                                                    }
                                                    ?>
                    
                                                <?php } ?>
                 <input type="hidden" name="call_notes" id="call_notes" value="" /><span id="CallNotesButtons"></span>

                                            <input type="hidden" name="required_fields" id="required_fields" value="<?php $required_fields ?>" />
                <!-- /.input group -->
            </div>
            
            <div class="col-6">
                <!-- Date mm/dd/yyyy -->
                                        <?php
                                    if ($label_lead_id == '---HIDE---') {
                                        echo "<input type=\"hidden\" name=\"lead_id\" id=\"lead_id\" value=\"\" />";
                                    } else {
                                        $lead_id_readonly = '';
                                        ?>
                                                  
                                                    <?php
                                                        if (preg_match("/---READONLY---/", $label_lead_id)) {
                                                            $lead_id_readonly = 'readonly="readonly"';
                                                            $label_lead_id = preg_replace("/---READONLY---/", "", $label_lead_id);
                                                        } else {
                                                            if (preg_match("/---REQUIRED---/", $label_lead_id)) {
                                                                $required_fields .= "lead_id|";
                                                                $label_lead_id = preg_replace("/---REQUIRED---/", "", $label_lead_id);
                                                            }
                                                        }
                                                        ?>
                                               
                    <div class="input-group mb-10">
                        <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                        </div>
                        <input type="text" size="17" name="lead_id" id="lead_id" maxlength="30" class="form-control" value="" <?php $lead_id_readonly ?> placeholder="lead_id" />
                    </div>
                                        <?php } ?>
                
                                <?php
                                if ($label_phone_number == '---HIDE---') {
                                    echo "<input type=\"hidden\" name=\"phone_number\" id=\"phone_number\" value=\"\" />";
                                } else {
                                    $phone_number_readonly = '';
                                    ?>
                                                  
                            <?php
                            if (preg_match("/---READONLY---/", $label_phone_number)) {
                                $phone_number_readonly = 'readonly="readonly"';
                                $label_phone_number = preg_replace("/---READONLY---/", "", $label_phone_number);
                            } else {
                                if (preg_match("/---REQUIRED---/", $label_phone_number)) {
                                    $required_fields .= "phone_number|";
                                    $label_phone_number = preg_replace("/---REQUIRED---/", "", $label_phone_number);
                                }
                            }
                            ?>
                                               
                    <div class="input-group mb-10">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" size="17" name="phone_number" id="phone_number" maxlength="30" class="form-control" value="" <?php $phone_number_readonly ?> placeholder="phone_number" />
                    </div>
                <?php } ?>
                
                
                <!-- /.input group -->
            </div>
        </div>

        

        

        

        
       

        

        

        

    </div>
        
</div>       
                                  
                                </div>
                                
                                <div class="tab-pane" id="home4" role="tabpanel" >
                                    <div class="demo-settings">
                        <p>VOLUME SETTINGS</p>
                        <ul class="setting-list text-center">
                            <li>
			  
<span id="VolumeControlSpan"><span id="VolumeUpSpan"><button class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="Volume up Off" type="button"><i class="material-icons">volume_up</i></button></span>
&nbsp;<span id="VolumeDownSpan"><button class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="Volume down Off" type="button"><i class="material-icons">volume_down</i></button></span></span>&nbsp;
<span id="AgentMuteSpan"></span>		  
							</li>
							 </ul>
                        <p>RECORDING SETTINGS</p>
                        <ul class="setting-list">
                             <li>
                             <span>Recording File: <span id="RecorDingFilename"></span></span><br>
					<span>Record Id: <span id="RecorDID"></span></span>
							</li>
                         <li>
                          <div class="switch">
                                <span id="RecorDControl">
                                    <a href="#" class="active" onclick="conf_send_recording('MonitorConf', session_id, '', '', '', 'YES');return false;">
                                        <img src="./images/<?php echo _QXZ("vdc_LB_startrecording.gif"); ?>" border="0" alt="Start Recording" />
                                    </a>
                                </span>	
                          </div>		  
			</li> 
						</ul>
				   </div>  
                                </div>
                                    <div class="tab-pane" id="CallHistory" role="tabpanel" >
                                        <div class="row" style="margin:10px 5px 5px 5px;">
                                            <div class="col-md-12">
                                                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
              <div class="panel-title"> <span class="fa fa-dashboard"></span>Call History
              
              <div class="box-controls pull-right">
					<div class="box-header-actions">
					  <button type="button" class="btn btn-default" id="daterange-btn">
                    <span>
                      <i class="fa fa-calendar"></i> Date range picker
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
					</div>
				  </div>
              </div>
              
<!--                <ul class="nav panel-tabs">
                  <li>
                      <a href="javascript:void(0);"><i class="fa fa-arrow-left"></i>&nbsp;<i class="fa fa-arrow-left"></i></a>
                  </li>
                  <li>
                      <a href="javascript:void(0);"><i class="fa fa-arrow-left"></i></a>
                  </li>
                  <li>
                      <a href="javascript:void(0);"><?php echo date('Y-m-d');?></a>
                  </li>
                  <li>
                      <a href="javascript:void(0);"><i class="fa fa-dot-circle-o"></i></a>
                  </li>
                  <li>
                      <div class="form-group">
                <label>Date range button:</label>

                <div class="input-group">
                  <button type="button" class="btn btn-default pull-right" id="daterange-btn1">
                    <span>
                      <i class="fa fa-calendar"></i> Date range picker
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
              </div>

                  </li>
                  
                </ul>-->

            </div>
                        
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="CallHistoryTable">
                                <thead class="bg-success">
                                                <tr>
                                                    <th>Time Of Call</th>
                                                    <th>Call Length</th>
                                                    <th>Status</th>
                                                    <th>Number</th>
                                                    <th>Name</th>
                                                    <th>Campaign</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
<!--                    <div class="box-footer">
                        Footer
                    </div>-->
                    <!-- /.box-footer-->
                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                            </div>

                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->		

                    </div>
                    <!-- /.row -->

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <style>
.page-loader-wrapper{z-index:99999999;position:fixed;top:0;left:0;bottom:0;right:0;width:100%;height:100%;background:#eee;overflow:hidden;text-align:center}.page-loader-wrapper p{font-size:13px;margin-top:10px;font-weight:bold;color:#444}.page-loader-wrapper .loader{position:relative;top:calc(40% - 30px)}
.line{animation:expand 1s ease-in-out infinite;border-radius:10px;display:inline-block;transform-origin:center center;margin:0 4px;width:2px;height:25px}.line:nth-child(1){background:#f31e58}.line:nth-child(2){animation-delay:180ms;background:#258cce}.line:nth-child(3){animation-delay:360ms;background:#f6a724}.line:nth-child(4){animation-delay:540ms;background:#83c541}@keyframes expand{0%{transform:scale(1)}25%{transform:scale(2)}}.navbar{font-family:"Muli",sans-serif;-webkit-border-radius:0;-moz-border-radius:0;-ms-border-radius:0;border-radius:0;-webkit-box-shadow:0 1px 5px rgba(0,0,0,0.2);-moz-box-shadow:0 1px 5px rgba(0,0,0,0.2);-ms-box-shadow:0 1px 5px rgba(0,0,0,0.2);box-shadow:0 1px 5px rgba(0,0,0,0.2);border:none;position:fixed;top:0;left:0;z-index:11;width:100%;padding:0}
            </style>
            <div class="page-loader-wrapper" style="display: block;" id="LoadingBox">
    <div class="loader">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <p>Please wait...</p>
        <div class="m-t-30"><img src="https://reports.usethegeeks.com/assets/images/logo.png" alt="INTELLING DASHBOARD"></div>
    </div>
</div>
<div class="overlay"></div>
<?php require_once('d_files/modal.php');?>
            <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
            <li class="nav-item">
                <!--<a class="nav-link" href="javascript:void(0)">FAQ</a>-->
            </li>
        </ul>
    </div>
    &copy; 2019 <a href="https://usethegeeks.com/" target="_blank">UseTheGeeks</a>. All Rights Reserved.
</footer>
<!-- Control Sidebar -->

<!-- /.control-sidebar -->

<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
<!--<div class="control-sidebar-bg"></div>-->        
        </div>
        
        
    

 
</form> 


<form name="inert_form" id="inert_form" onsubmit="return false;">
<span style="position:absolute;left:0px;top:400px;z-index:1;" id="NothingBox2">
<input type="checkbox" name="inert_button" class="filled-in" id="inert_button"  value="0" onclick="return false;" /><label for="inert_button"></label>
</span>
</form>

<!-- <form name="alert_form" id="alert_form" onsubmit="return false;">
<span style="position:absolute;left:335px;top:170px;z-index:<?php $zi++;
        echo $zi ?>;" id="AlertBox">
        <div class="text-center" style="min-width:250px;">
            <div class="card">
                <div class="header bg-orange">
                    <h2>
                        Agent Alert!
                    </h2>
                </div>
                <div class="body"><center>
                    <img src="./images/alert.png" alt="alert" border="0"><br /><br /><span id="AlertBoxContent"> Alert Box </span><br /><button type="button" class="btn btn-primary waves-effect" name="alert_button" id="alert_button" onclick="hideDiv('AlertBox');return false;">OK</button>
                </center></div>
            </div>
        </div>
    </span>

</form> -->

<audio id='ChatAudioAlertFile'><source src="sounds/chat_alert.mp3" type="audio/mpeg"></audio>
<audio id='EmailAudioAlertFile'><source src="sounds/email_alert.mp3" type="audio/mpeg"></audio>
        
<?php require('d_files/script.php'); ?>
        <!-- jQuery 3 -->
        <script src="../assets/vendor_components/jquery/dist/jquery.min.js"></script>

        <!-- jQuery UI 1.11.4 -->
        <script src="../assets/vendor_components/jquery-ui/jquery-ui.js"></script>

        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
    $.widget.bridge('uibutton', $.ui.button);
        </script>

        <!-- popper -->
        <script src="../assets/vendor_components/popper/dist/popper.min.js"></script>

        <!-- Bootstrap 4.0-->
        <script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>	
        <script src="../assets/vendor_components/select2/dist/js/select2.full.js"></script>
        <script src="../assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
        <script src="../assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="../assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>
        
        <script src="../assets/vendor_components/moment/min/moment.min.js"></script>
        <script src="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        
        <!-- ChartJS -->
        <script src="../assets/vendor_components/chart.js-master/Chart.min.js"></script>

        <!-- Slimscroll -->
        <script src="../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- iCheck 1.0.1 -->
        <script src="../assets/vendor_plugins/iCheck/icheck.min.js"></script>

        <!-- FastClick -->
        <script src="../assets/vendor_components/fastclick/lib/fastclick.js"></script>

        <!-- peity -->
        <script src="../assets/vendor_components/jquery.peity/jquery.peity.js"></script>


        <!-- Fab Admin App -->
        <script src="../assets/js/template.js"></script>

        <!-- Fab Admin dashboard demo (This is only for demo purposes) -->
        <script src="../assets/js/pages/dashboard.js"></script>

        <!-- Fab Admin for demo purposes -->
        <script src="../assets/js/demo.js"></script>	
        <!-- This is data table -->
        <script src="../assets/vendor_components/datatable/datatables.min.js"></script>
        <!--<script src="../assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>-->

        <!-- Fab Admin for Data Table -->
        <!--<script src="../assets/js/pages/data-table.js"></script>-->
        <!--<script src="../assets/js/pages/advanced-form-element.js"></script>-->
        <script>
           $(document).ready(function(){
              $('.BTN-STATS').click(function(){
                 if($(this).hasClass('active')){
                     $('.AVG-STATS').toggle();
                     $('.FULL-STATS').toggle();
                 }else{
                     $('.AVG-STATS').toggle();
                     $('.FULL-STATS').toggle();
                 } 
              }); 
           });  
           
//           $('#CallHistoryTable').DataTable();
           
           $(document).on('click','.nav-link',function(){
              var hrefValue = $(this).attr('href');
              if(hrefValue == '#CallHistory'){
                  var InboundGroups = $('#CloserSelectList').val();
                  var CampaignID = '<?php echo $VD_campaign;?>';
                   var dt = $('#CallHistoryTable').DataTable({
            destroy: true,
            "bprocessing": true,
                              "bserverSide": true,
                              
                              "aaSorting": [[1,'asc']], 
                              "ajax": {
                                          "url":'d_files/ajax.php',
                                          "data" :{rule:'CallHistory',InboundGroups:InboundGroups,CampaignID:CampaignID}, 
                                           "type": "POST",
                                      },
                             
                              "columns": [
                                      { "data": "call_date" },
                                      { "data": "length_in_sec" },
                                      { "data": "status" },
                                      { "data": "phone_number" },
                                      { "data": "user" },
                                      { "data": "campaign_id" },
                                      {
                                          "className":      'history-action',
                                          "orderable":      false, 
                                          "data":           null,
                                          "defaultContent": '<a href="" class="btn btn-primary"><i class="fa fa-info"></i></a>&nbsp;<a href="" class="btn btn-success"><i class="fa fa-phone"></i></a>'
                                      },
                              ],

        });
//                  $.ajax({
//                        type: 'post',
//                        url: 'd_files/ajax.php',
//                        data: {rule:'CallHistory',InboundGroups:InboundGroups,CampaignID:CampaignID},
//                        success: function (data) {
//                          alert(data);
//                        }
//                      });
              }
           });
           
          //[advanced form element Javascript]

//Project:	Fab Admin - Responsive Admin Template
//Primary use:   Used only for the advanced-form-element

$(function () {
    "use strict";
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        var InboundGroups = $('#CloserSelectList').val();
        var CampaignID = '<?php echo $VD_campaign;?>';
        var start = start.format('YYYY-MM-DD');
        var end = end.format('YYYY-MM-DD');
         var dt = $('#CallHistoryTable').DataTable({
            destroy: true,
            "bprocessing": true,
                              "bserverSide": true,
                              
                              "aaSorting": [[1,'asc']], 
                              "ajax": {
                                          "url":'d_files/ajax.php',
                                          "data" :{rule:'CallHistory1',InboundGroups:InboundGroups,CampaignID:CampaignID,start:start,end:end}, 
                                           "type": "POST",
                                      },
                             
                              "columns": [
                                      { "data": "call_date" },
                                      { "data": "length_in_sec" },
                                      { "data": "status" },
                                      { "data": "phone_number" },
                                      { "data": "user" },
                                      { "data": "campaign_id" },
                                      {
                                          "className":      'history-action',
                                          "orderable":      false, 
                                          "data":           null,
                                          "defaultContent": '<a href="" class="btn btn-primary"><i class="fa fa-info"></i></a>&nbsp;<a href="" class="btn btn-success"><i class="fa fa-phone"></i></a>'
                                      },
                              ],

        });
      }
    );
  });
            </script>
    </body>
</html>	






