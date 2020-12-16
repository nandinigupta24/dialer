<body class="theme-amber" onload="begin_all_refresh();"  onunload="BrowserCloseLogout();" style="overflow-x: hidden;zoom:80% !important;">

<form name=vicidial_form id=vicidial_form onsubmit="return false;">

 <span style="position:fixed;left:0px;top:0px;height:100%;width:100%;background-color:#e9e9e9; z-index:300;"  id="LoadingBox" class="page-loader-wrapper"> 
    <table border="0" width="1525px" height="705px"><tr><td align="center" valign="top">
            <div style="margin-top:20%">
                <div class="preloader pl-size-xl">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <h3>Loading Please wait...</h3>
            </div>
    </td></tr></table>
</span>
<div class="overlay"></div>

<nav class="navbar" id="Header" style="z-index:<?php $zi++; echo $zi ?>;"> 
        <div class="container-fluid">
            <input type="hidden" name="extension" id="extension" />
			<input type="hidden" name="custom_field_values" id="custom_field_values" value="" />
			<input type="hidden" name="FORM_LOADED" id="FORM_LOADED" value="0" />
            <div class="navbar-header">
             <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand padding-0" href="vicidial.php">
                	<img  src="./images/logo.png" style="height: 50px;width: 260px;display:inline;" alt="logo">
              
               <span style="margin-left:160px; font-size:14px;color: #ffc107;">
               <span id="agentchannelSPAN"></span>&nbsp;&nbsp;
                 <span id="status"> <?php echo _QXZ("LIVE"); ?></span>&nbsp;&nbsp;
				<?php echo _QXZ("Session ID:"); ?> <span id="sessionIDspan"></span>&nbsp; &nbsp;
				<span id="AgentStatusCalls"></span>&nbsp; &nbsp;
				<span id="AgentStatusEmails"></span>
           </span>
				</a>
            </div> 
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-placement="bottom" title="Login detail" data-toggle="dropdown" role="button">
                            <i class="material-icons">keyboard_arrow_down</i>
                        </a>
                        <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" onclick="start_all_refresh();">
                                            
                                                <i class="material-icons">person_pin</i>
                                           <?php echo $VD_login ?></a>
							</li>
                                                 <li><a href="javascript:void(0);" >
                                                <i class="material-icons">dialer_sip</i>
                                           <?php echo $SIP_user ?></a> </li>
                                        <li>
                                        	<a href="javascript:void(0);" >
                                            
                                                <i class="material-icons">widgets</i>
                                           <?php if ($on_hook_agent == 'Y')
							      {echo "(<a href=\"#\" onclick=\"NoneInSessionCalL();return false;\">"._QXZ("ring")."</a>)";}
						      echo  $VD_campaign;   ?></a>
                                        </li>
						</ul>
					</li>
 					<li>      <?php 
						if ($INgrpCT > 0)
						{ ?>
							<a href="javascript:void(0);" onclick="OpeNGrouPSelectioN();return false;" data-toggle="tooltip" data-placement="bottom" title="group"><i class="material-icons">group</i></a> 
							 <?php } ?>
							 </li>
						<li>
						<a href="#"  onclick="NormalLogout();return false;needToConfirmExit = false;" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="material-icons">power_settings_new</i></a>
				</li>	
				   <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">settings</i></a></li>
					  
				</ul>
			      
				      </div>
		 </div>
	</nav>
	

	 <section>      
        <aside id="leftsidebar" class="sidebar" > 
		 <div class="user-info">
		 <div class="image">
		 <img src="./images/<?php echo _QXZ("agc_live_call_OFF.gif"); ?>" name="livecall" alt="Live Call" width="48px" height="48px" /></div>
		  <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Phone No. : <span id="phone_numberDISP"></span><input type="hidden" name="phone_number" id="phone_number" value="" /></div>
                    <div class="email"><span id="dialableleadsspan">
                                 <?php 
								if ($agent_display_dialable_leads > 0)
							{ 
							echo _QXZ("Dialable Leads:")."<br />\n";
							}
						?>
						</span></div> 
                </div>
            </div>
            
		  <div class="menu">   
		  <div class="button-demo" style="margin-left:10px;">
		   
		   <?php
	$alt_phone_selected='';
	if ( ($alt_number_dialing=='SELECTED') or ($alt_number_dialing=='SELECTED_TIMER_ALT') or ($alt_number_dialing=='SELECTED_TIMER_ADDR3') )
		{$alt_phone_selected='CHECKED';}
	?>
     
     <span id="ManualQueueNotice"></span>
    <span id="ManualQueueChoice"></span>
    <span id="NexTCalLPausE"> <a href="#" onclick="next_call_pause_click();return false;"><?php echo _QXZ("Next Call Pause"); ?></a> </span>
    <span id="DiaLLeaDPrevieW"><input class="filled-in" type="checkbox" name="LeadPreview" size="1" value="0" /><label for="LeadPreview">LEAD PREVIEW</label></span>
     <span id="DiaLDiaLAltPhonE"><input class="filled-in chk-col-blue-grey" type="checkbox" name="DiaLAltPhonE" size="1" value="0" <?php echo $alt_phone_selected ?>/><label for="DiaLAltPhonE"> ALT PHONE DIAL</label></span>

    
<span  id="DiaLControl"><a href="#" onclick="ManualDialNext('','','','','','0','','','YES');"><img src="./images/<?php echo _QXZ("vdc_LB_dialnextnumber_OFF.gif"); ?>" border="0" alt="Dial Next Number" style="width:136px" /></a></span>

	<!--<?php
	if ( ($manual_dial_preview) and ($auto_dial_level==0) )
        {echo "<input type=\"checkbox\" class=\"filled-in\" id=\"lead1\"  name=\"LeadPreview\" size=\"1\" value=\"0\" /><label for=\"lead1\"> LEAD PREVIEW</label>";}
	if ( ($alt_phone_dialing) and ($auto_dial_level==0) )
        {echo "<input type=\"checkbox\" class=\"filled-in\" id=\"lead2\"  name=\"DiaLAltPhonE\" size=\"1\" value=\"0\" /><label for=\"lead2\">  ALT PHONE DIAL</label>";}
	?> -->
	
   <span style="" id="XferControl"><img src="./images/<?php echo _QXZ("vdc_LB_transferconf_OFF.gif"); ?>" border="0" alt="Transfer - Conference" style="width:136px" /></span>
   <br>
    <span style="display:none;" id="WebFormSpan"><img src="./images/<?php echo _QXZ("vdc_LB_webform_OFF.gif"); ?>" border="0" alt="Web Form" /></span>
	<?php
	if ($enable_second_webform > 0)
        {echo "<span style=\"background-color: #FFFFFF; display:none;\" id=\"WebFormSpanTwo\"><img src=\"./images/"._QXZ("vdc_LB_webform_two_OFF.gif")."\" border=\"0\" alt=\"Web Form 2\" /></span>";}
	if ($enable_third_webform > 0)
        {echo "<span style=\"background-color: #FFFFFF; display:none;\" id=\"WebFormSpanThree\"><img src=\"./images/"._QXZ("vdc_LB_webform_three_OFF.gif")."\" border=\"0\" alt=\"Web Form 3\" /></span>";}
	?>
   
  <span id="ParkCounterSpan"></span><br>
    <span  id="ParkControl"><img src="./images/<?php echo _QXZ("vdc_LB_parkcall_OFF.gif"); ?>" border="0" alt="Park Call" style="width:136px"/></span>
	<?php
	if ( ($ivr_park_call=='ENABLED') or ($ivr_park_call=='ENABLED_PARK_ONLY') )
        {echo "<span style=\" display:none;\" id=\"ivrParkControl\"><img src=\"./images/"._QXZ("vdc_LB_ivrparkcall_OFF.gif")."\" border=\"0\" style=\"width:136px\" alt=\"IVR Park Call\" /></span>\n";}
	else
		{echo "<span style=\"display:none;\" id=\"ivrParkControl\"></span>\n";}
	?>
    
    
    <span id="ReQueueCall"></span>

	<?php
	if ($call_requeue_button > 0)
        {echo "<br>\n";}
	?>

    <span  id="HangupControl"><img src="./images/<?php echo _QXZ("vdc_LB_hangupcustomer_OFF.gif"); ?>" border="0" alt="Hangup Customer" style="width:136px"/></span>
    <br><br>
    
    <span id="AgentViewLinkSpan"><span id="AgentViewLink"><a href="#" style="width:136px" class="btn bg-lime  btn-sm " onclick="AgentsViewOpen('AgentViewSpan','open');return false;">Agents View +</a></span></span> 
        
     <span id="MDstatusSpan"><a href="#" class='active' onclick="NeWManuaLDiaLCalL('NO','','','','','YES');return false;"><button type="button" style="width:136px" class="btn bg-orange btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="MANUAL DIAL">Manual Dial</button></a></span>  
    
 
	<?php
	if ($quick_transfer_button_enabled > 0)
        {echo "<span style=\"background-color: $MAIN_COLOR\" id=\"QuickXfer\"><img src=\"./images/"._QXZ("vdc_LB_quickxfer_OFF.gif")."\" border=\"0\" alt=\"Quick Transfer\" /></span>\n";}
	if ($custom_3way_button_transfer_enabled > 0)
        {echo "<span style=\"background-color: $MAIN_COLOR\" id=\"CustomXfer\"><img src=\"./images/"._QXZ("vdc_LB_customxfer_OFF.gif")."\" border=\"0\" alt=\"Custom Transfer\" /></span>\n";}
	?>

	

	   
	 
	 
	 
		  <!--
			<div class="button-demo" style="margin-left:10px;">
<?php
	$alt_phone_selected='';
	if ( ($alt_number_dialing=='SELECTED') or ($alt_number_dialing=='SELECTED_TIMER_ALT') or ($alt_number_dialing=='SELECTED_TIMER_ADDR3') )
		{$alt_phone_selected='CHECKED';}
	?>
				    <span id="ManualQueueNotice"></span>
				    <span id="ManualQueueChoice"></span>
				    <span id="NexTCalLPausE"> <a href="#" onclick="next_call_pause_click();return false;"><?php echo _QXZ("Next Call Pause"); ?></a> </span>
				    <span id="DiaLLeaDPrevieW"><input class="filled-in chk-col-blue-grey" type="checkbox" name="LeadPreview" size="1" value="0" /><label for="LeadPreview">LEAD PREVIEW</label></span>
				     <span id="DiaLDiaLAltPhonE"><input class="filled-in chk-col-blue-grey" type="checkbox" name="DiaLAltPhonE" size="1" value="0" <?php echo $alt_phone_selected ?>/><label for="DiaLAltPhonE"> ALT PHONE DIAL</label></span>
		            
		              <span id="DiaLControl"><a href="#" onclick="ManualDialNext('','','','','','0','','','YES');"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Dial next number Off" disabled>Dial next No.</button></a></span>
		
		              <span id="XferControl"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Transfer Conference" disabled>Transfer Conference</button></span>
		              
		               <span id="WebFormSpan"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Webform Off" disabled>Webform</button></span>
		               <?php
					  if ($enable_second_webform > 0)
					  { echo '<span id="WebFormSpanTwo"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Webform 2 Off" disabled>Webform 2</button></span>';}
		                if ($enable_third_webform > 0)
						{echo '<span id="WebFormSpanThree"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Webform 3 Off" disabled>Webform 3</button></span>';}
				?>
		               <span id="ParkCounterSpan"></span>	<br>
		               
		                 <span id="ParkControl"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="ParkCall Off" disabled>ParkCall</button></span>
		                 <span id="ivrParkControl"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="IVR ParkCall Off" disabled>IVR ParkCall</button></span>
                	      <?php
					  if ( ($ivr_park_call=='ENABLED') or ($ivr_park_call=='ENABLED_PARK_ONLY') )
					  {echo '<span id="ivrParkControl"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="IVR ParkCall Off">IVR ParkCall</button></span>';}
				     else{ echo'
						 <span id="ivrParkControl"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="IVR ParkCall Off" disabled>IVR ParkCall</button></span>';
					 }
	                 	 ?>
	                 	   
	                  <span id="ReQueueCall"></span>
					  <?php
					  if ($call_requeue_button > 0)
					  {echo "<br />\n";}
					  ?>	    
		               
		                 <span id="HangupControl"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Hangup Off" disabled>Hangup</button></span>
		                 
		      <span  id="callsinqueuelink"><a href="#" onclick="show_calls_in_queue('SHOW');"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Show Calls In Queue">Show Calls In Q</button></a>

