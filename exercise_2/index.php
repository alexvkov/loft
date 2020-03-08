<?php
require('src/functions.php');

//task_1
$stringTask = [
    'Stroka nomer 1',
    'Stroka nomer 2',
    'Stroka nomer 3',
    'Stroka nomer 4'
];
$result = paragraphLine($stringTask, true);
echo $result;

echo "<br>";

//task2
echo calcEverything('/',20,2,2);
echo "<br>";

//task3
tableMultiplication(3,3);
echo "<br>";


//task4
taskDate();
echo "<br>";

$date = '24.02.2016 00:00:00';
unixDate($date);
echo "<br>";

//task5
$str = 'Карл у Клары украл Кораллы';
deleteLetter('К', $str);
echo "<br>";

$str2 = 'Две бутылки лимонада';
replaceTheWord('Две', 'Три', $str2);
echo "<br>";

//task6
$files = 'newfile';
$text =  'Hello again!';
newFile($files, $text);



