<?php
if (!checkRole('settings', 'view')) {
    no_permission();
} else {
    if ($_SESSION['CurrentLogin']['user_level'] == 9) {
        $CampaignListing = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['ORDER' => ['campaign_name' => 'ASC']]);
    } else {
        $user_group = $_SESSION['CurrentLogin']['user_group'];
        $CampaignListing = $database->select('vicidial_campaigns', ['campaign_id', 'campaign_name'], ['campaign_name' => $user_group], ['ORDER' => ['campaign_name' => 'ASC']]);
    }
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Manage DNC

            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#">System Settings</a></li>
                <!--<li class="breadcrumb-item active"></li>-->
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-book"></span>Manage Campaign DNC</div>
                                <ul class="nav panel-tabs">
                                <?php if (checkRole('settings', 'create')) { ?>
                                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#modal-left"><i class="fa fa-plus" title="Create"></i></a></li>
                                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#modal-left-bulk"><i class="fa fa-upload" title="Bulk Upload"></i></a></li>
                                <?php } ?>
                                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>

                                            <th>Campaign ID</th>
                                            <th>Campaign Name</th>
                                            <th>Phone Number</th>
                                            <th>Date</th>
    <!--                                        <th>Protocol</th>
                                            <th>Active</th>-->
    <!--                                        <th>Call Time Name</th>
                                            <th>Call Time Default Start</th>
                                            <th>Call Time Default End</th>-->
                                            <!--<th>Action</th>-->
                                            <th class="text-center"  data-orderable="false">Action</th>
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

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="box">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-book"></span>Manage System DNC</div>
                                <ul class="nav panel-tabs">
                                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#modal-left-SystemDNC"><i class="fa fa-plus" title="Refersh"></i></a></li>
                                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table-list-dnc" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>

                                            <th>Name</th>
                                            <th>Description</th>
    <!--                                        <th>Protocol</th>
                                            <th>Active</th>-->
    <!--                                        <th>Call Time Name</th>
                                            <th>Call Time Default Start</th>
                                            <th>Call Time Default End</th>-->
                                            <!--<th>Action</th>-->
                                            <th class="text-center" data-orderable="false">Action</th>
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

    <form method="post" id="CampaignDNC">
        <div class="modal modal-left fade" id="modal-left" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Add Campaign DNC</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone_number" value="" placeholder="" class="form-control" required="" id="CampaignPhoneNumber"/>
                        </div>
                        <div class="form-group">
                            <label>Campaign</label>
                            <select class="form-control" name="campaign_id" required="" id="CampaignID">
                                <option value="">Select Campaign</option>
                                <?php foreach ($CampaignListing as $listingCampaign) { ?>
                                    <option value="<?php echo $listingCampaign['campaign_id']; ?>" CampaignName="<?php echo $listingCampaign['campaign_name']; ?>"><?php echo $listingCampaign['campaign_id'] . ' - ' . $listingCampaign['campaign_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Campaign Name</label>
                            <input type="text" name="campaign_name" value="" placeholder="" class="form-control" id="CampaignName"/>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-bold btn-pure btn-danger btn-app" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-bold btn-pure btn-success btn-app float-right">Save changes</button>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <form method="post" id="CampaignDNCBulk" enctype="multipart/form-data">
        <div class="modal modal-left fade" id="modal-left-bulk" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Add Campaign DNC</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="file" name="phone_number_bulk" class="form-control" required=""/>
                        </div>
                        <div class="form-group">
                            <label>Campaign</label>
                            <select class="form-control" name="campaign_id_bulk" required="" id="CampaignIDBulk">
                                <option value="">Select Campaign</option>
                                <?php foreach ($CampaignListing as $listingCampaign) { ?>
                                    <option value="<?php echo $listingCampaign['campaign_id']; ?>" CampaignName="<?php echo $listingCampaign['campaign_name']; ?>"><?php echo $listingCampaign['campaign_id'] . ' - ' . $listingCampaign['campaign_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Campaign Name</label>
                            <input type="text" name="campaign_name_bulk" value="" placeholder="" class="form-control" id="CampaignNameBulk"/>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-bold btn-pure btn-danger btn-app" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-bold btn-pure btn-success btn-app float-right">Save changes</button>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <!--Manage System DNC-->
    <form method="post" id="SystemDNC">
        <div class="modal modal-left fade" id="modal-left-SystemDNC" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Add System DNC</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone_number" value="" placeholder="" class="form-control" required="" id="SystemPhoneNumber"/>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="" placeholder="" class="form-control" required="" id="SystemName"/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" value="" placeholder="" class="form-control" id="SystemDescription"/>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-bold btn-pure btn-danger btn-app" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-bold btn-pure btn-success btn-app float-right">Save changes</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <script>

        var CampaignDNCTable = $('#table-list-campaigns').DataTable({
            destroy: true,
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',           
            "ajax": {
                "url": '<?php echo base_url('settings/ajax') ?>?action=GetDNC',
            },

            "columns": [
                {"data": "campaign_id"},
                {"data": "campaign_name"},
                {"data": "phone_number"},
                {"data": "created_at"},
                {"data": "Action",
                "render": function (data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="btn btn-success btn-app Campaign-DNC-Action" action="edit" PhoneNumber="' + row.phone_number + '" CampaignID="'+row.campaign_id+'" CampaignName="'+row.campaign_name+'"><i class="fa fa-arrow-right"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-app Campaign-DNC-Action" action="remove" PhoneNumber="' + row.phone_number + '" CampaignID="'+row.campaign_id+'"><i class="fa fa-times"></i></a>'
                    }
                },
            ],

        });
        var dt = $('#table-list-dnc').DataTable({
            destroy: true,
            "bprocessing": true,
            "bserverSide": true,

            "aaSorting": [[1, 'asc']],
            "ajax": {
                "url": '<?php echo base_url('settings/ajax') ?>?action=GetSystemDNC',
                "type": "POST",
            },

            "columns": [
                {"data": "name"},
                {"data": "description"},
                {"data": "Action",
                    "render": function (data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="btn btn-success btn-app System-DNC-Action" action="edit" phone="' + row.phone_number + '" name="'+row.name+'" description="'+row.description+'"><i class="fa fa-arrow-right"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-app System-DNC-Action" action="remove" phone="' + row.phone_number + '"><i class="fa fa-times"></i></a>'
                    }
                },
            ],

        });

        $(document).on('click', '.System-DNC-Action', function () {
            var action = $(this).attr('action');
            var phone = $(this).attr('phone');
            if (action == 'edit') {
                var name = $(this).attr('name');
                var description = $(this).attr('description');
                $('#SystemDescription').val(description);
                $('#SystemName').val(name);
                $('#SystemPhoneNumber').val(phone);
                $('#modal-left-SystemDNC').modal('show');
            } else if (action == 'remove') {
                
                swal({
                title: "Are you sure?",
                text: "You will not be able to recover this System DNC!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f00",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                    type: 'post',
                    url: '<?php echo base_url('settings/ajax') ?>?action=RemoveSystemDNC',
                    data: {phone: phone},
                    success: function (data) {
                        var result = JSON.parse(data);
                        $.toast({
                            heading: 'System DNC',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        $('#table-list-dnc').DataTable().ajax.reload();
                    }
                });
                } else {
                    swal("Cancelled", "Your data is safe :)", "error");
                }
            });
                
            } else {

            }

        });


        $('#CampaignDNC').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url('settings/ajax') ?>?action=SaveDNC',
                data: $(this).serialize(),
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Campaign DNC',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                    $('#modal-left').modal('hide');
                    $('#table-list-campaigns').DataTable().ajax.reload();
                    $('#CampaignDNC')[0].reset();
                }
            });
        });

        $('#CampaignDNCBulk').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url('settings/ajax') ?>?action=SaveDNCBulk',
                data:new FormData(this),
                 contentType:false,          // The content type used when sending data to the server.
                 cache:false,                // To unable request pages to be cached
                 processData:false,
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'Campaign DNC',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                    $('#modal-left').modal('hide');
                    $('#table-list-campaigns').DataTable().ajax.reload();
                    $('#CampaignDNCBulk')[0].reset();
                } 
            });
        });

        $('#CampaignID').change(function () {
            var value = $("#CampaignID option:selected").attr("CampaignName");
            $('#CampaignName').val(value);
        });

        $('#CampaignIDBulk').change(function () {
            var value = $("#CampaignIDBulk option:selected").attr("CampaignName");
            $('#CampaignNameBulk').val(value);
        });


        $(document).on('click', '.Campaign-DNC-Action', function () {
            var action = $(this).attr('action');
            var campaignid = $(this).attr('CampaignID');
            var phonenumber = $(this).attr('PhoneNumber');
            if (action == 'edit') {
                $('#CampaignPhoneNumber').val(phonenumber);
                $('#CampaignID').val(campaignid);
                $('#CampaignName').val($(this).attr('CampaignName'));
                $('#modal-left').modal('show');
            } else if (action == 'remove') {
                
                swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Campaign DNC!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f00",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                   $.ajax({
                    type: 'post',
                    url: '<?php echo base_url('settings/ajax') ?>?action=RemoveDNC',
                    data: {phonenumber: phonenumber,campaignid:campaignid},
                    success: function (data) {
                        var result = JSON.parse(data);
                        $.toast({
                            heading: 'Campaign DNC',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        $('#table-list-campaigns').DataTable().ajax.reload();
                    }
                });
                } else {
                    swal("Cancelled", "Your data is safe :)", "error");
                }
            });
                
            } else {

            }

        });


        $('#SystemDNC').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url('settings/ajax') ?>?action=SaveSystemDNC',
                data: $(this).serialize(),
                success: function (data) {
                    var result = JSON.parse(data);
                    $.toast({
                        heading: 'System DNC',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                    $('#modal-left-SystemDNC').modal('hide');
                    $('#table-list-dnc').DataTable().ajax.reload();
                    $('#SystemDNC')[0].reset();
                }
            });
        });

    </script>
<?php } ?>
