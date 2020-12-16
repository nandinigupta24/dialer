<?php
if (!checkRole('settings', 'view')) {
    no_permission();
} else {
    ?>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-book"></span>Manage System Statuses</div>
                                <ul class="nav panel-tabs">
                                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>Status ID</th>
                                            <th>Status Description</th>
                                            <th>Status Type</th>
                                            <th>Selectable</th>
                                            <th>Connect</th>
                                            <th>DMC</th>
                                            <th>Sale</th>
                                            <th>NI</th>
                                            <th>CallBack</th>
                                            <th>Completed</th>
                                            <th>Un-Workable</th>
                                            <th>DNC</th>
                                            <th class="text-center"  data-orderable="false">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        $(function () {
            "use strict";
            var dt = $('#table-list-campaigns').DataTable({
                destroy: true,
                "bprocessing": true,
                "bserverSide": true,

                "aaSorting": [[1, 'asc']],
                "ajax": {
                    "url": '<?php echo base_url('system/ajax') ?>?action=GetStatuses',
                    "type": "POST",
                },

                "columns": [
                    {"data": "status"},
                    {"data": "status_name"},
                    {"data": "status_type"},
                    {"data": "selectable"},
                    {"data": "human_answered"},
                    {"data": "customer_contact"},
                    {"data": "sale"},
                    {"data": "not_interested"},
                    {"data": "scheduled_callback"},
                    {"data": "completed"},
                    {"data": "unworkable"},
                    {"data": "dnc"},
                    {"data": "Action"},
                ],

            });
        })
        
        $(document).on('click','.SystemStatus',function(){
            var StatusID = $(this).data('id'); 
            var StatusColumn = $(this).data('column'); 
            if($(this).hasClass('active')){
                var value = 'Y';
            }else{
                var value = 'N';
            }
            
            
            $.ajax({
                type: 'post',
                url: '<?php echo base_url('system/ajax') ?>?action=UpdateStatuses',
                data: {StatusID:StatusID,value:value,StatusColumn:StatusColumn},
                success: function (data) {
//                    alert(data);
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'System Status Setting',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            });
        });
        
        
        
        $(document).on('change','input,select',function(){
           var Name = $(this).attr('name');
           var ID = $(this).data('id');
           var Value = $(this).val();
           
           $.ajax({
                type: 'post',
                url: '<?php echo base_url('system/ajax') ?>?action=UpdateStatuses',
                data: {StatusID:ID,value:Value,StatusColumn:Name},
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'System Status Setting',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            });
        });
        
        
        $(document).on('click','.System-Status',function(){
            var value = $(this).data('id');
            $.ajax({
                type: 'post',
                url: '<?php echo base_url('system/ajax') ?>?action=RemoveStatuses',
                data: {StatusID:value},
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'System Status Setting',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            });
        });
    </script>
<?php } ?>
