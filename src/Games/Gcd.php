<?php

namespace BrainGames\Games\Gcd;

use function \cli\line;

function getRules()
{
    return 'Find the greatest common divisor of given numbers.';
}

function getQuestionAndAnswer()
{
    $first = rand();
    $second = rand();
    $question = "{$first} {$second}";
    $correctAnswer = gcd($first, $second);

    return array($question, $correctAnswer);
}

function gcd($first, $second)
{
    return ($first % $second) != 0 ? gcd($second, $first % $second) : $second;
}
