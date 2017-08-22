<?php

namespace BrainGames\Games\EvenGame;

use function \cli\line;

function printRules()
{
    line('Answer "yes" if number even otherwise answer "no".');
}

function getQuestion()
{
    $question = rand();
    $correctAnswer = isEven($question) ? 'yes' : 'no';

    return array($question, $correctAnswer);
}

function isEven($number)
{
    return ($number % 2) == 0 ? true : false;
}
