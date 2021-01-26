<?php if(!checkRole('users', 'create')){ no_permission(); } else {?>
    <?php
        $PhoneList = $database->select('phones',['extension']);
        $UserGroup = $database->select('vicidial_user_groups',['user_group','group_name'],['ORDER'=>['user_group'=>'ASC']]);
        $UserListing = $database->select('vicidial_users',['user','full_name'],['user_level[!]'=>9]);
        $RoleListings = $DBUTG->select('roles',['id','title'],['status'=>'active']);

        if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
            $UserListing = $database->select('vicidial_users',['user','full_name'],['user_group[!]'=>'ADMIN']);
        }else{
            $UserListing = $database->select('vicidial_users',['user','full_name'],['user_group'=>$_SESSION['CurrentLogin']['user_group']]);
        }
    ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title"><i class="fa fa-plus"></i> Add A new User</span>
                        <!-- nav tab-->
                        <ul class="nav nav-tabs justify-content-end pull-right" role="tablist">
                            <li class="nav-item Fa-List-Second"> <a class="nav-link" data-toggle="tab" href="#faList" role="tab"><span class="hidden-sm-up"><i class="fa fa-phone"></i></span> <span class="hidden-xs-down"><i class="fa fa-phone"></i></span></a> </li>
                            <li class="nav-item Fa-Phone-Second"> <a class="nav-link" data-toggle="tab" href="#faPhone" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="fa fa-list-ol"></i></span><span class="hidden-xs-down"><i class="fa fa-list-ol"></i></span></a> </li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <form method="post" name="" action="<?php echo base_url('users/ajax')?>?rule=add" id="CreateUserForm" class="UserForm" >
                            <div class="tab-content border-none pn">
                            <div id="faList" class="tab-pane p15 active">
                            <div class="pad">
                                <div class="form-group row">
                                    <label for="user" class="col-lg-3 col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input id="user" name="user" type="text" maxlength="20" class="form-control field-validate" placeholder="Max 8 characters" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="full_name" class="col-lg-3 col-sm-3 col-form-label">Full Name</label>
                                    <div class="col-sm-9">
                                        <input id="full_name" name="full_name" type="text" maxlength="40" class="form-control field-validate" placeholder="Max 40 characters" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="pass" class="col-lg-3 col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input id="pass" name="pass" type="password" class="form-control field-validate" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_login" class="col-lg-3 col-sm-3 col-form-label">Auto Phone ID</label>
                                    <div class="col-sm-9">
                                        <select name="phone_login" class="form-control field-validate">
                                            <option value="">Select Phone</option>
                                            <?php foreach($PhoneList as $list){?>
                                                <option value="<?php echo $list['extension'];?>"><?php echo $list['extension'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <?php // if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){?>
                                <div class="form-group row">
                                    <label for="user_group" class="col-lg-3 col-sm-3 col-form-label">Team</label>
                                    <div class="col-sm-9">
                                        <select id="user_group" name="user_group" class="form-control field-validate" required="">
                                            <option value="">Select Team</option>
                                            <?php
                                            if(!empty($_SESSION['CurrentLogin']['user_group']) && $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){
                                                $UserGroup = $database->select('vicidial_user_groups',['user_group','group_name'],['ORDER'=>['user_group'=>'ASC']]);
                                            }else{
                                                $UserGroup = $database->select('vicidial_user_groups',['user_group','group_name'],['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access'],'ORDER'=>['user_group'=>'ASC']]);
                                            }
                                            ?>
                                            <?php foreach($UserGroup as $group){?>
                                            <option value="<?php echo $group['user_group'];?>"><?php echo $group['user_group'].' - '.$group['group_name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <?php // }else{?>
                                <!--<input type="hidden" name="user_group" value="<?php echo $_SESSION['CurrentLogin']['user_group'];?>"/>-->
                                <?php // }?>
                                <div class="form-group row">
                                    <label for="user_level" class="col-lg-3 col-sm-3 col-form-label ">User Level</label>
                                    <div class="col-sm-9">
                                        <select id="user_level" name="user_level" class="form-control field-validate" required="">
                                            <option value="">Select Level</option>
                                            <option value="8">Admin</option>
                                            <option value="7">Team Managers</option>
                                            <option value="1">Agent</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row TM-access" style="display:none;">
                                    <label for="user_level" class="col-lg-3 col-sm-3 col-form-label">TM's Access</label>
                                    <div class="col-sm-4">
                                        <label for="example-text-input" class="col-sm-12 col-form-label">Admin Interface Enable</label>
                                                                            <div class="col-sm-2">
                                                                                  <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="admin_interface_enable" >
                                                                                        <div class="handle"></div>
                                                                                  </button>
                                                                                <input type="hidden" name="admin_interface_enable" value="0"/>
                                                                            </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="example-text-input" class="col-sm-12 col-form-label">View Reports</label>
                                                                            <div class="col-sm-2">
                                                                                  <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="view_reports" >
                                                                                        <div class="handle"></div>
                                                                                  </button>
                                                                                <input type="hidden" name="view_reports" value="0"/>
                                                                            </div>
                                    </div>
                                </div>

                                <div class="form-group row UserRole" style="display:none;">
                                    <label for="user_group" class="col-lg-3 col-sm-3 col-form-label ">Role</label>
                                    <div class="col-sm-9">
                                        <select id="role_id" name="role_id" class="form-control" >
                                            <option value="">Select Role</option>
                                            <?php foreach($RoleListings as $role){?>
                                            <option value="<?php echo $role['id'];?>"><?php echo $role['title'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>

<!--                                <div class="form-group row">
                                    <label for="admin_interface_enable" class="col-lg-3 col-sm-3 col-form-label">Allow Admin Interface Access</label>
                                    <div class="col-sm-9">
                                        <br/>
                                        <button type="button" class="btn btn-sm btn-toggle SwitchUserBTN" data-toggle="button" aria-pressed="true" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                        <input type="hidden" name="admin_interface_enable" value="N">
                                    </div>
                                </div>-->
                                <div class="row bt-1 border-primary" style="padding-top: 12px;">
                                    <div class="col-sm-6">
                                        <button type="reset" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Reset</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-success btn-sm pull-right" id="NextButton"><i class="fa fa-arrow-right"></i> Next</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                                <div id="faPhone" class="tab-pane p15">
                                   <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group row">
                                                                            <label for="example-text-input" class="col-sm-4 col-form-label">Choose Own Groups</label>
                                                                            <div class="col-sm-2">
                                                                                  <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="agent_choose_ingroups" >
                                                                                        <div class="handle"></div>
                                                                                  </button>
                                                                                <input type="hidden" name="agent_choose_ingroups" value="0"/>
                                                                            </div>

                                                                            <label for="example-text-input" class="col-sm-4 col-form-label">Allowed To Choose Blended</label>
                                                                            <div class="col-sm-2">
                                                                                  <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="agent_choose_blended">
                                                                                        <div class="handle"></div>
                                                                                  </button>
                                                                                <input type="hidden" class="" name="agent_choose_blended" value="0"/>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="scheduled_callbacks" class="col-lg-4">Allowed To Set Callbacks</label>
                                                                            <div class="col-lg-2">
                                                                                <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="scheduled_callbacks">
                                                                                        <div class="handle"></div>
                                                                                  </button>
                                                                                 <input type="hidden" class="" name="scheduled_callbacks" value="0"/>
                                                                            </div>

                                                                            <label for="agentonly_callbacks" class="col-lg-4">Allowed To Set Personal Callbacks</label>
                                                                            <div class="col-lg-2">
                                                                                <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting " data-toggle="button" aria-pressed="true" autocomplete="off" data-field="agentonly_callbacks">
                                                                                        <div class="handle"></div>
                                                                                  </button>
                                                                                <input type="hidden" class="" name="agentonly_callbacks" value="0"/>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                    <label for="agentcall_manual" class="col-lg-4">Allowed To Manual Dial</label>
                                                                    <div class="col-lg-2">
                                                                        <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="agentcall_manual">
                                                                                        <div class="handle"></div>
                                                                                  </button>
                                                                        <input type="hidden" class="" name="agentcall_manual" value="0"/>
                                                                    </div>

                                                                    <label for="vicidial_recording" class="col-lg-4">Record Agent Calls</label>
                                                                    <div class="col-lg-2">
                                                                        <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="vicidial_recording">
                                                                                        <div class="handle"></div>
                                                                                  </button>
                                                                        <input type="hidden" class="" name="vicidial_recording" value="0"/>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="closer_default_blended" class="col-lg-4">Auto Select Outbound Dialling Checkbox</label>
                                                                    <div class="col-lg-2">
                                                                        <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="closer_default_blended">
                                                                                        <div class="handle"></div>
                                                                                  </button>
                                                                        <input type="hidden" class="" name="closer_default_blended" value="0"/>
                                                                    </div>

                                                                    <label for="closer_default_blended" class="col-lg-2">Custom 1</label>
                                                                    <div class="col-lg-4">
                                                                      <input id="custom_one" name="custom_one" type="text" class="form-control">
                                                                    </div>

                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="closer_default_blended" class="col-lg-4">Agent API Access</label>
                                                                    <div class="col-lg-2">
                                                                        <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="vdc_agent_api_access" >
                                                                            <div class="handle"></div>
                                                                        </button>
                                                                        <input type="hidden" class="" name="vdc_agent_api_access" value="0"  />
                                                                    </div>

                                                                    <label for="closer_default_blended" class="col-lg-4">API Only User</label>
                                                                    <div class="col-lg-2">
                                                                        <button type="button" class="btn btn-sm btn-toggle btn-success SwitchUserSetting" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="api_only_user">
                                                                            <div class="handle"></div>
                                                                        </button>
                                                                        <input type="hidden" class="" name="api_only_user" value="0"/>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row vdc_agent_api_access hide">

                                                                    <label for="api_token" class="col-lg-4">Agent API Access Token</label>
                                                                    <div class="col-lg-7">
                                                                        <input id="api_token" name="api_token" type="text" class="form-control" readonly value="">
                                                                    </div>
                                                                    <div class="col-lg-1 p-0">
                                                                      <button type="button" class="btn btn-light" name="button" onclick="copyApiToken()"><i class="fa fa-copy"></i></button>
                                                                    </div>
                                                                  </div>
                                                                  <div class="form-group row vdc_agent_api_access hide">

                                                                    <label for="api_ip_list" class="col-lg-4">Agent API Access IP's</label>
                                                                    <div class="col-lg-8">
                                                                        <input id="api_ip_list" name="api_ip_list" type="text" class="form-control">
                                                                    </div>

                                                                </div>
                                                                <div class="form-group row vdc_agent_api_access hide">
                                                                  <label for="api_start_date" class="col-lg-4">Agent API Access Start</label>
                                                                  <div class="col-lg-4">
                                                                      <input id="api_start_date" name="api_start_date" type="date" class="form-control" >
                                                                  </div>
                                                                  </div>
                                                                  <div class="form-group row vdc_agent_api_access hide">
                                                                  <label for="api_end_date" class="col-lg-4">Agent API Access End</label>
                                                                  <div class="col-lg-4">
                                                                      <input id="api_end_date" name="api_end_date" type="date" class="form-control">
                                                                  </div>
                                                                  </div>


                                                                    </div>

                                                                </div>
                                    <div class="row bt-1 border-primary" style="padding-top: 12px;">
                                    <div class="col-sm-6">
                                        <button type="reset" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Reset</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" onclick="return validateForm(this);" class="btn btn-success btn-sm pull-right" id=""><i class="fa fa-arrow-right"></i> Create</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-12 col-lg-6 col-md-6">
                <div class="row">
                    <!-- Clone campign-->
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title"><i class="fa fa-copy"></i> Clone A User</span>
                                <!-- nav tab-->
                            </div>
                            <div class="panel-body" id="CopyCamDiv">
                                <form method="post" name="" action="<?php echo base_url('users/ajax')?>?rule=copy" id="" class="UserForm">
                                    <div class="pad ">
                                        <div class="form-group row">
                                            <label for="user" class="col-lg-3 col-sm-3 col-form-label">Username</label>
                                            <div class="col-sm-9">
                                                <input id="user" name="user" type="text" maxlength="20" class="form-control" placeholder="Max 8 characters" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="full_name" class="col-lg-3 col-sm-3 col-form-label">Full Name</label>
                                            <div class="col-sm-9">
                                                <input id="full_name" name="full_name" type="text" maxlength="40" class="form-control" placeholder="Max 40 characters" required=""/>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="pass" class="col-lg-3 col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-9">
                                                <input id="pass" name="pass" type="password" class="form-control" required=""/>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="phone_login" class="col-lg-3 col-sm-3 col-form-label">Auto Phone ID</label>
                                            <div class="col-sm-9">
                                                <select id="phone_login" name="phone_login" class="form-control">
                                                    <option value="">Select Phone</option>
                                                    <?php foreach($PhoneList as $list){?>
                                                        <option value="<?php echo $list['extension'];?>"><?php echo $list['extension'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>

<!--                                        <div class="form-group row">
                                            <label for="user_group" class="col-lg-3 col-sm-3 col-form-label">Team</label>
                                            <div class="col-sm-9">
                                                <select id="user_group" name="user_group" class="form-control" required="">
                                                    <option value="">Select Team</option>
                                                    <?php foreach($UserGroup as $group){?>
                                                        <option value="<?php echo $group['user_group'];?>"><?php echo $group['user_group'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>-->

                                        <div class="form-group row">
                                            <label for="copy_clone" class="col-lg-3 col-sm-3 col-form-label">Clone User</label>
                                            <div class="col-sm-9">
                                                <select id="copy_clone" name="copy_clone" class="form-control" required="">
                                                    <option value="">Select User</option>
                                                     <?php foreach($UserListing as $user){?>
                                                        <option value="<?php echo $user['user'];?>"><?php echo $user['user'].' - '.$user['full_name'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row bt-1 border-primary" style="padding-top: 12px;">
                                        <div class="col-sm-6"><button type="reset" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Reset</button></div>
                                        <div class="col-sm-6"><button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-copy"></i> Clone</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---clon camign-->
        </div>
    </section>
    <!-- /.content -->
</div>
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
                Your user has been successfully created.
              </div>

                <p>User ID :- <span class="ColumnID"></span></p>
                <p>User Name :- <span class="ColumnName"></span></p>

                <p><b>If you want to go on detail page ,please click on User Detail Page.</b></p>
          </div>
          <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-app btn-danger" data-dismiss="modal">Close</button>
                <a class="btn btn-success float-right btn-app ColumnDetailPage" href="">User Detail Page</a>
          </div>
        </div>
    </div>
</div>
<script>
    $(".UserForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');

    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
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

                     $('.UserForm')[0].reset();
                     $('#modal-success').modal('show');

                     $('.ColumnID').html(result.data.UserID);
                     $('.ColumnName').html(result.data.UserName);

                    $('.ColumnDetailPage').attr('href','edit?user='+result.data.UserID);
                     $('.AddUserTab a[href="#faList"]').trigger('click');

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


$(document).on('click','.SwitchUserSetting',function(){
   if($(this).hasClass('active')){
     var value = '1' ;
   }else{
     var value = '0';
   }

   var FieldName = $(this).data('field');
   $(this).parent().find('input[name="'+FieldName+'"]').val(value);

   if(FieldName=='vdc_agent_api_access' && value==1) {
      $('.'+FieldName).toggleClass('hide');
      $.ajax({
             type: "GET",
             url: '<?php echo base_url('users/ajax')?>?rule=token',
             success: function(data)
             {
                  data = $.trim(data);
                  $('#api_token').val(data);
             }
     });
   }
});




$(document).on('change','#user_level',function(){
   var val = $(this).val();
   if(val == 7){
       $('.TM-access').show();
   }else{
       $('.TM-access').hide();
       $('input[name="admin_interface_enable"]').val(0);
       $('input[name="view_reports"]').val(0);
       $('.TM-access').find('button').removeClass('active');
   }
   $('.UserRole').show();
   if(val == 1){
       $('.UserRole').hide();
   }
});

var copyApiToken = function(){
    var copyText = document.getElementById("api_token");
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    document.execCommand("copy");
    $.toast({
        heading: 'Copied!',
        text: '',
        position: 'top-right',
        loaderBg: '#ff6849',
        icon: 'info',
        hideAfter: 1500,
        showHideTransition: 'plain',
    });
}



</script>
<script src="<?php echo publicAssest();?>assets/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>

<script>
    $(document).on('click','#NextButton',function(){
        var ValidVal = $('.field-validate').valid();
        if(ValidVal == true){
            $('.Fa-Phone-Second a').trigger('click');
        }
    });

    function validateForm(elem){

        $('.Fa-List-Second a').trigger('click');
        var ValidVal = $('.field-validate').valid();
        if(ValidVal == true){
            $('.Fa-Phone-Second a').trigger('click');
            return true;
        }else{
             return false;
        }
    }
    </script>

<?php } ?>
