<div class="row">
    <div class="col-3 green pt-10 pb-10">
        <p>Neutral</p>
        <?php foreach ($Neutral as $dispoNeutral) { ?>
            <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('<?php echo $dispoNeutral['status']; ?>', 'ADD', 'YES');return false;"><?php echo $dispoNeutral['status']; ?></button>
        <?php } ?>
    </div>
    <div class="col-3 red pt-10 pb-10"><p>Positive</p>
        <?php foreach ($Positive as $dispoPositive) { ?>
            <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('<?php echo $dispoPositive['status']; ?>', 'ADD', 'YES');return false;"><?php echo $dispoPositive['status']; ?></button>
        <?php } ?>
    </div>
    <div class="col-3 yellow pt-10 pb-10"><p>Negative</p>
<?php foreach ($Negative as $dispoNegative) { ?>
            <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('<?php echo $dispoNegative['status']; ?>', 'ADD', 'YES');return false;"><?php echo $dispoNegative['status']; ?></button>
        <?php } ?>
    </div>
    <div class="col-3 orange pt-10 pb-10"><p>Unconcluded</p>
        <?php foreach ($Unconcluded as $dispoUnconcluded) { ?>
            <button type="button" class="btn btn-secondary w100 mb-10 dispoBTN" onclick="DispoSelectContent_create('<?php echo $dispoUnconcluded['status']; ?>', 'ADD', 'YES');return false;"><?php echo $dispoUnconcluded['status']; ?></button>
        <?php } ?>
    </div>
</div>