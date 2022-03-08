<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nombredechien;

    #[ORM\Column(type: 'datetime')]
    private $DateDeMiseAjour;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $reponce;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getNombredechien(): ?int
    {
        return $this->nombredechien;
    }

    public function setNombredechien(?int $nombredechien): self
    {
        $this->nombredechien = $nombredechien;

        return $this;
    }

    public function getDateDeMiseAjour(): ?\DateTimeInterface
    {
        return $this->DateDeMiseAjour;
    }

    public function setDateDeMiseAjour(\DateTimeInterface $DateDeMiseAjour): self
    {
        $this->DateDeMiseAjour = $DateDeMiseAjour;

        return $this;
    }

    public function getReponce(): ?string
    {
        return $this->reponce;
    }

    public function setReponce(?string $reponce): self
    {
        $this->reponce = $reponce;

        return $this;
    }
}
