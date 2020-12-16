<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header nav-small-cap">PERSONAL</li>
            <?php if(checkRole('campaigns', 'any')): ?>
            <li class="treeview" title="Create campaigns and manage via these settins.">
                <a href="#">
                    <i class="fa fa fa-lg fa-list-alt icon text-red2"></i>
                </a>
                <ul class="treeview-menu text-red2">
                    <?php if(checkRole('campaigns', 'create')): ?>
                    <li><a href="<?php echo base_url('campaigns/create')?>"><i class=""></i>Create</a></li>
                    <?php endif;?>
                    <?php if(checkRole('campaigns', 'view')): ?>
                    <li><a href="<?php echo base_url('campaigns')?>"><i class=""></i>Manage</a></li>
                    <?php endif;?>
                    <?php if(checkRole('campaigns', 'view')): ?>
                    <li><a href="<?php echo base_url('campaigns/dial_queue')?>"><i class=""></i>Dial Queue</a></li>
                    <li><a href="<?php echo base_url('campaigns/dial_strategies')?>"><i class=""></i>Dial Strategies</a></li>
                    <?php endif;?>
                </ul>
            </li>
            <?php endif;?>
            <?php if(checkRole('data', 'any')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lg fa-database text-red2"
                        title="Create data-lists, load data, setup data movement rules and search your data for unique leads."></i>
                </a>
                <ul class="treeview-menu">
                    <?php if(checkRole('data', 'create')): ?>
                    <li><a href="<?php echo base_url('data/create')?>"><i class=""></i>Create</a></li>
                    <?php endif;?>
                    <?php if(checkRole('data', 'view')): ?>
                    <li><a href="<?php echo base_url('data')?>"><i class=""></i>Manage</a></li>
                    <?php endif;?>
                    <?php if(checkRole('data', 'create') || checkRole('data', 'edit')): ?>
                    <li><a href="<?php echo base_url('data/data')?>"><i class=""></i>Load Data</a></li>
                    <li><a href="<?php echo base_url('data/single')?>"><i class=""></i>Load Single Record</a></li>
                    <?php endif;?>

                    <?php if(checkRole('data', 'view')): ?>
                    <li><a href="<?php echo base_url('data/search')?>"><i class=""></i>Data Search</a></li>
                    <?php endif;?>
                    <?php if(checkRole('data', 'view')): ?>
                    <li><a href="<?php echo base_url('data/download')?>"><i class=""></i>Recording Download</a></li>
                    <?php endif;?>

                </ul>
            </li>
            <?php endif;?>
            <?php if(checkRole('users', 'any')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lg fa-user text-red2"
                        title="Create user, manage callbacks, manage agent settings."></i>
                </a>
                <ul class="treeview-menu">
                    <?php if(checkRole('users', 'create')): ?>
                    <li><a href="<?php echo base_url('users/create')?>"><i class=""></i>Create</a></li>
                    <?php endif;?>
                    <?php if(checkRole('users', 'view')): ?>
                    <li><a href="<?php echo base_url('users')?>"><i class=""></i>Manage</a></li>
                    <?php endif;?>
                    <?php if(checkRole('users', 'create')): ?>
                    <li><a href="<?php echo base_url('users/access_roles')?>"><i class=""></i>User Access Roles</a></li>
                    <?php endif;?>
                    <?php if(checkRole('users', 'view')): ?>
                    <li><a href="<?php echo base_url('users/callback')?>"><i class=""></i>Manage Callback</a></li>
                    <?php endif;?>
                </ul>
            </li>
            <?php endif;?>
            <?php if(checkRole('teams', 'any')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lg fa-group text-red2"
                        title="Create teams, manage settings from each team including security rules."></i>
                </a>
                <ul class="treeview-menu">
                    <?php if(checkRole('teams', 'create')): ?>
                    <li><a href="<?php echo base_url('teams/create')?>"><i class=""></i>Create</a></li>
                    <?php endif;?>
                    <?php if(checkRole('teams', 'view')): ?>
                    <li><a href="<?php echo base_url('teams')?>"><i class=""></i>Manage</a></li>
                    <?php endif ;?>
                </ul>
            </li>
            <?php endif;?>
            <?php if(checkRole('inbound_groups', 'any')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lg fa-arrow-down text-red2" title="Create inbound groups, numbers and VIR's."></i>
                </a>
                <ul class="treeview-menu">
                    <?php if(checkRole('inbound_groups', 'create')): ?>
                    <li><a href="<?php echo base_url('inbound_groups/create')?>"><i class=""></i>Number Create</a></li>
                    <?php endif;?>
                    <?php if(checkRole('inbound_groups', 'view')): ?>
                    <li><a href="<?php echo base_url('inbound_groups')?>"><i class=""></i>Number Manage</a></li>
                    <?php endif;?>
                    <?php if(checkRole('inbound_groups', 'create')): ?>
                    <li><a href="<?php echo base_url('inbound_groups/group_create')?>"><i class=""></i>Group Create</a></li>
                    <?php endif;?>
                    <?php if(checkRole('inbound_groups', 'view')): ?>
                    <li><a href="<?php echo base_url('inbound_groups/groups')?>"><i class=""></i>Group Manage</a></li>
                    <?php endif;?>
                    <?php if(checkRole('inbound_groups', 'create')): ?>
                    <li><a href="<?php echo base_url('inbound_groups/ivr_create')?>"><i class=""></i>IVR Create</a></li>
                    <?php endif;?>
                    <?php if(checkRole('inbound_groups', 'view')): ?>
                    <li><a href="<?php echo base_url('inbound_groups/ivrs')?>"><i class=""></i>IVR Manage</a></li>
                    <?php endif;?>
                </ul>
            </li>
            <?php endif;?>
            <?php if(checkRole('email', 'any')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope text-red2" title="Manage Email and Chat platform."></i>
                </a>
                <ul class="treeview-menu">
                    <?php if(checkRole('email', 'view')): ?>
                    <li><a href="<?php echo base_url('email/create')?>"><i class=""></i>New Templates</a></li>
                    <?php endif;?>
                    <?php if(checkRole('email', 'view')): ?>
                    <li><a href="<?php echo base_url('email')?>"><i class=""></i>Email Message Templates</a></li>
                    <?php endif;?>
                    <?php if(checkRole('email', 'view')): ?>
                    <li><a href="<?php echo base_url('email/routines')?>"><i class=""></i>Email Routines</a></li>
                    <?php endif;?>
                    <?php if(checkRole('email', 'view')): ?>
                    <li><a href="<?php echo base_url('email/queues')?>"><i class=""></i>Email Client Queue</a></li>
                    <?php endif;?>
                    <?php if(checkRole('email', 'view')): ?>
                    <li><a href="<?php echo base_url('email/queue_manage')?>"><i class=""></i>Email Manager Queue</a></li>
                    <?php endif;?>
                    <?php if(checkRole('email', 'view')): ?>
                    <li><a href="<?php echo base_url('email/sent')?>"><i class=""></i>Email Sent</a></li>
                    <?php endif;?>
                </ul>
            </li>
            <?php endif;?>
            <?php if(checkRole('sms', 'any')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-comments text-red2" title="Manage SMS platform"></i>
                </a>
                <ul class="treeview-menu">
                    <?php if(checkRole('sms', 'view')): ?>
                    <li><a href="<?php echo base_url('sms')?>"><i class=""></i>SMS Message Templates</a></li>
                    <li><a href="<?php echo base_url('sms/routines')?>"><i class=""></i>SMS Routines</a></li>
                    <li><a href="<?php echo base_url('sms/live_queue')?>"><i class=""></i>SMS Live Queue</a></li>
                    <li><a href="<?php echo base_url('sms/sent')?>"><i class=""></i>SMS Sent</a></li>
                    <li><a href="<?php echo base_url('sms/received')?>"><i class=""></i>Received</a></li>
                    <li><a href="<?php echo base_url('sms/accounts')?>"><i class=""></i>Accounts</a></li>
                    <?php endif;?>
                </ul>
            </li>
            <?php endif;?>
            <?php if(checkRole('settings', 'any')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lg fa-wrench text-red2"
                        title="Manage system settings, phones, calltimes, carriers, DNC and statuses."></i>
                </a>
                <ul class="treeview-menu">
                    <?php if(checkRole('settings', 'view')): ?>
                    <li><a href="<?php echo base_url('settings/call_time_create')?>"><i class=""></i>Call Times Create</a></li>
                    <li><a href="<?php echo base_url('settings/call_times')?>"><i class=""></i>Call Times Manage</a></li>
                    <li><a href="<?php echo base_url('settings/phone_create')?>"><i class=""></i>Phones Create</a></li>
                    <li><a href="<?php echo base_url('settings/phones')?>"><i class=""></i>Phones Manage</a></li>
                    <li><a href="<?php echo base_url('settings/audio_files')?>"><i class=""></i>Manage Audio Files</a></li>
                    <li><a href="<?php echo base_url('settings/dnc')?>"><i class=""></i>Manage DNC</a></li>
                    <li><a href="<?php echo base_url('settings/smtps')?>"><i class=""></i>Manage SMTP</a></li>
                    <li><a href="<?php echo base_url('settings/system_statues')?>"><i class=""></i>System Statuses</a></li>
                    <li><a href="<?php echo base_url('settings/admin_logs')?>"><i class=""></i>Admin Logs</a></li>
                    <?php endif;?>
                </ul>
            </li>
            <?php endif;?>
            <?php if(checkRole('settings', 'any')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lg fa fa-gear text-red2"
                        title="Manage Carrier."></i>
                </a>
                <ul class="treeview-menu">
                    <?php if(checkRole('settings', 'view')): ?>
                    <li><a href="<?php echo base_url('carrier')?>"><i class=""></i>Carrier</a></li>
                    <?php endif;?>
                </ul>
            </li>
            <?php endif;?>
        </ul>
    </section>
</aside>
