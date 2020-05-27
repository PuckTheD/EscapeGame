<?php

namespace App\Entity;

use App\Repository\InventaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InventaireRepository::class)
 */
class Inventaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $indice_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $team_id;

    /**
     * @ORM\ManyToMany(targetEntity=CurrentGame::class, mappedBy="inventaires")
     */
    private $currentGames;

    public function __construct()
    {
        $this->currentGames = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIndiceId(): ?int
    {
        return $this->indice_id;
    }

    public function setIndiceId(?int $indice_id): self
    {
        $this->indice_id = $indice_id;

        return $this;
    }

    public function getTeamId(): ?int
    {
        return $this->team_id;
    }

    public function setTeamId(?int $team_id): self
    {
        $this->team_id = $team_id;

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
            $currentGame->addInventaire($this);
        }

        return $this;
    }

    public function removeCurrentGame(CurrentGame $currentGame): self
    {
        if ($this->currentGames->contains($currentGame)) {
            $this->currentGames->removeElement($currentGame);
            $currentGame->removeInventaire($this);
        }

        return $this;
    }
}