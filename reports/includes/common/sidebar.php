<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <!-- sidebar menu-->
        <?php if (!empty($_SESSION['CurrentLogin']['user']) && in_array($_SESSION['CurrentLogin']['user'], ['SEO0038','SEO0039'])) { ?>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview" title="View Agent Reports.">
                    <a href="#">
                        <i class="fa fa-lg fa-users icon text-red2"></i>
                    </a>
                    <ul class="treeview-menu text-red2">
                        <li><a href="<?php echo base_url('outbound/summary') ?>"><i class=""></i>Outbound Summary</a></li>
                        <li><a href="<?php echo base_url('outbound/status') ?>"><i class=""></i>Outbound Status</a></li>
                        <li><a href="<?php echo base_url('outbound/verticals') ?>"><i class=""></i>Outbound Status Vertical</a></li>
                        <li><a href="<?php echo base_url('inbound/summary') ?>"><i class=""></i>Inbound Summary</a></li>
                        <li><a href="<?php echo base_url('inbound/status'); ?>"><i class=""></i>Inbound Status</a></li>
                        <li><a href="<?php echo base_url('inbound/verticals'); ?>"><i class=""></i>Inbound Status Vertical</a></li>
                        <!--Combined Report **********START********-->
                        <li><a href="<?php echo base_url('agent/summary') ?>"><i class=""></i>Combined Summary</a></li>
                        <li><a href="<?php echo base_url('agent/status') ?>"><i class=""></i>Combined Status</a></li>
                        <li><a href="<?php echo base_url('agent/performance') ?>"><i class=""></i>Performance</a></li>
                        <li><a href="<?php echo base_url('agent/time') ?>"><i class=""></i>Time</a></li>
                        <li><a href="<?php echo base_url('agent/pause') ?>"><i class=""></i>Pause</a></li>
                        <li><a href="<?php echo base_url('agent/login_logout') ?>"><i class=""></i>Login/Logout</a></li>
                        <li><a href="<?php echo base_url('agent/login_logout_breakdown') ?>"><i class=""></i>Login/Logout Breakdown</a></li>
                        <!--<li><a href="<?php echo base_url('agent/hours') ?>"><i class=""></i>Hour Summary</a></li>-->
                        <li><a href="<?php echo base_url('agent/hour_call_outbound') ?>"><i class=""></i>Hour Calls Outbound</a></li>
                        <li><a href="<?php echo base_url('agent/hour_talk') ?>"><i class=""></i>Hour Talk</a></li>
                        <li><a href="<?php echo base_url('agent/hour_pause') ?>"><i class=""></i>Hour Pause</a></li>
                        <li><a href="<?php echo base_url('agent/hour_wait') ?>"><i class=""></i>Hour Wait</a></li>
                        <li><a href="<?php echo base_url('agent/hour_wrap') ?>"><i class=""></i>Hour Wrap</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-lg fa-headphones text-red2" title="Call Recordings"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('call/recordings'); ?>"><i class=""></i>Call Recordings</a></li>
                        <li><a href="<?php echo base_url('call/recording_comment'); ?>"><i class=""></i>Call Recording Comments</a></li>
                    </ul>
                </li>
            </ul>

        <?php } else { ?>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview" title="View Agent Reports.">
                    <a href="#">
                        <i class="fa fa-lg fa-users icon text-red2"></i>
                    </a>
                    <ul class="treeview-menu text-red2">
                        <li><a href="<?php echo base_url('outbound/summary') ?>"><i class=""></i>Outbound Summary</a></li>
                        <li><a href="<?php echo base_url('outbound/status') ?>"><i class=""></i>Outbound Status</a></li>
                        <li><a href="<?php echo base_url('outbound/verticals') ?>"><i class=""></i>Outbound Status Vertical</a></li>
                        <li><a href="<?php echo base_url('inbound/summary') ?>"><i class=""></i>Inbound Summary</a></li>
                        <li><a href="<?php echo base_url('inbound/status'); ?>"><i class=""></i>Inbound Status</a></li>
                        <li><a href="<?php echo base_url('inbound/verticals'); ?>"><i class=""></i>Inbound Status Vertical</a></li>
                        <!--Combined Report **********START********-->
                        <li><a href="<?php echo base_url('agent/summary') ?>"><i class=""></i>Combined Summary</a></li>
                        <li><a href="<?php echo base_url('agent/status') ?>"><i class=""></i>Combined Status</a></li>
                        <li><a href="<?php echo base_url('agent/performance') ?>"><i class=""></i>Performance</a></li>
                        <li><a href="<?php echo base_url('agent/time') ?>"><i class=""></i>Time</a></li>
                        <li><a href="<?php echo base_url('agent/pause') ?>"><i class=""></i>Pause</a></li>
                        <li><a href="<?php echo base_url('agent/login_logout') ?>"><i class=""></i>Login/Logout</a></li>
                        <li><a href="<?php echo base_url('agent/login_logout_breakdown') ?>"><i class=""></i>Login/Logout Breakdown</a></li>
                        <!--<li><a href="<?php echo base_url('agent/hours') ?>"><i class=""></i>Hour Summary</a></li>-->
                        <li><a href="<?php echo base_url('agent/hour_call_outbound') ?>"><i class=""></i>Hour Calls Outbound</a></li>
                        <li><a href="<?php echo base_url('agent/hour_talk') ?>"><i class=""></i>Hour Talk</a></li>
                        <li><a href="<?php echo base_url('agent/hour_pause') ?>"><i class=""></i>Hour Pause</a></li>
                        <li><a href="<?php echo base_url('agent/hour_wait') ?>"><i class=""></i>Hour Wait</a></li>
                        <li><a href="<?php echo base_url('agent/hour_wrap') ?>"><i class=""></i>Hour Wrap</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-lg fa-list-alt text-red2" title="View Campaign Reports."></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('campaigns/outbound_summary'); ?>"><i class=""></i>Outbound Summary</a></li>
                        <li><a href="<?php echo base_url('campaigns/outbound_status'); ?>"><i class=""></i>Outbound Status</a></li>
                        <li><a href="<?php echo base_url('campaigns/inbound_summary'); ?>"><i class=""></i>Inbound Summary</a></li>
                        <li><a href="<?php echo base_url('campaigns/inbound_status'); ?>"><i class=""></i>Inbound Status</a></li>
                        <li><a href="<?php echo base_url('campaigns/combined_summary'); ?>"><i class=""></i>Combined Summary</a></li>
                        <li><a href="<?php echo base_url('campaigns/combined_status'); ?>"><i class=""></i>Combined Status</a></li>
                        <li><a href="<?php echo base_url('campaigns/time'); ?>"><i class=""></i>Time</a></li>
                        <li><a href="<?php echo base_url('campaigns/pause'); ?>"><i class=""></i>Pause</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-lg fa-history text-red2" title="View Log Reports."></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('inbound/call_logs') ?>"><i class="fa fa-arrow-down"></i>Inbound Logs</a></li>
                        <li><a href="<?php echo base_url('outbound/call_logs') ?>"><i class="fa fa-arrow-up"></i>Outbound Logs</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-lg fa-database text-red2" title="View Data Reports."></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('data/outbound_summary'); ?>"><i class=""></i>Outbound Summary</a></li>
                        <li><a href="<?php echo base_url('data/inbound_summary'); ?>"><i class=""></i>Inbound Summary</a></li>
                        <li><a href="<?php echo base_url('data/combined_summary'); ?>"><i class=""></i>Combined Summary</a></li>
                        <li><a href="<?php echo base_url('data/outbound_status'); ?>"><i class=""></i>Outbound Status</a></li>
                        <li><a href="<?php echo base_url('data/inbound_status'); ?>"><i class=""></i>Inbound Status</a></li>
                        <li><a href="<?php echo base_url('data/combined_status'); ?>"><i class=""></i>Combined Status</a></li>
                        <li><a href="<?php echo base_url('data/outbound_time'); ?>"><i class=""></i>Outbound Time</a></li>
                        <li><a href="<?php echo base_url('data/hour_breakdown'); ?>"><i class=""></i>Hour Breakdown</a></li>
                        <li><a href="<?php echo base_url('data/penetration'); ?>"><i class=""></i>Data Penetration</a></li>
                        <li><a href="<?php echo base_url('data/contents'); ?>"><i class=""></i>Data Contents</a></li>
                        <!--<li><a href="<?php echo base_url('data/source_outbound_summary'); ?>"><i class=""></i>Source Outbound Summary</a></li>-->
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-lg fa-headphones text-red2" title="Call Recordings"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('call/recordings'); ?>"><i class=""></i>Call Recordings</a></li>
                        <li><a href="<?php echo base_url('call/recording_comment'); ?>"><i class=""></i>Call Recording Comments</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="<?php echo base_url('email') ?>">
                        <i class="fa fa-lg fa-send text-red2" title="Auto Email Report"></i>
                    </a>
                </li>
                <?php if (!empty($_SESSION['CurrentLogin']['License']['CHAT']) && $_SESSION['CurrentLogin']['License']['CHAT'] == 'Active' || $_SESSION['CurrentLogin']['user_group'] == 'ADMIN') { ?>
                    <li class="">
                        <a href="<?php echo base_url('chat/conversation') ?>">
                            <i class="fa fa-lg fa-comments-o text-red2" title="Chat Report"></i>
                        </a>
                    </li>
                <?php } ?>
                <?php if (!empty($_SESSION['CurrentLogin']['License']['EMAIL']) && $_SESSION['CurrentLogin']['License']['EMAIL'] == 'Active' || $_SESSION['CurrentLogin']['user_group'] == 'ADMIN') { ?>
                    <li class="">
                        <a href="<?php echo base_url('email/listings') ?>">
                            <i class="fa fa-lg fa-envelope text-red2" title="Email Report"></i>
                        </a>
                    </li>
                <?php } ?>


                <li class="">
                    <a href="<?php echo base_url('sale') ?>">
                        <i class="fa fa-lg fa-shopping-bag text-red2" title="Sale Report"></i>
                    </a>
                </li>


                <!--            <li class="">
                                <a href="<?php echo base_url('script') ?>">
                                    <i class="fa fa-lg fa-list-alt text-red2" title="Script Report"></i>
                                </a>
                            </li>-->
                <?php if (!empty($_SESSION['CurrentLogin']['user_group']) && in_array($_SESSION['CurrentLogin']['user_group'], ['ADMIN', 'SEOBIRD'])) { ?>
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-lg fa-list-alt text-red2" title="Script Report"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url('script') ?>"><i class="fa fa-tasks"></i>SEOBIRD</a></li>
                            <li><a href="<?php echo base_url('script/sky_seo') ?>"><i class="fa fa-tasks"></i>SKY SEO</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-lg fa-wrench text-red2" title="Utility Report"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('utility/help') ?>"><i class="fa fa-question-circle"></i>Help Page</a></li>
                        <li><a href="<?php echo base_url('utility/server') ?>"><i class="fa fa-server"></i>Server Page</a></li>
                        <li><a href="<?php echo base_url('utility/dial_log') ?>"><i class="fa fa-calculator"></i>Dial Log Report</a></li>
                        <li><a href="<?php echo base_url('utility/carrier_log') ?>"><i class="fa fa-building"></i>Carrier Log Report</a></li>
                    </ul>
                </li>
            </ul>
        <?php } ?>

    </section>
</aside>
