<?php
if (!checkRole('teams', 'view')) {
    no_permission();
} else {
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <!--    <section class="content-header">
            <h1 class="m-n font-thin h3 text-black">Teams</h1>
            <small class="text-muted">Manage all your teams from this page</small>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#">Team</a></li>
                <li class="breadcrumb-item active">Listings</li>
            </ol>
        </section>-->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-visible formtabs" id="AllFormsTab">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-group"></span>All Teams</div>
                            <ul class="nav panel-tabs">
                                <li><a title="Refresh Teams" href=""><span class="fa fa-refresh text-blue2"></span></a></li>
                                <?php if (checkRole('teams', 'create')) : ?>
                                    <li><a class="ajax-disable" title="Create Teams" href="<?php echo base_url('teams/create') ?>"><span class="fa fa-plus text-blue2"></span></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="panel-body pbn">
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="TeamTable">
                                            <thead class="bg-success">
                                                <tr>
                                                    <th>Team</th>
                                                    <th>Team Description</th>
                                                    <th>Campaign Access</th>
                                                    <th>Licensing</th>
                                                    <th>Plan</th>
                                                    <th>Status</th>
                                                    <th data-orderable="false">Action</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $data = $database->select('vicidial_user_groups', ['user_group', 'group_name', 'allowed_campaigns','status'], ['user_group[!]' => 'ADMIN']);
                                            ?>
                                            <tbody>
                                                <?php
                                                foreach ($data as $val) {
                                                    $PricingPlan = $DBUTG->get('user_pricings', '*', ['AND' => ['user_group' => $val['user_group'], 'status' => 'RUN']]);
                                                    $PricingDetail = $DBUTG->get('pricing_plans', '*', ['id' => $PricingPlan['pricing_plan_id']]);
                                                    
                                                    $query = "SELECT L.title FROM `user_licensings` UL JOIN licensings L ON UL.licensing_id = L.id WHERE UL.user_group = '".$val['user_group']."' ORDER BY UL.id DESC LIMIT 1";
                                                    $Licensing = $DBUTG->query($query)->fetchAll(PDO::FETCH_ASSOC);
                                                        
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $val['user_group']; ?></td>
                                                        <td><?php echo $val['group_name']; ?></td>
                                                        <td>
                                                            <?php
                                                            $campaign = explode(' ', $val['allowed_campaigns']);

                                                            $count = count($campaign);
                                                            $Counter = 0;
                                                            for ($i = 0; $i < $count; $i++) {
                                                                if(!in_array($campaign[$i],['','-'])){
                                                                    $Counter++;
                                                                    echo "<span class='label label-info'><a href='" . base_url('campaigns/edit') . "?campaign_id=$campaign[$i]' class='text-white'>$campaign[$i]</a></span>&nbsp;";
                                                                }
                                                            }
                                                            if($Counter == 0){
                                                                echo "<span class='label label-danger'>No Campaign Assigned</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if(!empty($Licensing[0]['title']) && $Licensing[0]['title']){
                                                                switch($Licensing[0]['title']){
                                                                    case 'Basic':
                                                                        echo '<span class="label label-info">BASIC</span>';
                                                                        break;
                                                                    case 'Omni':
                                                                        echo '<span class="label label-info">OMNI</span>';
                                                                        break;
                                                                    case 'Advance':
                                                                        echo '<span class="label label-info">ADVANCE</span>';
                                                                        break;
                                                                    default:
                                                                        echo '<span class="label label-info">'.$Licensing[0]['title'].'</span>';
                                                                }
                                                            }else{
                                                                echo '<span class="label label-danger">No License Defined</span>';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($PricingDetail['title'])) { ?>
                                                                <span class="label label-info" title="<?php echo $PricingDetail['duration'] . ' ' . $PricingDetail['type'] . ' - ' . $PricingDetail['agent'] . ' Agent'; ?>  -:- <?php echo $PricingPlan['start'] . ' - ' . $PricingPlan['end']; ?>"><?php echo $PricingDetail['title']; ?></span><br/>
                                                            <?php } else { ?>
                                                                <span class="label label-danger">No Plan Defined</span>
                                                            <?php } ?>

                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-toggle <?php echo ($val['status'] == 'Y') ? 'active' : '';?> GroupStatus" data-group="<?php echo $val['user_group'];?>" data-val="<?php echo $val['status'];?>" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                                <div class="handle"></div>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (checkRole('teams', 'view')) {
                                                                echo "<a href='" . base_url('teams/edit') . "?user_group=" . $val['user_group'] . "' class='btn btn-app btn-success text-white mr5'><i class='fa fa-arrow-right'></i></a>";
                                                            }
                                                            if (checkRole('teams', 'edit')) {
                                                                echo "<button type='button' class='btn btn-app btn-danger RemoveGroup' data-group='" . $val['user_group'] . "'><i class='fa fa-times' title='Remove'></i></button>";
                                                            }
                                                            ?>
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
                </div>
            </div>
        </section>
    </div>
    <script>
        $('#TeamTable').DataTable();
        function AjaxMethod(Method, URL, data) {

        }

        $(document).on('click', '.RemoveGroup', function () {
            var Group = $(this).data('group');
            var data = {Group: Group};
            var RemoveGroup = $(this);
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this team!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('teams/ajax') ?>?rule=Remove',
                        data: data, // serializes the form's elements.
                        success: function (data)
                        {
                            var result = JSON.parse(data);
                            if (result.success === 1) {
                                $.toast({
                                    heading: 'Welcome To UTG Dialer',
                                    text: result.message,
                                    position: 'top-right',
                                    loaderBg: '#ff6849',
                                    icon: 'info',
                                    hideAfter: 3500,
                                    showHideTransition: 'plain',
                                });
                                RemoveGroup.parent().parent().remove();
                            } else {
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
                } else {
                    swal("Cancelled", "This user is safe :)", "error");
                }
            });
        });

        $(document).on('click','.GroupStatus',function(){
            var Group = $(this).data('group');
            if($(this).hasClass('active')){
               var value = 'Y';
            }else{
               var value = 'N'; 
            }
            $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('teams/ajax') ?>?rule=StatusUpdate',
                    data: {ItemID:Group,ItemValue:value}, // serializes the form's elements.
                    success: function (data){
                            var result = JSON.parse(data);
                            if (result.success === 1) {
                                $.toast({
                                    heading: 'Team Settings',
                                    text: result.message,
                                    position: 'top-right',
                                    loaderBg: '#ff6849',
                                    icon: 'success',
                                    hideAfter: 3500,
                                    showHideTransition: 'plain',
                                });
                            } else {
                                $.toast({
                                    heading: 'Team Settings',
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
<?php } ?>
