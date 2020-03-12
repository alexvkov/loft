<?php
require ('CarSharing.php');
require ('Gps.php');

class DailyRate extends CarSharing
{
    use Gps;
    use Driver;
    protected $pricePerKilometer= 1;
    protected $pricePerMinute=1000/(24*60);

    public function minutesToDays($minutes){
        if(($minutes % (60 * 24)) < 30) {
            return floor($minutes/((24*60)+30));
        } else {
            return ceil($minutes/((24*60)+30));
        }
    }
}