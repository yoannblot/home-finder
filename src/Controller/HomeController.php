<?php

namespace App\Controller;

use App\Entity\SearchCriteria;
use App\Finder\FigaroImmo\FigaroImmoUrlCollectionFinder;
use App\Finder\UrlCollectionFinder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomeController
{
    /**
     * @var UrlCollectionFinder
     */
    private UrlCollectionFinder $finder;

    /**
     * HomeController constructor.
     *
     * @param UrlCollectionFinder $finder
     */
    public function __construct(FigaroImmoUrlCollectionFinder $finder)
    {
        $this->finder = $finder;
    }

    /**
     * @Route
     * @return Response
     */
    public function index()
    : Response
    {
        $url = $this->finder->find(new SearchCriteria());

        return new Response(
            "<html><body>{$url[0]}</body></html>"
        );
    }
}
