<?php 
$QueryStatus = "select Status,LeadCount,CC0,CC1,CC2,CC3,CC4,CC5,CC6,CC7,CC8,
CC9,CC10,CC11
from 
(select l.status as Status,
sum(case when l.lead_id is not null then 1 else 0 end) as LeadCount,
sum(case when l.called_count = '0' then 1 else 0 end) as CC0,
sum(case when l.called_count = '1' then 1 else 0 end) as CC1,
sum(case when l.called_count = '2' then 1 else 0 end) as CC2,
sum(case when l.called_count = '3' then 1 else 0 end) as CC3,
sum(case when l.called_count = '4' then 1 else 0 end) as CC4,
sum(case when l.called_count = '5' then 1 else 0 end) as CC5,
sum(case when l.called_count = '6' then 1 else 0 end) as CC6,
sum(case when l.called_count = '7' then 1 else 0 end) as CC7,
sum(case when l.called_count = '8' then 1 else 0 end) as CC8,
sum(case when l.called_count = '9' then 1 else 0 end) as CC9,
sum(case when l.called_count = '10' then 1 else 0 end) as CC10,
sum(case when l.called_count > '10' then 1 else 0 end) as CC11
from vicidial_list l where l.last_local_call_time BETWEEN  '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59' AND l.list_id = '".$ListInformation['list_id']."' group by l.status
) a";

$StatusReport = $DBAsterisk->query($QueryStatus)->fetchAll();

//$CampaignGroup = $database->get('vicidial_campaigns',['dial_method'],['campaign_id'=>$ListInformation['campaign_id']]);
//if($CampaignGroup == 'INBOUND_MAN'){
//   $table = 'vicidial' 
//}

?>
<div class="row">
    <div class="col-lg-8">
        <h4 class="text-uppercase mbn"> Status Report <small>(CC = Called Count)</small> </h4>
        <h6 class="mb15"> Summary of statuses in this list. </h6>
        <div class="table-responsive">
          
            <table class="table table-bordered table-hovered" id="StatusReportTable">
                <thead>
                    <tr>
                        <td>Status</td>
                        <td>Lead Count</td>
                        <td>Dialable Count</td>
                        <td>CC0</td>
                        <td>CC1</td>
                        <td>CC2</td>
                        <td>CC3</td>
                        <td>CC4</td>
                        <td>CC5</td>
                        <td>CC6</td>
                        <td>CC7</td>
                        <td>CC8</td>
                        <td>CC9</td>
                        <td>CC10</td>
                        <td>CC10+</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($StatusReport as $report){?>
                    <tr>
                        <td><?php echo $report['Status'];?></td>
                        <td><?php echo $report['LeadCount'];?></td>
                        <td>--</td>
                        <td><?php echo $report['CC0'];?></td>
                        <td><?php echo $report['CC1'];?></td>
                        <td><?php echo $report['CC2'];?></td>
                        <td><?php echo $report['CC3'];?></td>
                        <td><?php echo $report['CC4'];?></td>
                        <td><?php echo $report['CC5'];?></td>
                        <td><?php echo $report['CC6'];?></td>
                        <td><?php echo $report['CC7'];?></td>
                        <td><?php echo $report['CC8'];?></td>
                        <td><?php echo $report['CC9'];?></td>
                        <td><?php echo $report['CC10'];?></td>
                        <td><?php echo $report['CC11'];?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>

    </div>
    <div class="col-lg-4 visible-lg pl5">
        <h4 class="text-uppercase mbn"> Today's Statistics </h4>
        <h6 class="mb15"> Summary of your campaign performance.</h6>
        <div class="small mb5"> Connect Rate <small id="cr_text">(<?php echo $statistics['ConnectRate'];?>%)</small></div>
        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-default progress-bar-striped progress-bar-animated" id="cr_div" role="progressbar" aria-valuenow="<?php echo $statistics['ConnectRate'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $statistics['ConnectRate'];?>%;"></div>
        </div>
        <div class="small mb5"> DMC Rate <small id="dmc_text">(<?php echo $statistics['DMCRate'];?>%)</small></div>
        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-info progress-bar-striped progress-bar-animated" id="dmc_div" role="progressbar" aria-valuenow="<?php echo $statistics['DMCRate'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $statistics['DMCRate'];?>%;"></div>
        </div>
        <div class="small mb5"> Drop Rate <small id="d_text">(<?php echo $statistics['DROP_Percentage'];?>%)</small></div>
        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-warning progress-bar-striped progress-bar-animated" id="d_div" role="progressbar" aria-valuenow="<?php echo $statistics['DROP_Percentage'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $statistics['DROP_Percentage'];?>%;"></div>
        </div>
        <div class="small mb5"> Sales Conversion <small id="sc_text">(<?php echo $statistics['ConversionRate'];?>%)</small></div>
        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-success progress-bar-striped progress-bar-animated" id="sc_div" role="progressbar" aria-valuenow="<?php echo $statistics['ConversionRate'];?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $statistics['ConversionRate'];?>%;"></div>
        </div>
        <div class="small mb5"> No Answer <small id="na_text">(<?php echo $statistics['NA_Percentage'];?>%)</small></div>
        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-primary progress-bar-striped progress-bar-animated" id="na_div" role="progressbar" aria-valuenow="<?php echo $statistics['NA_Percentage'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $statistics['NA_Percentage'];?>%;"></div>
        </div>
        <div class="small mb5"> Answering Machines <small id="am_text">(<?php echo $statistics['A_Percentage'];?>%)</small></div>
        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-danger progress-bar-striped progress-bar-animated" id="am_div" role="progressbar" aria-valuenow="<?php echo $statistics['A_Percentage'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $statistics['A_Percentage'];?>%;"></div>
        </div>
    </div>
</div>