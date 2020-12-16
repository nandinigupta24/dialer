<?php if (!checkRole('campaigns', 'view')) {
    no_permission();
} else { ?>
    <style>
        .range-slider { -webkit-appearance: none; width: 100%; height: 8px; border-radius: 5px; background: #d3d3d3; outline: none; opacity: 0.7; -webkit-transition: .2s; transition: opacity .2s; } .range-slider:hover { opacity: 1; } .range-slider::-webkit-slider-thumb { -webkit-appearance: none; appearance: none; width: 12px; height: 12px; border-radius: 50%; background: #2196F3; cursor: pointer; } th{ font-size: 13px !important; font-weight: 700 !important; } .range-slider::-moz-range-thumb { width: 12px; height: 12px; border-radius: 50%; background: #2196F3; cursor: pointer; }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
            <h1>
                Campaign
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('campaigns') ?>">Campaign</a></li>
                <li class="breadcrumb-item active">Listings</li>
            </ol>
        </section>-->

        <!-- Main content -->
        <?php
        $data = $database->get('vicidial_users', '*', ['user' => $_SESSION['Login']['user']]);
        $data = $database->get('vicidial_user_groups', '*', ['user_group' => $data['user_group']]);
        $LOGallowed_campaigns = $data['allowed_campaigns'];
        $Campaign = array_filter(explode(' ', str_replace('-', '', $LOGallowed_campaigns)));
        if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
            $SQL = "SELECT * FROM vicidial_campaigns ORDER BY campaign_id ASC";
        }else{
            $SQL = "SELECT * FROM vicidial_campaigns WHERE campaign_id IN ('".implode("','",$_SESSION['CurrentLogin']['CampaignID'])."') ORDER BY campaign_id ASC";
        }
        $Rowresult = $database->query($SQL)->fetchAll();
        ?>
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Campaign Queues</h4>
                        </div>

                        <form role="form" class="form-element" >
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Campaign Selection</label>
                                    <select class="form-control" name="campaign" required="">
                                        <option value="">Select Campaign</option>
                                        <?php foreach ($Rowresult as $campaign) { ?>
                                            <option value="<?php echo $campaign['campaign_id']; ?>" <?php echo ($_GET['campaign'] == $campaign['campaign_id']) ? 'selected="selected"' : ''; ?>><?php echo $campaign['campaign_id'].' - '.$campaign['campaign_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-success btn-app">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

            <?php if (!empty($_GET['campaign']) && $_GET['campaign']) { ?>
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="box">
                            <div class="with-border">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <span class="fa fa-book"></span>Search Results : <?php echo $_GET['campaign']; ?>
                                    </div>
                                    <ul class="nav panel-tabs">
                                        <li><a href="javascript:void(0);" class="btn btn-app btn-default EmptyQueue">Empty Queue</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <?php $data = $database->select('vicidial_hopper', '*', ['campaign_id' => $_GET['campaign']]); ?>
                                    <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                        <thead class="bg-success">
                                            <tr>
                                                <th>Order</th>
                                                <th>Priority</th>
                                                <th>Lead ID</th>
                                                <th>List ID</th>
                                                <th>Phone Number</th>
                                                <th>Status</th>
                                                <th>Called Count</th>
                                                <th>Alt Dial</th>
                                                <th>Source</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($data as $VicidialHopper) {
                                                $VicidialData = $database->get('vicidial_list', '*', ['lead_id' => $VicidialHopper['lead_id']]);
                                                ?>
                                                <tr>
                                                    <td><?php echo $VicidialHopper['hopper_id']; ?></td>
                                                    <td><?php echo $VicidialHopper['priority']; ?></td>
                                                    <td><?php echo $VicidialHopper['lead_id']; ?></td>
                                                    <td><?php echo $VicidialHopper['list_id']; ?></td>
                                                    <td><?php echo $VicidialData['phone_number']; ?></td>
                                                    <td><?php echo $VicidialHopper['status']; ?></td>
                                                    <td><?php echo $VicidialData['called_count']; ?></td>
                                                    <td><?php echo $VicidialHopper['alt_dial']; ?></td>
                                                    <td><?php echo $VicidialHopper['source']; ?></td>
                                                </tr>
        <?php } ?>
                                        </tbody>
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
    <?php } ?>
        </section>
    </div>
    <script>
        var dt = $('#table-list-campaigns').DataTable();

        $(document).on('click', '.EmptyQueue', function () {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this hopper queue!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.post("<?php echo base_url('campaigns/ajax') ?>?case=CampaignQueue&rule=DELETE", {campaign: '<?php echo $_GET['campaign']; ?>'}, function (resp) {
                        swal("Deleted!", "Your hopper queue data has been deleted.", "success");
                        setTimeout(function(){ 
                            window.location.reload();
                        }, 2000);
                    });

                } else {
                    swal("Cancelled", "Your hopper data is safe :)", "error");
                }
            });
        });
    </script>
<?php } ?>
