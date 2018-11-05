<?php
header("content-type:text/html;charset=utf-8");
/*自动加载*/
function __autoload ( $class) {
    require "$class.php";
//    if ( function_exists('__autoload'))
//        __autoload($class);
}
//spl_autoload_register('__autoload');

//接收前台传来的值
$title=$_POST['title'];
$type=$_POST['type'];
$author=$_POST['author'];
/*连接 选择数据库*/
$pdo=Db::getPdo("mysql:host=127.0.0.1;dbname=03o",'root','root');
/*加入数据表中*/
$sql="insert into `message` value('','$title','$type','$author')";
$res=$pdo->add($sql);
if($res){
    echo "<script>alert('添加成功！');location.href='show.php'</script>";die;
}else{
    echo "<script>alert('添加失败！');location.href='insert.php'</script>";die;
}