<?php 
if ($view_calls_in_queue > 0)
	{ 
	if ($view_calls_in_queue_launch > 0) 
		{echo "<a href=\"#\" onclick=\"show_calls_in_queue('HIDE');\"><button type=\"button\" style=\"width:136px\" class=\"btn bg-blue-grey btn-block btn-sm waves-effect\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Hide Calls In Queue\">Hide Calls In Q</button></a>";}
	else 
		{echo "<a href=\"#\" onclick=\"show_calls_in_queue('SHOW');\"><button type=\"button\" style=\"width:136px\" class=\"btn bg-blue-grey btn-block btn-sm waves-effect\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Show Calls In Queue\">Show Calls In Q</button></a>";}
	}
?>

</span>
         	
		<span id="AgentViewLinkSpan"><span id="AgentViewLink"><a href="#" style="width:136px" class="btn bg-lime btn-block btn-sm waves-effect" onclick="AgentsViewOpen('AgentViewSpan','open');return false;">Agents View +</a></span></span> 
                      
                  
<span id="hotkeysdisplay"><a href="#" onMouseOver="HotKeys('ON')"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="HOT KEYS INACTIVE">Hot Keys Inactive</button></a></span>

               <span id="AgentTimeSpan"><a href="#" onclick="AgentTimeReport('open');return false;"><button type="button" style="width:136px" class="btn bg-lime btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="AGENT TIME">Agent Time</button></a></span>
                <center>
                	 <span id="DiaLlOgButtonspan" >
			  <span id="ManuaLDiaLButtons" style="z-index:<?php $zi++; echo $zi ?>;">
				  <span id="MDstatusSpan"><a href="#" class='active' onclick="NeWManuaLDiaLCalL('NO','','','','','YES');return false;"><button type="button" style="width:136px" class="btn bg-orange btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="MANUAL DIAL">Manual Dial</button></a></span> <br><br>
                    </span></span>
                </center>
			  </div>
			  -->
<br><br>
		<?php
		if ($is_webphone=='Y')
			{ 
				?>

    <span  id="webphoneLinkSpan"><span id="webphoneLink">  <a href="#" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" onclick="webphoneOpen('webphoneSpan','close');return false;"><?php echo _QXZ("WebPhone View -"); ?></a></span></span>

		<?php 
			}
		?>
			  </div>
			</div>
			  </aside>
			  
			  
	    <aside id="rightsidebar" class="right-sidebar">
			  <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#dialinfo" data-toggle="tab">Dial info</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
			  <div role="tabpanel" class="tab-pane fade in active in active" id="dialinfo"><center><br>
			  <span id="DiaLlOgButtonspan" >
			  <span id="ManuaLDiaLButtons" style="z-index:<?php $zi++; echo $zi ?>;">
				  <span id="MDstatusSpan"><a href="#" class='active' onclick="NeWManuaLDiaLCalL('NO','','','','','YES');return false;"><button type="button" style="width:136px" class="btn bg-orange btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="MANUAL DIAL">Manual Dial</button></a></span> <br><br>
			      
			        <a href="#" onclick="NeWManuaLDiaLCalL('FAST','','','','','YES');return false;"><button type="button" style="width:136px" class="btn bg-orange btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="FAST DIAL">Fast Dial</button></a>
                    </span></span><br ><br >
				      
					<span id="PauseCodeButtons"><span id="PauseCodeLinkSpan"></span></span><br><br>
					

					<span id="CallLogButtons">
					<span id="CallLogLinkSpan"><a href="#" class='active' onclick="VieWCalLLoG();return false;"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="VIEW CALL LOG">View Call Log</button></a></span></span><br><br>	

					<span id="CallbacksButtons">
					<span id="CBstatusSpan"><a><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="X ACTIVE CALLBACKS">X Active Callbacks</button></a></span> </span>

					</center></div>				
		
			   <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>VOLUME SETTINGS</p>
                        <ul class="setting-list text-center">
                            <li>
			  
<span id="VolumeControlSpan"><span id="VolumeUpSpan"><button class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="Volume up Off" type="button"><i class="material-icons">volume_up</i></button></span>
&nbsp;<span id="VolumeDownSpan"><button class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="Volume down Off" type="button"><i class="material-icons">volume_down</i></button></span></span>&nbsp;
<span id="AgentMuteSpan"></span>		  
							</li>
							 </ul>
                        <p>RECORDING SETTINGS</p>
                        <ul class="setting-list">
                             <li>
                             <span>Recording File: <span id="RecorDingFilename"></span></span><br>
					<span>Record Id: <span id="RecorDID"></span></span>
							</li>
                         <li>
                          <div class="switch">
							  <span id="RecorDControl"><a href="#" class="active" onclick="conf_send_recording('MonitorConf',session_id,'','','','YES');return false;"><img src="./images/<?php echo _QXZ("vdc_LB_startrecording.gif"); ?>" border="0" alt="Start Recording" /></a></span>	</div>		  
			</li> 
						</ul>
				   </div>   
</div>
			</div>
		 </aside>
	 </section>	

