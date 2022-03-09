<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $texte;

    #[ORM\Column(type: 'boolean')]
    private $repondu;

    #[ORM\ManyToOne(targetEntity: DemandeAdoption::class, inversedBy: 'message')]
    private $demandeAdoption;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    public function getRepondu(): ?bool
    {
        return $this->repondu;
    }

    public function setRepondu(bool $repondu): self
    {
        $this->repondu = $repondu;

        return $this;
    }

    public function getDemandeAdoption(): ?DemandeAdoption
    {
        return $this->demandeAdoption;
    }

    public function setDemandeAdoption(?DemandeAdoption $demandeAdoption): self
    {
        $this->demandeAdoption = $demandeAdoption;

        return $this;
    }
}
