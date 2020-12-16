<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!empty($_GET['action'])) {
    if ($_GET['action'] == 'deleteById') {
        $ID = $_POST['ID'];
        $DBScripts->delete('customer', ['id' => $ID]);
        $response = ['status' => 'success', 'data' => NULL, 'message' => 'Your data has been deleted!!'];
    } elseif ($_GET['action'] == 'deleteByIdSKY') {
        $ID = $_POST['ID'];
        $DBScripts->delete('sky_seo_details', ['id' => $ID]);
        $response = ['status' => 'success', 'data' => NULL, 'message' => 'Your data has been deleted!!'];
    }elseif($_GET['action'] = 'RemoveBulk'){
        
        if($_GET['type'] == 'SEOBIRD'){
            $start = $_POST['start'];
            $end = $_POST['end'];
            $DBScripts->delete('customer', ["AND" => ['created_at[>=]' => $start, 'created_at[<=]' => $end]]);
            $response = ['status' => 'success', 'data' => NULL, 'message' => 'Your data has been deleted!!'];
            
        }elseif($_GET['type'] == 'SKYSEO'){
            $start = $_POST['start'];
            $end = $_POST['end'];
            $DBScripts->delete('sky_seo_details', ["AND" => ['created_at[>=]' => $start, 'created_at[<=]' => $end]]);
            $response = ['status' => 'success', 'data' => NULL, 'message' => 'Your data has been deleted!!'];
        }else{
            
        }
    } else {
        $response = ['status' => 'fail', 'data' => NULL, 'message' => 'Action not defined!!'];
    }
} else {
    $response = ['status' => 'fail', 'data' => NULL, 'message' => 'Action not defined!!'];
}
     
echo json_encode($response);
