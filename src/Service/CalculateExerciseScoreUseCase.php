<?php

namespace App\Service;

use App\Entity\Exercise;
use App\Repository\ExerciseRepository;

class CalculateExerciseScoreUseCase
{

    private $exerciseRepository;

    public function __construct(ExerciseRepository $exerciseRepository)
    {
        $this->exerciseRepository = $exerciseRepository;
    }

    public function execute(Exercise $exercise, Exercise $exerciseSolution): int
    {
        $exerciseSolutions = explode(" ", $exercise->getSolution());
        $solutions = explode(" ", $exerciseSolution->getSolution());
        $solutionsNumber = sizeof($solutions);
        $correctAnswers = 0;

        for($i = 0; $i < $solutionsNumber; $i++)
        {
            if ($exerciseSolutions[$i] == $solutions[$i])
            {
                $correctAnswers++;
            }
        }

        return ($correctAnswers/$solutionsNumber)*100;
    }
}