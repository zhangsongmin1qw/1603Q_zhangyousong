<?php
header("content-type:text/html;charset=utf-8");

//引入类文件
include "./db.class.php";
//接收前台传来的值
$place=$_POST['place'];//出发地
$bourn=$_POST['bourn'];//目的地
$twentyone=$_POST['twentyone'];//3月21日
$twenty=$_POST['twenty'];//3月22日
$twentythree=$_POST['twentythree'];//3月23日
$four=$_POST['four'];//3月24日

//连接数据库
$pdo=Db::getPdo("mysql:host=127.0.0.1;dbname=03o",'root','root');
//选择数据库  把数据加入数据库中
$sql="insert into  `tickets` value('','$place','$bourn','$twentyone','$twenty','$twentythree','$four')";
$res=$pdo->add($sql);
//if条件判断
if($res){
    echo "<script>alert('提交成功！');location.href='show.php'</script>";die;
}else{
    echo "<script>alert('提交失败！');location.href='insert.php'</script>";die;
}