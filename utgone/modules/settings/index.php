<div class="content-wrapper" style="min-height: 621.921px;">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <!-- /.box-header -->

                    <div class="box-header with-border custom-box-tab ">
                        <h3 class="box-title"><a href="#" class="box-icon"><i class="fa fa-cog"></i></a> <span class="cam-name">System Settings</span></h3>
                        <!-- nav tab-->
                        <ul class="nav nav-tabs justify-content-end pull-right" role="tablist">
                            <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#tabDashboard" role="tab" aria-selected="true" title="Carrier Settings"><span class="fa fa-level-up"></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabSetting" role="tab" aria-selected="false" title="System Setting"><span class="fa fa-gears"></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabPauseCode" data-pop="popover" title="Server Setting" data-content="Manage the pause code for this campaign" role="tab" data-original-title="Server Setting" aria-selected="false"><span class="fa fa-server"></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabOutNum" role="tab" aria-selected="false" title="Settings Containers"><span class="fa fa-database"></span></a> </li>

                        </ul>
                    </div>

                    <div class="box-body">
                        <!-- Nav tabs -->


                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active show" id="tabDashboard" role="tabpanel">
                               
                               <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-book"></span>Carrier Accounts</div>
                            <ul class="nav panel-tabs">
                                <li><a href="" data-toggle="modal" data-target="#bs-example-modal-lg"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>
                                <li style="margin-bottom:10px"><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example3" class="table table-bordered table-striped" style="width:100%">
                                <thead class="bg-success">
                                    <tr>

                                        <th>Carrier Name</th>
                                        <th>User Group</th>
                                        <th>String</th>
                                        <th>Protocol</th>
                                        <th>Server IP</th>
                                        <th>Active</th>
                                       <th class="text-center"  data-orderable="false">Action</th>

                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
<script>
$(function () {
        "use strict";
        var dt = $('#example3').DataTable({
            destroy: true,
            "bprocessing": true,
            "bserverSide": true,

            "aaSorting": [[1, 'asc']],
            "ajax": {
                "url": '<?php echo base_url('settings/ajax')?>?action=GetCarrier',
                "type": "POST",
            },

            "columns": [
                {"data": "carrier_name"},
                {"data": "user_group"},
                {"data": "registration_string"},
                {"data": "protocol"},
                {"data": "server_ip"},
                {"data": "active"},
                {"data": "Action"}
            ]

        });
    })

</script>


                        </div>
                    </div>
                    <!-- /.box-body -->
                    <!--                    <div class="box-footer">
                                            Footer
                                        </div>-->
                    <!-- /.box-footer-->
                </div>
                            </div>
                            <div class="tab-pane" id="tabSetting" role="tabpanel">
                                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-book"></span>System setting</div>
                            <ul class="nav panel-tabs">
                                <li><a href="" data-toggle="modal" data-target="#bs-example-modal-lg"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>
                                <li style="margin-bottom:10px"><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                            </ul>

                        </div>
                    </div>
                     <div class="box-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped" style="width:100%">
                                <thead class="bg-success">
                                    <tr>

                                        <th>Sound Web Server</th>
                                        <th>Sounds Web Directory</th>
                                        <th>Active Voicemail Server</th>
                                        <th>Webphone URL</th>
                                        <th>Auto Dial Limit</th>
                                        <th>Version</th>
                                       <th class="text-center"  data-orderable="false">Action</th>

                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
<script>
$(function () {
        "use strict";
        var dt = $('#example2').DataTable({
            destroy: true,
            "bprocessing": true,
            "bserverSide": true,

            "aaSorting": [[1, 'asc']],
            "ajax": {
                "url": '<?php echo base_url('settings/ajax')?>?action=GetSettings',
                "type": "POST",
            },

            "columns": [
                {"data": "sounds_web_server"},
                {"data": "sounds_web_directory"},
                {"data": "active_voicemail_server"},
                {"data": "webphone_url"},
                {"data": "auto_dial_limit"},
                {"data": "version"},
                {"data": "Action"}
            ]

        });
    })

</script>


                        </div>
                    </div>
                    <!-- /.box-body -->
                    <!--                    <div class="box-footer">
                                            Footer
                                        </div>-->
                    <!-- /.box-footer-->
                </div>
                                <style type="text/css">
                                    .setting-tabs>li {
                                        margin-bottom: 0px !important;
                                        margin-right: 0px !important;
                                        border: 1px solid #ddd;
                                    }
                                    .nav-tabs-custom>.nav-tabs>li a.active {
                                        border-bottom: none;
                                    }
                                </style>
                                <div class="row">
                                    <div class="col-12 col-lg-6 col-md-6">

                                        
                                    </div>
                                </div>

                                <style type="text/css">
                                    .custom-file-input{
                                        display:none;
                                    }
                                </style>
                            </div>
                           
                            <div class="tab-pane" id="tabPauseCode" role="tabpanel">
                                 <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-book"></span>Server Setting</div>
                            <ul class="nav panel-tabs">
                                <li><a href="" data-toggle="modal" data-target="#bs-example-modal-lg"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>
                                <li style="margin-bottom:10px"><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped" style="width:100%">
                                <thead class="bg-success">
                                    <tr>

                                        <th>Server ID</th>
                                        <th>Name</th>
                                        <th>Server IP</th>
                                        <th>Asterisk</th>
                                        <th>Trunks</th>
                                        <th>GMT</th>
                                        <th>active</th>
                                        <th class="text-center"  data-orderable="false">Action</th>

                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
<script>
$(function () {
        "use strict";
        var dt = $('#example').DataTable({
            destroy: true,
            "bprocessing": true,
            "bserverSide": true,

            "aaSorting": [[1, 'asc']],
            "ajax": {
                "url": '<?php echo base_url('settings/ajax')?>?action=GetServer',
                "type": "POST",
            },

            "columns": [
                {"data": "server_id"},
                {"data": "server_description"},
                {"data": "server_ip"},
                {"data": "asterisk_version"},
                {"data": "max_vicidial_trunks"},
                {"data": "local_gmt"},
                {"data": "active"},
                {"data": "Action"}
            ]

        });
    })

</script>



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
                            <div class="tab-pane" id="tabOutNum" role="tabpanel">
                                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-book"></span>Settings Containers</div>
                            <ul class="nav panel-tabs">
                                <li><a href="" data-toggle="modal" data-target="#bs-example-modal-lg"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>
                                <li style="margin-bottom:10px"><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                <thead class="bg-success">
                                    <tr>

                                        <th>Container ID</th>
                                        <th>Notes</th>
                                        <th>Type</th>
                                        <th>Length</th>
                                        <th>Admin Group</th>
                                       <th class="text-center"  data-orderable="false">Action</th>

                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>



                        </div>
                    </div>
                                    <script>
    $(function () {
        "use strict";
        var dt = $('#example1').DataTable({
            destroy: true,
            "bprocessing": true,
            "bserverSide": true,

            "aaSorting": [[1, 'asc']],
            "ajax": {
                "url": '<?php echo base_url('settings/ajax')?>?action=GetContainer',
                "type": "POST",
            },

            "columns": [
                {"data": "container_id"},
                {"data": "container_notes"},
                {"data": "container_type"},
                {"data": "container_entry"},
               {"data": "user_group"},
               {"data": "Action"}
            ]

        });
    })

</script>
                    <!-- /.box-body -->
                    <!--                    <div class="box-footer">
                                            Footer
                                        </div>-->
                    <!-- /.box-footer-->
                </div>

                            </div>
                            
                        </div>
                                
                            
                            <!-- nav tab-->
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </section>
    <!-- /.content -->
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>



   
    
                                
                           