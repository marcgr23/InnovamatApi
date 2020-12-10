<?php

namespace App\Service;

use App\Entity\Exercise;
use App\Repository\ExerciseRepository;

class GetExerciseByPositionUseCase
{

    private $exerciseRepository;

    public function __construct(ExerciseRepository $exerciseRepository)
    {
        $this->exerciseRepository = $exerciseRepository;
    }

    public function execute(int $position): Exercise
    {
        return $this->exerciseRepository->findOneBy(['Position' => $position]);
    }
}