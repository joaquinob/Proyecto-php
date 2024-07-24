<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?string $genres = null;

    #[ORM\Column(length: 4)]
    private ?int $year = null;

    #[ORM\Column]
    private ?string $director = null;

    #[ORM\Column]
    private ?string $mainActors = null;

    #[ORM\Column(length: 255)]
    private ?string $poster = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $synopsis = null;

    /**
     * @var Collection<int, Stars>
     */
    #[ORM\ManyToMany(targetEntity: Stars::class, inversedBy: 'stars')]
    private Collection $stars;

    public function __construct()
    {
        $this -> stars = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this -> id;
    }

    public function getTitle(): ?string
    {
        return $this -> title;
    }

    public function setTitle(string $title): static
    {
        $this -> title = $title;

        return $this;
    }

    public function getGenres(): ?string
    {
        return $this -> genres;
    }

    public function setGenres(string $genres): static
    {
        $this -> genres = $genres;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this -> year;
    }

    public function setYear(?int $year): static
    {
        $this -> year = $year;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this -> director;
    }

    public function setDirector(?string $director): static
    {
        $this -> director = $director;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this -> poster;
    }

    public function setPoster(string $poster): static
    {
        $this -> poster = $poster;

        return $this;
    }

    public function getMainActors(): ?string
    {
        return $this -> mainActors;
    }

    public function setMainActors(?string $mainActors): static
    {
        $this -> mainActors = $mainActors;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this -> synopsis;
    }

    public function setSynopsis(string $synopsis): static
    {
        $this -> synopsis = $synopsis;

        return $this;
    }

    /**
     * @return Collection<int, Stars>
     */
    public function getStars(): Collection
    {
        return $this -> stars;
    }

    public function addZone(Stars $stars): static
    {
        if (!$this -> stars -> contains($stars)) {
            $this -> stars -> add($stars);
        }

        return $this;
    }

    public function removeStars(Stars $stars): static
    {
        $this -> stars -> removeElement($stars);

        return $this;
    }
}
