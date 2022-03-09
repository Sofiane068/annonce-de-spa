<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'annonce', targetEntity: Chien::class)]
    private $chiens;

    #[ORM\ManyToOne(targetEntity: Spa::class, inversedBy: 'annonce')]
    private $spa;

    public function __construct()
    {
        $this->chiens = new ArrayCollection();
    }

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
            $chien->setAnnonce($this);
        }

        return $this;
    }

    public function removeChien(Chien $chien): self
    {
        if ($this->chiens->removeElement($chien)) {
            // set the owning side to null (unless already changed)
            if ($chien->getAnnonce() === $this) {
                $chien->setAnnonce(null);
            }
        }

        return $this;
    }

    public function getSpa(): ?Spa
    {
        return $this->spa;
    }

    public function setSpa(?Spa $spa): self
    {
        $this->spa = $spa;

        return $this;
    }
}
