<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TeamRepository::class)
 */
class Team
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
     * @ORM\Column(type="string", length=255)
     */
    private $leader;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ScenarioTeam", mappedBy="team", orphanRemoval=true)
     */
    private $scenarioTeams;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="teams")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=CurrentGame::class, mappedBy="teams")
     */
    private $currentGames;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->currentGames = new ArrayCollection();
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

    public function getLeader(): ?string
    {
        return $this->leader;
    }

    public function setLeader(string $leader): self
    {
        $this->leader = $leader;

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
            $scenarioTeam->setTeam($this);
        }

        return $this;
    }

    public function removeScenarioTeam(ScenarioTeam $scenarioTeam): self
    {
        if ($this->scenarioTeams->contains($scenarioTeam)) {
            $this->scenarioTeams->removeElement($scenarioTeam);
            // set the owning side to null (unless already changed)
            if ($scenarioTeam->getTeam() === $this) {
                $scenarioTeam->setTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
        }

        return $this;
    }

    /**
     * @return Collection|CurrentGame[]
     */
    public function getCurrentGames(): Collection
    {
        return $this->currentGames;
    }

    public function addCurrentGame(CurrentGame $currentGame): self
    {
        if (!$this->currentGames->contains($currentGame)) {
            $this->currentGames[] = $currentGame;
            $currentGame->setTeams($this);
        }

        return $this;
    }

    public function removeCurrentGame(CurrentGame $currentGame): self
    {
        if ($this->currentGames->contains($currentGame)) {
            $this->currentGames->removeElement($currentGame);
            // set the owning side to null (unless already changed)
            if ($currentGame->getTeams() === $this) {
                $currentGame->setTeams(null);
            }
        }

        return $this;
    }
}
