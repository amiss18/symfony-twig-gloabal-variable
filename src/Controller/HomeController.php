<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\ActorRepository;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

	/**
	 * @Route("/", name="home")
	 */
	public function index(MovieRepository $movieRepository): Response {
		$movies = $movieRepository->allMovies();


		return $this->render('home/index.html.twig', [
			"movies" => $movies,
		]);
	}

	/**
	 * @Route("/movies/{id}",  name="movie_show")
	 */
	public function movieShow(Movie $movie, ActorRepository $actorRepository): Response {

		return $this->render('home/show.html.twig', [
			"movie" => $movie,
		]);
	}


}
