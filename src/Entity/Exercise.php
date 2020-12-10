<?php

namespace App\Entity;

use App\Repository\ExerciseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Request;

/**
 * @ORM\Entity(repositoryClass=ExerciseRepository::class)
 */
class Exercise
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="integer")
     */
    private $Position;

    /**
     * @ORM\Column(type="integer")
     */
    private $Level;

    /**
     * @ORM\Column(type="integer")
     */
    private $Time;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Solution;

    public function __construct($Name, $Position, $Level, $Time, $Solution)
    {
        $this->Name = $Name;
        $this->Position = $Position;
        $this->Level = $Level;
        $this->Time = $Time;
        $this->Solution = $Solution;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->Position;
    }

    public function setPosition(int $Position): self
    {
        $this->Position = $Position;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->Level;
    }

    public function setLevel(int $Level): self
    {
        $this->Level = $Level;

        return $this;
    }

    public function getTime(): ?int
    {
        return $this->Time;
    }

    public function setTime(int $Time): self
    {
        $this->Time = $Time;

        return $this;
    }

    public function getSolution(): ?string
    {
        return $this->Solution;
    }

    public function setSolution(string $Solution): self
    {
        $this->Solution = $Solution;

        return $this;
    }
}
