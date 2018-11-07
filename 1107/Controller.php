<?php
session_start();
$aa=isset($_SESSION['info'])?$_SESSION['info']:array();
if(empty($aa)){
    echo "失败";
}else{
    var_dump($aa);exit;
}