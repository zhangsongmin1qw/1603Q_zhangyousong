<?php
/**
 * 封装 curd方法
 */
class Db{
    //定义私有的静态方法
    private static $ins;
    protected $pdo;
    //构造方法
    private  function __construct($dsn,$name,$price){
        $this->pdo=new PDO($dsn,$name,$price);
    }
    /*自动加载*/
//    private function loader($class) {
//        echo 'Trying to load ', $class, ' via ', __METHOD__, "()\n";
//        include $class . '.php';
//    }
    //禁止复制该代码
    private function __clone(){

    }
    public static function getPdo($dsn,$name,$price){
        if(self::$ins==null){
            self::$ins=new self($dsn,$name,$price);
        }
        return self::$ins;
    }
    //添加方法
    public function add($table){
        $res=$this->pdo->exec($table);
        return $res;
    }
    //查询方法
    public function select($table){
        /*查询表*/
        $sql="select * from $table";
        $res=$this->pdo->query($sql);
        /*查询出来数组*/
        $list=$res->fetchAll(PDO::FETCH_ASSOC);
        return  $list;
    }
    //删除方法
    public function del($table,$where){
        /*删除表里的id*/
        $sql="delete from $table where $where";
        $res=$this->pdo->exec($sql);
        return $res;
    }
    //查询单条
    public function find($table,$where){
        /*查询数据表*/
        $sql="select * from $table where $where";
        $res=$this->pdo->query($sql);
        $list=$res->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
    //修改方法
    public function update($table){
        $res=$this->pdo->exec($table);
        return $res;
    }
}