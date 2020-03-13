<?php
require_once('Gps.php');
require_once('Driver.php');
require_once('TariffInterface.php');

abstract class CarSharing
{
    protected $pricePerKilometer = 0;
    protected $pricePerMinute = 0;
    protected $minDriverAge = 18;
    protected $maxDriverAge = 65;

    protected function checkAge($age)
    {
        if ($age >= $this->minDriverAge && $age <= $this->maxDriverAge) {
            return $age;
        } else {
            return false;
        }
    }

    //функция Округление до 60 минут в большую сторону
    public function roundingToWholeHours($time)
    {
        $wholeMinutes = ceil($time / 60);
        return $wholeMinutes;
    }

    // Функция округления до суток
    public function roundingToTheDay($time)
    {
        if (($time % (60 * 24)) < 30) {
            return floor($time / ((24 * 60) + 30));
        } else {
            return ceil($time / ((24 * 60) + 30));
        }
    }

    //последние 2 параметра влияют на запуск функций подсчёта суток или часов
    public function calculate($distance, $time, $age, $addGps = false, $addDriver = false, $hourlyOn = false, $dailyOn = false)
    {
        if ($this->checkAge($age) === false) {
            echo "Неподходящий возраст";
            return 0;
        }
        if ($hourlyOn) {
            $timeHourly = $this->roundingToWholeHours($time);
            $price = ($this->pricePerKilometer * $distance) + ($this->pricePerMinute * $timeHourly);
        } elseif ($dailyOn) {
            $timeDaily = $this->roundingToTheDay($time);
            $price = ($this->pricePerKilometer * $distance) + ($this->pricePerMinute * $timeDaily);
        } else {
            $price = ($this->pricePerKilometer * $distance) + ($this->pricePerMinute * $time);
        }
        if ($addGps) {
            $price += $this->setGps($time);
        }
        if ($addDriver) {
            $price += $this->addDriver();
        }
        if ($age >= 18 && $age <= 21) {
            $price *= 1.1;
        }
        echo $price;

    }
}