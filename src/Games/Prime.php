<?php

namespace BrainGames\Games\Prime;

function run() {
    $getRules = function () {
        return 'Answer "yes" if number prime otherwise answer "no".';
    };

    $getQuestionAndAnswer = function () {
        $question = rand() + 2;

        $correctAnswer = isPrime($question) ? 'yes' : 'no';

        return array($question, $correctAnswer);
    };

    $game = \BrainGames\Games\game($getRules, $getQuestionAndAnswer);
    $game();
}

function isPrime($number)
{
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}
