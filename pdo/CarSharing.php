<?php
require ('Gps.php');
require ('Driver.php');
require ('TariffInterface.php');

abstract class CarSharing
{
    protected $pricePerKilometer= 0;
    protected $pricePerMinute=0;
    protected $minDriverAge=18;
    protected $maxDriverAge=65;
    protected $gps=false;
    protected $addDriver = false;

    protected function checkAge($age)
    {
        if($age>=$this->minDriverAge && $age<=$this->maxDriverAge){
            return $age;
        }else{
            return false;
        }
    }

    public function calculate($distance, $time, $age, $addGps = false, $addDriver = false){
        if ($this->checkAge($age)===false){
            echo "Неподходящий возраст";
            return 0;
        }
        $price=($this->$pricePerKilometer*$distance)+($this->$pricePerMinute*$time);
        //если возраст попадает в диапазон от 18-21 то добавляем 10% к тарифу
        if($age>=18 && $age<=21){
            $price *= 1.1;
        }else{
            $price *= 1;
        }
        if ($addGps) {
            $price += $this->addGps($time);
        }
        if($addDriver){
            $price +=$this->$addDriver;
        }
        return $price;

    }
}