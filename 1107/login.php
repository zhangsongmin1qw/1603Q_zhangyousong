<?php
header("content-type:text/html;charset=utf-8");
print_r($_POST);
$name=$_POST['name'];
$pwd=$_POST['pwd'];
$id=1100;
session_start();
$arr=array(
    "id"=>$id,
     "name"=>$name,
);
$_COOKIE['id']=$id;
$_COOKIE['name']=$name;
$_SESSION['info']=$arr;
echo "success<font color='red'>{$name}</font>";
?>
<a href="order.php">order.php</a>
