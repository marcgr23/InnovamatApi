<?php

namespace App\Service;

use App\Entity\Exercise;
use Doctrine\ORM\EntityManagerInterface;

class AddExerciseUseCase
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function execute(Exercise $exercise): Exercise
    {
        $this->em->persist($exercise);
        $this->em->flush();
        return $exercise;
    }
}