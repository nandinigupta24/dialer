<div class="row">
    <div class="col-12 col-lg-12 col-md-12">
        <style>
            .jconfirm-content-pane no-scroll{
                height: 100% !important;
            }
        </style>  
        <?php
        $abc = $CampaignDetail['campaign_cid'];
        $last = substr($CampaignDetail['campaign_cid'], -10);
        $active = str_replace($last,'', $abc);
        ?>
        <div class="panel pn">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-mobile"></i> Campaign Outbound Number </span> 
            </div>
            <div class="panel-body pn">
                <div class="table-responsive">
                    <table id="table-list-campaigns" class="table table-bordered table-striped"> 
                        <thead class="bg-success">
                            <tr>
                                <th>Prefix</th>
                                <th>CLI</th>
                                <!--<th>Use Count</th>-->
                                <!--<th>Active</th>--> 
                            </tr>
                        </thead>
                        <tbody>            
                            <tr>
                                <td>
                                    <select class="form-control out_num_dial_prefix" data-name="out_num_dial_prefix" data-cid="<?php echo $CampaignID; ?>"> 
                                        <option value="0">0</option>
                                        <option value="61" <?php echo ($active == 61) ? 'SELECTED="SELECTED"' : '';?>>Australia</option>
                                        <option value="63" <?php echo ($active == 63) ? 'SELECTED="SELECTED"' : '';?>>Philippines</option>
                                        <option value="44" <?php echo ($active == 44) ? 'SELECTED="SELECTED"' : '';?>>United Kingdom</option>
                                        <option value="1" <?php echo ($active == 1) ? 'SELECTED="SELECTED"' : '';?>>United States</option>
                                    </select>
                                </td>
                                <td>    
                                    <input type="text" name="campaign_cid" class="form-control CampaignCID" placeholder="" value="<?php echo substr($CampaignDetail['campaign_cid'], -10); ?>" data-cid="<?php echo $CampaignID; ?>"/> 
                                </td>
<!--                                <td>

                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-toggle active" data-cid="<?php echo $CampaignID; ?>" data-name="customer_contact" data-val="" data-toggle="button" aria-pressed="true" autocomplete="off">
                                        <div class="handle"></div>
                                    </button>
                                </td>-->
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>

