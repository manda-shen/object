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
    function all(){
        return $this->q("SELECT * FROM $this->table");
    }


    function q($sql){
        return $this->pdo->query($sql)->fetchAll();
    }
}


function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


$DEPT=new DB('dept');

// 原本是:$dept=$DEPT->q("SELECT * FROM dept"); 
// 改成:
$dept=$DEPT->all();

dd($dept);

?>