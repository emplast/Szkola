<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UczniowieRepository")
 */
class Uczniowie
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
    private $imie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nazwisko;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $komentarz;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $punkty;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Oceny", inversedBy="oceny")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ocena;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImie(): ?string
    {
        return $this->imie;
    }

    public function setImie(string $imie): self
    {
        $this->imie = $imie;

        return $this;
    }

    public function getNazwisko(): ?string
    {
        return $this->nazwisko;
    }

    public function setNazwisko(string $nazwisko): self
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    public function getKomentarz(): ?string
    {
        return $this->komentarz;
    }

    public function setKomentarz(string $komentarz): self
    {
        $this->komentarz = $komentarz;

        return $this;
    }

    public function getPunkty(): ?string
    {
        return $this->punkty;
    }

    public function setPunkty(string $punkty): self
    {
        $this->punkty = $punkty;

        return $this;
    }

    public function getOcena(): ?Oceny
    {
        return $this->ocena;
    }

    public function setOcena(?Oceny $ocena): self
    {
        $this->ocena = $ocena;

        return $this;
    }
}
