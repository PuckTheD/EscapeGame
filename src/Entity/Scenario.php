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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="boolean")
     */
    private $multi_player;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Indice", mappedBy="indices")
     */
    private $indices;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ScenarioTeam", mappedBy="scenario", orphanRemoval=true)
     */
    private $scenarioTeams;

   

    public function __construct()
    {
        $this->indices = new ArrayCollection();
        $this->scenarioTeams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getMultiPlayer(): ?bool
    {
        return $this->multi_player;
    }

    public function setMultiPlayer(bool $multi_player): self
    {
        $this->multi_player = $multi_player;

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
            $scenarioTeam->setScenario($this);
        }

        return $this;
    }

    public function removeScenarioTeam(ScenarioTeam $scenarioTeam): self
    {
        if ($this->scenarioTeams->contains($scenarioTeam)) {
            $this->scenarioTeams->removeElement($scenarioTeam);
            // set the owning side to null (unless already changed)
            if ($scenarioTeam->getScenario() === $this) {
                $scenarioTeam->setScenario(null);
            }
        }

        return $this;
    }



}
