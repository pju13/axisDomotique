<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConnectedObjectRepository")
 */
class ConnectedObject
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
     * @ORM\Column(type="string", length=160)
     */
    private $typeObject;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=160, nullable=true)
     */
    private $data1;

    /**
     * @ORM\Column(type="string", length=160, nullable=true)
     */
    private $data2;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Scenario", inversedBy="connectedObjects")
     */
    private $scenarii;

    public function __construct()
    {
        $this->scenarii = new ArrayCollection();
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

    public function getTypeObject(): ?string
    {
        return $this->typeObject;
    }

    public function setTypeObject(string $typeObject): self
    {
        $this->typeObject = $typeObject;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getData1(): ?string
    {
        return $this->data1;
    }

    public function setData1(?string $data1): self
    {
        $this->data1 = $data1;

        return $this;
    }

    public function getData2(): ?string
    {
        return $this->data2;
    }

    public function setData2(?string $data2): self
    {
        $this->data2 = $data2;

        return $this;
    }

    /**
     * @return Collection|Scenario[]
     */
    public function getScenarii(): Collection
    {
        return $this->scenarii;
    }

    public function addScenarii(Scenario $scenarii): self
    {
        if (!$this->scenarii->contains($scenarii)) {
            $this->scenarii[] = $scenarii;
        }

        return $this;
    }

    public function removeScenarii(Scenario $scenarii): self
    {
        if ($this->scenarii->contains($scenarii)) {
            $this->scenarii->removeElement($scenarii);
        }

        return $this;
    }
}
