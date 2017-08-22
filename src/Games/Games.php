<?php

namespace BrainGames\Games;

use function \cli\line;
use function \cli\prompt;

const ATTEMPTS_COUNT = 3;

function run($game)
{
    switch ($game) {
        case 'calc':
            require_once "CalcGame.php";
            $getQuestionAndAnswer = '\BrainGames\Games\CalcGame\getQuestionAndAnswer';
            $printRules =  '\BrainGames\Games\CalcGame\printRules';
            break;
        case 'even':
            require_once "EvenGame.php";
            $getQuestionAndAnswer = '\BrainGames\Games\EvenGame\getQuestionAndAnswer';
            $printRules =  '\BrainGames\Games\EvenGame\printRules';
            break;
        case 'gcd':
            require_once "GcdGame.php";
            $getQuestionAndAnswer = '\BrainGames\Games\GcdGame\getQuestionAndAnswer';
            $printRules =  '\BrainGames\Games\GcdGame\printRules';
            break;
        case 'balance':
            require_once "BalanceGame.php";
            $getQuestionAndAnswer = '\BrainGames\Games\BalanceGame\getQuestionAndAnswer';
            $printRules = '\BrainGames\Games\BalanceGame\printRules';
    }

    return function () use ($getQuestionAndAnswer, $printRules) {
        line('Welcome to the Brain Games!');
        $printRules();
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
}
