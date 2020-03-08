<?php
function debug($param){
    echo "<pre>";
    var_dump($param);
    echo "</pre>";
}

$bmw = [
    "model"=>"X5",
    "speed"=>"120",
    "doors"=>"5",
    "year"=>"2015",
];

$toyota = [
    "model"=>"Camry",
    "speed"=>"130",
    "doors"=>"5",
    "year"=>"2013",
];

$opel = [
    "model"=>"Vectra",
    "speed"=>"110",
    "doors"=>"5",
    "year"=>"2017",
];

$allModel = ["BMW"=>$bmw, "Toyota"=>$toyota, "Opel"=>$opel];

foreach ($allModel as $car => $value){
    echo "CAR $car <br>";
    echo $value["model"] . ' ' . $value["speed"] . ' ' . $value["doors"] . ' ' . $value["year"];
    echo "<br><br>";
}

