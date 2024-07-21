<?php
// $what = false or true;
// var_dump($what);

// if (false or true){
//     echo "true";
// } else {
//     echo "false";
// }

// $a = "a";
// $b = "b";
// echo $a . $b;

$arr1 = array("phy" => 70,"che" => 80, "math" =>90);
$arr2 = array("Eng" => 70,"Bio" => 80, "Compsci" =>90,"phy" =>60 );
$arr3 = $arr1 + $arr2;

print_r($arr3);