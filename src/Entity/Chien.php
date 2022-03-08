<?php

namespace App\Entity;

use App\Repository\ChienRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChienRepository::class)]
class Chien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'boolean')]
    private $chienCroises;

    #[ORM\Column(type: 'string', length: 255)]
    private $antecedents;

    #[ORM\Column(type: 'boolean')]
    private $lof;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'boolean')]
    private $sociable;

    #[ORM\Column(type: 'boolean')]
    private $adopter;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getChienCroises(): ?bool
    {
        return $this->chienCroises;
    }

    public function setChienCroises(bool $chienCroises): self
    {
        $this->chienCroises = $chienCroises;

        return $this;
    }

    public function getAntecedents(): ?string
    {
        return $this->antecedents;
    }

    public function setAntecedents(string $antecedents): self
    {
        $this->antecedents = $antecedents;

        return $this;
    }

    public function getLof(): ?bool
    {
        return $this->lof;
    }

    public function setLof(bool $lof): self
    {
        $this->lof = $lof;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSociable(): ?bool
    {
        return $this->sociable;
    }

    public function setSociable(bool $sociable): self
    {
        $this->sociable = $sociable;

        return $this;
    }

    public function getAdopter(): ?bool
    {
        return $this->adopter;
    }

    public function setAdopter(bool $adopter): self
    {
        $this->adopter = $adopter;

        return $this;
    }
}
