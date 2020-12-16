<div class="row">
    <div class="col-12 col-lg-8 col-md-8">
        <div class="panel pn">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-pause"></i> Pause Code</span>
                <!-- nav tab-->
               <!--<ul class="nav nav-tabs justify-content-end pull-right" role="tablist">-->
                    <!--<li class="nav-item">-->
                    <a href="javascript:void(0);" class="text-success pull-right" style="padding:13px;" data-title="ADD Pause Code" data-campaign="<?php echo $CampaignID; ?>" id="addPauseCode">
                            <i class="fa fa-plus"></i>
                        </a>
                    <!--</li>-->

                <!--</ul>-->
            </div>
            <div class="panel-body pn">
                <div class="table-responsive">
                    <table id="table-list-campaigns" class="table table-bordered table-striped">
                        <thead class="bg-success">
                            <tr>
                                <th>Pause Code</th>
                                <th>Pause Description</th>
                                <th>Time (in miniutes)</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-pauseCode">
                            <?php $pcIndex = 0; ?>
                            <?php foreach ($pause_codes as $pc) { ?>
                                <tr id="trPauseCode-<?php echo $pcIndex; ?>" class="campaign-pauseCode pauseCode-<?php echo $data['campaign_id']; ?>">
                                    <td>
                                        <input type="text" name="pause_code" class="form-control" data-id="<?php echo $pc['pause_code']; ?>" value="<?php echo $pc['pause_code']; ?>">
                                    </td>
                                    <td>
                                        <input type="text" name="pause_code_name"  class="form-control" data-id="<?php echo $pc['pause_code']; ?>"  value="<?php echo $pc['pause_code_name']; ?>">
                                    </td>
                                    <td>
                                        <input type="text" name="pause_time"  class="form-control" data-id="<?php echo $pc['pause_code']; ?>"  value="<?php echo $pc['time_limit']; ?>">
                                    </td>
                                    <td>
                                        <button type="button" data-campaign="<?php echo $CampaignID; ?>" class="btn btn-app btn-sm btn-success CampaignPauseEdit" data-id="<?php echo $pc['id']; ?>"><i class="fa fa-check"></i></button>
                                        <button type="button" data-campaign="<?php echo $CampaignID; ?>"  class="btn btn-app btn-sm btn-danger CampaignPauseDelete" data-id="<?php echo $pc['id']; ?>"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                                <?php $pcIndex++; ?>
                            <?php } ?>
                        </tbody>
                        <tfoot id="tfootCreatePauseCode">
                                               <!-- <tr>
                                                       <td>
                                                               <input type="text" name="pause_code" id="pause_code" class="form-control create-pause-code" value="">
                                                       </td>
                                                       <td>
                                                               <input type="text" name="pause_code_name" id="pause_code_name" class="form-control create-pause-code">
                                                       </td>
                                                       <td>
                                                               <input type="text" name="pause_time" id="pause_time" class="form-control create-pause-code">
                                                       </td>
                                                       <td>
                                                               <div class="btn-group" role="group" ><button type="button" class="btn btn-sm btn-danger delete-campaign-pausecode"><i class="fa fa-times"></i></button></div>
                                                       </td>
                                               </tr> -->
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        "use strict";
        //Initialize Select2 Elements