<section class="content">
           <div class="container-fluid">
                <div class="row clearfix" >
              
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="body">
                            <!-- Nav tabs -->
                            <div id="Tabs" style="z-index:<?php $zi++; echo $zi ?>;">
                            <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                            <a href="#home_with_icon_title" onclick="MainPanelToFront('NO','YES');" data-toggle="tab">
                            <img src="./images/<?php echo _QXZ("home.gif"); ?>" alt="Home" />
                            </a>
                            </li>
                            <li role="presentation">
                            <a href="#script_with_icon_title" onclick="ScriptPanelToFront('YES');" data-toggle="tab">
                            <img src="./images/<?php echo _QXZ("vdc_tab_script.gif"); ?>" alt="Script" />
                            </a>
                            </li>
                           
                           <?php if ($custom_fields_enabled > 0)
    {echo "<li  role=\"presentation\"><a href=\"#form_with_icon_title\" onclick=\"FormPanelToFront('YES');\" data-toggle=\"tab\"><img src=\"./images/"._QXZ("vdc_tab_form.gif")."\" alt=\"FORM\"  /></a></li>\n";}
	?>                          
                           <?php if ($email_enabled > 0)
    {echo "<li  role=\"presentation\"><a href=\"#email_with_icon_title\" onclick=\"EmailPanelToFront('YES');\" data-toggle=\"tab\"><img src=\"./images/"._QXZ("vdc_tab_email.gif")."\" alt=\"EMAIL\" /></a></li>\n";}
	?>                        
                           <?php if ($chat_enabled > 0)
		{
		# INTERNAL CHAT
		echo "<li  role=\"presentation\"><a href=\"#ic_with_icon_title\" onclick=\"InternalChatContentsLoad('YES');\" data-toggle=\"tab\"><img src=\"./images/"._QXZ("vdc_tab_chat_internal.gif")."\" name='InternalChatImg' alt=\"CHAT\" /></a></li>\n";

		# CUSTOMER CHAT
		echo "<li  role=\"presentation\"><a href=\"#cc_with_icon_title\" onclick=\"CustomerChatPanelToFront('1', 'YES');\" data-toggle=\"tab\"><img src=\"./images/"._QXZ("vdc_tab_chat_customer.gif")."\" name='CustomerChatImg' alt=\"CHAT\" /></a></li>\n";
		}
	?>                   
                            </ul>
                        </div>
		 			    	<div class="tab-content">
                            	<div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                    <!-- BEGIN *********   Here is the main VICIDIAL display panel -->
                                <span id="MainPanel" style=";z-index:<?php $zi++; echo $zi ?>;">
      								<div id="MainTable">
									<input type="hidden" name="lead_id" id="lead_id" value="" />
									<input type="hidden" name="list_id" id="list_id" value="" />
									<input type="hidden" name="entry_list_id" id="entry_list_id" value="" />
									<input type="hidden" name="list_name" id="list_name" value="" />
									<input type="hidden" name="list_description" id="list_description" value="" />
									<input type="hidden" name="called_count" id="called_count" value="" />
									<input type="hidden" name="rank" id="rank" value="" />
									<input type="hidden" name="owner" id="owner" value="" />
									<input type="hidden" name="gmt_offset_now" id="gmt_offset_now" value="" />
									<input type="hidden" name="gender" id="gender" value="" />
									<input type="hidden" name="date_of_birth" id="date_of_birth" value="" />
									<input type="hidden" name="country_code" id="country_code" value="" />
									<input type="hidden" name="uniqueid" id="uniqueid" value="" />
									<input type="hidden" name="callserverip" id="callserverip" value="" />
									<input type="hidden" name="SecondS" id="SecondS" value="" />
									<input type="hidden" name="email_row_id" id="email_row_id" value="" />
									<input type="hidden" name="chat_id" id="chat_id" value="" />
									<input type="hidden" name="customer_chat_id" id="customer_chat_id" value="" />

		 							<div class="body">
                  						
                                           
                       
                        	<?php $required_fields = '';
                        	if ($label_title == '---HIDE---')
					        {echo "<input type=\"hidden\" name=\"title\" id=\"title\" value=\"\" />";}
						else
					        {
							$title_readonly=''; ?>

                        <div class="col-md-2">
                        <div style="font-size:12px;">
                        	<?php if (preg_match("/---READONLY---/",$label_title))
								{$title_readonly='readonly="readonly"';   $label_title = preg_replace("/---READONLY---/","",$label_title);}
							else
								{
								if (preg_match("/---REQUIRED---/",$label_title))
									{$required_fields .= "title|";   $label_title = preg_replace("/---REQUIRED---/","",$label_title);}
								}
							echo "$label_title "; ?>   </div>
                                                    <input type="text" size="4" name="title" id="title" maxlength="4" class="form-control" value="" <?php $title_readonly ?> />
                                              </div>
                                          <?php } ?>
                                              <?php if ($label_first_name == '---HIDE---')
									        {echo "<input type=\"hidden\" name=\"first_name\" id=\"first_name\" value=\"\" />";}
										else
									        {
											$first_name_readonly=''; ?>
                                               <div class="col-md-2">
                                                <div style="font-size:12px;">
                                                	<?php if (preg_match("/---READONLY---/",$label_first_name))
													{$first_name_readonly='readonly="readonly"';   $label_first_name = preg_replace("/---READONLY---/","",$label_first_name);}
												else
													{
													if (preg_match("/---REQUIRED---/",$label_first_name))
														{$required_fields .= "first_name|";   $label_first_name = preg_replace("/---REQUIRED---/","",$label_first_name);}
													}
												echo "$label_first_name"; ?></div>
                                                        <input type="text" size="17" name="first_name" id="first_name" maxlength="30" class="form-control" value="" <?php $first_name_readonly ?> />
                                            </div>
                                        <?php } ?>
                                            <?php if ($label_middle_initial == '---HIDE---')
									        {echo "<input type=\"hidden\" name=\"middle_initial\" id=\"middle_initial\" value=\"\" />";}
										else
									        {
											$middle_initial_readonly=''; ?>
                                            <div class="col-md-2">
                                                <div style="font-size:12px;">
                                                	<?php if (preg_match("/---READONLY---/",$label_middle_initial))
											{$middle_initial_readonly='readonly="readonly"';   $label_middle_initial = preg_replace("/---READONLY---/","",$label_middle_initial);}
										else
											{
											if (preg_match("/---REQUIRED---/",$label_middle_initial))
												{$required_fields .= "middle_initial|";   $label_middle_initial = preg_replace("/---REQUIRED---/","",$label_middle_initial);}
											}
										echo " $label_middle_initial ";?> 
                                                </div>
                                                    <input type="text" size="1" name="middle_initial" id="middle_initial" maxlength="1" class="form-control" value="" <?php  $middle_initial_readonly ?>  />
                                              </div>
                                          <?php } ?>
                                              <?php 
										        if ($label_last_name == '---HIDE---')
										        {echo " <input type=\"hidden\" name=\"last_name\" id=\"last_name\" value=\"\" />";}
											else
										        {
												$last_name_readonly=''; ?>
                                              <div class="col-md-2">
                                                <div style="font-size:12px;">
                                                	<?php
                                                if (preg_match("/---READONLY---/",$label_last_name))
													{$last_name_readonly='readonly="readonly"';   $label_last_name = preg_replace("/---READONLY---/","",$label_last_name);}
												else
													{
													if (preg_match("/---REQUIRED---/",$label_last_name))
														{$required_fields .= "last_name|";   $label_last_name = preg_replace("/---REQUIRED---/","",$label_last_name);}
													}
												echo "&nbsp; $label_last_name "; ?></div>
                                                    <input type="text" size="23" name="last_name" id="last_name" maxlength="30" class="form-control" value="" <?php $last_name_readonly ?> />

                                            </div>
                                             <?php } ?>
                                            <?php 
                                            if ($label_state == '---HIDE---')
									        {echo " <input type=\"hidden\" name=\"state\" id=\"state\" value=\"\" />";}
										else
									        {
											$state_readonly=''; ?>
                                            <div class="col-md-2">
                                                <div style="font-size:12px;">
                                               <?php if (preg_match("/---READONLY---/",$label_state))
													{$state_readonly='readonly="readonly"';   $label_state = preg_replace("/---READONLY---/","",$label_state);}
												else
													{
													if (preg_match("/---REQUIRED---/",$label_state))
														{$required_fields .= "state|";   $label_state = preg_replace("/---REQUIRED---/","",$label_state);}
													}
												echo "$label_state"; ?></div>
                                                    <input type="text" size="4" name="state" id="state" maxlength="2" class="form-control" value="" <?php $state_readonly ?> />
                                                <?php } ?>
                                            </div>
                                            <?php
                                            if ($label_postal_code == '---HIDE---')
										        {echo " <input type=\"hidden\" name=\"postal_code\" id=\"postal_code\" value=\"\" />";}
											else {
												$postal_code_readonly='';
												?>
                                            <div class="col-md-2">
                                                <div style="font-size:12px;">
                                                	<?php if (preg_match("/---READONLY---/",$label_postal_code))
													{$postal_code_readonly='readonly="readonly"';   $label_postal_code = preg_replace("/---READONLY---/","",$label_postal_code);}
												else
													{
													if (preg_match("/---REQUIRED---/",$label_postal_code))
														{$required_fields .= "postal_code|";   $label_postal_code = preg_replace("/---REQUIRED---/","",$label_postal_code);}
													}
												echo "$label_postal_code"; ?></div>
                                                    <input type="text" size="14" name="postal_code" id="postal_code" maxlength="10" class="form-control" value="" <?php $postal_code_readonly ?> />
                                            </div>
                                        <?php } ?>
                                                  
                                                  
                                                   	<?php if ($label_address1 == '---HIDE---')
											        {echo " <input type=\"hidden\" name=\"address1\" id=\"address1\" value=\"\" />";}
												else
											        {
													$address1_readonly=''; ?>
                                                   	<div class="col-md-4">
                                                    <div style="font-size:12px;">
                                                     <?php if (preg_match("/---READONLY---/",$label_address1))
													{$address1_readonly='readonly="readonly"';   $label_address1 = preg_replace("/---READONLY---/","",$label_address1);}
												else
													{
													if (preg_match("/---REQUIRED---/",$label_address1))
														{$required_fields .= "address1|";   $label_address1 = preg_replace("/---REQUIRED---/","",$label_address1);}
													}
												echo "$label_address1"; ?></div>
                                                    <input type="text" size="85" name="address1" id="address1" maxlength="100" class="form-control" value="" <?php $address1_readonly ?> />
                                              </div>
                                          <?php } ?>
                                                 <?php if ($label_address2 == '---HIDE---')
										        {echo " <input type=\"hidden\" name=\"address2\" id=\"address2\" value=\"\" />";}
											else
										        {
												$address2_readonly=''; ?>
                                              <div class="col-md-4">
                                                    <div style="font-size:12px;">
                                                    	<?php if (preg_match("/---READONLY---/",$label_address2))
															{$address2_readonly='readonly="readonly"';   $label_address2 = preg_replace("/---READONLY---/","",$label_address2);}
														else
															{
															if (preg_match("/---REQUIRED---/",$label_address2))
																{$required_fields .= "address2|";   $label_address2 = preg_replace("/---REQUIRED---/","",$label_address2);}
															}
														echo "$label_address2 "; ?>
                                                    </div>
                                                    <input type="text" size="20" name="address2" id="address2" maxlength="100" class="form-control" value=""  <?php $address2_readonly ?> />
                                              </div>
                                          <?php } ?>
                                          <?php if ($label_address3 == '---HIDE---')
									        {echo " <input type=\"hidden\" name=\"address3\" id=\"address3\" value=\"\" />";}
										else
									        {
											$address3_readonly=''; ?>
                                              <div class="col-md-4">
                                                    <div style="font-size:12px;">
                                                    	<?php if (preg_match("/---READONLY---/",$label_address3))
												{$address3_readonly='readonly="readonly"';   $label_address3 = preg_replace("/---READONLY---/","",$label_address3);}
											else
												{
												if (preg_match("/---REQUIRED---/",$label_address3))
													{$required_fields .= "address3|";   $label_address3 = preg_replace("/---REQUIRED---/","",$label_address3);}
												}
											echo "$label_address3"; ?> </div>
                                                    <input type="text" size="45" name="address3" id="address3" maxlength="100" class="form-control" value=""  <?php $address3_readonly ?> />
                                              </div>
                                          <?php } ?>
                                         
                                          	<?php if ($label_city == '---HIDE---')
										        {echo " <input type=\"hidden\" name=\"city\" id=\"city\" value=\"\" />";}
											else
										        {
												$city_readonly=''; ?>
                                          	<div class="col-md-4">
                                                    <div style="font-size:12px;">
                                                    	<?php  if (preg_match("/---READONLY---/",$label_city))
													{$city_readonly='readonly="readonly"';   $label_city = preg_replace("/---READONLY---/","",$label_city);}
												else
													{
													if (preg_match("/---REQUIRED---/",$label_city))
														{$required_fields .= "city|";   $label_city = preg_replace("/---REQUIRED---/","",$label_city);}
													}
												echo "$label_city "; ?></div>
                                                    <input type="text" size="20" name="city" id="city" maxlength="50" class="form-control" value=""  <?php $city_readonly ?> />
                                              </div>
                                          <?php } ?>
                                              <?php
                                              if ($label_province == '---HIDE---')
			       							 {echo "<input type=\"hidden\" name=\"province\" id=\"province\" value=\"\" />";}
											else
											{	
												$province_readonly='';
														?>
                                              <div class="col-md-4">
                                                    <div style="font-size:12px;">
                                                    	<?php
                                                    	if (preg_match("/---READONLY---/",$label_province))
												{$province_readonly='readonly="readonly"';   $label_province = preg_replace("/---READONLY---/","",$label_province);}
											else
												{
												if (preg_match("/---REQUIRED---/",$label_province))
													{$required_fields .= "province|";   $label_province = preg_replace("/---REQUIRED---/","",$label_province);}
												} echo "$label_province";      	?></div>
									             <input type="text" size="20" name="province" id="province" maxlength="50" class="form-control" value=""  <?php  $province_readonly ?> />
                                              </div>
                                              <?php } ?>
                                              <?php 
                                              if ($label_vendor_lead_code == '---HIDE---')
									        {echo " <input type=\"hidden\" name=\"vendor_lead_code\" id=\"vendor_lead_code\" value=\"\" />";}
										else
									        {
											$vendor_lead_code_readonly='';  ?>

                                              <div class="col-md-4">
                                                    <div style="font-size:12px;">
                                                    <?php	
                                                    if (preg_match("/---READONLY---/",$label_vendor_lead_code))
												{$vendor_lead_code_readonly='readonly="readonly"';   $label_vendor_lead_code = preg_replace("/---READONLY---/","",$label_vendor_lead_code);}
											else
												{
												if (preg_match("/---REQUIRED---/",$label_vendor_lead_code))
													{$required_fields .= "vendor_lead_code|";   $label_vendor_lead_code = preg_replace("/---REQUIRED---/","",$label_vendor_lead_code);}
												}
											echo "$label_vendor_lead_code"; ?></div>
                                                  <input type="text" size="15" name="vendor_lead_code" id="vendor_lead_code" maxlength="20" class="form-control" value="" <?php $vendor_lead_code_readonly ?>  />
                                              </div>
                                                <?php } ?>

                                         
                                          		<?php if ($label_phone_code == '---HIDE---')
											        {echo " <input type=\"hidden\" name=\"phone_code\" id=\"phone_code\" value=\"\" />";}
												else
											        {
													$phone_code_readonly=''; ?>
                                          	<div class="col-md-4">
                                                    <div style="font-size:12px;">
                                                    	<?php if (preg_match("/---READONLY---/",$label_phone_code))
												{$phone_code_readonly='readonly="readonly"';   $label_phone_code = preg_replace("/---READONLY---/","",$label_phone_code);}
											else
												{
												if (preg_match("/---REQUIRED---/",$label_phone_code))
													{$required_fields .= "phone_code|";   $label_phone_code = preg_replace("/---REQUIRED---/","",$label_phone_code);}
												}
											echo "$label_phone_code"; ?></div>
                                                    <input type="text" size="4" name="phone_code" id="phone_code" maxlength="10" class="form-control" value="" <?php $phone_code_readonly ?> />
                                              </div>
                                          <?php } ?>

                                          <?php if ($label_alt_phone == '---HIDE---')
									        {echo " <input type=\"hidden\" name=\"alt_phone\" id=\"alt_phone\" value=\"\" />";}
										else
									        {
											$alt_phone_readonly=''; ?>
                                              <div class="col-md-4">
                                                    <div style="font-size:12px;">
                                                    	<?php if (preg_match("/---READONLY---/",$label_alt_phone))
														{$alt_phone_readonly='readonly="readonly"';   $label_alt_phone = preg_replace("/---READONLY---/","",$label_alt_phone);}
													else
														{
														if (preg_match("/---REQUIRED---/",$label_alt_phone))
															{$required_fields .= "alt_phone|";   $label_alt_phone = preg_replace("/---REQUIRED---/","",$label_alt_phone);}
														}
													echo "$label_alt_phone "; ?></div>
                                                    <input type="text" size="14" name="alt_phone" id="alt_phone" maxlength="12" class="form-control" value="" <?php $alt_phone_readonly ?> />
                                              </div>
                                          <?php } ?>
                                          <?php if ($label_security_phrase == '---HIDE---')
								        {echo " <input type=\"hidden\" name=\"security_phrase\" id=\"security_phrase\" value=\"\" />";}
									else
								        {
										$security_phrase_readonly=''; ?>

                                              <div class="col-md-4">
                                                    <div style="font-size:12px;">
                                                   <?php if (preg_match("/---READONLY---/",$label_security_phrase))
											{$security_phrase_readonly='readonly="readonly"';   $label_security_phrase = preg_replace("/---READONLY---/","",$label_security_phrase);}
										else
											{
											if (preg_match("/---REQUIRED---/",$label_security_phrase))
												{$required_fields .= "security_phrase|";   $label_security_phrase = preg_replace("/---REQUIRED---/","",$label_security_phrase);}
											}
										echo "$label_security_phrase "; ?></div>
                                                    <input type="text" size="20" name="security_phrase" id="security_phrase" maxlength="100" class="form-control" value="" <?php $security_phrase_readonly ?> />
                                              </div>
                                          <?php } ?>
                                         
                                          	<?php
                                          	if ($label_email == '---HIDE---')
									        {echo " <input type=\"hidden\" name=\"email\" id=\"email\" value=\"\" />";}
										else
									        {
											$email_readonly=''; ?>
                                          	<div class="col-md-4">
                                                    <div style="font-size:12px;">
                                                    	<?php if (preg_match("/---READONLY---/",$label_email))
														{$email_readonly='readonly="readonly"';   $label_email = preg_replace("/---READONLY---/","",$label_email);}
													else
														{
														if (preg_match("/---REQUIRED---/",$label_email))
															{$required_fields .= "email|";   $label_email = preg_replace("/---REQUIRED---/","",$label_email);}
														}
													echo "$label_email "; ?></div>
                                                    <input type="text" size="45" name="email" id="email" maxlength="70" class="form-control" value=""  <?php $email_readonly ?> />
                                              </div>
                                          <?php } ?>
                                              <?php
                                              if ($label_gender == '---HIDE---')
													{
													echo "<span id=\"GENDERhideFORie\"><input type=\"hidden\" name=\"gender_list\" id=\"gender_list\" value=\"\" /></span>";
													}
												else
											        { ?>

                                              <div class="col-md-4">
                                                    <div style="font-size:12px;"><?php echo "$label_gender"; ?></div>
                                                    <span id="GENDERhideFORie"><select size="1" name="gender_list" class="form-control" id="gender_list"><option value="U">U - Undefined</option><option value="M">M - Male</option><option value="F">F - Female</option></select></span>
                                              </div>
                                              <?php }?>
                                             
                                              <?php
                                               if ($label_comments == '---HIDE---')
										{
								        echo "<input type=\"hidden\" name=\"comments\" id=\"comments\" value=\"\" />\n";
								        echo "<input type=\"hidden\" name=\"other_tab_comments\" id=\"other_tab_comments\" value=\"\" />\n";
								        echo "<input type=\"hidden\" name=\"dispo_comments\" id=\"dispo_comments\" value=\"\" />\n";
								        echo "<input type=\"hidden\" name=\"callback_comments\" id=\"callback_comments\" value=\"\" />\n";
								        echo "<span id='viewcommentsdisplay'><input type='button' class='btn btn-primary waves-effect btn-xs' id='ViewCommentButton' onClick=\"ViewComments('ON','','','YES')\" value='-"._QXZ("History")."-'/></span>\n";
								        echo "<span id='otherviewcommentsdisplay'><input type='button' class='btn btn-primary waves-effect btn-xs' id='OtherViewCommentButton' onClick=\"ViewComments('ON','','','YES')\" value='-"._QXZ("History")."-'/></span>\n";
										}
									else
										{ ?>
								                <div class="clearfix">
                                              <div class="col-md-12" style="font-size:12px;"><?php echo $label_comments; ?> 
                                              	 <span id='viewcommentsdisplay'><input type='button' id='ViewCommentButton' class="btn btn-primary waves-effect btn-xs" onClick="ViewComments('ON','','','YES')" value='-History-'/></span>
                                          
                                              <?php if ( ($multi_line_comments) )
           										 { ?>
                                              <textarea name="comments" id="comments" rows="2" cols="85" class="form-control" value=""></textarea>   <?php }
												else
										            { echo " <input type=\"text\" size=\"65\" name=\"comments\" id=\"comments\" maxlength=\"255\" class=\"form-control\" value=\"\" /> " ;
										      } ?>
										       </div> </div>
										 <?php } ?>
                                         
                                            <input type="hidden" name="call_notes" id="call_notes" value="" /><span id="CallNotesButtons"></span>

                                            <input type="hidden" name="required_fields" id="required_fields" value="<?php $required_fields  ?>" />
                        </div>
                                      </div>
                                    </span>
			 </div>
								 <div role="tabpanel" class="tab-pane fade" id="script_with_icon_title">
							 <div class="row clearfix" id="ScriptRefresH"><br><div class="col-md-2" style="float:right;"><a href="#" class="btn bg-blue-grey btn-block btn-xs waves-effect" onclick="RefresHScript('','YES')">refresh</a></div></div>
						   <span id="ScriptPanel"><div class="noscroll_script" id="ScriptContents">AGENT SCRIPT</div>
								</span></div>         
								 <div  role="tabpanel" class="tab-pane fade" id="form_with_icon_title">
								  <div class="row clearfix" id="FormRefresH"><br><div class="col-md-2" style="float:right;"><a href="#" class="btn bg-blue-grey btn-block btn-xs waves-effect" onclick="FormContentsLoad('YES')">reset form</a></div></div>
				  <span id="FormPanel">
							<div class="noscroll_script" id="FormContents"><iframe src="./vdc_form_display.php?lead_id=&list_id=&stage=WELCOME" style="background-color:transparent;" scrolling="auto" frameborder="0" allowtransparency="true" id="vcFormIFrame" name="vcFormIFrame" width="100%" height="100%" style="z-index:3; min-height:550px"> </iframe></div>
														 </span>
                                </div>
								 <div  role="tabpanel" class="tab-pane fade" id="email_with_icon_title">
								 <div class="row clearfix" id="EmailRefresH"><br><div class="col-md-2" style="float:right;"><a href="#" class="btn bg-blue-grey btn-block btn-xs waves-effect" onclick="EmailContentsLoad('YES')" >refresh</a></div></div>
						<span id="EmailPanel">
							   <div class="noscroll_script" id="EmailContents"><iframe src="./vdc_email_display.php?lead_id=&list_id=&stage=WELCOME" style="background-color:transparent;" scrolling="auto" frameborder="0" allowtransparency="true" id="vcEmailIFrame" name="vcEmailIFrame" width="300px" height="500px" style="z-index:4 min-height:550px;"> </iframe></div>
														 </span>
                                 </div>
								 <div role="tabpanel" class="tab-pane fade" id="ic_with_icon_title">
									<br /><span id="InternalChatPanel">
									 <div class="noscroll_script" id="InternalChatContents"><iframe style="background-color:#fff; z-index:5; min-height:550px;" src="./agc_agent_manager_chat_interface.php?user="+user+"&pass="+orig_pass  scrolling="auto" frameborder="0" allowtransparency="true" id="InternalChatIFrame" name="InternalChatIFrame" width="100%" height="100%" > </iframe></div>
														</span>
                                </div>
								 <div role="tabpanel" class="tab-pane fade" id="cc_with_icon_title">
                                    <br /><span id="CustomerChatPanel">
                     <div class="noscroll_script" id="ChatContents"><iframe src="./vdc_chat_display.php?lead_id=&list_id=&dial_method=<?php echo $dial_method; ?>&stage=WELCOME&server_ip=<?php echo $server_ip; ?>&user=<?php echo $VD_login.$VARchatgroupsURL ?>" style="background-color:#fff;
                       z-index:6; min-height:550px;" scrolling="auto" frameborder="0" allowtransparency="true" id="CustomerChatIFrame" name="CustomerChatIFrame" width="100%" height="100%" > </iframe></div>
                                        </span>
                                </div>
							</div>
               </div>
               </div>
              		 
              		<div class="card " style="z-index:<?php $zi++; echo $zi ?>;" id="HotKeyActionBox">
                        <table class="table">
                        <tr >
                        <td > <?php echo _QXZ("Lead Dispositioned As:"); ?> <br><br><center>
                        <span id="HotKeyDispo"> - </span>
                        <span id="HKWrapupTimer"></span><span id="HKWrapupBypass"></span>
                        <span id="HKWrapupMessage"></span>
                        </center>
                        </td>
                        </tr>
                        </table>
                    </div>
              		 
               	</div>                      
                 
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                	<?php
            /*    	if ($webphone_location == 'bar')
	{
	echo "<span style=\"position:absolute;left:0px;top:46px;height:".$webphone_height."px;width=".$webphone_width."px;overflow:hidden;z-index:$zi; id=\"webphoneSpan\"><span id=\"webphonecontent\" style=\"overflow:hidden;\">$webphone_content</span></span>\n";
	}
else
	{*/

    // echo "<span style=\"position:absolute;top:15px;height:500px;overflow:scroll;z-index:$zi;\" id=\"webphoneSpan\">
    // Web Phone: &nbsp; <span id=\"webphonecontent\">$webphone_content</span></span>\n";
