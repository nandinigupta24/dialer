<?php if (!checkRole('users', 'view')) {
    no_permission();
} else { ?>
    <?php
    if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
        $CampaignID = $database->select('vicidial_campaigns',['campaign_id','campaign_name']);
        $campaignId = array_column($CampaignID,'campaign_id');
        $UserListings = $database->select('vicidial_users', ['user', 'full_name'], ['active' => 'Y']);
    }else{
//        $CampaignID = $database->select('vicidial_campaigns',['campaign_id','campaign_name'],['user_group'=>$_SESSION['CurrentLogin']['user_group']]);
        $CampaignID = $database->select('vicidial_campaigns',['campaign_id','campaign_name'],['campaign_id'=>$_SESSION['CurrentLogin']['CampaignID']]);
        $campaignId = array_column($CampaignID,'campaign_id');
        $UserListings = $database->select('vicidial_users', ['user', 'full_name'], ['user_group' =>$_SESSION['CurrentLogin']['user_group']]);
    }
    
    $CampaignListing = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['AND' => ['active' => 'Y', 'campaign_id' => $campaignId]]);
   


    $SearchMethod = $_GET;
    unset($SearchMethod['ADD']);
    $SearchArray = [];
    $Condition = [];
    if (!empty($SearchMethod) && count($SearchMethod) > 0) {
        foreach ($SearchMethod as $key => $val) {
            if (!empty($val) && $val) {
                switch ($key) {
                    case 'start_callback':
                        $Condition['vicidial_callbacks.callback_time[>=]'] = date('Y-m-d', strtotime($val)) . ' 00:00:00';
                        break;
                    case 'end_callback':
                        $Condition['vicidial_callbacks.callback_time[<=]'] = date('Y-m-d', strtotime($val)) . ' 00:00:00';
                        break;
                    case 'user_id':
                        $Condition['vicidial_callbacks.user'] = $val;
                        break;
                    case 'campaign_id':
                        $Condition['vicidial_callbacks.campaign_id'] = $val;
                        break;
                    case 'lead_id':
                        $Condition['vicidial_callbacks.lead_id'] = $val;
                        break;
                    case 'phone':
                        $Condition['vicidial_list.phone_number'] = $val;
                        break;
                    default:
                }
            }
        }
        $SearchArray['AND'] = $Condition;
    }else{
        $Condition['vicidial_callbacks.user'] = array_column($UserListings,'user');
        $SearchArray['AND'] = $Condition;
    }
    
    ?>
<style>
    .bg-header-success{
        background-color: #50b79b !important;
        color:#fff !important;
    }
    </style>
    <div class="content-wrapper" style="min-height: 387px;">
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <h1> </h1>
            <span> </span>
            <!--  <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
               <li class="breadcrumb-item"><a href="#">Layout</a></li>
               <li class="breadcrumb-item active">Collapsed Sidebar</li>
             </ol> -->
        </section>        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-9">
                    <div class="box">
                        <div class="box-header with-border custom-box-tab ">
                            <h3 class="box-title"><a href="#" class="box-icon"><i class="fa fa-list"></i></a> All Callbacks</h3>
                            <!-- nav tab-->
                            <ul class="box-controls  pull-right nav nav-tabs justify-content-end" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#releaseModal">
                                        <span class="hidden-sm-up">
                                            <i class="fa fa-bars"></i>
                                        </span>
                                        <span class="hidden-xs-down">
                                            <i class="fa fa-bars"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#transferCallbacks">
                                        <span class="hidden-sm-up">
                                            <i class="fa fa-gear"></i>
                                        </span>
                                        <span class="hidden-xs-down">
                                            <i class="fa fa-gear"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#filterModal">
                                        <span class="hidden-sm-up">
                                            <i class="fa fa-filter"></i>
                                        </span>
                                        <span class="hidden-xs-down">
                                            <i class="fa fa-filter"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active tabTwoLink" href="callback"><span class="hidden-sm-up"><i class="fa fa-list-ol"></i></span> <span class="hidden-xs-down"><i class="fa fa-list-ol"></i></span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="box-body">
    <?php 
    $data = $database->select('vicidial_callbacks', ["[>]vicidial_list" => ['lead_id' => 'lead_id']], ['vicidial_callbacks.callback_time', 'vicidial_callbacks.status', 'vicidial_callbacks.user', 'vicidial_callbacks.list_id', 'vicidial_callbacks.lead_id', 'vicidial_callbacks.campaign_id', 'vicidial_list.title', 'vicidial_list.first_name', 'vicidial_list.last_name', 'vicidial_list.phone_number'], $SearchArray);
