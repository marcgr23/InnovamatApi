<?php

namespace App\Service;

use App\Repository\ExerciseRepository;

class ListExercisesUseCase
{

    private $exerciseRepository;

    public function __construct(ExerciseRepository $exerciseRepository)
    {
        $this->exerciseRepository = $exerciseRepository;
    }

    public function execute(): array
    {
        return $this->exerciseRepository->findAll();
    }
}