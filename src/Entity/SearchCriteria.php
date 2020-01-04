<?php

namespace App\Entity;

final class SearchCriteria
{
    public function getBedrooms()
    : int
    {
        return 4;
    }

    public function getPostalCodes()
    : array
    {
        return ['78300'];
    }

    public function getMaxPrice()
    : int
    {
        return 490000;
    }

    public function getSurface()
    : int
    {
        return 100;
    }

    public function isApartment()
    : bool
    {
        return false;
    }

    public function isHouse()
    : bool
    {
        return true;
    }
}
