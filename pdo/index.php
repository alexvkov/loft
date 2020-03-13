<?php

require_once('CarSharing.php');
require_once('DailyRate.php');
require_once('HourlyRate.php');
require_once('StudentRate.php');
require_once('BaseRate.php');
require_once('Gps.php');
require_once('Driver.php');

function debug($param)
{
    echo "<pre>";
    var_dump($param);
    echo "</pre>";
}

echo "Base rate:";
$base = new BaseRate();
$base->calculate(10, 5, 20, true, false);
echo "<br>";
echo "Student rate:";
$student = new StudentRate();
$student->calculate(10, 5, 20, true, false);
echo "<br>";
echo "Hourly rate:";
$hourly = new HourlyRate();
$hourly->calculate(10, 5, 20, true, true, true, false);
echo "<br>";
echo "Daily rate:";
$daily = new DailyRate();
$daily->calculate(10, 1480, 20, true, true, false, true);