if ($is_webphone=='Y')
{
    echo "<div  style=\"z-index:$zi;margin-top:8px;\" id=\"webphoneSpan\">
                        <div class=\"body\">
                            <div class=\"font-bold m-b--35 text-center\">Web Phone</div>
                            
                            <span id=\"webphonecontent\">$webphone_content
                           
                            </span>

                            </div>
                   		 </div>";
	} 

	// echo "<span style=\"position:absolute;top:100px;background-color:#FFF;overflow:hidden;z-index: $zi++ echo $zi;\" id=\"webphoneSpan\">
 //            <div class=\"card\">
 //                    <div class=\"header\">
 //                        <h2>Web Phone:</h2>
 //                    </div>
 //                    <div class=\"body\">
 //                        <span id=\"webphonecontent\">$webphone_content</span>
 //                    </div>
 //                </div>
 //         </span>";

?>
                    <div class="card">
                        <div class="body">
                            <div class="font-bold m-b--35 text-center">Call Information</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    <span id="post_phone_time_diff_span"><b><span id="post_phone_time_diff_span_contents"></span></b></span>
                                    Status :<span id="MainStatuSSpan"></span><span id=timer_alt_display></span><br><span id=manual_auto_next_display></span>
                                </li>
                                <li>
                                    <span id="SecondSspan">Seconds :<span id="SecondSDISP"></span></span>
                                </li>
                                <li>
                                    Customer Time :<span name="custdatetime" id="custdatetime" class="log_title"></span>
                                </li>
                                <li>
                                    Channel :<span name="callchannel" id="callchannel" class="cust_form"> </span>
                                </li>
                                <li>
                                    Customer Information :<span id="CusTInfOSpaN"></span>
                                </li>
                                <li>
                                   <?php
										if ( ($agent_lead_search == 'ENABLED') or ($agent_lead_search == 'LIVE_CALL_INBOUND') or ($agent_lead_search == 'LIVE_CALL_INBOUND_AND_MANUAL') )
										{
											echo "<a href=\"#\" onclick=\"OpeNSearcHForMDisplaYBox();return false;\"><button type=\"button\" style=\"width:136px\" class=\"btn bg-amber btn-block btn-sm waves-effect\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Lead Search\">Lead Search</button></a>";
										} ?>
                                </li>
                            </ul>
                        </div>
                    </div>
        
                <div class="card " style="z-index:<?php $zi++; echo $zi ?>;" id="ViewCommentsBox">
                    <div class="header">
                        <h2>View Comment History:<small><span id="ViewCommentsShowHide"><a href="#" onclick="ViewComments('OFF','','','YES');return false;">hide comment history</a></span></small></h2>
                    </div>
                     <div class="body">
                        <PRE><font size=1><span id="audit_comments"></span></font></PRE>
                        <input type="hidden" class="cust_form_text" id="audit_comments_button" name="audit_comments_button" value="0" />
                    </div>
                </div>
         
               
                 <div class="card"style="z-index:<?php $zi++; echo $zi ?>;"  id="AgentStatusSpan">
                        <div class="header">
				            <h2>Agent Status</h2>
				        </div>
				         <div class="body">
                            <?php echo _QXZ("Your Status:"); ?> <span id="AgentStatusStatus"></span> <br><?php echo _QXZ("Calls Dialing:"); ?> <span id="AgentStatusDiaLs"></span>
                    	</div>
            	</div>

                 <div class="card" style="z-index:<?php $zi++; echo $zi ?>;top:-382px;" id="HotKeyEntriesBox">
                        <div class="row clearfix">
                                    <div class="header">
                                        <h2>Disposition Hot Keys:</h2><br />When active, simply press the keyboard key for the desired disposition for this call. The call will then be hungup and dispositioned automatically:
                                    </div>
                                    <div class="body">
                                        <div class="table-responsive">
                                            <table class="table table-hover dashboard-task-infos">
                                                <tr>
                                                    <td><span id="HotKeyBoxA"><?php echo $HKboxA ?><br /></span></td>
                                                    <td><span id="HotKeyBoxB"><?php echo $HKboxB ?></span></td>
                                                    <td><span id="HotKeyBoxC"><?php echo $HKboxC ?></span></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                        </div>
                </div>
                
                <div class="card" style="z-index:<?php $zi++; echo $zi ?>;top:-655px;" id="CBcommentsBox">
                    <table class="table table-responsive" >
                    <tr >
                    <td align="left"> <?php echo _QXZ("Previous Callback Information:"); ?></td>
                    <td align="right"> <a class="btn btn-danger" href="#" onclick="CBcommentsBoxhide();return false;"><?php echo _QXZ("close"); ?></a> </td>
                    </tr><tr>
                    <td>
                    <span id="CBcommentsBoxA"></span><br>
                    <span id="CBcommentsBoxB"></span><br>
                    <span id="CBcommentsBoxC"></span><br>
                    </td>
                    <td >
                    <span id="CBcommentsBoxD"></span>
                    </td>
                    </tr></table>
                </div>

                
                
                </div>
                
                       
<span style="z-index:<?php $zi++; echo $zi ?>; display:none; " id="WelcomeBoxA">
    <table class="table table-responsive"><tr><td align="center"><br><span id="WelcomeBoxAt"><?php echo _QXZ("Agent Screen"); ?></span></td></tr></table>
</span>


<span style="position:absolute;left:350px;top:700px;z-index:<?php $zi++; echo $zi ?>;" id="debugbottomspan"></span>


<span style="position:absolute;left:550px;top:<?php echo $CBheight ?>px;z-index:<?php $zi++; echo $zi ?>; display:none;" id="PauseCodeButtons"><font class="body_text">
<span id="PauseCodeLinkSpan"></span> <br>
</font></span>

<span  id="MaiNfooterspan" style="display:none;">
<span id="blind_monitor_notice_span"><b><font color="red"> &nbsp; &nbsp; <span id="blind_monitor_notice_span_contents"></span></font></b></span>
    <table  id="MaiNfooter" width="<?php echo $MNwidth ?>px">

    <tr><td colspan="3"><font class="body_small"><span id="AgentAlertSpan">
	<?php
	if ( (preg_match('/ON/',$VU_alert_enabled)) and ($AgentAlert_allowed > 0) )
		{echo "<a href=\"#\" onclick=\"alert_control('OFF');return false;\">"._QXZ("Alert is ON")."</a>";}
	else
		{echo "<a href=\"#\" onclick=\"alert_control('ON');return false;\">"._QXZ("Alert is OFF")."</a>";}
	?>
	</span></font></td></tr>
    </table>
