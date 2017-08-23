<?php

namespace BrainGames\Games\Even;

function isEven($number)
{
    return ($number % 2) == 0 ? true : false;
}

function run()
{
    $getRules = function () {
        return 'Answer "yes" if number even otherwise answer "no".';
    };

    $getQuestionAndAnswer = function () {
        $question = rand();
        $correctAnswer = isEven($question) ? 'yes' : 'no';

        return array($question, $correctAnswer);
    };

    $game = \BrainGames\Games\game($getRules, $getQuestionAndAnswer);
    $game();
}
