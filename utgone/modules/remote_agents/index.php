<?php if(!checkRole('remote_agents', 'view')){ no_permission(); } else { ?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
              <div class="panel-title"> <span class="fa fa-book"></span>Remote Agents</div>
                <ul class="nav panel-tabs">
                    <li class="ResetTable"><a href="javascript:void(0);" onclick="window.location.reload();"><i class="fa fa-refresh" title="Refersh"></i></a></li>
                </ul>
            </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="list-selection" class="table table-bordered table-striped" style="width:100%">
                                <thead class="bg-success">
                                    <tr>

                                        <th>User</th>
                                        <th>Lines</th>
                                        <th>Server</th>
                                        <th>CONF-EXTEN</th>
                                        <th>Group</th>
                                        <th>Status</th>
                                        <th>Campaign</th>
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
<link href="../assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<script src="../assets/vendor_components/sweetalert/sweetalert.min.js"></script>
<script>
$(function () {
        "use strict";
    var dt = $('#list-selection').DataTable({
            destroy: true,
            "bprocessing": true,
                              "bserverSide": true,

                              "aaSorting": [[1,'asc']],
                              "ajax": {
                                          "url":'<?php echo base_url('remote_agents/ajax')?>?rule=listing',
                                           "type": "POST",
                                      },

                              "columns": [
                                      { "data": "user_start" },
                                      { "data": "number_of_lines"},
                                      { "data": "server_ip"},
                                      { "data": "conf_exten"},
                                      { "data": "extension_group"},
                                      { "data": "status"},
                                      { "data": "campaign_id"},
                                      {"mRender": function (data, type, row) {
                                        var url = '<?php echo base_url('remote_agents/edit') ?>';
                                              return '<a class="btn btn-app btn-success" href="'+url+'?user='+row.remote_agent_id+'"><i class="fa fa-arrow-right" title="Manage"></i></a>'+
                                              '<a href="javascript:void(0);" class="btn btn-app btn-danger UserRemove" data-id="'+row.remote_agent_id+'"><i class="fa fa-times" title="Remove"></i></a>';
                                      }},
                              ],

        });
    })




function AjaxMethod(Method,URL,data){
    $.ajax({
           type: Method,
           url: URL,
           data: data, // serializes the form's elements.
           success: function(data)
           {
               var result = JSON.parse(data);
                if(result.success === 1){
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'info',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }else{
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
           }
         });
}



$(document).on('click','.SwitchStatusBTN',function(){
    if($(this).hasClass('active')){
        var value = 'Y';
    }else{
        var value = 'N';
    }
    var UserID = $(this).data('id');
    var data = {field:'active',value:value,userID:UserID};
    AjaxMethod('POST','<?php echo base_url('users/ajax')?>?rule=update',data);
});


$(document).on('change','.TeamUpdate',function(){
    var value  = $(this).val();
    var UserID = $(this).data('id');
    var data = {field:'user_group',value:value,userID:UserID};
    AjaxMethod('POST','<?php echo base_url('users/ajax')?>?rule=update',data);
});

$(document).on('click','.UserRemove',function(){
    var UserID = $(this).data('id');
    var data = {userID:UserID};
    swal({
            title: "Are you sure?",
            text: "You will not be able to recover this user!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
                AjaxMethod('POST','<?php echo base_url('remote_agents/ajax')?>?rule=delete',data);
//                swal("Deleted!", "Your Data List has been deleted.", "success");
            } else {
                swal("Cancelled", "This user is safe :)", "error");
            }
        });
});


$(document).on('click','.ResetTable',function(){
  $('#list-selection').DataTable().ajax.reload();
});


$(document).on('click','.ForceLogout',function(){
   var UserID = $(this).data('id');
   swal({
            title: "Are you sure?",
            text: "Agent will be Logout!!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Logout it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    type:'POST',
                    url: '<?php echo base_url('users/ajax')?>?method=ForceLogout',
                    data:{UserID:UserID}, // serializes the form's elements.
                    success: function(data)
                    {
                        var result = JSON.parse(data);
                        if(result.status == 'error'){
                             $.toast({
                                    heading: 'Welcome To UTG Dialer',
                                    text: result.message,
                                    position: 'top-right',
                                    loaderBg: '#ff6849',
                                    icon: 'error',
                                    hideAfter: 3500,
                                    showHideTransition: 'plain',
                                });

                        }else{
                             $.toast({
                                    heading: 'Welcome To UTG Dialer',
                                    text: result.message,
                                    position: 'top-right',
                                    loaderBg: '#ff6849',
                                    icon: 'success',
                                    hideAfter: 3500,
                                    showHideTransition: 'plain',
                                });
                        }
                    }
                  });
            }
        });
});

</script>
<?php } ?>
