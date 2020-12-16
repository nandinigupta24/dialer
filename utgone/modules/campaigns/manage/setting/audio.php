<div class="panel pn">
    <div class="panel-heading">
        <span class="panel-title"><i class="fa fa-headphones"></i> Audio Settings</span>
    </div>
    <div class="panel-body pn">
        <div class="form-group">
            <label>Hold Music:</label>
            <div class="input-group">
                <select class="form-control manage-field-select" data-name="park_file_name" data-id="<?php echo $CampaignDetail['campaign_id']; ?>" id="park_file_name">
                    <option value="">Select</option>
                    <?php
                        if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
                            $MusicOnHold = $database->select('vicidial_music_on_hold', '*',['ORDER'=>['moh_id'=>'ASC']]);
                        }else{
                            $MusicOnHold = $database->select('vicidial_music_on_hold', '*',['ORDER'=>['moh_id'=>'ASC'],'user_group'=>$_SESSION['CurrentLogin']['user_group']]);
                        }
                        
                        
                        foreach ($MusicOnHold as $HoldMusic) {
                            ?>
                            <option value="<?php echo $HoldMusic['moh_id']; ?>" <?php echo ($CampaignDetail['park_file_name'] == $HoldMusic['moh_id']) ? 'selected' : ''; ?>><?php echo $HoldMusic['moh_id']; ?></option>
                            <?php
                        }
                        ?>
                </select>
                <span class="input-group-addon"><a href="#Audio-Modal-MOH" data-toggle="modal" title="Upload a New Drop Audio File"><i class="fa fa-cloud-upload text-purple2"></i></a> </span>
            </div>

        </div>

        <div class="form-group">
            <label>Answering Machine Audio:</label>
            <div class="input-group">
    <select class="form-control manage-field-select " data-name="am_message_exten" data-id="<?php echo $CampaignDetail['campaign_id']; ?>"id="am_message_exten">
                        <option value="">Select option</option>
                        
                                                                         <?php


                                                                        if ($handle = opendir('/srv/www/htdocs/'.$SS_SoundsWebDirectory.'/')) {

                                                                                                    while (false !== ($entry = readdir($handle))) {

                                                                                                        if ($entry != "." && $entry != "..") {
                                                                                                            $fileName = substr($entry, 0, strrpos($entry, "."));
                                                                                                ?>
                                                                                                                                             <option value="<?php echo $fileName;?>" <?php echo ($CampaignDetail['am_message_exten'] == $fileName) ? 'selected' : ''; ?>><?php echo $fileName;?></option>

                                                                                                  <?php
                                                                                                            }
                                                                                                    }

                                                                                                    closedir($handle);
                                                                                                }
                                                                                                ?>
                                                                    </select>
    <span class="input-group-addon">
        <a href="#Audio-Modal" data-toggle="modal" title="Upload a New Drop Audio File"><i class="fa fa-cloud-upload text-purple2"></i></a> 
    </span> 
            </div>
            
        </div>
    </div>
</div>
