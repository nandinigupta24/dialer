<div class="panel">
    <div class="panel-heading"> <span class="panel-title"> <i class="fa fa-tag"></i> Data Outbound Numbers</span>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <?php 
            $CampaignCIDOveride = $ListInformation['campaign_cid_override'];
            $StringBreak = substr($CampaignCIDOveride,0,2);
            $prefix = 0;
            $StringCLI = substr($CampaignCIDOveride,1);
            if(in_array($StringBreak,[00,44])){
                $prefix = $StringBreak;
                 $StringCLI = substr($CampaignCIDOveride,2);
            }
            ?>
            <form name="addCLIForm" id="addCLIForm">
                <input type="hidden" name="list_id" id="list_id" value="<?php echo $ListInformation['list_id']; ?>"/>
                <div class="form-group">
                    <label for="prefix">Prefix</label>
                    <select id="prefix" name="prefix" class="form-control" required="">
                        <option value=""></option>
                        <option value="0" <?php echo ($prefix == 0) ? 'selected="selected"' : '';?>>0</option>
                        <option value="00" <?php echo ($prefix == 00) ? 'selected="selected"' : '';?>>00</option>
                        <option value="44" <?php echo ($prefix == 44) ? 'selected="selected"' : '';?>>44</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cli">CLI</label>
                    <input type="number" maxlength="14" id="cli" name="cli" value="<?php echo $StringCLI;?>" class="form-control" required=""/>
                </div>

                <button class="btn btn-success btn-app" type="submit">Update</button>

            </form>
        </div>
    </div>
</div>