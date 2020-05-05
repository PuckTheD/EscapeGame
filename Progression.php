<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProgressionRepository")
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
    private $progress;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProgress(): ?string
    {
        return $this->progress;
    }

    public function setProgress(?string $progress): self
    {
        $this->progress = $progress;

        return $this;
    }
}
