<?php

namespace App\Entity;

use App\Repository\ScenarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScenarioRepository::class)
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
<<<<<<< HEAD
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
=======
     * @ORM\Column(type="integer")
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
<<<<<<< HEAD
     * @ORM\Column(type="boolean")
     */
    private $multi_player;
=======
     * @ORM\ManyToMany(targetEntity=Thematique::class, inversedBy="scenarios")
     */
    private $thematiques;
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91

    /**
     * @ORM\ManyToMany(targetEntity=Indice::class, inversedBy="scenarios")
     */
    private $indices;

    /**
<<<<<<< HEAD
     * @ORM\OneToMany(targetEntity="App\Entity\ScenarioTeam", mappedBy="scenario", orphanRemoval=true)
     */
    private $scenarioTeams;

   
=======
     * @ORM\ManyToMany(targetEntity=CurrentGame::class, mappedBy="scenarios")
     */
    private $currentGames;


>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91

    public function __construct()
    {
        $this->thematiques = new ArrayCollection();
        $this->indices = new ArrayCollection();
<<<<<<< HEAD
        $this->scenarioTeams = new ArrayCollection();
=======
        $this->currentGames = new ArrayCollection();

>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName(): ?string
    {
        return $this->name;
    }

<<<<<<< HEAD
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
=======
    public function getNbJour(): ?int
    {
        return $this->nb_jour;
    }

    public function setNbJour(int $nb_jour): self
    {
        $this->nb_jour = $nb_jour;
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91

        return $this;
    }

<<<<<<< HEAD
    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;
=======
    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(?\DateTimeInterface $duree): self
    {
        $this->duree = $duree;
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91

        return $this;
    }

<<<<<<< HEAD
    public function getMultiPlayer(): ?bool
    {
        return $this->multi_player;
    }

    public function setMultiPlayer(bool $multi_player): self
    {
        $this->multi_player = $multi_player;
=======
    /**
     * @return Collection|Thematique[]
     */
    public function getThematiques(): Collection
    {
        return $this->thematiques;
    }

    public function addThematique(Thematique $thematique): self
    {
        if (!$this->thematiques->contains($thematique)) {
            $this->thematiques[] = $thematique;
        }

        return $this;
    }

    public function removeThematique(Thematique $thematique): self
    {
        if ($this->thematiques->contains($thematique)) {
            $this->thematiques->removeElement($thematique);
        }
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91

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
        }

        return $this;
    }

    public function removeIndex(Indice $index): self
    {
        if ($this->indices->contains($index)) {
            $this->indices->removeElement($index);
        }

        return $this;
    }


    /**
<<<<<<< HEAD
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
=======
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
            $currentGame->addScenario($this);
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91
        }

        return $this;
    }

<<<<<<< HEAD
    public function removeScenarioTeam(ScenarioTeam $scenarioTeam): self
    {
        if ($this->scenarioTeams->contains($scenarioTeam)) {
            $this->scenarioTeams->removeElement($scenarioTeam);
            // set the owning side to null (unless already changed)
            if ($scenarioTeam->getScenario() === $this) {
                $scenarioTeam->setScenario(null);
            }
=======
    public function removeCurrentGame(CurrentGame $currentGame): self
    {
        if ($this->currentGames->contains($currentGame)) {
            $this->currentGames->removeElement($currentGame);
            $currentGame->removeScenario($this);
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91
        }

        return $this;
    }

<<<<<<< HEAD


}
=======
}
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91
