<ul class="nav flex-column">
    <li class="pt-2 pl-3 pr-3 pb-3 nav-item">
        <div class="card-header-tab card-header">
            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                <i class="header-icon fa fa-list-alt mr-3"> </i>
                Lead Details
            </div>
        </div>
    </li>

    <li class="nav-item-header nav-item"><p><i class="fa fa-user pr-3"></i> <strong>Lead - <?php echo $ChatDetails[0]['lead_id'];?></strong></p>
        <p><i class="fa fa-podcast pr-3"></i> <strong>IP</strong> <span><?php echo $ChatDetails[0]['email'];?></span></p>
        <p><i class="fa fa-phone pr-3"></i> <strong>Phone No.</strong> <span><?php echo $ChatDetails[0]['phone_number'];?></span></p>
        <p><i class="fa fa-user pr-3"></i> <strong>Agent ID.</strong> <span><?php echo $ChatDetails[0]['chat_creator'];?></span></p>
        <p><i class="fa fa-calendar pr-3"></i> <strong>Call Date</strong> <span><?php echo date('Y-m-d',strtotime($ChatDetails[0]['chat_start_time']));?></span></p>
        <p><i class="fa fa-clock-o pr-3"></i> <strong>Call Time</strong> <span><?php echo date('H:i A',strtotime($ChatDetails[0]['chat_start_time']));?></span></p>
        <p><i class="fa fa-group pr-3"></i> <strong>Chat Group</strong> <span><?php echo $ChatDetails[0]['group_id'];?></span></p>
        <p><i class="fa fa-group pr-3"></i> <strong>Status</strong> <span><?php echo $ChatDetails[0]['status'];?></span></p></li>

</ul>