</span>




<span style="position:absolute;left:<?php echo $PDwidth ?>px;top:<?php echo $AMheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="AgentMuteANDPreseTDiaL"><font class="body_text">
	<?php
	if ($PreseT_DiaL_LinKs)
		{
		echo "<a href=\"#\" onclick=\"DtMf_PreSet_a_DiaL('NO','YES');return false;\"><font class=\"body_tiny\">"._QXZ("D1 - DIAL")."</font></a>\n";
        echo " &nbsp; \n";
		echo "<a href=\"#\" onclick=\"DtMf_PreSet_b_DiaL('NO','YES');return false;\"><font class=\"body_tiny\">"._QXZ("D2 - DIAL")."</font></a>\n";
		}
    else {echo "<br>\n";}
	?>
    <br><br> &nbsp; <br>
</font></span>

<span style="position:absolute;left:350px;top:500px;min-width:400px;overflow:scroll;z-index:<?php $zi++; echo $zi ?>;background-color:<?php echo $SIDEBAR_COLOR ?>;" id="callsinqueuedisplay"><table cellpadding="0" cellspacing="0" border="0"><tr><td width="5px" rowspan="2">&nbsp;</td><td align="center"><font class="body_text"><?php echo _QXZ("Calls In Queue:"); ?> &nbsp; </font></td></tr><tr><td align="center"><span id="callsinqueuelist">&nbsp;</span></td></tr></table></span>

<span style="position:absolute;left:<?php echo $CLwidth ?>px;top:<?php echo $QLheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="callsinqueuelink">
<?php 
if ($view_calls_in_queue > 0)
	{ 
	if ($view_calls_in_queue_launch > 0) 
		{echo "<a href=\"#\" onclick=\"show_calls_in_queue('HIDE');\">"._QXZ("Hide Calls In Queue")."</a>\n";}
	else 
		{echo "<a href=\"#\" onclick=\"show_calls_in_queue('SHOW');\">"._QXZ("Show Calls In Queue")."</a>\n";}
	}
?>
</span>


<span style="position:absolute;left:500px;top:<?php echo $AMheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="OtherTabCommentsSpan">
<?php 
	if ( ($comments_all_tabs == 'ENABLED') and ($label_comments != '---HIDE---') )
		{
		$zi++;
		echo "<table cellspacing=4 cellpadding=0><tr><td align=\"right\"><font class=\"body_text\">\n";
		echo "$label_comments: <br><span id='otherviewcommentsdisplay'><input type='button' id='OtherViewCommentButton' onClick=\"ViewComments('ON','','','YES')\" value='-"._QXZ("History")."-'/></span>
		</font></td><td align=\"left\"><font class=\"body_text\">";
		if ( ($multi_line_comments) )
			{echo "<textarea name=\"other_tab_comments\" id=\"other_tab_comments\" rows=\"2\" cols=\"65\" class=\"form-control_text\" value=\"\"></textarea>\n";}
		else
			{echo "<input type=\"text\" size=\"65\" name=\"other_tab_comments\" id=\"other_tab_comments\" maxlength=\"255\" class=\"form-control\" value=\"\" />\n";}
		echo "</td></tr></table>\n";
		}
	else
		{
        echo "<input type=\"hidden\" name=\"other_tab_comments\" id=\"other_tab_comments\" value=\"\" />\n";
		}
?>
</span>

<span style="position:absolute;left:73.2%;top:100px;z-index:<?php $zi++; echo $zi ?>;" id="AgentViewSpan">
                    <div class="card">
                        <div class="header">
                            <h2>Other Agents Status:</h2>
                        </div>
                        <div class="body">
                            <span id="AgentViewStatus">&nbsp;</span>
                        </div>
                    </div>
</span>

<?php
    
/*$zi++;
if ($webphone_location == 'bar')
	{
	echo "<span style=\"position:absolute;left:0px;top:46px;height:".$webphone_height."px;width=".$webphone_width."px;overflow:hidden;z-index:$zi;background-color:$SIDEBAR_COLOR;\" id=\"webphoneSpan\"><span id=\"webphonecontent\" style=\"overflow:hidden;\">$webphone_content</span></span>\n";
	}
else
	{
    echo "<span style=\"position:absolute;left:" . $SBwidth . "px;top:15px;height:500px;overflow:scroll;z-index:$zi;background-color:$SIDEBAR_COLOR;\" id=\"webphoneSpan\"><table cellpadding=\"$webphone_pad\" cellspacing=\"0\" border=\"0\"><tr><td width=\"5px\" rowspan=\"2\">&nbsp;</td><td align=\"center\"><font class=\"body_text\">
    Web Phone: &nbsp; </font></td></tr><tr><td align=\"center\"><span id=\"webphonecontent\">$webphone_content</span></td></tr></table></span>\n";
	}

if ($is_webphone=='Y')
	{ 
	?>

    <span style="position:absolute;left:<?php echo $SBwidth ?>px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="webphoneLinkSpan"><table cellpadding="0" cellspacing="0" border="0" width="120px"><tr><td align="right"><font class="body_small"><span id="webphoneLink"> &nbsp; <a href="#" onclick="webphoneOpen('webphoneSpan','close');return false;"><?php echo _QXZ("WebPhone View -"); ?></a></span></font></td></tr></table></span>

	<?php 
	}
    */
?>

<span style="position:absolute;left:200px;top:<?php echo $CBheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="dialableleadsspan">
<?php 
if ($agent_display_dialable_leads > 0)
	{ 
    echo _QXZ("Dialable Leads:")."<br> &nbsp;\n";
	}
?>
</span>

<span style="position:absolute;left:140px;top:650px;z-index:<?php $zi++; echo $zi ?>;" id="AgentMuteSpan"></span>

<?php if ( ($HK_statuses_camp > 0) && ($user_level>=$HKuser_level) && ($VU_hotkeys_active > 0) ) { ?>

<span style=" display:none; position:absolute;left:<?php echo $HKwidth ?>px;top:<?php echo $HKheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="hotkeysdisplay"><a href="#" onMouseOver="HotKeys('ON')"><img src="./images/<?php echo _QXZ("vdc_XB_hotkeysactive_OFF.gif"); ?>" border="0" alt="HOT KEYS INACTIVE" /></a></span>
<?php } ?>


<span style="position:absolute;left:320px;top:175px;z-index:<?php $zi++; echo $zi ?>;" id="TransferMain">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="TransferMaindiv">
                    <div class="card">
                        <div class="header">
							<h2>Transfer conference function:</h2>&nbsp;<span id="XfeRDiaLGrouPSelecteD"></span> &nbsp; &nbsp; <span id="XfeRCID"></span>
						</div>
						<div class="body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><span id="XfeRGrouPLisT"><select size="1" name="XfeRGrouP" id="XfeRGrouP" class="form-control" onChange="XferAgentSelectLink();return false;"><option>-- SELECT A GROUP TO SEND YOUR CALL TO --</option></select></span></td>
                                            <td><span id="LocalCloser"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="LOCAL CLOSER Off" disabled>Local Closer</button></span></td>
   											<td><span id="HangupXferLine"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Hangup Xfer Line Off" disabled>Hangup Xfer Line</button></span></td>
   											<td><span id="ParkXferLine"><img src="./images/vdc_XB_parkxferline_OFF.gif" border="0" alt="Park Xfer Line" style="vertical-align:middle" /></span></td>
   											</tr>
   											<tr>
    										<td>seconds:<input type="text" size="2" name="xferlength" id="xferlength" maxlength="4" class="cust_form" readonly="readonly" /></td>
                                            <td>channel:<input type="text" size="12" name="xferchannel" id="xferchannel" maxlength="200" class="cust_form" readonly="readonly" /></td>
   											<td><span id="consultative_checkbox"><input type="checkbox" name="consultativexfer" class="filled-in chk-col-blue-grey" id="consultativexfer" size="1" value="0"><label for="consultativexfer">CONSULTATIVE</label></span></td>	
   											<td><span id="HangupBothLines"><a href="#" onclick="bothcall_send_hangup('YES');return false;"><button type="button" style="width:136px" class="btn bg-red btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Hangup Both Lines">Hangup Both Lines</button></a></span></td>
   											</tr>
   											<tr>
                                            <td>Number to call: 
                                             <?php
												if ($hide_xfer_number_to_dial=='ENABLED')
													{
													?>
													<input type="hidden" name="xfernumber" id="xfernumber" value="<?php echo $preset_populate ?>" />
													<?php
													}
												else
													{
													?>
													<input type="text" size="20" name="xfernumber" id="xfernumber" maxlength="25" class="cust_form" value="<?php echo $preset_populate ?>" /> 
													<?php
													}
												?>
                                                </td>
                                                <td><span id="agentdirectlink"><a href="#" onclick="XferAgentSelectLaunch();return false;">AGENTS</a></span>
												<input type="hidden" name="xferuniqueid" id="xferuniqueid" />
												<input type="hidden" name="xfername" id="xfername" />
												<input type="hidden" name="xfernumhidden" id="xfernumhidden" />
											 </td>
											 <td>
    											<span id="dialoverride_checkbox"><input type="checkbox" class="filled-in chk-col-blue-grey" name="xferoverride" id="xferoverride" size="1" value="0"><font class="body_tiny" ><label for="xferoverride">DIAL OVERRIDE</label><?php if ($manual_dial_override_field == 'DISABLED'){echo " "._QXZ("DISABLED");}?></font></span>
    										</td>
 											<td>
 											<span style="background-color: #CCCCCC" id="Leave3WayCall"><a href="#" onclick="leave_3way_call('FIRST','YES');return false;"><button type="button" style="width:136px" class="btn bg-blue btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="LEAVE 3-WAY CALL">Leave 3-Way Call</button></a></span>
 											</td>
 											</tr>
 											<tr>
  											<td colspan="4"><span id="DialBlindTransfer"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Dial Blind Transfer off" disabled>Dial Blind Transfer</button></span>
											<span id="DialWithCustomer"><a href="#" onclick="SendManualDial('YES','YES');return false;"><button type="button" style="width:136px" class="btn bg-blue btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Dial With Customer">Dial With Customer</button></a></span>
 											<span style="background-color: #CCCCCC" id="ParkCustomerDial"><a href="#" onclick="xfer_park_dial('YES');return false;"><button type="button" style="width:136px" class="btn bg-blue btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Park Customer Dial">Park Customer Dial</button></a></span>
											<?php
											if ($enable_xfer_presets=='ENABLED')
												{
												?>
												<span style="background-color: #ccc" id="PresetPullDown"><a href="#" onclick="generate_presets_pulldown('YES');return false;">
												<button type="button" style="width:136px" class="btn bg-blue btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Preset Button ">Preset</button></a></span>
												<?php
												}
											else
												{
												if ( ($enable_xfer_presets=='CONTACTS') and ($VU_preset_contact_search != 'DISABLED') )
													{
													?>
													<span style="background-color:#ccc;" id="ContactPullDown"><a href="#" onclick="generate_contacts_search('YES');return false;">
													<button type="button" style="width:136px" class="btn bg-blue btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Contacts">Contacts</button></a></span>
													<?php
													}
												else
													{
													?>
													<font class="body_tiny">
													<a href="#" onclick="DtMf_PreSet_a();return false;">D1</a> 
													<a href="#" onclick="DtMf_PreSet_b();return false;">D2</a>
													<a href="#" onclick="DtMf_PreSet_c();return false;">D3</a>
													<a href="#" onclick="DtMf_PreSet_d();return false;">D4</a>
													<a href="#" onclick="DtMf_PreSet_e();return false;">D5</a>
													</font>
													<?php
													}
												}
											?>
												</td>
                                       </tr>
                                        <tr>
                                            <td colspan="4"><span id="DialBlindVMail"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Blind Transfer VMail Message Off" disabled>VM</button></span></td>
                                        </tr>
                                         </tbody>
                                </table>
							</div>
						</div>
					</div>
				</div>
			</span>

<span style="position:absolute;left:0px;top:0px;width:100%;height:100%;overflow:scroll;z-index:<?php $zi++; echo $zi ?>;background-color:<?php echo $SIDEBAR_COLOR ?>;" id="AgentXferViewSpan"><center><font class="body_text">
<?php echo _QXZ("Available Agents Transfer:"); ?> <span id="AgentXferViewSelect"></span></font><br><a href="#" onclick="AgentsXferSelect('0','AgentXferViewSelect');return false;"><?php echo _QXZ("close"); ?></a></center></span>

