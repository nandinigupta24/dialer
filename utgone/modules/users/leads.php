<?php if(!checkRole('users', 'view')){ no_permission(); } else {?>
    <?php $leadID = $_GET['lead_id']; ?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <?php
        $LeadInformation = $database->get('vicidial_list', '*', ['lead_id' => $leadID]);

        $ListDetail = $database->get('vicidial_lists','*',['list_id'=>$LeadInformation['list_id']]);

        $ListListings = $database->select('vicidial_lists', ['list_name', 'list_id'],['AND'=>['active'=>'Y','campaign_id'=>$ListDetail['campaign_id']]]);
        
        $StatusListings = $database->query("SELECT * FROM `vicidial_campaign_statuses` where campaign_id is NULL OR campaign_id = ".$ListDetail['campaign_id'])->fetchAll(PDO::FETCH_ASSOC);
        
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading"> <span class="panel-title"><i class="fa fa-list"></i> Lead ID: <?php echo $leadID; ?></span>
                        <ul class="nav panel-tabs">
                            <li class="active"><a href="#tab2" class="setting_icon" title="Edit Lead Details" rel="popover" data-placement="top" data-original-title="Lead Details" data-trigger="hover" data-toggle="tab"><i class="fa fa-bars"></i></a></li>
                            <li class=""><a href="#tab6" class="setting_icon" title="Edit Custom Fields" rel="popover" data-placement="top" data-original-title="Custom Fields Details" data-trigger="hover" data-toggle="tab"><i class="fa fa-tasks"></i></a></li>
                            <li class=""><a href="#tab3" class="setting_icon" title="Get All Call Recordings For This Lead" rel="popover" data-placement="top" data-original-title="Get All Call Recordings For This Lead" data-trigger="hover" data-toggle="tab"><i class="fa fa-file-audio-o"></i></a></li>
                            <li class=""><a href="#tab4"  class="setting_icon" title="View All Outbound Calls Made To This Lead" rel="popover" data-placement="top" data-original-title="Calls" data-trigger="hover" data-toggle="tab"><i class="fa fa-arrow-up"></i></a></li>
                            <li class=""><a href="#tab7" class="setting_icon" title="View All Inbound Calls Made To This Lead" rel="popover" data-placement="top" data-original-title="Calls" data-trigger="hover" data-toggle="tab"><i class="fa fa-arrow-down"></i></a></li>
                            <li class=""><a href="#tab5"  class="setting_icon" title="View All Callbacks Set For This Lead" rel="popover" data-placement="top" data-original-title="Callbacks" data-trigger="hover" data-toggle="tab"><i class="fa fa-bell"></i></a></li>
                            <li><a href="#tab8" class="setting_icon" title="View All Chats For This Lead" rel="popover" data-placement="top" data-original-title="Chats" data-trigger="hover" data-toggle="tab"><i class="fa fa-comments"></i></a></li>
                        </ul>
                    </div>
                    <div class="panel-body pn">
                        <div class="tab-content border-none pn">
                            <div id="tab2" class="tab-pane p15 active">
                                <?php require 'lead_details_files/detail.php'; ?>
                            </div>

                            <div id="tab3" class="tab-pane p15 ">
                                <?php require 'lead_details_files/recordings.php'; ?>
                            </div>

                            <div id="tab4" class="tab-pane p15">
                                <?php require 'lead_details_files/outbound.php'; ?>
                            </div>

                            <div id="tab5" class="tab-pane p15">
                                <?php require 'lead_details_files/callback.php'; ?>
                            </div>

                            <div id="tab7" class="tab-pane p15">
                                <?php require 'lead_details_files/inbound.php'; ?>
                            </div>

                            <div id="tab6" class="tab-pane  p15 ">
                                <?php require 'lead_details_files/custom.php'; ?>
                            </div>

                            <div id="tab8" class="tab-pane  p15">
                                <?php require 'lead_details_files/chat.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $('.panel-tabs').on('click', 'li', function() {
        $('.panel-tabs li.active').removeClass('active');
        $(this).addClass('active');
    });
</script>
<?php } ?>
