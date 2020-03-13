<?php
require_once('CarSharing.php');
require_once('Gps.php');
require_once('Driver.php');

class HourlyRate extends CarSharing
{
    use Gps;
    use Driver;
    protected $pricePerKilometer = 10;
    public $pricePerMinute = 200;

}