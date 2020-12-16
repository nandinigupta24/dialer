<?php

if (!empty($_GET['action']) && $_GET['action']) {
    if ($_GET['action'] == 'Insert') {
        $title = $_POST['title'];
        $duration = $_POST['duration'];
        $type = $_POST['type'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        $agent = $_POST['agent'];
        
        $InsertArray = [];
        $InsertArray['title'] = $title;
        $InsertArray['duration'] = $duration;
        $InsertArray['type'] = $type;
        $InsertArray['price'] = $price;
        $InsertArray['status'] = $status;
        $InsertArray['agent'] = $agent;
        
        
        if(!empty($_POST['id'])){
            $dataSave = $DBUTG->update('pricing_plans',$InsertArray,['id'=>$_POST['id']]);
        
            if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
                $resultResponse = response(1, 0, 'Successfully Updated!!', NULL);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        }else{
            $dataSave = $DBUTG->insert('pricing_plans',$InsertArray);
        
            if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
                $resultResponse = response(1, 0, 'Successfully Created!!', NULL);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
            }
        }
        
    } elseif ($_GET['action'] == 'Update') {
        
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

//        $ExistPlans = $DBUTG->get('user_pricings', '*', ['AND' => ['status' => 'RUN', 'user_group' => $UserGroup]]);
        $ExistPlans = $DBUTG->update('user_pricings', ['status'=>'END'], ['AND' => ['status' => 'RUN', 'user_group' => $UserGroup]]);
        
//        if (!empty($ExistPlans['start']) && $ExistPlans['start']) {
//            $InsertArray['start'] = $ExistPlans['end'];
//            $InsertArray['end'] = date('Y-m-d', strtotime("+" . $PricingPlanDetails['duration'] . " " . $PricingPlanDetails['type'] . "s", strtotime($ExistPlans['end'])));
//            $InsertArray['status'] = 'NEW';
//        } else {
//            $InsertArray['start'] = date('Y-m-d');
//            $InsertArray['end'] = date('Y-m-d', strtotime("+" . $PricingPlanDetails['duration'] . " " . $PricingPlanDetails['type'] . "s", strtotime("NOW")));
//            $InsertArray['status'] = 'RUN';
//        }
            $InsertArray['start'] = date('Y-m-d');
            $InsertArray['end'] = date('Y-m-d', strtotime("+" . $PricingPlanDetails['duration'] . " " . $PricingPlanDetails['type'] . "s", strtotime("NOW")));
            $InsertArray['status'] = 'RUN';

        $InsertArray['pricing_plan_id'] = $PricingPlanID;
        $InsertArray['user_group'] = $UserGroup;
        $InsertArray['amount'] = $PricingPlanDetails['price'];
        $InsertArray['created_at'] = date('Y-m-d H:i:s');
        $dataSave = $DBUTG->insert('user_pricings', $InsertArray);
        
        if (!empty($dataSave->rowCount()) && $dataSave->rowCount() > 0) {
                $resultResponse = response(1, 0, 'Successfully Updated!!', NULL);
            } else {
                $resultResponse = response(0, 1, 'Something gonna wrong!!', NULL);
            }
            
    } else {
        
    }
}

echo json_encode($resultResponse);


