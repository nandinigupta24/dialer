<?php if(!checkRole('admin_settings', 'edit')){ no_permission(); } else {
 $server=$database->select('servers',['server_id','server_ip']);
 $usergroup=$database->select('vicidial_user_groups',['user_group','group_name']);
 $carrier_id = $_GET['carrier_id'];

// $data = $database->query("select * from vicidial_server_carriers where carrier_id = '$carrier_id'")->fetch(PDO::FETCH_ASSOC);
 $data = $database->get('vicidial_server_carriers','*',['carrier_id'=>$carrier_id]);
 
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

        <div class="panel">
        <div class="panel-heading">
          <span class="panel-title"><i class="fa fa-plus"></i> Edit carrier</span>
        </div>
        <!-- /.box-header -->
        <!-- /.box-header -->
        <div class="panel-body wizard-content">
            <form action="<?php echo base_url('carrier/ajax')?>?action=Update_Carrier" id="CarrierRule" class="validation-wizard wizard-circle">
				<!-- Step 1 -->
				<h6>Carrier Information</h6>
				<section>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="firstName5">Carrier ID :</label>
                                                                <input type="text" class="form-control" name="carrier_id" placeholder="Enter Carrier ID" value="<?php echo $data['carrier_id'];?>" id="CarrierID" required/> 
                                                        </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="lastName1">Carrier Name :</label>
                                                                <input type="text" class="form-control" name="carrier_name" placeholder="Enter Carrier Name" value="<?php echo $data['carrier_name'];?>" id="CarrierName" required/> 
                                                        </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="firstName5">Carrier Description :</label>
                                                                <textarea class="form-control" name="carrier_description" rows="5" placeholder="Enter Carrier Description" required><?php echo $data['carrier_description'];?></textarea> 
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
                                                <button type="button" class="btn btn-info IP-Authentication IP-Authentication-BTN" data-text="IP-Authentication">IP Authentication</button>
                                                <button type="button" class="btn btn-info IP-Authentication NON-IP-Authentication-BTN"  data-text="NON-IP-Authentication">Non IP Authentication</button>
                                            </div>
                                            <input type="hidden" name="" value="" id="AuthenticationType"/>
                                        </div>
                                    </div>
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="username123">HostName :</label>
                                                                <input type="text" class="form-control" value="<?php echo $a_e['host'];?>" id="Account-HostName" required="" name=""/>
							</div>
                                                    <div class="form-group IP-Authentication-Method">
								<label for="username123">Username :</label>
                                                                <input type="text" class="form-control" id="Account-Username" name="" value="<?php echo $a_e['username'];?>"/>
							</div>
							<div class="form-group IP-Authentication-Method">
								<label for="username123">Password :</label>
                                                                <input type="text" class="form-control" id="Account-Password" name="" value="<?php echo $a_e['secret'];?>"/>
							</div>
							<div class="form-group IP-Authentication-Method">
								<label for="username123">Port :</label>
                                                                <input type="text" class="form-control" id="Account-Port" name="" value="<?php echo $a_e['port'];?>"/>
							</div>
							<div class="form-group">
								<label for="username123">Allow :</label>
                                                                <label for="alaw"><input type="checkbox" name="alaw" value="alaw" class="allow_checkbox" <?php echo (trim($a_e['allow_alaw']) == 'alaw') ? 'checked="checked"' : '';?>> alaw </label>
                                                                <label for="g729"><input type="checkbox" name="g729" value="g729" class="allow_checkbox" <?php echo (trim($a_e['allow_g729']) == 'g729') ? 'checked="checked"' : '';?>> g729 </label>
                                                                <label for="ulaw"><input type="checkbox" name="ulaw" value="ulaw" class="allow_checkbox" <?php echo (trim($a_e['allow_ulaw']) == 'ulaw') ? 'checked="checked"' : '';?>> ulaw </label>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="password123">Account Entry</label>
                                                                <textarea class="form-control" name="account_entry" required="" rows="15" id="account_entry"><?php echo $data['account_entry'];?></textarea>
							</div>
							<div class="form-group IP-Authentication-Method">
								<label for="password123">Registration Entry</label>
                                                                <input type="text" name="registration_string" value="<?php echo $data['registration_string'];?>" id="RegistrationString" placeholder="" class="form-control"/>
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
								<label for="int123">Dial Prefix :</label>
                                                                <input type="text" class="form-control" id="" name="dial_prefix" value="<?php echo $data['dial_prefix'];?>"/>
							</div>
						</div>
						<div class="col-md-12">							
							<div class="form-group">
								<label for="addressline12">Dialplan Entry</label>
                                                                <textarea name="dialplan_entry" class="form-control" rows="5" ><?php echo $data['dialplan_entry'];?></textarea>
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
								<select class="form-control" id="" name="protocol" >
                                                                        <option value="SIP" <?php echo ($data['protocol'] == 'SIP') ? 'SELECTED="SELECTED"' : "";?>>SIP</option>
                                                                        <option value="Zap" <?php echo ($data['protocol'] == 'ZAP') ? 'SELECTED="SELECTED"' : "";?>>Zap</option>
                                                                        <option value="IAX2" <?php echo ($data['protocol'] == 'IAX2') ? 'SELECTED="SELECTED"' : "";?>>IAX2</option>
                                                                        <option value="EXTERNAL" <?php echo ($data['protocol'] == 'EXTERNAL') ? 'SELECTED="SELECTED"' : "";?>>EXTERNAL</option>
                                                                      </select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="decisions1">Server IP</label>
								<select class="form-control" name="server_ip" required="">
                                                                            <?php foreach($server as $val){?>
                                                                            <option value="<?php echo $val['server_ip']; ?>" <?php echo ($data['server_ip'] == $val['server_ip']) ? 'selected="selected"' : '';?>><?php echo $val['server_ip']; ?></option>
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
								<select class="form-control" name="user_group" id="" required>
                                                                    <option value="---ALL---">---ALL---</option>
                                                                    <?php foreach($usergroup as $val){?>
                                                                    <option value="<?php echo $val['user_group']; ?>" <?php echo ($data['user_group'] == $val['user_group']) ? 'selected="selected"' : '';?>><?php echo $val['group_name']; ?></option>
                                                                    <?php } ?>
                                                                  </select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="decisions1">Status</label>
								<select class="form-control" name="active">
                                                                    <option value="N" <?php echo ($data['active'] == 'N') ? 'SELECTED="SELECTED"' : "";?>>N</option>
                                                                    <option value="Y" <?php echo ($data['active'] == 'Y') ? 'SELECTED="SELECTED"' : "";?>>Y</option>
                                                                </select>
							</div>
						</div>
					</div>
				</section>
			</form>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
    <!-- /.content -->
</div>

<script>
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
<script src="https://stg-dial.utgone.com/assets/vendor_components/jquery-steps-master/build/jquery.steps.js"></script>
<script src="https://stg-dial.utgone.com/assets/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
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
                                "fromuser="+$('#Account-Username').val()+"\n"+
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
                                "fromuser="+$('#Account-Username').val()+"\n"+
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
                                "fromuser="+value+"\n"+
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
                                "fromuser="+$('#Account-Username').val()+"\n"+
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
                                "fromuser="+$('#Account-Username').val()+"\n"+
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
                                "fromuser="+$('#Account-Username').val()+"\n"+
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


</script>

<?php if(!empty($data['registration_string'])){?>
<script>
    $(document).ready(function(){
        $('.IP-Authentication-BTN').click();
    });
</script>
<?php }else{?>
<script>
    $(document).ready(function(){
       $('.NON-IP-Authentication-BTN').click(); 
    });
</script>
<?php }?>

<?php } ?>
