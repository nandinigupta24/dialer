
                    <div class="box ">
                        <div class="box-header with-border ">
                            <h3 class="box-title"><a href="#" class="box-icon"><i class="fa fa-headphones"></i></a>Audio Settings</h3>   
                        </div>
                        <div class="box-body">


                            <div class="form-group"> 
                                <label>Hold Music:</label>
                                <div class="row">
                                    <div class="col-lg-11 col-md-11" style="margin-right: 0px;padding-right: 0px;">
                                        <select class="form-control manage-field-select select2" data-name="park_file_name" data-id="<?php echo $CampaignDetail['campaign_id']; ?>"  style="width: 100%;">
                                            <?php
                                
                                
                                if ($handle = opendir('/srv/www/htdocs/cwgMolaHD6f0pKsgu8Q3rUke304OnFmC/')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
?>
                                             <option value="<?php echo $entry;?>" <?php echo ($CampaignDetail['park_file_name'] == $entry) ? 'selected' : ''; ?>><?php echo $entry;?></option>
           
  <?php 
            }
    }

    closedir($handle);
}
?>
                                           
                                           
                                        </select>
                                    </div>
                                    <div class="col-lg-1 col-md-1" style="margin-left: 0px; padding-left: 7px; border: 1px solid #ccc;max-width:6.1%; text-align: center; background: #ddd;">
                                        <a href="#" class="audio-upload" data-title="Upload new Music On hold file" data-name="hold_music" style="color: #55ad81;font-size:20px;"><i class="fa fa-cloud-upload"></i></a> 
                                   </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Answering Machine Audio:</label>
                                <div class="row">
                                    <div class="col-lg-11 col-md-11" style="margin-right: 0px;padding-right: 0px;">
                                        <select class="form-control" style="width: 100%;">
                                            <?php
                                
                                
                                if ($handle = opendir('/srv/www/htdocs/cwgMolaHD6f0pKsgu8Q3rUke304OnFmC/')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
?>
                                             <option value="<?php echo $entry;?>" <?php echo ($CampaignDetail['park_file_name'] == $entry) ? 'selected' : ''; ?>><?php echo $entry;?></option>
           
  <?php 
            }
    }

    closedir($handle);
}
?>
                                        </select>
                                    </div>
                                    <div class="col-lg-1 col-md-1" style="margin-left: 0px; padding-left: 7px; border: 1px solid #ccc;max-width:6.1%; text-align: center; background: #ddd;">
                                        <a href="#" class="audio-upload" data-title="Upload new Music On Answering Machine" data-name="answering_music" style="color: #55ad81;font-size:20px;"><i class="fa fa-cloud-upload"></i></a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
             