<div class="box box-outline-success">
    <div class="box-header">
        <h4 class="box-title"><strong><?php echo $caseValue;?></strong></h4>
<!--        <div class="box-tools pull-right">					
            <ul class="box-controls">
                <li><a class="box-btn-close" href="#"></a></li>
            </ul>
        </div>-->
    </div>

    <div class="box-body">
        <table class="table table-bordered table-striped" id="display-Performance">
            <thead class="bg-success">
                <tr><th>Date</th><th>Length(s)</th><th>Pause Reason</th></tr>
            </thead>
            <tbody>
                <?php foreach($data as $value){?>
                <tr>
                    <td><?php echo $value['event_time'];?></td>
                    <td><?php echo $value['talk_sec'];?></td>
                    <td><?php echo $value['SubStatus'];?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>