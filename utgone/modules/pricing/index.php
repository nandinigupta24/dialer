<?php
if (!checkRole('admin_settings', 'view')) {
    no_permission();
} else {
    $PricingPlans = $DBUTG->select('pricing_plans','*');
    
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
<!--                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        Your pricing plan has expired on
                    </div>-->
                    <div class="box">
                        <div class="with-border">
                            <div class="panel-heading">
                                <div class="panel-title"> <span class="fa fa-money"></span>Pricing Plan</div>
                                <ul class="nav panel-tabs">
                                    <!--<li><a href="" data-toggle="modal" data-target="#bs-example-modal-lg"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>-->
                                    <li><a href="" data-toggle="modal" data-target="#modal-right"><i class="fa fa-plus" title="Add SMTP Account"></i></a></li>
                                    <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="table-list-campaigns" class="table table-bordered table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>Title</th>
                                            <th>Duration</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                            <th>Agent</th>
                                            <th>Status</th>
                                            <th>Created AT</th>
                                            <th class="text-center"  data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($PricingPlans as $listings){
                                            switch($listings['status']){
                                                case 'active':
                                                    $LabelClass = 'label-success';
                                                    break;
                                                case 'inactive':
                                                    $LabelClass = 'label-danger';
                                                    break;
                                                default:
                                                    $LabelClass = 'label-primary';
                                            }
                                            ?>
                                        <tr>
                                            <td><?php echo $listings['title'];?></td>
                                            <td><?php echo $listings['duration'];?></td>
                                            <td><?php echo $listings['type'];?></td>
                                            <td><?php echo $listings['price'];?></td>
                                            <td><?php echo $listings['agent'];?></td>
                                            <td><span class="label <?php echo $LabelClass;?>"><?php echo strtoupper($listings['status']);?></span></td>
                                            <td><?php echo $listings['created_at'];?></td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-success PricingPlan-EDIT" title="Edit Pricing Plan" data-id="<?php echo $listings['id'];?>" data-title="<?php echo $listings['title'];?>" data-duration="<?php echo $listings['duration'];?>" data-type="<?php echo $listings['type'];?>" data-price="<?php echo $listings['price'];?>" data-status="<?php echo $listings['status'];?>" data-agent="<?php echo $listings['agent'];?>"><i class="fa fa-arrow-right"></i></a>
                                                <!--<a href="javascript:void(0);" class="btn btn-danger PricingPlan-REMOVE" title="Remove Pricing Plan" data-id="<?php echo $listings['id'];?>"><i class="fa fa-times"></i></a>-->
                                            </td>
                                        </tr>
                                        <?php }?>
                                        
                                    </tbody>
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
    <form class="" method="post" action="<?php echo base_url('pricing/ajax') ?>?action=Insert" id="PricingInsert">
        <input type="hidden" name="id" value="" id="PricingPlanID"/>
        <div class="modal modal-right fade" id="modal-right" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Add Pricing Plan</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="example_input_full_name">Plan Title</label>
                            <input type="text" name="title" id="PricingPlanTitle" class="form-control" placeholder="" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Plan Duration</label>
                            <input type="text" name="duration" id="PricingPlanDuration" class="form-control" placeholder="" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Plan Duration Type</label>
                            <select id="PricingPlanType" class="form-control" name="type" required="">
                                <option value="">--Select Option--</option>
                                <option value="day">Day</option>
                                <option value="month">Month</option>
                                <option value="year">Year</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="example_input_full_name">Plan Price</label>
                            <input type="text" name="price" id="PricingPlanPrice" class="form-control" placeholder="" required=""/>
                        </div>
                         <div class="form-group">
                            <label for="example_input_full_name">Agent</label>
                            <input type="text" name="agent" id="PricingPlanAgent" class="form-control" placeholder="" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Status</label>
                            <select id="PricingPlanStatus" class="form-control" name="status" required="">
                                <option value="inactive">Inactive</option>
                                <option value="active">Active</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-bold btn-pure btn-success float-right">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(function () {
            "use strict";
            $('#table-list-campaigns').DataTable();
        })


        // this is the id of the form
        $("#PricingInsert").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data)
                {
                    var result = JSON.parse(data);
                    if (result.success === 1) {
                        $.toast({
                            heading: 'Price Plan Settings',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        $('#modal-right').modal('hide');
                        $('#PricingInsert')[0].reset();
                        setTimeout(function(){ window.location.reload(); }, 2000);

                    } else {
                        $.toast({
                            heading: 'Price Plan Settings',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                    }
                }
            });
        });

        $(document).ready(function(){
           $('.PricingPlan-EDIT').click(function(){
              var PricingPlanID = $(this).data('id');
              var PricingPlanTitle = $(this).data('title');
              var PricingPlanDuration = $(this).data('duration');
              var PricingPlanType = $(this).data('type');
              var PricingPlanPrice = $(this).data('price');
              var PricingPlanStatus = $(this).data('status');
              var PricingPlanAgent = $(this).data('agent');
              
              $('#PricingPlanID').val(PricingPlanID);
              $('#PricingPlanTitle').val(PricingPlanTitle);
              $('#PricingPlanDuration').val(PricingPlanDuration);
              $('#PricingPlanType').val(PricingPlanType);
              $('#PricingPlanPrice').val(PricingPlanPrice);
              $('#PricingPlanStatus').val(PricingPlanStatus);
              $('#PricingPlanAgent').val(PricingPlanAgent);
              
              $('#modal-right').modal('show');
           }); 
        });
       
    </script>
<!--    <div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-danger myadmin-alert-top-right" style="display: block;"> 
        <img src="../../../images/avatar.png" class="img" alt="img"><a href="#" class="closed"><i class="fa fa-times"></i></a>
        <h4>You have a Message!</h4> <b>John Doe</b> sent you a message.
    </div>-->
<?php } ?>
