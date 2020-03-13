<?php
require_once('CarSharing.php');
require_once('Gps.php');

class BaseRate extends CarSharing
{
    use Gps;
    protected $pricePerKilometer = 10;
    protected $pricePerMinute = 3;
}