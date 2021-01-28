<div class="modal-header bg-black">
    <h4 class="modal-title text-center">Setup New Email Report</h4>
</div>
<form method="post" action="" id="EmailReportEditForm">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
    <div class="modal-body bg-gray-light">

        <div class="form-group">
            <label>Name:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-barcode"></i>
                </div>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" required="" value="<?php echo $data['name']; ?>"/>
            </div>
            <!-- /.input group -->
        </div>

        <div class="form-group">
            <label>Description:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-pencil"></i>
                </div>
                <input type="text" class="form-control" name="description" placeholder="Enter Description" required="" value="<?php echo $data['description']; ?>"/>
            </div>
            <!-- /.input group -->
        </div>

        <div class="form-group">
            <label>Report:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-circle-o"></i>
                </div>
                <select class="form-control" name="report" required="">
                    <option value="">Select Report</option>
                    <optgroup label="Agent Reports">
                        <option value="agent_outbound_summary" <?php echo ($data['report'] == 'agent_outbound_summary') ? 'selected="selected"' : ''; ?>>Agent Outbound Summary</option>
                        <option value="agent_inbound_summary" <?php echo ($data['report'] == 'agent_inbound_summary') ? 'selected="selected"' : ''; ?>>Agent Inbound Summary</option>
                        <option value="agent_combined_summary" <?php echo ($data['report'] == 'agent_combined_summary') ? 'selected="selected"' : ''; ?>>Agent Combined Summary</option>

                        <option value="agent_outbound_disposition" <?php echo ($data['report'] == 'agent_outbound_disposition') ? 'selected="selected"' : ''; ?>>Agent Outbound Disposition</option>
                        <option value="agent_inbound_disposition" <?php echo ($data['report'] == 'agent_inbound_disposition') ? 'selected="selected"' : ''; ?>>Agent Inbound Disposition</option>
                        <option value="agent_combined_disposition" <?php echo ($data['report'] == 'agent_combined_disposition') ? 'selected="selected"' : ''; ?>>Agent Combined Disposition</option>
                        <option value="agent_outbound_vertical_disposition" <?php echo ($data['report'] == 'agent_outbound_vertical_disposition') ? 'selected="selected"' : ''; ?>>Agent Outbound Vertical Disposition</option>
                        <option value="agent_inbound_vertical_disposition" <?php echo ($data['report'] == 'agent_inbound_vertical_disposition') ? 'selected="selected"' : ''; ?>>Agent Inbound Vertical Disposition</option>

                        <option value="agent_performance" <?php echo ($data['report'] == 'agent_performance') ? 'selected="selected"' : ''; ?>>Agent Performance</option>

                        <option value="agent_time_summary" <?php echo ($data['report'] == 'agent_time_summary') ? 'selected="selected"' : ''; ?>>Agent Time Summary</option>
                        <option value="agent_pause_summary" <?php echo ($data['report'] == 'agent_pause_summary') ? 'selected="selected"' : ''; ?>>Agent Pause Summary</option>
                        <option value="agent_login_logout_summary" <?php echo ($data['report'] == 'agent_login_logout_summary') ? 'selected="selected"' : ''; ?>>Agent Login/Out Summary</option>
                        <!--<option value="agent_hour_summary" <?php echo ($data['report'] == 'agent_hour_summary') ? 'selected="selected"' : ''; ?>>Agent Hour Summary</option>-->
                        <!--<option value="agent_hour_breakdown_summary" <?php echo ($data['report'] == 'agent_hour_breakdown_summary') ? 'selected="selected"' : ''; ?>>Agent Hour Breakdown Summary</option>-->

                        <option value="agent_outbound_hourly_call" <?php echo ($data['report'] == 'agent_outbound_hourly_call') ? 'selected="selected"' : ''; ?>>Agent Outbound Hourly Call</option>
                        <option value="agent_talk_hour_report" <?php echo ($data['report'] == 'agent_talk_hour_report') ? 'selected="selected"' : ''; ?>>Agent Talk Hour Report</option>
                        <option value="agent_pause_hour_report" <?php echo ($data['report'] == 'agent_pause_hour_report') ? 'selected="selected"' : ''; ?>>Agent Pause Hour Report</option>
                        <option value="agent_wait_hour_report" <?php echo ($data['report'] == 'agent_wait_hour_report') ? 'selected="selected"' : ''; ?>>Agent Wait Hour Report</option>
                        <option value="agent_wrap_hour_report" <?php echo ($data['report'] == 'agent_wrap_hour_report') ? 'selected="selected"' : ''; ?>>Agent Wrap Hour Report</option>
                    </optgroup>
                    <optgroup label="Campaign Reports">
                        <option value="campaign_outbound_summary" <?php echo ($data['report'] == 'campaign_outbound_summary') ? 'selected="selected"' : ''; ?>>Campaign Outbound Summary</option>
                        <option value="campaign_inbound_summary" <?php echo ($data['report'] == 'campaign_inbound_summary') ? 'selected="selected"' : ''; ?>>Campaign Inbound Summary</option>
                        <option value="campaign_combined_summary" <?php echo ($data['report'] == 'campaign_combined_summary') ? 'selected="selected"' : ''; ?>>Campaign Combined Summary</option>
                        <option value="campaign_outbound_disposition" <?php echo ($data['report'] == 'campaign_outbound_disposition') ? 'selected="selected"' : ''; ?>>Campaign Outbound Disposition</option>
                        <option value="campaign_inbound_disposition" <?php echo ($data['report'] == 'campaign_inbound_disposition') ? 'selected="selected"' : ''; ?>>Campaign Inbound Disposition</option>
                        <option value="campaign_combined_disposition" <?php echo ($data['report'] == 'campaign_combined_disposition') ? 'selected="selected"' : ''; ?>>Campaign Combined Disposition</option>
                        <option value="campaign_time_summary" <?php echo ($data['report'] == 'campaign_time_summary') ? 'selected="selected"' : ''; ?>>Campaign Time Summary</option>
                        <option value="campaign_pause_summary" <?php echo ($data['report'] == 'campaign_pause_summary') ? 'selected="selected"' : ''; ?>>Campaign Pause Summary</option>
                    </optgroup>
                    <optgroup label="Data List Reports">
                        <<option value="list_outbound_summary" <?php echo ($data['report'] == 'list_outbound_summary') ? 'selected="selected"' : ''; ?>>List Outbound Summary</option>
                        <option value="list_inbound_summary" <?php echo ($data['report'] == 'list_inbound_summary') ? 'selected="selected"' : ''; ?>>List Inbound Summary</option>
                        <option value="list_combined_summary" <?php echo ($data['report'] == 'list_combined_summary') ? 'selected="selected"' : ''; ?>>List Combined Summary</option>
                        <option value="list_outbound_disposition" <?php echo ($data['report'] == 'list_outbound_disposition') ? 'selected="selected"' : ''; ?>>List Outbound Disposition</option>
                        <option value="list_inbound_disposition" <?php echo ($data['report'] == 'list_inbound_disposition') ? 'selected="selected"' : ''; ?>>List Inbound Disposition</option>
                        <option value="list_combined_disposition" <?php echo ($data['report'] == 'list_combined_disposition') ? 'selected="selected"' : ''; ?>>List Combined Disposition</option>
                        <option value="list_outbound_time" <?php echo ($data['report'] == 'list_outbound_time') ? 'selected="selected"' : ''; ?>>List Outbound Time</option>
                        <option value="list_hour_breakdown" <?php echo ($data['report'] == 'list_hour_breakdown') ? 'selected="selected"' : ''; ?>>List Hour Breakdown</option>
                        <option value="list_penetration_report" <?php echo ($data['report'] == 'list_penetration_report') ? 'selected="selected"' : ''; ?>>List Penetration Report</option>
                        <option value="list_content_report" <?php echo ($data['report'] == 'list_content_report') ? 'selected="selected"' : ''; ?>>List Content Report</option>
                    </optgroup>
                </select>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <label>Type:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-barcode"></i>
                </div>
                <select class="form-control" name="type">
                    <option value="daily" <?php echo ($data['type'] == 'daily') ? 'selected="selected"' : ''; ?>>Daily</option>
                    <option value="monday" <?php echo ($data['type'] == 'monday') ? 'selected="selected"' : ''; ?>>Monday</option>
                    <option value="tuesday" <?php echo ($data['type'] == 'tuesday') ? 'selected="selected"' : ''; ?>>Tuesday</option>
                    <option value="wednesday" <?php echo ($data['type'] == 'wednesday') ? 'selected="selected"' : ''; ?>>Wednesday</option>
                    <option value="thursday" <?php echo ($data['type'] == 'thursday') ? 'selected="selected"' : ''; ?>>Thursday</option>
                    <option value="friday" <?php echo ($data['type'] == 'friday') ? 'selected="selected"' : ''; ?>>Friday</option>
                    <option value="saturday" <?php echo ($data['type'] == 'saturday') ? 'selected="selected"' : ''; ?>>Saturday</option>
                    <option value="sunday" <?php echo ($data['type'] == 'sunday') ? 'selected="selected"' : ''; ?>>Sunday</option>
                     <option value="weekly" <?php echo ($data['type'] == 'weekly') ? 'selected="selected"' : ''; ?>>Weekly</option>
                    <option value="monthly" <?php echo ($data['type'] == 'monthly') ? 'selected="selected"' : ''; ?>>Monthly</option>
                    <!--<option value="week_to_date" <?php echo ($data['type'] == 'week_to_date') ? 'selected="selected"' : ''; ?>>Week To Date</option>-->
                    <!--<option value="month_to_date" <?php echo ($data['type'] == 'month_to_date') ? 'selected="selected"' : ''; ?>>Month To Date</option>-->
                </select>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <label>Time:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-barcode"></i>
                </div>
                <input type="time" class="form-control" name="email_time" value="<?php echo $data['email_time']; ?>"/>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <label>Recipients:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-circle-o"></i>
                </div>
                <input type="text" class="form-control" name="recipients" placeholder="Email address seprated by comma" required="" value="<?php echo $data['recipients']; ?>"/>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <label>Inc Weekends:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-circle-o"></i>
                </div>
                <select class="form-control" name="weekends">
                    <option value="yes" <?php echo ($data['weekends'] == 'yes') ? 'selected="selected"' : ''; ?>>Yes</option>
                    <option value="no" <?php echo ($data['weekends'] == 'no') ? 'selected="selected"' : ''; ?>>No</option>
                </select>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <label>Attachment Type</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-circle-o"></i>
                </div>
                <select class="form-control" name="attachment_type">
                    <option value="HTML" <?php echo ($data['attachment_type'] == 'HTML') ? 'selected="selected"' : ''; ?>>HTML</option>
                    <option value="CSV" <?php echo ($data['attachment_type'] == 'CSV') ? 'selected="selected"' : ''; ?>>CSV</option>
                </select>
            </div>
            <!-- /.input group -->
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary float-right">Update</button>
    </div>
</form>
