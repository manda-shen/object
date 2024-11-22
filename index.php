<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>物件導向</title>
</head>
<body>

<h3>物件的宣告</h3>

<?php

class Animal{
    public $type='animal';
    public $name='John';
    public $hair_color='black';
    public $feet=['front-left','front-right','back-left','back-right'];

    function __construct($type,$name,$hair_color){
        $this->type=$type;
        $this->name=$name;
        $this->hair_color=$hair_color;
    }
    
    function run(){
        echo $this->name. ' is running ';
    }

    function speed(){
        echo $this->name. ' is running at 20km/h';
    }

    public function getName(){
        return $this->name;
    }

}

// 實例化(instance)
$cat=new Animal('cat','Kitty','white');

// echo $cat->type;
echo $cat->getName();
// echo $cat->hair_color;
echo $cat->run();
echo $cat->speed();
// print_r($cat->$feet);


?>


</body>
</html>