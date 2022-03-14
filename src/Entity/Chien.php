<?php

namespace App\Entity;

use App\Repository\ChienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'chien', targetEntity: Image::class)]
    private $images;

    #[ORM\ManyToMany(targetEntity: Race::class, inversedBy: 'chiens')]
    private $race;

    #[ORM\ManyToOne(targetEntity: Adoptant::class, inversedBy: 'chiens')]
    private $Adoptant;

    #[ORM\ManyToOne(targetEntity: Annonce::class, inversedBy: 'chiens')]
    #[ORM\JoinColumn(nullable: false)]
    private $annonce;

    #[ORM\ManyToMany(targetEntity: DemandeAdoption::class, inversedBy: 'chiens')]
    private $demandeAdoption;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->race = new ArrayCollection();
        $this->demandeAdoption = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setChien($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getChien() === $this) {
                $image->setChien(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Race>
     */
    public function getRace(): Collection
    {
        return $this->race;
    }

    public function addRace(Race $race): self
    {
        if (!$this->race->contains($race)) {
            $this->race[] = $race;
        }

        return $this;
    }

    public function removeRace(Race $race): self
    {
        $this->race->removeElement($race);

        return $this;
    }

    public function getAdoptant(): ?Adoptant
    {
        return $this->Adoptant;
    }

    public function setAdoptant(?Adoptant $Adoptant): self
    {
        $this->Adoptant = $Adoptant;

        return $this;
    }

    public function getAnnonce(): ?Annonce
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonce $annonce): self
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * @return Collection<int, DemandeAdoption>
     */
    public function getDemandeAdoption(): Collection
    {
        return $this->demandeAdoption;
    }

    public function addDemandeAdoption(DemandeAdoption $demandeAdoption): self
    {
        if (!$this->demandeAdoption->contains($demandeAdoption)) {
            $this->demandeAdoption[] = $demandeAdoption;
        }

        return $this;
    }

    public function removeDemandeAdoption(DemandeAdoption $demandeAdoption): self
    {
        $this->demandeAdoption->removeElement($demandeAdoption);

        return $this;
    }
}
