<?php

namespace BrainGames\Games;

use function \cli\line;
use function \cli\prompt;

const ATTEMPTS_COUNT = 3;

function game($file, $getRules, $getQuestionAndAnswer)
{
    $runGame = function () use ($file, $getRules, $getQuestionAndAnswer){
        require_once $file;
        
        line('Welcome to the Brain Games!');
        line($getRules());
        $userName = prompt('May I have your name?');
        line("Hello, {$userName}!");
        for ($i = 0; $i < ATTEMPTS_COUNT; $i++) {
            list($question, $correctAnswer) = $getQuestionAndAnswer();
            line("Question: {$question}");
            $userAnswer = prompt('Your answer');
            if ($userAnswer == $correctAnswer) {
                line('Correct!');
            } else {
                line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
                line("Let's try again, {$userName}");
                return;
            }
        }

        line("Congratulations, {$userName}!");
    };

    return $runGame;
}