//    echo $database->last()
    ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="Callback-Table">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>Callback Time</th>
                                            <th>Stage</th>
                                            <th>User</th>
                                            <th>Customer</th>
                                            <th>Data List</th>
                                            <th>Campaigns</th>
                                            <th>Phone Number</th>
                                            <th data-orderable="false">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php foreach ($data as $val) { ?>
                                            <tr>
                                                <td><?php echo $val['callback_time']; ?></td>
                                                <td><?php echo $val['status']; ?></td>
                                                <td><?php echo $val['user']; ?></td>
                                                <td><?php echo $val['title'] . ' ' . $val['first_name'] . ' ' . $val['last_name']; ?></td>
                                                <td><?php echo $val['list_id']; ?></td>
                                                <td><?php echo $val['campaign_id']; ?></td>
                                                <td><?php echo $val['phone_number']; ?></td>
                                                <td><a href="<?php echo base_url('users/leads') ?>?lead_id=<?php echo $val['lead_id']; ?>" class="btn btn-success"><i class="fa fa-arrow-right"></i></a></td>
                                            </tr>
    <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="box">
                        <div class="box-header with-border custom-box-tab ">
                            <h3 class="box-title"><a href="#" class="box-icon"><i class="fa fa-gear"></i></a> Details</h3>
                        </div>
                        <?php
                        $CountArray = [];
                        $CountArray['Total'] = $database->count('vicidial_callbacks',['user'=>array_column($UserListings,'user')]);
                        $CountArray['OverDue'] = $database->count('vicidial_callbacks', ['AND'=>['callback_time[<]' => date('Y-m-d H:i:s'),'user'=>array_column($UserListings,'user')]]);
                        $CountArray['Queue'] = $database->count('vicidial_callbacks', ['AND'=>['callback_time[>]' => date('Y-m-d H:i:s'),'user'=>array_column($UserListings,'user')]]);
                        ?>
                        <!--				<div class="box bg-info m-2" style="width:unset">
                                                                <div class="card-body bg-gray-light py-12">
                                                                        <h3 class="text-primary"><?php echo $CountArray['Total']; ?></h3>
                                                                        <span class="text-dark">Total User Callbacks </span>
                                                                </div>
                                                    </div>
                        -->
                        <div class="small-box box">
                            <div class="inner">
                                <h3><?php echo $CountArray['Total']; ?></h3>

                                <p>Total User Callbacks</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-book text-green"></i>
                            </div>
                            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                        </div>
                        <div class="small-box box">
                            <div class="inner">
                                <h3><?php echo $CountArray['OverDue']; ?></h3>

                                <p>Callbacks Overdue</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-clock-o text-red"></i>
                            </div>
                            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                        </div>
                        <div class="small-box box">
                            <div class="inner">
                                <h3><?php echo $CountArray['Queue']; ?></h3>
                                <p>Generate Callbacks in Queue</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-list text-primary"></i>
                            </div>
                            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                        </div>



                        <!--			    <div class="box bg-info m-2" style="width:unset">
                                                                <div class="card-body bg-gray-light py-12">
                                                                        <h3 class="text-success"><?php echo $CountArray['OverDue']; ?></h3>
                                                                        <span class="text-dark">Callbacks Overdue </span>
                                                                </div>
                                                    </div>
                                                    <div class="box bg-info m-2" style="width:unset">
                                                                <div class="card-body bg-gray-light py-12">
                                                                        <h3 class="text-danger"><?php echo $CountArray['Queue']; ?></h3>
                                                                        <span class="text-dark">Generate Callbacks in Queue</span>
                                                                </div>
                                                    </div>-->

                    </div>
                </div>
            </div>

            <div class="modal" id="filterModal" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header bg-header-success">
                            <h4 class="modal-title text-center">Callback Filter</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        </div>
                        <form action="<?php echo base_url('users/callback') ?>" method="GET">
                            <input type="hidden" name="ADD" value="107"/>
                            <!-- Modal body -->
                            <div class="modal-body">

                                <div class="form-group row">
                                    <label for="campaign_id" class="col-sm-12 col-form-label">Callback Date Between</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="date" id="StartCallback" name="start_callback" value="<?php echo @$_GET['start_callback']; ?>"/>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="date" id="EndCallback" name="end_callback"  value="<?php echo @$_GET['end_callback']; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="campaign_active_btn" class="col-sm-12 col-form-label">User</label>
                                    <div class="col-sm-12">
                                        <select class="form-control select2" name="user_id" id="user_id" style="width:100%;">
                                            <option value="" selected="">No specified user</option>
                                            <?php foreach ($UserListings as $userList) { ?>
                                                <option value="<?php echo $userList['user']; ?>" <?php echo ($_GET['user_id'] == $userList['user']) ? 'selected="selected"' : ''; ?>><?php echo $userList['user'] . ' - ' . $userList['full_name']; ?></option>
    <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="campaign_active_btn" class="col-sm-12 col-form-label">Campaigns</label>
                                    <div class="col-sm-12">
                                        <select class="form-control select2" name="campaign_id" id="campaign_id" style="width:100%;">
                                            <option value="">Select Option</option>
                                            <?php foreach ($CampaignListing as $campaign) { ?>
                                                <option value="<?php echo $campaign['campaign_id']; ?>" <?php echo ($_GET['campaign_id'] == $campaign['campaign_id']) ? 'selected="selected"' : ''; ?>><?php echo $campaign['campaign_id'] . ' - ' . $campaign['campaign_name']; ?></option>
    <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="campaign_active_btn" class="col-sm-12 col-form-label">Customer ID</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" id="CustomerID" type="text" name="lead_id" value="<?php echo @$_GET['lead_id']; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="campaign_active_btn" class="col-sm-12 col-form-label">Phone Number</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" id='PhoneNumber' type="text" name="phone" value="<?php echo @$_GET['phone']; ?>"/>
                                    </div>
                                </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Filter</button>
                            <!--<input type="reset" value="Clear Search" class="btn btn-primary">-->
                                <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('users/callback') ?>';">Clear Search</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <input type="reset" value="Form Reset" class="btn btn-info" id="ResetItem">
                                <!--<a href="<?php // echo base_url('users/callback') ?>" >Reset All</a>-->
                            </div>
                        </form>

                    </div>
                </div>
            </div>	
            <div class="modal" id="transferCallbacks" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="post" id="CallbackTransfer">
                            <!-- Modal Header -->
                            <div class="modal-header bg-header-success">
                                <h4 class="modal-title text-center">Transfer Callback</h4>
                                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">

                                <div class="form-group row">
                                    <label for="campaign_active_btn" class="col-sm-12 col-form-label">Transfer Callbacks from</label>
                                    <div class="col-sm-12">
                                        <select class="form-control select2" name="user_from" id="user_from" required="" style="width:100%;">
                                            <option value="" selected="">No specified user</option>
                                            <?php foreach ($UserListings as $userList) { ?>
                                                <option value="<?php echo $userList['user']; ?>"><?php echo $userList['user'] . ' - ' . $userList['full_name']; ?></option>
    <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <select class="form-control select2" name="user_to" id="user_to" required="" style="width:100%;">
                                            <option value="" selected="">No specified user</option>
                                            <?php foreach ($UserListings as $userList) { ?>
                                                <option value="<?php echo $userList['user']; ?>"><?php echo $userList['user'] . ' - ' . $userList['full_name']; ?></option>
    <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Transfer</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal" id="releaseModal" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="" id="ReleaseCallbacks">
                            <div class="modal-header bg-header-success">
                                <h4 class="modal-title text-center">Release Overdue Callbacks</h4>
                                <button type="button" class="close " data-dismiss="modal"><i class="fa fa-times"></i></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">

                                <div class="form-group row">
                                    <label for="campaign_active_btn" class="col-sm-12 col-form-label">User</label>
                                    <div class="col-sm-12">
                                        <select class="form-control select2" name="user_id" id="user_id" required="" style="width:100%">
                                            <option value="" selected="">No specified user</option>
                                            <?php foreach ($UserListings as $userList) { ?>
                                                <option value="<?php echo $userList['user']; ?>"><?php echo $userList['user'] . ' - ' . $userList['full_name']; ?></option>
    <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="campaign_active_btn" class="col-sm-12 col-form-label">Campaigns</label>
                                    <div class="col-sm-12">
                                        <select class="form-control select2" name="campaign_id" id="campaign_id" required="" style="width:100%">
                                            <option value="" selected="">No Campaigns Selected</option>
                                            <?php foreach ($CampaignListing as $campaign) { ?>
                                                <option value="<?php echo $campaign['campaign_id']; ?>" <?php echo ($_GET['campaign_id'] == $campaign['campaign_id']) ? 'selected="selected"' : ''; ?>><?php echo $campaign['campaign_id'] . ' - ' . $campaign['campaign_name']; ?></option>
    <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="campaign_active_btn" class="col-sm-12 col-form-label">Duration Overdue</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="date" name="callback_time" required="">
                                    </div>
                                </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Transfer</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>     
        </section>
        <!-- /.content -->
    </div>

    <script>
        $('#Callback-Table').DataTable({"order": [[ 0, "desc" ]]});


        $("#CallbackTransfer").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: '<?php echo base_url('users/ajax') ?>?rule=TransferCallback',
                data: form.serialize(), // serializes the form's elements.
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
                        $('.close').click();
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


        });
        $("#ReleaseCallbacks").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: '<?php echo base_url('users/ajax') ?>?rule=ReleaseCallback',
                data: form.serialize(), // serializes the form's elements.
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
                        $('.close').click();
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


        });
        
        
        
        $(document).on('click','#ResetItem',function(){
            $('#user_id').val(null).trigger('change');
            $('#campaign_id').val(null).trigger('change');
            $('#PhoneNumber').removeAttr('value');
            $('#CustomerID').removeAttr('value');
            $('#StartCallback').removeAttr('value');
            $('#EndCallback').removeAttr('value');
        });
        
        
        
    </script>
<?php } ?>