<span style="position:absolute;left:5px;top:<?php echo $HTheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="EAcommentsBox">
    <table border="0" bgcolor="#FFFFCC" width="<?php echo $HCwidth ?>px" height="70px">
    <tr bgcolor="#FFFF66">
    <td align="left"><font class="sh_text"> <?php echo _QXZ("Extended Alt Phone Information:"); ?> </font></td>
    <td align="right"><font class="sk_text"> <a href="#" onclick="EAcommentsBoxhide('YES');return false;"> <?php echo _QXZ("minimize"); ?> </a> </font></td>
	</tr><tr>
    <td valign="top"><font class="sk_text">
    <span id="EAcommentsBoxC"></span><br>
    <span id="EAcommentsBoxB"></span><br>
    </font></td>
    <td width="320px" valign="top"><font class="sk_text">
    <span id="EAcommentsBoxA"></span><br>
	<span id="EAcommentsBoxD"></span>
    </font></td>
    </tr></table>
</span>

<span style="position:absolute;left:695px;top:<?php echo $HTheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="EAcommentsMinBox">
    <table border="0" bgcolor="#FFFFCC" width="40px" height="20px">
    <tr bgcolor="#FFFF66">
    <td align="left"><font class="sk_text"><a href="#" onclick="EAcommentsBoxshow();return false;"> <?php echo _QXZ("maximize"); ?> </a> <br><?php echo _QXZ("Alt Phone Info"); ?></font></td>
    </tr></table>
</span>
<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="NoneInSessionBox">
        <div class="container text-center" style="margin:15%;">
            <div class="lead"><?php echo _QXZ("No one is in your session:"); ?><span id="NoneInSessionID"></span></div>
            <div class="button-place">
                <a href="#" onclick="NoneInSessionOK();return false;" class="btn btn-default btn-lg ">Go Back</a>&nbsp;&nbsp;<span id="NoneInSessionLink"><a href="#" onclick="NoneInSessionCalL();return false;" class="btn btn-default btn-lg ">Call Agent Again</a></span>
            </div>
        </div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="CustomerGoneBox">
    <table border="0"  width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center"> <?php echo _QXZ("Customer has hung up:"); ?> <span id="CustomerGoneChanneL"></span><br>
	<a class="btn btn-default" href="#" onclick="CustomerGoneOK();return false;"><?php echo _QXZ("Go Back"); ?></a>
    <br><br>
	<a class="btn btn-default" href="#" onclick="CustomerGoneHangup();return false;"><?php echo _QXZ("Finish and Disposition Call"); ?></a>
    </td></tr></table>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="WrapupBox">
    <table border="0"  width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center"> <?php echo _QXZ("Call Wrapup:"); ?> <span id="WrapupTimer"></span> <?php echo _QXZ("seconds remaining in wrapup"); ?><br><br>
	<span id="WrapupMessage"><?php echo $wrapup_message ?></span>
    <br><br>
	<span id="WrapupBypass"><a class="btn btn-dafault" href="#" onclick="WrapupFinish();return false;"><?php echo _QXZ("Finish Wrapup and Move On"); ?></a></span>
    </td></tr></table>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="FSCREENWrapupBox"><table border="0"  width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px" cellpadding="0" cellspacing="0"><tr><td><span id="FSCREENWrapupMessage"><?php echo $wrapup_message ?></span></td></tr></table></span>

<span class="text-center" style="position:absolute;left:350px;top:175px;z-index:<?php $zi++; echo $zi ?>;width:400px" id="TimerSpan">
        <div class="card" style="height:240px;">
            <div class="body">
                <span id="TimerContentSpan"></span>
                <br /><a href="#" class="btn btn-danger  waves-effect" onclick="hideDiv('TimerSpan');return false;">Close Message</a>
            </div>
        </div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="AgenTDisablEBoX">
    <center><table style="margin:15% auto;"><tr><td align="center"><span style="font-size:30px;">Your session has been disabled</span><br /><br /><a href="#" onclick="LogouT('DISABLED','');return false;" class="btn btn-default btn-lg waves-effect">Click Here To Reset Your Session</a>
    </td></tr></table></center>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="SysteMDisablEBoX">
    <center><table style="margin:15% auto;"><tr><td align="center">There is a time synchronization problem with your system, please tell your system administrator<br /><br /><br /><a href="#" onclick="hideDiv('SysteMDisablEBoX');return false;" class="btn btn-default btn-lg waves-effect">Go Back</a>
    </td></tr></table></center>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="LogouTBox">
    <div class="container text-center">
    <br><br><br><br><br><span id="LogouTProcess">
	<br>
	<br>
	<font class="loading_text">LOGOUT PROCESSING...</font>
	<br>
	<br>
	<div class="preloader pl-size-xl"><div class="spinner-layer"><div class="circle-clipper left"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
		</span><br><br><span id="LogouTBoxLink"><font class="loading_text">LOGOUT</font></span></div>
</span>

<span style="position:absolute;left:0px;top:70px;z-index:<?php $zi++; echo $zi ?>;" id="DispoButtonHideA">
    <table border="0" width="165px" height="22px" style="background:transparent"><tr><td align="center" valign="top"></td></tr></table>
</span>

<span style="position:absolute;left:0px;top:138px;z-index:<?php $zi++; echo $zi ?>;" id="DispoButtonHideB">
    <table border="0"  width="165px" height="250px" style="background:transparent"><tr><td align="center" valign="top">&nbsp;</td></tr></table>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;" id="DispoButtonHideC">
	<div class="alert alert-info"><?php echo _QXZ("Any changes made to the customer information below at this time will not be comitted, You must change customer information before you Hangup the call."); ?></div>
</span>


<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="DispoSelectBox">
    <div style="position:fixed;width:100%;height:100%;background-color:#e9e9e9;"></div>
    <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-left:25%">
                    <div class="card">
                        <div class="header">
                            <h2>DISPOSITION CALL: <span id="DispoSelectPhonE"></span><div class="pull-right"><span id="DispoSelectHAspan"><a href="#" class="btn bg-blue-grey waves-effect" onclick="DispoHanguPAgaiN()">Hangup Again</a></span>&nbsp;<span id="DispoSelectMaxMin"><a href="#" class="btn bg-blue-grey waves-effect" onclick="DispoMinimize()"> minimize </a></span></div></h2>
                        </div>
                        <div class="body table-responsive"><center>
                                                        <span id="Dispo3wayMessage"></span>
                            <span id="DispoManualQueueMessage"></span>
                            <span id="PerCallNotesContent"><input type="hidden" name="call_notes_dispo" id="call_notes_dispo" value="" /></span>
                            <span id="DispoCommentsContent"><input type="hidden" name="dispo_comments" id="dispo_comments" value="" /></span>
                            <span id="DispoSelectContent"> End-of-call Disposition Selection </span>
                            <table class="table">
                                <tr><td align="center"><input type="hidden" name="DispoSelection" id="DispoSelection" /><br />
                                <input type="checkbox" name="DispoSelectStop" class="filled-in chk-col-blue-grey" id="DispoSelectStop" size="1" value="0" /><label for="DispoSelectStop">PAUSE AGENT DIALING</label><br />
                                <a href="#" class="btn btn-warning waves-effect" onclick="DispoSelectContent_create('','ReSET','YES');return false;">CLEAR FORM</a>
                                <a href="#" class="btn btn-primary waves-effect" onclick="DispoSelect_submit('','','YES');return false;">SUBMIT</a>
                                <br><br>
                                    <a href="#" class="btn btn primary waves-effect" onclick="WeBForMDispoSelect_submit();return false;">WEB FORM SUBMIT</a>
                                <br><br>
                                </td></tr>
                            </table></center>
                        </div>
                    </div>
                </div>
            </div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="CallBackSelectBox">
    <div class="row clearfix" style="margin-left:15%">
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header text-center">
                            <h4>
                               <?php echo _QXZ("Select a CallBack Date "); ?><span id="CallBackDatE"></span>                 </h4>
                        </div>
    <input type="hidden" name="CallBackDatESelectioN" id="CallBackDatESelectioN" />
    <input type="hidden" name="CallBackTimESelectioN" id="CallBackTimESelectioN" />
	<span id="CallBackDatEPrinT"><?php echo _QXZ("Select a Date Below"); ?></span> &nbsp;
	<span id="CallBackTimEPrinT"></span> 
	<div class="">
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
			<div class="form-group">
				<div class="form-line">
    <label for="CBT_hour"><?php echo _QXZ("Hour:"); ?> </label>
   <select size="1" name="CBT_hour" id="CBT_hour" class="form-control">
	<?php
	if ($callback_time_24hour > 0)
	{
	?>
	<option>00</option>
	<?php
	}
	?>
	<option>01</option>
	<option>02</option>
	<option>03</option>
	<option>04</option>
	<option>05</option>
	<option>06</option>
	<option>07</option>
	<option>08</option>
	<option>09</option>
	<option>10</option>
	<option>11</option>
	<option>12</option>
	<?php
	if ($callback_time_24hour > 0)
	{
	?>
	<option>13</option>
	<option>14</option>
	<option>15</option>
	<option>16</option>
	<option>17</option>
	<option>18</option>
	<option>19</option>
	<option>20</option>
	<option>21</option>
	<option>22</option>
	<option>23</option>
	<?php
	}
	?>
	</select> 
  				</div>
			</div>
		</div>
	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
			<div class="form-group">
				<div class="form-line">
    <label for="CBT_minute"><?php echo _QXZ("Minutes:"); ?> </label>
    <select size="1" name="CBT_minute" id="CBT_minute" class="form-control">
	<option>00</option>
	<option>05</option>
	<option>10</option>
	<option>15</option>
	<option>20</option>
	<option>25</option>
	<option>30</option>
	<option>35</option>
	<option>40</option>
	<option>45</option>
	<option>50</option>
	<option>55</option>
		 </select> 
		 		</div>
			</div>
	</div>

	<?php
	if ($callback_time_24hour < 1)
	{
	?>
  <div class="col-lg-1 col-md-1 col-sm-2 col-xs-4">
			<div class="form-group">
				<div class="form-line">
		<label for="CBT_ampm"><?php echo _QXZ("Format:"); ?> </label>		
    <select size="1" name="CBT_ampm" id="CBT_ampm" class="form-control">
	<option>AM</option>
	<option selected>PM</option>
	  </select>
	  			</div>
	  </div>
		</div>
	<?php
	}
	?>
	<?php
	if ($agentonly_callbacks)
        {echo "<div class='col-lg-2 col-md-2 col-sm-4 col-xs-6'>
			<input type=\"checkbox\" name=\"CallBackOnlyMe\" class=\"filled-in\" id=\"CallBackOnlyMe\" value=\"0\" /> <label for=\"CallBackOnlyMe\">"._QXZ("My Callback Only")."</label></div> ";}

	if ($comments_callback_screen != 'REPLACE_CB_NOTES')
		{echo "<div class='col-lg-3 col-md-3 col-sm-4 col-xs-6'>
			<div class='form-group'>
				<div class='form-line'><label for=\"CallBackCommenTsField\">CB Comments</label><input class=\"form-control\" type=\"text\" name=\"CallBackCommenTsField\" id=\"CallBackCommenTsField\" size=\"50\" maxlength=\"255\" /></div></div></div>\n";}
	else
		{echo "<input type=\"hidden\" name=\"CallBackCommenTsField\" id=\"CallBackCommenTsField\" value=\"\" /><br>\n";}

	echo "<span id=\"CBCommentsContent\"><input type=\"hidden\" name=\"cbcomment_comments\" id=\"cbcomment_comments\" value=\"\" /></span>\n";
	?>
	<a class="btn btn-primary" href="#" onclick="CallBackDatE_submit();return false;"><?php echo _QXZ("SUBMIT"); ?></a>
    </div>

    <br><br><center>
	<span id="CallBackDateContent"><?php echo  "$CCAL_OUT" ?></span></center><br><br>
					</div>
					</div>
					</div>
</span>


<!--
<span style="position:absolute;left:325px;top:755px;z-index:<?php $zi++; echo $zi ?>;" id="CBcommentsBox">
    <table class="table table-responsive" style="background:bisque; width:600px">
    <tr bgcolor="#FFFF66">
    <td align="left"> <?php echo _QXZ("Previous Callback Information:"); ?></td>
    <td align="right"> <a class="btn btn-danger" href="#" onclick="CBcommentsBoxhide();return false;"><?php echo _QXZ("close"); ?></a> </td>
	</tr><tr>
    <td>
    <span id="CBcommentsBoxA"></span><br>
    <span id="CBcommentsBoxB"></span><br>
    <span id="CBcommentsBoxC"></span><br>
 </td>
    <td width="320px">
	<span id="CBcommentsBoxD"></span>
   </td>
    </tr></table>
