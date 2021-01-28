<?php if (!checkRole('campaigns', 'view')) {
    no_permission();
} else { ?>
    <style>
        .hidden-row {
            display: none;
        }

        .range-slider {
            -webkit-appearance: none;
            width: 100%;
            height: 8px;
            border-radius: 5px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .range-slider:hover {
            opacity: 1;
        }

        .range-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #2196F3;
            cursor: pointer;
        }

        th {
            font-size: 13px !important;
            font-weight: 700 !important;
        }

        .range-slider::-moz-range-thumb {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #2196F3;
            cursor: pointer;
        }
    </style>
    <div class="content-wrapper">
       <?php // pr($_SESSION['CurrentLogin']);?>
        <!-- Content Header (Page header) -->
<!--        <section class="content-header">
            <h1>Campaign</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('campaigns') ?>">Campaign</a></li>
                <li class="breadcrumb-item active">Listings</li>
            </ol>
        </section>-->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-book"></span>All Campaigns</div>
                                <ul class="nav panel-tabs">
                                    <li class="mr10">Show inactive Campaigns</li>
                                    <li>
                                        <button type="button" class="btn btn-sm btn-toggle CampaignInactiveButton"
                                                id="campaign_active_btn" data-input="show_active" data-toggle="button"
                                                aria-pressed="false" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                    </li>
                                    <li class="mr10">Show inactive Lists</li>
                                    <li>
                                        <button type="button" class="btn btn-sm btn-toggle" data-toggle="button"
                                                aria-pressed="false" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                    </li>
                                    <li><a href="javascript:void(0);" class="Refresh-Table" onclick="window.location.reload()"><i
                                                class="fa fa-refresh"></i></a></li>

                                </ul>
                            </div>


                        </div>
                        <div class="box-body">
                            <?php // pr($_SESSION['CurrentLogin']);?>
                            <div class="table-responsive">

                                <table id="table-list-campaigns" class="table table-bordered table-striped"
                                       style="width:100%">
                                    <thead class="bg-success">
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Campaign Name</th>
                                            <th data-orderable="false">Active</th>
                                            <th data-orderable="false">Dial Method</th>
                                            <th data-orderable="false">SQL Dailing</th>
                                            <th data-orderable="false" width="8%">Speed</th>
                                            <th>Logged In</th>
                                            <th>Talking</th>
                                            <th>Waiting</th>
                                            <th>Paused</th>
                                            <th>Wrap</th>
                                            <th>Drop Rate</th>
                                            <th class="text-center" style="width:37px;" data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>



                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
      function formatLeadsRow(d) {
        var arr = d;
        var arrayLength = arr.length;
        if (arrayLength > 0) {
            var tbl = '<div class="well"><table class="table table-bordered" cellspacing="0" width="100%">';
            tbl += '<tr><thead><th class="text-left">LIST ID</th><th class="text-left">List Name</th><th class="text-left">Description</th><th class="text-left">Leads Count</th>' +
                    '<th class="text-left">Status</th><th class="text-left">Last Call Date Time</th><th class="text-left">Queued Leads</th><th class="text-left">Modify</th></tr>' +
                    '</thead><tbody>';
            $.each(arr, function (i, item) {
                //         console.log(item);
                tbl += '<tr><td class="text-left">' + item.list_id + '</td><td class="text-left">' + item.list_name + '</td><td class="text-left">' + item.list_description +
                        '</td><td class="text-left">' + item.lead_count + '</td><td class="text-left">' + item.active + '</td>' +
                        '<td class="text-left">' + item.last_call_date + '</td><td class="text-left">' + item.queued_leads +
                        '</td><td class="text-left"><a class="btn btn-app btn-success" href="<?php echo base_url('data/edit?list_id=')?>' + item.list_id +
                        '"><i class="fa fa-arrow-right"></i></a></td></tr>';
            });
            tbl += '</tbody></table></div>';
        }

        return tbl;
      }
        function format(d) {
            // `d` is the original data object for the row
            //    var arr = d._rule;
            var arr = d;
            var arrayLength = arr.length;
            if (arrayLength > 0) {
                var tbl = '<div class="well"><table class="table table-bordered" cellspacing="0" width="100%">';
                tbl += '<tr><thead><th>SQL ID</th><th>SQL NAME</th><th>Active</th><th>Percentage %</th>' +
                        '<th>Total</th><th>Available</th><th>Queued</th><th>Dials</th><th>Connect</th><th>DMC</th>' +
                        '<th>Drop</th><th>Sales</th><th>Conversaion</th><th>Ans Machine</th><th>No ANS</th>' +
                        '</thead><tbody>';
                $.each(arr, function (i, item) {
                    //         console.log(item);
                    tbl += '<tr><td>' + item.list_id + '.</td><td>' + item.list_name + '</td><td>' + item.active +
                            '</td><td>' + item.percentage + '</td><td>' + item.SQLTotal + '</td>' +
                            '<td>' + item.Availabel + '</td><td>' + item.Queued + '</td><td>' + item.Calls +
                            '</td><td>' + item.Connects + '</td>' +
                            '<td>' + item.DMCs + '</td><td>' + item.Drop + '</td><td>' + item.Sales + '</td><td>' + item
                            .Conversaion + '</td><td>' + item.A + '</td>' +
                            '<td>' + item.A + '</td>' +
                            '</tr>';
                });
                tbl += '</tbody></table></div>';
            }

            return tbl;
        }
        $(function () {
            "use strict";
            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': _token
                }
            });
            var val = 0;
            var dt = $('#table-list-campaigns').DataTable({
                destroy: true,
                "bprocessing": true,
                "bserverSide": true,

                "aaSorting": [
                    [1, 'asc']
                ],
                "ajax": {
                    "url": '<?php echo base_url('campaigns/ajax'); ?>?action=GetCampaign&val=' + val,
                    "type": "POST",
                },

                "columns": [{
                        "className": 'details-control',
                        "orderable": false,
                        "data": null,
                        "defaultContent": '<i class="fa fa-plus-circle"></i>'
                    },
                    {
                        "data": "ID"
                    },
                    {
                        "data": "Campaign_Name"
                    },
                    {
                        "data": "Active"
                    },
                    {
                        "data": "Dial_Method"
                    },
                    {
                        "data": "SQL_Dailing"
                    },
                    {
                        "data": "Speed",
                        "className": "text-center"
                    },
                    {
                        "data": "Logged_In"
                    },
                    {
                        "data": "Talking"
                    },
                    {
                        "data": "Waiting"
                    },
                    {
                        "data": "Paused"
                    },
                    {
                        "data": "Wrap"
                    },
                    {
                        "data": "Drop_Rate"
                    },

                    {
                        "data": "action"
                    },
                ],

            });

            setInterval( function () {
                dt.ajax.reload();
            }, 150000 );

            $(document).on('click', '.CampaignInactiveButton', function (e) {
                var input = $(this).attr('data-input');
                if ($(this).hasClass('active')) {
                    var val = "1";
                } else {
                    var val = "0";
                }
                $('#' + input).val(val).trigger('change');
                var dt = $('#table-list-campaigns').DataTable({
                    destroy: true,
                    "bprocessing": true,
                    "bserverSide": true,

                    "aaSorting": [
                        [1, 'asc']
                    ],
                    "ajax": {
                        "url": '<?php echo base_url('campaigns/ajax') ?>?action=GetCampaign&val=' + val,
                        "type": "POST",
                    },

                    "columns": [{
                            "className": 'details-control',
                            "orderable": false,
                            "data": null,
                            "defaultContent": '<i class="fa fa-plus-circle"></i>'
                        },
                        {
                            "data": "ID"
                        },
                        {
                            "data": "Campaign_Name"
                        },
                        {
                            "data": "Active"
                        },
                        {
                            "data": "Dial_Method"
                        },
                        {
                            "data": "SQL_Dailing"
                        },
                        {
                            "data": "Speed",
                            "className": "text-center"
                        },
                        {
                            "data": "Logged_In"
                        },
                        {
                            "data": "Talking"
                        },
                        {
                            "data": "Waiting"
                        },
                        {
                            "data": "Paused"
                        },
                        {
                            "data": "Wrap"
                        },
                        {
                            "data": "Drop_Rate"
                        },

                        {
                            "data": "action"
                        },
                    ],

                });
            });
            var detailRows = [];



            $('#table-list-campaigns tbody').on('click', 'tr td.details-control', function () {

                var tr = $(this).closest('tr');
                var row = dt.row(tr);
                var idx = $.inArray(tr.attr('id'), detailRows);
                var CampaignID = row.data().ID;
                var ColCall = $(this);
                var sqlBtnStatus = tr.find('.SQLActive').hasClass('active');
                if (row.child.isShown()) {
                    tr.removeClass('details');
                    tr.removeClass('shown');
                    row.child.hide();
                    detailRows.splice(idx, 1);
                    $(this).html('<i class="fa fa-plus-circle"></i>');
                } else {
                    $(this).html('<i class="fa fa-minus-circle"></i>');
                    var case_query = sqlBtnStatus ? 'sql_query' : 'lead_query';
                    $.ajax({
                        url: '<?php echo base_url('campaigns/ajax') ?>?case='+case_query,
                        type: 'GET',
                        data: {
                            campaign_id: CampaignID
                        },
                        success: function (data) {
                            //                console.log(data);
                            var result = JSON.parse(data);
                            var countArray = result.data.length;
                            if (countArray > 0) {
    //                            console.log(result.data);
                                //                            alert(result.message);
                                var childRow = sqlBtnStatus ? format(result.data) : formatLeadsRow(result.data);
                                row.child(childRow).show();
                            } else {
                                //                            alert(result.message);
                                ColCall.html('<i class="fa fa-plus-circle"></i>');
                            }
                        }
                    });
                    tr.addClass('details');
                    tr.addClass('shown');
                    //            row.child( format( row.data() ) ).show();

                    // Add to the 'open' array
                    if (idx === -1) {
                        detailRows.push(tr.attr('id'));
                    }
                }
            });

            $('.search-input-text').on('change', function () { // for text boxes
                var i = $(this).attr('data-column'); // getting column index
                var v = $(this).val(); // getting search input value
                dt.columns(i).search(v).draw();
            });

        });

        $(document).on('click','.AgentLogOut',function(){
           var CampaignID = $(this).data('id');
           swal({
                    title: "Are you sure?",
                    text: "All Agent will be Logout!!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Logout it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, function(isConfirm){
                    if (isConfirm) {
                        $.ajax({
                            type:'POST',
                            url: '<?php echo base_url('campaigns/ajax')?>?action=Agent_LogOut',
                            data:{campaign_id: CampaignID}, // serializes the form's elements.
                            success: function(data)
                            {
                              //console.log(data);
                                var result = JSON.parse(data);
                                if(result.status == 'error'){
                                     $.toast({
                                            heading: 'Welcome To UTG Dialer',
                                            text: result.message,
                                            position: 'top-right',
                                            loaderBg: '#ff6849',
                                            icon: 'error',
                                            hideAfter: 3500,
                                            showHideTransition: 'plain',
                                        });

                                }else{
                                     $.toast({
                                            heading: 'Welcome To UTG Dialer',
                                            text: result.message,
                                            position: 'top-right',
                                            loaderBg: '#ff6849',
                                            icon: 'success',
                                            hideAfter: 3500,
                                            showHideTransition: 'plain',
                                        });
                                }
                            }
                          });
                    }
                });
        });

        $(document).on('click', '.CampaignActive', function () {
            var CampaignID = $(this).attr("data-id");
            var active = '';
            if ($(this).hasClass('active')) {
                active = 'Y';
            } else {
                active = 'N';
            }

            $.ajax({
                type: "GET",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=active_update',
                data: {
                    active: active,
                    campaign_id: CampaignID
                }, // serializes the form's elements.
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            });
        });

        $(document).on('click', '.SQLActive', function () {

            var CampaignID = $(this).attr("data-id");
            var active = '';
            if ($(this).hasClass('active')) {
                active = 'Y';
            } else {
                active = 'N';
            }
            $.ajax({
                type: "GET",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=SQLDialingActive',
                data: {
                    active: active,
                    campaign_id: CampaignID
                }, // serializes the form's elements.
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            });
        });

        $(document).on('change', '.CampaignDialMethod', function () {
            var CampaignID = $(this).data("id");
            var dial_method = $(this).val();
            $(this).parent().parent().find('.Speed-Section').hide();
            if (dial_method == 'MANUAL') {
                $('.Speed-Section-TEXT-' + CampaignID).show();
            } else if (dial_method == 'INBOUND_MAN') {
                $('.Speed-Section-TEXT-' + CampaignID).show();
            } else {
                $('.Speed-Section-Other-' + CampaignID).show();
            }

            $.ajax({
                type: "GET",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=dial_method_update',
                data: {
                    dial_method: dial_method,
                    campaign_id: CampaignID
                }, // serializes the form's elements.
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            });
        });

        $(document).on('change', '.speedChange', function () {
            var CampaignID = $(this).attr('data-id');
            var val = $(this).val();
            $.ajax({
                type: "GET",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=SpeedChange',
                data: {
                    val: val,
                    campaign_id: CampaignID
                }, // serializes the form's elements.
                success: function (data) {
                    var result = JSON.parse(data);

                    //var span = $('#span-' + CampaignID).text(val);
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            });
        });


        $(document).on('click', '.sql_dialing_status', function () {
            var ListID = $(this).attr("data-id");
            var active = '';
            if ($(this).hasClass('active')) {
                active = 'Y';
            } else {
                active = 'N';
            }

            $.ajax({
                type: "GET",
                url: '<?php echo base_url('campaigns/ajax') ?>?case=sql_dialing_update',
                data: {
                    active: active,
                    ListID: ListID
                }, // serializes the form's elements.
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            });
        });


                $(document).on('click', '.lead_query_status', function () {
                    var ListID = $(this).attr("data-id");
                    var active = '';
                    if ($(this).hasClass('active')) {
                        active = 'Y';
                    } else {
                        active = 'N';
                    }

                    $.ajax({
                        type: "GET",
                        url: '<?php echo base_url('campaigns/ajax') ?>?case=list_update_status',
                        data: {
                            active: active,
                            ListID: ListID
                        }, // serializes the form's elements.
                        success: function (data) {
                            var result = JSON.parse(data);
                            $.toast({
                                heading: 'Welcome To UTG Dialer',
                                text: result.message,
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 3500,
                                showHideTransition: 'plain',
                            });
                        }
                    });
                });


        $(document).on('click', '.Refresh-Table', function () {
            $('#table-list-campaigns').DataTable().ajax.reload();
        });

        var deleteItem = function (item_id) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this campaign!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f00",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.post('<?php echo base_url('campaigns/ajax') ?>?action=deleteById&id=' + item_id, {}, function (resp) {
                        swal("Deleted!", "Your campaign been deleted.", "success");
                        window.location.reload();
                    });
                } else {
                    swal("Cancelled", "Your data is safe :)", "error");
                }
            });
        }



        $(document).on('click','.RemoveCampaign',function(){
        var item_id = $(this).data('id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this campaign!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f00",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.post('<?php echo base_url('campaigns/ajax') ?>?action=deleteCampaign&id=' + item_id, {}, function (resp) {
                        swal("Deleted!", "Your campaign been deleted.", "success");
                        window.location.reload();
                    });
                } else {
                    swal("Cancelled", "Your data is safe :)", "error");
                }
            });
        });
    </script>
<?php } ?>
