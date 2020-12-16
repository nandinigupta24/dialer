<table class="table table-striped table-hover">
    <thead class="bg-success">
        <tr>
            <th>Status</th>
            <th>Time Delay (s)</th>
            <!--<th>Time Format</th>-->
            <!--<th>Total Attempts</th>-->
            <th>Max Attempts</th>
            <th>Active</th>
            <!--<th>Auto Insert</th>-->
            <th class="text-center" style="width:37px;">Action</th>
        </tr>
    </thead>
    <tbody>
 
        <?php foreach ($dataExist as $each) { ?>
            <tr id="TR-RCR-<?php echo $each['recycle_id']; ?>">
                <th>
                    <select class="form-control campaign-Rcrule-field" data-name="status" data-id="<?php echo $each['recycle_id']; ?>">
                        <option value="">Select Option</option>
                        <?php foreach ($StatusList as $cst) { ?>
                            <option value="<?php echo $cst['status']; ?>" <?php echo ($each['status'] == $cst['status']) ? 'selected' : '' ?>><?php echo $cst['status_name']; ?></option>
                        <?php } ?>
                    </select>
                </th>
                <th>
                    <input type="text" data-name="attempt_delay" class="form-control campaign-Rcrule-field" value="<?php echo $each['attempt_delay']; ?>" data-id="<?php echo $each['recycle_id']; ?>" >
                </th>
    <!--                                    <th>
                    <select class="form-control campaign-Rcrule-field" id="attempt_type" data-name="attempt_type" data-id="<?php echo $each->recycle_id; ?>" >
                        <option value="HOUR" <?php echo ($each['attempt_type'] == 'HOUR') ? 'selected' : ''; ?>>HOUR</option>
                        <option value="DAY" <?php echo ($each['attempt_type'] == 'DAY') ? 'selected' : ''; ?>>DAY</option>
                        <option value="MINUTE" <?php echo ($each['attempt_type'] == 'MINUTE') ? 'selected' : ''; ?>>MINUTE</option>
                    </select>
                </th>-->
    <!--                                    <th>
                    <div class="slidecontainer">
                        <input type="range" min="1" max="100" step="1" value="<?php echo $each['attempt_total']; ?>" class="range-slider rangeSlide RcR-rangeSlider campaign-Rcrule-field"  data-id="<?php echo $each['recycle_id']; ?>" data-name="attempt_total" >
                    </div>
                </th>   -->
                <th>
                    <div class="slidecontainer">
                        <input type="range" min="1" max="10" step="1"  value="<?php echo $each['attempt_maximum']; ?>" class="range-slider campaign-Rcrule-field rangeSlide RcR-rangeSlider" data-id="<?php echo $each['recycle_id']; ?>" id="attempt_maximum<?php echo $each['recycle_id']; ?>" data-name="attempt_maximum" >
                    </div>
                    <span  id="sapn-attempt_maximum<?php echo $each['recycle_id']; ?>"><?php echo $each['attempt_maximum']; ?></span>
                </th>
                <th>
                    <button type="button" class="btn btn-sm btn-toggle btn-switch-RcR <?php echo ($each['active'] == 'Y') ? 'active' : ''; ?>" data-val="<?php echo $each['active']; ?>" data-id="<?php echo $each['recycle_id']; ?>" data-name="active"  data-toggle="button" aria-pressed="true" autocomplete="off">
                        <div class="handle"></div>
                    </button>
                </th>

    <!--                                    <th>
                                            <button type="button" class="btn btn-sm btn-toggle btn-switch-RcR  <?php echo ($each['auto_insert'] == 'Y') ? 'active' : ''; ?>" data-id="<?php echo $each['recycle_id']; ?>" data-name="auto_insert" data-val="<?php echo $each['auto_insert']; ?>"  data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </th>-->

                <th>
                    <div class="btn-group" role="group" ><button type="button" class="btn btn-sm btn-danger delete-campaign-RCR" data-id="<?php echo $each['recycle_id']; ?>"><i class="fa fa-times"></i></button></div>
                </th>
            </tr>
        <?php } ?>
    </tbody>
</table>
