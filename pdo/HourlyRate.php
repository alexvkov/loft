<?php
require('CarSharing.php');
require('Gps.php');

class HourlyRate extends CarSharing
{
    use Gps;
    use Driver;
    protected $pricePerKilometer = 10;
    public $pricePerMinute = 200/60;

//    функция Округление до 60 минут в большую сторону
    public function roundingToWholeHours($time)
    {
        $wholeMinutes = ceil($time / 60);
        return $wholeMinutes;
    }

    //200 рублей за 60 минут , вычисляем =
    public $priceForSixtyMinutes = 200 * $this->roundingToWholeHours($this->pricePerMinute);

}