<?php

namespace App\Entity;

use App\Repository\ScenarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScenarioRepository::class)
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
     * @ORM\Column(type="integer")
     */
    private $nb_jour;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $duree;

    /**
     * @ORM\ManyToMany(targetEntity=Thematique::class, inversedBy="scenarios")
     */
    private $thematiques;

    /**
     * @ORM\ManyToMany(targetEntity=Indice::class, inversedBy="scenarios")
     */
    private $indices;

    /**
     * @ORM\OneToMany(targetEntity=ScenarioTeam::class, mappedBy="scenarios")
     */
    private $scenarioTeams;

    public function __construct()
    {
        $this->thematiques = new ArrayCollection();
        $this->indices = new ArrayCollection();
        $this->scenarioTeams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbJour(): ?int
    {
        return $this->nb_jour;
    }

    public function setNbJour(int $nb_jour): self
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
     * @return Collection|Thematique[]
     */
    public function getThematiques(): Collection
    {
        return $this->thematiques;
    }

    public function addThematique(Thematique $thematique): self
    {
        if (!$this->thematiques->contains($thematique)) {
            $this->thematiques[] = $thematique;
        }

        return $this;
    }

    public function removeThematique(Thematique $thematique): self
    {
        if ($this->thematiques->contains($thematique)) {
            $this->thematiques->removeElement($thematique);
        }

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
        }

        return $this;
    }

    public function removeIndex(Indice $index): self
    {
        if ($this->indices->contains($index)) {
            $this->indices->removeElement($index);
        }

        return $this;
    }

    /**
     * @return Collection|ScenarioTeam[]
     */
    public function getScenarioTeams(): Collection
    {
        return $this->scenarioTeams;
    }

    public function addScenarioTeam(ScenarioTeam $scenarioTeam): self
    {
        if (!$this->scenarioTeams->contains($scenarioTeam)) {
            $this->scenarioTeams[] = $scenarioTeam;
            $scenarioTeam->setScenarios($this);
        }

        return $this;
    }

    public function removeScenarioTeam(ScenarioTeam $scenarioTeam): self
    {
        if ($this->scenarioTeams->contains($scenarioTeam)) {
            $this->scenarioTeams->removeElement($scenarioTeam);
            // set the owning side to null (unless already changed)
            if ($scenarioTeam->getScenarios() === $this) {
                $scenarioTeam->setScenarios(null);
            }
        }

        return $this;
    }
}
