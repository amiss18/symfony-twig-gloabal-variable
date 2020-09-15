<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use App\Entity\Picture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture implements DependentFixtureInterface {

    public function load(ObjectManager $manager)  {

     //   $manager->flush();
		 $this->loadMovies( $manager );
    }

	public function loadMovies( ObjectManager $manager) {

		foreach ( $this->getMovies() as $index => $value ) {
			$movie = new Movie();
			if( isset($value['title']) && isset($value['year'])  ){
				$movie->setTitle( $value['title'] );
				$movie->setYear( intval($value['year']) );
				$movie->setDescription( $this->getMovieDescription() );

				//actor
				if( !empty($value['cast']) ){
					foreach ( $value['cast'] as $index => $item ) {
						if($item)
							$movie->addActor( $this->getReference($item) );
						//$movie->setActor( $this->getReference($item));

					}

				}else{
					continue;
				}

				//genres
				if( isset($value['genres']) ){
					foreach ( $value['genres'] as $index => $item ) {
						//if($item)
							$movie->addGenre(  $this->getReference($item) );
					}

				}

			}
			$like = rand(0,100);
			$movie->setLikes( $like );

			$picture = new Picture();
			$picture->setName( $this->getPicture());
			$movie->addPicture($picture);

			$manager->persist($movie);


    	}
    	$manager->flush();

    }

	/**
	 *  random image
	 *
	 * @return string  filename
	 */
	public function getPicture() :string {
    	$images = [];
    	for ($i=1; $i<=10;$i++){
    		$images[]="image-$i.jpg";
		}
		$index = rand(0,9);

    	return $images[$index];

    }

    public function getMovies():array {
    	$movies = [
			0 =>
				[
					'title' => '10 Things I Hate About You',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Julia Stiles',
							1 => 'Heath Ledger',
							2 => 'Larisa Oleynik',
							3 => 'Joseph Gordon-Levitt',
							4 => 'David Krumholtz',
							5 => 'Andrew Keegan',
							6 => 'Gabrielle Union',
						],
					'genres' =>
						[
							0 => 'Romance',
							1 => 'Comedy',
						],
				],
			1 =>
				[
					'title' => 'The 13th Warrior',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Antonio Banderas',
							1 => 'Diane Venora',
							2 => 'Vladimir Kulich',
							3 => 'Dennis Storhøi',
							4 => 'Omar Sharif',
							5 => 'Clive Russell',
							6 => 'Richard Bremmer',
						],
					'genres' =>
						[
							0 => 'Action',
						],
				],
			2 =>
				[
					'title' => '200 Cigarettes',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Ben Affleck',
							1 => 'Casey Affleck',
							2 => 'Dave Chappelle',
							3 => 'Guillermo Diaz',
							4 => 'Angela Featherstone',
							5 => 'Janeane Garofalo',
							6 => 'Gaby Hoffmann',
							7 => 'Kate Hudson',
							8 => 'Courtney Love',
							9 => 'Jay Mohr',
							10 => 'Martha Plimpton',
							11 => 'Christina Ricci',
							12 => 'Paul Rudd',
						],
					'genres' =>
						[
							0 => 'Comedy',
							1 => 'Drama',
						],
				],
			3 =>
				[
					'title' => 'The 4th Floor',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Juliette Lewis',
							1 => 'William Hurt',
							2 => 'Shelley Duvall',
						],
					'genres' =>
						[
							0 => 'Horror',
						],
				],
			4 =>
				[
					'title' => '8mm',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Nicolas Cage',
							1 => 'Joaquin Phoenix',
							2 => 'James Gandolfini',
							3 => 'Peter Stormare',
							4 => 'Catherine Keener',
							5 => 'Anthony Heald',
						],
					'genres' =>
						[
							0 => 'Thriller',
						],
				],
			5 =>
				[
					'title' => 'The Adventures of Elmo in Grouchland',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Kevin Clash',
							1 => 'Mandy Patinkin',
							2 => 'Vanessa L. Williams',
						],
					'genres' =>
						[
							0 => 'Family',
						],
				],
			6 =>
				[
					'title' => 'American Beauty',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Kevin Spacey',
							1 => 'Annette Bening',
							2 => 'Chris Cooper',
							3 => 'Wes Bentley',
							4 => 'Thora Birch',
							5 => 'Mena Suvari',
							6 => 'Allison Janney',
							7 => 'Peter Gallagher',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			7 =>
				[
					'title' => 'American Movie',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Mark Borchardt',
							1 => 'Tom Schimmels',
						],
					'genres' =>
						[
							0 => 'Documentary',
						],
				],
			8 =>
				[
					'title' => 'American Pie',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Jason Biggs',
							1 => 'Seann William Scott',
							2 => 'Tara Reid',
							3 => 'Shannon Elizabeth',
							4 => 'Chris Klein',
							5 => 'Alyson Hannigan',
							6 => 'Thomas Ian Nicholas',
							7 => 'Mena Suvari',
							8 => 'Natasha Lyonne',
							9 => 'Eddie Kaye Thomas',
							10 => 'Eugene Levy',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			9 =>
				[
					'title' => 'Analyze This',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Robert De Niro',
							1 => 'Billy Crystal',
							2 => 'Lisa Kudrow',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			10 =>
				[
					'title' => 'Angel\'s Dance',
					'year' => 1999,
					'cast' =>
						[
							0 => 'James Belushi',
							1 => 'Sheryl Lee',
							2 => 'Kyle Chandler',
						],
					'genres' =>
						[
							0 => 'Action',
							1 => 'Comedy',
						],
				],
			11 =>
				[
					'title' => 'Animal Farm',
					'year' => 1999,
					'cast' =>
						[
							0 => '(voices of)',
							1 => 'Kelsey Grammer',
							2 => 'Ian Holm',
							3 => 'Paul Scofield',
							4 => 'Patrick Stewart',
							5 => 'Julia Ormond',
							6 => 'Peter Ustinov',
						],
					'genres' =>
						[
							0 => 'Family',
							1 => 'Animated',
						],
				],
			12 =>
				[
					'title' => 'Anna and the King',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Jodie Foster',
							1 => 'Chow Yun-fat',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			13 =>
				[
					'title' => 'Annie',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Alicia Morton',
							1 => 'Victor Garber',
							2 => 'Kathy Bates',
						],
					'genres' =>
						[
							0 => 'Musical',
						],
				],
			14 =>
				[
					'title' => 'Any Given Sunday',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Al Pacino',
							1 => 'Dennis Quaid',
							2 => 'Cameron Diaz',
							3 => 'Jamie Foxx',
							4 => 'James Woods',
							5 => 'LL Cool J',
							6 => 'John C. McGinley',
							7 => 'Ann-Margret',
						],
					'genres' =>
						[
							0 => 'Drama',
							1 => 'Sports',
						],
				],
			15 =>
				[
					'title' => 'Anywhere but Here',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Susan Sarandon',
							1 => 'Natalie Portman',
							2 => 'Shawn Hatosy',
							3 => 'Hart Bochner',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			16 =>
				[
					'title' => 'Arlington Road',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Jeff Bridges',
							1 => 'Tim Robbins',
							2 => 'Joan Cusack',
							3 => 'Hope Davis',
						],
					'genres' =>
						[
							0 => 'Thriller',
						],
				],
			17 =>
				[
					'title' => 'The Astronaut\'s Wife',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Johnny Depp',
							1 => 'Charlize Theron',
							2 => 'Joe Morton',
						],
					'genres' =>
						[
							0 => 'Science Fiction',
						],
				],
			18 =>
				[
					'title' => 'At First Sight',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Val Kilmer',
							1 => 'Mira Sorvino',
							2 => 'Kelly McGillis',
							3 => 'Nathan Lane',
							4 => 'Steven Weber',
						],
					'genres' =>
						[
							0 => 'Romance',
						],
				],
			19 =>
				[
					'title' => 'Atomic Train',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Rob Lowe',
							1 => 'Kristin Davis',
							2 => 'Esai Morales',
							3 => 'John Finn',
						],
					'genres' =>
						[
							0 => 'Action',
						],
				],
			20 =>
				[
					'title' => 'Austin Powers: The Spy Who Shagged Me',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Mike Myers',
							1 => 'Heather Graham',
							2 => 'Robert Wagner',
							3 => 'Seth Green',
							4 => 'Michael York',
							5 => 'Verne Troyer',
							6 => 'Will Ferrell',
						],
					'genres' =>
						[
							0 => 'Action',
							1 => 'Comedy',
						],
				],
			21 =>
				[
					'title' => 'Baby Geniuses',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Kathleen Turner',
							1 => 'Christopher Lloyd',
							2 => 'Peter MacNicol',
							3 => 'Kim Cattrall',
							4 => 'Ruby Dee',
							5 => 'Dom DeLuise',
						],
					'genres' =>
						[
							0 => 'Family',
						],
				],
			22 =>
				[
					'title' => 'The Bachelor',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Chris O\'Donnell',
							1 => 'Renée Zellweger',
							2 => 'Edward Asner',
						],
					'genres' =>
						[
							0 => 'Romance',
							1 => 'Comedy',
						],
				],
			23 =>
				[
					'title' => 'Bats',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Lou Diamond Phillips',
							1 => 'Dina Meyer',
						],
					'genres' =>
						[
							0 => 'Horror',
						],
				],
			24 =>
				[
					'title' => 'Being John Malkovich',
					'year' => 1999,
					'cast' =>
						[
							0 => 'John Cusack',
							1 => 'Cameron Diaz',
							2 => 'Catherine Keener',
							3 => 'John Malkovich',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			25 =>
				[
					'title' => 'Bellyfruit',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Michael Peña',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			26 =>
				[
					'title' => 'Beowulf',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Christopher Lambert',
							1 => 'Rhona Mitra',
						],
					'genres' =>
						[
							0 => 'Fantasy',
						],
				],
			27 =>
				[
					'title' => 'Best Laid Plans',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Reese Witherspoon',
							1 => 'Alessandro Nivola',
							2 => 'Josh Brolin',
						],
					'genres' =>
						[
							0 => 'Crime',
						],
				],
			28 =>
				[
					'title' => 'The Best Man',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Taye Diggs',
							1 => 'Monica Calhoun',
							2 => 'Morris Chestnut',
							3 => 'Nia Long',
						],
					'genres' =>
						[
							0 => 'Romance',
							1 => 'Comedy',
						],
				],
			29 =>
				[
					'title' => 'Beyond the Mat',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Mick Foley',
							1 => 'Terry Funk',
							2 => 'Jesse Ventura',
							3 => 'The Rock',
						],
					'genres' =>
						[
							0 => 'Documentary',
						],
				],
			30 =>
				[
					'title' => 'Bicentennial Man',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Robin Williams',
							1 => 'Sam Neill',
							2 => 'Embeth Davidtz',
							3 => 'Oliver Platt',
							4 => 'Wendy Crewson',
							5 => 'Hallie Kate Eisenberg',
						],
					'genres' =>
						[
							0 => 'Science Fiction',
						],
				],
			31 =>
				[
					'title' => 'Big Daddy',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Adam Sandler',
							1 => 'Cole and Dylan Sprouse',
							2 => 'Joey Lauren Adams',
							3 => 'Jon Stewart',
							4 => 'Rob Schneider',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			32 =>
				[
					'title' => 'The Big Kahuna',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Kevin Spacey',
							1 => 'Danny DeVito',
							2 => 'Peter Facinelli',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			33 =>
				[
					'title' => 'Black and White',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Robert Downey Jr.',
							1 => 'Gaby Hoffmann',
							2 => 'Jared Leto',
						],
					'genres' =>
						[
							0 => 'Crime',
						],
				],
			34 =>
				[
					'title' => 'The Blair Witch Project',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Heather Donahue',
							1 => 'Joshua Leonard',
							2 => 'Michael C. Williams',
						],
					'genres' =>
						[
							0 => 'Horror',
						],
				],
			35 =>
				[
					'title' => 'Blast from the Past',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Brendan Fraser',
							1 => 'Alicia Silverstone',
							2 => 'Christopher Walken',
							3 => 'Sissy Spacek',
							4 => 'Dave Foley',
						],
					'genres' =>
						[
							0 => 'Romance',
							1 => 'Comedy',
						],
				],
			36 =>
				[
					'title' => 'Blue Streak',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Martin Lawrence',
							1 => 'Luke Wilson',
							2 => 'Peter Greene',
							3 => 'Dave Chappelle',
						],
					'genres' =>
						[
							0 => 'Comedy',
							1 => 'Crime',
						],
				],
			37 =>
				[
					'title' => 'The Bone Collector',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Denzel Washington',
							1 => 'Angelina Jolie',
						],
					'genres' =>
						[
							0 => 'Crime',
						],
				],
			38 =>
				[
					'title' => 'The Boondock Saints',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Willem Dafoe',
							1 => 'Sean Patrick Flanery',
							2 => 'Norman Reedus',
						],
					'genres' =>
						[
							0 => 'Action',
						],
				],
			39 =>
				[
					'title' => 'Bowfinger',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Steve Martin',
							1 => 'Eddie Murphy',
							2 => 'Heather Graham',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			40 =>
				[
					'title' => 'Boys Don\'t Cry',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Hilary Swank',
							1 => 'Chloë Sevigny',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			41 =>
				[
					'title' => 'Breakfast of Champions',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Bruce Willis',
							1 => 'Albert Finney',
							2 => 'Nick Nolte',
							3 => 'Barbara Hershey',
							4 => 'Lukas Haas',
							5 => 'Omar Epps',
							6 => 'Glenne Headly',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			42 =>
				[
					'title' => 'Bringing Out the Dead',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Nicolas Cage',
							1 => 'Patricia Arquette',
							2 => 'John Goodman',
						],
					'genres' =>
						[
							0 => 'Thriller',
						],
				],
			43 =>
				[
					'title' => 'Brokedown Palace',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Claire Danes',
							1 => 'Kate Beckinsale',
							2 => 'Bill Pullman',
							3 => 'Lou Diamond Phillips',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			44 =>
				[
					'title' => 'But I\'m a Cheerleader',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Natasha Lyonne',
							1 => 'Cathy Moriarty',
							2 => 'RuPaul',
							3 => 'Clea DuVall',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			45 =>
				[
					'title' => 'Chill Factor',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Cuba Gooding Jr.',
							1 => 'Skeet Ulrich',
						],
					'genres' =>
						[
							0 => 'Action',
							1 => 'Comedy',
						],
				],
			46 =>
				[
					'title' => 'Chutney Popcorn',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Nisha Ganatra',
							1 => 'Jill Hennessy',
							2 => 'Madhur Jaffrey',
						],
					'genres' =>
						[
							0 => 'Comedy',
							1 => 'Drama',
						],
				],
			47 =>
				[
					'title' => 'The Cider House Rules',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Tobey Maguire',
							1 => 'Michael Caine',
							2 => 'Charlize Theron',
							3 => 'Paul Rudd',
							4 => 'Delroy Lindo',
							5 => 'Jane Alexander',
							6 => 'Kathy Baker',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			48 =>
				[
					'title' => 'Coming Soon',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Bonnie Root',
							1 => 'Gaby Hoffmann',
							2 => 'Mia Farrow',
						],
					'genres' =>
						[
							0 => 'Romance',
							1 => 'Comedy',
						],
				],
			49 =>
				[
					'title' => 'The Corruptor',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Chow Yun-fat',
							1 => 'Mark Wahlberg',
							2 => 'Ric Young',
						],
					'genres' =>
						[
							0 => 'Action',
						],
				],
			50 =>
				[
					'title' => 'Cradle Will Rock',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Hank Azaria',
							1 => 'Rubén Blades',
							2 => 'Joan Cusack',
							3 => 'John Cusack',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			51 =>
				[
					'title' => 'Crazy in Alabama',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Melanie Griffith',
							1 => 'Lucas Black',
							2 => 'David Morse',
							3 => 'Meat Loaf Aday',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			52 =>
				[
					'title' => 'The Crimson Code',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Patrick Muldoon',
							1 => 'Cathy Moriarty',
							2 => 'C. Thomas Howell',
							3 => 'Fred Ward',
						],
					'genres' =>
						[
							0 => 'Thriller',
						],
				],
			53 =>
				[
					'title' => 'Cruel Intentions',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Sarah Michelle Gellar',
							1 => 'Ryan Phillippe',
							2 => 'Reese Witherspoon',
							3 => 'Selma Blair',
							4 => 'Joshua Jackson',
							5 => 'Christine Baranski',
							6 => 'Swoosie Kurtz',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			54 =>
				[
					'title' => 'Deep Blue Sea',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Saffron Burrows',
							1 => 'Thomas Jane',
							2 => 'LL Cool J',
							3 => 'Jacqueline McKenzie',
							4 => 'Michael Rapaport',
							5 => 'Stellan Skarsgård',
							6 => 'Aida Turturro',
							7 => 'Samuel L. Jackson',
						],
					'genres' =>
						[
							0 => 'Horror',
						],
				],
			55 =>
				[
					'title' => 'The Deep End of the Ocean',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Michelle Pfeiffer',
							1 => 'Treat Williams',
							2 => 'Whoopi Goldberg',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			56 =>
				[
					'title' => 'Deterrence',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Kevin Pollak',
							1 => 'Timothy Hutton',
							2 => 'Sean Astin',
						],
					'genres' =>
						[
							0 => 'Thriller',
						],
				],
			57 =>
				[
					'title' => 'Detroit Rock City',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Giuseppe Andrews',
							1 => 'James DeBello',
							2 => 'Edward Furlong',
							3 => 'Sam Huntington',
							4 => 'Lin Shaye',
							5 => 'Melanie Lynskey',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			58 =>
				[
					'title' => 'Deuce Bigalow: Male Gigolo',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Rob Schneider',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			59 =>
				[
					'title' => 'Dick',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Kirsten Dunst',
							1 => 'Michelle Williams',
							2 => 'Dan Hedaya',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			60 =>
				[
					'title' => 'Dill Scallion',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Billy Burke',
							1 => 'Lauren Graham',
						],
					'genres' =>
						[
							0 => 'Satire',
						],
				],
			61 =>
				[
					'title' => 'A Dog of Flanders',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Jack Warden',
							1 => 'Jon Voight',
							2 => 'Cheryl Ladd',
						],
					'genres' =>
						[
							0 => 'Family',
						],
				],
			62 =>
				[
					'title' => 'Dogma',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Ben Affleck',
							1 => 'Matt Damon',
							2 => 'Linda Fiorentino',
							3 => 'Salma Hayek',
							4 => 'Jason Lee',
							5 => 'Alan Rickman',
							6 => 'Chris Rock',
							7 => 'Kevin Smith',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			63 =>
				[
					'title' => 'Double Jeopardy',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Tommy Lee Jones',
							1 => 'Ashley Judd',
							2 => 'Bruce Greenwood',
							3 => 'Annabeth Gish',
						],
					'genres' =>
						[
							0 => 'Thriller',
						],
				],
			64 =>
				[
					'title' => 'Drop Dead Gorgeous',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Kirstie Alley',
							1 => 'Ellen Barkin',
							2 => 'Kirsten Dunst',
							3 => 'Denise Richards',
						],
					'genres' =>
						[
							0 => 'Satire',
						],
				],
			65 =>
				[
					'title' => 'Dudley Do-Right',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Brendan Fraser',
							1 => 'Sarah Jessica Parker',
							2 => 'Alfred Molina',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			66 =>
				[
					'title' => 'EDtv',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Matthew McConaughey',
							1 => 'Jenna Elfman',
							2 => 'Woody Harrelson',
							3 => 'Elizabeth Hurley',
							4 => 'Ellen DeGeneres',
							5 => 'Sally Kirkland',
							6 => 'Rob Reiner',
							7 => 'Dennis Hopper',
							8 => 'Martin Landau',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			67 =>
				[
					'title' => 'Election',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Reese Witherspoon',
							1 => 'Matthew Broderick',
							2 => 'Chris Klein',
							3 => 'Molly Hagan',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			68 =>
				[
					'title' => 'End of Days',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Arnold Schwarzenegger',
							1 => 'Robin Tunney',
							2 => 'Gabriel Byrne',
							3 => 'Kevin Pollak',
							4 => 'Udo Kier',
							5 => 'C. C. H. Pounder',
							6 => 'Miriam Margolyes',
							7 => 'Rod Steiger',
						],
					'genres' =>
						[
							0 => 'Horror',
						],
				],
			69 =>
				[
					'title' => 'Entrapment',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Sean Connery',
							1 => 'Catherine Zeta-Jones',
							2 => 'Ving Rhames',
						],
					'genres' =>
						[
							0 => 'Crime',
							1 => 'Drama',
						],
				],
			70 =>
				[
					'title' => 'Entropy',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Stephen Dorff',
							1 => 'Judith Godrèche',
							2 => 'Kelly Macdonald',
						],
					'genres' =>
						[
							0 => 'Biography',
						],
				],
			71 =>
				[
					'title' => 'eXistenZ',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Jennifer Jason Leigh',
							1 => 'Jude Law',
							2 => 'Ian Holm',
						],
					'genres' =>
						[
							0 => 'Thriller',
						],
				],
			72 =>
				[
					'title' => 'Eye of the Beholder',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Ewan McGregor',
							1 => 'Ashley Judd',
						],
					'genres' =>
						[
							0 => 'Thriller',
						],
				],
			73 =>
				[
					'title' => 'Eyes Wide Shut',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Tom Cruise',
							1 => 'Nicole Kidman',
							2 => 'Sydney Pollack',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			74 =>
				[
					'title' => 'Fantasia 2000',
					'year' => 1999,
					'cast' =>
						[
							0 => 'James Levine',
							1 => 'Chicago Symphony Orchestra',
						],
					'genres' =>
						[
							0 => 'Family',
							1 => 'Animated',
						],
				],
			75 =>
				[
					'title' => 'Fight Club',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Brad Pitt',
							1 => 'Edward Norton',
							2 => 'Helena Bonham Carter',
						],
					'genres' =>
						[
							0 => 'Thriller',
						],
				],
			76 =>
				[
					'title' => 'Flawless',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Robert De Niro',
							1 => 'Philip Seymour Hoffman',
							2 => 'Chris Bauer',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			77 =>
				[
					'title' => 'The Florentine',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Jeremy Davies',
							1 => 'Virginia Madsen',
							2 => 'Luke Perry',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			78 =>
				[
					'title' => 'For Love of the Game',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Kevin Costner',
							1 => 'Kelly Preston',
							2 => 'John C. Reilly',
							3 => 'Jena Malone',
							4 => 'Brian Cox',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			79 =>
				[
					'title' => 'Forces of Nature',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Ben Affleck',
							1 => 'Sandra Bullock',
							2 => 'Steve Zahn',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			80 =>
				[
					'title' => 'Friends & Lovers',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Stephen Baldwin',
							1 => 'Claudia Schiffer',
							2 => 'Robert Downey Jr.',
						],
					'genres' =>
						[
							0 => 'Romance',
						],
				],
			81 =>
				[
					'title' => 'Galaxy Quest',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Tim Allen',
							1 => 'Alan Rickman',
							2 => 'Sigourney Weaver',
							3 => 'Tony Shalhoub',
							4 => 'Sam Rockwell',
							5 => 'Daryl Mitchell',
						],
					'genres' =>
						[
							0 => 'Science Fiction',
							1 => 'Comedy',
						],
				],
			82 =>
				[
					'title' => 'The General\'s Daughter',
					'year' => 1999,
					'cast' =>
						[
							0 => 'John Travolta',
							1 => 'Madeleine Stowe',
							2 => 'James Woods',
							3 => 'Timothy Hutton',
							4 => 'James Cromwell',
							5 => 'Clarence Williams III',
						],
					'genres' =>
						[
							0 => 'Crime',
							1 => 'Drama',
						],
				],
			83 =>
				[
					'title' => 'Ghost Dog: The Way of the Samurai',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Forest Whitaker',
						],
					'genres' =>
						[
							0 => 'Action',
						],
				],
			84 =>
				[
					'title' => 'Girl, Interrupted',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Winona Ryder',
							1 => 'Angelina Jolie',
							2 => 'Clea DuVall',
							3 => 'Brittany Murphy',
							4 => 'Vanessa Redgrave',
							5 => 'Whoopi Goldberg',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			85 =>
				[
					'title' => 'Gloria',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Sharon Stone',
							1 => 'Jeremy Northam',
							2 => 'Cathy Moriarty',
							3 => 'George C. Scott',
						],
					'genres' =>
						[
							0 => 'Crime',
							1 => 'Drama',
						],
				],
			86 =>
				[
					'title' => 'Go',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Sarah Polley',
							1 => 'Desmond Askew',
							2 => 'Scott Wolf',
							3 => 'Katie Holmes',
							4 => 'Jay Mohr',
							5 => 'Taye Diggs',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			87 =>
				[
					'title' => 'The Green Mile',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Tom Hanks',
							1 => 'David Morse',
							2 => 'Bonnie Hunt',
							3 => 'Michael Clarke Duncan',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			88 =>
				[
					'title' => 'Guinevere',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Stephen Rea',
							1 => 'Sarah Polley',
							2 => 'Gina Gershon',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			89 =>
				[
					'title' => 'Happy, Texas',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Steve Zahn',
							1 => 'Jeremy Northam',
							2 => 'Ally Walker',
							3 => 'Illeana Douglas',
							4 => 'William H. Macy',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			90 =>
				[
					'title' => 'The Haunting',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Liam Neeson',
							1 => 'Catherine Zeta-Jones',
							2 => 'Lili Taylor',
							3 => 'Owen Wilson',
						],
					'genres' =>
						[
							0 => 'Horror',
						],
				],
			91 =>
				[
					'title' => 'Heaven or Vegas',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Richard Grieco',
							1 => 'Yasmine Bleeth',
							2 => 'Andy Romano',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			92 =>
				[
					'title' => 'Held Up',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Jamie Foxx',
							1 => 'Nia Long',
							2 => 'Barry Corbin',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			93 =>
				[
					'title' => 'The Hi-Line',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Rachael Leigh Cook',
							1 => 'Ryan Alosio',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			94 =>
				[
					'title' => 'House on Haunted Hill',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Geoffrey Rush',
							1 => 'Famke Janssen',
							2 => 'Taye Diggs',
							3 => 'Peter Gallagher',
							4 => 'Chris Kattan',
							5 => 'Ali Larter',
							6 => 'Bridgette Wilson',
							7 => 'Max Perlich',
						],
					'genres' =>
						[
							0 => 'Horror',
						],
				],
			95 =>
				[
					'title' => 'The Hurricane',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Denzel Washington',
						],
					'genres' =>
						[
							0 => 'Drama',
							1 => 'Biography',
						],
				],
			96 =>
				[
					'title' => 'An Ideal Husband',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Rupert Everett',
							1 => 'Cate Blanchett',
							2 => 'Minnie Driver',
							3 => 'Julianne Moore',
							4 => 'Jeremy Northam',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			97 =>
				[
					'title' => 'Idle Hands',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Devon Sawa',
							1 => 'Seth Green',
							2 => 'Jessica Alba',
							3 => 'Vivica A. Fox',
							4 => 'Elden Henson',
						],
					'genres' =>
						[
							0 => 'Horror',
							1 => 'Comedy',
						],
				],
			98 =>
				[
					'title' => 'In Dreams',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Annette Bening',
							1 => 'Katie Sagona',
							2 => 'Aidan Quinn',
							3 => 'Robert Downey Jr.',
							4 => 'Stephen Rea',
						],
					'genres' =>
						[
							0 => 'Thriller',
						],
				],
			99 =>
				[
					'title' => 'In Too Deep',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Omar Epps',
							1 => 'LL Cool J',
							2 => 'Stanley Tucci',
							3 => 'Pam Grier',
						],
					'genres' =>
						[
							0 => 'Crime',
						],
				],
			100 =>
				[
					'title' => 'The Insider',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Al Pacino',
							1 => 'Russell Crowe',
							2 => 'Christopher Plummer',
							3 => 'Philip Baker Hall',
							4 => 'Michael Gambon',
							5 => 'Wings Hauser',
							6 => 'Gina Gershon',
						],
					'genres' =>
						[
							0 => 'Drama',
							1 => 'Biography',
						],
				],
			101 =>
				[
					'title' => 'Inspector Gadget',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Matthew Broderick',
							1 => 'Rupert Everett',
							2 => 'Joely Fisher',
							3 => 'Michelle Trachtenberg',
							4 => 'Andy Dick',
						],
					'genres' =>
						[
							0 => 'Action',
							1 => 'Comedy',
							2 => 'Family',
						],
				],
			102 =>
				[
					'title' => 'Instinct',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Anthony Hopkins',
							1 => 'Cuba Gooding Jr.',
							2 => 'Donald Sutherland',
							3 => 'Maura Tierney',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			103 =>
				[
					'title' => 'The Iron Giant',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Jennifer Aniston',
							1 => 'Harry Connick Jr.',
							2 => 'Vin Diesel',
						],
					'genres' =>
						[
							0 => 'Animated',
							1 => 'Science Fiction',
							2 => 'Drama',
							3 => 'Family',
						],
				],
			104 =>
				[
					'title' => 'Jakob the Liar',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Robin Williams',
							1 => 'Alan Arkin',
							2 => 'Liev Schreiber',
						],
					'genres' =>
						[
							0 => 'Comedy',
							1 => 'Drama',
						],
				],
			105 =>
				[
					'title' => 'Jawbreaker',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Rose McGowan',
							1 => 'Rebecca Gayheart',
							2 => 'Julie Benz',
						],
					'genres' =>
						[
							0 => 'Comedy',
							1 => 'Horror',
						],
				],
			106 =>
				[
					'title' => 'Jesus\' Son',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Billy Crudup',
							1 => 'Samantha Morton',
							2 => 'Denis Leary',
							3 => 'Holly Hunter',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			107 =>
				[
					'title' => 'Joe the King',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Noah Fleiss',
							1 => 'Val Kilmer',
							2 => 'Karen Young',
							3 => 'Ethan Hawke',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			108 =>
				[
					'title' => 'Just a Little Harmless Sex',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Alison Eastwood',
							1 => 'Rachel Hunter',
							2 => 'Lauren Hutton',
						],
					'genres' =>
						[
							0 => 'Romance',
							1 => 'Comedy',
						],
				],
			109 =>
				[
					'title' => 'Just the Ticket',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Andy García',
							1 => 'Andie MacDowell',
						],
					'genres' =>
						[
							0 => 'Romance',
							1 => 'Comedy',
						],
				],
			110 =>
				[
					'title' => 'K-911',
					'year' => 1999,
					'cast' =>
						[
							0 => 'James Belushi',
							1 => 'Christine Tucci',
							2 => 'James Handy',
						],
					'genres' =>
						[
							0 => 'Crime',
							1 => 'Comedy',
						],
				],
			111 =>
				[
					'title' => 'The King and I',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Miranda Richardson',
							1 => 'Martin Vidnovic',
							2 => 'Ian Richardson',
						],
					'genres' =>
						[
							0 => 'Animated',
						],
				],
			112 =>
				[
					'title' => 'Kiss the Sky',
					'year' => 1999,
					'cast' =>
						[
							0 => 'William Petersen',
							1 => 'Gary Cole',
							2 => 'Sheryl Lee',
							3 => 'Terence Stamp',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			113 =>
				[
					'title' => 'Kiss Toledo Goodbye',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Michael Rapaport',
							1 => 'Christopher Walken',
							2 => 'Christine Taylor',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			114 =>
				[
					'title' => 'Lake Placid',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Bill Pullman',
							1 => 'Bridget Fonda',
							2 => 'Oliver Platt',
							3 => 'Brendan Gleeson',
							4 => 'Betty White',
						],
					'genres' =>
						[
							0 => 'Horror',
							1 => 'Comedy',
						],
				],
			115 =>
				[
					'title' => 'Liberty Heights',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Adrien Brody',
							1 => 'Ben Foster',
							2 => 'Orlando Jones',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			116 =>
				[
					'title' => 'Life',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Eddie Murphy',
							1 => 'Martin Lawrence',
							2 => 'Bernie Mac',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			117 =>
				[
					'title' => 'Light It Up',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Usher Raymond',
							1 => 'Forest Whitaker',
							2 => 'Judd Nelson',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			118 =>
				[
					'title' => 'The Limey',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Terence Stamp',
							1 => 'Lesley Ann Warren',
							2 => 'Luis Guzmán',
							3 => 'Peter Fonda',
						],
					'genres' =>
						[
							0 => 'Crime',
							1 => 'Drama',
						],
				],
			119 =>
				[
					'title' => 'Lost & Found',
					'year' => 1999,
					'cast' =>
						[
							0 => 'David Spade',
							1 => 'Sophie Marceau',
							2 => 'Martin Sheen',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			120 =>
				[
					'title' => 'The Love Letter',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Kate Capshaw',
							1 => 'Ellen DeGeneres',
							2 => 'Tom Everett Scott',
							3 => 'Tom Selleck',
						],
					'genres' =>
						[
							0 => 'Romance',
							1 => 'Comedy',
						],
				],
			121 =>
				[
					'title' => 'Love Stinks',
					'year' => 1999,
					'cast' =>
						[
							0 => 'French Stewart',
							1 => 'Bridgette Wilson',
							2 => 'Bill Bellamy',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			122 =>
				[
					'title' => 'Lovers Lane',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Erin J. Dean',
							1 => 'Riley Smith',
							2 => 'Sarah Lancaster',
						],
					'genres' =>
						[
							0 => 'Horror',
						],
				],
			123 =>
				[
					'title' => 'Lycanthrope',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Robert Carradine',
							1 => 'Michael Winslow',
							2 => 'Rebecca Holden',
						],
					'genres' =>
						[
							0 => 'Horror',
						],
				],
			124 =>
				[
					'title' => 'Magnolia',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Tom Cruise',
							1 => 'Julianne Moore',
							2 => 'Philip Seymour Hoffman',
							3 => 'Philip Baker Hall',
							4 => 'John C. Reilly',
							5 => 'William H. Macy',
							6 => 'Jason Robards',
							7 => 'Jeremy Blackman',
							8 => 'Melora Walters',
							9 => 'Melinda Dillon',
							10 => 'Henry Gibson',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			125 =>
				[
					'title' => 'Man of the Century',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Gibson Frazier',
							1 => 'Cara Buono',
							2 => 'Susan Egan',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			126 =>
				[
					'title' => 'Man on the Moon',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Jim Carrey',
							1 => 'Danny DeVito',
							2 => 'Courtney Love',
							3 => 'Paul Giamatti',
						],
					'genres' =>
						[
							0 => 'Biography',
						],
				],
			127 =>
				[
					'title' => 'A Map of the World',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Sigourney Weaver',
							1 => 'Julianne Moore',
							2 => 'David Strathairn',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			128 =>
				[
					'title' => 'The Mating Habits of the Earthbound Human',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Carmen Electra',
							1 => 'Mackenzie Astin',
							2 => 'Lucy Liu',
						],
					'genres' =>
						[
							0 => 'Satire',
						],
				],
			129 =>
				[
					'title' => 'The Matrix',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Keanu Reeves',
							1 => 'Laurence Fishburne',
							2 => 'Carrie-Anne Moss',
							3 => 'Hugo Weaving',
							4 => 'Joe Pantoliano',
						],
					'genres' =>
						[
							0 => 'Science Fiction',
						],
				],
			130 =>
				[
					'title' => 'Message in a Bottle',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Kevin Costner',
							1 => 'Robin Wright Penn',
							2 => 'Paul Newman',
						],
					'genres' =>
						[
							0 => 'Romance',
							1 => 'Drama',
						],
				],
			131 =>
				[
					'title' => 'The Messenger: The Story of Joan of Arc',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Milla Jovovich',
							1 => 'John Malkovich',
							2 => 'Faye Dunaway',
							3 => 'Dustin Hoffman',
						],
					'genres' =>
						[
							0 => 'Biography',
						],
				],
			132 =>
				[
					'title' => 'Mickey Blue Eyes',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Hugh Grant',
							1 => 'James Caan',
							2 => 'Jeanne Tripplehorn',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			133 =>
				[
					'title' => 'A Midsummer Night\'s Dream',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Kevin Kline',
							1 => 'Michelle Pfeiffer',
							2 => 'Rupert Everett',
							3 => 'Stanley Tucci',
							4 => 'Calista Flockhart',
							5 => 'Anna Friel',
							6 => 'Christian Bale',
						],
					'genres' =>
						[
						],
				],
			134 =>
				[
					'title' => 'Miss Julie',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Saffron Burrows',
							1 => 'Peter Mullan',
							2 => 'Maria Doyle Kennedy',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			135 =>
				[
					'title' => 'The Mod Squad',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Claire Danes',
							1 => 'Omar Epps',
							2 => 'Giovanni Ribisi',
						],
					'genres' =>
						[
							0 => 'Action',
						],
				],
			136 =>
				[
					'title' => 'Mr. Death',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Fred A. Leuchter',
							1 => 'David Irving',
							2 => 'Ernst Zündel',
						],
					'genres' =>
						[
							0 => 'Documentary',
						],
				],
			137 =>
				[
					'title' => 'Mumford',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Loren Dean',
							1 => 'Jason Lee',
							2 => 'Hope Davis',
							3 => 'Alfre Woodard',
							4 => 'Mary McDonnell',
							5 => 'Ted Danson',
							6 => 'Martin Short',
							7 => 'Zooey Deschanel',
							8 => 'Pruitt Taylor Vince',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			138 =>
				[
					'title' => 'The Mummy',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Brendan Fraser',
							1 => 'Rachel Weisz',
							2 => 'John Hannah',
							3 => 'Oded Fehr',
							4 => 'Arnold Vosloo',
						],
					'genres' =>
						[
							0 => 'Action',
						],
				],
			139 =>
				[
					'title' => 'Muppets from Space',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Dave Goelz',
							1 => 'Steve Whitmire',
							2 => 'Bill Barretta',
							3 => 'Frank Oz',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			140 =>
				[
					'title' => 'The Muse',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Albert Brooks',
							1 => 'Sharon Stone',
							2 => 'Andie MacDowell',
							3 => 'Jeff Bridges',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			141 =>
				[
					'title' => 'Music of the Heart',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Meryl Streep',
							1 => 'Angela Bassett',
							2 => 'Aidan Quinn',
							3 => 'Gloria Estefan',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			142 =>
				[
					'title' => 'My Favorite Martian',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Christopher Lloyd',
							1 => 'Jeff Daniels',
							2 => 'Elizabeth Hurley',
							3 => 'Daryl Hannah',
							4 => 'Wallace Shawn',
							5 => 'Ray Walston',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			143 =>
				[
					'title' => 'My Voyage to Italy',
					'year' => 1999,
					'cast' =>
						[
						],
					'genres' =>
						[
							0 => 'Documentary',
						],
				],
			144 =>
				[
					'title' => 'Mystery, Alaska',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Russell Crowe',
							1 => 'Burt Reynolds',
							2 => 'Colm Meaney',
						],
					'genres' =>
						[
							0 => 'Comedy',
							1 => 'Sports',
						],
				],
			145 =>
				[
					'title' => 'Mystery Men',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Ben Stiller',
							1 => 'Hank Azaria',
							2 => 'William H. Macy',
							3 => 'Janeane Garofalo',
							4 => 'Wes Studi',
							5 => 'Paul Reubens',
							6 => 'Kel Mitchell',
							7 => 'Greg Kinnear',
							8 => 'Geoffrey Rush',
							9 => 'Lena Olin',
							10 => 'Claire Forlani',
							11 => 'Tom Waits',
						],
					'genres' =>
						[
							0 => 'Superhero',
							1 => 'Comedy',
						],
				],
			146 =>
				[
					'title' => 'Never Been Kissed',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Drew Barrymore',
							1 => 'David Arquette',
							2 => 'Molly Shannon',
							3 => 'James Franco',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			147 =>
				[
					'title' => 'The Ninth Gate',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Johnny Depp',
							1 => 'Lena Olin',
							2 => 'Frank Langella',
						],
					'genres' =>
						[
							0 => 'Horror',
						],
				],
			148 =>
				[
					'title' => 'Ninth Street',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Don Washington',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			149 =>
				[
					'title' => 'Notting Hill',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Julia Roberts',
							1 => 'Hugh Grant',
							2 => 'Hugh Bonneville',
							3 => 'Emma Chambers',
							4 => 'James Dreyfus',
							5 => 'Rhys Ifans',
							6 => 'Tim McInnerny',
							7 => 'Gina McKee',
						],
					'genres' =>
						[
							0 => 'Romance',
							1 => 'Comedy',
						],
				],
			150 =>
				[
					'title' => 'October Sky',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Jake Gyllenhaal',
							1 => 'Chris Cooper',
							2 => 'Laura Dern',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			151 =>
				[
					'title' => 'Office Space',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Ron Livingston',
							1 => 'Jennifer Aniston',
							2 => 'Stephen Root',
							3 => 'Gary Cole',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			152 =>
				[
					'title' => 'The Omega Code',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Casper Van Dien',
							1 => 'Michael York',
						],
					'genres' =>
						[
							0 => 'Action',
						],
				],
			153 =>
				[
					'title' => 'One Man\'s Hero',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Tom Berenger',
							1 => 'Joaquim de Almeida',
							2 => 'Daniela Romo',
						],
					'genres' =>
						[
							0 => 'War',
						],
				],
			154 =>
				[
					'title' => 'The Other Sister',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Juliette Lewis',
							1 => 'Diane Keaton',
							2 => 'Tom Skerritt',
							3 => 'Giovanni Ribisi',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			155 =>
				[
					'title' => 'Our Friend, Martin',
					'year' => 1999,
					'cast' =>
						[
						],
					'genres' =>
						[
							0 => 'Animated',
						],
				],
			156 =>
				[
					'title' => 'P.U.N.K.S.',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Tim Redwine',
							1 => 'Jessica Alba',
							2 => 'Brandon Baker',
						],
					'genres' =>
						[
							0 => 'Teen',
							1 => 'Comedy',
						],
				],
			157 =>
				[
					'title' => 'The Passion of Ayn Rand',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Helen Mirren',
							1 => 'Eric Stoltz',
							2 => 'Peter Fonda',
						],
					'genres' =>
						[
							0 => 'Biography',
						],
				],
			158 =>
				[
					'title' => 'Passport to Paris',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Mary-Kate Olsen',
							1 => 'Ashley Olsen',
						],
					'genres' =>
						[
							0 => 'Romance',
							1 => 'Comedy',
						],
				],
			159 =>
				[
					'title' => 'Payback',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Mel Gibson',
							1 => 'Gregg Henry',
							2 => 'Maria Bello',
							3 => 'Lucy Liu',
						],
					'genres' =>
						[
							0 => 'Crime',
							1 => 'Drama',
						],
				],
			160 =>
				[
					'title' => 'Play It to the Bone',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Antonio Banderas',
							1 => 'Woody Harrelson',
							2 => 'Lolita Davidovich',
							3 => 'Lucy Liu',
						],
					'genres' =>
						[
							0 => 'Comedy',
							1 => 'Drama',
						],
				],
			161 =>
				[
					'title' => 'Pushing Tin',
					'year' => 1999,
					'cast' =>
						[
							0 => 'John Cusack',
							1 => 'Billy Bob Thornton',
							2 => 'Cate Blanchett',
							3 => 'Angelina Jolie',
						],
					'genres' =>
						[
							0 => 'Comedy',
							1 => 'Drama',
						],
				],
			162 =>
				[
					'title' => 'The Rage: Carrie 2',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Emily Bergl',
							1 => 'Mena Suvari',
							2 => 'Jason London',
							3 => 'Amy Irving',
						],
					'genres' =>
						[
							0 => 'Horror',
						],
				],
			163 =>
				[
					'title' => 'Random Hearts',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Harrison Ford',
							1 => 'Kristin Scott Thomas',
							2 => 'Charles S. Dutton',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			164 =>
				[
					'title' => 'Ravenous',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Guy Pearce',
							1 => 'Robert Carlyle',
							2 => 'Jeremy Davies',
							3 => 'Jeffrey Jones',
							4 => 'John Spencer',
							5 => 'Stephen Spinella',
							6 => 'Neal McDonough',
							7 => 'David Arquette',
						],
					'genres' =>
						[
							0 => 'Horror',
						],
				],
			165 =>
				[
					'title' => 'Retro Puppet Master',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Greg Sestero',
							1 => 'Brigitta Dau',
							2 => 'Jack Donner',
						],
					'genres' =>
						[
							0 => 'Horror',
						],
				],
			166 =>
				[
					'title' => 'Revelation aka Apocalypse',
					'year' => 1999,
					'cast' =>
						[
						],
					'genres' =>
						[
							0 => 'Thriller',
						],
				],
			167 =>
				[
					'title' => 'Rites of Passage',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Dean Stockwell',
							1 => 'James Remar',
							2 => 'Jason Behr',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			168 =>
				[
					'title' => 'Runaway Bride',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Richard Gere',
							1 => 'Julia Roberts',
							2 => 'Joan Cusack',
						],
					'genres' =>
						[
							0 => 'Romance',
							1 => 'Comedy',
						],
				],
			169 =>
				[
					'title' => 'The Runner',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Ron Eldard',
							1 => 'Courteney Cox',
							2 => 'John Goodman',
						],
					'genres' =>
						[
							0 => 'Thriller',
						],
				],
			170 =>
				[
					'title' => 'She\'s All That',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Freddie Prinze Jr.',
							1 => 'Rachael Leigh Cook',
							2 => 'Matthew Lillard',
							3 => 'Paul Walker',
							4 => 'Jodi Lyn O\'Keefe',
							5 => 'Kieran Culkin',
							6 => 'Anna Paquin',
						],
					'genres' =>
						[
							0 => 'Romance',
							1 => 'Comedy',
						],
				],
			171 =>
				[
					'title' => 'Simon Sez',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Dennis Rodman',
							1 => 'Dane Cook',
						],
					'genres' =>
						[
							0 => 'Action',
							1 => 'Comedy',
						],
				],
			172 =>
				[
					'title' => 'Simply Irresistible',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Sarah Michelle Gellar',
							1 => 'Sean Patrick Flanery',
							2 => 'Patricia Clarkson',
						],
					'genres' =>
						[
							0 => 'Romance',
							1 => 'Comedy',
						],
				],
			173 =>
				[
					'title' => 'The Sixth Sense',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Bruce Willis',
							1 => 'Haley Joel Osment',
							2 => 'Toni Collette',
							3 => 'Donnie Wahlberg',
							4 => 'Olivia Williams',
						],
					'genres' =>
						[
							0 => 'Suspense',
						],
				],
			174 =>
				[
					'title' => 'Sleepy Hollow',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Johnny Depp',
							1 => 'Christina Ricci',
							2 => 'Miranda Richardson',
							3 => 'Casper Van Dien',
						],
					'genres' =>
						[
							0 => 'Horror',
						],
				],
			175 =>
				[
					'title' => 'A Slipping-Down Life',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Lili Taylor',
							1 => 'Guy Pearce',
						],
					'genres' =>
						[
							0 => 'Romance',
						],
				],
			176 =>
				[
					'title' => 'Snow Falling on Cedars',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Ethan Hawke',
							1 => 'Youki Kudoh',
							2 => 'Reeve Carney',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			177 =>
				[
					'title' => 'South Park: Bigger, Longer & Uncut',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Trey Parker',
							1 => 'Matt Stone',
							2 => 'Mary Kay Bergman',
							3 => 'Isaac Hayes',
						],
					'genres' =>
						[
							0 => 'Animated',
							1 => 'Musical',
							2 => 'Comedy',
						],
				],
			178 =>
				[
					'title' => 'Speedway Junky',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Jesse Bradford',
							1 => 'Jordan Brower',
							2 => 'Daryl Hannah',
						],
					'genres' =>
						[
							0 => 'Action',
						],
				],
			179 =>
				[
					'title' => 'Star Wars: Episode I – The Phantom Menace',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Liam Neeson',
							1 => 'Ewan McGregor',
							2 => 'Natalie Portman',
							3 => 'Jake Lloyd',
						],
					'genres' =>
						[
							0 => 'Science Fiction',
						],
				],
			180 =>
				[
					'title' => 'Stigmata',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Patricia Arquette',
							1 => 'Gabriel Byrne',
							2 => 'Jonathan Pryce',
						],
					'genres' =>
						[
							0 => 'Horror',
						],
				],
			181 =>
				[
					'title' => 'Stir of Echoes',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Kevin Bacon',
							1 => 'Kathryn Erbe',
							2 => 'Illeana Douglas',
						],
					'genres' =>
						[
							0 => 'Horror',
						],
				],
			182 =>
				[
					'title' => 'Storm',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Christian McIntire',
							1 => 'Luke Perry',
							2 => 'Robert Knott',
							3 => 'Alexandra Powers',
						],
					'genres' =>
						[
							0 => 'Thriller',
						],
				],
			183 =>
				[
					'title' => 'The Story of Us',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Bruce Willis',
							1 => 'Michelle Pfeiffer',
						],
					'genres' =>
						[
							0 => 'Romance',
							1 => 'Drama',
						],
				],
			184 =>
				[
					'title' => 'The Straight Story',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Richard Farnsworth',
							1 => 'Sissy Spacek',
							2 => 'Harry Dean Stanton',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			185 =>
				[
					'title' => 'Stuart Little',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Geena Davis',
							1 => 'Hugh Laurie',
							2 => 'Jonathan Lipnicki',
						],
					'genres' =>
						[
							0 => 'Family',
						],
				],
			186 =>
				[
					'title' => 'Summer of Sam',
					'year' => 1999,
					'cast' =>
						[
							0 => 'John Leguizamo',
							1 => 'Adrien Brody',
							2 => 'Mira Sorvino',
							3 => 'Jennifer Esposito',
						],
					'genres' =>
						[
							0 => 'Crime',
							1 => 'Drama',
						],
				],
			187 =>
				[
					'title' => 'Superstar',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Molly Shannon',
							1 => 'Will Ferrell',
							2 => 'Harland Williams',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			188 =>
				[
					'title' => 'Sweet and Lowdown',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Sean Penn',
							1 => 'Samantha Morton',
							2 => 'Anthony LaPaglia',
							3 => 'Uma Thurman',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			189 =>
				[
					'title' => 'The Talented Mr. Ripley',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Matt Damon',
							1 => 'Gwyneth Paltrow',
							2 => 'Jude Law',
							3 => 'Cate Blanchett',
							4 => 'Philip Seymour Hoffman',
							5 => 'Philip Baker Hall',
							6 => 'James Rebhorn',
						],
					'genres' =>
						[
							0 => 'Thriller',
						],
				],
			190 =>
				[
					'title' => 'Tarzan',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Tony Goldwyn',
							1 => 'Minnie Driver',
							2 => 'Glenn Close',
							3 => 'Rosie O\'Donnell',
							4 => 'Brian Blessed',
							5 => 'Nigel Hawthorne',
							6 => 'Lance Henriksen',
							7 => 'Wayne Knight',
						],
					'genres' =>
						[
							0 => 'Animated',
						],
				],
			191 =>
				[
					'title' => 'Teaching Mrs. Tingle',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Helen Mirren',
							1 => 'Katie Holmes',
							2 => 'Barry Watson',
							3 => 'Marisa Coughlan',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			192 =>
				[
					'title' => 'That Championship Season',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Gary Sinise',
							1 => 'Vincent D\'Onofrio',
							2 => 'Tony Shalhoub',
							3 => 'Terry Kinney',
							4 => 'Paul Sorvino',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			193 =>
				[
					'title' => 'Thicker than Water',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Mack 10',
							1 => 'Fat Joe',
							2 => 'Ice Cube',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			194 =>
				[
					'title' => 'The Thirteenth Floor',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Craig Bierko',
							1 => 'Gretchen Mol',
							2 => 'Vincent D\'Onofrio',
						],
					'genres' =>
						[
							0 => 'Science Fiction',
						],
				],
			195 =>
				[
					'title' => 'The Thirteenth Year',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Chez Starbuck',
							1 => 'Courtnee Draper',
						],
					'genres' =>
						[
							0 => 'Family',
						],
				],
			196 =>
				[
					'title' => 'The Thomas Crown Affair',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Pierce Brosnan',
							1 => 'Rene Russo',
							2 => 'Denis Leary',
						],
					'genres' =>
						[
							0 => 'Crime',
						],
				],
			197 =>
				[
					'title' => 'Three Kings',
					'year' => 1999,
					'cast' =>
						[
							0 => 'George Clooney',
							1 => 'Mark Wahlberg',
							2 => 'Ice Cube',
							3 => 'Spike Jonze',
						],
					'genres' =>
						[
							0 => 'War',
							1 => 'Comedy',
						],
				],
			198 =>
				[
					'title' => 'Three to Tango',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Matthew Perry',
							1 => 'Neve Campbell',
							2 => 'Dylan McDermott',
						],
					'genres' =>
						[
							0 => 'Romance',
							1 => 'Comedy',
						],
				],
			199 =>
				[
					'title' => 'Titus',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Anthony Hopkins',
							1 => 'Jessica Lange',
							2 => 'Alan Cumming',
						],
					'genres' =>
						[
						],
				],
			200 =>
				[
					'title' => 'Toy Story 2',
					'year' => 1999,
					'cast' =>
						[
							0 => 'voices of',
							1 => 'Tom Hanks',
							2 => 'Tim Allen',
							3 => 'Annie Potts',
							4 => 'Don Rickles',
						],
					'genres' =>
						[
							0 => 'Animated',
							1 => 'Comedy',
							2 => 'Family',
						],
				],
			201 =>
				[
					'title' => 'Trippin\'',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Deon Richmond',
							1 => 'Countess Vaughn',
							2 => 'Maia Campbell',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			202 =>
				[
					'title' => 'True Crime',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Clint Eastwood',
							1 => 'Isaiah Washington',
							2 => 'Denis Leary',
						],
					'genres' =>
						[
							0 => 'Crime',
							1 => 'Drama',
						],
				],
			203 =>
				[
					'title' => 'Tumbleweeds',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Janet McTeer',
							1 => 'Kimberly J. Brown',
							2 => 'Gavin O\'Connor',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			204 =>
				[
					'title' => 'Twin Falls Idaho',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Mark Polish',
							1 => 'Michael Polish',
							2 => 'Michele Hicks',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			205 =>
				[
					'title' => 'Universal Soldier: The Return',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Jean-Claude Van Damme',
							1 => 'Michael Jai White',
						],
					'genres' =>
						[
							0 => 'Action',
						],
				],
			206 =>
				[
					'title' => 'Varsity Blues',
					'year' => 1999,
					'cast' =>
						[
							0 => 'James Van Der Beek',
							1 => 'Jon Voight',
							2 => 'Paul Walker',
							3 => 'Amy Smart',
							4 => 'Scott Caan',
							5 => 'Ron Lester',
							6 => 'Ali Larter',
							7 => 'Eliel Swinton',
						],
					'genres' =>
						[
							0 => 'Comedy',
							1 => 'Drama',
							2 => 'Sports',
						],
				],
			207 =>
				[
					'title' => 'The Virgin Suicides',
					'year' => 1999,
					'cast' =>
						[
							0 => 'James Woods',
							1 => 'Kathleen Turner',
							2 => 'Kirsten Dunst',
							3 => 'Josh Hartnett',
							4 => 'A. J. Cook',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			208 =>
				[
					'title' => 'Virus',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Jamie Lee Curtis',
							1 => 'William Baldwin',
							2 => 'Donald Sutherland',
						],
					'genres' =>
						[
							0 => 'Science Fiction',
							1 => 'Horror',
						],
				],
			209 =>
				[
					'title' => 'The Waiting Game',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Will Arnett',
							1 => 'Dwight Ewell',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			210 =>
				[
					'title' => 'Wakko\'s Wish',
					'year' => 1999,
					'cast' =>
						[
						],
					'genres' =>
						[
							0 => 'Animated',
						],
				],
			211 =>
				[
					'title' => 'A Walk on the Moon',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Diane Lane',
							1 => 'Viggo Mortensen',
							2 => 'Liev Schreiber',
							3 => 'Anna Paquin',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			212 =>
				[
					'title' => 'Walking Across Egypt',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Ellen Burstyn',
							1 => 'Jonathan Taylor Thomas',
							2 => 'Mark Hamill',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			213 =>
				[
					'title' => 'When the Day Breaks',
					'year' => 1999,
					'cast' =>
						[
						],
					'genres' =>
						[
							0 => 'Animated',
						],
				],
			214 =>
				[
					'title' => 'Whiteboyz',
					'year' => 1999,
					'cast' =>
						[
						],
					'genres' =>
						[
							0 => 'Independent',
						],
				],
			215 =>
				[
					'title' => 'Wild Wild West',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Will Smith',
							1 => 'Kevin Kline',
							2 => 'Kenneth Branagh',
							3 => 'Salma Hayek',
						],
					'genres' =>
						[
							0 => 'Action',
							1 => 'Comedy',
						],
				],
			216 =>
				[
					'title' => 'Wing Commander',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Freddie Prinze Jr.',
							1 => 'Saffron Burrows',
							2 => 'Matthew Lillard',
							3 => 'Tchéky Karyo',
							4 => 'Jürgen Prochnow',
							5 => 'David Suchet',
						],
					'genres' =>
						[
							0 => 'Science Fiction',
						],
				],
			217 =>
				[
					'title' => 'Winnie the Pooh: Seasons of Giving',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Jim Cummings',
							1 => 'John Fiedler',
							2 => 'Brady Bluhm',
						],
					'genres' =>
						[
							0 => 'Animated',
						],
				],
			218 =>
				[
					'title' => 'Wisconsin Death Trip',
					'year' => 1999,
					'cast' =>
						[
						],
					'genres' =>
						[
						],
				],
			219 =>
				[
					'title' => 'The Woman Chaser',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Patrick Warburton',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			220 =>
				[
					'title' => 'A Woman Scorned',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Marcia Johnson',
						],
					'genres' =>
						[
							0 => 'Thriller',
						],
				],
			221 =>
				[
					'title' => 'The Wood',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Omar Epps',
							1 => 'Richard T. Jones',
							2 => 'Taye Diggs',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
			222 =>
				[
					'title' => 'The World Is Not Enough',
					'year' => 1999,
					'cast' =>
						[
							0 => 'Pierce Brosnan',
							1 => 'Sophie Marceau',
							2 => 'Robert Carlyle',
						],
					'genres' =>
						[
							0 => 'Spy',
							1 => 'Action',
						],
				],
			223 =>
				[
					'title' => '102 Dalmatians',
					'year' => 2000,
					'cast' =>
						[
							0 => 'Glenn Close',
							1 => 'Gérard Depardieu',
							2 => 'Alice Evans',
						],
					'genres' =>
						[
							0 => 'Comedy',
							1 => 'Family',
						],
				],
			224 =>
				[
					'title' => '28 Days',
					'year' => 2000,
					'cast' =>
						[
							0 => 'Sandra Bullock',
							1 => 'Viggo Mortensen',
						],
					'genres' =>
						[
							0 => 'Drama',
						],
				],
			225 =>
				[
					'title' => '3 Strikes',
					'year' => 2000,
					'cast' =>
						[
							0 => 'Brian Hooks',
							1 => 'N\'Bushe Wright',
						],
					'genres' =>
						[
							0 => 'Comedy',
						],
				],
		];

    	return $movies;
	}

	/**
	 * This method must return an array of fixtures classes
	 * on which the implementing class depends on
	 *
	 * @return class-string[]
	 */
	public function getDependencies() {
		return [
			GenreFixtures::class,
			ActorFixtures::class,
		];
	}


	private function getMovieDescription(): string
	{
		return <<<'TEXT'
Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor
incididunt ut labore et **dolore magna aliqua**: Duis aute irure dolor in
reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
deserunt mollit anim id est laborum.

  * Ut enim ad minim veniam
  * Quis nostrud exercitation *ullamco laboris*
  * Nisi ut aliquip ex ea commodo consequat

Praesent id fermentum lorem. Ut est lorem, fringilla at accumsan nec, euismod at
nunc. Aenean mattis sollicitudin mattis. Nullam pulvinar vestibulum bibendum.
Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
himenaeos. Fusce nulla purus, gravida ac interdum ut, blandit eget ex. Duis a
luctus dolor.

Integer auctor massa maximus nulla scelerisque accumsan. *Aliquam ac malesuada*
ex. Pellentesque tortor magna, vulputate eu vulputate ut, venenatis ac lectus.
Praesent ut lacinia sem. Mauris a lectus eget felis mollis feugiat. Quisque
efficitur, mi ut semper pulvinar, urna urna blandit massa, eget tincidunt augue
nulla vitae est.

Ut posuere aliquet tincidunt. Aliquam erat volutpat. **Class aptent taciti**
sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi
arcu orci, gravida eget aliquam eu, suscipit et ante. Morbi vulputate metus vel
ipsum finibus, ut dapibus massa feugiat. Vestibulum vel lobortis libero. Sed
tincidunt tellus et viverra scelerisque. Pellentesque tincidunt cursus felis.
Sed in egestas erat.

Aliquam pulvinar interdum massa, vel ullamcorper ante consectetur eu. Vestibulum
lacinia ac enim vel placerat. Integer pulvinar magna nec dui malesuada, nec
congue nisl dictum. Donec mollis nisl tortor, at congue erat consequat a. Nam
tempus elit porta, blandit elit vel, viverra lorem. Sed sit amet tellus
tincidunt, faucibus nisl in, aliquet libero.
TEXT;
	}
}
