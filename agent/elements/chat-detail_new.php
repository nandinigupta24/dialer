<section class="content" id="CustomerChatPanel" style="display:none;">
    <div class="row">
        <!--<div class="" id="CustomerChatPanel" style="visibility:hidden;position: absolute;width:94%;top:0;">-->
        <div class="noscroll_script" id="ChatContents" style="width:100%;">
            <iframe src="./utg_vdc_chat_display.php?lead_id=&list_id=&dial_method=<?php echo $dial_method; ?>&stage=WELCOME&server_ip=<?php echo $server_ip; ?>&user=<?php echo $VD_login . $VARchatgroupsURL ?>" style="background-color:transparent;" scrolling="auto" frameborder="0" allowtransparency="true" id="CustomerChatIFrame" name="CustomerChatIFrame" width="100%" height="1000px"> </iframe>
        </div>
        <div class="clearfix"></div>
        <!--</div>-->
    </div>
</section>
