<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IndiceRepository")
 */
class Indice
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
    private $hint;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $scenario_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Scenario", inversedBy="indices")
     */
    private $indices;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHint(): ?string
    {
        return $this->hint;
    }

    public function setHint(?string $hint): self
    {
        $this->hint = $hint;

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

    public function getIndices(): ?Scenario
    {
        return $this->indices;
    }

    public function setIndices(?Scenario $indices): self
    {
        $this->indices = $indices;

        return $this;
    }
}
