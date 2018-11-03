<?php
header("content-type:text/html;charset=utf-8");
//引入类文件
function __autoload($class){
    require "$class.php";
}
//连接数据库
$pdo=Db::getPdo("mysql:host=127.0.0.1;dbname=03o",'root','root');
//调用查询方法 选择数据库
$res=$pdo->select("tickets");
?>
<style>
    a{
        text-decoration: none;
    }
</style>
<center>
<table width="399" height="60"  cellspacing="0" cellpadding="0">
    <tr align="center">
        <td>出发地</td>
        <td>目的地</td>
        <td>3月24</td>
        <td>操作</td>
    </tr>
    <?php foreach ($res as $k=>$v) {?>
    <tr align="center">
        <td><?=$v['place']?></td>
        <td><?=$v['bourn']?></td>
        <td><?=$v['four']?></td>
        <td><a href="del.php?id=<?=$v['id']?>">抢票</a></td>
    </tr>
    <?php }?>
</table>
    <a href="insert.php">添加抢票</a>
</center>