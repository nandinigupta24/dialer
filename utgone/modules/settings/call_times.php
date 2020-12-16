<?php if(!checkRole('settings', 'view')){ no_permission(); } else {?>
    <style>
    .range-slider { -webkit-appearance: none; width: 100%; height: 8px; border-radius: 5px; background: #d3d3d3; outline: none; opacity: 0.7; -webkit-transition: .2s; transition: opacity .2s; } .range-slider:hover { opacity: 1; } .range-slider::-webkit-slider-thumb { -webkit-appearance: none; appearance: none; width: 12px; height: 12px; border-radius: 50%; background: #2196F3; cursor: pointer; } th{ font-size: 13px !important; font-weight: 700 !important; } .range-slider::-moz-range-thumb { width: 12px; height: 12px; border-radius: 50%; background: #2196F3; cursor: pointer; }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--    <section class="content-header">
        <h1>
            Call Time Management

        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active">Manage Call Time</li>
        </ol>
    </section>-->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-list"></span>All Call Times</div>
                            <!--<ul class="nav panel-tabs">
                                <li class="mr10">Show All Lists</li>
                                <li>
                                    <button type="button" class="btn btn-sm btn-toggle SwitchBTNList" data-toggle="button" aria-pressed="false" autocomplete="off">
                                        <div class="handle"></div>
                                    </button>
                                </li>
                                <li><a href="javascript:void(0);" class="Refresh-Table"><i class="fa fa-refresh"></i></a></li>

                            </ul>-->
                        </div>
                        </p>

                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="table-list-calls" class="table table-bordered table-striped" style="width:100%">
                                <thead class="bg-success">
                                    <tr>
                                        <th>Call Time Id</th>
                                        <th>Call Time Name</th>
                                        <th>Call Time Default Start</th>
                                        <th>Call Time Default End</th>
                                        <th class="text-center"  data-orderable="false">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>



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
    </section>
</div>
<script>
    $(function () {
        "use strict";
        var dt = $('#table-list-calls').DataTable({
//            destroy: true,
            bprocessing: true,
            bserverSide: true,
            aaSorting: [[1, 'asc']],
            ajax: {
                url: '<?php echo base_url('settings/ajax')?>?action=listing',
                type: "POST",
            },
            columns: [
                {data: "call_time_id"},
                {data: "call_time_name"},
                {data: "ct_default_start"},
                {data: "ct_default_stop"},
                {data: "Action"},
            ],

        });



        $('.search-input-text').on('change', function () {   // for text boxes
            var i = $(this).attr('data-column');  // getting column index
            var v = $(this).val();  // getting search input value
            dt.columns(i).search(v).draw();
        });

    });

    $(document).on('click','.callRemove',function(){
        var id =  $(this).attr('data-id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this Data List!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('settings/ajax')?>?action=delete',
                    data: {id:id}, // serializes the form's elements.
                    success: function(data)
                    {
                        var result = JSON.parse(data);
                        if(result.success === 1){
                            $('#table-list-calls').DataTable().ajax.reload();
                            swal("Deleted!", "Your Data List has been deleted.", "success");
                        }else{
                            swal("Deleted!", "Your Data List has been deleted.", "success");
                        }
                    }
                  });

            } else {
                swal("Cancelled", "Your Data List is safe :)", "error");
            }
        });
    });


</script>
<?php } ?>
