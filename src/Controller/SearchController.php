<?php

namespace App\Controller;

use App\Service\SearchMovie;
use App\Form\SearchMovieType;
use App\Repository\MovieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function search(Request $request, MovieRepository $movieRepository): Response
    {
        $search = new SearchMovie();
        $searchForm = $this->createForm(SearchMovieType::class, $search);
        $searchForm->handleRequest($request);

        if ($searchForm->isSubmitted() && $searchForm->isValid()) {
            $movies = $movieRepository->searchMovie($search);
        } else {
            $movies = null;
        }
        return $this->render('search/index.html.twig', [
            'searchForm' => $searchForm->createView(),
            'movies' => $movies,
        ]);
    }
}
