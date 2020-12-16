ListRemove<?php if(!checkRole('data', 'view')){ no_permission(); } else {?>
 <style>
    .range-slider {
        -webkit-appearance: none;
        width: 100%;
        height: 8px;
        border-radius: 5px;
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
    }

    .range-slider:hover {
        opacity: 1;
    }

    .range-slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #2196F3;
        cursor: pointer;
    }
    th{
        font-size: 13px !important;
        font-weight: 700 !important;
    }

    .range-slider::-moz-range-thumb {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #2196F3;
        cursor: pointer;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--    <section class="content-header">
        <h1>
            Data List

        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </section>-->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-list"></span>List Listings</div>
                            <ul class="nav panel-tabs">
                                <li class="mr10">Show All Lists</li>
                                <li>
                                    <button type="button" class="btn btn-sm btn-toggle SwitchBTNList" data-toggle="button" aria-pressed="false" autocomplete="off">
                                        <div class="handle"></div>
                                    </button>
                                </li>
                                <li><a href="javascript:void(0);" class="Refresh-Table" onclick="window.location.reload()"><i class="fa fa-refresh"></i></a></li>

                            </ul>
                        </div>
                        </p>

                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                <thead class="bg-success">
                                    <tr>
                                        <th>ID</th>
                                        <th>List Name</th>
                                        <th data-orderable="false">List Description</th>
                                        <th data-orderable="false">Campaign</th>
                                        <th data-orderable="false">Total</th>
                                        <th data-orderable="false">Available</th>
                                        <th>Queued</th>
                                        <th>Reset Count</th>
                                        <th>Dupe Count</th>
                                        <th>Archive</th>
                                        <th>TPS</th>
                                        <th>Active</th>
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
<link href="../assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<script src="../assets/vendor_components/sweetalert/sweetalert.min.js"></script>
<script>
    $(function () {
        "use strict";
        var dt = $('#table-list-campaigns').DataTable({
//            destroy: true,
            bprocessing: true,
            bserverSide: true,
            aaSorting: [[1, 'asc']],
            ajax: {
                url: '<?php echo base_url('data/ajax')?>?rule=listing',
                type: "POST",
            },
            columns: [
                {data: "list_id"},
                {data: "list_name"},
                {data: "list_description"},
                {data: "campaign_id"},
                {data: "Total"},
                {data: "Available"},
                {data: "Queued"},
                {data: "ResetCount"},
                {data: "DupeCount"},
                {data: "Archive"},
                {data: "TPS"},
                {data: "active"},
                {data: "Action"},
            ],

        });



        $('.search-input-text').on('change', function () {   // for text boxes
            var i = $(this).attr('data-column');  // getting column index
            var v = $(this).val();  // getting search input value
            dt.columns(i).search(v).draw();
        });

    });

    $(document).on('click', '.Refresh-Table', function () {
        $('#table-list-campaigns').DataTable().ajax.reload();
    });

    $(document).on('click', '.SwitchBTNList', function () {
       if($(this).hasClass('active')){
           var value = 'all';
       }else{
           var value = 'active';
       }

       var dt = $('#table-list-campaigns').DataTable({
            destroy: true,
            bprocessing: true,
            bserverSide: true,
            aaSorting: [[1, 'asc']],
            ajax: {
                url: '<?php echo base_url('data/ajax')?>?rule=listing&show='+value,
                type: "POST",
            },
            columns: [
                {data: "list_id"},
                {data: "list_name"},
                {data: "list_description"},
                {data: "campaign_id"},
                {data: "Total"},
                {data: "Available"},
                {data: "Queued"},
                {data: "ResetCount"},
                {data: "DupeCount"},
                {data: "Archive"},
                {data: "TPS"},
                {data: "active"},
                {data: "Action"},
            ],

        });
    });

    $(document).on('change','.CampaignSelection',function(){
       var CampaignID = $(this).val();
       var ListID = $(this).data('id');
       $.ajax({
           type: "POST",
           url: '<?php echo base_url('data/ajax')?>?rule=update',
           data: {field:'campaign_id',value:CampaignID,ListID:ListID}, // serializes the form's elements.
           success: function(data)
           {
               var result = JSON.parse(data);
                if(result.success === 1){
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
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
    });

    $(document).on('click','.SwitchListActive',function(){
        if($(this).hasClass('active')){
            var value = 'Y';
        }else{
            var value = 'N';
        }

       var ListID = $(this).data('id');
       $.ajax({
           type: "POST",
           url: '<?php echo base_url('data/ajax')?>?rule=update',
           data: {field:'active',value:value,ListID:ListID}, // serializes the form's elements.
           success: function(data)
           {
               var result = JSON.parse(data);
                if(result.success === 1){
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
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
    });
    $(document).on('click','.ListRemove',function(){
        var ListID = $(this).data('id');
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
                    url: '<?php echo base_url('data/ajax')?>?rule=delete',
                    data: {ListID:ListID}, // serializes the form's elements.
                    success: function(data)
                    {
                        var result = JSON.parse(data);
                        if(result.success === 1){
                            $('#table-list-campaigns').DataTable().ajax.reload();
                            swal("Deleted!", "Your Data List has been deleted.", "success");
                        }else{
                            swal("Deleted!", result.message, "success");
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
