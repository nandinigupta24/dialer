<?php if(!checkRole('data', 'view')){ no_permission(); } else {?>
<?php
        if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
            $CampaignList = $database->select('vicidial_campaigns',['campaign_id']);
        }else{
            $CampaignList = $database->select('vicidial_campaigns',['campaign_id'],['user_group'=>$_SESSION['CurrentLogin']['user_group']]);
        }
        $DataList = $database->select('vicidial_lists', ['list_id', 'list_name'],['AND'=>['campaign_id'=> array_column($CampaignList,'campaign_id')],'ORDER'=>['list_id'=>'ASC']]);
        
        $StatusList = $database->query("SELECT VCS.status,VCS.status_name FROM vicidial_list VL JOIN vicidial_campaign_statuses VCS ON VCS.status = VL.status WHERE VL.list_id IN ('".implode("','",array_column($DataList,'list_id'))."') GROUP BY VL.status")->fetchAll(PDO::FETCH_ASSOC);
        
        ?>
<div class="content-wrapper" style="min-height: 336.8px;">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box ">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-plus"></span>Search For a Lead:<span class="cam-name"></span></div>
                            <ul class="nav panel-tabs">
                                <li><a href="" class="" title="Refresh Page"><i class="fa fa-refresh"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-body" style="padding: 0px 0px;">
                        <form method="get" action="<?php echo base_url('data/search')?>">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="CampaignName">Search Method:</label>
                                        <select class="form-control" name="search_method" required="" id="SearchMethod">
                                            <option value="phone_number" <?php echo (!empty($_GET['search_method']) && $_GET['search_method'] == 'phone_number') ? 'selected="selected"' : '';?>>Phone</option>
                                            <option value="lead_id" <?php echo (!empty($_GET['search_method']) && $_GET['search_method'] == 'lead_id') ? 'selected="selected"' : '';?>>Lead ID</option>
                                            <option value="name" <?php echo (!empty($_GET['search_method']) && $_GET['search_method'] == 'name') ? 'selected="selected"' : '';?>>Name</option>
                                            <option value="details" <?php echo (!empty($_GET['search_method']) && $_GET['search_method'] == 'details') ? 'selected="selected"' : '';?>>Details</option>
                                            <option value="postal_code" <?php echo (!empty($_GET['search_method']) && $_GET['search_method'] == 'postal_code') ? 'selected="selected"' : '';?>>Postcode</option>
                                            <option value="vendor_lead_code" <?php echo (!empty($_GET['search_method']) && $_GET['search_method'] == 'vendor_lead_code') ? 'selected="selected"' : '';?>>Vendor Lead Code</option>
                                        </select>
                                    </div>
                                    <div class="form-group lead_id HideShow" style="display:none;">
                                        <label for="CampaignName">Lead ID:</label>
                                        <input type="text" name="lead_id" class="form-control" value="<?php echo isset($_GET['lead_id']) ? $_GET['lead_id'] : 0;?>"/>
                                    </div>
                                    <div class="form-group name HideShow" style="display:none;">
                                        <label for="CampaignName">Name:</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo isset($_GET['name']) ? $_GET['name'] : '' ;?>"/>
                                    </div>
                                    <div class="form-group postal_code HideShow" style="display:none;">
                                        <label for="CampaignName">Postal Code:</label>
                                        <input type="text" name="postal_code" class="form-control" value="<?php echo isset($_GET['postal_code']) ? $_GET['postal_code'] : '';?>"/>
                                    </div>
                                    <div class="form-group vendor_lead_code HideShow" style="display:none;">
                                        <label for="CampaignName">Vendor Lead Code:</label>
                                        <input type="text" name="vendor_lead_code" class="form-control" value="<?php echo isset($_GET['vendor_lead_code']) ? $_GET['postal_code'] : '';?>"/>
                                    </div>
                                    <div class="form-group phone_number HideShow">
                                        <label for="CampaignName">Phone Number:</label>
                                        <input type="text" name="phone_number" class="form-control" value="<?php echo isset($_GET['phone_number']) ? $_GET['phone_number'] : '';?>"/>
                                    </div>
                                    <div class="form-group phone_number HideShow">
                                        <label for="CampaignName">Alt Number Search:</label>
                                        <select class="form-control" name="alt_number_search">
                                            <option value="">Select Option</option>
                                            <option value="Yes" <?php echo (isset($_GET['alt_number_search']) && $_GET['alt_number_search'] == 'Yes') ? 'selected="selected"' : ''; ?>>Yes</option>
                                            <option value="No" <?php echo (isset($_GET['alt_number_search']) && $_GET['alt_number_search'] == 'No') ? 'selected="selected"' : ''; ?>>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group details HideShow" style="display:none;">
                                        <label for="CampaignName">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="">Select Option</option>
                                            <?php foreach ($StatusList as $status) { ?>
                                                <option value="<?php echo $status['status']; ?>" <?php echo (isset($_GET['status']) && $_GET['status'] == $status['status']) ? 'selected="selected"' : ''; ?>><?php echo $status['status'].' - '.$status['status_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group details HideShow" style="display:none;">
                                        <label for="CampaignName">List ID:</label>
                                        <select class="form-control" name="list_id">
                                            <option value="">Select Option</option>
                                            <?php foreach ($DataList as $status) { ?>
                                                <option value="<?php echo $status['list_id']; ?>" <?php echo (isset($_GET['list_id']) && $_GET['list_id'] == $status['list_id']) ? 'selected="selected"' : ''; ?>><?php echo $status['list_id'].' - '.$status['list_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i> Search</button>
                                    </div>
                                </div>
                            </div>

                        </form></div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <?php
        $case = isset($_GET['search_method']) ? $_GET['search_method'] : '';
        $ArraySearch = [];
        switch ($case) {
            case 'phone_number':
                if (!empty($_GET['alt_number_search']) && $_GET['alt_number_search'] == 'Yes') {
                    $ArraySearch['OR']['alt_phone'] = $_GET['phone_number'];
                    $ArraySearch['OR']['phone_number'] = $_GET['phone_number'];
                } else {
                    $ArraySearch['AND']['phone_number'] = $_GET['phone_number'];
                }
                $ArraySearch['AND']['list_id'] = array_column($DataList,'list_id');
                break;
            case 'lead_id':
                $ArraySearch['AND']['lead_id'] = $_GET['lead_id'];
                break;
            case 'vendor_lead_code':
                $ArraySearch['AND']['vendor_lead_code'] = $_GET['vendor_lead_code'];
                $ArraySearch['AND']['list_id'] = array_column($DataList,'list_id');
                break;
            case 'postal_code':
                $ArraySearch['AND']['postal_code'] = $_GET['postal_code'];
                $ArraySearch['AND']['list_id'] = array_column($DataList,'list_id');
                break;
            case 'name':
                $ArraySearch['OR']['first_name'] = $_GET['name'];
                $ArraySearch['OR']['last_name'] = $_GET['name'];
                $ArraySearch['AND']['list_id'] = array_column($DataList,'list_id');
                break;
            case 'details':
                if (!empty($_GET['list_id'])) {
                    $ArraySearch['AND']['list_id'] = $_GET['list_id'];
                }
                if (!empty($_GET['status'])) {
                    $ArraySearch['AND']['status'] = $_GET['status'];
                }
                break;
            default:
                $ArraySearch['AND']['list_id'] = array_column($DataList,'list_id');
        }
        $ArraySearch['LIMIT'] = 100;
        
        $data = $database->select('vicidial_list', ['lead_id', 'vendor_lead_code', 'first_name', 'last_name', 'list_id', 'phone_number', 'status', 'entry_date', 'last_local_call_time'], $ArraySearch);
        
        admin_log_insert($database, @$_SESSION['Login']['user'], 'LISTS', 'SEARCH', '', 'SEARCH-LISTS-'.@$case, $database->last(), 'SEARCH LISTS', '--All--');
        ?>
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box ">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-book"></span>Search For a Lead:<span class="cam-name"></span></div>
                            <ul class="nav panel-tabs">
                                <li><a href="" class="" title="Refresh Page"><i class="fa fa-refresh"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-body" style="padding: 0px 0px;">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover table-bordered" id="ListData">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>Lead ID</th>
                                            <th>List ID</th>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Alternate Number</th>
                                            <th>Status</th>
                                            <th>Entry Date</th>
                                            <th>Last Call</th>
                                            <th data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php foreach ($data as $leads) { ?>
                                            <tr>
                                                <td><?php echo $leads['lead_id']; ?></td>
                                                <td><?php echo $leads['list_id']; ?></td>
                                                <td><?php echo $leads['first_name'] . $leads['last_name']; ?></td>
                                                <td><?php echo $leads['phone_number']; ?></td>
                                                <td><?php echo isset($leads['alt_phone']) ? $leads['alt_phone'] : ''; ?></td>
                                                <td><?php echo $leads['status']; ?></td>
                                                <td><?php echo $leads['entry_date']; ?></td>
                                                <td><?php echo $leads['last_local_call_time']; ?></td>
                                                <td><a href="<?php echo base_url('users/leads');?>?lead_id=<?php echo $leads['lead_id']; ?>" class="btn btn-success"><i class="fa fa-arrow-right"></i></a></td>
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
    $('#SearchMethod').change(function () {
        var value = $(this).val();
        $('.HideShow').hide();
        $('.' + value).show();
    });
});


var value = $('#SearchMethod').val();
$('.HideShow').hide();
$('.' + value).show();
</script>
<?php } ?>
