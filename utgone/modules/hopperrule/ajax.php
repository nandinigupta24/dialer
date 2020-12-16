<?php
// Create connection
$ListArray = [
["value"=>"lead_id","text"=>"lead id"],
["value"=>"entry_date","text"=>"entry date"],
["value"=>"modify_date","text"=>"modify date"],
["value"=>"status","text"=>"status"],
["value"=>"user","text"=>"user"],
["value"=>"vendor_lead_code","text"=>"vendor lead code"],
["value"=>"source_id","text"=>"source id"],
["value"=>"list_id","text"=>"list id"],
["value"=>"gmt_offset_now","text"=>"gmt offset now"],
["value"=>"called_since_last_reset","text"=>"called since last reset"],
["value"=>"phone_code","text"=>"phone code"],
["value"=>"phone_number","text"=>"phone number"],
["value"=>"title","text"=>"title"],
["value"=>"first_name","text"=>"first name"],
["value"=>"middle_initial","text"=>"middle initial"],
["value"=>"last_name","text"=>"last name"],
["value"=>"address1","text"=>"address1"],
["value"=>"address2","text"=>"address2"],
["value"=>"address3","text"=>"address3"],
["value"=>"city","text"=>"city"],
["value"=>"state","text"=>"state"],
["value"=>"province","text"=>"province"],
["value"=>"postal_code","text"=>"postal code"],
["value"=>"country_code","text"=>"country code"],
["value"=>"gender","text"=>"gender"],
["value"=>"date_of_birth","text"=>"date of birth"],
["value"=>"alt_phone","text"=>"alt phone"],
["value"=>"email","text"=>"email"],
["value"=>"security_phrase","text"=>"security phrase"],
["value"=>"comments","text"=>"comments"],
["value"=>"called_count","text"=>"called count"],
["value"=>"last_local_call_time","text"=>"last local call time"],
["value"=>"rank","text"=>"rank"],
["value"=>"owner","text"=>"owner"],
["value"=>"entry_list_id","text"=>"entry list id"],
["value"=>"best_time_to_call","text"=>"best time to call"],
["value"=>"sms_count","text"=>"sms count"]
    ];
$ListJSON = json_encode($ListArray);

$optArr['=']='is equal to';
$optArr['BETWEEN']='is between';
$optArr['<']='is less then';
$optArr['<=']='is less then or equal to';
$optArr['>']='is greater then';
$optArr['IN']='is in list';
$optArr['!=']='is not eual to';
$optArr['NOT BETWEEN']='is not between';
$optArr['NOT IN']='is not in list';
$optArr['NOT NULL']='is not null';

//$whrr['lead_id']='Data Pool Lead';
//$whrr['list_id']='Data Pool List';
//$whrr['status']='Data Pool Status';
//$whrr['called_count']='Data Pool Called Count';
//$whrr['gender']='Data Pool Gender';

$whrr["lead_id"] = "lead id";
$whrr["entry_date"] = "entry date";
$whrr["modify_date"] = "modify date";
$whrr["status"] = "status";
$whrr["user"] = "user";
$whrr["vendor_lead_code"] = "vendor lead code";
$whrr["source_id"] = "source id";
$whrr["list_id"] = "list id";
$whrr["gmt_offset_now"] = "gmt offset now";
$whrr["called_since_last_reset"] = "called since last reset";
$whrr["phone_code"] = "phone code";
$whrr["phone_number"] = "phone number";
$whrr["title"] = "title";
$whrr["first_name"] = "first name";
$whrr["middle_initial"] = "middle initial";
$whrr["last_name"] = "last name";
$whrr["address1"] = "address1";
$whrr["address2"] = "address2";
$whrr["address3"] = "address3";
$whrr["city"] = "city";
$whrr["state"] = "state";
$whrr["province"] = "province";
$whrr["postal_code"] = "postal code";
$whrr["country_code"] = "country code";
$whrr["gender"] = "gender";
$whrr["date_of_birth"] = "date of birth";
$whrr["alt_phone"] = "alt phone";
$whrr["email"] = "email";
$whrr["security_phrase"] = "security phrase";
$whrr["comments"] = "comments";
$whrr["called_count"] = "called count";
$whrr["last_local_call_time"] = "last local call time";
$whrr["rank"] = "rank";
$whrr["owner"] = "owner";
$whrr["entry_list_id"] = "entry list id";
$whrr["best_time_to_call"] = "best time to call";
$whrr["sms_count"] = "sms count";

