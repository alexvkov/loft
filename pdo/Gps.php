<?php


trait Gps
{
    private $addGps = false;
    public $priceGps = 15;
    public function setGps($hours){
        $howManyHours = ceil($hours/60);
        $moneyForGps = $howManyHours * $this->priceGps;
        return $moneyForGps;
    }
}