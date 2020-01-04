<?php

namespace App\Controller;

use App\Entity\SearchCriteria;
use App\Finder\SeLoger\SeLogerUrlCollectionFinder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomeController
{
    /**
     * @var SeLogerUrlCollectionFinder
     */
    private SeLogerUrlCollectionFinder $finder;

    /**
     * HomeController constructor.
     *
     * @param SeLogerUrlCollectionFinder $finder
     */
    public function __construct(SeLogerUrlCollectionFinder $finder)
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