//$sql = "SELECT * FROM `lists` WHERE `list_id`=".$_GET['listId'];
//       $Rowresult = $DBConn->query($sql);
//       $row = $Rowresult->fetch_assoc();
       $row = $DBSQLDialing->get('lists','*',['list_id'=>$_GET['listId']]);
       if (!empty($row)) { ?>
            <div class="row" >
               <!-- inner start-->
                <div class="col-md-12 panel-middle-datapool">
                   <?php $x=0;if($row['list_json']!=''){
                       $decodejson = json_decode($row['list_json']);

                       foreach($decodejson as $row ){
                           if(!empty($row->desc) && $row->desc == 'comment'){
                               $CommentClass = 'comment_line';
                            }else{
                               $CommentClass = '';
                            }

                           ?>

                    <ul class="list-inline list-datapool <?php echo $CommentClass;?>" id="ul-datapool<?=$x;?>" data-id="<?=$x;?>">
                            <?php if($x>0){ ?>
                               <li><span class="data-first" id="data-first-<?=$x;?>" data-key="<?=$x;?>" data-value="and" > and </span></li>
                            <?php } ?>
                            <li>
                                    <span class="editable editable-click datapool-where"
                                        data-type="select" data-value="<?=$row->column;?>"  data-title="" id="datapool-where-<?=$x;?>" data-name="datapool-where-<?=$x;?>"
                                        data-key="<?=$x;?>" data-url="" >
                                        <?=$whrr[$row->column];?></span>
                                </li>
                                <li>
                                        <span class="editable editable-click datapool-condition" data-value="<?=$row->operator;?>"
                                                    data-type="select" id="datapool-condition-<?=$x;?>" data-name="datapool-condition"
                                                    data-key="<?=$x;?>"  data-url="" data-title="">
                                                     <?=$optArr[$row->operator];?></span>
                                </li>
                                <li>

                                        <span class="editable editable-click datapool-value1"
                                                data-type="text" id="datapool-value1-<?=$x;?>" data-name="datapool-value1-<?=$x;?>"
                                                data-key="<?=$x;?>" data-url="" data-value="<?=$row->value1;?>" data-title="">
                                                <?=$row->value1;?></span>
                                </li>
                                <?php if($row->operator=='BETWEEN' || $row->operator=='NOT BETWEEN'){ ?>
                                    <li  class="li-value-2<?=$x;?>"><span class="data-second" data-key="<?=$x;?>" id="data-second-<?=$x;?>" data-value="AND" > and </span></li>
                                    <li class="li-value-2<?=$x;?>">

                                        <span class="editable editable-click datapool-value2"
                                                data-type="text" id="datapool-value2-<?=$x;?>" data-name="datapool-value2-<?=$x;?>"
                                                data-key="<?=$x;?>" data-url="" data-value="<?=$row->value2;?>" data-title="">
                                                <?=$row->value2;?></span>
                                      </li>
                                <?php }?>
                                      <li class="CommentPoolRule"><i class="fa fa-circle-o"></i></li>
                                      <li class="RemovePoolRule"><i class="fa fa-times"></i></li>
                            </ul>



                   <?php $x++;}?>
                    <script>
                    $.fn.editable.defaults.mode = 'inline';
                            $('.datapool-where').editable({
                              placeholder: 'Select DataPool1',
                              showbuttons: false,
                                   source: <?php echo $ListJSON;?>,
                                   success: function (response, newValue) {
                                    var k = $(this).editable().data('key');
                                    $(this).attr('data-value',newValue);
                                   }
                              });
                              $('.datapool-condition').editable({
                                   showbuttons: false,
                                   placeholder: 'Select Where',
                                        source: [
                                               {value:'=',text:'is equal to'},
                                               {value:'BETWEEN',text:'is between'},
                                               {value:'<',text:'is less then'},
                                               {value:'<=',text:'is less then or equal to'},
                                               {value:'>',text:'is greater then'},
                                               {value:'IN',text:'is in list'},
                                               {value:'!=',text:'is not eual to'},
                                               {value:'NOT BETWEEN',text:'is not between'},
                                               {value:'NOT IN',text:'is not in list'},
                                               {value:'NOT NULL',text:'is not null'},
                                           ],
                                          success: function (response, newValue) {
                                                var k = $(this).editable().data('key');

                                                $(this).attr('data-value',newValue);
                                                if(newValue=='BETWEEN'  || newValue=='NOT BETWEEN'){
                                                $('#ul-datapool'+k).append(
                                                   '<li  class="li-value-2'+k+'"><span class="data-second" data-key="'+k+'" id="data-second-'+k+'" data-value="AND" > and </span></li>'
                                                   +'<li class="li-value-2'+k+'">'

                                                         +'<span data-key="'+k+'" class="editable editable-click datapool-value2" '
                                                               +'data-type="text" id="datapool-value2-'+k+'" data-name="datapool-value2-'+k+'" '
                                                               +'data-key="'+k+'" data-url="" data-value="" data-title="">'
                                                               +'value</span>'
                                                   +'</li>');
                                                   $('.datapool-value2').editable({
                                                      showbuttons: false,
                                                      success: function (response, newValue) {
                                                         var k = $(this).editable().data('key');
                                                          $(this).attr('data-value',newValue);
                                                      }
                                                });
                                                }else{
                                                   $('.li-value-2'+k).remove();
                                                }
                                        }
                             });
                           $('.datapool-value1').editable({
                               showbuttons: false,
                               success: function (response, newValue) {
                                 var k = $(this).editable().data('key');
                                 $(this).attr('data-value',newValue);
                                 }
                           });
                           $('.datapool-value1').on('shown', function(e, editable) {
                                 //console.log("out-editable",editable);
                                 $(document).on('change', editable, function() {
                                    //console.log("in-editable",editable);
                                    var new_value = editable.input.$input[0].value;
                                    //console.log("element", editable.$element[0].attributes[2].value);
                                    var span = editable.$element[0].attributes[2].value;
                                    $('#'+span).text(new_value);
                                    $('#'+span).attr('data-value',new_value);
                                 });
                              });
                           $('.datapool-value2').editable({
                                       showbuttons: false,
                                       success: function (response, newValue) {
                                          var k = $(this).editable().data('key');
                                             $(this).attr('data-value',newValue);
                                       }
                                 });
                                 $('.datapool-value2').on('shown', function(e, editable) {
                                    //console.log("out-editable",editable);
                                    $(document).on('change', editable, function() {
                                       //console.log("in-editable",editable);
                                       var new_value = editable.input.$input[0].value;
                                       //console.log("element", editable.$element[0].attributes[2].value);
                                       var span = editable.$element[0].attributes[2].value;
                                       $('#'+span).text(new_value);
                                       $('#'+span).attr('data-value',new_value);
                                    });
                                 });
                    </script>
                   <?php } ?>
                </div>
              <!-- inner end-->
            </div>
            <input type="hidden" name="MiddleListId" id="MiddleListId" value="<?=$_GET['listId']?>"/>
            <ul class="list-inline" style="margin-top: 25px;">
                <li>[<a href="#" id="AddnewRule">Add new condition</a>]</li>
            </ul>
       <?php } ?>
