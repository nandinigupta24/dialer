<table class="table table-bordered table-striped" id='CallHistoryTableData'>
    <thead class="bg-success">
        <tr>
            <th>Time Of Call</th>
            <th>Call Length</th>
            <th>Status</th>
            <th>Number</th>
            <th>Name</th>
            <th>Campaign</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $value) { ?>
            <tr>
                <td><?php echo $value['call_date']; ?></td>
                <td><?php echo $value['length_in_sec']; ?></td>
                <td><?php echo $value['status']; ?></td>
                <td><?php echo $value['phone_number']; ?></td>
                <td><?php echo $value['user']; ?></td>
                <td><?php echo $value['campaign_id']; ?></td>
                <td><a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-info"></i></a> <a href="javascript:void(0);" class="btn btn-success CallDial" data-phone='<?php echo $value['phone_number']; ?>'><i class="fa fa-phone"></i></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>