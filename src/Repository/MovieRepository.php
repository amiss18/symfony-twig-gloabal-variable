<?php

namespace App\Repository;

use App\Entity\Movie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findAll()
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieRepository extends ServiceEntityRepository {
	public function __construct(ManagerRegistry $registry) {
		parent::__construct($registry, Movie::class);
	}


	/**
	 *  the most loved movies
	 *
	 * @param int|null $limit
	 * @return iterable|null
	 */
	public function findMostLovedMovies(?int $limit = 10): ?iterable {
		return $this->queryMovies()
			->setMaxResults($limit)
			->getArrayResult();
	}




	/**
	 *  all movies
	 * @param int|null $limit
	 * @return iterable
	 */
	public function allMovies( ?int $limit=30 ):iterable {
		return $this->queryMovies()
			->setMaxResults($limit)
			->getResult();
	}

	/**
	 *  Generic query which associate movie and picture
	 * @return Query
	 */
	private function queryMovies(): Query {
		return $this->createQueryBuilder('m')
			->addSelect('m', 'p')
			->leftJoin('m.pictures', 'p')
			->orderBy('m.likes', 'DESC')
			->getQuery();
	}

}
