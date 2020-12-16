<div class="row AgentLog">
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $AgentView;?>;">
        <div class="box box-body bg-pale-success">
            <h6 class="text-uppercase text-green3">Logged IN</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-users text-green3 font-size-40"></span>
                <span class="text-green3 font-size-30"><?php echo $agent_total;?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $AgentView;?>;">
        <div class="box box-body bg-pale-success">
            <h6 class="text-uppercase text-blue3">IN Calls</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-users text-blue3 font-size-40"></span>
                <span class="text-blue3 font-size-30"><?php echo $agent_incall;?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $AgentView;?>;">
        <div class="box box-body bg-pale-success">
            <h6 class="text-uppercase text-primary">Waiting</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-users text-primary font-size-40"></span>
                <span class="text-primary font-size-30"><?php echo $agent_ready;?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $AgentView;?>;">
        <div class="box box-body bg-pale-success">
            <h6 class="text-uppercase text-teal3">Paused</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-users text-teal3 font-size-40"></span>
                <span class="text-teal3 font-size-30"><?php echo $agent_paused;?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $AgentView;?>;">
        <div class="box box-body bg-pale-success">
            <h6 class="text-uppercase text-green3">Dead</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-users text-green3 font-size-40"></span>
                <span class="text-green3 font-size-30"><?php echo $agent_dead;?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-12" style="display:<?php echo $AgentView;?>;">
        <div class="box box-body bg-pale-success">
            <h6 class="text-uppercase text-green3">Dispo</h6>
            <div class="flexbox mt-2">
                <span class="fa fa-users text-green3 font-size-40"></span>
                <span class="text-green3 font-size-30"><?php echo $agent_dispo;?></span>
            </div>
        </div>
    </div>
</div>