<?php

namespace App\Entity;

use App\Repository\ScenarioTeamRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScenarioTeamRepository::class)
 */
class ScenarioTeam
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $started_at;

    /**
     * @ORM\ManyToOne(targetEntity=Scenario::class, inversedBy="scenarioTeams")
     */
<<<<<<< HEAD
    private $progressions;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Inventaire", inversedBy="scenarioTeams")
     */
    private $inventaires;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team", inversedBy="scenarioTeams")
     * @ORM\JoinColumn(nullable=false)
     */
    private $team;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Scenario", inversedBy="scenarioTeams")
     * @ORM\JoinColumn(nullable=false)
     */
    private $scenario;


    public function __construct()
    {
        $this->started_at = new \DateTime();
        $this->progressions = new ArrayCollection();
        $this->inventaires = new ArrayCollection();
    }
=======
    private $scenarios;
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartedAt(): ?\DateTimeInterface
    {
        return $this->started_at;
    }

    public function setStartedAt(\DateTimeInterface $started_at): self
    {
        $this->started_at = $started_at;

        return $this;
    }
<<<<<<< HEAD
    
    /**
     * @return Collection|Progression[]
     */
    public function getProgressions(): Collection
    {
        return $this->progressions;
    }

    public function addProgression(Progression $progression): self
    {
        if (!$this->progressions->contains($progression)) {
            $this->progressions[] = $progression;
        }

        return $this;
    }

    public function removeProgression(Progression $progression): self
    {
        if ($this->progressions->contains($progression)) {
            $this->progressions->removeElement($progression);
        }
=======

    public function getTeamId(): ?int
    {
        return $this->team_id;
    }

    public function setTeamId(int $team_id): self
    {
        $this->team_id = $team_id;
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return Collection|Inventaire[]
     */
    public function getInventaires(): Collection
=======
    public function getScenarios(): ?Scenario
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91
    {
        return $this->scenarios;
    }

    public function setScenarios(?Scenario $scenarios): self
    {
        $this->scenarios = $scenarios;

        return $this;
    }
<<<<<<< HEAD

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

        return $this;
    }

    public function getScenario(): ?Scenario
    {
        return $this->scenario;
    }

    public function setScenario(?Scenario $scenario): self
    {
        $this->scenario = $scenario;

        return $this;
    }
}
=======
}
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91
