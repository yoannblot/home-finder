<?php

namespace App\Finder\FigaroImmo;

use App\Entity\SearchCriteria;
use App\Finder\UrlCollectionFinder;

final class FigaroImmoUrlCollectionFinder implements UrlCollectionFinder
{
    public function find(SearchCriteria $criteria)
    : iterable {
        return [$this->generateUrl($criteria)];
    }

    private function generateUrl(SearchCriteria $criteria)
    : string {
        $sUrl      = '';
        $sUrl      .= 'https://immobilier.lefigaro.fr/annonces/resultat/annonces.html?transaction=';
        $sUrl      .= 'vente';
        $sUrl      .= '&';
        $aFields   = [];
        $aFields[] = $this->getHomeType($criteria);
        $aFields[] = "priceMax=" . $criteria->getMaxPrice();
        if ($criteria->getSurface() > 0) {
            $aFields[] = "areaMin=" . $criteria->getSurface();
        }
        if ($criteria->getBedrooms() > 0) {
            $aFields[] = "bedroomMin=" . $criteria->getBedrooms();
        }
        if ($criteria->getNumberOfPieces() > 0) {
            $aFields[] = "roomMin=" . $criteria->getNumberOfPieces();
        }
        if ($criteria->getCities() > 0) {
            $cities = [];
            foreach ($criteria->getCities() as $city) {
                $cities[] = $city->getNormalizedName() . ' (' . substr($city->getPostalCode(), 0, 2) . ')';
            }
            $aFields[] = "location=" . implode(',', $cities);
        }
        $sUrl .= implode('&', $aFields);

        return $sUrl;
    }

    /**
     * @param SearchCriteria $criteria
     *
     * @return string
     */
    private function getHomeType(SearchCriteria $criteria)
    : string {
        $homeType = [];
        if ($criteria->isHouse()) {
            $homeType[] = 'maison';
        }
        if ($criteria->isApartment()) {
            $homeType[] = 'appartement';
        }

        return 'type=' . implode(',', $homeType);
    }
}
