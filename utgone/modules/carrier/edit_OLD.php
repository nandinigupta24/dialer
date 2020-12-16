<?php if(!checkRole('admin_settings', 'edit')){ no_permission(); } else {
 $server=$database->select('servers',['server_id','server_ip']);
 $usergroup=$database->select('vicidial_user_groups',['user_group','group_name']);
 $carrier_id = $_GET['carrier_id'];

 $data = $database->query("select * from vicidial_server_carriers where carrier_id = '$carrier_id'")->fetch(PDO::FETCH_ASSOC);

 if(count($data)==0) {
   echo '<script>window.location.href="'.base_url('carrier/create').'";</script>'; die;
 }
 $copied = false;
 if(isset($_GET['action']) && $_GET['action']=='copy') {
   $copied = true;
   $data['carrier_id'] = '';
 }
 
 ;
 $dialplan_entry = explode('exten => ',preg_replace( "/\r|\n/", "", $data['dialplan_entry'] )); 
 unset($dialplan_entry[0]);
 sort($dialplan_entry);
 $account_entry =  preg_split('/\n/i', $data['account_entry']);
unset($account_entry[0]);
$a_e = [];
foreach($account_entry as $v){
  $v = explode('=', $v);
  if($v[0]=='allow') { 
//      $v[0] .= '_'.$v[1];
      $a_e['allow_'.trim($v[1])] = $v[1];
  }else{
  $a_e[$v[0]] = $v[1];
  }
}
?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content" id="app">

        <div class="row">
            <div class="col-12 col-lg-6 col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title"><i class="fa fa-plus"></i> Edit carrier</span>
                    </div>
                    <div class="panel-body pn">
                       
                        <!-- Tab panes -->
                        <?php if($copied): ?>
                          <form class="" method="post" action="<?php echo base_url('carrier/ajax')?>?action=Insert" id="SmtpRule" >
                        <?php else: ?>
                          <form class="" method="post" action="<?php echo base_url('carrier/ajax')?>?action=updateentry&copy=<?php echo $copied;?>" id="SmtpRule" >
                        <?php endif;?>
                          <div class="modal-body">
                            <div class="form-group row">
                              <label for="host" class="col-sm-2 col-form-label">Carrier ID</label>
                              <div class="col-sm-10">
                                <input class="form-control" type="<?php $copied ? 'text':'hidden'?>" placeholder="Max 10 Characters" id="carrier_id" name="carrier_id" required="true" v-model="carrier_id">
                                <?php echo $copied ? '': $carrier_id;?>
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
                                <button type="button" class="btn btn-sm btn-toggle <?php echo (!empty($data['active']) && $data['active'] == 'Y') ? 'active' : '';?>"  data-toggle="button" aria-pressed="false" autocomplete="off" data-id="active" data-field="active" value="<?php echo $data['active'];?>" v-on:click="active=='N'?active='Y':active='N'">
                                  <div class="handle"></div>
                                </button>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer" style="margin-left: 320px;">
                            <a href="<?php echo base_url('carrier')?>" class="btn btn-default waves-effect text-left">Cancel</a>
                            <button type="submit" class="btn btn-success waves-effect text-right">Save</button>
                          </div>

                          <input class="form-control d-none" type="text" placeholder="Max 30 Characters" id="registration_string" name="registration_string" v-model="registration_string">
                          <input class="form-control d-none" type="text" placeholder="Max 30 Characters" id="globals_string" name="globals_string" v-model="globals_string">
                          <textarea class="form-control d-none" type="text" row="7" cols="50" placeholder="Max 250 Characters" id="account_entry" name="account_entry"  v-model="account_entry"></textarea>
                          <textarea class="form-control d-none" type="text" row="7" cols="50" placeholder="Max 250 Characters" id="dialplan_entry" name="dialplan_entry"  v-model="dialplan_entry"></textarea>
                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-12 col-lg-6 col-md-6">
              <div class="panel">
                  <div class="panel-heading">
                      <span class="panel-title"><i class="fa fa-eye"></i> Preview</span>
                  </div>
                  <div class="panel-body pn">
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
        <!-- Default box -->
</div>
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
    carrier_id: '<?php echo $data['carrier_id'];?>',
    carrier_name: '<?php echo $data['carrier_name'];?>',
    carrier_description: '<?php echo $data['carrier_description'];?>',
    user_group: '<?php echo $data['user_group'];?>',
    username: '<?php echo isset($a_e['username'])?trim($a_e['username']):''?>',
    password: '<?php echo isset($a_e['secret'])?trim($a_e['secret']):''?>',
    host: '<?php echo isset($a_e['host'])?trim($a_e['host']):''?>',
    port: '<?php echo isset($a_e['port'])?trim($a_e['port']):''?>',
    template_id: '<?php echo $data['template_id'];?>',
    alaw: '<?php echo isset($a_e['allow_alaw']) ? trim($a_e['allow_alaw']): ''; ?>',
    ulaw: '<?php echo isset($a_e['allow_ulaw']) ?  trim($a_e['allow_ulaw']): ''; ?>',
    g729: '<?php echo isset($a_e['allow_g729']) ?  trim($a_e['allow_g729']): ''; ?>',
    protocol: '<?php echo $data['protocol'];?>',
    server_ip: '<?php echo $data['server_ip']?>',
    active:'<?php echo $data['active'];?>',
    dialplanEntry : <?php echo json_encode($dialplan_entry);?>
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
          a_e += "\nusername="+this.username+"\nfromuser="+this.username;
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
//        alert(data);
//        console.log(data);
//        exit;
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


});</script>
<?php } ?>
