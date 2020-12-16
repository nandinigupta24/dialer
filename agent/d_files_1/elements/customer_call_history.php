<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="CustomerCallHistroyDetail">
            <thead>
                <tr>
                    <th></th>
                    <th>Date</th>
                    <th>Agent</th>
                    <th>Call Length</th>
                    <th>Status</th>
                    <th>Campaign</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(!empty($data1) && count($data1) > 0){
                foreach($data1 as $value){?>
                <tr>
                    <td><button type="button" class="btn btn-info btn-sm"><i class="fa fa-arrow-up"></i></button></td>
                    <td><?php echo $value['call_date'];?></td>
                    <td><?php echo $value['user'];?></td>
                    <td><?php echo $value['length_in_sec'];?></td>
                    <td><?php echo $value['status'];?></td>
                    <td><?php echo $value['campaign_id'];?></td>
                </tr>
                <?php } } ?>
                <?php 
                if(!empty($data2) && count($data2) > 0){
                foreach($data2 as $value){?>
                <tr>
                    <td><button type="button" class="btn btn-success btn-sm"><i class="fa fa-arrow-down"></i></button></td>
                    <td><?php echo $value['call_date'];?></td>
                    <td><?php echo $value['user'];?></td>
                    <td><?php echo $value['length_in_sec'];?></td>
                    <td><?php echo $value['status'];?></td>
                    <td><?php echo $value['campaign_id'];?></td>
                </tr>
                <?php } }?>
            </tbody>
        </table>
    </div>
</div>