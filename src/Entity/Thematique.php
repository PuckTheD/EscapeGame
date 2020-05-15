<?php

namespace App\Entity;

<<<<<<< HEAD
=======
use App\Repository\ThematiqueRepository;
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ThematiqueRepository::class)
 */
class Thematique
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
<<<<<<< HEAD
     * @ORM\Column(type="string", length=255)
     */
    private $name;


=======
     * @ORM\Column(type="string", length=100)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $theme;

    /**
     * @ORM\ManyToMany(targetEntity=Scenario::class, mappedBy="thematiques")
     */
    private $scenarios;

    public function __construct()
    {
        $this->scenarios = new ArrayCollection();
    }
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91

    public function getId(): ?int
    {
        return $this->id;
    }

<<<<<<< HEAD
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
=======
    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91

        return $this;
    }

<<<<<<< HEAD
}
=======
    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * @return Collection|Scenario[]
     */
    public function getScenarios(): Collection
    {
        return $this->scenarios;
    }

    public function addScenario(Scenario $scenario): self
    {
        if (!$this->scenarios->contains($scenario)) {
            $this->scenarios[] = $scenario;
            $scenario->addThematique($this);
        }

        return $this;
    }

    public function removeScenario(Scenario $scenario): self
    {
        if ($this->scenarios->contains($scenario)) {
            $this->scenarios->removeElement($scenario);
            $scenario->removeThematique($this);
        }

        return $this;
    }
}
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91
