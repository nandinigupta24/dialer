<?php if (!checkRole('teams', 'create')) {
    no_permission();
} else { ?>
    <?php
######################
# ADD=211111 adds new user group to the system
######################
    if ($_POST && count($_POST) > 0) {

        ##### BEGIN ID override optional section, if enabled it increments user by 1 ignoring entered value #####
        $stmt = "SELECT value FROM vicidial_override_ids where id_table='vicidial_user_groups' and active='1';";
        $rslt = mysql_to_mysqli($stmt, $link);
        $voi_ct = mysqli_num_rows($rslt);
        $user_group = 0;
        if ($voi_ct > 0) {
            $row = mysqli_fetch_row($rslt);
            $user_group = ($row[0] + 1);

            $stmt = "UPDATE vicidial_override_ids SET value='$user_group' where id_table='vicidial_user_groups' and active='1';";
            $rslt = mysql_to_mysqli($stmt, $link);
        }
        ##### END ID override optional section #####
        $stmt = "SELECT count(*) from vicidial_user_groups where user_group='$user_group';";
        $rslt = mysql_to_mysqli($stmt, $link);
        $row = mysqli_fetch_row($rslt);
        if ($row[0] > 0) {

            $msg = "<div class='alert bg-red'>
        <h4>USER GROUP NOT ADDED - there is already a user group entry with this name</h4>
        </div>";
        } else {
            if ((strlen($user_group) < 2) or ( strlen($group_name) < 2)) {

                $msg = "<div class='alert bg-red' >
                    <h4>" . _QXZ("USER GROUP NOT ADDED - Please go back and look at the data you entered <br> Group name and description must be at least 2 characters in length") . "</h4>
                   </div>";
            } else {
                $allowed_user_group_insert_SQL = '---ALL---';
                $allowed_campaign_insert_SQL = $allowed_campaigns;
                # if admin user's user group does not have --ALL-- then add this new user group to their user group's allowable user groups
                if ($admin_viewable_groupsALL < 1) {
                    $UPDATEadmin_viewable_groups = $LOGadmin_viewable_groups;
                    $UPDATEadmin_viewable_groups = preg_replace("/ $/", " $user_group ", $UPDATEadmin_viewable_groups);
                    $LOGadmin_viewable_groups = $UPDATEadmin_viewable_groups;

                    $stmt = "UPDATE vicidial_user_groups SET admin_viewable_groups='$UPDATEadmin_viewable_groups' where user_group='$LOGuser_group';";
                    $rslt = mysql_to_mysqli($stmt, $link);

                    $allowed_user_group_insert_SQL = " $user_group -";

                    $rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/", '', $LOGadmin_viewable_groups);
                    $rawLOGadmin_viewable_groupsSQL = preg_replace("/ /", "','", $rawLOGadmin_viewable_groupsSQL);
                    $LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
                    $whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
                }
                if ((!preg_match('/\-ALL/i', $LOGallowed_campaigns))) {
                    $allowed_campaign_insert_SQL = $LOGallowed_campaigns;
                }

                $stmt = "INSERT INTO vicidial_user_groups(user_group,group_name,allowed_campaigns,admin_viewable_groups) values('$user_group','$group_name','$allowed_campaign_insert_SQL','$allowed_user_group_insert_SQL');";
                $rslt = mysql_to_mysqli($stmt, $link);


                $msg = "<div  class='alert bg-teal'>
                    <h4>" . _QXZ("USER GROUP ADDED") . ": $user_group</h4>
                   </div><br>";

                ### LOG INSERTION Admin Log Table ###
                $SQL_log = "$stmt|";
                $SQL_log = preg_replace('/;/', '', $SQL_log);
                $SQL_log = addslashes($SQL_log);
                $stmt = "INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='USERGROUPS', event_type='ADD', record_id='$user_group', event_code='ADMIN ADD USER GROUP', event_sql=\"$SQL_log\", event_notes='';";
                if ($DB) {
                    echo "|$stmt|\n";
                }
                $rslt = mysql_to_mysqli($stmt, $link);

                ###############################################################
                ##### START SYSTEM_SETTINGS VTIGER CONNECTION INFO LOOKUP #####
                $stmt = "SELECT enable_vtiger_integration,vtiger_server_ip,vtiger_dbname,vtiger_login,vtiger_pass,vtiger_url FROM system_settings;";
                $rslt = mysql_to_mysqli($stmt, $link);
                if ($DB) {
                    echo "$stmt\n";
                }
                $ss_conf_ct = mysqli_num_rows($rslt);
                if ($ss_conf_ct > 0) {
                    $row = mysqli_fetch_row($rslt);
                    $enable_vtiger_integration = $row[0];
                    $vtiger_server_ip = $row[1];
                    $vtiger_dbname = $row[2];
                    $vtiger_login = $row[3];
                    $vtiger_pass = $row[4];
                    $vtiger_url = $row[5];
                }
                ##### END SYSTEM_SETTINGS VTIGER CONNECTION INFO LOOKUP #####
                #############################################################

                if ($enable_vtiger_integration > 0) {
                    ### connect to your vtiger database
                    #$linkV=mysql_connect("$vtiger_server_ip", "$vtiger_login","$vtiger_pass");
                    #if (!$linkV) {die("Could not connect: $vtiger_server_ip|$vtiger_dbname|$vtiger_login|$vtiger_pass" . mysqli_error());}
                    #echo 'Connected successfully';
                    #mysql_select_db("$vtiger_dbname", $linkV);
                    $linkV = mysqli_connect("$vtiger_server_ip", "$vtiger_login", "$vtiger_pass", "$vtiger_dbname");
                    if (!$linkV) {
                        die('MySQL ' . _QXZ("connect ERROR") . ': ' . mysqli_connect_error());
                    }


                    ######################################
                    ##### BEGIN Add/Update group info in Vtiger
                    $stmt = "SELECT count(*) from vtiger_groups where groupname='$user_group';";
                    $rslt = mysql_to_mysqli($stmt, $linkV);
                    if ($DB) {
                        echo "$stmt\n";
                    }
                    if (!$rslt) {
                        die(_QXZ("Could not execute") . ': ' . mysqli_error());
                    }
                    $row = mysqli_fetch_row($rslt);
                    $group_found_count = $row[0];

                    ### group exists in vtiger, update it
                    if ($group_found_count > 0) {
                        $stmt = "SELECT groupid from vtiger_groups where groupname='$user_group';";
                        $rslt = mysql_to_mysqli($stmt, $linkV);
                        if ($DB) {
                            echo "$stmt\n";
                        }
                        if (!$rslt) {
                            die(_QXZ("Could not execute") . ': ' . mysqli_error());
                        }
                        $row = mysqli_fetch_row($rslt);
                        $groupid = $row[0];
                    }

                    ### user doesn't exist in vtiger, insert it
                    else {
                        #### BEGIN CREATE NEW GROUP RECORD IN VTIGER
                        # Get next available id from vtiger_users_seq to use as groupid
                        $stmt = "SELECT id from vtiger_users_seq;";
                        if ($DB) {
                            echo "$stmt\n";
                        }
                        $rslt = mysql_to_mysqli($stmt, $linkV);
                        $row = mysqli_fetch_row($rslt);
                        $groupid = ($row[0] + 1);
                        if (!$rslt) {
                            die(_QXZ("Could not execute") . ': ' . mysqli_error());
                        }

                        # Increase next available groupid with 1 so next record gets proper id
                        $stmt = "UPDATE vtiger_users_seq SET id = '$groupid';";
                        if ($DB) {
                            echo "$stmt\n";
                        }
                        $rslt = mysql_to_mysqli($stmt, $linkV);
                        if (!$rslt) {
                            die(_QXZ("Could not execute") . ': ' . mysqli_error());
                        }

                        $stmtA = "INSERT INTO vtiger_groups SET groupid='$groupid',groupname='$user_group',description='$group_name';";
                        if ($DB) {
                            echo "|$stmtA|\n";
                        }
                        $rslt = mysql_to_mysqli($stmtA, $linkV);
                        if (!$rslt) {
                            die(_QXZ("Could not execute") . ': ' . mysqli_error());
                        }

                        #### END CREATE NEW GROUP RECORD IN VTIGER
                    }
                    ##### END Add/Update group info in Vtiger
                    ######################################
                }
            }
        }
        redirect('teams');
    }
    
    
    $Licensing = $DBUTG->SELECT('licensings',['id','title'],['status'=>'active']);
    
    ?>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- PAGE CONTENT -->
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-visible formtabs" id="AllFormsTab" style="min-height: 400px;">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-plus"></span>Add A New Team</div>
                        </div>
                        <div class="panel-body pn">
                            <div class="tab-content border-none pn">
                                <div id="create_team1" class="tab-pane active p15 form-horizontal">
                                    <form id="create_team" class="cmxform" action="<?php echo base_url('teams/create') ?>"  method="POST">
                                        <div class="form-group create_team_required">
                                            <label for="user_group" class="control-label">Team Name</label>
                                            <div class="col-lg-12">
                                                <input id="user_group" name="user_group" type="text" maxlength="20" class="form-control" placeholder="Max 20 characters" required=""/>
                                            </div>
                                        </div>
                                        <div class="form-group create_team_required">
                                            <label for="group_name" class="control-label">Team Description</label>
                                            <div class="col-lg-12">
                                                <input id="group_name" name="group_name" type="text" maxlength="40" class="form-control" placeholder="Max 40 characters" required=""/>
                                            </div>
                                        </div>

                                        <div class="form-group create_team_required">
                                            <label for="allowed_campaigns" class="control-label">Campaign Access</label>
                                            <div class="col-lg-12">
                                                <select id="allowed_campaigns" name="allowed_campaigns[]" class="form-control select2" multiple="multiple" size="8" >
                                                <option value="-ALL-CAMPAIGNS-">ALL CAMPAIGNS</option>
                                                    <?php
                                                    $stmt = "SELECT campaign_id,campaign_name from vicidial_campaigns $whereLOGallowed_campaignsSQL order by campaign_id";
                                                    $rslt = mysql_to_mysqli($stmt, $link);
                                                    $campaigns_to_print = mysqli_num_rows($rslt);
                                                    $campaigns_list = '';

                                                    $o = 0;
                                                    while ($campaigns_to_print > $o) {
                                                        $rowx = mysqli_fetch_row($rslt);
                                                        echo "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                                                        $o++;
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group create_team_required">
                                            <label for="group_name" class="control-label">Email Address</label>
                                            <div class="col-lg-12">
                                                <input id="email_address" name="email_address" type="email" class="form-control" placeholder="Enter Email Address" required=""/>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group create_team_required">
                                            <label for="group_name" class="control-label">Licensing</label>
                                            <div class="col-lg-12">
                                                <select class="form-control" name="licensing" required="">
                                                    <?php foreach($Licensing as $val){?>
                                                    <option value="<?php echo $val['id'];?>"><?php echo $val['title'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group create_team_required">
                                            <label for="group_name" class="control-label">Status</label>
                                            <div class="col-lg-12">
                                                <button type="button" class="btn btn-toggle GroupStatus"  data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                                <input type="hidden" name="status" value="N"/>
                                            </div>
                                        </div>
                                        
                                        <div class="row bt-1 " style="padding-top: 12px;">
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Create</button> 
                                                <button type="reset" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Reset</button>
                                            </div>
                                            <div class="col-sm-6"></div>
                                        </div>
                                    </form>
                                    <!--<a class="ajax-disable btn  btn-success m10" onclick="$('#create_team').trigger('submit');" style="float:right;" href="#"> Create</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
<!--                    <div class="row gap-y text-center">
                        <div class="col-md-4">
                <div class="rounded shadow-1 hover-shadow-3 transition-5s bg-white b-1 border-success">
                  <p class="text-uppercase font-weight-400 bb-1 py-10 ls-2 bg-primary">Basic</p>
                  <br>

                  <small><b><i class="fa fa-times text-danger"></i></b> Email</small><br>
                  <small><b><i class="fa fa-times text-danger"></i></b> Chat</small><br>
                  <small><b><i class="fa fa-times text-danger"></i></b> Facebook</small><br>
                  <small><b><i class="fa fa-times text-danger"></i></b> Twitter</small><br>
                  <br>
                  <a class="btn btn-flat btn-success" href="javascript:void(0);" onclick="alert('You have selected!!');">Get Started</a>
                  <br><br>
                </div>
              </div>
                        <div class="col-md-4">
                <div class="rounded shadow-1 hover-shadow-3 transition-5s bg-white b-1 border-success">
                  <p class="text-uppercase font-weight-400 bb-1 py-10 ls-2 bg-info">Omni</p>
                  <br>

                  <small><b><i class="fa fa-check text-success"></i></b> Email</small><br>
                  <small><b><i class="fa fa-check text-success"></i></b> Chat</small><br>
                  <small><b><i class="fa fa-times text-danger"></i></b> Facebook</small><br>
                  <small><b><i class="fa fa-times text-danger"></i></b> Twitter</small><br>
                  <br>
                  <a class="btn btn-flat btn-success" href="javascript:void(0);">Get Started</a>
                  <br><br>
                </div>
              </div>
                        <div class="col-md-4">
                <div class="rounded shadow-1 hover-shadow-3 transition-5s bg-white b-1 border-success">
                  <p class="text-uppercase font-weight-400 bb-1 py-10 ls-2 bg-success">Advance</p>
                  <br>

                  <small><b><i class="fa fa-check text-success"></i></b> Email</small><br>
                  <small><b><i class="fa fa-check text-success"></i></b> Chat</small><br>
                  <small><b><i class="fa fa-check text-success"></i></b> Facebook</small><br>
                  <small><b><i class="fa fa-check text-success"></i></b> Twitter</small><br>
                  <br>
                  <a class="btn btn-flat btn-success" href="javascript:void(0);">Get Started</a>
                  <br><br>
                </div>
              </div>
                    </div>-->
                </div>
            </div>
        </section>
    </div>
<?php } ?>
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
                Your team has been successfully created.
              </div>
              
                <p>Team Name:- <span class="ColumnID"></span></p>
                <p>Team Description :- <span class="ColumnName"></span></p>
                
                <p><b>If you want to go on detail page ,please click on Team Detail Page.</b></p>
          </div>
          <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-app btn-danger" data-dismiss="modal">Close</button>
                <a class="btn btn-success float-right btn-app ColumnDetailPage" href="">Team Detail Page</a>
          </div>
        </div>
    </div>
</div>

<script>
    $('#create_team').on('submit', function (e) {
         e.preventDefault();
         var form = $(this);
         $.ajax({
           type: 'post',
           url: '<?php echo base_url('teams/ajax') ?>?rule=add',
           data: form.serialize(),
           success: function (data) {
             var result = JSON.parse(data);
                if(result.success === 1){
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'info',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                     
                     $('#create_team')[0].reset();
                     $('#modal-success').modal('show');
                     
                     $('.ColumnID').html(result.data.ColumnID);
                     $('.ColumnName').html(result.data.ColumnName);
                     
                    $('.ColumnDetailPage').attr('href','edit?user_group='+result.data.ColumnID);
                     
                }else{
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
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
       
       
       
       $(document).on('click','.GroupStatus',function(){
            var value = 'N';    
            if($(this).hasClass('active')){
                value = 'Y';    
            }
            $(this).parent().find('input').val(value);
        });
</script>