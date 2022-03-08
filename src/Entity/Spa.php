<?php

namespace App\Entity;

use App\Repository\SpaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpaRepository::class)]
class Spa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomAssociation;

    #[ORM\Column(type: 'integer')]
    private $nombreAnnonceApourvoir;

    #[ORM\Column(type: 'integer')]
    private $nombreAnnoncePourvues;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAssociation(): ?string
    {
        return $this->nomAssociation;
    }

    public function setNomAssociation(string $nomAssociation): self
    {
        $this->nomAssociation = $nomAssociation;

        return $this;
    }

    public function getNombreAnnonceApourvoir(): ?int
    {
        return $this->nombreAnnonceApourvoir;
    }

    public function setNombreAnnonceApourvoir(int $nombreAnnonceApourvoir): self
    {
        $this->nombreAnnonceApourvoir = $nombreAnnonceApourvoir;

        return $this;
    }

    public function getNombreAnnoncePourvues(): ?int
    {
        return $this->nombreAnnoncePourvues;
    }

    public function setNombreAnnoncePourvues(int $nombreAnnoncePourvues): self
    {
        $this->nombreAnnoncePourvues = $nombreAnnoncePourvues;

        return $this;
    }
}
