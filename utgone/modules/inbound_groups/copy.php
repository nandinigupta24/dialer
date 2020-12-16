<?php
if (!checkRole('inbound_groups', 'create')) {
    no_permission();
} else {
    ?>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- PAGE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-visible formtabs" id="AllFormsTab" style="min-height: 274px;">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-plus"></span>Copy Inbound Number</div>
                            <!--               <ul class="nav panel-tabs">
                                             <li class="active"><a class="ajax-disable" id="team1btn" href="#team1" data-toggle="tab"><span class="fa fa-pencil text-blue2"></span></a></li>
                                           </ul>-->
                        </div>
                        <div class="panel-body pn">
                            <div class="tab-content border-none pn">

                                <div id="team1" class="tab-pane active p15 form-horizontal">
                                    <!--<h5 class="mb5">Team Details</h5>-->
                                    <hr class="m5 mb20">
                                    <form id="create_team" class="cmxform" action="<?php echo base_url('inbound_groups/ajax') ?>?action=Copy"  method="POST">

                                        <div class="form-group row">
                                            <label for="call_time_id" class="col-sm-2 col-form-label">Inbound Number</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Max 10 Characters" id="call_time_id" name="inbound_number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="call_time_id" class="col-sm-2 col-form-label">Inbound Description</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Max 10 Characters" id="call_time_id" name="inbound_description">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="call_time_id" class="col-sm-2 col-form-label">Inbound Source</label>
                                            <div class="col-sm-10">
                                              <?php $LOGuser_group = $_SESSION['CurrentLogin']['allowed_teams_access'];
                                              $stmt="SELECT allowed_campaigns,allowed_reports,admin_viewable_groups,admin_viewable_call_times,qc_allowed_campaigns,qc_allowed_inbound_groups from vicidial_user_groups where user_group='$LOGuser_group';";
                                              $rslt=mysql_to_mysqli($stmt, $link);
                                              $row=mysqli_fetch_row($rslt);

                                              $LOGadmin_viewable_groups =		$row[2];

                                              $LOGadmin_viewable_groupsSQL='';

                                              if ( (!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3) )
                                              	{
                                              	$rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
                                              	$rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
                                              	$LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
                                              	}
                                              else
                                              	{$admin_viewable_groupsALL=1;}

                                                $stmt="SELECT did_id,did_pattern,did_description from vicidial_inbound_dids where did_pattern!='did_system_filter' $LOGadmin_viewable_groupsSQL order by did_pattern;";
                                            		$rslt=mysql_to_mysqli($stmt, $link);
                                            		$dids_to_print = mysqli_num_rows($rslt);
                                            		$dids_list='';

                                            		$o=0;
                                                ?>
                                                <select class="form-control" name="did_id"  required="">
                                                <?php
                                            		while ($dids_to_print > $o)
                                            			{
                                            			$rowx=mysqli_fetch_row($rslt);
                                                  print_r($rowx); ?>
                                            			<option value="<?php echo $rowx[0] ?>"><?php echo $rowx[1]." - ".$rowx[2] ?></option>
                                            			<?php $o++;
                                            			}
                                              ?>

                            </select>
                                            </div>
                                        </div>
                                        <?php // }else{?>
                                        <!--<input type="hidden" name="user_group" value="<?php echo $_SESSION['CurrentLogin']['user_group'];?>"/>-->
                                        <?php // }?>

                                    </form>
                                    <a class="ajax-disable btn  btn-success m10" onclick="$('#create_team').trigger('submit');" style="float:right;" href="#">Create</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div></section></div>
    <!--Modal For Success Insertion-->
    <div class="modal center-modal fade" id="modal-success" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Success Message</h5>
                    <!--                <button type="button" class="close" data-dismiss="modal">
                                      <span aria-hidden="true">&times;</span>
                                    </button>-->
                </div>
                <div class="modal-body">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                        <h4><i class="icon fa fa-check"></i> Alert!</h4>
                        Your Inbound Number has been successfully created.
                    </div>

                    <p>Inbound Number:- <span class="ColumnName"></span></p>
                    <p>Inbound Number Description:- <span class="ColumnDescription"></span></p>

                    <p><b>If you want to go on detail page ,please click on Inbound Number Detail Page.</b></p>
                </div>
                <div class="modal-footer modal-footer-uniform">
                    <button type="button" class="btn btn-app btn-danger" data-dismiss="modal">Close</button>
                    <a class="btn btn-success float-right btn-app ColumnDetailPage" href="">Inbound Number Detail Page</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        // this is the id of the form
        $("#create_team").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data)
                {
                  console.log(data);
                    var result = JSON.parse(data);
                    if (result.success === 1) {
                        $.toast({
                            heading: 'Inbound Number',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'info',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        $('#create_team')[0].reset();
                        $('#modal-success').modal('show');

                        $('.ColumnDescription').html(result.data.ColumnDescription);
                        $('.ColumnName').html(result.data.ColumnName);

                        $('.ColumnDetailPage').attr('href', 'edit?did=' + result.data.ColumnID);

                    } else {
                        $.toast({
                            heading: 'Inbound Number',
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
    </script>
<?php } ?>
