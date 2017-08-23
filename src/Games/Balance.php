<?php

namespace BrainGames\Games\Balance;

function run()
{
    $getRules = function () {
        return 'Balance the given number.';
    };

    $getQuestionAndAnswer = function () {
        $question = rand();
        $correctAnswer = balance($question);

        return array($question, $correctAnswer);
    };

    $game = \BrainGames\Games\game($getRules, $getQuestionAndAnswer);
    $game();
}

function balance($number)
{
    $digits = num2digits($number);
    sort($digits);

    if (isBalanced($number)) {
        return digits2num($digits);
    }

    $min = $digits[0];
    $max = $digits[count($digits) - 1];

    $diff = $max - $min - 1;

    $min += $diff;
    $max -= $diff;

    $digits[0] = $min;
    $digits[count($digits) - 1] = $max;

    sort($digits);

    $number = digits2num($digits);

    return balance($number);
}

function isBalanced($number)
{
    $digits = num2digits($number);

    return (max($digits) - min($digits) <= 1) ? true : false;
}

function num2digits($number)
{
    return str_split(strval($number));
}

function digits2num($digits)
{
    return intval(implode($digits));
}
