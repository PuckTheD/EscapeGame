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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $themathique;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_jour;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $duree;

    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Thematique", mappedBy="themes")
     */
    private $themathiques;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Indice", mappedBy="indices")
     */
    private $indices;

    public function __construct()
    {
        $this->indices = new ArrayCollection();
        $this->themathiques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThemathique(): ?string
    {
        return $this->themathique;
    }

    public function setThemathique(?string $themathique): self
    {
        $this->themathique = $themathique;

        return $this;
    }

    public function getNbJour(): ?int
    {
        return $this->nb_jour;
    }

    public function setNbJour(?int $nb_jour): self
    {
        $this->nb_jour = $nb_jour;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(?\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * @return Collection|Indice[]
     */
    public function getIndices(): Collection
    {
        return $this->indices;
    }

    public function addIndex(Indice $index): self
    {
        if (!$this->indices->contains($index)) {
            $this->indices[] = $index;
            $index->setScenario($this);
        }

        return $this;
    }

    public function removeIndex(Indice $index): self
    {
        if ($this->indices->contains($index)) {
            $this->indices->removeElement($index);
            // set the owning side to null (unless already changed)
            if ($index->getScenario() === $this) {
                $index->setScenario(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Thematique[]
     */
    public function getThemathiques(): Collection
    {
        return $this->themathiques;
    }

    public function addThemathique(Thematique $themathique): self
    {
        if (!$this->themathiques->contains($themathique)) {
            $this->themathiques[] = $themathique;
            $themathique->setThemes($this);
        }

        return $this;
    }

    public function removeThemathique(Thematique $themathique): self
    {
        if ($this->themathiques->contains($themathique)) {
            $this->themathiques->removeElement($themathique);
            // set the owning side to null (unless already changed)
            if ($themathique->getThemes() === $this) {
                $themathique->setThemes(null);
            }
        }

        return $this;
    }
}
