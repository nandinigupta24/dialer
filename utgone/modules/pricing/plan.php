<?php
if (!checkRole('admin_settings', 'view')) {
    no_permission();
} else {
    
    $UserGroupListings = $database->select('vicidial_user_groups','*',['user_group[!]'=>'ADMIN','ORDER'=>['user_group'=>'ASC']]);
    $PricingPlans = $DBUTG->select('pricing_plans','*',['status'=>'active']);
    
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
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
                                            <th>User Group</th>
                                            <th>Group Name</th>
                                            <th>Pricing Plan </th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Created AT</th>
                                            <th class="text-center"  data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($UserGroupListings as $listings){
                                            $UserPricing = $DBUTG->get('user_pricings','*',['AND'=>['status'=>'RUN','user_group'=>$listings['user_group']]]);
                                            $PricingPlan = $DBUTG->get('pricing_plans','*',['id'=>$UserPricing['pricing_plan_id']]);
                                            ?>
                                        <tr>
                                            <td><?php echo $listings['user_group'];?></td>
                                            <td><?php echo $listings['group_name'];?></td>
                                            <td><?php echo $PricingPlan['title'];?></td>
                                            <td><?php echo $UserPricing['start'];?></td>
                                            <td><?php echo $UserPricing['end'];?></td>
                                            <td><?php echo $UserPricing['created_at'];?></td>
                                            <td><a href="<?php echo base_url('pricing/history?user_group=').$listings['user_group']; ?>" class="btn btn-success" title="See History Detail"><i class="fa fa-arrow-right"></i></a></td>
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
    <form class="" method="post" action="<?php echo base_url('pricing/ajax') ?>?action=Update" id="PricingUpdate">
        <div class="modal modal-right fade" id="modal-right" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Upgrade Pricing Plan</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="example_input_full_name">User Group</label>
                            <select class="form-control" name="user_group" required="">
                                <option value="">---Select Option---</option>
                                <?php  foreach($UserGroupListings as $listings){?>
                                <option value="<?php echo $listings['user_group'];?>"><?php echo $listings['user_group'].' - '.$listings['group_name'];?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example_input_full_name">Pricing Plan</label>
                            <select class="form-control" name="pricing_plan_id" required="">
                                <option value="">---Select Option---</option>
                                 <?php  foreach($PricingPlans as $plans){?>
                                <option value="<?php echo $plans['id'];?>"><?php echo $plans['title'].' - '.$plans['duration'].' '.$plans['type'];?></option>
                                <?php }?>
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
        $("#PricingUpdate").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data)
                {
                    alert(data);
//                    var result = JSON.parse(data);
//                    if (result.success === 1) {
//                        $.toast({
//                            heading: 'SMTP Settings',
//                            text: result.message,
//                            position: 'top-right',
//                            loaderBg: '#ff6849',
//                            icon: 'success',
//                            hideAfter: 3500,
//                            showHideTransition: 'plain',
//                        });
//                        $('#modal-left').modal('hide');
//                        $('#SmtpRule')[0].reset();
//                        $('#table-list-campaigns').DataTable().ajax.reload();
//                        $('#SMTP-ID').val('');
//
//                    } else {
//                        $.toast({
//                            heading: 'SMTP Settings',
//                            text: result.message,
//                            position: 'top-right',
//                            loaderBg: '#ff6849',
//                            icon: 'error',
//                            hideAfter: 3500,
//                            showHideTransition: 'plain',
//                        });
//                    }
                }
            });
        });


       
    </script>
<?php } ?>
