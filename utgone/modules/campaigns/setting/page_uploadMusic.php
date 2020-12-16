
<form method="post" name="" action="" autocomplete="OFF" id="FormuploadMusic" enctype="multipart/form-data">
    <div class="box ">
        <div class="box-header with-border ">
            <h3 class="box-title"><a  href="#" class="box-icon"><i class="fa fa-headphones"></i></a>Audio File Upload</h3>   
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="CampaignName">Name of Audio(<span class="text-success">No Space Allowed</span>):</label>
                <input type="text" class="form-control" id="audio_name" name="audio_name" placeholder="Enter Audio Name" required=""/>
            </div>

            <div class="form-group">
                <label for="fileMusic">Name of Audio:</label>
                <input type="file" class="form-control" id="fileMusic" name="file" required=""/>
            </div>
        </div>
        <div class="box-footer">
            <div class="row bt-1 border-primary" style="padding-top: 12px;">
                <div class="col-sm-6">
                    <button type="reset" class="btn btn-default btn-sm">Reset</button> 
                </div>
                <div class="col-sm-6"> 
                    <button type="submit" id="" class="btn btn-primary btn-sm pull-right">Upload</button>
                </div>
            </div>
        </div>
    </div>
</form>