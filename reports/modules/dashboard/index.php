<div class="content-wrapper">
    <?php
 
$stmt="SELECT user_id,user,pass,full_name,user_level from vicidial_users where user='$PHP_AUTH_USER';";
$rslt=mysql_to_mysqli($stmt, $link);
$row=mysqli_fetch_row($rslt);

$LOGuser_level = $row[4];
// if ( $LOGuser_level >=8 ){

$stmt="SELECT closer_campaigns from vicidial_campaigns;";
		$rslt=mysql_to_mysqli($stmt, $link);
		$row=mysqli_fetch_row($rslt);
		$closer_campaigns = preg_replace("/^ | -$/","",$row[0]);
		$closer_campaigns = preg_replace("/ /","','",$closer_campaigns);
		$closer_campaigns = "'$closer_campaigns'";

		$stmt="SELECT status from vicidial_auto_calls where status NOT IN('XFER') and ( (call_type='IN' and campaign_id IN($closer_campaigns)) or (call_type='OUT') );";
		$rslt=mysql_to_mysqli($stmt, $link);
		$active_calls=mysqli_num_rows($rslt);
		$ringing_calls=0;
		if ($active_calls>0)
			{
			while ($row=mysqli_fetch_row($rslt))
				{
				if (!preg_match("/LIVE|CLOSER/i",$row[0]))
					{$ringing_calls++;}
				}
			}

		$active_stmt="SELECT active from vicidial_users";
        $active_rslt=mysql_to_mysqli($active_stmt, $link);
        $users = [];
		while ($active_row=mysqli_fetch_array($active_rslt))
			{
                if(!isset($users[$active_row["active"]])) $users[$active_row["active"]] = 0;
			$users[$active_row["active"]]++;
			}

		$active_stmt="SELECT active from vicidial_campaigns";
		$active_rslt=mysql_to_mysqli($active_stmt, $link);
        $campaigns = [];
        while ($active_row=mysqli_fetch_array($active_rslt))
			{
                if(!isset($campaigns[$active_row["active"]])) $campaigns[$active_row["active"]] = 0;
			$campaigns[$active_row["active"]]++;
			}

		$active_stmt="SELECT active from vicidial_lists";
		$active_rslt=mysql_to_mysqli($active_stmt, $link);
        $lists = [];
        while ($active_row=mysqli_fetch_array($active_rslt))
			{
                if(!isset($lists[$active_row["active"]])) $lists[$active_row["active"]] = 0;
			$lists[$active_row["active"]]++;
			}

		$active_stmt="SELECT did_active from vicidial_inbound_dids";
		$active_rslt=mysql_to_mysqli($active_stmt, $link);
        $dids = [];
        while ($active_row=mysqli_fetch_array($active_rslt))
			{
                if(!isset($dids[$active_row["did_active"]])) $dids[$active_row["did_active"]] = 0;
			$dids[$active_row["did_active"]]++;
			}

		$active_stmt="SELECT active from vicidial_inbound_groups";
        $active_rslt=mysql_to_mysqli($active_stmt, $link);
        $ingroups = [];
		while ($active_row=mysqli_fetch_array($active_rslt))
			{
                if(!isset($ingroups[$active_row["active"]])) $ingroups[$active_row["active"]] = 0;
			$ingroups[$active_row["active"]]++;
			}

		$stmt="SELECT extension,user,conf_exten,status,server_ip,UNIX_TIMESTAMP(last_call_time),UNIX_TIMESTAMP(last_call_finish),call_server_ip,campaign_id from vicidial_live_agents WHERE campaign_id IN ('".implode("','",$_SESSION['CurrentLogin']['CampaignID'])."')";
