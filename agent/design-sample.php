<html lang="en" style="height: auto; min-height: 100%;"><head><title>Agent web client</title>
<!-- CAMPAIGN DEFAULT PARKING: |8301|park| -->
<!-- CAMPAIGN DEFAULT WEB FORM:  || -->
<!-- CAMPAIGN DEFAULT WEB FORM 2:  || -->
<!-- CAMPAIGN DEFAULT WEB FORM 3:  || -->
<!-- CAMPAIGN ALLOWS CLOSERS:    |1| -->
<!-- USING PREVIOUS MEETME ROOM - 8600055 - 2019-10-15 10:41:07 - SIP/9898 -->
<!-- old QUEUE and INCALL reverted list:   |1| -->
<!-- old QUEUE and INCALL reverted hopper: |0| -->
<!-- old vicidial_live_agents records cleared: |1| -->
<!-- old vicidial_live_inbound_agents records cleared: |1| -->
<!-- routing_initiated_recordings invalidated:   |0| -->
<!-- campaign is set to auto_dial_level: 1 -->
<!-- new vicidial_live_agents record inserted: |1| -->
<!-- CLOSER-type campaign -->
<!-- client web browser used: W3C-Compliant |Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36|0| -->
<!-- vicidial_agent_log record inserted: |1|99591| -->
<!-- vicidial_campaigns campaign_logindate updated: |1|2019-10-15 10:41:07| -->
        



    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="4q3RXCOhkMnWw1Cr4ZMigFOlcrWbsyhHZxRSshBc">
        <link rel="icon" href="../../../images/favicon.ico"> 

        <title>Dashboard | Agent</title> 

        <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/vendor_components/datatable/datatables.min.css">
        <!-- Bootstrap extend-->
        <link rel="stylesheet" href="../assets/css/bootstrap-extend.css">
        <link rel="stylesheet" href="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="../assets/vendor_components/bootstrap-switch/switch.css">
        <link rel="stylesheet" href="../assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="../assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css">
        <link href="../assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css" rel="stylesheet">
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
    <body class="skin-yellow sidebar-mini sidebar-collapse" onload="begin_all_refresh();" onunload="BrowserCloseLogout();" style="overflow-x: hidden; zoom: 80%; height: auto; min-height: 100%;" cz-shortcut-listen="true">
        <style>
            .hidden{display:none;}
            .showing{display:block;}
