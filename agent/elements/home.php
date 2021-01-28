<?php
$UserDetail = $database->get('vicidial_users', '*', ['user' => $VD_login]);

$agent_data = $DBUTG->get('agent_page_setting',['id','comment_on_call_recording','agent_screen']);
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


        <title>Dashboard | Agent</title>

        <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Bootstrap extend-->
        <link rel="stylesheet" href="../assets/css/bootstrap-extend.css">
        <link rel="stylesheet" href="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="../assets/vendor_components/bootstrap-switch/switch.css">
        <link rel="stylesheet" href="../assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="../assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css">
        <link href="../assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css" rel="stylesheet">
        <!-- Theme style -->
        <!--<link rel="stylesheet" href="../assets/css/master_style.css">-->
        <link rel="stylesheet" href="../assets/css/latest1_master_style.css">
        <link rel="stylesheet" href="../assets/css/jquery.classycountdown.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <!-- Fab Admin skins -->
        <link rel="stylesheet" href="../assets/css/skins/_all-skins.css">
        <link rel="stylesheet" type="text/css" href="../assets/vendor_components/datatable/datatables.min.css"/>
        <link rel="icon" href="../assets/images/favicon.ico">

        <link href="../assets/css/animate.css" type="text/css" rel="stylesheet"/>
        <!--<link href="../assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.css" rel="stylesheet" />-->
        <!--<link rel="stylesheet" href="../assets/vendor_components/morris.js/morris.css">-->

    </head>
    <!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
    <!--<body class="hold-transition skin-yellow sidebar-mini sidebar-collapse" onload="begin_all_refresh();">-->
    <body class="hold-transition skin-yellow sidebar-mini sidebar-collapse" onload="begin_all_refresh();"  onunload="BrowserCloseLogout();" style="overflow-x: hidden;">
        <style>
            .hidden{display:none;}
            .showing{display:block;}
            .notification-count{
                position: absolute;
                top: 11px;
                right: 7px;
            }

            /* Absolute Center Spinner */
            /*            #cover {
                position: absolute;
                top: 50%;
                left: 50%;
                margin-top: -50px;
                margin-left: -50px;
                width: 100px;
                height: 100px;
              z-index:9999;
            }*/
            /*.page-loader-wrapper{z-index:99999999;position:fixed;top:0;left:0;bottom:0;right:0;width:100%;height:100%;background:#eee;overflow:hidden;text-align:center}.page-loader-wrapper p{font-size:13px;margin-top:10px;font-weight:bold;color:#444}.page-loader-wrapper .loader{position:relative;top:calc(40% - 30px)}*/
            /*.line{animation:expand 1s ease-in-out infinite;border-radius:10px;display:inline-block;transform-origin:center center;margin:0 4px;width:2px;height:25px}.line:nth-child(1){background:#f31e58}.line:nth-child(2){animation-delay:180ms;background:#258cce}.line:nth-child(3){animation-delay:360ms;background:#f6a724}.line:nth-child(4){animation-delay:540ms;background:#83c541}@keyframes expand{0%{transform:scale(1)}25%{transform:scale(2)}}.navbar{font-family:"Muli",sans-serif;-webkit-border-radius:0;-moz-border-radius:0;-ms-border-radius:0;border-radius:0;-webkit-box-shadow:0 1px 5px rgba(0,0,0,0.2);-moz-box-shadow:0 1px 5px rgba(0,0,0,0.2);-ms-box-shadow:0 1px 5px rgba(0,0,0,0.2);box-shadow:0 1px 5px rgba(0,0,0,0.2);border:none;position:fixed;top:0;left:0;z-index:11;width:100%;padding:0}*/
            /*            .sidebar-mini.sidebar-collapse .sidebar-menu>li>a {
                            margin:0 0 10px 0 !important;
                        }    */

            /*.page-loader-wrapper1{overflow:hidden;text-align:center}.page-loader-wrapper p{font-size:13px;margin-top:10px;font-weight:bold;color:#444}.page-loader-wrapper .loader{position:relative;top:calc(40% - 30px)}*/
            /*.line{animation:expand 1s ease-in-out infinite;border-radius:10px;display:inline-block;transform-origin:center center;margin:0 4px;width:2px;height:25px}.line:nth-child(1){background:#f31e58}.line:nth-child(2){animation-delay:180ms;background:#258cce}.line:nth-child(3){animation-delay:360ms;background:#f6a724}.line:nth-child(4){animation-delay:540ms;background:#83c541}@keyframes expand{0%{transform:scale(1)}25%{transform:scale(2)}}.navbar{font-family:"Muli",sans-serif;-webkit-border-radius:0;-moz-border-radius:0;-ms-border-radius:0;border-radius:0;-webkit-box-shadow:0 1px 5px rgba(0,0,0,0.2);-moz-box-shadow:0 1px 5px rgba(0,0,0,0.2);-ms-box-shadow:0 1px 5px rgba(0,0,0,0.2);box-shadow:0 1px 5px rgba(0,0,0,0.2);border:none;position:fixed;top:0;left:0;z-index:11;width:100%;padding:0}*/

            .live-label{color:green;}
            .call-red{
                color: #721c24 !important;
                background-color: #f8d7da !important;
                border-color: #f5c6cb !important;
            }
            .call-green{
                color: #155724 !important;
                background-color: #d4edda !important;
                border-color: #c3e6cb !important;
            }
            .call-yelllow{
                color: #856404 !important;
                background-color: #fff3cd !important;
                border-color: #ffeeba !important;
            }
            .call-orange{
                color: #721c24 !important;
                background-color: #f7dfd0 !important;
                border-color: #eccdba !important;
            }
            .call-orange1{
                color: #fff !important;
                background-color: #31539e !important;
                border-color: #eccdba !important;
            }
            .call-orange2{
                color: #fff !important;
                background-color: #1bb394 !important;
                border-color: #eccdba !important;
            }
            .call-orange3{
                color: #fff !important;
                background-color: #c77800 !important;
                border-color: #eccdba !important;
            }
        </style>

        <div style="
             display: inline-block;
             position: fixed;
             top: 0;
             bottom: 0;
             left: 0;
             right: 0;
             width: 100px;
             height: 200px;
             margin: auto;
             background-color: #fffff;
             z-index:99999;display:none;" id="LoadData-loader">
            <img src="https://camo.githubusercontent.com/6ed028acbf67707d622344e0ef1bc3b098425b50/687474703a2f2f662e636c2e6c792f6974656d732f32473146315a304d306b306832553356317033392f535650726f67726573734855442e676966" />
        </div>
        <div id="loading_intro" style="position: fixed;top:0px;left: 0px;width: 100%;height: 100%;background: #fff;z-index:100000000000;padding-top: 12%;">
            <!--            <div class="page-loader-wrapper1">
                            <div class="loader1">
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <p>Please wait...</p>
                            </div>
                        </div>-->
            <div class="" style="text-align:center;">
                <!--<img src="https://media.giphy.com/media/147do2f6mZG8Wk/giphy.gif" style="height:150px;"/>-->
                <img src="../assets/images/loader_home.gif" style="width:50px;"/>
            </div>

            <div class="sk-folding-cube-heading" style="text-align: center;">
                <h6 style="color:rgba(153, 153, 153, 0.62);margin-top: 100px !important;">Loading Agent Hub Plugins <i id="1check" class="fa fa-check text-green hidden"></i><br>
                    Configuring phone <span class="PhoneLogin"><?php echo $phone_login ?></span> <i id="2check" class="fa fa-check text-green hidden"></i><br>
                    Checking server health <i id="3check" class="fa fa-check text-green hidden"></i><br>
                    <span id="loadingPhone" class="hidden">Loading Virtual Phone</span>
                </h6>
                <h4 style="color:rgb(92, 148, 185);bottom: 10px !important;">You are a admin you can <?php if ($UserDetail['user_level'] == 8 || $UserDetail['user_level'] == 9) { ?><a href="#" onclick="$('#loading_intro').addClass('hidden');">skip</a><?php } ?> this.</h4>    </div>
            <div id="loading_disabled" class="sk-folding-cube-heading hidden"><h6 style="color:rgba(153, 153, 153, 0.62);margin-top: 200px !important;">Something is not right.<br><span id="loading_out_btn"><button type="button" class="btn btn-default  mt10 " onclick="LogouT('LOADING_DISABLED', '');return false;" data-dismiss="modal">Logout</button></span></h6></div>
            <div id="phonering_disabled" class="sk-folding-cube-heading hidden" style="margin-left:1%;"><h6 style="color:rgba(153, 153, 153, 0.62);margin-top: 200px !important;">
                    You did not answer your phone in time.<br/>
                    <br/>
                    <button type="button" class="btn btn-default" onclick="NoneInSessionCalL();return false;">
                        Call Phone Again
                    </button>
                </h6>
            </div>
        </div>
        <!--        <div class="page-loader-wrapper" style="display: block;" id="LoadingBox">
                    <div class="loader">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <p>Please wait...</p>
                        <div class="m-t-30"><img src="https://reports.usethegeeks.com/assets/images/logo.png" alt="INTELLING DASHBOARD"></div>
                    </div>
                </div>-->
        <form name='vicidial_form' id='vicidial_form' onsubmit="return false;">
            <input type="hidden" size="5" name="conf_dtmf" class="cust_form" value="" maxlength="50" />
            <input type="hidden" name="extension" id="extension" />
            <input type="hidden" name="custom_field_values" id="custom_field_values" value="" />
            <input type="hidden" name="FORM_LOADED" id="FORM_LOADED" value="0" />
            <div class="wrapper">
                <header class="main-header">
                    <!-- Logo -->
                    <a href="javascript:void(0);" class="logo" style="background-color:#28373e;">
                        <!-- mini logo -->
                        <b class="logo-mini">
                            <span class="light-logo"><img src="../assets/images/logonew.png"/></span>
                        </b>
                        <!-- logo-->
                    </a>
                    <!-- Header Navbar -->
                    <nav class="navbar navbar-static-top" style="background-color:#28373e;">
                        <!-- Sidebar toggle button-->
                        <div class="justify-content-center">
                            <span class="label label-warning" id="TimeClock" style="font-size:16px;margin-left:550px;display:none;"><i class="fa fa-clock-o"></i></span>
                            <a href="javascript:void(0)" class="btn btn-default" id="WebForm-Display" style="display:none;">Agent View</a>
                        </div>
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <!--Agent-->
                                <li class="dropdown messages-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" onclick="AgentsViewOpen('AgentViewSpan', 'open');return false;">
                                        <i class="mdi mdi-account"></i>
                                    </a>
                                    <span class="badge badge-pill badge-warning notification-count" id="">0</span>
                                    <div class="dropdown-menu dropdown-menu-right animated flipInX">
                                        <!--                    <div class="scale-up notification-menu">-->
                                        <div class="box">
                                            <div class="panel-heading">
                                                <div class="panel-title">Other Agents Status</div>
                                                <ul class="nav panel-tabs">
                                                    <li>
                                                        <a class="text-dark" title="" href="javascript:void(0)"><span class="fa fa-envelope text-blue2"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body" id="AgentSectionDiv">
                                                <div class="table-responsive">
                                                    <div class="alert alert-info alert-dismissible">
                                                        No Message Available
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Messages -->
                                <li class="dropdown messages-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" onclick="CalLBacKsLisTCheckPopUp(0,0);return false;">
                                        <i class="mdi mdi-library-books"></i>
                                    </a>
                                    <span class="badge badge-pill badge-warning notification-count" id="CallBackManagement">0</span>
                                    <div class="dropdown-menu dropdown-menu-right animated flipInX" style="width: 400px;">
                                        <!--                    <div class="scale-up notification-menu">-->
                                        <div class="box">
                                            <div class="panel-heading">
                                                <div class="panel-title">CallBack List</div>
                                                <ul class="nav panel-tabs">
                                                    <li>
                                                        <a class="text-dark" title="" href="javascript:void(0)"><span class="fa fa-phone text-blue2"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="table-responsive" id="callBackSectionDiv">
                                                    <div class="alert alert-info alert-dismissible">
                                                        No Callback Available
                                                    </div>
                                                </div>
                                                <!-- <div class="table-responsive">
                                                    <p>123456789012 <span><a href="#" onclick="new_callback_call('12','35','MAIN');return false;" class="btn btn-success btn-app"><i class="fa fa-phone"></i></a></span></p>
                                                    <p>123456789012 <span><a href="#" onclick="new_callback_call('12','35','MAIN');return false;" class="btn btn-success btn-app"><i class="fa fa-phone"></i></a></span></p>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Notifications -->
                                <li class="dropdown notifications-menu">
                                    <a href="#" class="dropdown-toggle AgentMessage" data-toggle="dropdown" aria-expanded="false" onclick="agent_message_handle();">
                                        <i class="mdi mdi-message"></i>
                                    </a>
                                    <span class="badge badge-pill badge-warning notification-count" id="AgentMessageCount">0</span>
                                    <div class="dropdown-menu dropdown-menu-right animated flipInX">
                                        <!--                    <div class="scale-up notification-menu">-->
                                        <div class="box">
                                            <div class="panel-heading">
                                                <div class="panel-title">Agent Message</div>
                                                <ul class="nav panel-tabs">
                                                    <li>
                                                        <a class="text-dark" title="" href="javascript:void(0)"><span class="fa fa-envelope text-blue2"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body" id="MessageSectionDiv">
                                                <div class="table-responsive">
                                                    <div class="alert alert-info alert-dismissible">
                                                        No Message Available
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Tasks-->
                                <li class="dropdown tasks-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" <?php echo ($view_calls_in_queue > 0) ? 'onclick="show_calls_in_queue(\'SHOW\')"' : ''; ?>>
                                        <i class="mdi mdi-phone"></i>
                                    </a>
                                    <span class="badge badge-pill badge-warning notification-count" id="AgentStatusCalls">0</span>
                                    <div class="dropdown-menu dropdown-menu-right animated flipInX">
                                        <!--                    <div class="scale-up notification-menu">-->
                                        <div class="box">
                                            <div class="panel-heading">
                                                <div class="panel-title">Inbound Calls Waiting</div>
                                                <ul class="nav panel-tabs">
                                                    <li>
                                                        <a class="text-dark" title="" href="javascript:void(0)" <?php echo ($view_calls_in_queue > 0) ? 'onclick="show_calls_in_queue(\'SHOW\')"' : ''; ?>><span class="fa fa-phone text-blue2"></span></a></li>
                                                </ul>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body" >
                                                <div class="table-responsive" id="callsinqueuelistNew">
                                                    <div class="alert alert-info alert-dismissible">
                                                        No Inbound Call Waiting
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <?php if($inbound_call_drop == 'Y') { ?>
                                <li class="dropdown messages-menu">
                                    <a href="#" class="dropdown-toggle InboundCallDrop" data-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-phone-missed"></i>
                                    </a>
                                    <span class="badge badge-pill badge-warning notification-count" id="inboundCallManagement">0</span>
                                    <div class="dropdown-menu dropdown-menu-right animated flipInX" style="width: 400px;">
                                        <!--                    <div class="scale-up notification-menu">-->
                                        <div class="box">
                                            <div class="panel-heading">
                                                <div class="panel-title">Inbound Call Drop List</div>
                                                <ul class="nav panel-tabs">
                                                    <li>
                                                        <a class="text-dark" title="" href="javascript:void(0)"><span class="fa fa-phone text-blue2"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="table-responsive" id="inboundCallDiv">
                                                  <input type="hidden" value="" id="inboundCallDivData">
                                                    <div class="alert alert-info alert-dismissible">
                                                        No Drop List Available
                                                    </div>
                                                </div>
                                                <!-- <div class="table-responsive">
                                                    <p>123456789012 <span><a href="#" onclick="new_callback_call('12','35','MAIN');return false;" class="btn btn-success btn-app"><i class="fa fa-phone"></i></a></span></p>
                                                    <p>123456789012 <span><a href="#" onclick="new_callback_call('12','35','MAIN');return false;" class="btn btn-success btn-app"><i class="fa fa-phone"></i></a></span></p>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>

                                <!-- User Account-->
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span style="background-color: #4eb598;
                                              font-size: 15px;
                                              border-radius: 28px;
                                              padding: 10px;"><?php echo initials($UserDetail['full_name']); ?></span>
                                                        <!--<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTLMXEtafCkq2nYjPZIUEslsXoVXNBzURoDLeblurcyeQWK0_ly8g&s" class="user-image rounded-circle" alt="User Image">-->
                                    </a>
                                    <ul class="dropdown-menu scale-up">
                                        <!-- User image -->
                                        <li class="user-header">

                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZYSbl3KgOS3-Ddu1RRvv03QbE_AcL8LUy1mqsw4aGxxyEt762yw&s" class="float-left rounded-circle" alt="User Image">

                                            <p>
                                                <?php echo initials_name($UserDetail['full_name']); ?>
                                                <small class="mb-5"><?php echo (!empty($UserDetail['email']) && $UserDetail['email']) ? $UserDetail['email'] : ' Not Available'; ?></small>
                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm btn-rounded" onclick="$('#ViewProfile-Modal').modal('show');" style="white-space: nowrap;">View Profile</a>
                                            </p>
                                        </li>
                                        <!-- Menu Body -->
                                        <li class="user-body">
                                            <div class="row no-gutters">
                                                <?php
                                                $VARpause_codes1 = isset($VARpause_codes) ? array_filter(explode("','", rtrim(ltrim($VARpause_codes, "'"), "'"))) : '';
                                                $VARpause_code_names1 = isset($VARpause_code_names) ? explode("','", rtrim(ltrim($VARpause_code_names, "'"), "'")) : '';
                                                if (!empty($VARpause_codes1) && count($VARpause_codes1) > 0) {
                                                    foreach ($VARpause_codes1 as $key => $val) {
                                                        ?>
                                                        <div class="col-12 text-left">
                                                            <a href="javascript:void(0);" onclick="PauseCodeSelect_submit('<?php echo $val; ?>', 'YES');return false;">
                                                                <i class="fa fa-pause-circle-o text-warning"></i> <?php echo $val; ?> - <?php echo $VARpause_code_names1[$key]; ?>
                                                            </a>
                                                        </div>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                                <!--                  <div class="col-12 text-left">
                                                                    <a href="#"><i class="ion ion-email-unread"></i> Inbox</a>
                                                                  </div>
                                                                  <div class="col-12 text-left">
                                                                    <a href="#"><i class="ion ion-settings"></i> Setting</a>
                                                                  </div>
                                                                                <div role="separator" class="divider col-12"></div>
                                                                                  <div class="col-12 text-left">
                                                                    <a href="#"><i class="ti-settings"></i> Account Setting</a>
                                                                  </div>-->
                                                <div role="separator" class="divider col-12"></div>
                                                <div class="col-12 text-left">
                                                    <a href="javascript:void(0);" onclick="NormalLogout();return false;needToConfirmExit = false;"><i class="fa fa-power-off"></i> Logout</a>
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
                    <ul class="sidebar-menu" data-widget="tree" style="top:40px; position:absolute">
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li class="hidden" id="DTMF-Model"><a href="" class="btn btn-primary DTMF-BTN-keyboard" data-toggle="modal" data-target="#DTMF-Modal"><i class="fa fa-keyboard-o"></i></a></li>
                        <?php if (!in_array($dial_method, ['INBOUND_MAN', 'MANUAL'])) { ?>
                            <li class="" id="CallPause"> <a href="javascript:void(0);" class="btn btn-success" onclick="AutoDial_ReSume_PauSe('VDADready', '', '', '', '', '', '', 'YES');" title="Go Ready"> <i class="fa fa-play"></i> </a> </li>
                        <?php } ?>
                        <?php if (in_array($dial_method, ['INBOUND_MAN', 'MANUAL'])) { ?>
                            <li class="" id="NextLead"> <a href="javascript:void(0);" onclick="ManualDialNext('', '', '', '', '', '0', '', '', 'YES');" class="btn btn-success" title="Dial Next Lead"> <i class="fa fa-phone"></i> </a> </li>
<?php } ?>
                        <li class="" id="XferControl"></li>
                        <li class="" id="HoldControl"></li>
                        <li  id="RecorDControlNew" style="display:none;">
                            <a href="#" class="btn btn-success" onclick="conf_send_recording('MonitorConf', session_id, '', '', '', 'YES');return false;" title="Start Recording">
                                <i class="fa fa-microphone"></i>
                            </a>
                        </li>
                        <li class="" id="HangupControl"></li>
                        <li class="hidden" id="DispoModal"> <a href="javascript:void(0);" class="btn btn-warning" data-toggle="modal" data-target="#CallDispo-Modal" title="Show Disposition"> <i class="fa fa-arrow-circle-right"></i> </a> </li>
                    </ul>
                    <ul class="sidebar-menu" data-widget="tree" style="bottom:0px; position:fixed">
                        <li class="" id="AgentMuteSpan1" style="display:none;"><a href="javascript:void(0);" class="btn btn-success" data-toggle='modal' data-target='#CallTransfer-Modal'><i class="fa fa-share"></i></a></li>
                        <li class="" id="AgentMuteSpan" style="display:none;"></li>
                        <?php if (!empty($web_form_address) && strlen($web_form_address) > 1) { ?>
                            <li class="HideOnPause" id="WebFormSpan"></li>
                        <?php } else { ?>
                            <li id="WebFormSpan" style="display:none;"></li>
<?php } ?>
                        <li class="HideOnPause" id="ManualDial"> <a href="#" class="btn btn-info" onclick="NeWManuaLDiaLCalL('NO', '', '', '', '', 'YES');return false;" title="Manual Dial"> <i class="fa fa-phone" ></i> </a> </li>
                        <!--<li class="treeview"> <a href="#" class="btn btn-warning"> <i class="fa fa-clock-o"></i> </a> </li>-->
                        <?php if ($INgrpCT > 0) { ?>
                            <li class="HideOnPause" id="InboundGroups"> <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-inbound-groups" title="Change Groups"> <i class="fa fa-users"></i> </a> </li>
<?php } ?>
                        <li class="HideOnPause" id="LogoutBTN"> <a href="javascript:void(0);" class="btn btn-danger" onclick="NormalLogout();return false;needToConfirmExit = false;" title="Logout"> <i class="fa fa-sign-out"></i> </a> </li>
                    </ul>
                </aside>
                <div class="content-wrapper" style="display:none;">

                    <!-- Main content -->
                    <section class="content">

                        <div class="row" id="AgentDetailView" >
                            <div class="col-md-12 text-center" style="margin-top:20px;display:none;">
                                <span style="margin-left:160px; font-size:14px;color: #ffc107;">
                                    <span id="agentchannelSPAN"></span>&nbsp;&nbsp;
                                    <span id="status"> <?php echo _QXZ("LIVE"); ?></span>&nbsp;&nbsp;
<?php echo _QXZ("Session ID:"); ?> <span id="sessionIDspan"></span>&nbsp; &nbsp;
                                    <span id="AgentStatusCallsOLD"></span>&nbsp; &nbsp;
                                    <span id="AgentStatusEmails"></span>
                                </span>
                                <span id="MainStatuSSpan"></span>
                            </div>

                            <div class="col-12" style="margin-top:20px;">
                                <div class="box card-inverse bg-img" id="MainStatuSSpanOLD">
                                    <div class="flexbox align-items-center py-20" data-overlay="4">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="align-items-center mr-auto" >
                                                <!--<a href="#" class="left-float"> <img class="avatar avatar-xl avatar-bordered" src="http://webduniaguru.com/an-new-admin/images/avatar/4.jpg" alt=""> </a>-->
                                                <div class="pl-10 profile left-float" style="margin: 3px 0 0 5px;">
                                                    <h5 class="mb-0"><a class="hover-primary text-white" href="javascript:void(0);" onclick="start_all_refresh();"><?php echo $UserDetail['full_name'] ?></a></h5>
                                                    <span>Campaign <?php
                                                        if ($on_hook_agent == 'Y') {
                                                            echo "(<a href=\"#\" onclick=\"NoneInSessionCalL();return false;\">" . _QXZ("ring") . "</a>)";
                                                        }
                                                        echo $VD_campaign;
                                                        ?></span><br>
                                                    <span>Team - <?php echo $UserDetail['user_group']; ?></span><br>
                                                    <span>Phone - <?php echo $SIP_user ?></span> </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="user-info" >
                                                        <div class="image" style="display:none;">
                                                            <img src="./images/<?php echo _QXZ("agc_live_call_OFF.gif"); ?>" name="livecall" alt="Live Call" width="48px" height="48px" /></div>
                                                        <div class="info-container" style="display:none;">
                                                            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Phone No. : <span id="phone_numberDISP"></span></div>
                                                            <div class="email"><span id="dialableleadsspan">
                                                                    <?php
                                                                    if ($agent_display_dialable_leads > 0) {
                                                                        echo _QXZ("Dialable Leads:") . "<br />\n";
                                                                    }
                                                                    ?>
                                                                </span></div>
                                                        </div>
                                                    </div>

                                                    <div class="menu" >
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
                                                            <span id="DiaLLeaDPrevieW"><input class="filled-in" type="checkbox" name="LeadPreview" size="1" value="0" <?php echo ($manual_preview_dial != 'DISABLED') ? 'checked="checked"' : ''; ?> /><label for="LeadPreview">LEAD PREVIEW</label></span>
                                                            <span id="DiaLDiaLAltPhonE"><input class="filled-in chk-col-blue-grey" type="checkbox" name="DiaLAltPhonE" size="1" value="0" <?php echo $alt_phone_selected ?>/><label for="DiaLAltPhonE"> ALT PHONE DIAL</label></span>


                                                            <span  id="DiaLControl" style="display:none;">

                                                            </span>

                                                            <!--<?php
                                                            if (($manual_dial_preview) and ( $auto_dial_level == 0)) {
                                                                echo "<input type=\"checkbox\" class=\"filled-in\" id=\"lead1\"  name=\"LeadPreview\" size=\"1\" value=\"0\" /><label for=\"lead1\"> LEAD PREVIEW</label>";
                                                            }
                                                            if (($alt_phone_dialing) and ( $auto_dial_level == 0)) {
                                                                echo "<input type=\"checkbox\" class=\"filled-in\" id=\"lead2\"  name=\"DiaLAltPhonE\" size=\"1\" value=\"0\" /><label for=\"lead2\">  ALT PHONE DIAL</label>";
                                                            }
                                                            ?> -->


                                                            <span id="WebFormSpanTwo"></span>
                                                            <span id="WebFormSpanThree"></span>

                                                            <span id="ParkCounterSpan"></span><br>
                                                            <span  id="ParkControl" style="display:none;">
                                                                <img src="./images/<?php echo _QXZ("vdc_LB_parkcall_OFF.gif"); ?>" border="0" alt="Park Call" style="width:136px"/></span>
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





                                                            <?php
                                                            if ($quick_transfer_button_enabled > 0) {
                                                                echo "<span style=\"display:none;background-color: $MAIN_COLOR\" id=\"QuickXfer\"><img src=\"./images/" . _QXZ("vdc_LB_quickxfer_OFF.gif") . "\" border=\"0\" alt=\"Quick Transfer\" /></span>\n";
                                                            }
                                                            if ($custom_3way_button_transfer_enabled > 0) {
                                                                echo "<span style=\"display:none;background-color: $MAIN_COLOR\" id=\"CustomXfer\"><img src=\"./images/" . _QXZ("vdc_LB_customxfer_OFF.gif") . "\" border=\"0\" alt=\"Custom Transfer\" /></span>\n";
                                                            }
                                                            ?>








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
                            /* $data1 = $database->query("SELECT SUM(length_in_sec) as utg_call_length FROM vicidial_log VCL where VCL.call_date >= '" . date('Y-m-d') . " 00:00:00' AND VCL.call_date <= '" . date("Y-m-d") . " 23:59:59' AND VCL.user = '" . $VD_login . "' AND VCL.campaign_id = '" . $VD_campaign . "' GROUP BY campaign_id ORDER BY VCL.call_date DESC")->fetchAll(PDO::FETCH_ASSOC);

                            $data2 = $database->query("SELECT SUM(length_in_sec) as utg_call_length FROM vicidial_closer_log VCL where VCL.call_date >= '" . date('Y-m-d') . " 00:00:00' AND VCL.call_date <= '" . date("Y-m-d") . " 23:59:59' AND VCL.user = '" . $VD_login . "' AND VCL.campaign_id = '" . $VD_campaign . "' GROUP BY campaign_id ORDER BY VCL.call_date DESC")->fetchAll(PDO::FETCH_ASSOC); */

                            $utg_call_length = $database->query("SELECT (SELECT SUM(length_in_sec) FROM vicidial_log VCL where VCL.call_date >= '" . date('Y-m-d') . " 00:00:00' AND VCL.call_date <= '" . date("Y-m-d") . " 23:59:59' AND VCL.user = '" . $VD_login . "' AND VCL.campaign_id = '" . $VD_campaign . "' GROUP BY VCL.user ORDER BY VCL.call_date DESC) AS inbound, (SELECT SUM(length_in_sec) as utg_call_length FROM vicidial_closer_log VCL where VCL.call_date >= '" . date('Y-m-d') . " 00:00:00' AND VCL.call_date <= '" . date("Y-m-d") . " 23:59:59' AND VCL.user = '" . $VD_login . "' AND VCL.campaign_id = '" . $VD_campaign . "' GROUP BY VCL.user ORDER BY VCL.call_date DESC) AS outbound")->fetchAll(PDO::FETCH_ASSOC);

                            $utg_call_length = array_merge($data1, $data2);
                            /*  $Performance = $database->query("Select Email,Chat,Calls,Connects,DMCs,Sales,LOWER(user) as USERID, campaign_id,SEC_TO_TIME(TalkSeconds) as Talk,SEC_TO_TIME(PauseSeconds) as Pause,  SEC_TO_TIME(WaitSeconds) as Wait,  SEC_TO_TIME(DispoSeconds) as Dispo, TotalDMCTalkSecs
from
(select val.`user`, val.campaign_id, val.user_group,
sum(case when val.status is not null then 1 else 0 end) as Calls,
sum(case when status is not null and (val.comments IN ('CHAT') OR val.comments IS NULL) then 1 else 0 end) as Chat,
sum(case when status is not null and (val.comments IN ('Email') OR val.comments IS NULL) then 1 else 0 end) as Email,
sum(case when val.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
sum(case when val.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
sum(case when val.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(val.dead_sec as signed) else cast(val.talk_sec as signed)- cast(val.dead_sec as signed) end) as Talk,
sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end) as Pause,
Sum(case when val.talk_epoch > val.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else val.wait_sec end) as Wait,
Sum(val.dispo_sec + cast(val.dead_sec as signed)) as Dispo,
Sum(case when val.Status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then (cast(val.Talk_sec as signed) - cast(val.dead_sec as signed)) else 0 end) as TotalDMCTalkSecs,
sum(talk_sec) as TalkSeconds,
sum(wait_sec) as WaitSeconds,
sum(pause_sec) as PauseSeconds,
sum(dispo_sec) as DispoSeconds
from vicidial_agent_log val
where val.event_time between CURDATE() and CURDATE() + INTERVAL 1 DAY and val.user = '" . $VD_login . "' and val.campaign_id = " . $VD_campaign . "
) a
ORDER BY campaign_id")->fetchAll(PDO::FETCH_ASSOC); */

if($utg_call_length[0] == '' || $utg_call_length[0] == 0) {
  $Performance = $database->query("Select Email,Chat,Calls,Connects,DMCs,Sales,LOWER(user) as USERID, campaign_id,SEC_TO_TIME(TalkSeconds) as Talk,SEC_TO_TIME(PauseSeconds) as Pause,  SEC_TO_TIME(WaitSeconds) as Wait,  SEC_TO_TIME(DispoSeconds) as Dispo, TotalDMCTalkSecs
  from
  (select val.`user`, val.campaign_id, val.user_group,
  sum(case when val.status is not null then 1 else 0 end) as Calls,
  sum(case when status is not null and (val.comments IN ('CHAT') OR val.comments IS NULL) then 1 else 0 end) as Chat,
  sum(case when status is not null and (val.comments IN ('Email') OR val.comments IS NULL) then 1 else 0 end) as Email,
  sum(case when val.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
  sum(case when val.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
  sum(case when val.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
  sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(val.dead_sec as signed) else cast('talk_sec' as signed)- cast(val.dead_sec as signed) end) as Talk,
  sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end) as Pause,
  Sum(case when val.talk_epoch > val.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else val.wait_sec end) as Wait,
  Sum(val.dispo_sec + cast(val.dead_sec as signed)) as Dispo,
  Sum(case when val.Status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then (cast('talk_sec' as signed) - cast(val.dead_sec as signed)) else 0 end) as TotalDMCTalkSecs,
  0 as TalkSeconds,
  sum(wait_sec) as WaitSeconds,
  sum(pause_sec) as PauseSeconds,
  sum(dispo_sec) as DispoSeconds
  from vicidial_agent_log val
  where val.event_time between CURDATE() and CURDATE() + INTERVAL 1 DAY and val.user = '" . $VD_login . "' and val.campaign_id = " . $VD_campaign . "
  ) a
  ORDER BY campaign_id")->fetchAll(PDO::FETCH_ASSOC);
} else {
  $Performance = $database->query("Select Email,Chat,Calls,Connects,DMCs,Sales,LOWER(user) as USERID, campaign_id,SEC_TO_TIME(TalkSeconds) as Talk,SEC_TO_TIME(PauseSeconds) as Pause,  SEC_TO_TIME(WaitSeconds) as Wait,  SEC_TO_TIME(DispoSeconds) as Dispo, TotalDMCTalkSecs
from
(select val.`user`, val.campaign_id, val.user_group,
sum(case when val.status is not null then 1 else 0 end) as Calls,
sum(case when status is not null and (val.comments IN ('CHAT') OR val.comments IS NULL) then 1 else 0 end) as Chat,
sum(case when status is not null and (val.comments IN ('Email') OR val.comments IS NULL) then 1 else 0 end) as Email,
sum(case when val.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
sum(case when val.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
sum(case when val.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
sum(case when val.dispo_epoch > val.talk_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(talk_epoch),FROM_UNIXTIME(dispo_epoch)) - cast(val.dead_sec as signed) else cast('talk_sec' as signed)- cast(val.dead_sec as signed) end) as Talk,
sum(case when wait_epoch > pause_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(pause_epoch),FROM_UNIXTIME(wait_epoch)) else pause_sec end) as Pause,
Sum(case when val.talk_epoch > val.wait_epoch then TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(wait_epoch),FROM_UNIXTIME(talk_epoch)) else val.wait_sec end) as Wait,
Sum(val.dispo_sec + cast(val.dead_sec as signed)) as Dispo,
Sum(case when val.Status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then (cast('talk_sec' as signed) - cast(val.dead_sec as signed)) else 0 end) as TotalDMCTalkSecs,
".$utg_call_length[0]['utg_call_length']." as TalkSeconds,
sum(wait_sec) as WaitSeconds,
sum(pause_sec) as PauseSeconds,
sum(dispo_sec) as DispoSeconds
from vicidial_agent_log val
where val.event_time between CURDATE() and CURDATE() + INTERVAL 1 DAY and val.user = '" . $VD_login . "' and val.campaign_id = " . $VD_campaign . "
) a
ORDER BY campaign_id")->fetchAll(PDO::FETCH_ASSOC);
}

                            $Performance = $Performance[0];

                            $Wait = TimeToSec($Performance['Wait']);
                            $Talk = TimeToSec($Performance['Talk']);
                            $Wrap = TimeToSec($Performance['Dispo']);
                            $Pause = TimeToSec($Performance['Pause']);

                            $TotalTime = ($Wait + $Talk + $Wrap + $Pause);

                            $percentageArray = array();
                            $percentageArray['Talk'] = (isset($TotalTime) && $TotalTime != 0) ? round((($Talk / $TotalTime) * 100)) : 0;
                            $percentageArray['Pause'] = (isset($TotalTime) && $TotalTime != 0) ? round((($Pause / $TotalTime) * 100)) : 0;
                            $percentageArray['Wait'] = (isset($TotalTime) && $TotalTime != 0) ? round((($Wait / $TotalTime) * 100)) : 0;
                            $percentageArray['Dispo'] = (isset($TotalTime) && $TotalTime != 0) ? round((($Wrap / $TotalTime) * 100)) : 0;
                            ;
                            ?>
                            <div class="col-12 col-lg-3">

                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Today's Overview</h4>
                                    </div>

                                    <div class="box-body">
                                        <div class="text-center py-20">
                                            <div class="donut" data-peity='{ "fill": ["#7460ee", "#26c6da", "#fc4b6c", "#ffb22b "], "radius": 108, "innerRadius": 50  }' ><?php echo implode(',', $percentageArray); ?></div>
                                        </div>

                                        <ul class="flexbox flex-justified text-center mt-70">
                                            <li class="br-1">
                                                <div class="font-size-20 text-primary"><?php echo $percentageArray['Talk']; ?>%</div>
                                                <small class="font-size-12 text-fade">Talking</small>
                                            </li>

                                            <li class="br-1">
                                                <div class="font-size-20 text-success"><?php echo $percentageArray['Pause']; ?>%</div>
                                                <small class="font-size-12 text-fade">Pause</small>
                                            </li>

                                            <li>
                                                <div class="font-size-20 text-danger"><?php echo $percentageArray['Wait']; ?>%</div>
                                                <small class="font-size-12 text-fade">Waiting</small>
                                            </li>

                                            <li>
                                                <div class="font-size-20 text-warning"><?php echo $percentageArray['Dispo']; ?>%</div>
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
                                    <li class="nav-item" id="CallHistoryTab"> <a class="nav-link" data-toggle="tab" href="#CallHistory" role="tab" ><span class="fa fa-clock-o"></span></a> </li>
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
                                                            <h3 class="text-green"><?php echo (!empty($Performance['Talk'])) ? $Performance['Talk'] : '00:00:00'; ?></h3>

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
                                                            <h3 class="text-blue"><?php echo (!empty($Performance['Wait'])) ? $Performance['Wait'] : '00:00:00'; ?></h3>

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
                                                            <h3 class="text-yellow"><?php echo (!empty($Performance['Dispo'])) ? $Performance['Dispo'] : '00:00:00'; ?></h3>

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
                                                            <h3 class="text-primary"><?php echo (!empty($Performance['Pause'])) ? $Performance['Pause'] : '00:00:00'; ?></h3>

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
                                                            <h3 class="text-success"><?php echo (!empty($Performance['Calls'])) ? $Performance['Calls'] : 0; ?></h3>

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
                                                            <h3 class="text-success"><?php echo (!empty($Performance['Connects'])) ? $Performance['Connects'] : 0; ?></h3>

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
                                                            <h3 class="text-success"><?php echo (!empty($Performance['DMCs'])) ? $Performance['DMCs'] : 0; ?></h3>

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
                                                            <h3 class="text-success"><?php echo (!empty($Performance['Sales'])) ? $Performance['Sales'] : 0; ?></h3>

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
                                                <?php
//
                                                $TotalCall = $database->query('SELECT count(*) as total from vicidial_closer_log where user = 4007')->fetchAll(PDO::FETCH_ASSOC);
                                                $TotalCall = $TotalCall[0]['total'];
                                                ?>
                                                <div class="col-xl-6 col-md-6 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-default">
                                                        <div class="inner">
                                                            <h3><?php echo $percentageArray['Talk']; ?>%</h3>

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
                                                            <h3><?php echo $percentageArray['Wait']; ?>%</h3>

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
                                                            <h3><?php echo $percentageArray['Dispo']; ?>%</h3>

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
                                                            <h3><?php echo $percentageArray['Pause']; ?>%</h3>

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
                                                            <h3><?php echo ((isset($TotalCall) && $TotalCall != 0) ? round((($Performance['Calls'] / $TotalCall) * 100)) : 0); ?>%</h3>

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
                                                            <h3><?php echo ((isset($TotalCall) && $TotalCall != 0) ? round((($Performance['Connects'] / $TotalCall) * 100)) : 0); ?>%</h3>

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
                                                            <h3><?php echo ((isset($TotalCall) && $TotalCall != 0) ? round((($Performance['DMCs'] / $TotalCall) * 100)) : 0); ?>%</h3>

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
                                                            <h3><?php echo ((isset($TotalCall) && $TotalCall != 0) ? round((($Performance['Sales'] / $TotalCall) * 100)) : 0); ?>%</h3>

                                                            <p>Avg Sales</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>
                                                        <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="card " style="z-index:<?php
                                            $zi++;
                                            echo $zi
                                            ?>;display:none;" id="ViewCommentsBox">
                                                <div class="header">
                                                    <h2>View Comment History:<small><span id="ViewCommentsShowHide"><a href="#" onclick="ViewComments('OFF', '', '', 'YES');return false;">hide comment history</a></span></small></h2>
                                                </div>
                                                <div class="body">
                                                    <PRE><font size=1><span id="audit_comments"></span></font></PRE>
                        <input type="hidden" class="cust_form_text" id="audit_comments_button" name="audit_comments_button" value="0" />
                    </div>
                </div>


                 <div class="card" style="z-index:<?php
                                            $zi++;
                                            echo $zi
                                            ?>;display:none;"  id="AgentStatusSpan">
                        <div class="header">
				            <h2>Agent Status</h2>
				        </div>
				         <div class="body">
                                                <?php echo _QXZ("Your Status:"); ?> <span id="AgentStatusStatus"></span> <br><?php echo _QXZ("Calls Dialing:"); ?> <span id="AgentStatusDiaLs"></span>
                    	</div>
            	</div>

                 <div class="card" style="z-index:<?php
                                            $zi++;
                                            echo $zi
                                            ?>;top:-382px;display:none;" id="HotKeyEntriesBox">
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

                <div class="card" style="z-index:<?php
                                            $zi++;
                                            echo $zi
                                            ?>;top:-655px;display:none;" id="CBcommentsBox">
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

                                <div class="tab-pane" id="home4" role="tabpanel" >
                                    <div class="demo-settings">
                        <p>VOLUME SETTINGS</p>
                        <ul class="setting-list text-center">
                            <li>

<span id="VolumeControlSpan"><span id="VolumeUpSpan"><button class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="Volume up Off" type="button"><i class="material-icons">volume_up</i></button></span>
&nbsp;<span id="VolumeDownSpan"><button class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="Volume down Off" type="button"><i class="material-icons">volume_down</i></button></span></span>&nbsp;
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
					  <button type="button" class="btn btn-default" id="daterange-btn1">
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
                      <a href="javascript:void(0);"><?php echo date('Y-m-d'); ?></a>
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
                                    <?php // require 'lead.php'; ?>
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
                <?php require 'dashboard_detail_listing.php'; ?>
                <?php require 'call_detail_listing.php'; ?>

            <!-- /.content-wrapper -->


<!--<div class="overlay"></div>-->
                <?php require_once('elements/modal.php'); ?>
            <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
            <li class="nav-item">
                <!--<a class="nav-link" href="javascript:void(0)">FAQ</a>-->
            </li>
        </ul>
    </div>
    &copy; <?php echo date('Y'); ?> <a href="https://www.utgone.com/" target="_blank">UTGONE</a>. All Rights Reserved.
</footer>
        </div>





</form>


<form name="inert_form" id="inert_form" onsubmit="return false;">
<span style="position:absolute;left:0px;top:400px;z-index:1;" id="NothingBox2">
<input type="checkbox" name="inert_button" class="filled-in" id="inert_button"  value="0" onclick="return false;" /><label for="inert_button"></label>
</span>
</form>

 <form name="alert_form" id="alert_form" onsubmit="return false;">
<span style="position:absolute;left:335px;top:170px;z-index:<?php
                  $zi++;
                  echo $zi
                  ?>;" id="AlertBox">
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

</form>
        <div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-info myadmin-alert-top-right" style="display:none;">
                <img src="../assets/images/star-level.png" class="img" alt="img">
                <h4>Congratulations!</h4> You are <b class="LevelDescription"></b> now!!.
</div>



<audio id='ChatAudioAlertFile'><source src="sounds/chat_alert.mp3" type="audio/mpeg"></audio>
<audio id='EmailAudioAlertFile'><source src="sounds/email_alert.mp3" type="audio/mpeg"></audio>
<input type="hidden" name="" value="<?php echo $VD_login; ?>" id="LoginUser"/>
<input type="hidden" name="" value="<?php echo $VD_campaign; ?>" id="LoginCampaign"/>
        <?php require('elements/script.php'); ?>
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

        <script src="../assets/js/jquery.knob.js"></script>
        <script src="../assets/js/jquery.throttle.js"></script>
        <script src="../assets/js/jquery.classycountdown.js"></script>
        <script src="../assets/js/jquery.classycountup.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>


        <script>
                        jQuery(function () {
                          $('.selectpicker').selectpicker();

                            jQuery('.showSingle').click(function () {
                                $('#LoadData-loader').show();
                                jQuery('.targetDiv').slideUp(1000);
                                var DivNumber = $(this).attr('target');
                                jQuery('#div' + $(this).attr('target')).slideDown(1000);
                                /*GET Value According to Click ITEM*/
                                $('#display-Performance').remove();
                                var caseValue = $(this).data('action');
                                var LoginCampaign = $('#LoginCampaign').val();
                                var InboundGroups = $('#CloserSelectList').val();
                                var LoginUser = $('#LoginUser').val();
                                $.ajax({
                                    type: "POST",
                                    url: 'elements/ajax.php',
                                    data: {rule: 'performance_detail', InboundGroups:InboundGroups, caseValue: caseValue, LoginCampaign: LoginCampaign, LoginUser: LoginUser}, // serializes the form's elements.
                                    success: function (data)
                                    {
                                        $('#div' + DivNumber).html(data);
                                        $('#display-Performance').DataTable();

                                        setTimeout(function () {
                                            $('#LoadData-loader').hide();
                                        }, 1000);
                                    }
                                });
                                /*END click ITEM*/
                            });
                        });
  </script>
        <script>
            $(document).ready(function () {
                $('.BTN-STATS').click(function () {
                    if ($(this).hasClass('active')) {
                        $('.AVG-STATS').toggle();
                        $('.FULL-STATS').toggle();
                    } else {
                        $('.AVG-STATS').toggle();
                        $('.FULL-STATS').toggle();
                    }
                });
            });

//           $('#CallHistoryTable').DataTable();



            $(document).on('click', '.nav-link', function () {
                var hrefValue = $(this).attr('href');
                if (hrefValue == '#CallHistory') {
                    var InboundGroups = $('#CloserSelectList').val();
                    var CampaignID = '<?php echo $VD_campaign; ?>';
                    var UserID = $('#LoginUser').val();

                    $.ajax({
                        type: "POST",
                        url: 'elements/ajax.php',
                        data: {rule: 'CallHistory', InboundGroups: InboundGroups, CampaignID: CampaignID, UserID: UserID}, // serializes the form's elements.
                        success: function (data)
                        {
                            $('#CallHistoryTable').html(data);
                            $('#CallHistoryTableData').DataTable();
                        }
                    });
                }
            });

            $(document).on('click', '.nav-link', function () {
                var hrefValue = $(this).attr('href');
                if (hrefValue == '#CallHistory' || hrefValue == '#callhistory') {
                    var InboundGroups = $('#CloserSelectList').val();
                    var CampaignID = '<?php echo $VD_campaign; ?>';
                    var UserID = $('#LoginUser').val();
                    $.ajax({
                        type: "POST",
                        url: 'elements/ajax.php',
                        data: {rule: 'CallHistory', InboundGroups: InboundGroups, CampaignID: CampaignID, UserID: UserID}, // serializes the form's elements.
                        success: function (data)
                        {
                            $('.CallHistoryData').html(data);
                            $('#CallHistoryTableData').DataTable({"order": [[ 0, 'desc' ]]});
                        }
                    });
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
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                            },
                            startDate: moment(),
                            endDate: moment()
                        },
                        function (start, end) {
                            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                            var InboundGroups = $('#CloserSelectList').val();
                            var CampaignID = '<?php echo $VD_campaign; ?>';
                            var UserID = $('#LoginUser').val();
                            var start = start.format('YYYY-MM-DD');
                            var end = end.format('YYYY-MM-DD');
                            $.ajax({
                                type: "POST",
                                url: 'elements/ajax.php',
                                data: {rule: 'CallHistory1', InboundGroups: InboundGroups, CampaignID: CampaignID, start: start, end: end, UserID: UserID}, // serializes the form's elements.
                                success: function (data)
                                {
                                    $('.CallHistoryData').html(data);
                                    $('#CallHistoryTableData').DataTable({"order": [[ 0, 'desc' ]]});
                                }
                            });
                        }
                );

                $('#datepicker').datepicker({
                    autoclose: true,
                    format: 'dd-mm-yyyy',
                });

                $('.datepicker').datepicker({
                    autoclose: true,
                });
                $('.timepicker').timepicker({
                    showInputs: false
                });
            });

            $(function () {
                "use strict";
                //Date range as a button
                $('#daterange-btn-callback').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                            },
                            startDate: moment(),
                            endDate: moment()
                        },
                        function (start, end) {
                            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                            CalLBacKsLisTCheck(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
                        }
                );
            });

//  $('#CallBackList-listings').DataTable();
//  $('#AgentCallbackSelection-Modal').modal('show');
// SendConfDTMF(session_id,'YES');

            $(document).ready(function () {
                $('.DTMF-BTN').click(function () {
                    var value = $(this).text();
                    $('input[name="conf_dtmf"]').val(value);
                    SendConfDTMF(session_id, 'YES');
                });

                $('.btn_submit').click(function(){
                    $('#DTMF-Modal').modal('hide');
                });
            });


//$('#CallDispo-Modal').modal('show');

            $(document).on('click', '.PauseCodeSwitch', function () {
                var move_on = 1;
                if ((AutoDialWaiting == 1) || (VD_live_customer_call == 1) || (alt_dial_active == 1) || (MD_channel_look == 1) || (in_lead_preview_state == 1))
                {
                    if ((auto_pause_precall == 'Y') && ((agent_pause_codes_active == 'Y') || (agent_pause_codes_active == 'FORCE')) && (AutoDialWaiting == 1) && (VD_live_customer_call != 1) && (alt_dial_active != 1) && (MD_channel_look != 1) && (in_lead_preview_state != 1))
                    {
//				agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1','');
                    } else
                    {
                        move_on = 0;
                        alert_box("<?php echo _QXZ("YOU MUST BE PAUSED TO ENTER A PAUSE CODE IN AUTO-DIAL MODE"); ?>");
                    }
                }

                if (move_on == 1) {
                    if ($(this).hasClass('active')) {
                        $(this).parent().find('button').html('Pause Activated');
                        $('#DispoPauseCodeSelection').show();

//                        $('#DispoSelectStop').prop('checked',
//                                function (i, oldVal) {
//                                    return !oldVal;
//                                });
//                        $('.DispoSelectStop-NEW').attr('checked', true);
                        document.vicidial_form.DispoSelectStop.checked=true;
//alert(move_on);
                    } else {
                        $(this).parent().find('button').html('Pause Deactivated');
                        $('#DispoPauseCodeSelection').hide();
//                        $('.DispoSelectStop-NEW').attr('checked', false);
                        document.vicidial_form.DispoSelectStop.checked=false;
                    }
                }
            });

            $(document).on('click', '.TagSwitchBTN', function () {
                if ($(this).hasClass('active')) {
                    $(this).parent().find('input').attr('type', 'text');
                } else {
                    $(this).parent().find('input').attr('type', 'hidden');
                    $(this).parent().find('input').val('');
                }
            });


            $(document).on('click', '.performance', function () {
                var caseValue = $(this).data('action');
                var LoginCampaign = $('#LoginCampaign').val();
                var LoginUser = $('#LoginUser').val();
                $.ajax({
                    type: "POST",
                    url: 'elements/ajax.php',
                    data: {rule: 'performance_detail', caseValue: caseValue, LoginCampaign: LoginCampaign, LoginUser: LoginUser}, // serializes the form's elements.
                    success: function (data)
                    {
                        $('#Performance-Div').html(data);
                        $('#display-Performance').DataTable();
                    }
                });
            });







//[timer contact Javascript]

//Project:	Fab Admin - Responsive Admin Template
            function secondsTimeSpanToHMS(s) {
                var h = Math.floor(s / 3600); //Get whole hours
                s -= h * 3600;
                var m = Math.floor(s / 60); //Get remaining minutes
                s -= m * 60;
                return h + ":" + (m < 10 ? '0' + m : m) + ":" + (s < 10 ? '0' + s : s); //zero padding on minutes and seconds
            }

            $(function () {
                "use strict";

                // get tag element
//		var countdown = document.getElementById('countdown');
//		// update the tag with id "countdown" every 1 second
//                var time = 60;
//                var timeOut = 0;
//		setInterval(function () {
//                    timeOut++;
//                    var timeCount = secondsTimeSpanToHMS((time - timeOut));
//                    var values = timeCount.split(':');
//                    var hours = values[0];
//                    var minutes = values[1];
//                    var seconds = values[2];
//			countdown.innerHTML = '<div class="hours timer col">' + hours + ' <div class="text">Hours</div></div> <div class="minutes timer col">' + minutes + ' <div class="text">Minutes</div></div> <div class="seconds timer col">' + seconds + ' <div class="text">Seconds</div></div>';
//		}, 1000);
            });

            function callTimer(ID) {
                var countdown = document.getElementById(ID);
                // update the tag with id "countdown" every 1 second
                var timeOut = 0;
                var MyCallTimer = setInterval(function () {
                    timeOut++;
                    var timeCount = secondsTimeSpanToHMS(timeOut);
                    var values = timeCount.split(':');
                    var hours = values[0];
                    if (values[0] <= 9) {
                        var hours = '0' + values[0];
                    }

                    var minutes = values[1];
                    var seconds = values[2];
                    countdown.innerHTML = '<div class="hours timer col">' + hours + ' <div class="text">Hours</div></div> <div class="minutes timer col">' + minutes + ' <div class="text">Minutes</div></div> <div class="seconds timer col">' + seconds + ' <div class="text">Seconds</div></div>';
                }, 1000);
            }
            function pauseTimer(ID, seconds) {
                var countdown = document.getElementById(ID);
                // update the tag with id "countdown" every 1 second
                var timeOut = 0;
                var time = seconds;
                var MyInterval = setInterval(function () {
                    timeOut++;
                    var timeCount = secondsTimeSpanToHMS((time - timeOut));
                    var values = timeCount.split(':');
                    var hours = values[0];
                    if (values[0] <= 9) {
                        var hours = '0' + values[0];
                    }

                    var minutes = values[1];
                    var seconds = values[2];
                    countdown.innerHTML = '<div class="hours timer col">' + hours + ' <div class="text">Hours</div></div> <div class="minutes timer col">' + minutes + ' <div class="text">Minutes</div></div> <div class="seconds timer col">' + seconds + ' <div class="text">Seconds</div></div>';
                    if (seconds == 00) {
//                    var timeOut = 0;
//                    var time = 0;
                        $('#' + ID).parent().prepend('<div class="alert alert-danger">You have exceed pause time limit</div>');
                        clearInterval(MyInterval);
//                    callTimer(ID);
                    }
                }, 1000);
            }


            function CountDownTimer(ID, seconds) {
                var countdown = document.getElementById(ID);

                var timeCount = secondsTimeSpanToHMS(seconds);
                var values = timeCount.split(':');
                var hours = values[0];
                if (values[0] <= 9) {
                    var hours = '0' + values[0];
                }
                var minutes = values[1];
                var seconds = values[2];
                countdown.innerHTML = '<div class="hours timer col">' + hours + ' <div class="text">Hours</div></div> <div class="minutes timer col">' + minutes + ' <div class="text">Minutes</div></div> <div class="seconds timer col">' + seconds + ' <div class="text">Seconds</div></div>';

            }
//    CountDownTimer('countdown',120);
//    pauseTimer('countdown',120);


//$('#CallTransfer-Modal').modal('show');



            function transfer_select(t) {
                $('.xfer_div').removeClass('hidden');
                $('.xfer_div').addClass('hidden');
                $('#xfernumber').val('').change();
                $('#XfeRGrouP').val('').change();
                //$('#AgentXferViewSelect').val('').change();
                $('.XfeRPreset').val('').change();
                switch (t) {
                    case 'Group':
                        document.vicidial_form.consultativexfer.checked = true;
                        $('#xfer_group').removeClass('hidden');
                        $('#xfer_buttons').removeClass('hidden');
                        xfer_select_agents_active = 0;
                        xfer_agent_selected = 0;
                        $('#QuickXfer').html('<a href="#" class="btn btn-info  btn-shadow" title="Dial And Hangup" onclick="sendgroupxfer();return false;"><i class="fa fa-blind"></i></a>');
                        break;
                    case 'Agent':
                        document.vicidial_form.consultativexfer.checked = true;
                        $('#XfeRGrouP').val('AGENTDIRECT');
                        XferAgentSelectLaunch();
                        $('#xfer_agent').removeClass('hidden');
                        $('#xfer_buttons').removeClass('hidden');
                        $('#QuickXfer').html('<a href="#" class="btn btn-info  btn-shadow" title="Dial And Hangup" onclick="sendgroupxfer();return false;"><i class="fa fa-blind"></i></a>');
                        break;
                    case 'Preset':
                        document.vicidial_form.consultativexfer.checked = false;
                        $('#PresetsSelectBox').removeClass('hidden');
                        $('#xfer_buttons').removeClass('hidden');
                        xfer_select_agents_active = 0;
                        xfer_agent_selected = 0;
                        $('#QuickXfer').html('<a href="#" class="btn btn-info  btn-shadow" title="Dial And Hangup" onclick="mainxfer_send_redirect(\'XfeRBLIND\',\'SIP/M3ST-00000c71\',\'\',\'\',\'\',\'0\',\'YES\');return false;"><i class="fa fa-blind"></i></a>');
                        break;
                    case 'Number':
                        document.vicidial_form.consultativexfer.checked = false;
                        $('#xfer_number').removeClass('hidden');
                        $('#xfer_buttons').removeClass('hidden');
                        $('#xfernumber').val('');
                        xfer_select_agents_active = 0;
                        xfer_agent_selected = 0;
                        $('#QuickXfer').html('<a href="#" class="btn btn-info  btn-shadow" title="Dial And Hangup" onclick="mainxfer_send_redirect(\'XfeRBLIND\',\'SIP/M3ST-00000c71\',\'\',\'\',\'\',\'0\',\'YES\');return false;"><i class="fa fa-blind"></i></a>');
                        break;
                    default:
                        $('.xfer_div').addClass('hidden');
                        $('#xfer_buttons').addClass('hidden');
                        xfer_select_agents_active = 0;
                        xfer_agent_selected = 0;
                        $('#XfeRGrouP').val('').change();
                        $('#AgentXferViewSelect').val('').change();
                        $('#xfernumber').val('').change();
                        $('.XfeRPreset').val('').change();
                        $('#QuickXfer').html('<a href="#" class="btn btn-info  btn-shadow" title="Dial And Hangup" onclick="mainxfer_send_redirect(\'XfeRBLIND\',\'SIP/M3ST-00000c71\',\'\',\'\',\'\',\'0\',\'YES\');return false;"><i class="fa fa-blind"></i></a>');

                }
            }

            function NewPresetSelect_submit(t) {
                var preset_array = t.split("|");
                PresetSelect_submit(preset_array[0], preset_array[1], preset_array[2], preset_array[3], "N");
            }

//            $(document).on('click', '#WebFormSpan a', function (e) {
//                e.preventDefault();
//                e.stopPropagation();
//                var URLsrc = $(this).attr('href');
//                $('#WebformONCall iframe').css('height', (screen.height + 100));
//                $('#WebformONCall iframe').attr('src', URLsrc);
//            });
//
//            $(document).on('click', '#WebForm-Display', function () {
//                $('#AgentWebFormView').toggle();
//                $('#AgentDetailView').toggle();
//
//                var WebPhoneView = $('#AgentWebFormView').css("display");
//                var AgentView = $('#AgentDetailView').css("display");
//                if (WebPhoneView == 'flex') {
//                    $('#WebForm-Display').text('Agent View');
//                }
//                if (AgentView == 'flex') {
//                    $('#WebForm-Display').text('WebForm View');
//                }
//
//            });


            $(document).on('change', '#XfeRType', function () {
                $('.TypeSelection').hide();
                var t = $(this).val();
                $('.' + t + '-Selection').show();
                switch (t) {
                    case 'Group':

                        break;
                    case 'Agent':
                        XferAgentSelectLaunch();
                        break;
                    case 'Preset':
                        generate_presets_pulldown();
                        break;
                    case 'Number':

                        break;
                    default:

                }
            });

//        $('#LogoutBTN').trigger('click');

            $(document).on('click', '.dispoBTN', function () {
                $('.dispoBTN').addClass('btn-secondry');
                $('.dispoBTN').removeClass('btn-success');
                $(this).addClass('btn-success');
                $(this).removeClass('btn-secondary');
            });

            $(document).on('click', '.CallDial', function () {
                var phone = $(this).data('phone');
                $('#MDPhonENumbeR').val(phone);
                $('#MakeCallBTN').click();
            });

            $(document).on('click', '#HideDispoModal', function () {
                $('#DispoModal').show();
            });

            function AgentsXferSelect(AXuser, AXlocation) {
                button_click_log = button_click_log + "" + SQLdate + "-----AgentsXferSelect---" + AXuser + " " + AXlocation + "|";
                xfer_select_agents_active = 0;
                xfer_agent_selected = 1;
                if (AXuser == '0') {
                    xfer_agent_selected = 0;
                }
                document.vicidial_form.xfernumber.value = AXuser;
                $('#LocalCloser a').click();
            }

//    generate_presets_pulldown('YES');

            //$(".content").css("min-height", $(window).height());

            /*SET Interval*/
            setInterval(function () {

            }, 3000);


            function pauseCountdowntimer(end, newpausecode) {
                $('#CountTimer').html('<div id="countdown1"></div>');
                $('#countdown1').ClassyCountdown({
                    end: end,
                    now: '0',
                    labels: true,
                    style: {
                        element: "",
                        textResponsive: .5,
                        days: {
                            gauge: {
                                thickness: .06,
                                bgColor: "rgba(0,0,0,0.05)",
                                fgColor: "#1abc9c"
                            },
                            textCSS: 'font-family:\'Open Sans\'; font-size:15px; font-weight:400; color:#34495e;'
                        },
                        hours: {
                            gauge: {
                                thickness: .06,
                                bgColor: "rgba(0,0,0,0.05)",
                                fgColor: "red"
                            },
                            textCSS: 'font-family:\'Open Sans\'; font-size:15px; font-weight:400; color:#34495e;'
                        },
                        minutes: {
                            gauge: {
                                thickness: .06,
                                bgColor: "rgba(0,0,0,0.05)",
                                fgColor: "orange"
                            },
                            textCSS: 'font-family:\'Open Sans\'; font-size:15px; font-weight:400; color:#34495e;'
                        },
                        seconds: {
                            gauge: {
                                thickness: .06,
                                bgColor: "rgba(0,0,0,0.05)",
                                fgColor: "green"
                            },
                            textCSS: 'font-family:\'Open Sans\'; font-size:15px; font-weight:400; color:#34495e;'
                        }

                    },
                    onEndCallback: function () {
                        $('#CountTimer').html('<div class="alert alert-danger mt-4"><p>  <strong> Pause Code ! </strong> You have exceed your ' + newpausecode + ' break time limit. </p></div>');

                        console.log("Time out!");
                        var CampaignID = '<?php echo $VD_campaign; ?>';
                        $.ajax({
                        type: 'POST',
                        url: 'elements/pause.php?method=ExceedLimit',
                        data: {user: user,CampaignID:CampaignID},
                        success: function (data){
                            console.log(data);
                        }
                    });

                    }
                });
            }

            function CallCountUPtimer() {
                $('#CallCountUPTimer').html("<div id='countup' style='width:100%;'></div>");
                $('#countup').ClassyCountup({
                    end: '0',
                    now: '0',
                    labels: true,
                    style: {
                        element: "",
                        textResponsive: .5,
                        days: {
                            gauge: {
                                thickness: .06,
                                bgColor: "rgba(0,0,0,0.05)",
                                fgColor: "#1abc9c"
                            },
                            textCSS: 'font-family:\'Open Sans\'; font-size:15px; font-weight:400; color:#34495e;'
                        },
                        hours: {
                            gauge: {
                                thickness: .06,
                                bgColor: "rgba(0,0,0,0.05)",
                                fgColor: "red"
                            },
                            textCSS: 'font-family:\'Open Sans\'; font-size:15px; font-weight:400; color:#34495e;'
                        },
                        minutes: {
                            gauge: {
                                thickness: .06,
                                bgColor: "rgba(0,0,0,0.05)",
                                fgColor: "orange"
                            },
                            textCSS: 'font-family:\'Open Sans\'; font-size:15px; font-weight:400; color:#34495e;'
                        },
                        seconds: {
                            gauge: {
                                thickness: .06,
                                bgColor: "rgba(0,0,0,0.05)",
                                fgColor: "green"
                            },
                            textCSS: 'font-family:\'Open Sans\'; font-size:15px; font-weight:400; color:#34495e;'
                        }

                    },
                    onEndCallback: function () {
                        console.log("Time out!");
                    }
                });

                $('.ClassyCountdown-wrapper').css('width', '100%');
            }

//            $(document).ready(function(){
//
//                $('.WebformONCall').click(function(){
//                    $('#WebformONCall').show();
//                    $('.WebformONCall').hide();
//                    $('.LeadDetailONCall').show();
//                    $('#LeadDetailONCall').hide();
//
//                    var URLsrc = $('#WebFormSpan a').attr('href');
//                    $('#WebformONCall iframe').css('height', (screen.height + 100));
//                    $('#WebformONCall iframe').attr('src', URLsrc);
//
//                });
//
//                $('.LeadDetailONCall').click(function(){
//                     $('#LeadDetailONCall').show();
//                    $('.LeadDetailONCall').hide();
//                    $('.WebformONCall').show();
//                });
//
//            });


            $('.AgentOnlyCallbacks').click(function () {
                if (!$(this).hasClass('active')) {
                    $("#CallBackOnlyMe").prop("checked", true);
                } else {
                    $("#CallBackOnlyMe").prop("checked", false);
                }
            });

            $(document).ready(function () {
                $('#LeaderBoardStats').click(function () {
                    $.ajax({
                        type: 'POST',
                        url: 'elements/stats.php?method=GetLeaderBoards',
                        data: {user: user},
                        success: function (data)
                        {
//                            $('#LeaderBoardStats-Modal').modal('show');
                            $('.bs-example-modal-lg').modal('show');
                            $('#LeaderBoardPerformance-Section').html(data);
                            $('#LeaderBoardPerformance').DataTable();
                        }
                    });

                });

                $('.AgentCallStatusBTN').click(function(){
                    $('.AgentCallStatusBTN').removeClass('active');
                    $(this).addClass('active');
                    var CallTitle = $(this).attr('title');

                    if(CallTitle == 'Put Lead on Hold'){
                         $.toast({
                            heading: CallTitle,
                            text: 'Your lead is on hold',
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            stack: 6
                        });
                        }else{
                    $.toast({
                            heading: CallTitle,
                            text: 'Your call is being transferred',
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            stack: 6
                        });
                    }
                });

            });





            $(document).on('click','.LeaInformation',function(){
                var LeadID = $(this).data('id');
                $('#LeaInformation').modal('show');
                $.ajax({
                        type: 'POST',
                        url: 'elements/ajax.php?method=GetLeaderBoards',
                        data: {rule:'LeadInformation',LeadID:LeadID},
                        success: function (data)
                        {
                            $('#LeaInformation').find('.modal-body').html(data);
                        }
                    });
            });




            $(document).on('click','.WebFormLink',function(){
               var LinkSRC = $(this).attr('link-src');
               if(LinkSRC == 'placed'){
//                   console.log('PLACED');
                }else{
//                    console.log('PLACED OK');
                    $(this).attr('link-src','placed');
                     var URLsrc = $('#WebFormSpan a').attr('href');
                     $('#WebformONCall iframe').attr('src', URLsrc);
                     $('#WebformONCall iframe').css('height', (screen.height + 100));
               }
            });
            </script>

    </body>
</html>
