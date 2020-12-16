<?php
if (!checkRole('data', 'view')) {
    no_permission();
} else {
    if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
        $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER' => ['campaign_id' => 'ASC']]);
    }else{
//        $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER' => ['campaign_id' => 'ASC'],'user_group'=>$_SESSION['CurrentLogin']['user_group']]);
        $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER' => ['campaign_id' => 'ASC'],'campaign_id'=>$_SESSION['CurrentLogin']['CampaignID']]);
    }
    
    $ListListings = $database->select('vicidial_lists', ['list_id', 'list_name','campaign_id'], ['ORDER' => ['list_id' => 'ASC'],'campaign_id'=>array_column($CampaignListings,'campaign_id')]);
    
    $StatusListings = $database->query("SELECT distinct(status),status_name FROM vicidial_campaign_statuses WHERE (campaign_id IN ('".implode("','",array_column($CampaignListings,'campaign_id'))."')) OR (campaign_id is NULL AND Status_Type is NOT NULL) ORDER BY status")->fetchAll(PDO::FETCH_ASSOC);
   
   
    ?>

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row Create-Rule" style="display:none;">
                <div class="col-md-6">
                    <form method="POST" action="" id="CreateDataRule">
                        <input type="hidden" name="user_group" value="<?php echo $_SESSION['CurrentLogin']['user_group'];?>"/>
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Rule Name Configuration</h4>
                                <button class="btn btn-danger pull-right CreateRule" type="button" style="margin-top:-3px;">Close New Rule</button>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="">Rule Name</label>
                                            <input class="form-control" type="text" value="" id="" name="rule_name" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="">Rule Description</label>
                                            <input class="form-control" type="text" value="" id="" name="rule_description" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-search-input" class="">I want to archive data from list(s)</label>
                                            <select class="form-control select2" name="rule_list_id[]" style="width:100%;" multiple="" required="">
                                                <option value="">Select Option</option>
                                                <?php foreach ($ListListings as $listings) { ?>
                                                    <option value="<?php echo $listings['list_id']; ?>" data-campaign="<?php echo $listings['campaign_id']; ?>"><?php echo $listings['list_id'] . ' - ' . $listings['list_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-search-input" class="">Which has not been called in</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="form-control" name="rule_interval" required="">
                                                        <option value="">Select Option</option>
                                                        <?php for ($i = 1; $i <= 30; $i++) { ?>
                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="rule_interval_type" required="">
                                                        <option value="">Select Option</option>
                                                        <option value="months">Months</option>
                                                        <option value="days">Days</option>
                                                        <option value="hours">Hours</option>
                                                    </select> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-search-input" class="">I want my rule to only archive by the following statuses <span class="text-danger">(optional "None Selected" = disabled)</span>
                                            </label>

                                            <select class="form-control select2" name="rule_statuses[]" multiple="" style="width:100%">
                                                <option value="">Select Option</option>
                                                <?php foreach ($StatusListings as $listing) { ?>
                                                    <option value="<?php echo $listing['status']; ?>"><?php echo $listing['status'] . ' - ' . $listing['status_name']; ?></option>
                                                <?php } ?>
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="">I want my rule to only archive data which has a higher called count than <span class="text-danger">(optional)</span></label>
                                            <select class="form-control select2" name="rule_called_count" style="width:100%;">
                                                <option value="">Select Option</option>
                                                <?php for ($i = 0; $i <= 30; $i++) { ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="">I want my rule to archive callbacks which may reside within archived data <span class="text-danger">(optional)</span></label>

                                            <select class="form-control select2" name="rule_archive_callback" style="width:100%;">
                                                <option value="">Select Option</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="example-search-input" class="">Status</label><br/>
                                            <button type="button" class="btn btn-toggle RuleActive" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                            <input type="hidden" name="status" value="N"/>
                                        </div>

                                    </div>

                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>

                            <div class="box-footer">
                                <button type="button" class="btn btn-danger">Cancel</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="submit" class="btn btn-success pull-right">Create</button>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box ">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-history text-success"></span>Data Archive Rules<span class="cam-name"></span></div>
                                <ul class="nav panel-tabs">
                                    <?php if (checkRole('data', 'create')) { ?>
                                    <li><a href="javascript:void(0);" class="text-success CreateRule" title="Create Rule"><i class="fa fa-plus"></i></a></li>
                                    <?php } ?>
                                    <li><a href="javascript:void(0);" class="text-success" title="Refresh Page" onclick="window.location.reload();"><i class="fa fa-refresh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover table-bordered" id="ListData">
                                        <thead class="bg-success">
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Lists</th>
                                                <th>Statuses</th>
                                                <th>Keep Callbacks</th>
                                                <th>Called Count</th>
                                                <th>Interval</th>
                                                <th>Interval Type</th>
                                                <th>Last Run</th>
                                                <th>Active</th>
                                                <th data-orderable="false">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $data = $DBUTG->select('data_archive_rules', '*',['user_group'=>$_SESSION['CurrentLogin']['user_group']]); ?>
                                            <?php foreach ($data as $value) { ?>
                                                <tr>
                                                    <td><?php echo $value['rule_name']; ?></td>
                                                    <td><?php echo $value['rule_description']; ?></td>
                                                    <td><?php echo $value['rule_list_id']; ?></td>
                                                    <td><?php echo $value['rule_statuses']; ?></td>
                                                    <td><?php echo $value['rule_archive_callback']; ?></td>
                                                    <td><?php echo $value['rule_called_count']; ?></td>
                                                    <td><?php echo $value['rule_interval']; ?></td>
                                                    <td><?php echo $value['rule_interval_type']; ?></td>
                                                    <td> --------- </td>
                                                    <td><?php echo $value['status']; ?></td>
                                                    <td><a href="javascript:void(0);" class="btn btn-danger Remove" data-rule-id="<?php echo $value['id']; ?>"><i class="fa fa-times"></i></a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <script>
        $('#ListData').DataTable();

        $(document).ready(function () {
            $('.CreateRule').click(function () {
                $('.Create-Rule').toggle();
            });


            $('.RuleActive').click(function () {
                if (!$(this).hasClass('active')) {
                    var value = 'Y'
                } else {
                    var value = 'N'
                }
                $(this).parent().find('input').val(value);
            });

        });

        function filterSelectOptions(selectElement, attributeName, attributeValue) {
            if (selectElement.data("currentFilter") != attributeValue) {
                selectElement.data("currentFilter", attributeValue);
                var originalHTML = selectElement.data("originalHTML");
                if (originalHTML)
                    selectElement.html(originalHTML)
                else {
                    var clone = selectElement.clone();
                    clone.children("option[selected]").removeAttr("selected");
                    selectElement.data("originalHTML", clone.html());
                }
                if (attributeValue) {
                    selectElement.children("option:not([" + attributeName + "='" + attributeValue + "'],:not([" + attributeName + "]))").remove();
                }
            }
        }

        $("#RuleCampaign").change(function () {
            filterSelectOptions($("#RuleList"), "data-campaign", $(this).val());
        });

        $("#CreateDataRule").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = '<?php echo base_url('data/ajax') ?>?rule=CreateArchiveRule';

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data)
                {
                    var result = JSON.parse(data);

                    if (result.success == 1) {
                        $.toast({
                            heading: 'Welcome To UTG Dialer',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        $('#CreateDataRule')[0].reset();
                        $('.Create-Rule').toggle();
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);
                    } else if (result.success == 0) {
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


        $(document).ready(function () {
            $('.Remove').click(function () {
                var value = $(this).attr('data-rule-id');
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('data/ajax') ?>?rule=RemoveArchiveRule',
                    data: {rule_id: value}, // serializes the form's elements.
                    success: function (data)
                    {
                        var result = JSON.parse(data);

                        if (result.success == 1) {
                            $.toast({
                                heading: 'Welcome To UTG Dialer',
                                text: result.message,
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 3500,
                                showHideTransition: 'plain',
                            });
                            setTimeout(function () {
                                window.location.reload();
                            }, 2000);
                        } else if (result.success == 0) {
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
        });


    </script>
<?php } ?>
