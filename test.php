<?php
$vehicle = array("Bus", "Train");
$cars = array("BMW", "Toyota");
$vehicle[] = $cars;

//echo '<pre>';
//var_dump($vehicle);
//echo "</pre>";

function foo($var)
{
    $var++;
    echo $var;
}

$a=5;
foo($a);
// $a is 6 here