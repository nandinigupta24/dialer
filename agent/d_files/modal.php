<!-- ZZZZZZZZZZZZ  header -->
<style>
 .center {
    position: absolute;
    width: 100px;
    height: 50px;
    top: 50%;
    left: 50%;
    margin-left: -50px; /* margin is -0.5 * dimension */
    margin-top: -25px; 
}​

</style>
<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;display:none;" id="Header">
    <table border="0" cellpadding="0" cellspacing="0" bgcolor="white" width="<?php echo $MNwidth ?>px" marginwidth="0" marginheight="0" leftmargin="0" topmargin="0" valign="top" align="left">
    <tr valign="top" align="left"><td colspan="3" valign="top" align="left">
    <input type="hidden" name="extension" id="extension" />
    <input type="hidden" name="custom_field_values" id="custom_field_values" value="" />
    <input type="hidden" name="FORM_LOADED" id="FORM_LOADED" value="0" />
	<font class="queue_text">
	<a href="#" onclick="start_all_refresh();"><font class="queue_text"><?php echo _QXZ("Logged in as User"); ?></font></a><?php 
	echo _QXZ(": %1s on Phone: %2s",0,'',$VD_login,$SIP_user); 
	if ($on_hook_agent == 'Y')
		{echo "(<a href=\"#\" onclick=\"NoneInSessionCalL();return false;\">"._QXZ("ring")."</a>)";}
	echo "&nbsp; "._QXZ("to campaign").": $VD_campaign&nbsp; "; 
	?> &nbsp; &nbsp; <span id="agentchannelSPAN"></span></font></td>
    <td colspan="3" valign="top" align="right"><font class="body_text">
	<?php if ($territoryCT > 0) {echo "<a href=\"#\" onclick=\"OpeNTerritorYSelectioN();return false;\">"._QXZ("TERRITORIES")."</a> &nbsp; &nbsp; \n";} ?>
	<?php if ($INgrpCT > 0) {echo "<a href=\"#\" onclick=\"OpeNGrouPSelectioN();return false;\">"._QXZ("GROUPS")."</a> &nbsp; &nbsp; \n";} ?>
	<?php	echo "<a href=\"#\" onclick=\"NormalLogout();return false;needToConfirmExit = false;\">"._QXZ("LOGOUT")."</a>\n"; ?>
    </font></td></tr>
    </table>
</span>

<!-- ZZZZZZZZZZZZ  tabs -->
<span style="position:absolute;left:0px;top:13px;z-index:<?php $zi++; echo $zi ?>;display:none;" id="Tabs">
    <table border="0" bgcolor="#FFFFFF" width="<?php echo $MNwidth ?>px" height="30px">
    <tr valign="top" align="left">
    <td align="left" width="115px" bgcolor="#<?php echo $SSstd_row5_background ?>"><a href="#" onclick="MainPanelToFront('NO','YES');"><img src="<?php echo $selected_logo ?>" alt="MAIN" width="115px" height="30px" border="0" /></a></td>
    <td align="left" width="67px"><a href="#" onclick="ScriptPanelToFront('YES');"><img src="./images/<?php echo _QXZ("vdc_tab_script.gif"); ?>" alt="SCRIPT" width="67px" height="30px" border="0" /></a></td>
	<?php if ($custom_fields_enabled > 0)
    {echo "<td align=\"left\" width=\"67px\"><a href=\"#\" onclick=\"FormPanelToFront('YES');\"><img src=\"./images/"._QXZ("vdc_tab_form.gif")."\" alt=\"FORM\" width=\"67px\" height=\"30px\" border=\"0\" /></a></td>\n";}
	?>
	<?php if ($email_enabled > 0)
    {echo "<td align=\"left\" width=\"67px\"><a href=\"#\" onclick=\"EmailPanelToFront('YES');\"><img src=\"./images/"._QXZ("vdc_tab_email.gif")."\" alt=\"EMAIL\" width=\"67px\" height=\"30px\" border=\"0\" /></a></td>\n";}
	?>
	<?php if ($chat_enabled > 0)
		{
		# INTERNAL CHAT
		echo "<td align=\"left\" width=\"67px\"><a href=\"#\" onclick=\"InternalChatContentsLoad('YES');\"><img src=\"./images/"._QXZ("vdc_tab_chat_internal.gif")."\" name='InternalChatImg' alt=\"CHAT\" width=\"67px\" height=\"30px\" border=\"0\"/></a></td>\n";

		# CUSTOMER CHAT
		echo "<td align=\"left\" width=\"67px\"><a href=\"#\" onclick=\"CustomerChatPanelToFront('1', 'YES');\"><img src=\"./images/"._QXZ("vdc_tab_chat_customer.gif")."\" name='CustomerChatImg' alt=\"CHAT\" width=\"67px\" height=\"30px\" border=\"0\"/></a></td>\n";
		}
	?>
    <td width="<?php echo $HSwidth ?>px" valign="middle" align="center"><font class="body_tiny">&nbsp; <span id="status"><?php echo _QXZ("LIVE"); ?></span>&nbsp; &nbsp; <?php echo _QXZ("session ID:"); ?> <span id="sessionIDspan"></span></font><br><font class="body_text">&nbsp; &nbsp;<span id="AgentStatusCalls"></span>&nbsp; &nbsp;<span id="AgentStatusEmails"></span></font></td>
    <td width="109px"><img src="./images/<?php echo _QXZ("agc_live_call_OFF.gif"); ?>" name="livecall" alt="Live Call" width="109px" height="30px" border="0" /></td>
    </tr>
 </table>
</span>
<span style="z-index:<?php $zi++;echo $zi ?>; display:none; " id="WelcomeBoxA">
    <table class="table table-responsive"><tr><td align="center"><br><span id="WelcomeBoxAt"><?php echo _QXZ("Agent Screen"); ?></span></td></tr></table>
</span>


<span style="position:absolute;left:350px;top:700px;z-index:<?php $zi++;echo $zi ?>;display:none;" id="debugbottomspan"></span>


<span style="position:absolute;left:550px;top:<?php echo $CBheight ?>px;z-index:<?php $zi++;echo $zi ?>; display:none;" id="PauseCodeButtons"><font class="body_text">
    <span id="PauseCodeLinkSpan"></span> <br>
    </font></span>

<span  id="MaiNfooterspan" style="display:none;">
    <span id="blind_monitor_notice_span"><b><font color="red"> &nbsp; &nbsp; <span id="blind_monitor_notice_span_contents"></span></font></b></span>
    <table  id="MaiNfooter" width="<?php echo $MNwidth ?>px">

        <tr><td colspan="3"><font class="body_small"><span id="AgentAlertSpan">
                    <?php
                    if ((preg_match('/ON/', $VU_alert_enabled)) and ( $AgentAlert_allowed > 0)) {
                        echo "<a href=\"#\" onclick=\"alert_control('OFF');return false;\">" . _QXZ("Alert is ON") . "</a>";
                    } else {
                        echo "<a href=\"#\" onclick=\"alert_control('ON');return false;\">" . _QXZ("Alert is OFF") . "</a>";
                    }
                    ?>
                </span></font></td></tr>
    </table>
</span>




<span style="position:absolute;left:<?php echo $PDwidth ?>px;top:<?php echo $AMheight ?>px;z-index:<?php $zi++;
    echo $zi ?>;" id="AgentMuteANDPreseTDiaL"><font class="body_text">
    <?php
    if ($PreseT_DiaL_LinKs) {
        echo "<a href=\"#\" onclick=\"DtMf_PreSet_a_DiaL('NO','YES');return false;\"><font class=\"body_tiny\">" . _QXZ("D1 - DIAL") . "</font></a>\n";
        echo " &nbsp; \n";
        echo "<a href=\"#\" onclick=\"DtMf_PreSet_b_DiaL('NO','YES');return false;\"><font class=\"body_tiny\">" . _QXZ("D2 - DIAL") . "</font></a>\n";
    } else {
        echo "<br>\n";
    }
    ?>
    <br><br> &nbsp; <br>
    </font></span>

