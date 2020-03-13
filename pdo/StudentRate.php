<?php
require_once('CarSharing.php');
require_once('Gps.php');

class StudentRate extends CarSharing
{
    use Gps;
    protected $pricePerKilometer = 4;
    protected $pricePerMinute = 1;
    protected $maxDriverAge = 25;
}