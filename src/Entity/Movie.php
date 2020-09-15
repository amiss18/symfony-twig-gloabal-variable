<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MovieRepository::class)
 */
class Movie {
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $title;

	/**
	 * @ORM\Column(type="integer")
	 */
	private $year;

	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	private $description;

	/**
	 * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="movie", orphanRemoval=true, cascade={"persist"},fetch="EAGER")
	 */
	private $pictures;

	/**
	 * @ORM\ManyToMany(targetEntity=Genre::class, mappedBy="movies")
	 */
	private $genres;


	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	private $likes;

	/**
	 * @ORM\ManyToMany(targetEntity=Actor::class, mappedBy="movies", fetch="EAGER")
	 */
	private $actors;

	public function __construct() {
		$this->pictures = new ArrayCollection();
		$this->genres = new ArrayCollection();
		$this->actors = new ArrayCollection();
	}

	public function getId(): ?int {
		return $this->id;
	}

	public function getTitle(): ?string {
		return $this->title;
	}

	public function setTitle(string $title): self {
		$this->title = $title;

		return $this;
	}

	public function getYear(): ?int {
		return $this->year;
	}

	public function setYear(int $year): self {
		$this->year = $year;

		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description): self {
		$this->description = $description;

		return $this;
	}

	/**
	 * @return Collection|Picture[]
	 */
	public function getPictures(): Collection {
		return $this->pictures;
	}

	public function addPicture(Picture $picture): self {
		if(!$this->pictures->contains($picture)) {
			$this->pictures[] = $picture;
			$picture->setMovie($this);
		}

		return $this;
	}

	public function removePicture(Picture $picture): self {
		if($this->pictures->contains($picture)) {
			$this->pictures->removeElement($picture);
			// set the owning side to null (unless already changed)
			if($picture->getMovie() === $this) {
				$picture->setMovie(null);
			}
		}

		return $this;
	}

	/**
	 * @return Collection|Genre[]
	 */
	public function getGenres(): Collection {
		return $this->genres;
	}

	public function addGenre(Genre $genre): self {
		if(!$this->genres->contains($genre)) {
			$this->genres[] = $genre;
			$genre->addMovie($this);
		}

		return $this;
	}

	public function removeGenre(Genre $genre): self {
		if($this->genres->contains($genre)) {
			$this->genres->removeElement($genre);
			$genre->removeMovie($this);
		}

		return $this;
	}


	public function getLikes(): ?int {
		return $this->likes;
	}

	public function setLikes(?int $likes = 0): self {
		$this->likes = $likes;

		return $this;
	}

	/**
	 * @return Collection|Actor[]
	 */
	public function getActors(): Collection {
		return $this->actors;
	}

	public function addActor(Actor $actor): self {
		if(!$this->actors->contains($actor)) {
			$this->actors[] = $actor;
			$actor->addMovie($this);
		}

		return $this;
	}

	public function removeActor(Actor $actor): self {
		if($this->actors->contains($actor)) {
			$this->actors->removeElement($actor);
			$actor->removeMovie($this);
		}

		return $this;
	}
}
