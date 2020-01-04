<?php

namespace App\Entity;

final class SearchCriteria
{
    public function getBedrooms()
    : int
    {
        return 4;
    }

    /**
     * @return City[]
     */
    public function getCities()
    : array
    {
        return [
            new City('Poissy', '78300', 'poissy')
        ];
    }

    public function getMaxPrice()
    : int
    {
        return 490000;
    }

    public function getNumberOfPieces()
    : int
    {
        return 5;
    }

    public function getPostalCodes()
    : array
    {
        return array_map(
            static function (City $city) {
                return $city->getPostalCode();
            },
            $this->getCities()
        );
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
