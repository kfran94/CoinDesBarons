<?php

namespace App\Entity;

use App\Repository\MaxReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaxReservationRepository::class)]
class MaxReservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $maxReservation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaxReservation(): ?int
    {
        return $this->maxReservation;
    }

    public function setMaxReservation(int $maxReservation): static
    {
        $this->maxReservation = $maxReservation;

        return $this;
    }
}