.page-loader-wrapper{z-index:99999999;position:fixed;top:0;left:0;bottom:0;right:0;width:100%;height:100%;background:#eee;overflow:hidden;text-align:center}.page-loader-wrapper p{font-size:13px;margin-top:10px;font-weight:bold;color:#444}.page-loader-wrapper .loader{position:relative;top:calc(40% - 30px)}
.line{animation:expand 1s ease-in-out infinite;border-radius:10px;display:inline-block;transform-origin:center center;margin:0 4px;width:2px;height:25px}.line:nth-child(1){background:#f31e58}.line:nth-child(2){animation-delay:180ms;background:#258cce}.line:nth-child(3){animation-delay:360ms;background:#f6a724}.line:nth-child(4){animation-delay:540ms;background:#83c541}@keyframes expand{0%{transform:scale(1)}25%{transform:scale(2)}}.navbar{font-family:"Muli",sans-serif;-webkit-border-radius:0;-moz-border-radius:0;-ms-border-radius:0;border-radius:0;-webkit-box-shadow:0 1px 5px rgba(0,0,0,0.2);-moz-box-shadow:0 1px 5px rgba(0,0,0,0.2);-ms-box-shadow:0 1px 5px rgba(0,0,0,0.2);box-shadow:0 1px 5px rgba(0,0,0,0.2);border:none;position:fixed;top:0;left:0;z-index:11;width:100%;padding:0}
        .sidebar-mini.sidebar-collapse .sidebar-menu>li>a {
   margin:0 0 10px 0 !important;
}    
        
    .page-loader-wrapper1{overflow:hidden;text-align:center}.page-loader-wrapper p{font-size:13px;margin-top:10px;font-weight:bold;color:#444}.page-loader-wrapper .loader{position:relative;top:calc(40% - 30px)}
.line{animation:expand 1s ease-in-out infinite;border-radius:10px;display:inline-block;transform-origin:center center;margin:0 4px;width:2px;height:25px}.line:nth-child(1){background:#f31e58}.line:nth-child(2){animation-delay:180ms;background:#258cce}.line:nth-child(3){animation-delay:360ms;background:#f6a724}.line:nth-child(4){animation-delay:540ms;background:#83c541}@keyframes expand{0%{transform:scale(1)}25%{transform:scale(2)}}.navbar{font-family:"Muli",sans-serif;-webkit-border-radius:0;-moz-border-radius:0;-ms-border-radius:0;border-radius:0;-webkit-box-shadow:0 1px 5px rgba(0,0,0,0.2);-moz-box-shadow:0 1px 5px rgba(0,0,0,0.2);-ms-box-shadow:0 1px 5px rgba(0,0,0,0.2);box-shadow:0 1px 5px rgba(0,0,0,0.2);border:none;position:fixed;top:0;left:0;z-index:11;width:100%;padding:0}
</style>
        <div id="loading_intro" style="position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; background: rgb(255, 255, 255); z-index: 2147483647; padding-top: 10%; display: none;">
    <div class="page-loader-wrapper1">
                <div class="loader1">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                    <p>Please wait...</p>
                </div>
            </div>
    <div class="sk-folding-cube-heading" style="text-align: center;">
        <h6 style="color:rgba(153, 153, 153, 0.62);margin-top: 100px !important;">Loading Agent Hub Plugins <i id="1check" class="fa fa-check text-green"></i><br>
            Configuring phone <span class="PhoneLogin">9898</span> <i id="2check" class="fa fa-check text-green"></i><br>
            Checking server health <i id="3check" class="fa fa-check text-green"></i><br>
            <span id="loadingPhone" class="">Loading Virtual Phone . . . .</span>
        </h6>
        <h4 style="color:rgb(92, 148, 185);bottom: 10px !important;">You are a admin you can <a href="#" onclick="$('#loading_intro').addClass('hidden');">skip</a> this.</h4>    </div>
    <div id="loading_disabled" class="sk-folding-cube-heading hidden"><h6 style="color:rgba(153, 153, 153, 0.62);margin-top: 200px !important;">Something is not right.<br><span id="loading_out_btn"><button type="button" class="btn btn-default  mt10 " onclick="LogouT('LOADING_DISABLED','');return false;" data-dismiss="modal">Logout</button></span></h6></div>
    <div id="phonering_disabled" class="sk-folding-cube-heading hidden" style="margin-left:1%;"><h6 style="color:rgba(153, 153, 153, 0.62);margin-top: 200px !important;">
            You did not answer your phone in time.<br>
            <br>
            <button type="button" class="btn btn-default" onclick="NoneInSessionCalL();return false;">
                Call Phone Again
            </button>
        </h6>
    </div>
</div>
            <div class="page-loader-wrapper" style="display: block; visibility: hidden;" id="LoadingBox">
                <div class="loader">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                    <p>Please wait...</p>
                    <div class="m-t-30"><img src="https://reports.usethegeeks.com/assets/images/logo.png" alt="INTELLING DASHBOARD"></div>
                </div>
            </div>
        <form name="vicidial_form" id="vicidial_form" onsubmit="return false;">
            <input type="hidden" size="5" name="conf_dtmf" class="cust_form" value="" maxlength="50">
            <input type="hidden" name="extension" id="extension">
            <input type="hidden" name="custom_field_values" id="custom_field_values" value="">
            <input type="hidden" name="FORM_LOADED" id="FORM_LOADED" value="0">
            <div class="wrapper" style="height: auto; min-height: 100%;">
                <header class="main-header">
                    <!-- Logo -->
                    <a href="javascript:void(0);" class="logo" style="background-color:#28373e;">
                        <!-- mini logo -->
                        <b class="logo-mini" style="margin-right: -10px;">
                            <img src="../assets/images/logonew.png">
                        </b>
                        <!-- logo-->

                    </a>
                    <!-- Header Navbar -->
                    <nav class="navbar navbar-static-top" style="background-color:#28373e;">
                        <!-- Sidebar toggle button-->
                        <div>
                            <a href="javascript:void(0);" class="sidebar-toggle" data-toggle="push-menu" role="button">
                                <!--<span class="sr-only">Toggle navigation</span>-->
                            </a>
                            <a href="javascript:void(0)" class="btn btn-default" id="WebForm-Display" style="display:none;">Agent View</a>
                        </div>

                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <!-- Messages -->

                                <li class="dropdown-toggle1" title="Callback Managment" id="CallBackManagement"><a href="javascript:void(0)" onclick="CalLBacKsLisTCheck();return false;"><i class="fa fa-book"></i><span class="badge">0</span></a> </li>
                                <li class="dropdown-toggle1" title="Messages" data-toggle="modal" data-target="#Message-Modal"><a href="javascript:void(0)" onclick="agent_message_handle();" class="AgentMessage"><i class="fa fa-comment"></i></a> <span class="badge" id="AgentMessageCount"></span></li>
                                <li class="dropdown-toggle1" title="Inbound Call Wating" id=""><a href="javascript:void(0)"><i class="fa fa-phone"></i><span class="badge" id="AgentStatusCalls">0</span></a></li>

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
                                                            <input name="group2" type="radio" id="radio_3" value="Yes" required="">
                                                            <label for="radio_3">Login</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input name="group2" type="radio" id="radio_3" value="Yes" required="">
                                                            <label for="radio_3">Paused</label>
                                                        </fieldset>
                                                    </div>
                                                    <h3 class="control-sidebar-heading">Pause Codes</h3>
                                                    <div class="form-group">
                                                                                                                    <input type="checkbox" id="" class="chk-col-grey">
                                                            <label for="report_panel" class="control-sidebar-subheading ">Lunch - Lunch</label> <br>
                                                            <input type="checkbox" id="" class="chk-col-grey">
                                                            <label for="report_panel" class="control-sidebar-subheading ">Meetin - Meeting</label> <br>
                                                            <input type="checkbox" id="" class="chk-col-grey">
                                                            <label for="report_panel" class="control-sidebar-subheading ">TeaAM - Tea Break Morning</label> <br>
                                                            <input type="checkbox" id="" class="chk-col-grey">
                                                            <label for="report_panel" class="control-sidebar-subheading ">TeaPM - Tea Break Evening</label> <br>
                                                            <input type="checkbox" id="" class="chk-col-grey">
                                                            <label for="report_panel" class="control-sidebar-subheading ">Toilet - Toilet</label> <br>
                                                            <input type="checkbox" id="" class="chk-col-grey">
                                                            <label for="report_panel" class="control-sidebar-subheading ">Train - Training</label> <br>
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

<style>
    .fa-rotate-hangup{transform:rotate(494deg);padding: 0 0 0 1px;}
    /*.fa-lg{left:-1.85714286em}*/
</style>
<aside class="main-sidebar" style="position:fixed">
                <!-- sidebar-->
                <!-- sidebar menu-->
                <ul class="sidebar-menu tree" data-widget="tree" style="top:40px; position:absolute">
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li class="hidden" id="DTMF-Model"><a href="" class="btn btn-primary DTMF-BTN-keyboard" data-toggle="modal" data-target="#DTMF-Modal"><i class="fa fa-keyboard-o"></i></a></li>
                    <li class="" id="CallPause"> <a href="javascript:void(0);" class="btn btn-success" onclick="AutoDial_ReSume_PauSe('VDADready', '', '', '', '', '', '', 'YES');" title="Go Ready"> <i class="fa fa-play"></i> </a> </li>
                                        <li class="" id="XferControl"></li>
                    <li class="" id="HangupControl"></li>
                    <li class="hidden" id="DispoModal"> <a href="javascript:void(0);" class="btn btn-warning" data-toggle="modal" data-target="#CallDispo-Modal" title="Show Disposition"> <i class="fa fa-arrow-circle-right"></i> </a> </li>
                </ul>
                <ul class="sidebar-menu tree" data-widget="tree" style="bottom:0px; position:fixed">
                    <li class="" id="AgentMuteSpan1" style="display:none;"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#CallTransfer-Modal"><i class="fa fa-share"></i></a></li>
                    <li class="" id="AgentMuteSpan"><a href="#CHAN-SIP/9898-00004429" onclick="volume_control('MUTING','SIP/9898-00004429','AgenT');return false;" class="btn btn-success"><i class="fa fa-microphone"></i></a></li>
                    <li class="" id="WebFormSpan"></li>
                    <li class="" id="ManualDial"> <a href="#" class="btn btn-info" onclick="NeWManuaLDiaLCalL('NO', '', '', '', '', 'YES');return false;" title="Manual Dial"> <i class="fa fa-phone"></i> </a> </li>
                    <!--<li class="treeview"> <a href="#" class="btn btn-warning"> <i class="fa fa-clock-o"></i> </a> </li>-->
                    <li class="" id="InboundGroups"> <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-inbound-groups" title="Change Groups"> <i class="fa fa-users"></i> </a> </li>
                    <li class="" id="LogoutBTN"> <a href="javascript:void(0);" class="btn btn-danger" onclick="NormalLogout();return false;needToConfirmExit = false;" title="Logout"> <i class="fa fa-sign-out"></i> </a> </li>
                </ul>
            </aside>
                <div class="content-wrapper" style="min-height: 584.844px;">
<section class="content" style="min-height: 578px;margin-top:30px;">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-user text-green"></span>Cogent HUB <span class="label label-success">Incall</span></div>
                                <ul class="nav panel-tabs">
                                    <li><a href="javascript:void(0);" class="">Webform ONE</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="box card-inverse" style="background: #50B79B;min-height:150px;width:100%;">
                                    <div class="flexbox align-items-center py-20" data-overlay="4">
                                        <div class="col-lg-8 col-md-8">
                                            
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            

                                        </div>
                                    </div>
                                </div>	
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    
                                </div>
                                <div class="col-md-8">
                                    <div class="box">
                                        <div class="box-header">
                                            <h4 class="box-title">Lead Information</h4>
                                        </div>
                                        <div class="box-body">
                                            <div class="pad" id="MainPanel" style="visibility: visible;">
    <input type="hidden" name="list_id" id="list_id" value="">
    <input type="hidden" name="entry_list_id" id="entry_list_id" value="">
    <input type="hidden" name="list_name" id="list_name" value="">
    <input type="hidden" name="list_description" id="list_description" value="">
    <input type="hidden" name="called_count" id="called_count" value="">
    <input type="hidden" name="rank" id="rank" value="">
    <input type="hidden" name="owner" id="owner" value="">
    <input type="hidden" name="gmt_offset_now" id="gmt_offset_now" value="">
    <input type="hidden" name="gender" id="gender" value="">
    <input type="hidden" name="date_of_birth" id="date_of_birth" value="">
    <input type="hidden" name="country_code" id="country_code" value="">
    <input type="hidden" name="uniqueid" id="uniqueid" value="">
    <input type="hidden" name="callserverip" id="callserverip" value="">
    <input type="hidden" name="SecondS" id="SecondS" value="">
    <input type="hidden" name="email_row_id" id="email_row_id" value="">
    <input type="hidden" name="chat_id" id="chat_id" value="">
    <input type="hidden" name="customer_chat_id" id="customer_chat_id" value="">
    <input type="hidden" name="phone_code" id="phone_code" value="">
    <input type="hidden" name="middle_initial" id="middle_initial" value="">
    <input type="hidden" name="title" id="title" value="">
    <input type="hidden" name="state" id="state" value="">
    <input type="hidden" name="province" id="state" value="">
    <input type="hidden" name="security_phrase" id="state" value="">
   
    <!--MainPanelCustInfo-->
    <div class="form-group">
        <div class="row mb-10">
            <div class="col-6">
                
                                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control cust_form" size="17" name="first_name" id="first_name" maxlength="30" value="" placeholder="First">
                </div>
                                                    
                <!-- /.input group -->
            </div>
            <div class="col-6">
                <!-- Date mm/dd/yyyy -->
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="" value="" name="lead_id" id="lead_id">
                </div>
                <!-- /.input group -->
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-6">
                                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control cust_form" placeholder="Last " size="23" name="last_name" id="last_name" maxlength="30" value="">
                </div>
                                                    
                <!-- /.input group -->
            </div>
            <div class="col-6">
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-6">
                
                                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="Address1" size="85" name="address1" id="address1" maxlength="100" value="">
                </div>
                                <!-- /.input group -->
            </div>
            <div class="col-6">
                <font class="body_text"><span id="phone_numberDISP"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span></font><input type="hidden" name="phone_number" id="phone_number" value="">                
                <!-- /.input group -->
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-6">
                                 <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="Address2" size="85" name="address2" id="address2" maxlength="100" value="">
                </div>
                                <!-- /.input group -->
            </div>
            <div class="col-6">
                                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-mobile"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="Alt. Phone" size="14" name="alt_phone" id="alt_phone" maxlength="12" value="">
                </div>
                                                    
                <!-- /.input group -->
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-6">
                                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="Address3" size="85" name="address3" id="address3" maxlength="100" value="">
                </div>
                            </div>
            <div class="col-6">
                
                                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-envelope"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Email" size="45" name="email" id="email" maxlength="70" value="">
                                </div>
                                                    <!-- /.input group -->
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-6">
                                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <input type="text" class="form-control cust_form" placeholder="City" size="20" name="city" id="city" maxlength="50" value="">
                                </div>
                                                    
                <!-- /.input group -->
            </div>
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-6">
                                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                    </div>
                    <input type="text" class="form-control cust_form" placeholder="PostCode" size="\&quot;14\&quot;" name="postal_code" id="postal_code" maxlength="10" value="">
                </div>
                                                    
                
                <!-- /.input group -->
            </div>
            <div class="col-6">
                 
                <div class="input-group" id="GENDERhideFORie">
                    <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                    </div>
                    <select class="form-control" name="gender_list" id="gender_list">
                        <option value="U">U - Undefined</option>
                        <option value="M">M - Male</option>
                        <option value="F">F - Female</option>
                    </select>
                </div>
                            </div>
        </div>

        <div class="row mb-10">
            <div class="col-6">
                                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Vendor ID" size="15" name="vendor_lead_code" id="vendor_lead_code" maxlength="20" value="">
                                    </div>
                                    
                
                <!-- /.input group -->
            </div>
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-puzzle-piece"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="Source Id">
                </div>
                <!-- /.input group -->
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-6">
                                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-comments"></i>
                    </div>
                    <textarea name="comments" id="comments" class="form-control cust_form_text" placeholder=" Comments"></textarea>
                    <span id="viewcommentsdisplay"></span>
                </div>
                                
                <!-- /.input group -->
            </div>
            <div class="col-6">
                 <input type="hidden" name="call_notes" id="call_notes" value=""><span id="CallNotesButtons" style="visibility: hidden;"></span>
<input type="hidden" name="required_fields" id="required_fields" value="">
                                
            </div>
        </div>

        
        <div class="row mb-10 CustomFieldsDiv">
            
        </div>
    </div>
</div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
                    <!-- Main content -->
                    <section class="content" style="min-height: 578px;display:none;">

                        <div class="row" id="AgentDetailView">
                            <div class="col-md-12 text-center" style="margin-top:20px;display:none;">
                                <span style="margin-left:160px; font-size:14px;color: #ffc107;">
                                    <span id="agentchannelSPAN"></span>&nbsp;&nbsp;
                                    <span id="status">2019-10-15 15:11:26</span>&nbsp;&nbsp;
Session ID: <span id="sessionIDspan">8600055</span>&nbsp; &nbsp;
                                    <span id="AgentStatusCallsOLD"></span>&nbsp; &nbsp;
                                    <span id="AgentStatusEmails"><font class="queue_text">Emails in Queue: 0</font></span>
                                </span>
                                <span id="MainStatuSSpan" style="background: rgb(204, 204, 204);"></span>
                            </div>
                            
                            <div class="col-12" style="margin-top:20px;">
                                <div class="box card-inverse bg-img" id="MainStatuSSpanOLD" style="background: rgb(204, 204, 204);">
                                    <div class="flexbox align-items-center py-20" data-overlay="4">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="align-items-center mr-auto"> 
                                                <!--<a href="#" class="left-float"> <img class="avatar avatar-xl avatar-bordered" src="http://webduniaguru.com/an-new-admin/images/avatar/4.jpg" alt=""> </a>-->
                                                <div class="pl-10 profile left-float" style="margin: 3px 0 0 5px;">
                                                    <h5 class="mb-0"><a class="hover-primary text-white" href="javascript:void(0);" onclick="start_all_refresh();">Ankit Kumar</a></h5>
                                                    <span>Campaign 1001</span><br>
                                                    <span>Team - ADMIN</span><br>
                                                    <span>Phone - SIP/9898</span> </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="user-info">
                                                        <div class="image" style="display:none;">
                                                            <img src="./images/agc_live_call_OFF.gif" name="livecall" alt="Live Call" width="48px" height="48px"></div>
                                                        <div class="info-container" style="display:none;">
                                                            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Phone No. : <span id="phone_numberDISP"></span></div>
                                                            <div class="email"><span id="dialableleadsspan">
                                                                                                                                    </span></div> 
                                                        </div>
                                                    </div>

                                                    <div class="menu">   
                                                        <div class="button-demo" style="margin-left:10px;">

                                                            
                                                            <span id="ManualQueueNotice"></span>
                                                            <span id="ManualQueueChoice"></span>
                                                            <span id="NexTCalLPausE"></span>
                                                            <span id="DiaLLeaDPrevieW"></span>
                                                            <span id="DiaLDiaLAltPhonE"></span>


                                                            <span id="DiaLControl" style="display:none;"><a href="javascript:void(0);" class="btn btn-success" onclick="AutoDial_ReSume_PauSe('VDADready','','','','','','','YES');"> <i class="fa fa-play"></i> </a></span>

                                                            <!-- -->

                                                            
                                                            <span id="WebFormSpanTwo"></span>
                                                            <span id="WebFormSpanThree"></span>

                                                            <span id="ParkCounterSpan"></span><br>
                                                            <span id="ParkControl" style="display:none;">
                                                                <img src="./images/vdc_LB_parkcall_OFF.gif" border="0" alt="Park Call" style="width:136px"></span>
<span style="display: none; visibility: hidden;" id="ivrParkControl"></span>


                                                            <span id="ReQueueCall"></span>

                                                            
                                                            










                                                            
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
                            <div class="col-12 col-lg-3">

                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Today's Overview</h4>
                                    </div>	

                                    <div class="box-body">
                                        <div class="text-center py-20">
                                            <div class="donut" data-peity="{ &quot;fill&quot;: [&quot;#7460ee&quot;, &quot;#26c6da&quot;, &quot;#fc4b6c&quot;, &quot;#ffb22b &quot;], &quot;radius&quot;: 108, &quot;innerRadius&quot;: 50  }" style="display: none;">22,41,37,0</div><svg class="peity" height="216" width="216"><path d="M 107.995 0 A 107.995 107.995 0 0 1 214.07711164244475 87.75875493131467 L 157.10936253643445 98.62593427071377 A 50 50 0 0 0 107.995 57.995000000000005" fill="#7460ee"></path><path d="M 214.07711164244475 87.75875493131467 A 107.995 107.995 0 0 1 29.27003308162469 181.92266470476875 L 71.54656862892944 142.22235529643444 A 50 50 0 0 0 157.10936253643445 98.62593427071377" fill="#26c6da"></path><path d="M 29.27003308162469 181.92266470476875 A 107.995 107.995 0 0 1 107.99499999999999 0 L 107.99499999999999 57.995000000000005 A 50 50 0 0 0 71.54656862892944 142.22235529643444" fill="#fc4b6c"></path></svg>
                                        </div>

                                        <ul class="flexbox flex-justified text-center mt-70">
                                            <li class="br-1">
                                                <div class="font-size-20 text-primary">22%</div>
                                                <small class="font-size-12 text-fade">Talking</small>
                                            </li>

                                            <li class="br-1">
                                                <div class="font-size-20 text-success">41%</div>
                                                <small class="font-size-12 text-fade">Pause</small>
                                            </li>

                                            <li>
                                                <div class="font-size-20 text-danger">37%</div>
                                                <small class="font-size-12 text-fade">Waiting</small>
                                            </li>

                                            <li>
                                                <div class="font-size-20 text-warning">0%</div>
                                                <small class="font-size-12 text-fade">Wrap</small>
                                            </li>
                                        </ul>
                                       
                                    </div>
                                </div>
                                <div class="examples my-35 b-1 p-5 rounded bg-white">
                                        <div id="countdown" class="row justify-content-md-center text-dark"></div>
                                </div>
                            </div>

                            <div class="col-lg-9 col-12" style="margin-top:-59px">
                                <ul class="nav nav-tabs" role="tablist" id="StatsDetail-LI">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><span class="fa fa-pie-chart"></span></a> </li>
                                    <!--<li class="nav-item" id=""> <a class="nav-link" data-toggle="tab" href="#home4" role="tab" ><span class="fa  fa-cog"></span></a> </li>-->
                                    <li class="nav-item" id="CallHistoryTab"> <a class="nav-link" data-toggle="tab" href="#CallHistory" role="tab"><span class="fa fa-clock-o"></span></a> </li>
                                </ul>
                                <ul class="nav nav-tabs" role="tablist" id="LeadDetail-LI" style="display:none;">
                                    <li class="nav-item" id="LeadDetailTab"> <a class="nav-link" href="#home2" data-toggle="tab" role="tab" onclick="MainPanelToFront('NO', 'YES');"><span class="fa  fa-credit-card-alt"></span></a> </li>
                                </ul>

                                <div class="tab-content tabcontent-border" id="StatsDetail-Area">

                                    <div class="tab-pane active" id="home1" role="tabpanel">
                                        <div class="pt-10 mr-10" align="right">
                                            <span type="button" class="btn btn-medium btn-toggle btn-info BTN-STATS" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </span> Average Stats</div>
                                        <div class="pad">
                                            <div class="row FULL-STATS">
                                                
                                                <div class="col-xl-6 col-md-6 col-6 performance" data-action="Talk">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                          <h3 class="text-green">00:01:00</h3>

                                                        <p>Talk Time</p>
                                                      </div>
                                                      <div class="icon text-green">
                                                        <i class="fa fa-phone"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6 performance" data-action="Wait">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                          <h3 class="text-blue">00:01:43</h3>

                                                        <p>Wait Time</p>
                                                      </div>
                                                      <div class="icon text-blue">
                                                        <i class="fa fa-clock-o"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6 performance" data-action="Dispo">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3 class="text-yellow">00:00:00</h3>

                                                        <p>Wrap Time</p>
                                                      </div>
                                                      <div class="icon text-yellow">
                                                        <i class="fa fa-clock-o"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6 performance" data-action="Pause">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3 class="text-primary">00:01:53</h3>

                                                        <p>Pause Time</p>
                                                      </div>
                                                      <div class="icon text-primary">
                                                        <i class="fa fa-pause"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6 performance" data-action="Call">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3 class="text-success">0</h3>

                                                        <p>Calls</p>
                                                      </div>
                                                      <div class="icon text-success">
                                                        <i class="fa fa-phone"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6 performance" data-action="Connect">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                          <h3 class="text-success">0</h3>

                                                        <p>Connects</p>
                                                      </div>
                                                      <div class="icon text-success">
                                                        <i class="fa fa-user-plus"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6 performance" data-action="DMC">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3 class="text-success">0</h3>

                                                        <p>DMCs</p>
                                                      </div>
                                                      <div class="icon text-success">
                                                        <i class="fa fa-user-plus"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-xl-6 col-md-6 col-6 performance" data-action="Sale">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3 class="text-success">0</h3>

                                                        <p>Sales</p>
                                                      </div>
                                                      <div class="icon text-success">
                                                        <i class="fa fa-shopping-cart"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                <div class="col-md-12" id="Performance-Div">
                                                    
                                                </div>
                                            </div>
                                            <div class="row AVG-STATS" style="display:none;">
                                                                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                      <div class="inner">
                                                        <h3>22%</h3>

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
                                                        <h3>37%</h3>

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
                                                        <h3>0%</h3>

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
                                                        <h3>41%</h3>

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
                                                        <h3>0%</h3>

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
                                                        <h3>0%</h3>

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
                                                        <h3>0%</h3>

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
                                                        <h3>0%</h3>

                                                        <p>Avg Sales</p>
                                                      </div>
                                                      <div class="icon">
                                                        <i class="fa fa-shopping-cart"></i>
                                                      </div>
                                                      <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                  </div>
                                                
                                            </div>


                                            <div class="card " style="z-index: 1; display: none; visibility: hidden;" id="ViewCommentsBox">
                                                <div class="header">
                                                    <h2>View Comment History:<small><span id="ViewCommentsShowHide"><a href="#" onclick="ViewComments('OFF', '', '', 'YES');return false;">hide comment history</a></span></small></h2>
                                                </div>
                                                <div class="body">
                                                    <pre><font size="1"><span id="audit_comments"></span></font></pre>
                        <input type="hidden" class="cust_form_text" id="audit_comments_button" name="audit_comments_button" value="0">
                    </div>
                </div>
         
               
                 <div class="card" style="z-index: 2; display: none; visibility: hidden;" id="AgentStatusSpan">
                        <div class="header">
				            <h2>Agent Status</h2>
				        </div>
				         <div class="body">
                                            Your Status: <span id="AgentStatusStatus">PAUSED</span> <br>Calls Dialing: <span id="AgentStatusDiaLs">0</span>
                    	</div>
            	</div>

                 <div class="card" style="z-index: 3; top: -382px; display: none; visibility: hidden;" id="HotKeyEntriesBox">
                        <div class="row clearfix">
                                    <div class="header">
                                        <h2>Disposition Hot Keys:</h2><br>When active, simply press the keyboard key for the desired disposition for this call. The call will then be hungup and dispositioned automatically:
                                    </div>
                                    <div class="body">
                                        <div class="table-responsive">
                                            <table class="table table-hover dashboard-task-infos">
                                                <tbody><tr>
                                                    <td><span id="HotKeyBoxA"><br></span></td>
                                                    <td><span id="HotKeyBoxB"></span></td>
                                                    <td><span id="HotKeyBoxC"></span></td>
                                                </tr>
                                            </tbody></table>
                                        </div>
                                    </div>
                        </div>
                </div>
                
                <div class="card" style="z-index: 4; top: -655px; display: none; visibility: hidden;" id="CBcommentsBox">
                    <table class="table table-responsive">
                    <tbody><tr>
                    <td align="left"> Previous Callback Information:</td>
                    <td align="right"> <a class="btn btn-danger" href="#" onclick="CBcommentsBoxhide();return false;">close</a> </td>
                    </tr><tr>
                    <td>
                    <span id="CBcommentsBoxA"></span><br>
                    <span id="CBcommentsBoxB"></span><br>
                    <span id="CBcommentsBoxC"></span><br>
                    </td>
                    <td>
                    <span id="CBcommentsBoxD"></span>
                    </td>
                    </tr></tbody></table>
                </div>
</div>                                </div>
                                
                                <div class="tab-pane" id="home4" role="tabpanel">
                                    <div class="demo-settings">
                        <p>VOLUME SETTINGS</p>
                        <ul class="setting-list text-center">
                            <li>
			  
<span id="VolumeControlSpan"><span id="VolumeUpSpan"><button class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="" type="button" data-original-title="Volume up Off"><i class="material-icons">volume_up</i></button></span>
&nbsp;<span id="VolumeDownSpan"><button class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="" type="button" data-original-title="Volume down Off"><i class="material-icons">volume_down</i></button></span></span>&nbsp;
<span id="AgentMuteSpanOLD"></span>		  
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
                                <span id="RecorDControl"><img src="./images/vdc_LB_startrecording_OFF.gif" border="0" alt="Start Recording"></span>	
                          </div>		  
			</li> 
						</ul>
				   </div>  
                                </div>
                                    
                                    <div class="tab-pane" id="CallHistory" role="tabpanel">
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
                      <a href="javascript:void(0);">2019-10-15</a>
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
                        <div class="table-responsive" id="CallHistoryTable">
                            
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
                                <!--START for LEAD-->
                                <div class="tab-content tabcontent-border" id="LeadDetail-Area" style="display:none;">
                                <div class="tab-pane active" id="home2" role="tabpanel">
                                    
                                    <div class="pt-10 mr-10" align="right"><span type="button" class="btn btn-medium btn-toggle btn-info active" data-toggle="button" aria-pressed="true" autocomplete="off"><div class="handle"></div></span> Data Output</div>
                                          <div class="pad" id="MainPanel" style="visibility: visible;">
    <input type="hidden" name="list_id" id="list_id" value="">
    <input type="hidden" name="entry_list_id" id="entry_list_id" value="">
    <input type="hidden" name="list_name" id="list_name" value="">
    <input type="hidden" name="list_description" id="list_description" value="">
    <input type="hidden" name="called_count" id="called_count" value="">
    <input type="hidden" name="rank" id="rank" value="">
    <input type="hidden" name="owner" id="owner" value="">
    <input type="hidden" name="gmt_offset_now" id="gmt_offset_now" value="">
    <input type="hidden" name="gender" id="gender" value="">
    <input type="hidden" name="date_of_birth" id="date_of_birth" value="">
    <input type="hidden" name="country_code" id="country_code" value="">
    <input type="hidden" name="uniqueid" id="uniqueid" value="">
    <input type="hidden" name="callserverip" id="callserverip" value="">
    <input type="hidden" name="SecondS" id="SecondS" value="">
    <input type="hidden" name="email_row_id" id="email_row_id" value="">
    <input type="hidden" name="chat_id" id="chat_id" value="">
    <input type="hidden" name="customer_chat_id" id="customer_chat_id" value="">
    <input type="hidden" name="phone_code" id="phone_code" value="">
    <input type="hidden" name="middle_initial" id="middle_initial" value="">
    <input type="hidden" name="title" id="title" value="">
    <input type="hidden" name="state" id="state" value="">
    <input type="hidden" name="province" id="state" value="">
    <input type="hidden" name="security_phrase" id="state" value="">
   
    <!--MainPanelCustInfo-->
    <div class="form-group">
        <div class="row mb-10">
            <div class="col-6">
                
                                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control cust_form" size="17" name="first_name" id="first_name" maxlength="30" value="" placeholder="First">
                </div>
                                                    
                <!-- /.input group -->
            </div>
            <div class="col-6">
                <!-- Date mm/dd/yyyy -->
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="" value="" name="lead_id" id="lead_id">
                </div>
                <!-- /.input group -->
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-6">
                                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control cust_form" placeholder="Last " size="23" name="last_name" id="last_name" maxlength="30" value="">
                </div>
                                                    
                <!-- /.input group -->
            </div>
            <div class="col-6">
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-6">
                
                                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="Address1" size="85" name="address1" id="address1" maxlength="100" value="">
                </div>
                                <!-- /.input group -->
            </div>
            <div class="col-6">
                <font class="body_text"><span id="phone_numberDISP"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span></font><input type="hidden" name="phone_number" id="phone_number" value="">                
                <!-- /.input group -->
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-6">
                                 <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="Address2" size="85" name="address2" id="address2" maxlength="100" value="">
                </div>
                                <!-- /.input group -->
            </div>
            <div class="col-6">
                                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-mobile"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="Alt. Phone" size="14" name="alt_phone" id="alt_phone" maxlength="12" value="">
                </div>
                                                    
                <!-- /.input group -->
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-6">
                                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="Address3" size="85" name="address3" id="address3" maxlength="100" value="">
                </div>
                            </div>
            <div class="col-6">
                
                                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-envelope"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Email" size="45" name="email" id="email" maxlength="70" value="">
                                </div>
                                                    <!-- /.input group -->
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-6">
                                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <input type="text" class="form-control cust_form" placeholder="City" size="20" name="city" id="city" maxlength="50" value="">
                                </div>
                                                    
                <!-- /.input group -->
            </div>
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-6">
                                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                    </div>
                    <input type="text" class="form-control cust_form" placeholder="PostCode" size="\&quot;14\&quot;" name="postal_code" id="postal_code" maxlength="10" value="">
                </div>
                                                    
                
                <!-- /.input group -->
            </div>
            <div class="col-6">
                 
                <div class="input-group" id="GENDERhideFORie">
                    <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                    </div>
                    <select class="form-control" name="gender_list" id="gender_list">
                        <option value="U">U - Undefined</option>
                        <option value="M">M - Male</option>
                        <option value="F">F - Female</option>
                    </select>
                </div>
                            </div>
        </div>

        <div class="row mb-10">
            <div class="col-6">
                                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Vendor ID" size="15" name="vendor_lead_code" id="vendor_lead_code" maxlength="20" value="">
                                    </div>
                                    
                
                <!-- /.input group -->
            </div>
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-puzzle-piece"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="Source Id">
                </div>
                <!-- /.input group -->
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-6">
                                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-comments"></i>
                    </div>
                    <textarea name="comments" id="comments" class="form-control cust_form_text" placeholder=" Comments"></textarea>
                    <span id="viewcommentsdisplay"></span>
                </div>
                                
                <!-- /.input group -->
            </div>
            <div class="col-6">
                 <input type="hidden" name="call_notes" id="call_notes" value=""><span id="CallNotesButtons" style="visibility: hidden;"></span>
<input type="hidden" name="required_fields" id="required_fields" value="">
                                
            </div>
        </div>

        
        <div class="row mb-10 CustomFieldsDiv">
            
        </div>
    </div>
</div>

                                </div>
                            </div>
                                <!--END for LEAD-->
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->		

                    </div>
                        <!-- /.row -->
                        <div class="row" id="AgentWebFormView" style="display:none;">
                            <div class="col-md-12">
                                <iframe src="" width="100%" style="margin-top:40px;"></iframe>
                            </div>
                        </div>
                    </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            
<div class="overlay"></div>
<!-- ZZZZZZZZZZZZ  header -->
<style>
 .center {
    position: absolute;
    width: 100px;
    height: 50px;
    top: 50%;
    left: 50%;
    margin-left: -50px; /* margin is -0.5 * dimension */
    margin-top: -25px; 
}&#8203;

</style>
<span style="position:absolute;left:0px;top:0px;z-index:5;display:none;" id="Header">
    <table border="0" cellpadding="0" cellspacing="0" bgcolor="white" width="760px" marginwidth="0" marginheight="0" leftmargin="0" topmargin="0" valign="top" align="left">
    <tbody><tr valign="top" align="left"><td colspan="3" valign="top" align="left">
    <input type="hidden" name="extension" id="extension">
    <input type="hidden" name="custom_field_values" id="custom_field_values" value="">
    <input type="hidden" name="FORM_LOADED" id="FORM_LOADED" value="0">
	<font class="queue_text">
	<a href="#" onclick="start_all_refresh();"><font class="queue_text">Logged in as User</font></a>: AnkitK on Phone: SIP/9898&nbsp; to campaign: 1001&nbsp;  &nbsp; &nbsp; <span id="agentchannelSPAN"></span></font></td>
    <td colspan="3" valign="top" align="right"><font class="body_text">
		<a href="#" onclick="OpeNGrouPSelectioN();return false;">GROUPS</a> &nbsp; &nbsp; 
	<a href="#" onclick="NormalLogout();return false;needToConfirmExit = false;">LOGOUT</a>
    </font></td></tr>
    </tbody></table>
</span>

<!-- ZZZZZZZZZZZZ  tabs -->
<span style="position:absolute;left:0px;top:13px;z-index:6;display:none;" id="Tabs">
    <table border="0" bgcolor="#FFFFFF" width="760px" height="30px">
    <tbody><tr valign="top" align="left">
    <td align="left" width="115px" bgcolor="#FFFFFF"><a href="#" onclick="MainPanelToFront('NO','YES');"><img src="./images/logo.png" alt="MAIN" width="115px" height="30px" border="0"></a></td>
    <td align="left" width="67px"><a href="#" onclick="ScriptPanelToFront('YES');"><img src="./images/vdc_tab_script.gif" alt="SCRIPT" width="67px" height="30px" border="0"></a></td>
	<td align="left" width="67px"><a href="#" onclick="FormPanelToFront('YES');"><img src="./images/vdc_tab_form.gif" alt="FORM" width="67px" height="30px" border="0"></a></td>
	<td align="left" width="67px"><a href="#" onclick="EmailPanelToFront('YES');"><img src="./images/vdc_tab_email.gif" alt="EMAIL" width="67px" height="30px" border="0"></a></td>
	<td align="left" width="67px"><a href="#" onclick="InternalChatContentsLoad('YES');"><img src="./images/vdc_tab_chat_internal.gif" name="InternalChatImg" alt="CHAT" width="67px" height="30px" border="0"></a></td>
<td align="left" width="67px"><a href="#" onclick="CustomerChatPanelToFront('1', 'YES');"><img src="https://cogentomni.usethegeeks.com/agent/images/vdc_tab_chat_customer.gif" name="CustomerChatImg" alt="CHAT" width="67px" height="30px" border="0"></a></td>
    <td width="431px" valign="middle" align="center"><font class="body_tiny">&nbsp; <span id="status">LIVE</span>&nbsp; &nbsp; session ID: <span id="sessionIDspan"></span></font><br><font class="body_text">&nbsp; &nbsp;<span id="AgentStatusCalls"></span>&nbsp; &nbsp;<span id="AgentStatusEmails"></span></font></td>
    <td width="109px"><img src="./images/agc_live_call_OFF.gif" name="livecall" alt="Live Call" width="109px" height="30px" border="0"></td>
    </tr>
 </tbody></table>
</span>
<span style="z-index: 7; display: none; visibility: hidden;" id="WelcomeBoxA">
    <table class="table table-responsive"><tbody><tr><td align="center"><br><span id="WelcomeBoxAt">Agent Screen</span></td></tr></tbody></table>
</span>


<span style="position:absolute;left:350px;top:700px;z-index:8;display:none;" id="debugbottomspan"></span>


<span style="position:absolute;left:550px;top:350px;z-index:9; display:none;" id="PauseCodeButtons"><font class="body_text">
    <span id="PauseCodeLinkSpan"><a class="btn bg-orange" href="#" onclick="PauseCodeSelectContent_create('YES');return false;">Enter a Pause Code</a></span> <br>
    </font></span>

<span id="MaiNfooterspan" style="display:none;">
    <span id="blind_monitor_notice_span" style="visibility: hidden;"><b><font color="red"> &nbsp; &nbsp; <span id="blind_monitor_notice_span_contents"></span></font></b></span>
    <table id="MaiNfooter" width="760px">

        <tbody><tr><td colspan="3"><font class="body_small"><span id="AgentAlertSpan" style="visibility: hidden;">
                    <a href="#" onclick="alert_control('ON');return false;">Alert is OFF</a>                </span></font></td></tr>
    </tbody></table>
</span>




<span style="position:absolute;left:640px;top:400px;z-index:10;" id="AgentMuteANDPreseTDiaL"><font class="body_text">
    <br>
    <br><br> &nbsp; <br>
    </font></span>

<span style="position: absolute; left: 350px; top: 500px; min-width: 400px; overflow: scroll; z-index: 11; background-color: rgb(246, 246, 246); visibility: hidden;" id="callsinqueuedisplay"><table cellpadding="0" cellspacing="0" border="0"><tbody><tr><td width="5px" rowspan="2">&nbsp;</td><td align="center"><font class="body_text">Calls In Queue: &nbsp; </font></td></tr><tr><td align="center"><span id="callsinqueuelist">&nbsp;</span></td></tr></tbody></table></span>

<span style="position:absolute;left:310px;top:412px;z-index:12;display:none;" id="callsinqueuelink">
    </span>
<span style="position:absolute;left:300px;top:350px;z-index:13;visibility:hidden;" id="CallbacksButtonsOLD">
    <font class="body_text">
        <span id="CBstatusSpanOLD">X ACTIVE CALLBACKS</span> <br>
    </font>
</span>

<span style="position: absolute; left: 500px; top: 400px; z-index: 14; visibility: hidden;" id="OtherTabCommentsSpan">
    <input type="hidden" name="other_tab_comments" id="other_tab_comments" value="">
</span>

<span style="position: absolute; left: 73.2%; top: 100px; z-index: 15; visibility: hidden;" id="AgentViewSpan">
    <div class="card">
        <div class="header">
            <h2>Other Agents Status:</h2>
        </div>
        <div class="body">
            <span id="AgentViewStatus">&nbsp;</span>
        </div>
    </div>
</span>


<span style="position:absolute;left:200px;top:350px;z-index:16;" id="dialableleadsspan">
</span>

<span style="position:absolute;left:140px;top:650px;z-index:17;" id="AgentMuteSpanOLD"></span>
<span style="position:absolute;left:700px;top:69px;z-index:18;display:none;" id="MainCommit">
<a href="#" onclick="CustomerData_update('YES')"><font class="body_small">commit</font></a>
</span>

<span style="position: absolute; left: 154px; top: 65px; z-index: 19; visibility: hidden;" id="ScriptPanel">
	    <table border="0" bgcolor="#E6E6E6" width="606px" height="331px"><tbody><tr><td align="left" valign="top"><font class="sb_text"><div class="noscroll_script" id="ScriptContents">AGENT SCRIPT</div></font></td></tr></tbody></table>
</span>

<span style="position: absolute; left: 700px; top: 69px; z-index: 20; visibility: hidden;" id="ScriptRefresH">
<a href="#" onclick="RefresHScript('','YES')"><font class="body_small">refresh</font></a>
</span>

<span style="position: absolute; left: 154px; top: 65px; z-index: 21; visibility: hidden;" id="FormPanel">
	    <table border="0" bgcolor="#E6E6E6" width="606px" height="331px"><tbody><tr><td align="left" valign="top"><font class="sb_text"><div class="noscroll_script" id="FormContents"><iframe src="./vdc_form_display.php?lead_id=&amp;list_id=&amp;stage=WELCOME" style="background-color:transparent;" scrolling="auto" frameborder="0" allowtransparency="true" id="vcFormIFrame" name="vcFormIFrame" width="600px" height="331px"> </iframe></div></font></td></tr></tbody></table>
</span>

<span style="position: absolute; left: 154px; top: 65px; z-index: 23; visibility: hidden;" id="EmailPanel">
	    <table border="0" bgcolor="#E6E6E6" width="606px" height="331px"><tbody><tr><td align="left" valign="top"><font class="sb_text"><div class="noscroll_script" id="EmailContents"><iframe src="./vdc_email_display.php?lead_id=&amp;list_id=&amp;stage=WELCOME" style="background-color:transparent;" scrolling="auto" frameborder="0" allowtransparency="true" id="vcEmailIFrame" name="vcEmailIFrame" width="600px" height="331px"> </iframe></div></font></td></tr></tbody></table>
</span>

<span style="position: absolute; left: 154px; top: 65px; z-index: 25; visibility: hidden;" id="CustomerChatPanel">
	    <table border="0" bgcolor="#E6E6E6" width="606px" height="331px"><tbody><tr><td align="left" valign="top"><font class="sb_text"><div class="noscroll_script" id="ChatContents"><iframe src="./vdc_chat_display.php?lead_id=&amp;list_id=&amp;dial_method=RATIO&amp;stage=WELCOME&amp;server_ip=136.244.105.201&amp;user=AnkitK" style="background-color:transparent;" scrolling="auto" frameborder="0" allowtransparency="true" id="CustomerChatIFrame" name="CustomerChatIFrame" width="600px" height="331px"> </iframe></div></font></td></tr></tbody></table>
</span>

<span style="position: absolute; left: 154px; top: 65px; z-index: 27; visibility: hidden;" id="InternalChatPanel">
	    <table border="0" bgcolor="#E6E6E6" width="606px" height="331px"><tbody><tr><td align="left" valign="top"><font class="sb_text"><div class="noscroll_script" id="InternalChatContents"><iframe src="./agc_agent_manager_chat_interface.php?user=AnkitK&amp;pass=Utgesx009" style="background-color:transparent;" scrolling="auto" frameborder="0" allowtransparency="true" id="InternalChatIFrame" name="InternalChatIFrame" width="600px" height="331px"> </iframe></div></font></td></tr></tbody></table>
</span>


<span style="position: absolute; left: 685px; top: 69px; z-index: 29; visibility: hidden;" id="FormRefresH">
<a href="#" onclick="FormContentsLoad('YES')"><font class="body_small">reset form</font></a>
</span>


<span style="position: absolute; left: 320px; top: 175px; z-index: 999999; display: none; visibility: hidden;" id="TransferMain">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="TransferMaindiv">
        <div class="card">
            <div class="header">
                <h2>Transfer conference function:</h2>&nbsp;<span id="XfeRDiaLGrouPSelecteD_OLD"></span> &nbsp; &nbsp; <span id="XfeRCID"></span>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><span id="XfeRGrouPLisT_OLD"><select size="1" name="XfeRGrouP_OLD" id="XfeRGrouP_OLD" class="form-control" onchange="XferAgentSelectLink();return false;"><option>-- SELECT A GROUP TO SEND YOUR CALL TO --</option></select></span></td>
                                <td><span id="LocalCloser"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="" disabled="" data-original-title="LOCAL CLOSER Off">Local Closer</button></span></td>
                                <td><span id="HangupXferLine_OLD"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="" disabled="" data-original-title="Hangup Xfer Line Off">Hangup Xfer Line</button></span></td>
                                <td><span id="ParkXferLine_OLD"><img src="./images/vdc_XB_parkxferline_OFF.gif" border="0" alt="Park Xfer Line" style="vertical-align:middle"></span></td>
                            </tr>
                            <tr>
                                <td>seconds:<input type="text" size="2" name="xferlength_OLD" id="xferlength_OLD" maxlength="4" class="cust_form" readonly="readonly"></td>
                                <td>channel:<input type="text" size="12" name="xferchannel_OLD" id="xferchannel_OLD" maxlength="200" class="cust_form" readonly="readonly"></td>
                                <td><span id="consultative_checkbox_OLD"><input type="checkbox" name="consultativexfer_OLD" class="filled-in chk-col-blue-grey" id="consultativexfer_OLD" size="1" value="0"><label for="consultativexfer">CONSULTATIVE</label></span></td>	
                                <td><span id="HangupBothLines"><a href="#" onclick="bothcall_send_hangup('YES');return false;"><button type="button" style="width:136px" class="btn bg-red btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Hangup Both Lines">Hangup Both Lines</button></a></span></td>
                            </tr>
                            <tr>
                                <td>Number to call: 
                                                                            <input type="text" size="20" name="xfernumber_OLD" id="xfernumberold" maxlength="25" class="cust_form" value=""> 
                                    </td>
                                <td><span id="agentdirectlink" style="visibility: hidden;"><a href="#" onclick="XferAgentSelectLaunch();return false;">AGENTS</a></span>
                                    <input type="hidden" name="xferuniqueid_OLD" id="xferuniqueid_OLD">
                                    <input type="hidden" name="xfername_OLD" id="xfername_OLD">
                                    <input type="hidden" name="xfernumhidden_OLD" id="xfernumhidden_OLD">
                                </td>
                                <td>
                                    <span id="dialoverride_checkbox_OLD"><input type="checkbox" class="filled-in chk-col-blue-grey" name="xferoverride_OLD" id="xferoverride_OLD" size="1" value="0"><font class="body_tiny"><label for="xferoverride">DIAL OVERRIDE</label></font></span>
                                </td>
                                <td>
                                    <span style="background-color: #CCCCCC" id="Leave3WayCall_OLD"><a href="#" onclick="leave_3way_call('FIRST', 'YES');return false;"><button type="button" style="width:136px" class="btn bg-blue btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="LEAVE 3-WAY CALL">Leave 3-Way Call</button></a></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><span id="DialBlindTransfer"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="" disabled="" data-original-title="Dial Blind Transfer off">Dial Blind Transfer</button></span>
                                    <span id="DialWithCustomer"><a href="#" onclick="SendManualDial('YES', 'YES');return false;"><button type="button" style="width:136px" class="btn bg-blue btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Dial With Customer">Dial With Customer</button></a></span>
                                    <span style="background-color: #CCCCCC" id="ParkCustomerDial"><a href="#" onclick="xfer_park_dial('YES');return false;"><button type="button" style="width:136px" class="btn bg-blue btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Park Customer Dial">Park Customer Dial</button></a></span>
                                                                                <font class="body_tiny">
                                            <a href="#" onclick="DtMf_PreSet_a();return false;">D1</a> 
                                            <a href="#" onclick="DtMf_PreSet_b();return false;">D2</a>
                                            <a href="#" onclick="DtMf_PreSet_c();return false;">D3</a>
                                            <a href="#" onclick="DtMf_PreSet_d();return false;">D4</a>
                                            <a href="#" onclick="DtMf_PreSet_e();return false;">D5</a>
                                            </font>
                                                                            </td>
                            </tr>
                            <tr>
                                <td colspan="4"><span id="DialBlindVMail"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="" disabled="" data-original-title="Blind Transfer VMail Message Off">VM</button></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</span>

<span style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%; overflow: scroll; z-index: 30; background-color: rgb(246, 246, 246); visibility: hidden;" id="AgentXferViewSpan"><center><font class="body_text">
Available Agents Transfer: <span id="AgentXferViewSelect_OLD"></span></font><br><a href="#" onclick="AgentsXferSelect('0', 'AgentXferViewSelect');return false;">close</a></center></span>

<span style="position: absolute; left: 5px; top: 310px; z-index: 31; visibility: hidden;" id="EAcommentsBox">
    <table border="0" bgcolor="#FFFFCC" width="740px" height="70px">
        <tbody><tr bgcolor="#FFFF66">
            <td align="left"><font class="sh_text"> Extended Alt Phone Information: </font></td>
            <td align="right"><font class="sk_text"> <a href="#" onclick="EAcommentsBoxhide('YES');return false;"> minimize </a> </font></td>
        </tr><tr>
            <td valign="top"><font class="sk_text">
                <span id="EAcommentsBoxC"></span><br>
                <span id="EAcommentsBoxB"></span><br>
                </font></td>
            <td width="320px" valign="top"><font class="sk_text">
                <span id="EAcommentsBoxA"></span><br>
                <span id="EAcommentsBoxD"></span>
                </font></td>
        </tr></tbody></table>
</span>

<span style="position: absolute; left: 695px; top: 310px; z-index: 32; visibility: hidden;" id="EAcommentsMinBox">
    <table border="0" bgcolor="#FFFFCC" width="40px" height="20px">
        <tbody><tr bgcolor="#FFFF66">
            <td align="left"><font class="sk_text"><a href="#" onclick="EAcommentsBoxshow();return false;"> maximize </a> <br>Alt Phone Info</font></td>
        </tr></tbody></table>
</span>
<span style="position:absolute;left:0px;bottom:10%;z-index:9999999999;visibility:hidden" id="NoneInSessionBox">
    <div class="container text-center">
        <!--<div class="lead-OLD"><span id="NoneInSessionID-OLD"></span></div>-->
        <div class="lead">You did not answer your phone in time.</div>
        <div class="button-place">
            <!--<a href="#" onclick="NoneInSessionOK();return false;" class="btn btn-danger btn-app">Go Back</a>&nbsp;&nbsp;-->
            <!--<span id="NoneInSessionLink-OLD"><a href="#" onclick="NoneInSessionCalL();return false;" class="btn btn-default btn-app">Call Agent Again</a></span>-->
            <br>
            <span id="NoneInSessionLink"><a class="btn btn-primary waves-effect btn-lg CallAgentWebphone" href="#" onclick="NoneInSessionCalL('LOGIN');return false;">Call Agent Webphone</a></span>
        </div>
    </div>
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 33; width: 100%; height: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="CustomerGoneBox">
    <table border="0" width="770px" height="510px"><tbody><tr><td align="center"> Customer has hung up: <span id="CustomerGoneChanneL"></span><br>
                <a class="btn btn-default" href="#" onclick="CustomerGoneOK();return false;">Go Back</a>
                <br><br>
                <a class="btn btn-default" href="#" onclick="CustomerGoneHangup();return false;">Finish and Disposition Call</a>
            </td></tr></tbody></table>
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 34; width: 100%; height: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="WrapupBox">
    <table border="0" width="770px" height="510px"><tbody><tr><td align="center"> Call Wrapup: <span id="WrapupTimer"></span> seconds remaining in wrapup<br><br>
                <span id="WrapupMessage">Wrapup Call</span>
                <br><br>
                <span id="WrapupBypass"><a class="btn btn-dafault" href="#" onclick="WrapupFinish();return false;">Finish Wrapup and Move On</a></span>
            </td></tr></tbody></table>
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 35; width: 100%; height: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="FSCREENWrapupBox"><table border="0" width="770px" height="510px" cellpadding="0" cellspacing="0"><tbody><tr><td><span id="FSCREENWrapupMessage">Wrapup Call</span></td></tr></tbody></table></span>

<span class="text-center" style="position: absolute; left: 350px; top: 175px; z-index: 36; width: 400px; visibility: hidden;" id="TimerSpan">
    <div class="card" style="height:240px;">
        <div class="body">
            <span id="TimerContentSpan"></span>
            <br><a href="#" class="btn btn-danger  waves-effect" onclick="hideDiv('TimerSpan');return false;">Close Message</a>
        </div>
    </div>
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 999; width: 100%; height: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="AgenTDisablEBoX">
    <center><table style="margin:15% auto;"><tbody><tr><td align="center"><span style="font-size:30px;">Your session has been disabled</span><br><br><a href="#" onclick="LogouT('DISABLED', '');return false;" class="btn btn-primary btn-lg waves-effect">Click Here To Reset Your Session</a>
                </td></tr></tbody></table></center>
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 37; width: 100%; height: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="SysteMDisablEBoX">
    <center><table style="margin:15% auto;"><tbody><tr><td align="center">There is a time synchronization problem with your system, please tell your system administrator<br><br><br><a href="#" onclick="hideDiv('SysteMDisablEBoX');return false;" class="btn btn-default btn-lg waves-effect">Go Back</a>
                </td></tr></tbody></table></center>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:38;width:100%;height:100%;background-color:#e9e9e9;display:none;" id="LogouTBoxOLD">
    <div class="container text-center">
        <br><br><br><br><br><span id="LogouTProcess">
            <br>
            <br>
            <font class="loading_text">LOGOUT PROCESSING...</font>
            <br>
            <br>
            <div class="preloader pl-size-xl"><div class="spinner-layer"><div class="circle-clipper left"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
        </span><br><br><span id="LogouTBoxLinkOLD"><font class="loading_text">LOGOUT</font></span></div>
</span>

<span style="position: absolute; left: 0px; top: 70px; z-index: 39; visibility: hidden;" id="DispoButtonHideA">
    <table border="0" width="165px" height="22px" style="background:transparent"><tbody><tr><td align="center" valign="top"></td></tr></tbody></table>
</span>

<span style="position: absolute; left: 0px; top: 138px; z-index: 40; visibility: hidden;" id="DispoButtonHideB">
    <table border="0" width="165px" height="250px" style="background:transparent"><tbody><tr><td align="center" valign="top">&nbsp;</td></tr></tbody></table>
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 41; width: 100%; height: 100%; visibility: hidden;" id="DispoButtonHideC">
    <div class="alert alert-info">Any changes made to the customer information below at this time will not be comitted, You must change customer information before you Hangup the call.</div>
</span>


<span style="position: absolute; left: 0px; top: 0px; z-index: 42; width: 100%; height: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="DispoSelectBox">
    <div style="position:fixed;width:100%;height:100%;background-color:#e9e9e9;"></div>
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-left:25%">
            <div class="card">
                <div class="header">
                    <h2>DISPOSITION CALL: <span id="DispoSelectPhonE"></span><div class="pull-right"><span id="DispoSelectHAspan"><a href="#" class="btn bg-blue-grey waves-effect" onclick="DispoHanguPAgaiN()">Hangup Again</a></span>&nbsp;<span id="DispoSelectMaxMin"><a href="#" class="btn bg-blue-grey waves-effect" onclick="DispoMinimize()"> minimize </a></span></div></h2>
                </div>
                <div class="body table-responsive"><center>
                        <span id="Dispo3wayMessage"></span>
                        <span id="DispoManualQueueMessage"></span>
                        <span id="PerCallNotesContent"><input type="hidden" name="call_notes_dispo" id="call_notes_dispo" value=""></span>
                        <span id="DispoCommentsContent"><input type="hidden" name="dispo_comments" id="dispo_comments" value=""></span>
                        <span id="DispoSelectContent"> End-of-call Disposition Selection </span>
                        <table class="table">
                            <tbody><tr><td align="center"><input type="hidden" name="DispoSelection" id="DispoSelection"><br>
                                    <input type="checkbox" name="DispoSelectStop" class="filled-in chk-col-blue-grey" id="DispoSelectStop" size="1" value="0"><label for="DispoSelectStop">PAUSE AGENT DIALING</label><br>
                                    <a href="#" class="btn btn-warning waves-effect" onclick="DispoSelectContent_create('', 'ReSET', 'YES');return false;">CLEAR FORM</a>
                                    <a href="#" class="btn btn-primary waves-effect" onclick="DispoSelect_submit('', '', 'YES');return false;">SUBMIT</a>
                                    <br><br>
                                    <a href="#" class="btn btn primary waves-effect" onclick="WeBForMDispoSelect_submit();return false;">WEB FORM SUBMIT</a>
                                    <br><br>
                                </td></tr>
                        </tbody></table></center>
                </div>
            </div>
        </div>
    </div>
</span>
<!--Agent Callback Selection START-->
<div class="modal center-modal fade" id="AgentCallbackSelection-Modal" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-black">
                  <h5 class="modal-title">Agent Callback Selection</h5>
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                  </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="CallBackOnlyMe" class="filled-in" id="CallBackOnlyMe" value="0">
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                          <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                              <input type="text" class="form-control pull-right" id="datepicker" name="CallBackDatESelectioN">
                    </div>
                    </div>
                </div>
                <div class="bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="glyphicon glyphicon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="glyphicon glyphicon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="glyphicon glyphicon-chevron-up"></i></a></td></tr><tr><td><span class="bootstrap-timepicker-hour">04</span></td> <td class="separator">:</td><td><span class="bootstrap-timepicker-minute">00</span></td> <td class="separator">&nbsp;</td><td><span class="bootstrap-timepicker-meridian">PM</span></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="glyphicon glyphicon-chevron-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="glyphicon glyphicon-chevron-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="glyphicon glyphicon-chevron-down"></i></a></td></tr></tbody></table></div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Time</label>
                        <div class="col-sm-10">
                              <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                                  <input type="text" class="form-control pull-right timepicker" name="CallBackTimESelectioN">
                        </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                    <div class="col-sm-10">
                          <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" class="form-control pull-right">
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Comments</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="CallBackCommenTsField" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Personal</label>
                    <div class="col-sm-10">
                        <button type="button" class="btn btn-md btn-toggle btn-info active" data-toggle="button" aria-pressed="true" autocomplete="off">
						<div class="handle"></div>
					  </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                  <!--<button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>-->
                  <button type="button" class="btn btn-success float-right" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-dark float-right" style="margin-right:10px;" onclick="CallBackDatE_submit();return false;">Submit</button>
            </div>
          </div>
    </div>
</div>

<!--AGENT Callback Selection END-->

<span style="position:absolute;left:0px;top:0px;z-index:43;width:100%;height:100%;background-color:#e9e9e9;display:none" id="CallBackSelectBoxOLD">
    <div class="row clearfix" style="margin-left:15%">
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header text-center">
                    <h4>
                                    Select a CallBack Date <span id="CallBackDatE"></span>                 </h4>
                </div>
                <input type="hidden" name="CallBackDatESelectioN" id="CallBackDatESelectioN">
                <input type="hidden" name="CallBackTimESelectioN" id="CallBackTimESelectioN">
                <span id="CallBackDatEPrinT">Select a Date Below</span> &nbsp;
                <span id="CallBackTimEPrinT"></span> 
                <div class="">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="CBT_hour">Hour: </label>
                                <select size="1" name="CBT_hour" id="CBT_hour" class="form-control">
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                    <option>05</option>
                                    <option>06</option>
                                    <option>07</option>
                                    <option>08</option>
                                    <option>09</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                                                    </select> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="CBT_minute">Minutes: </label>
                                <select size="1" name="CBT_minute" id="CBT_minute" class="form-control">
                                    <option>00</option>
                                    <option>05</option>
                                    <option>10</option>
                                    <option>15</option>
                                    <option>20</option>
                                    <option>25</option>
                                    <option>30</option>
                                    <option>35</option>
                                    <option>40</option>
                                    <option>45</option>
                                    <option>50</option>
                                    <option>55</option>
                                </select> 
                            </div>
                        </div>
                    </div>

                                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="CBT_ampm">Format: </label>		
                                    <select size="1" name="CBT_ampm" id="CBT_ampm" class="form-control">
                                        <option>AM</option>
                                        <option selected="">PM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
			<input type="checkbox" name="CallBackOnlyMe" class="filled-in" id="CallBackOnlyMe" value="0"> <label for="CallBackOnlyMe">My Callback Only</label></div> <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
			<div class="form-group">
				<div class="form-line"><label for="CallBackCommenTsField">CB Comments</label><input class="form-control" type="text" name="CallBackCommenTsField" id="CallBackCommenTsField" size="50" maxlength="255"></div></div></div>
<span id="CBCommentsContent"><input type="hidden" name="cbcomment_comments" id="cbcomment_comments" value=""></span>
                    <a class="btn btn-primary" href="#" onclick="CallBackDatE_submit();return false;">SUBMIT</a>
                </div>

                <br><br><center>
                    <span id="CallBackDateContent"><table class="table table-responsive"><tbody><tr><td valign="top"><table border="1" cellpadding="1" bordercolor="000000" cellspacing="0" bgcolor="white"><tbody><tr><td colspan="7" bordercolor="#ffffff" bgcolor="#FFFFCC"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="2">October 2019</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sun</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Mon</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Tue</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Wed</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Thu</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Fri</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sat</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bgcolor="#CCCCCC" bordercolor="#ffffff"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">1</font></div></td><td bgcolor="#CCCCCC" bordercolor="#ffffff"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">2</font></div></td><td bgcolor="#CCCCCC" bordercolor="#ffffff"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">3</font></div></td><td bgcolor="#CCCCCC" bordercolor="#ffffff"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">4</font></div></td><td bgcolor="#CCCCCC" bordercolor="#ffffff"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">5</font></div></td></tr><tr><td bgcolor="#CCCCCC" bordercolor="#ffffff"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">6</font></div></td><td bgcolor="#CCCCCC" bordercolor="#ffffff"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">7</font></div></td><td bgcolor="#CCCCCC" bordercolor="#ffffff"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">8</font></div></td><td bgcolor="#CCCCCC" bordercolor="#ffffff"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">9</font></div></td><td bgcolor="#CCCCCC" bordercolor="#ffffff"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">10</font></div></td><td bgcolor="#CCCCCC" bordercolor="#ffffff"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">11</font></div></td><td bgcolor="#CCCCCC" bordercolor="#ffffff"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">12</font></div></td></tr><tr><td bgcolor="#CCCCCC" bordercolor="#ffffff"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">13</font></div></td><td bgcolor="#CCCCCC" bordercolor="#ffffff"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">14</font></div></td><td bgcolor="#FFCCCC" bordercolor="#FFCCCC" onclick="CB_date_pick('2019-10-15');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-15');return false;">15</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-10-16');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-16');return false;">16</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-10-17');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-17');return false;">17</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-10-18');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-18');return false;">18</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-10-19');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-19');return false;">19</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-10-20');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-20');return false;">20</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-10-21');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-21');return false;">21</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-10-22');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-22');return false;">22</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-10-23');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-23');return false;">23</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-10-24');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-24');return false;">24</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-10-25');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-25');return false;">25</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-10-26');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-26');return false;">26</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-10-27');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-27');return false;">27</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-10-28');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-28');return false;">28</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-10-29');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-29');return false;">29</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-10-30');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-30');return false;">30</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-10-31');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-10-31');return false;">31</a></font></div></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td></tr></tbody></table></td><td valign="top"><table border="1" cellpadding="1" bordercolor="000000" cellspacing="0" bgcolor="white"><tbody><tr><td colspan="7" bordercolor="#ffffff" bgcolor="#FFFFCC"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="2">November 2019</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sun</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Mon</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Tue</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Wed</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Thu</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Fri</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sat</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-01');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-01');return false;">1</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-02');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-02');return false;">2</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-03');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-03');return false;">3</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-04');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-04');return false;">4</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-05');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-05');return false;">5</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-06');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-06');return false;">6</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-07');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-07');return false;">7</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-08');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-08');return false;">8</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-09');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-09');return false;">9</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-10');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-10');return false;">10</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-11');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-11');return false;">11</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-12');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-12');return false;">12</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-13');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-13');return false;">13</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-14');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-14');return false;">14</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-15');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-15');return false;">15</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-16');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-16');return false;">16</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-17');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-17');return false;">17</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-18');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-18');return false;">18</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-19');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-19');return false;">19</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-20');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-20');return false;">20</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-21');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-21');return false;">21</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-22');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-22');return false;">22</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-23');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-23');return false;">23</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-24');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-24');return false;">24</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-25');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-25');return false;">25</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-26');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-26');return false;">26</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-27');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-27');return false;">27</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-28');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-28');return false;">28</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-29');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-29');return false;">29</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-11-30');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-11-30');return false;">30</a></font></div></td></tr></tbody></table></td><td valign="top"><table border="1" cellpadding="1" bordercolor="000000" cellspacing="0" bgcolor="white"><tbody><tr><td colspan="7" bordercolor="#ffffff" bgcolor="#FFFFCC"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="2">December 2019</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sun</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Mon</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Tue</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Wed</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Thu</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Fri</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sat</font></b></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-01');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-01');return false;">1</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-02');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-02');return false;">2</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-03');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-03');return false;">3</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-04');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-04');return false;">4</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-05');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-05');return false;">5</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-06');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-06');return false;">6</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-07');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-07');return false;">7</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-08');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-08');return false;">8</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-09');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-09');return false;">9</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-10');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-10');return false;">10</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-11');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-11');return false;">11</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-12');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-12');return false;">12</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-13');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-13');return false;">13</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-14');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-14');return false;">14</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-15');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-15');return false;">15</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-16');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-16');return false;">16</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-17');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-17');return false;">17</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-18');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-18');return false;">18</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-19');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-19');return false;">19</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-20');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-20');return false;">20</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-21');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-21');return false;">21</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-22');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-22');return false;">22</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-23');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-23');return false;">23</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-24');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-24');return false;">24</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-25');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-25');return false;">25</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-26');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-26');return false;">26</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-27');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-27');return false;">27</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-28');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-28');return false;">28</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-29');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-29');return false;">29</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-30');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-30');return false;">30</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2019-12-31');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2019-12-31');return false;">31</a></font></div></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td></tr></tbody></table></td><td valign="top"><table border="1" cellpadding="1" bordercolor="000000" cellspacing="0" bgcolor="white"><tbody><tr><td colspan="7" bordercolor="#ffffff" bgcolor="#FFFFCC"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="2">January 2020</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sun</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Mon</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Tue</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Wed</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Thu</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Fri</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sat</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-01');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-01');return false;">1</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-02');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-02');return false;">2</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-03');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-03');return false;">3</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-04');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-04');return false;">4</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-05');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-05');return false;">5</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-06');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-06');return false;">6</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-07');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-07');return false;">7</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-08');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-08');return false;">8</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-09');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-09');return false;">9</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-10');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-10');return false;">10</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-11');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-11');return false;">11</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-12');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-12');return false;">12</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-13');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-13');return false;">13</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-14');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-14');return false;">14</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-15');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-15');return false;">15</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-16');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-16');return false;">16</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-17');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-17');return false;">17</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-18');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-18');return false;">18</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-19');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-19');return false;">19</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-20');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-20');return false;">20</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-21');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-21');return false;">21</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-22');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-22');return false;">22</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-23');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-23');return false;">23</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-24');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-24');return false;">24</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-25');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-25');return false;">25</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-26');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-26');return false;">26</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-27');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-27');return false;">27</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-28');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-28');return false;">28</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-29');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-29');return false;">29</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-30');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-30');return false;">30</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-01-31');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-01-31');return false;">31</a></font></div></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td></tr></tbody></table></td></tr><tr><td valign="top"><table border="1" cellpadding="1" bordercolor="000000" cellspacing="0" bgcolor="white"><tbody><tr><td colspan="7" bordercolor="#ffffff" bgcolor="#FFFFCC"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="2">February 2020</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sun</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Mon</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Tue</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Wed</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Thu</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Fri</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sat</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-01');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-01');return false;">1</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-02');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-02');return false;">2</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-03');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-03');return false;">3</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-04');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-04');return false;">4</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-05');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-05');return false;">5</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-06');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-06');return false;">6</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-07');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-07');return false;">7</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-08');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-08');return false;">8</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-09');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-09');return false;">9</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-10');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-10');return false;">10</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-11');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-11');return false;">11</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-12');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-12');return false;">12</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-13');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-13');return false;">13</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-14');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-14');return false;">14</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-15');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-15');return false;">15</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-16');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-16');return false;">16</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-17');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-17');return false;">17</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-18');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-18');return false;">18</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-19');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-19');return false;">19</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-20');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-20');return false;">20</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-21');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-21');return false;">21</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-22');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-22');return false;">22</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-23');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-23');return false;">23</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-24');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-24');return false;">24</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-25');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-25');return false;">25</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-26');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-26');return false;">26</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-27');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-27');return false;">27</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-28');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-28');return false;">28</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-02-29');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-02-29');return false;">29</a></font></div></td></tr></tbody></table></td><td valign="top"><table border="1" cellpadding="1" bordercolor="000000" cellspacing="0" bgcolor="white"><tbody><tr><td colspan="7" bordercolor="#ffffff" bgcolor="#FFFFCC"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="2">March 2020</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sun</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Mon</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Tue</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Wed</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Thu</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Fri</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sat</font></b></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-01');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-01');return false;">1</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-02');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-02');return false;">2</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-03');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-03');return false;">3</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-04');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-04');return false;">4</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-05');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-05');return false;">5</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-06');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-06');return false;">6</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-07');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-07');return false;">7</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-08');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-08');return false;">8</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-09');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-09');return false;">9</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-10');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-10');return false;">10</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-11');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-11');return false;">11</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-12');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-12');return false;">12</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-13');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-13');return false;">13</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-14');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-14');return false;">14</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-15');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-15');return false;">15</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-16');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-16');return false;">16</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-17');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-17');return false;">17</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-18');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-18');return false;">18</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-19');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-19');return false;">19</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-20');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-20');return false;">20</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-21');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-21');return false;">21</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-22');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-22');return false;">22</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-23');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-23');return false;">23</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-24');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-24');return false;">24</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-25');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-25');return false;">25</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-26');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-26');return false;">26</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-27');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-27');return false;">27</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-28');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-28');return false;">28</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-29');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-29');return false;">29</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-30');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-30');return false;">30</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-03-31');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-03-31');return false;">31</a></font></div></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td></tr></tbody></table></td><td valign="top"><table border="1" cellpadding="1" bordercolor="000000" cellspacing="0" bgcolor="white"><tbody><tr><td colspan="7" bordercolor="#ffffff" bgcolor="#FFFFCC"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="2">April 2020</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sun</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Mon</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Tue</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Wed</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Thu</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Fri</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sat</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-01');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-01');return false;">1</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-02');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-02');return false;">2</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-03');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-03');return false;">3</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-04');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-04');return false;">4</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-05');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-05');return false;">5</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-06');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-06');return false;">6</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-07');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-07');return false;">7</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-08');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-08');return false;">8</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-09');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-09');return false;">9</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-10');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-10');return false;">10</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-11');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-11');return false;">11</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-12');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-12');return false;">12</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-13');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-13');return false;">13</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-14');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-14');return false;">14</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-15');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-15');return false;">15</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-16');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-16');return false;">16</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-17');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-17');return false;">17</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-18');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-18');return false;">18</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-19');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-19');return false;">19</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-20');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-20');return false;">20</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-21');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-21');return false;">21</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-22');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-22');return false;">22</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-23');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-23');return false;">23</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-24');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-24');return false;">24</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-25');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-25');return false;">25</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-26');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-26');return false;">26</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-27');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-27');return false;">27</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-28');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-28');return false;">28</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-29');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-29');return false;">29</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-04-30');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-04-30');return false;">30</a></font></div></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td></tr></tbody></table></td><td valign="top"><table border="1" cellpadding="1" bordercolor="000000" cellspacing="0" bgcolor="white"><tbody><tr><td colspan="7" bordercolor="#ffffff" bgcolor="#FFFFCC"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="2">May 2020</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sun</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Mon</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Tue</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Wed</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Thu</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Fri</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sat</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-01');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-01');return false;">1</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-02');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-02');return false;">2</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-03');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-03');return false;">3</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-04');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-04');return false;">4</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-05');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-05');return false;">5</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-06');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-06');return false;">6</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-07');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-07');return false;">7</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-08');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-08');return false;">8</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-09');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-09');return false;">9</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-10');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-10');return false;">10</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-11');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-11');return false;">11</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-12');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-12');return false;">12</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-13');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-13');return false;">13</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-14');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-14');return false;">14</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-15');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-15');return false;">15</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-16');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-16');return false;">16</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-17');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-17');return false;">17</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-18');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-18');return false;">18</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-19');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-19');return false;">19</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-20');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-20');return false;">20</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-21');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-21');return false;">21</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-22');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-22');return false;">22</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-23');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-23');return false;">23</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-24');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-24');return false;">24</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-25');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-25');return false;">25</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-26');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-26');return false;">26</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-27');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-27');return false;">27</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-28');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-28');return false;">28</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-29');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-29');return false;">29</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-30');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-30');return false;">30</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-05-31');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-05-31');return false;">31</a></font></div></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td></tr></tbody></table></td></tr><tr><td valign="top"><table border="1" cellpadding="1" bordercolor="000000" cellspacing="0" bgcolor="white"><tbody><tr><td colspan="7" bordercolor="#ffffff" bgcolor="#FFFFCC"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="2">June 2020</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sun</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Mon</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Tue</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Wed</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Thu</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Fri</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sat</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-01');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-01');return false;">1</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-02');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-02');return false;">2</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-03');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-03');return false;">3</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-04');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-04');return false;">4</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-05');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-05');return false;">5</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-06');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-06');return false;">6</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-07');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-07');return false;">7</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-08');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-08');return false;">8</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-09');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-09');return false;">9</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-10');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-10');return false;">10</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-11');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-11');return false;">11</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-12');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-12');return false;">12</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-13');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-13');return false;">13</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-14');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-14');return false;">14</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-15');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-15');return false;">15</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-16');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-16');return false;">16</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-17');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-17');return false;">17</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-18');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-18');return false;">18</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-19');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-19');return false;">19</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-20');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-20');return false;">20</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-21');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-21');return false;">21</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-22');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-22');return false;">22</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-23');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-23');return false;">23</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-24');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-24');return false;">24</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-25');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-25');return false;">25</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-26');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-26');return false;">26</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-27');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-27');return false;">27</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-28');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-28');return false;">28</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-29');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-29');return false;">29</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-06-30');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-06-30');return false;">30</a></font></div></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td></tr></tbody></table></td><td valign="top"><table border="1" cellpadding="1" bordercolor="000000" cellspacing="0" bgcolor="white"><tbody><tr><td colspan="7" bordercolor="#ffffff" bgcolor="#FFFFCC"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="2">July 2020</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sun</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Mon</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Tue</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Wed</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Thu</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Fri</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sat</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-01');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-01');return false;">1</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-02');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-02');return false;">2</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-03');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-03');return false;">3</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-04');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-04');return false;">4</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-05');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-05');return false;">5</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-06');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-06');return false;">6</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-07');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-07');return false;">7</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-08');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-08');return false;">8</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-09');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-09');return false;">9</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-10');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-10');return false;">10</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-11');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-11');return false;">11</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-12');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-12');return false;">12</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-13');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-13');return false;">13</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-14');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-14');return false;">14</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-15');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-15');return false;">15</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-16');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-16');return false;">16</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-17');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-17');return false;">17</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-18');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-18');return false;">18</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-19');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-19');return false;">19</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-20');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-20');return false;">20</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-21');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-21');return false;">21</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-22');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-22');return false;">22</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-23');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-23');return false;">23</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-24');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-24');return false;">24</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-25');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-25');return false;">25</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-26');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-26');return false;">26</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-27');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-27');return false;">27</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-28');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-28');return false;">28</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-29');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-29');return false;">29</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-30');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-30');return false;">30</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-07-31');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-07-31');return false;">31</a></font></div></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td></tr></tbody></table></td><td valign="top"><table border="1" cellpadding="1" bordercolor="000000" cellspacing="0" bgcolor="white"><tbody><tr><td colspan="7" bordercolor="#ffffff" bgcolor="#FFFFCC"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="2">August 2020</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sun</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Mon</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Tue</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Wed</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Thu</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Fri</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sat</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-01');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-01');return false;">1</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-02');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-02');return false;">2</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-03');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-03');return false;">3</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-04');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-04');return false;">4</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-05');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-05');return false;">5</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-06');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-06');return false;">6</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-07');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-07');return false;">7</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-08');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-08');return false;">8</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-09');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-09');return false;">9</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-10');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-10');return false;">10</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-11');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-11');return false;">11</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-12');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-12');return false;">12</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-13');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-13');return false;">13</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-14');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-14');return false;">14</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-15');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-15');return false;">15</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-16');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-16');return false;">16</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-17');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-17');return false;">17</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-18');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-18');return false;">18</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-19');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-19');return false;">19</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-20');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-20');return false;">20</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-21');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-21');return false;">21</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-22');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-22');return false;">22</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-23');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-23');return false;">23</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-24');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-24');return false;">24</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-25');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-25');return false;">25</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-26');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-26');return false;">26</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-27');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-27');return false;">27</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-28');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-28');return false;">28</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-29');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-29');return false;">29</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-30');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-30');return false;">30</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-08-31');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-08-31');return false;">31</a></font></div></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td></tr></tbody></table></td><td valign="top"><table border="1" cellpadding="1" bordercolor="000000" cellspacing="0" bgcolor="white"><tbody><tr><td colspan="7" bordercolor="#ffffff" bgcolor="#FFFFCC"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="2">September 2020</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sun</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Mon</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Tue</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Wed</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Thu</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Fri</font></b></font></div></td><td bordercolor="#ffffff"><div align="center"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">Sat</font></b></font></div></td></tr><tr><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-01');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-01');return false;">1</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-02');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-02');return false;">2</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-03');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-03');return false;">3</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-04');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-04');return false;">4</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-05');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-05');return false;">5</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-06');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-06');return false;">6</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-07');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-07');return false;">7</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-08');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-08');return false;">8</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-09');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-09');return false;">9</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-10');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-10');return false;">10</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-11');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-11');return false;">11</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-12');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-12');return false;">12</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-13');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-13');return false;">13</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-14');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-14');return false;">14</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-15');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-15');return false;">15</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-16');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-16');return false;">16</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-17');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-17');return false;">17</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-18');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-18');return false;">18</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-19');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-19');return false;">19</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-20');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-20');return false;">20</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-21');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-21');return false;">21</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-22');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-22');return false;">22</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-23');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-23');return false;">23</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-24');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-24');return false;">24</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-25');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-25');return false;">25</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-26');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-26');return false;">26</a></font></div></td></tr><tr><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-27');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-27');return false;">27</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-28');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-28');return false;">28</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-29');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-29');return false;">29</a></font></div></td><td bgcolor="#ffffff" bordercolor="#ffffff" onclick="CB_date_pick('2020-09-30');return false;"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><a href="#" onclick="CB_date_pick('2020-09-30');return false;">30</a></font></div></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td><td bordercolor="#ffffff"><font color="#000066"><b><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></b></font></td></tr></tbody></table></td></tr></tbody></table></span></center><br><br>
            </div>
        </div>
    </div>
</span>


<!--
<span style="position:absolute;left:325px;top:755px;z-index:44;" id="CBcommentsBox">
    <table class="table table-responsive" style="background:bisque; width:600px">
    <tr bgcolor="#FFFF66">
    <td align="left"> Previous Callback Information:</td>
    <td align="right"> <a class="btn btn-danger" href="#" onclick="CBcommentsBoxhide();return false;">close</a> </td>
        </tr><tr>
    <td>
    <span id="CBcommentsBoxA"></span><br>
    <span id="CBcommentsBoxB"></span><br>
    <span id="CBcommentsBoxC"></span><br>
 </td>
    <td width="320px">
        <span id="CBcommentsBoxD"></span>
   </td>
    </tr></table>
</span>
-->

<span style="position:absolute;left:0px;top:0px;z-index:999999;width:100%;height:100%;visibility:hidden;" id="CallBacKsLisTBoxOLD">
    <table border="0" bgcolor="#CCFFCC" width="100%" height="100%"><tbody><tr><td align="center" valign="top"> <font class="sh_text">CALLBACKS FOR AGENT AnkitK:<br>To see information on one of the callbacks below, click on the INFO link. To call the customer back now, click on the DIAL link. If you click on a record below to dial it, it will be removed from the list.</font>
 <br>
		<div class="scroll_callback_auto" id="CallBacKsLisT"></div>
    <br><font class="sh_text"> &nbsp;
	<a href="#" onclick="CalLBacKsLisTCheck();return false;">Refresh</a>
	 &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; 
	<a href="#" onclick="CalLBacKsLisTClose();return false;">Go Back</a>
	</font>
    </td></tr></tbody></table>
</span>


<div class="modal center-modal fade" id="CallBack-Modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-black">
                  <h5 class="modal-title">Callbacks</h5>
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                  </button>
            </div>
              <div class="modal-body" id="CallBacKsLisTNEW">
                  <table class="table table-bordered table-striped" id="CallBackList-listings">
                      <thead class="bg-success">
                          <tr>
                              <th>Date</th>
                              <th>Number</th>
                              <th>Name</th>
                              <th>Comments</th>
                              <th>Status</th>
                              <th>Campaign</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                      </tbody>
                  </table> 
              </div>
            <div class="modal-footer modal-footer-uniform">
                  <button type="button" class="btn btn-bold btn-pure btn-danger btn-app" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-bold btn-pure btn-primary float-right btn-app" onclick="CalLBacKsLisTCheck();return false;">Refresh</button>
            </div>
          </div>
    </div>
</div>

<!--Group Modal-->
<div class="modal fade" id="modal-inbound-groups" data-backdrop="static" data-keyboard="false" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-black"> 
                <h4 class="modal-title" style="margin: 0 auto;">INBOUND GROUPS</h4>
<!--                <h4 class="modal-title">Inbound Groups</h4>-->
                <!--                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>-->
            </div>
            <div class="modal-body">
                <!--<center>-->
                    <span id="CloserSelectContent"><table cellpadding="5" cellspacing="5" width="100%"><tbody><tr><td><font class="sd_text">Available Groups <a href="#" onclick="CloserSelect_change('-----ADD-ALL-----','ADD');return false;"><b>( ADD ALL)</b></a></font></td><td><font class="sd_text">Selected Groups <span class="RemoveAllGroups" style=""><a href="#" onclick="CloserSelect_change('-----DELETE-ALL-----','DELETE');return false;"><b>(Remove All)</b></a></span></font></td></tr><tr><td bgcolor="" height="300px" width="240px" valign="top" class="green"><font class="log_text"><span id="CloserSelectAdd"> &nbsp; <a href="#" onclick="CloserSelect_change('AGENTDIRECT','ADD');return false;" class="btn btn-secondary w100 mb-10">AGENTDIRECT</a><br><a href="#" onclick="CloserSelect_change('CogentBureau1','ADD');return false;" class="btn btn-secondary w100 mb-10">CogentBureau1</a><br><a href="#" onclick="CloserSelect_change('CogentPSP','ADD');return false;" class="btn btn-secondary w100 mb-10">CogentPSP</a><br></span></font></td><td bgcolor="" height="300px" width="240px" valign="top" class="red"><font class="log_text"><span id="CloserSelectDelete"> &nbsp;<a href="#" onclick="CloserSelect_change('CogentNewScreen','DELETE');return false;" class="btn btn-info w100 mb-10">CogentNewScreen</a><br></span></font></td></tr></tbody></table></span>
                    <input type="hidden" name="CloserSelectList" id="CloserSelectList" value=" CogentNewScreen ">
                    <input type="checkbox" class="filled-in" name="CloserSelectBlended" id="CloserSelectBlended" value="0" style="display:none;">
                        <label for="CloserSelectBlended" style="display:none;"> BLENDED CALLING(outbound activated)</label>
    <!--                    <a class="btn btn-primary" href="#" onclick="CloserSelect_submit('YES');return false;">Submit</a>
                    <a class="btn btn-warning" href="#" onclick="CloserSelectContent_create('YES');return false;"> Reset </a> -->
                <!--</center>-->
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-success btn-app" onclick="CloserSelect_submit('YES');return false;">Submit</button>
                <button type="button" class="btn btn-warning btn-app" onclick="CloserSelectContent_create('YES');return false;">Reset</button>
                <button type="button" class="btn btn-danger btn-app" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<!--<span style="position:absolute;left:0px;top:0px;z-index:45;height:100%;width:100%;background-color:#e9e9e9;" id="CloserSelectBox1">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-left:25%;">
        <div class="card">
            <div class="header ">
                                <h2>CLOSER INBOUND GROUP SELECTION</h2>
                                </div>

        <div class="body"><center>
        <span id="CloserSelectContent1"> Closer Inbound Group Selection </span>
    <input type="hidden" name="CloserSelectList1" id="CloserSelectList1" /><br>
            <input type="checkbox" class="filled-in" name="CloserSelectBlended" id="CloserSelectBlended"  value="0" />
            <label for="CloserSelectBlended"> BLENDED CALLING(outbound activated)</label> <br><br><br>
            <a class="btn btn-primary" href="#" onclick="CloserSelect_submit('YES');return false;">Submit</a>
        <a class="btn btn-warning" href="#" onclick="CloserSelectContent_create('YES');return false;"> Reset </a> 
        
                </center></div></div></div>
</span>-->

<span style="position: absolute; left: 0px; top: 0px; z-index: 46; height: 100%; width: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="TerritorySelectBox">
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="margin-left:16%;">
        <div class="card">
            <div class="header">
                <div class="lead text-center">TERRITORY SELECTION                </div></div>

            <div class="text-center">
                <span id="TerritorySelectContent"> Territory Selection </span>
                <input type="hidden" name="TerritorySelectList" id="TerritorySelectList"><br><br>
                <a class="btn btn-primary" href="#" onclick="TerritorySelect_submit('YES');return false;">Submit</a>					
                <a class="btn btn-warning" href="#" onclick="TerritorySelectContent_create('YES');return false;"> Reset </a> 
            </div></div></div>
</span>

<span style="position: absolute; left: 500px; top: 300px; z-index: 47; height: 25%; width: 25%; background-color: rgb(233, 233, 233); visibility: hidden;" id="NothingBox">
    <span id="DiaLLeaDPrevieWHide"> <input type="checkbox" class="filled-in" id="LeadPreview" name="LeadPreview" value="0"><label for="LeadPreview"> LEAD PREVIEW</label><br></span>
    <span id="DiaLDiaLAltPhonEHide"><input type="checkbox" class="filled-in" id="altLeadPreview" name="DiaLAltPhonE" value="0"><label for="altLeadPreview"> ALT PHONE DIAL</label><br></span>
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 48; width: 100%; height: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="CalLLoGDisplaYBox">
    <div style="position:absolute;width:100%;height:100%;background-color:#e9e9e9;"></div>
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" style="margin-left:8%">
        <div class="card">
            <div class="header ">
                <h2 class="text-center">
                    AGENT CALL LOG<span class="pull-right"><a href="#" class="btn btn-danger waves-effect" onclick="CalLLoGVieWClose();return false;">close [X]</a></span>
                </h2>
            </div>
            <div class="body table-responsive"><center>
                    <div id="CallLogSpan"> Call log List </div>
                    <br><br> &nbsp;</center>
            </div>
        </div>
    </div> 
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 49; height: 100%; width: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="SearcHContactsDisplaYBox">
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="margin-left:16%; ">
        <div class="card">
            <div class="header">
                <div class="lead text-center">SEARCH FOR A CONTACT:<a class="pull-right btn btn-danger" href="#" onclick="ContactSearcHVieWClose();return false;">close [X]</a>
                </div>
            </div>
            <p class="alert alert-info">
Notes: when doing a search for a contact, wildcard or partial search terms are not allowed. <br>Contact search requests are all logged in the system.            </p>
            <div class="body">
                <table class="table table-responsive" border="0">
                    <tbody><tr>
                        <td align="right"> Office Number: </td><td align="left"><div class="col-sm-6"><input type="text" class="from-control" size="18" maxlength="20" name="contacts_phone_number" id="contacts_phone_number" placeholder="Office Number"></div></td>
                    </tr>
                    <tr>
                        <td align="right"> First Name: </td><td align="left"><div class="col-sm-6"><input type="text" class="from-control" size="18" maxlength="20" name="contacts_first_name" id="contacts_first_name" placeholder="First Name"></div></td>
                    </tr>
                    <tr>
                        <td align="right"> Last Name: </td><td align="left"><div class="col-sm-6"><input type="text" class="from-control" size="18" maxlength="20" name="contacts_last_name" id="contacts_last_name" placeholder="Last Name"></div></td>
                    </tr>
                    <tr>
                        <td align="right"> BU Name: </td><td align="left"><div class="col-sm-6"><input type="text" class="from-control" size="18" maxlength="20" name="contacts_bu_name" id="contacts_bu_name" placeholder="BU Name"></div></td>
                    </tr>
                    <tr>
                        <td align="right"> Department: </td><td align="left"><div class="col-sm-6"><input type="text" class="from-control" size="18" maxlength="20" name="contacts_department" id="contacts_department" placeholder="Department"></div></td>
                    </tr>
                    <tr>
                        <td align="right"> Group Name: </td><td align="left"><div class="col-sm-6"><input type="text" class="from-control" size="18" maxlength="20" name="contacts_group_name" id="contacts_group_name" placeholder="Group Name"></div></td>
                    </tr>
                    <tr>
                        <td align="right"> Job Title: </td><td align="left"><div class="col-sm-6"><input type="text" class="from-control" size="18" maxlength="20" name="contacts_job_title" id="contacts_job_title" placeholder="Job Title"></div></td>
                    </tr>
                    <tr>
                        <td align="right"> Location: </td><td align="left"><div class="col-sm-6"><input type="text" class="from-control" size="18" maxlength="20" name="contacts_location" id="contacts_location" placeholder="Location"></div></td>
                    </tr>
                    <tr>
                        <td align="right" colspan="2"> 
                            <a class="btn btn-primary" href="#" onclick="ContactSearchSubmit();return false;"> Search</a> 
                            <a class="btn btn-warning" href="#" onclick="ContactSearchReset('YES');return false;">Reset</a>
                        </td>
                    </tr>
                </tbody></table>
            </div></div>
    </div>
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 50; width: 100%; height: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="SearcHResultSContactsBox">
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="margin-left:16%; ">
        <div class="card">
            <div class="header">
                <div class="lead text-center">CONTACTS SEARCH RESULTS:<a class="pull-right btn btn-danger" href="#" onclick="hideDiv('SearcHResultSContactsBox');return false;">close [X]</a></div>
            </div>
            <div class="text-center">
                <div class="scroll_calllog" id="SearcHResultSContactsSpan"> Search Results </div>
            </div></div></div>

</span>

<span style="position: absolute; z-index: 51; height: 100%; width: 100%; left: 0px; top: 0px; background-color: rgb(233, 233, 233); visibility: hidden;" id="SearcHForMDisplaYBox">
    <span style="position:fixed;height:100%;width:100%;left:0px;top:0px;"></span>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10" style="margin-left:10%;">
        <div class="card">
            <div class="header">
                <h2 class="modal-title" id="largeModalLabel">SEARCH FOR A LEAD:<a class="pull-right btn btn-danger waves-effect" href="#" data-dismiss="modal" onclick="LeaDSearcHVieWClose();return false;">close [X]</a></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table" border="0">
                        <tbody><tr>
                            <td align="right">Phone Number:</td><td align="left"><input type="text" class="form-control" maxlength="20" name="search_phone_number" id="search_phone_number"></td>
                        </tr>
                        <tr>
                            <td align="right">Phone Number Fields: </td>
                            <td align="left">
                                <input type="checkbox" name="search_main_phone" class="filled-in " id="search_main_phone" size="1" value="0" checked=""><label for="search_main_phone">Main Phone Number</label>
                                <input type="checkbox" name="search_alt_phone" class="filled-in " id="search_alt_phone" size="1" value="0"><label for="search_alt_phone">Alternate Phone Number</label>
                                <input type="checkbox" name="search_addr3_phone" class="filled-in " id="search_addr3_phone" size="1" value="0"><label for="search_addr3_phone">Address3 Phone Number</label>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">Lead ID:</td><td align="left"><input type="text" class="form-control" maxlength="10" name="search_lead_id" id="search_lead_id"></td>
                        </tr>
                        <tr>
                            <td align="right">Vendor ID:</td><td align="left"><input type="text" class="form-control" maxlength="20" name="search_vendor_lead_code" id="search_vendor_lead_code"></td>
                        </tr>
                        <tr>
                            <td align="right">First:</td><td align="left"><input type="text" class="form-control" maxlength="30" name="search_first_name" id="search_first_name"></td>
                        </tr>
                        <tr>
                            <td align="right">Last:</td><td align="left"><input type="text" class="form-control" maxlength="30" name="search_last_name" id="search_last_name"></td>
                        </tr>
                        <tr>
                            <td align="right">City:</td><td align="left"><input type="text" class="form-control" maxlength="50" name="search_city" id="search_city"></td>
                        </tr>
                        <tr>
                            <td align="right">State:</td><td align="left"><input type="text" class="form-control" maxlength="2" name="search_state" id="search_state"></td>
                        </tr>
                        <tr>
                            <td align="right">PostCode:</td><td align="left"><input type="text" class="form-control" maxlength="10" name="search_postal_code" id="search_postal_code"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">
                                <a href="#" class="btn btn-primary waves-effect" onclick="LeadSearchSubmit();return false;">Search</a>
                                <a href="#" class="btn btn-primary waves-effect" onclick="LeadSearchReset();return false;">Reset</a>
                            </td>
                        </tr>
                    </tbody></table>
                    <p class="alert alert-info">
Notes: when doing a search for a lead, the phone number, lead ID or Vendor ID are the best fields to use. <br>Using the other fields may be slower. Lead searching does not allow for wildcard or partial search terms. <br>Lead search requests are all logged in the system.                    </p>
                </div>
            </div>
        </div>
    </div>
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 52; width: 100%; height: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="SearcHResultSDisplaYBox">
    <div class="container" style="margin: 7% 17%;">
        <div class="pull-right"><a class="btn btn-danger" href="#" onclick="hideDiv('SearcHResultSDisplaYBox');return false;">close [X]</a></div>
        <div class="lead text-center">SEARCH RESULTS:</div><br><br>
        <div class="text-center">
            <div class="scroll_calllog" id="SearcHResultSSpan"> Search Results </div>
        </div><br><br>
        <div class="text-center"><a class="btn btn-danger" href="#" onclick="hideDiv('SearcHResultSDisplaYBox');return false;">Close Info Box</a></div>
    </div>
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 53; width: 100%; height: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="CalLNotesDisplaYBox">
    <div class="container">
        <div class="pull-right"><a class="btn btn-danger" href="#" onclick="hideDiv('CalLNotesDisplaYBox');return false;">close [X]</a></div>
        <div class="lead text-center">CALL NOTES LOG:</div><br><br>
        <div class="text-center">
            <div class="scroll_calllog" id="CallNotesSpan"> Call Notes List </div>
        </div><br><br>
        <div class="text-center"><a class="btn btn-danger" href="#" onclick="hideDiv('CalLNotesDisplaYBox');return false;">Close Info Box</a></div>
    </div>
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 99999; width: 100%; height: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="LeaDInfOBox">
    <div style="position:absolute;width:100%;height:100%;background-color:#e9e9e9;"></div>
    <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12" style="margin-left:8%">
        <div class="card">
            <div class="header ">
                <h2 class="text-center">
                    Customer Information<span class="pull-right"><a href="#" class="btn btn-danger " onclick="hideDiv('LeaDInfOBox');return false;">close [X]</a></span>
                </h2>
            </div>

            <span id="LeaDInfOSpan"> Lead Info </span>

            <div class="text-center"><a class="btn btn-danger" href="#" onclick="hideDiv('LeaDInfOBox');return false;">Close Info Box</a></div><br><br>
        </div>
    </div>
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 54; width: 100%; height: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="PauseCodeSelectBox">
    <div style="position:fixed;width:100%;height:100%;background-color:#e9e9e9;"></div>
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-left:25%">
            <div class="card">
                <div class="header">
                    <h2>SELECT A PAUSE CODE:</h2>
                </div>
                <div class="body table-responsive"><center>
                        <table class="table">
                            <tbody><tr><td align="center"><span id="PauseCodeSelectContent"> Pause Code Selection</span>
                                    <input type="hidden" name="PauseCodeSelection" id="PauseCodeSelection"></td></tr>
                        </tbody></table></center>
                </div>
            </div>
        </div>
    </div>
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 55; width: 100%; height: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="PresetsSelectBox">
    <div class="container" style="margin: 10% 25%;">
        <div class="lead>">SELECT A PRESET :</div>
        <div class="body table-responsive">
            <center>
                <table class="table">
                    <tbody><tr>	
                        <td align="center">
                            <span id="PresetsSelectBoxContent_OLD"> Presets Selection </span>
                            <input type="hidden" name="PresetSelection" id="PresetSelection">	</td>
                    </tr>
                </tbody></table>
            </center>
        </div>
    </div>
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 56; width: 100%; height: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="GroupAliasSelectBox">
    <div class="container" style="margin: 10% 25%;">
        <div class="lead>">SELECT A GROUP ALIAS :</div>
        <div class="body table-responsive">
            <center>
                <table class="table">
                    <tbody><tr>	
                        <td align="center">
                            <span id="GroupAliasSelectContent"> Group Alias Selection </span>
                            <input type="hidden" name="GroupAliasSelection" id="GroupAliasSelection">
                        </td>
                    </tr>
                </tbody></table>
            </center>
        </div>
    </div>
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 57; width: 100%; height: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="DiaLInGrouPSelectBox">
    <div class="container" style="margin: 10% 25%;">
        <div class="lead>">
            SELECT A DIAL IN-GROUP :
        </div>
        <div class="body table-responsive">
            <center>
                <table class="table">
                    <tbody><tr>	
                        <td align="center">
                            <span id="DiaLInGrouPSelectContent"> Dial In-Group Selection </span>
                            <input type="hidden" name="DiaLInGrouPSelection" id="DiaLInGrouPSelection"> 
                        </td>
                    </tr>
                </tbody></table>
            </center>
        </div>
    </div>
</span>
<!-- <span style="position:absolute;left:0px;top:0px;z-index:58;width:100%;height:100%;background-color:#e9e9e9; " id="blind_monitor_alert_span">
         <div class="container text-center" style="margin:15% auto;">
                 <div class="lead">ALERT :</div>
        <b><font color="red" size="5"><span id="blind_monitor_alert_span_contents"></span></font></b><br>
         <a href="#" onclick="hideDiv('blind_monitor_alert_span');return false;" class="btn btn-default btn-lg ">Go Back</a>
        </div>
</span> -->

<span style="position:absolute;left:0px;top:0px;z-index:99999;width:100%;height:100%;background-color:#e9e9e9;display:none;" id="DeactivateDOlDSessioNSpan">
    <div class="container" style="margin:15% auto;">
        <div class="lead">Another live agent session was open using your user ID. It has been disabled. Click OK to continue to the agent screen.</div>
        <div class="button-place text-center">
            <a href="#" onclick="hideDiv('DeactivateDOlDSessioNSpan');return false;" class="btn btn-default btn-lg ">ok</a>
        </div>
    </div>
</span>

<span style="position: absolute; left: 0px; top: 0px; z-index: 59; width: 100%; height: 100%; background-color: rgb(233, 233, 233); visibility: hidden;" id="InvalidOpenerSpan">
    <div class="container text-center" style="margin:15% auto;">
        <div class="lead">
        </div>
    </div>
</span>



<span style="position:absolute;left:0px;z-index:60; display:none" id="GENDERhideFORieALT">

</span>
<!--<div class="modal fade" id="modal-logout1">
    <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-success">
                  <h4 class="modal-title">Logout</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary float-right"></button>
            </div>
          </div>
           /.modal-content 
    </div>
     /.modal-dialog 
</div>-->

<div id="modal-logout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-black text-center">
                <h3 class="modal-title">Are you sure that's what you want?</h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning bg-pale-warning">
                    <p>Make sure you are not in a call or waiting for a call.</p>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <span id="LogouTBoxLinkModalNewq"></span>
                        <a class="btn btn-primary LogouTBoxLinkModal" id="LogouTBoxLinkModalNEW">Log me out</a>
                        <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
<!--            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
            </div>-->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="NeWManuaLDiaLBoxModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-black">
                <h4 class="modal-title text-center" id="myModalLabel">Manual Dial</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                                <span class="input-group-addon bg-secondary"><i class="fa fa-phone"></i></span>
                                <input type="text" size="14" maxlength="18" name="MDPhonENumbeR" id="MDPhonENumbeR" class="form-control" value="01282526693" placeholder="Phone Number">
                            </div> 
                <table class="table" style="display:none;">
                    <tbody><tr style="display:none;">
                        <td align="right"></td>
                        <td align="right">
                            <div class="col-md-6">
                                <input type="text" size="7" maxlength="10" name="MDDiaLCodE" id="MDDiaLCodE" class="form-control" value="1">
                            </div>(This is usually a 1 in the USA-Canada)
                        </td>
                    </tr>
                    <tr>
                        <td align="right"></td>
                        <td align="right">
                                                            
                            <input type="hidden" name="MDPhonENumbeRHiddeN" id="MDPhonENumbeRHiddeN" value="">
                            <input type="hidden" name="MDLeadID" id="MDLeadID" value="">
                            <input type="hidden" name="MDType" id="MDType" value="">
                            <input type="hidden" name="MDLeadIDEntry" id="MDLeadIDEntry" value="">
<input type="hidden" name="MDLeadIDEntry" id="MDLeadIDEntry" value="">                        </td>
                    </tr>
                    <tr style="display:none;">
                        <td align="right">Search Existing Leads:</td>
                        <td align="right"><input type="checkbox" name="LeadLookuP" class="filled-in chk-col-blue-grey" id="LeadLookuP" size="1" value="0"><label for="LeadLookuP">(This option if checked will attempt to find the phone number in the system before inserting it as a new lead)</label></td>
                    </tr>
                    <tr>

                        <td align="left" colspan="2">

                    <center>
                        <span id="ManuaLDiaLGrouPSelecteD"></span> &nbsp; &nbsp; <span id="ManuaLDiaLGrouP"></span>

                        <span id="ManuaLDiaLInGrouPSelecteD"></span> &nbsp; &nbsp; <span id="ManuaLDiaLInGrouP"></span>

                        <span id="NoDiaLSelecteD"></span>
                    </center>
                    </td>
                </tr><tr style="display:none;">
                <td align="right"></td>
                <td align="right">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="text" size="24" maxlength="20" name="MDDiaLOverridE" id="MDDiaLOverridE" class="form-control" value="" placeholder="Dial Override">
                        </div>
                                                                                           <!--<div class="col-md-6"><input type="text" size="24" maxlength="20" name="MDDiaLOverridE" id="MDDiaLOverridE" class="form-control" value="" /></div>(digits only please)--> 
                                                          
                </td>
            </tr>
            <tr>

                <td colspan="2">
                    <span id="ManuaLDiaLGrouPSelecteD"></span> &nbsp; &nbsp; <span id="ManuaLDiaLGrouP"></span>
                    <br>
                    <span id="ManuaLDiaLInGrouPSelecteD"></span> &nbsp; &nbsp; <span id="ManuaLDiaLInGrouP"></span>
                    <br>
                    <span id="NoDiaLSelecteD"></span>
                </td>
            </tr>
            <tr>
                <td colspan="2"><div class="pull-right"><a href="#" class="btn btn-primary" onclick="NeWManuaLDiaLCalLSubmiT('NOW','YES');return false;">Dial Now</a>
                        <a href="#" class="btn btn-primary" onclick="NeWManuaLDiaLCalLSubmiT('PREVIEW', 'YES');return false;">Preview Call</a>
                        <a href="#" class="btn btn-primary" onclick="ManualDialHide();return false;">Go Back</a></div>
                </td></tr>
        </tbody></table>	
    </div>
    							<div class="modal-footer">
                                                                    <button type="button" class="btn btn-info waves-effect btn-app float-right" onclick="ManualDialHide();return false;">Cancel</button>
                                                                    <button type="button" class="btn btn-success waves-effect btn-app float-right" id="MakeCallBTN" onclick="NeWManuaLDiaLCalLSubmiT('NOW','YES');return false;">Make Call</button>
                                                            </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<div id="DeactivateDOlDSessioNSpanModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="lead">Another live agent session was open using your user ID. It has been disabled. Click OK to continue to the agent screen.</div>	
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

     
<!--<div id="LogouTBoxModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container text-center">
    <br><br><br><br><br><span id="LogouTProcessOK">
	<br>
	<br>
	<font class="loading_text">LOGOUT PROCESSING...</font>
	<br>
	<br>
	<div class="preloader pl-size-xl"><div class="spinner-layer"><div class="circle-clipper left"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
		</span><br><br><span id="LogouTBoxLinkModal1"><font class="loading_text">LOGOUT</font></span></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
            </div>
        </div>
         /.modal-content 
    </div>
     /.modal-dialog 
</div>-->



<!--DTMF START-->
<div class="modal center-modal fade" id="DTMF-Modal" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-black">
                  <h5 class="modal-title text-center">DTMF Key Pad</h5>
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                  </button>
            </div>
            <div class="modal-body">
                <div class="row">
                                        <div class="col-md-4">
                        <button class="btn btn-block btn-outline btn-secondry DTMF-BTN" style="margin:5px;" type="button">1</button>
                    </div>
                                        <div class="col-md-4">
                        <button class="btn btn-block btn-outline btn-secondry DTMF-BTN" style="margin:5px;" type="button">2</button>
                    </div>
                                        <div class="col-md-4">
                        <button class="btn btn-block btn-outline btn-secondry DTMF-BTN" style="margin:5px;" type="button">3</button>
                    </div>
                                        <div class="col-md-4">
                        <button class="btn btn-block btn-outline btn-secondry DTMF-BTN" style="margin:5px;" type="button">4</button>
                    </div>
                                        <div class="col-md-4">
                        <button class="btn btn-block btn-outline btn-secondry DTMF-BTN" style="margin:5px;" type="button">5</button>
                    </div>
                                        <div class="col-md-4">
                        <button class="btn btn-block btn-outline btn-secondry DTMF-BTN" style="margin:5px;" type="button">6</button>
                    </div>
                                        <div class="col-md-4">
                        <button class="btn btn-block btn-outline btn-secondry DTMF-BTN" style="margin:5px;" type="button">7</button>
                    </div>
                                        <div class="col-md-4">
                        <button class="btn btn-block btn-outline btn-secondry DTMF-BTN" style="margin:5px;" type="button">8</button>
                    </div>
                                        <div class="col-md-4">
                        <button class="btn btn-block btn-outline btn-secondry DTMF-BTN" style="margin:5px;" type="button">9</button>
                    </div>
                                        <div class="col-md-4">
                        <button class="btn btn-block btn-outline btn-secondry DTMF-BTN" style="margin:5px;" type="button">*</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-block btn-outline btn-secondry DTMF-BTN" style="margin:5px;" type="button">0</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-block btn-outline btn-secondry DTMF-BTN" style="margin:5px;" type="button">#</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                  <button type="button" class="btn btn-success float-right" data-dismiss="modal">Close</button>
            </div>
          </div>
    </div>
</div>
<!--DTMF END-->

<!--Call Information START-->
<div class="modal center-modal fade" id="CallInformation-Modal" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-black">
                  <h5 class="modal-title text-center">Call Information</h5>
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                  </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="dashboard-stat-list">
                                                        <li>
                                                            <span id="post_phone_time_diff_span" style="visibility: hidden;"><b><span id="post_phone_time_diff_span_contents"></span></b></span>
                                                            Status :<span id="MainStatuSSpan"></span><span id="timer_alt_display"></span><br><span id="manual_auto_next_display"></span>
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
                                                                                                    </li>
                                                    </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                  <button type="button" class="btn btn-success btn-app float-right" data-dismiss="modal">Close</button>
            </div>
          </div>
    </div>
</div>
<!--Call Information END-->

<!--Call Disposition START-->
<div class="modal center-modal fade" id="CallDispo-Modal" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-black">
                  <h5 class="modal-title text-center">Agent Call Status</h5>
            </div>
            <div class="modal-body">
                <div class="row">
			<div class="col-3 green pt-10 pb-10">
			<p>Neutral</p>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('testin','ADD','YES');return false;">testin</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('APPRSG','ADD','YES');return false;">APPRSG</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('APPCNT','ADD','YES');return false;">APPCNT</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('APPCNW','ADD','YES');return false;">APPCNW</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('APPCNG','ADD','YES');return false;">APPCNG</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('APPBKT','ADD','YES');return false;">APPBKT</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('NOP','ADD','YES');return false;">NOP</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('APPRES','ADD','YES');return false;">APPRES</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('Refund','ADD','YES');return false;">Refund</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('APPRST','ADD','YES');return false;">APPRST</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('RFEWOW','ADD','YES');return false;">RFEWOW</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('RFEGRP','ADD','YES');return false;">RFEGRP</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('ESCCAN','ADD','YES');return false;">ESCCAN</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('DEC','ADD','YES');return false;">DEC</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('CALLBK','ADD','YES');return false;">CALLBK</button>
                        			</div>
			<div class="col-3 red pt-10 pb-10"><p>Positive</p>
                                                     <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('APPBKW','ADD','YES');return false;">APPBKW</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('APPBKG','ADD','YES');return false;">APPBKG</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('NBD','ADD','YES');return false;">NBD</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('EnqApp','ADD','YES');return false;">EnqApp</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('APPBCK','ADD','YES');return false;">APPBCK</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('EnqFB','ADD','YES');return false;">EnqFB</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('EnqIns','ADD','YES');return false;">EnqIns</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('EnqGoo','ADD','YES');return false;">EnqGoo</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('EnqTre','ADD','YES');return false;">EnqTre</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('ESCAPP','ADD','YES');return false;">ESCAPP</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('EnqGro','ADD','YES');return false;">EnqGro</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('EnqWow','ADD','YES');return false;">EnqWow</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('APPRSW','ADD','YES');return false;">APPRSW</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('SALE','ADD','YES');return false;">SALE</button>
                        			</div>
			<div class="col-3 yellow pt-10 pb-10"><p>Negative</p>
                                                     <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('Cmpt','ADD','YES');return false;">Cmpt</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('RFDGRP','ADD','YES');return false;">RFDGRP</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('ESCENQ','ADD','YES');return false;">ESCENQ</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('APPCAN','ADD','YES');return false;">APPCAN</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('CHU','ADD','YES');return false;">CHU</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('RFDWOW','ADD','YES');return false;">RFDWOW</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('ESCRES','ADD','YES');return false;">ESCRES</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('ESCREF','ADD','YES');return false;">ESCREF</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('NI','ADD','YES');return false;">NI</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('N','ADD','YES');return false;">N</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('DNC','ADD','YES');return false;">DNC</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('DC','ADD','YES');return false;">DC</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('B','ADD','YES');return false;">B</button>
                                                <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('A','ADD','YES');return false;">A</button>
                                                </div>
			<div class="col-3 orange pt-10 pb-10"><p>Unconcluded</p>
                                                    <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('DTest','ADD','YES');return false;">DTest</button>
                                                </div>
            </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                 <div class="row">
			<div class="col-4">
			<span type="button" class="btn btn-medium btn-toggle PauseCodeSwitch" data-toggle="button" aria-pressed="true" autocomplete="off">
                            <div class="handle"></div>
                        </span> 
                            <button type="button" class="btn btn-default mr-50 btn-sm">Pause Deactivated</button>
                        <br>
                        <br>
                        <select class="form-control" name="" id="DispoPauseCodeSelection" style="display:none;">
                                                       <option value="Lunch">Lunch - Lunch</option>
                                                       <option value="Meetin">Meetin - Meeting</option>
                                                       <option value="TeaAM">TeaAM - Tea Break Morning</option>
                                                       <option value="TeaPM">TeaPM - Tea Break Evening</option>
                                                       <option value="Toilet">Toilet - Toilet</option>
                                                       <option value="Train">Train - Training</option>
                                                   </select>
                        </div>
                        <div class="col-3">
			<span type="button" class="btn btn-medium btn-toggle TagSwitchBTN" data-toggle="button" aria-pressed="true" autocomplete="off">
                            <div class="handle"></div></span> 
                            <button type="button" class="btn btn-default  btn-sm">No Tag</button>
                            <br><br>
                            <input type="hidden" name="tag" value="" class="form-control">
                        </div>
			<div class="col-5">
			<p align="right">
                            <button type="button" class="btn btn-warning btn-app" data-dismiss="modal" id="HideDispoModal">Hide</button> 
                            <button type="button" class="btn btn-primary btn-app" onclick="DispoSelectContent_create('', 'ReSET', 'YES');return false;">Reset</button> 
                            <button type="button" class="btn btn-success btn-app" onclick="DispoSelect_submit('', '', 'YES');return false;">Submit</button>
                        </p>
			</div>
                        </div>
            </div>
          </div>
    </div>
</div>
<!--Call Dispostion END-->





<!--Call Disposition START-->
<div class="modal center-modal fade" id="CallTransfer-Modal" tabindex="-1">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-black">
                  <h5 class="modal-title text-center">Agent Call Status</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div id="XfeRDiaLGrouPSelecteD"></div> &nbsp; &nbsp;

                        <div id="XfeRCID"></div>

                        <input type="hidden" name="xferuniqueid" id="xferuniqueid">

                        <input type="hidden" name="xfername" id="xfername" value="">

                        <input type="hidden" name="xfernumhidden" id="xfernumhidden" value="">

                        <div class="hidden" id="dialoverride_checkbox" style="display:none;">

                            <input type="checkbox" name="xferoverride" id="xferoverride" size="1" value="0">

                        </div>
                        <!--Type START-->
                        <div class="form-group row">
                            <label for="XfeRPreset" class="col-md-2 control-label">Type</label>
                            <div class="col-md-9">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-square-o"></i> </span>
                                    <select id="XfeRType" name="XfeRType" class="form-control">
                                        <option>Select Type</option>
                                        <option value="Group">Transfer to Group</option>
                                        <option value="Agent">Transfer to Agent</option>
                                        <option value="Preset">Transfer to Preset</option>
                                        <option value="Number">Transfer to Number</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row TypeSelection Group-Selection" style="display:none;">
                            <label for="XfeRPreset" class="col-md-2 control-label">Group Selection</label>
                            <div class="col-md-9">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user-times"></i> </span>
                                    <span id="XfeRGrouPLisT" style="width:88%;">
                                    <select id="XfeRGrouP" name="XfeRGrouP" class="form-control" onchange="XferAgentSelectLink();return false;">
                                        <option>-- SELECT A GROUP TO SEND YOUR CALL TO --</option>
                                    </select>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row TypeSelection Agent-Selection" style="display:none;">
                            <label for="XfeRPreset" class="col-md-2 control-label">Agent Selection</label>
                            <div class="col-md-9">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                                    <select id="AgentXferViewSelect" name="AgentXferViewSelect" onchange="AgentsXferSelect(this.value,'AgentXferViewSelect');return false;" class="form-control">
                                        <option>Select Agent</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row TypeSelection Preset-Selection" style="display:none;">
                            <label for="XfeRPreset" class="col-md-2 control-label">Preset Selection</label>
                            <div class="col-md-9">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                                    <span id="PresetsSelectBoxContent" style="width:88%;"> 
                                    <select id="XfeRPreset" name="XfeRPreset" class="form-control XfeRPreset" onchange="NewPresetSelect_submit(this.value);return false;">
                                        <option>Select Preset</option>
                                    </select>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row TypeSelection Number-Selection" style="display:none;">
                            <label for="XfeRPreset" class="col-md-2 control-label">Number</label>
                            <div class="col-md-9">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone"></i> </span>
                                    <input type="text" name="xfernumber" id="xfernumber" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div style="display:none;">

                            <input type="text" size="2" name="xferlength" id="xferlength" maxlength="4" class="cust_form" readonly="readonly">

                            <input type="text" size="12" name="xferchannel" id="xferchannel" maxlength="200" class="cust_form" readonly="readonly">

                            <input type="checkbox" name="consultativexfer" id="consultativexfer" size="1" value="0">

                        </div>
                        <!--Type END-->
                        <div class="form-group row">
                            <label for="XfeRPreset" class="col-md-2 control-label"></label>
                            <div class="col-md-9">
                                <a href="javascript:void(0);" class="btn btn-success btn-app" title="Dial With Customer" id="xfer_cust_dial_btn" onclick="SendManualDial('YES', 'YES');$('#transfer_cancel').prop('disabled', function (i, v) {return !v;});return false;"><i class="fa fa-users"></i></a>
                                <a href="javascript:void(0);" class="btn btn-success btn-app" title="Dial Without Customer" onclick="xfer_park_dial('YES');$('#transfer_cancel').prop('disabled', function (i, v) {return !v;});return false;"><i class="fa fa-user"></i></a>
                                <a href="javascript:void(0);" class="btn btn-default btn-app text-success" title="Put Lead on Hold" onclick="mainxfer_send_redirect('ParK', 'SIP/AQL-000023a1', '', '', '', '', 'YES');return false;"><i class="fa fa-pause"></i></a>
                                <a href="javascript:void(0);" class="btn btn-success btn-app" title="Dial And Hangup"><i class="fa fa-blind" onclick="mainxfer_send_redirect('XfeRBLIND', 'SIP/M3ST-00000c71', '', '', '', '0', 'YES');return false;"></i></a>
                                <a href="javascript:void(0);" class="btn btn-success btn-app" title="Hide/Show DTMF" onclick="$('#xfer_dtmf').toggleClass('hidden');"><i class="fa fa-keyboard-o"></i></a>
                                <span id="Leave3WayCall"><a href="#" onclick="leave_3way_call('FIRST', 'YES');return false;" class="btn btn-danger btn-app"><i class="fa fa-sign-out"></i></a></span>
                                <span id="HangupXferLine"></span>
                                <!--<span id="Leave3WayCall"></span>-->
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="well hidden" id="xfer_dtmf">
                    <div class="row">
                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '1');return false;">1</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '2');return false;">2</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '3');return false;">3</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '4');return false;">4</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '5');return false;">5</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '6');return false;">6</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '7');return false;">7</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '8');return false;">8</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '9');return false;">9</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '*');return false;">*</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '0');return false;">0</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '#');return false;">#</button>
                        </div>

                        </div>
                </div>
            </div>
          </div>
    </div>
