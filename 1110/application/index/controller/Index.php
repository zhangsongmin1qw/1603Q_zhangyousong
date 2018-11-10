<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    /*渲染添加页面*/
    public function index()
    {
        return $this->fetch('/index');
    }
    //添加功能
    public function add(){
        //接收前台传来的值
        $data=input();
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('img');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $path= $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($path){
            $data['img']=$path->getSaveName();
        }
        $res=Db::table("good")->insert($data);
        if($res){
            $this->success('添加成功','show');
        }else{
            $this->error('添加失败');
        }
    }
    //展示功能
    public function show(){
        // 查询状态为1的用户数据 并且每页显示10条数据
        $list = Db::table('good')->paginate(4);
        // 获取分页显示
        $page = $list->render();
        // 模板变量赋值
        $this->assign('list', $list);
        $this->assign('page', $page);
        if(request()->isAjax()){
            return $this->fetch('/ajax');
        }
        return $this->fetch('/show',['list'=>$list]);
    }
    //删除功能
    public function del(){
        $id=$_GET['id'];
        $res=Db::table("good")->where("id='$id'")->delete();
        if($res){
            $this->success('删除成功','show');
        }else{
            $this->error('删除失败');
        }
    }
    //查询单条
    public function update(){
        $id=$_GET['id'];
        $res=Db::table("good")->where("id='$id'")->find();
        return $this->fetch('/update',['res'=>$res]);
    }
    //修改方法
    public function update_pro(){
        //接收前台传来的值
        $data=input();
        $res=Db::table("good")->update($data);
        if($res){
            $this->success('修改成功','show');
        }else{
            $this->error('修改失败');
        }
    }
}
