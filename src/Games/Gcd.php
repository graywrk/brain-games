<?php

namespace BrainGames\Games\Gcd;

function run() {
    $getRules = function () {
        return 'Find the greatest common divisor of given numbers.';
    };

    $getQuestionAndAnswer = function () {
        $first = rand();
        $second = rand();
        $question = "{$first} {$second}";
        $correctAnswer = gcd($first, $second);

        return array($question, $correctAnswer);
    };

    $game = \BrainGames\Games\game($getRules, $getQuestionAndAnswer);
    $game();
}

function gcd($first, $second)
{
    return ($first % $second) != 0 ? gcd($second, $first % $second) : $second;
}
