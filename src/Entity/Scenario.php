<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScenarioRepository")
 */
class Scenario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private $nom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCreation;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ConnectedObject", mappedBy="scenarii")
     */
    private $connectedObjects;

    public function __construct()
    {
        $this->connectedObjects = new ArrayCollection();
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

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * @return Collection|ConnectedObject[]
     */
    public function getConnectedObjects(): Collection
    {
        return $this->connectedObjects;
    }

    public function addConnectedObject(ConnectedObject $connectedObject): self
    {
        if (!$this->connectedObjects->contains($connectedObject)) {
            $this->connectedObjects[] = $connectedObject;
            $connectedObject->addScenarii($this);
        }

        return $this;
    }

    public function removeConnectedObject(ConnectedObject $connectedObject): self
    {
        if ($this->connectedObjects->contains($connectedObject)) {
            $this->connectedObjects->removeElement($connectedObject);
            $connectedObject->removeScenarii($this);
        }

        return $this;
    }
}
