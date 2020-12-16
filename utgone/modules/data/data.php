<?php if(!checkRole('data', 'view')){ no_permission(); } else {?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--    <section class="content-header">
        <h1>
            Campaign

        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Campaign</a></li>
            <li class="breadcrumb-item active">Listings</li>
        </ol>
    </section>-->

    <!-- Main content -->
    <section class="content">
        <?php if(empty($_GET['step'])){?>
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-magic"></span>Data Wizard</div>
                            <ul class="nav panel-tabs">
                                <li><a href="" class="" title="Refresh Page"><i class="fa fa-refresh"></i></a></li>

                            </ul>
                        </div>
                        </p>

                    </div>
                    <div class="box-body" style="padding-top:0px;">
                        <div class="row">
                            <div class="col-md-4" style="background-color:#f4f6f9; padding:20px 20px">
                                <h4>Data Loading Wizard</h4>
                                <ul class="nav1">
                                    <li><i class="fa fa-file text-success"></i> Select File</li>
                                    <li><i class="fa fa-bars"></i> Select Data List</li>
                                    <li><i class="fa fa-columns"></i> Match Columns</li>
                                    <li><i class="fa fa-bar-chart"></i> Reporting</li>
                                    <li><i class="fa fa-flag"></i> Finish</li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <form method="post" action="" enctype="multipart/form-data" class="pn">

                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-8">
                                            <?php
                                                    if(isset($_FILES['file'])){
                                                          $file_name = $_FILES['file']['name'];
                                                            $file_size = $_FILES['file']['size'];
                                                            $file_tmp = $_FILES['file']['tmp_name'];
                                                            $file_type = $_FILES['file']['type'];
                                                            $file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));

                                                            $extensions = array("jpeg", "jpg", "mp3",'xlsx','csv');

                                                            if (in_array($file_ext, $extensions) === false) {
                                                                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                                                            }

                                                            if ($file_size > 10097152) {
                                                                $errors[] = 'File size must be excately 2 MB';
                                                            }

                                                            if (empty($errors) == true) {
                                                                $FilePath = $_SERVER['DOCUMENT_ROOT']."/uploads/".$file_name;
                                                                move_uploaded_file($file_tmp,$FilePath);
                                                                $_SESSION['FileNameLoad'] = $FilePath;
                                                                echo ' <meta http-equiv="refresh" content="0;url='.base_url('data/data').'?step=2">';
                                                                exit;
                                                            } else {

                                                            }
                                                       }
                                                ?>
                                            <div class="form-group phone_number HideShow">
                                                <label for="CampaignName">Select a file Input:</label>
                                                <input type="file" name="file" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success" type="submit"><i class="fa fa-upload"></i> Upload</button>
                                                <!--<a href="">sample</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
        <?php }?>
        <?php if(!empty($_GET['step']) && $_GET['step'] == 2){?>
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-magic"></span>Data Wizard</div>
                            <ul class="nav panel-tabs">
                                <li><a href="" class="" title="Refresh Page"><i class="fa fa-refresh"></i></a></li>

                            </ul>
                        </div>
                        </p>

                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4" style="background-color:#f4f6f9;">
                                <h4>Data Loading Wizard</h4>
                                <ul class="" style="list-style:none;">
                                    <li><i class="fa fa-file"></i> Select File</li>
                                    <li><i class="fa fa-bars text-primary"></i> Select Data List</li>
                                    <li><i class="fa fa-columns"></i> Match Columns</li>
                                    <li><i class="fa fa-bar-chart"></i> Reporting</li>
                                    <li><i class="fa fa-flag"></i> Finish</li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <?php
                                if(!empty($_SESSION['CurrentLogin']['Campaign']) && count($_SESSION['CurrentLogin']['Campaign']) > 0){
                                    $ListListings = $database->select('vicidial_lists', ['list_id', 'list_name'],['AND'=>['campaign_id'=>$_SESSION['CurrentLogin']['CampaignID']],'ORDER'=>['list_id'=>'ASC']]);
                                    $CampaignListings = $database->select('vicidial_campaigns',['campaign_id','campaign_name'],['AND'=>['campaign_id'=>$_SESSION['CurrentLogin']['CampaignID']],'ORDER'=>['campaign_id'=>'ASC']]);
//                                    $ListListings = $database->select('vicidial_lists', ['list_id', 'list_name'],['AND'=>['campaign_id'=>$_SESSION['CurrentLogin']['Campaign']],'ORDER'=>['list_id'=>'ASC']]);
//                                    $CampaignListings = $database->select('vicidial_campaigns',['campaign_id','campaign_name'],['AND'=>['campaign_id'=>$_SESSION['CurrentLogin']['Campaign']],'ORDER'=>['campaign_id'=>'ASC']]);
                                }else{
                                    $ListListings = $database->select('vicidial_lists', ['list_id', 'list_name']);
                                    $CampaignListings = $database->select('vicidial_campaigns',['campaign_id','campaign_name']);
                                }
                                
                                $TemplateListings = $database->select('vicidial_custom_leadloader_templates','*',['list_id'=>array_column($ListListings,'list_id'),'ORDER'=>['template_name'=>'ASC']]);

                                if(!empty($_POST['step'])){
                                    $_SESSION['LISTID'] = $_POST['list_id'];
                                    $_SESSION['Step2'] = $_POST;
                                    echo ' <meta http-equiv="refresh" content="0;url='.base_url('data/data').'?step=3">';
                                    exit;
                                }
                                ?>
                                <form method="post" action="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="CampaignName" class="col-md-6 col-form-label">Select a List Data Load into:</label>
                                        <select class="form-control col-md-5 select2 ListIDLoad" name="list_id" required="">
                                            <option value="">Select List</option>
                                            <?php foreach($ListListings as $val){?>
                                            <option value="<?php echo $val['list_id'];?>"><?php echo $val['list_id'].' - '.$val['list_name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="CampaignName" class="col-md-6 col-form-label">Select a template:</label>
                                        <select class="form-control col-md-5 select2 TemplateIDLoad" name="template_id">
                                            <option value="">Select Template</option>
                                            <?php foreach($TemplateListings as $val){?>
                                            <option value="<?php echo $val['template_id'];?>" data-templateListID="<?php echo $val['list_id'];?>"><?php echo $val['template_name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="CampaignName" class="col-md-6 col-form-label">Duplicate Check List:</label>
                                        <button type="button" class="btn btn-toggle SwitchDuplicateBTN" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="DuplicateCheckList">
						<div class="handle"></div>
					</button>
                                        <input type="hidden" name="duplicate_check_list" value="no"/>
                                    </div>
                                    <div class="form-group row DuplicateCheckList" style="display:none;">
                                        <label for="CampaignName" class="col-md-6 col-form-label">Select List</label>
                                        <select class="form-control col-md-5 select2" name="duplicate_check_list_id[]" multiple="" style="width:40%;" data-placeholder="Select List">
                                            <?php foreach($ListListings as $val){?>
                                            <option value="<?php echo $val['list_id'];?>"><?php echo $val['list_id'].' - '.$val['list_name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="CampaignName" class="col-md-6 col-form-label">Duplicate Check Campaign:</label>
                                        <button type="button" class="btn btn-toggle SwitchDuplicateBTN" data-toggle="button" aria-pressed="true" autocomplete="off" data-field="DuplicateCheckCampaign">
						<div class="handle"></div>
					</button>
                                        <input type="hidden" name="duplicate_check_campaign" value="no"/>
                                    </div>
                                    <div class="form-group row DuplicateCheckCampaign" style="display:none;">
                                        <label for="CampaignName" class="col-md-6 col-form-label">Select Campaign</label>
                                        <select class="form-control col-md-5 select2" name="duplicate_check_campaign_id[]" multiple="" style="width:40%;" data-placeholder="Select Campaign">
                                            <?php foreach($CampaignListings as $val){?>
                                            <option value="<?php echo $val['campaign_id'];?>"><?php echo $val['campaign_id'].' - '.$val['campaign_name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="CampaignName" class="col-md-6 col-form-label">Duplicate Check System:</label>
                                        <button type="button" class="btn btn-toggle SwitchDuplicateBTN" data-toggle="button" aria-pressed="true" autocomplete="off">
						<div class="handle"></div>
					</button>
                                        <input type="hidden" name="duplicate_check_system" value="no"/>
                                    </div>
                                    <div class="form-group row">
                                        <label for="CampaignName" class="col-md-6 col-form-label">Duplicate Archive Check:</label>
                                        <button type="button" class="btn btn-toggle SwitchDuplicateBTN" data-toggle="button" aria-pressed="true" autocomplete="off">
						<div class="handle"></div>
					</button>
                                        <input type="hidden" name="duplicate_archive_check" value="no"/>
                                    </div>
                                    <div class="form-group row">
                                        <label for="CampaignName" class="col-md-6 col-form-label">TPS Check (This features only works if you have provide)</label>
                                        <button type="button" class="btn btn-toggle SwitchDuplicateBTN" data-toggle="button" aria-pressed="true" autocomplete="off">
						<div class="handle"></div>
					</button>
                                        <input type="hidden" name="TPS_check" value="no"/>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit" name="step" value="2"><i class="fa fa-arrow-right"></i> Next</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                            </div>
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
        <?php }?>
         <?php if(!empty($_GET['step']) && $_GET['step'] == 3){?>
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-plus"></span>Data Wizard</div>
                            <ul class="nav panel-tabs">
                                <li><a href="" class="" title="Refresh Page"><i class="fa fa-refresh"></i></a></li>

                            </ul>
                        </div>
                        </p>

                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4" style="background-color:#f4f6f9;">
                                <h4>Data Loading Wizard</h4>
                                <ul class="" style="list-style:none;">
                                    <li><i class="fa fa-file"></i> Select File</li>
                                    <li><i class="fa fa-bars"></i> Select Data List</li>
                                    <li><i class="fa fa-columns text-primary"></i> Match Columns</li>
                                    <li><i class="fa fa-bar-chart"></i> Reporting</li>
                                    <li><i class="fa fa-flag"></i> Finish</li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <?php

                                $VicidialListTable = $database->query('DESCRIBE vicidial_list')->fetchAll();
                                $MissingColumn = ['lead_id','entry_date','modify_date','status','user','list_id','entry_list_id','best_time_to_call','email_count','sms_count','last_local_call_time','called_count','called_since_last_reset'];
                                $FilePath = $_SESSION['FileNameLoad'];
                                $Step2 = $_SESSION['Step2'];
                                $ListID = $Step2['list_id'];

                                $CustomData = $database->get('custom_fields','*',['list_id'=>$ListID]);
                                $CustomData = is_array($CustomData) ? array_filter($CustomData) : [];
                                unset($CustomData['list_id']);
                                $file = fopen($FilePath, "r");
                                
                                $csv = array_map("str_getcsv", file($FilePath,FILE_SKIP_EMPTY_LINES));
                                
                                $Columns = array_shift($csv);
                                
                                if(!empty($_POST['step3'])){  
                                    if(!empty($_SESSION['Step2']['template_id'])){
                                        $TemplateID = $_SESSION['Step2']['template_id'];
                                        $TemplateData = $database->get('vicidial_custom_leadloader_templates','*',['template_id'=>$TemplateID]);
                                        $TemplateArray = get_explode_template($TemplateData['standard_variables']);
                                    }else{
                                        $TemplateArray = $_POST;
                                    }
                                    
                                    $Custom =  $_POST['Custom'];
                                    unset($_POST['Custom']);
                                   $ResonseArray = [];
                                    $ResonseArray['Success'] = 0;
                                    $ResonseArray['Bad'] = 0;
                                    $ResonseArray['Total'] = 0;
                                    $ResonseArray['Duplicate'] = 0;
                                    $ListID = $Step2['list_id'];
                                    $DuplicateCheckList = $Step2['duplicate_check_list'];
                                    $DuplicateCheckCampaign = $Step2['duplicate_check_campaign'];
                                    $DuplicateCheckSystem = $Step2['duplicate_check_system'];
                                    $DuplicateArchiveCheck = $Step2['duplicate_archive_check'];
//pr($TemplateArray);
//        if($data->count()){

            foreach ($csv as $key => $value) {
                $ResonseArray['Total']++;


//                $responsePhone = get_phone_validation(@$value[@$TemplateArray['phone_number']]);
//                if($responsePhone == 'failed'){
//                    $ResonseArray['Bad']++;
//                    continue;
//                }

                /*Checking in vicidial List*/
                if($DuplicateCheckSystem == 'yes'){
                    $ExistCount = $database->count('vicidial_list',['phone_number'=>@$value[@$TemplateArray['phone_number']]]);
                    if($ExistCount > 0){
                        $ResonseArray['Duplicate']++;
                        continue;
                    }
                }else{
                    if(!empty($DuplicateCheckList) && $DuplicateCheckList == 'yes'){
                        $SearchListID = $Step2['duplicate_check_list_id'];
                        $ExistCount = $database->count('vicidial_list',['AND'=>['list_id'=>$SearchListID,'phone_number'=>@$value[@$TemplateArray['phone_number']]]]);
                        
                        if($ExistCount > 0){
                            $ResonseArray['Duplicate']++;
                            continue;
                        }
                    }

                    if(!empty($DuplicateCheckCampaign) && $DuplicateCheckCampaign == 'yes'){
//                        duplicate_check_campaign_id
                        $SearchListID = $database->select('vicidial_lists',['list_id'],['campign_id'=>$Step2['duplicate_check_campaign_id']]);
                        foreach($SearchListID as $k=>$v){
                            $SearchListID[$k] = $v['list_id'];
                        }
                        $ExistCount = $database->count('vicidial_list',['AND'=>['list_id'=>$SearchListID,'phone_number'=>@$value[@$TemplateArray['phone_number']]]]);
                        if($ExistCount > 0){
                            $ResonseArray['Duplicate']++;
                            continue;
                        }
                    }
                }
                /*vicidial List*/

                /*Checking in List Archive Table*/
                 if($DuplicateArchiveCheck == 'yes'){
                    if($DuplicateCheckSystem == 'yes'){
                    $ExistCount = $database->count('list_archive',['phone_number'=>@$value[@$TemplateArray['phone_number']]]);
                    if($ExistCount > 0){
                        $ResonseArray['Duplicate']++;
                        continue;
                    }
                    }else{
                        if(!empty($DuplicateCheckList) && $DuplicateCheckList == 'yes'){
                            $SearchListID = $Step2['duplicate_check_list_id'];
                            $ExistCount = $database->count('list_archive',['AND'=>['list_id'=>$SearchListID,'phone_number'=>@$value[@$TemplateArray['phone_number']]]]);
                            if($ExistCount > 0){
                                $ResonseArray['Duplicate']++;
                                continue;
                            }
                        }

                        if(!empty($DuplicateCheckCampaign) && $DuplicateCheckCampaign == 'yes'){
    //                        duplicate_check_campaign_id
                            $SearchListID = $database->select('vicidial_lists',['list_id'],['campign_id'=>$Step2['duplicate_check_campaign_id']]);
                            foreach($SearchListID as $k=>$v){
                                $SearchListID[$k] = $v['list_id'];
                            }
                            $ExistCount = $database->count('list_archive',['AND'=>['list_id'=>$SearchListID,'phone_number'=>@$value[@$TemplateArray['phone_number']]]]);
                            if($ExistCount > 0){
                                $ResonseArray['Duplicate']++;
                                continue;
                            }
                        }
                    }
                }
                /*END List Archive*/

//            $ExistCount = $database->count('vicidial_list',['AND'=>['list_id'=>$ListID,'phone_number'=>@$value[@$TemplateArray['phone_number']]]]);
//                    if($ExistCount > 0){
//                        $ResonseArray['Duplicate']++;
//                        continue;
//                    }
                    
                    if(empty($value[@$TemplateArray['phone_number']])){
                        $ResonseArray['Bad']++;
                        continue;
                    }

                $ResonseArray['Success']++;

                $arr = [
                        'vendor_lead_code' =>@$value[@$TemplateArray['vendor_lead_code']],
                        'source_id' => @$value[@$TemplateArray['source_id']],
                        'list_id' => $ListID,
                        'phone_code' => @$value[@$TemplateArray['phone_code']],
                        'phone_number' => @$value[@$TemplateArray['phone_number']],
                        'title' => @$value[@$TemplateArray['title']],
                        'first_name' => @$value[@$TemplateArray['first_name']],
                        'middle_initial' => @$value[@$TemplateArray['middle_initial']],
                        'last_name' => @$value[@$TemplateArray['last_name']],
                        'address1' => @$value[@$TemplateArray['address1']],
                        'address2' => @$value[@$TemplateArray['address2']],
                        'address3' => @$value[@$TemplateArray['address3']],
                        'city' => @$value[@$TemplateArray['city']],
                        'state' => @$value[@$TemplateArray['state']],
                        'province' => @$value[@$TemplateArray['province']],
                        'postal_code' => @$value[@$TemplateArray['postal_code']],
                        'country_code' => @$value[@$TemplateArray['country_code']],
                        'gender' => @$value[@$TemplateArray['gender']],
                        'date_of_birth' => @$value[@$TemplateArray['date_of_birth']],
                        'alt_phone' => @$value[@$TemplateArray['alt_phone']],
                        'email' => @$value[@$TemplateArray['email']],
                        'security_phrase' => @$value[@$TemplateArray['security_phrase']],
                        'owner' => @$value[@$TemplateArray['owner']],
                        'comments' => @$value[@$TemplateArray['comments']],
//                        'rank' => @$value[@$TemplateArray['rank']],
                        'entry_list_id' => $ListID,
                        'status' => 'NEW',
                        'entry_date' => date('Y-m-d H:i:s'),
                        ];

                $database->insert('vicidial_list',$arr);

                $LeadID = $database->id();
                if(!empty($Custom)){
                    $arrayCustomInsert = [];
                    $arrayCustomInsert['lead_id'] = $LeadID;
                    $arrayCustomInsert['list_id'] = $ListID;
                    foreach($Custom as $k=>$val){
                        $arrayCustomInsert[$k] = @$value[$val];
                    }
                    $database->insert('custom_fields_data',$arrayCustomInsert);
                }
            }

            $_SESSION['ResponseLoad'] = $ResonseArray;
             echo ' <meta http-equiv="refresh" content="0;url='.base_url('data/data').'?step=4">';
            exit;
//            $database->insert('vicidial_list',$arr);
//            }
                                }
                                
                                if(!empty($_SESSION['Step2']['template_id']) && $_SESSION['Step2']['template_id']){
                                    $TemplateID = $_SESSION['Step2']['template_id'];
                                    $TemplateDetail = $database->get('vicidial_custom_leadloader_templates','*',['template_id'=>$TemplateID]);
                                    $ExplodeTemplate = explode('|',$TemplateDetail['standard_variables']);
                                    $TempateArray = [];
                                    foreach($ExplodeTemplate as $TemplateExplodes){
                                        $ExplodeValue = explode(',',$TemplateExplodes);
                                        if(!empty($ExplodeValue[0]) && $ExplodeValue[0]){
                                            $TempateArray[trim($ExplodeValue[0])] = $ExplodeValue[1];
                                        }
                                    }
                                }
                             
                                ?>
                                <form method="post" action="" id="Step3Form">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-8">
                                                <?php foreach($VicidialListTable as $table){
                                                if(!in_array($table['Field'],$MissingColumn)){
                                                        ?>
                                                <div class="form-group">
                                                    <label for="CampaignName"><?php echo ucwords(str_replace('_',' ',$table['Field']));?>:</label>
                                                    <select class="form-control" name="<?php echo $table['Field'];?>">
                                                        <option value=""></option>
                                                        <?php foreach($Columns as $k=>$v){
                                                            $ColumnSheet = str_replace(' ','_',$v);
                                                            ?>
                                                        <?php if(!empty($TempateArray[$table['Field']]) && $TempateArray[$table['Field']] == $k ){?>
                                                            
                                                            <option value="<?php echo $k;?>" selected="selected"><?php echo $v;?></option>
                                                        <?php }else{?>
                                                            <option value="<?php echo $k;?>" ><?php echo $v;?></option>
                                                        <?php }?>
                                                           
                                                        
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <?php }
                                                }
                                                ?>
                                              
                                                <?php foreach($CustomData as $key=>$value){
                                                        ?>
                                                <div class="form-group">
                                                    <label for="CampaignName"><?php echo ucwords(str_replace('_',' ',$value));?>:</label>
                                                    <select class="form-control" name="Custom[<?php echo $key;?>]">
                                                        <option value=""></option>
                                                        <?php foreach($Columns as $k=>$v){?>
                                                         <?php if((count($TempateArray) > 0) && $TempateArray[$key] == $k ){?>
                                                                <option value="<?php echo $k;?>" selected="selected"><?php echo $v;?></option>
                                                         <?php }else{?>
                                                                <option value="<?php echo $k;?>"><?php echo $v;?></option>
                                                         <?php }?>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <?php
                                                }
                                                ?>

                                                <div class="form-group">
                                                    <button class="btn btn-success" type="submit" name="step3" value="ok">
                                                        <i class="fa fa-arrow-right"></i> Next
                                                    </button>
                                                    <button class="btn btn-save" type="button" data-toggle="modal" data-target="#TemplateModel">
                                                        Save Template
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                            </div>
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
         <?php }?>
         <?php if(!empty($_GET['step']) && $_GET['step'] == 4){?>
        <div class="row">
            <div class="col-md-12">
                <div class="box ">
                    <div class="box-header with-border custom-box-tab ">
                        <h3 class="box-title">
                            <a  href="#" class="box-icon"><i class="fa fa-plus"></i></a>Data Wizard</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4" style="background-color:#f4f6f9;">
                                <h4>Data Loading Wizard</h4>
                                <ul class="" style="list-style:none;">
                                    <li><i class="fa fa-file"></i> Select File</li>
                                    <li><i class="fa fa-bars"></i> Select Data List</li>
                                    <li><i class="fa fa-columns"></i> Match Columns</li>
                                    <li><i class="fa fa-bar-chart"></i> Reporting</li>
                                    <li class="active"><i class="fa fa-flag"></i> Finish</li>
                                </ul>
                            </div>
                            <div class="col-md-8">

                                <div class="row">
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <div class="box box-body bg-success">
                                            <h6 class="text-uppercase">Leads Loaded</h6>
                                            <div class="flexbox mt-2">
                                                <span class=" font-size-30"><?php echo $_SESSION['ResponseLoad']['Success'];?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <div class="box box-body bg-danger">
                                            <h6 class="text-uppercase">BAD Leads</h6>
                                            <div class="flexbox mt-2">
                                                <span class=" font-size-30"><?php echo $_SESSION['ResponseLoad']['Bad'];?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <div class="box box-body bg-warning">
                                            <h6 class="text-uppercase">Duplicate Leads</h6>
                                            <div class="flexbox mt-2">
                                                <span class=" font-size-30"><?php echo $_SESSION['ResponseLoad']['Duplicate'];?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <div class="box box-body bg-primary">
                                            <h6 class="text-uppercase">Total Leads</h6>
                                            <div class="flexbox mt-2">
                                                <span class=" font-size-30"><?php echo $_SESSION['ResponseLoad']['Total'];?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-md-3"></div>
                                    <div class=" col-md-6">
                                        <a class="btn btn-danger btn-block" href="javascript:void(0);">Finished</a>
                                    </div>
                                    <div class=" col-md-3"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
         <?php }?>
    </section>
</div>

<div class="modal fade" id="TemplateModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Template</h4>
            </div>
            <form class="" method="post" action="" id="TemplateUpdate">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Template Name:</label>
                        <input type="text" class="form-control" name="template_name" required="">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Template Description:</label>
                        <textarea class="form-control" name="template_description" required=""></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#TemplateUpdate').on('submit', function (e) {
             var filterdata = $('#Step3Form').serialize()+'&'+$(this).serialize();
//             console.log(filterdata);
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('data/ajax')?>?rule=TemplateSave',
                data: filterdata,
                success: function (data) {
                    var result = JSON.parse(data);
                    if(result.success === 1){
                        $.toast({
                         heading: 'Welcome To UTG Dialer',
                            text: result.message,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            showHideTransition: 'plain',
                        });
                        $('#TemplateModel').modal('hide');
                         $('#TemplateUpdate')[0].reset();
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
    });

   $(document).on('click','.SwitchDuplicateBTN',function(){
      var Field = $(this).data('field');
      if($(this).hasClass('active')){
          var value = 'yes';
          $('.'+Field).show();
      }else{
          var value = 'no';
          $('.'+Field).hide();
      }
      $(this).parent().find('input').val(value);
   })
   function filterSelectOptions(selectElement, attributeName, attributeValue) {
    if (selectElement.data("currentFilter") != attributeValue) {
        selectElement.data("currentFilter", attributeValue);
        var originalHTML = selectElement.data("originalHTML");
        if (originalHTML)
            selectElement.html(originalHTML)
        else {
            var clone = selectElement.clone();
            clone.children("option[selected]").removeAttr("selected");
            selectElement.data("originalHTML", clone.html());
        }
        if (attributeValue) {
            selectElement.children("option:not([" + attributeName + "='" + attributeValue + "'],:not([" + attributeName + "]))").remove();
        }
    }
}
   
   $(".ListIDLoad").change( function() {
    filterSelectOptions($(".TemplateIDLoad"), "data-templateListID", $(this).val());
    });
</script>
<?php } ?>
