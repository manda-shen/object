<?php

class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db99";
    protected $pdo;
    protected $table;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    // 要省略下面的$dept=$DEPT->q("SELECT * FROM dept")

    /**
     * 撈出全部資料
     * 1.整張資料表
     * 2.有條件
     * 3.其他SQL功能
     */

    function all(...$arg){
        $sql="SELECT * FROM $this->table";
        
        if(!empty($arg[0])){
            if(is_array($arg[0])){

                $where=$this->a2s($arg[0]);
                $sql=$sql . " WHERE ". join(" && ",$where);
            }else{
                // $sql=$sql.$arg[0];
                $sql .= $arg[0];

            }
        }

        if(!empty($arg[1])){
            $sql=$sql . $arg[1];
        }

        // return $this->q("SELECT * FROM $this->table");        
        return $this->fetchAll($sql);
    }

    /**
     * 用find查
     */
    function find($id){
        $sql="SELECT * FROM $this->table ";

        if(is_array($id)){
            $where=$this->a2s($id);
            $sql=$sql . " WHERE ". join(" && ",$where);
        }else{
            $sql .= " WHERE `id`='$id' ";
        }
        return $this->fetchOne($sql);
    }

    /**
     * 用save增、改
     */
    function save($array){

        if(isset($array['id'])){
            // update
            //update table set `欄位1`='值1',`欄位2`='值2' where `id`='值' 
            $id=$array['id'];
            unset($array['id']);
            $set=$this->a2s($array);
            $sql ="UPDATE $this->table SET ".join(',',$set)." where `id`='$id'";
                
        }else{
            //insert
            $cols=array_keys($array);
            $sql="INSERT INTO $this->table (`".join("`,`",$cols)."`) VALUES('".join("','",$array)."')";
        }
        echo $sql;
        return $this->pdo->exec($sql);

    }


    /**
     * 用delete刪除
     */

    function del($id){
        $sql="DELETE FROM $this->table ";

        if(is_array($id)){
            $where=$this->a2s($id);
            $sql=$sql . " WHERE ". join(" && ",$where);
        }else{
            $sql .= " WHERE `id`='$id' ";
        }

        echo $sql;
        return $this->pdo->exec($sql);
    }




    /**
     * 把陣列轉成條件字串陣列
     */
    // 從function toWhere($array){ 改成: a2s(array to string)

    

    function a2s($array){
        $tmp=[];
        foreach($array as $key => $value){
            $tmp[]="`$key`='$value'";
        }
        return $tmp;
    }

    // function q($sql){
    //     return $this->pdo->query($sql)->fetchAll();
    // }

    function fetchOne($sql){
        // echo $sql;
        // return $this->pdo->query($sql)->fetch();
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    
    function fetchAll($sql){
        // echo $sql;
        // return $this->pdo->query($sql)->fetchAll();
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

}

/* function q($sql){
    return $this->pdo->query($sql)->fetchAll();
} */

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


$DEPT=new DB('dept');

// 原本是:$dept=$DEPT->q("SELECT * FROM dept"); 
// 改成:
// $dept=$DEPT->all();
// $dept=$DEPT->all(['id'=>3]);
// $dept=$DEPT->all(" Order by `id` DESC");
$dept=$DEPT->find(['code'=>'404']);

// 用delete
// $DEPT->del(['code'=>'504']);

// 用save
$DEPT->save(['code'=>'504','id'=>'10','name'=>'資訊發展部']);
dd($dept);


?>