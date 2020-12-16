<div class="row StatsLog" >
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $StatView;?>;">
        <div class="box box-body bg-pale-purple">
            <h6 class="text-uppercase">AVG Wait </h6>
            <div class="flexbox mt-2">
                <span class="fa fa-spinner font-size-40"></span>
                <span class="font-size-30"><?php echo $avgwaitTODAY; ?> sec</span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $StatView;?>;">
        <div class="box box-body bg-pale-purple">
            <h6 class="text-uppercase">AVG Talk</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-comments-o font-size-40"></span>
                <span class=" font-size-30"><?php echo $avgcustTODAY; ?> sec</span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $StatView;?>;">
        <div class="box box-body bg-pale-purple">
            <h6 class="text-uppercase">AVG Wrap</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-clock-o font-size-40"></span>
                <span class=" font-size-30"><?php echo $avgacwTODAY; ?> sec</span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $StatView;?>;">
        <div class="box box-body bg-pale-purple">
            <h6 class="text-uppercase">AVG Pause</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-pause font-size-40"></span>
                <span class=" font-size-30"><?php echo $avgpauseTODAY; ?> sec</span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $StatView;?>;">
        <div class="box box-body bg-pale-purple">
            <h6 class="text-uppercase">Answer </h6>
            <div class="flexbox mt-2">
                <span class="fa fa-phone-square font-size-40"></span>
                <span class=" font-size-30"><?php echo $answersTODAY;?></span>
            </div>
        </div>
    </div>
</div>
