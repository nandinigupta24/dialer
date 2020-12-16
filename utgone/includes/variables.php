<?php 
if(!empty($_SESSION['Login']['user']) && !empty($_SESSION['Login']['password'])){
    $PHP_AUTH_USER= $_SESSION['Login']['user'];
    $PHP_AUTH_PW= $_SESSION['Login']['password']; 
}else{
    $PHP_AUTH_USER=$_SERVER['PHP_AUTH_USER'];
    $PHP_AUTH_PW=$_SERVER['PHP_AUTH_PW'];
}
$PHP_SELF=$_SERVER['PHP_SELF'];
$QUERY_STRING = getenv("QUERY_STRING");