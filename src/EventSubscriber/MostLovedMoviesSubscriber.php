<?php

namespace App\EventSubscriber;

use App\Repository\MovieRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Twig\Environment;

/**
 * Class MostLovedMoviesSubscriber
 * @package App\EventSubscriber
 *
 *  Représente le Listener écoutant l'événement 'kernel.controller'.
 *  Quand un controleur est sur le point d'être exécuté , il est utile d'injecter la variable globale à Twig
 *  afin qu'il est accès au moment où le controlleur fait appel à la vue
 */
class MostLovedMoviesSubscriber implements EventSubscriberInterface {
	/**
	 * @var Environment
	 */
	private $environment;
	/**
	 * @var MovieRepository
	 */
	private $movieRepository;

	/**
	 * MostLovedMoviesSubscriber constructor.
	 * @param Environment $environment
	 * @param MovieRepository $movieRepository
	 */
	public function __construct(Environment $environment, MovieRepository $movieRepository) {
		$this->environment = $environment;
		$this->movieRepository = $movieRepository;
	}

	/**
	 * Injection de la variable globale mostLovedMovies à Twig
	 *
	 * @param ControllerEvent $event
	 */
	public function onKernelController(ControllerEvent $event) {

		$this->environment->addGlobal('mostLovedMovies', $this->movieRepository->findMostLovedMovies());
	}

	/**
	 *
	 * @return array
	 */
	public static function getSubscribedEvents(): array {
		return [
			'kernel.controller' => 'onKernelController',
		];
	}
}
