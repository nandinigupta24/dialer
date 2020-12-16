<?php if(!checkRole('admin_settings', 'create')){ no_permission(); } else {
 $server=$database->select('servers',['server_id','server_ip']);
 $usergroup=$database->select('vicidial_user_groups',['user_group','group_name']);
 $DialPrefix = $database->get('vicidial_server_carriers','carrier_auto_id',['ORDER'=>['dial_prefix'=>'DESC']]) + 10;
  ?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content" id="app">
 <!-- Step wizard -->
      <div class="panel">
        <div class="panel-heading">
          <span class="panel-title"><i class="fa fa-plus"></i> Add A new carrier</span>
        </div>
        <!-- /.box-header -->
        <!-- /.box-header -->
        <div class="panel-body wizard-content">
            <form action="<?php echo base_url('carrier/ajax')?>?action=InsertAgain" id="CarrierRule" class="validation-wizard wizard-circle">
				<!-- Step 1 -->
				<h6>Carrier Information</h6>
				<section>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="firstName5">Carrier ID :</label>
                                                                <input type="text" class="form-control" name="carrier_id" placeholder="Enter Carrier ID" value="" id="CarrierID" required/> 
                                                        </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="lastName1">Carrier Name :</label>
                                                                <input type="text" class="form-control" name="carrier_name" placeholder="Enter Carrier Name" value="" id="CarrierName" required/> 
                                                        </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="firstName5">Carrier Description :</label>
                                                                <textarea class="form-control" name="carrier_description" rows="5" placeholder="Enter Carrier Description" required></textarea> 
                                                        </div>
						</div>
					</div>
					
				</section>
				<!-- Step 2 -->
				<h6>Account Setup</h6>
				<section>
                                    <div class="row">
                                        <div class="col-md-12 text-center mb-30">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info IP-Authentication DefaultClick" data-text="IP-Authentication">User Based</button>
                                                <button type="button" class="btn btn-info IP-Authentication" data-text="NON-IP-Authentication">IP Authentication</button>
                                            </div>
                                            <input type="hidden" name="" value="" id="AuthenticationType"/>
                                        </div>
                                    </div>
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="username123">HostName :</label>
                                                                <input type="text" class="form-control" id="Account-HostName" required="" name=""/>
							</div>
                                                    <div class="form-group IP-Authentication-Method">
								<label for="username123">Username :</label>
                                                                <input type="text" class="form-control" id="Account-Username" name="" />
							</div>
							<div class="form-group IP-Authentication-Method">
								<label for="username123">Password :</label>
                                                                <input type="text" class="form-control" id="Account-Password" name=""/>
							</div>
							<div class="form-group IP-Authentication-Method">
								<label for="username123">Port :</label>
                                                                <input type="text" class="form-control" id="Account-Port" name=""/>
							</div>
							<div class="form-group">
								<label for="username123">Allow :</label>
                                                                <label for="alaw"><input type="checkbox" name="alaw" value="alaw" class="allow_checkbox"> alaw </label>
                                                                <label for="g729"><input type="checkbox" name="g729" value="g729" class="allow_checkbox"> g729 </label>
                                                                <label for="ulaw"><input type="checkbox" name="ulaw" value="ulaw" class="allow_checkbox"> ulaw </label>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="password123">Account Entry</label>
                                                                <textarea class="form-control" name="account_entry" required="" rows="15" id="account_entry"></textarea>
							</div>
							<div class="form-group IP-Authentication-Method">
								<label for="password123">Registration Entry</label>
                                                                <input type="text" name="registration_string" value="" id="RegistrationString" placeholder="" class="form-control"/>
							</div>
						</div>
					</div>
				</section>
				<!-- Step 3 -->
				<h6>Dialplan Setup</h6>
				<section>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="int123">Dial Prefix:</label>
                                                                <input type="text" class="form-control" id="int123" name="dial_prefix" value="<?php echo $DialPrefix;?>"/>
							</div>
						</div>
						<div class="col-md-12">							
							<div class="form-group">
								<label for="addressline12">Dialplan Entry</label>
                                                                <textarea name="dialplan_entry" id="dialplan_entry1" class="form-control" rows="5" >exten => _<?php echo $DialPrefix;?>.,1,AGI(agi://127.0.0.1:4577/call_log)
exten => _<?php echo $DialPrefix;?>.,n,Dial(sip/${EXTEN:3}@LevelID,55,tTor)
exten => _<?php echo $DialPrefix;?>.,n,Hangup</textarea>
                                                                <textarea name="" id="dialplan_entry2" class="form-control" style="display:none;" rows="5" >exten => _<?php echo $DialPrefix;?>.,1,AGI(agi://127.0.0.1:4577/call_log)
exten => _<?php echo $DialPrefix;?>.,n,Dial(sip/${EXTEN:3}@LevelID,55,tTor)
exten => _<?php echo $DialPrefix;?>.,n,Hangup</textarea>
							</div>
						</div>
					</div>
				</section>
				<!-- Step 4 -->
				<h6>Confirmation</h6>
				<section>
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="decisions1">Protocol</label>
								<select class="form-control" id="" name="protocol">
                                                                        <option value="SIP">SIP</option>
                                                                        <option value="Zap">Zap</option>
                                                                        <option value="IAX2">IAX2</option>
                                                                        <option value="EXTERNAL">EXTERNAL</option>
                                                                      </select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="decisions1">Server IP</label>
								<select class="form-control" name="server_ip" required="">
                                                                            <?php foreach($server as $val){?>
                                                                            <option value="<?php echo $val['server_ip']; ?>"><?php echo $val['server_ip']; ?></option>
                                                                            <?php }
                                                                        ?>
                                                                          </select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="decisions1">Team</label>
                                                                <select class="form-control" name="user_group"  required="">
                                                    <option value="">--Select Option--</option>
                                                    <?php if ($_SESSION['CurrentLogin']['user_group'] == 'ADMIN') { 
                                                        
                                                        $UserGroupListings = $database->select('vicidial_user_groups', ['user_group', 'group_name'], ['ORDER' => ['user_group' => 'ASC']]);
                                                    
?>
                                                        <option value="---ALL---">---ALL---</option>
                                                    <?php }else{
                                                            $UserGroupListings = $database->select('vicidial_user_groups', ['user_group', 'group_name'], ['user_group'=>$_SESSION['CurrentLogin']['allowed_teams_access'],'ORDER' => ['user_group' => 'ASC']]);
                                                    }
                                        foreach ($UserGroupListings as $listings) {
                                    ?>
                                    <option value="<?php echo $listings['user_group']; ?>"><?php echo $listings['user_group'] . ' - ' . $listings['group_name']; ?></option>
                                    <?php } ?>

                            </select>
								
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="decisions1">Status</label>
								<select class="form-control" name="active">
                                                                    <option value="N">N</option>
                                                                    <option value="Y">Y</option>
                                                                </select>
							</div>
						</div>
					</div>
				</section>
			</form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
<!--        <div class="row">
            <div class="col-12 col-lg-6 col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title"><i class="fa fa-plus"></i> Add A new carrier</span>
                    </div>
                    <div class="panel-body">
                         Tab panes 
                        <form class="" method="post" action="<?php echo base_url('carrier/ajax')?>?action=Insert" id="SmtpRule" v-on:submit.prevent="submitCarrierForm">
                          <div class="modal-body">
                            <div class="form-group row">
                              <label for="host" class="col-sm-2 col-form-label">Carrier ID</label>
                              <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="Max 10 Characters" id="carrier_id" name="carrier_id" required="true" v-model="carrier_id">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="username" class="col-sm-2 col-form-label">Carrier Name</label>
                              <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="Max 10 Characters" id="carrier_name" name="carrier_name" required="true" v-model="carrier_name">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="port" class="col-sm-2 col-form-label">Carrier Description</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" type="text" row="7" cols="50" placeholder="Max 250 Characters" id="carrier_description" name="carrier_description"  v-model="carrier_description"></textarea>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="campIdCopy" class="col-sm-2 col-form-label">Admin User Group</label>
                              <div class="col-sm-10">
                                <select class="form-control" name="user_group" id="user_group" required v-model="user_group">
                                  <option value="---ALL---">---ALL---</option>
                                  <?php foreach($usergroup as $val){?>
                                  <option value="<?php echo $val['user_group']; ?>"><?php echo $val['group_name']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="password" class="col-sm-2 col-form-label">Username</label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="text" placeholder="Max 10 Characters" id="username" name="username"  v-model="username">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="password" class="col-sm-2 col-form-label">Password</label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="text" placeholder="Max 10 Characters" id="password" name="password"  v-model="password">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="password" class="col-sm-2 col-form-label">Host</label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="text" placeholder="Max 10 Characters" id="host" name="host" required="true" v-model="host">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="password" class="col-sm-2 col-form-label">Port</label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="text" placeholder="Max 10 Characters" id="port" name="port" required="true" v-model="port">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="password" class="col-sm-2 col-form-label">Template ID</label>
                              <div class="col-sm-10">
                                <select class="form-control" id="template_id" name="template_id" v-model="template_id">
                                  <option value="--NONE--">--NONE--</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="port" class="col-sm-2 col-form-label">Allow</label>
                              <div class="col-sm-10">
                                  <label for="alaw"><input type="checkbox" name="alaw" value="alaw" v-model="alaw"> alaw </label><br>
                                  <label for="g729"><input type="checkbox" name="g729" value="g729" v-model="g729"> g729 </label><br>
                                  <label for="ulaw"><input type="checkbox" name="ulaw" value="ulaw" v-model="ulaw"> ulaw </label>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="port" class="col-sm-2 col-form-label">Protocol</label>
                              <div class="col-sm-10">
                                <select class="form-control" id="protocol" name="protocol" v-model="protocol">
                                  <option value="SIP">SIP</option>
                                  <option value="Zap">Zap</option>
                                  <option value="IAX2">IAX2</option>
                                  <option value="EXTERNAL">EXTERNAL</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="port" class="col-sm-2 col-form-label">Dialplan Entry <a href="javascript:void(0)" class="btn btn-app btn-success text-white" v-on:click="addDiaPlan"><i class="fa fa-plus" title="Add Dialplan Entry"></i></a></label>
                              <div class="col-sm-10">
                                  <ul class="list-group">
                                    <li class="list-group-item" v-for="(item, index) in dialplanEntry" :key="index">
                                      <div class="col-md-10 pull-left">
                                      <input class="form-control " type="text" :value="item" v-model="dialplanEntry[index]" :placeholder="'Entry ' + (index+1)">
                                    </div>
                                    <div class="col-md-2 pull-right">
                                      <a href="javascript:void(0)" class="btn btn-app btn-danger text-white pull-right" v-on:click="deleteDialPlan(index)"><i class="fa fa-times" title="Delete Dialplan Entry"></i></a>
                                    </div>
                                    </li>
                                  </ul>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="campIdCopy" class="col-sm-2 col-form-label">Server IP</label>
                              <div class="col-sm-10">
                                <select class="form-control" name="server_ip" id="server_ip" v-model="server_ip" required="">
                                  <?php foreach($server as $val){?>
                                  <option value="<?php echo $val['server_ip']; ?>"><?php echo $val['server_ip']; ?></option>
                                  <?php }
                              ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="active" class="col-sm-2 col-form-label">Status</label>
                              <div class="col-sm-10">
                                <button type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off" data-id="active" data-field="active" value="Y" v-on:click="active=='N'?active='Y':active='N'">
                                  <div class="handle"></div>
                                </button>
                              </div>
                            </div>
                          </div>
                          <div class="panel-footer" style="margin-left: 320px;">
                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success waves-effect text-right">Create</button>
                          </div>

                          <input class="form-control d-none" type="text" placeholder="Max 30 Characters" id="registration_string" name="registration_string" v-model="registration_string">
                          <input class="form-control d-none" type="text" placeholder="Max 30 Characters" id="globals_string" name="globals_string" v-model="globals_string">
                          <textarea class="form-control d-none" type="text" row="7" cols="50" placeholder="Max 250 Characters" id="account_entry" name="account_entry"  v-model="account_entry"></textarea>
                          <textarea class="form-control d-none" type="text" row="7" cols="50" placeholder="Max 250 Characters" id="dialplan_entry" name="dialplan_entry"  v-model="dialplan_entry"></textarea>
                        </form>

                    </div>
                     /.box-body 
                </div>
                 /.box 
            </div>
            <div class="col-12 col-lg-6 col-md-6">
              <div class="panel">
                  <div class="panel-heading">
                      <span class="panel-title"><i class="fa fa-eye"></i> Preview</span>
                  </div>
                  <div class="panel-body">
                    <table class="table table-striped">
                          <tr><td class="text-left">Carrier ID</td><td class="text-left">:</td><td class="text-left">{{carrier_id}}</td></tr>
                          <tr><td class="text-left">Carrier Name</td><td class="text-left">:</td><td class="text-left">{{carrier_name}}</td></tr>
                          <tr><td class="text-left">Carrier Description</td><td class="text-left">:</td><td class="text-left">{{carrier_description}}</td></tr>
                          <tr><td class="text-left">Admin User Group</td><td class="text-left">:</td><td class="text-left">{{user_group}}</td></tr>
                          <tr><td class="text-left">Registration String</td><td class="text-left">:</td><td class="text-left">{{registration_string}}</td></tr>
                          <tr><td class="text-left">Template ID</td><td class="text-left">:</td><td class="text-left">{{template_id}}</td></tr>
                          <tr><td class="text-left">Account Entry</td><td class="text-left">:</td><td class="text-left"><pre>{{account_entry}}</pre></td></tr>
                          <tr><td class="text-left">Protocal</td><td class="text-left">:</td><td class="text-left">{{protocol}}</td></tr>
                          <tr><td class="text-left">Globals String</td><td class="text-left">:</td><td class="text-left">{{globals_string}}</td></tr>
                          <tr><td class="text-left">Dialplan Entry</td><td class="text-left">:</td><td class="text-left"><pre>{{dialplan_entry}}</pre></td></tr>
                          <tr><td class="text-left">Server IP</td><td class="text-left">:</td><td class="text-left">{{server_ip}}</td></tr>
                          <tr><td class="text-left">Status</td><td class="text-left">:</td><td class="text-left">{{active}}</td></tr>
                    </table>
                  </div>
            </div>
        </div>
         Default box 
</div>-->
    </section>
    <!-- /.content -->
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script>
var app = new Vue({
  el: '#app',
  data: {
    carrier_id: '',
    carrier_name: '',
    carrier_description: '',
    user_group: '---ALL---',
    username: '',
    password: '',
    host: '',
    port: '',
    template_id: '--NONE--',
    alaw: '',
    ulaw: '',
    g729: '',
    protocol: 'SIP',
    server_ip: '',
    active:'N',
    dialplanEntry : []
  },
  computed: {
    registration_string : function(){
      let a_e = false;
      if(this.username || this.password) {
        a_e  = true
      }
      return a_e ? "register =>"+this.username+':'+this.password+'@'+this.host+':'+this.port : '';
    },
    account_entry: function(){
        let a_e = "["+this.carrier_name+"]\ndisallow=all\ntype=friend\nnat=yes\nqualify=yes\ncanreinvite=no\ndtmfcode=rfc2833";
        if(this.host) {
          a_e += "\nhost="+this.host;
        }
        if(this.username) {
          a_e += "\nusername="+this.username+"\naccountcode="+this.username;
        }
        if(this.password) {
          a_e += "\nsecret="+this.password;
        }
        if(this.port) {
          a_e += "\nport="+this.port;
        }
        if(this.username || this.password) {
          a_e  += "\ninsecure=invite";
        }else {
          a_e  += "\ninsecure=very";
        }
        if(this.alaw) {
          a_e += '\nallow=alaw';
        }
        if(this.g729) {
          a_e += '\nallow=g729';
        }
        if(this.ulaw) {
          a_e += '\nallow=ulaw';
        }
        return a_e;
    },
    globals_string : function(){
      return "TEST"+this.protocol+"TRUNK = "+this.protocol+"/"+(this.carrier_id.toLowerCase());
    },
    dialplan_entry : function(){
      return this.dialplanEntry.length ? "exten => "+this.dialplanEntry.join("\nexten => ") : '';
    }
  },
  methods: {
    addDiaPlan : function(){
        this.dialplanEntry.push([])
    },
    deleteDialPlan : function(index) {
      this.dialplanEntry.splice(index, 1);
    }
  }
})
// this is the id of the form
$("#SmtpRule").submit(function(e) {

  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);
  var url = form.attr('action');

  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(), // serializes the form's elements.
    success: function(data) {
      var result = JSON.parse(data);
      if (result.success === 1) {
        $.toast({
          heading: 'Welcome To UTG Dialer',
          text: result.message,
          position: 'top-right',
          loaderBg: '#ff6849',
          icon: 'info',
          hideAfter: 3500,
          showHideTransition: 'plain',
        });
        setTimeout(function(){
          window.location.href = '<?php echo base_url('carrier')?>';
        }, 2500);
      } else {
        $.toast({
          heading: 'Fix this error!',
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
<script src="<?php echo publicAssest();?>assets/vendor_components/jquery-steps-master/build/jquery.steps.js"></script>
<script src="<?php echo publicAssest();?>assets/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
<!--<script src="https://stg-dial.utgone.com/assets/js/pages/steps.js"></script>-->


<script>
    
    
    function get_allow(){
        var stringBox = '';
            $(".allow_checkbox:checked").each(function(){
                stringBox = stringBox+"allow="+$(this).val()+"\n";
            }); 
            return stringBox;
    }
    
    $(document).ready(function(){
        $('.IP-Authentication').click(function(){
           $('.IP-Authentication').removeClass('btn-danger');
           $('.IP-Authentication').removeClass('btn-info');
           $('.IP-Authentication').addClass('btn-info');
           $(this).removeClass('btn-info');
           $(this).addClass('btn-danger');
           
           var text = $(this).data('text');
           $('#AuthenticationType').val(text);
           
           if(text == 'NON-IP-Authentication'){
               $('.IP-Authentication-Method').hide();
               var CarrierName = $('#CarrierName').val(); 
                var AccountEntry = "["+CarrierName+"]\n"+
                                "disallow=all\n"+
                                "type=friend\n"+
                                "nat=yes\n"+
                                "qualify=yes\n"+
                                "canreinvite=no\n"+
                                "dtmfcode=rfc2833\n"+
                                "host="+$('#Account-HostName').val()+"\n"+
                                "insecure=invite\n"+get_allow();
                        $('#RegistrationString').val('');
           }else{
               $('.IP-Authentication-Method').show();
               var CarrierName = $('#CarrierName').val(); 
                var AccountEntry = "["+CarrierName+"]\n"+
                                "disallow=all\n"+
                                "type=friend\n"+
                                "nat=yes\n"+
                                "qualify=yes\n"+
                                "canreinvite=no\n"+
                                "dtmfcode=rfc2833\n"+
                                "host="+$('#Account-HostName').val()+"\n"+
                                "username="+$('#Account-Username').val()+"\n"+
                                "accountcode="+$('#Account-Username').val()+"\n"+
                                "secret="+$('#Account-Password').val()+"\n"+
                                "port="+$('#Account-Port').val()+"\n"+
                                "insecure=invite\n"+get_allow();
                        $('#RegistrationString').val('register =>'+$('#Account-Username').val()+':'+$('#Account-Password').val()+'@'+$('#Account-HostName').val()+':'+$('#Account-Port').val());
           }
           $('#account_entry').val(AccountEntry);
        });
        
        
        $('#Account-HostName').keyup(function(){
            var value = $(this).val();
            if(value){
               var AuthenticationType = $('#AuthenticationType').val();
               if(AuthenticationType == 'IP-Authentication'){
                   var CarrierName = $('#CarrierName').val(); 
                    var AccountEntry = "["+CarrierName+"]\n"+
                                "disallow=all\n"+
                                "type=friend\n"+
                                "nat=yes\n"+
                                "qualify=yes\n"+
                                "canreinvite=no\n"+
                                "dtmfcode=rfc2833\n"+
                                "host="+value+"\n"+
                                "username="+$('#Account-Username').val()+"\n"+
                                "accountcode="+$('#Account-Username').val()+"\n"+
                                "secret="+$('#Account-Password').val()+"\n"+
                                "port="+$('#Account-Port').val()+"\n"+
                                "insecure=invite\n"+get_allow();
                        $('#RegistrationString').val('register =>'+$('#Account-Username').val()+':'+$('#Account-Password').val()+'@'+$('#Account-HostName').val()+':'+$('#Account-Port').val());
               }else{
                    var CarrierName = $('#CarrierName').val(); 
                    var AccountEntry = "["+CarrierName+"]\n"+
                                "disallow=all\n"+
                                "type=friend\n"+
                                "nat=yes\n"+
                                "qualify=yes\n"+
                                "canreinvite=no\n"+
                                "dtmfcode=rfc2833\n"+
                                "host="+value+"\n"+
                                "insecure=invite\n"+get_allow();
               }
            $('#account_entry').val(AccountEntry);   
            }
        });
        
        /*Account Username*/
        $('#Account-Username').keyup(function(){
            var value = $(this).val();
            if(value){
               var AuthenticationType = $('#AuthenticationType').val();
               if(AuthenticationType == 'IP-Authentication'){
                   var CarrierName = $('#CarrierName').val(); 
                    var AccountEntry = "["+CarrierName+"]\n"+
                                "disallow=all\n"+
                                "type=friend\n"+
                                "nat=yes\n"+
                                "qualify=yes\n"+
                                "canreinvite=no\n"+
                                "dtmfcode=rfc2833\n"+
                                "host="+$('#Account-HostName').val()+"\n"+
                                "username="+value+"\n"+
                                "accountcode="+value+"\n"+
                                "secret="+$('#Account-Password').val()+"\n"+
                                "port="+$('#Account-Port').val()+"\n"+
                                "insecure=invite\n"+get_allow();
                        
                        $('#RegistrationString').val('register =>'+$('#Account-Username').val()+':'+$('#Account-Password').val()+'@'+$('#Account-HostName').val()+':'+$('#Account-Port').val());
               }
            $('#account_entry').val(AccountEntry);   
            }
        });
        
        
        /*Account Password*/
        $('#Account-Password').keyup(function(){
            var value = $(this).val();
            if(value){
               var AuthenticationType = $('#AuthenticationType').val();
               if(AuthenticationType == 'IP-Authentication'){
                   var CarrierName = $('#CarrierName').val(); 
                    var AccountEntry = "["+CarrierName+"]\n"+
                                "disallow=all\n"+
                                "type=friend\n"+
                                "nat=yes\n"+
                                "qualify=yes\n"+
                                "canreinvite=no\n"+
                                "dtmfcode=rfc2833\n"+
                                "host="+$('#Account-HostName').val()+"\n"+
                                "username="+$('#Account-Username').val()+"\n"+
                                "accountcode="+$('#Account-Username').val()+"\n"+
                                "secret="+value+"\n"+
                                "port="+$('#Account-Port').val()+"\n"+
                                "insecure=invite\n"+get_allow();
               }
            $('#account_entry').val(AccountEntry);   
            $('#RegistrationString').val('register =>'+$('#Account-Username').val()+':'+$('#Account-Password').val()+'@'+$('#Account-HostName').val()+':'+$('#Account-Port').val());
            }
        });
        
         /*Account Port*/
        $('#Account-Port').keyup(function(){
            var value = $(this).val();
            if(value){
               var AuthenticationType = $('#AuthenticationType').val();
               if(AuthenticationType == 'IP-Authentication'){
                   var CarrierName = $('#CarrierName').val(); 
                    var AccountEntry = "["+CarrierName+"]\n"+
                                "disallow=all\n"+
                                "type=friend\n"+
                                "nat=yes\n"+
                                "qualify=yes\n"+
                                "canreinvite=no\n"+
                                "dtmfcode=rfc2833\n"+
                                "host="+$('#Account-HostName').val()+"\n"+
                                "username="+$('#Account-Username').val()+"\n"+
                                "accountcode="+$('#Account-Username').val()+"\n"+
                                "secret="+$('#Account-Password').val()+"\n"+
                                "port="+value+"\n"+
                                "insecure=invite\n"+get_allow();
               }
            $('#account_entry').val(AccountEntry);
            $('#RegistrationString').val('register =>'+$('#Account-Username').val()+':'+$('#Account-Password').val()+'@'+$('#Account-HostName').val()+':'+$('#Account-Port').val());
            }
        });
        
        /*Account Allow*/
        $('.allow_checkbox').click(function(){
            var stringBox = '';
            $(".allow_checkbox:checked").each(function(){
                stringBox = stringBox+"allow="+$(this).val()+"\n";
            }); 
            var AuthenticationType = $('#AuthenticationType').val();
               if(AuthenticationType == 'IP-Authentication'){
                   var CarrierName = $('#CarrierName').val(); 
                    var AccountEntry = "["+CarrierName+"]\n"+
                                "disallow=all\n"+
                                "type=friend\n"+
                                "nat=yes\n"+
                                "qualify=yes\n"+
                                "canreinvite=no\n"+
                                "dtmfcode=rfc2833\n"+
                                "host="+$('#Account-HostName').val()+"\n"+
                                "username="+$('#Account-Username').val()+"\n"+
                                "accountcode="+$('#Account-Username').val()+"\n"+
                                "secret="+$('#Account-Password').val()+"\n"+
                                "port="+$('#Account-Port').val()+"\n"+
                                "insecure=invite\n"+stringBox;
               }else{
                    var CarrierName = $('#CarrierName').val(); 
                    var AccountEntry = "["+CarrierName+"]\n"+
                                "disallow=all\n"+
                                "type=friend\n"+
                                "nat=yes\n"+
                                "qualify=yes\n"+
                                "canreinvite=no\n"+
                                "dtmfcode=rfc2833\n"+
                                "host="+$('#Account-HostName').val()+"\n"+
                                "insecure=invite\n"+stringBox;
               }
            $('#account_entry').val(AccountEntry);   
        });
        
//        $('.DefaultClick').click();
    });
    
    
    
    
    var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
    headerTag: "h6"
    , bodyTag: "section"
    , transitionEffect: "none"
    , titleTemplate: '<span class="step">#index#</span> #title#'
    , labels: {
        finish: "Submit"
    }
    , onStepChanging: function (event, currentIndex, newIndex) {
        return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
    }
    , onFinishing: function (event, currentIndex) {
        return form.validate().settings.ignore = ":disabled", form.valid()
    }
    , onFinished: function (event, currentIndex) {
         $.ajax({
                type: "POST",
                url: $('#CarrierRule').attr('action'),
                data: $('#CarrierRule').serialize(), // serializes the form's elements.
                success: function(data) {
                  var result = JSON.parse(data);
                  if (result.success === 1) {
                    $.toast({
                      heading: 'Welcome To UTG Dialer',
                      text: result.message,
                      position: 'top-right',
                      loaderBg: '#ff6849',
                      icon: 'info',
                      hideAfter: 3500,
                      showHideTransition: 'plain',
                    });
                    setTimeout(function(){
                      window.location.href = '<?php echo base_url('carrier')?>';
                    }, 2500);
                  } else {
                    $.toast({
                      heading: 'Fix this error!',
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
  
//         swal("Your Form Submitted!", "Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor.");
    }
}), $(".validation-wizard").validate({
    ignore: "input[type=hidden]"
    , errorClass: "text-danger"
    , successClass: "text-success"
    , highlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , errorPlacement: function (error, element) {
        error.insertAfter(element)
    }
    , rules: {
        email: {
            email: !0
        }
    }
})


$('#CarrierName').keyup(function(){
    var CarrierID = $(this).val(); 
    var dialplan_entry2 = $('#dialplan_entry2').val();
    var Newdialplan_entry2 = dialplan_entry2.replace("LevelID", CarrierID);
    $('#dialplan_entry1').val(Newdialplan_entry2);
});

$('#int123').keyup(function(e) {
  var data_plan = $(this).val();
  var CarrierID = $('#CarrierName').val();
  var entry = "exten => _"+data_plan+".,1,AGI(agi://127.0.0.1:4577/call_log)";
  entry += "\nexten => _"+data_plan+".,n,Dial(sip/${EXTEN:3}@LevelID,55,tTor)";
  entry += "\nexten => _"+data_plan+".,n,Hangup";
  if (CarrierID != null && CarrierID != '') {  
    var entry = entry.replace("LevelID", CarrierID);  
  }
  $('#dialplan_entry1').val(entry);
});

</script>
<?php } ?>
