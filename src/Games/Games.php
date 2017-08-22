<?php

namespace BrainGames\Games;

use function \cli\line;
use function \cli\prompt;

const ATTEMPTS_COUNT = 3;

function run($game)
{
    switch ($game) {
        case 'calc':
            require_once "Calc.php";
            $getQuestionAndAnswer = '\BrainGames\Games\Calc\getQuestionAndAnswer';
            $getRules =  '\BrainGames\Games\CalcGame\getRules';
            break;
        case 'even':
            require_once "Even.php";
            $getQuestionAndAnswer = '\BrainGames\Games\Even\getQuestionAndAnswer';
            $getRules =  '\BrainGames\Games\EvenGame\getRules';
            break;
        case 'gcd':
            require_once "Gcd.php";
            $getQuestionAndAnswer = '\BrainGames\Games\Gcd\getQuestionAndAnswer';
            $getRules =  '\BrainGames\Games\GcdGame\getRules';
            break;
        case 'balance':
            require_once "Balance.php";
            $getQuestionAndAnswer = '\BrainGames\Games\Balance\getQuestionAndAnswer';
            $getRules = '\BrainGames\Games\BalanceGame\getRules';
    }

    return function () use ($getQuestionAndAnswer, $printRules) {
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
}
