<?php
require ('CarSharing.php');

class StudentRate extends CarSharing
{
    use Gps;
    protected $pricePerKilometer=4;
    protected $pricePerMinute=1;
    protected $maxDriverAge=25;
}