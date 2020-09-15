<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PictureRepository::class)
 */
class Picture {
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $name;

	/**
	 * @ORM\ManyToOne(targetEntity=Movie::class, inversedBy="pictures")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $movie;

	public function getId(): ?int {
		return $this->id;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name): self {
		$this->name = $name;

		return $this;
	}

	public function getMovie(): ?Movie {
		return $this->movie;
	}

	public function setMovie(?Movie $movie): self {
		$this->movie = $movie;

		return $this;
	}

	public function __toString():string {
		return $this->name;
	}
}
