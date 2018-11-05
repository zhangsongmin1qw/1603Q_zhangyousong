<?php
header("content-type:text/html;charset=utf-8");
/*接收传来的id*/
$id=$_GET['id'];
/*自动加载*/
function __autoload($class){
    require "$class.php";
}

/*选择数据库  连接*/
$pdo=Db::getPdo("mysql:host=127.0.0.1;dbname=03o",'root','root');
/*调用删除方法*/
$res=$pdo->del("message","id=$id");
/*if条件判断下*/
if($res){
    echo "<script>alert('删除成功！');location.href='show.php'</script>";die;
}else{
    echo "<script>alert('删除失败！');location.href='show.php'</script>";die;
}