</div>
<!--Call Dispostion END-->


<span style="position:absolute;left:761px;top:15px;height:500px;overflow:scroll;z-index:61;background-color:#F6F6F6;display:none;" id="webphoneSpan"><table cellpadding="0" cellspacing="0" border="0"><tbody><tr><td width="5px" rowspan="2">&nbsp;</td><td align="center"><font class="body_text">
    Web Phone: &nbsp; </font></td></tr><tr><td align="center"><span id="webphonecontent"><iframe src="viciphone/viciphone.php?phone_login=OTg5OA==&amp;phone_login=OTg5OA==&amp;phone_pass=OTg5OA==&amp;server_ip=MTM2LjI0NC4xMDUuMjAx&amp;callerid=OTg5OA==&amp;protocol=U0lQ&amp;codecs=&amp;options=SU5JVElBTF9MT0FELS1ESUFMUEFEX04tLUFVVE9BTlNXRVJfWS0tRElBTEJPWF9ZLS1NVVRFX1ktLVZPTFVNRV9ZLS1XRUJTT0NLRVRVUkx3c3M6Ly9jb2dlbnRvbW5pLnVzZXRoZWdlZWtzLmNvbTo4MDg5L3dz&amp;system_key=" style="width:460px;height:480px;background-color:transparent;z-index:17;" scrolling="no" frameborder="0" allowtransparency="true" id="webphone" name="webphone" width="460px" height="480px"> </iframe></span></td></tr></tbody></table></span>


