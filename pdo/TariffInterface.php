<?php


interface TariffInterface
{
    public function calculate($distance, $time, $age, $addGps = false, $addDriver = false);
}