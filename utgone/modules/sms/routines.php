<?php if(!checkRole('sms', 'view')){ no_permission(); } else {?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-road"></span> Routines</div>
                            <ul class="nav panel-tabs">
                                <?php if(!checkRole('sms', 'add')) :?>
                                <li ><a href="<?php echo base_url('sms/routine_create')?>"><i class="fa fa-plus" title="Add Routine"></i></a></li>
                            <?php endif;?>
                                <li><a href="javascript:void(0);" onclick="refreshTableList()"><i class="fa fa-refresh" title="Refersh"></i></a></li>
                            </ul>
                        </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                <thead class="bg-success">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Routine Type</th>
                                        <th>Start Date</th>
                                        <th>Start Time</th>
                                        <th>Queued</th>
                                        <th>Sent Today</th>
                                        <th>Sent Total</th>
                                        <th>Active</th>
                                        <th class="text-center"  data-orderable="false">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
$(function () {
    "use strict";
    refreshTableList();
});

var refreshTableList = function(){
    var dt = $('#table-list-campaigns').DataTable({
            destroy: true,
                "bprocessing": true,
                "bserverSide": true,
                "aaSorting": [[1,'asc']],
                    "ajax": {
                        "url":'<?php echo base_url('sms/ajax')?>?action=GetSMSRoutine',
                        "type": "POST",
                    },
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "routine_type"},
                    { "data": "start_date"},
                    { "data": "start_time"},
                    { "data": "queued"},
                    { "data": "sent_today"},
                    { "data": "sent_total"},
                    {"data": "active"},
                    { "data": "action"},
                ],
    });
}
var deleteItem = function(item_id){
swal({
      title: "Are you sure?",
      text: "You will not be able to recover this routine!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#f00",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel please!",
      closeOnConfirm: false,
      closeOnCancel: false
  }, function(isConfirm){
      if (isConfirm) {
              $.post('<?php echo base_url('sms/ajax')?>?action=deleteRoutineById&id='+item_id, {}, function (resp) {
                  swal("Deleted!", "Your routine been deleted.", "success");
                  refreshTableList();
              });
      } else {
          swal("Cancelled", "Your routine data is safe :)", "error");
      }
  });
}

var changeItemStatus = function(elem){
       var item_id = $(elem).attr("data-id");
       var active = '';
       if ($(elem).hasClass('active')) {
           active = 'N';
       } else {
           active = 'Y';
       }
       
       $.ajax({
               type: "POST",
               url: '<?php echo base_url('sms/ajax')?>?action=SaveRoutine&id='+item_id,
               data: {active:active,id:item_id},
               success: function (data){
                   var result = JSON.parse(data);
                      $.toast({
                           heading: 'Updated',
                           text: result[0],
                           position: 'top-right',
                           loaderBg: '#ff6849',
                           icon: 'success',
                           hideAfter: 3500,
                           showHideTransition: 'plain',
                       });
               }
           });
   };
</script>
<?php } ?>
