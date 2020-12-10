<?php

namespace App\Service;

use App\Entity\Exercise;
use App\Repository\ExerciseRepository;

class IsLastExerciseUseCase
{

    private $exerciseRepository;

    public function __construct(ExerciseRepository $exerciseRepository)
    {
        $this->exerciseRepository = $exerciseRepository;
    }

    public function execute(Exercise $exercise): bool
    {
        return $this->exerciseRepository->findOneBy([],['id'=>'DESC'])->getId() == $exercise->getId();
    }
}