<div class="pad">
    <div class="row">
        <div class="col-7">
            <h4>Today's Latest Sales</h4>
            <p>Summery Sales Made Today.</p>

            <div class="table-responsive">
 
                <table id="dashboard-table" class="table table-striped table-hover table-bordered">
                    <thead class="bg-success">
                        <tr>
                            <th>Agent Name</th>
                            <th>Phone</th>
                            <th>Time Sale Made</th>
                            <th>Notes</th>
                            <th>Start date</th>
                            <th data-orderable="false">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($TodaySale as $sale) { ?>
                            <tr>
                                <td><?php echo $sale['full_name']; ?></td>
                                <td><?php echo $sale['phone_number']; ?></td>
                                <td><?php echo $sale['event_time']; ?></td>
                                <td><?php echo $sale['comments']; ?></td>
                                <td><?php echo date('Y-m-d H:i:s', strtotime($sale['entry_date'])); ?></td>
                                <td><a href="<?php echo base_url('users/leads') ?>?lead_id=<?php echo $sale['lead_id']; ?>" class="btn btn-success btn-sm btn-app"><i class="fa fa-arrow-right"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-5">
            <h4>Today's Statistics</h4>
            <p>Summery Of Your Campaign Performance.</p>
            <span class="text-dark">Connect Rate <?php echo @$statistics[0]['ConnectRate']; ?>%</span>
            <div class="progress">
                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="<?php echo @$statistics[0]['ConnectRate']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo @$statistics[0]['ConnectRate']; ?>%">

                </div>
              </div>

            <span class="text-dark">DMC Rate <?php echo @$statistics[0]['DMCRate']; ?>%</span>
 <div class="progress">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="<?php echo @$statistics[0]['DMCRate']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo @$statistics[0]['DMCRate']; ?>%">

                </div>
              </div>

            <span class="text-dark">Drop Rate <?php echo @$statistics[0]['DROP_Percentage']; ?>%</span>
 <div class="progress">
                <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="<?php echo @$statistics[0]['DROP_Percentage']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo @$statistics[0]['DROP_Percentage']; ?>%">

                </div>
              </div>

            <span class="text-dark">Sales Conversion <?php echo @$statistics[0]['ConversionRate']; ?>%</span>
 <div class="progress">
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="<?php echo @$statistics[0]['ConversionRate']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo @$statistics[0]['ConversionRate']; ?>%">

                </div>
              </div>

            <span class="text-dark">No Answer <?php echo @$statistics[0]['N_Percentage']; ?>%</span>
 <div class="progress">
                <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="<?php echo @$statistics[0]['N_Percentage']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo @$statistics[0]['N_Percentage']; ?>%">

                </div>
              </div>


            <span class="text-dark">Answering Machines <?php echo @$statistics[0]['A_Percentage']; ?>%</span>
 <div class="progress">
                <div class="progress-bar progress-bar-yellow progress-bar-striped" role="progressbar" aria-valuenow="<?php echo @$statistics[0]['A_Percentage']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo @$statistics[0]['A_Percentage']; ?>%">

                </div>
              </div>
        </div>
    </div>
</div>
