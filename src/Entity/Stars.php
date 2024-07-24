<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StarsRepository::class)]
class Stars{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     *@var Collection<int, Film>
     */
    #[ORM\ManyToMany(targetEntity: Film::class, mappedBy: 'stars')]
    private Collection $stars;

    public function __construct()
    {
        $this -> stars = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Film>
     */
    public function getStars(): Collection
    {
        return $this -> stars;
    }

    public function addStars(Film $stars): static
    {
        if (!$this -> stars-> contains($stars)) {
            $this -> stars -> add($stars);
            $stars->addStars($this);
        }

        return $this;
    }

    public function removeStars(Film $stars): static
    {
        if ($this->stars->removeElement($stars)) {
            $stars->removeStars($this);
        }

        return $this;
    }
}