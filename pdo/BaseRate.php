<?php
require ('CarSharing.php');
require ('Gps.php');
require ('Driver.php');

class BaseRate extends CarSharing
{
    use Gps;
    protected $pricePerKilometer= 10;
    protected $pricePerMinute=3;
}