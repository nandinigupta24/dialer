<div class="col-md-12 CarrierStats-TABLE" <?php echo $CARRIERstatsNew; ?>>
    <!-- BAR CHART -->
    <div class="panel">
        <div class="panel-header with-border text-center">
            <h2 class="panel-title">Carrier Stats</h2>
        </div>
        <div class="panel-body chart-responsive">
            <div class="chart" id="bar-chart" style="height: 300px;"></div>
            <?php foreach ($arrayNew as $k => $v) { ?>
                <p class="CarrierStatsDetails" data-id="<?php echo $k; ?>">
                    <?php foreach ($v as $key => $val) { ?>
                        <span data-id="<?php echo $key; ?>" data-val="<?php echo $val; ?>" class="CarrierDetail"></span>
                    <?php } ?>
                </p>
            <?php } ?>
        </div>
    </div>
</div>
