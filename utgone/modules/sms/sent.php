<?php if(!checkRole('sms', 'view')){ no_permission(); } else {?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
              <div class="panel-title"> <span class="fa fa-send-o"></span>View Sent SMS</div>
                <ul class="nav panel-tabs">
                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                </ul>
            </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                <thead class="bg-success">
                                    <tr>

                                        <th>LOG ID</th>
                                        <th>Routine</th>
                                        <th>Type</th>
                                        <th>Msg Sent</th>
                                        <th>Date Sent</th>
                                        <th>Customer Name</th>
                                        <th>Phone Number</th>
                                        <th>Lead</th>
                                        <th>Status</th>


                                        <!--<th class="text-center" style="width:37px;" data-orderable="false">Action</th>-->

                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>



                        </div>
                    </div>
                    <!-- /.box-body -->
<!--                    <div class="box-footer">
                        Footer
                    </div>-->
                    <!-- /.box-footer-->
                </div>
            </div>
        </div>
    </section>
</div>
<script>
$(function () {
        "use strict";
    var dt = $('#table-list-campaigns').DataTable({
            destroy: true,
            "bprocessing": true,
                              "bserverSide": true,

                              "aaSorting": [[1,'asc']],
                              "ajax": {
                                          "url":'<?php echo base_url('sms/ajax')?>?action=GetSMSSent',
                                           "type": "POST",
                                      },

                              "columns": [
                                      { "data": "id" },
                                      { "data": "routine"},
                                      { "data": "type"},
                                      { "data": "msg"},
                                      { "data": "date_sent"},
                                      { "data": "customer_name"},
                                      { "data": "phone_number"},
                                      { "data": "lead_id"},
                                      { "data": "status"},

                              ],

        });
    })





</script>
<?php } ?>