<span style="position:absolute;left:350px;top:500px;min-width:400px;overflow:scroll;z-index:<?php $zi++;
    echo $zi ?>;background-color:<?php echo $SIDEBAR_COLOR ?>;" id="callsinqueuedisplay"><table cellpadding="0" cellspacing="0" border="0"><tr><td width="5px" rowspan="2">&nbsp;</td><td align="center"><font class="body_text"><?php echo _QXZ("Calls In Queue:"); ?> &nbsp; </font></td></tr><tr><td align="center"><span id="callsinqueuelist">&nbsp;</span></td></tr></table></span>

<span style="position:absolute;left:<?php echo $CLwidth ?>px;top:<?php echo $QLheight ?>px;z-index:<?php $zi++;echo $zi ?>;display:none;" id="callsinqueuelink">
    <?php
    if ($view_calls_in_queue > 0) {
        if ($view_calls_in_queue_launch > 0) {
            echo "<a href=\"#\" onclick=\"show_calls_in_queue('HIDE');\">" . _QXZ("Hide Calls In Queue") . "</a>\n";
        } else {
            echo "<a href=\"#\" onclick=\"show_calls_in_queue('SHOW');\">" . _QXZ("Show Calls In Queue") . "</a>\n";
        }
    }
    ?>
</span>
<span style="position:absolute;left:300px;top:<?php echo $CBheight ?>px;z-index:<?php $zi++; echo $zi ?>;visibility:hidden;" id="CallbacksButtonsOLD">
    <font class="body_text">
        <span id="CBstatusSpanOLD"><?php echo _QXZ("X ACTIVE CALLBACKS"); ?></span> <br />
    </font>
</span>

<span style="position:absolute;left:500px;top:<?php echo $AMheight ?>px;z-index:<?php $zi++;
    echo $zi ?>;" id="OtherTabCommentsSpan">
    <?php
    if (($comments_all_tabs == 'ENABLED') and ( $label_comments != '---HIDE---')) {
        $zi++;
        echo "<table cellspacing=4 cellpadding=0><tr><td align=\"right\"><font class=\"body_text\">\n";
        echo "$label_comments: <br><span id='otherviewcommentsdisplay'><input type='button' id='OtherViewCommentButton' onClick=\"ViewComments('ON','','','YES')\" value='-" . _QXZ("History") . "-'/></span>
		</font></td><td align=\"left\"><font class=\"body_text\">";
        if (($multi_line_comments)) {
            echo "<textarea name=\"other_tab_comments\" id=\"other_tab_comments\" rows=\"2\" cols=\"65\" class=\"form-control_text\" value=\"\"></textarea>\n";
        } else {
            echo "<input type=\"text\" size=\"65\" name=\"other_tab_comments\" id=\"other_tab_comments\" maxlength=\"255\" class=\"form-control\" value=\"\" />\n";
        }
        echo "</td></tr></table>\n";
    } else {
        echo "<input type=\"hidden\" name=\"other_tab_comments\" id=\"other_tab_comments\" value=\"\" />\n";
    }
    ?>
</span>

