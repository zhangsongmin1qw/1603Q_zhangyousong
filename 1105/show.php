<?php
header("content-type:text/html;charset=utf-8");

/*自动加载*/
function __autoload($class){
    require "$class.php";
}
/*连接数据库*/
$pdo=Db::getPdo("mysql:host=127.0.0.1;dbname=03o",'root','root');
/*调用查询方法*/
$res=$pdo->select("message");
?>
<style>
    a{
        text-decoration: none;
    }
</style>
<center>
<table width="299">
    <tr align="center">
        <td>ID</td>
        <td>标题</td>
        <td>分类</td>
        <td>描述</td>
        <td>操作</td>
    </tr>
    <?php foreach ($res as $k=>$v) {?>
    <tr align="center">
        <td><?=$v['id']?></td>
        <td><?=$v['title']?></td>
        <td><?=$v['type']?></td>
        <td><?=$v['author']?></td>
        <td><a href="del.php?id=<?=$v['id']?>">移除</a></td>
    </tr>
    <?php }?>
</table>
</center>