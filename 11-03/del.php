<?php
header("content-type:text/html;charset=utf-8");
/*接收要删除的id*/
$id=$_GET['id'];
//引入文件
function __autoload($class){
   require "$class.php";
}
/*连接数据库*/
$pdo=Db::getPdo("mysql:host=127.0.0.1;dbname=03o",'root','root');
$res=$pdo->update("tickets",$id);
if($res){
    echo "<script>alert('抢票成功!');location.href='show.php'</script>";
}else{
    echo "<script>alert('抢票失败!');location.href='show.php'</script>";
}