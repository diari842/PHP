<?php

//if statement
$num = -1;
if($num<0){
    echo "$num is less than 0";
}
//if...else
$age=20;
if($age>18){
    echo"You are an adult";

}else{
    echo "You are underage";
}

for ($x = 0; $x <= 10;$x++){
    echo "The number is $x <br>";
    }

$x = 1;
do {
    echo "The number is $x<br>";
    $x++;
} while ($x <= 5);

$x = 1;
while ($x <= 5) {
    echo "The number is $x<br>";
    $x++;
};

$car = array("BMW", "VW", "Audi", "Tesla");
    foreach($cars as $value){
    echo "$value <br>";
    }

    $car = array("John"=>"18", "Michael"=>"23", "Joe"=>"10");
    foreach($age as $x => $val){
    echo "$x=$val <br>";
    }


?>