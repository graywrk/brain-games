<?php

namespace BrainGames\Games\Calc;

use function \cli\line;

function printRules()
{
    line('What is the result of the expression?');
}

function getQuestionAndAnswer()
{
    $first = rand();
    $second = rand();

    $opCode = rand(0, 2);
    switch ($opCode) {
        case '0':
            $op = '+';
            $correctAnswer = $first + $second;
            break;
        case '1':
            $op = '-';
            $correctAnswer = $first - $second;
            break;
        case '2':
            $op = '*';
            $correctAnswer = $first * $second;
            break;
    }

    $question = "{$first} {$op} {$second}";

    return array($question, $correctAnswer);
}
