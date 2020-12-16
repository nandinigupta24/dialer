<form method="post" name="" action="" id="addCampaignStatus" autocomplete = "off">
   <div class="box ">
       <div class="box-body">
           <div class="form-group">
               <label for="CampaignName">Status ID:</label>
               <input type="text" class="form-control" id="status_id" name="status" placeholder="Enter status ID" required=""/>
               <input type="hidden" id="campaign_id" name="campaign_id" value="<?php echo $_GET['id'];?>" required=""/>
           </div>

           <div class="form-group">
               <label for="status_name">Status Name:</label>
               <input type="text" class="form-control" name="status_name" id="status_name"  placeholder="Enter status Name" required=""/>
           </div>

           <div class="form-group">
               <label for="status_type">Status Type:</label>
               <select class="form-control" name="status_type" required="">
                   <option value="Positive">POSITIVE</option>
                   <option value="Negative">NEGATIVE</option>
                   <option value="Neutral">NEUTRAL</option>
                   <option value="Unconcluded">Unconcluded</option>
               </select>
           </div>

       </div>
       <div class="box-footer">
           <div class="row bt-1 border-primary" style="padding-top: 12px;">
               <div class="col-sm-6">
                   <button type="reset" class="btn btn-default btn-sm">Reset</button>
               </div>
               <div class="col-sm-6">
                   <button type="submit" name="save" class="btn btn-primary btn-sm pull-right">SAVE</button>
               </div>
           </div>
       </div>
   </div>
</form>
