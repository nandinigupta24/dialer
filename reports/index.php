<?php
include('../db/global.php');
include('includes/functions.php');
// unknow variables but used in funcitons etc files
$DB = false;
if($pathUrl[0]=='checklogin') {
  if(isset($_SESSION['Login']['user'])) echo 1; die;
  echo 0; die;
}
if(!isset($_SESSION['Login']['user']) && $pathUrl[0]!='login') {
    redirect('login', 1);
}
if(isset($_SESSION['Login']['user']) && $_SESSION['Login']['user']) {
    include('includes/variables.php');
}

if(empty($_SESSION['CurrentLogin']['view_reports']) && $_SESSION['CurrentLogin']['view_reports'] <= 0 && !in_array($pathUrl[0],['login'])){
header('location:/utgone/welcome');
die('BYE -- OK');
}

if(isset($pathUrl[0]) && $pathUrl[0]) {
    $module = $pathUrl[0];
    $file = isset($pathUrl[1]) ? $pathUrl[1] : '';
    $layout = true;
    if(in_array($module, ['login', 'welcome', 'logout'])) {
        if(isset($_SESSION['Login']['user']) && $module=='login') {
            redirect('welcome', 1);
        }
        if($module=='logout') {
            unset($_SESSION['Login'],$_SESSION['role'],$_SESSION['CurrentLogin']);
            session_destroy();
            redirect('login', 1);
        }
        $module = 'auth';
        $file = $pathUrl[0];
        $layout = false;
    }

    if(in_array($file, ['ajax','non_agent_api'])) {
        $layout = false;
    }

    if($module == 'realtime' || $module == 'realtime1'){
        $layout = false;
    }

    $file = ($file ? : 'index').'.php';

    $moduleDir = 'modules/'.$module;

    if(file_exists($moduleDir)) {
       if($layout) include('includes/common/header.php');
       if(file_exists($moduleDir.'/'.$file)){ include($moduleDir.'/'.$file);}else {  include('includes/common/404.php'); }
       if($layout) include('includes/common/footer.php');
    }else {
        echo "No Module found";
    }
}else {
    if(isset($_SESSION['Login']['user']) && $_SESSION['Login']['user']) {
        redirect('welcome', 1);
    }else{
        redirect('login', 1);
    }
}