</span>
-->

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="CallBacKsLisTBox">
            <div style="position:absolute;width:100%;height:100%;background-color:#e9e9e9;"></div>
            <div class="row clearfix" style="margin-left:15%">
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h5>
                                CALLBACKS FOR AGENT 1004: To see information on one of the callbacks below, click on the INFO link. To call the customer back now, click on the DIAL link. If you click on a record below to dial it, it will be removed from the list.                            
                                </h5>
                        </div>
                        <div class="body table-responsive">
                               <div class="scroll_callback_auto" id="CallBacKsLisT"></div>
                               <div class="text-center">
                                		<a href="#" class="btn btn-primary waves-effect" onclick="CalLBacKsLisTCheck();return false;">Refresh</a>
                       					 <a href="#" class="btn btn-warning waves-effect" onclick="CalLBacKsLisTClose();return false;">Go Back</a>
                                	</div>
                        </div>
                    </div>
                </div>
            </div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="NeWManuaLDiaLBox">
         <div style="position:fixed;width:100%;height:100%;background-color:#e9e9e9;"></div>
            <div class="row clearfix" style="margin-left:25%">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center">
							<?php echo _QXZ("NEW MANUAL DIAL LEAD FOR %1s in campaign %2s:",0,'',$VD_login,$VD_campaign); ?>                         </h2>
                        </div>
                        <div class="body table-responsive">
						<?php 
	    /*if (!preg_match("/X/i",$manual_dial_prefix))
		    {
	    echo "<p class='alert alert-info'>" ._QXZ("Note: a dial prefix of %1s will be added to the beginning of this number",0,'',$manual_dial_prefix)."</p>";
		    }
	    ?>
		<?php echo  "<p class='alert alert-info'>"._QXZ("Note: all new manual dial leads will go into list %1s",0,'',$manual_dial_list_id)."</p>"; */
                            ?>                         
								 <table class="table">
                               <tr style="display:none;">
                                <td align="right">Dial Code:</td>
                                <td align="right"><div class="col-md-6"><input type="text" size="7" maxlength="10" name="MDDiaLCodE" id="MDDiaLCodE" class="form-control" value="1" /></div>(This is usually a 1 in the USA-Canada)</td>
                                    </tr>
                                    <tr>
                                <td align="right">Phone Number:</td>
                                <td align="right">
                                <div class="col-md-6"><input type="text" size="14" maxlength="18" name="MDPhonENumbeR" id="MDPhonENumbeR" class="form-control" value="" /></div>(digits only)                                  
								  <input type="hidden" name="MDPhonENumbeRHiddeN" id="MDPhonENumbeRHiddeN" value="" />
                                    <input type="hidden" name="MDLeadID" id="MDLeadID" value="" />
                                    <input type="hidden" name="MDType" id="MDType" value="" />
                                    <input type="hidden" name="MDLeadIDEntry" id="MDLeadIDEntry" value="" />
									<?php 
	if ($manual_dial_lead_id=='Y')
		{
        echo '	</td>';
        echo '	</tr><tr>';
        echo '	<td align="right">'._QXZ("Dial Lead ID:").' </td>';
        echo '	<td align="right">';
        echo '	<input type="text" size="10" maxlength="10" name="MDLeadIDEntry" id="MDLeadIDEntry" class="cust_form form-control" value="" />(digits only)';
		}
	else
		{
		echo '<input type="hidden" name="MDLeadIDEntry" id="MDLeadIDEntry" value="" />';
		}
		$LeadLookuPXtra='';
	if ($manual_dial_search_checkbox == 'SELECTED_LOCK')
		{$LeadLookuPXtra = 'CHECKED DISABLED ';}
	if ($manual_dial_search_checkbox == 'UNSELECTED_LOCK')
		{$LeadLookuPXtra = 'DISABLED ';}
	?>
                                    </td>
                                    </tr><tr>
                                <td align="right">Search Existing Leads:</td>
                                <td align="right"><input type="checkbox" name="LeadLookuP" class="filled-in chk-col-blue-grey" id="LeadLookuP" size="1" value="0" <?php echo $LeadLookuPXtra ?> /><label for="LeadLookuP">(This option if checked will attempt to find the phone number in the system before inserting it as a new lead)</label></td>
                                    </tr><tr>

                                <td align="left" colspan="2">
                                
                                <CENTER>
                                    <span id="ManuaLDiaLGrouPSelecteD"></span> &nbsp; &nbsp; <span id="ManuaLDiaLGrouP"></span>
    
                                    <span id="ManuaLDiaLInGrouPSelecteD"></span> &nbsp; &nbsp; <span id="ManuaLDiaLInGrouP"></span>
                                   
                                    <span id="NoDiaLSelecteD"></span>
                                    </CENTER>
                                </td>
                                    </tr><tr>
                                <td align="right">Dial Override:</td>
                                <td align="right">
								<?php
									if ($manual_dial_override_field == 'ENABLED')
										{
										?>
										<div class="col-md-6"><input type="text" size="24" maxlength="20" name="MDDiaLOverridE" id="MDDiaLOverridE" class="form-control" value="" /></div>(digits only please) 
										<? }
									else
										{
										?>
										<input type="hidden" name="MDDiaLOverridE" id="MDDiaLOverridE" value="" />
										<?php
										echo _QXZ("DISABLED");
										}
									?>                                  
									  </td>
                                </tr>
                                <tr>

								<td  colspan=2>
								<span id="ManuaLDiaLGrouPSelecteD"></span> &nbsp; &nbsp; <span id="ManuaLDiaLGrouP"></span>
								<br>
								<span id="ManuaLDiaLInGrouPSelecteD"></span> &nbsp; &nbsp; <span id="ManuaLDiaLInGrouP"></span>
								<br>
								<span id="NoDiaLSelecteD"></span>
								 </td>
                                </tr>
                                <tr>
								<td colspan="2"><div class="pull-right"><a href="#" class="btn btn-primary" onclick="NeWManuaLDiaLCalLSubmiT('NOW','YES');return false;">Dial Now</a>
                                    <a href="#" class="btn btn-primary" onclick="NeWManuaLDiaLCalLSubmiT('PREVIEW','YES');return false;">Preview Call</a>
                                    <a href="#" class="btn btn-primary" onclick="ManualDialHide();return false;">Go Back</a></div>
                                </td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>           
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;height:100%;width:100%;background-color:#e9e9e9;" id="CloserSelectBox">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-left:25%;">
        <div class="card">
            <div class="header ">
				<h2><?php echo _QXZ("CLOSER INBOUND GROUP SELECTION"); ?></h2>
				</div>

	<div class="body"><center>
	<span id="CloserSelectContent"> <?php echo _QXZ("Closer Inbound Group Selection"); ?> </span>
    <input type="hidden" name="CloserSelectList" id="CloserSelectList" /><br>
	<?php
	if ( ($outbound_autodial_active > 0) and ($disable_blended_checkbox < 1) and ($dial_method != 'INBOUND_MAN') and ($VU_agent_choose_blended > 0) )
		{
		?>
        <input type="checkbox" class="filled-in" name="CloserSelectBlended" id="CloserSelectBlended"  value="0" />
        <label for="CloserSelectBlended"> <?php echo _QXZ("BLENDED CALLING(outbound activated)"); ?></label> <br><br><br>
		<?php
		}
	?>
	<a class="btn btn-primary" href="#" onclick="CloserSelect_submit('YES');return false;"><?php echo _QXZ("Submit"); ?></a>
	<a class="btn btn-warning" href="#" onclick="CloserSelectContent_create('YES');return false;"> <?php echo _QXZ("Reset"); ?> </a> 
	
		</center></div></div></div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;height:100%;width:100%;background-color:#e9e9e9;" id="TerritorySelectBox">
   <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="margin-left:16%;">
                    <div class="card" >
                        <div class="header">
							<div class="lead text-center" ><?php echo _QXZ("TERRITORY SELECTION"); ?>
							</div></div>
	
	<div class="text-center">
	<span id="TerritorySelectContent"> <?php echo _QXZ("Territory Selection"); ?> </span>
    <input type="hidden" name="TerritorySelectList" id="TerritorySelectList" /><br><br>
	<a class="btn btn-primary" href="#" onclick="TerritorySelect_submit('YES');return false;"><?php echo _QXZ("Submit"); ?></a>					
	<a class="btn btn-warning" href="#" onclick="TerritorySelectContent_create('YES');return false;"> <?php echo _QXZ("Reset"); ?> </a> 
						</div></div></div>
</span>

<span style="position:absolute;left:500px;top:300px;z-index:<?php $zi++; echo $zi ?>;height:25%;width:25%;background-color:#e9e9e9;" id="NothingBox">
	<span id="DiaLLeaDPrevieWHide"> <?php echo _QXZ("Channel"); ?></span>
	<span id="DiaLDiaLAltPhonEHide"> <?php echo _QXZ("Channel"); ?></span>
	<?php
	if (!$agentonly_callbacks)
        {echo "<input type=\"checkbox\" name=\"CallBackOnlyMe\" id=\"CallBackOnlyMe\" size=\"1\" value=\"0\" /> "._QXZ("MY CALLBACK ONLY")." <br>";}
	if ( ($outbound_autodial_active < 1) or ($disable_blended_checkbox > 0) or ($dial_method == 'INBOUND_MAN') or ($VU_agent_choose_blended < 1) )
        {echo "<input type=\"checkbox\" name=\"CloserSelectBlended\" id=\"CloserSelectBlended\" size=\"1\" value=\"0\" /> "._QXZ("BLENDED CALLING")."<br>";}
	?>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="CalLLoGDisplaYBox">
<div style="position:absolute;width:100%;height:100%;background-color:#e9e9e9;"></div>
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" style="margin-left:8%">
        <div class="card">
            <div class="header ">
                <h2 class="text-center">
                    AGENT CALL LOG<span class="pull-right"><a href="#" class="btn btn-danger waves-effect" onclick="CalLLoGVieWClose();return false;">close [X]</a></span>
                </h2>
            </div>
            <div class="body table-responsive"><center>
                                <div  id="CallLogSpan"> Call log List </div>
                <br /><br /> &nbsp;</center>
            </div>
        </div>
    </div> 
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;height:100%;width:100%;background-color:#e9e9e9;" id="SearcHContactsDisplaYBox">
	  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="margin-left:16%; ">
                    <div class="card" >
                        <div class="header">
							<div class="lead text-center" ><?php echo _QXZ("SEARCH FOR A CONTACT:"); ?><a class="pull-right btn btn-danger" href="#" onclick="ContactSearcHVieWClose();return false;">close [X]</a>
							</div>
						</div>
    <p class="alert alert-info">
	<?php echo _QXZ("Notes: when doing a search for a contact, wildcard or partial search terms are not allowed. <br>Contact search requests are all logged in the system."); ?>
	</p>
	  <div class="body">
               <table class="table table-responsive" border="0">
	<tr>
	<td align="right"> <?php echo _QXZ("Office Number:"); ?> </td><td align="left"><div class="col-sm-6"><input type="text" class="from-control" size="18" maxlength="20" name="contacts_phone_number" id="contacts_phone_number" placeholder="Office Number"></div></td>
	</tr>
	<tr>
		<td align="right"> <?php echo _QXZ("First Name:"); ?> </td><td align="left"><div class="col-sm-6"><input type="text" class="from-control"  size="18" maxlength="20" name="contacts_first_name" id="contacts_first_name" placeholder="First Name"></div></td>
	</tr>
	<tr>
		<td align="right"> <?php echo _QXZ("Last Name:"); ?> </td><td align="left"><div class="col-sm-6"><input type="text"  class="from-control" size="18" maxlength="20" name="contacts_last_name" id="contacts_last_name" placeholder="Last Name"></div></td>
	</tr>
	<tr>
		<td align="right"> <?php echo _QXZ("BU Name:"); ?> </td><td align="left"><div class="col-sm-6"><input type="text"   class="from-control" size="18" maxlength="20" name="contacts_bu_name" id="contacts_bu_name" placeholder="BU Name"></div></td>
	</tr>
	<tr>
		<td align="right"> <?php echo _QXZ("Department:"); ?> </td><td align="left"><div class="col-sm-6"><input type="text" class="from-control"  size="18" maxlength="20" name="contacts_department" id="contacts_department" placeholder="Department"></div></td>
	</tr>
	<tr>
		<td align="right"> <?php echo _QXZ("Group Name:"); ?> </td><td align="left"><div class="col-sm-6"><input type="text" class="from-control"   size="18" maxlength="20" name="contacts_group_name" id="contacts_group_name" placeholder="Group Name" ></div></td>
	</tr>
	<tr>
	<td align="right"> <?php echo _QXZ("Job Title:"); ?> </td><td align="left"><div class="col-sm-6"><input type="text"  class="from-control" size="18" maxlength="20" name="contacts_job_title" id="contacts_job_title" placeholder="Job Title"></div></td>
	</tr>
	<tr>
		<td align="right"> <?php echo _QXZ("Location:"); ?> </td><td align="left"><div class="col-sm-6"><input type="text"  class="from-control" size="18" maxlength="20" name="contacts_location" id="contacts_location" placeholder="Location"></div></td>
	</tr>
	<tr>
	<td align="right" colspan="2"> 
	<a class="btn btn-primary" href="#" onclick="ContactSearchSubmit();return false;"><?php echo _QXZ(" Search"); ?></a> 
	<a class="btn btn-warning" href="#" onclick="ContactSearchReset('YES');return false;"><?php echo _QXZ("Reset"); ?></a>
	</td>
	</tr>
	</table>
						</div></div>
	</div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="SearcHResultSContactsBox">
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="margin-left:16%; ">
                    <div class="card" >
                        <div class="header">
							<div class="lead text-center" ><?php echo _QXZ("CONTACTS SEARCH RESULTS:"); ?><a class="pull-right btn btn-danger" href="#"  onclick="hideDiv('SearcHResultSContactsBox');return false;">close [X]</a></div>
                        </div>
