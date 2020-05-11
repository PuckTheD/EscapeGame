<?php

namespace App\Entity;

use App\Repository\InventaireRepository;
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
}
