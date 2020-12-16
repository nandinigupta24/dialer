<?php
$table = 'licensings';
$table2 = 'licensing_modules';
if (!empty($_GET['action']) && $_GET['action']) {
    if ($_GET['action'] == 'Insert') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $modules = $_POST['modules'];
        $status = $_POST['status'];
        
        $InsertArray = [];
        $InsertArray['title'] = $title;
        $InsertArray['description'] = $description;
        $InsertArray['modules'] = $modules;
        $InsertArray['status'] = $status;
        
        
        if(!empty($_POST['id'])){
            $dataSave = $DBUTG->update($table,$InsertArray,['id'=>$_POST['id']]);
        
            if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
                $resultResponse = response(1, 0, 'Successfully Updated!!', NULL);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        }else{
            $dataSave = $DBUTG->insert($table,$InsertArray);
        
            if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
                $resultResponse = response(1, 0, 'Successfully Created!!', NULL);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        }
        
    } elseif ($_GET['action'] == 'GetDetail') {
        $ID = $_POST[ID];
        $data = $DBUTG->get('licensings','*',['id'=>$ID]);
        $data['modules'] = unserialize($data['modules']);
        $resultResponse = response(1, 0, 'Successfully Updated!!', $data);
    } elseif ($_GET['action'] == 'UpdatePlan') {
        /* Status will be 3 Types
         * Status -> NEW -> it will be NEW 
         *  Status -> RUN -> it will be running
         *  Status -> END ->it will be end up
         */

        $UserGroup = $_POST['user_group'];
        $PricingPlanID = $_POST['pricing_plan_id'];
        $InsertArray = [];
        /* GET Pricing Plans */
        $PricingPlanDetails = $DBUTG->get('pricing_plans', '*', ['id' => $PricingPlanID]);

        $ExistPlans = $DBUTG->get('user_pricings', '*', ['AND' => ['status' => 'RUN', 'user_group' => $UserGroup]]);

        if (!empty($ExistPlans['start']) && $ExistPlans['start']) {
            $InsertArray['start'] = $ExistPlans['end'];
            $InsertArray['end'] = date('Y-m-d', strtotime("+" . $PricingPlanDetails['duration'] . " " . $PricingPlanDetails['type'] . "s", strtotime($ExistPlans['end'])));
            $InsertArray['status'] = 'NEW';
        } else {
            $InsertArray['start'] = date('Y-m-d');
            $InsertArray['end'] = date('Y-m-d', strtotime("+" . $PricingPlanDetails['duration'] . " " . $PricingPlanDetails['type'] . "s", strtotime("NOW")));
            $InsertArray['status'] = 'RUN';
        }


        $InsertArray['pricing_plan_id'] = $PricingPlanID;
        $InsertArray['user_group'] = $UserGroup;
        $InsertArray['amount'] = $PricingPlanDetails['price'];
        $dataSave = $DBUTG->insert('user_pricings', $InsertArray);
        
        if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
                $resultResponse = response(1, 0, 'Successfully Updated!!', NULL);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
            }
    }elseif ($_GET['action'] == 'ModuleInsert') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        
        $InsertArray = [];
        $InsertArray['module_title'] = $title;
        $InsertArray['module_description'] = $description;
        $InsertArray['status'] = $status;
        
        
        if(!empty($_POST['id'])){
            $dataSave = $DBUTG->update($table2,$InsertArray,['id'=>$_POST['id']]);
        
            if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
                $resultResponse = response(1, 0, 'Successfully Updated!!', NULL);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        }else{
            $dataSave = $DBUTG->insert($table2,$InsertArray);
        
            if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
                $resultResponse = response(1, 0, 'Successfully Created!!', NULL);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        }
                
    } else {
        
    }
}

echo json_encode($resultResponse);


