<?php

namespace App\Controller\Api;

use App\Entity\Exercise;
use App\Service\AddExerciseUseCase;
use App\Service\CalculateExerciseScoreUseCase;
use App\Service\GetExerciseByPositionUseCase;
use App\Service\IsLastExerciseUseCase;
use App\Service\GetNextExercisePositionByScoreUseCase;
use App\Service\ListExercisesUseCase;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;

class ExerciseController extends AbstractFOSRestController
{
    /**
     * @Rest\Get(path="/exercise/list")
     * @Rest\View(serializerGroups={"exercise"}, serializerEnableMaxDepthChecks=true)
     * @param ListExercisesUseCase $listExercisesUseCase
     * @return array
     */
    public function listExercises(
        ListExercisesUseCase $listExercisesUseCase
    ) {
        return $listExercisesUseCase->execute();
    }

    /**
     * @Rest\Post(path="/exercise/add")
     * @Rest\View(serializerGroups={"exercise"}, serializerEnableMaxDepthChecks=true)
     * @param AddExerciseUseCase $addExerciseUseCase
     * @return int
     */
    public function addExercise(
        AddExerciseUseCase $addExerciseUseCase
    ) {
        $exercise = $_POST["exercise"];
        //$exercise = new Exercise('A3',1,1,200,'1_0_5');
        $addExerciseUseCase->execute($exercise);
        return $exercise ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST;
    }

    /**
     * @Rest\Post(path="/exercise/next")
     * @Rest\View(serializerGroups={"exercise"}, serializerEnableMaxDepthChecks=true)
     * @param CalculateExerciseScoreUseCase $calculateExerciseScoreUseCase
     * @param GetNextExercisePositionByScoreUseCase $getNextExerciseByScoreUseCase
     * @param GetExerciseByPositionUseCase $getExerciseByPositionUseCase
     * @param IsLastExerciseUseCase $isLastExerciseUseCase
     * @return Exercise
     */
    public function nextExercise(
        CalculateExerciseScoreUseCase $calculateExerciseScoreUseCase,
        GetNextExercisePositionByScoreUseCase $getNextExerciseByScoreUseCase,
        GetExerciseByPositionUseCase $getExerciseByPositionUseCase,
        IsLastExerciseUseCase $isLastExerciseUseCase
    ) {
        $exercise = $_POST["exercise"];
        //$exercise = new Exercise('A1',1,1,100,'1_0_2');
        if(!$isLastExerciseUseCase->execute($exercise))
        {
            $exerciseSolution = $getExerciseByPositionUseCase->execute($exercise->getPosition());
            $score = $calculateExerciseScoreUseCase->execute($exercise, $exerciseSolution);
            $position = $getNextExerciseByScoreUseCase->execute($exercise, $score);
            return $getExerciseByPositionUseCase->execute($position);
        }
        return $exercise;
    }
}