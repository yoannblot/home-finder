<?php

namespace App\Finder\SeLoger;

use App\Entity\SearchCriteria;
use App\Finder\UrlCollectionFinder;

final class SeLogerUrlCollectionFinder implements UrlCollectionFinder
{
    private const ID_APARTMENT = 1;
    private const ID_HOUSE     = 2;

    public function find(SearchCriteria $criteria)
    : iterable {
        $url = $this->generateUrl($criteria);

        return [$url];
    }

    private function generateUrl(SearchCriteria $criteria)
    : string {
        $sUrl    = '';
        $sUrl    .= "http://www.seloger.com/list_responsive_ajax_main.htm?idtt=1&div=2238&tri=d_dt_crea&";
        $aFields = [];

        $aFields[] = $this->getHomeType($criteria);

        $aFields[] = "naturebien=1,2,4";
        $aFields[] = "pxmax=" . $criteria->getMaxPrice();
        if ($criteria->getSurface() > 0) {
            $aFields[] = "surfacemin=" . $criteria->getSurface();
        }
        if ($criteria->getBedrooms() > 0) {
            $aFields[] = "nb_chambresmin=" . $criteria->getBedrooms();
        }
        if ($criteria->getPostalCodes() > 0) {
            $aFields[] = "ci=" . implode(',', $criteria->getPostalCodes());
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
            $homeType[] = static::ID_HOUSE;
        }
        if ($criteria->isApartment()) {
            $homeType[] = static::ID_APARTMENT;
        }

        return 'idtypebien=' . implode(',', $homeType);
    }
}