<!--Call Disposition START-->
<div class="modal center-modal fade" id="Message-Modal" tabindex="-1">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-black">
                  <h5 class="modal-title text-center">Agent Message</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="media-list media-list-hover media-list-divided" id="MessageSectionDiv">
                            
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>
<!--Call Dispostion END-->

            <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
            <li class="nav-item">
                <!--<a class="nav-link" href="javascript:void(0)">FAQ</a>-->
            </li>
        </ul>
    </div>
    © 2019 <a href="https://usethegeeks.com/" target="_blank">UseTheGeeks</a>. All Rights Reserved.
</footer>
<!-- Control Sidebar -->

<!-- /.control-sidebar -->

<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
<!--<div class="control-sidebar-bg"></div>-->        
        </div>
        
        
    

 
</form> 


<form name="inert_form" id="inert_form" onsubmit="return false;">
<span style="position:absolute;left:0px;top:400px;z-index:1;" id="NothingBox2">
<input type="checkbox" name="inert_button" class="filled-in" id="inert_button" value="0" onclick="return false;"><label for="inert_button"></label>
</span>
</form>

 <form name="alert_form" id="alert_form" onsubmit="return false;">
<span style="position: absolute; left: 335px; top: 170px; z-index: 62; visibility: hidden;" id="AlertBox">
        <div class="text-center" style="min-width:250px;">
            <div class="card">
                <div class="header bg-orange">
                    <h2>
                        Agent Alert!
                    </h2>
                </div>
                <div class="body"><center>
                    <img src="./images/alert.png" alt="alert" border="0"><br><br><span id="AlertBoxContent"> Alert Box </span><br><button type="button" class="btn btn-primary waves-effect" name="alert_button" id="alert_button" onclick="hideDiv('AlertBox');return false;">OK</button>
                </center></div>
            </div>
        </div>
    </span>

