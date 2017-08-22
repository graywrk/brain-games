<?php

namespace BrainGames\Games\Even;

use function \cli\line;

function getRules()
{
    return 'Answer "yes" if number even otherwise answer "no".';
}

function getQuestionAndAnswer()
{
    $question = rand();
    $correctAnswer = isEven($question) ? 'yes' : 'no';

    return array($question, $correctAnswer);
}

function isEven($number)
{
    return ($number % 2) == 0 ? true : false;
}
