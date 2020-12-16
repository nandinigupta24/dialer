<?php
if(!empty($_GET['start']) && !empty($_GET['end'])){
    $start = $_GET['start'];
    $end = $_GET['end'];
}else{
     $start = $end = date('Y-m-d');
}
$dataGroup = $database->select('vicidial_campaigns','campaign_id',['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access']]);
$query = "SELECT * FROM vicidial_closer_log VCL JOIN vicidial_list VL ON VL.lead_id=VCL.lead_id WHERE VCL.comments='CHAT' AND VCL.call_date BETWEEN '".$start." 00:00:00' AND '".$end." 23:59:59' AND campaign_id IN ('".implode("','",$dataGroup)."')";

$data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-comments-o"></span>Chat Listings</div>
                            <ul class="nav panel-tabs">
                                <li> <a type="button" id="daterange-btn">
                                        <span>
                                            <i class="fa fa-calendar text-success"></i> &nbsp;&nbsp;<?php echo date('F d,Y',strtotime($start)).' - '.date('F d,Y',strtotime($end));?>
                                        </span>
                                        <i class="fa fa-caret-down"></i>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-body">
                        
                        <div class="table-responsive">
                            <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                <thead class="bg-success">
                                    <tr>

                                        <th>Agent</th>
                                        <th>Lead ID</th>
                                        <th>Status</th>
                                        <th>Call Date</th>
                                        <th>Chat Group</th>
                                        <th>List ID</th>
                                        <th>Call Length (s)</th>
                                        <th>Phone Number</th>
                                        <th class="text-center"  data-orderable="false">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $listings) { ?>
                                        <tr>
                                            <td><?php echo $listings['user']; ?></td>
                                            <td><?php echo $listings['lead_id']; ?></td>
                                            <td><?php echo $listings['status']; ?></td>
                                            <td><?php echo $listings['call_date']; ?></td>
                                            <td><?php echo $listings['campaign_id']; ?></td>
                                            <td><?php echo $listings['list_id']; ?></td>
                                            <td><?php echo $listings['length_in_sec']; ?></td>
                                            <td><?php echo $listings['phone_number']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('chat/detail').'?lead_id='.$listings['lead_id'].'&U_ID='.$listings['uniqueid']; ?>" class="btn btn-success" title="Detail View"><i class="fa fa-list-alt"></i></a>
                                            </td>
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
    </section>


    <div class="modal fade" id="ArchiveRuleModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">Report Settings</h4>
                </div>
                <form class="" method="get" action="">
                    <!--<input type="hidden" name="ADD" value="5016"/>-->
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-sm-6 pr15">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class="input-group mb10"> <span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
                                        <input class="form-control" type="date" placeholder="Start Date" max="<?php echo date('Y-m-d'); ?>" name="start" value="<?php echo $_GET['start']; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 pr15">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <div class="input-group mb10"> <span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
                                        <input class="form-control" type="date" placeholder="End Date" max="<?php echo date('Y-m-d'); ?>" name="end" value="<?php echo $_GET['end']; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 pr15">
                                <div class="form-group">
                                    <label>Status</label>
                                    <?php
                                    $query = "SELECT status,status_name FROM vicidial_campaign_statuses WHERE (campaign_id is NULL OR campaign_id IN ('" . implode("','", $_SESSION['CurrentLogin']['CampaignID']) . "')) AND status != ''";
                                    $StatusListings = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <div class="input-group mb10"> <span class="input-group-addon"><i class="fa fa-tag"></i> </span>
                                        <select class="form-control" name="status">
                                            <option value="">All Statuses</option>
                                            <?php foreach ($StatusListings as $ListingStatus) { ?>
                                                <option value="<?php echo $ListingStatus['status']; ?>" <?php echo (isset($_GET['status']) && $_GET['status'] == $ListingStatus['status']) ? 'selected="selected"' : ''; ?>><?php echo $ListingStatus['status'] . ' - ' . $ListingStatus['status_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 pr15">
                                <div class="form-group">
                                    <label>Agent</label>
                                    <div class="input-group mb10"> <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                                        <?php
                                        if (!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN') {
                                            $AgentListings = $database->select('vicidial_users', ['user', 'full_name']);
                                        } else {
                                            $AgentListings = $database->select('vicidial_users', ['user', 'full_name'], ['user_group' => $_SESSION['CurrentLogin']['user_group']]);
                                        }
                                        ?>
                                        <select class="form-control" name="agent">
                                            <option value="">All Agents</option>
                                            <?php foreach ($AgentListings as $ListingAgent) { ?>
                                                <option value="<?php echo $ListingAgent['user']; ?>" <?php echo (isset($_GET['agent']) && $_GET['agent'] == $ListingAgent['user']) ? 'selected="selected"' : ''; ?>><?php echo $ListingAgent['user'] . ' - ' . $ListingAgent['full_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 pr15">
                                <div class="form-group">
                                    <label>Campaign</label>
                                    <div class="input-group mb10"> <span class="input-group-addon"><i class="fa fa-book"></i> </span>
                                        <?php
                                        if (!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN') {
                                            $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['active' => 'Y']);
                                        } else {
                                            $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['AND' => ['active' => 'Y', 'user_group' => $_SESSION['CurrentLogin']['user_group']]]);
                                        }
                                        ?>
                                        <select class="form-control" name="campaign">
                                            <option value="">All Campaigns</option>
<?php foreach ($CampaignListings as $ListingCampaign) { ?>
                                                <option value="<?php echo $ListingCampaign['campaign_id']; ?>" <?php echo (isset($_GET['campaign']) && $_GET['campaign'] == $ListingCampaign['campaign_id']) ? 'selected="selected"' : ''; ?>><?php echo $ListingCampaign['campaign_id'] . ' - ' . $ListingCampaign['campaign_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 pr15">
                                <div class="form-group">
                                    <label>List</label>
                                    <div class="input-group mb10"> <span class="input-group-addon"><i class="fa fa-list"></i> </span>
<?php
$ListListings = $database->select('vicidial_lists', ['list_id', 'list_name'], ['AND' => ['active' => 'Y', 'campaign_id' => $_SESSION['CurrentLogin']['CampaignID']]]);
?>
                                        <select class="form-control" name="lists">
                                            <option value="">All Lists</option>
<?php foreach ($ListListings as $ListingList) { ?>
                                                <option value="<?php echo $ListingList['list_id']; ?>" <?php echo (isset($_GET['lists']) && $_GET['lists'] == $ListingList['list_id']) ? 'selected="selected"' : ''; ?>><?php echo $ListingList['list_id'] . ' - ' . $ListingList['list_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 pr15">
                                <div class="form-group well">
                                    <div class="input-group mb10"> <span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
                                        <input class="form-control" type="text"  placeholder="Phone Number" name="phone" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : ''; ?>"/>
                                    </div>
                                    <span><h6>Does not work with other search criteria, pulls all recordings for this number</h6></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" >View Recording</button>
                    </div>
                </form>

            </div>

        </div>

    </div>


</div>

<div class="AudioPlay" style="position: absolute;top: 118;right: 300;display:none;"></div>
<script>
    $(function () {
        "use strict";
    })

    $('#table-list-campaigns').DataTable();

    $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                var start = start.format('YYYY-MM-DD');
                var end = end.format('YYYY-MM-DD');
                window.location.href = "<?php echo base_url('chat') ?>?start=" + start + "&end=" + end;
            }
    );

</script>
