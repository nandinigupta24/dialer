<?php
//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(-1);
include('../db/global.php');
include('includes/functions.php');
// unknow variables but used in funcitons etc files
$DB = false;
if($pathUrl[0]=='checklogin') {
  if(isset($_SESSION['Login']['user'])) echo 1; die;
  echo 0; die;
}
if($pathUrl[0]=='checklock') {
  if(isset($_SESSION['CurrentLogin']['Lock'])) {
    echo 1; die;
  } else {
    echo 0; die;
  }
}
if(!isset($_SESSION['Login']['user']) && $pathUrl[0]!='login') {
    redirect('login');
}

/* if(!isset($_SESSION['CurrentLogin']['Lock']) && isset($_SESSION['Login']['user']) && $pathUrl[0]!='lock') {
    redirect('lock');
} */

if(isset($_SESSION['Login']['user']) && $_SESSION['Login']['user']) {
    include('includes/variables.php');
}


if(isset($_SESSION['CurrentLogin']['admin_interface_enable']) && empty($_SESSION['CurrentLogin']['admin_interface_enable']) && $_SESSION['CurrentLogin']['admin_interface_enable'] <= 0 && !in_array($pathUrl[0],['welcome','login','logout'])){
redirect('welcome');
die('BYE -- OK');
}


/*SEO0038*/
if(isset($_SESSION['CurrentLogin']['user']) && !empty($_SESSION['CurrentLogin']['user']) && in_array($_SESSION['CurrentLogin']['user'],['SEO0038','SEO0039'])){
        header('location:../reports/call/recordings');
        exit;
}

if(isset($pathUrl[0]) && $pathUrl[0]) {
    $module = $pathUrl[0];
    $file = isset($pathUrl[1]) ? $pathUrl[1] : '';
    $layout = true;
    if(in_array($module, ['login', 'welcome', 'logout', 'lock'])) {
        if(isset($_SESSION['Login']['user']) && $module=='login') {
            redirect('welcome');
        }
        if($module=='logout') {
            unset($_SESSION['Login'],$_SESSION['role'],$_SESSION['CurrentLogin']);
            session_destroy();
            redirect('login');
        }
        if($module=='lock') {
            unset($_SESSION['CurrentLogin']['Lock']);
            //redirect('lock');
        }
        $module = 'auth';
        $file = $pathUrl[0];
        $layout = false;
    }

    if(in_array($file, ['ajax'])) {
        $layout = false;
    }
    $file = ($file ? : 'index').'.php';

    $moduleDir = 'modules/'.$module;

    if(file_exists($moduleDir)) {
       if(file_exists($moduleDir.'/'.$file)){
           if($layout) include('includes/common/header.php');
           include($moduleDir.'/'.$file);
           if($layout) include('includes/common/footer.php');
       }else {
           include('includes/common/404.php');
       }

    }else {
      //echo $pathUrl[0]; die;
        /*If login.php comes in URL*/
        if($pathUrl[0] == 'login.php'){
            redirect('login');
        }
        /*END*/

        echo "No Module found";
    }
}else {
    if(isset($_SESSION['Login']['user']) && $_SESSION['Login']['user'] && $_SESSION['CurrentLogin']['Lock']) {
        redirect('welcome');
    } elseif(!isset($_SESSION['CurrentLogin']['Lock'])) {
        redirect('lock');
    } else{
        redirect('login');
    }
}
