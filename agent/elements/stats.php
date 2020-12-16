<?php

require '../../db/database.php';

$Method = $_GET['method'];
if ($Method == 'GetStats') {
    $UserID = $_POST['user'];
    $UserDetails = $database->get('vicidial_users',['user_group','experience'],['user'=>$UserID]);
    
    $Points = $DBUTG->sum('agent_logs', ['points'], ['AND'=>['user' => $UserID,'experience'=>$UserDetails['experience']]]);
    if(empty($Points)){
        $Points = 0;
    }
    
    $TotalPoints = $DBUTG->get('agent_levels', 'points',['AND'=>['user_group'=>$UserDetails['user_group'],'level'=>10]]);
    
    if($Points == $TotalPoints){
        $LastExperience = $DBUTG->get('agent_logs','experience',['user' => $UserID,'ORDER'=>['id'=>'DESC']]);
        if(($LastExperience + 1) != $UserDetails['experience']){
            $Experience = $UserDetails['experience'] + 1;
            $_SESSION['CurrentLogin']['Experience'] = $Experience;
            $database->update('vicidial_users',['experience'=>$Experience],['user'=>$UserID]);
        }
    }
    
    $Level1 = $DBUTG->get('agent_levels', ['level', 'points','description'], ['AND'=>['points[>=]' => $Points,'user_group'=>$UserDetails['user_group']], 'ORDER' => ['level' => 'ASC']]);
   

    $Level2 = $DBUTG->get('agent_levels', ['points'], ['AND'=>['level' => ($Level1['level'] - 1),'user_group'=>$UserDetails['user_group']]]);
    if (!empty($Level2['points']) && $Level2['points']) {
        $existPoints = $Points - $Level2['points'];
    } else {
        $existPoints = $Points;
    }

    $per = round(($existPoints / ($Level1['points'] - $Level2['points'])) * 100);

    
    
    if(empty($TotalPoints)){
        $TotalPoints = 0;
    }
    $LeaderPer = (($Points * 100 )/ $TotalPoints);
    
    if (!empty($Level1['level']) && $Level1['level']) {
        $CurrentLevel = $Level1['level'];
    }else{
        $CurrentLevel = 1;
    }
    $LevelUpgrade = NULL;
    if(!empty($_SESSION['CurrentLogin']['Level']) && $_SESSION['CurrentLogin']['Level']){
        if($_SESSION['CurrentLogin']['Level'] != $CurrentLevel){
           $LevelUpgrade = 1; 
        }
    }
    
    $_SESSION['CurrentLogin']['Level'] = $CurrentLevel;
    
    $ExperiencePer = (($UserDetails['experience']*100)/50);
    if (!empty($Level1['level']) && $Level1['level']) {
        $array = ['Level' => $CurrentLevel, 'Percentage' => $per, 'Points' => $Points, 'TotalPoints' => $TotalPoints,'LeaderPer'=>$LeaderPer,'LevelUpgrade'=>$LevelUpgrade,'Experience'=>$UserDetails['experience'],'ExperiencePer'=>$ExperiencePer,'LevelDescription'=>$Level1['description']];
    } else {
        $array = ['Level' => $CurrentLevel, 'Percentage' => $per, 'Points' => $Points, 'TotalPoints' => $TotalPoints,'LeaderPer'=>$LeaderPer,'LevelUpgrade'=>$LevelUpgrade,'Experience'=>$UserDetails['experience'],'ExperiencePer'=>$ExperiencePer,'LevelDescription'=>$Level1['description']];
    }
    
    $response = results('success', 'Agent Log', $array);
}elseif($Method == 'GetLeaderBoards'){
    $user = $_POST['user'];
    $data = $DBUTG->select('agent_logs','*', ['user' => $user,'ORDER'=>['id'=>'ASC']]);
    require 'include/leader_stats.php';
    exit;
}else {
    $response = results('error', 'No New Message', NULL);
}

echo json_encode($response);
