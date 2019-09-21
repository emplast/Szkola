<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OcenyRepository")
 */
class Oceny
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ocena;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Uczniowie", mappedBy="ocena")
     */
    private $oceny;

    public function __construct()
    {
        $this->oceny = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOcena(): ?string
    {
        return $this->ocena;
    }

    public function setOcena(string $ocena): self
    {
        $this->ocena = $ocena;

        return $this;
    }

    /**
     * @return Collection|Uczniowie[]
     */
    public function getOceny(): Collection
    {
        return $this->oceny;
    }

    public function addOceny(Uczniowie $oceny): self
    {
        if (!$this->oceny->contains($oceny)) {
            $this->oceny[] = $oceny;
            $oceny->setOcena($this);
        }

        return $this;
    }

    public function removeOceny(Uczniowie $oceny): self
    {
        if ($this->oceny->contains($oceny)) {
            $this->oceny->removeElement($oceny);
            // set the owning side to null (unless already changed)
            if ($oceny->getOcena() === $this) {
                $oceny->setOcena(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->ocena;
    }
}
