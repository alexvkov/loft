<?php
//task_1
function paragraphLine(array $stringTask, $united = false)
{
    if ($united == true) {
        return implode(",", $stringTask);
    }
    for ($str = 0; $str < count($stringTask); $str++) {
        echo "<p>" . $stringTask[$str] . "</p>";
    }
}

//task2

function calcEverything($operator, ...$numbers)
{
    $sum = 0;
    $sub = $numbers[0];
    $mul = 1;
    $div = $numbers[0];
    for ($i = 0, $c = count($numbers); $i < $c; $i++) {
        if ($operator === '+') {
            $sum += $numbers[$i];
            $result = $sum;
        } elseif ($operator === '-' && $i >= 1) {
            $sub -= $numbers[$i];
            $result = $sub;
        } elseif ($operator === '*') {
            $mul *= $numbers[$i];
            $result = $mul;
        } elseif ($operator === '/' && $i >= 1) {
            $div /= $numbers[$i];
            $result = $div;
        }
    }
    echo implode($operator, $numbers) . "=" . $result;
}

//task3
function tableMultiplication(int $num1, int $num2)
{
    $arg_arr = func_get_args();
    echo '<table border="1">';
    for ($rows = 1; $rows < $arg_arr[0] + 1; $rows++) {
        echo '<tr>';
        for ($cols = 1; $cols < $arg_arr[1] + 1; $cols++) {
            $table = $rows * $cols;
            echo '<td>' . $table . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

//task4
function taskDate()
{
    echo date('d.m.Y H:i');
}

function unixDate($param)
{
    echo strtotime($param);
}

//task5
function deleteLetter($let, $str)
{
    echo str_replace($let, '', $str);
}

function replaceTheWord($what, $forWhat, $str)
{
    echo str_replace($what, $forWhat, $str);
}


//task6
function newFile($files, $text)
{
    $files = $files . '.txt';
    file_put_contents($files, $text);
    echo file_get_contents($files);
}
