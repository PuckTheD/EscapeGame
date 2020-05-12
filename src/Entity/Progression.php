<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProgressionRepository")
 */
class Progression
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
    private $progress;

   
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ScenarioTeam", mappedBy="progressions")
     */
    private $scenarioTeams;

    public function __construct()
    {
        $this->scenarioTeams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProgress(): ?string
    {
        return $this->progress;
    }

    public function setProgress(?string $progress): self
    {
        $this->progress = $progress;

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
            $scenarioTeam->addProgression($this);
        }

        return $this;
    }

    public function removeScenarioTeam(ScenarioTeam $scenarioTeam): self
    {
        if ($this->scenarioTeams->contains($scenarioTeam)) {
            $this->scenarioTeams->removeElement($scenarioTeam);
            $scenarioTeam->removeProgression($this);
        }

        return $this;
    }
}