<span style="position:absolute;left:73.2%;top:100px;z-index:<?php $zi++;
    echo $zi ?>;" id="AgentViewSpan">
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
/* $zi++;
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

<span style="position:absolute;left:200px;top:<?php echo $CBheight ?>px;z-index:<?php $zi++;
    echo $zi ?>;" id="dialableleadsspan">
<?php
if ($agent_display_dialable_leads > 0) {
    echo _QXZ("Dialable Leads:") . "<br> &nbsp;\n";
}
?>
</span>

<span style="position:absolute;left:140px;top:650px;z-index:<?php $zi++;echo $zi ?>;" id="AgentMuteSpanOLD"></span>
<span style="position:absolute;left:<?php echo $AMwidth ?>px;top:<?php echo $SRheight ?>px;z-index:<?php $zi++; echo $zi ?>;display:none;" id="MainCommit">
<a href="#" onclick="CustomerData_update('YES')"><font class="body_small"><?php echo _QXZ("commit"); ?></font></a>
</span>

<span style="position:absolute;left:154px;top:<?php echo $SFheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="ScriptPanel">
	<?php
	if ($webphone_location == 'bar')
        {echo "<img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
	?>
    <table border="0" bgcolor="<?php echo $SCRIPT_COLOR ?>" width="<?php echo $SSwidth ?>px" height="<?php echo $SSheight ?>px"><tr><td align="left" valign="top"><font class="sb_text"><div class="noscroll_script" id="ScriptContents"><?php echo _QXZ("AGENT SCRIPT"); ?></div></font></td></tr></table>
</span>

<span style="position:absolute;left:<?php echo $AMwidth ?>px;top:<?php echo $SRheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="ScriptRefresH">
<a href="#" onclick="RefresHScript('','YES')"><font class="body_small"><?php echo _QXZ("refresh"); ?></font></a>
</span>

<span style="position:absolute;left:154px;top:<?php echo $SFheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="FormPanel">
	<?php
	if ($webphone_location == 'bar')
        {echo "<img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
	?>
    <table border="0" bgcolor="<?php echo $SCRIPT_COLOR ?>" width="<?php echo $SSwidth ?>px" height="<?php echo $SSheight ?>px"><tr><td align="left" valign="top"><font class="sb_text"><div class="noscroll_script" id="FormContents"><iframe src="./vdc_form_display.php?lead_id=&list_id=&stage=WELCOME" style="background-color:transparent;" scrolling="auto" frameborder="0" allowtransparency="true" id="vcFormIFrame" name="vcFormIFrame" width="<?php echo $SDwidth ?>px" height="<?php echo $SSheight ?>px" STYLE="z-index:<?php $zi++; echo $zi ?>"> </iframe></div></font></td></tr></table>
</span>

<span style="position:absolute;left:154px;top:<?php echo $SFheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="EmailPanel">
	<?php
	if ($webphone_location == 'bar')
        {echo "<img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
	?>
    <table border="0" bgcolor="<?php echo $SCRIPT_COLOR ?>" width="<?php echo $SSwidth ?>px" height="<?php echo $SSheight ?>px"><tr><td align="left" valign="top"><font class="sb_text"><div class="noscroll_script" id="EmailContents"><iframe src="./vdc_email_display.php?lead_id=&list_id=&stage=WELCOME" style="background-color:transparent;" scrolling="auto" frameborder="0" allowtransparency="true" id="vcEmailIFrame" name="vcEmailIFrame" width="<?php echo $SDwidth ?>px" height="<?php echo $SSheight ?>px" STYLE="z-index:<?php $zi++; echo $zi ?>"> </iframe></div></font></td></tr></table>
</span>

<span style="position:absolute;left:154px;top:<?php echo $SFheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="CustomerChatPanel">
	<?php
	if ($webphone_location == 'bar')
        {echo "<img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
	?>
    <table border="0" bgcolor="<?php echo $SCRIPT_COLOR ?>" width="<?php echo $SSwidth ?>px" height="<?php echo $SSheight ?>px"><tr><td align="left" valign="top"><font class="sb_text"><div class="noscroll_script" id="ChatContents"><iframe src="./vdc_chat_display.php?lead_id=&list_id=&dial_method=<?php echo $dial_method; ?>&stage=WELCOME&server_ip=<?php echo $server_ip; ?>&user=<?php echo $VD_login.$VARchatgroupsURL ?>" style="background-color:transparent;" scrolling="auto" frameborder="0" allowtransparency="true" id="CustomerChatIFrame" name="CustomerChatIFrame" width="<?php echo $SDwidth ?>px" height="<?php echo $SSheight ?>px" STYLE="z-index:<?php $zi++; echo $zi ?>"> </iframe></div></font></td></tr></table>
</span>

<span style="position:absolute;left:154px;top:<?php echo $SFheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="InternalChatPanel">
	<?php
	if ($webphone_location == 'bar')
        {echo "<img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
	?>
    <table border="0" bgcolor="<?php echo $SCRIPT_COLOR ?>" width="<?php echo $SSwidth ?>px" height="<?php echo $SSheight ?>px"><tr><td align="left" valign="top"><font class="sb_text"><div class="noscroll_script" id="InternalChatContents"><iframe src="./agc_agent_manager_chat_interface.php?user=<?php echo $VD_login; ?>&pass=<?php echo $VD_pass; ?>" style="background-color:transparent;" scrolling="auto" frameborder="0" allowtransparency="true" id="InternalChatIFrame" name="InternalChatIFrame" width="<?php echo $SDwidth ?>px" height="<?php echo $SSheight ?>px" STYLE="z-index:<?php $zi++; echo $zi ?>"> </iframe></div></font></td></tr></table>
</span>


<span style="position:absolute;left:<?php $tempAMwidth = ($AMwidth - 15); echo $tempAMwidth ?>px;top:<?php echo $SRheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="FormRefresH">
<a href="#" onclick="FormContentsLoad('YES')"><font class="body_small"><?php echo _QXZ("reset form"); ?></font></a>
</span>
<?php if (($HK_statuses_camp > 0) && ($user_level >= $HKuser_level) && ($VU_hotkeys_active > 0)) { ?>

    <span style=" display:none; position:absolute;left:<?php echo $HKwidth ?>px;top:<?php echo $HKheight ?>px;z-index:<?php $zi++;
    echo $zi ?>;" id="hotkeysdisplay"><a href="#" onMouseOver="HotKeys('ON')"><img src="./images/<?php echo _QXZ("vdc_XB_hotkeysactive_OFF.gif"); ?>" border="0" alt="HOT KEYS INACTIVE" /></a></span>
<?php } ?>


<span style="position:absolute;left:320px;top:175px;z-index:999999;display:none;" id="TransferMain">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="TransferMaindiv">
        <div class="card">
            <div class="header">
                <h2>Transfer conference function:</h2>&nbsp;<span id="XfeRDiaLGrouPSelecteD_OLD"></span> &nbsp; &nbsp; <span id="XfeRCID"></span>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><span id="XfeRGrouPLisT_OLD"><select size="1" name="XfeRGrouP_OLD" id="XfeRGrouP_OLD" class="form-control" onChange="XferAgentSelectLink();return false;"><option>-- SELECT A GROUP TO SEND YOUR CALL TO --</option></select></span></td>
                                <td><span id="LocalCloser"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="LOCAL CLOSER Off" disabled>Local Closer</button></span></td>
                                <td><span id="HangupXferLine_OLD"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Hangup Xfer Line Off" disabled>Hangup Xfer Line</button></span></td>
                                <td><span id="ParkXferLine_OLD"><img src="./images/vdc_XB_parkxferline_OFF.gif" border="0" alt="Park Xfer Line" style="vertical-align:middle" /></span></td>
                            </tr>
                            <tr>
                                <td>seconds:<input type="text" size="2" name="xferlength_OLD" id="xferlength_OLD" maxlength="4" class="cust_form" readonly="readonly" /></td>
                                <td>channel:<input type="text" size="12" name="xferchannel_OLD" id="xferchannel_OLD" maxlength="200" class="cust_form" readonly="readonly" /></td>
                                <td><span id="consultative_checkbox_OLD"><input type="checkbox" name="consultativexfer_OLD" class="filled-in chk-col-blue-grey" id="consultativexfer_OLD" size="1" value="0"><label for="consultativexfer">CONSULTATIVE</label></span></td>	
                                <td><span id="HangupBothLines"><a href="#" onclick="bothcall_send_hangup('YES');return false;"><button type="button" style="width:136px" class="btn bg-red btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Hangup Both Lines">Hangup Both Lines</button></a></span></td>
                            </tr>
                            <tr>
                                <td>Number to call: 
                                    <?php
                                    if ($hide_xfer_number_to_dial == 'ENABLED') {
                                        ?>
                                        <input type="hidden" name="xfernumber_OLD" id="xfernumber_OLD" value="<?php echo $preset_populate ?>" />
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" size="20" name="xfernumber_OLD" id="xfernumberold" maxlength="25" class="cust_form" value="<?php echo $preset_populate ?>" /> 
    <?php
}
?>
                                </td>
                                <td><span id="agentdirectlink"><a href="#" onclick="XferAgentSelectLaunch();return false;">AGENTS</a></span>
                                    <input type="hidden" name="xferuniqueid_OLD" id="xferuniqueid_OLD" />
                                    <input type="hidden" name="xfername_OLD" id="xfername_OLD" />
                                    <input type="hidden" name="xfernumhidden_OLD" id="xfernumhidden_OLD" />
                                </td>
                                <td>
                                    <span id="dialoverride_checkbox_OLD"><input type="checkbox" class="filled-in chk-col-blue-grey" name="xferoverride_OLD" id="xferoverride_OLD" size="1" value="0"><font class="body_tiny" ><label for="xferoverride">DIAL OVERRIDE</label><?php if ($manual_dial_override_field == 'DISABLED') {
    echo " " . _QXZ("DISABLED");
} ?></font></span>
                                </td>
                                <td>
                                    <span style="background-color: #CCCCCC" id="Leave3WayCall_OLD"><a href="#" onclick="leave_3way_call('FIRST', 'YES');return false;"><button type="button" style="width:136px" class="btn bg-blue btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="LEAVE 3-WAY CALL">Leave 3-Way Call</button></a></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><span id="DialBlindTransfer"><button type="button" style="width:136px" class="btn bg-blue-grey btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Dial Blind Transfer off" disabled>Dial Blind Transfer</button></span>
                                    <span id="DialWithCustomer"><a href="#" onclick="SendManualDial('YES', 'YES');return false;"><button type="button" style="width:136px" class="btn bg-blue btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Dial With Customer">Dial With Customer</button></a></span>
                                    <span style="background-color: #CCCCCC" id="ParkCustomerDial"><a href="#" onclick="xfer_park_dial('YES');return false;"><button type="button" style="width:136px" class="btn bg-blue btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Park Customer Dial">Park Customer Dial</button></a></span>
                                    <?php
                                    if ($enable_xfer_presets == 'ENABLED') {
                                        ?>
                                        <span style="background-color: #ccc" id="PresetPullDown_OLD"><a href="#" onclick="generate_presets_pulldown('YES');return false;">
                                                <button type="button" style="width:136px" class="btn bg-blue btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Preset Button ">Preset</button></a></span>
    <?php
} else {
    if (($enable_xfer_presets == 'CONTACTS') and ( $VU_preset_contact_search != 'DISABLED')) {
        ?>
                                            <span style="background-color:#ccc;" id="ContactPullDown_OLD"><a href="#" onclick="generate_contacts_search('YES');return false;">
                                                    <button type="button" style="width:136px" class="btn bg-blue btn-block btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Contacts">Contacts</button></a></span>
                                            <?php
                                        } else {
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

<span style="position:absolute;left:0px;top:0px;width:100%;height:100%;overflow:scroll;z-index:<?php $zi++;
                                    echo $zi ?>;background-color:<?php echo $SIDEBAR_COLOR ?>;" id="AgentXferViewSpan"><center><font class="body_text">
<?php echo _QXZ("Available Agents Transfer:"); ?> <span id="AgentXferViewSelect_OLD"></span></font><br><a href="#" onclick="AgentsXferSelect('0', 'AgentXferViewSelect');return false;"><?php echo _QXZ("close"); ?></a></center></span>

<span style="position:absolute;left:5px;top:<?php echo $HTheight ?>px;z-index:<?php $zi++;
echo $zi ?>;" id="EAcommentsBox">
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

<span style="position:absolute;left:695px;top:<?php echo $HTheight ?>px;z-index:<?php $zi++;
echo $zi ?>;" id="EAcommentsMinBox">
    <table border="0" bgcolor="#FFFFCC" width="40px" height="20px">
        <tr bgcolor="#FFFF66">
            <td align="left"><font class="sk_text"><a href="#" onclick="EAcommentsBoxshow();return false;"> <?php echo _QXZ("maximize"); ?> </a> <br><?php echo _QXZ("Alt Phone Info"); ?></font></td>
        </tr></table>
</span>
<span style="position:absolute;left:0px;top:0px;z-index:999999;width:100%;height:100%;background-color:#e9e9e9;" id="NoneInSessionBox">
    <div class="container text-center">
        <div class="lead"><?php echo _QXZ("No one is in your session:"); ?><span id="NoneInSessionID"></span></div>
        <br/><br/>
        <div class="button-place">
            <a href="#" onclick="NoneInSessionOK();return false;" class="btn btn-danger btn-app">Go Back</a>&nbsp;&nbsp;<span id="NoneInSessionLink"><a href="#" onclick="NoneInSessionCalL();return false;" class="btn btn-success btn-app">Call Agent Again</a></span>
        </div>
    </div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="CustomerGoneBox">
    <table border="0"  width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center"> <?php echo _QXZ("Customer has hung up:"); ?> <span id="CustomerGoneChanneL"></span><br>
                <a class="btn btn-default" href="#" onclick="CustomerGoneOK();return false;"><?php echo _QXZ("Go Back"); ?></a>
                <br><br>
                <a class="btn btn-default" href="#" onclick="CustomerGoneHangup();return false;"><?php echo _QXZ("Finish and Disposition Call"); ?></a>
            </td></tr></table>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;
echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="WrapupBox">
    <table border="0"  width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center"> <?php echo _QXZ("Call Wrapup:"); ?> <span id="WrapupTimer"></span> <?php echo _QXZ("seconds remaining in wrapup"); ?><br><br>
                <span id="WrapupMessage"><?php echo $wrapup_message ?></span>
                <br><br>
                <span id="WrapupBypass"><a class="btn btn-dafault" href="#" onclick="WrapupFinish();return false;"><?php echo _QXZ("Finish Wrapup and Move On"); ?></a></span>
            </td></tr></table>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;
echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="FSCREENWrapupBox"><table border="0"  width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px" cellpadding="0" cellspacing="0"><tr><td><span id="FSCREENWrapupMessage"><?php echo $wrapup_message ?></span></td></tr></table></span>

<span class="text-center" style="position:absolute;left:350px;top:175px;z-index:<?php $zi++;echo $zi ?>;width:400px" id="TimerSpan">
    <div class="card" style="height:240px;">
        <div class="body">
            <span id="TimerContentSpan"></span>
            <br /><a href="#" class="btn btn-danger  waves-effect" onclick="hideDiv('TimerSpan');return false;">Close Message</a>
        </div>
    </div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:999;width:100%;height:100%;background-color:#e9e9e9;" id="AgenTDisablEBoX">
    <center><table style="margin:15% auto;"><tr><td align="center"><span style="font-size:30px;">Your session has been disabled</span><br /><br /><a href="#" onclick="LogouT('DISABLED', '');return false;" class="btn btn-primary btn-lg waves-effect">Click Here To Reset Your Session</a>
                </td></tr></table></center>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="SysteMDisablEBoX">
    <center><table style="margin:15% auto;"><tr><td align="center">There is a time synchronization problem with your system, please tell your system administrator<br /><br /><br /><a href="#" onclick="hideDiv('SysteMDisablEBoX');return false;" class="btn btn-default btn-lg waves-effect">Go Back</a>
                </td></tr></table></center>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;display:none;" id="LogouTBoxOLD">
    <div class="container text-center">
        <br><br><br><br><br><span id="LogouTProcess">
            <br>
            <br>
            <font class="loading_text">LOGOUT PROCESSING...</font>
            <br>
            <br>
            <div class="preloader pl-size-xl"><div class="spinner-layer"><div class="circle-clipper left"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
        </span><br><br><span id="LogouTBoxLinkOLD"><font class="loading_text">LOGOUT</font></span></div>
</span>

<span style="position:absolute;left:0px;top:70px;z-index:<?php $zi++;
echo $zi ?>;" id="DispoButtonHideA">
    <table border="0" width="165px" height="22px" style="background:transparent"><tr><td align="center" valign="top"></td></tr></table>
</span>

<span style="position:absolute;left:0px;top:138px;z-index:<?php $zi++;
echo $zi ?>;" id="DispoButtonHideB">
    <table border="0"  width="165px" height="250px" style="background:transparent"><tr><td align="center" valign="top">&nbsp;</td></tr></table>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;
echo $zi ?>;width:100%;height:100%;" id="DispoButtonHideC">
    <div class="alert alert-info"><?php echo _QXZ("Any changes made to the customer information below at this time will not be comitted, You must change customer information before you Hangup the call."); ?></div>
</span>


<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="DispoSelectBox">
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
                                    <a href="#" class="btn btn-warning waves-effect" onclick="DispoSelectContent_create('', 'ReSET', 'YES');return false;">CLEAR FORM</a>
                                    <a href="#" class="btn btn-primary waves-effect" onclick="DispoSelect_submit('', '', 'YES');return false;">SUBMIT</a>
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
<!--Agent Callback Selection START-->
<div class="modal center-modal fade" id="AgentCallbackSelection-Modal" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-black">
                  <h5 class="modal-title">Agent Callback Selection</h5>
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="CallBackOnlyMe" class="filled-in" id="CallBackOnlyMe" value="0">
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                          <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                              <input type="text" class="form-control pull-right datepicker" name="CallBackDatESelectioN"/>
                    </div>
                    </div>
                </div>
                <div class="bootstrap-timepicker">
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Time</label>
                        <div class="col-sm-10">
                              <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                                  <input type="text" class="form-control pull-right timepicker" name="CallBackTimESelectioN"/>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                    <div class="col-sm-10">
                          <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" class="form-control pull-right">
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Comments</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="CallBackCommenTsField" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Personal</label>
                    <div class="col-sm-10">
                        <button type="button" class="btn btn-md btn-toggle btn-info active" data-toggle="button" aria-pressed="true" autocomplete="off">
						<div class="handle"></div>
					  </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                  <!--<button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>-->
                  <button type="button" class="btn btn-success float-right" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-dark float-right" style="margin-right:10px;" onclick="CallBackDatE_submit();return false;">Submit</button>
            </div>
          </div>
    </div>
</div>

<!--AGENT Callback Selection END-->

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;display:none" id="CallBackSelectBoxOLD">
    <div class="row clearfix" style="margin-left:15%">
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header text-center">
                    <h4>
                                    <?php echo _QXZ("Select a CallBack Date "); ?><span id="CallBackDatE"></span>                 </h4>
                </div>
                <input type="hidden" name="CallBackDatESelectioNOLD" id="CallBackDatESelectioN" />
                <input type="hidden" name="CallBackTimESelectioNOLD" id="CallBackTimESelectioN" />
                <span id="CallBackDatEPrinT"><?php echo _QXZ("Select a Date Below"); ?></span> &nbsp;
                <span id="CallBackTimEPrinT"></span> 
                <div class="">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="CBT_hour"><?php echo _QXZ("Hour:"); ?> </label>
                                <select size="1" name="CBT_hour" id="CBT_hour" class="form-control">
<?php
if ($callback_time_24hour > 0) {
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
                                    if ($callback_time_24hour > 0) {
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
                    if ($callback_time_24hour < 1) {
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
if ($agentonly_callbacks) {
    echo "<div class='col-lg-2 col-md-2 col-sm-4 col-xs-6'>
			<input type=\"checkbox\" name=\"CallBackOnlyMe\" class=\"filled-in\" id=\"CallBackOnlyMe\" value=\"0\" /> <label for=\"CallBackOnlyMe\">" . _QXZ("My Callback Only") . "</label></div> ";
}

if ($comments_callback_screen != 'REPLACE_CB_NOTES') {
    echo "<div class='col-lg-3 col-md-3 col-sm-4 col-xs-6'>
			<div class='form-group'>
				<div class='form-line'><label for=\"CallBackCommenTsFieldOLD\">CB Comments</label><input class=\"form-control\" type=\"text\" name=\"CallBackCommenTsFieldOLD\" id=\"CallBackCommenTsField\" size=\"50\" maxlength=\"255\" /></div></div></div>\n";
} else {
    echo "<input type=\"hidden\" name=\"CallBackCommenTsFieldOLD\" id=\"CallBackCommenTsField\" value=\"\" /><br>\n";
}

echo "<span id=\"CBCommentsContent\"><input type=\"hidden\" name=\"cbcomment_comments\" id=\"cbcomment_comments\" value=\"\" /></span>\n";
?>
                    <a class="btn btn-primary" href="#" onclick="CallBackDatE_submit();return false;"><?php echo _QXZ("SUBMIT"); ?></a>
                </div>

                <br><br><center>
                    <span id="CallBackDateContent"><?php echo "$CCAL_OUT" ?></span></center><br><br>
            </div>
        </div>
    </div>
</span>


<!--
<span style="position:absolute;left:325px;top:755px;z-index:<?php $zi++;
echo $zi ?>;" id="CBcommentsBox">
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

<span style="position:absolute;left:0px;top:0px;z-index:999999;width:100%;height:100%;visibility:hidden;" id="CallBacKsLisTBoxOLD">
    <table border="0" bgcolor="#CCFFCC" width="100%" height="100%"><tr><td align="center" valign="top"> <font class="sh_text"><?php echo _QXZ("CALLBACKS FOR AGENT %1s:<br />To see information on one of the callbacks below, click on the INFO link. To call the customer back now, click on the DIAL link. If you click on a record below to dial it, it will be removed from the list.",0,'',$VD_login); ?></font>
 <br />
	<?php
	if ($webphone_location == 'bar')
        {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
	?>
	<div class="scroll_callback_auto" id="CallBacKsLisT"></div>
    <br /><font class="sh_text"> &nbsp;
	<a href="#" onclick="CalLBacKsLisTCheck();return false;"><?php echo _QXZ("Refresh"); ?></a>
	 &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; 
	<a href="#" onclick="CalLBacKsLisTClose();return false;"><?php echo _QXZ("Go Back"); ?></a>
	</font>
    </td></tr></table>
</span>


<div class="modal center-modal fade" id="CallBack-Modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-black">
                  <h5 class="modal-title">Callbacks</h5>
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
              <div class="modal-body" id="CallBacKsLisTNEW">
                  <table class="table table-bordered table-striped" id="CallBackList-listings">
                      <thead class="bg-success">
                          <tr>
                              <th>Date</th>
                              <th>Number</th>
                              <th>Name</th>
                              <th>Comments</th>
                              <th>Status</th>
                              <th>Campaign</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                      </tbody>
                  </table> 
              </div>
            <div class="modal-footer modal-footer-uniform">
                  <button type="button" class="btn btn-bold btn-pure btn-danger btn-app" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-bold btn-pure btn-primary float-right btn-app" onclick="CalLBacKsLisTCheck();return false;"><?php echo _QXZ("Refresh"); ?></button>
            </div>
          </div>
    </div>
</div>

<!--Group Modal-->
<div class="modal fade" id="modal-inbound-groups" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-black"> 
                <h4 class="modal-title" style="margin: 0 auto;">INBOUND GROUPS</h4>
<!--                <h4 class="modal-title">Inbound Groups</h4>-->
                <!--                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>-->
            </div>
            <div class="modal-body">
                <!--<center>-->
                    <span id="CloserSelectContent"> <?php echo _QXZ("Closer Inbound Group Selection"); ?> </span>
                    <input type="hidden" name="CloserSelectList" id="CloserSelectList" />
<?php
if (($outbound_autodial_active > 0) and ( $disable_blended_checkbox < 1) and ( $dial_method != 'INBOUND_MAN') and ( $VU_agent_choose_blended > 0)) {
    ?>
                    <input type="checkbox" class="filled-in" name="CloserSelectBlended" id="CloserSelectBlended"  value="0" style="display:none;"/>
                        <label for="CloserSelectBlended" style="display:none;"> <?php echo _QXZ("BLENDED CALLING(outbound activated)"); ?></label>
    <?php
}
?>
<!--                    <a class="btn btn-primary" href="#" onclick="CloserSelect_submit('YES');return false;"><?php echo _QXZ("Submit"); ?></a>
                    <a class="btn btn-warning" href="#" onclick="CloserSelectContent_create('YES');return false;"> <?php echo _QXZ("Reset"); ?> </a> -->
                <!--</center>-->
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-success btn-app" onclick="CloserSelect_submit('YES');return false;"><?php echo _QXZ("Submit"); ?></button>
                <button type="button" class="btn btn-warning btn-app" onclick="CloserSelectContent_create('YES');return false;"><?php echo _QXZ("Reset"); ?></button>
                <button type="button" class="btn btn-danger btn-app" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<!--<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;
echo $zi ?>;height:100%;width:100%;background-color:#e9e9e9;" id="CloserSelectBox1">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-left:25%;">
        <div class="card">
            <div class="header ">
                                <h2><?php echo _QXZ("CLOSER INBOUND GROUP SELECTION"); ?></h2>
                                </div>

        <div class="body"><center>
        <span id="CloserSelectContent1"> <?php echo _QXZ("Closer Inbound Group Selection"); ?> </span>
    <input type="hidden" name="CloserSelectList1" id="CloserSelectList1" /><br>
<?php
if (($outbound_autodial_active > 0) and ( $disable_blended_checkbox < 1) and ( $dial_method != 'INBOUND_MAN') and ( $VU_agent_choose_blended > 0)) {
    ?>
            <input type="checkbox" class="filled-in" name="CloserSelectBlended" id="CloserSelectBlended"  value="0" />
            <label for="CloserSelectBlended"> <?php echo _QXZ("BLENDED CALLING(outbound activated)"); ?></label> <br><br><br>
    <?php
}
?>
        <a class="btn btn-primary" href="#" onclick="CloserSelect_submit('YES');return false;"><?php echo _QXZ("Submit"); ?></a>
        <a class="btn btn-warning" href="#" onclick="CloserSelectContent_create('YES');return false;"> <?php echo _QXZ("Reset"); ?> </a> 
        
                </center></div></div></div>
</span>-->

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;
echo $zi ?>;height:100%;width:100%;background-color:#e9e9e9;" id="TerritorySelectBox">
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

<span style="position:absolute;left:500px;top:300px;z-index:<?php $zi++;
    echo $zi ?>;height:25%;width:25%;background-color:#e9e9e9;" id="NothingBox">
    <span id="DiaLLeaDPrevieWHide"> <?php echo _QXZ("Channel"); ?></span>
    <span id="DiaLDiaLAltPhonEHide"> <?php echo _QXZ("Channel"); ?></span>
<?php
if (!$agentonly_callbacks) {
    echo "<input type=\"checkbox\" name=\"CallBackOnlyMe\" id=\"CallBackOnlyMe\" size=\"1\" value=\"0\" /> " . _QXZ("MY CALLBACK ONLY") . " <br>";
}
if (($outbound_autodial_active < 1) or ( $disable_blended_checkbox > 0) or ( $dial_method == 'INBOUND_MAN') or ( $VU_agent_choose_blended < 1)) {
    echo "<input type=\"checkbox\" name=\"CloserSelectBlended\" id=\"CloserSelectBlended\" size=\"1\" value=\"0\" /> " . _QXZ("BLENDED CALLING") . "<br>";
}
?>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;
echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="CalLLoGDisplaYBox">
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

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;
echo $zi ?>;height:100%;width:100%;background-color:#e9e9e9;" id="SearcHContactsDisplaYBox">
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

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;
echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="SearcHResultSContactsBox">
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="margin-left:16%; ">
        <div class="card" >
            <div class="header">
                <div class="lead text-center" ><?php echo _QXZ("CONTACTS SEARCH RESULTS:"); ?><a class="pull-right btn btn-danger" href="#"  onclick="hideDiv('SearcHResultSContactsBox');return false;">close [X]</a></div>
            </div>
            <div class="text-center">
                <div class="scroll_calllog" id="SearcHResultSContactsSpan"> <?php echo _QXZ("Search Results"); ?> </div>
            </div></div></div>

</span>

<span style="position:absolute;z-index:<?php $zi++;
echo $zi ?>;height:100%;width:100%;left:0px;top:0px;background-color:#e9e9e9;" id="SearcHForMDisplaYBox">
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
<?php echo _QXZ("Notes: when doing a search for a lead, the phone number, lead ID or %1s are the best fields to use.", 0, '', $label_vendor_lead_code); ?> <br /><?php echo _QXZ("Using the other fields may be slower. Lead searching does not allow for wildcard or partial search terms."); ?> <br /><?php echo _QXZ("Lead search requests are all logged in the system."); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;
echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="SearcHResultSDisplaYBox">
    <div class="container" style="margin: 7% 17%;">
        <div class="pull-right"><a class="btn btn-danger" href="#" onclick="hideDiv('SearcHResultSDisplaYBox');return false;"><?php echo _QXZ("close"); ?> [X]</a></div>
        <div class="lead text-center"><?php echo _QXZ("SEARCH RESULTS:"); ?></div><br><br>
        <div class="text-center">
            <div class="scroll_calllog" id="SearcHResultSSpan"> <?php echo _QXZ("Search Results"); ?> </div>
        </div><br><br>
        <div class="text-center"><a class="btn btn-danger" href="#" onclick="hideDiv('SearcHResultSDisplaYBox');return false;"><?php echo _QXZ("Close Info Box"); ?></a></div>
    </div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;
echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="CalLNotesDisplaYBox">
    <div class="container" >
        <div class="pull-right"><a class="btn btn-danger" href="#" onclick="hideDiv('CalLNotesDisplaYBox');return false;"><?php echo _QXZ("close"); ?> [X]</a></div>
        <div class="lead text-center"><?php echo _QXZ("CALL NOTES LOG:"); ?></div><br><br>
        <div class="text-center">
            <div class="scroll_calllog" id="CallNotesSpan"> <?php echo _QXZ("Call Notes List"); ?> </div>
        </div><br><br>
        <div class="text-center"><a class="btn btn-danger" href="#" onclick="hideDiv('CalLNotesDisplaYBox');return false;"><?php echo _QXZ("Close Info Box"); ?></a></div>
    </div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:99999;width:100%;height:100%;background-color:#e9e9e9;" id="LeaDInfOBox">
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

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="PauseCodeSelectBox">
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

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;
echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="PresetsSelectBox">
    <div class="container" style="margin: 10% 25%;">
        <div class="lead>"><?php echo _QXZ("SELECT A PRESET :"); ?></div>
        <div class="body table-responsive">
            <center>
                <table class="table">
                    <tr>	
                        <td align="center">
                            <span id="PresetsSelectBoxContent_OLD"> <?php echo _QXZ("Presets Selection"); ?> </span>
                            <input type="hidden" name="PresetSelection" id="PresetSelection" />	</td>
                    </tr>
                </table>
            </center>
        </div>
    </div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;
echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="GroupAliasSelectBox">
    <div class="container" style="margin: 10% 25%;">
        <div class="lead>"><?php echo _QXZ("SELECT A GROUP ALIAS :"); ?></div>
<?php
if ($webphone_location == 'bar') {
    echo "<br><img src=\"./images/" . _QXZ("pixel.gif") . "\" width=\"1px\" height=\"" . $webphone_height . "px\" /><br>\n";
}
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

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;
echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="DiaLInGrouPSelectBox">
    <div class="container" style="margin: 10% 25%;">
        <div class="lead>">
            SELECT A DIAL IN-GROUP :
        </div>
<?php
if ($webphone_location == 'bar') {
    echo "<br><img src=\"./images/" . _QXZ("pixel.gif") . "\" width=\"1px\" height=\"" . $webphone_height . "px\" /><br>\n";
}
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
<!-- <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;
echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9; " id="blind_monitor_alert_span">
         <div class="container text-center" style="margin:15% auto;">
                 <div class="lead"><?php echo _QXZ("ALERT :"); ?></div>
        <b><font color="red" size="5"><span id="blind_monitor_alert_span_contents"></span></font></b><br>
         <a href="#" onclick="hideDiv('blind_monitor_alert_span');return false;" class="btn btn-default btn-lg "><?php echo _QXZ("Go Back"); ?></a>
        </div>
</span> -->

<span style="position:absolute;left:0px;top:0px;z-index:99999;width:100%;height:100%;background-color:#e9e9e9;display:none;" id="DeactivateDOlDSessioNSpan">
    <div class="container" style="margin:15% auto;">
        <div class="lead"><?php echo _QXZ("Another live agent session was open using your user ID. It has been disabled. Click OK to continue to the agent screen."); ?></div>
        <div class="button-place text-center">
            <a href="#" onclick="hideDiv('DeactivateDOlDSessioNSpan');return false;" class="btn btn-default btn-lg ">ok</a>
        </div>
    </div>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++;
echo $zi ?>;width:100%;height:100%;background-color:#e9e9e9;" id="InvalidOpenerSpan">
    <div class="container text-center" style="margin:15% auto;">
        <div class="lead">
<?php // echo _QXZ("This agent screen was not opened properly.");  ?>
        </div>
    </div>
</span>



<span style="position:absolute;left:0px;z-index:<?php $zi++;
echo $zi ?>; display:none" id="GENDERhideFORieALT">

</span>
<!--<div class="modal fade" id="modal-logout1">
    <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-success">
                  <h4 class="modal-title">Logout</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary float-right"></button>
            </div>
          </div>
           /.modal-content 
    </div>
     /.modal-dialog 
</div>-->

<div id="modal-logout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-black text-center">
                <h3 class="modal-title">Are you sure that's what you want?</h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning bg-pale-warning">
                    <p>Make sure you are not in a call or waiting for a call.</p>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <span id="LogouTBoxLinkModalNewq"></span>
                        <a class="btn btn-primary LogouTBoxLinkModal" id="LogouTBoxLinkModalNEW">Log me out</a>
                        <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
<!--            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
            </div>-->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="NeWManuaLDiaLBoxModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-black">
                <h4 class="modal-title text-center" id="myModalLabel">Manual Dial</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                                <span class="input-group-addon bg-secondary"><i class="fa fa-phone"></i></span>
                                <input type="text" size="14" maxlength="18" name="MDPhonENumbeR" id="MDPhonENumbeR" class="form-control" value="01282526693" placeholder="Phone Number"/>
                            </div> 
                <table class="table" style="display:none;">
                    <tr style="display:none;">
                        <td align="right"></td>
                        <td align="right">
                            <div class="col-md-6">
                                <input type="text" size="7" maxlength="10" name="MDDiaLCodE" id="MDDiaLCodE" class="form-control" value="1" />
                            </div>(This is usually a 1 in the USA-Canada)
                        </td>
                    </tr>
                    <tr>
                        <td align="right"></td>
                        <td align="right">
                                                            
                            <input type="hidden" name="MDPhonENumbeRHiddeN" id="MDPhonENumbeRHiddeN" value="" />
                            <input type="hidden" name="MDLeadID" id="MDLeadID" value="" />
                            <input type="hidden" name="MDType" id="MDType" value="" />
                            <input type="hidden" name="MDLeadIDEntry" id="MDLeadIDEntry" value="" />
<?php
if ($manual_dial_lead_id == 'Y') {
    echo '	</td>';
    echo '	</tr><tr>';
    echo '	<td align="right">' . _QXZ("Dial Lead ID:") . ' </td>';
    echo '	<td align="right">';
    echo '	<input type="text" size="10" maxlength="10" name="MDLeadIDEntry" id="MDLeadIDEntry" class="cust_form form-control" value="" />(digits only)';
} else {
    echo '<input type="hidden" name="MDLeadIDEntry" id="MDLeadIDEntry" value="" />';
}
$LeadLookuPXtra = '';
if ($manual_dial_search_checkbox == 'SELECTED_LOCK') {
    $LeadLookuPXtra = 'CHECKED DISABLED ';
}
if ($manual_dial_search_checkbox == 'UNSELECTED_LOCK') {
    $LeadLookuPXtra = 'DISABLED ';
}
?>
                        </td>
                    </tr>
                    <tr style="display:none;">
                        <td align="right">Search Existing Leads:</td>
                        <td align="right"><input type="checkbox" name="LeadLookuP" class="filled-in chk-col-blue-grey" id="LeadLookuP" size="1" value="0" <?php echo $LeadLookuPXtra ?> /><label for="LeadLookuP">(This option if checked will attempt to find the phone number in the system before inserting it as a new lead)</label></td>
                    </tr>
                    <tr>

                        <td align="left" colspan="2">

                    <CENTER>
                        <span id="ManuaLDiaLGrouPSelecteD"></span> &nbsp; &nbsp; <span id="ManuaLDiaLGrouP"></span>

                        <span id="ManuaLDiaLInGrouPSelecteD"></span> &nbsp; &nbsp; <span id="ManuaLDiaLInGrouP"></span>

                        <span id="NoDiaLSelecteD"></span>
                    </CENTER>
                    </td>
                </tr><tr style="display:none;">
                <td align="right"></td>
                <td align="right" >
<?php
if ($manual_dial_override_field == 'ENABLED') {
    ?>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="text" size="24" maxlength="20" name="MDDiaLOverridE" id="MDDiaLOverridE" class="form-control" value="" placeholder="Dial Override"/>
                        </div>
                                                                                           <!--<div class="col-md-6"><input type="text" size="24" maxlength="20" name="MDDiaLOverridE" id="MDDiaLOverridE" class="form-control" value="" /></div>(digits only please)--> 
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
                        <a href="#" class="btn btn-primary" onclick="NeWManuaLDiaLCalLSubmiT('PREVIEW', 'YES');return false;">Preview Call</a>
                        <a href="#" class="btn btn-primary" onclick="ManualDialHide();return false;">Go Back</a></div>
                </td></tr>
        </table>	
    </div>
    							<div class="modal-footer">
                                                                    <button type="button" class="btn btn-info waves-effect btn-app float-right" onclick="ManualDialHide();return false;">Cancel</button>
                                                                    <button type="button" class="btn btn-success waves-effect btn-app float-right" id="MakeCallBTN" onclick="NeWManuaLDiaLCalLSubmiT('NOW','YES');return false;">Make Call</button>
                                                            </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<div id="DeactivateDOlDSessioNSpanModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="lead"><?php echo _QXZ("Another live agent session was open using your user ID. It has been disabled. Click OK to continue to the agent screen."); ?></div>	
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

     
<!--<div id="LogouTBoxModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container text-center">
    <br><br><br><br><br><span id="LogouTProcessOK">
	<br>
	<br>
	<font class="loading_text">LOGOUT PROCESSING...</font>
	<br>
	<br>
	<div class="preloader pl-size-xl"><div class="spinner-layer"><div class="circle-clipper left"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
		</span><br><br><span id="LogouTBoxLinkModal1"><font class="loading_text">LOGOUT</font></span></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
            </div>
        </div>
         /.modal-content 
    </div>
     /.modal-dialog 
</div>-->



<!--DTMF START-->
<div class="modal center-modal fade" id="DTMF-Modal" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-black">
                  <h5 class="modal-title text-center">DTMF Key Pad</h5>
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php for($i=1;$i<=9;$i++){?>
                    <div class="col-md-4">
                        <button class="btn btn-block btn-outline btn-secondry DTMF-BTN" style="margin:5px;" type="button"><?php echo $i;?></button>
                    </div>
                    <?php }?>
                    <div class="col-md-4">
                        <button class="btn btn-block btn-outline btn-secondry DTMF-BTN" style="margin:5px;" type="button">*</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-block btn-outline btn-secondry DTMF-BTN" style="margin:5px;" type="button">0</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-block btn-outline btn-secondry DTMF-BTN" style="margin:5px;" type="button">#</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                  <button type="button" class="btn btn-success float-right" data-dismiss="modal">Close</button>
            </div>
          </div>
    </div>
</div>
<!--DTMF END-->

<!--Call Information START-->
<div class="modal center-modal fade" id="CallInformation-Modal" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-black">
                  <h5 class="modal-title text-center">Call Information</h5>
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
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
                                            if (($agent_lead_search == 'ENABLED') or ( $agent_lead_search == 'LIVE_CALL_INBOUND') or ( $agent_lead_search == 'LIVE_CALL_INBOUND_AND_MANUAL')) {
                                                echo "<a href=\"#\" onclick=\"OpeNSearcHForMDisplaYBox();return false;\"><button type=\"button\" style=\"width:136px\" class=\"btn bg-amber btn-block btn-sm waves-effect\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Lead Search\">Lead Search</button></a>";
                                            }
                                            ?>
                                                        </li>
                                                    </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                  <button type="button" class="btn btn-success btn-app float-right" data-dismiss="modal">Close</button>
            </div>
          </div>
    </div>
</div>
<!--Call Information END-->

<?php

$Positive = $database->select('vicidial_campaign_statuses',['status','status_name'],['OR #Actually, this comment feature can be used on every AND and OR relativity condition'=>['AND #the first condition'=>['campaign_id'=>$VD_campaign,'Status_Type'=>'Positive'],'AND #the second condition'=>['campaign_id'=>NULL,'selectable'=>'Y','Status_Type'=>'Positive']]]);
$Negative = $database->select('vicidial_campaign_statuses',['status','status_name'],['OR #Actually, this comment feature can be used on every AND and OR relativity condition'=>['AND #the first condition'=>['campaign_id'=>$VD_campaign,'Status_Type'=>'Negative'],'AND #the second condition'=>['campaign_id'=>NULL,'selectable'=>'Y','Status_Type'=>'Negative']]]);
$Neutral = $database->select('vicidial_campaign_statuses',['status','status_name'],['OR #Actually, this comment feature can be used on every AND and OR relativity condition'=>['AND #the first condition'=>['campaign_id'=>$VD_campaign,'Status_Type'=>'Neutral'],'AND #the second condition'=>['campaign_id'=>NULL,'selectable'=>'Y','Status_Type'=>'Neutral']]]);
$Unconcluded = $database->select('vicidial_campaign_statuses',['status','status_name'],['OR #Actually, this comment feature can be used on every AND and OR relativity condition'=>['AND #the first condition'=>['campaign_id'=>$VD_campaign,'Status_Type'=>'Unconcluded'],'AND #the second condition'=>['campaign_id'=>NULL,'selectable'=>'Y','Status_Type'=>'Unconcluded']]])

?>
<!--Call Disposition START-->
<div class="modal center-modal fade" id="CallDispo-Modal" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-black">
                  <h5 class="modal-title text-center">Agent Call Status</h5>
            </div>
            <div class="modal-body">
                <div class="row">
			<div class="col-3 green pt-10 pb-10">
			<p>Neutral</p>
                        <?php 
                        foreach($Neutral as $dispoNeutral){?>
                        <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('<?php echo $dispoNeutral['status'];?>','ADD','YES');return false;"><?php echo $dispoNeutral['status'];?></button>
                        <?php }?>
			</div>
			<div class="col-3 red pt-10 pb-10"><p>Positive</p>
                             <?php 
                        foreach($Positive as $dispoPositive){?>
                        <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('<?php echo $dispoPositive['status'];?>','ADD','YES');return false;"><?php echo $dispoPositive['status'];?></button>
                        <?php }?>
			</div>
			<div class="col-3 yellow pt-10 pb-10"><p>Negative</p>
                             <?php 
                        foreach($Negative as $dispoNegative){?>
                        <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('<?php echo $dispoNegative['status'];?>','ADD','YES');return false;"><?php echo $dispoNegative['status'];?></button>
                        <?php }?>
                        </div>
			<div class="col-3 orange pt-10 pb-10"><p>Unconcluded</p>
                            <?php 
                        foreach($Unconcluded as $dispoUnconcluded){?>
                        <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('<?php echo $dispoUnconcluded['status'];?>','ADD','YES');return false;"><?php echo $dispoUnconcluded['status'];?></button>
                        <?php }?>
                        </div>
            </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                 <div class="row">
			<div class="col-4">
			<span type="button" class="btn btn-medium btn-toggle PauseCodeSwitch" data-toggle="button" aria-pressed="true" autocomplete="off">
                            <div class="handle"></div>
                        </span> 
                            <button type="button" class="btn btn-default mr-50 btn-sm">Pause Deactivated</button>
                        <br/>
                        <br/>
                        <select class="form-control" name="" id="DispoPauseCodeSelection" style="display:none;">
                           <?php foreach ($VARpause_codes1 as $key => $val) {
                               if(!empty($val)){
                               ?>
                            <option value="<?php echo $val; ?>"><?php echo $val; ?> - <?php echo $VARpause_code_names1[$key]; ?></option>
                           <?php } }?>
                        </select>
                        </div>
                        <div class="col-3">
			<span type="button" class="btn btn-medium btn-toggle TagSwitchBTN" data-toggle="button" aria-pressed="true" autocomplete="off">
                            <div class="handle"></div></span> 
                            <button type="button" class="btn btn-default  btn-sm">No Tag</button>
                            <br/><br/>
                            <input type="hidden" name="tag" value="" class="form-control"/>
                        </div>
			<div class="col-5">
			<p align="right">
                            <button type="button" class="btn btn-warning btn-app" data-dismiss="modal" id="HideDispoModal">Hide</button> 
                            <button type="button" class="btn btn-primary btn-app" onclick="DispoSelectContent_create('', 'ReSET', 'YES');return false;">Reset</button> 
                            <button type="button" class="btn btn-success btn-app" onclick="DispoSelect_submit('', '', 'YES');return false;">Submit</button>
                        </p>
			</div>
                        </div>
            </div>
          </div>
    </div>
</div>
<!--Call Dispostion END-->





<!--Call Disposition START-->
<div class="modal center-modal fade" id="CallTransfer-Modal" tabindex="-1">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-black">
                  <h5 class="modal-title text-center">Agent Call Status</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div id="XfeRDiaLGrouPSelecteD"></div> &nbsp; &nbsp;

                        <div id="XfeRCID"></div>

                        <input type="hidden" name="xferuniqueid" id="xferuniqueid">

                        <input type="hidden" name="xfername" id="xfername" value="">

                        <input type="hidden" name="xfernumhidden" id="xfernumhidden" value="">

                        <div class="hidden" id="dialoverride_checkbox" style="display:none;">

                            <input type="checkbox" name="xferoverride" id="xferoverride" size="1" value="0">

                        </div>
                        <!--Type START-->
                        <div class="form-group row">
                            <label for="XfeRPreset" class="col-md-2 control-label">Type</label>
                            <div class="col-md-9">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-square-o"></i> </span>
                                    <select id="XfeRType" name="XfeRType" class="form-control">
                                        <option>Select Type</option>
                                        <option value="Group">Transfer to Group</option>
                                        <option value="Agent">Transfer to Agent</option>
                                        <option value="Preset">Transfer to Preset</option>
                                        <option value="Number">Transfer to Number</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row TypeSelection Group-Selection" style="display:none;">
                            <label for="XfeRPreset" class="col-md-2 control-label">Group Selection</label>
                            <div class="col-md-9">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user-times"></i> </span>
                                    <span id="XfeRGrouPLisT" style="width:88%;">
                                    <select id="XfeRGrouP" name="XfeRGrouP" class="form-control" onChange="XferAgentSelectLink();return false;">
                                        <option>-- SELECT A GROUP TO SEND YOUR CALL TO --</option>
                                    </select>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row TypeSelection Agent-Selection" style="display:none;">
                            <label for="XfeRPreset" class="col-md-2 control-label">Agent Selection</label>
                            <div class="col-md-9">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                                    <select id="AgentXferViewSelect" name="AgentXferViewSelect" onchange="AgentsXferSelect(this.value,'AgentXferViewSelect');return false;" class="form-control">
                                        <option>Select Agent</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row TypeSelection Preset-Selection" style="display:none;">
                            <label for="XfeRPreset" class="col-md-2 control-label">Preset Selection</label>
                            <div class="col-md-9">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                                    <span id="PresetsSelectBoxContent" style="width:88%;"> 
                                    <select id="XfeRPreset" name="XfeRPreset" class="form-control XfeRPreset" onchange="NewPresetSelect_submit(this.value);return false;">
                                        <option>Select Preset</option>
                                    </select>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row TypeSelection Number-Selection" style="display:none;">
                            <label for="XfeRPreset" class="col-md-2 control-label">Number</label>
                            <div class="col-md-9">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone"></i> </span>
                                    <input type="text" name="xfernumber" id="xfernumber" class="form-control" />
                                </div>
                            </div>
                        </div>
                        
                        <div style="display:none;">

                            <input type="text" size="2" name="xferlength" id="xferlength" maxlength="4" class="cust_form" readonly="readonly">

                            <input type="text" size="12" name="xferchannel" id="xferchannel" maxlength="200" class="cust_form" readonly="readonly">

                            <input type="checkbox" name="consultativexfer" id="consultativexfer" size="1" value="0">

                        </div>
                        <!--Type END-->
                        <div class="form-group row">
                            <label for="XfeRPreset" class="col-md-2 control-label"></label>
                            <div class="col-md-9">
                                <a href="javascript:void(0);" class="btn btn-success btn-app" title="Dial With Customer" id="xfer_cust_dial_btn" onclick="SendManualDial('YES', 'YES');$('#transfer_cancel').prop('disabled', function (i, v) {return !v;});return false;"><i class="fa fa-users"></i></a>
                                <a href="javascript:void(0);" class="btn btn-success btn-app" title="Dial Without Customer" onclick="xfer_park_dial('YES');$('#transfer_cancel').prop('disabled', function (i, v) {return !v;});return false;"><i class="fa fa-user"></i></a>
                                <a href="javascript:void(0);" class="btn btn-default btn-app text-success"  title="Put Lead on Hold" onclick="mainxfer_send_redirect('ParK', 'SIP/AQL-000023a1', '', '', '', '', 'YES');return false;"><i class="fa fa-pause"></i></a>
                                <a href="javascript:void(0);" class="btn btn-success btn-app" title="Dial And Hangup"><i class="fa fa-blind" onclick="mainxfer_send_redirect('XfeRBLIND', 'SIP/M3ST-00000c71', '', '', '', '0', 'YES');return false;"></i></a>
                                <a href="javascript:void(0);" class="btn btn-success btn-app" title="Hide/Show DTMF" onclick="$('#xfer_dtmf').toggleClass('hidden');"><i class="fa fa-keyboard-o"></i></a>
                                <span id="Leave3WayCall"><a href="#" onclick="leave_3way_call('FIRST', 'YES');return false;" class="btn btn-danger btn-app"><i class="fa fa-sign-out"></i></a></span>
                                <span id="HangupXferLine"></span>
                                <!--<span id="Leave3WayCall"></span>-->
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="well hidden" id="xfer_dtmf">
                    <div class="row">
                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '1');return false;">1</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '2');return false;">2</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '3');return false;">3</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '4');return false;">4</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '5');return false;">5</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '6');return false;">6</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '7');return false;">7</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '8');return false;">8</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '9');return false;">9</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '*');return false;">*</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '0');return false;">0</button>
                        </div>

                        <div class="col-md-4 push-10-t" style="margin-top: 10px;">
                            <button class="btn btn-default form-control" onclick="SendConfDTMF(session_id, '#');return false;">#</button>
                        </div>

                        </div>
                </div>
            </div>
          </div>
    </div>
</div>
<!--Call Dispostion END-->


<?php
$zi++;
if ($webphone_location == 'bar')
	{
	echo "<span style=\"position:absolute;left:0px;top:46px;height:".$webphone_height."px;width=".$webphone_width."px;overflow:hidden;z-index:$zi;background-color:$SIDEBAR_COLOR;display:none;\" id=\"webphoneSpan\"><span id=\"webphonecontent\" style=\"overflow:hidden;\">$webphone_content</span></span>\n";
	}
else
	{
    echo "<span style=\"position:absolute;left:" . $SBwidth . "px;top:15px;height:500px;overflow:scroll;z-index:$zi;background-color:$SIDEBAR_COLOR;display:none;\" id=\"webphoneSpan\"><table cellpadding=\"$webphone_pad\" cellspacing=\"0\" border=\"0\"><tr><td width=\"5px\" rowspan=\"2\">&nbsp;</td><td align=\"center\"><font class=\"body_text\">
    Web Phone: &nbsp; </font></td></tr><tr><td align=\"center\"><span id=\"webphonecontent\">$webphone_content</span></td></tr></table></span>\n";
	}
?>


<!--Call Disposition START-->
<div class="modal center-modal fade" id="Message-Modal" tabindex="-1">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-black">
                  <h5 class="modal-title text-center">Agent Message</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="media-list media-list-hover media-list-divided" id="MessageSectionDiv">
                            
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>
<!--Call Dispostion END-->