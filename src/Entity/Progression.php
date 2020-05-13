<?php

namespace App\Entity;

use App\Repository\ProgressionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProgressionRepository::class)
 */
class Progression
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
    private $Progress;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\ManyToMany(targetEntity=CurrentGame::class, mappedBy="progressions")
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

    public function getProgress(): ?string
    {
        return $this->Progress;
    }

    public function setProgress(?string $Progress): self
    {
        $this->Progress = $Progress;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

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
            $currentGame->addProgression($this);
        }

        return $this;
    }

    public function removeCurrentGame(CurrentGame $currentGame): self
    {
        if ($this->currentGames->contains($currentGame)) {
            $this->currentGames->removeElement($currentGame);
            $currentGame->removeProgression($this);
        }

        return $this;
    }
}