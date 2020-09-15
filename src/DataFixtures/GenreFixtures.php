<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GenreFixtures extends Fixture {
	public function load(ObjectManager $manager) {

		foreach ($this->getGenres() as $index => $value) {
			$genre = new Genre();
			$genre->setName($value);
			$manager->persist($genre);

			$this->addReference($value, $genre);
		}


		$manager->flush();


	}


	public function getGenres(): array {
		$genres = array(
			0 => 'Action',
			1 => 'Adventure',
			2 => 'Animated',
			3 => 'Biography',
			4 => 'Comedy',
			5 => 'Crime',
			6 => 'Dance',
			7 => 'Disaster',
			8 => 'Documentary',
			9 => 'Drama',
			10 => 'Erotic',
			11 => 'Family',
			12 => 'Fantasy',
			13 => 'Found Footage',
			14 => 'Historical',
			15 => 'Horror',
			16 => 'Independent',
			17 => 'Legal',
			18 => 'Live Action',
			19 => 'Martial Arts',
			20 => 'Musical',
			21 => 'Mystery',
			22 => 'Noir',
			23 => 'Performance',
			24 => 'Political',
			25 => 'Romance',
			26 => 'Satire',
			27 => 'Science Fiction',
			28 => 'Short',
			29 => 'Silent',
			30 => 'Slasher',
			31 => 'Sports',
			32 => 'Spy',
			33 => 'Superhero',
			34 => 'Supernatural',
			35 => 'Suspense',
			36 => 'Teen',
			37 => 'Thriller',
			38 => 'War',
			39 => 'Western',
		);
		return $genres;
	}
}
