<?php

if(!empty($_GET['start']) && !empty($_GET['end'])){
    $start = $_GET['start'];
    $end = $_GET['end'];
}else{
    $start = $end = date('Y-m-d');
}
$query = "SELECT * FROM vicidial_closer_log WHERE comments='CHAT' AND lead_id = '" . $_GET['lead_id'] . "' AND uniqueid = '" . $_GET['U_ID'] . "'";

$data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

$ChatID = $database->get('vicidial_chat_archive', 'chat_id', ['lead_id' => $_GET['lead_id'], 'ORDER' => ['chat_id' => 'DESC']]);

$ChatConversation = $database->select('vicidial_chat_log_archive', '*', ['chat_id' => $ChatID, 'ORDER' => ['message_time' => 'ASC']]);

if(!empty($_GET['group_id']) && $_GET['group_id']){
    $Query = "SELECT VCA.chat_id,VCA.chat_start_time,VCA.status,VCA.chat_creator,VCA.group_id,VCA.lead_id,VL.phone_number,VL.first_name,VL.last_name FROM vicidial_chat_archive VCA JOIN vicidial_list VL ON VL.lead_id = VCA.lead_id WHERE VCA.chat_start_time BETWEEN '".$start." 00:00:00' AND '".$end." 23:59:59' AND VCA.group_id='".$_GET['group_id']."'";
}else{
    $Query = "SELECT VCA.chat_id,VCA.chat_start_time,VCA.status,VCA.chat_creator,VCA.group_id,VCA.lead_id,VL.phone_number,VL.first_name,VL.last_name FROM vicidial_chat_archive VCA JOIN vicidial_list VL ON VL.lead_id = VCA.lead_id WHERE VCA.chat_start_time BETWEEN '".$start." 00:00:00' AND '".$end." 23:59:59'";
}

$ChatLeft = $database->query($Query)->fetchAll(PDO::FETCH_ASSOC);



$QueryGroup = "SELECT group_id,count(*) as total FROM vicidial_chat_archive WHERE chat_start_time BETWEEN '".$start." 00:00:00' AND '".$end." 23:59:59' group by group_id";
$ChatGroup = $database->query($QueryGroup)->fetchAll(PDO::FETCH_ASSOC);

?>
<link href="<?php echo publicAssest(); ?>assets/css/report-chat.css" type="text/css" rel="stylesheet" />
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="app-main__inner box" style="background:#fff; width:100%;">
                <div class="app-inner-layout chat-layout">
                    <div class="app-inner-layout__header text-white bg-premium-dark">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon"><i class="fa fa-comments-o"></i></div>
                                    <div>
                                        Chat
                                        <div class="page-title-subheading">Chat History</div>
                                        
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <div class="d-inline-block dropdown">
                                        <a type="button" id="daterange-btn">
                                        <span>
                                            <i class="fa fa-calendar text-success"></i> &nbsp;&nbsp;<?php echo date('F d,Y',strtotime($start)).' - '.date('F d,Y',strtotime($end));?>
                                        </span>
                                        <i class="fa fa-caret-down"></i>
                                    </a>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                        <div class="d-inline-block dropdown">
                                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-business-time fa-w-20"></i>
                                            </span>
                                                SELECT CHAT GROUP
                                            </button>
                                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                                <ul class="nav flex-column">
                                                    <?php foreach($ChatGroup as $Group){?>
                                                    <li class="nav-item">
                                                        <a href="<?php echo base_url('chat/conversation').'?group_id='.$Group['group_id'].'&start='.$start.'&end='.$end; ?>" class="nav-link">
                                                            <i class="nav-link-icon fa fa-inbox"></i>
                                                            <span><?php echo $Group['group_id'];?></span>
                                                            <div class="ml-auto badge badge-pill badge-secondary"><?php echo $Group['total'];?></div>
                                                        </a>
                                                    </li>
                                                    <?php }?>
                                                </ul>
                                               
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-inner-layout__wrapper">
                        <div class="app-inner-layout__sidebar card col-md-3">
                            <div class="app-inner-layout__sidebar-header">
                                <ul class="nav flex-column">
                                    <li class="pt-4 pl-3 pr-3 pb-3 nav-item">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-search"></i>
                                                </div>
                                            </div>
                                            <input placeholder="Search..." type="text" class="form-control" id="SearchText"></div>
                                    </li>
                                    <li class="nav-item-header nav-item"><strong>Chat Visitors</strong></li>
                                </ul>
                            </div>
                            <div style="height:540px; overflow:scroll; overflow-x:hidden;">
                                
                                <ul class="nav flex-column">
                                    <?php foreach($ChatLeft as $LeftChat){?>
                                    <li class="nav-item SearchChatList" ChatID = "<?php echo $LeftChat['chat_id'];?>">
                                        <button type="button" tabindex="0" class="dropdown-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="avatar-icon-wrapper">
                                                            <div class="badge badge-bottom badge-success badge-dot badge-dot-lg"></div>
                                                            <div class="avatar-icon"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_xYcu1F3V8jUPLpTqKElGegnGT_WNOTmbLDVFVJP7UQX8aKrpig&s" alt=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading"><?php echo @$LeftChat['first_name'].' '.@$LeftChat['last_name'].' - '.$LeftChat['chat_id'];?></div>
                                                        
                                                        <?php 
                                                        $ChatConversation = $database->get('vicidial_chat_log_archive', 'message', ['chat_id' => $LeftChat['chat_id'], 'ORDER' => ['message_row_id' => 'ASC']]);
                                                        ?>
                                                        <div class="widget-subheading"><?php echo substr(strip_tags($ChatConversation),0,45);?>...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>

                        </div>

                        <div class="app-inner-layout__content col-md-6" id="ChatArea">

                        </div>

                        <div class="app-inner-layout__sidebar-right col-md-3" style="background: #f8f9fa;">

                            <div style="height:635px; overflow:scroll; overflow-x:auto; width:100%">
                                <div class="">
                                    <div class="app-inner-layout__sidebar-header" id="SidebarRight">

                                    </div>
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
    $(function () {
        "use strict";
    })
    
    $(function(){

    $('#SearchText').keyup(function(){
        
        var searchText = $(this).val();
        
        $('.SearchChatList').each(function(){
            
            var currentLiText = $(this).text(),
                showCurrentLi = currentLiText.indexOf(searchText) !== -1;
            
            $(this).toggle(showCurrentLi);
            
        });     
    });

});

$('#daterange-btn').daterangepicker({
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
                window.location.href = "<?php echo base_url('chat/conversation') ?>?start=" + start + "&end=" + end;
            }
);


$(document).ready(function(){
   $('.SearchChatList').click(function(){
      var ChatID = $(this).attr('ChatID');
      $.ajax({
            type: 'post',
            url: "<?php echo base_url('chat/ajax').'?action=chatfind' ?>",
            data: {ChatID:ChatID},
            success: function (data) {
              $('#ChatArea').html(data);
              
              $.ajax({
                type: 'post',
                url: "<?php echo base_url('chat/ajax').'?action=SidebarRight' ?>",
                data: {ChatID:ChatID},
                success: function (data) {
                  $('#SidebarRight').html(data);
                }
            });
              
              
            }
          });
   }); 
   
   $('.SearchChatList:first-child').trigger('click');
});

</script>
