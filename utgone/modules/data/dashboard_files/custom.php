<div class="col-sm-12" id="recycle_div">

    <div class="col-sm-6">
        <div class="panel">
            <div class="panel-heading"> <span class="panel-title"> <i class="fa fa-pause"></i> Custom Fields </span>
                <ul class="nav panel-tabs">
                    <li><a href="javascript:void(0);" title="Add New Field" id="AddCustom"><i class="fa fa-plus text-purple2"></i></a></li>
                </ul>
            </div>
            <div class="panel-body">

               
                <table class="table" id="custom_fields">
                    <thead>
                        <tr>
                            <th>Custom Fields</th>
                            <th>Read Only</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody >
                         <?php
                $CustomData = $database->get('custom_fields', '*', ['list_id' => $ListID]);
                if($CustomData) {
                $CustomData = array_filter($CustomData);
                unset($CustomData['list_id']);
                ?>
                        <?php foreach ($CustomData as $k => $v) { ?>
                            <tr data-column="<?php echo $k; ?>" id="<?php echo $k; ?>">
                                <td>
                                    <input type="text" name="<?php echo $k; ?>" class="form-control" value="<?php echo $v; ?>"/>
                                </td>
                                <td>  
     
                                </td>
                                <td>
                                        <a href="javascript:void(0);" class="btn  btn-xs btn-success btn-app BTNUpdate" ><i class="fa fa-check"></i></a>

                                        <a href="javascript:void(0);" class="btn  btn-xs btn-danger btn-app BTNRemove"><i class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                            <?php } ?>
                    </tbody>
                </table>
                        
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '#AddCustom', function () {
        
        $('#custom_fields tbody').append('<tr>' +
                '<td>' +
                '<input type="text" name="" class="form-control" value=""/>' +
                '</td>' +
                '<td></td>' +
                '<td>' +
                '<a href="javascript:void(0);" class="btn btn-xs btn-success btn-app NewCustomFieldAdd" ><i class="fa fa-check"></i></a>' +
                '<a href="javascript:void(0);" class="btn btn-xs btn-danger btn-app NewCustomFieldRemove" ><i class="fa fa-remove"></i></a>' +
                '</td>' +
                '</tr>');
    });

    $(document).on('click', '.NewCustomFieldRemove', function () {
        var RemoveField = $(this).parent().parent();
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this Custom Field!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                RemoveField.remove();
                swal("Deleted!", "Custom Field has been deleted.", "success");
            } else {
                swal("Cancelled", "Custom Field is safe :)", "error");
            }
        });
    });
    
    $(document).on('click','.BTNUpdate',function(){
       var FieldValue = $(this).parent().parent().find('input').val();
       var FieldColumn = $(this).parent().parent().data('column');
       var ListID = $('#list_id').val();
       $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('data/ajax')?>?rule=ListCustomUpdate',
                    data: {FieldValue:FieldValue,FieldColumn:FieldColumn,ListID:ListID},
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
                               
                        }
                    }
                  });
    });
    
    $(document).on('click','.BTNRemove',function(){
       var FieldValue = '';
       var FieldColumn = $(this).parent().parent().data('column');
       var SectionDiv = $(this).parent().parent();
       var ListID = $('#list_id').val();
       swal({
            title: "Are you sure?",
            text: "You will not be able to recover this Custom Field!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('data/ajax')?>?rule=ListCustomUpdate',
                    data: {FieldValue:FieldValue,FieldColumn:FieldColumn,ListID:ListID},
                    success: function(data)
                    {
                        var result = JSON.parse(data);
                        if(result.success === 1){
                            SectionDiv.remove();
                            swal("Deleted!", "Custom Field has been deleted.", "success");
                        }else{
                               
                        }
                    }
                  });
                
            } else {
                swal("Cancelled", "Custom Field is safe :)", "error");
            }
        });
       
    });
    $(document).on('click','.NewCustomFieldAdd',function(){
        var FieldValue = $(this).parent().parent().find('input').val();
        var ListID = $('#list_id').val();
        var SectionDiv = $(this).parent().parent();
       $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('data/ajax')?>?rule=ListCustomAdd',
                    data: {FieldValue:FieldValue,ListID:ListID},
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
                            SectionDiv.attr('data-column',result.data.Column);
                            SectionDiv.attr('id',result.data.Column);
                            SectionDiv.html('<td>' +
                                            '<input type="text" name="" class="form-control" value="'+result.data.Value+'"/>' +
                                            '</td>' +
                                            '<td></td>' +
                                            '<td>' +
                                            '<a href="javascript:void(0);" class="btn btn-xs btn-success btn-app BTNUpdate" ><i class="fa fa-check"></i></a>' +
                                            '<a href="javascript:void(0);" class="btn btn-xs btn-danger btn-app BTNRemove" ><i class="fa fa-remove"></i></a>' +
                                            '</td>');
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
    
    
</script>