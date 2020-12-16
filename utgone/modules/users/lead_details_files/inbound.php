<div class="col-md-12">
    <div class="panel panel-visible formtabs" id="AllFormsTab">
        <div class="panel-heading">
            <div class="panel-title"> <span class="fa fa-book"></span>Inbound Callbacks for this lead</div>
            <ul class="nav panel-tabs">

            </ul>
        </div>
        <div class="panel-body pbn">
             <?php $InboundData = $database->select('vicidial_closer_log', '*',['lead_id'=>$leadID]); ?>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="TableInbound">
                        <thead class="bg-success">
                            <tr>
                                <th>Date/Time</th>
                                <th>Agent</th>
                                <th>Call Length(seconds)</th>
                                <th>Campaign</th>
                                <th>List</th>
                                <th>Number Dialled</th>
                                <th>Hangup Reason</th>
                                <th data-orderable="false">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($InboundData as $inbound) { ?>
                                <tr>
                                    <td><?php echo $inbound['call_date']; ?></td>
                                    <td><?php echo $inbound['user']; ?></td>
                                    <td><?php echo $inbound['length_in_sec']; ?></td>
                                    <td><?php echo $inbound['campaign_id']; ?></td>
                                    <td><?php echo $inbound['list_id']; ?></td>
                                    <td><?php echo $inbound['phone_number']; ?></td>
                                    <td><?php echo $inbound['term_reason']; ?></td>
                                    <td>
                                        <select name="Status" class="form-control InboundStatusUpdate" data-id="<?php echo $inbound['closecallid'];?>">
                                                <?php foreach ($StatusListings as $statusData) { ?>
                                                    <option value="<?php echo $statusData['status']; ?>" <?php echo ($inbound['status'] == $statusData['status']) ? 'selected="selected"' : '';?>><?php echo $statusData['status_name']; ?></option>
                                                <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#TableInbound').DataTable();

    $(document).on('change','.InboundStatusUpdate',function(){
       var formValue = $(this).val();
       var formId = $(this).data('id');
       $.ajax({
           type: "POST",
           url: '<?php echo base_url('users/ajax')?>?rule=leadInboundUpdate',
           data: {formId:formId,formValue:formValue}, // serializes the form's elements.
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
    </script>
