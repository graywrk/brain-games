<?php

namespace BrainGames\Games;

require_once "EvenGame.php";
require_once "CalcGame.php";

use function \cli\line;
use function \cli\prompt;

const ATTEMPTS = 3;

function run($game)
{
    switch ($game) {
        case 'calc':
            $getQuestion = '\BrainGames\Games\CalcGame\getQuestion';
            $printRules =  '\BrainGames\Games\CalcGame\printRules';
            break;
        case 'even':
            $getQuestion = '\BrainGames\Games\EvenGame\getQuestion';
            $printRules =  '\BrainGames\Games\EvenGame\printRules';
            break;
    }

    return function () use ($getQuestion, $printRules) {
        line('Welcome to the Brain Games!');
        $printRules();
        $userName = prompt('May I have your name?');
        line("Hello, {$userName}!");
        for ($i = 0; $i < ATTEMPTS; $i++) {
            list($question, $correctAnswer) = $getQuestion();
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
}
