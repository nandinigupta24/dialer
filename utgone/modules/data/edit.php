<?php if (!checkRole('data', 'edit')) {
    no_permission();
} else { ?>
    <?php
    $ListID = $_GET['list_id'];
    $start = $end = date('Y-m-d');
    
    $ListInformation = $database->get('vicidial_lists', '*', ['list_id' => $ListID]);
    
    admin_log_insert($database, @$_SESSION['Login']['user'], 'LISTS', 'MODIFY', $ListID, 'MODIFY-VIEW', $database->last(), 'MODIFY VIEW LISTS', '--All--');
    
    $CampaignListings = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'],['campaign_id'=>$_SESSION['CurrentLogin']['Campaign']]);
    
    $rateSql = "select a.list_id as list_id,sum(a.Calls) as Calls,sum(a.Connects) as Connects,ROUND(Connects/Calls*100,2) as ConnectRate,sum(a.DMCs) as DMCs,ROUND(DMCs/Connects*100,2) as DMCRate,
sum(a.Sales) as Sales,ROUND(Sales/DMCs*100,2) as ConversionRate,sum(Completed) as Completed,sum(ManDials) as ManDials,sum(Drops) as Drops,ROUND((Drops/Calls)*100,2) as DROP_Percentage,
sum(a.A) as A,ROUND((a.A/a.Calls)*100,2) as A_Percentage,sum(a.Not_Answer) as Not_Answer,ROUND((Not_Answer/Calls)*100,2) as NA_Percentage
from
(select VC.list_id,
sum(case when VC.status is not null and (VC.comments NOT IN ('CHAT','EMAIL') OR VC.comments IS NULL) then 1 else 0 end) as Calls,
sum(case when VC.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
sum(case when VC.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
sum(case when VC.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
sum(case when VC.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
sum(case when VC.comments='MANUAL' then 1 else 0 end) as ManDials,
sum(case when VC.status='DROP' then 1 else 0 end) as Drops,
sum(case when VC.status='A' then 1 else 0 end) as A,
sum(case when VC.status='NA' then 1 else 0 end) as Not_Answer
from vicidial_closer_log VC
WHERE (VC.call_date  between '".$start." 00:00:00' and '".$end." 23:23:23') 
#AND VC.user != 'VDAD' 
group by VC.list_id 
union
select VL.list_id,
sum(case when VL.status is not null and (VL.comments NOT IN ('CHAT','EMAIL') OR VL.comments IS NULL) then 1 else 0 end) as Calls,
sum(case when VL.status in (select status from vicidial_campaign_statuses where human_answered = 'Y') then 1 else 0 end) as Connects,
sum(case when VL.status in (select status from vicidial_campaign_statuses where customer_contact = 'Y') then 1 else 0 end) as DMCs,
sum(case when VL.status in (select status from vicidial_campaign_statuses where Sale = 'Y') then 1 else 0 end) as Sales,
sum(case when VL.status in (select status from vicidial_campaign_statuses where completed = 'Y') then 1 else 0 end) as Completed,
sum(case when VL.comments='MANUAL' then 1 else 0 end) as ManDials,
sum(case when VL.status='DROP' then 1 else 0 end) as Drops,
sum(case when VL.status='A' then 1 else 0 end) as A,
sum(case when VL.status='NA' then 1 else 0 end) as Not_Answer
from vicidial_log VL
WHERE (VL.call_date  between '".$start." 00:00:00' and '".$end." 23:23:23')
#AND VL.user != 'VDAD' 
group by VL.list_id) a
where a.list_id = '".$ListID."'
group by a.list_id";
    
    $statistics = $database->query($rateSql)->fetchAll(PDO::FETCH_ASSOC);
    
    $statistics = $statistics[0];
    ?>
    <input type="hidden" name="list_id" id="list_id" value="<?php echo $ListID; ?>"/>
    <div class="content-wrapper">
        
        <section class="content">
            <div id="widget-dropdown" class="row">
                <!--            <div class="col-xl-2 col-md-6 col-6">
                           small box
                          <div class="small-box ">
                            <div class="inner">
                              <h3>255</h3>

                              <p>New Orders</p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-phone"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
                          </div>
                        </div>-->

                <div class="col-sm-1">

                </div>
                <div class="col-sm-2">
                    <!-- small box -->
                    <div class="small-box">
                        <div class="inner">
                            <h3 class="text-grey"><?php echo (!empty($statistics['Calls']) && $statistics['Calls']) ? $statistics['Calls'] : 0; ?></h3>

                            <p>Call Made</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-phone text-grey"></i>
                        </div>
             <!--           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                    </div>
                </div>

                <div class="col-sm-2">
                    <!-- small box -->
                    <div class="small-box">
                        <div class="inner">
                            <h3 class="text-green"><?php echo (!empty($statistics['Connects']) && $statistics['Connects']) ? $statistics['Connects'] : 0; ?></h3>

                            <p>Connects</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-phone-square text-green"></i>
                        </div>
             <!--           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                    </div>
                </div>

                <div class="col-sm-2">
                    <!-- small box -->
                    <div class="small-box">
                        <div class="inner">
                            <h3 class="text-blue"><?php echo (!empty($statistics['DMCs']) && $statistics['DMCs']) ? $statistics['DMCs'] : 0; ?></h3>

                            <p>DMC's</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users text-blue"></i>
                        </div>
             <!--           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                    </div>
                </div>
                <div class="col-sm-2">
                    <!-- small box -->
                    <div class="small-box">
                        <div class="inner">
                            <h3 class="text-orange"><?php echo (!empty($statistics['Drops']) && $statistics['Drops']) ? $statistics['Drops'] : 0; ?></h3>

                            <p>Drops</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-warning text-orange"></i>
                        </div>
             <!--           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                    </div>
                </div>
                <div class="col-sm-2">
                    <!-- small box -->
                    <div class="small-box">
                        <div class="inner">
                            <h3 class="text-green"><?php echo (!empty($statistics['Sales']) && $statistics['Sales']) ? $statistics['Sales'] : 0; ?></h3>

                            <p>Sales</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money text-green"></i>
                        </div>
             <!--           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>-->
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"><i class="fa fa-list"></i> Data List: <?php echo $ListInformation['list_name']; ?></span>
                            <ul class="nav nav-tabs justify-content-end pull-right" role="tablist">
                                <li class="nav-item"><a href="#tab1" class="nav-link active show" data-content="Quickly see what is happening with this Data List." rel="popover" data-placement="top" data-original-title="Data List Summary Dashboard" data-trigger="hover" data-toggle="tab" role="tab" aria-selected="true"><i class="fa fa-dashboard"></i></a></li>
                                <li class="nav-item"><a href="#tab2" class="nav-link" data-content="Manage all your data list settings from this page." rel="popover" data-placement="top" data-original-title="Data List Settings" data-trigger="hover" data-toggle="tab" role="tab" aria-selected="true"><i class="fa fa-gears"></i></a></li>
                                <li class="nav-item"><a href="#tab3" class="nav-link" data-content="Manage all your custom fields from this page." rel="popover" data-placement="top" data-original-title="Custom Fields Settings" data-trigger="hover" data-toggle="tab" role="tab" aria-selected="true"><i class="fa fa-list-ol"></i></a></li>
                                <li class="nav-item"><a href="#tab4" class="nav-link" data-content="Manage Data Outbound Numbers" rel="popover" data-placement="left" data-original-title="Data Outbound Numbers" data-trigger="hover" data-toggle="tab" role="tab" aria-selected="true"><i class="fa fa-mobile"></i></a></li>
                            </ul>
                        </div>
                        <div class="panel-body pn">
                            <div class="tab-content border-none pn">
                                <div id="tab1" class="tab-pane p15 active">
    <?php require 'dashboard_files/home.php'; ?>
                                </div>

                                <div id="tab2" class="tab-pane p15">
    <?php require 'dashboard_files/setting.php'; ?>
                                </div>

                                <div id="tab3" class="tab-pane p20">
    <?php require 'dashboard_files/custom.php'; ?>
                                </div>

                                <div id="tab4" class="tab-pane p15">
    <?php require 'dashboard_files/outbound.php'; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- END CONTENT -->

            </div>
        </section>
    </div>

    <script>
        $('#StatusReportTable').DataTable({
            dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]});

        $(document).on('focusout', '#list_settings_form input', function () {
            var FormData = $('#list_settings_form').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('data/ajax') ?>?rule=ListDetailUpdate',
                data: FormData,
                success: function (data)
                {
                    var result = JSON.parse(data);
                    if (result.success === 1) {
                        $.toast({
                            heading: 'Welcome To UTG Dialer',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
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
        $(document).on('change', '#list_settings_form select', function () {
            var FormData = $('#list_settings_form').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('data/ajax') ?>?rule=ListDetailUpdate',
                data: FormData,
                success: function (data)
                {
                    var result = JSON.parse(data);
                    if (result.success === 1) {
                        $.toast({
                            heading: 'Welcome To UTG Dialer',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
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
        $(document).on('click', '.SwitchBTN', function () {
            if ($(this).hasClass('active')) {
                $(this).parent().find('input').val('Y');
            } else {
                $(this).parent().find('input').val('N');
            }
            var FormData = $('#list_settings_form').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('data/ajax') ?>?rule=ListDetailUpdate',
                data: FormData,
                success: function (data)
                {
                    var result = JSON.parse(data);
                    if (result.success === 1) {
                        $.toast({
                            heading: 'Welcome To UTG Dialer',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
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
        $(document).on('click', '.audio-upload', function (e) {
            var title = $(this).attr('data-title');
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('uploadmusic/ajax') ?>',
                data: {},
                success: function (resp) {
                    dialog = $.dialog({
                        title: title,
                        content: resp,
                        // type: 'blue',
                        animation: 'scale',
                        columnClass: 'small',
                        closeAnimation: 'scale',
                        backgroundDismiss: true,
                    });
                }
            });

        });// popup



        $(document).on('submit', '#FormuploadMusic', function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var form = $('#FormuploadMusic')[0];

            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=AudioUpload',
                data: data,
                enctype: 'multipart/form-data',
                processData: false, // Important!
                contentType: false,
                cache: false,
                success: function (data) {
                    alert(data)
                }
            });
        });
        $(document).on('submit', '#addCLIForm', function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('data/ajax') ?>?rule=CLI',
                data: formData,
                success: function (data) {
                    var result = JSON.parse(data);
                    if (result.success === 1) {
                        $.toast({
                            heading: 'Welcome To UTG Dialer',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
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
        
    </script>
<?php } ?>
