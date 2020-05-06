<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ThematiqueRepository")
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $scenario;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $scenario_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Scenario", inversedBy="themathiques")
     */
    private $themes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScenario(): ?string
    {
        return $this->scenario;
    }

    public function setScenario(?string $scenario): self
    {
        $this->scenario = $scenario;

        return $this;
    }

    public function getScenarioId(): ?int
    {
        return $this->scenario_id;
    }

    public function setScenarioId(?int $scenario_id): self
    {
        $this->scenario_id = $scenario_id;

        return $this;
    }

    public function getThemes(): ?Scenario
    {
        return $this->themes;
    }

    public function setThemes(?Scenario $themes): self
    {
        $this->themes = $themes;

        return $this;
    }
}
