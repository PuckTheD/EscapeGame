<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ThemathiqueRepository")
 */
class Themathique
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
    private $scenario;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Scenario", inversedBy="thematiques")
     */
    private $scenario_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScenario(): ?string
    {
        return $this->scenario;
    }

    public function setScenario(string $scenario): self
    {
        $this->scenario = $scenario;

        return $this;
    }

    public function getScenarioId(): ?Scenario
    {
        return $this->scenario_id;
    }

    public function setScenarioId(?Scenario $scenario_id): self
    {
        $this->scenario_id = $scenario_id;

        return $this;
    }
}
