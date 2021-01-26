<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Top Bar-->
<header class="main-header">
    <!-- Logo -->
    <a href="javascript:void(0);" class="logo">
        <!-- mini logo -->
        <b class="logo-mini">
            <span class="light-logo list-style"><img src="<?php echo publicAssest();?>assets/images/logonew.png" alt="logo" style="margin-top:8px;"></span>
            <span class="dark-logo list-style"><img src="<?php echo publicAssest();?>assets/images/logonew.png" alt="logo"></span>
        </b>
        <!-- logo-->
        <span class="logo-lg list-style">
            <!--<img src="<?php echo publicAssest();?>assets/images/logo-light-text.png" alt="logo" class="light-logo">-->
            <!--<img src="<?php echo publicAssest();?>assets/images/logo-dark-text.png" alt="logo" class="dark-logo">-->
        </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <div>
        </div>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown-toggle1 list-style" title="Agent"><a href="/agent" target="_blank"><i
                            class="fa fa-phone text-green3"></i></a>
                </li>
                <?php if(!empty($_SESSION['CurrentLogin']['view_reports']) && $_SESSION['CurrentLogin']['view_reports'] == 1){?>
                <li class="dropdown-toggle1 list-style" title="Reports"><a href="<?php echo base_url_reports('reports/outbound/summary')?>" target="_blank"><i
                            class="fa fa-bar-chart text-blue3"></i></a>
                </li>
                <?php }?>
                <li class="dropdown-toggle1 list-style" title="Realtime Reports"><a href="<?php echo base_url_reports('reports/realtime')?>" target="_blank"><i
                            class="fa fa-pie-chart text-red2"></i></a> </li>
                <li class="dropdown-toggle1 list-style" title="Support Dashboard"><a
                        href="https://utgone.zendesk.com/hc/en-us" target="_blank"><i
                            class="fa fa-life-ring text-red2"></i></a> </li>
                <!-- User Account-->
                <li class="dropdown user user-menu list-style">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span style="background-color: #4eb598;font-size: 15px;border-radius: 28px;padding: 10px;font-weight:600;"><?php echo initials($_SESSION['CurrentLogin']['full_name']);?></span>
                    </a>
                    <ul class="dropdown-menu scale-up" style="font-weight:600;">
                        <li>
                            <div class="flexbox align-items-center">
                <img class="avatar avatar-lg" src="https://img.icons8.com/plasticine/2x/user.png" alt="...">
                <div class="text-right">
                  <h6 class="mb-0"><?php echo $_SESSION['CurrentLogin']['full_name'];?></h6>
                  <small><?php echo $_SESSION['CurrentLogin']['user_group'];?></small>
                </div>
              </div>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row no-gutters">
                                <div class="col-12 text-left">
                                    <a href="#" class="lock_screen"><i class="ion ion-person"></i> Lock Screen</a>
                                </div>
                                <div class="col-12 text-left">
                                    <a href="<?php echo base_url('logout')?>"><i class="fa fa-power-off"></i> Logout</a>
                                </div>
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
