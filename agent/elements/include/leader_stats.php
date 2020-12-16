<table class="table table-bordered table-striped" id="LeaderBoardPerformance">
    <thead class="bg-success">
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Event</th>
            <th>Point</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data as $value) {
            switch ($value['event']) {
                case 'on_login_time':
                    $text = 'Login On Time';
                    $class = 'label-warning';
                    break;
                case 'on_sale':
                    $text = 'SALE';
                    $class = 'label-success';
                    break;
                default:
                    $text = 'NA';
                    $class = 'label-danger';
            }
            ?>
            <tr>
                <td><?php echo date('Y-m-d', strtotime($value['created_at'])); ?></td>
                <td><?php echo date('H:i A', strtotime($value['created_at'])); ?></td>
                <td><span class="label <?php echo $class; ?>"><?php echo $text; ?></span></td>
                <td><?php echo $value['points']; ?></td>
            </tr>
<?php } ?>
    </tbody>
</table>