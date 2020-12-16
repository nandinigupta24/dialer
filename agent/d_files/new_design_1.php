<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../assets/images/favicon.ico">
        <title>Fab Admin - Dashboard  Profile</title>
        <!-- Bootstrap 4.0-->
        <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Bootstrap extend-->
        <link rel="stylesheet" href="../assets/css/agent-bootstrap-extend.css">
        <link rel="stylesheet" href="../assets/vendor_components/bootstrap-switch/switch.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../assets/css/agent-master-style.css">
        <!-- Fab Admin skins -->
        <link rel="stylesheet" href="../assets/css/skins/_all-skins.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->
        <link href="../assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/vendor_components/morris.js/morris.css">
    </head>
    <body class="hold-transition skin-yellow sidebar-mini sidebar-collapse">
         <form name='vicidial_form' id='vicidial_form' onsubmit="return false;">
            <input type="hidden" name="extension" id="extension" />
            <input type="hidden" name="custom_field_values" id="custom_field_values" value="" />
            <input type="hidden" name="FORM_LOADED" id="FORM_LOADED" value="0" />
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="index.html" class="logo">
                    <!-- mini logo -->
                    <b class="logo-mini"> <span class="light-logo"><img src="../assets/images/logo-light.png" alt="logo"></span> <span class="dark-logo"><img src="../assets/images/logo-dark.png" alt="logo"></span> </b>
                    <!-- logo-->
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <div>
                        
                    </div>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages -->
                            <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="mdi mdi-email"></i> </a>
                                <ul class="dropdown-menu scale-up">
                                    <li class="header">You have 5 messages</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu inner-content-div">
                                            <li>
                                                <!-- start message -->
                                                <a href="#">
                                                    <div class="pull-left"> <img src="../assets/images/user2-160x160.jpg" class="rounded-circle" alt="User Image"> </div>
                                                    <div class="mail-contnet">
                                                        <h4> Lorem Ipsum <small><i class="fa fa-clock-o"></i> 15 mins</small> </h4>
                                                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span> </div>
                                                </a> </li>
                                            <!-- end message -->
                                            <li> <a href="#">
                                                    <div class="pull-left"> <img src="../assets/images/user3-128x128.jpg" class="rounded-circle" alt="User Image"> </div>
                                                    <div class="mail-contnet">
                                                        <h4> Nullam tempor <small><i class="fa fa-clock-o"></i> 4 hours</small> </h4>
                                                        <span>Curabitur facilisis erat quis metus congue viverra.</span> </div>
                                                </a> </li>
                                            <li> <a href="#">
                                                    <div class="pull-left"> <img src="../assets/images/user4-128x128.jpg" class="rounded-circle" alt="User Image"> </div>
                                                    <div class="mail-contnet">
                                                        <h4> Proin venenatis <small><i class="fa fa-clock-o"></i> Today</small> </h4>
                                                        <span>Vestibulum nec ligula nec quam sodales rutrum sed luctus.</span> </div>
                                                </a> </li>
                                            <li> <a href="#">
                                                    <div class="pull-left"> <img src="../assets/images/user3-128x128.jpg" class="rounded-circle" alt="User Image"> </div>
                                                    <div class="mail-contnet">
                                                        <h4> Praesent suscipit <small><i class="fa fa-clock-o"></i> Yesterday</small> </h4>
                                                        <span>Curabitur quis risus aliquet, luctus arcu nec, venenatis neque.</span> </div>
                                                </a> </li>
                                            <li> <a href="#">
                                                    <div class="pull-left"> <img src="../assets/images/user4-128x128.jpg" class="rounded-circle" alt="User Image"> </div>
                                                    <div class="mail-contnet">
                                                        <h4> Donec tempor <small><i class="fa fa-clock-o"></i> 2 days</small> </h4>
                                                        <span>Praesent vitae tellus eget nibh lacinia pretium.</span> </div>
                                                </a> </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">See all e-Mails</a></li>
                                </ul>
                            </li>
                            <!-- Notifications -->
                            <li class="dropdown notifications-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="mdi mdi-bell"></i> </a>
                                <ul class="dropdown-menu scale-up">
                                    <li class="header">You have 7 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu inner-content-div">
                                            <li> <a href="#"> <i class="fa fa-users text-aqua"></i> Curabitur id eros quis nunc suscipit blandit. </a> </li>
                                            <li> <a href="#"> <i class="fa fa-warning text-yellow"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere. </a> </li>
                                            <li> <a href="#"> <i class="fa fa-users text-red"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat. </a> </li>
                                            <li> <a href="#"> <i class="fa fa-shopping-cart text-green"></i> In gravida mauris et nisi </a> </li>
                                            <li> <a href="#"> <i class="fa fa-user text-red"></i> Praesent eu lacus in libero dictum fermentum. </a> </li>
                                            <li> <a href="#"> <i class="fa fa-user text-red"></i> Nunc fringilla lorem </a> </li>
                                            <li> <a href="#"> <i class="fa fa-user text-red"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet. </a> </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            <!-- Tasks-->
                            <li class="dropdown tasks-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="mdi mdi-message"></i> </a>
                                <ul class="dropdown-menu scale-up">
                                    <li class="header">You have 6 tasks</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu inner-content-div">
                                            <li>
                                                <!-- Task item -->
                                                <a href="#">
                                                    <h3> Lorem ipsum dolor sit amet <small class="pull-right">30%</small> </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-aqua" style="width: 30%" role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">30% Complete</span> </div>
                                                    </div>
                                                </a> </li>
                                            <!-- end task item -->
                                            <li>
                                                <!-- Task item -->
                                                <a href="#">
                                                    <h3> Vestibulum nec ligula <small class="pull-right">20%</small> </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-danger" style="width: 20%" role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">20% Complete</span> </div>
                                                    </div>
                                                </a> </li>
                                            <!-- end task item -->
                                            <li>
                                                <!-- Task item -->
                                                <a href="#">
                                                    <h3> Donec id leo ut ipsum <small class="pull-right">70%</small> </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-light-blue" style="width: 70%" role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">70% Complete</span> </div>
                                                    </div>
                                                </a> </li>
                                            <!-- end task item -->
                                            <li>
                                                <!-- Task item -->
                                                <a href="#">
                                                    <h3> Praesent vitae tellus <small class="pull-right">40%</small> </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-yellow" style="width: 40%" role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">40% Complete</span> </div>
                                                    </div>
                                                </a> </li>
                                            <!-- end task item -->
                                            <li>
                                                <!-- Task item -->
                                                <a href="#">
                                                    <h3> Nam varius sapien <small class="pull-right">80%</small> </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-red" style="width: 80%" role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">80% Complete</span> </div>
                                                    </div>
                                                </a> </li>
                                            <!-- end task item -->
                                            <li>
                                                <!-- Task item -->
                                                <a href="#">
                                                    <h3> Nunc fringilla <small class="pull-right">90%</small> </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-primary" style="width: 90%" role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">90% Complete</span> </div>
                                                    </div>
                                                </a> </li>
                                            <!-- end task item -->
                                        </ul>
                                    </li>
                                    <li class="footer"> <a href="#">View all tasks</a> </li>
                                </ul>
                            </li>
                            <!-- User Account-->
                            <li class="dropdown user user-menu">
                                <ul class="dropdown-menu scale-up">
                                    <!-- User image -->
                                    <li class="user-header"> <img src="../assets/images/user5-128x128.jpg" class="float-left rounded-circle" alt="User Image">
                                        <p> Juliya Brus <small class="mb-5">jb@gmail.com</small> <a href="#" class="btn btn-danger btn-sm btn-rounded">View Profile</a> </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="row no-gutters">
                                            <div class="col-12 text-left"> <a href="#"><i class="ion ion-person"></i> My Profile</a> </div>
                                            <div class="col-12 text-left"> <a href="#"><i class="ion ion-email-unread"></i> Inbox</a> </div>
                                            <div class="col-12 text-left"> <a href="#"><i class="ion ion-settings"></i> Setting</a> </div>
                                            <div role="separator" class="divider col-12"></div>
                                            <div class="col-12 text-left"> <a href="#"><i class="ti-settings"></i> Account Setting</a> </div>
                                            <div role="separator" class="divider col-12"></div>
                                            <div class="col-12 text-left"> <a href="#"><i class="fa fa-power-off"></i> Logout</a> </div>
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar" style="position:fixed">
                <!-- sidebar-->
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree" style="top:93px; position:absolute">
                    <li>&nbsp;</li>
                    <li class="treeview"> <a href="#" class="btn btn-success"> <i class="fa fa-play"></i> </a> </li>
                    <li>&nbsp;</li>
                    <li class="treeview"> <a href="#" class="btn btn-success"> <i class="fa fa-phone"></i> </a> </li>
                </ul>
                <ul class="sidebar-menu" data-widget="tree" style="bottom:0px; position:fixed">
                    <li class="treeview"> <a href="#" class="btn btn-success"> <i class="fa fa-microphone-slash"></i> </a> </li>
                    <li class="treeview"> <a href="#" class="btn btn-info"> <i class="fa fa-phone"></i> </a> </li>
                    <li class="treeview"> <a href="#" class="btn btn-warning"> <i class="fa fa-clock-o"></i> </a> </li>
                    <li class="treeview"> <a href="#" class="btn btn-success"> <i class="fa fa-users"></i> </a> </li>
                </ul>
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="box card-inverse bg-img" style="padding: 20px 0px 0px">
                            <div class="flexbox align-items-center py-20" data-overlay="4">
                                <div class="col-lg-7 col-md-7">
                                    <div class="align-items-center mr-auto" > <a href="#" class="left-float"> <img class="avatar avatar-xl avatar-bordered" src="../assets/images/avatar/4.jpg" alt=""> </a>
                                        <div class="pl-10 profile left-float">
                                            <h5 class="mb-0"><a class="hover-primary text-white" href="#">Roben Clark</a></h5>
                                            <span>Campaign 1001</span><br>
                                            <span>Team - Admin</span><br>
                                            <span>Phone - 9898</span> </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <ul class="flexbox flex-justified text-center profile">
                                                <li class="px-10"> <span class="font-size-14">XP</span><br>
                                                    <span class="font-size-10">0/1200</span> <span>
                                                        <input class="form-control" type="text" placeholder="">
                                                    </span> </li>
                                                <li class="pl-10"> <span class="font-size-14">Level 1</span><br>
                                                    <span class="font-size-10">0% Complete</span> <span>
                                                        <input class="form-control" type="text" placeholder="">
                                                    </span> </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <ul class="flexbox flex-justified text-center profile">
                                                <li class="px-10"> <span class="font-size-14">XP</span><br>
                                                    <span class="font-size-10">0/1200</span> <span>
                                                        <input class="form-control" type="text" placeholder="">
                                                    </span> </li>
                                                <li class="pl-10"> <span class="font-size-14">Level 1</span><br>
                                                    <span class="font-size-10">0% Complete</span> <span>
                                                        <input class="form-control" type="text" placeholder="">
                                                    </span> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12 col-lg-3">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title">Today's Overview</h4>
                                </div>
                                <div class="box-body">
                                    <div class="text-center py-20">
                                        <div class="donut" data-peity='{ "fill": ["#7460ee", "#26c6da", "#fc4b6c", "#ffb22b "], "radius": 108, "innerRadius": 50  }' >6,4,2,1</div>
                                    </div>
                                    <ul class="flexbox flex-justified text-center mt-20">
                                        <li class="br-1">
                                            <div class="font-size-20 text-primary">65%</div>
                                            <small class="font-size-12 text-fade">Talking</small> </li>
                                        <li class="br-1">
                                            <div class="font-size-20 text-success">40%</div>
                                            <small class="font-size-12 text-fade">Pause</small> </li>
                                        <li>
                                            <div class="font-size-20 text-danger">20%</div>
                                            <small class="font-size-12 text-fade">Waiting</small> </li>
                                        <li>
                                            <div class="font-size-20 text-warning">10%</div>
                                            <small class="font-size-12 text-fade">Wrap</small> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-12" style="margin-top:-65px">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><span class="fa fa-pie-chart"></span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home2" role="tab"><span class="fa  fa-credit-card-alt"></span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home1" role="tabpanel">
                                    <div class="pt-10 mr-10" align="right"><span type="button" class="btn btn-medium btn-toggle btn-info active" data-toggle="button" aria-pressed="true" autocomplete="off">
                                            <div class="handle"></div>
                                        </span> Average Stats</div>
                                    <div class="pad">
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="box box-body">
                                                    <h6 class="text-uppercase">Online</h6>
                                                    <div class="flexbox mt-2"> <span class="fa fa-phone text-danger font-size-40"></span> <span class=" font-size-30">553</span> </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="box box-body">
                                                    <h6 class="text-uppercase">Talking</h6>
                                                    <div class="flexbox mt-2"> <span class="fa fa-user text-info font-size-40"></span> <span class=" font-size-30">4105</span> </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                            <!-- fix for small devices only -->
                                            <div class="clearfix visible-sm-block"></div>
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="box box-body">
                                                    <h6 class="text-uppercase">Waiting</h6>
                                                    <div class="flexbox mt-2"> <span class="fa fa-clock-o font-size-40 text-primary"></span> <span class=" font-size-30">1250</span> </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="box box-body">
                                                    <h6 class="text-uppercase">Paused</h6>
                                                    <div class="flexbox mt-2"> <span class="fa fa-pause font-size-40 text-success"></span> <span class=" font-size-30">2150</span> </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="box box-body">
                                                    <h6 class="text-uppercase">Online</h6>
                                                    <div class="flexbox mt-2"> <span class="fa fa-phone text-danger font-size-40"></span> <span class=" font-size-30">553</span> </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="box box-body">
                                                    <h6 class="text-uppercase">Talking</h6>
                                                    <div class="flexbox mt-2"> <span class="fa fa-user-plus text-info font-size-40"></span> <span class=" font-size-30">4105</span> </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                            <!-- fix for small devices only -->
                                            <div class="clearfix visible-sm-block"></div>
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="box box-body">
                                                    <h6 class="text-uppercase">Waiting</h6>
                                                    <div class="flexbox mt-2"> <span class="fa fa-user-secret font-size-40 text-primary"></span> <span class=" font-size-30">1250</span> </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="box box-body">
                                                    <h6 class="text-uppercase">Paused</h6>
                                                    <div class="flexbox mt-2"> <span class="fa fa-shopping-cart font-size-40 text-success"></span> <span class=" font-size-30">2150</span> </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.nav-tabs-custom -->



                        </div>
                        <!-- /.col -->
                    </div>

                    <p>Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
                    <p>Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
                    <p>Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
                    <p>Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
                    <p>Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
                    <p>Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
                    <p>Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua. Duis aute irure dolor reprehenderit in voluptate fugiat nulla pariatur excepteur sint qui officia deserunt molanim idesa laborum ullamco laboris aliquip laboris nisi ut aliquip ex onsequat prehenderit in voluptate sed ipsum velit dolore aliquasit amet consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!--SCRIPT POPup START-->
            
            
            <!--SCRIPT POPup END-->
            <footer class="main-footer">
                <div class="pull-right d-none d-sm-inline-block">
                    <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                        <li class="nav-item"> <a class="nav-link" href="javascript:void(0)">FAQ</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#">Purchase Now</a> </li>
                    </ul>
                </div>
                &copy; <?php echo date('Y');?> <a href="https://usethegeeks.com/" target="_blank">UseTheGeeks</a>. All Rights Reserved. </footer>
            
        </div>
            <span style="position:fixed;left:0px;top:0px;height:100%;width:100%;background-color:#e9e9e9; z-index:99999;"  id="LoadingBox" class="page-loader-wrapper"> 
                    <table border="0" width="100%" height="" style="margin-left: auto;margin-right: auto;">
                       <tr>
                           <td align="center" valign="top">
                           <div style="margin-top:20%">
                               <div class="preloader pl-size-xl">
                                   <div class="spinner-layer pl-red">
                                       <div class="circle-clipper left">
                                           <div class="circle"></div>
                                       </div>
                                       <div class="circle-clipper right">
                                           <div class="circle"></div>
                                       </div>
                                   </div>
                               </div>
                               <h3>Loading Please wait...</h3>
                           </div>
                   </td>
                       </tr>
                   </table>
            </span>
<div class="overlay"></div>
<?php require_once('d_files/modal.php');?>
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
        <!-- ./wrapper -->
        <!-- jQuery 3 -->
        
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
        
        
    </body>
</html>
