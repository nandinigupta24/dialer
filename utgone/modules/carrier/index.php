<?php if(!checkRole('admin_settings', 'view')){ no_permission(); } else {?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12 col-lg-12 col-md-12">
        <div class="box">
          <div class="with-border">
            <div class="panel-heading">
              <div class="panel-title"> <span class="fa fa-book"></span>Carrier Accounts</div>
              <ul class="nav panel-tabs">
                <li><a href="<?php echo base_url('carrier/create')?>"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>
                <li><a href="javascript:void(0)" onclick="window.location.reload()"><i class="fa fa-refresh" title="Refersh"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                <thead class="bg-success">
                  <tr>
                    <th>Carrier Name</th>
                    <th>User Group</th>
                    <th>String</th>
                    <th>Protocol</th>
                    <th>Server IP</th>
                    <th>Dial Prefix</th>
                    <th>active</th>
                    <th class="text-center" data-orderable="false">Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>
</div>


<script>
  $(function() {
    "use strict";
    var dt = $('#table-list-campaigns').DataTable({
      destroy: true,
      "bprocessing": true,
      "bserverSide": true,

      "aaSorting": [
        [1, 'asc']
      ],
      "ajax": {
        "url": '<?php echo base_url('carrier/ajax')?>?action=GetCarrier',
        "type": "POST",
      },

      "columns": [{
          "data": "carrier_name"
        },
        {
          "data": "user_group"
        },
        {
          "data": "registration_string"
        },
        {
          "data": "protocol"
        },
        {
          "data": "server_ip"
        },
        {
          "data": "dial_prefix"
        },
        {
          "data": "active"
        },
        {
          "data": "Action"
        },
      ],

    });
  })

  $(document).on('click', '.recordActive', function() {
    var carrierid = $(this).data("id");
    var carrierfield = $(this).data("field");
    if ($(this).hasClass('active')) {
      var value = 'Y';
    } else {
      var value = 'N';
    }

    $.ajax({
      type: "POST",
      url: '<?php echo base_url('carrier/ajax')?>?action=Update',
      data: {
        id: carrierid,
        field: carrierfield,
        value: value
      }, // serializes the form's elements.
      success: function(data) {
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

  var deleteItem = function (item_id) {
      swal({
          title: "Are you sure?",
          text: "You will not be able to recover this carrier!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#f00",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel please!",
          closeOnConfirm: false,
          closeOnCancel: false
      }, function (isConfirm) {
          if (isConfirm) {
              $.post('<?php echo base_url('carrier/ajax') ?>?action=remove&carrier_id=' + item_id, {carrier_id:item_id}, function (resp) {
                  swal("Deleted!", "Your carrier been deleted.", "success");
                  window.location.reload();
              });
          } else {
              swal("Cancelled", "Your data is safe :)", "error");
          }
      });
  }
</script>
<?php } ?>
