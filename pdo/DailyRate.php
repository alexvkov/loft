<?php
require_once('CarSharing.php');
require_once('Gps.php');
require_once('Driver.php');

class DailyRate extends CarSharing
{
    use Gps;
    use Driver;
    protected $pricePerKilometer = 1;
    protected $pricePerMinute = 1000;
}