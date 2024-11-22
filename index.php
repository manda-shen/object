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
    protected $type='animal';
    protected $name='John';
    protected $hair_color='black';
    protected $feet=['front-left','front-right','back-left','back-right'];

    function __construct($type,$name,$hair_color){
        $this->type=$type;
        $this->name=$name;
        $this->hair_color=$hair_color;
    }
    
    function run(){
        echo $this->name . ' is running ';
    }

    function speed(){
        echo $this->name . ' is running at 20km/h';
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name=$name;
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

$cat->setName('Mary');
echo $cat->getName();


?>


<h3>繼承</h3>
<?php

// class Cat extends Animal{
//     protected $type='cat';
    
//     function __construct($name,$hair_color){
//         $this->name=$name;
//         $this->hair_color=$hair_color;
//     }
// }


class Cat extends Animal{
    protected $type='cat';
    protected $name="Judy";
    function __construct($hair_color){
        $this->hair_color=$hair_color;
    }
}


// $mycat=new Cat('cat','kitty','white');
$mycat=new Cat('white');

echo$mycat->getName();
echo "<br>";
echo $mycat->run();
echo "<br>";
echo $mycat->speed();
echo "<br>";
$mycat->setName("judy");
echo $mycat->getName();
echo "<br>";


?>


</body>
</html>