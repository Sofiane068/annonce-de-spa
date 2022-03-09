<?php

namespace App\Entity;

use App\Repository\DemandeAdoptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandeAdoptionRepository::class)]
class DemandeAdoption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'boolean')]
    private $valider;

    #[ORM\Column(type: 'datetime')]
    private $dateEmission;

    #[ORM\ManyToMany(targetEntity: Chien::class, mappedBy: 'demandeAdoption')]
    private $chiens;

    public function __construct()
    {
        $this->chiens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValider(): ?bool
    {
        return $this->valider;
    }

    public function setValider(bool $valider): self
    {
        $this->valider = $valider;

        return $this;
    }

    public function getDateEmission(): ?\DateTimeInterface
    {
        return $this->dateEmission;
    }

    public function setDateEmission(\DateTimeInterface $dateEmission): self
    {
        $this->dateEmission = $dateEmission;

        return $this;
    }

    /**
     * @return Collection<int, Chien>
     */
    public function getChiens(): Collection
    {
        return $this->chiens;
    }

    public function addChien(Chien $chien): self
    {
        if (!$this->chiens->contains($chien)) {
            $this->chiens[] = $chien;
            $chien->addDemandeAdoption($this);
        }

        return $this;
    }

    public function removeChien(Chien $chien): self
    {
        if ($this->chiens->removeElement($chien)) {
            $chien->removeDemandeAdoption($this);
        }

        return $this;
    }
}
