<?php

namespace BrainGames\Games\Progression;

const PROGRESSION_LENGTH = 10;
const PROGRESSION_MAX_INCREMENT = 10;

function run()
{
    $getRules = function () {
        return 'What number is missing in this progression?';
    };

    $getQuestionAndAnswer = function () {
        $question = [];

        $firstNumber = rand();
        $increment = (rand() % PROGRESSION_MAX_INCREMENT - 1) + 1;
        $missingPosition = rand() % PROGRESSION_LENGTH;

        $question[0] = $firstNumber;
        for ($i = 1; $i < PROGRESSION_LENGTH; $i++) {
            $question[$i] = $question[$i - 1] + $increment;
        }

        $correctAnswer = $question[$missingPosition];
        $question[$missingPosition] = '..';

        $question = implode(" ", $question);

        return array($question, $correctAnswer);
    };

    $game = \BrainGames\Games\game($getRules, $getQuestionAndAnswer);
    $game();
}