<div class="text-center">
<div class="scroll_calllog" id="SearcHResultSContactsSpan"> <?php echo _QXZ("Search Results"); ?> </div>
						</div></div></div>

</span>

<span style="position:absolute;z-index:<?php $zi++; echo $zi ?>;height:100%;width:100%;left:0px;top:0px;background-color:#e9e9e9;" id="SearcHForMDisplaYBox">
    <span style="position:fixed;height:100%;width:100%;left:0px;top:0px;"></span>
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10" style="margin-left:10%;">
                    <div class="card">
                        <div class="header">
                            <h2 class="modal-title" id="largeModalLabel">SEARCH FOR A LEAD:<a class="pull-right btn btn-danger waves-effect" href="#" data-dismiss="modal" onclick="LeaDSearcHVieWClose();return false;">close [X]</a></h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                 <table class="table" border="0">
                                <tr>
                                <td align="right">Phone Number:</td><td align="left"><input type="text" class="form-control" maxlength="20" name="search_phone_number" id="search_phone_number"></td>
                                </tr>
                                <tr>
                                <td align="right">Phone Number Fields: </td>
                                <td align="left">
                                    <input type="checkbox" name="search_main_phone" class="filled-in " id="search_main_phone" size="1" value="0" checked /><label for="search_main_phone">Main Phone Number</label>
                                    <input type="checkbox" name="search_alt_phone" class="filled-in " id="search_alt_phone" size="1" value="0" /><label for="search_alt_phone">Alternate Phone Number</label>
                                    <input type="checkbox" name="search_addr3_phone" class="filled-in " id="search_addr3_phone" size="1" value="0" /><label for="search_addr3_phone">Address3 Phone Number</label>
                                </td>
                                </tr>
                                <tr>
                                <td align="right">Lead ID:</td><td align="left"><input type="text" class="form-control"  maxlength="10" name="search_lead_id" id="search_lead_id"></td>
                                </tr>
                                <tr>
                                <td align="right">Vendor ID:</td><td align="left"><input type="text" class="form-control"  maxlength="20" name="search_vendor_lead_code" id="search_vendor_lead_code"></td>
                                </tr>
                                <tr>
                                <td align="right">First:</td><td align="left"><input type="text" class="form-control"  maxlength="30" name="search_first_name" id="search_first_name"></td>
                                </tr>
                                <tr>
                                <td align="right">Last:</td><td align="left"><input type="text" class="form-control"  maxlength="30" name="search_last_name" id="search_last_name"></td>
                                </tr>
                                <tr>
                                <td align="right">City:</td><td align="left"><input type="text" class="form-control"  maxlength="50" name="search_city" id="search_city"></td>
                                </tr>
                                <tr>
                                <td align="right">State:</td><td align="left"><input type="text" class="form-control"  maxlength="2" name="search_state" id="search_state"></td>
                                </tr>
                                <tr>
                                <td align="right">PostCode:</td><td align="left"><input type="text" class="form-control"  maxlength="10" name="search_postal_code" id="search_postal_code"></td>
                                </tr>
                                <tr>
                                	<td colspan="2" align=right>
                                		<a href="#" class="btn btn-primary waves-effect" onclick="LeadSearchSubmit();return false;">Search</a>
                                		<a href="#" class="btn btn-primary waves-effect" onclick="LeadSearchReset();return false;">Reset</a>
                                	</td>
                                </tr>
                            </table>
                               <p class="alert alert-info">
						<?php echo _QXZ("Notes: when doing a search for a lead, the phone number, lead ID or %1s are the best fields to use.",0,'',$label_vendor_lead_code); ?> <br /><?php echo _QXZ("Using the other fields may be slower. Lead searching does not allow for wildcard or partial search terms."); ?> <br /><?php echo _QXZ("Lead search requests are all logged in the system."); ?>
						</p>
                            </div>
                        </div>
                    </div>
                </div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="SearcHResultSDisplaYBox">
	<div class="container" style="margin: 7% 17%;">
  	<div class="pull-right"><a class="btn btn-danger" href="#" onclick="hideDiv('SearcHResultSDisplaYBox');return false;"><?php echo _QXZ("close"); ?> [X]</a></div>
	<div class="lead text-center"><?php echo _QXZ("SEARCH RESULTS:"); ?></div><br><br>
	<div class="text-center">
	<div class="scroll_calllog" id="SearcHResultSSpan"> <?php echo _QXZ("Search Results"); ?> </div>
		</div><br><br>
<div class="text-center"><a class="btn btn-danger" href="#" onclick="hideDiv('SearcHResultSDisplaYBox');return false;"><?php echo _QXZ("Close Info Box"); ?></a></div>
	</div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="CalLNotesDisplaYBox">
    <div class="container" >
  	<div class="pull-right"><a class="btn btn-danger" href="#" onclick="hideDiv('CalLNotesDisplaYBox');return false;"><?php echo _QXZ("close"); ?> [X]</a></div>
  	<div class="lead text-center"><?php echo _QXZ("CALL NOTES LOG:"); ?></div><br><br>
  	<div class="text-center">
		<div class="scroll_calllog" id="CallNotesSpan"> <?php echo _QXZ("Call Notes List"); ?> </div>
		</div><br><br>
<div class="text-center"><a class="btn btn-danger" href="#" onclick="hideDiv('CalLNotesDisplaYBox');return false;"><?php echo _QXZ("Close Info Box"); ?></a></div>
	</div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="LeaDInfOBox">
  <div style="position:absolute;width:100%;height:100%;background-color:#e9e9e9;"></div>
    <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12" style="margin-left:8%">
        <div class="card">
            <div class="header ">
                <h2 class="text-center">
                    Customer Information<span class="pull-right"><a href="#" class="btn btn-danger " onclick="hideDiv('LeaDInfOBox');return false;">close [X]</a></span>
                </h2>
            </div>
  
  	<span id="LeaDInfOSpan"> <?php echo _QXZ("Lead Info"); ?> </span>
	
	<div class="text-center"><a class="btn btn-danger" href="#" onclick="hideDiv('LeaDInfOBox');return false;"><?php echo _QXZ("Close Info Box"); ?></a></div><br><br>
</div>
	</div>
	</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="PauseCodeSelectBox">
            <div style="position:fixed;width:100%;height:100%;background-color:#e9e9e9;"></div>
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-left:25%">
                    <div class="card">
                        <div class="header">
                            <h2>SELECT A PAUSE CODE:</h2>
                        </div>
                        <div class="body table-responsive"><center>
                                                        <table class="table">
                                <tr><td align="center"><span id="PauseCodeSelectContent"> Pause Code Selection</span>
                                <input type="hidden" name="PauseCodeSelection" id="PauseCodeSelection" /></td></tr>
                            </table></center>
                        </div>
                    </div>
                </div>
            </div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="PresetsSelectBox">
 <div class="container" style="margin: 10% 25%;">
	 <div class="lead>"><?php echo _QXZ("SELECT A PRESET :"); ?></div>
	 <div class="body table-responsive">
                            <center>
                                <table class="table">
                                	<tr>	
                                	<td align="center">
	<span id="PresetsSelectBoxContent"> <?php echo _QXZ("Presets Selection"); ?> </span>
	<input type="hidden" name="PresetSelection" id="PresetSelection" />	</td>
									</tr>
								</table>
							</center>
						</div>
					</div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="GroupAliasSelectBox">
	 <div class="container" style="margin: 10% 25%;">
		 <div class="lead>"><?php echo _QXZ("SELECT A GROUP ALIAS :"); ?></div>
	<?php
	if ($webphone_location == 'bar')
		{echo "<br><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br>\n";}
	?>
	 <div class="body table-responsive">
                            <center>
                                <table class="table">
                                	<tr>	
                                	<td align="center">
	<span id="GroupAliasSelectContent"> <?php echo _QXZ("Group Alias Selection"); ?> </span>
	<input type="hidden" name="GroupAliasSelection" id="GroupAliasSelection" />
	</td>
									</tr>
								</table>
							</center>
						</div>
					</div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="DiaLInGrouPSelectBox">
                <div class="container" style="margin: 10% 25%;">
                    <div class="lead>">
                     SELECT A DIAL IN-GROUP :
                    </div>
	<?php
	if ($webphone_location == 'bar')
		{echo "<br><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br>\n";}
	?>
                        <div class="body table-responsive">
                            <center>
                                <table class="table">
                                	<tr>	
                                	<td align="center">
                                		<span id="DiaLInGrouPSelectContent"> Dial In-Group Selection </span>
										<input type="hidden" name="DiaLInGrouPSelection" id="DiaLInGrouPSelection" /> 
									</td>
									</tr>
								</table>
							</center>
						</div>
					</div>
</span>
<!-- <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9; " id="blind_monitor_alert_span">
	 <div class="container text-center" style="margin:15% auto;">
		 <div class="lead"><?php echo _QXZ("ALERT :"); ?></div>
	<b><font color="red" size="5"><span id="blind_monitor_alert_span_contents"></span></font></b><br>
	 <a href="#" onclick="hideDiv('blind_monitor_alert_span');return false;" class="btn btn-default btn-lg "><?php echo _QXZ("Go Back"); ?></a>
	</div>
</span> -->

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9; " id="DeactivateDOlDSessioNSpan">
        <div class="container" style="margin:15% auto;">
            <div class="lead"><?php echo _QXZ("Another live agent session was open using your user ID. It has been disabled. Click OK to continue to the agent screen."); ?></div>
            <div class="button-place text-center">
                <a href="#" onclick="hideDiv('DeactivateDOlDSessioNSpan');return false;" class="btn btn-default btn-lg ">ok</a>
            </div>
        </div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="InvalidOpenerSpan">
      <div class="container text-center" style="margin:15% auto;">
		  <div class="lead">
                      <?php // echo _QXZ("This agent screen was not opened properly."); ?>
                  </div>
      </div>
</span>



<span style="position:absolute;left:0px;z-index:<?php $zi++; echo $zi ?>; display:none" id="GENDERhideFORieALT">
    
</span> 
			   
            </div>
             </div>
</section>
</form> 


<form name="inert_form" id="inert_form" onsubmit="return false;">
<span style="position:absolute;left:0px;top:400px;z-index:1;" id="NothingBox2">
<input type="checkbox" name="inert_button" class="filled-in" id="inert_button"  value="0" onclick="return false;" /><label for="inert_button"></label>
</span>
</form>

<!-- <form name="alert_form" id="alert_form" onsubmit="return false;">
<span style="position:absolute;left:335px;top:170px;z-index:<?php $zi++; echo $zi ?>;" id="AlertBox">
        <div class="text-center" style="min-width:250px;">
            <div class="card">
                <div class="header bg-orange">
                    <h2>
                        Agent Alert!
                    </h2>
                </div>
                <div class="body"><center>
                    <img src="./images/alert.png" alt="alert" border="0"><br /><br /><span id="AlertBoxContent"> Alert Box </span><br /><button type="button" class="btn btn-primary waves-effect" name="alert_button" id="alert_button" onclick="hideDiv('AlertBox');return false;">OK</button>
                </center></div>
            </div>
        </div>
    </span>

</form> -->

<audio id='ChatAudioAlertFile'><source src="sounds/chat_alert.mp3" type="audio/mpeg"></audio>
<audio id='EmailAudioAlertFile'><source src="sounds/email_alert.mp3" type="audio/mpeg"></audio>

</body>