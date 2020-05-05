<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScenarioTeamProgressionRepository")
 */
class ScenarioTeamProgression
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
    private $scenario_team_scenario_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $scenario_team_team_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $progression_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $progression_scenario_team_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScenarioTeamScenarioId(): ?int
    {
        return $this->scenario_team_scenario_id;
    }

    public function setScenarioTeamScenarioId(int $scenario_team_scenario_id): self
    {
        $this->scenario_team_scenario_id = $scenario_team_scenario_id;

        return $this;
    }

    public function getScenarioTeamTeamId(): ?int
    {
        return $this->scenario_team_team_id;
    }

    public function setScenarioTeamTeamId(int $scenario_team_team_id): self
    {
        $this->scenario_team_team_id = $scenario_team_team_id;

        return $this;
    }

    public function getProgressionId(): ?int
    {
        return $this->progression_id;
    }

    public function setProgressionId(int $progression_id): self
    {
        $this->progression_id = $progression_id;

        return $this;
    }

    public function getProgressionScenarioTeamId(): ?int
    {
        return $this->progression_scenario_team_id;
    }

    public function setProgressionScenarioTeamId(int $progression_scenario_team_id): self
    {
        $this->progression_scenario_team_id = $progression_scenario_team_id;

        return $this;
    }
}
