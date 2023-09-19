<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $model = null;

    #[ORM\Column()]
    private ?int $prix = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Marque $marque = null;

    #[ORM\Column]
    private ?bool $archive = null;

    public function __construct(){
        $this->setArchive(false);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }
    
    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    

    /**
     * Get the value of prix
     */
    public function getPrix(): ?int
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     */
    public function setPrix(?int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of archive
     */
    public function isArchive(): ?bool
    {
        return $this->archive;
    }

    /**
     * Set the value of archive
     */
    public function setArchive(?bool $archive): self
    {
        $this->archive = $archive;

        return $this;
    }
}
