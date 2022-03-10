<?php

namespace App\Entity;

use App\Repository\SpaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpaRepository::class)]
class Spa extends Utilisateur
{
    #[ORM\Column(type: 'string', length: 255)]
    private $nomAssociation;

    #[ORM\Column(type: 'integer')]
    private $nombreAnnonceApourvoir;

    #[ORM\Column(type: 'integer')]
    private $nombreAnnoncePourvues;

    #[ORM\OneToMany(mappedBy: 'spa', targetEntity: Annonce::class)]
    private $annonce;

    public function __construct()
    {
        $this->annonce = new ArrayCollection();
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

    /**
     * @return Collection<int, Annonce>
     */
    public function getAnnonce(): Collection
    {
        return $this->annonce;
    }

    public function addAnnonce(Annonce $annonce): self
    {
        if (!$this->annonce->contains($annonce)) {
            $this->annonce[] = $annonce;
            $annonce->setSpa($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): self
    {
        if ($this->annonce->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getSpa() === $this) {
                $annonce->setSpa(null);
            }
        }

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = parent::getRoles();
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_SPA';

        return array_unique($roles);
    }
}
