<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
class Horaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $jour_semaine = null;

    #[ORM\Column(length: 255)]
    private ?string $heure_ouverture = null;

    #[ORM\Column(length: 255)]
    private ?string $heure_fermeture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJourSemaine(): ?string
    {
        return $this->jour_semaine;
    }

    public function setJourSemaine(string $jour_semaine): self
    {
        $this->jour_semaine = $jour_semaine;

        return $this;
    }

    public function getHeureOuverture(): ?string
    {
        return $this->heure_ouverture;
    }

    public function setHeureOuverture(string $heure_ouverture): self
    {
        $this->heure_ouverture = $heure_ouverture;

        return $this;
    }

    public function getHeureFermeture(): ?string
    {
        return $this->heure_fermeture;
    }

    public function setHeureFermeture(string $heure_fermeture): self
    {
        $this->heure_fermeture = $heure_fermeture;

        return $this;
    }
}