//        $('.select2').select2();

        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': _token
            }
        });
        function pauseCodeReset() {
            var index = 1;
            $(".campaign-pauseCode").each(function (index) {
                $(this).attr('id', 'trPauseCode-' + index);
                index++;
            });
            var index = 1;
            $(".pause_code_class").each(function (index) {
                $(this).attr('id', 'pause_code-' + index);
                $(this).attr('data-index', index);
                index++;
            });
            var index = 1;
            $(".pause_code_name_class").each(function (index) {
                $(this).attr('id', 'pause_code_name-' + index);
                $(this).attr('data-index', index);
                index++;
            });

            var index = 1;
            $(".pause_time_class").each(function (index) {
                $(this).attr('id', 'pause_time-' + index);
                $(this).attr('data-index', index);
                index++;
            });

            var index = 1;
            $(".delete-campaign-pausecode").each(function (index) {
                $(this).attr('data-index', index);
                $(this).attr('id', 'pause-delete-' + index);
                index++;
            });


        }

        $(document).on('click', '#addPauseCode', function (e) {
            e.preventDefault();
            var campaignId = $(this).attr('data-campaign');
            var pauseHtml = '<tr id="trPauseCode-1" class="campaign-pauseCode pauseCode-' + campaignId + '">'
                    + '<td><input type="text" name="pause_code" id="pause_code" class="form-control" value=""></td>'
                    + '<td><input type="text" name="pause_code_name" id="pause_code_name" class="form-control"></td>'
                    + '<td><input type="text" name="pause_time" id="pause_time" class="form-control"></td>'
                    + '<td>'
                    + '<button type="button" class="btn btn-app btn-sm btn-success CampaignPauseSave" data-campaign="' + campaignId + '"><i class="fa fa-check"></i></button>'
                    + '<button type="button" class="btn btn-app btn-sm btn-danger CampaignPauseDelete" data-campaign="' + campaignId + '"><i class="fa fa-times"></i></button>'
                    + '</td>'
                    + '</tr>';
            $('#tbody-pauseCode').append(pauseHtml);
            pauseCodeReset();
        });

        $(document).on('click', '.CampaignPauseSave', function (e) {
            var ParentSection = $(this).parent().parent();
            var code = ParentSection.find('input[name="pause_code"]').val();
            var name = ParentSection.find('input[name="pause_code_name"]').val();
            var time = ParentSection.find('input[name="pause_time"]').val();
            var campaign = $(this).data('campaign');
            if (code != '' && name !== '' && time != '') {

                var PauseDATA = {campaign: campaign, name: name, code: code, time: time}

                var attr = $(this).attr('data-id')
                if (typeof attr !== typeof undefined && attr !== false) {
                    var data_id = $(this).attr('data-id');
                    PauseDATA['data_id'] = data_id;
                }
                //console.log(xferData);
                $.post("<?php echo base_url('campaigns/ajax');?>?case=CampaignPauseCode&rule=ADD", PauseDATA, function (resp) {

                var st = $.trim(resp.status);
                 $.toast({
			            heading: 'Campaign Pause Setting',
			            text: resp.message,
			            position: 'top-right',
			            loaderBg: '#ff6849',
			            icon: st,
			            hideAfter: 3500,
			            stack: 6
			        });
                }, 'json');
            }
        });
        $(document).on('click', '.CampaignPauseEdit', function (e) {
            var ParentSection = $(this).parent().parent();
            var code = ParentSection.find('input[name="pause_code"]').val();
            var name = ParentSection.find('input[name="pause_code_name"]').val();
            var time = ParentSection.find('input[name="pause_time"]').val();
            var campaign = $(this).data('campaign');
            var id = $(this).data('id');
            if (code != '' && name !== '' && time != '') {

                var PauseDATA = {campaign: campaign, name: name, code: code, time: time,id:id}

                $.post("<?php echo base_url('campaigns/ajax');?>?case=CampaignPauseCode&rule=UPDATE", PauseDATA, function (resp) {
//                    console.log(resp);
                var st = $.trim(resp.status);
                 $.toast({
			            heading: 'Campaign Pause Setting',
			            text: resp.message,
			            position: 'top-right',
			            loaderBg: '#ff6849',
			            icon: st,
			            hideAfter: 3500,
			            stack: 6
			        });
                }, 'json');
            }
        });

        $(document).on('click', '.CampaignPauseDelete', function (e) {
            var ParentSection = $(this).parent().parent();
            var id = $(this).data('id')
            var campaign = $(this).data('campaign');
            swal({
            title: "Are you sure?",
            text: "You will not be able to recover this Campaign Pause Code!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
                if (id && campaign) {
                    $.post("<?php echo base_url('campaigns/ajax');?>?case=CampaignPauseCode&rule=DELETE", {id:id,campaign:campaign}, function (resp) {
                        swal("Deleted!", "Your campaign pause code has been deleted.", "success");
                    });
                    ParentSection.remove();
                } else {
                    swal("Deleted!", "Your campaign pause code has been deleted.", "success");
                    ParentSection.remove();
                }

            } else {
                swal("Cancelled", "Your campaign status is safe :)", "error");
            }
        });

        });
    });
</script>
