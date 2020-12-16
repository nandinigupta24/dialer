<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-book"></span>Manage Admin Log Report</div>
                            <ul class="nav panel-tabs">
                                <li>
                                    <a type="button" id="daterange-btn-log" style="cursor:pointer">
                                        <span>
                                            <i class="fa fa-calendar text-success"></i> Date Range Picker
                                        </span>
                                        <i class="fa fa-caret-down"></i>
                                    </a>
                                </li>
                                <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                <thead class="bg-success">
                                    <tr>

                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Type</th>
                                        <th>Change Mode</th>
                                        <th>Notes</th>

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
            "aaSorting": [[0, 'DESC']],
            "ajax": {
                "url": '<?php echo base_url('settings/ajax') ?>?action=GetAdminLog',
                "type": "POST",
            },
            "columns": [
                {"data": "event_date"},
                {"data": "user"},
                {"data": "event_type",
                    "render": function (data, type, row, meta) {
                        if (row.event_type == 'MODIFY') {
                            return '<span class="label label-primary">' + row.event_type + '</span>';
                        } else if (row.event_type == 'LOAD') {
                            return '<span class="label label-success">' + row.event_type + '</span>';
                        } else if (row.event_type == 'ADD') {
                            return '<span class="label label-info">' + row.event_type + '</span>';
                        } else if (row.event_type == 'SEARCH') {
                            return '<span class="label label-warning">' + row.event_type + '</span>';
                        } else if (row.event_type == 'COPY') {
                            return '<span class="label label-default">' + row.event_type + '</span>';
                        } else if (row.event_type == 'DELETE') {
                            return '<span class="label label-danger">' + row.event_type + '</span>';
                        } else {
                            if (row.event_type) {
                                return '<span class="label label-default">' + row.event_type + '</span>';
                            } else {
                                return '---';
                            }
                        }

                    }
                },
                {"data": "record_id"},
                {"data": "event_code"},
            ],

        });
    });

    $(function () {
        "use strict";
        //Date range as a button
        $('#daterange-btn-log').daterangepicker(
        {
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment(),
            endDate: moment()
        },
        function (start, end) {
            $('#daterange-btn-log span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            var start = start.format('YYYY-MM-DD');
            var end = end.format('YYYY-MM-DD');
            var dt = $('#table-list-campaigns').DataTable({
            destroy: true,
            "bprocessing": true,
            "bserverSide": true,
            "aaSorting": [[0, 'DESC']],
            "ajax": {
                "url": '<?php echo base_url('settings/ajax') ?>?action=GetAdminLog&start='+start+'&end='+end,
                "type": "POST",
            },
            "columns": [
                {"data": "event_date"},
                {"data": "user"},
                {"data": "event_type",
                    "render": function (data, type, row, meta) {
                        if (row.event_type == 'MODIFY') {
                            return '<span class="label label-primary">' + row.event_type + '</span>';
                        } else if (row.event_type == 'LOAD') {
                            return '<span class="label label-success">' + row.event_type + '</span>';
                        } else if (row.event_type == 'ADD') {
                            return '<span class="label label-info">' + row.event_type + '</span>';
                        } else if (row.event_type == 'SEARCH') {
                            return '<span class="label label-warning">' + row.event_type + '</span>';
                        } else if (row.event_type == 'COPY') {
                            return '<span class="label label-default">' + row.event_type + '</span>';
                        } else if (row.event_type == 'DELETE') {
                            return '<span class="label label-danger">' + row.event_type + '</span>';
                        } else {
                            if (row.event_type) {
                                return '<span class="label label-default">' + row.event_type + '</span>';
                            } else {
                                return '---';
                            }
                        }

                    }
                },
                {"data": "record_id"},
                {"data": "event_code"},
            ],

        });
        }
        );
    });



</script>
