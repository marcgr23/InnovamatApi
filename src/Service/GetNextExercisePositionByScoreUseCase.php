<?php

namespace App\Service;

use App\Entity\Exercise;

class GetNextExercisePositionByScoreUseCase
{
    const SCORE_LIMIT = 75;

    public function execute(Exercise $exercise, int $score): int
    {
        if($score < self::SCORE_LIMIT){
            return $exercise->getPosition();
        }
        return $exercise->getPosition() + 1;
    }
}