</form> 
        

<audio id="ChatAudioAlertFile"><source src="sounds/chat_alert.mp3" type="audio/mpeg"></audio>
<audio id="EmailAudioAlertFile"><source src="sounds/email_alert.mp3" type="audio/mpeg"></audio>
<input type="hidden" name="" value="AnkitK" id="LoginUser">        
<input type="hidden" name="" value="1001" id="LoginCampaign">        
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
        <script src="../assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="../assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>
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
        <script src="../assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script>
        



<div class="daterangepicker dropdown-menu ltr opensright"><div class="ranges"><ul><li data-range-key="Today">Today</li><li data-range-key="Yesterday">Yesterday</li><li data-range-key="Last 7 Days">Last 7 Days</li><li data-range-key="Last 30 Days">Last 30 Days</li><li data-range-key="This Month">This Month</li><li data-range-key="Last Month">Last Month</li><li data-range-key="Custom Range">Custom Range</li></ul><div class="range_inputs"><button class="applyBtn btn btn-sm btn-success" disabled="disabled" type="button">Apply</button> <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button></div></div><div class="calendar left"><div class="daterangepicker_input"><input class=
"input-mini form-control" type="text" name="daterangepicker_start" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"></div></div><div class="calendar right"><div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_end" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"></div></div></div></body></html>