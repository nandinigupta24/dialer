<style type="text/css">
    .setting-tabs>li {
        margin-bottom: 0px !important;
        margin-right: 0px !important;
        border: 1px solid #ddd;
    }
    .nav-tabs-custom>.nav-tabs>li a.active {
        border-bottom: none;
    }
</style>
<div class="row">
    <div class="col-lg-7 col-md-7">
        <div class="panel pn">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="active nav-link" href="#2tabInfo" data-toggle="tab" data-pop="popover" title="Manage campaign general information" data-content="Manage campaign general information" data-original-title="General information"><i class="fa fa-info"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#2tabQueStrategy" data-toggle="tab" data-pop="popover" title="Queue Settings i.e. queue order, queue size" data-content="Queue Settings i.e. queue order, queue size." data-original-title="Queue Settings"><i class="fa fa-list-ol"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#2tabCallStrategy" data-toggle="tab" data-pop="popover" title="Call Strategy i.e. Call method,call timeout,drop timeout" data-content="Call Staregy i.e. Call method,call timeout,drop timeout." data-original-title="Call Staregy"><i class="fa fa-phone"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#2tabWebFormSetting" data-toggle="tab" data-pop="popover" title="Web Form Settings i.e. web form selection, web form type." data-content="Web Form Settings i.e. web form selection, web form type." data-original-title="Web Form Settings"><i class="fa fa-code-fork"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#2tabScriptSetting" data-toggle="tab" data-pop="popover" title="Script Settings i.e. script selection,script launch." data-content="Script Settings i.e. script selection,script launch." data-original-title="Script Settings"><i class="fa fa-code"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#2tabOutboundSetting" data-toggle="tab" data-pop="popover" title="Outbound Settings i.e. outbound cid,dial prefixes." data-content="Outbound Settings i.e. outbound cid,dial prefixes." data-original-title="Outbound Settings"><i class="fa fa-arrow-up"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#2tabInboundSetting" data-toggle="tab" data-pop="popover" title="Inbound Settings i.e. inbound routes ,inbound groups." data-content="Inbound Settings i.e. inbound routes ,inbound groups." data-original-title="Inbound Settings"><i class="fa fa-arrow-down"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#2tabTransferSetting" data-toggle="tab" data-pop="popover" title="Transfer presets" data-content="Transfer presets" data-original-title="Transfer Settings"><i class="fa fa-exchange"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#2tabAudioSetting" data-toggle="tab" data-pop="popover" title="Audio Settings which include hold music, drop call message" data-content="Audio Settings which include hold music, drop call message" data-original-title="Audio Settings"><i class="fa fa-headphones"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#2tabMiscSetting" data-toggle="tab" data-pop="popover" title="MISC Settings unrelated to an other settings" data-content="MISC Settings unrelated to an other settings" data-original-title="MISC Settings"><i class="fa fa-circle-o-notch"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#2tabAdvanceSetting" data-toggle="tab" data-pop="popover" title="Advance Settings please do not use this setting unless you know what you are doing" data-content="Advance  Settings please do not use this setting unless you know what you are doing" data-original-title="Advance Settings"><i class="fa fa-cog"></i></a></li>
            </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                <!--INFO -->
                <div class="tab-pane active" id="2tabInfo">
                    <?php require 'setting/general.php'; ?>
                </div>

                <div class="tab-pane " id="2tabQueStrategy">
                   <?php require 'setting/queue.php'; ?>
                </div>

                <div class="tab-pane" id="2tabCallStrategy">
                   <?php require 'setting/call.php'; ?>
                </div>
                <!--Web form setting -->
                <div class="tab-pane" id="2tabWebFormSetting">
                    <?php require 'setting/web_form.php'; ?>
                </div>

                <!-- script settings-->
                <div class="tab-pane" id="2tabScriptSetting">
                    <?php require 'setting/script.php'; ?>
                </div>


                <!-- outbound settings-->
                <div class="tab-pane" id="2tabOutboundSetting">
                    <?php require 'setting/outbound.php'; ?>
                </div>

                <!-- Inbound settings-->
                <div class="tab-pane" id="2tabInboundSetting">
                    <?php require 'setting/inbound.php'; ?>
                </div>

                <!--INFO -->
                <div class="tab-pane" id="2tabTransferSetting">
                    <?php require 'setting/transfer.php'; ?>
                </div>
                <!-------AUDIO ------>
                <div class="tab-pane" id="2tabAudioSetting">

                   <?php require 'setting/audio.php'; ?>
                </div>

                <div class="tab-pane" id="2tabMiscSetting">
                    <?php require 'setting/misc.php'; ?>
                </div>

                <!--Advance -->
                <div class="tab-pane" id="2tabAdvanceSetting">
                    <?php require 'setting/advance.php'; ?>
                </div>

            </div>
            </div>
        </div>

    </div>
</div>

<style type="text/css">
    .custom-file-input{
        display:none;
    }
</style>
