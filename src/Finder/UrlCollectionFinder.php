<?php

namespace App\Finder;

use App\Entity\SearchCriteria;

interface UrlCollectionFinder
{
    /**
     * @param SearchCriteria $criteria
     *
     * @return iterable
     */
    public function find(SearchCriteria $criteria)
    : iterable;
}
