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
     * @ORM\ManyToMany(targetEntity="App\Entity\Team", inversedBy="scenarios")
     */
    private $teams;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Themathique", mappedBy="scenario_id")
     */
    private $thematiques;

    public function __construct()
    {
        $this->teams = new ArrayCollection();
        $this->thematiques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThemathique(): ?string
    {
        return $this->themathique;
    }

    public function setThemathique(string $themathique): self
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
     * @return Collection|Team[]
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->teams->contains($team)) {
            $this->teams[] = $team;
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->teams->contains($team)) {
            $this->teams->removeElement($team);
        }

        return $this;
    }

    /**
     * @return Collection|Themathique[]
     */
    public function getThematiques(): Collection
    {
        return $this->thematiques;
    }

    public function addThematique(Themathique $thematique): self
    {
        if (!$this->thematiques->contains($thematique)) {
            $this->thematiques[] = $thematique;
            $thematique->setScenarioId($this);
        }

        return $this;
    }

    public function removeThematique(Themathique $thematique): self
    {
        if ($this->thematiques->contains($thematique)) {
            $this->thematiques->removeElement($thematique);
            // set the owning side to null (unless already changed)
            if ($thematique->getScenarioId() === $this) {
                $thematique->setScenarioId(null);
            }
        }

        return $this;
    }
}
