<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require('src/functions.php');



//task_1

//$fileName = "data.xml";
//xmlOrder($fileName);

//task_2

//$numbers=["a"=>11, "b"=>22, "c"=>33, "d"=>44, "e"=>55, "f"=>66, "k"=>77,];
//arrayDiff($numbers);

//task_3
// Создание массива из случайных чисел
//csvSumNum();

//task_4
$url =  "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json";
$openFile = file_get_contents($url);
$newJsonD = json_decode($openFile, true);

//debug($newJsonD);

foreach ($newJsonD['query'] as $item){
    foreach ($item as $value){
        echo $value['title'];
    }
}
$fileName = "data.xml";
xmlOrder($fileName);

//task_2
$numbers=["a"=>11, "b"=>22, "c"=>33, "d"=>44, "e"=>55, "f"=>66, "k"=>77,];
arrayDiff($numbers);

//task_3
csvSumNum();

//task_4
parseUrlJson();


