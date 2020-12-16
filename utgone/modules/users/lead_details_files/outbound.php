<div class="col-md-12">
    <div class="panel panel-visible formtabs" id="AllFormsTab">
        <div class="panel-heading">
            <div class="panel-title"> <span class="fa fa-book"></span>Outbound Calls to this Lead</div>
            <ul class="nav panel-tabs">

            </ul>
        </div>
        <div class="panel-body pbn">
        <?php $OutboundData = $database->select('vicidial_log', '*',['lead_id'=>$leadID]); ?>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="TableOutbound">
                        <thead class="bg-success">
                            <tr>
                                <th>Date/Time</th>
                                <th>Agent</th>
                                <th>Call Length(seconds)</th>
                                <th>Campaign</th>
                                <th>List</th>
                                <th>Number Dialled</th>
                                <th>Hangup Reason</th>
                                <th>Dial Type</th>
                                <th data-orderable="false">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($OutboundData as $outbound) { ?>
                                <tr>
                                    <td><?php echo $outbound['call_date']; ?></td>
                                    <td><?php echo $outbound['user']; ?></td>
                                    <td><?php echo $outbound['length_in_sec']; ?></td>
                                    <td><?php echo $outbound['campaign_id']; ?></td>
                                    <td><?php echo $outbound['list_id']; ?></td>
                                    <td><?php echo $outbound['phone_number']; ?></td>
                                    <td><?php echo $outbound['term_reason']; ?></td>
                                    <td><?php echo $outbound['alt_dial']; ?></td>
                                    <td>
                                        <select name="Status" class="form-control OutboundStatusUpdate" data-id="<?php echo $outbound['uniqueid'];?>">
                                            <option value="">Select Option</option>
                                                <?php foreach ($StatusListings as $statusData) { ?>
                                                    <option value="<?php echo $statusData['status']; ?>" <?php echo ($outbound['status'] == $statusData['status']) ? 'selected="selected"' : '';?>><?php echo $statusData['status_name']; ?></option>
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
    $('#TableOutbound').DataTable();

    $(document).on('change','.OutboundStatusUpdate',function(){
       var formValue = $(this).val();
       var formId = $(this).data('id');
       $.ajax({
           type: "POST",
           url: '<?php echo base_url('users/ajax')?>?rule=leadOutboundUpdate',
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
