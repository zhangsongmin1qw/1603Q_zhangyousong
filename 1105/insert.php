<center>
<form action="add.php" method="post">
<table>
    <tr>
        <td>标题:</td>
        <td><input type="text" name="title"></td>
    </tr>
    <tr>
        <td>分类:</td>
        <td><select name="type">
                <option>请选择...</option>
                <option>php</option>
                <option>java</option>
            </select></td>
    </tr>
    <tr>
        <td>描述:</td>
        <td><textarea name="author" rows="5" cols="22"></textarea></td>
    </tr>
    <tr>
        <td align="center" colspan="2"><input type="submit" value="提交"></td>
    </tr>
</table>
</form>
</center>