//		$stmt="SELECT extension,user,conf_exten,status,server_ip,UNIX_TIMESTAMP(last_call_time),UNIX_TIMESTAMP(last_call_finish),call_server_ip,campaign_id from vicidial_live_agents";
		
                $rslt=mysql_to_mysqli($stmt, $link);
		$agent_incall=0; $agent_total=0;
		while($row=mysqli_fetch_array($rslt))
			{
			$status=$row[3];
			$agent_total++;
			if ( (preg_match("/INCALL/i",$status)) or (preg_match("/QUEUE/i",$status)) ) {$agent_incall++; }
            }

		if (preg_match("/MXAG/", isset($SShosted_settings) && $SShosted_settings))
			{
			$vla_set = $SShosted_settings;
			$vla_set = preg_replace("/.*MXAG|_BUILD_|DRA| /",'',$vla_set);
			$vla_set = preg_replace('/[^0-9]/','',$vla_set);
			if (strlen($vla_set)>0)
				{
				$AAf=''; $AAb='';
				if ($agent_total >= $vla_set)
					{$AAf='<font color=red>'; $AAb='<font>';}
				$agent_total = "$AAf$agent_total / $vla_set$AAb";
				}
			}



		// }
	?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xl-3 col-md-6 col-12">
          	<div class="box box-body bg-primary">
                <h6 class="text-uppercase">Agents Logged In</h6>
                <div class="flexbox mt-2">
                  <span class="fa fa-sign-in font-size-40"></span>
                  <span class=" font-size-30"><?php echo $agent_total;?></span>
                </div>
              </div>
            </div>

            <!-- /.col -->
            <div class="col-xl-3 col-md-6 col-12">
                <div class="box box-body bg-info">
                    <h6 class="text-uppercase">Agents In Calls</h6>
                    <div class="flexbox mt-2">
                        <span class="fa fa-sign-in font-size-40"></span>
                        <span class=" font-size-30"><?php echo $agent_incall;?></span>
                    </div>
                </div>
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-xl-3 col-md-6 col-12">
                <div class="box box-body bg-success">
                    <h6 class="text-uppercase">Active Calls</h6>
                    <div class="flexbox mt-2">
                        <span class="fa fa-phone font-size-40"></span>
                        <span class=" font-size-30"><?php echo $active_calls;?></span>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xl-3 col-md-6 col-12">
                <div class="box box-body bg-warning">
                    <h6 class="text-uppercase">Calls Ringing</h6>
                    <div class="flexbox mt-2">
                        <span class="fa fa-volume-control-phone font-size-40"></span>
                        <span class=" font-size-30"><?php echo $ringing_calls;?></span>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!--Inbound Calls-->

        <!--END Inbound Calls-->
        <div class="row">

            <div class="col-12 col-lg-6">
                <!-- AREA CHART -->
                <div class="box">
                    <div class="box-header with-border bg-info">
                        <h4 class="box-title">Last 10 Day Total Call Count IN and OUT</h4>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="chart_2_2" height="120"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-12 col-lg-6">
                <!-- AREA CHART -->
                <div class="box">
                    <div class="box-header with-border bg-warning">
                        <h4 class="box-title">Last 10 Day Agents Count</h4>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="InboundCall" height="120"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-12 col-lg-6">
                <!-- AREA CHART -->
                <div class="box">
                    <div class="box-header with-border bg-danger">
                        <h4 class="box-title">Inbound Calls</h4>
                    </div>
                    <div class="box-body">
                        <div class="chart-responsive">
                            <div class="chart" id="bar-chart_1" style="height: 300px;"></div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-12 col-lg-6">
                <!-- AREA CHART -->
                <div class="box">
                    <div class="box-header with-border bg-success">
                        <h4 class="box-title">Outbound Calls</h4>
                    </div>
                    <div class="box-body">
                        <div class="chart-responsive">
                            <div class="chart" id="bar-chart_2" style="height: 300px;"></div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>


            <div class="col-md-6">
                <div class="box">
                    <div class="box-header ">
                        <h4 class="box-title"><strong>Overall Report</strong></h4>
                    </div>
                    <div class="box-body">
                        <?php
                        
                        $MenuList = ['Campaign'=>'vicidial_campaigns','List'=>'vicidial_lists','User'=>'vicidial_users'];
                        
                        $MenuConditionList = [];
                        $MenuConditionList['Campaign'] = " WHERE campaign_id IN ('".implode("','",$_SESSION['CurrentLogin']['Campaign'])."')";
                        $MenuConditionList['List'] = " WHERE campaign_id IN ('".implode("','",$_SESSION['CurrentLogin']['Campaign'])."')";
                        $MenuConditionList['User'] = " WHERE user_group = '".$_SESSION['CurrentLogin']['user_group']."'";
                        
                        ?>
                        <table class="table table-bordered">
                            <thead class="bg-info">
                                <tr>
                                    <th>Menu</th>
                                    <th>Active</th>
                                    <th>Inactive</th>
                                    <th>Total</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($MenuList as $key=>$listMenu){
                                    $query = "SELECT 
  COUNT(CASE WHEN active='Y' THEN 1 ELSE NULL END) as 'Active',
  COUNT(CASE WHEN active='N' THEN 1 ELSE NULL END) as 'Inactive',
  COUNT(*) as total 
FROM ".$listMenu.$MenuConditionList[$key];
                        $data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                <tr>
                                    <th><?php echo $key;?></th>
                                    <td><?php echo @$data[0]['Active'];?></td>
                                    <td><?php echo @$data[0]['Inactive'];?></td>
                                    <th><?php echo @$data[0]['total'];?></th>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-12 col-lg-6">
          <!-- AREA CHART -->
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Inbound Groups (CogentPSP & CogentBureau1)</h4>
				<ul class="box-controls pull-right">
                  <li><a class="box-btn-close" href="#"></a></li>
                  <li><a class="box-btn-slide" href="#"></a></li>	
                  <li><a class="box-btn-fullscreen" href="#"></a></li>
                </ul>
            </div>
            <div class="box-body">
              <div class="chart-responsive">
                <div class="chart" id="bar-chart" style="height: 300px;"></div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->			
        </div>	
           
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Server Report</h4>
                    </div>
                    <div class="box-body">
                        <?php 
                        $data = $database->query("SELECT server_id,server_description,server_ip,active,sysload,channels_total,cpu_idle_percent,disk_usage,active_agent_login_server,active_asterisk_server,svn_revision from servers order by server_id")->fetchAll(PDO::FETCH_ASSOC);
                        $web_u_time = date('U');
                        
                        ?>
                        <table class="table table-bordered">
                            <thead class="bg-brown">
                                <tr>
                                    <th>Server</th>
                                    <th>Descritpion</th>
                                    <th>IP</th>
                                    <th>Status</th>
                                    <th>Login Server</th>
                                    <th>Asterisk Server</th>
                                    <th>LOAD</th>
                                    <th>CHAN</th>
                                    <th>Time</th>
                                    <th>Disk</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $count = 0;
                                foreach($data as $server){
                                    $UTIme = $web_u_time;
                                    $cpu = (100 - $server['cpu_idle_percent']);
                                    $disk = '';
                                    $disk_ary = explode('|',$server['disk_usage']);
                                    $disk_ary_ct = count($disk_ary);
                                    $k=0;
                                    while ($k < $disk_ary_ct)
                                            {
                                            $disk_ary[$k] = preg_replace("/^\d* /","",$disk_ary[$k]);
                                            if ($k<1) {$disk = "$disk_ary[$k]";}
                                            else
                                                    {
                                                    if ($disk_ary[$k] > $disk) {$disk = "$disk_ary[$k]";}
                                                    }
                                            $k++;
                                            }
                                    $disk = "$disk%";
                                
                                    $Agent = $database->count('vicidial_live_agents',['server_ip'=>$server['server_ip']]);
                                    $class = 'bg-pale-cyan';
                                    if($count == 0){
                                       $class = 'bg-pale-warning'; 
                                    }
                                    $count++;
                                    
                                    $ServerActiveClass = 'label-danger';
                                    if($server['active'] == 'Y'){
                                        $ServerActiveClass = 'label-success';
                                    }
                                    
                                    $ActiveAgentLoginDServerClass = 'label-danger';
                                    if($server['active_agent_login_server'] == 'Y'){
                                        $ActiveAgentLoginDServerClass = 'label-success';
                                    }
                                    
                                    $ActiveAsteriskServerClass = 'label-danger';
                                    if($server['active_asterisk_server'] == 'Y'){
                                        $ActiveAsteriskServerClass = 'label-success';
                                    }
                                    $STime = $database->query("SELECT last_update,UNIX_TIMESTAMP(last_update) as LastUpdateTime,UNIX_TIMESTAMP(db_time) from server_updater where server_ip='".$server['server_ip']."'")->fetchAll(PDO::FETCH_ASSOC);
                                    if(!empty($STime[0]['LastUpdateTime']) && $STime[0]['LastUpdateTime']){
                                        $UTIme = (@$STime[0]['LastUpdateTime'] + 10);
                                    }
                                    if ($web_u_time > $UTIme){
                                        $server_bgcolor='bg-danger';
                                    }
                                        
                                    
                                    ?>
                                <tr class="<?php echo (!empty($server_bgcolor) && $server_bgcolor) ? $server_bgcolor : $class;?>">
                                    <td><?php echo $server['server_id'];?></td>
                                    <td><?php echo $server['server_description'];?></td>
                                    <td><?php echo $server['server_ip'];?></td>
                                    <td><span class="label <?php echo $ServerActiveClass;?>"><?php echo $server['active']?></span></td>
                                    <td><span class="label <?php echo $ActiveAgentLoginDServerClass;?>"><?php echo $server['active_agent_login_server'];?></span></td>
                                    <td><span class="label <?php echo $ActiveAsteriskServerClass;?>"><?php echo $server['active_asterisk_server'];?></span></td>
                                    <td><?php echo $server['sysload'].' - '.$cpu.'%';?></td>
                                    <td><?php echo $server['channels_total'];?></td>
                                    <td><?php echo @$STime[0]['last_update'];?></td>
                                    <td><?php echo $disk;?></td>
                                </tr>
                                <?php }?>
                                <tr class="bg-pale-danger">
                                    <th colspan="5">PHP Time</th>
                                    <td colspan="5"><?php echo date('Y-m-d H:i:s');?></td>
                                </tr>
                                <tr class="bg-pale-yellow">
                                    <th colspan="5">DB Time</th>
                                    <td colspan="5">
                                        <?php 
                                        $DBTime = $database->query('SELECT NOW()')->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        
                                        <?php echo $DBTime[0]['NOW()'];?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content --> 
</div> 
<?php 
/*Total Call Count*/
$TotalCallCountquery = "SELECT stats_date,sum(total_calls) as total_calls FROM vicidial_daily_max_stats WHERE stats_date > DATE_ADD(CURDATE(), INTERVAL -10 DAY) AND stats_type != 'TOTAL' AND campaign_id IN ('".implode("','",$_SESSION['CurrentLogin']['CampaignID'])."') group by stats_date ORDER BY stats_date DESC";
$TotalCallCountData = $database->query($TotalCallCountquery)->fetchAll(PDO::FETCH_ASSOC);
$CALLCOUNTSTATSDATE = array_column($TotalCallCountData,'stats_date');
$CALLCOUNTTOTALCALLS = array_column($TotalCallCountData,'total_calls');


/*Total Agent Count*/
$TotalAgentCountquery = "SELECT stats_date,SUM(max_agents) as max_agents FROM vicidial_daily_max_stats WHERE stats_date > DATE_ADD(CURDATE(), INTERVAL -10 DAY) AND stats_type = 'CAMPAIGN' AND stats_type != 'TOTAL' AND campaign_id IN ('".implode("','",$_SESSION['CurrentLogin']['CampaignID'])."') group by stats_date ORDER BY stats_date DESC";
$TotalAgentCountData = $database->query($TotalAgentCountquery)->fetchAll(PDO::FETCH_ASSOC);
$AgentCountStatsDATE = array_column($TotalAgentCountData,'stats_date');
$AgentCounts = array_column($TotalAgentCountData,'max_agents');
    

/*Inbound & Outbound*/
$QueryForBoth = "SELECT stats_date, 
SUM(CASE WHEN stats_type='INGROUP' THEN total_calls ELSE NULL END) as 'INBOUND',
SUM(CASE WHEN stats_type='CAMPAIGN' THEN total_calls ELSE NULL END) as 'OUTBOUND' 
from 
vicidial_daily_max_stats where stats_date > DATE_ADD(CURDATE(), INTERVAL -10 DAY) AND campaign_id IN ('".implode("','",$_SESSION['CurrentLogin']['CampaignID'])."') group by stats_date ORDER BY stats_date DESC";

$BothData = $database->query($QueryForBoth)->fetchAll(PDO::FETCH_ASSOC);

/*FOR Inbound ONLY*/
$QueryForInbound = "SELECT 
sum(CASE WHEN campaign_id='CogentPSP' THEN total_calls ELSE NULL END) as 'CogentPSP', 
sum(CASE WHEN campaign_id='CogentBureau1' THEN total_calls ELSE NULL END) as 'CogentBureau1',
stats_date
FROM vicidial_daily_max_stats WHERE stats_type='INGROUP' AND campaign_id IN ('".implode("','",$_SESSION['CurrentLogin']['CampaignID'])."') AND stats_date > DATE_ADD(CURDATE(), INTERVAL -10 DAY) group by stats_date ORDER BY stats_date DESC";

$InboundData = $database->query($QueryForInbound)->fetchAll(PDO::FETCH_ASSOC);


?>
<script>
    if( $('#chart_2_2').length > 0 ){
		var ctx2 = document.getElementById("chart_2_2").getContext("2d");
		var data2 = {
			labels: ['<?php echo implode("','",$CALLCOUNTSTATSDATE);?>'],
			datasets: [
				{
					label: "Calls",
					backgroundColor: "#1e88e5",
					borderColor: "#1e88e5",
					data: [<?php echo implode(',',$CALLCOUNTTOTALCALLS);?>]
				}
			]
		};
		
		var hBar = new Chart(ctx2, {
			type:"horizontalBar",
			data:data2,
			
			options: {
				tooltips: {
					mode:"label"
				},
				scales: {
					yAxes: [{
						stacked: true,
						gridLines: {
							color: "rgba(135,135,135,0)",
						},
						ticks: {
							fontFamily: "Poppins",
							fontColor:"#666666"
						}
					}],
					xAxes: [{
						stacked: true,
						gridLines: {
							color: "rgba(135,135,135,0)",
						},
						ticks: {
							fontFamily: "Poppins",
							fontColor:"#888888"
						}
					}],
					
				},
				elements:{
					point: {
						hitRadius:40
					}
				},
				animation: {
					duration:	3000
				},
				responsive: true,
				legend: {
					display: false,
				},
				tooltip: {
					backgroundColor:'rgba(33,33,33,1)',
					cornerRadius:0,
					footerFontFamily:"'Poppins'"
				}
				
			}
		});
	};
        
    if( $('#InboundCall').length > 0 ){
		var ctx2 = document.getElementById("InboundCall").getContext("2d");
		var data2 = {
			labels: ['<?php echo implode("','",$AgentCountStatsDATE);?>'],
			datasets: [
				{
					label: "Agents",
					backgroundColor: "#ffb22b",
					borderColor: "#ffb22b",
					data: [<?php echo implode(',',$AgentCounts);?>]
				}
			]
		};
		
		var hBar = new Chart(ctx2, {
			type:"horizontalBar",
			data:data2,
			
			options: {
				tooltips: {
					mode:"label"
				},
				scales: {
					yAxes: [{
						stacked: true,
						gridLines: {
							color: "rgba(135,135,135,0)",
						},
						ticks: {
							fontFamily: "Poppins",
							fontColor:"#666666"
						}
					}],
					xAxes: [{
						stacked: true,
						gridLines: {
							color: "rgba(135,135,135,0)",
						},
						ticks: {
							fontFamily: "Poppins",
							fontColor:"#888888"
						}
					}],
					
				},
				elements:{
					point: {
						hitRadius:40
					}
				},
				animation: {
					duration:	3000
				},
				responsive: true,
				legend: {
					display: false,
				},
				tooltip: {
					backgroundColor:'rgba(33,33,33,1)',
					cornerRadius:0,
					footerFontFamily:"'Poppins'"
				}
				
			}
		});
	};
        
        
        var bar = new Morris.Bar({
                element: 'bar-chart_1',
                resize: true,
                data: [
                  <?php foreach($BothData as $dataList){?>
                  {y: '<?php echo date('M d',strtotime($dataList['stats_date']));?>', a: <?php echo $dataList['OUTBOUND'];?>},
                  <?php }?>
                ],
		barColors: ['#fc4b6c'],
		barSizeRatio: 0.5,
		barGap:5,
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Inbound Calls'],
		hideHover: 'auto',
		color: '#666666',
                xLabelMargin: 10
        });
        
        var bar = new Morris.Bar({
                element: 'bar-chart_2',
                resize: true,
                data: [
                  <?php foreach($BothData as $dataList){?>
                  {y: '<?php echo date('M d',strtotime($dataList['stats_date']));?>', a: <?php echo $dataList['OUTBOUND'];?>},
                  <?php }?>
                ],
		barColors: ['#26c6da'],
		barSizeRatio: 0.5,
		barGap:5,
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Outbound Calls'],
		hideHover: 'auto',
		color: '#666666',
                xLabelMargin: 10
        });
    
    
    
    
     var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        <?php foreach($InboundData as $dataList){?>
                  {y: '<?php echo date('M d',strtotime($dataList['stats_date']));?>', a: <?php echo $dataList['CogentPSP'];?>, b: <?php echo $dataList['CogentBureau1'];?>},
                  <?php }?>
      ],
		barColors: ['#fc4b6c', '#26c6da'],
		barSizeRatio: 0.5,
		barGap:5,
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['CogentPSP', 'CogentBureau1'],
		hideHover: 'auto',
		color: '#666666',
                xLabelMargin: 10
    });
    
    
    
    
        </script>
