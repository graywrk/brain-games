<?php

namespace BrainGames\Games\GcdGame;

use function \cli\line;

function printRules()
{
    line('Find the greatest common divisor of given numbers.');
}

function getQuestion()
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
