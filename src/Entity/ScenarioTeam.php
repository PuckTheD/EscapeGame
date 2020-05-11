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
     * @ORM\Column(type="integer")
     */
    private $scenario_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $team_id;

    /**
     * @ORM\ManyToOne(targetEntity=Scenario::class, inversedBy="scenarioTeams")
     */
    private $scenarios;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScenarioId(): ?int
    {
        return $this->scenario_id;
    }

    public function setScenarioId(int $scenario_id): self
    {
        $this->scenario_id = $scenario_id;

        return $this;
    }

    public function getTeamId(): ?int
    {
        return $this->team_id;
    }

    public function setTeamId(int $team_id): self
    {
        $this->team_id = $team_id;

        return $this;
    }

    public function getScenarios(): ?Scenario
    {
        return $this->scenarios;
    }

    public function setScenarios(?Scenario $scenarios): self
    {
        $this->scenarios = $scenarios;

        return $this;
    }
}
