<div class="row DialerLog">
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $DialerView;?>;">
        <div class="box box-body bg-secondary">
            <h6 class="text-uppercase text-danger">Drop Rate</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-level-down text-danger font-size-40"></span>
                <span class="text-danger font-size-30"><?php echo $drpctTODAY; ?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $DialerView;?>;">
        <div class="box box-body bg-secondary">
            <h6 class="text-uppercase text-blue3">Dialable Leads</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-database text-blue3 font-size-40"></span>
                <span class="text-blue3 font-size-30"><?php echo $DAleads; ?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $DialerView;?>;">
        <div class="box box-body bg-secondary">
            <h6 class="text-uppercase text-primary">Leads In Queue</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-users text-primary font-size-40"></span>
                <span class="text-primary font-size-30"><?php echo $VDhop; ?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $DialerView;?>;">
        <div class="box box-body bg-secondary">
            <h6 class="text-uppercase text-teal3">Calls Today</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-phone-square text-teal3 font-size-40"></span>
                <span class="text-teal3 font-size-30"><?php echo $callsTODAY; ?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $DialerView;?>;">
        <div class="box box-body bg-secondary">
            <h6 class="text-uppercase text-green3">Dial Speed</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-sort-numeric-asc text-green3 font-size-40"></span>
                <span class="text-green3 font-size-30"></span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $DialerView;?>;">
        <div class="box box-body bg-secondary">
            <h6 class="text-uppercase text-green3">Queue Level</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-sort-alpha-asc text-green3 font-size-40"></span>
                <span class="text-green3 font-size-30"></span>
            </div>
        </div>
    </div>
</div>
