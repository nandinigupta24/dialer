<div class="row CallLog" >
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $CallView;?>;">
        <div class="box box-body bg-pale-cyan">
            <h6 class="text-uppercase text-brown">Active Calls</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-phone text-brown font-size-40"></span>
                <span class="text-brown font-size-30"><?php echo $out_total;?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $CallView;?>;">
        <div class="box box-body bg-pale-cyan">
            <h6 class="text-uppercase text-blue3">Ringing Calls</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-phone text-blue3 font-size-40"></span>
                <span class="text-blue3 font-size-30"><?php echo $out_ring;?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $CallView;?>;">
        <div class="box box-body bg-pale-cyan">
            <h6 class="text-uppercase text-danger">Waiting Calls</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-phone text-danger font-size-40"></span>
                <span class="text-danger font-size-30"><?php echo $out_live;?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $CallView;?>;">
        <div class="box box-body bg-pale-cyan">
            <h6 class="text-uppercase">IVR</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-phone  font-size-40"></span>
                <span class=" font-size-30"><?php echo $in_ivr;?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $CallView;?>;">
        <div class="box box-body bg-pale-cyan">
            <h6 class="text-uppercase text-blue3">Chats Waiting</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-comments text-blue3 font-size-40"></span>
                <span class="text-blue3 font-size-30"><?php echo $chats_waiting;?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $CallView;?>;">
        <div class="box box-body bg-pale-cyan">
            <h6 class="text-uppercase">Total Sales</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-shopping-bag  font-size-40"></span>
                <span class=" font-size-30"><?php echo $SaleCount;?></span>
            </div>
        </div>
    </div>
</div>
