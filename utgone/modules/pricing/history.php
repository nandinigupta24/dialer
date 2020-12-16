<?php
if (!checkRole('admin_settings', 'view')) {
    no_permission();
} else {
    $UserPricing = $DBUTG->select('user_pricings','*',['user_group'=>$_GET['user_group']]);
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
                                <div class="panel-title"> <span class="fa fa-history"></span>Pricing Plan History - <?php echo $_GET['user_group'];?></div>
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
                                            <th>Plan Title</th>
                                            <th>Duration</th>
                                            <th>Pricing</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Status</th>
                                            <th>Created AT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($UserPricing as $listings){
                                            $PricingPlan = $DBUTG->get('pricing_plans','*',['id'=>$listings['pricing_plan_id']]);
                                            switch($listings['status']){
                                                case 'NEW':
                                                 $LabelClass = 'label-primary';   
                                                    break;
                                                case 'RUN':
                                                 $LabelClass = 'label-success';   
                                                    break;
                                                case 'END':
                                                 $LabelClass = 'label-danger';   
                                                    break;
                                                default:
                                                $LabelClass = 'label-info';
                                            }
                                            ?>
                                        <tr>
                                            <td><?php echo $PricingPlan['title'];?></td>
                                            <td><?php echo $PricingPlan['duration'].' '.$PricingPlan['type'];?></td>
                                            <td><?php echo $PricingPlan['price'];?></td>
                                            <td><?php echo $listings['start'];?></td>
                                            <td><?php echo $listings['end'];?></td>
                                            
                                            <td><span class="label <?php echo $LabelClass;?>"><?php echo $listings['status'];?></span></td>
                                            <td><?php echo $listings['created_at'];?></td>
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
