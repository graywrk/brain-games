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
    $isEven = (($question % 2) == 0);
    $correctAnswer = $isEven ? 'yes' : 'no';

    return array($question, $correctAnswer);
}
