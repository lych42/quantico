<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $nombre_convives = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergies = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datetime = null;

    #[ORM\Column(length: 255)]
    private ?string $nomDuCLient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreConvives(): ?int
    {
        return $this->nombre_convives;
    }

    public function setNombreConvives(?int $nombre_convives): self
    {
        $this->nombre_convives = $nombre_convives;

        return $this;
    }

    public function getAllergies(): ?string
    {
        return $this->allergies;
    }

    public function setAllergies(?string $allergies): self
    {
        $this->allergies = $allergies;

        return $this;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }

    public function getNomDuCLient(): ?string
    {
        return $this->nomDuCLient;
    }

    public function setNomDuCLient(string $nomDuCLient): self
    {
        $this->nomDuCLient = $nomDuCLient;

        return $this;
    }
}
